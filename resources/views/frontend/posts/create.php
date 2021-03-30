<?php layout('frontend/blog/header') ?>
<?php component('errors/messages') ?>
<form action="<?php url('/post/store'); ?>" method="post">
<label for="title">Title</label><br>
<input type="text" name="title" id="title">
<br>
<label for="body">Content</label><br>
<textarea name="body" id="body" cols="30" rows="10"></textarea>
<?php csrf(); ?>
<input type="submit" value="Save">
</form>
<?php layout('frontend/blog/footer') ?>