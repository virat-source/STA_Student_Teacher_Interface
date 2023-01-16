<?php include 'db_connect.php'?>
<?php if(isset($_GET['id'])){
	$qry = $conn->query("SELECT * FROM student_info where STUDENT_ID=".$_GET['id'])->fetch_array();
	foreach($qry as $k =>$v){
		$$k = $v;
	}
} ?>

<form action="" id="manage-student">
		<div id="msg"></div>
				<input type="hidden" name="id" value="<?php echo isset($_GET['STUDENT_ID']) ? $_GET['id']:'' ?>" class="form-control">
		<div class="row form-group">
		<div id="msg"></div>
				<div class="row form-group">
			<div class="col-md-4">
						<label class="control-label">Enrolment #</label>
						<input type="text" name="LRN_NO" id="LRN_NO" class="form-control">
						<small><i>Leave this blank if you want to a auto Enrollment #.</i></small>
					</div>
		</div>
		<div class="row form-group">
			<div class="col-md-4">
				<label class="control-label">Last Name</label>
				<input type="text" name="LASTNAME" id="LASTNAME" class="form-control" autocomplete="off" required="required">
			</div>
			<div class="col-md-4">
				<label class="control-label">First Name</label>
				<input type="text" name="FIRSTNAME" id="FIRSTNAME" class="form-control" autocomplete="off" required="required">
			</div>
			<div class="col-md-4">
				<label class="control-label">Middle Name</label>
				<input type="text" name="MIDDLENAME" id="MIDDLENAME"  class="form-control" autocomplete="off" required="required">
			</div>
			<div class="col-md-4">
				<label class="control-label">Gender</label>
				<select name="GENDER" id="GENDER" required="required" class="custom-select" id="GENDER">
					<option>Male</option>
					<option>Female</option>
				</select>
			</div>

			<div class="col-md-4">
				<label class="control-label">Enter Program Name</label>
				<select name="PROGRAM" id="PROGRAM" required="" class="custom-select" id="PROGRAM">
				<?php
				
// Connect to database
$con = mysqli_connect("localhost","root","","db_sta");

// mysqli_connect("localhost","root","","db_sta")

// Get all the categories from the courses table for student id query
$sqlsid = "SELECT * FROM `courses`";
$subj_id = mysqli_query($con,$sqlsid);


				// use a while loop to fetch data
				// from the $first_name variable
				// and individually display as an option
				while ($courses = mysqli_fetch_array(
						$subj_id,MYSQLI_ASSOC)):;
			?>
				<option value="<?php echo $courses["id"];
					// The value we usually set is the primary key
				?>">
					<?php echo $courses["course"];
						// To show the student name to the user
					?>
				</option>
			<?php
				endwhile;
				// While loop must be terminated
			?>
		  </select>
			</div>
	
	</form>
			</div>


