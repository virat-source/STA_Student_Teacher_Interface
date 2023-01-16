<?php
date_default_timezone_set('America/Los_Angeles');

$script_tz = date_default_timezone_get();

if (strcmp($script_tz, ini_get('date.timezone'))){
    echo '';
} else {
    echo '';
}
	// Connect to database
	$con = mysqli_connect("localhost","root","","db_sta");
	
	// mysqli_connect("localhost","root","","db_sta")

	// Get all the names from student_info table
	$sql = "SELECT CONCAT(FIRSTNAME , ' ' , MIDDLENAME , ' ' , LASTNAME) AS Name FROM `student_info`";  
	$full_name = mysqli_query($con,$sql);

    // Get all the categories from student_info table for student id query
	$sqlsi = "SELECT * FROM `student_info`";
	$stud_id = mysqli_query($con,$sqlsi);

    // Get all the categories from subjects table for subject id query
	$sqlsid = "SELECT * FROM `subjects`";
	$subj_id = mysqli_query($con,$sqlsid);


?>

<!DOCTYPE html>
<html lang="en">
<?php session_start(); ?>
<head>
<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
	
	<title>STA Evaluation Form</title>
    <?php
    if(!isset($_SESSION['login_id']))
    header('location:login.php');
    // include('./auth.php'); 
    ?>
	
	<link rel="stylesheet" type="text/css" href="style.css" />
   
<link href="css/jquery.signature.css" rel="stylesheet">
<style>
.kbw-signature { width: 400px; height: 200px; }
</style>
<!--[if IE]>
<script src="excanvas.js"></script>
<![endif]-->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="js/jquery.signature.js"></script>
<script>
$(function() {
	var sig = $('#sig').signature();
	$('#disable').click(function() {
		var disable = $(this).text() === 'Disable';
		$(this).text(disable ? 'Enable' : 'Disable');
		sig.signature(disable ? 'disable' : 'enable');
	});
	$('#clear').click(function() {
		sig.signature('clear');
	});
	$('#json').click(function() {
		alert(sig.signature('toJSON'));
	});
	$('#svg').click(function() {
		alert(sig.signature('toSVG'));
	});
    $('#png').click(function() {
		alert(sig.signature('toPNG'));
	});
});
</script>
</head>
 
<body>
<nav class="navbar navbar-default">
		<div class="container-fluid">
			<a class="navbar-brand" href="https://www.sourcetruckingacademy.com/" target="_blank">Source Trucking Academy</a>
		</div>
	</nav>
	<div class="col-md-3"></div>
	<div class="col-md-6 well">
		<h3 class="text-primary"><b>Inspection Logs</b></h3>
        
	<div id="page-wrap">
 
		<h1><b>Inside Inspection</b></h1>

        <center>
         <form action="insert.php" method="post">
                       
<p>
               <label for="instructor">Enter Instructor Name:</label>
               <input type="text" name="instructor" value="<?php echo $_SESSION['login_name'] ?>" id="instructor">
            </p>
 
             
             <p>
               <label for="Student">Enter Student Name:</label>
               <select id="Student" class="form-control" name="Student" autocomplete="off" required="required">
							<?php
				// use a while loop to fetch data
				// from the $first_name variable
				// and individually display as an option
				while ($student_info = mysqli_fetch_array(
						$full_name,MYSQLI_ASSOC)):;
			?>
				<option value="<?php echo $student_info["Name"];
					// The value we usually set is the primary key
				?>">
					<?php echo $student_info["Name"];
						// To show the student name to the user
					?>
				</option>
			<?php
				endwhile;
				// While loop must be terminated
			?>
		</select>
               
            </p>

            <p>
               <label for="studid">Enter Student ID (Make sure you match the first name with the selected name):</label>
               <select id="studid" class="form-control" name="studid" autocomplete="off" required="required">
							<?php
				// use a while loop to fetch data
				// from the $first_name variable
				// and individually display as an option
				while ($student_info = mysqli_fetch_array(
						$stud_id,MYSQLI_ASSOC)):;
			?>
				<option value="<?php echo $student_info["STUDENT_ID"];
					// The value we usually set is the primary key
				?>">
					<?php echo $student_info["FIRSTNAME"];
						// To show the student name to the user
					?>
				</option>
			<?php
				endwhile;
				// While loop must be terminated
			?>
		</select>
               
            </p>
               
            </p>
            <p>Default signature:</p>
<div id="sig"></div>
<p style="clear: both;">
	<button id="disable">Disable</button> 
	<button id="clear">Clear</button> 
	<button id="json">To JSON</button>
	<button id="svg">To SVG</button>
    <button id="png">To PNG</button>
</p>
          
                     <p>

                     
               <label for="Remarks">Enter Remarks:</label>
               <input type="text" name="Remarks" id="Remarks" autocomplete="off" required="required">
            </p>
             
            <p>
               <label for="Subject">Inspection Name:</label>
               <select id="subject_name" class="form-control" name="subject_name" required="required" option value="Air Brake Test">
				<option> Air Brake Test
				</option>
			
		</select>

        <p>
               <label for="Subject">Inspection ID:</label>
               <select id="subject" class="form-control" name="subject" required="required" option value="1">
				<option> 1
				</option>
			
		</select>
               
            </p>

            </p>
            
            <table class="table table-bordered">
            <tr><th><h3>Criteria</h3></th><th><h3>Answers</h3></th></tr>
            
            <tr><td>    
            
            
            <h4><b>Applied Pressure</b></h4></td>
            <td>
            <div>
                <input type="radio" name="question-1-answers" id="question-1-answers-A" value="A" />
                <label for="question-1-answers-A" >A) Satisfactory </label>
            </div>
            
            <div>
                <input type="radio" name="question-1-answers" id="question-1-answers-B" value="B" />
                <label for="question-1-answers-B">B) Unsatisfactory</label>

            <div>
                <input type="radio" name="question-1-answers" id="question-1-answers-C" value="C" />
                <label for="question-1-answers-B">C) Did not mention</label>
            </div>
            </td>
            </tr>

        
        
        
        <tr><td>  
        
            <h4><b>Low Air Warning Device</b></h4></td>
            <td>
            <div>
                <input type="radio" name="question-2-answers" id="question-2-answers-A" value="A" />
                <label for="question-2-answers-A">A) Satisfactory</label>
            </div>
            
            <div>
                <input type="radio" name="question-2-answers" id="question-2-answers-B" value="B" />
                <label for="question-2-answers-B">B) Unsatisfactory</label>
            </div>

            <div>
                <input type="radio" name="question-2-answers" id="question-2-answers-C" value="C" />
                <label for="question-1-answers-B">C) Did not mention</label>
            </div>
            </td>
            </tr>              
        

        <tr><td>  
        
            <h4><b>Emergency Spring Break Popout</b></h4></td>
            <td>
            <div>
                <input type="radio" name="question-3-answers" id="question-3-answers-A" value="A" />
                <label for="question-2-answers-A">A) Satisfactory</label>
            </div>
            
            <div>
                <input type="radio" name="question-3-answers" id="question-3-answers-B" value="B" />
                <label for="question-2-answers-B">B) Unsatisfactory</label>
            </div>

            <div>
                <input type="radio" name="question-3-answers" id="question-3-answers-C" value="C" />
                <label for="question-1-answers-B">C) Did not mention</label>
            </div>
            </td>

   
  
         <tr><td></td><td><input type="submit" value="Submit"></tr></td>
            
         </form>
			</center>

                    <script src="jquery-3.6.1.min.js">var sig = $('#sig').signature({
    syncField: '#signature64',
    syncFormat: 'PNG'
});
$('#clear').click(function(e) {
    e.preventDefault();
    sig.signature('clear');
    $("#signature64").val('');
})</script>
</body>
 
</html>