<?php include 'inc/header.php'; ?>
<?php
	Session::checkSession();
	$userid=Session::get("userId");
?>
<?php
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$updateUser = $usr->updateUserData($userid,$_POST);
	}
?>
<style>
.profile{width: 530px;margin: 0 auto;border: 1px solid #ddd; padding: 50px;}
</style>
<div class="main">
<h1>Online Exam System - Your Profile</h1>
<div class="profile">
	<?php
		if (isset($updateUser)) {
			echo $updateUser;
		}
	?>
	<form action="" method="post">
	<?php
		$profileData=$usr->getUserData($userid);
		if ($profileData) {
			$result=$profileData->fetch_assoc();
	?>
		<table class="tbl">    
			 <tr>
			   <td>Name:</td>
			   <td><input type="text" name="name" id="name" value="<?php echo $result['name'];?>"></td>
			 </tr>
			 <tr>
			   <td>Username:</td>
			   <td><input type="text" name="username" id="username" value="<?php echo $result['username'];?>"></td>
			 </tr>
			 <tr>
			   <td>Phone:</td>
			   <td><input type="number" name="phone" id="phone" value="<?php echo $result['phone'];?>"></td>
			 </tr>
			 <tr>
			   <td>Email:</td>
			   <td><input type="email" name="email" id="email" value="<?php echo $result['email'];?>"></td>
			 </tr>
			  <tr>
			  <td></td>
			   <td><input type="submit" id="profileUpdate" value="Update">
			   </td>
			 </tr>
       </table>
   	<?php } ?>
	   </form>
</div>
</div>
<?php include 'inc/footer.php'; ?>