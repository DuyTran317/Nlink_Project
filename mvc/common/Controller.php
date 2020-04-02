<?php
	class Controller{
		public function model($model){
			require_once("./mvc/models/".$model.".php");
			return new $model;
		}
		public function view($view, $data = array()){
			require_once(".".$_SESSION['area']."/mvc/views/".$view.".php");
		}
	}
?>