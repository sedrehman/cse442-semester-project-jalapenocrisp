<?php
 
$dataPoints = array();
//Best practice is to create a separate file for handling connection to database

include_once "access-db.php";
$result = mysqli_query($conn,"SELECT * FROM progress WHERE student_id='" . $_GET['user_id'] . "' and course='" . $_GET['cid']. "'");
$class = mysqli_fetch_array($result);
$course=$class['course'];
$grades=$class['grades'];
$gradeArray=explode(",", $grades);  
for($i=0; $i<count($gradeArray); $i++){
    array_push($dataPoints, array("x"=> $i+1, "y"=> $gradeArray[$i]));
}

$progress= mysqli_query($conn,"SELECT * FROM progress WHERE student_id='" . $_GET['user_id'] . "'");

	
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>UB Tutoring</title>
    <link rel="stylesheet" type="text/css" href="../style.css" />
    <script type="text/javascript" src="js/modernizr.custom.86080.js"></script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@500&family=Noto+Serif:wght@700&family=Roboto+Slab:wght@900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Barlow&family=Fredericka+the+Great&family=Noto+Serif&family=Roboto&display=swap" rel="stylesheet"></head></head>

<body class="main-container">

    <div class="header">

        <div class="menu_welcomePage">
            <ul>
                <li><a class="navlink" href="./student-appts.php?user_id=<?php echo $_GET['user_id']; ?>">my appointments</a> </li>
                <div class="dropdown">
                        <li><a class="dropbtn">my progress</a>
                            <div class="dropdown-content">
                                <?php 
                                while ($progressInfo = mysqli_fetch_array($progress)){ 
                                    $linkname=$progressInfo['course'];
                                    $link="./student-progress.php?user_id=" . $_GET['user_id'] . "&cid=" . $linkname ; 
                                    echo "<a href=".$link.">".$linkname."</a>";}
                                ?>
                            </div>
                        </li>
                    </div>
                <li><a class="navlink" href="./search.php?user_id=<?php echo $_GET['user_id']; ?>">find a tutor</a> </li>
                <li><a class="navlink" href="./studentprof.php?user_id=<?php echo $_GET['user_id']; ?>">profile</a> </li>
                <li><a class="navlink" href="../index.html">logout</a> </li>

            </ul>
        </div>

        <div class="logo">
            <h2 class="logo"> <a href="../index.html">UBtutoring</a> </h2>
        </div>

    </div>
    <hr class="hr-navbar">
<script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
    // backgroundColor: "#000083",
	animationEnabled: true,
	exportEnabled: true,
	 theme: "dark1", // "light1", "light2", "dark1", "dark2"
	title:{
        fontFamily:"tahoma",
		text: "<?php echo $course; ?> progress over Time"
	},
	data: [{
		lineColor: "red",
		type: "line", //change type to bar, line, area, pie, etc  
        showInLegend: true, 
        legendText: "<?php echo $course; ?>",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}],
    axisX: [{
        title: "time"
    }],
    axisY: [{
        title: "grade"
    }]
});

chart.render();

}

</script>
</head>
<body>
<br><br><br><br>

<button class="selectButton" onclick="window.location.href = './student-add-exam.php?user_id=<?php echo $_GET['user_id']; ?>';">Add a grade</button>
<br><br><br><br>
<div id="chartContainer" style="margin-left: auto; margin-right: auto; height: 100%; width: 70%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>         
