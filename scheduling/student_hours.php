<?php session_start(); 
if(!isset($_SESSION['login_id']))
    header('location:login.php');
 // include('./auth.php'); 
 ?>
<?php
//servername
$servername = "localhost";
//username
$username = "root";
//empty password
$password = "";
//db_sta is the database name
$dbname = "db_sta";

// Create connection by passing these connection parameters
$conn = new mysqli($servername, $username, $password, $dbname);

//sql query
$sql = "SELECT name, training_type, SUM(hours) FROM student_grades GROUP BY name, training_type";
$result = $conn->query($sql);
?>

<div class="container-fluid">
	
	

			<!-- Table Panel -->
			<div class="col-md-8">
				<div class="card">
					<div class="card-header">
						<b>Student Log Records</b>
                        <span class="">
                       


</span>
</div>

			
					<div class="card-body">
					
						<table id="log-records" class="table table-bordered table-hover" name="log-records"
						data-show-print="true"
                        data-url="json/data1.json">
							<thead>
								<tr>
									<th class="text-center">Data</th>
									

								</tr>
							</thead>
							<tbody>

								<tr>
									<td class="text-center">                  <?php
//display data on web page
while($row = mysqli_fetch_array($result)){
	echo " ". $row['name']. " | ". $row['training_type']. " | ". $row['SUM(hours)'];
	echo "<br />";
}
//close the connection

$conn->close();
?></td>

								</tr>
								
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<!-- Table Panel -->
		</div>
	</div>	
	<br><a href="http://localhost/sta_tracking/scheduling/admin/print.php">Get Print table</a></button></br>
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

