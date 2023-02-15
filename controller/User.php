<?php
	$filepath = realpath(dirname(__FILE__));
	include_once($filepath.'/../lib/Session.php');
	include_once($filepath.'/../lib/Database.php');
	include_once($filepath.'/../helpers/Format.php');

	class User
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
		}

		public function getAllUser()
		{
			$query="SELECT * from tbl_user order by userId asc";
			$result=$this->db->select($query);
			return $result;
		}

		public function disableUser($userid)
		{
			$query="UPDATE tbl_user SET status='1' WHERE userId= '$userid'";
			$update_row=$this->db->update($query);
			if ($update_row) {
				$msg="<span class='success'>User Disable Successfully!</sapn>";
				return $msg;
			}else{
				$msg="<span class='error'>User Not Disable!</sapn>";
				return $msg;
			}
		}

		public function deleteUser($userid)
		{
			$query="DELETE FROM tbl_user WHERE userId='$userid'";
			$delete_data=$this->db->delete($query);
			if ($delete_data) {
				$msg="<span class='success'>User Delete Successfully!</span>";
				return $msg;
			}else{
				$msg="<span class='error'>User Not Delete!</span>";
				return $msg;
			}
		}

		public function enableUser($userid)
		{
			$query="UPDATE tbl_user SET status='0' WHERE userId='$userid'";
			$update_row=$this->db->update($query);
			if ($update_row) {
				$msg="<span class='success'>User Enable Successfully!</span>";
				return $msg;
			}else{
				$msg="<span class='error'>User Disable Successfully!</span>";
				return $msg;
			}
		}

		//__Frontend Part : User Registration
		public function userRegistration($name,$username,$phone,$email,$password)
		{
			$name= $this->fm->validation($name);
			$username= $this->fm->validation($username);
			$phone= $this->fm->validation($phone);
			$email= $this->fm->validation($email);
			$password= $this->fm->validation($password);

			$name= mysqli_real_escape_string($this->db->link,$name);
			$username= mysqli_real_escape_string($this->db->link,$username);
			$phone= mysqli_real_escape_string($this->db->link,$phone);
			$email= mysqli_real_escape_string($this->db->link,$email);
			$password= mysqli_real_escape_string($this->db->link,md5($password));
			if ($name=="" || $username=="" || $phone=="" || $email=="" || $password=="") {
				echo "<span class='error'>Fields Must Not be Empty!</span>";
				exit();
			}if (strlen($phone) <11 ) {
				echo "<span class='error'>Inavild Phone Number!</span>";
				exit();
			}else if(filter_var($email,FILTER_VALIDATE_EMAIL)===false){
				echo "<span class='error'>Inavild Email!</span>";
				exit();
			}else{
				$chk_query="SELECT * from tbl_user where email='$email'";
				$chk_result=$this->db->select($chk_query);
				if ($chk_result != false) {
					echo "<span class='error'>Email Address Already Exist!</span>";
					exit();
				}else{
					$query="INSERT INTO tbl_user(name,username,phone,email,password) VALUES('$name','$username','$phone','$email','$password')";
					$insert_row=$this->db->insert($query);
					if ($insert_row) {
						echo "<span class='success'>Registration Successfully Done!</span>";
						exit();
					}else{
						echo "<span class='error'>Error! Registration Failed...</span>";
						exit();
					}
				}
			}
		}

		//__Frontend Part : User Login
		public function userLogin($email,$password)
		{
			$email= $this->fm->validation($email);
			$password= $this->fm->validation($password);
			$email= mysqli_real_escape_string($this->db->link,$email);
			$password= mysqli_real_escape_string($this->db->link,$password);

			if ($email=="" || $password=="") {
				echo "empty";
				exit();
			}else{
				$query="SELECT * FROM tbl_user WHERE email='$email' AND password='$password'";
				$result=$this->db->select($query);
				if ($result != false) {
					$value=$result->fetch_assoc();
					if ($value['status']=='1') {
						echo "disable";
						exit();
					}else{
						Session::init();
						Session::set("login", true);
						Session::set("userId", $value['userId']);
						Session::set("username", $value['username']);
						Session::set("name", $value['name']);
					}
				}else{
					echo "error";
					exit();
				}
			}
		}

		//Get User Profile Data
		public function getUserData($userid)
		{
			$query="SELECT * FROM tbl_user WHERE userId='$userid'";
			$result=$this->db->select($query);
			return $result;
		}

		//Update User Data
		public function updateUserData($userid,$data)
		{
			$name= $this->fm->validation($data['name']);
			$username= $this->fm->validation($data['username']);
			$phone= $this->fm->validation($data['phone']);
			$email= $this->fm->validation($data['email']);

			$name= mysqli_real_escape_string($this->db->link,$name);
			$username= mysqli_real_escape_string($this->db->link,$username);
			$phone= mysqli_real_escape_string($this->db->link,$phone);
			$email= mysqli_real_escape_string($this->db->link,$email);

			$query="UPDATE tbl_user SET name='$name', username='$username', phone='$phone', email='$email' WHERE userId='$userid'";
			$update_row=$this->db->update($query);
			if ($update_row) {
				$msg="<span class='success'>User Data Updated!</span>";
				return $msg;
			}else{
				$msg="<span class='error'>Error! User Data Not Updated</span>";
				return $msg;
			}
		}
	}
?>