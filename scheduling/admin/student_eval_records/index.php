<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content=
		"width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">

	<link rel="stylesheet" href=
"bootstrap.min.css">
	<title>STA Evaluation Tracking Portal</title>
</head>

<body>
	
<div id="page-wrap">
	<div class="container">
		<div class="row">
			<h2>Student Evaluation Records</h2>
			<table class="table table-hover">
				<thead>
					<tr>
						<th>Time Stamp</th>
						<th>Instructor</th>
						<th>Student ID</th>
						<th>Student Name</th>
						<th>Subject</th>
						<th>Remarks</th>
						<th>Grade</th>
					</tr>
				</thead>

				<tbody>
					<?php
						include_once('connection.php');
						$a=1;
						$stmt = $conn->prepare(
								"SELECT * FROM log_tb");
						$stmt->execute();
						$users = $stmt->fetchAll();
						foreach($users as $user)
						{
					?>
					<tr>
						<td>
							<?php echo $user['dt']; ?>
						</td>
						<td>
							<?php echo $user['Instructor']; ?>
						<td>
							<?php echo $user['stud_id']; ?>
						</td>
						<td>
							<?php echo $user['Student']; ?>
						</td>
						<td>
							<?php echo $user['subject_name']; ?>
						</td>
						<td>
							<?php echo $user['Remarks']; ?>
						</td>
						<td>
							<?php echo $user['grade']; ?>
						</td>

					</tr>
					<?php
					}
					?>
				</tbody>
			</table>

			<input class="btn btn-primary" button onclick="location.href='http://www.example.com'" type="button"
					value="Individual Student Records">
		</div>
	</div>
				</div>
</body>

</html>
