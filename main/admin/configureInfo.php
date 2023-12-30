<?php
require_once '../php/config.php';

$notice_header = $conn->query("SELECT content FROM tbl_noticeinfo WHERE label = 'header'")->fetch_column();
$notice_content = $conn->query("SELECT content FROM tbl_noticeinfo WHERE label = 'body-text'")->fetch_column();

$req_bodyText = $conn->query("SELECT content FROM tbl_reqinfo WHERE label = 'req-body-text'")->fetch_column();
$faq_bodyText = $conn->query("SELECT content FROM tbl_reqinfo WHERE label = 'faq-body-text'")->fetch_column();

$sms_message = $conn->query("SELECT content FROM tbl_sms WHERE label = 'content'")->fetch_column();
?>

<div class="p-3 d-flex flex-column gap-3">
   <div class="card">
      <div class="card-header">
         <i class="bi bi-newspaper me-2"></i>
         Notice Information
      </div>
      <div class="card-body">
         <form id="notice_form" method="post">
            <div class="row g-0 mb-3">
               <div class="">
                  <label for="notice_header" class="form-label">Header</label>
                  <input type="text" class="form-control" name="notice_header" placeholder="name@example.com" value="<?php echo $notice_header; ?>" autocomplete="off">
               </div>
            </div>
            <div class="row g-0 mb-3">
               <div class="">
                  <label for="notice_header" class="form-label">Body</label>
                  <textarea class="form-control" placeholder="something" name="notice_body" style="height: fit-content;"><?php echo $notice_content ?></textarea>
               </div>
            </div>
            <div class="row g-0 justify-content-end gap-2">
               <div class="col-9"></div>
               <div class="col-3">
                  <button type="submit" class="btn btn-success w-100">Save</button>
               </div>
            </div>
         </form>
      </div>
   </div>
   <div class="card">
      <div class="card-header">
         <i class="bi bi-newspaper me-2"></i>
         Requirement Information
      </div>
      <div class="card-body">
         <form id="req_form" method="post">
            <div class="row g-0 mb-3">
               <div class="">
                  <label for="notice_header" class="form-label">Requirements Info</label>
                  <textarea class="form-control" placeholder="something" name="req_info" style="height: fit-content;"><?php echo $req_bodyText ?></textarea>
               </div>
            </div>
            <div class="row g-0 mb-3">
               <div class="">
                  <label for="notice_header" class="form-label">FAQ Info</label>
                  <textarea class="form-control" placeholder="something" name="faq_info" style="height: fit-content;"><?php echo $faq_bodyText ?></textarea>
               </div>
            </div>
            <div class="row g-0 justify-content-end gap-2">
               <div class="col-9"></div>
               <div class="col-3">
                  <button type="submit" class="btn btn-success w-100">Save</button>
               </div>
            </div>
         </form>
      </div>
   </div>
   <div class="card">
      <div class="card-header">
         <i class="bi bi-newspaper me-2"></i>
         SMS Notification for Applicant
      </div>
      <div class="card-body">
         <form id="sms_form" method="post">
            <div class="row g-0 mb-3">
               <div class="">
                  <label for="notice_header" class="form-label">Message content</label>
                  <input class="form-control" placeholder="something" name="sms_info" value="<?php echo $sms_message ?>">
               </div>
            </div>
            <div class="row g-0 justify-content-end gap-2">
               <div class="col-9"></div>
               <div class="col-3">
                  <button type="submit" class="btn btn-success w-100">Save</button>
               </div>
            </div>
         </form>
      </div>
   </div>
</div>

<!-- i don't know why this shit doesn't initialize for the second time but fuck this shit -->
<script>
   tinymce.init({
      selector: "textarea",
      menubar: false,
      resize: false,
      height: 200,
   });
</script>