<?php
$message="";
include_once "access-db.php";
if(count($_POST)>0) {
	$result = mysqli_query($conn,"SELECT * FROM tutors WHERE email='" . $_POST["email"] . "' and paswd = '". $_POST["paswd"]."'");
	$count  = mysqli_num_rows($result);
	if($count==0) {
		$message = "Invalid email or password!";
	} else {
        $row = mysqli_fetch_array($result);
        $message = "You are successfully authenticated!";
        $var1=$row['user_id'];
        header('Location: ./tutor-appts.php?user_id=' .$var1);
	}
}
?>

<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../style.css" />
    <script type="text/javascript" src="js/modernizr.custom.86080.js"></script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@500&family=Noto+Serif:wght@700&family=Roboto+Slab:wght@900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Barlow&family=Fredericka+the+Great&family=Noto+Serif&family=Roboto&display=swap" rel="stylesheet">
    <title>UB Tutoring Service</title>
</head>

<body>
    <div class="header">
        <div class="menu_welcomePage">
            <ul>
                <!-- the line of code commented below is important when we upload the work on a server. for now, i'm using an alternative below -->
                <!-- <li><a href="javascript:loadPage('./login.php')">login</a> </li> -->
                <li>
                    <a class="navlink" href="../create-account.html">create account</a> </li>
                <li>
                    <a class="navlink" href="../index.html">home</a> </li>
       

            </ul>
        </div>

        <div class="logo">
            <h2 class="logo"> <a href="../index.html">UBtutoring</a> </h2>
        </div>
    </div>
    <br>
    <hr class="hr-navbar">

    
    <br>
    <br>
    <br>
    <br>
    <div class="modal">
    <h1 class="welcome-page-title modal-title">Tutor Log In</h1>
    <br><br>

    <div id="tutor_signup_div">
        <form name="frmUser" method='post' action="">

        <div class="message">
    
        <?php if($message!="") { 
            echo $message; 
            
            } ?> 
        </div> 
           
            <div class="modal-input">

            <label for="email">User Email</label>
            <input class="log_in_input" type="text" id="email" name="email" placeholder="email" autofocus>

            <label for="password">Password</label>
            <input class="log_in_input" type="password" id="password" name="paswd" placeholder="password">
            
            <input id="log_in_button" name="submit" type="submit" value="Submit">
            <br>
            <br>
            <br>
            <a href="user-forgot.php" id="forgot_link_id"> forgot password? </a>
            <br>
            <br>
            </div>

        </form>
    </div>
    </div>
    
    <!-- <button class="selectButton" onclick="window.location.href = './tutor-signup.php';">Register</button> -->
    <br><br>
    <script src="../index.js"></script>
    
</body>

</html>
