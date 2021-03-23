<?php
require_once('bdd/database.php');

if (isset($_POST['name']) && isset($_POST['email']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) && isset($_POST['siret']) && isset($_POST['motives'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $siret = $_POST['siret'];
    $motives = $_POST['motives'];
    $bdd = getDatabaseConnection();
    $q = 'INSERT INTO client (company_name,mail,siret_nb,motives) VALUES (:val1, :val2, :val3, :val4)';
    $req = $bdd->prepare($q);
    $req->execute([
        "val1" => $name,
        "val2" => $email,
        "val3" => $siret,
        "val4" => $motives
    ]);

    header("location:index.php?msg=\"Success\"");
    exit;
}else{
    header("location:index.php?msg=\"Error\"");
    exit;
}
