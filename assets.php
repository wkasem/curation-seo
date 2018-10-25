<?php 
require '.' . '/helpers/env.php';

if (!class_exists('Options')) {
    require('Models\Options.php');
}

$options = Options::get();
?>

<script>
var googleApiKey = "<?= env('googleApiKey'); ?>";
var googleSearchKey = "<?= env('googleSearchKey'); ?>";
var googleNewsSearchKey = "<?= env('googleNewsSearchKey'); ?>";
var googleImagesSearchKey = "<?= env('googleImagesSearchKey'); ?>";
var googleBlogsSearchKey = "<?= env('googleBlogsSearchKey'); ?>";
var googleBooksSearchKey = "<?= env('googleBooksSearchKey'); ?>";
var youtubeSearchKey = "<?= env('youtubeSearchKey'); ?>";
var flickrSearchKey = "<?= env('flickrSearchKey'); ?>";
</script>
<base href="/">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Curation & SEO</title> 
    <link rel="stylesheet" href="https://unpkg.com/bulmaswatch/<?= $options ? $options->ui : 'default' ?>/bulmaswatch.min.css">

    <link rel="stylesheet" href="https://hunzaboy.github.io/Cool-Checkboxes-for-Bulma.io/dist/css/bulma-radio-checkbox.css">
      
      <link href="//cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

<script src="//cdn.quilljs.com/1.3.6/quill.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
