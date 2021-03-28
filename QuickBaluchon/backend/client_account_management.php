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
        $q = "SELECT company_name, mail, billing_address,siret_nb,motives FROM client WHERE company_name = '" . $_GET['company_name'] . "'";
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
                            <h4 class="card-title"><b>Nom de l'entreprise : </b><?php echo $result['company_name']; ?></h4>
                            <p class="card-text"><b>Mail : </b><?php echo $result['mail']; ?></p>
                            <p class="card-text"><b>Adresse de facturation : </b><?php echo $result['billing_address']; ?></p>
                            <p class="card-text"><b>Numéro de Siret : </b><?php echo $result['siret_nb']; ?></p>
                            <p class="card-text"><b>Motivations : </b><?php echo $result['motives']; ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php include(dirname(__DIR__) . "/inc/footer.php"); ?> 
    </body>
</html>