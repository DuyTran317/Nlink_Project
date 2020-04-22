<?php
	class App{
		protected $controller="Home";
		protected $action="Index";
		protected $params=array();
		
		function __construct(){
			$_SESSION['area'] = "";
			$arr = $this->UrlProcess();
			if(isset($arr[0]) && $arr[0] == "admin")
			{
				
				$_SESSION['area'] = $arr[0];
				array_shift($arr);
				
			}
			if(isset($arr[0]))
			{
				if(file_exists("./mvc/controllers/".$arr[0].".php"));
				{
					$this->controller = $arr[0];
					unset($arr[0]);
				}
			}
			require_once("./mvc/".$_SESSION['area']."controllers/".$this->controller.".php");
			$temp = $this->controller;
			$this->controller = new $this->controller;
			
			if(isset($arr[1]))
			{
				if(method_exists($this->controller,$arr[1]))
				{
					$this->action =$arr[1];
					unset($arr[1]);
				}
			}
			
			$this->params = $arr ? array_values($arr) : array();
			$toAction = array($this->controller,$this->action);
			call_user_func_array($toAction,$this->params);
		}
		function UrlProcess(){
			if(isset($_GET['url']))
			{
				return explode("/",filter_var(trim($_GET['url'],"/")));
			}
			return array();
		}
	}
?>