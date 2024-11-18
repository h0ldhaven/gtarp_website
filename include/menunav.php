		<?php 
			if(!connect()) { 
		?>
			<ul id="menu_offline">
				<li><a href="/"><img class="img_nav" src="/images/home.png" alt="1" />Accueil</a></li>
		
				<!--<li><a><img class="img_nav" src="/images/blipconnexion.png" alt="4" />Se Connecter</a>
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
				</li>-->
				
			</ul>
			
			
		<?php 
			} else {
				if($rang != 0) {
		?>

			<ul id="menu_offline">
				<li><a href="/"><img class="img_nav" src="/images/home.png" alt="1" />Accueil</a></li>
				<li><a href="/boutique.php"><img class="img_nav" src="/images/blipdeconnexion.png" alt="3" />Boutique</a></li>
				<li><a href="/support.php"><img class="img_nav" src="/images/blipdeconnexion.png" alt="4" />Support</a></li>
				<li><a href="/streams.php"><img class="img_nav" src="/images/blipdeconnexion.png" alt="4" />Twitch</a></li>

				<!--<li><a href="/connexion.php?logout=1"><img class="img_nav" src="/images/blipdeconnexion.png" alt="2" />Se Déconnecter</a></li>-->


			</ul>
		<?php 
				} else {
		?>
				<ul id="menu_offline">
					<li><a href="/"><img class="img_nav" src="/images/home.png" alt="1" />Accueil</a></li>
					<!--<li><a href="/connexion.php?logout=1"><img class="img_nav" src="/images/blipdeconnexion.png" alt="2" />Se Déconnecter</a></li>-->
				</ul>
		<?php
				}
			}
		?>