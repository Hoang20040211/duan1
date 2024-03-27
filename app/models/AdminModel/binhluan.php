<?php

function insert_binhluan($noidung, $iduser, $nameuser, $idpro, $ngaybinhluan)
{
    $sql = "insert into binhluan(noidung,iduser,nameuser,idpro,ngaybinhluan) values('$noidung', '$iduser','$nameuser', '$idpro' , '$ngaybinhluan')";
    pdo_execute($sql);
}
function loadall_binhluan($idpro)
{
    $sql = "select * from binhluan where 1";
    if ($idpro > 0) $sql .= " AND idpro='" . $idpro . "'";
    $sql .= " order by id desc";
    $listbl = pdo_query($sql);
    return $listbl;
}
function loadall_binhluan2()
{
    $sql = "SELECT *,binhluan.id as idbl, taikhoan.user as username from binhluan 
    LEFT JOIN sanpham ON binhluan.idpro = sanpham.id
    LEFT JOIN taikhoan ON binhluan.iduser = taikhoan.id
    order by binhluan.id desc";
    $listbl = pdo_query($sql);
    return $listbl;
}
function delete_binhluan($id)
{
    $sql = "delete from binhluan where id=" . $id;
    pdo_execute($sql);
}

function loadtenuser($id)
{
    $sql = "select user from taikhoan where id=" . $id;
    $name = pdo_query($sql);
    return $name;
}
