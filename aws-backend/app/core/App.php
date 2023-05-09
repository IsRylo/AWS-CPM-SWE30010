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
		// login.php
		if (!isset($_POST['username']) && !isset($_POST['password'])) throw new Exception("Details are not sufficient!"); 
		$username = $_POST['username'];
		$password = $_POST['password'];

		// TODO: Authenticate the user using the provided username and password
		// ...
		if ($this->authenticate($username, $password)) return json_encode(array('error' => "Failed to authenticate."));


		// If the user is authenticated, generate a JWT token
		$jwt_secret = 'your_jwt_secret_key';
		$token_payload = array(
		'username' => $username,
		'exp' => time() + (60 * 60) // Token expires in 1 hour
		);
		
		// Run this after the JWT enconder has been installed 
		$jwt_token = JWT::encode($token_payload, $jwt_secret, "HS256");

		// Return the token to the client
		$response = array('token' => $jwt_token);

		// TODO: Change this to the front-end link 
		header('Content-Type: application/json');
		echo json_encode($response);
	}

	public function register()
	{
		
		$json = json_decode(file_get_contents('php://input'), true);
		// var_dump($json);
		// return;

		if (!isset($json['username']) && !isset($json['password']) && !isset($json['email'])) throw new Exception("Details are not sufficient!"); 
		// $safePost = filter_input_array($json['username']['email']['password'], [
		// 	"username" => FILTER_SANITIZE_STRING,
		// 	"email" => FILTER_SANITIZE_EMAIL
		// ]);
		$data['customer_name'] = $json['username'];
		$data['customer_email'] = $json['email'];
		$data['customer_pass'] = hash("sha256", $json['password']);
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
		$customer = new Customer;
		if ($customer->authenticate($username, $password)) return true;
		// else {
		// 	$manager = new Manager;
		// 	if ($manager->authenticate($username, $password)) return false;
		// }
		return false;
		// Get customers by ID
		// If none return false
	}
}
