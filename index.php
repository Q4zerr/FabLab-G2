<?php
    require_once 'assets/php/function.inc.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Link with Favicon -->
    <link rel="icon" href="assets/img/logo_fullie_white.ico" />
    <!-- Link with stylesheet -->
    <link rel="stylesheet" href="assets/css/style.css" />
    <!-- Link with Fredoka Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@300..700&display=swap" rel="stylesheet" />
    <!-- Link with Verola Round Front -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wdth,wght@103.4,300..700&family=Varela+Round&display=swap" rel="stylesheet" />
    <!-- Link with Fontawesome -->
    <script src="https://kit.fontawesome.com/ed61ff2ae5.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <title>Fullie</title>
  </head>
  <body>
    <section class="loader">
      <div class="mid-part"></div>
      <div class="loader-content">
        <img src="assets/img/logo_fullie128.png" alt="Logo Fullie" />
        <span class="loader-title">Fullie</span>
      </div>
      <div class="mid-part"></div>
    </section>
    <section class="dashboard">
      <div class="navigation">
        <div class="logo">
          <div class="logo-img">
            <img src="assets/img/logo_fullie.png" alt="Logo Fullie" />
          </div>
          <h1>Fullie</h1>
        </div>
        <div class="menu">
          <ul>
            <li>
              <a href="#" class="menu-item active stats"><i class="fa-solid fa-chart-simple"></i> Statistics</a>
            </li>
            <li>
              <a href="#" class="menu-item disabled reservation"><i class="fa-solid fa-calendar-days"></i> Reservation</a>
            </li>
          </ul>
        </div>
      </div>
      <div class="navigation-mobile">
        <div class="logo">
          <div class="logo-img">
            <img src="assets/img/logo_fullie.png" alt="Logo Fullie" />
          </div>
          <h1>Fullie</h1>
        </div>
        <div class="menu">
          <div class="line"></div>
        </div>
      </div>
      <div class="menu-mobile">
        <ul>
          <li>
            <a href="#" class="menu-item active stats"><i class="fa-solid fa-chart-simple"></i> Statistics</a>
          </li>
          <li>
            <a href="#" class="menu-item disabled reservation"><i class="fa-solid fa-calendar-days"></i> Reservation</a>
          </li>
        </ul>
      </div>
      <div class="statistics">
        <div class="stats-grid">
          <div class="grid-item">
            <div class="item-title">
              <i class="fa-solid fa-circle-plus"></i>
              Busiest Day
            </div>
            <div class="item-value">
              <?php
                $busiestDay = getBusiestDay(1);
                echo $busiestDay;
               ?>
            </div>
          </div>
          <div class="grid-item">
            <div class="item-title">
              <i class="fa-solid fa-circle-minus"></i>
              Least Busy Day
            </div>
            <div class="item-value">
              <?php
                $leastBusiestDay = getLeastBusiestDay(1);
                echo $leastBusiestDay;
              ?>
            </div>
          </div>
          <div class="grid-item">
            <div class="item-title">
              <i class="fa-solid fa-user-large"></i>
              Number People
            </div>
            <div class="item-value" id="studentCount">
                <?php
                    $numberStudent = getNbStudent('1');
                    echo $numberStudent->nombre_etudiant;
                ?>
            </div>
            <script src="assets/js/updateStudentCount.js"></script>
              <!-- <script>
                  // Met à jour toutes les 5 secondes (5000 millisecondes)
                  setInterval(updateStudentCount, 5000);
              </script> -->
          </div>
        </div>
        <div class="stats-main">
            <div class="stats-frequentation">
                <div class="stats-content">
                    <div>
                        <span>Jour :</span>
                        <span class="day"></span>
                    </div>
                    <!-- <div>
                        <span>Attendance Rates :</span>
                        <span class="frequentation-level">Crowded</span>
                    </div> -->
                </div>
                <div class="frequentation-place">
                    <button class="link-place active">Next-U Café</button>
                    <button class="link-place">Campus Lyon</button>
                </div>
            </div>
            <button class="pagination-button previous"><i class="fa-solid fa-angle-left"></i></button>
            <button class="pagination-button next"><i class="fa-solid fa-angle-right"></i></button>
            <div class="stats-chart lundi">
            <span class="maximum"></span>
            <?php
                getStatsDay('Lundi', 1);
            ?>
            </div>
        <div class="stats-chart mardi">
            <span class="maximum"></span>
            <?php
                getStatsDay('Mardi', 1);
            ?>
        </div>
        <div class="stats-chart mercredi">
            <span class="maximum"></span>
            <?php
                getStatsDay('Mercredi', 1);
            ?>
        </div>
        <div class="stats-chart jeudi">
            <span class="maximum"></span>
            <?php
                getStatsDay('Jeudi', 1);
            ?>
        </div>
        <div class="stats-chart vendredi">
            <span class="maximum"></span>
            <?php
                getStatsDay('Vendredi', 1);
            ?>
        </div>
        </div>
      </div>
      <div class="reservation-part hidden">
        <div class="dropdown-select">
          <select name="dropdown" class="dropdown">
            <option value="table" class="dropdown-value">Table</option>
            <option value="room" class="dropdown-value">Room</option>
          </select>
        </div>
        <div class="table-map">
          <div class="part-disabled"></div>
          <div class="part-disabled">
            <div class="square"></div>
            <div class="square"></div>
          </div>
          <div class="part-disabled"></div>
          <div class="part-disabled">
            <div class="square"></div>
            <div class="square"></div>
          </div>
          <button class="table1 red"></button>
          <button class="table2 green"></button>
          <button class="table3 red"></button>
          <button class="table4 green"></button>
          <button class="table5 green"></button>
          <button class="table6 red"></button>
          <button class="table7 red"></button>
          <button class="table8 green"></button>
        </div>
        <div class="room-map disabled">
          <div class="part-disabled"></div>
          <div class="part-disabled">
            <div class="square"></div>
            <div class="square"></div>
          </div>
          <div class="part-disabled"></div>
          <div class="part-disabled available">
            <div class="square green"></div>
            <div class="square red"></div>
          </div>
        </div>
      </div>
    </section>
    <script src="assets/js/script.js"></script>
  </body>
</html>
