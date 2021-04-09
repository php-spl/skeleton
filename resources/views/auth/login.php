<?php include layout('backend/auth/header') ?>
<main class="form-signin">
<?php component('error/messages') ?>
  <form method="post" action="<?php route('login.auth') ?>">
    <h1 class="h3 mb-3 fw-normal"><?php __('Login') ?></h1>

    <div class="form-floating">
      <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com">
      <label for="floatingInput">Email or username</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
      <label for="floatingPassword"><?php __('Password') ?></label>
    </div>

    <div class="checkbox mb-3">
      <label>
        <input type="checkbox" value="remember"> <?php __('Remember me') ?>
      </label>
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit"><?php __('Sign in') ?></button>
    <a href="<?php route('register') ?>"><?php __('Register') ?></a>
    <a href="<?php route('sso.login') ?>?src=<?php route('sso.login') ?>">SSO login</a>
    <?php if(auth()->check()): ?>
      <a href="<?php route('logout') ?>"><?php __('Logout') ?></a>
    <?php endif; ?>
    <p class="mt-5 mb-3 text-muted">© 2017–2021</p>
  </form>
</main>

<?php include layout('backend/auth/footer') ?>