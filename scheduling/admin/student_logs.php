<?php include('db_connect.php');?>

<div class="container-fluid">
<div class="container-fluid">
<style>
	input[type=checkbox]
{
  /* Double-sized Checkboxes */
  -ms-transform: scale(1.5); /* IE */
  -moz-transform: scale(1.5); /* FF */
  -webkit-transform: scale(1.5); /* Safari and Chrome */
  -o-transform: scale(1.5); /* Opera */
  transform: scale(1.5);
  padding: 10px;
}
</style>
	<div class="col-lg-12">
		<div class="row mb-4 mt-4">
			<div class="col-md-12">
				
			</div>
		</div>
		<div class="row">
			<!-- FORM Panel -->

			<!-- Table Panel -->
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<b>STA Student Logs</b>
						<span class="">

				</span>
					</div>
					<div class="card-body">
						
										
						<table id="log-records" class="table table-bordered table-hover" name="log-records"
						data-show-print="true"
                        data-url="json/data1.json">
							<thead>
								<tr>
									<th class="text-center">#</th>
									<th class="text-center">Name</th>
									<th class="text-center">Hours</th>
									<th class="text-center">Type</th>
									<th class="text-center">Log Record</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								$i = 1;
								$subject = $conn->query("SELECT * FROM student_grades order by id asc");
								while($row=$subject->fetch_assoc()):
								?>
								<tr>
									<td class="text-center"><?php echo $i++ ?></td>
									<td class="">
										 <b><?php echo $row['name'] ?></b></p>


										
									</td>

									<td class="text-center">
									   <?php echo $row['hours'] ?></b></small></p>
									</td>
									<td class="text-center">
									<p><b><?php echo $row['training_type'] ?></b></p>
									</td>
									<td class="text-center">
									    <p>Time Logged: <small><b><?php echo $row['time'] ?></b></small></p>
										<p>Skill/Inspection: <small><b><?php echo $row['subject'] ?></b></small></p>
										<p>Instructor: <small><b><?php echo $row['instructor'] ?></b></small></p>
										<p>Score: <small><b><?php echo $row['grade'] ?></b></small></p>
										<p>Pass/Fail: <small><br><b><?php echo $row['final'] ?></b></small></p>
										<p>Hours: <small><br><b><?php echo $row['hours'] ?></b></small></p>
									</td>

								</tr>
								<?php endwhile; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<!-- Table Panel -->
		</div>
	</div>	
	<br><a href="http://localhost/sta_tracking/scheduling/admin/print_logs.php">Get Print table</a></button></br>
</div>
<style>
	
	td{
		vertical-align: middle !important;
	}
</style>
<script>
	$(document).ready(function(){
		$('table').dataTable()
	})
    
	
</script>
<style>
	@media print {  
		@page {
			size:8.5in 13in;
		}
		head{
			height:0px;
			display: none;
		}
		#head{
			display: none;
			height:0px;
		}
		#print{
		position:fixed;
		top:0px;
		margin-top:20px;
		margin-bottom:30px;
		margin-right:50px;
		margin-left:50px;
		}
		}
		#print{
		width:7.5in;
		}
		input {
    border: 0;
    outline: 0;
    background: transparent;
    border-bottom: 1px solid black;
}

.foo{
	font-family: "Bodoni MT", Didot, "Didot LT STD", "Hoefler Text", Garamond, "Times New Roman", serif;
	font-size: 24px;
	font-style: italic;
	font-variant: normal;
	font-weight: bold;
	line-height: 24px;
	}
	.p {
	font-family: "Segoe UI", Frutiger, "Frutiger Linotype", "Dejavu Sans", "Helvetica Neue", Arial, sans-serif;
	font-size: 14px;
	font-style: italic;
	font-variant: normal;
	font-weight: 550;
	line-height: 20px;
	 letter-spacing: 2px;
}
	</style>
<script src="https://unpkg.com/bootstrap-table@1.21.2/dist/bootstrap-table.min.js"></script>
<script src="https://unpkg.com/bootstrap-table@1.21.2/dist/extensions/print/bootstrap-table-print.min.js"></script>

