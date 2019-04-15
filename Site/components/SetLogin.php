<?php session_start(); ?>
<?php include_once('dbconn.php');

$headLink = "Location: /ivar-wouter/index.php";
$loginError = "Email of wachtwoord is incorrect.";

if(isset($_POST["submit"])){
    if ( (isset($_POST['email'])) && (isset($_POST['password'])) ) {

        $email = htmlspecialchars($_POST["email"]);
        $password = htmlspecialchars($_POST["password"]);

        $sql = "SELECT * FROM user WHERE mail = :email";
        $statement = $conn->prepare($sql);
        $statement->execute(array(":email" => $email));
        $user = $statement->fetch(PDO::FETCH_ASSOC);


     	if($user["mail"] == $email){

    	    if($password == $user["password"]){
    	    	//nu inloggen
            session_start();
    	    	$_SESSION['logged_in'] = true;
    	    	$_SESSION['is_admin'] = $user["admin"];
    	    	$_SESSION['email'] = $user["email"];
    	    	exit(header($headLink));
    	    }
    	    //Als wachtwoord verkeerd is
    	    else{
    	       echo "<script type='text/javascript'>alert('$loginError WW');</script>";
    	    }

        }
        //Als email niet bestaat
        else {
            echo "<script type='text/javascript'>alert('$loginError MAIL');</script>";
        }
    }

}
?>
