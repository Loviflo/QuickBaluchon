<?php
ini_set('display_errors', 1);
require_once('../bdd/database.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include(dirname(__DIR__) . "/inc/head.php"); ?>
    <title><?php echo $site->pagesClientSide->clientSpace->pageTitle; ?></title>
</head>
<body>
    <?php include(dirname(__DIR__) . "/inc/header.php"); ?>
    <h2 class="text-center" style="color: #a4260a;"><?php echo $site->pagesClientSide->clientSpace->title; ?></h2>
    <div class="container">
    <?php
    $bdd = getDatabaseConnection();
    $q = 'SELECT * FROM bill WHERE id_client = ?';
    $req = $bdd->prepare($q);
    $req->execute([$_SESSION['user']['id']]);
    $results = $req->fetchAll();
    ?>

    <ul>
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col"><?php echo $site->pagesClientSide->clientSpace->bill->billId; ?></th>
                <th scope="col"><?php echo $site->pagesClientSide->clientSpace->bill->billDate; ?></th>
                <th scope="col"><?php echo $site->pagesClientSide->clientSpace->bill->billAmount; ?></th>
                <th scope="col"><?php echo $site->pagesClientSide->clientSpace->bill->action; ?></th>
            </tr>
            </thead>
            <?php foreach ($results as $key => $bill) { ?>
            <tbody>
            <tr>
                <td><?= $bill['id_bill']; ?></td>
                <td><?= $bill['bill_date']; ?></td>
                <td><?= $bill['amount'] . " EUR"; ?></td>
                <td>
                    <a class="btn btn-primary" onclick="href='../bills/<?php echo $bill['file_bill'] ?>'" download="Bill.pdf"> <?php echo $site->pagesClientSide->clientSpace->bill->downloadBill; ?></a>                </td>
            </tr>
            <? }?>
            </tbody>
        </table>
    </ul>
    </div>
</body>
</html>
