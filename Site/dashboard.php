  <?php
    session_start();
    require('./components/dbconn.php');

    if(!isset($_SESSION['is_admin'])) {
      exit(header("Location: login.php"));
    }
    error_reporting("all");
  ?>

   <!DOCTYPE html>
  <html lang="nl" dir="ltr">
  <head>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link rel="stylesheet" href="./components/css/navbardash.css">
      <link href="./components/css/contentDashboard.css" rel="stylesheet">
      <link href="css/styles.css" rel="stylesheet">
      <meta name="viewport" content="width=device-width,initial-scale=1.0">
      <meta charset="utf-8">
      <title>Dashboard</title>
  </head>
  <body>
  <div class="navbar">
      <?php include('./components/navbardash.php') ?>
  </div>
  <div class="page-Content">
      <div class="main-title">
          <h1>Dashboard</h1>
      </div>
      <div class="user_live">
          <div class="live_users">
              <?php
                  require('./components/dbconn.php');
                  $sql = "SELECT * from user";
                  echo "<table><th>Active users</th>";
                  foreach($conn->query($sql, PDO::FETCH_ASSOC) as $row){
                      $admin = $row['admin'];
                      if ($admin == 1){
                          echo "<tr>";
                          echo "<td style='color: red; font-weight: bolder'>".$row['username']."</td>";
                          echo "</tr>";
                      }
                      if ($admin == 0){
                          echo "<tr>";
                          echo "<td style='color: blue; font-weight: bolder;'>".$row['username']."</td>";
                          echo "</tr>";
                      }
                  }
                  echo "</table>";
              ?>
          </div>
          <script type='text/javascript'>
              var table = $('html');

              // refresh every 5 seconds
              var refresher = setInterval(function(){
                  table.load("#");
              }, 10000);

              setTimeout(function() {
                  clearInterval(refresher);
              }, 1800000);
          </script>

      </div>
  </body>
  </html>
