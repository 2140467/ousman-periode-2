<?php

require_once("db.php");
$db = new db();

$telefoons = $db->selectAll();

if (isset($_POST["verzenden"]))
{
    $merk = $_POST["merk"];
    $model = $_POST["model"];
    $opslag = $_POST["opslag"];
    $prijs = $_POST["prijs"];
    $db->insertData($merk, $model, $opslag, $prijs);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Telefoon</title>
</head>
<body>
    <table>
        <tr>
            <th>merk</th>
            <th>model</th>
            <th>opslag</th>
            <th>prijs</th>
            <th colspan ="2">Action</th>
        </tr>
        <?php foreach ($telefoons as $telefoon) { ?>
            <tr>
                <td><?php echo $telefoon["merk"] ?></td>
                <td><?php echo $telefoon["model"] ?></td>
                <td><?php echo $telefoon["opslag"] ?></td>
                <td><?php echo $telefoon["prijs"] ?></td>
                <td> <a href="edit.php?id=<?php echo $telefoon["ID"];?>">Edit</a></td>
                <td> <a href="delete.php?id=<?php echo $telefoon["ID"];?>">Delete</a></td>
            </tr>
            <?php } ?>
    </table>
    <form method="post">
        <input type="text"name="merk">
        <input type="text" name="model">
        <input type="text" name="opslag">
        <input type="number" name="prijs">
        <input type="submit" name="verzenden">
    </form>
</body>
</html>