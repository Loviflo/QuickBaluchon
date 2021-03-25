<?php

require_once '../bdd/database.php';
ini_set("display_errors",1);

$db = getDatabaseConnection();

// $db = new PDO('mysql:host=localhost;dbname=quickbaluchon','root','root',
// array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

$q = 'SELECT company_name FROM client WHERE company_name = ? AND cli_pwd = ?';
$req = $db->prepare($q);
$req->execute([$_POST['username'],hash('sha512',$_POST['password'])]);
$results = $req->fetchAll();
if (count($results) == 0) {
	header('location: ../login_client.php?ifail=Identifiants incorrects');
}else {
	$user = $_POST['username'];
	$q = $db->prepare("SELECT company_name FROM client WHERE company_name like :login ");
	if($q->execute(array(':login' => $user)) && $row = $q->fetch())
	{
        $user = $row['company_name'];
	
		session_start();
		$_SESSION['user'] = array('company_name' => $user);

		header('location: ../index.php');
		exit();	
    }
	

}


?>
