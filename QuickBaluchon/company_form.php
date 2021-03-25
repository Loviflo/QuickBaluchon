<?php
require_once('bdd/database.php');

if (isset($_POST['name']) &&
    isset($_POST['password']) &&
    isset($_POST['conf_password']) &&
    $_POST['password'] === $_POST['conf_password'] &&
    isset($_POST['email']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) &&
    isset($_POST['siret']) &&
    isset($_POST['motives'])){

    $name = htmlspecialchars($_POST['name']);
    $password = $_POST['password'];
    $email = htmlspecialchars($_POST['email']);
    $siret = htmlspecialchars($_POST['siret']);
    $motives = htmlspecialchars($_POST['motives']);
    $bdd = getDatabaseConnection();
    $q = 'INSERT INTO client (company_name,cli_pwd,mail,siret_nb,motives) VALUES (:val1, :val2, :val3, :val4, :val5)';
    $req = $bdd->prepare($q);
    $req->execute([
        "val1" => $name,
        "val2" => hash("sha512",$password),
        "val3" => $email,
        "val4" => $siret,
        "val5" => $motives
    ]);

    header("location:index.php?msg=".' '.$name .' '. $password.' '. $email .' '. $siret .' '.  $motives);
    exit;
}else{
    header("location:index.php?msg=Error");
    exit;
}
