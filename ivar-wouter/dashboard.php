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
      <?php include "./components/header.php";?>
      <?php include "./components/minibots/minibots.class.php"; ?>
  </head>
  <body>
  <div class="navbar">
      <?php include('./components/navbardash.php') ?>
  </div>
  <div class="page-Content">
      <div class="main-title">
          <h1>Dashboard</h1>
      </div>
      <div class="dashboardimage">
          <img src="components/images/fresh.png" alt='BROKE'>
      </div>
      <div class="user_live">
          <div class="live_users">
              <?php
                  require('./components/dbconn.php');
                  $sql = "SELECT * from active";
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
<!--          <script type='text/javascript'>
              var table = $('html');

              // refresh every 5 seconds
              var refresher = setInterval(function(){
                  table.load("#");
              }, 10000);

              setTimeout(function() {
                  clearInterval(refresher);
              }, 1800000);
          </script>-->

      </div>

      <div class="socialstats">
          <?php

          $mb = new Minibots();

          $ar = $mb->readFacebookPageCounters("https://www.facebook.com/mnbodyfashionpurmerend/");

          $likes = $ar['exact'];


          $mb->use_file_get_contents="yes"; // this works with twitter method for my hosting
          $data = $mb->twitterInfo("MenNbodyfashion");

          $tweets = $data['tweets'];
          $following = $data['following'];
          $followers = $data['followers'];



          ?>

          <div class="demo">

              <h3>M&N Bodyfashion Social Media Statistieken</h3>

                      <div class="wrapper">

                          <!-- SOCIAL COUNTER START -->
                          <div class="social-counter-2">
                              <!-- FACEBOOK -->
                              <a class="count facebook">
                                  <span>Facebook</span>
                                  <p class="action-btn"><?php  echo $likes ?></p>
                              </a>

                              <!-- TWITTER -->
                              <a class="count twitter">
                                  <span>Twitter</span>
                                  <p class="action-btn"><?php echo $followers ?></p>
                              </a>

                              <!-- INSTAGRAM -->
                              <a class="count instagram item pinterest">
                                  <span>Pinterest</span>
                                  <p class="action-btn">1</p>
                              </a>

                          </div>

                      </div>

          </div>

      </div>


  </body>
  </html>
