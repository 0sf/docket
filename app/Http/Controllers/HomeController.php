<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\NewTask;
use App\Models\Home;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $tasks = NewTask::orderBy('date')->get();

        $user = Auth::user();

        $completedTasks = Home::all();

        $clicked = false;

        return view('home', [
            'tasks' => $tasks,
            'user' => $user,
            'completedTasks' => $completedTasks,
            'clicked' => $clicked,
        ]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tasks = NewTask::orderBy('date')
        ->get();

        $user = Auth::user();

        $completedTasks = Home::where('user_id', 500)
        ->get();

        return view('home', [
            'tasks' => $tasks,
            'user' => $user,
            'completedTasks' => $completedTasks,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /**$completedTasks = Home::create([
            'user_id' => $request->input('user_id'),
            'task_id' => $request->input('task_id')
        ]);

        return redirect('/home'); */

        $completedTasks = new Home();
        $completedTasks->user_id=request('user_id');
        $completedTasks->task_id-request('task_id');
        /**$task=new NewTask();
        $task->course=request('course');
        $task->title=request('title');
        $task->date=request('date');
        $task->time=request('time');
        $task->notification_type=request('notification_type');
        $task->content=request('content'); */
        $completedTasks->save();

        return redirect('/home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
