<?php
ini_set('display_errors', 1);
// $_SESSION['user'] = 'Odin';
require_once(dirname(__DIR__) . "/bdd/database.php");
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include(dirname(__DIR__) . "/inc/head.php"); ?>
        <title><?php echo $site->pagesAdminSide->staffAccount->pageTitle; ?></title>
    </head>
    <body>
        <?php 
        include(dirname(__DIR__) . "/inc/header_staff.php"); ?>
        <h1 class="display-1 text-center" style="color: #a4260a;"><?php echo $site->pagesAdminSide->staffAccount->title; ?></h1>
        <?php
        $bdd = getDatabaseConnection();
        $q = 'SELECT username, password FROM staff WHERE username = ?';
        $req = $bdd->prepare($q);
        $req->execute([$_SESSION['user']['username']]);
        $results = $req->fetchAll(); ?>
        <ul>
            <table class="table">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">username</th>
                    <th scope="col">password</th>
                </tr>
                </thead>
                <?php foreach ($results as $key => $user) { ?>
                <tbody>
                    <tr>
                        <td><?= $user['username']; ?></td>
                        <td><?= $user['password']; ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </ul>
        <?php include(dirname(__DIR__) . "/inc/footer.php"); ?>
        
    </body>
</html>