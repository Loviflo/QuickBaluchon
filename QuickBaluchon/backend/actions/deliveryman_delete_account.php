<?php
ini_set('display_errors', 1);
session_start();
require_once(dirname(__DIR__) . "/../bdd/database.php");
$bdd = getDatabaseConnection();
$q = "DELETE FROM deliveryman WHERE username = '" . $_GET['username'] . "'";
$req = $bdd->prepare($q);
$req->execute();
header('location: /QuickBaluchon/QuickBaluchon/backend/deliveryman_accounts_management.php')
?>
