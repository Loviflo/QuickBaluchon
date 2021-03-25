<?php
ini_set('display_errors', 1);
session_start();
$_SESSION['user'] = 'Odin';
require_once '../bdd/database.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Accueil</title>
        <?php include("../inc/head.php"); ?>
    </head>
    <body>
        <?php include("../inc/header.php"); ?>
        <h1 class="display-1 text-center" style="color: #a4260a;">Espace Staff</h1>
        <?php
        $bdd = getDatabaseConnection();
        $q = 'SELECT username, password FROM staff WHERE username = ?';
        $req = $bdd->prepare($q);
        $req->execute([]);
        $results = $req->fetchAll(); ?>
        <?php echo $results?>
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
        <?php include("../inc/footer.php"); ?>
    </body>
</html>