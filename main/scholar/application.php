<!-- 
     this is the application UI. 
     This is loaded in the <main> element inside your index.php file using the application() function inside your script.js file 
-->

<?php
     require_once '../php/config.php';
?>

<div class="p-3">
     <form id="apply_form" class="apply-form d-flex gap-3" method="post">
          <div class="card shadow-sm w-75" style="background-color: #fff;">
               <h5 class="card-header fs-6 d-flex align-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" class="bi bi-file-earmark-fill me-2" viewBox="0 0 16 16">
                         <path d="M4 0h5.293A1 1 0 0 1 10 .293L13.707 4a1 1 0 0 1 .293.707V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2m5.5 1.5v2a1 1 0 0 0 1 1h2z"/>
                    </svg>
                    Scholarship Application Form
               </h5>
               <div class="card-body" style="overflow-y: scroll; height: 81vh;">
                    <h5 class="card-title fw-bold"></h5>
                    <div class="card-text">
                         <div class="row d-flex align-items-center flex-nowrap justify-content-between gap-3 mb-2 pe-3">
                              <span class="fw-bold w-auto fs-5">Name</span><hr class="m-0">
                         </div>
                         <div class="row">
                              <!-- last name -->
                              <div class="col">
                                   <label for="apply_ln" class="form-label">Last</label>
                                   <input type="text" class="form-control" name="apply_ln" placeholder="Malba" required>
                              </div>
                              <!-- first name -->
                              <div class="col">
                                   <label for="apply_fn" class="form-label">First</label>
                                   <input type="text" class="form-control" name="apply_fn" placeholder="Mary Angel" required>
                              </div>
                              <!-- middle name -->
                              <div class="col">
                                   <label for="apply_mn" class="form-label">Middle</label>
                                   <input type="text" class="form-control" name="apply_mn" placeholder="Maque" required>
                              </div>
                              <!-- name extension -->
                              <div class="col-1">
                                   <label for="apply_ext" class="form-label">Ext.</label>
                                   <input type="text" class="form-control" name="apply_ext" placeholder="Jr">
                              </div>
                         </div>
                         <div class="row mt-3">
                              <div class="col">
                                   <!-- course -->
                                   <label for="apply_course" class="form-label">Course</label>
                                   <select name="apply_course" class="form-select" aria-label="Select course">
                                             <?php
                                                  $query = $conn->query("SELECT * FROM tbl_course");

                                                  foreach($query as $row) {
                                             ?>
                                             <option value="<?php echo $row['course_id'] ?>">
                                                  <?php 
                                                       $suffix;
                                                       if($row['course_yearlevel'] == '1') {
                                                            $suffix = 'st';
                                                       }
                                                       else if($row['course_yearlevel'] == '2') {
                                                            $suffix = 'nd';
                                                       }
                                                       else if($row['course_yearlevel'] == '3') {
                                                            $suffix = 'rd';
                                                       }
                                                       else {
                                                            $suffix = 'th';
                                                       }
                                                       echo $row['course_name'].' - '.$row['course_yearlevel'].$suffix.' year';
                                                  ?>
                                             </option>
                                             <?php } ?>
                                   </select>
                              </div>
                         </div>

                         <div class="row d-flex align-items-center flex-nowrap justify-content-between gap-3 mt-5 mb-2 pe-3">
                              <span class="fw-bold w-auto fs-5">Location</span><hr class="m-0">
                         </div>
                         <div class="row">
                              <!-- baranggay -->
                              <div class="col">
                                   <label for="apply_brgy" class="form-label">Baranggay</label>
                                   <input type="text" class="form-control" name="apply_brgy" placeholder="Brgy. Bigo" required>
                              </div>
                              <!-- municipality -->
                              <div class="col">
                                   <label for="apply_mnc" class="form-label">Municipality</label>
                                   <input type="text" class="form-control" name="apply_mnc" placeholder="Kabankalan" required>
                              </div>
                         </div>

                         <div class="row d-flex align-items-center flex-nowrap justify-content-between gap-3 mt-5 mb-2 pe-3">
                              <span class="fw-bold w-auto fs-5">Biography</span><hr class="m-0">
                         </div>
                         <div class="row">
                              <!-- civil status -->
                              <div class="col">
                                   <label for="apply_cs" class="form-label">Civil Status</label>
                                   <select name="apply_cs" class="form-select" aria-label="civil status">
                                        <option value="single" selected>Single</option>
                                        <option value="married">Married</option>
                                        <option value="widowed">Widowed</option>
                                   </select>
                              </div>
                              <!-- citizenship -->
                              <div class="col">
                                   <label for="apply_cz" class="form-label">Citizenship</label>
                                   <input type="text" class="form-control" name="apply_cz" placeholder="What are you?" required>
                              </div>
                         </div>
                         <div class="row mt-3">
                              <!-- date of birth -->
                              <div class="col-6">
                                   <label for="apply_date" class="form-label">Date of Birth</label>
                                   <input type="date" class="form-control" name="apply_date" required>
                              </div>
                              <!-- age -->
                              <div class="col-2">
                                   <label for="apply_age" class="form-label">Age</label>
                                   <input type="number" class="form-control" name="apply_age" required>
                              </div>
                              <!-- gender -->
                              <div class="col-4">
                                   <label for="apply_gd" class="form-label">Gender</label>
                                   <select name="apply_gd" class="form-select" aria-label="gender">
                                        <option value="male" selected>Male</option>
                                        <option value="female">Female</option>
                                   </select>
                              </div>
                         </div>

                         <div class="row d-flex align-items-center flex-nowrap justify-content-between gap-3 mt-5 mb-2 pe-3">
                              <span class="fw-bold w-auto fs-5">Contacts</span><hr class="m-0">
                         </div>
                         <div class="row">
                              <!-- email address -->
                              <div class="col">
                                   <label for="apply_em" class="form-label">Email Address</label>
                                   <input type="email" class="form-control" name="apply_em" placeholder="youremail@email.com" required>
                              </div>
                              <!-- contact num -->
                              <div class="col">
                                   <label for="apply_cn" class="form-label">Contact Number</label>
                                   <input type="text" class="form-control" name="apply_cn" required>
                              </div>
                         </div>

                         <div class="row d-flex align-items-center flex-nowrap justify-content-between gap-3 mt-5 mb-2 pe-3">
                              <span class="fw-bold w-auto fs-5">Family Background</span><hr class="m-0 w-75">
                         </div>
                         <div class="row">
                              <!-- mother maiden name -->
                              <div class="col">
                                   <label for="apply_mom" class="form-label">Mother's Full Maiden Name</label>
                                   <input type="text" class="form-control" name="apply_mom" required>
                              </div>
                              <!-- father name -->
                              <div class="col">
                                   <label for="apply_dad" class="form-label">Father's Full Name</label>
                                   <input type="text" class="form-control" name="apply_dad" required>
                              </div>
                         </div>
                         <div class="row mt-3">
                              <!-- mother age and occupation -->
                              <div class="col d-flex gap-3">
                                   <div class="col-3">
                                        <label for="apply_mom_age" class="form-label">Age</label>
                                        <input type="number" class="form-control" name="apply_mom_age" required>     
                                   </div>
                                   <div class="col-8">
                                        <label for="apply_mom_occ" class="form-label">Occupation</label>
                                        <input type="text" class="form-control" name="apply_mom_occ" placeholder="Write NA if none" required>     
                                   </div>
                              </div>
                              <!-- father age and occupation -->
                              <div class="col d-flex gap-3">
                                   <div class="col-3">
                                        <label for="apply_dad_age" class="form-label">Age</label>
                                        <input type="number" class="form-control" name="apply_dad_age" required>     
                                   </div>
                                   <div class="col-8">
                                        <label for="apply_dad_occ" class="form-label">Occupation</label>
                                        <input type="text" class="form-control" name="apply_dad_occ" placeholder="Write NA if none" required>     
                                   </div>
                              </div>
                         </div>
                         <div class="row mt-3">
                              <!-- mother education -->
                              <div class="col">
                                   <label for="apply_mom_edu" class="form-label">Education Attainment</label>
                                   <select name="apply_mom_edu" class="form-select" aria-label="education attainment">
                                        <option value="none">None</option>
                                        <option value="elementary" selected>Elementary</option>
                                        <option value="high school">High School</option>
                                        <option value="senior high school">Senior High School</option>
                                        <option value="college">College</option>
                                   </select>
                              </div>
                              <!-- father education -->
                              <div class="col">
                                   <label for="apply_dad_edu" class="form-label">Education Attainment</label>
                                   <select name="apply_dad_edu" class="form-select" aria-label="education attainment">
                                        <option value="none">None</option>
                                        <option value="elementary" selected>Elementary</option>
                                        <option value="high school">High School</option>
                                        <option value="senior high school">Senior High School</option>
                                        <option value="college">College</option>
                                   </select>
                              </div>
                         </div>
                         <div class="row mt-3">
                              <!-- mother address -->
                              <div class="col">
                                   <label for="apply_mom_adr" class="form-label">Address</label>
                                   <input type="text" class="form-control" name="apply_mom_adr" required>
                              </div>
                              <!-- father address -->
                              <div class="col">
                                   <label for="apply_dad_adr" class="form-label">Address</label>
                                   <input type="text" class="form-control" name="apply_dad_adr" required>
                              </div>
                         </div>
                         <div class="row mt-3">
                              <!-- mother contact -->
                              <div class="col">
                                   <label for="apply_mom_cn" class="form-label">Contact Number</label>
                                   <input type="text" class="form-control" name="apply_mom_cn" required>
                              </div>
                              <!-- father contact -->
                              <div class="col">
                                   <label for="apply_dad_cn" class="form-label">Contact Number</label>
                                   <input type="text" class="form-control" name="apply_dad_cn" required>
                              </div>
                         </div>
                         <div class="row mt-3">
                              <!-- total income -->
                              <div class="col-8">
                                   <label for="apply_income" class="form-label">Salary Range</label>
                                   <select name="apply_income" class="form-select" aria-label="education attainment">
                                        <option value="below P10 000">Below P10,000</option>
                                        <option value="P11 000 - P30 000">P11 000 - P30 000</option>
                                        <option value="above P50 000">Above P50 000</option>
                                   </select>
                              </div>
                              <div class="col-4">
                                   <label for="apply_sibling" class="form-label">Number of Siblings</label>
                                   <input type="number" class="form-control" name="apply_sibling" required>
                              </div>
                         </div>
                    </div>
               </div>
          </div>

          <!-- form controls -->
          <div class="d-flex flex-column gap-2 w-25">

               <div class="card shadow mb-3">
                    <div class="card-body">
                    Make sure all fields are correct. Administration will review the information you sent for approval
                    </div>
               </div>

               <button type="submit" class="btn btn-primary d-flex align-items-center justify-content-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-file-earmark-check-fill me-2" viewBox="0 0 16 16">
                         <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0M9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1m1.354 4.354-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708.708z"/>
                    </svg>
                    Submit
               </button>

               <button type="reset" class="btn btn-secondary d-flex align-items-center justify-content-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-file-earmark-check-fill me-2" viewBox="0 0 16 16">
                         <path fill-rule="evenodd" d="M8 3a5 5 0 1 1-4.546 2.914.5.5 0 0 0-.908-.417A6 6 0 1 0 8 2z"/>
                         <path d="M8 4.466V.534a.25.25 0 0 0-.41-.192L5.23 2.308a.25.25 0 0 0 0 .384l2.36 1.966A.25.25 0 0 0 8 4.466"/>
                    </svg>
                   Reset
               </button>

               <button type="button" id="apply_back_btn" class="btn btn-outline-secondary d-flex align-items-center justify-content-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-file-earmark-check-fill me-2" viewBox="0 0 16 16">
                         <path fill-rule="evenodd" d="M14.5 1.5a.5.5 0 0 1 .5.5v4.8a2.5 2.5 0 0 1-2.5 2.5H2.707l3.347 3.346a.5.5 0 0 1-.708.708l-4.2-4.2a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 8.3H12.5A1.5 1.5 0 0 0 14 6.8V2a.5.5 0 0 1 .5-.5"/>
                    </svg>
                   Back
               </button>

               <div class="app-art d-flex align-content-end justify-content-center">
                    <img src="../../src/assets/img/illus_01.svg" alt="">
               </div>
          </div>
     </form>
</div>