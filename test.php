<?php include 'inc/header.php'; ?>
<?php
	Session::checkSession();
	if (isset($_GET['q'])) {
		$number=(int) $_GET['q'];
	}else{
		header("Location: exam.php");
	}
	$totalqs=$qst->getTotalQues();
	$question=$qst->getQuesByNumber($number);
?>
<?php
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$procs =$pro->processData($_POST);
	}
?>
<div class="main">
<h1>Question <?php echo $question['quesNo']; ?> of <?php echo $totalqs; ?></h1>
	<div class="test">
		<form method="POST" action="">
			<table> 
				<tr>
					<td colspan="2">
					 <h3>Que <?php echo $question['quesNo']; ?>: <?php echo $question['question']; ?></h3>
					</td>
				</tr>
				<?php
					$answer = $qst->getAnswer($number);
					if ($answer) {
						while($result=$answer->fetch_assoc()){
				?>
				<tr>
					<td>
					 <input type="radio" name="ans" value="<?php echo $result['id']; ?>" /><?php echo $result['option']; ?></td>
				</tr>
				<?php } } ?>
				<tr>
				  	<td>
						<input type="submit" name="submit" value="Next Question"/>
						<input type="hidden" name="number" value="<?php echo $number;?>" />
					</td>
				</tr>
				
			</table>
		</form>
</div>
 </div>
<?php include 'inc/footer.php'; ?>