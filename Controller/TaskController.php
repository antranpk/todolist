<?php

namespace App\Controller;

class TaskController
{
    protected $util;
    private $taskId;
    protected $repo;

    public function __construct()
    {
        $this->util = new \App\Engine\Util;
        $this->repo = new \App\Repositories\TaskRepository;
        $this->taskId = (int) (!empty($_GET['task_id']) ? $_GET['task_id'] : 0);
    }

    public function index()
    {
        $this->util->allTasks = $this->repo->getAll();
        $this->util->getView('index');
    }

    public function notFound()
    {
        $this->util->getView('not_found');
    }

    public function add()
    {
        if (isset($_POST['add_task'])) {
            $result = $this->repo->create($_POST);

            if ($result) {
                $this->util->sSuccMsg = 'Added Task Success!';
                $this->util->allTasks = $this->repo->getAll();
                $this->util->getView('index');
            } else {
                if (!empty($existTask)) {
                    $this->util->sErrMsg = 'Task exist!';
                }

                if (strtotime($endDate) - strtotime($startDate) < 0) {
                    $this->util->sErrMsg = 'Invalid Start time and End time!';
                }

                $this->util->allTasks = $this->repo->getAll();
                $this->util->getView('index');
            }
        }
    }

    public function edit()
    {
        $this->util->task = $this->repo->getById($this->taskId);
        $this->util->getView('edit_task');
    }

    public function update()
    {
        if (isset($_POST['edit_task'])) {
            $result = $this->repo->update($_POST);

            if ($result) {
                $this->util->sSuccMsg = 'Update Task Success!';
                $this->util->allTasks = $this->repo->getAll();
                $this->util->getView('index');
            } else {
                $this->util->sSuccMsg = 'Update Task Fail!';
                $this->util->allTasks = $this->repo->getAll();
                $this->util->getView('index');
            }
        }
        $this->util->allTasks = $this->model->getAll();
        $this->util->getView('index');
    }

    public function delete()
    {
        if (isset($_POST['delete_task']) && $this->repo->delete($this->taskId)) {
            header('Location: ' . ROOT_URL);
        } else {
            exit('Whoops! Post cannot be deleted.');
        }
    }
}
