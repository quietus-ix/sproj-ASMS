<?php
$lastName      = $_POST['apply_ln'];
$firstName     = $_POST['apply_fn'];
$middleName    = $_POST['apply_mn'];
$extension     = $_POST['apply_ext'];
$course        = $_POST['apply_course'];
$baranggay     = $_POST['apply_brgy'];
$municipality  = $_POST['apply_mnc'];
$civilStatus   = $_POST['apply_cs'];
$citizenship   = $_POST['apply_cz'];
$dateOfBirth   = $_POST['apply_date'];
$age           = $_POST['apply_age'];
$gender        = $_POST['apply_gd'];
$email         = $_POST['apply_em'];
$contactNum    = $_POST['apply_cn'];
$contactNum    = '63' . $contactNum;

$m_name        = $_POST['apply_mom'];
$m_age         = $_POST['apply_mom_age'];
$m_occupation  = $_POST['apply_mom_occ'];
$m_education   = $_POST['apply_mom_edu'];
$m_address     = $_POST['apply_mom_adr'];
$m_contactNum  = $_POST['apply_mom_cn'];

$f_name        = $_POST['apply_dad'];
$f_age         = $_POST['apply_dad_age'];
$f_occupation  = $_POST['apply_dad_occ'];
$f_education   = $_POST['apply_dad_edu'];
$f_address     = $_POST['apply_dad_adr'];
$f_contactNum  = $_POST['apply_dad_cn'];

$totalIncome   = $_POST['apply_income'];
$numSibling    = $_POST['apply_sibling'];

$status        = 'pending';
$currentDate = date('Y-m-d');
// kadamo depoga

require_once '../../php/config.php';

if (!$conn) {
   echo json_encode(array(
      "type"    => "error",
      "msg"     => "Error connecting to database"
   ));
} else {
   session_start();

   $reqBy = $_SESSION['sessionID'];

   $check = $conn->query(
      "SELECT scholar_reqBy FROM tbl_scholar_application
               WHERE scholar_reqBy = '$reqBy'"
   );

   if ($check->num_rows > 0) {
      echo json_encode(array(
         "type"    => "error",
         "msg"     => "You already submitted a scholar application form"
      ));
   } else {
      $query = $conn->prepare(
         "INSERT INTO `tbl_scholar_family`( 
                         `sfam_f_name`, 
                         `sfam_f_age`, 
                         `sfam_f_address`, 
                         `sfam_f_occupation`, 
                         `sfam_f_eduAttainment`, 
                         `sfam_f_mobileNum`, 
                         `sfam_m_name`, 
                         `sfam_m_age`, 
                         `sfam_m_address`, 
                         `sfam_m_occupation`, 
                         `sfam_m_eduAttainment`, 
                         `sfam_m_mobileNum`, 
                         `sfam_totalSalary`, 
                         `sfam_numSiblings`
                    ) 
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)"
      );
      $query->bind_param(
         "ssssssssssssss",
         $f_name,
         $f_age,
         $f_address,
         $f_occupation,
         $f_education,
         $f_contactNum,
         $m_name,
         $m_age,
         $m_address,
         $m_occupation,
         $m_education,
         $m_contactNum,
         $totalIncome,
         $numSibling
      );
      $query->execute();

      $famID = $conn->insert_id;

      if ($query) {
         $query = $conn->prepare(
            "INSERT INTO `tbl_scholar_application`(
                                   `scholar_course`, 
                                   `scholar_family`, 
                                   `scholar_ln`, 
                                   `scholar_fn`, 
                                   `scholar_mn`, 
                                   `scholar_ext`, 
                                   `scholar_brgy`, 
                                   `scholar_muni`, 
                                   `scholar_civStatus`, 
                                   `scholar_citizenship`, 
                                   `scholar_dob`, 
                                   `scholar_age`, 
                                   `scholar_gender`, 
                                   `scholar_email`, 
                                   `scholar_num`,
                                   `scholar_status`,
                                   `scholar_reqBy`,
                                   `scholar_dateOfReq`
                              ) 
                              VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)"
         );
         $query->bind_param(
            'ssssssssssssssssss',
            $course,
            $famID,
            $lastName,
            $firstName,
            $middleName,
            $extension,
            $baranggay,
            $municipality,
            $civilStatus,
            $citizenship,
            $dateOfBirth,
            $age,
            $gender,
            $email,
            $contactNum,
            $status,
            $reqBy,
            $currentDate
         );
         $query->execute();

         if ($query) {
            $notif_type = 1;
            $notif_ref = $query->insert_id;
            $notif_new = true;
            $notif_time = date('H:i:S');
            $notif_date = $currentDate;

            $query = $conn->prepare(
               "INSERT INTO tbl_notification(
                                        notif_type,
                                        notif_ref,
                                        notif_new,
                                        notif_time,
                                        notif_date
                                   ) VALUES (
                                        ?, ?, ?, ?, ?
                                   )"
            );
            $query->bind_param("iiiss", $notif_type, $notif_ref, $notif_new, $notif_time, $notif_date);
            $query->execute();

            if ($query) {

               echo json_encode(array(
                  "type"    => "success",
                  "msg"     => "Application successfully submitted! You may view your application details in Application tab"
               ));
            }
         }
      } else {
         echo json_encode(array(
            "type"    => "error",
            "msg"     => "Error inserting family background"
         ));
      }
   }
}
