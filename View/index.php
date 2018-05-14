
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel Quickstart - Basic</title>

    <!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>

    <!-- Styles -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../blog/static/style.css">
</head>
<body id="app-layout">

    <div class="container">
        <div class="task-list">
            Tasks List
        </div>
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    New Task
                </div>

                <div class="panel-body">
                    <!-- New Task Form -->
                    <form action="#" method="POST" class="form-horizontal">
                        <!-- Task Name -->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Task Name</label>

                            <div class="col-sm-6">
                                <input type="text" name="name" id="task-name" class="form-control" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Start date</label>

                            <div class="col-sm-6">
                                <input type="date" name="start_date" class="form-control" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">End date</label>

                            <div class="col-sm-6">
                                <input type="date" name="end_date" class="form-control" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Status</label>

                            <div class="col-sm-6">
                                <label class="radio-inline"><input type="radio" name="optradio">Option 1</label>
                                <label class="radio-inline"><input type="radio" name="optradio">Option 2</label>
                                <label class="radio-inline"><input type="radio" name="optradio">Option 3</label>
                            </div>
                        </div>
                        <!-- Add Task Button -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-btn fa-plus"></i>Add Task
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Current Tasks -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Current Tasks
                    </div>

                    <div class="panel-body">
                        <table class="table table-striped task-table">
                            <thead>
                                <th>Task</th>
                                <th>&nbsp;</th>
                            </thead>
                            <tbody>
                                    <tr>
                                        <td class="table-text"><div>task1</div></td>

                                        <!-- Task Delete Button -->
                                        <td>
                                            <form action="" method="POST" class="form-delete">
                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fa fa-btn fa-trash"></i>Delete
                                                </button>
                                            </form>

                                            <button type="submit" class="btn btn-info">
                                                <i class="fa fa-btn fa-pencil"></i>Edit
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="table-text"><div>day la task 2 day la task 2 day la task 2 day la task 2 day la task 2day la task 2day la task 2day la task 2day la task 2day la task 2day la task 2day la task 2day la task 2day la task 2day la task 2day la task 2</div></td>

                                        <!-- Task Delete Button -->
                                        <td>
                                            <form action="" method="POST" class="form-delete">
                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fa fa-btn fa-trash"></i>Delete
                                                </button>
                                            </form>

                                            <button type="submit" class="btn btn-info">
                                                <i class="fa fa-btn fa-pencil"></i>Edit
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="table-text"><div>task1</div></td>

                                        <!-- Task Delete Button -->
                                        <td>
                                            <form action="" method="POST" class="form-delete">
                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fa fa-btn fa-trash"></i>Delete
                                                </button>
                                            </form>

                                            <button type="submit" class="btn btn-info">
                                                <i class="fa fa-btn fa-pencil"></i>Edit
                                            </button>
                                        </td>
                                    </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
        </div>
    </div>

    <!-- JavaScripts -->
    <script src="http://cdn.bootcss.com/jquery/1.9.1/jquery.min.js"></script>
    <script src="http://cdn.bootcss.com/twitter-bootstrap/2.2.2/bootstrap.min.js"></script>
</body>
</html>
