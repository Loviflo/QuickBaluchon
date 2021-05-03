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
        <h2 class="text-center" style="color: #a4260a;"><?php echo $site->pagesClientSide->clientSpace->title; ?></h2>
        <div class="container">
            <?php
            $bdd = getDatabaseConnection();
            $q = 'SELECT id_deliveryman, username FROM deliveryman';
            $req = $bdd->prepare($q);
            $req->execute();
            $results = $req->fetchAll();


            $q2 = 'SELECT * FROM package WHERE id_client = ?';
            $req2 = $bdd->prepare($q2);
            $req2->execute([$_SESSION['user']['id']]);
            $results2 = $req2->fetchAll(); ?>
            <div class="form-group mb-1">
                <label for="deliveryman"><?php echo $site->pagesClientSide->clientSpace->deliverymanList; ?></label>
                <select id="deliveryman" class="form-control" name="deliveryman">
                    <?php foreach ($results as $key => $deliveryman) { ?>
                    <option value="<?= $deliveryman['id_deliveryman']; ?>"><?= $deliveryman['username']; ?></option>
                    <?php } ?>
                </select>
            </div>
            <ul>
                <table class="table">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col"><?php echo $site->pagesClientSide->clientSpace->trackingId; ?></th>
                        <th scope="col"><?php echo $site->pagesClientSide->clientSpace->destination; ?></th>
                        <th scope="col"><?php echo $site->pagesClientSide->clientSpace->weight; ?></th>
                        <th scope="col"><?php echo $site->pagesClientSide->clientSpace->deliveryType; ?></th>
                        <th scope="col"><?php echo $site->pagesClientSide->clientSpace->status; ?></th>
                    </tr>
                    </thead>
                    <?php foreach ($results2 as $key => $package) { ?>
                    <tbody>
                    <tr>
                        <td><?= $package['tracking_id']; ?></td>
                        <td><?= $package['destination']; ?></td>
                        <td><?= $package['weight']; ?></td>
                        <td><?= $package['delivery_type']; ?></td>
                        <td><?= $package['delivery_status']; ?></td>
                        <td>
                            <?php if($package['delivery_status'] == "TO_DELIVER"){ ?>
                            <a class="btn btn-primary" onclick="location.href='actions/assign_package.php?tracking_id=<?php echo $package['tracking_id'] ?>&deliveryman_id='+document.getElementById('deliveryman').options[document.getElementById('deliveryman').selectedIndex].value;return false;"><?php echo $site->pagesClientSide->clientSpace->assignPackage; ?></a>
                            <?php } ?>
                        </td>
                    </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </ul>
            <div class="text-center">
                <a class="btn btn-primary" href="downloads/SPS.exe" download="PackagerToolInstaller.exe"><?php echo $site->pagesClientSide->clientSpace->downloadButton; ?></a>
            </div>
            <div class="text-center">
                <a class="btn btn-primary" href="actions/generateBill.php"><?php echo $site->pagesClientSide->clientSpace->billButton; ?></a>
            </div>
        </div>
        <?php include(dirname(__DIR__) . "/QuickBaluchon/inc/footer.php"); ?>
    </body>
</html>