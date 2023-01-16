<?php

	// Connect to database
	$con = mysqli_connect("localhost","root","","db_sta");
	
	// mysqli_connect("localhost","root","","db_sta")

	// Get all the names from student_info table
	$sql = "SELECT * FROM `student_info`";
	$first_name = mysqli_query($con,$sql);
?>

<!DOCTYPE html>
<html lang="en">
<?php session_start(); ?>
<head>
	<meta charset="UTF-8" />
	
	<title>STA Evaluation Form</title>
    <?php
    if(!isset($_SESSION['login_id']))
    header('location:login.php');
    // include('./auth.php'); 
    ?>
	
	<link rel="stylesheet" type="text/css" href="style.css" />
</head>
 
<body>
 
	<div id="page-wrap">
 
		<h1>STA Evaluation Form and Student Log Book- Subject -1</h1>

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
						$first_name,MYSQLI_ASSOC)):;
			?>
				<option value="<?php echo $student_info["FIRSTNAME"];
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
 
             
            <p>
               <label for="Remarks">Enter Remarks:</label>
               <input type="text" name="Remarks" id="Remarks">
            </p>

            <li>
            
            <h3>Did the student mention all pertinent details about the Lights?</h3>
            
            <div>
                <input type="radio" name="question-1-answers" id="question-1-answers-A" value="A" />
                <label for="question-1-answers-A">A) Yes </label>
            </div>
            
            <div>
                <input type="radio" name="question-1-answers" id="question-1-answers-B" value="B" />
                <label for="question-1-answers-B">B) No</label>
            </div>
            

        
        </li>
        
        <li>
        
            <h3>Did the student mention all pertinent details about the Brakes?</h3>
            
            <div>
                <input type="radio" name="question-2-answers" id="question-2-answers-A" value="A" />
                <label for="question-2-answers-A">A) Yes</label>
            </div>
            
            <div>
                <input type="radio" name="question-2-answers" id="question-2-answers-B" value="B" />
                <label for="question-2-answers-B">B) No</label>
            </div>
            
        
        </li>
        
        <li>
        
            <h3>Did the student mention all pertinent details about the Brakes?</h3>
            
            <div>
                <input type="radio" name="question-3-answers" id="question-3-answers-A" value="A" />
                <label for="question-3-answers-A">A) Yes</label>
            </div>
            
            <div>
                <input type="radio" name="question-3-answers" id="question-3-answers-B" value="B" />
                <label for="question-3-answers-B">B) No</label>
            </div>
          
      
        </li>
        
        <li>
        
            <h3>Did the student mention all pertinent details about the Brakes?</h3>
            
            <div>
                <input type="radio" name="question-4-answers" id="question-4-answers-A" value="A" />
                <label for="question-4-answers-A">A) Yes</label>
            </div>
            
            <div>
                <input type="radio" name="question-4-answers" id="question-4-answers-B" value="B" />
                <label for="question-4-answers-B">B) No</label>
            </div>
            
       
        </li>
        
        <li>
        
            <h3>Did the student mention all pertinent details about the Brakes?</h3>
            
            <div>
                <input type="radio" name="question-5-answers" id="question-5-answers-A" value="A" />
                <label for="question-5-answers-A">A) Yes</label>
            </div>
            
            <div>
                <input type="radio" name="question-5-answers" id="question-5-answers-B" value="B" />
                <label for="question-5-answers-B">B) No</label>
            </div>
        
        </li>


            <input type="submit" value="Submit">
            
         </form>
      
 
</body>
 
</html>


