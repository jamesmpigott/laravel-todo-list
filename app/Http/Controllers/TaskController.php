<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use Illuminate\Http\Request;
use App\Task;

class TaskController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /** 
     * Base page - show all tasks, ordered by whether they are completed or not
     *
     * @return view
     */
    public function index(){
    	
    	$parameters['tasks'] = Task::orderBy('completed')->get();
        return view('index', $parameters);
    }
}
