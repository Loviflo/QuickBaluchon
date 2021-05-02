<?php
require_once('../bdd/database.php');

$allowed_types = array(
    'application/msword',
    'text/plain',
    'application/pdf'
);

if (isset($_POST['username']) &&
    isset($_POST['password']) &&
    isset($_POST['conf_password']) &&
    $_POST['password'] === $_POST['conf_password'] &&
    isset($_POST['iban']) &&
    isset($_POST['vehicle_type']) &&
    isset($_POST['vehicle_brand']) &&
    isset($_POST['vehicle_capacity']) &&
    isset($_POST['del_range']) &&
    isset($_POST['email']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) &&
    isset($_FILES['CV']) && in_array($_FILES['CV']['type'], $allowed_types)){

    $username = htmlspecialchars($_POST['username']);
    $password = $_POST['password'];
    $email = htmlspecialchars($_POST['email']);
    $iban = htmlspecialchars($_POST['iban']);
    $vType = htmlspecialchars($_POST['vehicle_type']);
    $vBrand = htmlspecialchars($_POST['vehicle_brand']);
    $vCapacity = htmlspecialchars($_POST['vehicle_capacity']);
    $deliveryRange = htmlspecialchars($_POST['del_range']);
    $path = '../uploads';

    if(!file_exists($path)){
        mkdir($path, 0777, true);
    }
    $filename = htmlspecialchars($_FILES['CV']['name']);
    $temp = explode('.', $filename);
    $extension = end($temp);
    $filename = 'CV' . $username . '.' . $extension;
    $cv_path = $path . '/' . $filename;
    move_uploaded_file($_FILES['CV']['tmp_name'], $cv_path);
    $bdd = getDatabaseConnection();
    $q = 'INSERT INTO deliveryman (username,password,del_email,delivery_range,iban,vehicle_type,vehicle_brand,vehicle_capacity,cv) VALUES (:val1, :val2, :val3, :val4, :val5, :val6, :val7, :val8, :val9)';
    $req = $bdd->prepare($q);
    $req->execute([
        "val1" => $username,
        "val2" => hash("sha512",$password),
        "val3" => $email,
        "val4" => $deliveryRange,
        "val5" => $iban,
        "val6" => $vType,
        "val7" => $vBrand,
        "val8" => $vCapacity,
        "val9" => $cv_path
    ]);
    header("location:../index.php?");
    exit;
}else{
    header("location:../index.php?error");
    exit;
}