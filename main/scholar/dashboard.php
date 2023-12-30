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
            <i class="bi bi-newspaper me-2"></i>
            Notice
         </h5>
         <div class="card-body">
            <h5 class="card-title fw-bold">
               <?php
               $query = $conn->query("SELECT content FROM tbl_noticeinfo WHERE label = 'header'")->fetch_column();
               echo $query;
               ?>
            </h5>
            <p class="card-text">
               <?php
               $query = $conn->query("SELECT content FROM tbl_noticeinfo WHERE label = 'body-text'")->fetch_column();
               echo $query;
               ?>
            </p>
            <div class="d-flex gap-3">
               <button type="button" id="apply_btn" class="btn btn-primary d-flex align-items-center">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-plus-fill me-2" viewBox="0 0 16 16">
                     <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0M9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1M8.5 7v1.5H10a.5.5 0 0 1 0 1H8.5V11a.5.5 0 0 1-1 0V9.5H6a.5.5 0 0 1 0-1h1.5V7a.5.5 0 0 1 1 0" />
                  </svg>
                  Apply for scholarship
               </button>
               <button type="button" id="viewApply_btn" class="btn btn-primary d-flex align-items-center">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-plus-fill me-2" viewBox="0 0 16 16">
                     <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0M9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1M3 9h10v1H6v2h7v1H6v2H5v-2H3v-1h2v-2H3z" />
                  </svg>
                  View your application
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
                  <i class="bi bi-hourglass-split fs-2"></i>
               </h5>
               <p class="card-text fw-bold fs-4">
                  <?php
                  $query = $conn->query("SELECT COUNT(scholar_status) FROM tbl_scholar_application WHERE scholar_status = 'pending'");
                  $count = $query->fetch_column();

                  if ($count > 0) {
                     echo $count;
                  } else {
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
                  <i class="bi bi-person-fill-check fs-2"></i>
               </h5>
               <p class="card-text fw-bold fs-4">
                  <?php
                  $query = $conn->query("SELECT COUNT(scholar_status) FROM tbl_scholar_application WHERE scholar_status = 'approved'");
                  $count = $query->fetch_column();

                  if ($count > 0) {
                     echo $count;
                  } else {
                     echo 0;
                  }
                  ?>
               </p>
            </div>
         </div>
         <div class="card shadow-sm" style="width: 15rem;">
            <div class="card-body d-flex flex-column">
               <h5 class="fw-medium fs-6 d-flex align-items-center justify-content-between">
                  Official Scholars
                  <i class="bi bi-bookmark-star-fill fs-2"></i>
               </h5>
               <p class="card-text fw-bold fs-4">
                  <?php
                  $query = $conn->query("SELECT COUNT(scholar_status) FROM tbl_scholar_application WHERE scholar_status = 'verified'");
                  $count = $query->fetch_column();

                  if ($count > 0) {
                     echo $count;
                  } else {
                     echo 0;
                  }
                  ?>
               </p>
            </div>
         </div>
      </div>

      <div class="card shadow-sm mt-3" style="background-color: #fff;">
         <h5 class="card-header fs-6 d-flex align-items-center">
            <i class='bi bi-file-earmark-check-fill me-2'></i>
            Requirements
         </h5>
         <div class="card-body">
            <div class="card-text">
               <div class="accordion accordion-flush" id="accordionFlushExample">
                  <div class="accordion-item">
                     <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                           <i class="bi bi-backpack2-fill me-3"></i>
                           Requirements for students
                        </button>
                     </h2>
                     <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                           <?php
                           $query = $conn->query("SELECT content FROM tbl_reqinfo WHERE label = 'req-body-text'")->fetch_column();
                           echo $query;
                           ?>
                        </div>
                     </div>
                  </div>
                  <div class="accordion-item">
                     <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                           <i class="bi bi-question-square-fill me-3"></i>
                           Help
                        </button>
                     </h2>
                     <div id="flush-collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                           <?php
                           $query = $conn->query("SELECT content FROM tbl_reqinfo WHERE label = 'faq-body-text'")->fetch_column();
                           echo $query;
                           ?>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>

   <div class="secondary-section w-25">
      <div class="card shadow-sm" style="background-color: #fff;">
         <h5 class="card-header fs-6 d-flex align-items-center">
            <i class="bi bi-backpack2-fill me-2"></i>
            Available Courses
         </h5>
         <div class="card-body">
            <div class="card-text d-flex flex-column">
               <input class="form-control mb-1" id="course_search" type="search" placeholder="Search course">
               <table id="course_tbl" class="table table-striped">
                  <thead>
                     <th></th>
                  </thead>
                  <tbody>
                     <?php
                     $q = $conn->query("SELECT * FROM tbl_course");
                     if ($q->num_rows > 0) {
                        while ($r = $q->fetch_assoc()) {
                     ?>
                           <tr>
                              <td><?php echo $r['course_name'] ?></td>
                           </tr>
                     <?php }
                     }
                     ?>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
</div>