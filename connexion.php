<?php
include('include/init.php');

if(@$_GET['logout']=="1") {

	session_destroy();
	header('location: /index.php');

}

if($_POST) {

	$pseudo = $_POST['pseudo'];
	$password = sha1($_POST['password']);

	$req_nbrmembre = $connexion->prepare('SELECT * FROM site_membres WHERE pseudo=:pseudo AND password=:password');
	$req_nbrmembre->execute(array(
		'pseudo' => $pseudo,
		'password' => $password
	));
	$nbrmembre = $req_nbrmembre->rowCount();
	

	
	if($nbrmembre>0) {
		session_destroy($pseudo);
		$session = sha1(rand());
		
		$updatemembre = $connexion->prepare('UPDATE site_membres SET session=:session WHERE pseudo=:pseudo AND password=:password');
		$updatemembre->execute(array(
			'pseudo' => $pseudo,
			'password' => $password,
			'session' => $session
		));
		$_SESSION['session'] = $session;
		header('location: /index.php');
	} else {
header('location: /connexion.php?msg=error');
exit;
}
}
include('include/header.php');




?>
<div id="contenu">
<div id="body">
			
				
<div class="news_content">
<?php
if(!empty($_GET['msg'])){
	if($_GET['msg'] == "error") {
		echo '<div class="warning_r">Pseudo ou mot de passe incorrect !</div>';
	}
	if($_GET['msg'] == "ban") {
		echo '<div class="warning_r">Vous êtes bannis du site !</div>';
	}
}
?>
<?php 
if(!connect()) { ?>

<div class="connexion">
<form method="post">
Nom de Compte: <br><input placeholder="*Votre pseudonyme*" type="text" name="pseudo"><br>
Mot de Passe: <br><input placeholder="*Votre mot de passe*" type="password" name="password"><br><br>
<input type="submit" name="Connexion" value="Se Connecter"> 
<span><a href="/inscription.php"><input class="" type="button" value="Creer un Compte"></a></span>
<br>
<span><a class="connexion_b" href="" >Mot de passe oublié ?</a></span>
<br><br>
</form>
</div>

<?php } else {

	header('location: /index.php');
	exit;

}
?>

</div>
</div>

<?php 
include('include/menudroite.php'); 
include('include/footer.php'); 
?>