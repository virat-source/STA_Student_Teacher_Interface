<?php include 'db_connect.php' ?>

<?php
session_start();
  if(!isset($_SESSION['login_id']))
    header('location:login.php');
 // include('./auth.php'); 
 ?>
<?php
if(isset($_GET['id'])){
	$qry = $conn->query("SELECT *,concat(LASTNAME,', ',FIRSTNAME,' ',MIDDLENAME) as name FROM student_info where STUDENT_ID=".$_GET['id'])->fetch_array();
	foreach($qry as $k =>$v){
		$$k = $v;
	}
}

?>
<div class="container-fluid">
	<p>Name: <b><?php echo ucwords($name) ?></b></p>
	<p>Gender: <b><?php echo ucwords($GENDER) ?></b></p>
	<p>Program: <b><?php echo ucwords($PROGRAM) ?></b></p>
	<hr class="divider">
</div>
<div class="modal-footer display">
	<div class="row">
		<div class="col-md-12">
			<button class="btn float-right btn-secondary" type="button" data-dismiss="modal">Close</button>
		</div>
	</div>
</div>
<style>
	p{
		margin:unset;
	}
	#uni_modal .modal-footer{
		display: none;
	}
	#uni_modal .modal-footer.display {
		display: block;
	}
</style>
<script>
	
</script>