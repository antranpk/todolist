<?php

include 'inc.php';

use App\Repositories\TaskRepository;
use PHPUnit\Framework\TestCase;

class TestEditTask extends TestCase
{
    public function __construct()
    {
        parent::__construct();
    }

    public function testEditTask()
    {
        $taskRepository = new TaskRepository;

        $task = $taskRepository->getRandomTask();

        echo PHP_EOL . '******************' . ' Data Task Before Update! ' . '*****************' . PHP_EOL;
        echo PHP_EOL . '********' . ' Task Id: ' . $task->id . PHP_EOL;
        echo PHP_EOL . '********' . ' Task Name: ' . $task->name . PHP_EOL;
        echo PHP_EOL . '********' . ' Task Start_date: ' . $task->start_date . PHP_EOL;
        echo PHP_EOL . '********' . ' Task End_date: ' . $task->end_date . PHP_EOL;
        echo PHP_EOL . '****************************************************************' . PHP_EOL;

        $data['name'] = 'Data Example!! Data test for edit, edit success!!';
        $data['start_date'] = '2018-05-17';
        $data['end_date'] = '2018-05-18';
        $data['status'] = '1';
        $data['task_id'] = $task->id;

        $result = $taskRepository->update($data);
        $taskAfterEdit = $taskRepository->getById($task->id);

        echo PHP_EOL . '******************' . ' Data Task After update! ' . '*****************' . PHP_EOL;
        echo PHP_EOL . '********' . ' Task Id: ' . $taskAfterEdit->id . PHP_EOL;
        echo PHP_EOL . '********' . ' Task Name: ' . $taskAfterEdit->name . PHP_EOL;
        echo PHP_EOL . '********' . ' Task Start_date: ' . $taskAfterEdit->start_date . PHP_EOL;
        echo PHP_EOL . '********' . ' Task End_date: ' . $taskAfterEdit->end_date . PHP_EOL;
        echo PHP_EOL . '*****************************************************************' . PHP_EOL;

        if ($result) {
            echo PHP_EOL . '********' . ' Update Task Success! ' . '********' . PHP_EOL;
        } else {
            echo PHP_EOL . '********' . ' Update Task Fail! ' . '********' . PHP_EOL;
        }

        $this->assertTrue($result);
    }
}
