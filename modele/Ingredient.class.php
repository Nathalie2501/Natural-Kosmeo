<?php
//Declaration of the object Materiel (table ingredient of the database natural_kosmeo) with inheritance (copy / paste) of the abstract class AbstractEntity (function getId to retrieve the id)
class Ingredients extends AbstractEntity {

	private $nom;
	private $unites;
	private $quantites;
//Declaration of the constructor with its arguments (parameters) that refer to the attributes (properties)
	public function __construct($nom,$unites) {
// $ this refers to the instance of the object (new Object () => in Etapes.ctrl.php we declare the request (loadDao) which will fetch the info in the bdd / delete them / ...
		$this->nom = $nom;
		$this->unites = $unites;
		$this->quantites = $quantites;


	}
//Getter (it can read an attibut)		
	public function getNom() {
		return $this->nom;
	}
// Setter (it allows to write an attribute)//check the value of the attribute (here nom)

	public function setNom($nom) {
		$this->nom = $nom;
	}

	public function getUnites() {
		return $this->unites;
	}
	public function setUnites($unites) {
		$this->unites = $unites;
	}

	public function getQuantites() {
		return $this->quantites;
	}
	public function setQuantites($quantites) {
		$this->quantites = $quantites;
	}
}