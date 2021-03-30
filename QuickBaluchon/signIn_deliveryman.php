<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <?php include("inc/head.php"); ?>
    <title><?php echo $site->pagesClientSide->signInDeliveryman->pageTitle; ?></title>
</head>
<body>
    <?php include("inc/header.php"); ?>
    <div class="container">
        <h1 class="mt-3"><?php echo $site->pagesClientSide->signInDeliveryman->title; ?></h1>
        <form action="delivery_form.php" method="post" enctype="multipart/form-data">
            <div class="form-group mb-3">
                <label for="username"><?php echo $site->pagesClientSide->signInDeliveryman->form->usernameInput->title; ?></label>
                <input type="text" class="form-control" id="username" placeholder="<?php echo $site->pagesClientSide->signInDeliveryman->form->usernameInput->placeholder; ?>" name="username" required>
            </div>
            <div class="form-group mb-3">
                <label for="password"><?php echo $site->pagesClientSide->signInDeliveryman->form->passwordInput->title; ?></label>
                <input type="password" class="form-control" id="password" placeholder="<?php echo $site->pagesClientSide->signInDeliveryman->form->passwordInput->placeholder; ?>" name="password" required>
            </div>
            <div class="form-group mb-3">
                <label for="conf_password"><?php echo $site->pagesClientSide->signInDeliveryman->form->passwordInputVerification->title; ?></label>
                <input type="password" class="form-control" id="conf_password" placeholder="<?php echo $site->pagesClientSide->signInDeliveryman->form->passwordInputVerification->placeholder; ?>" name="conf_password" required>
            </div>
            <div class="form-group mb-3">
                <label for="email"><?php echo $site->pagesClientSide->signInDeliveryman->form->emailInput->title; ?></label>
                <input type="email" class="form-control" id="email" placeholder="<?php echo $site->pagesClientSide->signInDeliveryman->form->emailInput->placeholder; ?>" name="email" required>
            </div>
            <div class="form-group mb-3">
                <label for="CV"><?php echo $site->pagesClientSide->signInDeliveryman->form->fileInput->title; ?></label>
                <input type="file" class="form-control" id="CV" name="CV" required>
            </div>
            
            <button type="submit" class="btn btn-primary"><?php echo $site->pagesClientSide->signInDeliveryman->form->validation; ?></button>
        </form>
    </div>
    <?php include("inc/footer.php"); ?>
</body>
</html>
