<!DOCTYPE html>
<html lang="en">
	<head>
		<?php include("inc/head.php"); ?>
		<title><?php echo $site->pagesClientSide->contact->pageTitle; ?></title>
	</head>
	<body>
	<?php 
		$site = new SimpleXMLElement($xmlstr);
		include("inc/header.php"); 
	?>
		<h1 class="display-1 text-center mb-3" style="color: #a4260a;"><?php echo $site->pagesClientSide->contact->title; ?></h1>
		<h2 class="display-2 text-center" style="color: #a8763e;"><?php echo $site->pagesClientSide->contact->subtitle; ?></h2>
		<section class="bg-light">
			<section class="container mb-5 pb-5">
			<div class="row row-cols-1 row-cols-md-3 g-4">
				<div class="col">
					<div class="card">
						<img src="/QuickBaluchon/QuickBaluchon/img/utilisateur-de-profil.png" class="card-img-top" alt="">
						<div class="card-body">
							<h5 class="card-title"><?php echo $site->pagesClientSide->contact->cards->cardVR->title; ?></h5>
							<p class="card-text"></p>
						</div>
						</div>
					</div>
					<div class="col">
						<div class="card">
						<img src="/QuickBaluchon/QuickBaluchon/img/utilisateur-de-profil.png" class="card-img-top" alt="">
						<div class="card-body">
							<h5 class="card-title"><?php echo $site->pagesClientSide->contact->cards->cardAD->title; ?></h5>
							<p class="card-text"></p>
						</div>
						</div>
					</div>
					<div class="col">
						<div class="card">
						<img src="/QuickBaluchon/QuickBaluchon/img/utilisateur-de-profil.png" class="card-img-top" alt="">
						<div class="card-body">
							<h5 class="card-title"><?php echo $site->pagesClientSide->contact->cards->cardKC->title; ?></h5>
							<p class="card-text"></p>
						</div>
						</div>
					</div>
				</div>
			</section>
		</section>
		<section class="bg-white">
			<section class="container mb-5 pb-5">
				<h2 class="display-2 text-center" style="color: #a8763e;"><?php echo $site->pagesClientSide->contact->contactUs->title; ?></h2>
				<div class="row">
					<div class="col">
						<h5 class="display-5 text-center"><?php echo $site->pagesClientSide->contact->contactUs->phone->title; ?></h5>
						<p class="text-center"><?php echo $site->pagesClientSide->contact->contactUs->phone->number; ?></p>
					</div>
					<div class="col">
						<h5 class="display-5 text-center"><?php echo $site->pagesClientSide->contact->contactUs->mail->title; ?></h5>
						<p class="text-center"><?php echo $site->pagesClientSide->contact->contactUs->mail->mail; ?></p>
					</div>
					<div class="col">
						<h5 class="display-5 text-center"><?php echo $site->pagesClientSide->contact->contactUs->linkedin->title; ?></h5>
						<p class="text-center"><a href="#"><?php echo $site->pagesClientSide->contact->contactUs->linkedin->link; ?></a></p>
					</div>
				</div>
			</section>
		</section>
	<?php include("inc/footer.php"); ?>
	</body>
</html>
