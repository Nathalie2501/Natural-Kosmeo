<?php 
// ----------- PHASE 3 : creation of the Object Controllers ----------- //
// Declaration of the controller object that inherits the "super controller" Controller
class CtrlUser extends Controller {
	// index action method
	
	public function index() {

//('user')->$name du super controller cad user 		

		$this->loadDao('User');

// Loading the 'index' view with the render method of the "super controller"
		if (isset($_SESSION['id'])) {
			$d['user'] = $this->DaoUser->read($_SESSION['id']);
			$this->set($d);
		}
		$this->render('User','index');
		
	}
	public function inscription(){
		$this->render('User','inscription');
	}

// method (function) of the create action
	public function create() {

// retrieves the queries that are in the folder of the DAO User with the loadDao method of the "super controller"

//if the user clicked on the registration button and entered the info in the form
		$this->loadDao('User');

/*REGEXP*/
		if ($this->DaoUser->readByEmail($this->input['email']) != null) {
			$d['user'] = $this->DaoUser->readByEmail($this->input['email']);
			
			$d['log'] = $this->input['email']." déjà inscript";
			$this->set($d);
			$this->render('User','index');
			


//send info to the database so creating a new user + 


		} else {
			$newUser = new User($this->input['nom'],$this->input['prenom'], $this->input['email'],sha1($this->input['pass']));
			
			$this->DaoUser->create($newUser);
			$_SESSION['id'] = DB::lastId();
			$_SESSION['nom'] = $newUser->getNom();
			$_SESSION['prenom'] = $newUser->getPrenom();
			$_SESSION['email'] = $newUser->getEmail();
			$_SESSION['pass'] = $newUser->getPass();


			$newUser->setId(DB::lastId());

			$d['log'] = "compte crée";
//data recovery to be able to display "welcome ...." in view / user / index 
			$d['user'] = $newUser;
			
			$this->set($d);
			
			header('Location: '.WEBROOT.'Tutos/index');
			
		}
}
	public function read($id) {
		
		$this->loadDao('User');
		$d['user'] = $this->DaoUser->read($id);
		$this->set($d);
		$this->render('User','profil');
}	

//modification of user data	
	public function update() {
		$this->loadDao('User');

		$user = $this->DaoUser->read($_SESSION['id']);
		$this->DaoUser->update($user);
		
		if (!empty($this->input['nom'])) {
        	$user->setNom(htmlentities($this->input['nom']));
		} 
		if (!empty($this->input['prenom'])) {
        		$user->setPrenom(htmlentities($this->input['prenom']));
		}
		if (!empty($this->input['email'])) {
        	$user->setEmail(htmlentities($this->input['email']));
		} 
		if (!empty($this->input['pass'])) {
			$user->setPass(htmlentities(sha1($this->input['pass'])));
        }
		
		$this->DaoUser->update($user);
		
		$d['user'] = $user;
		$this->set($d);

		$this->read($_SESSION['id']);

}


	public function login() {
		$this->loadDao('User');
		var_dump($this->input);
		
		if ($this->DaoUser->readByEmail($this->input['email']) != null) {
		
			$user = $this->DaoUser->readByEmail($this->input['email']);

			
		if (sha1($this->input['pass']) == $user->getPass()) {
			
				$_SESSION['id'] = $user->getId();
				$_SESSION['nom'] = $user->getNom();
				$_SESSION['prenom'] = $user->getPrenom();
				
				header('Location: '.WEBROOT.'Tutos/index');
			} else {
				
				$d['log'] =  "Mot de passe incorrect";
				$this->set($d);
				$this->render('Presentation','index');
			}
		
		} else {

			$d['log'] = "Email incorrect";
			$this->set($d);
			$this->render('Presentation','index');
		}
	}

	

	public function logOut() {

		if (isset($_SESSION['id'])) { 
		$_SESSION = array();


		
		session_destroy();
		header('Location: '.WEBROOT.'Tutos/index');
	}
	

	}

	public function delete() {
		
		$this->loadDao('User');

		if (isset($_SESSION['id'])){

			$this->DaoUser->delete($_SESSION['id']);

			$d['log'] = "Compte supprimé";
			$this->set($d);
			header('location:' .WEBROOT. 'User/logOut');
		}
		
	
}

}	
 
?>