<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Login</title>

   <link rel="stylesheet" href="../../src/extensions/bootstrap/css/bootstrap.css">
   <link rel="stylesheet" href="style.css">
</head>

<body class="overflow-hidden d-flex justify-content-center align-items-center position-relative">

   <div class="prompt-container-log position-relative z-3 d-flex justify-content-center align-items-center p-4 rounded loginTransitionFX">
      <div class="d-flex flex-column justify-content-center align-items-center">
         <h4 class="logo-header text-center fw-bold">Assistance Scholarship<br>Management System</h4>
         <div class="row mt-2 w-100">
            <div class="col w-50">
               <button type="button" class="btn btn-dark w-100">Login</button>
            </div>
            <div class="col w-50">
               <button type="button" id="reg_prompt_btn" class="btn btn-outline-dark w-100">Register</button>
            </div>
         </div>

         <div class="d-flex">
            <form id="login_form" method="post" class="login-form mt-3">
               <!-- username -->
               <div class="form-floating mb-3 border border-secondary rounded">
                  <input type="text" class="form-control" name="login_username" placeholder="name@example.com" required>
                  <label for="login_username">Username</label>
               </div>
               <!-- password -->
               <div class="form-floating mb-3 border border-secondary rounded">
                  <input type="password" class="form-control" name="login_password" placeholder="name@example.com" required>
                  <label for="login_password">Password</label>
               </div>

               <div class="d-flex justify-content-center w-100 p-0 mt-4">
                  <button type="submit" class="btn btn-dark w-100">Login</button>
               </div>
            </form>
         </div>
      </div>
   </div>

   <div class="body-bg position-absolute z-1 top-0 left-0 w-100 h-100 loginBGFX">
      <img src="../../src/assets/img/bg.jpg" alt="" class="img-fluid">
   </div>
   <div class="body-cover position-absolute z-2 top-0 left-0 w-100 h-100"></div>
   <div class="body-transition-cover position-absolute z-3 top-0 left-0 w-100 h-100 d-flex justify-content-center align-items-center loginFX">
      <img src="../../src/assets/img/logo.png" alt="" style="width: 20rem;">
   </div>

   <script src="../../src/extensions/jquery-up.js"></script>
   <script src="../../src/extensions/popper.js"></script>
   <script src="../../src/extensions/bootstrap/js/bootstrap.js"></script>
   <script src="script.js"></script>
</body>

</html>