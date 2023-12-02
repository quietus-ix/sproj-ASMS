<?php

require '../php/config.php';

if(isset($_POST["submit"])){
    $usernameemail = $_POST["usernameemail"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM tbl_registration WHERE username = '$usernameemail' OR email = '$usernameemail'");
    $row = mysqli_fetch_assoc($result);
    if(mysqli_num_rows($result) > 0){
        if($password == $row["password"]){
            $_SESSION["login"] = true;
            $_SESSION["id"] = $row["id"];

            if($row['user_type'] === '2') {
                header("Location: index.php");
            }
            else if ($row['user_type'] === '1') {
                header("Location: ../admin/index.php");
            }            
        }
        else{
            echo
            "<script> alert('Wrong Password'); </script>";
        }

    }
    else{
        echo
        "<script> alert('User Not Registered'); </script>";
    }
   

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="../../src/extensions/bootstrap.css" rel="stylesheet">

    <style>
        body{
            margin: 0;
            padding: 0;
            font-family: Arial, Helvetica, sans-serif;
            height: 100vh;
            overflow: hidden;
            background-image: url('../../src/assets/img/bg.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
         

        }
        .center{
            position: absolute;
            margin: -150px 0 0 0;
            left: 50%;
            transform: translate(-50%,50%);
            width: 500px;
            height: 465px;
            background: transparent;
            border-radius: 10px;
            box-shadow: 3px 3px 4px 4px black;
            backdrop-filter: blur(20px);
        }
        .center h2{
            text-align: center;
            padding: 0 0 20px 0;
            border-bottom: 1px solid silver;
            color: white;
            text-shadow: 2px 3px 3px black;

        }
        .center form{
            padding: 0 40px;
            box-sizing: border-box;
        }
        form .field{
            position: relative;
            border-bottom: 2px solid #adadad;
            margin: 40px 0;
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
            color: white;
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
            color: black;
        }
        .field input:focus ~ span::before,
        .field input:valid ~ span::before{
            width: 100%;

        }
        .button [type="submit"]{
            width: 100%;
            height: 50px;
            border: 1px solid;
            background: #2691d9;
            border-radius: 25px;
            font-size: 18px;
            color: #e9f4fb;
            font-weight: 700;
            cursor: pointer;
            outline: none;
            margin: 20px 0 30px 0;
        }
        .rem{
            font-size: .9em;
            color: black;
            font-weight: bold;
            margin: -15px 0 15px;
            display: flex;
            justify-content: space-between;
            font-size: 15px;
        }
        .rem label input{
            accent-color: black;
            margin-right: 3px;
            margin-top: -10px;
        }
        .rem a{
            color: #5fb6f3;
          
        }
        .rem a:hover{
            text-decoration: underline;
        }
        .log-reg{
            font-size: .9em;
            color: white;
            text-align: center;
            font-weight: 500;
            margin: 15px 0 10px;
            font-size: 15px;
        }
        .log-reg p a{
            color: #5fb6f3;
            text-decoration: none;
            font-weight: bold;
        }
        .log-register p a:hover{
            text-decoration: underline;
            font-weight: bold;
        }
        </style>
</head>
<body>
    <div class="center"> 
    <h2>Login</h2>
    <form action="" method="post" autocomplete="off">
        <div class="field">
        <input type="text" name="usernameemail" id="usernameemail" required value="">
        <span> </span>
        <label for="usernameemail"> Username or Email: </label> 
        </div>
        <div class="field">
        <input type="password" name="password" id="password" required value="">
        <span> </span>
        <label for="password"> Password: </label> 
        </div>
        <div class="rem">
            <label> <input type="checkbox"> Remember Me </label>
        <a href="#"> Forgot Password? </a>
    </div>
             <div class="button">
        <button type="submit" name="submit">Login</button>
        <div class="log-reg">
            <p>  Don't have an account? <a href="registration.php" class="reg-link"> Register </a></p>  
        </div> 
    </div>

    </form>
   <div class="register">
    <a href="registration.php"></a>
    </div>
</div>

    <script src="../../src/extensions/jquery-up.js"></script>
    <script src="../../src/extensions/bootstrap.js"></script>
    
</body>
</html>"