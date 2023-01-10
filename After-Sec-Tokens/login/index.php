<!DOCTYPE html>
<html lang="en">

<head>
	<title>SignIn</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico" />
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<!--===============================================================================================-->
</head>

<body>
	<?php
	include '../_includes/_db.php';
	include '../framework.php';


	session_start();
	$PT = hash('md5', 'login');
	$IPT = hash('md5', get_client_ip());
	$BDT = hash('md5', getBrowser());
	if (isset($_POST['signin'])) {
		$email = $_POST['email'];
		$password = $_POST['password'];
		$select_user_query = "SELECT * FROM users WHERE usermail= '$email';";
		$select_user_result = mysqli_query($connection, $select_user_query);
		while ($row = mysqli_fetch_assoc($select_user_result)) {
			$db_id = $row['userid'];
			$db_mail = $row['usermail'];
			$db_password = $row['password'];
			$db_role = $row['role'];
			$URT = hash('md5', $db_role);
		}
		if ($email !== $db_mail || $password !== $db_password) {
			header('location: index.php');
		} else if ($email == $db_mail && $password == $db_password) {
			if ($db_role == 'admin') {
				header('location: ../posseidon/index.php');
				$_SESSION['userid'] = $db_id;
				$_SESSION['PT'] = $PT;
				$_SESSION['IPT'] = $IPT;
				$_SESSION['BDT'] = $BDT;
				$_SESSION['URT'] = $URT;
			} else {
				header('location: ../index.php');
				$_SESSION['userid'] = $db_id;
				
				$_SESSION['PT'] = $PT;
				$_SESSION['IPT'] = $IPT;
				$_SESSION['BDT'] = $BDT;
				$_SESSION['URT'] = $URT;
			}
		} else {
			echo "Incorrect Password";
		}
	}
	?>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-t-50 p-b-90">
				<form class="login100-form validate-form flex-sb flex-w" action="index.php" method="post">
					<span class="login100-form-title p-b-51">
						Dashboard
					</span>
					<?php 
					// echo getBrowser();
					?>
					
					<div class="wrap-input100 validate-input m-b-16" data-validate="Username is required">
						<input class="input100" type="email" name="email" placeholder="Mail Id">
						<span class="focus-input100"></span>
					</div>


					<div class="wrap-input100 validate-input m-b-16" data-validate="Password is required">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100"></span>
					</div>


					<div class="container-login100-form-btn m-t-17">
						<button class="login100-form-btn" name="signin" type="submit">
							SignIn
						</button>
					</div>

				</form>
			</div>
		</div>
	</div>


	<div id="dropDownSelect1"></div>

	<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
	<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>

</html>