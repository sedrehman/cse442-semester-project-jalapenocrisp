<?php
include_once "access-db.php";
$message="";

if(count($_POST)>0) {
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $email=$_POST['email'];                     
    $pass=$_POST['paswd'];
    $uid=$_GET['user_id'];
    $pass2=$_POST['paswd2'];

    if(!preg_match('(^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$)', $pass)){
        $message="Please enter a valid password.";
    }else if ($pass!=$pass2){
        $message="Passwords do not match";
    }else{
        mysqli_query($conn,"UPDATE students SET paswd='" . $_POST['paswd'] . "' WHERE user_id='" . $_GET['user_id'] . "'"); 
        header('Location: ./login-student.php');    
    }


}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content ="width=device-width,initial-scale=1,user-scalable=yes" />
    <title>UB Tutoring</title>
    <link rel="stylesheet" type="text/css" href="../style.css" />
    <script type="text/javascript" src="js/modernizr.custom.86080.js"></script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@500&family=Noto+Serif:wght@700&family=Roboto+Slab:wght@900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Barlow&family=Fredericka+the+Great&family=Noto+Serif&family=Roboto&display=swap" rel="stylesheet">
</head>
<body>
<div class="header">
        <div class="menu_welcomePage">
            <ul>
                <li><a class="navlink" href="../index.html">home</a> </li>

            </ul>
        </div>

        <div class="logo">
            <h2 class="logo"> <a href="../index.html">UBtutoring</a> </h2>
        </div>
    </div>
    <hr class="hr-navbar">

<h1 class="modal-title welcome-page-title">Password Reset</h1>
    
    
    <div id="tutor_signup_div">
    <form class = "info1" name="frmUser" method="post" action="">
    <div class="modal-input">

    <div class="message"><?php if(isset($message)) { echo $message; } ?>
        </div>
        <div style="padding-bottom:5px;">
    </div>
        Password:<br>
        <label>Requires at least 8 characters, 1 uppercase, 1 lowercase, 1 special character and 1 number.</label>
        <input type="password" name="paswd" class="log_in_input" placeholder="password" autofocus>
        <br>
        <br>
        Confirm password:<br>
        <input type="password" name="paswd2" class="log_in_input" placeholder="confirm password" autofocus>
        <br>
        <br>
        <input id="tutor_signup_submit" type="submit" name="submit" value="Save" class="button">
</div>
    </form>
</div>