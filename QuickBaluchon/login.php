<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Login page</title>
        <?php include("inc/head.php"); ?>
    </head>
    <body>
    <?php include("inc/header.php"); ?>
        <p>Prêt à te loger ?</p>
        <form action="actions/login_form.php" method="POST">
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon2">Nom d'utilisateur</span>
                <input type="text" name="username" class="form-control" placeholder="Votre nom d'utilisateur..." aria-label="e-mail address" aria-describedby="basic-addon2">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Mot de passe</span>
                <input type="password" name="password" class="form-control" placeholder="Password" aria-label="Votre mot de passe" aria-describedby="basic-addon1">
            </div>
            <div>
                <button type="submit" class="btn btn-success">Valider</button>
            </div>
        </form>
        <?php if (isset($_GET['ifail'])) {
            echo "<h3 class='text-warning'>" . $_GET['ifail'] . "</h3>";
        } ?>
            <ul>
                <a href="index.php"><button type="submit" class="btn btn-primary">Retour à l'accueil</button></a>
            </ul>
            <?php include("inc/footer.php"); ?>
    </body>
</html>