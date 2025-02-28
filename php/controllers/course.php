<?php
require '../model/database.php';
/* ==========================================================================
Page Load
========================================================================== */
if (isset($_GET['course'])) {
    $course_id = filter_var($_GET['course'], FILTER_SANITIZE_NUMBER_INT);

    if (!ctype_digit($course_id)) {
        Show_404();
    }
    if (Does_Course_Exist($conn, $course_id) === false) {
        Show_404();
    } 

    $course_info = Get_Course_Info_Array($conn, $course_id);
    $derived_course_info = Get_Derived_Course_Info_Array($conn, $course_id);
    $course_reviews = Get_Course_Reviews($conn, $course_id);
}
else {
    Show_404();
}
/* ==========================================================================
Form Submission
========================================================================== */
if (isset($_POST['review'])) {
    function sanitize_input($data) {
        return htmlspecialchars(strip_tags(trim($data)), ENT_QUOTES, 'UTF-8');
    }

    // Sanitize user input
    $title = sanitize_input($_POST['title'] ?? '');
    $text = sanitize_input($_POST['text'] ?? '');
    $rating = filter_var($_POST['rating'] ?? 0, FILTER_SANITIZE_NUMBER_INT);
    $enjoyability = filter_var($_POST['enjoyability'] ?? 0, FILTER_SANITIZE_NUMBER_INT);
    $usefulness = filter_var($_POST['usefulness'] ?? 0, FILTER_SANITIZE_NUMBER_INT);
    $manageability = filter_var($_POST['manageability'] ?? 0, FILTER_SANITIZE_NUMBER_INT);
    $grade = filter_var($_POST['grade'] ?? 0, FILTER_SANITIZE_NUMBER_INT);
    $completion = sanitize_input($_POST['completion'] ?? '');
    
    // Ensure numbers are within expected ranges
    $rating = max(0, min(5, $rating));
    $enjoyability = max(0, min(5, $enjoyability));
    $usefulness = max(0, min(5, $usefulness));
    $manageability = max(0, min(5, $manageability));
    $grade = max(0, min(100, $grade));

    Save_Review_To_Database($course_id, $title, $text, $rating, $enjoyability, $usefulness, 
                            $manageability, $grade, $completion, $conn);

    $course_reviews = Get_Course_Reviews($conn, $course_id);
}
/* ==========================================================================
404
========================================================================== */
function Show_404() {
    http_response_code(404);
    include '../views/404.html'; 
    exit(); 
}