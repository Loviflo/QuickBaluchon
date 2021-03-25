<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Page de connexion - Client</title>
        <?php include("inc/head.php"); ?>
    </head>
    <body>
        <?php include("inc/header.php"); ?>
        <div class="container pb-5">
        <h1 class="mt-3">Connexion à votre compte client</h1>
            <form action="actions/login_client_process.php" method="POST" class="needs-validation" novalidate>
                <div class="form-row">
                    <div class="col mb-3">
                        <label for="prenom">Nom de l'entreprise</label>
                        <input type="text" class="form-control" placeholder="Nom..." name="username" required>
                        <div class="valid-feedback">Ok !</div>
                        <div class="invalid-feedback">Valeur incorrecte</div>
                    </div>
                    <div class="col mb-3">
                        <label for="nom">Mot de passe</label>
                        <input type="password" class="form-control" placeholder="Mot de passe..." name="password" required>
                        <div class="valid-feedback">Ok !</div>
                        <div class="invalid-feedback">Valeur incorrecte</div>
                    </div>
                </div>
                <button class="btn btn-primary" type="submit">Envoyer</button>
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