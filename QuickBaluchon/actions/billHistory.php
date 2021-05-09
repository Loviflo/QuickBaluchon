<?php
ini_set('display_errors', 1);
require_once('../bdd/database.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include(dirname(__DIR__) . "/inc/head.php"); ?>
</head>
<body>
    <?php include(dirname(__DIR__) . "/inc/header.php"); ?>
    <div class="container">
    <?php
    $bdd = getDatabaseConnection();
    $q = 'SELECT * FROM bill WHERE id_client = ?';
    $req = $bdd->prepare($q);
    if (isset($_GET['id_client'])){
        $req->execute([$_GET['id_client']]);
    }else{
        $req->execute([$_SESSION['user']['id']]);
    }
    $results = $req->fetchAll();
    ?>

    <ul>
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col"><?php echo $site->pagesClientSide->clientSpace->bill->billId; ?></th>
                <th scope="col"><?php echo $site->pagesClientSide->clientSpace->bill->billDate; ?></th>
                <th scope="col"><?php echo $site->pagesClientSide->clientSpace->bill->billAmount; ?></th>
                <th scope="col"><?php echo $site->pagesClientSide->clientSpace->bill->billPaid; ?></th>
                <th scope="col"><?php echo $site->pagesClientSide->clientSpace->bill->action; ?></th>
            </tr>
            </thead>
            <?php foreach ($results as $key => $bill) { ?>
            <tbody>
            <tr>
                <td><?= $bill['id_bill']; ?></td>
                <td><?= $bill['bill_date']; ?></td>
                <td><?= $bill['amount'] . " EUR"; ?></td>
                <td><?php if ($bill['paid']){
                    echo "X";
                    }else{
                        echo "";
                    } ?></td>
                <td>
                    <?php if (isset($_GET['id_client']) && $bill['paid'] == 0){?>
                        <a class="btn btn-primary" href="../backend/actions/billPaid.php?id_client=<?php echo $_GET['id_client'] ?>&id_bill=<?php echo $bill['id_bill'] ?>"> <?php echo $site->pagesAdminSide->clientAccountManagement->paidButton; ?></a>
                    <?php }?>
                    <a class="btn btn-primary" href="../bills/<?php echo $bill['file_bill'] ?>" download="Bill.pdf"> <?php echo $site->pagesClientSide->clientSpace->bill->downloadBill; ?></a>
                </td>
            </tr>
            <? }?>
            </tbody>
        </table>
    </ul>
    </div>
</body>
</html>
