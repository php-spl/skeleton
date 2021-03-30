<?php include layout('auth/header') ?>
<?php include component('errors/messages') ?>
<main class="form-signin">
  <form method="post" action="<?php url('/auth/sso/idp'); ?>">
    <h1 class="h3 mb-3 fw-normal">SSO Login</h1>

    <div class="form-floating">
      <input type="text" name="username" class="form-control" id="floatingInput" >
      <label for="floatingInput">Username</label>
    </div>
    <div class="form-floating">
      <input type="password" name="password" class="form-control" id="floatingPassword">
      <label for="floatingPassword">Password</label>
    </div>
    <input type="hidden" name="src" value="<?php e($_GET['src']) ?>">
    <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
    <a href="<?php url('/register') ?>">Register</a>
    <p class="mt-5 mb-3 text-muted">© 2017–2021</p>
  </form>
</main>

<?php include layout('auth/footer') ?>