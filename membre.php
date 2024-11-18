<?php 
include('include/init.php');

if(!connect()) {
	header('location: /index.php');
}



include('include/header.php');
?>
	
		<div id="contenu">
			<div id="body">
			
				
				<div class="membres_content">
					<form method="post">
						<br/>
						<h2>Information Web:</h2>
						<br/>
						<table>
							<thead>
								<tr>
									<th><div class="membretitle"><img class="membre_content_img" alt="gta_skin" src="/images/mickael.jpg" title="Votre photo de profil" /></div></th>
									<td><div class="membretitle2"><span>Bienvenue sur votre profil</span> <span style="color:darkred;font-size:28px;font-weight:bold;"><br/><?php echo $pseudo; ?></span></div></td>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td><div class="membretitle2">Votre pseudo:</div></td>
									<td><div class="membretitle2"><?php echo $pseudo; ?></div></td>
								</tr>
								
								<tr>
									<td><div class="membretitle2">Votre Adresse E-mail:</div></td>
									<td><div class="membretitle2"><?php echo $email; ?></div></td>
								</tr>
								
								<tr>
									<td><div class="membretitle2">Votre Adresse ip:</div></td>
									<?php  $ip = $_SERVER["REMOTE_ADDR"]; ?>
									<td><div class="membretitle2"><?php echo $ip; ?></div></td>
								</tr>
								
								<tr>
									<td><div class="membretitle2">Votre Prénom:</div></td>
									<td>
										<div class="membretitle2">
											<?php 
												if(empty($prenom)) {
													echo '<div class="membre_case_vide"><em>*Case Vide*</em></div>';
												} else {
													echo $prenom;
												}
											?>
										</div>
									</td>
								</tr>
								
								<tr>
									<td><div class="membretitle2">Votre Nom:</div></td>
									<td>
										<div class="membretitle2">
											<?php 
												if(empty($nom)) {
													echo '<div class="membre_case_vide"><em>*Case Vide*</em></div>';
												} else {
													echo $nom;
												}
											?>
										</div>
									</td>
								</tr>
								
								<tr>
									<td><div class="membretitle2">Votre Grade:</div></td>
									<td>
										<div class="membretitle2">
											<?php 
												if($rang == 0) {
													$grade = '<font color="#75400B">Bannis</font>';
												} else if($rang == 4) {
													$grade = '<font color="#8B0000">Fondateur</font>';
												}else if($rang == 3) {
													$grade = '<font color="#C23E3E">Administrateur</font>';
												}else if($rang == 2) {
													$grade = '<font color="#FFA500">Modérateur</font>';
												} else {
													$grade = '<font color="#006400">Membre</font>';
												}
												echo $grade;
											?>
											
										</div>
									</td>
								</tr>
								
								
							</tbody>
						</table>
						<br/><br/>
						<h2>Information Jeu:</h2>
						<br/>
						<table>
							<thead>
								<tr>
									<th><div class="membretitle"><img class="membre_content_img" alt="gta_skin" src="/images/trevor.jpg" title="Votre photo de profil" /></div></th>
									<td><div class="membretitle2"><span>Votre carte d'identité</span> <span style="color:darkred;font-size:28px;font-weight:bold;"><br/><?php echo $Name; ?></span></div></td>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td><div class="membretitle2">Votre SteamID:</div></td>
									<td><div class="membretitle2"><?php echo $SteamID; ?></div></td>
								</tr>
								<tr>
									<td><div class="membretitle2">Téléphone:</div></td>
									<td><div class="membretitle2"><?php echo $Phone; ?></div></td>
								</tr>
								<tr>
									<td><div class="membretitle2">Argent de poche:</div></td>
									<td><div class="membretitle2"><?php echo $Money; ?></div></td>
								</tr>
								<tr>
									<td><div class="membretitle2">Compte Bancaire:</div></td>
									<td><div class="membretitle2"><?php echo $Bank; ?></div></td>
								</tr>
								<tr>
									<td><div class="membretitle2">Emploi <br/>&<br/> Salaire:</div></td>
									<td>
										<div class="membretitle2">
											<?php echo $Job; ?>
										</div>
										<div style="margin-top: 5px;" class="membretitle2">
											<?php echo $Salary."$ / jour"; ?>
										</div>
									</td>
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