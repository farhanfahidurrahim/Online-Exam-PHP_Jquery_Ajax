<?php include 'inc/header.php'; ?>
<?php
	Session::checkSession();
	$totalqs=$qst->getTotalQues();
?>
<div class="main">
<h1>All Questions & Ans: <?php echo $totalqs; ?></h1>
	<div class="test">
		<form method="POST" action="">
		<table> 
			<?php
				$getQues=$qst->getAllQuestion();
				if ($getQues) {
					while($question=$getQues->fetch_assoc()){
			?>
			<tr>
				<td colspan="2">
				 <h3>Que <?php echo $question['quesNo']; ?>: <?php echo $question['question']; ?></h3>
				</td>
			</tr>
			<?php
				$number = $question['quesNo'];
				$answer = $qst->getAnswer($number);
				if ($answer) {
					while($result=$answer->fetch_assoc()){
			?>
			<tr>
				<td>
					<input type="radio">
					<?php
						if ($result['rightAns']=='1') {
						 	echo "<span style='color:blue'>".$result['option']."</spn>";
						}else{
							echo $result['option'];
						}
					?>
				</td>
			</tr>
			<?php } } ?>
			<?php } } ?>
		</table>
</div>
 </div>
<?php include 'inc/footer.php'; ?>