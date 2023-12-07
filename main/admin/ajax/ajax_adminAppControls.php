<?php
     $id = $_POST['id'];
     $req = $_POST['req'];
     $status;

     require_once '../../php/config.php';

     if($req==="approve") {
          $status = 'approved';
          $sched = $_POST['sched'];
          $note = $_POST['note'];
          $query = $conn->prepare(
               "UPDATE tbl_scholar_application
               SET scholar_status = ?,
                    scholar_schedule = ?,
                    scholar_note = ?
               WHERE scholar_id = '$id'"
          );
          $query->bind_param('sss', $status, $sched, $note);
          $query->execute();

          if($query) {
               echo json_encode(array(
                    "type"    =>"success",
                    "msg"     =>"Scholarship application form successfully approved"
               ));
          } else {
               echo json_encode(array(
                    "type"    =>"error",
                    "msg"     =>"Error"
               ));
          }
     } else if($req==="reject") {
          $status = 'rejected';
          $note = $_POST['note'];
          $query = $conn->prepare(
               "UPDATE tbl_scholar_application
               SET scholar_status = ?,
                    scholar_note = ?
               WHERE scholar_id = '$id'"
          );
          $query->bind_param('ss', $status, $note);
          $query->execute();

          if($query) {
               echo json_encode(array(
                    "type"    =>"success",
                    "msg"     =>"Scholarship application form has been rejected"
               ));
          } else {
               echo json_encode(array(
                    "type"    =>"error",
                    "msg"     =>"Error"
               ));
          }
     } else if($req==="confirmScholar") {
          $status = 'verified';
          $query = $conn->prepare(
               "UPDATE tbl_scholar_application
               SET scholar_status = ?
               WHERE scholar_id = '$id'"
          );
          $query->bind_param('s', $status);
          $query->execute();

          if($query) {
               echo json_encode(array(
                    "type"    =>"success",
                    "msg"     =>"Scholarship successfully applied to the applicant"
               ));
          } else {
               echo json_encode(array(
                    "type"    =>"error",
                    "msg"     =>"Error"
               ));
          }
     }
?>