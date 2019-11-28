<?php
// Declaration of the controller object that inherits the "super controller" Controller 
class CtrlCouverture extends Controller {
	// index action method
	public function index() {
		
		
		$this->render('Couverture','index');
		
	}
		
}

 ?>