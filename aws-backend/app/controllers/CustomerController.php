<?php

class Login extends Controller
{
  public function index()
  {
    $this->view('templates/header');
    $this->view('login/login');
    $this->view('templates/footer');
  }
  
  public function login()
  {
    // login.php

    require_once 'vendor/autoload.php';

    // use Firebase\JWT\JWT;

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
    $response = array('token' => $jwt_token);
    header('Content-Type: application/json');
    echo json_encode($response);
  }
}
