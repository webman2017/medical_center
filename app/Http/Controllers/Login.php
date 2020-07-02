<?php

namespace App\Http\Controllers;
use Redirect;
use DB;
use Route;
use Session;
use Illuminate\Http\Request;
class Login extends Controller
{
// return view login
 public function index()
 {
  if(Session::has('name')){
   return view('admin/admin');
}else{
   return view('login');
}
}

// login function 
public function check_login(Request $request){
   $username = $request->input('username');
   $password=$request->input('password');

   $check_user=DB::select('select username,password,
      description from ms_user where username="'.$username.'" and password="'.$password.'"');
   if($check_user){
      Session(['name' => $check_user[0]->description]);
      Session::get('name');
      return response()->json(array(
         'success' => true,
         'message'=>'เข้าสู่ระบบสำเร็จ'));
   }else{
     return response()->json(array(
       'success' => false,
       'message' => 'ชื่อผู้ใช้งานหรือรหัสผ่าน ผิดพลาด กรุณาตรวจสอบ'));
  }
}

public function logout(){
   Session::forget('name');
   return redirect('/');
}

public function create()
{
        //
}


public function store(Request $request)
{
        //
}


public function show($id)
{
        //
}


public function edit($id)
{
        //
}


public function update(Request $request, $id)
{
        //
}


public function destroy($id)
{
        //
}
}
