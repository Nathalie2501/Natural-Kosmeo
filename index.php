<?php session_start(); 

?>
<!DOCTYPE html>
<html lang="fr"> 
<head>
	<meta charset="UTF-8">
	
	
	<?php

	//Where the file is
	define('WEBROOT',str_replace('index.php', '', $_SERVER['SCRIPT_NAME']));

	//contains the folder on the server 
	define('ROOT',str_replace('index.php', '', $_SERVER['SCRIPT_FILENAME']));

	?>
	<!-- provides viewport size and scale guidelines for mobile browsers so that the different elements of a page are displayed at best. -->

	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<!-- 	Create a link element in the HTML page's head area to define the link between the HTML and CSS pages-->	
	<link rel="stylesheet" href="<?php echo WEBROOT ?>css/style.css" media="screen"/>

	<!-- link font -->
	<link href="https://fonts.googleapis.com/css?family=Cinzel&display=swap&subset=latin-ext" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Cormorant:400,500,600,700&display=swap&subset=latin-ext" rel="stylesheet">

	<!-- Title of the web page -->
	<title>Natural Kosmeo - Tuto cosmétique</title>
	<!-- 	description of the displayed page, as well as the keywords for which you want to optimize the page.-->	
	<meta name="description" content="Partager vos recettes de produits cosmétiques ">
	
</head>
<body>

	<header>
		
		<img src="<?php echo WEBROOT ?>img/logo_transp.png" alt="">
		
		<div id="form-holder">

			<!--connection/log out-->
			<?php
			
			if (isset($_SESSION['id'])) {
				
				echo '<a href="'.WEBROOT.'User/logOut" id="btnDeconnex">Déconnexion</a>';
			} else {
				echo '<a href="'.WEBROOT.'User/inscription" id="btnInscript">Inscription</a>';
			}
			?>
		</div>
		
		<!--login form-->
		<form id="connexion_formulaire" action="<?php echo WEBROOT ?>User/login" method="POST">
			<input class="connexi" type="email" name="email" placeholder="Email">
			<input class="connex" type="password" name="pass" placeholder="Mot de passe">
			<input class="buttonConn" type="submit" value="Connexion">
		</form>

		<!--Navigation-->			
		<nav>
			

			<a href="<?php echo WEBROOT ?>Presentation/index">Accueil</a>
			
			<a href="<?php echo WEBROOT ?>Tutos/index">Tutos</a>
			
			
			<a href="<?php echo WEBROOT ?>Ingedients/index">Ingrédients et leurs propriétés</a>
			
			
			<a href="<?php echo WEBROOT ?>Mode_emploi/index">Mode d'emploi</a>
			

			<a href="<?php echo WEBROOT ?>A_propos/index">A propos</a>
			
			<a href="<?php echo WEBROOT ?>Contact/index">Contact</a>            
			
			<!--if the user is logged in, view profile AND message "Bienvenue firstname, lastname-->		
			<?php 
			
			if (isset($_SESSION['id'])) 
			{
				echo '<a href="'.WEBROOT.'User/read/'.$_SESSION['id'].'">Profil</a>';
			}

			if (isset($user)) 
			{
				echo '<h2>Bienvenue '.$user->getPrenom().' '.$user->getNom().'</h2>';
			}


			?>   
		</nav>

	</header>

	<?php 

	// ----------- INIT 1 : creation du routage ----------- //

		// Charge le core de l'appli
	require_once('core/bdd.php');
	require_once('core/controller.php');
	require_once('core/abstractEntity.php');



		// Gestion du routage pour afficher la page par default
	if (isset($_GET['p'])) {
		if ($_GET['p'] == "") {
			$_GET['p'] = "Couverture/index";
			
		}
	} else {
		$_GET['p'] = "Couverture/index";
	}

		// Chargement du controleur

		//$tabControlleur =("","") -> faille de sécurité (rajouter code)
	$param = explode("/",$_GET['p']);

//redirige vers les fichiers [0] -> param [0] (controller) et param [1] -> vue 

//param[0] => paramétrer pour recevoir les dossiers du dossier vue (par exemple)

//param[1] => paramétrer pour recevoir les fichiers des dossiers

//On récupère le controller (param 0) et l'action (param 1)
	$controller = $param[0];
	if (isset($param[1])) {
		$action = $param[1];
	} else {
		$action = 'index';
	}
	
	
	require_once('controlleur/'.$controller.'.ctrl.php');
	$controller = 'Ctrl'.$controller;
	$controller = new $controller();

		// Execution de l'action du controleur avec les paramètres supplementaires si existant
		// Si action non présente dans le controleur, alors page 404
	if (method_exists($controller,$action)) {
		unset($param[0]);
		unset($param[1]);
		call_user_func_array(array($controller,$action), $param);
	} else {
		echo 'erreur 404';
	}
	?>
	


	<script src="<?php echo WEBROOT ?>js/inscription.js"></script>
	
	<script src="<?php echo WEBROOT ?>js/essai.js"></script>



	<footer> 
		<div class="lft">
			<a href="<?php echo WEBROOT ?>A_propos/index">A propos</a>
			<a href="<?php echo WEBROOT ?>Contact/index">Contact</a>
			<a href="#">Mention légale</a>
		</div>
		<div class="rgt">
			<a href="https://www.facebook.com/nathalie.rousseau.503">@facebook</a>
			<a href="#">@twitter</a>
			<a href="#">@linkedin</a>
		</div>
	</footer> 

</body>

</html>