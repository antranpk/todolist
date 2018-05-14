<?php

namespace TestProject\Controller;

class TaskController
{

    protected $util, $model;
    private $_id;

    public function __construct()
    {
        // Enable PHP Session
        if (empty($_SESSION)) {
            @session_start();
        }

        $this->util = new \TestProject\Engine\Util;

        /** Get the Model class in all the controller class **/
        $this->util->getModel('Task');
        $this->model = new \TestProject\Model\Task;

        /** Get the Post ID in the constructor in order to avoid the duplication of the same code **/
        $this->_id = (int) (!empty($_GET['id']) ? $_GET['id'] : 0);
    }

    /***** Front end *****/
    // Homepage
    public function index()
    {
        $this->util->oPosts = $this->model->get(0, 2); // Get only the latest 5 posts
        $this->util->allPosts = $this->model->getAll();
        $this->util->getView('index');
    }

    public function post()
    {
        $this->util->oPost = $this->model->getById($this->_id); // Get the data of the post

        $this->util->getView('post');
    }

    public function notFound()
    {
        $this->util->getView('not_found');
    }

    /***** For Admin (Back end) *****/
    public function all()
    {
        if (!$this->isLogged()) {
            exit;
        }

        $this->util->oPosts = $this->model->getAll();
        $this->util->allPosts = $this->model->getAll();

        $this->util->getView('index');
    }

    public function add()
    {
        if (!$this->isLogged()) {
            exit;
        }

        if (!empty($_POST['add_submit'])) {
            if (isset($_POST['title'], $_POST['body']) && mb_strlen($_POST['title']) <= 50) // Allow a maximum of 50 characters
            {
                // var_dump($_FILES['image']);
                $file_name = $_FILES['image']['name'];
                // var_dump($file_name);
                $file_size = $_FILES['image']['size'];
                // var_dump($file_size);
                $file_tmp = $_FILES['image']['tmp_name'];
                // var_dump($file_tmp);
                $file_type = $_FILES['image']['type'];

                if ($file_size > 2097152) {
                    $errors[] = 'File size must be excately 2 MB';
                }

                if (empty($errors) == true) {
                    // var_dump(ROOT_PATH_IMAGE);
                    move_uploaded_file($file_tmp, ROOT_PATH_IMAGE . $file_name);
                } else {
                    print_r($errors);
                }
                $aData = ['title' => $_POST['title'], 'body' => $_POST['body'], 'image' => $_FILES['image']['name'], 'created_date' => date('Y-m-d H:i:s')];
                // var_dump($aData);
                if ($this->model->add($aData)) {
                    $this->util->sSuccMsg = 'Hurray!! The post has been added.';
                } else {
                    $this->util->sErrMsg = 'Whoops! An error has occurred! Please try again later.';
                }
            } else {
                $this->util->sErrMsg = 'All fields are required and the title cannot exceed 50 characters.';
            }
        }

        $this->util->getView('add_post');
    }

    public function edit()
    {
        if (!$this->isLogged()) {
            exit;
        }

        if (!empty($_POST['edit_submit'])) {
            // var_dump($_POST)
            if (isset($_POST['title'], $_POST['body'], $_FILES['image'])) {
                // var_dump($_FILES['image']);
                $file_name = $_FILES['image']['name'];
                // var_dump($file_name);
                $file_size = $_FILES['image']['size'];
                // var_dump($file_size);
                $file_tmp = $_FILES['image']['tmp_name'];
                // var_dump($file_tmp);
                $file_type = $_FILES['image']['type'];

                if ($file_size > 2097152) {
                    $errors[] = 'File size must be excately 2 MB';
                }

                if (empty($errors) == true) {
                    // var_dump(ROOT_PATH_IMAGE);
                    move_uploaded_file($file_tmp, ROOT_PATH_IMAGE . $file_name);
                } else {
                    print_r($errors);
                }
                $aData = ['post_id' => $this->_id, 'title' => $_POST['title'], 'image' => $_FILES['image']['name'], 'body' => $_POST['body']];
                if ($this->model->update($aData)) {
                    $this->util->sSuccMsg = 'Hurray! The post has been updated.';
                } else {
                    $this->util->sErrMsg = 'Whoops! An error has occurred! Please try again later';
                }
            } else {
                $this->util->sErrMsg = 'All fields are required.';
            }
        }

        // header("Location: index.php");

        /* Get the data of the post */
        $this->util->oPost = $this->model->getById($this->_id);

        $this->util->getView('edit_post');
    }

    public function delete()
    {
        if (!$this->isLogged()) {
            exit;
        }

        if (!empty($_POST['delete']) && $this->model->delete($this->_id)) {
            header('Location: ' . ROOT_URL);
        } else {
            exit('Whoops! Post cannot be deleted.');
        }
    }

    protected function isLogged()
    {
        return !empty($_SESSION['is_logged']);
    }
}
