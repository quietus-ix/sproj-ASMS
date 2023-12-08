<?php
     require_once '../php/config.php';

     $today =  date('Y-m-d');
     $ordering = date('Y-m-d H:i:s');

     // today
     $query = $conn->query("SELECT * FROM tbl_notification WHERE notif_date = '$today' ORDER BY notif_id DESC");
     $getNotif = $query->fetch_assoc();

     // past
     $queryPast = $conn->query("SELECT * FROM tbl_notification WHERE notif_date != '$today' ORDER BY notif_id DESC");
     $getNotifPast = $query->fetch_assoc()
?>

<div class="d-flex flex-column p-3 overflow-y-scroll">
     <div class="d-flex align-items-center w-100 p-2 bg-dark rounded rounded-bottom-0">
          <h5 class="fw-bold text-light m-0">Today</h5>
     </div>
     <div class="d-flex flex-column w-100 border border-dark border-top-0 rounded rounded-top-0 gap-1 p-1">
          <?php
               $header = '';
               $type = '';
               $icon = '';
               if($query->num_rows > 0) {
                    foreach($query as $todayNotif) {
                         if($todayNotif['notif_type'] === '1') {
                              $header = 'There\'s a new scholar application!';
                              $type = 'application';
                              $icon = '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-break-fill" viewBox="0 0 16 16">
                                             <path d="M4 0h5.293A1 1 0 0 1 10 .293L13.707 4a1 1 0 0 1 .293.707V9H2V2a2 2 0 0 1 2-2m5.5 1.5v2a1 1 0 0 0 1 1h2zM2 12h12v2a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2zM.5 10a.5.5 0 0 0 0 1h15a.5.5 0 0 0 0-1z"/>
                                        </svg>';
                         } else if($todayNotif['notif_type'] === '2') {
                              $header = 'Application form updated';
                              $type = 'update';
                              $icon = '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-break-fill" viewBox="0 0 16 16">
                                             <path d="M4 0h5.293A1 1 0 0 1 10 .293L13.707 4a1 1 0 0 1 .293.707V9H2V2a2 2 0 0 1 2-2m5.5 1.5v2a1 1 0 0 0 1 1h2zM2 12h12v2a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2zM.5 10a.5.5 0 0 0 0 1h15a.5.5 0 0 0 0-1z"/>
                                        </svg>';
                         }
          ?>
          <button class="btn btn-light d-flex align-items-center gap-3 border position-relative w-100" id="notif_pane" data-id="<?php echo $todayNotif['notif_id']; ?>" data-ref="<?php echo $todayNotif['notif_ref']; ?>">
               <?php echo $icon; ?>
               <h6 class="card-title fw-bold py-2"><?php echo $header; ?></h6>
               <p class="card-subtitle mb-2 text-body-secondary text-secondary fst-italic" style="margin-bottom: 0 !important;"><?php echo $type; ?></p>
               <?php
                    if($todayNotif['notif_new'] == true) {
                         echo '<span class="badge bg-danger">New</span>';
                    }
               ?>
          </button>
          <?php 
                    }
               } else {
                    echo '<h4 class="w-100 p-3 d-flex justify-content-center">No past notification</h4>';
               }
          ?>
     </div>

     <div class="d-flex align-items-center w-100 p-2 bg-dark rounded rounded-bottom-0 mt-3">
          <h5 class="fw-bold text-light m-0">Past notifications</h5>
     </div>
     <div class="d-flex flex-column w-100 border border-dark border-top-0 rounded rounded-top-0 gap-1 p-1 mh-50">
          <?php
               $header = '';
               $type = '';
               $icon = '';
               if($queryPast->num_rows > 0) {
                    foreach($queryPast as $pastNotif) {
                         if($pastNotif['notif_type'] === '1') {
                              $header = 'There\'s a new scholar application!';
                              $type = 'application';
                              $icon = '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-break-fill" viewBox="0 0 16 16">
                                             <path d="M4 0h5.293A1 1 0 0 1 10 .293L13.707 4a1 1 0 0 1 .293.707V9H2V2a2 2 0 0 1 2-2m5.5 1.5v2a1 1 0 0 0 1 1h2zM2 12h12v2a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2zM.5 10a.5.5 0 0 0 0 1h15a.5.5 0 0 0 0-1z"/>
                                        </svg>';
                         } else if($pastNotif['notif_type'] === '2') {
                              $header = 'Application form updated';
                              $type = 'update';
                              $icon = '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-break-fill" viewBox="0 0 16 16">
                                             <path d="M4 0h5.293A1 1 0 0 1 10 .293L13.707 4a1 1 0 0 1 .293.707V9H2V2a2 2 0 0 1 2-2m5.5 1.5v2a1 1 0 0 0 1 1h2zM2 12h12v2a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2zM.5 10a.5.5 0 0 0 0 1h15a.5.5 0 0 0 0-1z"/>
                                        </svg>';
                         }
          ?>
          <button class="btn btn-light d-flex align-items-center gap-3 border position-relative w-100" id="notif_pane" data-id="<?php echo $pastNotif['notif_id']; ?>" data-ref="<?php echo $pastNotif['notif_ref']; ?>">
               <?php echo $icon; ?>
               <h6 class="card-title fw-bold py-2"><?php echo $header; ?></h6>
               <p class="card-subtitle mb-2 text-body-secondary text-secondary fst-italic" style="margin-bottom: 0 !important;"><?php echo $type; ?></p>
               <?php
                    if($pastNotif['notif_new'] == true) {
                         echo '<span class="badge bg-danger">New</span>';
                    }
               ?>
          </button>
          <?php 
                    }
               } else {
                    echo '<h4 class="w-100 p-3 d-flex justify-content-center">No past notification</h4>';
               }
          ?>
     </div>
</div>