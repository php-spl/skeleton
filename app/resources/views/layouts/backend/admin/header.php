<!DOCTYPE html>
<html lang="en">
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>
    <?php if($title): ?>
        <?php e($title) ?>
    <?php else: ?>
        <?php e(config('app.name')) ?>
    <?php endif; ?>
    </title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/dashboard/">

    <!-- Bootstrap core CSS -->
    <link href="<?php asset('css/framework/bootstrap.min.css') ?>" rel="stylesheet">

    <!-- Favicons -->
    <meta name="theme-color" content="#7952b3">
    
    <!-- Custom styles for this template -->
    <link href="<?php asset('css/dashboard.css') ?>" rel="stylesheet">
</head>
  <body>