<?php include 'inc/header.php'; ?>
<div class="main">
<h1>Online Exam System - User Registration</h1>
	<div class="segment" style="margin-right:30px;">
		<img src="img/regi.png"/>
	</div>
	<div class="segment">
    <form action="" method="POST">
  		<table>
  		  <tr>
          <td>Name:</td>
          <td><input type="text" name="name" id="name"></td>
        </tr>
  		  <tr>
          <td>Username:</td>
          <td><input type="text" name="name"  id="username"></td>
        </tr>
        <tr>
          <td>Phone:</td>
          <td><input type="number" name="phone"  id="phone"></td>
        </tr>
        <tr>
          <td>E-mail:</td>
          <td><input type="email"  name="email" id="email"></td>
        </tr>
        <tr>
          <td>Password:</td>
          <td><input type="password" name="password" id="password"></td>
        </tr>   
        <tr>
          <td></td>
          <td><input type="submit" id="regSubmit" value="Signup">
          </td>
        </tr>
      </table>
  	</form>
  	   <p>Already Registered ? <a href="index.php">Login</a> Here</p>
       <span id="msg"></span>
	</div>

</div>
<?php include 'inc/footer.php'; ?>