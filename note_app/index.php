<?php session_start(); ?>
<h1 style="text-align: center;">Notes</h1>
<table border=1>
    <tr>
        <td colspan="6" align='center'>
            <button style="width:100%">
            <a href='add.php'>+</a>
            </button>
        </td>
    </tr>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=site", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo "Connected successfully";
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
    $sql = "SELECT * FROM notes";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    while($row = $stmt->fetch()) {
            echo "<tr>
            <td>
                ".$row['title']."
            </td>
            <td>
                ".$row['date']."
            </td>
            <td>
                ".substr($row['text'], 0, 10)."
            </td>
            <td>
                ".$row['star']."
            </td>
            <td>
                <button><a href='modify.php?id=".$row['id']."'>Modify</a></button>
            </td>
            <td>
                <button><a href='delete.php?id=".$row['id']."'>Delete</a></button>
            </td>
            </tr>";
    }
    ?>
</table>