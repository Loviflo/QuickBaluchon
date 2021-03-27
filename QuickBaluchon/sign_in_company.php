<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Sign_in page</title>
        <?php include("inc/head.php"); ?>
    </head>
    <body>
        <?php include("inc/header.php"); ?>
        <div class="container">
            <h1 class="mt-3">Création de compte client</h1>
            <form action="company_form.php" method="post">
                <div class="form-group mb-3">
                    <label for="name">Company name:</label>
                    <input type="text" class="form-control" id="name" placeholder="Enter your company name" name="name" required>
                </div>
                <div class="form-group mb-3">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" id="password" placeholder="Enter your password" name="password" required>
                </div>
                <div class="form-group mb-3">
                    <label for="conf_password">Confirmed password:</label>
                    <input type="password" class="form-control" id="conf_password" placeholder="Confirmed your password" name="conf_password" required>
                </div>
                <div class="form-group mb-3">
                    <label for="email">Business Email:</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required>
                </div>
                <div class="form-group mb-3">
                    <label for="siret">SIRET number</label>
                    <input type="password" class="form-control" id="siret" placeholder="Enter your company's SIRET number" name="siret" required>
                </div>
                <div class="form-group mb-3">
                    <label for="motives">Let us know your motives for working with us</label>
                    <input type="text" class="form-control" id="motives" placeholder="Write about why we should work with you" name="motives" required>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        <?php include("inc/footer.php"); ?>
    </body>
</html>