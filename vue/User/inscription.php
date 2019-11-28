
<main id='inscrip'>




<div id="fond">
	
	<video width="100%" autoplay="true" src="<?php echo WEBROOT ?>img/Nature - 6155.mp4" alt=""></video>

</div>

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
	echo '<h2>Bienvenue '.$_SESSION['prenom'].' '.$_SESSION['nom'].'</h2>';
	}

?>	
       
</nav>

<h1>Inscription</h1>

<div id= "inscription">


<!--Registration Form-->

<form action="<?php echo WEBROOT ?>User/create" method="POST">

<div class="info" id="infoPrenom"></div>
    <label for="prenom">Entrez votre prenom</label>  
    <input type="text" name="prenom" id="prenom"/><br/>

	<div class="info" id="infoNom"></div>
	<label for="nom">Entrez votre nom</label>  
	<input type="text" name="nom" id="nom" /><br/>

<div class="info" id="infoEmail"></div>

	<label for="email">Entrez votre Email</label>  
	<input type="text" name="email" id="mail"/><br/>

<div class="info" id="infoPass1"></div>
	<label for="motDePasse">Entrez votre mot de passe</label> 
	<input type="password" name="pass" id="motDePasse"/><br/>
	
<input class="boutonI" type="submit"  value="Valider">

</form>

</div>

</main>







