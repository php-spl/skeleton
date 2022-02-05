<?php include layout('frontend/post/header') ?>

<main class="container">
  <div class="p-4 p-md-5 mb-4 text-white rounded bg-dark">
    <div class="col-md-6 px-0">
      <h1 class="display-4 fst-italic"><?php e($post->title) ?></h1>
    </div>
  </div>

  <div class="row">
    <div class="col-md-8">

      <article class="blog-post">
        <p class="blog-post-meta">January 1, 2014 by <a href="https://getbootstrap.com/docs/5.0/examples/blog/#">Mark</a></p>
        <hr>
        <p><?php e($post->body) ?></p>
      </article><!-- /.blog-post -->

      <nav class="blog-pagination" aria-label="Pagination">
        <a class="btn btn-outline-primary" href="https://getbootstrap.com/docs/5.0/examples/blog/#">Older</a>
        <a class="btn btn-outline-secondary disabled" href="https://getbootstrap.com/docs/5.0/examples/blog/#" tabindex="-1" aria-disabled="true">Newer</a>
      </nav>

    </div>

    <div class="col-md-4">

      <div class="p-4">
        <h4 class="fst-italic">Archives</h4>
        <ol class="list-unstyled mb-0">
          <li><a href="https://getbootstrap.com/docs/5.0/examples/blog/#">March 2014</a></li>
          <li><a href="https://getbootstrap.com/docs/5.0/examples/blog/#">February 2014</a></li>
          <li><a href="https://getbootstrap.com/docs/5.0/examples/blog/#">January 2014</a></li>
          <li><a href="https://getbootstrap.com/docs/5.0/examples/blog/#">December 2013</a></li>
          <li><a href="https://getbootstrap.com/docs/5.0/examples/blog/#">November 2013</a></li>
          <li><a href="https://getbootstrap.com/docs/5.0/examples/blog/#">October 2013</a></li>
          <li><a href="https://getbootstrap.com/docs/5.0/examples/blog/#">September 2013</a></li>
          <li><a href="https://getbootstrap.com/docs/5.0/examples/blog/#">August 2013</a></li>
          <li><a href="https://getbootstrap.com/docs/5.0/examples/blog/#">July 2013</a></li>
          <li><a href="https://getbootstrap.com/docs/5.0/examples/blog/#">June 2013</a></li>
          <li><a href="https://getbootstrap.com/docs/5.0/examples/blog/#">May 2013</a></li>
          <li><a href="https://getbootstrap.com/docs/5.0/examples/blog/#">April 2013</a></li>
        </ol>
      </div>

      <div class="p-4">
        <h4 class="fst-italic">Elsewhere</h4>
        <ol class="list-unstyled">
          <li><a href="https://getbootstrap.com/docs/5.0/examples/blog/#">GitHub</a></li>
          <li><a href="https://getbootstrap.com/docs/5.0/examples/blog/#">Twitter</a></li>
          <li><a href="https://getbootstrap.com/docs/5.0/examples/blog/#">Facebook</a></li>
        </ol>
      </div>
    </div>

  </div><!-- /.row -->

</main><!-- /.container -->

<?php include layout('frontend/post/footer') ?>