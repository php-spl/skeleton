<?php layout('frontend/header') ?>

<?php if(isset($posts)): ?>
    <?php foreach($posts as $post): ?>
        <h2><?php e($post->title); ?></h2>
        <p><?php e($post->body); ?></p>
    <?php endforeach; ?>
<?php endif; ?>

<?php layout('frontend/footer') ?>