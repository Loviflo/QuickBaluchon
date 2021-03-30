<header class="p-3 text-white" style="background: rgb(103,66,50);color: rgb(255,255,255);">
    <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
    <div class="text-start">
        <a href="/QuickBaluchon/QuickBaluchon/index.php" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
            <img src="/QuickBaluchon/QuickBaluchon/img/Logo_SPS.png" style="width:20;height:16" alt="Logo"/>
        </a>
    </div>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
            <li><a href="#" class="nav-link px-2 text-white effect-shine"><?php echo $site->headers->header->item1; ?></a></li>
            <li><a href="#" class="nav-link px-2 text-white effect-shine"><?php echo $site->headers->header->item2; ?></a></li>
            <li><a href="#" class="nav-link px-2 text-white effect-shine"><?php echo $site->headers->header->item3; ?></a></li>
            <li><a href="#" class="nav-link px-2 text-white effect-shine"><?php echo $site->headers->header->item4; ?></a></li>
            <li><a href="#" class="nav-link px-2 text-white effect-shine"><?php echo $site->headers->header->item5; ?></a></li>
            <li>
                <select class="selectpicker form-select" data-width="fit" onchange="location = this.value;">
                    <option value="/QuickBaluchon/QuickBaluchon/index.php">Français</option>
                    <option value="/QuickBaluchon/QuickBaluchon/en/index.php">English</option>
                </select>
            </li>
        </ul>

        <div class="text-end">
            <?php if (isset($_SESSION['user'])) { ?>
                <div class="row">
                    <?php if ($_SESSION['user']['rank'] == 'staff') { ?>
                    <div class="col">
                        <a href="/QuickBaluchon/QuickBaluchon/backend/staff_account.php"><button type="button" class="btn btn-warning"><?php echo $site->headers->header->itemClientSpace->staff; ?></button></a>
                    </div>
                    <?php } else if($_SESSION['user']['rank'] == 'client') { ?>
                    <div class="col">
                        <a href="/QuickBaluchon/QuickBaluchon/client_space.php"><button type="button" class="btn btn-warning"><?php echo $site->headers->header->itemClientSpace->client; ?></button></a>
                    </div>
                    <?php } else if($_SESSION['user']['rank'] == 'deliveryman') { ?>
                    <div class="col">
                        <a href="/QuickBaluchon/QuickBaluchon/deliveryman_space.php"><button type="button" class="btn btn-warning"><?php echo $site->headers->header->itemClientSpace->deliveryman; ?></button></a>
                    </div>
                    <?php } ?>
                    <div class="col">
                        <a href="/QuickBaluchon/QuickBaluchon/actions/disconnect.php"><button type="button" class="btn btn-danger"><?php echo $site->headers->header->itemDisconnect; ?></button></a>
                    </div>
                    
                </div>
            <?php } else { ?>
                <div class="row">
                    <div class="col">
                        <div class="dropdown">
                        <a aria-expanded="false" data-bs-toggle="dropdown" class="btn btn-outline-light me-2 dropdown-toggle" href="#"><?php echo $site->headers->header->itemLogIn->title; ?></a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="login_client.php"><?php echo $site->headers->header->itemLogIn->client; ?></a>
                                <a class="dropdown-item" href="login_deliveryman.php"><?php echo $site->headers->header->itemLogIn->deliveryman; ?></a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="dropdown">
                            <a aria-expanded="false" data-bs-toggle="dropdown" class="btn btn-warning me-2 dropdown-toggle" href="#"><?php echo $site->headers->header->itemSignIn->title; ?></a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="sign_in_company.php"><?php echo $site->headers->header->itemSignIn->client; ?></a>
                                    <a class="dropdown-item" href="sign_in_deliveryman.php"><?php echo $site->headers->header->itemSignIn->deliveryman; ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</header>
<?php if(isset($_GET['msg'])) {
    echo "<p class='alert'>" . $_GET['msg'] . "</p>";
}
?>

