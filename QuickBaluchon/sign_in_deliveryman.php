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
        <h1 class="mt-3">Création de compte livreur</h1>
        <form action="delivery_form.php" method="post" enctype="multipart/form-data">
            <div class="form-group mb-3">
                <label for="username">Username:</label>
                <input type="text" class="form-control" id="username" placeholder="Enter a username" name="username" required>
            </div>
            <div class="form-group mb-3">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" placeholder="Enter password" name="password" required>
            </div>
            <div class="form-group mb-3">
                <label for="conf_password">Confirm your password:</label>
                <input type="password" class="form-control" id="conf_password" placeholder="Retype your password" name="conf_password" required>
            </div>
            <div class="form-group mb-3">
                <label for="email">Business Email:</label>
                <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required>
            </div>
            <div class="form-group mb-3">
                <label for="CV">Your CV</label>
                <input type="file" class="form-control" id="CV" name="CV" required>
            </div>
            
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <?php include("inc/footer.php"); ?>
</body>
</html>
