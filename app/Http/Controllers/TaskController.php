<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\NewTask;

class TaskController extends Controller
{
    public function index()
    {
        $task=NewTask::orderBy('date')->get();
        //$item_where=Item::where('type','gg')->get();
        //get all the items
        //$items = Item::all();
        //$items_latest=Item:latest();
        return View('task.index')->with('tasks',$task);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('task.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'course' => 'required',
            'title' => 'required||unique:new_tasks',
            'date' => 'required' ,
            'time' => 'required',
            'notification_type' => 'required',
            'content' => 'required', 'max:200'


        ]);
        $task=new NewTask();
        $task->course=request('course');
        $task->title=request('title');
        $task->date=request('date');
        $task->time=request('time');
        $task->notification_type=request('notification_type');
        $task->content=request('content');
        $task->save();

        return redirect('/task')->with('success','task created');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $item=NewTask::findOrFail($id);
        return view('task.show',['task'=>$task] );
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task=NewTask::findOrFail($id);
        return view('task.edit',['task'=>$task]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'course' => 'required',
            'title' => 'required||unique:new_tasks,title,'.$request->id,
            'date' => 'required' ,
            'time' => 'required',
            'notification_type' => 'required',
            'content' => 'required', 'max:200'
        ]);

        DB::table('new_tasks')->where('id',$request->id)->update([
        'course'=>request('course'),
        'title'=>request('title'),
        'date'=>request('date'),
        'time'=>request('time'),
        'notification_type'=>request('notification_type'),
        'content'=>request('content')
        ]);

        return redirect('/home')->with('success','task updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task=NewTask::findOrFail($id);
        $task->delete();


    }
}
