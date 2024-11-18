<div class="page-wrapper">
    <?php if (isset($data)) {
        require_once './mvc/views/' . $data['header'] . '.php';
    } ?>
    <main class="page-main">
        <div class="section-first-screen">
            <div uk-slideshow="animation push">
                <div class="uk-position-relative uk-visible-toggle uk-light" tabindex=-1
                     uk-slideshow="min-height: 300; max-height: 600;">
                    <ul class="uk-slideshow-items">
                        <li>
                            <div class="uk-position-cover uk-animation-kenburns uk-animation-reverse uk-transform-origin-center-left">
                                <img src="http://pmo82412f.pic23.websiteonline.cn/upload/banner.jpg" alt="slider-1"
                                     data-uk-cover>
                            </div>
                        </li>
                        <li>
                            <div class="uk-position-cover uk-animation-kenburns uk-animation-reverse uk-transform-origin-center-left">
                                <img src="http://pmo82412f.pic23.websiteonline.cn/upload/banner_96.jpg" alt="slider-2"
                                     data-uk-cover>
                            </div>
                        </li>
                    </ul>
                    <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous
                       uk-slideshow-item="previous"></a>
                    <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next
                       uk-slideshow-item="next"></a>

                </div>
            </div>
        </div>
        <div class="section-features">
            <div class="uk-section uk-container">
                <div class="sectionheader">
                    <h2 class="sectiontitle">OG! CÓ GÌ</h2>
                    <p class="sectiondescription">
                        Chúng tôi cung cấp các loại trái cây, rau củ tươi xanh, các loại thịt, thủy hải sản tươi ngon
                        nhất.
                    </p>
                </div>
                <div class="uk-grid uk-child-width-1-3@s data-uk-grid">
                    <div>
                        <div class="feature-item">
                            <i class="bi bi-brightness-high"></i>
                            <div class="feature-item__title">Sản phẩm sạch, an toàn</div>
                            <div class="feature-item__desc">Sản phẩm của chúng tôi đạt được các chứng nhận của ISO,
                                VietGAP
                                <wbr>
                                về độ an toàn.
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="feature-item">
                            <i class="bi bi-truck"></i>
                            <div class="feature-item__title">Đặt hàng tiện lợi</div>
                            <div class="feature-item__desc">Đặt hàng trực tiếp trên website hoặc gọi tới hotline.</div>
                        </div>
                    </div>
                    <div>
                        <div class="feature-item">
                            <i class="bi bi-award"></i>
                            <div class="feature-item__title">Chuỗi cửa hàng</div>
                            <div class="feature-item__desc">OG! có khoảng 300 cửa hàng trải rộng khắp Thành
                                phố Hồ Chí Minh.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="category" style="margin-bottom: 50px;padding-bottom:30px;">
            <div class="sectionheader">
                <h2 class="sectiontitle">DANH MỤC SẢN PHẨM</h2>
                <p class="sectiondescription">
                    Chúng tôi cung cấp các loại trái cây, rau củ tươi xanh, các loại thịt, thủy hải sản tươi ngon nhất
                </p>
            </div>
            <div class="uk-container">
                <ul class="js-filter uk-grid uk-grid-small uk-child-width-1-2@s uk-child-width-1-4@l" data-uk-grid>
                    <li class="category-card" style="text-align :center;">
                        <a href="<?php echo Utils\BASE_URL ?>/home/catalog">
                            <div class="category-img">
                                <img src="<?php echo Utils\BASE_URL ?>/public/assets/img/pages/home/fruit.png" alt="">
                            </div>
                            <h5 class="name">Trái cây</h5>
                        </a>
                    </li>
                    <li class="category-card" style="text-align :center;">
                        <a href="<?php echo Utils\BASE_URL ?>/home/catalog">
                            <div class="category-img">
                                <img src="<?php echo Utils\BASE_URL ?>/public/assets/img/pages/home/meat.png" alt="">
                            </div>
                            <h5 class="name">Các loại thịt</h5>
                        </a>
                    </li>
                    <li class="category-card" style="text-align :center;">
                        <a href="<?php echo Utils\BASE_URL ?>/home/catalog">
                            <div class="category-img">
                                <img src="<?php echo Utils\BASE_URL ?>/public/assets/img/pages/home/vegetable.jpg"
                                     alt="">
                            </div>
                            <h5 class="name">Các loại thịt</h5>
                        </a>
                    </li>
                    <li class="category-card" style="text-align :center;">
                        <a href="<?php echo Utils\BASE_URL ?>/home/catalog">
                            <div class="category-img">
                                <img src="<?php echo Utils\BASE_URL ?>/public/assets/img/pages/home/sea.jpg" alt="">
                            </div>
                            <h5 class="name">Các loại thịt</h5>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </main>
    <?php require_once './mvc/views/' . $data['footer'] . '.php'; ?>
</div>