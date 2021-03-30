<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <?php include("inc/head.php"); ?>
        <title><?php echo $site->pagesClientSide->signInClient->pageTitle; ?></title>
    </head>
    <body>
        <?php include("inc/header.php"); ?>
        <div class="container">
            <h1 class="mt-3"><?php echo $site->pagesClientSide->signInClient->title; ?></h1>
            <form action="company_form.php" method="post">
                <div class="form-group mb-3">
                    <label for="name"><?php echo $site->pagesClientSide->signInClient->form->usernameInput->title; ?></label>
                    <input type="text" class="form-control" id="name" placeholder="<?php echo $site->pagesClientSide->signInClient->form->usernameInput->placeholder; ?>" name="name" required>
                </div>
                <div class="form-group mb-3">
                    <label for="password"><?php echo $site->pagesClientSide->signInClient->form->passwordInput->title; ?></label>
                    <input type="password" class="form-control" id="password" placeholder="<?php echo $site->pagesClientSide->signInClient->form->passwordInput->placeholder; ?>" name="password" required>
                </div>
                <div class="form-group mb-3">
                    <label for="conf_password"><?php echo $site->pagesClientSide->signInClient->form->passwordInputVerification->title; ?></label>
                    <input type="password" class="form-control" id="conf_password" placeholder="<?php echo $site->pagesClientSide->signInClient->form->passwordInputVerification->placeholder; ?>" name="conf_password" required>
                </div>
                <div class="form-group mb-3">
                    <label for="email"><?php echo $site->pagesClientSide->signInClient->form->emailInput->title; ?></label>
                    <input type="email" class="form-control" id="email" placeholder="<?php echo $site->pagesClientSide->signInClient->form->emailInput->placeholder; ?>" name="email" required>
                </div>
                <div class="form-group mb-3">
                    <label for="siret"><?php echo $site->pagesClientSide->signInClient->form->siretNumberInput->title; ?></label>
                    <input type="password" class="form-control" id="siret" placeholder="<?php echo $site->pagesClientSide->signInClient->form->siretNumberInput->placeholder; ?>" name="siret" required>
                </div>
                <div class="form-group mb-3">
                    <label for="motives"><?php echo $site->pagesClientSide->signInClient->form->motivesInput->title; ?></label>
                    <input type="text" class="form-control" id="motives" placeholder="<?php echo $site->pagesClientSide->signInClient->form->motivesInput->placeholder; ?>" name="motives" required>
                </div>
                <button type="submit" class="btn btn-primary"><?php echo $site->pagesClientSide->signInClient->form->validation; ?></button>
            </form>
        </div>
        <?php include("inc/footer.php"); ?>
    </body>
</html>