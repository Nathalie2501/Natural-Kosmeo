<?php 

//if the $ _SESSION ['id'] variable exists (if the user logs in)
//tell him welcome first name / otherwise reload the page with a message (you are not logged in)

if (isset($_SESSION['id'])) {
		echo '<h2>Bienvenue '.$_SESSION['prenom'].' '.$_SESSION['nom'].'</h2>';

}else{
	header('Location: '.WEBROOT.'Tutos/index');
}




// if the tutorial variable exists, so if the user creates a tutorial, show me the
//1-> le controlleur envoie l'ordre au dao de lui renvoyer les info du tuto créé par l'utilisateur 2-> les info du nouveau tuto créé sont envoyé au controlleur qui dit à la vue (read.php) d'afficher le tuto que l'utilisateur a créer 3-> si la variable $tuto existe (donc si le tuto a été créé par l'utilisateur) lit les et affiche le 
//On est dans User read parceque le tuto sera crée à partir du moment où l'utilisateur sera connecté -> donc affiche le tuto créé par l'utilisateur

//the controller sends the order to the dao to return the info of the tutorial created by the user 2-> the info of the new tutorial created are sent to the controller who says to the view (read.php) to display the tutorial that the user has to create 3-> if the $ tuto variable exists (so if the tutorial was created by the user) reads them and displays the
// We are in User read because the tutorial will be created from the moment the user is logged in -> so displays the tutorial created by the user


if (isset($tutos)) {
	foreach ($tutos as $key => $tuto) {
		echo $tuto->getNom().'<br>';
		echo $tuto->getDescription().'<br>';
		echo '<img src="'.WEBROOT.'img/'.$tuto->getImg().'">';
	}
}

//message =>"Vous devez être inscrit pour ajouter des tutos;" if the user is not logged in

if(isset($message)){
	echo $message;
}

//registration and  logout button => if the user is logged in show the logout button otherwise show the registration button

	
if (isset($_SESSION['id']))
{
	echo '<a href="'.WEBROOT.'User/logOut"><button id="btnDeconnex">Déconnexion</button></a>';
} else {
	echo '<a href="'.WEBROOT.'User/inscription"><button id="btnInscript">Inscription</button></a></div>';
}

	
//if the user is logged in show the logout button
if (isset($_SESSION['id']))
{
	echo '<a href="'.WEBROOT.'User/logOut"><button>Déconnexion</button></a>';
} else {

}

?>