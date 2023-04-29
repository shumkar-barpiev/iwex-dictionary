<?php
require_once("./Controller/Controller.php");
require_once("./Models/Models.php");
require_once("./View/View.php");
/**
 * main app
 */
class webApp
{
	public $controller;
	public $view;

	public function __construct()
	{
		$this->controller = new Controller();
		$this->view = new View();
	}
}
$myApp = new webApp();
$myApp->controller->select_page($myApp->view);
?>
