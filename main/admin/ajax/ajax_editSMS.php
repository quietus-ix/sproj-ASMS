<?php
require_once '../../php/config.php';

if (isset($_POST['sms_info'])) {
   $sms_info = $_POST['sms_info'];

   $query = $conn->prepare(
      "UPDATE tbl_sms SET content = ? WHERE label = 'content'"
   );
   $query->bind_param("s", $sms_info);
   $query->execute();

   if ($query) {
      echo json_encode(array(
         "code" => 1,
         "msg" => "SMS contents successfully edited."
      ));
   }
}
