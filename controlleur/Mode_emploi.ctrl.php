<?php 

// Declaration of the controller object that inherits the "super controller" Controller

class CtrlMode_emploi extends Controller {
	// index action method
	public function index() {
		
		
		$this->render('Mode_emploi','index');
		
	}
		
}

 ?>