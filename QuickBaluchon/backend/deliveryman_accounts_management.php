<?php
ini_set('display_errors', 1);
// $_SESSION['user'] = 'Odin';
require_once(dirname(__DIR__) . "/bdd/database.php");
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <?php include(dirname(__DIR__) . "/inc/head.php"); ?>
        <title><?php echo $site->pagesAdminSide->deliverymanAccountsManagement->pageTitle; ?></title>
    </head>
    <body>
        <?php include(dirname(__DIR__) . "/inc/header_staff.php"); ?>
        <h2 class="text-center" style="color: #a4260a;"><?php echo $site->pagesAdminSide->deliverymanAccountsManagement->title; ?></h2>
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
                    <th scope="col" class="text-center"><?php echo $site->pagesAdminSide->deliverymanAccountsManagement->table->th1; ?></th>
                    <th scope="col" class="text-center"><?php echo $site->pagesAdminSide->deliverymanAccountsManagement->table->th2; ?></th>
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
                <h5 class="modal-title"><?php echo $site->pagesAdminSide->deliverymanAccountsManagement->table->modal->title; ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?php echo $site->pagesAdminSide->deliverymanAccountsManagement->table->modal->text; ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?php echo $site->pagesAdminSide->deliverymanAccountsManagement->table->modal->cancelButton; ?></button>
                <a id="deleteURL" href=""><button type="button" class="btn btn-danger"><?php echo $site->pagesAdminSide->deliverymanAccountsManagement->table->modal->confirmButton; ?></button></a>
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