<?php
function useHeader()
{
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

function useFooter()
{
    echo '<footer>
        <p>&copy; 2024, Author: Iris Arts</p>
    </footer>
    </div>
    </body>
    </html>';
}

function useNavbar($title)
{
    echo '<nav class="navbar">
            <h1>' . $title . '</h1>
        <ul>
            <li><a href="index.php?page=home">Home</a></li>
            <li><a href="index.php?page=about">About</a></li>
            <li><a href="index.php?page=shop">Webshop</a></li>
            <li><a href="index.php?page=contact">Contact</a></li>
        </ul>
    </nav>';
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

}

function showContactForm() {
    echo '<main>
    <h1>Contact</h1>
    <form action="includes/formhandler.php" method="POST">
    <label for="naam">Naam: </label>
    <input required type="text" name="naam" /><br>
    <label for="email">E-mail: </label>
    <input required type="email" name="email" /><br>
    <label for="bericht">Bericht: </label>
    <textarea required type="text" name="bericht" rows="8"></textarea><br>
    <button type="submit">Submit</button>
    </form>
    </main>';
}

function showFields(array $fields)
 {
     foreach ($fields as $fieldname => $fieldinfo)
     {
         echo '<label for="'.$fieldname.'">'
             .$fieldinfo['label']
             .'</label>'
             .PHP_EOL;
         switch ($fieldinfo['type'])
         {
             case 'textarea':
                 echo '<textarea name="'.$fieldname.'"></textarea>'.PHP_EOL;
                 break;
             default:
                 echo '<input' 
                     .' name="'.$fieldname.'"' 
                     .' type="'.$fieldinfo['type'].'"'
                     .' />'
                     .PHP_EOL;        
         }        
     }    
 }
 
function generateLogin () {
    echo '<div class="modal-content">
    <span class="close">&times;</span>
    <form action="includes/formhandlerLogin.php" method="post">';
    if (isset($_GET['error'])) {
        $_GET['error'];
     }
    echo '<label for="email">Email Address</label>
        <input type="email" id="email" name="email" required>
        <label for="password">Password</label>
        <input type="password" name="password" placeholder="Password"><br> 
      <button type="submit">Login</button>
    </form>
  </div>';    
}

function generateRegistration() {

}
