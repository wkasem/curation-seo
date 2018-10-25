 <?php 

if (!class_exists('User')) {
  require('Models\User.php');
}

if (isset($_GET['logout'])) {

  User::logout();
}
?>
 
 <div class="hero-head">
    <nav class="navbar">
      <div class="container">
        <div class="navbar-brand">
          <a class="navbar-item">

          </a>
          <span class="navbar-burger burger" data-target="navbarMenuHeroB">
            <span></span>
            <span></span>
            <span></span>
          </span>
        </div>
        <div id="navbarMenuHeroB" class="navbar-menu">

  
          <div class="navbar-end">
                <?php if (!User::check()) : ?>
            
            <span class="navbar-item">
              <a href="login.php" class="button is-info is-inverted">
                <span>Login</span>
              </a>
            </span>
            <span class="navbar-item">
              <a href="signup.php" class="button is-info is-inverted">
                <span>Signup</span>
              </a>
            </span>
          
<?php else : ?>
<a href="/" class="navbar-item">
              Home
            </a>
<a href="/create_post.php" class="navbar-item">
              New Post
            </a>
            <a href="/options.php" class="navbar-item">
              Options
            </a>
    <span class="navbar-item">
              <a href="?logout" class="button is-danger is-inverted">
                <span>logout</span>
              </a>
            </span>

<?php endif; ?>
</div>
        </div>
      </div>
    </nav>
  </div>