<?php include 'inc/header.php'; ?>
<?php
	Session::checkSession();
	$que=$qst->getUserQuestion();
	$totalqs=$qst->getTotalQues();
?>
<div class="main">
<h1>Welcome to Online Exam</h1>
	<div class="starttest">
		<h2>Test your knowlege</h2>
		<p>Multiple Choice Quiz Test Your Knowledge</p>
		<ul>
			<li><strong>Number of Questions:</strong> <?php echo $totalqs?></li>
			<li><strong>Question Type:</strong> MCQ</li>
		</ul>
		<a href="test.php?q=<?php echo $que['quesNo'];?>">Start Test</a>
	</div>
	
  </div>
<?php include 'inc/footer.php'; ?>