<?php
ini_set('display_errors', 1);
session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include(dirname(__DIR__) . "/QuickBaluchon/inc/head.php"); ?>
        <title><?php echo $site->pagesClientSide->clientSpace->pageTitle; ?></title>
    </head>
    <body>
        <?php include(dirname(__DIR__) . "/QuickBaluchon//inc/header.php"); ?>
        <h1 class="display-1 text-center" style="color: #a4260a;"><?php echo $site->pagesClientSide->clientSpace->title; ?></h1>
        <?php include(dirname(__DIR__) . "/QuickBaluchon//inc/footer.php"); ?>
    </body>
</html>