<?php
require_once '../../config/Database.php';
require_once '../../src/controller/Game.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Games</title>
    <link rel="stylesheet" href="/Online-game-shop/public/css/global.css">
    <link rel="stylesheet" href="/Online-game-shop/public/css/index.css">
    <link rel="stylesheet" href="/Online-game-shop/public/css/game.css">
    <link rel="icon" href="http://localhost/Online-game-shop/public/images/favicon.ico" type="image/x-icon" />
    <link rel="shortcut icon" href="http://localhost/Online-game-shop/public/images/favicon.ico" type="image/x-icon" /></head>

<body>
<?php include('navbar.php'); ?>

    <div class="main-container">
        <div class="games-container">
            <?php
                $userId = $_SESSION["user"]["id"];
                $database = new Database();


                $sql = "SELECT * FROM owned_game WHERE user_id = $userId";
                $result = $database->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $gameIds[] = $row['game_id'];
                    }

                    $gameIds = implode(',', $gameIds);

                    $getgames = "SELECT * FROM game WHERE game_id IN ($gameIds)";
                    $result = $database->query($getgames);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $game = new Game($row['game_id'], $row['name'], $row['description'], $row['price'], $row['image'], $row['release_date'], $row['platform'], $row['rating'], $row['creator']);
                            $game->displayOwned();
                        }
                    } else {
                        echo "No Owned games.";
                    }
                } else {
                    echo "No Owned games.";
                }

                $database->close();
            ?>
        </div>
    </div>
    <?php include('footer.php'); ?>

</body>

</html>
