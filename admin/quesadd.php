<?php 
    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/inc/header.php');
	include_once ($filepath.'/../controller/Question.php');
	$ques= new Question();
?>
<?php
  	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  		$addQue=$ques->addQuestion($_POST);
  	}

  	//Total Question & row
  	$totalques=$ques->getTotalQues();
  	$NextQuesCount=$totalques+1;
?>
<style>
	.adminpanel{width: 500px;color: #999;margin: 30px auto 0; padding:50px; border: 1px solid #ddd;}
</style>
	<div class="main">
	<h1>Admin Panel | Question Add</h1>

	<?php
		if (isset($addQue)) {
			echo $addQue;
		}
	?>
		<div class="adminpanel">
			<form action="" method="POST">
				<table>
					<tr>
						<td>Ques No:</td>
						<td><input type="number" name="quesNo" value="<?php echo $NextQuesCount?>"></td>
					</tr>
					<tr>
						<td>Question:</td>
						<td><input type="text" name="question" placeholder="Enter Question..." required></td>
					</tr>
					<tr>
						<td>Option A:</td>
						<td><input type="text" name="opt1" placeholder="Enter Option..."></td>
					</tr>
					<tr>
						<td>Option B:</td>
						<td><input type="text" name="opt2" placeholder="Enter Option..."></td>
					</tr>
					<tr>
						<td>Option C:</td>
						<td><input type="text" name="opt3" placeholder="Enter Option..."></td>
					</tr>
					<tr>
						<td>Option D:</td>
						<td><input type="text" name="opt4" placeholder="Enter Option..."></td>
					</tr>
					<tr>
						<td>Correct Ans:</td>
						<td><input type="number" name="rightAns" placeholder="Enter Option..."></td>
					</tr>
					<tr>
						<td></td>
						<td><input type="submit" name="submit" value="Submit"/></td>
					</tr>
				</table>
			</form>

		</div>
	</div>
<?php include 'inc/footer.php'; ?>