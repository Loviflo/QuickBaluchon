<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css"
          rel="stylesheet"
          integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl"
          crossorigin="anonymous">
          <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<header class="p-3 text-white" style="background: rgb(103,66,50);color: rgb(255,255,255);">
    <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
    <div class="text-start">
        <a href="index.php" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
            <img src="img/Logo_SPS.png" style="width:20;height:16" alt="Logo"/>
        </a>
    </div>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0 effect-shine">
            <li><a href="#" class="nav-link px-2 text-white">Item 1</a></li>
            <li><a href="#" class="nav-link px-2 text-white">Item 2</a></li>
            <li><a href="#" class="nav-link px-2 text-white">Item 3</a></li>
            <li><a href="#" class="nav-link px-2 text-white">Item 4</a></li>
            <li><a href="#" class="nav-link px-2 text-white">Item 5</a></li>
        </ul>

        <div class="text-end">
            <?php if (isset($_SESSION['user'])) { ?>
                <a href="actions/disconnect.php"><button type="button" class="btn btn-danger">Déconnexion</button></a>
            <?php } else { ?>
            <a href="login.php"><button type="button" class="btn btn-outline-light me-2">Login</button></a>
            <a href="sign_in.php"><button type="button" class="btn btn-warning">Sign-up</button></a>
            <?php } ?>
        </div>
    </div>
</header>
<?php if(isset($_GET['msg'])) {
    echo "<p class='alert'>" . $_GET['msg'] . "</p>";
}
?>

