<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <?php include(dirname(__DIR__) . "/QuickBaluchon/inc/head.php"); ?>
        <title><?php echo $site->pagesClientSide->logInClient->pageTitle; ?></title>
    </head>
    <body>
        <?php include(dirname(__DIR__) . "/QuickBaluchon/inc/header.php"); ?>
        <div class="container pb-5">
        <h1 class="mt-3"><?php echo $site->pagesClientSide->logInClient->title; ?></h1>
            <form action="actions/login_client_process.php" method="POST" class="needs-validation" novalidate>
                <div class="form-row">
                    <div class="col mb-3">
                        <label for="prenom"><?php echo $site->pagesClientSide->logInClient->form->usernameInput->title; ?></label>
                        <input type="text" class="form-control" placeholder="<?php echo $site->pagesClientSide->logInClient->form->usernameInput->placeholder; ?>" name="username" required>
                        <div class="valid-feedback"><?php echo $site->pagesClientSide->logInClient->form->usernameInput->valid; ?></div>
                        <div class="invalid-feedback"><?php echo $site->pagesClientSide->logInClient->form->usernameInput->invalid; ?></div>
                    </div>
                    <div class="col mb-3">
                        <label for="nom"><?php echo $site->pagesClientSide->logInClient->form->passwordInput->title; ?></label>
                        <input type="password" class="form-control" placeholder="<?php echo $site->pagesClientSide->logInClient->form->passwordInput->placeholder; ?>" name="password" required>
                        <div class="valid-feedback"><?php echo $site->pagesClientSide->logInClient->form->passwordInput->valid; ?></div>
                        <div class="invalid-feedback"><?php echo $site->pagesClientSide->logInClient->form->passwordInput->invalid; ?></div>
                    </div>
                </div>
                <button class="btn btn-primary" type="submit"><?php echo $site->pagesClientSide->logInClient->form->validation; ?></button>
            </form>
        </div>
        <?php if (isset($_GET['ifail'])) {
            echo "<h3 class='text-warning'>" . $_GET['ifail'] . "</h3>";
        } ?>
        <?php include("inc/footer.php"); ?>
    </body>
</html>
<script>
/*La fonction principale de ce script est d'empêcher l'envoi du formulaire si un champ a été mal rempli
*et d'appliquer les styles de validation aux différents éléments de formulaire*/
(function() {
    'use strict';
    window.addEventListener('load', function() {
    let forms = document.getElementsByClassName('needs-validation');
    let validation = Array.prototype.filter.call(forms, function(form) {
        form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
        }
        form.classList.add('was-validated');
        }, false);
    });
    }, false);
})();
</script>