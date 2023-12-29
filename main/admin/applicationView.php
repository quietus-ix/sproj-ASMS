<?php
require_once '../php/config.php';

$query = $conn->query(
   "SELECT * FROM tbl_scholar_application AS a
          INNER JOIN tbl_scholar_family AS b
               ON a.scholar_family = b.sfam_id
          INNER JOIN tbl_course AS c
               ON a.scholar_course = c.course_id
          WHERE scholar_status != 'verified'"
);
?>

<div class="d-flex flex-column p-3 h-100 rounded">

   <table class="table border display hover" id="application_table">
      <thead>
         <tr>
            <th>ID</th>
            <th>Requested by</th>
            <th>Date requested</th>
            <th>Course</th>
            <th>Status</th>
            <th></th>
         </tr>
      </thead>
      <tbody>
         <?php
         foreach ($query as $row) {
         ?>
            <tr class="application-row">
               <td><?php echo $row['scholar_id'] ?></td>
               <td><?php echo $row['scholar_ln'] . ', ' . $row['scholar_fn'] ?></td>
               <td>
                  <?php
                  $appDate = $row['scholar_dateOfReq'];
                  $formatDate = DateTime::createFromFormat('Y-m-d', $appDate);
                  $getDate = $formatDate->format('Y, M, d');
                  echo $getDate;
                  ?>
               </td>
               <td><?php echo $row['course_name'] . ' - ' . $row['course_yearlevel'] ?></td>
               <td class="<?php
                           if ($row['scholar_status'] === 'pending') {
                              echo 'pending';
                           } else if ($row['scholar_status'] === 'approved') {
                              echo 'approved';
                           } else if ($row['scholar_status'] === 'modified') {
                              echo 'modified';
                           } else if ($row['scholar_status'] === 'rejected') {
                              echo 'rejected';
                           }
                           ?>">
                  <?php echo $row['scholar_status'] ?>
               </td>
               <td>
                  <button type="button" id="appDetails_btn" class="btn btn-info text-light" data-id="<?php echo $row['scholar_id'] ?>">Details</button>
               </td>
            </tr>
         <?php } ?>
      </tbody>
      <tfoot>
         <tr>
            <td></td>
            <td>Filters:</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
         </tr>
      </tfoot>
   </table>

</div>