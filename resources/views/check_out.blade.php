<!DOCTPE html>
<html>
<head>
   <title>รายชื่อผู้ป่วย</title>
   <link rel="stylesheet" href="{{url('bootstrap/css/bootstrap.min.css')}}">
   <link rel="stylesheet" href="{{url('stylesheet.css')}}">
</head>
<div class="container">
   <div class="row">
      <div class="col-lg-12 col-12">
         <div class="txt">
          รายการชำระเงิน
       </div> 
       <div id="checkout">
         <?php $no=1;?>
         @foreach ($patient as $user)
         <div class="row txt-xm p-1">
            <div class="col-6">{{ $user->firstname." ".$user->lastname }}</div>
            <div class="col-6"><button  class="btn tx-btn view" data-id="{{ $user->uid }}">ชำระเงิน สั่งยา</button></div>
            <!-- <div class="col-6"><a href = 'delete/{{ $user->uid }}' class="btn txt-btn" data-code="{{ $user->uid }}">View</a></div> -->
            <!-- <div class="col-6"><a class="btn txt-btn view" data-id="{{$user->uid }}">View</button></div> -->
            </div>
            <?php   $no++;?>
            @endforeach
         </div>
         <body>
         </div>
      </div>
   </div>
</div>
<div class="modal" tabindex="-1" role="dialog" id="alert_phamacy">
 <div class="modal-dialog modal-lg" role="document">
  <div class="modal-content">

     <div class="modal-body">
        <div class="txt-h">
         ชำระเงินและสั่งยา
      </div>
      <div class="txt-b"> 
         ชื่อ นามสกุล
      </div>
      <div id="firstname_label" class="txt-xm">
      </div>
      <div class="txt-b">
         อาการของโรค
      </div>
      <div id="symptoms_label" class="txt-xm">
      </div>
      <div class="txt-b">
         รายการยา
      </div>
      <div class="row">
         <div class="col-12">
            <table class="table txt-xm">
               <tr class="bg-light">
                <td>ลำดับ</td>
                <td>รายการยา</td>
                <td>จำนวน</td>
                <td></td>
             </tr>
             <tr>
               <td>
               </td>
               <td>
                 <select class="txt-xm form-control">
                  <option>ระบุยา</option>
               </select>
            </td>
            <td>
               <select class="txt-xm form-control">
                  <option>จำนวน</option>
               </select>
            </td>
            <td>
              <button class="btn btn-violet">+</button>
           </td>
        </tr>
     </table>
  </div>



</div>
<div class="txt-b">
   ค่าตรวจรักษา
</div>
<div class="row">
   <div class="col-6">
      <div class="form-group">
       <select class="txt-xm form-control">
         <option>วินิจฉัยโรค</option>
      </select>
   </div>
</div>
<div class="col-6">
   <div class="form-group">
    <select class="txt-xm form-control">
      <option>วินิจฉัยโรค</option>
   </select>
</div>
</div>
<div class="col-12">
   <div class="form-group txt-b">
      หมายเหตุ
      <textarea class="form-control txt-xm"></textarea>
   </div>
</div>
</div>
<div class="text-right">
   <div class="form-group">
    <button type="button" class="btn btn-danger txt-xm" data-dismiss="modal">ยกเลิก</button>
    <button type="button" class="btn btn-violet txt-xm" >ยืนยัน</button>
 </div>
</div>

</div>

</div>
</div>
</div>
</div>
</body>
</html>
<script src="{{url('assets/js/jquery-1.11.2.min.js')}}"></script>
<script src="{{url('assets/js/bootstrap.min.js')}}"></script>
<script src="{{url('node_modules/socket.io/node_modules/socket.io-client/socket.io.js')}}"></script>
<script>

   var socket = io.connect( 'http://'+window.location.hostname+':3000' );
   socket.on('new_message_on', function(data) {
     $.ajax({
        type  : 'get',
        url   : '{{url('get_patient')}}',
        async : false,
        dataType : 'json',
        success : function(data){
         var get_patient="";
         for (var i = 0; i < data.length; i++) {
            get_patient += '<div class="row txt-xm p-1"><div class="col-6">'+data[i].firstname+" "+data[i].lastname+'</div><div class="col-6"><button class="btn txt-btn view" data-id="'+data[i].uid+'">view</button></div></div>';
         }
         $('#queue_old').html(get_patient);
      }
   });
  });



   $('#checkout').on('click','.view', function(){
     var id=$(this).data('id');
     $.ajax({
        type  : 'get',
        url   : '{{url('delete')}}/'+id+'',
        async : false,
        dataType: 'json',
        success : function(data){
         $('#firstname_label').html(data[0]['firstname']+" "+data[0]['lastname']);
         $('#symptoms_label').html(data[0]['symptoms']);
         $('#alert_phamacy').modal('show');
         console.log(data[0]['firstname'])
         // for (var i = 0; i < data.length; i++) {
         //    get_patient += '<div class="row txt-xm p-1"><div class="col-6">'+data[i].firstname+" "+data[i].lastname+'</div><div class="col-6"><button class="btn txt-btn view" data-id="'+data[i].uid+'">view</button></div></div>';
         // }
         // $('#queue_old').html(get_patient);
      }
   });
  });
</script>