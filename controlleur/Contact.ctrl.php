<?php 

// Declaration of the controller object that inherits the "super controller" Controller
class CtrlContact extends Controller {
	// index action method
	public function index() {
		
		
		$this->render('Contact','index');
		
	}
}


 ?>