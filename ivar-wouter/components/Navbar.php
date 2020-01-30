<nav>
    <label for="toggle">&#9776;</label>
    <input type="checkbox" id="toggle">
    <ul class="List-Nav">
      <li class="list-Navigatie"><a href="./index" class="Ancher-Tag">Home</a></li>
      <li class="list-Navigatie"><a href="./OverOns" class="Ancher-Tag">Over Ons</a></li>
      <li class="list-Navigatie"><a href="./Merken" class="Ancher-Tag">Merken</a></li>
      <li class="list-Navigatie"><a href="./Spaarsysteem" class="Ancher-Tag">Spaarsysteem</a></li>
      <li class="list-Navigatie"><a href="./Acties" class="Ancher-Tag">Acties</a></li>
      <li class="list-Navigatie"><a href="./Contact" class="Ancher-Tag">Contact</a></li>
      <li class="list-Navigatie"><a href="https://m-en-n.lingerie-styling.nl/" class="Ancher-Tag" target="_blank">Webshop</a></li>
        <?php
        if($_SESSION['is_admin'] == 1) {
            echo"<li class='list-Navigatie login_logout'><a href='./logout' class='Ancher-Tag'>Logout</a></li>";
            echo"<li class='list-Navigatie dash_knop'><a href='./dashboard' class='Ancher-Tag'>Dashboard</a></li>";
        }
        else if ($_SESSION['is_admin'] == 0) {
            echo"<li class='list-Navigatie login_logout'><a href='./login' class='Ancher-Tag'>Login</a></li>";
        }
        ?>
    </ul>
</nav>
