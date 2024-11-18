<div class="page-wrapper">
    <?php
    $_SESSION['category_id'] = null;
    if (isset($data)) {
        require_once "./mvc/views/" . $data["header"] . ".php";
    }
    ?>
    <main class="page-main">
        <div class="section-first-screen">
            <div class="first-screen__bg hide-in-sd" style="background-color: rgba(248, 78, 69, 15%); height: 300px;">
            </div>
            <div class="first-screen__content hide-in-sd" style="height: 300px;">
                <div class="uk-container" style="padding: 32px 0">
                    <div class="first-screen__box page-info">
                        <p style="color: #F84E45; font-size: 50px; text-align: center">
                            Danh mục sản phẩm
                        </p>
                    </div>
                </div>
            </div>
            <br> <br>
            <div class="page-content">
                <div class="uk-container">
                    <div data-uk-filter="target: .js-filter">
                        <div class="catalog-filter-row">
                            <ul class="uk-subnav uk-subnav-pill">
                                <li <?php if (!isset($_SESSION['category_id'])) echo "class='uk-active'" ?>
                                        data-uk-filter-control="">
                                    <a onclick="document.getElementById('category-page').innerHTML = ''" href="#">
                                        Tất cả
                                    </a>
                                </li>
                                <li <?php if ($_SESSION['category_id'] == 1) echo "class='uk-active'" ?>
                                        data-uk-filter-control="[data-tags='1']">
                                    <a onclick="document.getElementById('category-page').innerHTML = ': Trái cây'"
                                       href="#">
                                        Trái cây
                                    </a>
                                </li>
                                <li <?php if ($_SESSION['category_id'] == 2) echo "class='uk-active'" ?>
                                        data-uk-filter-control="[data-tags='2']">
                                    <a onclick="document.getElementById('category-page').innerHTML = ': Thịt'" href="#">
                                        Thịt
                                    </a>
                                </li>
                                <li <?php if ($_SESSION['category_id'] == 3) echo "class='uk-active'" ?>
                                        data-uk-filter-control="[data-tags='3']">
                                    <a onclick="document.getElementById('category-page').innerHTML = ': Rau củ quả'"
                                       href="#">
                                        Rau củ quả
                                    </a>
                                </li>
                                <li <?php if ($_SESSION['category_id'] == 4) echo "class='uk-active'" ?>
                                        data-uk-filter-control="[data-tags='4']">
                                    <a onclick="document.getElementById('category-page').innerHTML = ': Thủy hải sản'"
                                       href="#">
                                        Thủy hải sản
                                    </a>
                                </li>

                        </div>
                        <ul class="js-filter
                        uk-grid uk-grid-small uk-child-width-1-2@s
                        uk-child-width-1-3@m uk-child-width-1-4@l"
                            data-uk-grid>
                            <?php
                            while ($row = mysqli_fetch_array($data["products"])) {
                                ?>
                                <li data-tags="<?php echo $row["category_id"] ?>">
                                    <div class="product-item"
                                         style="border: 2px solid #cce8d9;"
                                    >
                                        <div class="product-item__box">
                                            <div class="product-item__intro">
                                                <a href="<?php echo Utils\BASE_URL ?>/home/product/<?php echo $row["id"] ?>"
                                                   style="text-decoration: none;">
                                                    <div class="product-item__not-active">
                                                        <div class="product-item__media">
                                                            <div class="uk-inline-clip uk-transition-toggle uk-light"
                                                                 data-uk-lightbox="data-uk-lightbox">
                                                                <img
                                                                        style="height: 100%; width:100%; object-fit: cover;"
                                                                        src="<?php echo Utils\BASE_URL ?>/public/assets/img<?php echo $row["img_url"] ?>?t=123"
                                                                        alt="<?php echo $row["img_url"] ?>"/>
                                                            </div>
                                                        </div>
                                                        <div class="product-item__title"
                                                             style="text-align: center">
                                                            <?php echo $row["name"] ?>
                                                        </div>
                                                    </div>
                                                    <div class="product-item__info">
                                                        <div class="product-item__price" style="text-align: center">
                                                            <b>
                                                                <span class="value">
                                                                    <?php echo number_format($row["price"]) ?>đ
                                                                </span>
                                                            </b>
                                                        </div>
                                                        <br>
                                                        <button class="uk-button" style="width:100%">
                                                            Xem sản phẩm
                                                        </button>
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
<?php $_SESSION['category_id'] = ""; ?>