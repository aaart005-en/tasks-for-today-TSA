<?php

namespace App\Controllers;

use App\Models\TaskModel;

class Tasks extends BaseController
{
    public function index()
    {
        $taskModel = new TaskModel();

        $tasks = $taskModel
            ->orderBy('task_date', 'ASC')
            ->findAll();

        return view('tasks/index', ['tasks' => $tasks]);
    }

    public function today()
    {
        $taskModel = new TaskModel();

        $tasks = $taskModel
            ->where('task_date', date('Y-m-d'))
            ->findAll();

        return view('tasks/today', ['tasks' => $tasks]);
    }
}