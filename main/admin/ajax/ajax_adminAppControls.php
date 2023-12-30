<?php
$id = $_POST['id'];
$req = $_POST['req'];
$status;

require_once '../../php/config.php';
require '../../php/infobip.php';

use Infobip\Api\SmsApi;
use Infobip\ApiException;
use Infobip\Model\SmsAdvancedTextualRequest;
use Infobip\Model\SmsDestination;
use Infobip\Model\SmsTextualMessage;

$sendSmsApi = new SmsApi(config: $configuration);

$sender = "ASMS";
$recipient = $conn->query("SELECT scholar_num FROM tbl_scholar_application WHERE scholar_id = '$id'")->fetch_column();
$msgContent = $conn->query("SELECT content FROM tbl_sms WHERE label = 'content'")->fetch_column();

$destination = new SmsDestination(
   to: $recipient
);

$message = new SmsTextualMessage(destinations: [$destination], from: $sender, text: $msgContent);

$request = new SmsAdvancedTextualRequest(messages: [$message]);


if ($req === "approve") {
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

   if ($query) {

      try {
         $smsResponse = $sendSmsApi->sendSmsMessage($request);

         echo json_encode(array(
            "type"    => "success",
            "msg"     => "Scholarship application form successfully approved"
         ));
      } catch (Throwable $apiException) {
         echo ("HTTP Code: " . $apiException->getCode() . "\n");
      }
   } else {
      echo json_encode(array(
         "type"    => "error",
         "msg"     => "Error"
      ));
   }
} else if ($req === "reject") {
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

   if ($query) {
      try {
         $smsResponse = $sendSmsApi->sendSmsMessage($request);

         echo json_encode(array(
            "type"    => "success",
            "msg"     => "Scholarship application form has been rejected"
         ));
      } catch (Throwable $apiException) {
         echo ("HTTP Code: " . $apiException->getCode() . "\n");
      }
   } else {
      echo json_encode(array(
         "type"    => "error",
         "msg"     => "Error"
      ));
   }
} else if ($req === "confirmScholar") {
   $status = 'verified';
   $query = $conn->prepare(
      "UPDATE tbl_scholar_application
               SET scholar_status = ?
               WHERE scholar_id = '$id'"
   );
   $query->bind_param('s', $status);
   $query->execute();

   if ($query) {
      try {
         $smsResponse = $sendSmsApi->sendSmsMessage($request);

         echo json_encode(array(
            "type"    => "success",
            "msg"     => "Scholarship successfully applied to the applicant"
         ));
      } catch (Throwable $apiException) {
         echo ("HTTP Code: " . $apiException->getCode() . "\n");
      }
   } else {
      echo json_encode(array(
         "type"    => "error",
         "msg"     => "Error"
      ));
   }
}
