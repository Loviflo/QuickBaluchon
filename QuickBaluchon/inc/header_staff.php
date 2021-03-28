<?php 
if (!$_SESSION['user']['rank'] == 'staff') {
    header('location: ../index.php');
}
?>

<header class="p-3 text-white" style="background: rgb(103,66,50);color: rgb(255,255,255);">
    <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
    <div class="text-start">
        <a href="/QuickBaluchon/QuickBaluchon/index.php" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
            <img src="/QuickBaluchon/QuickBaluchon/img/Logo_SPS.png" style="width:20;height:16" alt="Logo"/>
        </a>
    </div>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
            <li><a href="/QuickBaluchon/QuickBaluchon/backend/client_accounts_management.php" class="nav-link px-2 text-white effect-shine">Gestion des comptes client</a></li>
            <li><a href="/QuickBaluchon/QuickBaluchon/backend/deliveryman_accounts_management.php" class="nav-link px-2 text-white effect-shine">Gestion des comptes livreur</a></li>
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
                    <?php } ?>
                    <div class="col">
                        <a href="/QuickBaluchon/QuickBaluchon/actions/disconnect.php"><button type="button" class="btn btn-danger">Déconnexion</button></a>
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

