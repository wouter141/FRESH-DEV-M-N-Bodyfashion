<!DOCTYPE html>
<html lang="nl" dir="ltr">
  <head>
    <?php
        include('components/header.php');
    ?>
      <?php session_start();?>
      <link rel="icon" href="components/images/Logo.png">
      <script>window.addEventListener("load", function(){window.wpcc.init({"border":"thin","colors":{"popup":{"background":"#222222","text":"#ffffff","border":"#f9f9f9"},"button":{"background":"#f9f9f9","text":"#000000"}},"position":"bottom-right","padding":"large","corners":"normal","content":{"href":"https://m-en-n-bodyfashion.nl/PRIVACYVERKLARING%20M&amp;N%20Bodyfashion.pdf","message":"Deze website gebruikt cookies om jou te garanderen van de beste ervaring op onze website.","link":"Leer meer over cookies","button":"Accepteer"}})});</script>
  </head>
  <body>
    <?php include('./components/Navbar.php') ?>
    <div class="banner">
      <?php
        require('./components/dbconn.php');
        $sql = "SELECT image_naam FROM images WHERE id = 2";
            foreach($conn->query($sql, PDO::FETCH_ASSOC) as $row){
              $naam_image = "./components/images/";
              $naam_image .= $row['image_naam'];
              echo "<img class='banner' src='".$naam_image."' alt='BROKE'>";
            }
      ?>
      <div class="Admin_Wijziging_Knop_Image">
      </div>
    </div>
    <div class="page-Content">
      <div class="body-text">
        <div class="wrapper">
          <form method="post" id="identifier" action="./components/replace/replace_index.php">
              <?php
              if($_SESSION['is_admin']) {
                echo"<div id='quillArea'>";
                    $sql = "SELECT string FROM text WHERE name = 'index_main'";
                    $statement = $conn->prepare($sql);
                    $statement->execute();
                    $text = $statement->fetch(PDO::FETCH_ASSOC);
                    echo"<textarea name='textMain' cols='60' rows='60'>";
                    echo $text['string'];
                    echo "</textarea><input type='submit' value='Save'><input type='reset' value='Reset'></div>
                ";
              }
              else {
                $sql = "SELECT string FROM text";
                $statement = $conn->prepare($sql);
                $statement->execute();
                $text = $statement->fetch(PDO::FETCH_ASSOC);
                echo "<div id='quillArea'>";
                echo $text['string'];
                echo "</div>";
              }
            ?>
          </form>
          </div>
      </div>
    </div>
    <?php include('./components/Footer.php'); ?>
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
    <script src="components/javascript/index.js"></script>
  </body>
</html>
