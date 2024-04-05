<div class="row mb">
    <div class="mr">

        <div class="row mb">

            <h3>Danh sách đơn hàng</h3>

            <form action="index.php?act=listbill" method="post">
                <input style="width: 190px;padding:7px;border-radius: 10px;" type="text" name="kyw" placeholder="Nhập mã đơn hàng">
                <input type="hidden" value="GO" name="listok">
            </form>
            <br>
            <div class=" boxcontent cart">
                <br>
                <table class="formloai">
                    <tr style="background-color: #555555;color:white;">
                        <th style="width: 70px;padding: 5px;border:1px solid gray;">Mã</th>
                        <th style="width: 170px;border:1px solid gray;">Người đặt</th>
                        <th style="width: 140px;border:1px solid gray;">Thành tiền</th>
                        <th style="border:1px solid gray;">Tình trạng đơn hàng</th>
                        <th style="border:1px solid gray;">Ngày đặt</th>
                        <th style="border:1px solid gray;">Địa chỉ ng nhận</th>
                        <th style="border:1px solid gray;">Số ĐT người nhận</th>
                        <th style="border:1px solid gray;">Chức năng</th>
                    </tr>

                    <div action="index.php?act=updatett" method="post" enctype="multipart/form-data">

                        <?php

                        foreach ($listbill as $bill) {
                            extract($bill);
                            $xoabill = "index.php?act=xoabill&id=" . $idbill;
                            $suatt = "index.php?act=suatt&id=" . $idbill;
                            $user = $bill["user"];
                            $status = get_ttdh($bill["bill_status"]);
                            $billct = "index.php?act=billct&id=" . $idbill;
                            echo '  
                        <tr>   
                                      <td>' . $idbill . '</td>
                                      <td>' . $user . '</td>                                                                        
                                      <td>' . $bill["total"] . '.VNĐ</td>                                  
                                      <td>' . $status . '</td>                               
                                      <td>' . $bill["ngaydathang"] . '</td>   
                                      <td>' . $bill["receive_address"] . '</td>   
                                      <td>' . $bill["receive_tel"] . '</td>   
                                      <td><a href="index.php?act=updatett&id='.$idbill.'"><button style="border-radius:50px;padding:2px 10px;background-color:green;color:white">Cập nhật</button></a>
                                      <a href="index.php?act=listbillct&id_bill='.$idbill.'"><button style="border-radius:50px;padding:2px 10px;background-color:orange;color:white">Chi tiết</button></a>
                                     
            
                                      </form>
                        </tr>';
                        }
                        ?>
                </table>

            </div>
        </div>
    </div>
</div>