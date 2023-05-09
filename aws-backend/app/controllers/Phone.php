<?php

// class Phone extends Controller
// {
//   public function index()
//   {
//     $data['title'] = 'Data Phone';
//     $data['list_phone'] = $this->model('PhoneModel')->getAll();

//     $this->view('templates/header', $data);
//     $this->view('phone/index', $data);
//     $this->view('templates/footer');
//   }

//   public function add()
//   {
//     $data['title'] = 'Add Phone';

//     $this->view('templates/header', $data);
//     $this->view('phone/add', $data);
//     $this->view('templates/footer');
//   }

//   public function addPhone()
//   {
//     $input['name_phone'] = $_POST['name'];
//     $input['brand_phone'] = $_POST['brand'];

//     $insertResult = $this->model('PhoneModel')->insert($input);

//     if ($insertResult > 0) {
//       header('location: ' . base_url . '/phone');
//     } else {
//       echo 'Insert failed';
//     }
//   }
// }
