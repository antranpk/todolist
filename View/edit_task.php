<?php include 'inc/head.php';?>
<div class="container">
    <div class="col-sm-offset-1 col-sm-10">
        <div class="panel panel-default">
            <div class="panel-heading">
                Task Edit
            </div>
            <div class="panel-body">
                <!-- New Task Form -->
                <form action="<?php formAction('taskController', 'update')?>" method="POST" class="form-horizontal">
                    <!-- Task Name -->
                    <div class="form-group">
                        <label for="task-name" class="col-sm-3 control-label">Task Name</label>

                        <div class="col-sm-6">
                            <input type="text" name="name" id="task-name" class="form-control" value="<?=htmlspecialchars($this->task->name)?>" required="true">
                            <input type="hidden" name="task_id" value="<?=$this->task->id?>" required="true">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="task-name" class="col-sm-3 control-label">Start date</label>

                        <div class="col-sm-6">
                            <input type="date" name="start_date" class="form-control" value="<?=htmlspecialchars($this->task->start_date)?>" required="true">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="task-name" class="col-sm-3 control-label">End date</label>

                        <div class="col-sm-6">
                            <input type="date" name="end_date" class="form-control" value="<?=htmlspecialchars($this->task->end_date)?>" required="true">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="task-name" class="col-sm-3 control-label">Status</label>

                        <div class="col-sm-6">
                            <label class="radio-inline"><input type="radio" name="status" value="1" required="true" <?php if (1 == $this->task->status) {echo 'checked';}?> >Planning</label>
                                <label class="radio-inline"><input type="radio" name="status" value="2" <?php if (2 == $this->task->status) {echo 'checked';}?>>Doing</label>
                                <label class="radio-inline"><input type="radio" name="status" value="3" <?php if (3 == $this->task->status) {echo 'checked';}?>>Done</label>
                       </div>
                   </div>
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-6">
                            <button type="submit" name="edit_task" class="btn btn-default">
                            <i class="fa fa-btn fa-plus"></i>Edit Task
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include 'inc/footer.php';?>
