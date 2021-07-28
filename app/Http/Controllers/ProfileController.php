<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use phpDocumentor\Reflection\Types\Nullable;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
 

    public function create()
    {
        return view('login');
    }
    public function store(Request $request)
    {

    }

    public function show($id)
    {
        $users=User::find($id);
        return view('profile.show',['user'=>$user]);
    }

    public function edit($id){
        $profiles=User::find($id);
        return view('profile.profile',['profiles'=>$profiles]);
    }
    public function update(Request $request)
    {
        $filename="";
        $validatedData = $request->validate([
            'name' => 'required',
            'index_no' => 'required|unique:users,index_no,'.$request->id,
            'email' => 'nullable|email:rfc,dns' ,
            'faculty' => 'required',
            'department' => 'required',
            'phone_no' => 'nullable|size:10',

        ]);
        //dd($validatedData);
        if($request->hasFile('image')){
            $file = $request->file('image');
            $extension=$file->getClientOriginalExtension();
            $filename=time().'.'.$extension;
            $file->move('upload/profiles/',$filename);
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



        // $filename="";


        Session::flash('success','Details has been updated successfully!');
        return redirect('/show',['user'=>$user]);
    }
    public function destroy($id)
    {
        $user= DB::table('users')->where('id',$id)->delete();
        Session::flash('success','Data were deleted successfully!');
        return redirect('home');

    }
}
