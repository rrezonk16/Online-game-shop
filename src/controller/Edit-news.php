<?php
include_once('../../config/Database.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $database = new Database("127.0.0.1", "root", "", "shop");

    $id = $_POST['id'];
    $title = $_POST['title'];
    $date = $_POST['date'];
    $text = $_POST['text'];
    $image = $_POST['image'];
    $shortDcs = $_POST['short-dcs'];

    $sql = "UPDATE news SET
            title = '$title',
            news_date = '$date',
            news_text = '$text',
            image = '$image',
            newsShortDesc = '$shortDcs'
            WHERE news_id = $id";

    if ($database->query($sql)) {
        echo "News updated successfully";
        echo '<br><a href="javascript:history.go(-1)">Go Back</a>';
        header("Location: ../../public/view/admin/news-manager.php");
    } else {
        echo "<script>
        if (window.confirm('Error updating news')) {
            window.history.go(-1);
        }
    </script>"; 
    }

    $database->close();
} else {
    echo "<script>
    if (window.confirm('Invalid request')) {
        window.history.go(-1);
    }
</script>"; 
}
?>
