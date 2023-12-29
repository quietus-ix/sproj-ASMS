<?php
require_once '../php/config.php';

$notice_header = $conn->query("SELECT content FROM tbl_noticeinfo WHERE label = 'header'")->fetch_column();
$notice_content = $conn->query("SELECT content FROM tbl_noticeinfo WHERE label = 'body-text'")->fetch_column();

$req_bodyText = $conn->query("SELECT content FROM tbl_reqinfo WHERE label = 'req-body-text'")->fetch_column();
$faq_bodyText = $conn->query("SELECT content FROM tbl_reqinfo WHERE label = 'faq-body-text'")->fetch_column();
?>

<script src="js/configureInfo.js"></script>

<div class="p-3">
   <div class="card">
      <div class="card-header">
         <i class="bi bi-newspaper me-2"></i>
         Notice Information
      </div>
      <div class="card-body">
         <form id="notice_form" method="post">
            <div class="row g-0 mb-3">
               <div class="form-floating ">
                  <input type="text" class="form-control" id="notice_header" placeholder="name@example.com" value="<?php echo $notice_header; ?>" disabled>
                  <label for="notice_header">Header</label>
               </div>
            </div>
            <div class="row g-0 mb-3">
               <div class="form-floating">
                  <textarea class="form-control" placeholder="something" name="notice_header" style="height: fit-content;" disabled><?php echo $notice_content ?></textarea>
                  <label for="notice_header">Body</label>
               </div>
            </div>
            <div class="row g-0 justify-content-end gap-2">
               <div class="col-6">

               </div>
               <div class="col-3 w-auto">
                  <button type="submit" id="notice_save" class="btn btn-success invisible">Save</button>
               </div>
               <div class="col-3 w-auto">
                  <button type="button" id="notice_edit" class="btn btn-primary">Edit</button>
               </div>
            </div>
         </form>
      </div>
   </div>
</div>