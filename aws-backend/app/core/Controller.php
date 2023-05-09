<?php
require_once 'IModel.php';
class Controller{
	protected IModel $model;

	public function view($view, $data = []) {
		require_once '../app/views/' . $view . '.php';
	}

	public function setModel($model) {
		require_once '../app/models/' . $model . '.php';
		$this->model =  new $model;
	}

	public function getModel() {
		return $this->model;
	}
}