<!-- TODO: this 
     
     # plans
          - basically, this will display all the application forms that the user has sent so that the ADMIN can review it
          - what displayed in the application forms table depends on what filter is selected:
               - e.g. pending application forms only shows pendi- you get the point.
               - holy brocolli i need to stop being overspecific
          - the row has the following display:
               - application form id
               - application recepient
               - application status
               - dropdown element
          - admin has the following controls:
               - row clicked: shows the information of the application form
               - dropdown action:
                    - approve
                         - opens a modal to give the approved form a schedule and an additional note
                         - sends an SMS notification to the user (API)
                    - reject
                         - opens a modal to send a note about the reason why the form is rejected
                    - concluded (?) i dunno the term
-->

<?php
     require_once '../php/config.php';

     $query = $conn->query(
          "SELECT * FROM tbl_scholar_application AS a
          INNER JOIN tbl_scholar_family AS b
               ON a.scholar_family = b.sfam_id
          INNER JOIN tbl_course AS c
               ON a.scholar_course = c.course_id"
     );
?>

<div class="d-flex flex-column p-3 h-100">

     <table class="table border display compact hover rounded" id="application_table">
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
                    foreach($query as $row) {
               ?>
               <tr class="application-row">
                    <td><?php echo $row['scholar_id'] ?></td>
                    <td><?php echo $row['scholar_ln'].', '.$row['scholar_fn'] ?></td>
                    <td>
                         <?php 
                              $appDate = $row['scholar_dateOfReq'];
                              $formatDate = DateTime::createFromFormat('Y-m-d', $appDate);
                              $getDate = $formatDate->format('Y, M, d');
                              echo $getDate;
                         ?>
                    </td>
                    <td><?php echo $row['course_name'].' - '.$row['course_yearlevel'] ?></td>
                    <td class="
                         <?php 
                              if($row['scholar_status'] === 'pending') {
                                   echo 'text-info-emphasis';
                              } else if($row['scholar_status'] === 'approved') {
                                   echo 'text-success-emphasis';
                              } else if($row['scholar_status'] === 'modified') {
                                   echo 'text-warning-emphasis';
                              } else if($row['scholar_status'] === 'rejected') {
                                   echo 'text-danger-emphasis';
                              }
                         ?>
                         "
                    >
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