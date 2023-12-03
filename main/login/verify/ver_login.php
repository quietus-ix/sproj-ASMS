<?php
     $username      = $_POST['login_username'];
     $password      = $_POST['login_password'];

     require_once '../../php/config.php';

     $username = $conn->real_escape_string($username);

     $query = $conn->query("SELECT * FROM tbl_user WHERE user_username = '$username'");

     if($query->num_rows > 0) {
          $row = $query->fetch_assoc();

          $inPassword = $row['user_password'];

          if(password_verify($password, $inPassword)) {
               session_start();

               $_SESSION['sessionID'] = $row['user_id'];

               if($row['user_type']=='2') {
                    echo json_encode(array(
                         "type"    =>"success",
                         "url"     =>"../scholar/index.php"
                    ));
               }
               else if ($row['user_type']=='1') {
                    echo json_encode(array(
                         "type"    =>"success",
                         "url"     =>"../admin/index.php"
                    ));
               }
          }
          else {
               echo json_encode(array(
                    "type"    =>"error",
                    "msg"     =>"Account not found"
               ));
          }
     }
     else {
          echo json_encode(array(
               "type"    =>"error",
               "msg"     =>"Account not found"
          ));
     }
?>