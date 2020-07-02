   <link rel="stylesheet" href="http://localhost/blog/public/bootstrap/css/bootstrap.min.css">
   <link rel="stylesheet" href="http://localhost/blog/public/stylesheet.css">

   <style type="text/css">
     .txt-h{
      font-family: Prompt_re;
      font-size: 28px;
   }
   .txt{
      font-family: Prompt_re;
      font-size: 20px;
   }
   .txt-sm{
      font-family: Prompt_re;
      font-size: 16px;
   }
</style>




<div class="container">
   <div class="txt">
      ส่วนแพทย์
   </div>
</div>

<script src="{{url('assets/js/jquery-1.11.2.min.js')}}"></script>
<script src="{{url('assets/js/bootstrap.min.js')}}"></script>
<script src="{{url('node_modules/socket.io/node_modules/socket.io-client/socket.io.js')}}"></script>
<script>
 var socket = io.connect( 'http://'+window.location.hostname+':3000' );
 socket.on( 'new_message_on', function(data) {
   alert('xxxxx');
});