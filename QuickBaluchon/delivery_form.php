<?php
require_once('inc/conf.php');

if (isset($_POST['email']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) && isset($_FILES['CV'])){
    header("location:index.php?msg=\"Success\"");
    exit;
}else{
    header("location:index.php?msg=\"Error\"");
    exit;
}