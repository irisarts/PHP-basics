<?php
include 'functions.php';

$title = "CONTACT";

useHeader($title);
useNavbar();

echo '<main>';
echo '<h1>Contact</h1>';

echo '<form action="includes/formhandler.php" method="POST">';
echo '    <label for="naam">Naam: </label>';
echo '    <input required type="text" name="naam" /><br>';

echo '    <label for="email">E-mail: </label>';
echo '    <input required type="email" name="email" /><br>';

echo '    <label for="bericht">Bericht: </label>';
echo '    <textarea required type="text" name="bericht" rows="8"></textarea><br>';

echo '    <button type="submit">Submit</button>';
echo '</form>';

echo '</main>';

useFooter();
?>
