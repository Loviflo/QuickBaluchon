<?php
//require_once('inc/conf.php');
echo "ok";

if (isset($_POST['email']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) && isset($_POST['SIRET_Nb']) && isset($_POST['motives'])){
    echo "ok";
    header("location:index.php?msg=\"Success\"");
    exit;
}else{
    echo "ko";
    header("location:index.php?msg=\"Error\"");
    exit;
}
