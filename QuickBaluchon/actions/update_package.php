<?php
session_start();
require_once('../bdd/database.php');
require_once('../inc/head.php');
ini_set("display_errors",1);

if ($_GET['tracking_id'] == "") {
    header('location: /QuickBaluchon/QuickBaluchon/index.php?msg=' . $site->pagesClientSide->packageDelivered->errorUpdate . '');
}
$bdd = getDatabaseConnection();
$q = "UPDATE package SET delivery_status = 'DELIVERED' WHERE tracking_id = '" . $_GET['tracking_id'] . "'";
echo $q;
$req = $bdd->prepare($q);
if ($req->execute() == true) {
    if ($req->rowCount() == 0) {
        header('location: /QuickBaluchon/QuickBaluchon/index.php?msg=' . $site->pagesClientSide->packageDelivered->errorUpdate . '');
    } else {
    header('location: /QuickBaluchon/QuickBaluchon/index.php?msg=' . $site->pagesClientSide->packageDelivered->successUpdate . '');
    }
}else{
    header('location: /QuickBaluchon/QuickBaluchon/index.php?msg=' . $site->pagesClientSide->packageDelivered->errorUpdate . '');
}