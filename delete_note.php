<?php session_start(); ?>
<?php

$servername = "localhost";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$servername;dbname=login", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $id = $_GET['id'];
    $sql = "DELETE FROM notes WHERE id = $id";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}



header('Location: home.php');

?>