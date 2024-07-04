<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = htmlspecialchars($_POST["username"]);
    $password = htmlspecialchars($_POST["password"]);


if (empty($email) || empty($password)) {
    header("Location: ../login.php?error=empty_fields");
    exit();
}

$file = fopen('../users/users.txt', 'r');
    $found = false;
    while ($line = fgets($file)) {
        list($name, $userEmail, $userPassword) = explode(',', trim($line));
        if ($email == $userEmail && $password == $userPassword) {
            $_SESSION['name'] = $name;
            fclose($file);
            header('Location: ../index.php');
            exit();
        }
    }
    fclose($file);

    header('Location: ../login.php?error=invalid_credentials');
    exit();
} else {
    header("Location: ../login.php");
    exit();
}
?>