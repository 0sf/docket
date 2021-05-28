<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class ProfileController extends Controller
{
    public function create()
    {
        return view('login');
    }
    public function show($id)
    {
        $users=User::find($id);
        return view('show')->with('user',$users);
    }
    
    public function edit($id){
        $profiles=User::find($id);
        return view('profile',['profiles'=>$profiles]);
    }
    public function update(Request $request){
        
        // $filename="";
        if($request->hasFile('image')){
            $filename="";
            $file = $request->file('image');
            $extension=$file->getClientOriginalExtension();
            $filename=time().'.'.$extension;
            $file->move('upload/profiles/',$filename);
        }
        else{
            return redirect('show');
        }

        DB::table('users')->where('id',$request->id)->update([
            
            'name'=>$request->name,
            'index_no'=>$request->index_no,
            'email'=>$request->email,
            'faculty'=>$request->faculty,
            'department'=>$request->department,
            'phone_no'=>$request->phone_no,
            'image'=>$filename
            
        ]);
        
        Session::flash('success','Details has been updated successfully!');
        return redirect('show');
    }
    public function destroy($id)
    {
        $user= DB::table('users')->where('id',$id)->delete();
        Session::flash('success','Data were deleted successfully!');
        return redirect('home');
        
    }
}
