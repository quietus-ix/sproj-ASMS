<?php

require_once '../../php/config.php';

if (isset($_POST['editCourse_id']) && isset($_POST['editCourse_name']) && isset($_POST['editCourse_numYear'])) {

   $id = $_POST['editCourse_id'];
   $course_name = $_POST['editCourse_name'];
   $course_yr = $_POST['editCourse_numYear'];

   $dup = $conn->query("SELECT course_yearlevel FROM tbl_course")->fetch_column();

   if ($course_name !== $id && $course_yr !== $dup) {
      $query = $conn->query("UPDATE tbl_course SET course_name = '$course_name', course_yearlevel = '$course_yr' WHERE course_name = '$id'");
      if ($query) {
         echo json_encode(array(
            "code" => 1,
            "msg" => "Course successfully edited"
         ));
      }
   } else if ($course_name == $id && $course_yr !== $dup) {
      $query = $conn->query("UPDATE tbl_course SET course_yearlevel = '$course_yr' WHERE course_name = '$id'");
      if ($query) {
         echo json_encode(array(
            "code" => 1,
            "msg" => "Course year level successfully edited"
         ));
      }
   } else if ($course_name !== $id && $course_yr == $dup) {
      $query = $conn->query("UPDATE tbl_course SET course_name = '$course_name' WHERE course_name = '$id'");
      if ($query) {
         echo json_encode(array(
            "code" => 1,
            "msg" => "Course name successfully edited"
         ));
      }
   }
} else {
   echo json_encode(array(
      "code" => 2,
      "msg" => "Fill all fields"
   ));
}
