<?php 
require '../php/config.php';
if(isset($_POST["submit"])){
    $fullname = $_POST ["fullname"];
    $username = $_POST ["username"];
    $email = $_POST ["email"];
    $password = $_POST ["password"];
    $confirmpassword = $_POST ["confirmpassword"];
    $userType = $_POST["userType"];
    $duplicate = mysqli_query($conn, "SELECT * FROM tbl_registration WHERE username = '$username' OR email = '$email'");
    if(mysqli_num_rows($duplicate) > 0){
        echo
        " <div class='alert alert-warning' role='alert'> Username or Email Has Already Taken!  </div>";
    }
    else{
        if($password == $confirmpassword){
            $query = ("INSERT INTO tbl_registration(fullname,username,email,password,confirmpassword, user_type) VALUES('$fullname', '$username', '$email', '$password','$confirmpassword', $userType)");
            mysqli_query($conn, $query);
            echo 
           " <div class='alert alert-success' class='alert alert-animated pulse' role='alert'> Successfully Register! <i class='glyphicon glyphicon-ok'></i> </div>";
        }
        else{
            echo
            " <div class='alert alert-warning' class='alert alert-animated pulse' role='alert'> Password Does Not Match! </div>";
        }
    }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>registration</title>
    <link href="../../src/extensions/bootstrap.css" rel="stylesheet">

    <style>
        body{
            margin: 0;
            padding: 0;
            font-family: Arial, Helvetica, sans-serif;
            height: 100vh;
            overflow: auto;
            background-image: url('../../src/assets/img/bg.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;

        }
        .center{
            position: absolute;
            margin: -210px 0 0 0;
            left: 50%;
            transform: translate(-50%,50%);
            width: 400px;
            background: transparent;
            border-radius: 10px;
            box-shadow: 3px 3px 4px 4px black;
            backdrop-filter: blur(20px);
        }
        .center h2{
            text-align: center;
            padding: 0 0 20px 0;
            border-bottom: 1px solid silver;
            text-shadow: 2px 4px 5px black;

        }
        .center form{
            padding: 0 40px;
            box-sizing: border-box;
        }
        form .field{
            position: relative;
            border-bottom: 2px solid #adadad;
            margin: 20px 0;
        }
        .field input{
            width: 100%;
            padding: 0 5px;
            height: 35px;
            font-size: 16px;
            border: none;
            background: none;
            outline: none;
            color: white;
        }
        .field label{
            position: absolute;
            top: 50%;
            left: 1%;
            color: black;
            transform: translateY(-50%);
            font-size: 15px;
            pointer-events: none;
            transition: .5s;
        }
        .field span::before{
            content: '';
            position: absolute;
            top: 35px;
            left: 0;
            width: 100%;
            height: 2px;
            background: white;
        }
        .field input:focus ~ label,
        .field input:valid ~ label{
            top: -5px;
            color: silver;

        }
        .field input:focus ~ span::before,
        .field input:valid ~ span::before{
            width: 100%;

        }
        .button [type="submit"]{
            width: 50%;
            height: 50px;
            border: 1px solid;
            background: #2691d9;
            border-radius: 25px;
            font-size: 18px;
            color: #e9f4fb;
            font-weight: 700;
            cursor: pointer;
            outline: none;
            
        }
        .login{
            text-align: center;
            margin:-51px 0 40px 0px;
            font-size: 20px;
            color: #2691d9;
            border: 2px solid;
            border-radius: 10px;
            width: 127px;
            width: 50%;
            height: 50px;
            border-radius: 25px;
            float: right;
        }
        h2{
            color: white;
        }
        p{
            color: white;
            margin: 0;
            background: #2691d9;
            border: 1px solid white;
            border-radius: 8px;
            width: 101%;
            height: 50px;
            border-radius: 25px;
            padding: 10px;
            font-size: 18px;
        }
        .alert-success {
        color: #155724;
        background-color: #d4edda;
        border-color: #c3e6cb;
        }
        .alert {
        position: relative;
        padding: 0.75rem 1.25rem;
        border: 1px solid transparent;
        border-radius: 0.25rem;
        width: 50%;
        margin: 35px 0 0 330px;
        height: 10%;
        font-size: 20px;
        text-align: center;
        padding: 20px 0 0 0;
        box-sizing: border-box;
        border-radius: 10px;
        }
        .alert-warning {
        color: #856404;
        background-color: #fff3cd;
        border-color: #ffeeba;
        }
        #s{
            width: 100%;
            padding: 0 5px;
            height: 35px;
            font-size: 16px;
            border: none;
            background: none;
            outline: none;
            color: black;
            font-weight: bold;
            border-bottom: 1px solid white;
        }
        
        
     

        
    
    </style>
</head>
<body>
    <div class="center">
    <h2>Sign Up</h2>
    <form class="f" action="" method="post" autocomplete="off">
        <div class="field">
    <input type="text" name="fullname" id="fullname" required values=""> 
    <span> </span>
    <label for="fullname"> Full name: </label>
    </div>
    <div class="field">
    <input type="text" name="username" id="username" required values=""> 
    <span> </span>
    <label for="username"> Username: </label>
    </div>
    <div class="field">
    <input type="email" name="email" id="email" required values=""> 
    <span> </span>
    <label for="email"> Email: </label>
    </div>
    <div class="field">
    <input type="password" name="password" id="password" required values="">
    <span> </span>
    <label for="password"> Password: </label>
    </div>
    <div class="field">
    <input type="password" name="confirmpassword" id="confirmpassword" required values="">
    <span> </span>
    <label for="confirmpassword"> Confirm Password: </label>
    </div>
    <div class="field">
        <select name="userType" id="s">
            <option value="1">Select user type</option>
            <option value="1">Admin</option>
            <option value="2">Student</option>
        </select>
        <script>
            // $(document).ready(()=>{

            //     $('.f').submit((e)=>{
            //         e.preventDefault();

            //         var x = $('#s').val();
            //         alert(x);
            //     });
            // });
        </script>
    </div>
    <div class="button"> 
    <button type="submit" name="submit">Register</button>
    </div>
<div class="login">
<a href="../login/index.php"><b><p>Login</p></b></a>
    </div>
    </form>
    </div>

    <script src="../../src/extensions/jquery-up.js"></script>
    <script src="../../src/extensions/bootstrap.js"></script>
    
</body>
</html>