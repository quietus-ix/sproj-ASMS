<!-- 
     this is the application UI. 
     This is loaded in the <main> element inside your index.php file using the application() function inside your script.js file 
-->

<?php
     require_once '../php/config.php';
?>

<div class="p-3">
<table class="table table-light table-hover">
  <thead">
    <tr>
      <th scope="col" class="text-bg-primary">Course</th>
      <th scope="col" class="text-bg-primary">year Level</th>
    </tr>
  </thead>
  <tbody>
  <?php
    $query = $conn->query("SELECT * FROM tbl_course");
    while($data = mysqli_fetch_array($query)){
    ?>
    <tr>
      <td><?php echo $data['course_name'] ?></td>
      <td><?php echo $data['course_yearlevel'] ?></td>
    </tr>
    <?php } ?> 
  </tbody>
</table>
</div>