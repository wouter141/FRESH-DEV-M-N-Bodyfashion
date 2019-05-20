<?php
    include_once('./components/dbconn.php');
    session_start();

    $username = $_SESSION["username"];

    $sql = "DELETE FROM active WHERE username = '$username'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    session_destroy();
    header("Location: index.php");

?>
