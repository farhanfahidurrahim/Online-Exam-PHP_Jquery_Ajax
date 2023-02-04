<?php 
    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/inc/header.php');
	include_once ($filepath.'/../controller/User.php');
	$usr = new User();
?>

<?php
	if (isset($_GET['dis'])) {
		$disid=(int)$_GET['dis'];
		$dbuser=$usr->disableUser($disid);
	}
?>
	<div class="main">
		<h3>Admin Panel - Manage User</h3>
		<div class="manageuser">
			<table class="tblone">
				<tr>
					<th>No.</th>
					<th>Name</th>
					<th>Username</th>
					<th>Email</th>
					<th>Phone</th>
					<th>Action</th>
				</tr>
		<?php
			$userdata=$usr->getAllUser();
			if ($userdata) {
				$i=0;
				while ($value=$userdata->fetch_assoc()) {
					$i++;
		?>
				<tr>
					<td><?php echo $i ?></td>
					<td><?php echo $value['name']?></td>
					<td><?php echo $value['username']?></td>
					<td><?php echo $value['email']?></td>
					<td><?php echo $value['phone']?></td>
					<td>
						<?php if ($value['status'] == 0) { ?>
								<a onclick="return confirm('Are you sure Disable?')" href="?dis=<?php echo $value['userId']?>">Disable</a>
						<?php } else { ?>
								<a onclick="return confirm('Are you sure Enable?')" href="?ena=<?php echo $value['userId']?>">Enable</a>	
						<?php } ?> ||
						<a onclick="return confirm('Are you sure Remove?')" href="?del=<?php echo $value['userId']?>">Remove</a>
					</td>
				</tr>
		<?php } } ?>		
			</table>
		</div>
	</div>
	
<?php include 'inc/footer.php'; ?>