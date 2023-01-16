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
</head>
 
<body>
<nav class="navbar navbar-default">
		<div class="container-fluid">
			<a class="navbar-brand" href="../../index.php">Home</a>
            <a class="navbar-brand" href="../../index.php?page=calendar">Calendar</a>
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
               <label for="Student">Enter Student Name (Format First, Middle, Last):</label>
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


               
            </p>
 
               <p>
               <label for="Remarks">Enter Remarks:</label>
               <input type="text" name="Remarks" id="Remarks" autocomplete="off" required="required">
            </p>
             
            <p>
               <label for="Subject">Inspection Name:</label>
               <select id="subject_name" class="form-control" name="subject_name" required="required" option value="Inside Inspection">
				<option>Inside Inspection</option>
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

            <tr><b><h2>Air Brake Check</h2></b></tr>
            
            <tr> <td>                       
            <h4><b>Applied<br> Pressure</b></h4></td>
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
                <label for="question-1-answers-C">C) Did not mention</label>
            </div>
            </td>
            </tr>

        
        
        
        <tr><td>  
        
            <h4><b>Low Air<br> Warning<br> Device</b></h4></td>
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
                <label for="question-2-answers-C">C) Did not mention</label>
            </div>
            </td>
            </tr>              
        

        <tr><td>  
        
            <h4><b>Emergency<br> Spring Brake<br> Pop-Out</b></h4></td>
            <td>
            <div>
                <input type="radio" name="question-3-answers" id="question-3-answers-A" value="A" />
                <label for="question-3-answers-A">A) Satisfactory</label>
            </div>
            
            <div>
                <input type="radio" name="question-3-answers" id="question-3-answers-B" value="B" />
                <label for="question-3-answers-B">B) Unsatisfactory</label>
            </div>

            <div>
                <input type="radio" name="question-3-answers" id="question-3-answers-C" value="C" />
                <label for="question-3-answers-C">C) Did not mention</label>
            </div>
            </td>
            </tr>


          

            
            <table class="table table-bordered">
            <tr><th><h3>Criteria</h3></th><th><h3>Answers</h3></th></tr>

            <tr><b><h2>Cab</h2></b></tr>
            
            <tr> <td>                       
            <h4><b>Light<br> Indicators</b></h4></td>
            <td>
            <div>
                <input type="radio" name="question-4-answers" id="question-4-answers-A" value="A" />
                <label for="question-4-answers-A" >A) Satisfactory </label>
            </div>
            
            <div>
                <input type="radio" name="question-4-answers" id="question-4-answers-B" value="B" />
                <label for="question-4-answers-B">B) Unsatisfactory</label>

            <div>
                <input type="radio" name="question-4-answers" id="question-4-answers-C" value="C" />
                <label for="question-4-answers-C">C) Did not mention</label>
            </div>
            </td>
            </tr>

            <tr> <td>                       
            <h4><b>Oil<br> Gauge</b></h4></td>
            <td>
            <div>
                <input type="radio" name="question-5-answers" id="question-5-answers-A" value="A" />
                <label for="question-5-answers-A" >A) Satisfactory </label>
            </div>
            
            <div>
                <input type="radio" name="question-5-answers" id="question-5-answers-B" value="B" />
                <label for="question-5-answers-B">B) Unsatisfactory</label>

            <div>
                <input type="radio" name="question-5-answers" id="question-5-answers-C" value="C" />
                <label for="question-5-answers-C">C) Did not mention</label>
            </div>
            </td>
            </tr>

            <tr> <td>                       
            <h4><b>Voltmeter</b></h4></td>
            <td>
            <div>
                <input type="radio" name="question-6-answers" id="question-6-answers-A" value="A" />
                <label for="question-6-answers-A" >A) Satisfactory </label>
            </div>
            
            <div>
                <input type="radio" name="question-6-answers" id="question-6-answers-B" value="B" />
                <label for="question-6-answers-B">B) Unsatisfactory</label>

            <div>
                <input type="radio" name="question-6-answers" id="question-6-answers-C" value="C" />
                <label for="question-6-answers-C">C) Did not mention</label>
            </div>
            </td>
            </tr>

            <tr> <td>                       
            <h4><b>Air<br> Gauge</b></h4></td>
            <td>
            <div>
                <input type="radio" name="question-7-answers" id="question-7-answers-A" value="A" />
                <label for="question-7-answers-A" >A) Satisfactory </label>
            </div>
            
            <div>
                <input type="radio" name="question-7-answers" id="question-7-answers-B" value="B" />
                <label for="question-7-answers-B">B) Unsatisfactory</label>

            <div>
                <input type="radio" name="question-7-answers" id="question-7-answers-C" value="C" />
                <label for="question-7-answers-C">C) Did not mention</label>
            </div>
            </td>
            </tr>

            <tr> <td>                       
            <h4><b>Heater<br>/Defroster</b></h4></td>
            <td>
            <div>
                <input type="radio" name="question-8-answers" id="question-8-answers-A" value="A" />
                <label for="question-8-answers-A" >A) Satisfactory </label>
            </div>
            
            <div>
                <input type="radio" name="question-8-answers" id="question-8-answers-B" value="B" />
                <label for="question-8-answers-B">B) Unsatisfactory</label>

            <div>
                <input type="radio" name="question-8-answers" id="question-8-answers-C" value="C" />
                <label for="question-8-answers-C">C) Did not mention</label>
            </div>
            </td>
            </tr>

            <tr> <td>                       
            <h4><b>Mirrors</b></h4></td>
            <td>
            <div>
                <input type="radio" name="question-9-answers" id="question-9-answers-A" value="A" />
                <label for="question-9-answers-A" >A) Satisfactory </label>
            </div>
            
            <div>
                <input type="radio" name="question-9-answers" id="question-9-answers-B" value="B" />
                <label for="question-9-answers-B">B) Unsatisfactory</label>

            <div>
                <input type="radio" name="question-9-answers" id="question-9-answers-C" value="C" />
                <label for="question-9-answers-C">C) Did not mention</label>
            </div>
            </td>
            </tr>

            <tr> <td>                       
            <h4><b>Windshield<br>/Rear Window</b></h4></td>
            <td>
            <div>
                <input type="radio" name="question-10-answers" id="question-10-answers-A" value="A" />
                <label for="question-10-answers-A" >A) Satisfactory </label>
            </div>
            
            <div>
                <input type="radio" name="question-10-answers" id="question-10-answers-B" value="B" />
                <label for="question-10-answers-B">B) Unsatisfactory</label>

            <div>
                <input type="radio" name="question-10-answers" id="question-10-answers-C" value="C" />
                <label for="question-10-answers-C">C) Did not mention</label>
            </div>
            </td>
            </tr>
        
            <tr> <td>                       
            <h4><b>Wipers<br>/Washers</b></h4></td>
            <td>
            <div>
                <input type="radio" name="question-11-answers" id="question-11-answers-A" value="A" />
                <label for="question-11-answers-A" >A) Satisfactory </label>
            </div>
            
            <div>
                <input type="radio" name="question-11-answers" id="question-11-answers-B" value="B" />
                <label for="question-11-answers-B">B) Unsatisfactory</label>

            <div>
                <input type="radio" name="question-11-answers" id="question-11-answers-C" value="C" />
                <label for="question-11-answers-C">C) Did not mention</label>
            </div>
            </td>
            </tr>

            <tr> <td>                       
            <h4><b>Emergency<br>Equipment</b></h4></td>
            <td>
            <div>
                <input type="radio" name="question-12-answers" id="question-12-answers-A" value="A" />
                <label for="question-12-answers-A" >A) Satisfactory </label>
            </div>
            
            <div>
                <input type="radio" name="question-12-answers" id="question-12-answers-B" value="B" />
                <label for="question-12-answers-B">B) Unsatisfactory</label>

            <div>
                <input type="radio" name="question-12-answers" id="question-12-answers-C" value="C" />
                <label for="question-12-answers-C">C) Did not mention</label>
            </div>
            </td>
            </tr>


            <tr> <td>                       
            <h4><b>Horns</b></h4></td>
            <td>
            <div>
                <input type="radio" name="question-13-answers" id="question-13-answers-A" value="A" />
                <label for="question-13-answers-A" >A) Satisfactory </label>
            </div>
            
            <div>
                <input type="radio" name="question-13-answers" id="question-13-answers-B" value="B" />
                <label for="question-13-answers-B">B) Unsatisfactory</label>

            <div>
                <input type="radio" name="question-13-answers" id="question-13-answers-C" value="C" />
                <label for="question-13-answers-C">C) Did not mention</label>
            </div>
            </td>
            </tr>

            <tr> <td>                       
            <h4><b>Safelty<br>Belt</b></h4></td>
            <td>
            <div>
                <input type="radio" name="question-14-answers" id="question-14-answers-A" value="A" />
                <label for="question-14-answers-A" >A) Satisfactory </label>
            </div>
            
            <div>
                <input type="radio" name="question-14-answers" id="question-14-answers-B" value="B" />
                <label for="question-14-answers-B">B) Unsatisfactory</label>

            <div>
                <input type="radio" name="question-14-answers" id="question-14-answers-C" value="C" />
                <label for="question-14-answers-C">C) Did not mention</label>
            </div>
            </td>
            </tr>

            <table class="table table-bordered">
            <tr><th><h3>Criteria</h3></th><th><h3>Answers</h3></th></tr>

            <tr><b><h2>Brake Tests</h2></b></tr>
            
            <tr> <td>                       
            <h4><b>Tractor Brake<br> Test<br> (Yellow) </b></h4></td>
            <td>
            <div>
                <input type="radio" name="question-15-answers" id="question-15-answers-A" value="A" />
                <label for="question-15-answers-A" >A) Satisfactory </label>
            </div>
            
            <div>
                <input type="radio" name="question-15-answers" id="question-15-answers-B" value="B" />
                <label for="question-15-answers-B">B) Unsatisfactory</label>

            <div>
                <input type="radio" name="question-15-answers" id="question-15-answers-C" value="C" />
                <label for="question-15-answers-C">C) Did not mention</label>
            </div>
            </td>
            </tr>

        
        
        
        <tr><td>  
        
            <h4><b>Trailer Brake<br> Test<br> (Red)</b></h4></td>
            <td>
            <div>
                <input type="radio" name="question-16-answers" id="question-16-answers-A" value="A" />
                <label for="question-16-answers-A">A) Satisfactory</label>
            </div>
            
            <div>
                <input type="radio" name="question-16-answers" id="question-16-answers-B" value="B" />
                <label for="question-16-answers-B">B) Unsatisfactory</label>
            </div>

            <div>
                <input type="radio" name="question-16-answers" id="question-16-answers-C" value="C" />
                <label for="question-16-answers-C">C) Did not mention</label>
            </div>
            </td>
            </tr>              
        

        <tr><td>  
        
            <h4><b>Service Brake<br> (Pedal<br> and<br> Alignment)<br></b></h4></td>
            <td>
            <div>
                <input type="radio" name="question-17-answers" id="question-17-answers-A" value="A" />
                <label for="question-17-answers-A">A) Satisfactory</label>
            </div>
            
            <div>
                <input type="radio" name="question-17-answers" id="question-17-answers-B" value="B" />
                <label for="question-17-answers-B">B) Unsatisfactory</label>
            </div>

            <div>
                <input type="radio" name="question-17-answers" id="question-17-answers-C" value="C" />
                <label for="question-17-answers-C">C) Did not mention</label>
            </div>
            </td>
            </tr>
      



        
  
         <tr><td></td><td><input type="submit" value="Submit"></tr></td>
            
         </form>
			</center>
 
</body>
 
</html>