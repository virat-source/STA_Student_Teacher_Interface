<?php session_start(); 
if(!isset($_SESSION['login_id']))
    header('location:login.php');
 // include('./auth.php'); 
 ?>
<?php
date_default_timezone_set('America/Los_Angeles');

$script_tz = date_default_timezone_get();

if (strcmp($script_tz, ini_get('date.timezone'))){
    echo 'Script timezone differs from ini-set timezone.';
} else {
    echo 'Script timezone and ini-set timezone match.';
}
	// Connect to database
	$con = mysqli_connect("localhost","root","","db_sta");
	
	// mysqli_connect("localhost","root","","db_sta")

    // Get all the categories from subjects table for subject id query
	$sqlsid = "SELECT * FROM `courses`";
	$subj_id = mysqli_query($con,$sqlsid);


?>

<!DOCTYPE html>
<html lang="en">
<?php session_start(); ?>
<head>
<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
	
	<title>STA Enter Student Record</title>
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
			<a class="navbar-brand" href="https://www.sourcetruckingacademy.com/" target="_blank">Source Trucking Academy</a>
		</div>
	</nav>
	<div class="col-md-3"></div>
	<div class="col-md-6 well">
		<h3 class="text-primary">Hourly Logs</h3>
	<div id="page-wrap">
 
		<h1>STA Inspection Form and Student Log Book Subject - 1</h1>

        <center>
         <form action="insert.php" method="post">
                       
<p>
               <label for="LASTNAME">Enter Last Name:</label>
               <input type="text" name="LASTNAME" id="LASTNAME" autocomplete="off" required="required">
            </p>
 
             
             <p>
               <label for="FIRSTNAME">Enter First Name:</label>
               <input type="text" name="FIRSTNAME" id="FIRSTNAME" autocomplete="off" required="required">
		</select>
               
            </p>

            <p>
               <label for="MIDDLENAME">Enter Middle Name:</label>
               <input type="text" name="MIDDLENAME" id="MIDDLENAME" autocomplete="off" required="required">
		</select>
               
            </p>
            </p>
               
            </p>
 
               <p>
               <label for="GENDER">Gender:</label>
               <select id="GENDER" class="form-control" name="GENDER" required="required">
            </p>
            <option>Male</option>
            <option>Female</option>
            </select>
             
            <p>
               <label for="PROGRAM">Enter Subject Name:</label>
               <select id="PROGRAM" class="form-control" name="PROGRAM" autocomplete="off" required="required">
                            			<?php
				// use a while loop to fetch data
				// from the $first_name variable
				// and individually display as an option
				while ($subjects = mysqli_fetch_array(
						$subj_id,MYSQLI_ASSOC)):;
			?>
				<option value="<?php echo $subjects["id"];
					// The value we usually set is the primary key
				?>">
					<?php echo $subjects["course"];
						// To show the student name to the user
					?>
				</option>
			<?php
				endwhile;
				// While loop must be terminated
			?>
		</select>
		            
            </p>
            
            <input type="submit" value="Submit">
            
         </form>
			</center>
 
</body>
 
</html>