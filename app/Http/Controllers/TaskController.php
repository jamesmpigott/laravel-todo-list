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

    /**
     * Add Task
     *
     * @param Request $request
     *
     * @return view $view
     */
    public function addTask(Request $request){
        $task = Task::create([
            'title' => $request->input('title'),
            'description' => null,
        ]);
        $task->save();
        
        $parameters['task'] = $task;
        $parameters['addedByAjax'] = true;

        // Build html for new task and return it, to be appended via JS.  
        $view = view('partial/task-item', $parameters)->render();
        return $view;
    }

    /**
     * Delete task with id
     *
     * @param int $id
     */
    public function deleteTask($id){
        Task::findOrFail($id)->delete();
    }
}
