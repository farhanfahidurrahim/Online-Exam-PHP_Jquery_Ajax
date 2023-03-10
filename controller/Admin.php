<?php
	$filepath = realpath(dirname(__FILE__));
	include_once($filepath.'/../lib/Session.php');
	include_once($filepath.'/../lib/Database.php');
	include_once($filepath.'/../helpers/Format.php');

	class Admin
	{	
		private $db;
		private $fm;
		public function __construct()
		{
			$this->db= new Database();
			$this->fm= new Format();
		}

		public function getAdminData($data)
		{
			$adminUsr= $this->fm->validation($data['adminUser']);
			$adminPass= $this->fm->validation($data['adminPassword']);
			$adminUsr= mysqli_real_escape_string($this->db->link,$adminUsr);
			$adminPass= mysqli_real_escape_string($this->db->link,md5($adminPass));

			$query="SELECT * FROM tbl_admin WHERE adminUser='$adminUsr' AND adminPassword='$adminPass'";
			$result = $this->db->select($query);
			if ($result != false) {
				$value=$result->fetch_assoc();
				Session::init();
				Session::set('adminLogin',true);
				Session::set('adminId',$value['adminId']);
				Session::set('adminUser',$value['adminUser']);
				header("Location: index.php");
			}else{
				$msg="<span class='error'>Username or Password Not Matched!</span>";
				return $msg;
			}
		}
	}
?>