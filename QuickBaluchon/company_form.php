<?php
require_once('inc/conf.php');

if (isset($_POST['email']) && isset($_POST['SIRET_Nb']) && isset($_POST['motives'])){
    header("location:index.php?msg=\"Success\"");
    exit;
}else{
    header("location:index.php?msg=\"Error\"");
    exit;
}
