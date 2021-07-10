<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NewTask;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $task=NewTask::orderBy('date')->get();
        //$item_where=Item::where('type','gg')->get();
        //get all the items
        //$items = Item::all();
        //$items_latest=Item:latest();
        return View('home')->with('tasks',$task);
    }
}
