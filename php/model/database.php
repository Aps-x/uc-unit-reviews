<?php

$conn = "";

$db_server = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "uc_unit_reviews_db";

try {
    $conn = mysqli_connect($db_server, $db_user, $db_pass, $db_name);
}
catch(mysqli_sql_exception) {
    debug_to_console("Unable to connect");
}

if ($conn) {
    debug_to_console("Connection established");
}

function Get_All_Courses_Array($conn) {
    $result = mysqli_query($conn, "SELECT * FROM course");

    $courses = [];
    while ($course = mysqli_fetch_assoc($result)) {
        $courses[] = [
            'id' => htmlspecialchars($course['ID']),
            'title' => htmlspecialchars($course['Title']),
            'description' => htmlspecialchars($course['Description'])
        ];
    }

    mysqli_free_result($result);
    return $courses;
}

function Does_Course_Exist($conn, $course_id) {
    $sql = "SELECT 1 FROM course WHERE ID = ? LIMIT 1";
    $stmt = $conn->prepare($sql);
    
    if (!$stmt) {
        return false;
    }

    $stmt->bind_param("i", $course_id);
    $stmt->execute();
    $stmt->store_result();

    $exists = $stmt->num_rows > 0;
    
    $stmt->close();
    
    return $exists;
}

function Get_Course_Info_Array($conn, $course_id) {
    $stmt = $conn->prepare("SELECT * FROM course WHERE id = ?");
    $stmt->bind_param("s", $course_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    if (!$row) {
        return null;
    }

    return [
        'id' => htmlspecialchars($row['ID']),
        'title' => htmlspecialchars($row['Title']),
        'description' => htmlspecialchars($row['Description'])
    ];
}

// TODO: Handle cases where there are no reviews
function Get_Derived_Course_Info_Array($conn, $course_id) {
    $stmt = $conn->prepare("
        SELECT 
            AVG(Rating) AS avg_rating, 
            AVG(Enjoyability) AS avg_enjoyability, 
            AVG(Usefulness) AS avg_usefulness, 
            AVG(Manageability) AS avg_manageability,
            COUNT(*) AS review_count
        FROM Review
        WHERE CourseID = ?
    ");

    $stmt->bind_param("s", $course_id);
    $stmt->execute();

    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    if (!$row || $row['review_count'] == 0) {

        Debug_To_Console("No reviews found");

        return [
            'avg_rating' => 0,
            'avg_enjoyability' => 0,
            'avg_usefulness' => 0,
            'avg_manageability' => 0,
            'review_count' => 0
        ];
    }

    return [
        'avg_rating' => htmlspecialchars(round($row['avg_rating'], 2)),
        'avg_enjoyability' => htmlspecialchars(round($row['avg_enjoyability'], 2)),
        'avg_usefulness' => htmlspecialchars(round($row['avg_usefulness'], 2)),
        'avg_manageability' => htmlspecialchars(round($row['avg_manageability'], 2)),
        'review_count' => htmlspecialchars($row['review_count'])
    ];    
}

function Get_Course_Reviews($conn, $course_id) {
    $stmt = $conn->prepare("SELECT * FROM review WHERE CourseID = ?");
    $stmt->bind_param("s", $course_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 0) {
        Debug_To_Console("No reviews found");
        return [];
    }

    $reviews = [];
    while ($review = $result->fetch_assoc()) {
        $reviews[] = [
            'title' => htmlspecialchars($review['Title']),
            'text' => htmlspecialchars($review['Text']),
            'rating' => htmlspecialchars(round($review['Rating'], 2)),

            'enjoyability' => htmlspecialchars(round($review['Enjoyability'], 2)),
            'usefulness' => htmlspecialchars(round($review['Usefulness'], 2)),
            'manageability' => htmlspecialchars(round($review['Manageability'], 2)),
            
            'grade' => htmlspecialchars(round($review['Grade'], 2)),
            'completion' => htmlspecialchars($review['Completion']),
        ];
    }

    return $reviews;
}

// TODO: Remove before production
function Debug_To_Console($data) {
    $output = $data;
    if (is_array($output))
        $output = implode(',', $output);

    echo "<script>console.log('Log: " . $output . "' );</script> \n";
}