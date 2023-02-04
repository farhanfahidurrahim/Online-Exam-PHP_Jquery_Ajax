<?php 
    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/inc/header.php');
	include_once ($filepath.'/../controller/Question.php');
	$ques= new Question();
?>
<?php
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  	// code...
  }
?>
<style>
	.adminpanel{width: 500px;color: #999;margin: 30px auto 0; padding:50px; border: 1px solid #ddd;}
</style>
	<div class="main">
	<h1>Admin Panel | Question List</h1>
		<div class="questionlist">
			<table class="tblone">
				<tr>
					<th>No.</th>
					<th>Questions</th>
					<th>Action</th>
				</tr>
				<?php
					$quesdata=$ques->getAllQuestion();
					if ($quesdata) {
						$i=0;
						while($value=$quesdata->fetch_assoc()){
							$i++;
				?>
				<tr>
					<td><?php echo $i ?></td>
					<td><?php echo $value['question']?></td>
					<td>
						<a onclick="return confirm('Are you sure Remove?')" href="?del=<?php echo $value['id']?>">Remove</a>
					</td>
				</tr>
				<?php } } ?>		
			</table>
		</div>
	</div>
<?php include 'inc/footer.php'; ?>