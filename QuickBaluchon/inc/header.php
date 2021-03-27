<header class="p-3 text-white" style="background: rgb(103,66,50);color: rgb(255,255,255);">
    <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
    <div class="text-start">
        <a href="/QuickBaluchon/QuickBaluchon/index.php" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
            <img src="/QuickBaluchon/QuickBaluchon/img/Logo_SPS.png" style="width:20;height:16" alt="Logo"/>
        </a>
    </div>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
            <li><a href="#" class="nav-link px-2 text-white effect-shine">Item 1</a></li>
            <li><a href="#" class="nav-link px-2 text-white effect-shine">Item 2</a></li>
            <li><a href="#" class="nav-link px-2 text-white effect-shine">Item 3</a></li>
            <li><a href="#" class="nav-link px-2 text-white effect-shine">Item 4</a></li>
            <li><a href="#" class="nav-link px-2 text-white effect-shine">Item 5</a></li>
        </ul>

        <div class="text-end">
            <?php if (isset($_SESSION['user'])) { ?>
                <div class="row">
                    <?php if ($_SESSION['user']['rank'] == 'staff') { ?>
                    <div class="col">
                        <a href="/QuickBaluchon/QuickBaluchon/backend/compt_staff.php"><button type="button" class="btn btn-warning">Compte Staff</button></a>
                    </div>
                    <?php } else if($_SESSION['user']['rank'] == 'client') { ?>
                    <div class="col">
                        <a href="/QuickBaluchon/QuickBaluchon/client_space.php"><button type="button" class="btn btn-warning">Compte Client</button></a>
                    </div>
                    <?php } else if($_SESSION['user']['rank'] == 'deliveryman') { ?>
                    <div class="col">
                        <a href="/QuickBaluchon/QuickBaluchon/deliveryman_space.php"><button type="button" class="btn btn-warning">Compte Livreur</button></a>
                    </div>
                    <?php } ?>
                    <div class="col">
                        <a href="/QuickBaluchon/QuickBaluchon/actions/disconnect.php"><button type="button" class="btn btn-danger">Déconnexion</button></a>
                    </div>
                    
                </div>
            <?php } else { ?>
                <div class="row">
                    <div class="col">
                        <div class="dropdown">
                        <a aria-expanded="false" data-bs-toggle="dropdown" class="btn btn-outline-light me-2 dropdown-toggle" href="#">Connexion</a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="login_client.php">Client</a>
                                <a class="dropdown-item" href="login_deliveryman.php">Livreur</a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="dropdown">
                            <a aria-expanded="false" data-bs-toggle="dropdown" class="btn btn-warning me-2 dropdown-toggle" href="#">Inscription</a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="sign_in_company.php">Client</a>
                                    <a class="dropdown-item" href="sign_in_delivery.php">Livreur</a>
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

