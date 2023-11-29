<?php

require_once("DbConnection.php");
$db = new db();

$telefoons = $db->fetchData();

if (isset($_POST["verzenden"]))
{
    $merk = $_POST["merk"];
    $model = $_POST["model"];
    $opslag = $_POST["opslag"];
    $prijs = $_POST["prijs"];
    $db->insertData(2, $merk, $model, $opslag, $prijs);
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
        </tr>
        <?php foreach ($telefoons as $telefoon) { ?>
            <tr>
                <td><?php echo $telefoon["merk"] ?></td>
                <td><?php echo $telefoon["model"] ?></td>
                <td><?php echo $telefoon["opslag"] ?></td>
                <td><?php echo $telefoon["prijs"] ?></td>
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