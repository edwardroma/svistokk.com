<?php

class Router {

	public static function route($url) {
		
		//controller
		$controller = (isset($url[0]) && $url[0] != '') ? ucwords($url[0]) : DEFAULT_CONTROLLER;
		$controller_name = $controller;
		array_shift($url);

		//action		
		$action = (isset($url[0]) && $url[0] != '') ? 'the Action is: ' . $url[0] : 'indexAction';
		$action_name = $action;
		array_shift($url);

		//params
		$quryParams = $url;

		$dispatch = new $controller($controller_name, $action);

		if(method_exists($controller, $action)) {
			call_user_func_array([$dispatch, $action], $quesryParams);
		}
		else {
			die('This method does not exist in the controller \"' . $controller_name . '\"');
		}
	}
}