<?php

	// Connect to database
	$con = mysqli_connect("localhost","root","","db_sta");

    $id=$_GET['id'];

	// mysqli_connect("localhost","root","","db_sta")

	// Get all the names from student_info table
	$sql = "SELECT CONCAT(FIRSTNAME , ' ' , MIDDLENAME , ' ' , LASTNAME) AS Name FROM `student_info`"; 
	$first_name = mysqli_query($con,$sql);

    // Get all the categories from student_info table for student id query
	$sqlsi = "SELECT * FROM `student_info`";
	$stud_id = mysqli_query($con,$sqlsi);

	// Get all the subjects from the subjects table for subject id query
	$sqlsid = "SELECT * FROM `subjects` WHERE NOT type = 'Inspection'";
	$subj_id = mysqli_query($con,$sqlsid);

	// Get all the training types from the subjects table for training info id query
	$sqlsit = "SELECT * FROM `subjects`";
	$trg_id = mysqli_query($con,$sqlsit);
?>

<?php

?>
<!DOCTYPE html>
<html lang="en">

<?php session_start(); ?>

	<head>
		<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
		<?php
  if(!isset($_SESSION['login_id']))
    header('location:login.php');
 // include('./auth.php'); 
 ?>
	</head>
<body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<a class="navbar-brand" href="../index.php">Home</a>
			<a class="navbar-brand" href="../index.php?page=calendar">Calendar</a>
		</div>
	</nav>
	<div class="col-md-3"></div>
	<div class="col-md-6 well">
		<h3 class="text-primary">Hourly Logs</h3>
		<hr style="border-top:1px dotted #ccc;"/>
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#form_modal"><span class="glyphicon glyphicon-plus"></span> Add entry</button>
		<br /><br />
		<table class="table table-bordered">
			<thead class="alert-info">
				<tr>
					<th>Name</th>
					<th>Subject</th>
					<th>Type</th>
					<th>Hours</th>
					<th>Final Score</th>
					<th>Pass/Fail</th>
					<th>Edit</th>
				</tr>
			</thead>
			<tbody>
				<?php
					require 'conn.php';
					
					$query = mysqli_query($conn, "SELECT * FROM `student_grades` WHERE schedule='$id' and NOT cat='Inspection'") or die(mysqli_error());
					while($fetch = mysqli_fetch_array($query)){
					
					$final = ($fetch['grade']);
				?>
				<tr>
					<td><?php echo $fetch['name']?></td>
					<td><?php echo $fetch['subject']?></td>
					<td><?php echo $fetch['training_type']?></td>
					<td><?php echo $fetch['hours']?></td>
					<td><?php echo filter_var($final, FILTER_VALIDATE_INT) == false ? number_format($final,2) : number_format($final) ?></td>
					<?php
						if($final >=8){
							echo "<td style='background-color:green; color:#fff;'>Pass</td>";
						}else if($final < 8){
							echo "<td style='background-color:red; color:#fff;'>Fail</td>";
						}
					?>
					<td><a href="edit.php?id=<?php echo $fetch['id']; ?>">Edit</a></td>
				</tr>
				<?php
					}
				?>
			</tbody>
		</table>
	</div>
<div class="modal fade" id="form_modal" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<form method="POST" action="save_student.php">
				<div class="modal-header">
					<h3 class="modal-title">Add Student</h3>
				</div>
				<div class="modal-body">
					<div class="col-md-2"></div>
					<div class="col-md-8">

					

						<div class="form-group">

						
							<input id="schedule" type="hidden" class="form-control" name="schedule" value="<?php echo $_GET['id'] ?>">
							<br></br>

							<label>Name (Format: First, Middle, Last)</label>
							<select id="name" class="form-control" name="name" autocomplete="off" required="required">
							<?php
				           // use a while loop to fetch data
				          // from the $first_name variable
				         // and individually display as an option
				         while ($student_info = mysqli_fetch_array(
							$first_name,MYSQLI_ASSOC)):;
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
		           <br>
						</div>

						<div class="form-group">
							<label>Instructor</label>
							<input class="form-control" name="instructor" value="<?php echo $_SESSION['login_name'] ?>" required="required"/>
							<br></br>

							<div class="form-group">
							<label>Enter Inspection Name:</label>
							<select id="subject" name="subject" autocomplete="off" required="required">
                            			<?php
				// use a while loop to fetch data
				// from the $first_name variable
				// and individually display as an option
				while ($subjects = mysqli_fetch_array(
						$subj_id,MYSQLI_ASSOC)):;
						
			?>
				<option value="<?php
				echo $subjects["subject"];
					// The value we usually set is the primary key
				?>">
					<?php echo $subjects["subject"];
						// To show the student name to the user
					?>
				</option>
			<?php
				endwhile;
				// While loop must be terminated
			?>
		</select>
                            <br></br>

							<label>Training Type:</label>
							<select id="training_type" name="training_type" autocomplete="off" required="required">
                            	<option>Behind the Wheel - Range</option>
								<option>Behind the Wheel - Public Roads</options>
				
		
		</select>
                            <br></br>


						<div class="form-group">
							<label>Score</label>
							<input type="number" min="0" max="10" class="form-control" name="grade" required="required"/>
						</div>

                            <br></br>

							<label>Hours:</label>
							<select id="hours" name="hours" autocomplete="off" required="required" value="1">
                            	<option>1</option>
								
				
		
		           </select>
                            <br></br>			
						
						</div>
					</div>
				</div>
				<br style="clear:both;"/>
				<div class="modal-footer">
					<button type="button" data-dismiss="modal" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span> Close</button>
					<button class="btn btn-primary" name="save"><span class="glyphicon glyphicon-save"></span> save</button>
				</div>
			</form>
		</div>
	</div>
</div>	
<script src="js/jquery-3.2.1.min.js"></script>	
<script src="js/bootstrap.js"></script>	
</body>	
</html>