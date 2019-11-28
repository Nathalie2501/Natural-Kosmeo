<?php
// Declaration of the controller object that inherits the "super controller" Controller 
class CtrlA_propos extends Controller {
	// index action method
	public function index() {
		
		
		$this->render('A_propos','index');
		
	}
		
}

 ?>