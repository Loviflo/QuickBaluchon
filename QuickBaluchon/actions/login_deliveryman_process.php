<?php

require_once '../bdd/database.php';
ini_set("display_errors",1);

$db = getDatabaseConnection();

// $db = new PDO('mysql:host=localhost;dbname=quickbaluchon','root','root',
// array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

$q = 'SELECT username, comf_del FROM deliveryman WHERE username = ? AND password = ?';
$req = $db->prepare($q);
$req->execute([$_POST['username'],hash('sha512',$_POST['password'])]);
$results = $req->fetchAll();
if (count($results) == 0) {
	header('location: ../login_deliveryman.php?ifail=Identifiants incorrects');
} else if($results['comf_del'] == 0) {
	header('location: ../login_deliveryman.php?ifail=Votre compte est en cours de validation');
} 
else {
	$user = $_POST['username'];
	$q = $db->prepare("SELECT username FROM deliveryman WHERE username like :login ");
	if($q->execute(array(':login' => $user)) && $row = $q->fetch())
	{
        $user = $row['username'];
	
		session_start();
		$_SESSION['user'] = array('username' => $user,'rank' => 'deliveryman');

		header('location: ../index.php');
		exit();	
    }
	

}


?>
