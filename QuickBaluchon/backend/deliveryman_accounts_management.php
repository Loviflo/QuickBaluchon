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
        <h1 class="display-1 text-center" style="color: #a4260a;">Gestion des comptes livreur</h1>
        <?php
        $bdd = getDatabaseConnection();
        $q = 'SELECT username FROM deliveryman';
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
                        <td class="text-center"><?php echo $user['username']; ?></td>
                        <td class="text-center">
                            <a href="/QuickBaluchon/QuickBaluchon/backend/deliveryman_account_management.php?username=<?php echo $user['username']; ?>" class="btn btn-primary" role="button" style="margin: 2px;"><i class="far fa-eye"></i></a>
                            <!-- <a class="btn btn-success" role="button" style="background: rgb(11,171,56);margin: 2px;"><i class="fas fa-pencil-alt"></i></a> -->
                            <a href="/QuickBaluchon/QuickBaluchon/backend/actions/deliveryman_delete_account.php?username=<?php echo $user['username']; ?>" class="btn btn-danger" onclick="deletehref(this)" data-bs-toggle="modal" data-bs-target="#deleteAccount" role="button" style="margin: 2px;"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </ul>

        <!-- Modal -->
        <div class="modal fade" id="deleteAccount" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Suppresion de compte</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Etes-vous sûr de vouloir supprimer ce compte ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                <a id="deleteURL" href=""><button type="button" class="btn btn-danger">Confirmer</button></a>
            </div>
            </div>
        </div>
        </div>

        <?php include(dirname(__DIR__) . "/inc/footer.php"); ?>

        <script>
            function deletehref(link) {
                let href = link.href;
                let idDeleteURL = document.getElementById('deleteURL');
                idDeleteURL.href = href;
            }
        </script>
        
    </body>
</html>