<main id='addEtapes'>
<div class="logo">
	<img src="<?php echo WEBROOT ?>img/logo_transp.png" alt="">
</div>

<?php
	
if (isset($_SESSION['id']))
{
	echo '<a href="'.WEBROOT.'User/logOut"><button>Déconnexion</button></a>';
}else{
	echo '<a href="'.WEBROOT.'User/inscription"><button>Inscription</button></a>';
}

?>

<nav>
		
	<a href="<?php echo WEBROOT ?>Accueil/index">Accueil</a>
            
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

<?php

//if the variable tutos exists (the user clicked on the selected category), show me all the tutorials of the categories

//public function read (tutos) = id_cat
if (isset($tutos))
{

//for each object tutos present in the table tuto	
	foreach ($tutos as $key => $tuto) 
	{

//generation of the link to read the tutorial according to the selected tutorial
		
		echo '<a href="'.WEBROOT.'Tutos/read/'.$tuto->getFk_categories().'/'.$tuto->getId().'"><article>';
		echo $tuto->getNom();
		echo $tuto->getDescription();
		echo '<img src="'.WEBROOT.'img/'.$tuto->getImg().'">';
		echo '</article></a>';
	}
} 

//if the tutoSolo variable exists (the user has chosen the tutorial of the category he wants to see)
// show the selected tutorial
//<input type="hidden" name="tutoId" value="'.$tutoSolo->getId().'"> =>sends input but hidden to the user. Send to have the id of the user selected tutoSolo

//public function read(tutos)=>id_tuto = tuto solo
if (isset($tutoSolo)) {
	
//generation of the link to read the tutorial according to the selected tutorial

	
	echo $tutoSolo->getNom();
	echo '<img src="'.WEBROOT.'img/'.$tutoSolo->getImg().'">';
	echo $tutoSolo->getDescription();
}



?>
<!--form adding steps-->
<section>
<!--input hidden pour envoyer l'id du nouveau tutos-->


<form id="regForm" action="<?php echo WEBROOT ?>Etapes/addEtapes" method="POST" enctype="multipart/form-data" id="formTutos">


<h1>Saisie de votre tuto beauté :</h1>

<!-- One "tab" for each step in the form: -->
<div class="tab"> Première étape 
  <p><input name="nom" placeholder="Titre..." oninput="this.className = ''"></p>
  
  <p><input name="description" type="textarea" placeholder="Description..." oninput="this.className = ''"></p>
  <p><input name="img" type="file" placeholder="Image..." oninput="this.className = ''"></p>
</div>

<div class="tab"> Ingrédients

  <p><input name="quantite" placeholder="Quantité..." oninput="this.className = ''"></p>
  <p><input name="unite" placeholder="Unité (cl, gr, ...)..." oninput="this.className = ''"></p>
  <p><input name="nom" placeholder="Nom de l'ingrédients..." oninput="this.className = ''"></p>
</div>

<div class="tab"> Matériels

  <p><input name="nom" placeholder="Ustensiles, récipients..." oninput="this.className = ''"></p>
  
</div>


<div style="overflow:auto;">
  <div style="float:right;">
    <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
    <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
  </div>
</div>

<!--Circles which indicates the steps of the form:--> 
<div style="text-align:center;margin-top:40px;">
  <span class="step"></span>
  <span class="step"></span>
  <span class="step"></span>
  <span class="step"></span>
</div>
 <input type="hidden" name="fk_tutos" value="<?= $NewTutos->getId() ?>">
</form>
</section>

	
<div class="footer">
</div>
</main>


