<?php 
// Declaration of the controller object that inherits the "super controller" Controller
class CtrlTutos extends Controller {
	// index action method
	public function index() {
		
		$this->loadDao('Categories');
		
		
//$d['categories'] -> declaration of the variable that will be sent to the view
//readAll of dao catégorie (selected from the categories table) is stored in the categories variable
// the main action is readAll of the dao categories
		
		$d['categories'] = $this->DaoCategories->readAll();
		$this->set($d);
		$this->render('Tutos','index');
	}

	public function create() {
		$this->loadDao('Tutos');

		
		if(!isset($_SESSION['id'])) {
	 
		$d['message'] = 'Vous devez être inscrit pour ajouter des tutos';
		$this->set($d);
		$this->render('Tutos','index');
	
	
		


// if the user has clicked to add a tutorial in a category and has entered information in the form (input), the controller will ask the dao to send him the info entered by the user and will then do the function index (show all) of the user created tutorial
		

}else {
	
 $dossier = ROOT.'img/';
 	$fichier = basename($this->files['img']['name']);
 	move_uploaded_file($this->files['img']['tmp_name'], $dossier . $fichier);
// create a new box where will be arranged all the news of the new tutorial

	

$NewTutos = new Tutos($this->input['nom'],$this->input['description'],$fichier,$this->input['categories'],$_SESSION['id']);


//action create de la daotutos (insert les infos dans la nouvelle boite $tutos = new Tutos ... Que l'utilisateur entre quand il créé son tuto). 
//$tuto est égale à l'action create $NewTutos de la Daotutos
//$NewTutos contient déjà l'id du nouveau tuto créé (déclaré dans DaoTutos) donc pas besoin de getId
//$tuto contient les données du nouveau tuto
//Cette capsule contenant les données est envoyée à la dao qui enregistre dans la bdd

//// action create of the daotutos (insert the infos in the new box $ tutos = new Tutos ... That the user enters when he creates his tutorial).
// $ tuto equals the create $ NewTutos action of the Daotutos
// $ NewTutos already contains the id of the new tutorial created (declared in DaoTutos) so no need to getId
// $ tutorial contains the data of the new tutorial
// This capsule containing the data is sent to the dao registering in the database
 		$NewTutos = $this->DaoTutos->create($NewTutos);

		
		$this->read($NewTutos->getFk_categories(),$NewTutos->getId());

//When we created the tuto ($tuto) => we can already read it (action read of the controller) which says that reads either $tutorial or by category, or by the id of the tutorial if $ tutoSolo
	
	//$this->read($NewTutos->getFk_categories(),$NewTutos->getId());

//the read action of the controller will look for the info in the database of the new tutorial so that we can display it

	
	}
}



//if the user clicked on create a tutorial in the index form, tuto

	public function read($id_cat, $id_tuto = null) {

		$this->loadDao('Tutos');
		$this->loadDao('Etapes');

// si id_tuto n'est pas cliqué ça veut dire que l'utilisateur est sur la page où toutes les catégories sont affichées (page 1) et que lorsqu'il va cliquer sur une catégorie, tous les tutos de la catégorie vont s'afficher
//Le controlleur envoie l'ordre à la vue (tutos/ index) si id_tuto est égal à null(n'a pas été sélectionné par l'utilisateur) tu m'affiches la page où les catégories sont notées (page 1) 

//lire les infos presentes dans la catégorie choisie (lien généré dans page tutos,index), en faisant l'action readAllByCat (de la dao tutos)-> envoyer les infos dans la vue tutos, read qui va traiter les infos pour les afficher 


//if id_tuto is not clicked it means that the user is on the page where all the categories are displayed (page 1) and that when he clicks on a category, all the tutorials of the category will be displayed
// The controller sends the order to the view (tutos / index) if id_tuto is equal to null (has not been selected by the user) you show me the page where the categories are noted (page 1)

// read the information present in the chosen category (link generated in page tutorials, index), by doing the action readAllByCat (from the dao tutorials) -> send the information in the view tutos, read which will treat the infos for the display
		if ($id_tuto == null) {
			
			$d['tutos'] = $this->DaoTutos->readAllByCat($id_cat);
			
//var_dump($d['tutos']); => montre ce qu'il y a dans la variable $d['tutos']/permet de voir ce que l'action readAllByCat fait comme action
			$this->set($d);
			
			$this->render('Tutos','read',$id_tuto);
//sinon c'est qu'il a déja cliqué et qu'il est déjà dans la page de la catégorie choisie. Lorsqu'il va cliquer sur le tuto choisi, il va s'afficher(3ème page) (donnée du tuto choisi)

//otherwise it has already clicked and is already in the page of the chosen category. When he clicks on the selected tutorial, it will appear (3rd page) (data of the selected tutorial)
		} else {
			$d['tutoSolo'] = $this->DaoTutos->read($id_tuto);
			$d['etapes'] = $this->DaoEtapes->readAllByTutos($id_tuto);
			$param = $id_cat."/".$id_tuto;
			$this->set($d);
			$this->render('Tutos','read',$param);
		
		
	}
}
}
?>