<?php
     require_once '../php/config.php';
     session_start();

     $sessionID = $_SESSION['sessionID'];

     $query = $conn->query(
          "SELECT * 
          FROM tbl_scholar_application AS a
          INNER JOIN tbl_scholar_family AS b
          ON a.scholar_family = b.sfam_id
          WHERE scholar_reqBy = '$sessionID'");
     $row = $query->fetch_assoc();
?>

<?php
     if($query->num_rows > 0) {
?>
<div class="p-3 d-flex flex-column w-100 h-100" style="overflow-y: scroll;">
     <!-- banner -->
     <div class="application-banner w-100 shadow rounded p-3 d-flex justify-content-between mb-3">
          <div class="d-flex flex-column">
               <h5 class="text-dark mb-4">
                    Your assistance application is  
                    <?php
                         $status = $row['scholar_status'];
     
                         if($status == 'pending') {
                              echo 'currently<span class="fw-bold pending"> pending</span>';
                         }
                         else if($status == 'approved') {
                              echo 'now <span class="fw-bold approved"> approved</span>';
                         }
                         else if($status == 'rejected') {
                              echo 'unfortunately <span class="fw-bold rejected"> rejected</span>';
                         }
                         else if($status == 'modified') {
                              echo 'now <span class="fw-bold modified"> modified</span>';
                         }
                    ?>
               </h5>
     
               <p class="text-dark">Your scholarship application will be reviewed by the administrator. Once approved, the admin will send you the schedule of your appointment for interview.</p>
               <div class="d-flex w-50">
                    <button 
                         type="button" 
                         class="btn btn-success w-50" 
                         data-bs-toggle="modal" 
                         data-bs-target="#appointment"
                         <?php
                              if(isset($row['scholar_schedule']) && $row['scholar_status']==='approved') {
                                   echo 'style="display: block;"';
                              }
                              else {
                                   echo 'style="display: none;"';
                              }
                         ?>
                    >
                         View your appointment schedule
                    </button>
                    <button 
                         type="button" 
                         class="btn btn-warning w-50 text-light" 
                         data-bs-toggle="modal" 
                         data-bs-target="#note"
                         <?php
                              if(isset($row['scholar_note']) && $row['scholar_status']==='rejected') {
                                   echo 'style="display: block;"';
                              }
                              else {
                                   echo 'style="display: none;"';
                              }
                         ?>
                    >
                         Comment from the admin
                    </button>
               </div>
          </div>

          <div class="application-banner-illustration d-flex justify-content-center-align-items-center">
               <img src="../../src/assets/img/illus_02.svg" alt="">
          </div>
     </div>
     
     <!-- application information of the user -->
     <div class="card shadow-sm w-100" style="background-color: #fff;">
          <h5 class="card-header fs-6 d-flex align-items-center">
               <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" class="bi bi-file-earmark-fill me-2" viewBox="0 0 16 16">
                    <path d="M4 0h5.293A1 1 0 0 1 10 .293L13.707 4a1 1 0 0 1 .293.707V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2m5.5 1.5v2a1 1 0 0 0 1 1h2z"/>
               </svg>
               Your Application Details
          </h5>
          <div class="card-body" style="overflow-y: scroll; overflow-x: hidden; height: 58vh;">
               <h5 class="card-title fw-bold"></h5>
               <div class="card-text">
                    <div class="row d-flex align-items-center flex-nowrap justify-content-between gap-3 mb-2 pe-3">
                         <span class="fw-bold w-auto fs-5">Name</span><hr class="m-0">
                    </div>
                    <div class="row">
                         <!-- last name -->
                         <div class="col">
                              <div class="form-floating">
                                   <input type="text" class="form-control" name="apply_ln" placeholder="Malba" required disabled value="<?php echo $row['scholar_ln'] ?>">
                                   <label for="apply_ln">Last</label>
                              </div>
                         </div>
                         <!-- first name -->
                         <div class="col">
                              <div class="form-floating">
                                   <input type="text" class="form-control" name="apply_fn" placeholder="Mary Angel" required disabled value="<?php echo $row['scholar_fn'] ?>">
                                   <label for="apply_fn">First</label>
                              </div>
                         </div>
                         <!-- middle name -->
                         <div class="col">
                              <div class="form-floating">
                                   <input type="text" class="form-control" name="apply_mn" placeholder="Maque" required disabled value="<?php echo $row['scholar_mn'] ?>">
                                   <label for="apply_mn">Middle</label>
                              </div>
                         </div>
                         <!-- name extension -->
                         <div class="col-1">
                              <div class="form-floating">
                                   <input type="text" class="form-control" name="apply_ext" placeholder="Jr" disabled value="<?php echo $row['scholar_ext'] ?>">
                                   <label for="apply_ext">Ext.</label>
                              </div>
                         </div>
                    </div>
                    <div class="row mt-3">
                         <div class="col">
                              <!-- course -->
                              <div class="form-floating">
                                   <select name="apply_course" class="form-select" aria-label="Select course" disabled>
                                             <?php
                                                  $currentCourse = $row['scholar_course'];
                                                  $query = $conn->query("SELECT * FROM tbl_course WHERE course_id = '$currentCourse'");
                                                  $course = $query->fetch_assoc();
                                             ?>
                                             <option value="<?php echo $course['course_id'] ?>" selected>
                                                  <?php 
                                                       $suffix;
                                                       if($course['course_yearlevel'] == '1') {
                                                            $suffix = 'st';
                                                       }
                                                       else if($course['course_yearlevel'] == '2') {
                                                            $suffix = 'nd';
                                                       }
                                                       else if($course['course_yearlevel'] == '3') {
                                                            $suffix = 'rd';
                                                       }
                                                       else {
                                                            $suffix = 'th';
                                                       }
                                                       echo $course['course_name'].' - '.$course['course_yearlevel'].$suffix.' year';
                                                  ?>
                                             </option>
                                   </select>
                                   <label for="apply_course" class="form-label">Course</label>
                              </div>
                         </div>
                    </div>

                    <div class="row d-flex align-items-center flex-nowrap justify-content-between gap-3 mt-5 mb-2 pe-3">
                         <span class="fw-bold w-auto fs-5">Location</span><hr class="m-0">
                    </div>
                    <div class="row">
                         <!-- baranggay -->
                         <div class="col">
                              <div class="form-floating">
                                   <input type="text" class="form-control" name="apply_brgy" placeholder="Brgy. Bigo" required disabled value="<?php echo $row['scholar_brgy'] ?>">
                                   <label for="apply_brgy" class="form-label">Baranggay</label>
                              </div>
                         </div>
                         <!-- municipality -->
                         <div class="col">
                              <div class="form-floating">
                                   <input type="text" class="form-control" name="apply_mnc" placeholder="Kabankalan" required disabled value="<?php echo $row['scholar_muni'] ?>">
                                   <label for="apply_mnc" class="form-label">Municipality</label>
                              </div>
                         </div>
                    </div>

                    <div class="row d-flex align-items-center flex-nowrap justify-content-between gap-3 mt-5 mb-2 pe-3">
                         <span class="fw-bold w-auto fs-5">Biography</span><hr class="m-0">
                    </div>
                    <div class="row">
                         <!-- civil status -->
                         <div class="col">
                              <div class="form-floating">
                                   <select name="apply_cs" class="form-select" aria-label="civil status" disabled>
                                        <option value="<?php echo $row['scholar_civStatus'] ?>" class="text-capitalize" selected><?php echo $row['scholar_civStatus'] ?></option>
                                   </select>
                                   <label for="apply_cs" class="form-label">Civil Status</label>
                              </div>
                         </div>
                         <!-- citizenship -->
                         <div class="col">
                              <div class="form-floating">
                                   <input type="text" class="form-control" name="apply_cz" placeholder="What are you?" required disabled value="<?php echo $row['scholar_citizenship'] ?>">
                                   <label for="apply_cz" class="form-label">Citizenship</label>
                              </div>
                         </div>
                    </div>
                    <div class="row mt-3">
                         <!-- date of birth -->
                         <div class="col-6">
                              <div class="form-floating">
                                   <input type="date" class="form-control" name="apply_date" required disabled value="<?php echo $row['scholar_dob'] ?>">
                                   <label for="apply_date" class="form-label">Date of Birth</label>
                              </div>
                         </div>
                         <!-- age -->
                         <div class="col-2">
                              <div class="form-floating">
                                   <input type="number" class="form-control" name="apply_age" required disabled value="<?php echo $row['scholar_age'] ?>">
                                   <label for="apply_age" class="form-label">Age</label>
                              </div>
                         </div>
                         <!-- gender -->
                         <div class="col-4">
                              <div class="form-floating">
                                   <select name="apply_gd" class="form-select" aria-label="gender" disabled>
                                        <option value="<?php echo $row['scholar_gender'] ?>" class="text-capitalize" selected><?php echo $row['scholar_gender'] ?></option>
                                   </select>
                                   <label for="apply_gd" class="form-label">Gender</label>
                              </div>
                         </div>
                    </div>

                    <div class="row d-flex align-items-center flex-nowrap justify-content-between gap-3 mt-5 mb-2 pe-3">
                         <span class="fw-bold w-auto fs-5">Contacts</span><hr class="m-0">
                    </div>
                    <div class="row">
                         <!-- email address -->
                         <div class="col">
                              <div class="form-floating">
                                   <input type="email" class="form-control" name="apply_em" placeholder="youremail@email.com" required disabled value="<?php echo $row['scholar_email'] ?>">
                                   <label for="apply_em" class="form-label">Email Address</label>
                              </div>
                         </div>
                         <!-- contact num -->
                         <div class="col">
                              <div class="form-floating">
                                   <input type="text" class="form-control" name="apply_cn" placeholder="Contact num" required disabled value="<?php echo $row['scholar_num'] ?>">
                                   <label for="apply_cn">Contact Number</label>
                              </div>
                         </div>
                    </div>

                    <div class="row d-flex align-items-center flex-nowrap justify-content-between gap-3 mt-5 mb-2 pe-3">
                         <span class="fw-bold w-auto fs-5">Family Background</span><hr class="m-0 w-75">
                    </div>
                    <div class="row">
                         <!-- mother maiden name -->
                         <div class="col">
                              <div class="form-floating">
                                   <input type="text" class="form-control" name="apply_mom" placeholder="ur mum" required disabled value="<?php echo $row['sfam_m_name'] ?>">
                                   <label for="apply_mom" class="form-label">Mother's Full Maiden Name</label>
                              </div>
                         </div>
                         <!-- father name -->
                         <div class="col">
                              <div class="form-floating">
                                   <input type="text" class="form-control" name="apply_dad" placeholder="ur dad" required disabled value="<?php echo $row['sfam_f_name'] ?>">
                                   <label for="apply_dad" class="form-label">Father's Full Name</label>
                              </div>
                         </div>
                    </div>
                    <div class="row mt-3">
                         <!-- mother age and occupation -->
                         <div class="col d-flex gap-3">
                              <div class="col-3">
                                   <div class="form-floating">
                                        <input type="number" class="form-control" name="apply_mom_age" placeholder="age" required disabled value="<?php echo $row['sfam_m_age'] ?>">     
                                        <label for="apply_mom_age" class="form-label">Age</label>
                                   </div>
                              </div>
                              <div class="col-8">
                                   <div class="form-floating">
                                        <input type="text" class="form-control text-capitalize" name="apply_mom_occ" placeholder="Write NA if none" required disabled value="<?php echo $row['sfam_m_occupation'] ?>">     
                                        <label for="apply_mom_occ" class="form-label">Occupation</label>
                                   </div>
                              </div>
                         </div>
                         <!-- father age and occupation -->
                         <div class="col d-flex gap-3">
                              <div class="col-3">
                                   <div class="form-floating">
                                        <input type="number" class="form-control" name="apply_dad_age" placeholder="age" required disabled value="<?php echo $row['sfam_f_age'] ?>">     
                                        <label for="apply_dad_age" class="form-label">Age</label>
                                   </div>
                              </div>
                              <div class="col-8">
                                   <div class="form-floating">
                                        <input type="text" class="form-control" name="apply_dad_occ" placeholder="Write NA if none" required disabled value="<?php echo $row['sfam_f_occupation'] ?>">     
                                        <label for="apply_dad_occ" class="form-label">Occupation</label>
                                   </div>
                              </div>
                         </div>
                    </div>
                    <div class="row mt-3">
                         <!-- mother education -->
                         <div class="col">
                              <div class="form-floating">
                                   <select name="apply_mom_edu" class="form-select" aria-label="education attainment" disabled>
                                        <option value="<?php echo $row['sfam_m_eduAttainment'] ?>" class="text-capitalize" selected><?php echo $row['sfam_m_eduAttainment'] ?></option>
                                   </select>
                                   <label for="apply_mom_edu" class="form-label">Education Attainment</label>
                              </div>
                         </div>
                         <!-- father education -->
                         <div class="col">
                              <div class="form-floating">
                                   <select name="apply_dad_edu" class="form-select" aria-label="education attainment" disabled>
                                        <option value="<?php echo $row['sfam_f_eduAttainment'] ?>" class="text-capitalize" selected><?php echo $row['sfam_f_eduAttainment'] ?></option>
                                   </select>
                                   <label for="apply_dad_edu" class="form-label">Education Attainment</label>
                              </div>
                         </div>
                    </div>
                    <div class="row mt-3">
                         <!-- mother address -->
                         <div class="col">
                              <div class="form-floating">
                                   <input type="text" class="form-control" name="apply_mom_adr" placeholder="address" required disabled value="<?php echo $row['sfam_m_address'] ?>">     
                                   <label for="apply_mom_adr" class="form-label">Address</label>
                              </div>
                         </div>
                         <!-- father address -->
                         <div class="col">
                              <div class="form-floating">
                                   <input type="text" class="form-control" name="apply_dad_adr" placeholder="address" required disabled value="<?php echo $row['sfam_f_address'] ?>">     
                                   <label for="apply_dad_adr" class="form-label">Address</label>
                              </div>
                         </div>
                    </div>
                    <div class="row mt-3">
                         <!-- mother contact -->
                         <div class="col">
                              <div class="form-floating">
                                   <input type="text" class="form-control" name="apply_mom_cn" placeholder="contact" required disabled value="<?php echo $row['sfam_m_mobileNum'] ?>">
                                   <label for="apply_mom_cn" class="form-label">Contact Number</label>
                              </div>
                         </div>
                         <!-- father contact -->
                         <div class="col">
                              <div class="form-floating">
                                   <input type="text" class="form-control" name="apply_dad_cn" placeholder="contact" required disabled value="<?php echo $row['sfam_f_mobileNum'] ?>">
                                   <label for="apply_dad_cn" class="form-label">Contact Number</label>
                              </div>
                         </div>
                    </div>
                    <div class="row mt-3">
                         <!-- total income -->
                         <div class="col-8">
                              <div class="form-floating">
                                   <select name="apply_income" class="form-select" aria-label="education attainment" disabled>
                                        <option value="<?php echo $row['sfam_totalSalary'] ?>" selected><?php echo $row['sfam_totalSalary'] ?></option>
                                   </select>
                                   <label for="apply_income" class="form-label">Salary Range</label>
                              </div>
                         </div>
                         <!-- num of siblings -->
                         <div class="col-4">
                              <div class="form-floating">
                                   <input type="number" class="form-control" name="apply_sibling" placeholder="sibling" required disabled value="<?php echo $row['sfam_numSiblings'] ?>">
                                   <label for="apply_sibling" class="form-label">Number of Siblings</label>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
     </div>
</div>

<!-- modal to show appointment schedule and note if there is one -->
<div class="modal fade" id="appointment" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Your Appointment Schedule</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <div class="form-floating">
               <textarea class="form-control" placeholder="Leave a comment here" id="schedule_input" readonly></textarea>
               <label for="schedule_input">Your schedule</label>
          </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="note" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Note</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <div class="form-floating">
               <textarea class="form-control" placeholder="Leave a comment here" id="schedule_input" disabled><?php if(isset($row['scholar_note'])) { echo $row['scholar_note']; } else { echo 'null'; } ?></textarea>
               <label for="schedule_input">Note</label>
          </div>
      </div>
    </div>
  </div>
</div>
<?php
     }
     else {
          echo '
               <div class="d-flex justify-content-center align-items-center mt-5">
                    <h4>You currently don\'t have any application form filled out</h4>
               </div>
          ';
     }
?>