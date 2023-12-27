<?php
session_start();

require_once("../../config/Database.php"); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $db = new Database("127.0.0.1", "root", "", "shop");

    if ($db->query("SELECT 1") === FALSE) {
        die("Connection failed: ");
    }

    $checkQuery = "SELECT * FROM users WHERE username = '$username'";
    $result = $db->query($checkQuery);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        if (password_verify($password, $user["password"])) {
            $_SESSION["user"] = array(

                "id" => $user["id"],
                "username" => $user["username"],
                "name" => $user["name"],
                "email"=> $user["email"],
                "birthday"=> $user["birthday"],
                "role" => $user["role_id"]
            );

            header("Location: ../../public/index.php");
            exit();
        } else {
            echo "Incorrect password.";
        }
    } else {
        echo "User not found.";
    }

    $db->close();
}
?>