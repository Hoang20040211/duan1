
<?php 
session_start();
$err = "";
// include "app/models/clientModel/sanpham.php";
// include "app/models/clientModel/danhmuc.php";
// include "app/models/clientModel/binhluan.php";
// include "app/models/clientModel/taikhoan.php";

include "config.php";
include "app/views/Client/layout/header.php";
include "app/views/Client/layout/home.php";
include "app/controllers/ClientController.php";
include "app/views/Client/layout/footer.php";

?>