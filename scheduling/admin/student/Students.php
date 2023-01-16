
<script>
    $(document).ready(function(){

    $(document).on('click', '#getUser', function(e){
  
     e.preventDefault();
  
     var uid = $(this).data('id');      
 
     $.ajax({
          url: 'view_students.php',
          type: 'POST',
          data: 'id='+uid,
          beforeSend:function()
{
 $("#content").html('Working on Please wait ..');
},
success:function(data)
{
   $("#content").html(data);
},
     })

    });
})
  </script>
   <?php
  include 'newstudent.php';
  ?>

          <h1 class="page-header">STUDENTS <button style="float:right" type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">
      <i class="glyphicon glyphicon-plus"></i> New Entry</button></h1>
  
 

<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
    
     
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">New Students</h4>
        </div>
        <div class="modal-body">

 

        
 <form class="form-horizontal" method="post">
<fieldset>
<div class="container">

<div class="col-md-12" style="width:70%;border-bottom:1px solid #333">
<h4><b>Student's Personal Details </b></h4>
</div>
<br>
<br>
<div class="col-md-4">
<br>
<div class="form-group">
  <label class="col-xs-4 control-label" for="lrn">LRN Number</label>  
  <div class="col-xs-6">
  <input id="lrn" name="lrn" type="text" placeholder="Enter LRN " maxlength="12" class="form-control input-xs" required="">
  </div>
</div>

<!-- Prepended text-->
<div class="form-group">
  <label class="col-xs-4 control-label" for="name">Name</label>
  <div class="col-xs-8">
    <div class="input-group">
      <input id="name" class="form-control input-xs"
      style="text-transform: capitalize;" name="lname" placeholder="Lastname"  type="text" required="">
      <input id="name" class="form-control input-xs"
      style="text-transform: capitalize;" name="fname" placeholder="Firstname"  type="text" required="">
      <input id="name" class="form-control input-xs"
      style="text-transform: capitalize;" name="mname" placeholder="Middlename"  type="text" required="">

    </div>
  </div>
</div>

<div class="form-group">
  <label class="col-xs-4 control-label" for="gender">Gender</label>
  <div class="col-xs-4">
    <select id="gender" name="gender" class="form-control input-xs">
      <option value="MALE">Male</option>
      <option value="FEMALE">Female</option>
    </select>
  </div>
</div>


<br><br>
<div class="form-group">
  <label class="col-xs-4 control-label" for="Prog">Curriculum</label>
  <div class="col-xs-4">
    <select id="prog" name="prog" class="form-control input-xs" required="">
    <option></option>
    <?php
    include 'db.php';
    $sql = mysqli_query($conn,"SELECT * from program Order by PROGRAM ASC");
    while($row=mysqli_fetch_assoc($sql)){
    ?>
      <option value="<?php echo $row['PROGRAM_ID'] ?>"><?php echo $row['PROGRAM'] ?></option>
      <?php
    }
    mysqli_close($conn);
      ?>
    </select>
  </div>
</div>


</div>
</fieldset>





        </div>
        <div class="modal-footer">
        <!--<input type="reset" class="btn btn-success " id="reset" name="reset" value="Reset Form">-->
      <input type="submit" class="btn btn-success " name="submitb" value="Submit Form">
      
        </form>
          <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
        </div>
      </div>
      
    </div>
  </div>



       <div class="col-md-12">
          
       <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Students List</h3>

        </div> 
        <div class="panel-body"> 
  <table id="students" class="table table-bordered table-condensed">
    <thead>
      <tr id="heads">
        <th style="width:10%;text-align:center">LRN NO.</th>
        <th style="width:30%;text-align:center">Name</th>
        <th style="width:20%;text-align:center">Curriculum</th>
        <th style="width:10%"></th>
      </tr>
    </thead>
    <tbody>
    <?php
    include 'db.php';
    $sql=  mysqli_query($conn, "SELECT * FROM student_info order by LASTNAME ");
    while($row = mysqli_fetch_assoc($sql)) {
      $sid = $row['STUDENT_ID'];
      $sql2=  mysqli_query($conn, "SELECT * FROM program WHERE PROGRAM_ID = '".$row['PROGRAM']."' ");
         while($row2 = mysqli_fetch_assoc($sql2)) {    


    ?>
      <tr>


        <td><?php echo $row['LRN_NO'] ?></td>
        <td><?php echo $row['LASTNAME'] . ', ' . $row['FIRSTNAME']. ' ' . $row['MIDDLENAME'] ?></td>
        
        <td style="text-align:center"><?php echo $row2['PROGRAM'] ?></td>
        
     
      <td style="text-align:center"> 
     <a  class="btn btn-info" data-toggle="modal" data-target="#view-modal" data-id="<?php echo $sid ?>" id="getUser">View Profile</a>
     </td>
       </tr>

      <?php
    }
    } mysqli_close($conn);
      ?>
    </tbody>
  </table>
</div>
</div> 
</div>

       <div id="view-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog"> 
               <div class="modal-content modal-lg">  
             
                  <div class="modal-header"> 
                     <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
                     <h4 class="modal-title">
                     <i class=""></i> PROFILE
                     </h4> 
                  </div> 
                       <div id="content">
                      
                     </div>
                  
                                 
              </div> 
            </div>
          </div>  



<script type="text/javascript">
        $(function() {
            $("#students").dataTable(
        { "aaSorting": [[ 2, "asc" ]] }
      );
        });
    </script>
