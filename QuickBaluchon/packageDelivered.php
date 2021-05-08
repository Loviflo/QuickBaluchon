<!DOCTYPE html>
<html lang="en">
	<head>
		<?php include("inc/head.php"); ?>
		<title><?php echo $site->pagesClientSide->packageDelivered->pageTitle; ?></title>
	</head>
	<body>
	<?php 
		$site = new SimpleXMLElement($xmlstr);
		include("inc/header.php"); 
	?>
		<h1 class="display-1 text-center" style="color: #a4260a;"><?php echo $site->pagesClientSide->packageDelivered->title; ?></h1>
		<h2 class="display-2 text-center" style="color: #a8763e;"><?php echo $site->pagesClientSide->packageDelivered->subtitle; ?></h2>
		<section class="container mb-5 pb-5">
		<a name="" id="" class="btn btn-primary" href="/QuickBaluchon/QuickBaluchon/actions/update_package.php?tracking_id=<?php echo $_GET['tracking_id'] ?>" role="button"><?php echo $site->pagesClientSide->packageDelivered->buttons->buttonOk; ?></a>
		<a name="" id="" class="btn btn-primary" href="/QuickBaluchon/QuickBaluchon/index.php" role="button"><?php echo $site->pagesClientSide->packageDelivered->buttons->buttonCancel; ?></a>
		</section>
	<?php include("inc/footer.php"); ?>
	</body>
</html>
