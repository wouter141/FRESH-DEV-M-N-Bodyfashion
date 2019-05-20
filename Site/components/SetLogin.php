<?php session_start(); ?>
<?php include_once('dbconn.php');


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$headLink = "Location: /ivar-wouter/dashboard.php";
$headLinkFalse = "Location: /ivar-wouter/login.php";
$loginError = "Email of wachtwoord is incorrect.";

if(isset($_POST["submit"])){
    if ((isset($_POST['email'])) && (isset($_POST['password'])) ) {

		$email = htmlspecialchars($_POST["email"]);
		$password = htmlspecialchars($_POST["password"]);

		$password = md5($password);

		$sql = "SELECT * FROM user WHERE mail = '$email' AND password = '$password'";
		$stmt = $conn->prepare($sql);
		$stmt->execute();
		$user = $stmt->fetch(PDO::FETCH_ASSOC);


		if ($user["mail"] == $email || $user["password"] == $password) {
//nu inloggen
			$_SESSION['logged_in'] = true;
			$_SESSION['is_admin'] = $user["admin"];
			$_SESSION['mail'] = $user["mail"];

			$ipaddress = $_SERVER["HTTP_X_REAL_IP"];
			$timestamp = $_SERVER["REQUEST_TIME"];
			$timestamp1 = date('d-m-Y H:i', $timestamp);
			$browser = $_SERVER['HTTP_USER_AGENT'] . "\n\n";
			$usermail = $_POST['email'];

//Zet het in log
			$sql1 = "INSERT INTO log (id, ip, timestamp, browser, mail)
                         VALUES ('', '$ipaddress' ,'$timestamp1' ,'$browser', '$usermail')";
			$statement1 = $conn->prepare($sql1);
			$statement1->execute();

//Activeer user
			$_SESSION['username'] = $user["username"];
			$username = $_SESSION['username'];
			$sql = "INSERT INTO active (username)
                         VALUES ('$username')";
			$statement = $conn->prepare($sql);
			$statement->execute();
			exit(header($headLink));
		}
		else {
//gefaalde login
			$_SESSION['logged_in'] = true;
			$_SESSION['is_admin'] = $user["admin"];
			$_SESSION['mail'] = $user["mail"];
			$_SESSION['username'] = $user["username"];

			$ipaddress = $_SERVER["HTTP_X_REAL_IP"];
			$timestamp = $_SERVER["REQUEST_TIME"];
			$timestamp1 = date('d-m-Y H:i', $timestamp);
			$browser = $_SERVER['HTTP_USER_AGENT'] . "\n\n";
			$usermail = $_POST['email'];


			$sql1 = "INSERT INTO log (id, ip, timestamp, browser, mail, failed_login)
                         VALUES ('', '$ipaddress' ,'$timestamp1' ,'$browser', '$usermail', 'Ja')";
			$statement1 = $conn->prepare($sql1);
			$statement1->execute();

			exit (header("location: /ivar-wouter/login.php?action=failed"));


		}
	}
}


?>
