<?php
require_once('../bdd/database.php');

session_start();
if (!isset($_SESSION['lang'])) {
    $_SESSION['lang'] = null;
}
if(!isset($_GET['lang'])){
    $_GET['lang'] = $_SESSION['lang'];
} else {
    $_SESSION['lang'] = $_GET['lang'];
}
if (!isset($_SESSION['lang']) || $_SESSION['lang'] == 'fr'){
    include(dirname(__DIR__) . "/lang/french.php");
    $site = new SimpleXMLElement($xmlstr);
} else if ($_SESSION['lang'] == 'en') {
    include(dirname(__DIR__) . "/lang/english.php");
    $site = new SimpleXMLElement($xmlstr);
}

$bdd = getDatabaseConnection();
$q = 'SELECT * FROM package WHERE id_client = ? ';
$req = $bdd->prepare($q);
$req->execute([$_SESSION['user']['id']]);
$results = $req->fetchAll();

$total = 0;
$q2 = 'SELECT * FROM tariff_grid';
$req2 = $bdd->prepare($q2);
$req2->execute();
$results2 = $req2->fetchAll();

function returnPckPrice($weight, $deliveryType, $tariff_grid){
    foreach ($tariff_grid as $key => $grid) {
        if ($grid['max_weight'] == NULL){
            return $grid['price'] * ceil(((float)$weight / (int)$grid['slice_weight']));
        }
        if ($weight <= $grid['max_weight']){
            if ($deliveryType == $grid['delivery_type']){
                return $grid['price'];
            }
        }
    }
}

require('../lib/fpdf.php');

$packagePrice = 0;
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(40,10, $site->pagesClientSide->clientSpace->bill->title);
$pdf->Ln();
$pdf->SetFont('Arial','',14);
$pdf->Cell(40,10, $site->pagesClientSide->clientSpace->bill->detail);
$pdf->Ln();
$pdf->SetFont('Arial','',12);
foreach ($results as $key => $package) {
    $packagePrice = returnPckPrice($package['weight'], $package['delivery_type'], $results2);
    $total += $packagePrice;
    $pdf->Cell(40,10, $site->pagesClientSide->clientSpace->bill->packageWeight . ' : ' . $package['weight']);
    $pdf->Ln();
    $pdf->Cell(40,10, $site->pagesClientSide->clientSpace->bill->packageDeliveryType . ' : ' . $package['delivery_type']);
    $pdf->Ln();
    $pdf->Cell(40,10, $site->pagesClientSide->clientSpace->bill->packagePrice . ' : ' . $packagePrice . ' EUR');
    $pdf->Ln();
}

$pdf->SetFont('Arial','B',14);
$pdf->Cell(40,10, $site->pagesClientSide->clientSpace->bill->yourTotal . ' : ' . $total . ' EUR');
$pdf->Ln();

$pdf->Output("D", "Bill.pdf");

