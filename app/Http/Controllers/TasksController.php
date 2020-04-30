<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class TasksController extends Controller
{
    public function getIndex() {
        return view('tasks.index', [
           'tasks' => Task::orderBy('updated_at', 'desc')->get()
        ]);
    }


    public function getEdit($id) {
        $task = Task::find($id);
        return view('tasks.index',[
            'task'=>$task
        ]);
    }

    public function taskEdit(Request $req) {
        $this->validate($req, [
            'task_name' => 'regex:/^.+ .+^'
        ]);

        $task = Task::find($req->input('id'));
        $task -> task_name = $req -> input('task_name');
        $task -> save();

        return redirect()->route('index')->with([
            'info'=>'Successfully updated!'
        ]);
    }

    public function getDelete($id) {
        Task::find($id)->delete();

        return redirect()->route('index')-> with([
            'info'=>'Successfully deleted!'
        ]);
    }

    public function taskCreate(Request $req) {
        $this -> validate ($req,[
            'task_name'=>'regex:/^.+ .+$/'
        ]);

        $task = new Task([
            'task_name' => $req->input('task_name')
        ]);

        $task->save();

        return redirect()->route('index')-> with([
            'info'=>'Successfully created!'
        ]);
    }
}
