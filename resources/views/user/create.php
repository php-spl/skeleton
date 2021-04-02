<?php include layout('auth/header') ?>
<?php include component('errors/messages') ?>
<main class="form-signin">
  <form method="post" action="<?php route('register') ?>">
    <h1 class="h3 mb-3 fw-normal">Register</h1>

    <div class="form-floating">
      <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
      <label for="floatingInput">Email address</label>
    </div>
    <div class="form-floating">
      <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
      <label for="floatingPassword">Password</label>
    </div>

    <button class="w-100 btn btn-lg btn-primary" type="submit">Register</button>
    <a href="<?php url('/login') ?>">Login</a>
    <p class="mt-5 mb-3 text-muted">© 2017–2021</p>
  </form>
</main>

<?php include layout('auth/footer') ?>