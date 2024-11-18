<?php 
include('include/init.php');

if(connect()) {
if ($_POST) {
	if(!empty($_POST['mdp1'])) {
		if($_POST['mdp1'] == $_POST['mdp2']) {
			$mdp = md5($_POST['mdp1']);
			$updatemembre = $connexion->prepare ('UPDATE site_membres SET password=:password WHERE pseudo=:pseudo');
			$updatemembre->execute(array(
				'password' => $mdp,
				'pseudo' => $pseudo,
	));
		} else {
			header ('location: /compte.php?msg=erreur');
			exit;
		}
	}
if(isset($_POST['email'])){
		$email = stripslashes(htmlentities($_POST['email']));
        if(preg_match('#^(([a-z0-9!\#$%&\\\'*+/=?^_`{|}~-]+\.?)*[a-z0-9!\#$%&\\\'*+/=?^_`{|}~-]+)@(([a-z0-9-_]+\.?)*[a-z0-9-_]+)\.[a-z]{2,}$#i',str_replace('&amp;','&',$email)))
		{
		$updatemembre = $connexion->prepare ('UPDATE site_membres SET email=:email, steamid=:steamid, prenom=:prenom, nom=:nom WHERE pseudo=:pseudo');
		$updatemembre->execute(array(
			'email' => htmlspecialchars($_POST['email'], ENT_QUOTES),
			'steamid' => htmlspecialchars($_POST['steamid'], ENT_QUOTES),
			'prenom' => htmlspecialchars($_POST['prenom'], ENT_QUOTES),
			'nom' => htmlspecialchars($_POST['nom'], ENT_QUOTES),
			//'skype' => htmlspecialchars($_POST['skype'], ENT_QUOTES),
			'pseudo' => $pseudo,
		));
		header ('location: /compte.php?msg=ok');
		exit;
	} else {
		header ('location: /compte.php?msg=mail');
		exit;
	}
}
}



include('include/header.php');
?>
	
		<div id="contenu">
			<div id="body">
			
				
				<div class="news_content">
				
				<?php 
				if(!empty($_GET['msg'])){
					if($_GET['msg'] == "ok") {
						echo '<div class="warning_v">Votre compte à bien été mis à jour.</div>';
					}
					if($_GET['msg'] == "erreur") {
						echo '<div class="warning_r">Les mot de passe doivent êtres identiques.</div>';
					}
					if($_GET['msg'] == "mail") {
						echo '<div class="warning_r">Veuillez renseigner correctement la case mail</div>';
					}
				}
				?>
				<style>
				
					table, table td {border:1px solid black;margin:0 auto;width:400px;height:50px;}
					table td {padding:5px;}
					tr:not([name=last]) td:first-child {background-color: #D3D3D3;text-align:right;}
					tr[name=last] {text-align:center;}
					tr:not([name=last]) td:last-child {background-color: #F5F5F5;}

				</style>
				
				<div class="membres_content">
					<form method="post">
						<strong>Modifier Vos informations</strong><br><br>
						<table>
							<tr>
								<td>
									Pseudo:
								</td>
								<td><input type="text" value="<?php echo $pseudo; ?>" readonly></td>
							</tr>
							<tr>
								<td>
									Mot de passe:<br><br><small>*Laissez vide pour ne pas changer*</small>
								</td>
								<td><input type="password" placeholder="Nouveau mot de passe" name="mdp1"></td>
							</tr>
							<tr>
								<td>
									Confirmation du mot de passe:
								</td>
								<td><input type="password" placeholder="Nouveau mot de passe x2" name="mdp2"></td>
							</tr>
							<tr>
								<td>
									Adresse E-mail:
								</td>
								<td><input type="text" value="<?php echo $email; ?>" name="email"></td>
							</tr>
							<tr>
								<td>
									Prénom:
								</td>
								<td><input type="text" value="<?php echo $prenom; ?>" name="prenom"></td>
							</tr>
							<tr>
								<td>
									Nom:
								</td>
								<td><input type="text" value="<?php echo $nom; ?>" name="nom"></td>
							</tr>
							
							<tr>
								<td>
									SteamID:
								</td>
								<td><input type="text" value="<?php echo $SteamID; ?>" name="steamid"></td>
							</tr>
							<tr name="last">
								<td colspan="2"><input class="gradient" type="submit" value="Confirmer les modifications"></td>
							</tr>
						
						
						</table>
					</form>
				</div>
					
					
					
				</div>
			</div>
<?php
include('include/menudroite.php');
include('include/footer.php');
} else {
	header('location: /index.php');
}
?>