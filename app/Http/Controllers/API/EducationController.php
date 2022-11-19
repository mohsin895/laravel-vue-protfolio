<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Education;

class EducationController extends Controller
{
    public function get_all_education()
    {
        $educations = Education::orderBy('id','desc')->get();
          return response()->json([
                'educations'=>$educations
            ],200);
    }

    public function create_education(Request $request)
    {
       $this->validate($request,[
           'institution'=>'required'
       ]);
       $educations = new Education();
       $educations->institution = $request->institution;
       $educations->period= $request->period;
       $educations->degree = $request->degree;
       $educations->department = $request->department;
       $educations->save();
    }

    public function update_education(Request $request, $id)
    {
       $this->validate($request,[
           'institution'=>'required'
       ]);
       $educations = Education::find($id);
       $educations->institution = $request->institution;
       $educations->period= $request->period;
       $educations->degree = $request->degree;
       $educations->department = $request->department;
       $educations->save();
    }

    public function delete_education(Request $request, $id)
    {
       $educations = Education::find($id);
       $educations->delete();
    }
}
