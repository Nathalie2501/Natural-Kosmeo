<?php 
// ----------- INIT 2 : creation of the super controller ----------- 
class Controller {
	public $input;
	public $files;
	var $vars = array();

	public function __construct() {
		if (isset($_POST)) {
			$this->input = $_POST;
		}
		if (isset($_FILES)) {
			$this->files = $_FILES;
		}
	}

	function loadDao($name) {
		require_once('dao/'.$name.'.dao.php');
		$daoClass = 'Dao'.$name;
		$this->$daoClass = new $daoClass();
	}

//$d = donnée 
	function set($d) {
		$this->vars = array_merge($this->vars, $d);
	}
// Method to load a view
	function render($controller, $filename) {
		extract($this->vars);
		ob_start();
		// $Controller = substr(get_class($this),4);
		require('vue/'.$controller.'/'.$filename.'.php');
		$content = ob_get_clean();
		echo $content;


	}
}

?>