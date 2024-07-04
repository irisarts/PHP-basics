<?php
include 'functions.php';

$title = "Inloggen";
useHeader($title);

if (isset($_GET['error'])) {
    $error = $_GET['error'];
    if ($error == 'empty_fields') {
        echo "<p>Vul alstublieft alle velden in.</p>";
    } elseif ($error == 'invalid_credentials') {
        echo "<p>Ongeldige inloggegevens. Probeer het opnieuw.</p>";
    }
}

?>

<h1>Inloggen</h1>

<form action="includes/formhandlerLogin.php" method="POST">
    <label for="email">Email: </label>
    <input required type="email" name="email" id="email" /><br>
    <label for="password">Wachtwoord: </label>
    <input required type="password" name="password" id="password" autocomplete="current-password"/><br>
    <button type="submit">Inloggen</button>
</form>

<?php useFooter(); ?>