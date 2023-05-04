<?php

class Login extends Controller
{
  public function index()
  {
    $this->view('templates/header');
    $this->view('login/login');
    $this->view('templates/footer');
  }
}
