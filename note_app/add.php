<?php session_start(); ?>
<?php
    if(@$_GET['ftitle']!=''){
        $servername = "localhost";
        $username = "root";
        $password = "";
        $ftitle=$_GET['ftitle'];
        $ftext=$_GET['ftext'];
        $mysqltime = date ('Y-m-d'); 

        try {
            $conn = new PDO("mysql:host=$servername;dbname=site", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO notes (title,text,date,star)
            VALUES ('$ftitle','$ftext','$mysqltime','no')";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
        header('Location: /project/note_app/');
    }
?>

<form action="add.php" name="f">
    <label for="ftitle">Title:</label><br>
    <input type="text" id="ftitle" name="ftitle"><br>
    <label for="ftext">Notes:</label><br>
    <textarea id="ftext" name="ftext"></textarea><br>
    <input type="submit" value="Add">
</form>