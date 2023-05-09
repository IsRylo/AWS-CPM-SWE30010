<?php
require_once './vendor/autoload.php';
use Firebase\JWT\JWT;

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
		if(!isset($_SESSION['user'])) {
			$post = json_decode(file_get_contents('php://input'), true);
			// login.php
			if (!isset($post['username']) && !isset($post['password'])) throw new Exception("Details are not sufficient!"); 
			$username = filter_var($post['username'], FILTER_SANITIZE_STRING);
			$password = hash("sha256", $post['password']);

			if (!$this->authenticate($username, $password)) {
				echo "Failed to authenticate";
				return;
			}
		}

		// If the user is authenticated, generate a JWT token
		$jwt_secret = $_SESSION["user"]['customer_ID'];
		$token_payload = array(
		'username' => $username,
		'exp' => time() + (60 * 60) // Token expires in 1 hour
		);
		
		// Run this after the JWT enconder has been installed 
		$jwt_token = JWT::encode($token_payload, $jwt_secret, "HS256");

		// Return the token to the client
		$response = array('token' => $jwt_token);

		header('Content-Type: application/json');
		echo json_encode($response);
	}

	public function register()
	{
		
		$post = json_decode(file_get_contents('php://input'), true);
		// var_dump($post);
		// return;

		if (!isset($post['username']) && !isset($post['password']) && !isset($post['email'])) throw new Exception("Details are not sufficient!"); 
		$safePost['username'] = filter_var($post['username'], FILTER_SANITIZE_STRING);
		$safePost['email'] = filter_var($post['email'], FILTER_SANITIZE_EMAIL);
		$safePost['password'] = $post['password'];

		$data['customer_name'] = $safePost['username'];
		$data['customer_email'] = $safePost['email'];
		$data['customer_pass'] = hash("sha256", $safePost['password']);
		require_once '../app/controllers/Customer.php';
		$customer = new Customer;
		try {
			$customer->register($data);
			echo json_encode("success");
		} catch (Exception $e) {
			echo json_encode(array('error' => $e));
		}
	}

	public function authenticate($username, $password)
	{
		// Get manager by ID 
		require_once '../app/controllers/Customer.php';
		$customer = new Customer;
		if ($customer->authenticate($username, $password)) return true;
		// else {
		// 	$manager = new Manager;
		// 	return $manager->authenticate($username, $password));
		// }
		return false;
		// Get customers by ID
		// If none return false
	}
}
