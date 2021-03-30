<?php layout('auth/header') ?>
<?php component('errors/messages') ?>
<main class="form-signin">
  <form method="post" action="<?php url('/auth/broker'); ?>">
    <h1 class="h3 mb-3 fw-normal">Login</h1>

    <div class="form-floating">
      <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
      <label for="floatingInput">Email address</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
      <label for="floatingPassword">Password</label>
    </div>

    <div class="checkbox mb-3">
      <label>
        <input type="checkbox" value="remember-me"> Remember me
      </label>
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
    <a href="<?php url('/register') ?>">Register</a>
    <p class="mt-5 mb-3 text-muted">© 2017–2021</p>
  </form>
</main>

<?php layout('auth/footer') ?>