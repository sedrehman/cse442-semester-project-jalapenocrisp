<?php
$message="";add external php file to html
if(count($_POST)>0) {
	//change the local host to thethys and the db schema name
	$conn = mysqli_connect("localhost","root","","phppot_examples");
	$result = mysqli_query($conn,"SELECT * FROM tutors WHERE email='" . $_POST["user_email"] . "' and paswd = '". $_POST["user_password"]."'");
	$count  = mysqli_num_rows($result);
	if($count==0) {
		$message = "Invalid Username or Password!";
	} else {
		$message = "You are successfully authenticated!";
	}
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css" />
    <title>UB Tutoring -Log In</title>

</head>

<body>
    <div class="header">
        <div class="menu_welcomePage">
            <ul>
                <!-- the line of code commented below is important when we upload the work on a server. for now, i'm using an alternative below -->
                <!-- <li><a href="javascript:loadPage('./login.html')">login</a> </li> -->
                <li><a href="./login.html">login</a> </li>
                <li>
                    <a href="./index.html">home</a> </li>
                <li>create account</li>
            </ul>
        </div>

        <div class="logo">
            <h2 class="logo"> <a href="./index.html">UBtutoring</a> </h2>
        </div>
    </div>
    <button class="selectButton" onclick ="window.location.href = './tutor_signup.html';">Not Registered? Sign Up Here.</button>

    <h1 class="welcome-page-title">Log In</h1>

    <div id="tutor_signup_div">
        <form name="login_user" action="" method='post'>
            
            <label for="email">User Email</label>
            <input class= "log_in_input" type="text" id="email" name="user_email" placeholder="Enter @buffalo.edu email...">

            <label for="password">Password</label>
            <input class= "log_in_input" type="password" id="password" name="user_password">

            <input type="button" id="log_in_button" type="submit" value="Log In" onclick= "log_me_in()">
            <br>
            <br>
            <br>
            <a href="user_forgot.html" id="forgot_link_id"> forgot password? </a>
        </form>
    </div>
    <script src="index.js"></script>
</body>
</html>