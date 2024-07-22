<?php
session_start();
include 'functions.php';

$dsn = "mysql:host=localhost;dbname=myfirstdb";
$dbusername = "druif";
$dbpassword = "98052001A!";

try {
    $pdo = new PDO($dsn, $dbusername, $dbpassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
$page = $_POST['page'] ?? $_GET['page'] ?? 'home';

useHeader();
useNavbar("My website");


switch ($page) {
    case 'home':
        showHome();
        break;
    case 'about':
        showAbout();
        break;
    case 'shop':
        showWebshop();
        break;
    case 'contact':
        $name = $_GET['name'] ?? '';
        $email = $_GET['email'] ?? '';
        $comment_msg = $_GET['comment_msg'] ?? '';
        $error = $_GET['error'] ?? '';
        showContactForm($name, $email, $comment_msg, $error);
        break;
    case 'login':
        generateLogin();
        break;
    case 'register':
        generateRegistration();
        break;
    case 'logout':
        logout();
        break;
    default:
        showHome();
        break;
}

useFooter();