<?php

// var_dump($_SERVER["REQUEST_METHOD"]);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

 $naam = htmlspecialchars($_POST["naam"]);
 $email = htmlspecialchars($_POST["email"]);
 $bericht = htmlspecialchars($_POST["bericht"]);
 
if (empty($naam)) {
    exit();
    header("Location: ../home.php");
}

 echo "These are the data that the user submitted: ";
 echo "<br>";
 echo $naam;
 echo "<br>";
 echo $email;
 echo "<br>";
 echo $bericht;


 //sends user back to the home page
 header("Location: ../home.php");
} else {
    header("Location: ../home.php"); 
}