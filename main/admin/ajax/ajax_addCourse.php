<?php

require_once '../../php/config.php';

if (isset($_POST['addCourse_name']) && isset($_POST['addCourse_numYear'])) {

   $course_name = $_POST['addCourse_name'];
   $course_yr = $_POST['addCourse_numYear'];

   $query = $conn->query("SELECT * FROM tbl_course WHERE course_name = '$course_name'");

   if ($query->num_rows > 0) {
      echo json_encode(array(
         "code" => 2,
         "msg" => "Duplicate entry"
      ));
      exit();
   } else {
      $query = $conn->query("INSERT INTO tbl_course (course_name, course_yearlevel) VALUES('$course_name', '$course_yr')");
      if ($query) {
         echo json_encode(array(
            "code" => 1,
            "msg" => "Course successfully added"
         ));
      }
   }
} else {
   echo json_encode(array(
      "code" => 2,
      "msg" => "Fill all fields"
   ));
}
