<!DOCTYPE html>
<html>
  <head>
    
<?php include('assets.php') ?>

<link rel="stylesheet" href="/css/toggle.css">
<style>
.hero.is-info .title {
     color: #0a0a0a;
}
</style>
  </head>
  <body>
  <section class="hero is-warning is-bold is-large">
   
   <?php include('header.php') ?>

<?php 
require('Models\Post.php');


$posts = Post::get();


?>


  <div class="hero-body">
    <div class="container has-text-centered">
   
       <?php if ($posts->num_rows) : ?>
        <div class="level">
      <div class="level-left"></div>
      <div class="level-right">
          <a class="button" href="/export.php">Export All Posts (csv)</a>
      </div>
    </div>
<?php while ($post = mysqli_fetch_assoc($posts)) { ?>

       <div class="box">
          <p class="title">
             <strong><?= $post['title'] ?></strong>
          </p>

          <div id="content_<?= $post['id'] ?>"></div>


     </div>
       


  <script>
  jQuery(document).ready(function ($) {
  

      
new Quill("#content_<?= $post['id'] ?>", {
  readOnly: true,
}).setContents([
   <?php 
  $temp = json_decode($post['content']);

  $temp = str_replace("[", "", $post['content']);

  $temp = str_replace("]", "", $temp);

  $temp = str_replace("\n", "", $temp);

  echo $temp;
  ?>
]);
})
  </script>
      <?php 
    }
    ?>
</div>
   
     <?php else : ?>
<div class="box">

  <div class="level">
      <div class="level-left">        No Posts</div>
      <div class="level-right">
          <a class="button is-success" href="/create_post.php">Create New</a>
      </div>
    </div>
  
        </div>
     
     <?php endif; ?>
    </div>
  </div>
</section>

  </body>
</html>
