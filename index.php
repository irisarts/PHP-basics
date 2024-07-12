<?php
session_start();
include 'functions.php';

$dsn = "mysql:host=localhost;dbname=myfirstdb";
$dbusername = "druif";
$dbpassword = "98052001A!";

try {
    $pdo = new PDO($dsn, $dbusername, $dbpassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (\PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
$page = isset($_GET['page']) ? $_GET['page'] : 'home';

useHeader();
useNavbar("My website");


switch ($page) {
    case "home":
        showHome();
      break;
    case "about":
        showAbout();      
      break;
    case "shop":
        showWebshop();
      break;
      case "contact":
        showContactForm();
        break;
    default:
        showHome();
        break;
  }

useFooter();




?>