<?php
function useHeader() {
    echo '<!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="css/stylesheet.css" />
        </head>
    <body>
    <div class="container">';
}

function useFooter() {
    echo '<footer>
        <p>&copy; 2024, Author: Iris Arts</p>
    </footer>
    </div>
    </body>
    </html>';
}

function useNavbar($title) {
    echo '<nav class="navbar">
            <h1>' . $title . '</h1>
        <ul>
            <li>' . generateNavForm('Home', 'home') . '</li>
            <li>' . generateNavForm('About', 'about') . '</li>
            <li>' . generateNavForm('Webshop', 'shop') . '</li>
            <li>' . generateNavForm('Contact', 'contact') . '</li>';
    if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
        echo '<li>' . generateNavForm('Login', 'login') . '</li>';
        echo '<li>' . generateNavForm('Register', 'register') . '</li>';
    } else {
        echo '<li>' . generateNavForm('Logout', 'logout') . '</li>';
    }
    echo '</ul>
          </nav>';
}

function generateNavForm($label, $page) {
    return '<a href="index.php?page=' . $page . '">' . $label . '</button></a>';
}


function showHome() {
    echo 'Hallo en welkom! Fijn dat je er bent. Op deze pagina vind je alles wat je nodig hebt om te beginnen. Voel je vrij om rond te kijken en ontdek alle geweldige functies die we te bieden hebben. Veel plezier!';
}

function showAbout() {
    echo '<h1>Welcome to the Race Club - The Premier Destination for Cycling Enthusiasts!</h1>
    <p>At the Race Club, we are driven by a passion for cycling. Whether you are a seasoned rider or just starting out on your first miles, we are here to elevate your cycling experience to the next level.</p>
    <h3>Our Mission:</h3>
    <p>We believe that cycling is not just a sport; it is a lifestyle. Our mission is simple: we want to help you transform every ride into an unforgettable adventure. We achieve this by offering top-quality bikes, accessories, and apparel, combined with expert advice and personalized service.</p>

    <h3>Why Choose Us?</h3>
    <ul>
    <li><b>Wide Selection:</b> From road bikes to mountain bikes, we offer a broad range of bicycles to suit every rider`s needs.<li/><li><b>Quality Products:</b> We stock only the best brands and products that we trust and use ourselves.<li/><li><b>Expert Advice:</b> Our knowledgeable staff are avid cyclists themselves and are always ready to provide advice and support.<li/><li><b>Community Focus:</b> We believe in building a strong cycling community and regularly host events, group rides, and workshops.<li/>
    </ul>';
}

function showWebshop() {
    if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
        echo '<p>You need to log in to access the webshop. Redirecting...</p>';
        header('Refresh: 2; URL=index.php?page=login'); 
        exit;
    }
    echo "<h1>Webshop</h1>";
    echo "<p>Welcome to our webshop.</p>";
}

function showContactForm($username = '', $email = '', $comment_msg = '', $error = '') {
    echo '<main>
    <h1>Contact</h1>';
    if ($error) {
        echo '<p style="color:red;">' . htmlspecialchars($error) . '</p>';
    }
    echo '<form action="includes/formhandler.php" method="POST">
    <label for="username">Naam: </label>
    <input required type="text" name="username" value="' . htmlspecialchars($username) . '"/><br>
    <label for="email">E-mail: </label>
    <input required type="email" name="email" value="' . htmlspecialchars($email) . '"/><br>
    <label for="comment_msg">Message: </label>
    <textarea required type="text" name="comment_msg" rows="8">' . htmlspecialchars($comment_msg) . '</textarea><br>
    <button type="submit">Submit</button>
    </form>
    </main>
    
    <div id="thankYouModal" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <p>Thank you for your submission!</p>
            </div>
          </div>
          
          ';
}


function generateLogin() {
    global $pdo;

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $email = $_POST['email'] ?? null;
        $pwd = $_POST['pwd'] ?? null;

        if ($email && $pwd) {
        global $pdo; 
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email AND pwd = :pwd");
        $stmt->execute(['email' => $email, 'pwd' => $pwd]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            $_SESSION['loggedin'] = true;
            $_SESSION['email'] = $email;
            header('Location: index.php?page=shop');
            exit;
        } else {
            echo '<p>Invalid credentials. Please try again.</p>';
        }
        } else {
            echo '<p>Email or password is missing.</p>';
        }
    }

    echo '<h1>Login</h1>';
    echo '<form action="index.php?page=login" method="POST">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required><br>
            <label for="pwd">Password:</label>
            <input type="password" id="pwd" name="pwd" required><br>
            <button type="submit">Login</button>
          </form>';
}

function generateRegistration() {
    global $pdo;

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = $_post['name'] ?? null;
        $email = $_post['email'] ?? null;
        $pwd = $_post['pwd'] ?? null;
        $pwdConfirm = $_post['pwdConfirm'] ?? null;

        $error = '';

        if (!$name || !$email || !$pwd || !$pwdConfirm) {
            $error = 'All fields are required!';
        } elseif ($pwd !== $pwdConfirm) {
            $error = 'Passwords do not match.';
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error = 'This needs to be an email.';
        } else {
            $stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email");
            $stmt->execute(['email' => $email]);
            if ($stmt->fetch(PDO::FETCH_ASSOC)) {
                $error = 'Email is already registered.';
            }
    }

    if (!$error) {
        $hashedPassword = password_hash($pwd, PASSWORD_BCRYPT);

        $stmt = $pdo->prepare("INSERT INTO users (name, email, pwd) VALUES (:name, :email, :pwd)");
            $stmt->execute(['name' => $name, 'email' => $email, 'password' => $hashedPassword]);
            echo '<p>Registration successful! You can now <a href="index.php?page=login">login</a>.</p>';
            return;
        } else {
            echo '<p style="color:red;">' . htmlspecialchars($error) . '</p>';
        }
    }

    echo '<h1>Register</h1>';
    echo '<form action="index.php?page=register" method="POST">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required><br>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required><br>
            <label for="pwd">Password:</label>
            <input type="password" id="pwd" name="pwd" required><br>
            <label for="pwdConfirm">Confirm Password:</label>
            <input type="password" id="pwdConfirm" name="pwdConfirm" required><br>
            <button type="submit">Register</button>
          </form>';
}

function logout() {
    session_destroy();
    header('Location: index.php');
    exit;
}