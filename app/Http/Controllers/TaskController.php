<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Task;

// The Task object is similar to a JPA Entity
// It was created using a command line
// which also generates the corresponding Controller and database migration

class TaskController extends Controller
{
    //
    public function index()
    {
        $tasks = Task::where("iscompleted", false)->orderBy("id", "DESC")->get();
        $completed_tasks = Task::where("iscompleted", true)->get();

        return view("welcome", compact("tasks", "completed_tasks"));
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $task = new Task();
        $task->task = request("task");
        $task->save();

        // Redirect::back() is like a static function call
        // or a method reference
        // I realize that objects don't use "dot" accessors, 
        // they use arrows to call functions and use varaibles
        return Redirect::back()->with("message", "Task has been added");
    }

    public function complete($id)
    {
        $task = Task::find($id);
        $task->iscompleted = true;
        $task->save();

        return Redirect::back()->with("message", "Task has been added to the complete list");
    }

    public function destroy($id)
    {
        $task = Task::find($id);
        $task->delete();
        
        return Redirect::back()->with("message", "Task has been deleted");
    }
}
