<?php 
if (!class_exists('User')) {
  require('Models\User.php');
}
if (isset($_POST['login'])) {
  User::login();
}
?>


<!DOCTYPE html>
<html>
  <head>
    <title>Login</title>
    <?php include('assets.php') ?>

  </head>
  <body>
  <section class="hero is-warning is-bold is-large">

     <?php include('header.php') ?>


    <div class="hero-body">
     <form method="post" class="box" style="    width: 50%;
    margin: auto;">
          
     <h3 class="subtitle is-3">Login</h3>
     <div class="field">
  <label class="label">Email</label>
  <div class="control">
    <input class="input" name="email" type="text">
  </div>
</div>
<div class="field">
  <label class="label">Password</label>
  <div class="control">
    <input class="input" name="password" type="password">
  </div>
</div>
<div class="field">
  <button name="login" class="button is-success">LOGIN</button>
</div>
     </form>
    </div>

  </section>
  </body>
  </html>