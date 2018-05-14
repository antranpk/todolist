
<?php require 'inc/header.php' ?>
<?php require 'inc/msg.php' ?>

<div class="center">
<?php if (empty($this->oPost)): ?>

    <p class="error">Post Data Not Found!</p>
<?php else: ?>
    <form action="" method="post" class="w3-container w3-card-4 w3-light-grey" enctype="multipart/form-data">
        <span class="center" style="font-size: 24px">Edit Post</span>
        <p><label for="title">Title:</label><br />
            <input type="text" class="w3-input w3-border w3-round" name="title" id="title" value="<?=htmlspecialchars($this->oPost->title)?>" required="required" />
        </p>

        <p><label for="body">Body:</label><br />
            <textarea name="body" class="w3-input w3-border w3-round" id="body" rows="5" cols="35" required="required"><?=htmlspecialchars($this->oPost->body)?></textarea>
        </p>
        <p><label for="image">Image:</label>
            <input lass="w3-input w3-border w3-round" type="file" name="image" id="fileToUpload" >
        </p>
        <p><input type="submit" name="edit_submit" value="Update" /></p>
    </form>
<?php endif ?>
</div>
<?php require 'inc/footer.php' ?>
