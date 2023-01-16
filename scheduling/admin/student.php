<?php include('db_connect.php');


?>



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
						<b>STA Student List</b>
						<span class="">

							<button class="btn btn-primary btn-block btn-sm col-sm-2 float-right" type="button" id="new_student" onclick="location.href='save_student/index.php'">
					<i class="fa fa-plus"></i> New</button>
				</span>
					</div>
					<div class="card-body">
						
						<table class="table table-bordered table-condensed table-hover">
							<colgroup>
								<col width="5%">
								<col width="50%">
								<col width="20%">
								<col width="10%">
								<col width="15%">
							</colgroup>
							<thead>
								<tr>
									<th class="text-center">#</th>
									<th class="">Name</th>
									<th class="">Program</th>
									<th class="">Gender</th>
									<th class="text-center">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								$i = 1;
								$student =  $conn->query("SELECT *,concat(LASTNAME,', ',FIRSTNAME,' ',MIDDLENAME) as name from student_info order by concat(LASTNAME,', ',FIRSTNAME,' ',MIDDLENAME) asc");
								while($row=$student->fetch_assoc()):
								?>
								<tr>
									
									<td class="text-center"><?php echo $i++ ?></td>
								
									<td class="">
										 <p><b><?php echo ucwords($row['name']) ?></b></p>

										 </td>
									<td class="">
										 <p><b><?php echo ucwords($row['PROGRAM']) ?></b></p>

										 <td class="">
										 <p><b><?php echo ucwords($row['GENDER']) ?></b></p>
										 
								 	</td>
									<td class="text-center">
										<button class="btn btn-sm btn-outline-primary view_student" type="button" data-id="<?php echo $row['STUDENT_ID'] ?>" >View</button>

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

</div>
<style>
	
	td{
		vertical-align: middle !important;
	}
	td p{
		margin: unset
	}
	img{
		max-width:100px;
		max-height: :150px;
	}
</style>
<script>
	$(document).ready(function(){
		$('table').dataTable()
	})
	$('.view_student').click(function(){
		uni_modal("Student Details","view_student.php?id="+$(this).attr('data-id'),'')
		
	})
	$('.edit_student').click(function(){
		uni_modal("Manage Job Post","manage_student.php?id="+$(this).attr('data-id'),'mid-large')
		
	})
	$('.delete_student').click(function(){
		_conf("Are you sure to delete this topic?","delete_student",[$(this).attr('data-id')],'mid-large')
	})

	function delete_student($id){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_student',
			method:'POST',
			data:{id:$id},
			success:function(resp){
				if(resp==1){
					alert_toast("Data successfully deleted",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
			}
		})
	}
</script>