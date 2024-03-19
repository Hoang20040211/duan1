<?php 
function loadAllDm(){
    $sql = "SELECT * FROM danhmuc";
    $result = pdo_query($sql);
    return $result;
}
function loadDmNew(){
    $sql = "SELECT * FROM danhmuc ORDER BY id desc LIMIT 3";
    $result = pdo_query($sql);
    return $result;
}
function loadDmOld(){
    $sql = "SELECT * FROM danhmuc ORDER BY id ASC LIMIT 6";
    $result = pdo_query($sql);
    return $result;
}
function demSoLuongSpDanhMuc(){

}
function loadSpTheoDm($iddm){
    $sql = "SELECT *,sanpham.name as name_sp, sanpham.id as idsp FROM danhmuc
    JOIN sanpham ON danhmuc.id = sanpham.iddm
    WHERE iddm = $iddm";
    $reuslt = pdo_query($sql);
    return $reuslt;
}
function sanPhamCungLoai($iddm,$idsp){
    $sql = "SELECT *,sanpham.name as name_sp, sanpham.id as idsp FROM danhmuc
    JOIN sanpham ON danhmuc.id = sanpham.iddm
    WHERE iddm = $iddm AND sanpham.id != $idsp";
    $reuslt = pdo_query($sql);
    return $reuslt;
}