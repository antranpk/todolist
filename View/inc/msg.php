
<?php if (!empty($this->sErrMsg)): ?>
    <p class="error alert alert-danger"><?=$this->sErrMsg?></p>
<?php endif?>

<?php if (!empty($this->sSuccMsg)): ?>
    <p class="success alert alert-success"><?=$this->sSuccMsg?></p>
<?php endif?>
