<?php
$dsn = "mysql:host=localhost;dbname=myfirstdb";
$dbusername = "druif";
$dbpassword = "98052001A!";

try {
    $pdo = new PDO($dsn, $dbusername, $dbpassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

 $username = htmlspecialchars($_POST["username"]);
 $email = htmlspecialchars($_POST["email"]);
 $comment_msg = htmlspecialchars($_POST["comment_msg"]);
 
 if (empty($username) || empty($email) || empty($comment_msg)) {
    $error = "All fields are required.";
    header("Location: ../index.php?page=contact");
    exit();
}

try {
    $stmt = $pdo->prepare("INSERT INTO comments (username, email, comment_msg) VALUES (:username, :email, :comment_msg)");
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':comment_msg', $comment_msg);
    $stmt->execute();
    
    echo "The data is submitted correctly!";
    header("Location: ../index.php?page=contact#thankYouModal");
    exit();
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}} else {
    header("Location: ../index.php"); 
}