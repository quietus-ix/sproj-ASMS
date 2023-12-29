<?php
require_once '../php/config.php';

$query = $conn->query(
   "SELECT * FROM tbl_scholar_application as a 
      INNER JOIN tbl_course as b
         ON a.scholar_course = b.course_id
   WHERE scholar_status = 'verified'"
);
?>

<script src="js/scholarList.js"></script>

<div class="p-3">
   <div class="card">
      <div class="card-header d-flex justify-content-between align-items-center">
         Official List of Scholars
         <div class="input-group w-25">
            <span class="input-group-text" id="lbl"><i class="bi bi-search text-dark"></i></span>
            <input type="search" id="scholar_search" class="form-control" placeholder="Search for a scholar" aria-label="UsSearch for a scholarername" aria-describedby="lbl">
         </div>
      </div>
      <div class="card-body">
         <table id="scholars_tbl" class="table table-striped">
            <thead>
               <tr>
                  <th class="w-75">Name</th>
                  <th class="w-25">Course & Year level</th>
               </tr>
            </thead>
            <tbody>
               <?php
               if ($query->num_rows > 0) {
                  while ($r = $query->fetch_assoc()) {
               ?>
                     <tr>
                        <td><?php echo $r['scholar_ln'] . ', ' . $r['scholar_fn'] . ' ' . $r['scholar_mn'] ?></td>
                        <td><?php echo $r['course_name'] ?></td>
                     </tr>
               <?php   }
               } else {
                  echo '<h4>No data to show</h4>';
               }
               ?>
            </tbody>
         </table>
      </div>
   </div>
</div>