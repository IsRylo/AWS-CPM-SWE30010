<?php

class Home extends Controller
{
	public function __construct()
	{
		// if (!isset($_SESSION['session_login']) && $_SESSION['session_login'] != 'sudah_login') {
		// 	echo 'Login Tidak ditemukan. danger';
		// 	header('location: ' . base_url . '/login');
		// 	exit;
		// }
	}
	public function index()
	{
		$data['title'] = 'Halaman Home';

		$this->view('templates/header', $data);
		$this->view('home/index', $data);
		$this->view('templates/footer');
	}
	public function gajelas()
	{
		echo 'gajelas';
	}
}
