<aside>
<style>
	table, table td {border:1px solid black;margin:0 auto;width:400px;height:50px;}
	table td {padding:5px;}
	tr:not([name=last]) td:first-child {background-color: #D3D3D3;text-align:right;}
	tr[name=last] {text-align:center;}
	tr:not([name=last]) td:last-child {background-color: #F5F5F5;}
</style>

<?php
include('menugauche.php');
?>
	
	<div class="widget">
		<h3>Réseaux sociaux</h3>
		<div class="widget_text social">
			<a target="_blank" href="https://www.facebook.com/BHFiveRP/"><img title="Facebook du serveur" src="/images/facebook.png" /></a>
			<a target="_blank" href="https://twitter.com/h0ldhaven"><img title="Twitter du Dev Principal" src="/images/twitter.png" /></a>
			<a href=""><img title="Youtube (SOON)" src="/images/youtube.png" /></a>
		</div>
	</div>
	
	<div class="widget">
		<?php if(!connect() ) {?>
		<h3>Connexion</h3>
		<div class="widget_text connexion">
			<form method="post" action="/connexion.php">
				Identifiant:<br>
				<input type="text" placeholder="*Votre pseudonyme*" name="pseudo"><br>
				Mot de passe:<br>
				<input type="password" placeholder="*Votre mot de passe*" name="password"><br>
				
				<span style="float: right;"><a href="/inscription.php"><input class="" type="button" value="Creer un Compte"></a></span>
				<span style="float: left;"><input type="submit" value="Se Connecter"></span><br>
				<br>
				<span><a href="/" class="connexion_a">Mot de passe oublié ?</a></span>
				<br style="clear: both;">
			</form>
		</div>	
		<?php } else { ?>
		<h3>Espace Membre</h3>
		<div class="widget_text">
			<?php 
				if($rang == 0) {
					$ResultRang = "Bannis";
					$Classcolor = 'class="menudroite_ban"';
				} else if($rang == 4) {
					$ResultRang = "Fondateur";
					$Classcolor = 'class="menudroite_fonda"';
				} else if ($rang == 3) {
					$ResultRang = "Admin";
					$Classcolor = 'class="menudroite_admin"';
				} else if($rang == 2) {
					$ResultRang = "Modérateur";
					$Classcolor = 'class="menudroite_modo"';
				} else {
					$ResultRang = "Membre";
					$Classcolor = 'class="menudroite_membre"';
				}
				if($rang != 0) {
					echo '<div class="menubtnWelcome">Bienvenue: <span '.$Classcolor.'>'.$pseudo.'</span> !<br/>Votre Grade: <span '.$Classcolor.'>'.$ResultRang.'</span></div>';
				} else {
					echo '<strong><li style="list-style: none; padding: 15px; border: 2px dashed #ED2D1F; text-align: center;color: #ED2D1F;"><span style="font-size:20px;">Vous êtes Banni !</span><br/><br/><span style="text-align:">Veuillez contacter le staff en ouvrant un ticket si vous pensez que votre ban n\'est pas légitime.</span></li></strong>'; 
					echo '<li class="menubtn"><a href="/connexion.php?logout=1">Se Déconnecter</a></li>'; 
				}
			?>
			
			<br/>
			
			<ul class="menu">
				<?php if($rang != 0) { ?>
					<h4>Que souhaitez-vous faire ?</h4>
					<br/>

					<li class="menubtn"><a href="/membre.php">Voir mon profil</a></li></a>
					<li class="menubtn"><a href="/connexion.php?logout=1" >Me déconnecter</a></li></a>
				<?php } ?>
			</ul>
		</div>
		<?php } ?>
	</div>
	
	<!--<div class="widget">
		<h3>Information sur <?php echo $titre_site; ?></h3>
		<div align="left" class="widget_text"></div>
		<div align="left" class="widget_text">
			<table>
				<tr>
					<td style="text-align: right; color:black;">Etat du serveur:</td>
					<td><strong><?php echo $Etat_Serv; ?></strong></td>
				</tr>
				
				<tr>
					<td style="text-align: right; color:black;">Version du serveur:</td>
					<td><strong><?php echo $Version_Serv; ?></strong></td>
				</tr>
				<tr>
					<td style="text-align: right; color:black;">Date de sortie:</td>
					<td><strong><?php echo $Sortie_Serv; ?></strong></td>
				</tr>
				
				<tr>
					<td style="text-align: right; color:black;">Heure de sortie:</td>
					<td><strong><?php echo $Heure_Sortie_Serv; ?></strong></td>
				</tr>
			</table>
		</div>
		<div align="left" class="widget_text"></div>
	</div>-->
	
	<!--<div class="widget">
		<h3>Information Site Web</h3>
		<div align="left" class="widget_text"></div>
		<div align="left" class="widget_text">
		<table>
			<tr>
				<td style="text-align: right; color:black;">Etat du site:</td>
				<td><strong><?php echo $Etat_Site; ?></strong></td>
			</tr>
			<tr>
				<td style="text-align: right; color:black;">Version du site:</td>
				<td><strong><?php echo $Version_Site; ?></strong></td>
			</tr>
			<tr>
				<td style="text-align: right; color:black;">Date:</td>
				<td><strong><?php echo $date; ?></strong></td>
			</tr>
		</table>
		</div>
		<div align="left" class="widget_text"></div>
	</div>-->
	
	
</div>
</aside>
<br style="clear:both;"/>