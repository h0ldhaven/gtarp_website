<!DOCTYPE HTML>
<!--[if lt IE 7 ]> <html class="ie ie6 no-js" lang="fr"> <![endif]-->
<!--[if IE 7 ]>    <html class="ie ie7 no-js" lang="fr"> <![endif]-->
<!--[if IE 8 ]>    <html class="ie ie8 no-js" lang="fr"> <![endif]-->
<!--[if IE 9 ]>    <html class="ie ie9 no-js" lang="fr"> <![endif]-->
<!--[if gt IE 9]><!-->
<?php include('config/config.php'); ?>
<!-- Ouverture du Code -->
<html lang="fr">
<!--<![endif]-->
	<!-- Ouverture de l'entete de la page -->
	<head>
		<!-- Encodage du site -->
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<!-- Titre du site -->
		<title><?php echo $titre_site.$Tiret.$Accueil; ?></title>
		<!-- Description, mot cle, autheurs et indexation -->
		<meta name="description" content="<?php echo $description; ?>">
		<meta name="keywords" content="<?php echo $keywords; ?>">
		<meta name="author" content="<?php echo $Authors; ?>">
		<meta name="robots" content="index, follow">

		<!-- Feuille de style -->
		<link rel="stylesheet" href="<?php echo $Style; ?>" media="screen">
		<!-- scripts -->
		<script type="text/javascript" src="/js/script.js"></script>
		<script type="text/javascript" src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
		
	<!-- Fermeture de L'entete de la page -->
	</head>
	
	<!-- Ouverture du corps de la bage (body) -->
	<body id="page">
        <div class="container">
			<ul class="cb-slideshow">
				<li><span>Image 01</span><div><h3></h3></div></li>
				<li><span>Image 02</span><div><h3></h3></div></li>
				<li><span>Image 03</span><div><h3></h3></div></li>
				<li><span>Image 04</span><div><h3></h3></div></li>
				<li><span>Image 05</span><div><h3></h3></div></li>
				<li><span>Image 06</span><div><h3></h3></div></li>
			</ul>
		</div>
			
		<div class="container">
		
		<nav>
			<?php include('menunav.php'); ?>
		</nav>
		<!--<nav>
			<ul id="menu_offline">
				<li><a href="/"><img class="img_nav" src="http://www.icone-png.com/png/2/2435.png" alt="1" />Accueil</a></li>
		
				<li><a><img class="img_nav" src="http://www.icone-png.com/png/20/19877.png" alt="4" />Se Connecter</a>
					<ul>
						<li>
							<form method="post" action="/connexion.php"><br/>
								<input type="text" placeholder="*Votre pseudonyme*" name="pseudo"><br/><br/>
								<input type="password" placeholder="*Votre mot de passe*" name="password"><br/><br/>
								<input type="submit" class="connexion_b" value="Connexion">
								<a href="/" style="text-align:center;" class="connexion_b">Mot de passe oublié ?</a>
								<a href="/inscription.php"><input class="connexion_b" type="button" value="Creer un Compte"></a>
							</form>
						</li>
					</ul>
				</li>
			</ul>
		</nav>-->
