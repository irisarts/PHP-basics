<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {

 $naam = htmlspecialchars($_POST["naam"]);
 $email = htmlspecialchars($_POST["email"]);
 $bericht = htmlspecialchars($_POST["bericht"]);
 
if (empty($naam)) {
    exit();
    header("Location: ../index.php");
}

 echo "These are the data that the user submitted: ";
 echo "<br>";
 echo $naam;
 echo "<br>";
 echo $email;
 echo "<br>";
 echo $bericht;


 header("Location: ../index.php");
} else {
    header("Location: ../index.php"); 
}