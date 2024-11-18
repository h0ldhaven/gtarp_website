<?php 
include('include/init.php');
if(connect() ) {
header('location: /index.php');
}

if(isset($_POST['forminscription'])) {
	
	$pseudo = htmlspecialchars(htmlentities($_POST['pseudo'], ENT_QUOTES));
	$password = sha1($_POST['password']);
	$password2 = sha1($_POST['password2']);
	$email = htmlspecialchars(htmlentities($_POST['email'], ENT_QUOTES));
	$email2 = htmlspecialchars(htmlentities($_POST['email2'], ENT_QUOTES));
	$session = sha1(rand());
	
	if(empty($_POST['pseudo'])) {
		//Aucun pseudo
		$erreur = '<div class="warning_r">Veuillez Mettre un Pseudonyme !</div>';
	
	} else {
		if (strlen($_POST['pseudo']) < 4){
			//Pseudonyme doit contenir 4 caractères minimum
			$erreur = '<div class="warning_r">Votre Pseudonyme doit contenir au moins 4 caractères !</div>';
	
		} else {
			if (empty($_POST['password'])) {
			//Aucun mot de passe
			$erreur = '<div class="warning_r">Veuillez Mettre un Mot de passe !</div>';
		
			} else {
				if ($password != $password2) {
					//Mot de passes non identiques
					$erreur = '<div class="warning_r">Les mot de passes ne sont pas identiques !</div>';
			
				} else {
					if (strlen($_POST['password']) < 6){
						//Mot de passe doit contenir 6 caractères minimum
						$erreur = '<div class="warning_r">Votre mot de passe doit contenir au moins 6 caractères !</div>';
					
					} else {
						if (empty($_POST['email'])) {
							//Aucunes adresses E-mail
							$erreur = '<div class="warning_r">Veuillez mettre une adresse E-mail !</div>';
						} else {
							if($email == $email2) {
								if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
									if(!preg_match('#^(([a-z0-9!\#$%&\\\'*+/=?^_`{|}~-]+\.?)*[a-z0-9!\#$%&\\\'*+/=?^_`{|}~-]+)@(([a-z0-9-_]+\.?)*[a-z0-9-_]+)\.[a-z]{2,}$#i',str_replace('&amp;','&',$email))) {
										//Format de L'adresse E-mail invalide
										$erreur = '<div class="warning_r">Veuillez mettre une adresse E-mail valide !</div>';
									} else {
										//Tout est ok, on insert tout en base de donnée
										$req_selectpseudo = $connexion->prepare('SELECT * FROM site_membres WHERE pseudo=:pseudo');
										$req_selectpseudo->execute(array(
										'pseudo' => $_POST['pseudo']
										));
										$selectpseudo = $req_selectpseudo->rowCount();
										
										$req_selectemail = $connexion->prepare('SELECT * FROM site_membres WHERE email=:email');
										$req_selectemail->execute(array(
											'email' => $_POST['email']
										));
										$selectemail = $req_selectemail->rowCount();
										
											//On verifie que le pseudo ne soit pas deja prit
											if($selectemail == "0" && $selectpseudo == "0") {
												
												$addmembre = $connexion->prepare("INSERT INTO site_membres SET pseudo=:pseudo, password=:password, email=:email, session=:session");
												$addmembre->execute(array(
													'pseudo' => $pseudo,
													'password' => $password,
													'email' => $email,
													'session' => $session,
												));	
												$erreur = '<div class="warning_v">Votre compte a bien été créé !</div>';
											} else {
												$erreur = '<div class="warning_r">Le Pseudonyme ou l\'adresse E-Mail existe deja !</div>';
											}
									}
								} else {
									$erreur = '<div class="warning_r">Veuillez mettre une adresse E-mail valide !</div>';
								}	
							} else {
								$erreur = '<div class="warning_r">Vos adresses E-mail ne correspondent pas !</div>';
							}
						}
					}
					
				} 
			}
						
		}
		
	}
	
}	
	


include('include/header.php');

if(!empty($_GET['msg'])) {
    if($_GET['msg']=="ok") {
        echo '<div class="warning_v">Votre compte a bien été créé</div>';
    }
    if($_GET['msg']=="erreur") {
        echo '<div class="warning_r">Le Pseudonyme ou l\'adresse E-Mail existe deja !</div>';
    }
}
?>
<div id="contenu">
<div id="body">
<h1 class="inscription">Inscription</h1>
			
				
<div class="inscription_content">
<?php if(isset($erreur)) { echo $erreur; } ?>
<?php if(isset($ok)) { echo $ok; } ?>
<form method="post">
<br/>

	<table class="formulaire_td table">
		<thead>
			<tr>
				<th style="font-family: Lucida; color: #CC5E04;" colspan="2">Inscrivez-vous sur le site du serveur <?php echo $titre_site; ?>: <br/> (<em><strong style="font-size: 15px;font-family: monofonto;">Cela ne prend que quelques minutes</strong></em>)</th>
			</tr>
		</thead>
		<tbody>
		<tr class="formulaire_tr">
			<td class="formulaire_td formulaire_text"><label for="pseudo">Pseudonyme:</label></td>
			<td class="formulaire_td input_text"><input id="pseudo" type="text" placeholder="*4 caractères minimum*" name="pseudo" value="<?php if(isset($pseudo)) { echo $pseudo; } ?>"></td>
		</tr>
		<tr class="formulaire_tr">
			<td class="formulaire_td formulaire_text"><label for="password">Mot de passe:</label></td>
			<td class="formulaire_td input_text"><input id="password" type="password" placeholder="*6 caractères minimum*" name="password" ></td>
		</tr>
		<tr class="formulaire_tr">
			<td class="formulaire_td formulaire_text"><label for="password2">Confirmation du Mot de Passe:</label></td>
			<td class="formulaire_td input_text"><input id="password2" type="password" placeholder="*6 caractères minimum*" name="password2" ></td>
		</tr>
		<tr class="formulaire_tr">
			<td class="formulaire_td formulaire_text"><label for="email">Adresse E-Mail:</label><br><strong></td>
			<td class="formulaire_td input_text"><input id="email" type="email" placeholder="*Adresse e-mail valide*" name="email" value="<?php if(isset($email)) { echo $email; } ?>" ></td>
		</tr>
		<tr class="formulaire_tr">
			<td class="formulaire_td formulaire_text"><label for="email2">Confirmation de L'adresse E-Mail:</label><br><strong></td>
			<td class="formulaire_td input_text"><input id="email2" type="email" placeholder="*Adresse e-mail valide*" name="email2" value="<?php if(isset($email2)) { echo $email2; } ?>" ></td>
		</tr>
		<tr name="last" class="formulaire_tr">
			<td class="formulaire_td input_text input_sub" colspan="2"><input class="gradient2" type="submit" name="forminscription" value="Terminer l'inscription"></td>
		</tr>
		</tbody>
	</table>
	
	
</form>
				</div>
			</div>
<?php
include('include/menudroite.php');
include('include/footer.php');
?>