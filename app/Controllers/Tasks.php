<?php

namespace App\Controllers;

use App\Models\TaskModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Tasks extends BaseController
{
    private array $rules = [
        'title'     => 'required|max_length[150]',
        'task_date' => 'required|valid_date[Y-m-d]',
        'status'    => 'permit_empty|in_list[pending,completed]',
    ];

    public function index()
    {
        $tasks = (new TaskModel())
            ->where('is_archived', 0)
            ->orderBy('task_date', 'ASC')
            ->findAll();

        return view('tasks/index', ['tasks' => $tasks]);
    }

    public function today()
    {
        $tasks = (new TaskModel())
            ->where('task_date', date('Y-m-d'))
            ->where('is_archived', 0)
            ->findAll();

        return view('tasks/today', ['tasks' => $tasks]);
    }

    public function new()
    {
        return view('tasks/new');
    }

    public function create()
    {
        if (! $this->validate($this->rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        (new TaskModel())->insert([
            'title'      => trim($this->request->getPost('title')),
            'task_date'  => $this->request->getPost('task_date'),
            'status'     => $this->request->getPost('status') ?: 'pending',
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect()->to('/tasks')->with('success', 'Task added.');
    }

    public function edit($id)
    {
        $task = (new TaskModel())->where('is_archived', 0)->find($id);

        if (! $task) {
            throw PageNotFoundException::forPageNotFound();
        }

        return view('tasks/edit', ['task' => $task]);
    }

    public function update($id)
    {
        $model = new TaskModel();
        $task  = $model->where('is_archived', 0)->find($id);

        if (! $task) {
            throw PageNotFoundException::forPageNotFound();
        }

        if (! $this->validate($this->rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $model->update($id, [
            'title'     => trim($this->request->getPost('title')),
            'task_date' => $this->request->getPost('task_date'),
            'status'    => $this->request->getPost('status') ?: 'pending',
        ]);

        return redirect()->to('/tasks')->with('success', 'Task updated.');
    }

    // Soft delete: archive the task instead of removing the row
    public function delete($id)
    {
        $model = new TaskModel();

        if ($model->find($id)) {
            $model->update($id, ['is_archived' => 1]);
        }

        return redirect()->to('/tasks')->with('success', 'Task archived.');
    }
}