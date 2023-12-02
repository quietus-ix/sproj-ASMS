<!-- 
     this is the dashboard. 
     This is loaded in the <main> element inside your index.php file using the dashboard() function inside your script.js file 
-->

<?php
     require_once '../php/config.php';
?>

<div class="d-flex p-3 gap-3">
     <div class="primary-section w-75 d-flex flex-column">
          <!-- welcome card -->
          <div class="card shadow-sm" style="background-color: #fff;">
               <h5 class="card-header fs-6 d-flex align-items-center">
                    <i class='bx bx-calendar-exclamation me-2' ></i>
                    Notice
               </h5>
               <div class="card-body">
                    <h5 class="card-title fw-bold">Welcome to Assistance Scholarship Management System</h5>
                    <p class="card-text">
                         Before applying for our Assistance Scholarship Program, make sure that all information you provided is correct.
                         This information will be verified once your application is approved and you were given a schedule.
                         <br>
                         <br>
                         <strong>The administration is advised to deny any application that is inappropriate/UwU</strong>
                    </p>
                    <div class="d-flex gap-3">
                         <button type="button" id="apply_btn" class="btn btn-primary d-flex align-items-center">
                              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-plus-fill me-2" viewBox="0 0 16 16">
                                   <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0M9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1M8.5 7v1.5H10a.5.5 0 0 1 0 1H8.5V11a.5.5 0 0 1-1 0V9.5H6a.5.5 0 0 1 0-1h1.5V7a.5.5 0 0 1 1 0"/>
                              </svg>
                              Apply for scholarship
                         </button>
                         <button type="button" id="viewApply_btn" class="btn btn-primary d-flex align-items-center">
                              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-plus-fill me-2" viewBox="0 0 16 16">
                                   <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0M9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1M3 9h10v1H6v2h7v1H6v2H5v-2H3v-1h2v-2H3z"/>
                              </svg>
                              View your application
                         </button>
                         <button type="button" id="howto_btn" class="btn btn-outline-secondary d-flex align-items-center">
                              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-plus-fill me-2" viewBox="0 0 16 16">
                                   <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm3.496 6.033a.237.237 0 0 1-.24-.247C5.35 4.091 6.737 3.5 8.005 3.5c1.396 0 2.672.73 2.672 2.24 0 1.08-.635 1.594-1.244 2.057-.737.559-1.01.768-1.01 1.486v.105a.25.25 0 0 1-.25.25h-.81a.25.25 0 0 1-.25-.246l-.004-.217c-.038-.927.495-1.498 1.168-1.987.59-.444.965-.736.965-1.371 0-.825-.628-1.168-1.314-1.168-.803 0-1.253.478-1.342 1.134-.018.137-.128.25-.266.25h-.825zm2.325 6.443c-.584 0-1.009-.394-1.009-.927 0-.552.425-.94 1.01-.94.609 0 1.028.388 1.028.94 0 .533-.42.927-1.029.927z"/>
                              </svg>
                              How to apply
                         </button>
                    </div>
               </div>
          </div>
          
          <!-- counter cards -->
          <div class="counters d-flex mt-2 justify-content-between">
               <div class="card shadow-sm" style="width: 25rem;">
                    <div class="card-body d-flex flex-column">
                         <h5 class="fw-medium fs-6 d-flex align-items-center justify-content-between">
                              Waiting Scholars
                              <i class='bx bxs-graduation fs-2'></i>
                         </h5>
                         <p class="card-text fw-bold fs-4">
                              <?php
                                   $query = $conn->query("SELECT COUNT(scholar_status) FROM tbl_scholar_application WHERE scholar_status = 'pending'");
                                   $count = $query->fetch_column();

                                   if($count > 0) {
                                        echo $count;
                                   }
                                   else {
                                        echo 0;
                                   }
                              ?>
                         </p>
                    </div>
               </div>
               <div class="card shadow-sm" style="width: 18rem;">
                    <div class="card-body d-flex flex-column">
                         <h5 class="fw-medium fs-6 d-flex align-items-center justify-content-between">
                              Approved Scholars
                              <i class='bx bxs-book-heart fs-2'></i>
                         </h5>
                         <p class="card-text fw-bold fs-4">
                              <?php
                                   $query = $conn->query("SELECT COUNT(scholar_status) FROM tbl_scholar_application WHERE scholar_status = 'approved'");
                                   $count = $query->fetch_column();

                                   if($count > 0) {
                                        echo $count;
                                   }
                                   else {
                                        echo 0;
                                   }
                              ?>
                         </p>
                    </div>
               </div>
               <div class="card shadow-sm" style="width: 15rem;">
                    <div class="card-body d-flex flex-column">
                         <h5 class="fw-medium fs-6 d-flex align-items-center justify-content-between">
                              Open Slots
                              <i class='bx bxs-briefcase-alt-2 fs-2'></i>
                         </h5>
                         <p class="card-text fw-bold fs-4">0</p>
                    </div>
               </div>
          </div>

          <!-- graph -->
     </div>

     <div class="secondary-section w-25">
          <div class="card shadow-sm" style="background-color: #fff;">
               <h5 class="card-header fs-6 d-flex align-items-center">
                    <i class='bx bxs-news me-2' ></i>
                    Updates
               </h5>
               <div class="card-body">
                    <div class="card-text d-flex flex-column gap-2">
                         <div class="card mb-3 border-0 border-start rounded-0" style="max-width: 540px;">
                              <div class="row g-0">
                                   <div class="col-md-4">
                                        <img src="..." class="img-fluid rounded-start" alt="...">
                                   </div>
                                   <div class="col-md-8">
                                        <div class="card-body">
                                             <h5 class="card-title">News title</h5>
                                             <p class="card-text"><small class="text-body-secondary">3 mins ago</small></p>
                                        </div>
                                   </div>
                              </div>
                         </div>
                         <div class="card mb-3 border-0 border-start rounded-0" style="max-width: 540px;">
                              <div class="row g-0">
                                   <div class="col-md-4">
                                        <img src="..." class="img-fluid rounded-start" alt="...">
                                   </div>
                                   <div class="col-md-8">
                                        <div class="card-body">
                                             <h5 class="card-title">News title</h5>
                                             <p class="card-text"><small class="text-body-secondary">3 mins ago</small></p>
                                        </div>
                                   </div>
                              </div>
                         </div>
                         <div class="card mb-3 border-0 border-start rounded-0" style="max-width: 540px;">
                              <div class="row g-0">
                                   <div class="col-md-4">
                                        <img src="..." class="img-fluid rounded-start" alt="...">
                                   </div>
                                   <div class="col-md-8">
                                        <div class="card-body">
                                             <h5 class="card-title">News title</h5>
                                             <p class="card-text"><small class="text-body-secondary">3 mins ago</small></p>
                                        </div>
                                   </div>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
     </div>
</div>