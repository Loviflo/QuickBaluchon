<?php
ini_set('display_errors', 1);
require_once(dirname(__DIR__) . "/bdd/database.php");
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include(dirname(__DIR__) . "/inc/head.php"); ?>
        <title><?php echo $site->pagesAdminSide->clientAccountManagement->pageTitle; ?></title>
    </head>
    <body>
        <?php include(dirname(__DIR__) . "/inc/header_staff.php"); ?>
        <h2 class="text-center" style="color: #a4260a;"><?php echo $site->pagesAdminSide->clientAccountManagement->title; ?></h2>
        <?php
        $bdd = getDatabaseConnection();
        $q = "SELECT company_name, mail, billing_address,siret_nb,motives FROM client WHERE id_client = '" . $_GET['id_client'] . "'";
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
                                <h4 class="card-title"><b><?php echo $site->pagesAdminSide->clientAccountManagement->card->username; ?></b><?php echo $result['company_name']; ?></h4>
                                <p class="card-text"><b><?php echo $site->pagesAdminSide->clientAccountManagement->card->mail; ?></b><?php echo $result['mail']; ?></p>
                                <p class="card-text"><b><?php echo $site->pagesAdminSide->clientAccountManagement->card->billingAddress; ?></b><?php echo $result['billing_address']; ?></p>
                                <p class="card-text"><b><?php echo $site->pagesAdminSide->clientAccountManagement->card->siretNumber; ?></b><?php echo $result['siret_nb']; ?></p>
                                <p class="card-text"><b><?php echo $site->pagesAdminSide->clientAccountManagement->card->motives; ?></b><?php echo $result['motives']; ?></p>
                                <div class="text-center">
                                    <a class="btn btn-primary" href="../actions/generateBill.php?id_client=<?php echo $_GET['id_client']; ?>&mail=<?php echo $result['mail']; ?>"><?php echo $site->pagesAdminSide->clientAccountManagement->card->billButton; ?></a>
                                    <a class="btn btn-primary" href="../actions/billHistory.php?id_client=<?php echo $_GET['id_client']; ?>"><?php echo $site->pagesClientSide->clientSpace->historyButton; ?></a>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </section>
        <?php include(dirname(__DIR__) . "/inc/footer.php"); ?> 
    </body>
</html>