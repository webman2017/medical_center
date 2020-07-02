<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class Doctor extends Controller
{

  public function doctor_manage($id)
  {
   $data=DB::select('select * from tr_patient inner join ms_patient on tr_patient.ms_patient_uid=ms_patient.uid
      inner join tr_room_doctor on tr_patient.ms_patient_uid=tr_room_doctor.ms_patient_uid where tr_room_doctor.room_uid="'.$id.'"');
   return view('doctor_manage');
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
