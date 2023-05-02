<?php
require_once("./Controller/Controller.php");
require_once("./Models/Entity/Entity.php");
require_once("./View/View.php");
require_once("./Models/Models.php");
require_once("./Models/Config.php");
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
		$this->model = new Model();
	}
}
$myApp = new webApp();
$myApp->controller->select_page($myApp->view, $myApp->model);
?>