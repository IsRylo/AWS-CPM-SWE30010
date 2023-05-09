<?php

class App
{
	protected $controller;
	protected $method;
	protected $params = [];

	public function __construct()
	{
		$url = $this->parseURL();
		!isset($url[0]) && $url[0] = $this->controller;

		if (method_exists($this, $url[0])) {
			$this->controller = $this;
			$this->method = $url[0];
		}
		else if (file_exists('../app/controllers/' . $url[0] . '.php')) {
			$this->controller = $url[0];
			unset($url[0]);
			require_once '../app/controllers/' . $this->controller . '.php';
			$this->controller = new $this->controller;

			if (isset($url[1]) && method_exists($this->controller, $url[1])) {
				$this->method = $url[1];
				unset($url[1]);
			}  
			else {
				throw new Exception("Unable to find api class method", 1);
			}

		} else {
			throw new Exception("Unable to find api class", 1);
		}
	
		if (!empty($url)) {
			$this->params = array_values($url);
		}
		// run the controller
		call_user_func_array([$this->controller, $this->method], $this->params);
	}

	public function parseURL()
	{
		if (isset($_GET['url'])) {
			$url = rtrim($_GET['url'], '/');
			$url = filter_var($url, FILTER_SANITIZE_URL);
			$url = explode('/', $url);
			return $url;
		}
	}
	
	private function login()
	{
		// login.php
		// use Firebase\JWT\JWT;
		echo "Hello";
		$username = $_POST['username'];
		$password = $_POST['password'];

		// TODO: Authenticate the user using the provided username and password
		// ...

		// If the user is authenticated, generate a JWT token
		$jwt_secret = 'your_jwt_secret_key';
		$token_payload = array(
		'username' => $username,
		'exp' => time() + (60 * 60) // Token expires in 1 hour
		);
		
		// Run this after the JWT enconder has been installed 
		// $jwt_token = JWT::encode($token_payload, $jwt_secret);

		// Return the token to the client
		// $response = array('token' => $jwt_token);

		// TODO: Change this to the front-end link 
		// header('Content-Type: application/json');
		// echo json_encode($response);
	}

	private function register()
	{
		echo "Registering new user";
	}
}
