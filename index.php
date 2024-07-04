<?php
include 'functions.php';

$title = "Home";
useHeader($title);
?>

<h1>Welkom</h1>

<nav>
    <ul>
        <li><a href="index.php">Home</a></li>
        <?php if (isset($_SESSION['name'])): ?>
            <li><a href="logout.php">Logout [<?php echo $_SESSION['name']; ?>]</a></li>
        <?php else: ?>
            <li><a href="login.php">Inloggen</a></li>
            <li><a href="registration.php">Registreren</a></li>
        <?php endif; ?>
    </ul>
</nav>

<?php useFooter(); ?>