<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Testimonial;
use Intervention\Image\Facades\Image;

class TestimonialController extends Controller
{
    public function get_all_testimonial()
    {
        $testimonials = Testimonial::orderBy('id','desc')->get();
        return response()->json([
            'testimonials'=>$testimonials
        ],200);
    }

    public function add_testimonial(Request $request)
    {
        $testimonial = new Testimonial();
        $testimonial->name = $request->name;
        $testimonial->function = $request->function;
        $testimonial->rating = $request->rating;
        $testimonial->testimony = $request->testimony;

        if($request->photo){
            $strpos = strpos($request->photo,';');
            $sub = substr($request->photo,0,$strpos);
            $ex= explode('/',$sub)[1];
            $name = time().".".$ex;
            $img = Image::make($request->photo)->resize(700,500);
            $upload_path=public_path()."/img/upload/";
            $image =$upload_path.$testimonial->photo;
            $img->save($upload_path.$name);
            if(file_exists($image)){
                @unlink($image);
            }
         
            }else{
                $name = $testimonial->photo;
            }

            $testimonial->photo = $name;
        
        $testimonial->save();
    }

    public function get_single_testimonial($id)
    {
        $testimonial = Testimonial::find($id);
        return response()->json([
            'testimonial'=>$testimonial
        ],200);
    }

    public function update_testimonial(Request $request, $id)
    {
        $testimonial = Testimonial::find($id);
        $testimonial->name = $request->name;
        $testimonial->function = $request->function;
        $testimonial->rating = $request->rating;
        $testimonial->testimony = $request->testimony;

        if($testimonial->photo !=$request->photo){
            $strpos = strpos($request->photo,';');
            $sub = substr($request->photo,0,$strpos);
            $ex= explode('/',$sub)[1];
            $name = time().".".$ex;
            $img = Image::make($request->photo)->resize(700,500);
            $upload_path=public_path()."/img/upload/";
            $image =$upload_path.$testimonial->photo;
            $img->save($upload_path.$name);
            if(file_exists($image)){
                @unlink($image);
            }
         
            }else{
                $name = $testimonial->photo;
            }

            $testimonial->photo = $name;
        
        $testimonial->save();
    }


    public function delete_testimonial(Request $request,$id)
    {
        $project=Testimonial::find($id);
        $image_path = public_path()."/img/upload/";
        $image = $image_path.$project->photo;
        if(file_exists($image)){
            @unlink($image);
        }
        $project->delete();
    }
}
