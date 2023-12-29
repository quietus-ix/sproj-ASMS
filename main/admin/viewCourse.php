<?php
require_once '../php/config.php';

$query = $conn->query("SELECT * FROM tbl_course");
?>

<script src="js/viewCourse.js" type="module"></script>

<div class="d-flex p-3 gap-2">
   <div class="card col-9 p-0">
      <div class="card-header">
         <i class="bi bi-mortarboard-fill me-2"></i>
         Course List
      </div>
      <div class="card-body">
         <table class="table table-striped">
            <thead>
               <tr>
                  <th class="w-75">Course name</th>
                  <th class="w-25">Course levels</th>
               </tr>
            </thead>
            <tbody>
               <?php
               if ($query->num_rows > 0) {
                  while ($r = $query->fetch_assoc()) {
               ?>
                     <tr>
                        <td><?php echo $r['course_name'] ?></td>
                        <td><?php echo $r['course_yearlevel'] ?></td>
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
   <div class="card col-3 p-0">
      <div class="card-header">
         <i class="bi bi-tools me-2"></i>
         Actions
      </div>
      <div class="card-body">
         <div class="row mb-3 g-0">
            <button id="addCourse_btn" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCourse_modal">
               <i class="bi bi-plus-square-fill text-light"></i>
               Add course
            </button>
         </div>
         <div class="row g-0">
            <button id="editCourse_btn" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#editCourse_modal">
               <i class="bi bi-pencil-square text-light"></i>
               Edit course
            </button>
         </div>
      </div>
   </div>
</div>

<div class="modal fade" id="addCourse_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Add a course</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            <form id="addCourse_form" method="post">
               <div class="row g-0">
                  <div class="col-8">
                     <div class="form-floating mb-3 me-2">
                        <input type="text" class="form-control" name="addCourse_name" placeholder="name@example.com">
                        <label for="addCourse_name">Course name</label>
                     </div>
                  </div>
                  <div class="col-4">
                     <div class="form-floating">
                        <input type="number" min="1" max="6" class="form-control" name="addCourse_numYear" placeholder="name@example.com">
                        <label for="addCourse_numYear">Year levels</label>
                     </div>
                  </div>
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Finalize</button>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>

<div class="modal fade" id="editCourse_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit a course</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            <form id="editCourse_form" method="post">
               <div class="row g-0 mb-3">
                  <div class="form-floating">
                     <select class="form-select" id="editCourse_id" name="editCourse_id" aria-label="Floating label select example">
                        <option selected disabled>Select a course</option>
                        <?php
                        $query = $conn->query("SELECT * FROM tbl_course");
                        while ($r = $query->fetch_assoc()) {
                        ?>
                           <option value="<?php echo $r['course_name']; ?>"><?php echo $r['course_name']; ?></option>
                        <?php } ?>
                     </select>
                     <label for="floatingSelect">Course name</label>
                  </div>
               </div>
               <div class="row">
                  <div class="col-8">
                     <div class="form-floating">
                        <input type="text" min="1" max="6" class="form-control" id="editCourse_name" name="editCourse_name" placeholder="name@example.com">
                        <label for="editCourse_name">Course name</label>
                     </div>
                  </div>
                  <div class="col-4">
                     <div class="form-floating">
                        <input type="number" min="1" max="6" class="form-control" name="editCourse_numYear" placeholder="name@example.com">
                        <label for="editCourse_numYear">Year levels</label>
                     </div>
                  </div>
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Finalize</button>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>