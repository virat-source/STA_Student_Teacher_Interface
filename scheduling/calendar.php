<?php include('db_connect.php');?>
<div class="container-fluid">
	
	<div class="col-lg-12">
		<div class="row mb-4 mt-4">
			<div class="col-md-12">
				
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<b>Schedule</b>

					</div>

						<div id="calendar"></div>
					</div>
	</div>	

</div>
			<!-- Table Panel -->
		</div>
	</div>	
</div>

<script>
	 window.start_load = function(){
    $('body').prepend('<di id="preloader2"></di>')
  }
  window.end_load = function(){
    $('#preloader2').fadeOut('fast', function() {
        $(this).remove();
      })
  }
 window.viewer_modal = function($src = ''){
    start_load()
    var t = $src.split('.')
    t = t[1]
    if(t =='mp4'){
      var view = $("<video src='"+$src+"' controls autoplay></video>")
    }else{
      var view = $("<img src='"+$src+"' />")
    }
    $('#viewer_modal .modal-content video,#viewer_modal .modal-content img').remove()
    $('#viewer_modal .modal-content').append(view)
    $('#viewer_modal').modal({
            show:true,
            backdrop:'static',
            keyboard:false,
            focus:true
          })
          end_load()  

}
  window.uni_modal = function($title = '' , $url='',$size=""){
    start_load()
    $.ajax({
        url:$url,
        error:err=>{
            console.log()
            alert("An error occured")
        },
        success:function(resp){
            if(resp){
                $('#uni_modal .modal-title').html($title)
                $('#uni_modal .modal-body').html(resp)
                if($size != ''){
                    $('#uni_modal .modal-dialog').addClass($size)
                }else{
                    $('#uni_modal .modal-dialog').removeAttr("class").addClass("modal-dialog modal-md")
                }
                $('#uni_modal').modal({
                  show:true,
                  backdrop:'static',
                  keyboard:false,
                  focus:true
                })
                end_load()
            }
        }
    })
}
window._conf = function($msg='',$func='',$params = []){
     $('#confirm_modal #confirm').attr('onclick',$func+"("+$params.join(',')+")")
     $('#confirm_modal .modal-body').html($msg)
     $('#confirm_modal').modal('show')
  }
   window.alert_toast= function($msg = 'TEST',$bg = 'success'){
      $('#alert_toast').removeClass('bg-success')
      $('#alert_toast').removeClass('bg-danger')
      $('#alert_toast').removeClass('bg-info')
      $('#alert_toast').removeClass('bg-warning')

    if($bg == 'success')
      $('#alert_toast').addClass('bg-success')
    if($bg == 'danger')
      $('#alert_toast').addClass('bg-danger')
    if($bg == 'info')
      $('#alert_toast').addClass('bg-info')
    if($bg == 'warning')
      $('#alert_toast').addClass('bg-warning')
    $('#alert_toast .toast-body').html($msg)
    $('#alert_toast').toast({delay:3000}).toast('show');
  }
  $(document).ready(function(){
    $('#preloader').fadeOut('fast', function() {
        $(this).remove();
      })
  })
  $('.datetimepicker').datetimepicker({
      format:'Y/m/d H:i',
      startDate: '+3d'
  })
  $('.select2').select2({
    placeholder:"Please select here",
    width: "100%"
  })

	document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var calendar;
    start_load()
		 $.ajax({
		 	url:'admin/ajax.php?action=get_schecdule',
		 	method:'POST',
		 	data:{faculty_id: '<?php echo $_SESSION['login_id'] ?>'},
		 	success:function(resp){
		 		if(resp){
		 			resp = JSON.parse(resp)
		 					var evt = [] ;
		 			if(resp.length > 0){
		 					Object.keys(resp).map(k=>{
		 						var obj = {};
		 							obj['title']=resp[k].title
		 							obj['data_id']=resp[k].id
		 							obj['data_location']=resp[k].location
		 							obj['data_description']=resp[k].description
		 							if(resp[k].is_repeating == 1){
		 							obj['daysOfWeek']=resp[k].dow
		 							obj['startRecur']=resp[k].start
		 							obj['endRecur']=resp[k].end
									obj['startTime']=resp[k].time_from
		 							obj['endTime']=resp[k].time_to
		 							}else{

		 							obj['start']=resp[k].schedule_date+'T'+resp[k].time_from;
		 							obj['end']=resp[k].schedule_date+'T'+resp[k].time_to;
		 							}
		 							
		 							evt.push(obj)
		 					})
							 console.log(evt)

		 		}
		 				  calendar = new FullCalendar.Calendar(calendarEl, {
				          headerToolbar: {
				            left: 'prev,next today',
				            center: 'title',
				            right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
				          },
				          initialDate: '<?php echo date('Y-m-d') ?>',
				          weekNumbers: true,
				          navLinks: true,
				          editable: false,
				          selectable: true,
				          nowIndicator: true,
				          dayMaxEvents: true, 
				          events: evt,
				          eventClick: function(e,el) {
							   var data =  e.event.extendedProps;
								uni_modal('View Schedule Details','view_schedule.php?id='+data.data_id,'mid-large')

							  }
				        });
		 	}
		 	},complete:function(){
		 		calendar.render()
		 		end_load()
		 	}
		 })
		 })
</script>	
