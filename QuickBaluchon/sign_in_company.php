<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Sign_in page</title>
    </head>
    <?php include("inc/header.php"); ?>
    <body>
        <div class="container">
            <h4>Please fill up this form so we can verify what is your company and is we could work together !</h4>
            <form action="company_form.php">
                <div class="form-group">
                    <label for="email">Business Email:</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                </div>
                <div class="form-group">
                    <label for="SIRET_Nb">SIRET number</label>
                    <input type="password" class="form-control" id="SIRET_Nb" placeholder="Enter your company's SIRET number" name="siret">
                </div>
                <div class="form-group">
                    <label for="motives">Let us know your motives for working with us</label>
                    <input type="text" class="form-control" id="motives" placeholder="Write about why we should work with you" name="motives">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </body>
    <?php include("inc/footer.php"); ?>
</html>