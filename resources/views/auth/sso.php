<?php include layout('backend/auth/header') ?>
<main class="form-signin">
<?php include component('error/messages') ?>
  <form method="post" action="<?php route('sso.auth') ?>">
    <h1 class="h3 mb-3 fw-normal">SSO Login</h1>

    <div class="form-floating">
      <input type="text" name="username" class="form-control" id="floatingInput" >
      <label for="floatingInput"><?php __('Username') ?></label>
    </div>
    <div class="form-floating">
      <input type="password" name="password" class="form-control" id="floatingPassword">
      <label for="floatingPassword"><?php __('Password') ?></label>
    </div>
    <input type="hidden" name="src" value="<?php e($_GET['src']) ?>">
    <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
    <?php if(auth()->check()): ?>
      <a href="<?php route('logout') ?>">Logout</a>
    <?php endif; ?>
    <a href="<?php route('login') ?>">Login</a>
    <a href="<?php route('register') ?>">Register</a>
    <p class="mt-5 mb-3 text-muted">© 2017–2021</p>
  </form>
</main>

<?php include layout('backend/auth/footer') ?>