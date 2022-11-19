<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\project;
use Intervention\Image\Facades\Image;

class ProjectController extends Controller
{
    public function get_all_project()
    {
        $projects = Project::orderBy('id','desc')->get();
          return response()->json([
                'projects'=>$projects
            ],200);
    }

    public function add_project(Request $request)
    {
        $project = new Project();
        $project->title = $request->title;
        $project->description = $request->description;
        $project->link = $request->link;

        if($request->photo){
            $strpos = strpos($request->photo,';');
            $sub = substr($request->photo,0,$strpos);
            $ex= explode('/',$sub)[1];
            $name = time().".".$ex;
            $img = Image::make($request->photo)->resize(700,500);
            $upload_path=public_path()."/img/upload/";
            $image =$upload_path.$project->photo;
            $img->save($upload_path.$name);
            if(file_exists($image)){
                @unlink($image);
            }
         
            }else{
                $name = $project->photo;
            }

            $project->photo = $name;
        
        $project->save();
    }

    public function get_edit_project($id)
    {        $project = Project::find($id);
        return response()->json([
              'project'=>$project
          ]);
    }


    
    public function update_prject(Request $request, $id)
    {
        $project = Project::find($id);
        $project->title = $request->title;
        $project->description = $request->description;
        $project->link = $request->link;

        if($project->photo !=$request->photo){
            $strpos = strpos($request->photo,';');
            $sub = substr($request->photo,0,$strpos);
            $ex= explode('/',$sub)[1];
            $name = time().".".$ex;
            $img = Image::make($request->photo)->resize(700,500);
            $upload_path=public_path()."/img/upload/";
            $image =$upload_path.$project->photo;
            $img->save($upload_path.$name);
            if(file_exists($image)){
                @unlink($image);
            }
         
            }else{
                $name = $project->photo;
            }

            $project->photo = $name;
        
        $project->save();
    }

    public function delete_project(Request $request,$id)
    {
        $project=Project::find($id);
        $image_path = public_path()."/img/upload/";
        $image = $image_path.$project->photo;
        if(file_exists($image)){
            @unlink($image);
        }
        $project->delete();
    }

}
