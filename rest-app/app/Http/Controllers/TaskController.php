<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Task;
use App\UserTask;
use App\Http\Resources\Task as TaskResource;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get tasks
        $tasks = Task::paginate(15);
        
        // Return collection of tasks as resource
        return TaskResource::collection($tasks);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Create or Update the task
        $task = $request->isMethod('put') ? Task::findOrFail($request->id) : new Task;

        $task->id = $request->input('id');
        $task->name = $request->input('name');
        $task->summary = $request->input('summary');
        $task->description = $request->input('description');
        $task->status = $request->input('status');
        $task->priority = $request->input('priority');
        $task->due_dt = $request->input('due_dt');
        $task->project_id = $request->input('project_id');
        
        if($task->save()) {
            return new TaskResource($task);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Get task
        $task = Task::findOrFail($id);

        // Return single task as a resource
        return new TaskResource($task);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Delete task
        $task = Task::findOrFail($id);

        if($task->delete()) {
            return new TaskResource($task);
        }
    }

    /**
     * Add a user to a given task
     *
     * @param  int  $task_id
     * @param  int  $user_id
     * @return \Illuminate\Http\Response
     */
    public function addUser($task_id, $user_id)
    {
        $userTask = UserTask::where('task_id', $task_id)->where('user_id', $user_id)->first();

        if (!$userTask) {
            $userTask = new UserTask;
            $userTask->task_id = $task_id;
            $userTask->user_id = $user_id;

            if($userTask->save()) {
                return new TaskResource($userTask);
            }
        }

        return new TaskResource($userTask);
    }

    /**
     * Remove a user from a given task
     *
     * @param  int  $task_id
     * @param  int  $user_id
     * @return \Illuminate\Http\Response
     */
    public function removeUser($task_id, $user_id)
    {
        $userTask = UserTask::where('task_id', $task_id)->where('user_id', $user_id)->firstOrFail();

        if($userTask->delete()) {
            return new TaskResource($userTask);
        }
    }

    /**
     * Get all tasks by user id
     *
     * @param  int  $user_id
     * @return \Illuminate\Http\Response
     */
    public function showByUserId($user_id)
    {
        $tasks = DB::table('tasks')
        ->join('usertasks', function ($join) use ($user_id) {
            $join->on('tasks.id', '=', 'usertasks.task_id')
                ->where('usertasks.user_id', '=', $user_id);
        })
        ->get();
        
        return new TaskResource($tasks);
    }

    /**
     * Get all tasks by project id
     *
     * @param  int  $project_id
     * @return \Illuminate\Http\Response
     */
    public function showByProjectId($project_id)
    {
        $tasks = DB::table('tasks')->where('tasks.project_id', '=', $project_id)->get();

        return new TaskResource($tasks);
    }

    /**
     * Get all tasks by priority
     *
     * @param  int  $priority
     * @return \Illuminate\Http\Response
     */
    public function showByPriority($priority)
    {
        $tasks = DB::table('tasks')->where('tasks.priority', '=', $priority)->get();

        return new TaskResource($tasks);
    }

    /**
     * Get all tasks by due date
     *
     * @param  int  $duedate
     * @return \Illuminate\Http\Response
     */
    public function showByDueDate($duedate)
    {
        $tasks = DB::table('tasks')->where('tasks.due_dt', '>=', $duedate)->get();

        return new TaskResource($tasks);
    }
}