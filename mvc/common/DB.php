<?php
	class DB{
		public $con;
		protected $servername = "localhost";
		protected $username = "root";
		protected $password = "";
		protected $dbname = "nlink";
		
		protected $sql = '';
		protected $r = NULL;
		protected $rs = NULL;
		
		function __construct(){
			$this->con=mysqli_connect($this->servername,$this->username,$this->password);
			mysqli_select_db($this->con,$this->dbname);
			mysqli_query($this->con,"SET NAMES 'utf8'");
		}
		function getAllItem($sql){
			$this->sql = $sql;
			$this->r = mysqli_query($this->con,$this->sql);
			$mang = array();
			while($this->rs = mysqli_fetch_assoc($this->r))
			{
				$mang[] = $this->rs;
			}
			return json_encode($mang);
		}
		function getAllItemArray($sql){
			$this->sql = $sql;
			$this->r = mysqli_query($this->con,$this->sql);
			$mang = array();
			while($this->rs = mysqli_fetch_array($this->r))
			{
				$mang[] = $this->rs;
			}
			return json_encode($mang);
		}
		function getItem($sql){
			$this->sql = $sql;
			$this->r = mysqli_query($this->con,$this->sql);
			
			$this->rs = mysqli_fetch_row($this->r);
			
			return json_encode($this->rs);
		}
	}
?>