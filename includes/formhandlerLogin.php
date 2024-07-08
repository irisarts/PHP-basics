<?php
session_start(); // Start the session

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = htmlspecialchars(trim($_POST["email"]));
    $pwd = htmlspecialchars(trim($_POST["pwd"]));

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

        $query = "SELECT * FROM users WHERE email = ?";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        if ($user) {
            if (password_verify($pwd, $user['pwd'])) {
                $_SESSION['name'] = $user['username'];
                $_SESSION['email'] = $user['email'];
                header('Location: ../../home.php');
                exit();
            } else {
                header('Location: ../login.php?error=invalid_credentials');
                exit();
            }
        } else {
            header('Location: ../login.php?error=invalid_credentials');
            exit();
        }

    } catch (PDOException $e) {
        error_log("Query failed: " . $e->getMessage());
        header('Location: ../login.php?error=server_error');
        exit();
    } catch (Exception $e) {
        error_log("Error: " . $e->getMessage());
        header('Location: ../login.php?error=server_error');
        exit();
    }
} else {
    header("Location: ../login.php");
    exit();
}
?>

