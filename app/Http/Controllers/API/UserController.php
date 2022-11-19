<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Hash;

class UserController extends Controller
{
    public function get_all_user()
    {
        $users = User::orderBy('id','desc')->get();
        return response()->json([
            'users'=>$users
        ],200);
    }

    public function create_user(Request $request)
    {
        $this->validate($request,[
            'name'=>'required|min:2|max:50',
            'email'=>'required'
        ]);
        $user=new User();
        $user->name = $request->name;
        $user->type=$request->type;
        $user->bio = $request->bio;
        $user->email = $request->email;
        $user->password= Hash::make($request->password);
        $user->save();
    }

    public function update_user(Request $request,$id)
    {
        $this->validate($request,[
            'name'=>'required|min:2|max:50',
            'email'=>'required'
        ]);
        $user=User::find($id);
        $user->name = $request->name;
        $user->type=$request->type;
        $user->bio = $request->bio;
        $user->email = $request->email;
        $user->password= Hash::make($request->password);
        $user->save();
    }
    public function delete_user(Request $request, $id)
    {
        $user = User::find($id);
        $user->delete();
    }
}
