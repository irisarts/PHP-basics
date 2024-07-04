<?php 

include 'functions.php';

         $registratieFormulier = [
             'title'        => 'Registratie',
             'page'      => 'register',
             'fields'    => [
                 'r_name' => [
                     'label'    => 'Uw naam',
                     'type'    => 'text'
                 ],
                 'r_email' => [
                     'label'    => 'Uw emailadres',
                     'type'    => 'email'
                 ],
                 'r_pass' => [
                     'label'    => 'Uw wachtwoord',
                     'type'    => 'password'
                 ],
                 'r_pass_repeat' => [
                     'label'    => 'Herhaal uw wachtwoord',
                     'type'    => 'password'
                 ]
             ],
             'submittxt' => 'Registreer'
         ];   

         $title = $registratieFormulier['title'];
useHeader($title);

if (isset($_GET['error'])) {
    $error = $_GET['error'];
    if ($error == 'email_exists') {
        echo "<p>Email is al in gebruik.</p>";
    } elseif ($error == 'password_mismatch') {
        echo "<p>Wachtwoorden komen niet overeen.</p>";
    }
}

if (isset($_GET['success']) && $_GET['success'] == 1) {
    echo "<h3>Registratie geslaagd! U kunt nu klikken om in te <a href='login.php'><u><font color='blue'>inloggen</font></u></a>.</h3>";
}
?>

<h1><?php echo htmlspecialchars($registratieFormulier['title']); ?></h1>
<form action="includes/formhandlerRegister.php" method="POST">
<?php foreach ($registratieFormulier['fields'] as $name => $field): ?>
        <label for="<?php echo htmlspecialchars($name); ?>"><?php echo htmlspecialchars($field['label']); ?>:</label>
        <input required type="<?php echo htmlspecialchars($field['type']); ?>" name="<?php echo htmlspecialchars($name); ?> id="<?php echo htmlspecialchars($name); ?>" /><br>
    <?php endforeach; ?>
    <button type="submit"><?php echo htmlspecialchars($registratieFormulier['submittxt']); ?></button>
</form>

<?php
useFooter();
?>