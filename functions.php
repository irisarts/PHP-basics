<?php
function useHeader($title) {
    echo '<!DOCTYPE html>';
    echo '<html lang="en">';
    echo '<head>';
    echo '<meta charset="UTF-8">';
    echo '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
    echo '<link rel="stylesheet" href="css/stylesheet.css" />';
    echo '<title>' . $title . '</title>';
    echo '</head>';
    echo '<body>';
    echo '<div class="container">';
}

function useFooter() {
    echo '<footer>';
    echo '<p>&copy; 2024, Author: Iris Arts</p>';
    echo '</footer>';
    echo '</div>';
    echo '</body>';
    echo '</html>';
}

function useNavbar() {
    echo '<nav>';
    echo '    <ul>';
    echo '        <li><a href="home.php">Home</a></li>';
    echo '        <li><a href="about.php">About</a></li>';
    echo '        <li><a href="contact.php">Contact</a></li>';
    echo '    </ul>';
    echo '</nav>';
}

function makeContent($title, $content) {
    echo '<h1>' . $title . '</h1>';
    echo '<p>' . $content . '</p>';
}
?>