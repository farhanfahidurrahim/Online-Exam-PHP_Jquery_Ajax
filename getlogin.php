<?php
	$filepath = realpath(dirname(__FILE__));
	include_once($filepath.'/controller/User.php');
	$usr=new User();

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$email=$_POST['email'];
		$password=md5($_POST['password']);
		$usr_reg=$usr->userLogin($email,$password);
	}
?>