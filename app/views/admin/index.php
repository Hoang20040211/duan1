<?php
session_start();
//if(isset($_SESSION['role']) && $_SESSION['role'] == 1){
include "../../models/AdminModel/pdo.php";
include "../../models/AdminModel/danhmuc.php";
//include "../../models/AdminModel/sanpham.php";
//include "../../models/AdminModel/taikhoan.php";
//include "../../models/AdminModel/binhluan.php";
//include "../../models/AdminModel/cart.php";
include "header.php";
include "../../controllers/AdminController.php";
include "footer.php";
//}else{
   // echo '<img src="../../../public/img/404.jpg" alt="">';
//}