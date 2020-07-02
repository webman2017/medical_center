<!DOCTYPE html>
<html>
<head>
   <title>ลงทะเบียนผู้ป่วย</title>
   <link rel="stylesheet" href="{{url('bootstrap/css/bootstrap.min.css')}}">
   <link rel="stylesheet" href="{{url('stylesheet.css')}}">
</head>
<body>
   <div class="containe-fluid menu" style="background-color: #808080;">
      <div class="container">
         <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <!-- <a class="navbar-brand" href="#">Navbar</a> -->
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
           <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
           <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
               <a class="nav-link" href="#">ลงทะเบียนผู้ป่วยเก่า/ใหม่</span></a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="#">รับยาชำระเงิน</a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="#">พบแพทย์</a>
            </li>
         </ul>
         <ul class="navbar-nav my-2 my-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="{{url('logout')}}">ออกจากระบบ</a>
         </li>
      </ul>
   </div>
</nav>
</div>
</div>




<div class="container-fluid mt-1">
   <div class="container">
      <div class="row">
         <div class="col-6">

         </div>
         <div class="col-6">
            <div class="txt-sm text-right">
               วันเดือนปี {{date('Y-m-d')}}
            </div>
         </div>
      </div>

      <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
         <a class="nav-link active txt-tap" id="register-tab" data-toggle="tab" href="#register" role="tab" aria-controls="home" aria-selected="true">ลงทะเบียนผู้ป่วย</a>
      </li>
      <li class="nav-item">
       <a class="nav-link txt-tap" id="doctor-tab" data-toggle="tab" href="#doctor" role="tab" aria-controls="profile" aria-selected="false">ผู้ป่วยส่งห้องหมอ</a>
    </li>
    <li class="nav-item">
       <a class="nav-link txt-tap" id="cashier-tab" data-toggle="tab" href="#cashier" role="tab" aria-controls="contact" aria-selected="false">ชำระเงิน</a>
    </li>
 </ul>
 <div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="register" role="tabpanel" aria-labelledby="home-tab">
   @include('layouts.register')

</div>
<div class="tab-pane fade" id="doctor" role="tabpanel" aria-labelledby="profile-tab">

  @include('list_view')

</div>
<div class="tab-pane fade" id="cashier" role="tabpanel" aria-labelledby="contact-tab">
  @include('check_out')
</div>
</div>





</div>
</div>

<div class="modal" tabindex="-1" role="dialog" id="alert-modal">
   <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
       </button>
    </div>
    <div class="modal-body">
      <div class="txt-xm text-center" id="txt-alert">

      </div>
      <div class="text-right">
         <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
         <button type="button" class="btn btn-danger" data-dismiss="modal">ตกลง</button>
      </div>
   </div>



</div>
</div>
</div>





</body>
</html>

<script src="{{url('assets/js/jquery-1.11.2.min.js')}}"></script>
<script src="{{url('bootstrap/js/bootstrap.min.js')}}"></script>

<script src="{{url('node_modules/socket.io/node_modules/socket.io-client/socket.io.js')}}"></script>
<script type="text/javascript">
  $(document).ready(function(){
   var socket = io.connect( 'http://'+window.location.hostname+':3000' );

   $('#cancel').click(function(){
      $('#register')[0].reset();

   })
   $('.txt-btn').click(function(){

      if($('#id_card').val()==""){
         $('#txt-alert').html('ระบุเลขที่บัตรประจำตัวประชาชน');
         $('#alert-modal').modal('show');

      }else if($('#firstname').val()==""){
         $('#txt-alert').html('ระบุชื่อจริง');
         $('#alert-modal').modal('show');

      }else if($('#lastname').val()==""){

         $('#txt-alert').html('ระบุนามสกุล');
         $('#alert-modal').modal('show');

      }else if($('#religion').val()==""){

         $('#txt-alert').html('ระบุศาสนา');
         $('#alert-modal').modal('show');

      }else if($('#nationality').val()==""){

        $('#txt-alert').html('ระบุสัญชาติ');
        $('#alert-modal').modal('show');
     }else{

        $('#register').submit();

      // alert('dddd');
      socket.emit('new_message_on',{
         name: "dddd",
      }); 
   }
   
});
})



</script>