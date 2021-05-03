<?php
ini_set('display_errors', 1);
require_once(dirname(__DIR__) . "/bdd/database.php");
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include(dirname(__DIR__) . "/inc/head.php"); ?>
        <title><?php echo $site->pagesAdminSide->deliverymanAccountManagement->pageTitle; ?></title>
    </head>
    <body>
        <?php include(dirname(__DIR__) . "/inc/header_staff.php"); ?>
        <h1 class="display-1 text-center" style="color: #a4260a;"><?php echo $site->pagesAdminSide->deliverymanAccountManagement->title; ?></h1>
        <?php
        $bdd = getDatabaseConnection();
        $q = "SELECT username, del_email, delivery_range,nb_km,nb_pck,iban,cv,vehicle_type,vehicle_brand,vehicle_capacity FROM deliveryman WHERE username = '" . $_GET['username'] . "'";
        $req = $bdd->prepare($q);
        $req->execute();
        $result = $req->fetch(); 
        ?>
        <section>
            <div class="container py-3">
                <div class="card">
                    <div class="row ">
                        <div class="col-md-4">
                            <img src="../img/utilisateur-de-profil.png" alt="Profil" class="w-100">
                        </div>
                        <div class="col-md-8 px-3">
                            <div class="card-block px-3">
                            <h4 class="card-title"><b><?php echo $site->pagesAdminSide->deliverymanAccountManagement->card->username; ?></b><?php echo $result['username']; ?></h4>
                            <p class="card-text"><b><?php echo $site->pagesAdminSide->deliverymanAccountManagement->card->mail; ?></b><?php echo $result['del_email']; ?></p>
                            <p class="card-text"><b><?php echo $site->pagesAdminSide->deliverymanAccountManagement->card->deliveryDistance; ?></b><?php echo $result['delivery_range']; ?> Km</p>
                            <p class="card-text"><b><?php echo $site->pagesAdminSide->deliverymanAccountManagement->card->kilometersNumber; ?></b><?php echo $result['nb_km']; ?> Km</p>
                            <p class="card-text"><b><?php echo $site->pagesAdminSide->deliverymanAccountManagement->card->packagesNumber; ?></b><?php echo $result['nb_pck']; ?></p>
                            <p class="card-text"><b><?php echo $site->pagesAdminSide->deliverymanAccountManagement->card->IBAN; ?></b><?php echo $result['iban']; ?></p>
                            <p class="card-text"><b><?php echo $site->pagesAdminSide->deliverymanAccountManagement->card->vehicleType; ?></b><?php echo $result['vehicle_type']; ?></p>
                            <p class="card-text"><b><?php echo $site->pagesAdminSide->deliverymanAccountManagement->card->vehicleBrand; ?></b><?php echo $result['vehicle_brand']; ?></p>
                            <p class="card-text"><b><?php echo $site->pagesAdminSide->deliverymanAccountManagement->card->vehicleCapacity; ?></b><?php echo $result['vehicle_capacity']; ?> L</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php include(dirname(__DIR__) . "/inc/footer.php"); ?> 
    </body>
</html>