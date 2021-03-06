<?php

$message="";
include_once "access-db.php";


if(count($_POST)>0){

    $Languages = $_POST['Languages'];
    $Leadership = $_POST['Leadership'];
    $Topics = $_POST['Topics'];

    if(empty($Languages) && (empty($Topics) && (empty($Leadership)))){
	$message="Please enter a skill for at least one category!"; 
    }else if(strlen($Languages) > 100 || strlen($Leadership) > 100 || strlen($Topics) > 100){
    	   $message = "Enter info up to 100 characters!";
    }else{
	if(empty($Languages) == false){
	     mysqli_query($conn,"UPDATE tutors SET bio_languages='" . $Languages . "' WHERE user_id='" . $_GET['user_id'] . "'");
	     $message = "Languages added successfully!";	
	}else{
	     $Languages = null;
	      mysqli_query($conn,"UPDATE tutors SET bio_languages='" . $Languages . "' WHERE user_id='" . $_GET['user_id'] . "'");
	}
	
	if(empty($Leadership) == false){
             mysqli_query($conn,"UPDATE tutors SET bio_leadership='" . $Leadership . "' WHERE user_id='" . $_GET['user_id'] . "'");
	     $message = "Leadership added successfully!";
	}else{
	     $Leadership = null;
	     mysqli_query($conn,"UPDATE tutors SET bio_leadership='" . $Leadership . "' WHERE user_id='" . $_GET['user_id'] . "'");
	}
	
	if(empty($Topics) == false){
             mysqli_query($conn,"UPDATE tutors SET bio_topics='" . $Topics . "' WHERE user_id='" . $_GET['user_id'] . "'");
	     $message = "Topics added successfully!";
	}else{
	     $Topics = null;
	     mysqli_query($conn,"UPDATE tutors SET bio_topics='" . $Topics . "' WHERE user_id='" . $_GET['user_id'] . "'");
	}
     	
    }   
    header('Location: ./tutorprof.php?user_id=' . $_GET["user_id"]);     

}

$result = mysqli_query($conn,"SELECT * FROM tutors WHERE user_id='" . $_GET['user_id'] . "'");
$row = mysqli_fetch_array($result);

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
    
    <title>UB Tutoring Service</title>
</head>

<body class="main-container">

    <div class="header">

        <div class="menu_welcomePage">
            <ul>
            <li><a class="navlink" href="./tutorCalendarView.php?user_id=<?php echo $_GET['user_id']; ?>">set availability</a> </li>
                <li><a class="navlink" href="./tutor-appts.php?user_id=<?php echo $_GET['user_id']; ?>">appointments</a> </li>
                <li><a class="navlink" href="./tutorprof.php?user_id=<?php echo $_GET['user_id']; ?>">profile</a> </li>
                <li><a class="navlink" href="../index.html">logout</a> </li>

            </ul>
        </div>

        <div class="logo">
            <h2 class="logo"> <a href="../index.html">UBtutoring</a> </h2>
        </div>

    </div>
    <hr class="hr-navbar">
    <br>
    <br>
    <br>
    <br>
    <div class="modal">

    <h1 class="modal-title welcome-page-title">Personalize Your Bio</h1>
    <p>[Text limit for each field is 100 characters]</p>
   <?php if(isset($message)) { echo $message; } ?>

   <form method="post" class="info1" action="">
    <div class="modal-input">
	   <label>Leadership Skills or Activities</label>
	   <input class="sign_up_input" type="text" id="Leadership" name="Leadership">
	   <br><br>
	   <label>Coding Languages You're Skilled in</label>
	   <input class="sign_up_input" type="text" id="Languages" name="Languages">
	   <br><br>
	   <label>Topics You're Strong In [For the Course You're Tutoring]</label>
	   <input class="sign_up_input" type="text" id="Topics" name="Topics">
	   <br><br>
	   
        <input class= "log_in_button" type="submit" id="tutor_zoom_submit" name="submit" value= "Save">
        <br><br>
     </form>
     </div>
</div>
     <br><br>     

<script src="../index.js"></script>

</body>
</html>