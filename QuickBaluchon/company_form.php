<?php
require_once('inc/conf.php');

if (isset($_POST['email']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) && isset($_POST['SIRET_Nb']) && isset($_POST['motives'])){
    header("index.php?msg=\"Ceci est un test\"");
}
