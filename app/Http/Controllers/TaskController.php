<?php

namespace App\Http\Controllers;

use App\Client\BauBuddy;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        return view('tasks.index');
    }


}
