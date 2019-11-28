<?php
// Declaration of the controller object that inherits the "super controller" Controller 
class CtrlEtapes extends Controller {
	// index action method
	public function index() {
		
		
		$this->render('Tutos','etapes');
		
	}

	public function addEtapes() {
		$this->loadDao('Etapes');
		$this->loadDao('Materiel');
		$this->loadDao('Ingredient');

	if(!isset($_SESSION['id'])) {
	 
		$d['message'] = 'Vous devez être inscrit pour ajouter des tutos';
		$this->set($d);
		$this->render('Tutos','index');

//input['tutoId'] est le champs caché (hidden du formulaire de création de l'étape dans tutos, read) qui va permettre de récupérer l'id du tuto qui va correspondre à l'étape créé par l'utilisateur
}else{

	$dossier = ROOT.'img/';
	$fichier = basename($this->files['img']['name']);
	move_uploaded_file($this->files['img']['tmp_name'], $dossier . $fichier);

	
	
	$NewEtapes = new Etapes($this->input['nom'],$this->input['description'],$fichier,$_SESSION['id'],$this->input['fk_tutos']);


//action addEtapes de la daoEtapes (insert les infos dans la nouvelle boite $etapes = new etapes ... Que l'utilisateur entre quand il créé son tuto).	
	// $this->readEtapes($etape->getFk_tutos(),$etape->getId());


	 
	$d['NewEtapes']= $this->DaoEtapes->addEtapes($NewEtapes);

	//$this->readEtapes($etape->getFk_tutos(),$etape->getId());

header('Location: '.WEBROOT.'Tutos/read');
	
}  


}

}



//$this->readEtapes($etape->getFk_tutos(),$etape->getId());
	 
//variable etapes est égal à l'action read de la dao ($etapes-> getId => récupère l'id du tuto créé avec setId de la dao create)
//	$etapes->setId(DB::lastId());
	
	//var_dump($etapes);

//$d['etapes'] = $etapes;

//variable tutoSolo est égal à l'action read de la dao ($tutos-> getId => récupère l'id du tuto créé avec setId de la dao create)
	
	//$this->index();
	
	//$this->set($d);
//envoie les infos au fichier Tutos, index qui va les traiter et les afficher dans la vue.
	
	//$this->render('Tutos','etapes');
	//header('Location: '.WEBROOT.'Tutos/index');





		


 ?>