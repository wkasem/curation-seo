<?php 

require('Models\Post.php');


$posts = Post::get();

header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=data.csv');
$output = fopen("php://output", "w");
fputcsv($output, array('title', 'content'));
while ($post = mysqli_fetch_assoc($posts)) {
     unset($post['id']);
     unset($post['user_id']);
     fputcsv($output, $post);
}
fclose($output);
