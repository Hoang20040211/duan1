<?php

if (is_array($dm)) {
    extract($dm);
}

?>


<div class="row">
    <div class="row header frmtitle">
        <h1>Sửa danh mục</h1>
    </div>
    <div class="row frmcontent">
        <form action="index.php?act=updatedm" enctype="multipart/form-data" method="post">
            <div class="row mb-10">
                Mã loại <br>
                <input type="text" name="maloai" disabled>
            </div>
            <div class="row mb-10">
                Tên loại<br>
                <input type="text" name="tenloai" required value="<?php if (isset($name) && ($name != "")) echo $name; ?>">
            </div>
            <div style="margin-top: 1%;" class="">
                Hình<br>
                <input type="file" name="hinh"><br><br>
                ảnh cũ<br>
                <img style="width: 100px;" src="../../../public/img/<?= $img ?>" alt="">
            </div>
            <br>
            <div class=" mb-10">
                <input type="hidden" name="id" value="<?php if (isset($id) && ($id > 0)) echo $id; ?>">
                <!-- //lưu lại id -->
                <input style="border-radius:50px;padding:2px 10px;background-color:#198754;border:1px solid #198754;color:white;" type="submit" name="capnhat" value="Cập nhật">
                <a href="index.php?act=listdm"><input style="border-radius:50px;padding:2px 10px;background-color:#198754;border:1px solid #198754;color:white;" type="button" value="Danh sách"></a>
            </div>
            <?php
            if (isset($thongbao) && ($thongbao != "")) echo $thongbao;

            ?>
        </form>
    </div>
</div>