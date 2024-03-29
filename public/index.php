<?php
require_once '../config/Database.php';
require_once '../src/controller/Game.php';
require_once '../src/controller/News.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Home</title>
  <link rel="stylesheet" href="css/global.css" />
  <link rel="stylesheet" href="css/index.css" />
  <link rel="icon" href="http://localhost/Online-game-shop/public/images/favicon.ico" type="image/x-icon" />
  <link rel="shortcut icon" href="http://localhost/Online-game-shop/public/images/favicon.ico" type="image/x-icon" />

</head>

<body>
  <?php include('view/navbar.php'); ?>


  <div class="main-container">

    <div class="container">
      <section class="carousel" aria-label="Gallery">
        <ol class="carousel__viewport">
          <li id="carousel__slide1" tabindex="0" class="carousel__slide">
            <div class="carousel__snapper">
              <a class="carousel__prev" id="prev-button"><img src="images/next.svg" alt="" class="prev-button" /></a>
              <img src="images/Game_Images/Formula_1.jpg" alt="" class="cover-images" id="cover-image" />
              <div class="carousel__text">
                <span class="title" id="game-title-slider">F1® 23 AVAILABLE NOW WORLDWIDE</span>
                <br />
                <span class="description" id="game-desc-slideri">
                  Be the last to brake and race to your legacy
                </span>
              </div>
              <a class="carousel__next" id="next-button"><img src="images/next.svg" alt="" class="next-button" /></a>
            </div>
          </li>
        </ol>
      </section>
    </div>

    <!-- For Sale section -->
    <section>
      <div class="section-title title">
        <p>Lattest</p>
        <div>
          <a href="/Online-game-shop/public/view/games.php">
            <button class="more-button">
              More <img src="images/arrow.svg" class="arrow" />
            </button>
          </a>
        </div>
      </div>
      <section class="latest-container">
        <?php
$database = new Database();

        $sql = "SELECT * FROM game WHERE game_id IN (4,6,9)";
        $result = $database->query($sql);

        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            $game = new Game($row['game_id'], $row['name'], $row['description'], $row['price'], $row['image'], $row['release_date'], $row['platform'], $row['rating'], $row['creator']);
            $game->displayIndexGames();
          }
        } else {
          echo "No games found in the database.";
        }

        $database->close();
        ?>
      </section>
    </section>

    <!-- news -->
    <section>
      <div class="section-title title">
        <p>News</p>
        <div>
          <a href="/Online-game-shop/public/view/news.php">

            <button class="more-button">
              More <img src="images/arrow.svg" class="arrow" />
            </button>
          </a>
        </div>
      </div>
      <div class="news-container">
        <?php
        $database = new Database();

        $sql = "SELECT * FROM news where news_id IN (5,4)";
        $result = $database->query($sql);

        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            $news = new News($row['news_id'], $row['title'], $row['news_date'], $row['journalist_user_id'], $row['image'], $row['news_text'], $row['newsShortDesc']);
            $news->displayIndexNews();
          }
        } else {
          echo "No news found in the database.";
        }

        $database->close();
        ?>
      </div>
    </section>

    <!-- For Sale section -->
    <section>
      <div class="section-title title">
        <p>For Sale</p>
        <div>
          <a href="/Online-game-shop/public/view/games.php">

            <button class="more-button">
              More <img src="images/arrow.svg" class="arrow" />
            </button>
          </a>
        </div>
      </div>
      <section class="latest-container">
        <?php
        $database = new Database();


        $sql = "SELECT * FROM game WHERE game_id IN (1,6,3)";
        $result = $database->query($sql);

        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            $game = new Game($row['game_id'], $row['name'], $row['description'], $row['price'], $row['image'], $row['release_date'], $row['platform'], $row['rating'], $row['creator']);
            $game->displayIndexGames();
          }
        } else {
          echo "No games found in the database.";
        }

        $database->close();
        ?>
      </section>
    </section>

    <!-- Recomended -->
    <section>
      <div class="section-title title">
        <p>Recomended</p>
        <div>
          <a href="/Online-game-shop/public/view/games.php">

            <button class="more-button">
              More <img src="images/arrow.svg" class="arrow" />
            </button>
          </a>
        </div>
      </div>
      <section class="latest-container">
        <?php
        $database = new Database();


        $sql = "SELECT * FROM game WHERE game_id IN (11,15,18)";
        $result = $database->query($sql);

        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            $game = new Game($row['game_id'], $row['name'], $row['description'], $row['price'], $row['image'], $row['release_date'], $row['platform'], $row['rating'], $row['creator']);
            $game->displayIndexGames();
          }
        } else {
          echo "No games found in the database.";
        }

        $database->close();
        ?>
      </section>
    </section>
    <!-- Free -->
    <section>
      <div class="section-title title">
        <p>Free</p>
        <div>
          <a href="/Online-game-shop/public/view/games.php">

            <button class="more-button">
              More <img src="images/arrow.svg" class="arrow" />
            </button>
          </a>
        </div>
      </div>
      <section class="latest-container">
        <?php
        $database = new Database();


        $sql = "SELECT * FROM game WHERE game_id IN (2,20,4)";
        $result = $database->query($sql);

        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            $game = new Game($row['game_id'], $row['name'], $row['description'], $row['price'], $row['image'], $row['release_date'], $row['platform'], $row['rating'], $row['creator']);
            $game->displayIndexGames();
          }
        } else {
          echo "No games found in the database.";
        }

        $database->close();
        ?>
      </section>
    </section>

    <div class="backwrap gradient">
      <div class="back-shapes">
        <span class="floating circle" style="
              top: 66.59856996935649%;
              left: 13.020833333333334%;
              animation-delay: -0.9s;
            "></span>
        <span class="floating triangle" style="
              top: 31.46067415730337%;
              left: 33.59375%;
              animation-delay: -4.8s;
            "></span>
        <span class="floating cross" style="
              top: 76.50663942798774%;
              left: 38.020833333333336%;
              animation-delay: -4s;
            "></span>
        <span class="floating square" style="
              top: 21.450459652706844%;
              left: 14.0625%;
              animation-delay: -2.8s;
            "></span>
        <span class="floating square" style="
              top: 58.12053115423902%;
              left: 56.770833333333336%;
              animation-delay: -2.15s;
            "></span>
        <span class="floating square" style="
              top: 8.682328907048008%;
              left: 72.70833333333333%;
              animation-delay: -1.9s;
            "></span>
        <span class="floating cross" style="
              top: 31.3585291113381%;
              left: 58.541666666666664%;
              animation-delay: -0.65s;
            "></span>
        <span class="floating cross" style="
              top: 69.96935648621042%;
              left: 81.45833333333333%;
              animation-delay: -0.4s;
            "></span>
        <span class="floating circle" style="
              top: 15.117466802860061%;
              left: 32.34375%;
              animation-delay: -4.1s;
            "></span>
        <span class="floating circle" style="
              top: 13.074565883554648%;
              left: 45.989583333333336%;
              animation-delay: -3.65s;
            "></span>
        <span class="floating cross" style="
              top: 55.87334014300306%;
              left: 27.135416666666668%;
              animation-delay: -2.25s;
            "></span>
        <span class="floating cross" style="top: 49.54034729315628%; left: 53.75%; animation-delay: -2s"></span>
        <span class="floating cross" style="
              top: 34.62717058222676%;
              left: 49.635416666666664%;
              animation-delay: -1.55s;
            "></span>
        <span class="floating cross" style="
              top: 33.19713993871297%;
              left: 86.14583333333333%;
              animation-delay: -0.95s;
            "></span>
        <span class="floating square" style="
              top: 28.19203268641471%;
              left: 25.208333333333332%;
              animation-delay: -4.45s;
            "></span>
        <span class="floating circle" style="
              top: 39.7344228804903%;
              left: 10.833333333333334%;
              animation-delay: -3.35s;
            "></span>
        <span class="floating triangle" style="
              top: 77.83452502553627%;
              left: 24.427083333333332%;
              animation-delay: -2.3s;
            "></span>
        <span class="floating triangle" style="
              top: 2.860061287027579%;
              left: 47.864583333333336%;
              animation-delay: -1.75s;
            "></span>
        <span class="floating triangle" style="
              top: 71.3993871297242%;
              left: 66.45833333333333%;
              animation-delay: -1.25s;
            "></span>
        <span class="floating triangle" style="
              top: 31.256384065372828%;
              left: 76.92708333333333%;
              animation-delay: -0.65s;
            "></span>
        <span class="floating triangle" style="
              top: 46.47599591419816%;
              left: 38.90625%;
              animation-delay: -0.35s;
            "></span>
        <span class="floating cross" style="
              top: 3.4729315628192032%;
              left: 19.635416666666668%;
              animation-delay: -4.3s;
            "></span>
        <span class="floating cross" style="
              top: 3.575076608784474%;
              left: 6.25%;
              animation-delay: -4.05s;
            "></span>
        <span class="floating cross" style="
              top: 77.3237997957099%;
              left: 4.583333333333333%;
              animation-delay: -3.75s;
            "></span>
        <span class="floating cross" style="
              top: 0.9193054136874361%;
              left: 71.14583333333333%;
              animation-delay: -3.3s;
            "></span>
        <span class="floating square" style="
              top: 23.6976506639428%;
              left: 63.28125%;
              animation-delay: -2.1s;
            "></span>
        <span class="floating square" style="
              top: 81.30745658835546%;
              left: 45.15625%;
              animation-delay: -1.75s;
            "></span>
        <span class="floating square" style="
              top: 60.9805924412666%;
              left: 42.239583333333336%;
              animation-delay: -1.45s;
            "></span>
        <span class="floating square" style="
              top: 29.009193054136876%;
              left: 93.90625%;
              animation-delay: -1.05s;
            "></span>
        <span class="floating square" style="
              top: 52.093973442288046%;
              left: 68.90625%;
              animation-delay: -0.7s;
            "></span>
        <span class="floating square" style="
              top: 81.51174668028601%;
              left: 83.59375%;
              animation-delay: -0.35s;
            "></span>
        <span class="floating square" style="
              top: 11.542390194075587%;
              left: 91.51041666666667%;
              animation-delay: -0.1s;
            "></span>
      </div>
    </div>
  </div>
  <?php include('./view/footer.php'); ?>

  </div>
  <script src="js/index.js"></script>
  <script src="js/global.js"></script>
</body>



</html>