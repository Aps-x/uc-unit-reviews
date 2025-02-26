<?php
require 'php/model/database.php';

// Could refactor with a get_Course_Cards() function


$courses = mysqli_query($conn, "SELECT * FROM course");

if (!$courses) {
    die("Database query failed: " . mysqli_error($conn));
}

$cards = '';

while ($course = mysqli_fetch_assoc($courses)) {

    $course_id = htmlspecialchars($course['ID']);
    $course_description = htmlspecialchars($course['Description']);
    $course_title = htmlspecialchars($course['Title']);

    $cards .= '
        <article class="card">
            <a href="course.view.php?course=' . urlencode($course_id) . '" class="flow">
                <header class="card__header">
                    <h3 class="card__title">' . $course_title . ' (' . $course_id . ')</h3>
                    <div>
                        <div class="card__star-rating">★★★★★</div>
                        <p class="card__review-count">80 Reviews</p>
                    </div>
                </header>
                <p class="card__description | line-clamp">
                    ' . $course_description . '
                </p>
            </a>
        </article>';
}

mysqli_free_result($courses);
mysqli_close($conn);