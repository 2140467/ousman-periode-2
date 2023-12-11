<?php
include 'db.php';
$db = new db ();{
  try{
    $db->deleteTelefoon($_GET['id']);
    header("location:home.php?Sucess");
  } catch (\Exception $e ){
    echo "Error: " . $e->getMessage();
  }
}
?>