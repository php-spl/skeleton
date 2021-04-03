<?php include layout('auth/header') ?>
<main class="form-signin">
<?php component('error/messages') ?>
  <form method="post" action="<?php route('login') ?>">
    <h1 class="h3 mb-3 fw-normal">Login</h1>

    <div class="form-floating">
      <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com">
      <label for="floatingInput">Email or username</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
      <label for="floatingPassword">Password</label>
    </div>

    <div class="checkbox mb-3">
      <label>
        <input type="checkbox" value="remember"> Remember me
      </label>
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
    <a href="<?php route('register') ?>">Register</a><br>
    <a href="<?php route('login.broker') ?>?src=<?php current_url() ?>">SSO login</a><br>
    <?php if(auth()->check()): ?>
      <a href="<?php route('logout') ?>">Logout</a>
    <?php endif; ?>
    <p class="mt-5 mb-3 text-muted">© 2017–2021</p>
  </form>
</main>

<?php include layout('auth/footer') ?>