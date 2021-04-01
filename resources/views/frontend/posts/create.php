<?php include layout('frontend/blog/header') ?>
<?php include component('errors/messages') ?>
    <form action="<?php route('post.store') ?>" method="post">
    <label for="title">Title</label><br>
    <input type="text" name="title" id="title">
    <br>
    <label for="body">Content</label><br>
    <textarea name="body" id="body" cols="30" rows="10"></textarea>
    <?php csrf(); ?>
    <input type="submit" value="Save">
    </form>
<?php include layout('frontend/blog/footer') ?>