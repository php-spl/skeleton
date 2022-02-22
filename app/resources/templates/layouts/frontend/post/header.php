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
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/blog/">

    <!-- Bootstrap core CSS -->
    <link href="<?php asset('css/framework/bootstrap.min.css') ?>" rel="stylesheet">

    <!-- Favicons -->
    <meta name="theme-color" content="#7952b3">
    
    <!-- Custom styles for this template -->
    <link href="<?php asset('css/fonts.css') ?>" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="<?php asset('css/blog.css') ?>" rel="stylesheet">
  </head>
  <body>

  <div class="container">
  <header class="blog-header py-3">
    <div class="row flex-nowrap justify-content-between align-items-center">
      <div class="col-4 pt-1">
        <a class="link-secondary" href="https://getbootstrap.com/docs/5.0/examples/blog/#">Subscribe</a>
      </div>
      <div class="col-4 text-center">
        <a class="blog-header-logo text-dark" href="<?php e(url('/posts')) ?>"><?php e(config('app.name')) ?></a>
      </div>
      <div class="col-4 d-flex justify-content-end align-items-center">
        <a class="link-secondary" href="https://getbootstrap.com/docs/5.0/examples/blog/#" aria-label="Search">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="mx-3" role="img" viewBox="0 0 24 24"><title>Search</title><circle cx="10.5" cy="10.5" r="7.5"></circle><path d="M21 21l-5.2-5.2"></path></svg>
        </a>
        <a class="btn btn-sm btn-outline-secondary" href="<?php url('/signup') ?>">Sign up</a>
      </div>
    </div>
  </header>

  <div class="nav-scroller py-1 mb-2">
    <nav class="nav d-flex justify-content-between">
      <a class="p-2 link-secondary" href="https://getbootstrap.com/docs/5.0/examples/blog/#">World</a>
      <a class="p-2 link-secondary" href="https://getbootstrap.com/docs/5.0/examples/blog/#">U.S.</a>
      <a class="p-2 link-secondary" href="https://getbootstrap.com/docs/5.0/examples/blog/#">Technology</a>
      <a class="p-2 link-secondary" href="https://getbootstrap.com/docs/5.0/examples/blog/#">Design</a>
      <a class="p-2 link-secondary" href="https://getbootstrap.com/docs/5.0/examples/blog/#">Culture</a>
      <a class="p-2 link-secondary" href="https://getbootstrap.com/docs/5.0/examples/blog/#">Business</a>
      <a class="p-2 link-secondary" href="https://getbootstrap.com/docs/5.0/examples/blog/#">Politics</a>
      <a class="p-2 link-secondary" href="https://getbootstrap.com/docs/5.0/examples/blog/#">Opinion</a>
      <a class="p-2 link-secondary" href="https://getbootstrap.com/docs/5.0/examples/blog/#">Science</a>
      <a class="p-2 link-secondary" href="https://getbootstrap.com/docs/5.0/examples/blog/#">Health</a>
      <a class="p-2 link-secondary" href="https://getbootstrap.com/docs/5.0/examples/blog/#">Style</a>
      <a class="p-2 link-secondary" href="https://getbootstrap.com/docs/5.0/examples/blog/#">Travel</a>
    </nav>
  </div>
</div>