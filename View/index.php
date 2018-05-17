<?php include 'inc/head.php';?>
<div class="container">
    <div class="col-sm-offset-1 col-sm-10">
        <div class="panel panel-default">
            <?php require_once 'inc/msg.php';?>
            <div class="task-list">
                Tasks List
            </div>
            <div class="panel-heading">
                New Task
            </div>

            <div class="panel-body">
                <!-- New Task Form -->
                <form action="<?php formAction('taskController', 'add')?>" method="POST" class="form-horizontal">
                    <!-- Task Name -->
                    <div class="form-group">
                        <label for="task-name" class="col-sm-3 control-label">Task Name</label>

                        <div class="col-sm-6">
                            <input type="text" name="name" id="task-name" class="form-control" value="" required="true">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="task-name" class="col-sm-3 control-label">Start date</label>

                        <div class="col-sm-6">
                            <input type="date" name="start_date" class="form-control" value="" required="true">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="task-name" class="col-sm-3 control-label">End date</label>

                        <div class="col-sm-6">
                            <input type="date" name="end_date" class="form-control" value="" required="true">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="task-name" class="col-sm-3 control-label">Status</label>

                        <div class="col-sm-6">
                            <label class="radio-inline"><input type="radio" name="status" value="1" required="true">Planning</label>
                            <label class="radio-inline"><input type="radio" name="status" value="2" ">Doing</label>
                            <label class="radio-inline"><input type="radio" name="status" value="3" >Done</label>
                        </div>
                    </div>
                    <!-- Add Task Button -->
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-6">
                            <button type="submit" name="add_task" class="btn btn-default">
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
                        <th>Task Description</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Status</th>
                        <th>&nbsp;</th>
                    </thead>
                    <tbody>
                        <?php foreach ($this->allTasks as $task): ?>
                            <?php if (!empty($task)): ?>
                                <tr>
                                <td class="task-name"><div><?=htmlspecialchars($task->name)?></div></td>
                                    <td class="start-date"><div><?=htmlspecialchars($task->start_date)?></div></td>
                                    <td class="end-date"><div><?=htmlspecialchars($task->end_date)?></div></td>
                                    <td class="status"><div><?=showStatus($task->status)?></div></td>
                                    <td>
                                        <form action="<?=ROOT_URL?>?p=taskController&amp;a=delete&amp;task_id=<?=$task->id?>" method="POST" class="form-delete">
                                            <button type="submit" class="btn btn-danger" name="delete_task">
                                                <i class="fa fa-btn fa-trash"></i>Delete
                                            </button>
                                        </form>
                                        <button class="btn btn-info" onclick="window.location='<?=ROOT_URL?>?p=taskController&amp;a=edit&amp;task_id=<?=$task->id?>'">
                                            <i class="fa fa-btn fa-pencil"></i>Edit
                                        </button>
                                    </td>
                                </tr>
                            <?php endif?>
                        <?php endforeach?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php include 'inc/footer.php';?>
