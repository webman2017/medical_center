<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>วิธีชำระเงิน</title>
</head>
<body id="page-top">
  <div id="wrapper">
    <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{url('/')}}">
       <div class="sidebar-brand-text mx-3">{{Session::get('name')}}</div>
    </a>
    @include('admin.left_nav')

    <div id="" class="d-flex flex-column">
      <div id="conten-wrapper">
        @include('admin.nav_bar')
        <div class="login-h">เพิ่มอาการแพ้ยา</div>
        <div class="row">

           <div class="col-6">
            <div class="form-group">
               <input type="text" class="form-control bk-txt" name="name" id="name">
            </div>
         </div>
         <div class="col-6">
            <div class="form-group">
             <input type="text" class="form-control">
          </div>
       </div>

    </div>
    <div class="container-fluid">
      <button class="btn btn-success" id="save_allergy">บันทึก</button>
      <div class="d-sm-flex align-items-center justify-content-between">
         <div class="txt-h">อาการแพ้ยา</div>
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
<script src="{{url('admin/vendor/chart.js/Chart.min.js')}}"></script>
<script src="{{url('admin/js/demo/chart-area-demo.js')}}"></script>
<script src="{{url('admin/js/demo/chart-pie-demo.js')}}"></script>


<script type="text/javascript">
   $(document).ready(function(){





     $('#doctor_list').on('click','.del_allergy', function(){
       var id=$(this).data('code');

     // alert(id);
     $.ajax({
        type  : 'get',
        url   : '{{url('allergy_delete')}}/'+id+'',
        async : false,
        dataType : 'json',
        success : function(data){


         $.ajax({
           type  : 'get',
           url   : '{{url('get_drug_allergy')}}',
           async : false,
           dataType : 'json',
           success : function(data){;
            $('#doctor_list').html(data);
         }
      });



      }
   });
  });

     $.ajax({
        type  : 'get',
        url   : '{{url('get_drug_allergy')}}',
        async : false,
        dataType : 'json',
        success : function(data){;
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



     $('#save_allergy').click(function(){
      var name=$('#name').val();

      $.ajax({
         type  : 'post',
         url   : '{{url('save_allergy')}}',
         headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
         data: {
            '_token': "{{ csrf_token() }}",
            'name': name,},
            dataType : 'json',
            success : function(data){
               if(data.success==true){
                  alert(data.message);

                  $.ajax({
                    type  : 'get',
                    url   : '{{url('get_drug_allergy')}}',
                    async : false,
                    dataType : 'json',
                    success : function(data){;
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
