<!-- <?php
// include 'functions.php';

// $inlogFormulier = [
//     'title'        => 'Login',
//     'page'         => 'login',
//     'fields'       => [
//         'l_email' => [
//             'label'       => 'Your e-mail',
//             'type'        => 'email',
//             'autocomplete'=> 'email'
//         ],
//         'l_pass' => [
//             'label'       => 'Your password',
//             'type'        => 'password',
//             'autocomplete'=> 'current-password'
//         ]
//     ],
//     'submittxt'    => 'Signin'
// ];    

// $title = $inlogFormulier['title'];
// useHeader($title);

// if (isset($_GET['error'])) {
//     $error = htmlspecialchars($_GET['error']);
//     $errorMessages = [
//         'empty_fields' => 'Please fill in all fields.',
//         'invalid_credentials' => 'Invalid login credentials. Please try again.',
//         'server_error' => 'An error occurred. Please try again later.'
//     ];

//     if (array_key_exists($error, $errorMessages)) {
//         echo "<p>" . $errorMessages[$error] . "</p>";
//     }
// }

// if (isset($_GET['success']) && $_GET['success'] == 1) {
//     echo "<p>Success! You have logged in.</p>";
// }
// ?>

<h1><?php echo htmlspecialchars($inlogFormulier['title']); ?></h1>
<form action="includes/formhandlerLogin.php" method="post">
    <?php foreach ($inlogFormulier['fields'] as $name => $field): ?>
        <label for="<?php echo htmlspecialchars($name); ?>"><?php echo htmlspecialchars($field['label']); ?>:</label>
        <input required type="<?php echo htmlspecialchars($field['type']); ?>" name="<?php echo htmlspecialchars($name); ?>" id="<?php echo htmlspecialchars($name); ?>" autocomplete="<?php echo htmlspecialchars($field['autocomplete']); ?>" /><br>
    <?php endforeach; ?>
    <button type="submit"><?php echo htmlspecialchars($inlogFormulier['submittxt']); ?></button>
</form> -->

<!-- <?php useFooter(); ?> -->