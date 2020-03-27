<?php
	class Ajax extends Controller{
		public $ProductModel;
		function __construct()
		{
			$this->ProductModel = $this->model("ProductModel");
		}
		function search()
		{
			
		}
	}
?>