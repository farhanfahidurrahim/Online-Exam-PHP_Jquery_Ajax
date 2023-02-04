<?php
	$filepath = realpath(dirname(__FILE__));
	include_once($filepath.'/controller/User.php');
	$usr=new User();

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$name=$_POST['name'];
		$username=$_POST['username'];
		$phone=$_POST['phone'];
		$email=$_POST['email'];
		$password=$_POST['password'];
		$usr_reg=$usr->userRegistration($name,$username,$phone,$email,$password);
	}
?>