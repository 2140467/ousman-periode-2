<?Php
include 'db.php';
$db = new db();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        $db->editUser($_POST['merk'], $_POST['model'], $_POST['opslag'], $_POST['prijs'], $_GET['id']);
        header("location:home.php?Sucess");
    } catch (\Exception $e ){
        echo "Error: " . $e->getMessage();   
     }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post">
        <input type="text"name="merk">
        <input type="text" name="model">
        <input type="text" name="opslag">
        <input type="number" name="prijs">
        <input type="submit" name="verzenden">
    </form>

</body>
</html>