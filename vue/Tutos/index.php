<main id="tuto">

	<?php 
	if (isset($_SESSION['id'])) 
	{
		echo '<h3>Bienvenue '.$_SESSION['prenom'].' '.$_SESSION['nom'].'</h3>';
	}

//For each category (page 1) show me all the tutorials of the category chosen by the user -> controller read with the following index function (which will then be able to choose a single tutorial and thus arrive in)

//If the $ categories variable (declared in tutos / index with the readAll action of the daoCategory) exists
	if(isset ($categories))
	{
		echo '<section>';
//for each category object in the categories table
		foreach ($categories as $key => $categorie) 
		{

//generation of the link to read tutorials according to its category
			echo '<a href="'.WEBROOT.'Tutos/read/'.$categorie->getId().'">';
			echo '<article>';
//generating the insertion of the image that appears with the selected category
			echo '<img src="'.WEBROOT.'img/'.$categorie->getImg().'">';
//displaying the image of the chosen category
			echo '<span>'.$categorie->getNom().'</span>';
			echo '</article>';
			echo '</a>';
		}
		echo '</section>';
	}
	?>


	<!--form that will be processed with the information that the user enters through the action tutos / create => page tutorial, index-->
<!--The form collects data entered by the user and sends its data to the controller (Tutos / create) to be registered in the database => controller performs the action requested by the form with the dao.
create new object $ object = new entity ...
Capsule is sent with all data to the database -->

<h1 id="titre_tuto">Créez vos tutos</h1>

<form id="formulaire_tutos" action ="<?php echo WEBROOT ?>Tutos/create" method="POST" enctype="multipart/form-data">


	<div class="box">
		<div class="content">	
			<select id="choixCat" type="text" name="categories">

				<option value="" >Choisir votre catégorie:</option>
				<option value="1">Visage</option>
				<option value="2">Corps</option>
				<option value="3">Cheveux</option>
				<option value="4">Bain et douche</option>

			</select>
		</br>

		<input id="caseNom" type="text" name="nom" placeholder="Titre"></br>
		<input id="caseDescription" type="textearea" name="description" placeholder="Description">
	</br>
	
	<input id="buttonImage" type="file" name="img"></br>


	<div class="btn1 from-top">
		<input id="buttonCreerTutos" type="submit" value="Créer votre tutos">
	</div>
</form>
</div>
</div>


<?php 
if(isset($message))
{
	echo $message;
}

?>

<!-- <script src="<?php echo WEBROOT ?>js/jquery_inscription.js"></script>

<script src="<?php echo WEBROOT ?>js/script.js"></script>
<script>
	 	var url = "<?php echo $_SESSION['url']?>";
</script>
<script>window.onload = changeUrl(url);</script> -->
</main>

