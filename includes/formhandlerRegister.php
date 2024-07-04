<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['r_name'];
    $email = $_POST['r_email'];
    $password = $_POST['r_pass'];
    $repeatPassword = $_POST['r_pass_repeat'];

    $file = fopen('../users/users.txt', 'r');
    $exists = false;
    while ($line = fgets($file)) {
        list(, $userEmail, ) = explode(',', trim($line));
        if ($email == $userEmail) {
            $exists = true;
            break;
        }
    }
    fclose($file);

    if ($exists) {
        header('Location: ../registration.php?error=email_exists');
    } elseif ($password != $repeatPassword) {
        header('Location: ../registration.php?error=password_mismatch');
    } else {
        $file = fopen('../users/users.txt', 'a');
        fwrite($file, "$name,$email,$password\n");
        fclose($file);
        header('Location: ../registration.php?success=1');
    }
}
?>