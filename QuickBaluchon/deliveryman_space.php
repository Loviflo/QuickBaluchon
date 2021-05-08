<?php
ini_set('display_errors', 1);
require_once('bdd/database.php');
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include(dirname(__DIR__) . "/QuickBaluchon//inc/head.php"); ?>
        <title><?php echo $site->pagesClientSide->deliverymanSpace->pageTitle; ?></title>
    </head>
    <body>
        <?php include(dirname(__DIR__) . "/QuickBaluchon//inc/header.php"); ?>
        <h1 class="display-1 text-center" style="color: #a4260a;"><?php echo $site->pagesClientSide->deliverymanSpace->title; ?></h1>
        <?php include(dirname(__DIR__) . "/QuickBaluchon//inc/footer.php"); ?>
        <div class="container">
            <?php
            $bdd = getDatabaseConnection();
            $q = "SELECT * FROM package WHERE id_deliveryman = ? AND delivery_status NOT IN ('DELIVERED', 'NOT_FOUND')";
            $req = $bdd->prepare($q);
            $req->execute([$_SESSION['user']['id']]);
            $results = $req->fetchAll();
           ?>
            <ul>
                <table class="table">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col"><?php echo $site->pagesClientSide->deliverymanSpace->trackingId; ?></th>
                        <th scope="col"><?php echo $site->pagesClientSide->deliverymanSpace->destination; ?></th>
                        <th scope="col"><?php echo $site->pagesClientSide->deliverymanSpace->weight; ?></th>
                        <th scope="col"><?php echo $site->pagesClientSide->deliverymanSpace->deliveryType; ?></th>
                        <th scope="col"><?php echo $site->pagesClientSide->deliverymanSpace->status; ?></th>
                        <th scope="col"><?php echo $site->pagesClientSide->deliverymanSpace->additionalInfo; ?></th>
                        <th scope="col"><?php echo $site->pagesClientSide->clientSpace->action; ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($results as $key => $package) { ?>
                    <tr>
                        <td><?= $package['tracking_id']; ?></td>
                        <td><?= $package['destination']; ?></td>
                        <td><?= $package['weight']; ?></td>
                        <td><?= $package['delivery_type']; ?></td>
                        <td><?= $package['delivery_status']; ?></td>
                        <td><?= $package['additional_info']; ?></td>
                        <td>
                            <a class="btn btn-primary" onclick="location.href='actions/packageNotFound.php?id_package=<?php echo $package['id_package']; ?>'"><?php echo $site->pagesClientSide->deliverymanSpace->notFoundButton; ?></a>
                        </td>
                    </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </ul>
            <div class="text-center">
                <a class="btn btn-primary" href="https://play.google.com/store/apps/details?id=app.qrcode&hl=fr&gl=US"><?php echo $site->pagesClientSide->deliverymanSpace->downloadButton; ?></a>
            </div>
        </div>
        <?php include(dirname(__DIR__) . "/QuickBaluchon/inc/footer.php"); ?>
    </body>
</html>