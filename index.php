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

useHeader();
useNavbar("My website");


// switch () {
//     case "Home":
//         showHome();
//       break;
//     case "About":
//         showAbout();      
//       break;
//     case label3:
//       //code block
//       break;
//     default:
//     showHome();
//     break;
//   }

showHome();
showAbout();
showContactForm();
useFooter();




?>