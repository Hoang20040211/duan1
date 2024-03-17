<?php

function insert_danhmuc($tenloai,$hinh){
    $sql = "insert into danhmuc(name,img) values('$tenloai','$hinh')";
    pdo_execute($sql);
}

function delete_danhmuc($id){
    $sql = "delete from danhmuc where id=".$id;
    pdo_execute($sql);
}

function loadall_danhmuc(){
    $sql = "select * from danhmuc order by id desc"; //mới nhập đưa lên trên
    $listdanhmuc = pdo_query($sql);
    return $listdanhmuc;
}

function loadone_danhmuc($id){
    $sql = "select * from danhmuc where id=".$id;
    $dm = pdo_query_one($sql);
    return $dm;
}

function update_danhmuc($id,$tenloai,$hinh){
    if($hinh != ""){
        $sql = "UPDATE danhmuc set name= '$tenloai' , img = '$hinh' where id= $id";
    }else{
        $sql = "UPDATE danhmuc set name= '$tenloai' where id= $id";
    }
    pdo_execute($sql);
}
