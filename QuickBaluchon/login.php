<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Login page</title>
    </head>
    <?php include("inc/header.php"); ?>
    <body>
        <p>Prêt à te loger ?</p>
        <form>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon2">example@example.com</span>
                <input type="text" class="form-control" placeholder="E-mail address" aria-label="e-mail address" aria-describedby="basic-addon2">
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">PW</span>
                <input type="text" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1">
            </div>
        </form>
            <ul>
                <a href="index.php"><button type="submit" class="btn btn-primary">Retour à l'accueil</button></a>
                <a href="login_form.php"><button type="submit" class="btn btn-success">Valider</button></a>
            </ul>
    </body>
    <?php include("inc/footer.php"); ?>
</html>