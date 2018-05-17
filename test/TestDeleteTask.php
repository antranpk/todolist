<?php

include 'inc.php';

use App\Repositories\TaskRepository;
use PHPUnit\Framework\TestCase;

class TestDeleteTask extends TestCase
{
    public function __construct()
    {
        parent::__construct();
    }

    public function testDeleteTask()
    {
        $taskRepository = new TaskRepository;
        $task = $taskRepository->getRandomTask();

        $result = $taskRepository->delete($task->id);

        if ($result) {
            echo PHP_EOL . '********' . ' Delete Task Success! ' . '********' . PHP_EOL;
            echo PHP_EOL . '********' . ' Task Id: ' . $task->id . PHP_EOL;
            echo PHP_EOL . '********' . ' Task Name: ' . $task->name . PHP_EOL;
            echo PHP_EOL . '********' . ' Task Start_date: ' . $task->start_date . PHP_EOL;
            echo PHP_EOL . '********' . ' Task End_date: ' . $task->end_date . PHP_EOL;
            echo PHP_EOL . '********' . ' Deleted successfully!' . ' ********' . PHP_EOL;
        } else {
            echo PHP_EOL . '********' . ' Delete Task Fail! ' . '********' . PHP_EOL;
        }

        $this->assertTrue($result);
    }
}
