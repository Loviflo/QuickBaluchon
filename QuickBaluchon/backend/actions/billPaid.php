<?php
session_start();
require_once('../../bdd/database.php');
require_once('../../inc/head.php');
ini_set("display_errors",1);

$bdd = getDatabaseConnection();
$q = "UPDATE bill SET paid = 1 WHERE id_bill = '" . $_GET['id_bill'] . "'";
$req = $bdd->prepare($q);
if ($req->execute() == true) {
    header("location: /QuickBaluchon/QuickBaluchon/actions/billHistory.php?id_client=" . $_GET['id_client'] . "&msg=" . $site->pagesAdminSide->clientAccountManagement->successPaid);
}else{
    header("location: /QuickBaluchon/QuickBaluchon/actions/billHistory.php?id_client=" . $_GET['id_client'] . "&msg=" . $site->pagesAdminSide->clientAccountManagement->errorPaid);
}
