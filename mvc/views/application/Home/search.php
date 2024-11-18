<div class="page-wrapper">
    <?php
    if (isset($data)) {
        require_once "./mvc/views/" . $data["header"] . ".php";
    }
    ?>
    <main class="page-main">
        <div class="section-first-screen">
            <div class="first-screen__bg hide-in-sd"
                 style="background-color: rgba(248, 78, 69, 15%); height: 300px;"></div>
            <div class="first-screen__content hide-in-sd" style="height: 300px;">
                <div class="uk-container" style="padding: 32px 0">
                    <div class="first-screen__box page-info">
                        <h2 style="font-size: 50px" class="first-screen-page">
                            Kết quả tìm kiếm cho: "<?php echo $data["name"] ?>"
                        </h2>
                        <div class="first-screen__breadcrumb">
                            <ul class="uk-breadcrumb">
                                <li>
                                    <a href="<?php echo Utils\BASE_URL ?>/home/index">
                                        Trang chủ
                                    </a>
                                </li>
                                <li>
                                    <a href="#">Kết quả tìm kiếm</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="page-content">
                <div class="uk-container">
                    <div data-uk-filter="target: .js-filter">
                        <div class="catalog-filter-row">
                            <ul class="uk-subnav">
                                <li class='uk-active' data-uk-filter-control=""><a href="#">Tất cả</a></li>
                                <li data-uk-filter-control="[data-tags='1']"><a href="#">Trái cây</a></li>
                                <li data-uk-filter-control="[data-tags='2']"><a href="#">Thịt</a></li>
                                <li data-uk-filter-control="[data-tags='3']"><a href="#">Rau củ quả</a></li>
                                <li data-uk-filter-control="[data-tags='4']"><a href="#">Thủy hải sản</a></li>
                        </div>
                        <ul class="js-filter uk-grid uk-grid-small uk-child-width-1-2@s uk-child-width-1-3@m uk-child-width-1-4@l"
                            data-uk-grid>
                            <?php
                            while ($row = mysqli_fetch_array($data["products"])) {
                                ?>
                                <li data-tags="<?php echo $row["category_id"] ?>">
                                    <div class="product-item" style="border: 2px solid #cce8d9;">
                                        <div class="product-item__box">
                                            <div class="product-item__intro">
                                                <a href="<?php echo Utils\BASE_URL ?>/home/product/<?php echo $row["id"] ?>"
                                                   style="text-decoration: none;">
                                                    <div class="product-item__not-active">
                                                        <div class="product-item__media">
                                                            <div class="uk-inline-clip uk-transition-toggle uk-light"
                                                                 data-uk-lightbox="data-uk-lightbox">
                                                                <img
                                                                        class="product-zoom"
                                                                        style="height: 100%; width:100%; object-fit: cover;"
                                                                        src="../../../as232/public/assets/img<?php echo $row["img_url"] ?>?t=123"
                                                                        alt="<?php echo $row["img_url"] ?>"/>
                                                            </div>
                                                        </div>
                                                        <div class="product-item__title">
                                                            <?php echo $row["name"] ?>
                                                        </div>
                                                    </div>
                                                    <div class="product-item__info">
                                                        <div class="product-item__price"><b><span
                                                                        class="value"><?php echo $row["price"] ?>đ</span></b>
                                                        </div>
                                                    </div>
                                                </a>

                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <?php
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
    </main>

    <?php
    require_once "./mvc/views/" . $data["footer"] . ".php";
    ?>
</div>

