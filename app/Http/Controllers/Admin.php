<?php

namespace App\Http\Controllers;
use Session;
use DB;
use Illuminate\Http\Request;

class Admin extends Controller
{
  public function index()
  {



   if(Session::has('name')){
      return view('admin/admin');
   }else{
      return redirect('/');
   }
}


public function setting(){
   return view('admin.setting');
}
public function med(){
   return view('admin.stock_med');
}



public function get_drug_allergy(){
   $doctor_list="";
   $no=1;
   $doctor_bk = DB::select('select * from ms_drug_allergy');
   foreach ($doctor_bk as $result) {
      $doctor_list.='<div class="col-1">'.$no.'</div><div class="col-8 txt">'.$result->description.'</div>
      <div class="col-3">
      <button class="btn btn-success edit" data-code="'.$result->uid.'">edit</button>
      <button class="btn btn-danger del_allergy" data-code="'.$result->uid.'">Delete</button></div>';
      $no++;
   }


   return response()->json($doctor_list);

     // $value = Session::get('username');
}


public function disease(){
   return view('admin.disease');
}


public function get_disease(){
   $doctor_list="";
   $no=1;
   $doctor_bk = DB::select('select * from ms_disease');
   foreach ($doctor_bk as $result) {
      $doctor_list.='<div class="col-1">'.$no.'</div><div class="col-8 txt">'.$result->description.'</div>
      <div class="col-3">
      <button class="btn btn-success edit" data-code="'.$result->uid.'">edit</button>
      <button class="btn btn-danger del_allergy" data-code="'.$result->uid.'">Delete</button></div>';
      $no++;
   }


   return response()->json($doctor_list);

     // $value = Session::get('username');
}



public function get_payment(){
   $doctor_list="";
   $no=1;
   $doctor_bk = DB::select('select * from ms_payment_method');
   foreach ($doctor_bk as $result) {
      $doctor_list.='<div class="col-1">'.$no.'</div><div class="col-9 txt">'.$result->description.'</div><div class="col-2">
      <button class="btn btn-success edit" data-code="'.$result->uid.'">edit</button>
      <button class="btn btn-danger delete_doctor" data-code="'.$result->uid.'">Delete</button></div>';
      $no++;
   }


   return response()->json($doctor_list);

     // $value = Session::get('username');
}

public function drug_allergy(){
   return view('admin.drug_allergy');
}


public function get_doctor(){
   $doctor_list="";
   $doctor_bk = DB::select('select * from ms_doctor');
   $no=1;
   foreach ($doctor_bk as $result) {
      $doctor_list.='<div class="col-1">'.$no.'</div><div class="col-9 txt">'.$result->name." ".$result->surname.'</div><div class="col-2 txt">
      <button class="btn btn-success edit" data-code="'.$result->uid.'">edit</button>
      <button class="btn btn-danger del" data-code="'.$result->uid.'">Delete</button></div>';

      $no++;
   }
   return response()->json($doctor_list);
}


public function create()
{
}
public function store(Request $request)
{
}
public function show($id)
{
}
public function edit($id)
{

}
public function update(Request $request, $id)
{

}
public function destroy($id)
{

}
}
