<?php
ini_set('display_errors', 1);
session_start();
require_once(dirname(__DIR__) . "/bdd/database.php");
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Accueil</title>
        <?php include(dirname(__DIR__) . "/inc/head.php"); ?>
    </head>
    <body>
        <?php include(dirname(__DIR__) . "/inc/header_staff.php"); ?>
        <h1 class="display-1 text-center" style="color: #a4260a;">Gestion du compte</h1>
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
                            <img src="<?php echo $result['cv']; ?>" alt="Profil" class="w-100">
                        </div>
                        <div class="col-md-8 px-3">
                            <div class="card-block px-3">
                            <h4 class="card-title"><b>Nom d'utilisateur : </b><?php echo $result['username']; ?></h4>
                            <p class="card-text"><b>Mail : </b><?php echo $result['del_email']; ?></p>
                            <p class="card-text"><b>Distance de livraison : </b><?php echo $result['delivery_range']; ?> Km</p>
                            <p class="card-text"><b>Nombre de kilomètres : </b><?php echo $result['nb_km']; ?> Km</p>
                            <p class="card-text"><b>Nombre de colis : </b><?php echo $result['nb_pck']; ?></p>
                            <p class="card-text"><b>IBAN : </b><?php echo $result['iban']; ?></p>
                            <p class="card-text"><b>Type de véhicule : </b><?php echo $result['vehicle_type']; ?></p>
                            <p class="card-text"><b>Marque du véhicule : </b><?php echo $result['vehicle_brand']; ?></p>
                            <p class="card-text"><b>Capacité du véhicule : </b><?php echo $result['vehicle_capacity']; ?> L</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php include(dirname(__DIR__) . "/inc/footer.php"); ?> 
    </body>
</html>