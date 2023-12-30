<?php
require_once '../../php/config.php';

if (isset($_POST['notice_header']) && isset($_POST['notice_body'])) {
   $notice_header = $_POST['notice_header'];
   $notice_body = $_POST['notice_body'];

   $query = $conn->prepare(
      "UPDATE tbl_noticeinfo SET content = ? WHERE label = 'header'"
   );
   $query->bind_param("s", $notice_header);
   $query->execute();

   if ($query) {
      $query = $conn->prepare(
         "UPDATE tbl_noticeinfo SET content = ? WHERE label = 'body-text'"
      );
      $query->bind_param("s", $notice_body);
      $query->execute();

      if ($query) {
         echo json_encode(array(
            "code" => 1,
            "msg" => "Notice bulletin successfully modified"
         ));
      }
   }
}
