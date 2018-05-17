<?php

namespace App\Repositories;

class TaskRepository
{
    protected $util;
    protected $model;
    // private $taskId;

    public function __construct()
    {
        $this->util = new \App\Engine\Util;
        $this->util->getModel('Task');
        $this->model = new \App\Model\Task;
        $this->taskId = (int) (!empty($_GET['task_id']) ? $_GET['task_id'] : 0);
    }

    public function create($data)
    {
        $name = $data['name'];
        $startDate = $data['start_date'];
        $endDate = $data['end_date'];
        $status = $data['status'];
        $existTask = $this->model->getDuplicateTask($name);
        $err = false;
        $errMsg = [];
        if (!empty($existTask)) {
            $err = true;
        }

        $datas = ['name' => $name, 'start_date' => $startDate, 'end_date' => $endDate, 'status' => $status];

        if (strtotime($endDate) - strtotime($startDate) < 0) {
            $err = true;
        }

        if (!$err && $this->model->add($datas)) {
            return true;
        }

        return false;
    }

    public function getAll()
    {
        return $this->model->getAll();
    }

    public function delete($id)
    {
        if ($this->model->delete($id)) {
            return true;
        }

        return false;
    }

    public function update($data)
    {
        $name = $data['name'];
        $startDate = $data['start_date'];
        $endDate = $data['end_date'];
        $status = $data['status'];
        $taskId = $data['task_id'];
        $datas = ['name' => $name, 'start_date' => $startDate, 'end_date' => $endDate, 'status' => $status, 'task_id' => $taskId];

        $err = false;
        if (strtotime($endDate) - strtotime($startDate) < 0) {
            $err = true;
        }

        if (!$err && $this->model->update($datas)) {
            return true;
        }

        return false;
    }

    public function getRandomTask()
    {
        return $this->model->getRandomTask();
    }

    public function getById($id)
    {
        return $this->model->getById($id);
    }
}
