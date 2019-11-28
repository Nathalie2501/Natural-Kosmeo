<?php 
// ----------- PHASE 2 : creation DAO ----------- //

// loads the model linked to the DAO
require_once('modele/User.class.php');

// dao method declaration with object $ user as argument
class DaoUser {
	
//if the user clicks on registration, he sends the info to the controller to process and send to view
	public function create($user) {

		DB::select('INSERT INTO users (nom,prenom,email,pass) VALUES (?,?,?,?)', array($user->getNom(),$user->getPrenom(),$user->getEmail(),$user->getPass()));
	}

//read and recover data from the user according to the id

	public function read($id) {
		$donnees = DB::select('SELECT * FROM users WHERE id = ?', array($id));

		if (!empty($donnees)){
         
            $user = new User($donnees['nom'],$donnees['prenom'],$donnees['email'],$donnees['pass']);

// we retrieve the id of the user of the new instance of the object
		
           
           $user->setId($donnees['id']);

            return $user;
        

        } else{
         
        
            return null;
       
       
 } 
   
}
                       

//When there is a question mark => always array! there is as much variable in the array as there is a question mark
	public function readByEmail($email) {
		$donnees = DB::select('SELECT * FROM users WHERE email = ?', array($email));
		if (!empty($donnees)) {
			$user = new User($donnees['nom'],$donnees['prenom'],$donnees['email'],$donnees['pass']);
			
			$user->setId($donnees['id']);
			
			return $user;

			

		} else {
			return null;
		}
	}

	
	public function update($user) {

	$donnees = DB::select('UPDATE users SET nom = ?, prenom = ?, email = ?, pass = ? WHERE id = ?', array($user->getNom(),$user->getPrenom(),$user->getEmail(),$user->getPass(),$user->getId()));
		
		if (!empty($donnees)) {
		$user = new User($user['nom'],$user['prenom'],$user['email'],$user['pass']);

		

//we retrieve the id of the user of the new instance of the object
// get the id of the user created in update
			
			$user->setId($donnees['id']);
			
			return $user;
		

	}	
}
	 public function delete($id){

	 $donnees = DB::select('DELETE FROM users WHERE id= ?', array($id));
	}

}

 ?>