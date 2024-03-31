<?php 
$id = $_GET['id'];
$sql = "DELETE FROM cart WHERE id = $id";
pdo_execute($sql);
header('location: index.php?redirect=giohang');
?>