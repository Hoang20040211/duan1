<div class="row">
    <div class="row header frmtitle">
        <h3>DANH SÁCH BÌNH LUẬN</h3>
    </div>
    <div class="row frmcontent">

        <div class="row mb-10 frmdsloai">
            <table class="formloai">
                <tr style="background-color: #555555;color:white;">
                    <th style="padding:10px;">NỘI DUNG BÌNH LUẬN</th>
                    <th>TÀI KHOẢN</th>
                    <th>SẢN PHẨM</th>
                    <th>NGÀY BÌNH LUẬN</th>
                    <th></th>
                </tr>
                <?php
                $listbinhluan = loadall_binhluan2();
                foreach ($listbinhluan as $row) {
                    extract($row);?>
                    <tr>                
                    <td><?= $noidung ?></td>
                    <td><?= $username ?></td>
                    <td><?= $name?></td>
                    <td><?=$ngaybinhluan?></td>
                    <!-- <td> <a href="index.php?act=xoabl&id=<?=$idbl?>"> <input style="border-radius:50px;padding:2px 10px;background-color:red;border:1px solid red;color:white;" type="button" onclick="return abc()" value="xóa"></a></td> -->
                    </tr>
                <?php } ?>
                <script>
                    function abc(a) {
                        if (confirm(a)) {
                            return confirm('Bạn có muốn xóa không?')
                        } else {
                            return false;
                        }
                    }
                </script>
            </table>
        </div>
    </div>
</div>