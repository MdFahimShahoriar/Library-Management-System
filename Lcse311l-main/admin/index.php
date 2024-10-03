<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>LMS | Login</title>
<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="https://cdn.usebootstrap.com/bootstrap/latest/css/bootstrap.min.css">
	<script type="text/javascript" src="https://cdn.usebootstrap.com/bootstrap/latest/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="https://cdn.usebootstrap.com/bootstrap/latest/js/bootstrap.bundle.min.js"></script>
</head>
<style type="text/css">
		#side_bar{
			background-color: blanchedalmond;
			padding: 50px;
			width: 300px;
			height: 300px;
		}
		#main_content{
			background-color: lightskyblue;
			padding: 50px;
			width: 600px;
			height: 600px;
		}
</style>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="index.php">Library_Management_System</a>
			</div>
	
		    <ul class="nav navbar-nav navbar-right">
		      <li class="nav-item">
		        <a class="nav-link" href="index.php">Admin Login</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="../signup.php"></span>Register</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="../index.php">Login</a>
		      </li>
		    </ul>
		</div>
	</nav><br>
		<span><marquee>(For Source Code Mail Here: fahimshahoriar66@gmail.com)</marquee></span><br><br>
	<div class="row">
		<div class="col-md-4" id="side_bar">
		<h5>Contributors:</h5>
		<ul>
			<li>Md Fahim Shahoriar-1812497042</li>
			<li>Sayma Islam-1912673042</li>
			<li>Afifa Zain Apurba-1912310642</li>
		</ul>
	</div>
		<div class="col-md-8" id="main_content">
			<center><h3><u>Admin Login Form</u></h3></center>
			<form action="" method="post">
				<div class="form-group">
					<label for="email">Email ID:</label>
					<input type="text" name="email" class="form-control" required>
				</div>
				<div class="form-group">
					<label for="password">Password:</label>
					<input type="password" name="password" class="form-control" required>
				</div>
				<button type="submit" name="login" class="btn btn-primary">Login</button>	
			</form>
			<?php 
				if(isset($_POST['login'])){
					$connection = mysqli_connect("localhost","root","");
					$db = mysqli_select_db($connection,"libms");
					$query = "select * from admins where email = '$_POST[email]'";
					$query_run = mysqli_query($connection,$query);
					while ($row = mysqli_fetch_assoc($query_run)) {
						if($row['email'] == $_POST['email']){
							if($row['password'] == $_POST['password']){
								$_SESSION['name'] =  $row['name'];
								$_SESSION['email'] =  $row['email'];
								header("Location: admin_dashboard.php");
							}
							else{
								?>
								<br><br><center><span class="alert-danger">Wrong Password !!</span></center>
								<?php
							}
						}
					}
				}
			?>
		</div>
	</div>
</body>
</html>
