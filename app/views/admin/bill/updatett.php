<div class="row mb">
    <div class="mr">
        <div class="row mb">
            <div class=" boxcontent cart">
                <br>
                <table border="1">
                    <tr>            
                        <th>TÌNH TRẠNG ĐƠN HÀNG</th>           
                    </tr>
                </table>
            
           
           


                <?php 
                $kttt = kttt();
                foreach($kttt as $row):
                extract($row);
                if($bill_status == 0):?>
                <form method="post">
                    <select name="bill_status" id="">
                        <option value="0">Chờ xác nhận</option>
                        <option value="1">Chờ lấy hàng</option>
                        <option value="2">Đang giao hàng</option>
                        <option value="3">Giao thành công</option>
                    </select>
                    <input type="submit" name="capnhat" value="CẬP NHẬT">   
                </form><?php endif ?>
                <?php if($bill_status == 1):?>
                    <form method="post">
                    <select name="bill_status" id="">
                        <option value="1">Chờ lấy hàng</option>
                        <option value="2">Đang giao hàng</option>
                        <option value="3">Giao thành công</option>
                    </select>
                    <input type="submit" name="capnhat" value="CẬP NHẬT">   
                </form><?php endif ?>
                <?php if($bill_status == 2):?>
                    <form method="post">
                    <select name="bill_status" id="">
                        <option value="2">Đang giao hàng</option>
                        <option value="3">Giao thành công</option>
                    </select>
                    <input type="submit" name="capnhat" value="CẬP NHẬT">   
                </form><?php endif ?>
                <?php if($bill_status == 3):?>

                    <form method="post">
                    <select name="bill_status" id="">
                        <option value="3">Giao thành công</option>
                    </select>
                    <input type="submit" name="capnhat" value="CẬP NHẬT">   
                </form><?php endif ?>
            </div>
        </div>
                       
    </div>

</div><?php endforeach ;?>