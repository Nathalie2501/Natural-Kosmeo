<?php
// ----------- PHASE 1 : creation d'objet ----------- //

//Declaration of the User object (User table of the natural_kosmeo database) with inheritance (copy / paste) of the AbstractEntity abstract class (getId function to retrieve the id)

class User extends AbstractEntity {
	//Declaration of Attributes (User Properties)
	
	private $nom;
	private $prenom;
	private $email;
	private $pass;

	// Declaration of the constructor with its arguments (parameters) that refer to the attributes (properties)

	
	public function __construct($nom,$prenom,$email, $pass) {
		
		// $this refers to the instance of the object (new Object () => in User.ctrl.php we declare the request (loadDao) which will fetch the info in the bdd / delete them / ...
		
		$this->nom = $nom;
		$this->prenom = $prenom;
		$this->email = $email;
		$this->pass = $pass;
	}

    // Getter (it can read an attibut)
	
	public function getNom() {
		return $this->nom;
	}
    // Setter (it allows to write an attribute)//check the value of the attribute (here name)
	
	public function setNom($nom) {
		$this->nom = $nom;
	}

	public function getPrenom() {
		return $this->prenom;
	}

	public function setPrenom($prenom) {
		$this->prenom = $prenom;
	}

	public function getEmail() {
		return $this->email;
	}

	public function setEmail($email) {
		$this->email = $email;
	}

	public function getPass() {
		return $this->pass;
	}

	public function setPass($pass) {
		$this->pass = $pass;
	}


}

 ?>