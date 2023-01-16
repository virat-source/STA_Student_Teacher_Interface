<?php
	if(ISSET($_POST['search'])){
		$keyword = $_POST['keyword'];
?>

	<?php
		require 'conn.php';
		$query = mysqli_query($conn, "SELECT * FROM `student_grades` WHERE `name` LIKE '%$keyword%' GROUP BY `name`") or die(mysqli_error());
		while($fetch = mysqli_fetch_array($query)){
	?>
	<div style="word-wrap:break-word;">
		<a href="get_record.php?id=<?php echo $fetch['name']?>"><h4><?php echo $fetch['name']?></h4></a>
		<h4><b> Click on the name to get records</b></h4></a>
		
		<?php
		}}
 
?>
