<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css"
          rel="stylesheet"
          integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl"
          crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<header>
    <a href="index.php"> <img src="Logo SPS.png" alt="Nothing to see here"></a>
    <nav class="navbar">
    <a class="navbar-brand" href="#">
        <img src="Logo SPS.png" width="30" height="30" alt="">
    </a>
        <ul class="navbar-nav">
            <li class="nav-item"><a href="sign_in.php">Sign_in</a></li>
            <li class="nav-item"><a href="login.php">Login</a></li>
            <?php if (isset($_SESSION['user'])) { ?>
                <li class="nav-item"><a href="actions/disconnect.php">Déconnexion</a></li>
            <?php } ?>
        </ul>
    </nav>
</header>
<?php if(isset($_GET['msg'])) {
    echo "<p class='alert'>" . $_GET['msg'] . "</p>";
}
?>
