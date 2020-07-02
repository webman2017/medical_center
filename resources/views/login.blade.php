  <link rel="stylesheet" href="{{url('bootstrap/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{url('stylesheet.css')}}">
  <div class="container">

   <!-- <form action ="{{url('check_login')}}" method="post" id="frm-login"> -->
      <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">

      <div class="col-lg-4 col-12 mx-auto">

         <div class="mt-4 text-center login-h">
            เข้าสู่ระบบ
         </div>
         <div class="form-group">
            <input type="text" name="username" class="form-control txt-login" placeholder="ระบุชื่อผู้ใช้" id="username"> 
            <div id="username-alert-txt" class="txt-alert">

            </div>
         </div>

         <div class="form-group">
            <input type="password" name="password" class="form-control txt-login" placeholder="ระบุรหัสผ่าน" id="password"> 
            <div id="password-alert-txt"  class="txt-alert">
            </div>
            <div id="message" class="txt-alert"></div>
         </div>

         <div class="form-group text-center">
            <button class="btn btn-violet" id="login" type="button">ยืนยัน</button>
         </div>
      </div>

   </div>
   <!-- </form> -->

</div>

<script src="{{url('assets/js/jquery-1.11.2.min.js')}}"></script>
<script src="{{url('assets/js/bootstrap.min.js')}}"></script>
<script type="text/javascript">
   $(document).ready(function(){

     $('#login').click(function(){
      if($('#username').val()=="" && $('#password').val()==""){
         $('#username-alert-txt').html('*กรุณาระบุชื่อผู้ใช้');
         $('#password-alert-txt').html('*กรุณาระบุรหัสผ่าน');

      }else if($('#username').val()==""){
         $('#username-alert-txt').html('*กรุณาระบุชื่อผู้ใช้');

     }else if($('#password').val()==""){
      $('#password-alert-txt').html('*กรุณาระบุรหัสผ่าน');
   }else{
     var username=$('#username').val();

     var password=$('#password').val();
     $.ajax({
      type  : 'post',
      url   : '{{url('login_admin')}}',
      headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
      data: {
         '_token': "{{ csrf_token() }}",
         'username': username,
         'password': password,
      },
      dataType : 'json',
      success : function(data){
         // alert(data.success);
         if(data.success == true){
            location.href = "{{url('backend')}}";
            // window.location.href = '{{url('backend')}}';
         } else {

          $('#message').html(data.message);
       }
    //   },
    //   error: function(){
    //    alert('error!');
 }
});
  }
});
     $('#username').keyup(function(){
      if($('#username').val()==""){
        $('#username-alert-txt').html('*กรุณาระบุชื่อผู้ใช้');
     }else{
        $('#username-alert-txt').html('');
        $('#message').html('');
     }
  });
     $('#password').keyup(function(){
      if($('#password').val()==""){
        $('#password-alert-txt').html('*กรุณาระบุรหัสผ่าน');
     }else{
        $('#password-alert-txt').html('');
        $('#message').html('');
     }
  });

  });
</script>