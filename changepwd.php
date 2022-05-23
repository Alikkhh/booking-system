<?php
	session_start();
?>
<html>
	<head>
		<title>
			Change Password
		</title>

		<link rel="stylesheet" type="text/css" href="css/style2.css"/>
		<link rel="stylesheet" href="font-awesome-4.7.0\css\font-awesome.min.css">
	</head>
	<body>
		<?php include_once('Database Connection file/mysqli_connect.php');
		if(isset($_POST['Submit'])){

			 $email = $_POST['email'];
			 $op = $_POST['op'];
			 $np = $_POST['np'];
			 $cp = $_POST['cp'];

			 $query = mysqli_query($dbc, "SELECT email, pwd from customer where email = '$email' AND pwd = '$op'");
			 $num = mysqli_fetch_array($query);

			 if($num>0){
			 	$con = mysqli_query($dbc, "UPDATE customer set pwd = '$np' where email = '$email'");
			 	$_SESSION['msg1'] = "Password Change Successfully";
			 }else{
			 	$_SESSION['msg2'] = "Password does not match";
			 }
		}
		?>
	
		<form name="chngpwd" action="" method="post">
     	<h2>Change Password</h2>

     	<label>Email</label>
     	<input type="text" 
     	       name="email" 
     	       placeholder="Email">
     	       <br>

     	<label>Old Password</label>
     	<input type="password" 
     	       name="op" 
     	       placeholder="Old Password">
     	       <br>

     	<label>New Password</label>
     	<input type="password" 
     	       name="np" 
     	       placeholder="New Password">
     	       <br>

     	<label>Confirm New Password</label>
     	<input type="password" 
     	       name="cp" 
     	       placeholder="Confirm New Password">
     	       <br>

     	<button type="submit" name="Submit">CHANGE</button>
          <a href="login_page.php" class="ca">Back to the login page</a>
          <a href="customer_homepage.php" class="ca">Back to the customer page</a>
     </form>
	
	</body>
</html>