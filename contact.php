<!DOCTYPE html>
<html>
  <body>
    <main>
  <link rel="stylesheet" href="stylesheet.css" />

  <ul class="menu">
        <li><a href="home.php">Home</a></li>
        <li><a href="about.php">About</a></li>
        <li><a href="contact.php">Contact</a></li>
      </ul>

  <title>CONTACT</title>

  <h1>CONTACT</h1>

  <form action="../formhandler.php" method="POST">
    <label for="naam">Naam: </label>
    <input type="text" name="naam" /><br>

    <label for="email">E-mail: </label>
    <input type="email" name="email" /><br>

    <label for="bericht">Bericht: </label>
    <textarea type="text" name="bericht" rows="8"></textarea><br>

    <button type="submit">Submit</button>
  </form>

  <footer>
    <p>&copy; 2024, Author: Iris Arts</p>
  </footer>
</main>
</body>
</html>
