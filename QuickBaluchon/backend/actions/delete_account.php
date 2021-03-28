<?php
ini_set('display_errors', 1);
session_start();
require_once(dirname(__DIR__) . "/../bdd/database.php");
$bdd = getDatabaseConnection();
$q = "DELETE FROM client WHERE company_name = '" . $_GET['company_name'] . "'";
$req = $bdd->prepare($q);
$req->execute();
header('location: /QuickBaluchon/QuickBaluchon/backend/accounts_management.php')
?>
