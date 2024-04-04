<?php

namespace App\Http\Controllers;

use App\Models\Statistic;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        $tasks = Task::orderBy('created_at','desc');
        if ($request->search)
            $tasks = $tasks->where('title', 'like', '%' . $request->search . '%')->orWhere('description', 'like', '%' . $request->search . '%');

        $tasks = $tasks->paginate(10);
        return view('tasks.index',compact('tasks'));
    }

    public function create()
    {
        $admins = User::where('user_type', 'admin')->orderBy('created_at', 'desc')->get();
        $users = User::where('user_type', 'user')->orderBy('created_at', 'desc')->get();
        return view('tasks.create', compact('admins', 'users'));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => [
                'max:255',
                'required'
            ],
            'description' => [
                'min:50',
                'required'
            ],
            'assign_by' => [
                'required'
            ],
            'assign_to' => [
                'required'
            ],
        ]);

        $admin = User::findOrFail($request->assign_by);
        $user = User::findOrFail($request->assign_to);
        if (!$admin || !$user)
            return back()->with('errors', 'Admin Or User Not Exist');

        $task = Task::firstOrCreate([
            'title' => $request->title,
            'description' => $request->description,
            'assigned_by' => $admin->id,
            'assigned_to' => $user->id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        if (!$task)
            return back()->with('errors', 'An Unexpected Error Has Occurred During Task Creation Please Try Again Later');
        $statistics = Statistic::where('user_id', $user->id)->first();
        if ($statistics)
        {
            $statistics->tasks_no += 1;
            $statistics->save();
        }
        else{
            $statistics = Statistic::insert([
                'user_id' => $user->id,
                'tasks_no' => 1,
            ]);
        }
        if(!$statistics)
            return back()->with('errors', 'An Unexpected Error Has Occurred During Task Creation Please Try Again Later');

        return redirect()->route('tasks.index')->with('success', 'Task Created Successfully');



    }
    public function edit(Task $task)
    {

    }
    public function update(Request $request)
    {

    }

    public function destroy(Task $task)
    {

    }
}
