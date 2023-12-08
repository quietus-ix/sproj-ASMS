<?php
     require_once '../php/config.php';

     $id = $_POST['id'];

     $query = $conn->query(
          "SELECT * 
          FROM tbl_scholar_application AS a
          INNER JOIN tbl_scholar_family AS b
               ON a.scholar_family = b.sfam_id
          WHERE scholar_id = '$id'"
     );
     $row = $query->fetch_assoc();

     $qsched = $conn->query("SELECT * FROM tbl_schedule");

     if(isset($_POST['badge'])) {
          $badge = $_POST['badge'];

          $updateBadge = $conn->prepare("UPDATE tbl_notification SET notif_new = 0 WHERE notif_id = ?");
          $updateBadge->bind_param('i', $badge);
          $updateBadge->execute();
     }
?>

<div class="d-flex p-3 gap-3">
     <div class="card shadow-sm w-75" style="background-color: #fff;">
          <h5 class="card-header fs-6 d-flex align-items-center">
               <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" class="bi bi-file-earmark-fill me-2" viewBox="0 0 16 16">
                    <path d="M4 0h5.293A1 1 0 0 1 10 .293L13.707 4a1 1 0 0 1 .293.707V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2m5.5 1.5v2a1 1 0 0 0 1 1h2z"/>
               </svg>
               Application Details
          </h5>
          <div class="card-body" style="overflow-y: scroll; overflow-x: hidden; height: 80vh;">
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

     <div class="d-flex flex-column gap-4 w-25">
          <input type="hidden" id="application_id" value="<?php echo $id ?>">
          <div class="d-flex flex-column gap-2">
			<button 
				type="button" 
				id="confirmScholar_btn" 
				class="btn btn-primary
				<?php
					if($row['scholar_status'] === 'approved') {
						echo 'd-block';
					} else {
						echo 'd-none';
					}
				?>"
				data-bs-toggle="modal" 
				data-bs-target="#confirm_modal">
				Confirm Scholar
			</button>

			<button 
				type="button" 
				id="deleteScholar_btn" 
				class="btn btn-danger
				<?php
					if($row['scholar_status'] === 'approved' || $row['scholar_status'] === 'rejected') {
						echo 'd-block';
					} else {
						echo 'd-none';
					}
				?>"
				data-bs-toggle="modal" 
				data-bs-target="#confirm_modal">
				Delete Form
			</button>

               <button 
                    type="button" 
                    id="approve_btn" 
                    class="btn btn-success"
                    <?php
                         if($row['scholar_status'] === 'approved' || $row['scholar_status'] === 'rejected') {
                              echo 'disabled';
                         }
                    ?>>
                    Approve
               </button>
     
               <button 
                    type="button" 
                    id="reject_btn" 
                    class="btn btn-danger"
                    <?php
                         if($row['scholar_status'] === 'approved' || $row['scholar_status'] === 'rejected') {
                              echo 'disabled';
                         }
                    ?>>
                    Reject
               </button>
     
               <button type="button" id="appliBack_btn" class="btn btn-outline-secondary">
                    Back
               </button>
          </div>

          <div class="approve-container d-none flex-column border border-2 rounded p-1">
               <div class="form-floating mb-2">
                    <input type="datetime-local" class="form-control" id="schedule" placeholder="Schedule">
                    <label for="schedule">Assign schedule</label>
               </div>
               <div class="form-floating">
                    <textarea class="form-control" placeholder="Additional note here" id="note" style="height: 15rem"></textarea>
                    <label for="note">Additional Note</label>
               </div>
               <div class="d-flex gap-2 w-100 mt-3">
                    <button type="button" class="btn btn-primary w-75" id="approve_confirm">Confirm</button>
                    <button type="button" class="btn btn-outline-secondary w-25" id="appliCancel">Cancel</button>
               </div>
          </div>

          <div class="reject-container d-none flex-column gap-2 border border-2 rounded p-1">
               <div class="form-floating">
                    <textarea class="form-control" placeholder="Reason for rejection" id="reject_note" style="height: 15rem"></textarea>
                    <label for="floatingTextarea2">Reason</label>
               </div>
               <div class="d-flex gap-2 w-100 mt-3">
                    <button type="button" class="btn btn-danger w-75" id="reject_confirm">Confirm</button>
                    <button type="button" class="btn btn-outline-secondary w-25" id="appliCancel">Cancel</button>
               </div>
          </div>
     </div>
</div>

<!-- modal -->
<div class="modal fade" id="confirm_modal" tabindex="-1" aria-labelledby="confirm_label" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h1 class="modal-title fs-5" id="confirm_label">...</h1>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
			...
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
				<button type="button" id="finalConfirm_btn" class="btn btn-primary" data-bs-dismiss="modal">Yes</button>
			</div>
		</div>
	</div>
</div>
