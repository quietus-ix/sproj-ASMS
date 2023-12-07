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
?>
<?php
     include("applicationModals.php");
?>
<div class="d-flex flex-column p-3">

     <table class="table" id="application_table">
          <thead>

               <tr>
                    <td>Application ID</td>
                    <td>Application Recepient</td>
                    <td>Application Status</td>
                    <td>Action</td>
               </tr>
          </thead>
          <tbody>
               <?php
                    $sql = "SELECT * FROM tbl_scholar_application INNER JOIN  tbl_user ON tbl_scholar_application.scholar_reqBy = tbl_user.user_id";
                    $result = $conn->query($sql);
                    if($result->num_rows > 0){
                         while($row = $result->fetch_assoc()){   
               ?>
                    <tr>
                         <td><?php echo $row['scholar_id'] ?></td>
                         <td><?php echo $row['user_fullname'] ?></td>
                         <td><?php echo $row['scholar_civStatus'] ?></td>
                         <td>
                              <div class="dropdown">
                                   <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                   Select
                                   </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                             <li>
                                                  <button type="button" class="btn btn-primary dropdown-item" data-bs-toggle="modal" data-bs-target="#approveModal">
                                                  Approve
                                                  </button>
                                             </li>
                                             <li>
                                                  <button type="button" class="btn btn-primary dropdown-item" data-bs-toggle="modal" data-bs-target="#rejectModal">
                                                  Reject
                                                  </button>
                                             </li>
                                        </ul>
                              </div>
                         </td>
                    </tr>
               <?php 
                    }
                    }
               ?>
          </tbody>
     </table>

</div>