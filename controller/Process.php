<?php
	$filepath = realpath(dirname(__FILE__));
	include_once($filepath.'/../lib/Session.php');
	include_once($filepath.'/../lib/Database.php');
	include_once($filepath.'/../helpers/Format.php');

	class Process
	{
		private $db;
		private $fm;

		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}

		public function processData($data)
		{
			$selectedAns=$this->fm->validation($data['ans']);
			$number=$this->fm->validation($data['number']);
			$selectedAns=mysqli_real_escape_string($this->db->link,$data['ans']);
			$number=mysqli_real_escape_string($this->db->link,$data['number']);
			$next=$number+1;

			if (!isset($_SESSION['score'])) {
				$_SESSION['score']='0';
			}
			$total=$this->getTotalQues();
			$right=$this->rightAns($number);
			if ($right==$selectedAns) {
				$_SESSION['score']++;
			}
			if ($number==$total) {
				header("Location: final.php");
				exit();
			}else{
				header("Location: test.php?q=".$next);
			}
		}

		private function getTotalQues()
		{
			$query="SELECT * from tbl_question";
			$result=$this->db->select($query);
			$total=$result->num_rows;
			return $total;
		}

		private function rightAns($number)
		{
			$query="SELECT * from tbl_answer WHERE quesNo='$number' AND rightAns='1'";
			$getdata=$this->db->select($query)->fetch_assoc();
			$result=$getdata['id'];
			return $result;
		}
	}
?>