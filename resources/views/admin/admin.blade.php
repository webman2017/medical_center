<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Backend</title>


</head>
<body id="page-top">
  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{url('/')}}">

        <div class="sidebar-brand-text mx-3">{{Session::get('name')}}</div>
     </a>

     @include('admin.left_nav')

     <!-- Content Wrapper -->
     <div id="" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        @include('admin.nav_bar')
        <!-- End of Topbar -->
        <!-- Begin Page Content -->



        <div class="container-fluid">

          <div class="d-sm-flex align-items-center justify-content-between">
            <div class="login-h">เพิ่มรายชื่อแพทย์</div>
         </div>
         <div class="card">
            <div class="card-body">
             <div class="row">
              <div class="col-2 bk-txt">
                 ระบุคำนำ
                 <select class="form-control bk-txt">
                  <option>ระบุคำนำ</option>
               </select>
            </div>
            <div class="col-5 bk-txt">
               <div class="form-group">
                  ชื่อแพทย์
                  <input type="text" name="doctor_name" class="form-control bk-txt" id="name" >
               </div>
            </div>
            <div class="col-5 bk-txt">
               <div class="form-group">
                  นามสกุลแพทย์
                  <input type="text" name="lastname" class="form-control bk-txt" id="surname">
               </div>
            </div>
            <div class="col-3 bk-txt">
               <div class="form-group">
                  ความเชี่ยวชาญ
                  <select class="form-control bk-txt" name="specialty" id="specialty">
                     <option>ระบุความเชียวชาญ</option>
                     <option value="1">1</option>
                     <option value="2">2</option>
                  </select>
               </div>
            </div>
            <div class="col-3 bk-txt">
               <div class="form-group">
                 เพศ
                 <select class="form-control bk-txt">
                  <option>ระบุเพศ</option>
                  <option>ชาย</option>
                  <option>หญิง</option>
               </select>
            </div>
         </div>

         <div class="col-3 bk-txt">
            <div class="form-group">
               ประจำห้องตรวจ
               <select class="form-control bk-txt">
                  <option>ห้อง</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
               </select>
            </div>
         </div>

         <div class="col-12 bk-txt">
            <div class="text-right">
               <button class="btn btn-success" id="save_doctor">Save</button>
            </div>
         </div>
</div>
      </div>
   </div>
</div>


<div class="login-h">
   รายชื่อแพทย์
</div>
<div class="row" id="doctor_list">
</div>

</div>
</div>

<!-- Footer -->
@include('admin.footer')
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
 <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
 <div class="modal-dialog" role="document">
   <div class="modal-content">
     <div class="modal-header">
       <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
       <button class="close" type="button" data-dismiss="modal" aria-label="Close">
         <span aria-hidden="true">×</span>
      </button>
   </div>
   <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
   <div class="modal-footer">
    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
    <a class="btn btn-primary" href="login.html">Logout</a>
 </div>
</div>
</div>
</div>






<script src="{{url('admin/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{url('admin/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{url('admin/vendor/jquery-easing/jquery.easing.min.js')}}"></script>
<script src="{{url('admin/js/sb-admin-2.min.js')}}"></script>
<!-- <script src="{{url('admin/vendor/chart.js/Chart.min.js')}}"></script> -->
<script src="{{url('admin/js/demo/chart-area-demo.js')}}"></script>
<script src="{{url('admin/js/demo/chart-pie-demo.js')}}"></script>


<script type="text/javascript">
   $(document).ready(function(){

      $('#specialty').change(function(){
         var specialty=$(this).val();
         alert(specialty);
      });



      $.ajax({
        type  : 'get',
        url   : '{{url('get_doctor')}}',
        async : false,
        dataType : 'json',
        success : function(data){

         $('#doctor_list').html(data);
      }
   });


      $('.edit').click(function(){
         var id=$(this).data('code');
         // alert(id);
         $.ajax({
           type  : 'get',
           url   : '{{url('get_doctor_id')}}/'+id+'',
           async : false,
           dataType : 'json',
           success : function(data){
            $('#name').val(data[0]['name']);
            $('#surname').val(data[0]['surname']);
            console.log(data[0]['name']);
            $('#edit_modal').modal('show');
            // $('#patient_list').html(data);
         }
      });
         // alert('xzxzx');
      });


      $('#save_doctor').click(function(){
       var specialty=$('#specialty').val();
       var name=$('#name').val();
       var surname=$('#surname').val();
       $.ajax({
         type  : 'post',
         url   : '{{url('save_doctor')}}',
         headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
         data: {
            '_token': "{{ csrf_token() }}",
            'name': name,
            'surname':surname,
            'specialty':specialty},
            dataType : 'json',
            success : function(data){
               if(data.success==true){
                  alert(data.message);

                  $.ajax({
                    type  : 'get',
                    url   : '{{url('get_doctor')}}',
                    async : false,
                    dataType : 'json',
                    success : function(data){
         // $('#name').val(data[0]['name']);
         // $('#surname').val(data[0]['surname']);
         // console.log(data[0]['name']);
         // $('#edit_modal').modal('show');
         $('#doctor_list').html(data);
      }
   });
               }
               // alert('เพิ่มหมอสำเร็จ');
               // $('#edit_modal').modal('hide');
               
            }
         });
    });



      $('#doctor_list').on('click','.del', function(){
       var id=$(this).data('code');

       alert(id);
       $.ajax({
        type  : 'get',
        url   : '{{url('doctor_delete')}}/'+id+'',
        async : true,
        dataType : 'json',
        success : function(data){
         if(data.success==true){
            alert('ลบสำเร็จ');


            $.ajax({
              type  : 'get',
              url   : '{{url('get_doctor')}}',
              async : false,
              dataType : 'json',
              success : function(data){
               $('#doctor_list').html(data);
            }
         });
         }

      }
   });
    });




   });
</script>

</body>
</html>
