<?php 
?>
<main>
        <div class="boxcenter">
            <div class="zek_page_banner zek_position">
                <div class="zek_background wow fadeIn animated animated" data-wow-delay="500ms"
                    data-wow-duration="600ms"
                    style="background-image: url(public/img/pumadm.png); visibility: visible; animation-duration: 600ms; animation-delay: 500ms; animation-name: fadeIn;">
                </div>
                <div class="zek_overlay"></div>
                <div class="inner text-center wow fadeIn animated animated" data-wow-delay="500ms"
                    data-wow-duration="600ms"
                    style="visibility: visible; animation-duration: 600ms; animation-delay: 500ms; animation-name: fadeIn;">
                    <h1 class="title wow fadeInDown animated animated" data-wow-delay="1000ms" data-wow-duration="600ms"
                        style="visibility: visible; animation-duration: 600ms; animation-delay: 1000ms; animation-name: fadeInDown;">
                        Kết quả tìm kiếm</h1>
                    <div class="zek_breadcrumbs wow fadeInUp animated animated" data-wow-delay="700ms"
                        data-wow-duration="600ms"
                        style="visibility: visible; animation-duration: 600ms; animation-delay: 700ms; animation-name: fadeInUp;">
                    </div>
                </div>
            </div>

        </div>
        <div class="boxcenter">
        <div class="contac_1">
            <div class="boxcenter">
                <!-- <div class="title_home">
                    <h2>
                        <a href="#">
                            Các Sản Phẩm Hiện Có
                        </a>
                    </h2>
                </div> -->
                
                <div class="item_home">
                    <div class="row">
                        <?php 
                        $allDm = search($search_input);
                        foreach($allDm as $row):
                        extract($row);?>
                            <div class="col-md-3 box-item">
                                <div class="img_item zoom_img">
                                    <div>
                                        <img src="public/img/<?=$img?>" alt="">
                                    </div>
                                </div>
                                <div class="text_item mb-3">
                                    <p class="loai_hang"><?=$name?></p>
                                    <p class="gioi_thieu"><?=$mota?></p>
                                    <span><?=$price?> vnđ</span>
                                </div>
                                <div class="item_contac mb-3">
                                    <a href="index.php?redirect=ctsp&id=<?=$id?>">Xem chi tiết</a>
                                </div>
                            </div>
                        <?php endforeach?>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </main>
