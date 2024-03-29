<?php
require_once '../../config/Database.php';
require_once '../../src/controller/News.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Games</title>
    <link rel="stylesheet" href="/Online-game-shop/public/css/global.css">
    <link rel="stylesheet" href="/Online-game-shop/public/css/index.css">
    <link rel="stylesheet" href="/Online-game-shop/public/css/news.css">
    <link rel="icon" href="http://localhost/Online-game-shop/public/images/favicon.ico" type="image/x-icon" />
    <link rel="shortcut icon" href="http://localhost/Online-game-shop/public/images/favicon.ico" type="image/x-icon" />
</head>

<body>
<?php include('navbar.php'); ?>


    <div class="main-container">
    <div class="games-container">

        <?php
        $database = new Database();


        if (isset($_GET['id'])) {
            $articleID = $_GET['id'];

            $sql = "SELECT * FROM News WHERE news_id = \"$articleID\"";
            $result = $database->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) 
    {
        $news = new News($row['news_id'],$row['title'],$row['news_date'],$row['journalist_user_id'],$row['image'],$row['news_text'],$row['newsShortDesc']);
        $news->displayNewsInfo();
    }

            } else {
                echo "No news found in the database.";
            }
        } else {
            echo "404";
        }

        $database->close();
        ?>
    </div>
    </div>
    <?php include('footer.php'); ?>

</body>

</html>
