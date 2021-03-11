<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Sign_in page</title>
    </head>
    <?php include("inc/header.php"); ?>
    <body>
        <div class="text-center">
            <h2>Want to join us ?</h2>
            <h3>Are you ...</h3>
        </div>
        <div class="container text-center">
            <div class="row align-middle">
                <div class="col-md-4 text-center align-middle">
                    <h4>A company ?</h4>
                    <a href="sign_in_company.php"><button type="submit" class="btn btn-primary">Click here</button></a>
                </div>
                <div class="col-md-4 text-center align-middle">
                    <h4>A delivery man ?</h4>
                    <a href="sign_in_delivery.php"><button type="submit" class="btn btn-primary">Click here</button></a>
                </div>
            </div>
        </div>
    </body>
    <?php include("inc/footer.php"); ?>
</html>