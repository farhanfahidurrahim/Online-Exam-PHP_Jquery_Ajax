<?php
	$filepath = realpath(dirname(__FILE__));
	include_once($filepath.'/../lib/Database.php');
	include_once($filepath.'/../helpers/Format.php');

	class Question
	{
		private $db;
		private $fm;
		public function __construct()
		{
			$this->db=new Database();
			$this->fm=new Format();
		}

		public function addQuestion($data)
		{
			$quesNo=mysqli_real_escape_string($this->db->link,$data['quesNo']);
			$question=mysqli_real_escape_string($this->db->link,$data['question']);

			$option=array();
			$option[1]=$data['opt1'];
			$option[2]=$data['opt2'];
			$option[3]=$data['opt3'];
			$option[4]=$data['opt4'];
			$rightAns=$data['rightAns'];

			$query="INSERT INTO tbl_question(quesNo, question) VALUES('$quesNo','$question')";
			$insert_row=$this->db->insert($query);
			if ($insert_row) {
				foreach ($option as $key => $opt) {
					if ($opt != '') {
						if ($rightAns==$key) {
							$r_query="INSERT INTO tbl_answer(quesNo,rightAns,option) VALUES('$quesNo','1','$opt')";
						}else{
							$r_query="INSERT INTO tbl_answer(quesNo,rightAns,option) VALUES('$quesNo','0','$opt')";
						}
						$insertrow=$this->db->insert($r_query);
						if ($insertrow) {
							continue;
						}else{
							die('Error...');
						}
					}
				}

				$msg="<span class=success>Question Added Successfully!</span>";
				return $msg;
			}

		}

		public function getTotalQues()
		{
			$query="SELECT * from tbl_question";
			$result=$this->db->select($query);
			$total=$result->num_rows;
			return $total;
		}

		public function getAllQuestion()
		{
			$query="SELECT * from tbl_question order by quesNo asc";
			$result=$this->db->select($query);
			return $result;
		}

		public function getUserQuestion()
		{
			$query="SELECT * FROM tbl_question";
			$getdata=$this->db->select($query);
			$result=$getdata->fetch_assoc();
			return $result;
		}

		//Exam Test
		public function getQuesByNumber($number)
		{
			$query="SELECT * FROM tbl_question WHERE quesNo='$number'";
			$getdata=$this->db->select($query);
			$result=$getdata->fetch_assoc();
			return $result;
		}

		//Answer by Question
		public function getAnswer($number)
		{
			$query="SELECT * FROM tbl_answer WHERE quesNo='$number'";
			$getdata=$this->db->select($query);
			return $getdata;
		}
	}

?>