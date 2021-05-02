<?php
ini_set('display_errors', 1);
require_once('bdd/database.php');
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include(dirname(__DIR__) . "/QuickBaluchon/inc/head.php"); ?>
        <title><?php echo $site->pagesClientSide->clientSpace->pageTitle; ?></title>
    </head>
    <body>
        <?php include(dirname(__DIR__) . "/QuickBaluchon/inc/header.php"); ?>
        <h1 class="display-1 text-center" style="color: #a4260a;"><?php echo $site->pagesClientSide->clientSpace->title; ?></h1>

        <?php
        $bdd = getDatabaseConnection();
        $q = 'SELECT * FROM package WHERE id_client = ?';
        $req = $bdd->prepare($q);
        $req->execute([$_SESSION['user']['id']]);
        $results = $req->fetchAll(); ?>
        <ul>
            <table class="table">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">Tracking ID</th>
                    <th scope="col">Destination</th>
                    <th scope="col">Poids</th>
                    <th scope="col">Type de livraison</th>
                    <th scope="col">État</th>
                </tr>
                </thead>
                <?php foreach ($results as $key => $package) { ?>
                <tbody>
                <tr>
                    <td><?= $package['tracking_id']; ?></td>
                    <td><?= $package['destination']; ?></td>
                    <td><?= $package['weight']; ?></td>
                    <td><?= $package['delivery_type']; ?></td>
                    <td><?= $package['delivery_status']; ?></td>
                </tr>
                <?php } ?>
                </tbody>
            </table>
        </ul>
        <?php include(dirname(__DIR__) . "/QuickBaluchon/inc/footer.php"); ?>
    </body>
</html>