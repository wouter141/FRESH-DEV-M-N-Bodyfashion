<!DOCTYPE html>
<html lang="nl" dir="ltr">
  <head>
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
      <meta charset="UTF-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <title>Merken</title>
    <script src="components/javascript/merken.js"></script>
    <?php include('components/header.php'); ?>
    <?php session_start();?>
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script>
        tinymce.init({
            selector: 'textarea',
            height: 500,
            plugins: [
                "advlist autolink lists link charmap print preview anchor",
                "searchreplace visualblocks code fullscreen",
                "insertdatetime table contextmenu paste"
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent",
            imagetools_cors_hosts: ['www.tinymce.com', 'codepen.io'],
            content_css: [
                '//fast.fonts.net/cssapi/e6dc9b99-64fe-4292-ad98-6974f93cd2a2.css',
                '//www.tinymce.com/css/codepen.min.css'
            ]
        });
    </script>
  </head>
  <body>
    <div class="ALL" onclick="">
      <?php include('./components/Navbar.php') ?>
      <div class="page-Content">
        <div class="MerkenPage">
          <h1 class="head-title">Merken</h1>
          <h2 class="Main-Paragraaf">Of u nu op zoek bent naar Lingerie, badmode of nachtmode, M&N Bodyfashion heeft het allemaal voor zowel dames als heren!
            De volgende merken kunt u bij M&N Bodyfashion vinden: </h2>
            <hr>
            <div class="dropdownAll">

              <div class="dropdown">
                <button class="dropbtn">Heren</button>
                <div class="dropdown-content">
                  <a onclick="divVisibility('dropdowncontent-heren-ondermode');">Ondermode</a>
                  <a onclick="divVisibility('dropdowncontent-heren-nachtmode');">Nachtmode</a>
                  <a onclick="divVisibility('dropdowncontent-heren-badmode');">Badmode</a>
                </div>
              </div>
              <div class="dropdowndames">
                <button class="dropbtndames">Dames</button>
                <div class="dropdown-contentdames" id="DropDames">
                  <a onclick="divVisibility('dropdowncontent-dames-lingerie');">Lingerie</a>
                  <a onclick="divVisibility('dropdowncontent-dames-badmode');">Badmode</a>
                  <a onclick="divVisibility('dropdowncontent-dames-nachtmode');">Nachtmode</a>
                  <a onclick="divVisibility('dropdowncontent-dames-accessoires');">Accessoires</a>
                  <a onclick="divVisibility('dropdowncontent-dames-shapewear');">Shapewear</a>
                </div>
              </div>
            </div>

            <div class="dropdowncontent" id="dropdowncontent-heren-ondermode">
              <h2>Heren ondermode</h2><br>
                <?php
                require('./components/dbconn.php');
                $sql = "SELECT merken.genre, merken.class, merken.naam FROM merken WHERE merken.genre = 'heren' AND merken.class = 'ondermode';";
                foreach($conn->query($sql, PDO::FETCH_ASSOC) as $row){
                    $naam = $row['naam'];
                    echo $naam."<br>";
                }
                ?>
            </div>
            <div class="dropdowncontent" id="dropdowncontent-heren-nachtmode">
              <h2>Heren nachtmode</h2><br>
                <?php
                require('./components/dbconn.php');
                $sql = "SELECT merken.genre, merken.naam, merken.class FROM merken WHERE merken.genre = 'heren' AND merken.class = 'nachtmode'";
                foreach($conn->query($sql, PDO::FETCH_ASSOC) as $row){
                    $naam = $row['naam'];
                    echo $naam."<br>";
                }
                ?>
            </div>
            <div class="dropdowncontent" id="dropdowncontent-heren-badmode">
              <h2>Heren badmode</h2><br>
                <?php
                require('./components/dbconn.php');
                $sql = "SELECT merken.genre, merken.naam, merken.class FROM merken WHERE merken.genre = 'heren' AND merken.class = 'badmode'";
                foreach($conn->query($sql, PDO::FETCH_ASSOC) as $row){
                    $naam = $row['naam'];
                    echo $naam."<br>";
                }
                ?>
            </div>
            <div class="dropdowncontent" id="dropdowncontent-dames-lingerie">
              <h2>Dames lingerie</h2><br>
                <?php
                require('./components/dbconn.php');
                $sql = "SELECT merken.genre, merken.naam, merken.class FROM merken WHERE merken.genre = 'dames' AND merken.class = 'lingerie'";
                foreach($conn->query($sql, PDO::FETCH_ASSOC) as $row){
                    $naam = $row['naam'];
                    echo $naam."<br>";
                }
                ?>
            </div>
            <div class="dropdowncontent" id="dropdowncontent-dames-badmode">
              <h2>Dames badmode</h2><br>
                <?php
                require('./components/dbconn.php');
                $sql = "SELECT merken.genre, merken.naam, merken.class FROM merken WHERE merken.genre = 'dames' AND merken.class = 'badmode'";
                foreach($conn->query($sql, PDO::FETCH_ASSOC) as $row){
                    $naam = $row['naam'];
                    echo $naam."<br>";
                }
                ?>
            </div>
            <div class="dropdowncontent" id="dropdowncontent-dames-nachtmode">
                <?php
                require('./components/dbconn.php');
                $sql = "SELECT merken.genre, merken.naam, merken.class FROM merken WHERE merken.genre = 'dames' AND merken.class = 'nachtmode'";
                foreach($conn->query($sql, PDO::FETCH_ASSOC) as $row){
                    $naam = $row['naam'];
                    echo $naam."<br>";
                }
                ?>
            </div>
            <div class="dropdowncontent" id="dropdowncontent-dames-accessoires">
              <h2>Dames accessoires</h2><br>
                <?php
                require('./components/dbconn.php');
                $sql = "SELECT merken.genre, merken.naam, merken.class FROM merken WHERE merken.genre = 'dames' AND merken.class = 'accessoire'";
                foreach($conn->query($sql, PDO::FETCH_ASSOC) as $row){
                    $naam = $row['naam'];
                    echo $naam."<br>";
                }
                ?>
            </div>
            <div class="dropdowncontent" id="dropdowncontent-dames-shapewear">
              <h2>Dames shapewear</h2><br>
                <?php
                require('./components/dbconn.php');
                $sql = "SELECT merken.genre, merken.naam, merken.class FROM merken WHERE merken.genre = 'dames' AND merken.class = 'shapewear'";
                foreach($conn->query($sql, PDO::FETCH_ASSOC) as $row){
                    $naam = $row['naam'];
                    echo $naam."<br>";
                }
                ?>
            </div>
          </div>
        </div>

    </div>
  </body>
  <?php include('./components/Footer.php'); ?>
</html>
