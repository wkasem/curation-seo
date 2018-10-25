<?php 
if (!class_exists('User')) {
    require('Models\User.php');
}

if (User::check()) {

    include 'posts.php';
} else {
    include 'login.php';
}