<?php
//On prépare les sessions
session_start();
//On inclut le fichier de configuration
include 'config.inc.php';
//On inclut les fonctions
include 'functions.php';
//RÃ©cupÃ©ration de la date
date_default_timezone_set('Europe/Paris');
$date = date('d/m/Y');
$heure = date('H:i:s');
//On teste la connexion Ã  la base de donnÃ©es
//BDD SITE
try {
	$connexion = new PDO('mysql:host='.$host.';dbname='.$db.'; charset=utf8', $user, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
	$connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	if(!empty($_SESSION['session'])) {
		
		$session = $_SESSION['session'];
		
		$req_selectmembre = $connexion->prepare('SELECT * FROM site_membres WHERE session=:session');
		$req_selectmembre->execute(array(
			'session' => $session
		));
		$selectmembre = $req_selectmembre->fetch();

		
		$rang = $selectmembre['rang'];
		$pseudo = $selectmembre['pseudo'];
		$email = $selectmembre['email'];
		$prenom = $selectmembre['prenom'];
		$nom = $selectmembre['nom'];
		//$skype = $selectmembre['skype'];
		
		$req_selectmembre2 = $connexion->prepare('SELECT * FROM site_membres JOIN users ON `site_membres`.`steamid` = `users`.`identifier` WHERE session=:session');
		$req_selectmembre2->execute(array(
			'session' => $session
		));
		$selectmembre2 = $req_selectmembre2->fetch();

		$req_selectmembreJob = $connexion->prepare('SELECT * FROM site_membres JOIN users JOIN jobs ON `site_membres`.`steamid` = `users`.`identifier` AND `users`.`job` = `jobs`.`job_id` WHERE session=:session');
		$req_selectmembreJob->execute(array(
			'session' => $session
		));
		$selectmembreJob = $req_selectmembreJob->fetch();
		
		//Infos GTA5

		//SteamID GTA5
		if($selectmembre2['identifier'] != null) {
			$SteamID = $selectmembre2['identifier'];
		} else {
			$SteamID = "Inconnu";
		}
		// Nom et Prénom RP
		if($selectmembre2['name'] != null) {
			$Name = $selectmembre2['name'];
		} else {
			$Name = "Inconnu";
		}
		// Numéro de téléphone
		if($selectmembre2['phone_number'] != null) {
			$Phone = $selectmembre2['phone_number'];
		} else {
			$Phone = "Inconnu";
		}
		// Argent de poche
		if($selectmembre2['money'] != null) {
			$Money = $selectmembre2['money'];
		} else {
			$Money = "Inconnu";
		}
		// Compte en banque
		if($selectmembre2['bank'] != null) {
			$Bank = $selectmembre2['bank'];
		} else {
			$Bank = "Inconnu";
		}
		// Job
		if($selectmembreJob['job'] != null) {
			$Job = $selectmembreJob['job_name'];
			$Salary = $selectmembreJob['salary'];
		} else {
			$Job = "Inconnu";
		}
	
	
	
	
	} else {

		return true;
		
	}

} catch (PDOException $e){
	echo '<div id="contenu">';
	echo '<div class="warning_r, warning_b"><strong style="font-size: 15px;">Erreur ! <br>Connexion à la base de donnée impossible !</strong></div>';
	echo '</div>';
}

?>