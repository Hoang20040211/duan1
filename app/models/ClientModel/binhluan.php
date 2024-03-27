<?php 
function loadAllBinhLuan($idpro){
    $sql = "SELECT *,taikhoan.user as username FROM binhluan
    JOIN sanpham ON binhluan.idpro = sanpham.id
    JOIN taikhoan ON binhluan.iduser = taikhoan.id
    WHERE sanpham.id= $idpro";
    $result = pdo_query($sql);
    return $result;
}
function addbinhluan($noidung,$iduser,$idpro,$ngaybinhluan){
    $sql = "INSERT INTO binhluan( noidung, iduser, idpro, ngaybinhluan)
    VALUES ('$noidung','$iduser','$idpro','$ngaybinhluan')";
    pdo_execute($sql);
}