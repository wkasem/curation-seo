<?php 


if (!class_exists('User')) {
     require('Models\Draft.php');
}

require '.' . '/sql/Mysql.php';


Draft::insert($conn);