<nav>
    <label for="toggle">&#9776;</label>
    <input type="checkbox" id="toggle">
    <ul class="List-Nav">
      <a href="./index.php" class="Ancher-Tag"><li class="list-Navigatie">Home</li></a>
      <a href="./OverOns.php" class="Ancher-Tag"><li class="list-Navigatie">Over Ons</li></a>
      <a href="./Merken.php" class="Ancher-Tag"><li class="list-Navigatie">Merken</li></a>
      <a href="./Spaarsysteem.php" class="Ancher-Tag"><li class="list-Navigatie">Spaarsysteem</li></a>
      <a href="./Acties.php" class="Ancher-Tag"><li class="list-Navigatie">Acties</li></a>
      <a href="./Contact.php" class="Ancher-Tag"><li class="list-Navigatie">Contact</li></a>
      <a href="https://m-en-n.lingerie-styling.nl/" class="Ancher-Tag" target="_blank"><li class="list-Navigatie">Webshop</li></a>
      <?php
        $end = session_destroy();
        if($_SESSION['is_admin']) {
          echo"<a href='' class='Ancher-Tag login_logout'><li class='list-Navigatie'.".$end.".>Logout</li></a>";
        }
        else {
          echo"<a href='./login.php' class='Ancher-Tag login_logout'><li class='list-Navigatie'>Login</li></a>";
        }
      ?>
    </ul>
</nav>
