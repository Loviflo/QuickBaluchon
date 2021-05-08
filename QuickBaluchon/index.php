<!DOCTYPE html>
<html lang="en">
	<head>
		<?php include("inc/head.php"); ?>
		<title><?php echo $site->pagesClientSide->index->pageTitle; ?></title>
	</head>
	<body>
	<?php 
		$site = new SimpleXMLElement($xmlstr);
		include("inc/header.php"); 
	?>
		<div style="height: 30em; background: url('img/forklift.jpg') bottom / auto no-repeat;"></div>
		<h1 class="display-1 text-center" style="color: #a4260a;"><?php echo $site->pagesClientSide->index->title; ?></h1>
		<h2 class="display-2 text-center" style="color: #a8763e;"><?php echo $site->pagesClientSide->index->subtitle; ?></h2>
		<section class="container mb-5 pb-5">
		<p><?php echo $site->pagesClientSide->index->text; ?></p>
		</section>
	<?php include("inc/footer.php"); ?>
	</body>
</html>
