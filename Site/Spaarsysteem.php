<!DOCTYPE html>
<html lang="nl" dir="ltr">
  <head>
      <link href="https://fonts.googleapis.com/css?family=IM+Fell+Great+Primer" rel="stylesheet">
      <meta name="viewport" content="width=device-width,initial-scale=1.0">
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
      <?php include('components/header.php'); ?>
      <?php session_start();?>
  </head>
  <body>
  <div class="page-Content">
    <?php include('./components/Navbar.php') ?>
    <h1 class="head-title">Spaarsysteem</h1>
    <div class="content-Spaar">
      <div class="Main-Paragraaf">
          <form method="post" class="quilSpaar" action="./components/replace/replace_spaar.php"
          <?php
          if($_SESSION['is_admin']) {
              require('./components/dbconn.php');
              echo"<div id='quillArea'>";
              $sql = "SELECT * FROM text WHERE name = 'spaarsysteem_main'";
              $stmt = $conn->prepare($sql);
              $stmt->execute();
              $text = $stmt->fetch(PDO::FETCH_ASSOC);
              echo"<textarea name='textMain' cols='60' rows='60'>";
              echo $text["string"];
              echo "</textarea><input type='submit' value='Save'><input type='reset' value='Reset'></div> ";
          }
          else {
              require('./components/dbconn.php');
              $sql = "SELECT * FROM text WHERE name = 'spaarsysteem_main'";
              $stmt = $conn->prepare($sql);
              $stmt->execute();
              $text = $stmt->fetch(PDO::FETCH_ASSOC);
              echo "<div id='quillArea'>";
              echo $text["string"];
              echo "</div>";
          }
          ?>
          <div class="foto-Spaar" style="background-image: url('./components/images/fotoSparen.jpg');"></div>
      </div>
    </div>
  </div>
  </div>
  <?php include('./components/Footer.php'); ?>
  </body>
</html>
