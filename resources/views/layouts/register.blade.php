  <div class="row">
     <div class="col-6 txt-h">
      ลงทะเบียนผู้ป่วย
   </div>

   <div class="col-6 txt-xm">
      <input type="checkbox" name=""> ผู้ป่วยเก่า
      <input type="checkbox" name=""> ผู้ป่วยใหม่
   </div>
</div>
<div class="card card-primary">

   <!-- /.card-header -->
   <!-- form start -->
   <form>
     <div class="card-body">
      <div class="form-group txt-sm">
       ค้นหาผู้ป่วย
       <input type="text" class="form-control" name="seach_patient" id="seach_patient">

    </div>

    <div class="txt-xm">
      <input type="checkbox"> ค้นหาด้วยชื่อ-นามสกุล
   </div>
   <div class="txt-xm">
    <input type="checkbox"> เลข HN
 </div>
 <div class="txt-xm">
    <input type="checkbox"> เลขบัตรประจำตัวประชาชน
 </div>

 <div class="form-group text-center">
   <button class="btn btn-violet" id="search" type="button">ค้นหา</button>
</div>
</div>
<!-- /.card-body -->



</form>
</div>











<div class="row">


   <div class="col-12 ">
    

     




    <form action = "{{url('save_new_patient')}}" method = "post" id="register">

      <div class="card bg-light">
         <div class="card-body">

            <div class="txt-h">
               ข้อมูลผู้ป่วย
            </div>

            <div class="row">
               <div class="col-lg-4 col-12 txt-sm">
                 HN
                 <input type="text" class="form-control txt-sm" placeholder="HN" name="hn" id="hn">
                 <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
              </div>
              <div class="col-lg-4 col-12 txt-sm">
               <div class="form-group">
                  เลขบัตรประจำตัวประชาชน
                  <input type="text" class="form-control txt-xm" placeholder="เลขบัตรประจำตัวประชาชน" name="id_card" id="id_card">
               </div>
            </div>

            <div class="col-lg-4 col-12 txt-sm">
               <div class="form-group">
                  ชื่อจริง
                  <input type="text" class="form-control txt-xm" placeholder="ระบุชื่อผู้ป่วย" name="firstname" id="firstname">
               </div>
            </div>


            <div class="col-lg-4 col-12 txt-sm">
               <div class="form-group">
                  นามสกุล
                  <input type="text" class="form-control txt-xm" placeholder="ระบุนามสกุล" name="lastname" id="lastname">
               </div>
            </div>

            <div class="col-lg-4 col-12 txt-sm">
               <div class="form-group">
                  วันเดือนปีเกิด
                  <input type="text" class="form-control txt-xm" placeholder="วันเดือนปีเกิด" name="birthdate" id="birthdate">
               </div>
            </div>

            <div class="col-lg-4 col-12 txt-sm">
               <div class="form-group">

                  อายุ
                  <input type="text" class="form-control txt-xm" placeholder="อายุ" name="age" id="age">
               </div>
            </div>

            <div class="col-lg-4 col-12 txt-sm">
               <div class="form-group">
                  ศาสนา
                  <input type="text" class="form-control txt-xm" placeholder="ศาสนา" name="religion" id="religion">
               </div>
            </div>

            <div class="col-lg-8 col-12 txt-sm">
               <div class="form-group">
                สัญชาต
                <input type="text" class="form-control txt-xm" placeholder="สัญชาติ" name="nationality" id="nationality">
             </div>
          </div>
       </div>
    </div>
 </div>


 <div class="row">

   <div class="col-lg-12 col-12 txt-sm">
      <div class="txt-h">
         ประวัติผู้ป่วย
      </div>
   </div>


   <div class="col-lg-4 col-12 txt-sm">
      <div class="form-group">
         Weight(น้ำหนัก):
         <input type="text" class="form-control txt-xm" placeholder="น้ำหนัก" name="nationality" id="nationality">
      </div>
   </div>
   <div class="col-lg-4 col-12 txt-sm">
      <div class="form-group">
         Height(ส่วนสูง):
         <input type="text" class="form-control txt-xm" placeholder="ส่วนสูง" name="nationality" id="nationality">
      </div>
   </div>

   <div class="col-lg-4 col-12 txt-sm">
      <div class="form-group">
         Blood Presure(ความดันโลหิต)
         <input type="text" class="form-control txt-xm" placeholder="ความดันโลหิต" name="nationality" id="nationality">
      </div>
   </div>

   <div class="col-lg-4 col-12 txt-sm">
      <div class="form-group">
       อัตราการเต้นของหัวใจ
       <input type="text" class="form-control txt-xm" placeholder="อัตราการเต้นของหัวใจ" name="nationality" id="nationality">
    </div>
 </div>


 <div class="col-lg-6 col-12 txt-sm">
   <div class="form-group">
      1. อาการผิดปกติที่มี
      <input type="text" class="form-control txt-xm" placeholder="อาการผิดปกติที่มี" name="nationality" id="nationality">
   </div>
</div>


<div class="col-12 txt-sm">
   <div class="form-group">
      1.1 โรคประจำตัวที่มี
      <input type="text" class="form-control txt-xm" placeholder="โรคประจำตัวที่มี" name="nationality" id="nationality">
   </div>
</div>

<div class="col-12 txt-sm">
   <div class="form-group">
    1.2 ยาที่ใช้เป็นประจำ
    <input type="text" class="form-control txt-xm" placeholder="ยาที่ใช้เป็นประจำ" name="nationality" id="nationality">
 </div>
</div>

<div class="col-12 txt-sm">
   <div class="form-group">
      1.3 ประวัติการแพ้ยา แพ้อาหาร แพ้วัคซีน
      <input type="text" class="form-control txt-xm" placeholder="ประวัติการแพ้ยา แพ้อาหาร แพ้วัคซีน" name="nationality" id="nationality">
   </div>
</div>

<div class="col-12 txt-sm">
   <div class="form-group">
      1.4 ประวัติการเจ็บป่วยในอดีต
      <input type="text" class="form-control txt-xm" placeholder="ประวัติการเจ็บป่วยในอดีต" name="nationality" id="nationality">
   </div>
</div>

<div class="col-12 txt-sm">
   <div class="form-group">
      1.4 อุบัติเหตุ
      <input type="text" class="form-control txt-xm" placeholder="อุบัติเหตุ" name="nationality" id="nationality">
   </div>
</div>

<div class="col-12 txt-sm">
   <div class="form-group">
      1.4 การผ่าตัด
      <input type="text" class="form-control txt-xm" placeholder="การผ่าตัด" name="nationality" id="nationality">
   </div>
</div>
<div class="col-12 txt-sm">
   <div class="form-group">
      ประวัติการสูบบุหรี่
      <input type="checkbox" name=""> สูบ
      <input type="checkbox" name=""> ไม่สูบ
      <input type="checkbox" name=""> เลิกสูบ
      <input type="checkbox" name=""> ไม่มีข้อมูล
   </div>
</div>
<div class="col-12 txt-sm">
   <div class="form-group">
      ประวัติการออกกำลังกาย
      <input type="text" class="form-control txt-xm" placeholder="ประเภทของการออกกำลังกาย" name="nationality" id="nationality">
   </div>
</div>



</div>
</form>
</div>

<div class="col-lg-3 col-6">

   <div class="txt">
      ประวัติการเจ็บป่วย
   </div>
   {!!$disease!!}
</div>
<div  class="col-3">
   <div class="txt">
      ประวัติการแพ้ยา
   </div>
   {!!$drug_allergy!!}
</div>
<div class="col-lg-3 col-6">
 <div class="txt">
   ใบรับรองแพทย์
</div>
<div class="txt-xm">
  <input type="checkbox"> ไม่รับเอกสาร
</div>
<div class="txt-xm">
  <input type="checkbox"> เพื่อสมัครงาน
</div>
<div class="txt-xm">
  <input type="checkbox"> ลางาน
</div>
<div class="txt-xm">
  <input type="checkbox"> ทำใบขับขี่
</div>
<div class="txt-xm">
  <input type="checkbox"> ทำประกันชีวิต
</div>
<div class="txt-xm">
  <input type="checkbox"> เคลมประกัน
</div>
</div>
<div class="col-3">
  <div class="txt">
   ชำระเงิน
</div>
{!!$payment!!}
</div>
<div class="form-group text-right">
   <button class="btn btn-danger txt-danger" id="cancel"/>ยกเลิก</button>
   <button class="btn btn-violet" id="save" type="button">ลงทะเบียน</button>
</div>

</form>
</div>

<div class="modal" tabindex="-1" role="dialog" id="search_modal">
   <div class="modal-dialog modal-lg" role="document">
     <div class="modal-content">

      <div class="modal-body">
         <div class="txt-h">ผลการค้นหา</div>
         <div id="list" class="txt-xm"></div>
      </div>
      <div class="modal-footer">

         <button type="button" class="btn btn-secondary" data-dismiss="modal">ตกลง</button>
      </div>
   </div>
</div>
</div>


<script src="{{url('assets/js/jquery-1.11.2.min.js')}}"></script>
<script src="{{url('bootstrap/js/bootstrap.min.js')}}"></script>

<script src="{{url('node_modules/socket.io/node_modules/socket.io-client/socket.io.js')}}"></script>
<script type="text/javascript">
  $(document).ready(function(){
   var socket = io.connect( 'http://'+window.location.hostname+':3000' );

   $('#add_btn').click(function(){
    $.ajax({
      type  : 'post',
      url   : '{{url('add')}}',
      headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
      data: {
         '_token': "{{ csrf_token() }}",
         'add': $('#add').val()
      },
      dataType : 'json',
      success : function(data){
         $('#list').html(data);
         $('#search_modal').modal('show');

      }
   });
 });

   $('#search').click(function(){
    // var txt_patient=;
    $.ajax({
      type  : 'post',
      url   : '{{url('search_patient')}}',
      headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
      data: {
         '_token': "{{ csrf_token() }}",
         'txt_patient': $('#seach_patient').val(),
      },
      dataType : 'json',
      success : function(data){
         $('#list').html(data);
         $('#search_modal').modal('show');

      }
   });
 });


   $('#cancel').click(function(){
      $('#register')[0].reset();

   })
   $('#save').click(function(){

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

      //  alert('dddd');
      //  socket.emit('new_message_on',{
      //    name: "dddd",
      // }); 
   }

});
})
</script>