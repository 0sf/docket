<?php

namespace App\Http\Controllers;

use App\Models\Dashboard;
use Illuminate\Http\Request;

class DashboardContoller extends Controller
{
    public function create(){
        $completedTasks=Dashboard::all();

        return view('home', [
            'completedTasks' => $completedTasks,
        ]);
    }
}
