
<?php header('Content-Type: text/html; charset=utf-8'); ?>
<!DOCTYPE html>
<html>
  <head>
    
<?php include('assets.php') ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/2.3.5/jspdf.plugin.autotable.js"></script>

<script src="/js/table2csv.js"></script>
<script src="/js/filesaver.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/TableExport/4.0.11/js/tableexport.min.js"></script>

<?php 

require dirname(__FILE__) . '\Models\Seo.php';
require dirname(__FILE__) . '\Models\Draft.php';

if (!class_exists('Options')) {
  require(dirname(__FILE__) . '\Models\Options.php');
}
?>

<script>
var seo = '<?php echo json_encode(Seo::get()); ?>';
seo = JSON.parse(seo);
var options = '<?php echo json_encode(Options::get()); ?>';
options = JSON.parse(options);
var draft = '<?php echo str_replace("\\n", ' ', json_encode(Draft::get())); ?>';
draft = JSON.parse(draft);
</script>


  </head>
  <body>
  <section class="hero is-primary is-bold is-large">
   
   <?php include('header.php') ?>

  <div  class="hero-body">
    <div class="container has-text-centered">

<form action="/sql/create_post.php" method="post">
    <div  action="/sql/create_post.php" method="post" class="box">
       <p class="control">
          <label for="title" class="label">Title</label>
          <input type="text" id="title" name="title" class="input">
       </p>
<br>
       <button type="submit" name="post_save" class="button is-pulled-right is-success">Create</button>
    </div>

    <div class="card box">
  <div class="card-content">
     <div class="editor-container" style="  height: 375px;">

     </div>
     <textarea style="display:none;" name="content" class="submit_content"></textarea>

<br>


  </div>
</div>
</form>

<div class="box" id="vue" style="margin-top: 1.5em;">
      <div class="tabs is-centered is-boxed">
  <ul>
    <li :class="{'is-active' : active == 'curation'}" >
      <a @click="active = 'curation'">
        <span>Curation</span>
      </a>
    </li>
    <li :class="{'is-active' : active == 'seo'}">
      <a @click="active = 'seo'">
        <span>Seo</span>
      </a>
    </li>
    <li :class="{'is-active' : active == 'drafts'}">
      <a @click="active = 'drafts'">
        <span>Drafts</span>
      </a>
    </li>
  </ul>
</div>

<div class="tab-content" v-cloak>

    <Curation v-show="active == 'curation'" :seed="options" inline-template>
       <?php include 'inc/curation.php' ?>
    </Curation>
    <Seo v-show="active == 'seo'" :seed="seo" inline-template>
         <?php include 'inc/seo.php' ?>
    </Seo>
    <Draft v-show="active == 'drafts'" :seed="draft" inline-template>
         <?php include 'inc/drafts.php' ?>
    </Draft>
</div>
  </div>

    </div>

    
  </div>
</section>

  <script>
  window.addEventListener('load' , function(){

new Vue({
  el : "#vue",
  data(){
    return {
      active : 'seo'
    }
  },
})

window.quill = new Quill('.editor-container', {
 modules: {
   toolbar: [
     [{ header: [1, 2, false] }],
     ['bold', 'italic', 'underline'],
     ['image', 'code-block']
   ]
 },
 placeholder: 'Compose an epic...',
 theme: 'snow' , // or 'bubble',
});

quill.on('text-change', function(delta, oldDelta, source) {
  $('.submit_content').val( JSON.stringify(quill.getContents().ops));
});

  });


  </script>




  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.5.17/vue.min.js"></script>
<script src="https://unpkg.com/vuejs-paginate@latest"></script>

<script>
Vue.component('paginate', VuejsPaginate);
</script>
<script src="/js/api.js"></script>
<script src="/js/curation.js"></script>
<script src="/js/seo.js"></script>
<script src="/js/draft.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<link rel="stylesheet" href="/css/datatable.css">
<link rel="stylesheet" href="/css/loading.css">
<style>
[v-cloak] {display: none}
.pagination-link.is-current{
     color: white !important;
}

li.active .pagination-link{
  background-color:blue;
       color: white !important;

}
</style>

  </body>
</html>
