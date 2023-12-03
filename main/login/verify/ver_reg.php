<?php
     $fullname      = $_POST['reg_fullname'];
     $username      = $_POST['reg_username'];
     $email         = $_POST['reg_email'];
     $password      = $_POST['reg_password'];
     $repassword    = $_POST['reg_repassword'];

     require_once '../../php/config.php';

     function passwordMatch($a, $b) {
          $x;

          if($b !== $a) {
               $x = true;
          }
          else {
               $x = false;
          }
          return $x;
     }

     if(passwordMatch($password, $repassword)) {
          echo json_encode(array(
               "type"    =>"error",
               "msg"     =>"Password does not match!"
          ));
          exit();
     }

     $currentDateTime = date('Y-m-d');
     $pHashed = password_hash($password, PASSWORD_BCRYPT);
     $userType = 2;

     $query = $conn->prepare(
          "INSERT INTO tbl_user(
               user_type,
               user_fullname,
               user_username, 
               user_email, 
               user_password, 
               user_creationDate
          )
          VALUES (?, ?, ?, ?, ?, ?)"
          );
     $query->bind_param("ssssss", $userType, $fullname, $username, $email, $pHashed, $currentDateTime);
     $query->execute();

     if($query) {
          session_start();

          $_SESSION['sessionID'] = $query->insert_id;

          echo json_encode(array(
               "type"    =>"success",
               "url"     =>"../scholar/index.php"
          ));
     }
?>