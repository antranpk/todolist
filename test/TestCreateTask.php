<?php

include 'inc.php';

use App\Repositories\TaskRepository;
use PHPUnit\Framework\TestCase;

class TestCreateTask extends TestCase
{
    public function __construct()
    {
        parent::__construct();
    }

    public function testCreateTask()
    {
        $data['name'] = 'Data example for Create new task!!!!';
        $data['start_date'] = '2018-05-17';
        $data['end_date'] = '2018-05-18';
        $data['status'] = '1';

        echo PHP_EOL . '********' . ' Data Example Will Create! ' . '********' . PHP_EOL;
        echo PHP_EOL . '********' . ' Task Id: ' . $data['name'] . PHP_EOL;
        echo PHP_EOL . '********' . ' Task Name: ' . $data['start_date'] . PHP_EOL;
        echo PHP_EOL . '********' . ' Task Start_date: ' . $data['end_date'] . PHP_EOL;
        echo PHP_EOL . '********' . ' Task End_date: ' . $data['status'] . PHP_EOL;
        echo PHP_EOL . '*******************************************' . PHP_EOL;

        $taskRepository = new TaskRepository;

        $result = $taskRepository->create($data);

        if ($result) {
            echo PHP_EOL . '********' . ' Create Task Success! ' . '********' . PHP_EOL;
        } else {
            echo PHP_EOL . '********' . ' Create Task Fail! ' . '********' . PHP_EOL;
        }

        $this->assertTrue($result);
    }
}
