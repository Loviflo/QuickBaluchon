<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign_in page</title>
</head>
<?php include("inc/header.php"); ?>
<body>
    <div class="container">
        <h4>Please fill up this form so we can see if we could work together !</h4>
        <form action="company_form.php">
            <div class="form-group">
                <label for="email">Business Email:</label>
                <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
            </div>
            <div class="form-group">
                <label for="CV">Your CV</label>
                <input type="file" class="form-control" id="CV" placeholder="Choose a file" name="CV">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
<?php include("inc/footer.php"); ?>
</html>
