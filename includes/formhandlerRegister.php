<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];
    $repeatPwd = $_POST['repeatPwd'];

    if ($pwd !== $repeatPwd) {
        header("Location:../registration.php?error=password_mismatch");
        exit();
    }

    try {
        require_once "dbh.inc.php";

        $query = "INSERT INTO users (name, email, pwd) VALUES (:name, :email, :pwd);";

        $stmt = $pdo->prepare($query);

        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":pwd", $pwd);

        $stmt->execute();

        $pdo = null;
        $stmt = null;

        header("Location:../home.php");
        die();
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());

    }


} else {
    header("Location:../index.php");
    die();
}

