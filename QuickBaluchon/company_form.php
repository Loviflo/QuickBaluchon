<?php
require_once('inc/conf.php');

if (isset($_POST['email']) /*&& filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)*/ && isset($_POST['siret']) && isset($_POST['motives'])){
    header("location:index.php?msg=\"Success\"");
    exit;
}else{
    header("location:index.php?msg=\"Error\"");
    exit;
}
