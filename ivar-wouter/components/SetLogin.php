<?php session_start(); ?>
<?php include_once('dbconn.php');
include_once('googleauth/GoogleAuthenticator.php');


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$headLink = "Location: /ivar-wouter/dashboard";
$headLinkFalse = "Location: /ivar-wouter/login";
$loginError = "Email of wachtwoord is incorrect.";

if(isset($_POST["submit"])) {
	if ((isset($_POST['email'])) && (isset($_POST['password']))) {

		$email = htmlspecialchars($_POST["email"]);
		$password = htmlspecialchars($_POST["password"]);

		$password = md5($password);
		$ipaddress = $_SERVER["HTTP_X_REAL_IP"];
		$timestamp = $_SERVER["REQUEST_TIME"];
		$timestamp1 = date('d-m-Y H:i', $timestamp);
		$browser = $_SERVER['HTTP_USER_AGENT'] . "\n\n";

		$sql = "SELECT * FROM user WHERE mail = '$email' AND password = '$password'";
		$stmt = $conn->prepare($sql);
		$stmt->execute();
		$user = $stmt->fetch(PDO::FETCH_ASSOC);


//Google authentication

		$secret_key = array();
		$google_token = array();

		$googlesql = "SELECT google_ukey FROM user WHERE mail = '$email'";
		foreach ($conn->query($googlesql, PDO::FETCH_ASSOC) as $row) {
			$google_token = $row['google_ukey'];
			$secret_key = $_POST['google_code'];
		}

		$secret = $google_token;
		$time = floor(time() / 30);
		$code = $secret_key;

		$g = new GoogleAuthenticator();

			if ($user["mail"] == $email || $user["password"] == $password) {
				if ($g->checkCode($secret, $code)) {
//nu inloggen
				$_SESSION['logged_in'] = true;
				$_SESSION['is_admin'] = $user["admin"];
				$_SESSION['mail'] = $user["mail"];


				$usermail = $_POST['email'];

//Zet het in log
				$sql1 = "INSERT INTO log (id, ip, timestamp, browser, mail)
                         VALUES ('', '$ipaddress' ,'$timestamp1' ,'$browser', '$usermail')";
				$statement1 = $conn->prepare($sql1);
				$statement1->execute();
//Controleer username aan Admin
				$sql = "SELECT username, admin FROM user";
				$statement2 = $conn->prepare($sql);
				$statement2->execute();
				foreach ($conn->query($sql, PDO::FETCH_ASSOC) as $row) {
					$adminUser = $row['admin'];
					$usernameUser = $row['username'];
				}

//Activeer user
				$_SESSION['username'] = $user["username"];
				$_SESSION['admin'] = $user["admin"];
				$username = $_SESSION['username'];
				$admin = $_SESSION['admin'];
				$sql = "INSERT INTO active (username, admin)
                         VALUES ('$username', '$admin')";
				$statement = $conn->prepare($sql);
				$statement->execute();
				exit(header($headLink));
			} else {
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


				exit (header("location: /ivar-wouter/login?action=googlefail"));
			}
		} else {
				exit (header("location: /ivar-wouter/login?action=failed"));

			}
	}
}

?>
