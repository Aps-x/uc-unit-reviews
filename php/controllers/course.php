<?php
require '../model/database.php';

if (isset($_GET['course'])) {
    $course_id = urldecode($_GET['course']);

    $course_info = Get_Course_Info_Array($conn, $course_id);
}

//Debug_To_Console($course_info);