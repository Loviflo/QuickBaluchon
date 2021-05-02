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
        <h2 class="mt-1"><?php echo $site->pagesClientSide->signInDeliveryman->title; ?></h2>
        <form action="actions/delivery_form.php" method="post" enctype="multipart/form-data">
            <div class="form-group mb-1">
                <label for="username"><?php echo $site->pagesClientSide->signInDeliveryman->form->usernameInput->title; ?></label>
                <input type="text" class="form-control" id="username" placeholder="<?php echo $site->pagesClientSide->signInDeliveryman->form->usernameInput->placeholder; ?>" name="username" required>
            </div>
            <div class="form-group mb-1">
                <label for="delivery_range"><?php echo $site->pagesClientSide->signInDeliveryman->form->deliveryRangeInput->title; ?></label>
                <input type="number" min="0" class="form-control" id="del_range" placeholder="<?php echo $site->pagesClientSide->signInDeliveryman->form->deliveryRangeInput->placeholder; ?>" name="del_range" required>
            </div>
            <div class="form-group mb-1">
                <label for="iban"><?php echo $site->pagesClientSide->signInDeliveryman->form->ibanInput->title; ?></label>
                <input type="number" class="form-control" id="iban" placeholder="<?php echo $site->pagesClientSide->signInDeliveryman->form->ibanInput->placeholder; ?>" name="iban" required>
            </div>
            <div class="form-group mb-1">
                <label for="vehicle_type"><?php echo $site->pagesClientSide->signInDeliveryman->form->vehicleTypeInput->title; ?></label>
                <select id="vehicle_type" class="form-control" name="vehicle_type">
                    <option value=""><?php echo $site->pagesClientSide->signInDeliveryman->form->vehicleTypeInput->option0; ?></option>
                    <option value="small_car"><?php echo $site->pagesClientSide->signInDeliveryman->form->vehicleTypeInput->option1; ?></option>
                    <option value="medium_car"><?php echo $site->pagesClientSide->signInDeliveryman->form->vehicleTypeInput->option2; ?></option>
                    <option value="big_car"><?php echo $site->pagesClientSide->signInDeliveryman->form->vehicleTypeInput->option3; ?></option>
                    <option value="other"><?php echo $site->pagesClientSide->signInDeliveryman->form->vehicleTypeInput->option4; ?></option>
                </select>
            </div>
            <div class="form-group mb-1">
                <label for="vehicle_brand"><?php echo $site->pagesClientSide->signInDeliveryman->form->vehicleBrandInput->title; ?></label>
                <input type="text" class="form-control" id="vehicle_brand" placeholder="<?php echo $site->pagesClientSide->signInDeliveryman->form->vehicleBrandInput->placeholder; ?>" name="vehicle_brand" required>
            </div>
            <div class="form-group mb-1">
                <label for="vehicle_capacity"><?php echo $site->pagesClientSide->signInDeliveryman->form->vehicleCapacityInput->title; ?></label>
                <input type="number" min="0" class="form-control" id="vehicle_capacity" placeholder="<?php echo $site->pagesClientSide->signInDeliveryman->form->vehicleCapacityInput->placeholder; ?>" name="vehicle_capacity" required>
            </div>
            <div class="form-group mb-1">
                <label for="password"><?php echo $site->pagesClientSide->signInDeliveryman->form->passwordInput->title; ?></label>
                <input type="password" class="form-control" id="password" placeholder="<?php echo $site->pagesClientSide->signInDeliveryman->form->passwordInput->placeholder; ?>" name="password" required>
            </div>
            <div class="form-group mb-1">
                <label for="conf_password"><?php echo $site->pagesClientSide->signInDeliveryman->form->passwordInputVerification->title; ?></label>
                <input type="password" class="form-control" id="conf_password" placeholder="<?php echo $site->pagesClientSide->signInDeliveryman->form->passwordInputVerification->placeholder; ?>" name="conf_password" required>
            </div>
            <div class="form-group mb-1">
                <label for="email"><?php echo $site->pagesClientSide->signInDeliveryman->form->emailInput->title; ?></label>
                <input type="email" class="form-control" id="email" placeholder="<?php echo $site->pagesClientSide->signInDeliveryman->form->emailInput->placeholder; ?>" name="email" required>
            </div>
            <div class="form-group mb-1">
                <label for="CV"><?php echo $site->pagesClientSide->signInDeliveryman->form->fileInput->title; ?></label>
                <input type="file" class="form-control" accept=".pdf,.docx,.doc" id="CV" name="CV" required>
            </div>
            
            <button type="submit" class="btn btn-primary"><?php echo $site->pagesClientSide->signInDeliveryman->form->validation; ?></button>
        </form>
    </div>
    <?php include("inc/footer.php"); ?>
</body>
</html>
