<!DOCTPE html>
<html>
<head>
   <title>รายชื่อผู้ป่วย</title>
   <link rel="stylesheet" href="{{url('bootstrap/css/bootstrap.min.css')}}">
   <link rel="stylesheet" href="{{url('stylesheet.css')}}">
</head>

<div class="container">
   <div class="row">
      <div class="col-lg-5 col-12">
       <div class="txt-h">
         ส่งผู้ป่วยเข้าห้องตรวจ
      </div>
      <div class="txt-patient-list">
         สำหรับพยาบาลส่งคนไข้เข้าห้องแพทย์
      </div> 
      <div id="patient_list">
      </div>
   </div>
   <div class="col-lg-7 col-12">
      <div class="txt-h">
       ห้องตรวจ
       <div class="row">
         {!!$doctor!!}
      </div>
   </div>
</div>
</div>
</div>
<div class="modal" id="sendtosuccess">
   <div class="modal-dialog  modal-sm">
     <div class="modal-content">
      <div class="modal-body txt-xm">
         <div id="message" class="text-center"></div>
         <div class="text-center">
            <button type="button" class="btn btn-danger" data-dismiss="modal">ตกลง</button>
         </div>
      </div>
   </div>
</div>
</div>

<input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
<input type="hidden" name="patient" id="patient_room_a">
<script src="{{url('assets/js/jquery-1.11.2.min.js')}}"></script>
<script src="{{url('assets/js/bootstrap.min.js')}}"></script>
<script src="{{url('node_modules/socket.io/node_modules/socket.io-client/socket.io.js')}}"></script>
<script>

   $(document).ready(function(){
     var socket = io.connect( 'http://'+window.location.hostname+':3000' );
     $.ajax({
       type  : 'get',
       url   : '{{url('get_patient')}}',
       async : false,
       dataType : 'json',
       success : function(data){
         console.log(data);
         $('#patient_list').html(data);
      }
   });

     socket.on('new_message_on', function(data) {
      alert('sssss');
      $.ajax({
       type  : 'get',
       url   : '{{url('get_patient')}}',
       async : false,
       dataType : 'json',
       success : function(data){
        $('#patient_list').html(data);
     }
  });
   });

     $('#patient_list').on('click','.view', function(){
       var id=$(this).data('id');

       $('#patient_room_a').val(id);
       $(this).html('Selected');
       $(this).removeClass('btn-violet-list');
       $(this).addClass('btn-success-list');
    });
     $('.send').click(function(){
      var room =$(this).data('code');
   // alert(room);
   var patient= $('#patient_room_a').val();
   if(patient=="" || patient ==null){
     $('#message').html('กรุณาระบุคนไข้');
     $("#sendtosuccess").modal('show');
  }else{
   $.ajax({
      type  : 'post',
      url   : '{{url('sendtoroom')}}',
      headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
      data: {
         '_token': "{{ csrf_token() }}",
         'patient': patient,
         'room':room},
         dataType : 'json',
         success : function(data){
            // alert('ส่งเข้าห้องสำเร็จ');
            $('#patient_room_a').val('');

            $('#message').html('ส่งเข้าห้องสำเร็จ');
            $("#sendtosuccess").modal('show');
            $('#sendtosuccess').delay(1000).fadeOut(450);

            setTimeout(function(){
              $('#sendtosuccess').modal("hide");
           }, 1500);
            // $('#sendtosuccess').modal('show')
            // console.log(data)
            $.ajax({
             type  : 'get',
             url   : '{{url('get_patient')}}',
             async : false,
             dataType : 'json',
             success : function(data){
               console.log(data);
               $('#patient_list').html(data);
            }
         });

         }
      });
}
});
  });
</script>