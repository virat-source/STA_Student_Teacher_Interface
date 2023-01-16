
<style>
	.collapse a{
		text-indent:10px;
	}
	nav#sidebar{
		background: url(assets/uploads/<?php echo $_SESSION['system']['cover_img'] ?>) !important
	}
</style>

<nav id="sidebar" class='mx-lt-5 bg-dark' >
		
		<div class="sidebar-list">
		        
				<a href="index.php?page=home" class="nav-item nav-home"><span class='icon-field'><i class="fa fa-home"></i></span> Home</a>
				<a href="search/index.php" class="nav-item nav-schedule"><span class='icon-field'><i class="fa fa-calendar-day"></i></span> Student Daily Progress Tracker</a>
				<a href="index.php?page=student_eval" class="nav-item student-evaluation"><span class='icon-field'><i class="fa fa-user-tie"></i></span>Student Evaluations</a>
				<a href="index.php?page=student_logs" class="nav-item student-logs"><span class='icon-field'><i class="fa fa-user-tie"></i></span>Student Logs</a>
				<a href="index.php?page=calendar" class="nav-item nav-schedule"><span class='icon-field'><i class="fa fa-calendar-day"></i></span> Schedule</a>
				

		</div>

</nav>
<script>
	$('.nav_collapse').click(function(){
		console.log($(this).attr('href'))
		$($(this).attr('href')).collapse()
	})
	$('.nav-<?php echo isset($_GET['page']) ? $_GET['page'] : '' ?>').addClass('active')
</script>
