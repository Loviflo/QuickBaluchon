<?php
session_start();
require_once('../bdd/database.php');
require_once('../inc/head.php');
ini_set("display_errors",1);

$bdd = getDatabaseConnection();
$q = "UPDATE package SET delivery_status = 'NOT_FOUND' WHERE id_package = '" . $_GET['id_package'] . "'";
$req = $bdd->prepare($q);
if ($req->execute() == true) {
    header('location: /QuickBaluchon/QuickBaluchon/deliveryman_space.php?msg=' . $site->pagesClientSide->deliverymanSpace->successNotFound. '');
}else{
    header('location: /QuickBaluchon/QuickBaluchon/deliveryman_space.php?msg=' . $site->pagesClientSide->deliverymanSpace->errorNotFound . '');
}
