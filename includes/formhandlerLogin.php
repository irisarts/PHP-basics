<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = filter_var(trim($_POST["l_email"]), FILTER_SANITIZE_EMAIL);
    $pwd = htmlspecialchars(trim($_POST["l_pass"]));

    echo "Email: " . $email . "<br>";
    echo "Password: " . $pwd . "<br>";

    if (empty($email) || empty($pwd)) {
        header("Location: ../login.php?error=empty_fields");
        exit();
    }

    try {
        require_once "dbh.inc.php";

        if (!isset($pdo)) {
            throw new Exception("Database connection not established.");
        }

        echo "Database connection established.<br>";

        $query = "SELECT * FROM users WHERE email = ?";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        if ($user) {
            echo "User found: " . print_r($user, true) . "<br>";
        } else {
            echo "User not found.<br>";
            header('Location: ../login.php?error=invalid_credentials');
            exit();
        }
        if ($pwd) {
            echo "Password verification successful.<br>";
            header('Location: ../home.php');
            exit();
        } else {
            echo "Password verification failed.<br>";
            header('Location: ../login.php?error=invalid_credentials');
            exit();
        }

    } catch (PDOException $e) {
        error_log("Database query failed: " . $e->getMessage());
        echo "Database query failed: " . $e->getMessage();
        header('Location: ../login.php?error=server_error');
        exit();
    } catch (Exception $e) {
        error_log("General error: " . $e->getMessage());
        echo "General error: " . $e->getMessage();
        header('Location: ../login.php?error=server_error');
        exit();
    }
} else {
    header("Location: ../login.php");
    exit();
}
