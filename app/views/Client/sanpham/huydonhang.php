<?php 
$idbill = $_GET['id'];
$sql = "DELETE FROM bill WHERE id = $idbill";
pdo_execute($sql);
header('location: index.php?redirect=donhang');
?>