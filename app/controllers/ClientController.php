<?php 
if(isset($_GET['redirect'])){
    $redirect = $_GET['redirect'];
    switch($redirect){
       
        case 'dmsp':
            include ("app/views/client/danhmuc/dmsp.php");
            break;
        case 'sptheodanhmuc':
            include ("app/views/client/sanpham/sptheodm.php");
            break;
        case 'ctsp':
            include ("app/views/client/sanpham/ctsp.php");
            break;
        case 'tintuc':
            include ("app/views/client/chucnangphu/tintuc.php");
            break;
        case 'lienhe':
            include ("app/views/client/chucnangphu/lienhe.php");
            break;
        case 'search':
            if(isset($_POST['search'])){
                $search_input = $_POST['search_input'];
                search($search_input);
            }
            include ("app/views/client/sanpham/timkiem.php");
            break;

        default:
            include "app/views/client/layout/home.php";
            break;
    }
    }else{
        include "app/views/client/layout/home.php";
    }
?>