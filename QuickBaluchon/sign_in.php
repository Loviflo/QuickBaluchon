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
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <h4>A company ?</h4>
                        <button type="button" class="btn btn-primary"><a href="sign_in_company.php">Click here</a></button>
                    </div>
                    <div class="col-sm-6">
                        <h4>A delivery man ?</h4>
                        <button type="button" class="btn btn-primary"><a href="sign_in_delivery.php">Click here</a></button>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <?php include("inc/footer.php"); ?>
</html>