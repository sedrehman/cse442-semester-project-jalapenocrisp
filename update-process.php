<?php
include_once "updateDb.php";
if(count($_POST)>0) {

mysqli_query($conn,"UPDATE tutors SET fname='" . $_POST['fname'] . "', lname='" . $_POST['lname'] . "', phone='" . $_POST['phone'] . "' ,title='" . $_POST['title'] . "' , email='" . $_POST['email'] . "', courses='" . $_POST['courses'] . "', paswd='" . $_POST['paswd'] . "' WHERE user_id='" . $_POST['user_id'] . "'"); 
$message = "Record Modified Successfully";
}
$result = mysqli_query($conn,"SELECT * FROM tutors WHERE user_id='" . $_GET['user_id'] . "'");
$row= mysqli_fetch_array($result);
?>
<html>
<head>
<title>UB Tutoring</title>
</head>

<body>
<form name="frmUser" method="post" action="">
<div><?php if(isset($message)) { echo $message; } ?>
</div>
<div style="padding-bottom:5px;">
</div>
<input type="hidden" name="user_id" class="txtField" value="<?php echo $row['user_id']; ?>">
<input type="hidden" name="fname" class="txtField" value="<?php echo $row['fname']; ?>">
<input type="hidden" name="lname" class="txtField" value="<?php echo $row['lname']; ?>">
<br>
Phone Number:<br>
<input type="text" name="phone" class="txtField" value="<?php echo $row['phone']; ?>">
<br>
Title:<br>
<input type="text" name="title" class="txtField" value="<?php echo $row['title']; ?>">
<br>
Email:<br>
<input type="text" name="email" class="txtField" value="<?php echo $row['email']; ?>">
<br>
Course:<br>
<input type="text" name="courses" class="txtField" value="<?php echo $row['courses']; ?>">
<br>
Password:<br>
<input type="text" name="paswd" class="txtField" value="<?php echo $row['paswd']; ?>">
<br>
<input type="submit" name="submit" value="Submit" class="button">
</form>
</body>
</html>