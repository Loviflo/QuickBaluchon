<?php
session_start();
require_once('../bdd/database.php');
require_once('../inc/head.php');
ini_set("display_errors",1);

$bdd = getDatabaseConnection();
$q = "UPDATE package SET id_deliveryman = " . $_GET['deliveryman_id'] . ", delivery_status = 'IN_PROGRESS' WHERE id_package = '" . $_GET['id_package'] . "'";
$req = $bdd->prepare($q);
if ($req->execute() == true) {
    header('location: /QuickBaluchon/QuickBaluchon/client_space.php?msg=' . $site->pagesClientSide->clientSpace->successAssignement . '');
}else{
    header('location: /QuickBaluchon/QuickBaluchon/client_space.php?msg=' . $site->pagesClientSide->clientSpace->errorAssignement . '');
}

