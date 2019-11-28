<main id='profil'>

<!--background video-->
<div id="fond">
	<video width="100%" autoplay="true" src="<?php echo WEBROOT ?>img/Sky - 6350.mp4" alt=""></video>
</div>

<div id="logo">
	<img src="<?php echo WEBROOT ?>img/logo_transp.png" alt="">
</div>


<?php

if (isset($_SESSION['id'])) {
	echo '<a href="'.WEBROOT.'User/logOut"><button id="btnDeconnex">Déconnexion</button></a>';
	}
?>
<?php 
//welcome message
	
if (isset($user))
{
	echo '<h2>Bienvenue '.$user->getPrenom().' '.$user->getNom().'</h2>';
}

?>
<nav>
		
	<a href="<?php echo WEBROOT ?>Presentation/index">Accueil</a>
            
    <a href="<?php echo WEBROOT ?>Tutos/index">Tutos</a>
        		
        		
	<a href="<?php echo WEBROOT ?>Ingedients/index">Ingrédients et leurs propriétés</a>
            
           
    <a href="<?php echo WEBROOT ?>Mode_emploi/index">Mode d'emploi</a>
            

    <a href="<?php echo WEBROOT ?>A_propos/index">A propos</a>
    
    <a href="<?php echo WEBROOT ?>Contact/index">Contact</a>
            

<?php 
if (isset($_SESSION['id'])) 
{
	echo '<a href="'.WEBROOT.'User/read/'.$_SESSION['id'].'">Profil</a>';
				

}
?>
</nav>

<!--profile form-->
	
<section id="userUpdate">
	
<form action="<?php echo WEBROOT ?>User/update" method="POST">

	<div id="nom">
		
		<label>Nom :</label>
		<input type="text" textarea cols="40" rows="30" name="nom" placeholder="Changer le nom" value="<?php  echo $_SESSION['nom']; ?>">
	</div>	

	<div id="prenom">	
		<label>Prénom :</label>

		<input type="text" name="prenom" placeholder="Changer le prénom" value="<?php  echo $_SESSION['prenom']; ?>"><br><br>
		
	</div>	
	<div id="mail">	
		
		<label>Email :</label>
		<input type="email" textarea cols="40" rows="30" name="email" placeholder="Changer votre adresse mail" value="<?php  echo $user->getEmail(); ?>"><br>
		
	</div>
	<div id="motdepasse">		
		<label>Mot de passe :</label>

		<input type="password" textarea cols="30" rows="20" name="pass" placeholder="Mot de passe" value=""><br>
		
	</div>		
	<div id="miseajour">			
		<input type="submit" value="Mettre à jour mon profil">
	</div>
</form>
</section>

<!--delete profil button-->
<a href="<?php echo WEBROOT ?>User/delete">
<input class="btn from-right" type="submit" value="Supprimer mon compte">
</a> 

</main>

