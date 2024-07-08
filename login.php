<?php
include 'functions.php';

$inlogFormulier = [
    'title'        => 'Signup',
    'page'      => 'login',
    'fields'    => [
        'l_email' => [
            'label'    => 'Your e-mail',
            'type'    => 'email'
        ],
        'l_pass' => [
            'label'    => 'Your password',
            'type'    => 'password'
        ]
    ],
    'submittxt' => 'Signin'
];    


$title = $inlogFormulier['title'];
useHeader($title);

if (isset($_GET['error'])) {
    $error = $_GET['error'];
    if ($error == 'empty_fields') {
        echo "<p>Vul alstublieft alle velden in.</p>";
    } elseif ($error == 'invalid_credentials') {
        echo "<p>Ongeldige inloggegevens. Probeer het opnieuw.</p>";
    }
}
if (isset($_GET['success']) && $_GET['success'] == 1) {
    echo "<p>Success! You have logged in.</p>";
}
?>


<h1><?php echo htmlspecialchars($inlogFormulier['title']); ?></h1>
<form action="includes/formhandlerLogin.php" method="post">
    <?php foreach ($inlogFormulier['fields'] as $name => $field): ?>
        <label for="<?php echo htmlspecialchars($name); ?>"><?php echo htmlspecialchars($field['label']); ?>:</label>
        <input required type="<?php echo htmlspecialchars($field['type']); ?>" name="<?php echo htmlspecialchars($name); ?>" id="<?php echo htmlspecialchars($name); ?>" /><br>
    <?php endforeach; ?>
    <button type="submit"><?php echo htmlspecialchars($inlogFormulier['submittxt']); ?></button>
</form>

<?php useFooter(); ?>



<!-- 
<h1>Inloggen</h1>

<form action="includes/formhandlerLogin.php" method="GET">
    <input type="email" name="email" placeholder="email" autocomplete="email"><br>
    <input type="password" name="password" placeholder="password" autocomplete="off">
<br>
    <button type="submit">Inloggen</button>
</form> -->