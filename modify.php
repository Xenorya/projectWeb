<?php session_start(); ?>
<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $id = $_POST['id'];
    @$title=$_POST['title'];
    @$text=$_POST['text'];
    @$reminder=$_POST['reminder'];
    $conn = new PDO("mysql:host=$servername;dbname=login", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                

        $sql = "UPDATE notes SET title='$title', text='$text', date='$reminder' WHERE id=$id";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
    
header('Location: home.php');

