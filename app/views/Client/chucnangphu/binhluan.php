<div class="col-md-9">
    <div class="boxphai">
        <div class="title_gioithieu">
            <h3>
                Bình luận
        </div>
        <div class="form_lienhe formtaikhoan">
            <form action="index.php?redirect=addbinhluan" method="post">
                <div class="mb">
                    nội dung<br>
                    <input type="text" name="noidung" id="" style="width: 100%; height: 30px;"><br>
                    <input type="hidden" name="idpro" id="" value="<?php echo $_GET['id']?>"><br>
                    <input type="submit" class="btn" name="binhluan" value="Bình Luận"><br>
                    <input type="hidden" name="ngaybinhluan" id="" value="<?php echo date("Y-m-d")?>"><br>
                    <?php if(isset($_SESSION['iduser'])):?>
                    <input type="hidden" name="iduser" id="" value="<?php echo $_SESSION['iduser']?>"><br>
                    <?php endif ?>
                </div>
            </form>
        </div>
    </div>
</div>