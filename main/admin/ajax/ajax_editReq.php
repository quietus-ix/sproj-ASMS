<?php
require_once '../../php/config.php';

if (isset($_POST['req_info']) && isset($_POST['faq_info'])) {
   $req_info = $_POST['req_info'];
   $faq_info = $_POST['faq_info'];

   $query = $conn->prepare(
      "UPDATE tbl_reqinfo SET content = ? WHERE label = 'req-body-text'"
   );
   $query->bind_param("s", $req_info);
   $query->execute();

   if ($query) {
      $query = $conn->prepare(
         "UPDATE tbl_reqinfo SET content = ? WHERE label = 'faq-body-text'"
      );
      $query->bind_param("s", $faq_info);
      $query->execute();

      if ($query) {
         echo json_encode(array(
            "code" => 1,
            "msg" => "Requirement information successfully modified"
         ));
      }
   }
}
