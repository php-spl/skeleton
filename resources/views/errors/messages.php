<?php if(session()->has('errors')): ?>
<?php $errors = session()->get('errors') ?>
<?php foreach($errors as $error): ?>
    <?php foreach($error as $message): ?>
    <div class="alert alert-danger" role="alert">
    <?php e($message) ?>
    </div>
    <?php endforeach ?>
<?php endforeach ?>
<?php session()->delete('errors') ?>
<?php endif ?>

<?php if(session()->has('success')): ?>
    <div class="alert alert-success" role="alert">
    <?php e(session()->get('success')) ?>
    </div>
    <?php session()->delete('success') ?>
<?php endif ?>