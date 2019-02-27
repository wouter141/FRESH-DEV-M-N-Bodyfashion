<?php
    // Define each name associated with an URL
    $urls = array(
        'Home' => '/FRESH-DEV-M-N-Bodyfashion/Site/',
        'Over Ons' => '/FRESH-DEV-M-N-Bodyfashion/Site/OverOns.php',
        'Merken' => '/FRESH-DEV-M-N-Bodyfashion/Site/Merken.php',
        'Spaarsysteem' => '/FRESH-DEV-M-N-Bodyfashion/Site/Spaarsysteem.php',
        'Acties' => '/FRESH-DEV-M-N-Bodyfashion/Site/Acties.php',
        'Contact' => '/FRESH-DEV-M-N-Bodyfashion/Site/Contact.php',
        // …
    );
    echo "<div class='nav-Container'>";
    foreach ($urls as $name => $url) {
        print '<div'.(($currentPage === $name) ? ' class="active" ': '').
            '><a class="navButton" href="'.$url.'">'.$name.'</a></div>';
    }
    echo "</div>";
?>
