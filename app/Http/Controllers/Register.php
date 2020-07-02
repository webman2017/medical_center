<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Session;
use DB;
use PDF;
class Register extends Controller
{

   public function register()
   {
      $value = Session::get('username');
      $disease = DB::select('select * from ms_disease');
      $payment = DB::select('select * from ms_payment_method');
      $drug_allergy = DB::select('select * from ms_drug_allergy');
      $users = DB::select('select * from ms_patient inner join tr_patient on ms_patient.uid=tr_patient.ms_patient_uid');
      $disease_list="";
      $payment_list="";
      $drug_allergy_list="";
      $doctor_list="";
      foreach ($disease as $disease) {
         $disease_list.='<div class="txt-xm"><input type="checkbox" > '.$disease->description.'</div>';
      }
      foreach ($payment as $payment) {
         $payment_list.='<div class="txt-xm"><input type="checkbox" > '.$payment->description.'</div>';
      }
      foreach ($drug_allergy as $drug_allergy) {
         $drug_allergy_list.='<div class="txt-xm"><input type="checkbox"> '.$drug_allergy->description.'</div>';
      }
      $patient = DB::select('select * from ms_patient inner join tr_patient on ms_patient.uid=tr_patient.ms_patient_uid');

      $doctor=DB::select('select * from ms_doctor');
      foreach ($doctor as $doctor) {
         $doctor_list.='<div class="col-lg-4 col-12 mb-2">
         <div class="card ">
         <div class="card-body"><div class="txt-xm">'.$doctor->name.$doctor->surname.'</div>
         <button class="btn btn-violet send"  data-code="'.$doctor->uid.'">select</button>
         </div>
         </div>
         </div>';
      }
      return view('register')
      ->with(['disease'=>$disease_list])
      ->with(['payment'=>$payment_list])
      ->with(['drug_allergy'=>$drug_allergy_list])
      ->with(['users'=>$users])
      ->with(['patient'=>$patient])
      ->with(['doctor'=>$doctor_list]);
   }

   public function get_doctor_id($id){
      $doctor = DB::select('select * from ms_doctor where uid="'.$id.'"');
      return response()->json($doctor);
   }
   public function doctor_delete($id){
      $doctor = DB::delete('delete  from ms_doctor where uid="'.$id.'"');
      return response()->json(array(
        'success' => true));
   }
   public function allergy_delete($id){
      $doctor = DB::delete('delete  from ms_drug_allergy where uid="'.$id.'"');
      return response()->json(array(
        'success' => true));
   }
   public function check_out()
   {
      $users = DB::select('select * from ms_patient inner join tr_patient on ms_patient.uid=tr_patient.ms_patient_uid');
      return view('check_out',['users'=>$users]);
   }

   public function search_patient(Request $request){
      $txt_patient=$request->input('txt_patient');

      $search_patient_list='';
      $patient_list=DB::select('select * from ms_patient where firstname like "%'.$txt_patient.'%"');
      $no=1;
      if($patient_list){
         foreach ($patient_list as $result) {
            $search_patient_list.='<div class="row">
            <div class="col-1">'.$no.'</div>
            <div class="col-8">'.$result->firstname." ".$result->lastname.'</div>
            <div class="col-3"><button class="btn btn-violet">select</button></div>
            </div>';
            $no++;
         }
      }else{
         $search_patient_list='ไม่พบ';
      }
      return response()->json($search_patient_list);
   }

   public function sendtoroom(Request $request){
      $patient=$request->input('patient');
      $room=$request->input('room');
      // var_dump($patient.$idd);
      $data = array('ms_patient_uid' => $patient,
         'ms_doctor_uid'=>$room );
      DB::table('tr_room_doctor')->insertGetId($data);
      DB::update('update tr_patient set process_uid=2 where ms_patient_uid="'.$patient.'"');
      // exit();
      return response()->json(array(
        'success' => true));
  //     json(array(
  // 'success' => true,
   }

   public function payment(){
      return view('admin.payment');
   }




   public function doctor()
   {
     return view('list_view');
  }
  public function get_patient(){
   $users = DB::select('select ms_patient.uid as patient_id,ms_patient.firstname,ms_patient.lastname,
      ms_patient.uid,tr_patient.uid,tr_patient.symptoms  from ms_patient inner join tr_patient 
      on ms_patient.uid=tr_patient.ms_patient_uid where tr_patient.process_uid=1
      order by tr_patient.uid desc');
   $patient_list='';
   $no=1;
   foreach ($users as $result){
      $patient_list.='<div class="row txt-patient-list p-1">
      <div class="col-1">'.$no.'</div>
      <div class="col-4">'.$result->firstname.$result->lastname.'</div>
      <div class="col-5">'.$result->symptoms.'</div>
      <div class="col-2"><button class="btn btn-violet-list view" data-id="'.$result->patient_id.'">Select</button></div>
      </div>';
      $no++;
   }
   return response()->json($patient_list);
}
public function index()
{
   $users = DB::select('select * from tr_patient');
   // $users = DB::select('select * from tr_patient');
   return view('list_view')->with(['users'=>$users]);
        //
}

public function key_medicine(){
   Session::forget('username');
   return view('key_medicine');
}

public function save_new_patient(Request $request)
{
   $id_card = $request->input('id_card');
   $firstname = $request->input('firstname');
   $lastname = $request->input('lastname');
   $birthdate = $request->input('birthdate');
   $religion = $request->input('religion');
   $symptoms = $request->input('symptoms');
   $specialty = $request->input('specialty');
   $data=array(
     'id_card'=>$id_card,
     'firstname'=>$firstname,
     "lastname"=>$lastname,
     "birthdate"=>$birthdate,
     "images"=>1,
     "address"=>1,
     "religion"=>$religion,);


   dd($data);
   exit();
   $id =DB::table('ms_patient')->insertGetId($data);

   session(['username' => $firstname]);

   $data_patient=array(
     'ms_patient_uid'=>$id,
     'symptoms'=>$symptoms,
     'process_uid'=>1,
  );

   $id =DB::table('tr_patient')->insertGetId($data_patient);

   $data_patient=array(
     'tr_patient_uid'=>$id,
     'ms_disease_uid'=>1,
  );

   $id =DB::table('tr_patient_disease')->insertGetId($data_patient);


   $data_payment=array(
     'tr_patient_uid'=>$id,
     'ms_payment_uid'=>1,
  );

   $id =DB::table('tr_patient_payment')->insertGetId($data_payment);
      // var_dump($data);
      // exit();
      // echo "Record inserted successfully.<br/>";
      // echo '<a href = "/blog/public/list">Click Here</a> to go back.';

      // $pdf = PDF::loadView('consent_form',['data'=>$data]);
      // return $pdf->stream('test.pdf'); //แบบนี้จะ stream มา preview
      // return view('consent_form',['data'=>$data]);
   $users = DB::select('select * from ms_patient order by uid desc');
   return view('list_view',['users'=>$users]);
}




public function checkout_med(Request $request,$id)
{
   $id=$request->id;
   $data = DB::select('select * from ms_patient inner join tr_patient on ms_patient.uid=tr_patient.ms_patient_uid where tr_patient.uid = ?',[$id]);
    return response()->json($data);//then sent this data to ajax success
 }


 public function show($id)
 {

   $users= DB::select('select * from tr_patient where uid = ?',[$id]);


   $pdf = PDF::loadView('consent_form')->with(['users'=> $users]);
      return $pdf->stream('test.pdf'); //แบบนี้จะ stream มา preview
      // return response()->json($users);

   }
   public function edit($id)
   {
   }
   public function update(Request $request, $id)
   {
   }

   public function district($id)
   {

        //it will get price if its id match with product id
      $p = DB::select('select * from tr_patient where uid = ?',[$id]);

      return response()->json($p);
   }


   public function destroy($id)
   {
        //
      DB::delete('delete from student where uid = ?',[$id]);
      echo "Record deleted successfully.
      ";
      echo '<a href="http://localhost/blog/public/list">Click Here to go back.</a>';
   }

   public function save_doctor(Request $request){
      // var_dump($request);
      // exit();
      $name=$request->input('name');
      $surname=$request->input('surname');
      $specialty=$request->input('specialty');

      // var_dump($patient.$idd);
      $data = array('name' => $name,
         'surname'=>$surname,
         'specialty'=>$specialty );

      // var_dump($data);
      // exit();
      DB::table('ms_doctor')->insertGetId($data);

      return response()->json(array(
        'success' => true,'message'=>'บันทึกสำเร็จ'));
   }


   public function save_allergy(Request $request){
      $name=$request->input('name');

      // var_dump($patient.$idd);
      $data = array('description' => $name,);
      DB::table('ms_drug_allergy')->insertGetId($data);

      return response()->json(array(
        'success' => true,'message'=>'บันทึกสำเร็จ'));
   }

}
