<?php session_start(); 
if(!isset($_SESSION['login_id']))
    header('location:login.php');
 // include('./auth.php'); 
 ?>

<?php
$con  = mysqli_connect("localhost","root","","db_sta");
			$id=$_GET['id'];
            $keyword = 'range';
			if (!$con) {
				# code...
			   echo "Problem in database connection! Contact administrator!" . mysqli_error();
			}else{
					$sql ="SELECT subject, SUM(hours) FROM student_grades WHERE name='$id' GROUP BY subject";
					$result = mysqli_query($con,$sql);
					$chart_data="";
					while ($row = mysqli_fetch_array($result)) { 
			
					   $subject[]  = $row['subject'];
                       $hours[] = $row['SUM(hours)'];

                      }}
                      $cat = "Inspection";              
		              ?>

                      <?php                       
 $sqli ="SELECT training_type, SUM(hours) FROM student_grades WHERE name='$id' GROUP BY training_type";
 $resulti = mysqli_query($con,$sqli);
 while ($row = mysqli_fetch_array($resulti)) { 

    $type[]  = $row['training_type'];
    $hoursi[] = $row['SUM(hours)'];}
              
                          ?>
<!DOCTYPE html>
<html lang="en"> 
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>STA Student Progress Report</title> 
        <br><a class="navbar-brand" a href="../index.php">Go Home</a></button>
        <a class="navbar-brand" href="index.php">Search Page</a>
    </head>
    <body>
    <div><h1><b>Consolidated Progress Report for <?php echo ($id); ?></b></h1></div>   
    <table class="table table-bordered">
        <h2><b>Student Hourly Logs for <?php echo ($id); ?></b></h2>
			<thead class="alert-info">
				<tr>
					
					<th>Subject</th>
					<th>Type</th>
					<th>Final Score</th>
					<th>Pass/Fail</th>
					
				</tr>
			</thead>
			<tbody>
				<?php
					require 'conn.php';
					
					$query = mysqli_query($conn, "SELECT * FROM `student_grades` WHERE name='$id' AND NOT cat='Inspection'") or die(mysqli_error());
					while($fetch = mysqli_fetch_array($query)){
					
					$final = ($fetch['grade']);
				?>
				<tr>
					
					<td><?php echo $fetch['subject']?></td>
					<td><?php echo $fetch['training_type']?></td>
					<td><?php echo filter_var($final, FILTER_VALIDATE_INT) == false ? number_format($final,2) : number_format($final) ?></td>
					<?php
						if($final >=8){
							echo "<td style='background-color:green; color:#fff;'>Pass</td>";
						}else if($final < 8){
							echo "<td style='background-color:red; color:#fff;'>Fail</td>";
						}
					?>
					
				</tr>
				<?php
					}
				?>
			</tbody>
		</table>
	</div>
 
    <table class="table table-bordered">
        <h2><b>Student Evaluation Logs for <?php echo ($id); ?></b></h2>
			<thead class="alert-info">
				<tr>
					
					<th>Subject</th>
					<th>Remarks</th>
					<th>Pass/Fail</th>
					</tr>
			</thead>
    <tbody>
				<?php
					require 'conn.php';
					
					$query1 = mysqli_query($conn, "SELECT * FROM `log_tb` WHERE Student='$id'") or die(mysqli_error());
					while($fetch1 = mysqli_fetch_array($query1)){
					
					$final1 = ($fetch1['grade']);
				?>
				<tr>
					
					<td><?php echo $fetch1['subject_name']?></td>
					<td><?php echo $fetch1['Remarks']?></td>
					<td><?php echo $fetch1['grade']?></td>
                    
					</tr>
				<?php
					}
				?>
			</tbody>
		</table>
	</div>
    
    <div style="width:30%;hieght:20%;text-align:center">
            <h2 class="page-header" >Drive Time/Range Time Split for <?php echo ($id); ?></h2>
            <canvas  id="chartjs_pie"></canvas> 
        </div>    
  
  <script src="//code.jquery.com/jquery-1.9.1.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
    <script type="text/javascript">
      var ctx = document.getElementById("chartjs_pie").getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'pie',
                    data: {
                        labels:<?php echo json_encode($type); ?>,
                        datasets: [{
                            backgroundColor: [
                               "#5969ff",
                                "#ff407b",
                                "#25d5f2",
                                "#ffc750",
                                "#2ec551",
                                "#7040fa",
                                "#ff004e"
                            ],
                            data:<?php echo json_encode($hoursi); ?>,
                        }]
                    },
                    options: {
                           legend: {
                        display: true,
                        position: 'bottom',
 
                        labels: {
                            fontColor: '#71748d',
                            fontFamily: 'Circular Std Book',
                            fontSize: 14,
                        }
                    },
 
 
                }
                });
    </script>
        

    
        <div style="width:60%;hieght:20%;text-align:center">
        <h2 class="page-header" >Hourly Split for <?php echo ($id); ?></h2>
        <canvas  id="chartjs_bar"></canvas> 
        
        </div> 
        <script>
	$(document).ready(function(){
		$('table').dataTable()
	})

	
</script>   
    </body>
  <script src="jquery-1.9.1.js"></script>
  <script src="Chart.min.js"></script>
<script type="text/javascript">
      var ctx = document.getElementById("chartjs_bar").getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels:<?php echo json_encode($subject); ?>,
                        datasets: [{
                            backgroundColor: [
                                "#25d5f2",
                                "#25d5f2",
                                "#25d5f2",
                                "#25d5f2",
                                "#25d5f2",
                                "#25d5f2",
                                "#25d5f2",
                                "#25d5f2",
                                "#25d5f2",
                                "#25d5f2",
                                "#25d5f2",
                                "#25d5f2",
                                "#25d5f2",
                                "#25d5f2",
                                "#25d5f2",
                                "#25d5f2",
                                "#25d5f2"

                            ],
                            data:<?php echo json_encode($hours); ?>,
                        }]
                    },
                    options: {
                           legend: {
                        display: false,
                        position: 'bottom',
 
                        labels: {
                            fontColor: '#71748d',
                            fontFamily: 'Circular Std Book',
                            fontSize: 14,
                        }
                    },
 
 
                }
                });
                
    </script>
</html>