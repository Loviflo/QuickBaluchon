<?php
ini_set('display_errors', 1);
session_start();
// $_SESSION['user'] = 'Odin';
require_once(dirname(__DIR__) . "/bdd/database.php");
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Accueil</title>
        <?php include(dirname(__DIR__) . "/inc/head.php"); ?>
    </head>
    <body>
        <?php include(dirname(__DIR__) . "/inc/header_staff.php"); ?>
        <h1 class="display-1 text-center" style="color: #a4260a;">Gestion des comptes</h1>
        <?php
        $bdd = getDatabaseConnection();
        $q = 'SELECT company_name FROM client';
        $req = $bdd->prepare($q);
        $req->execute();
        $results = $req->fetchAll(); ?>
        <ul>
            <table class="table">
                <thead class="thead-dark">
                <tr>
                    <th scope="col" class="text-center">Nom de l'entreprise</th>
                    <th scope="col" class="text-center">Actions</th>
                </tr>
                </thead>
                <?php foreach ($results as $key => $user) { ?>
                <tbody>
                    <tr>
                        <td class="text-center"><?php echo $user['company_name']; ?></td>
                        <td class="text-center">
                            <a href="/QuickBaluchon/QuickBaluchon/backend/account_management.php?company_name=<?php echo $user['company_name']; ?>" class="btn btn-primary" role="button" style="margin: 2px;"><i class="far fa-eye"></i></a>
                            <!-- <a class="btn btn-success" role="button" style="background: rgb(11,171,56);margin: 2px;"><i class="fas fa-pencil-alt"></i></a> -->
                            <a href="/QuickBaluchon/QuickBaluchon/backend/actions/delete_account.php?company_name=<?php echo $user['company_name']; ?>" class="btn btn-danger" role="button" style="margin: 2px;"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </ul>
        <?php include(dirname(__DIR__) . "/inc/footer.php"); ?>
        
    </body>
</html>