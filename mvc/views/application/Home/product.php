<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $productId = 0;
    if (isset($data)) {
        $productId = $data['pid'];
    }
    $comment = $_POST['feedback'];
    $customer = -1;
    if (isset($_SESSION['_token'])) {
        $claims = Utils\jwt_get_claims($_SESSION['_token']);
        $customer = $claims['id'];
    } else {
        echo '<script>alert("Vui lòng đăng nhập để đánh giá sản phẩm")</script>';
    }
    if ($comment == null) {
        echo '<script>alert("Vui lòng điền đầy đủ thông tin")</script>';
    } else {
        /**
         * @var CommentModel $comment_model
         */
        $comment_model = $data['comment_model'];
        if ($comment_model->add_comment($productId, $customer, $comment)) {
            echo "<script>alert('Thêm đánh giá thành công!')</script>";
        } else {
            echo "<script>alert('Thêm đánh giá thất bại')</script>";
        }
    }
}
?>

<div class="page-wrapper">
    <?php
    require_once "./mvc/views/" . $data["header"] . ".php";
    ?>
    <main class="page-main">
        <?php
        while ($row = mysqli_fetch_assoc($data["product"])) {
            $productId = $row["id"];
            ?>
            <div class="section-first-screen">
                <div class="first-screen__bg hide-in-sd"
                     style="background-color: rgba(248, 78, 69, 15%); height: 300px;">
                </div>
                <div class="first-screen__content hide-in-sd" style="height: 300px;">
                    <div class="uk-container" style="padding: 32px 0">
                        <div class="first-screen__box page-info">
                            <p style="color: #F84E45; font-size: 50px; text-align: center">
                                <?php
                                switch ($row['category_id']) {
                                    case 1:
                                        echo "Trái cây";
                                        break;
                                    case 2:
                                        echo "Thịt";
                                        break;
                                    case 3:
                                        echo "Rau củ quả";
                                        break;
                                    case 4:
                                        echo "Thủy hải sản";
                                        break;
                                }
                                ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="page-content">
                <div class="uk-margin-large-top uk-container">
                    <div class="product-full-card">
                        <div class="uk-grid uk-grid-large uk-child-width-1-2@m uk-flex-middle" data-uk-grid>
                            <div>
                                <div class="product-full-card__gallery">
                                    <div class="product-full-card__gallery-box">
                                        <div class="uk-flex uk-flex-center uk-flex-middle">
                                            <div class="adjust-height"
                                                 style="height: 500px;">
                                                <img src="<?php echo Utils\BASE_URL ?>/public/assets/img/<?php echo $row["img_url"] ?>?t=123"
                                                     id="product-picture"
                                                     alt="<?php echo $row["img_url"] ?>?t=123"
                                                     style="height: 100%; object-fit: cover; margin: 0;">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="product-full-card__content" style="background-color: rgb(245, 245, 250);">
                                    <div class="product-full-card__not-active">
                                        <div class="product-full-card__title">
                                            <?php echo $row["name"] ?>
                                            <li class="uk-text-meta">Đã bán <?php echo $row["qty"] ?></li>
                                        </div>
                                        <div class="product-full-card__price">
                                            <span class="value" id="price-value" style="font-size:30px">
                                                <?php echo number_format($row["price"]) ?>đ
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-full-card__info">
                                    <span style="font-size:18px"><b>Danh mục sản phẩm:</b>
                                        <?php
                                        switch ($row['category_id']) {
                                            case 1:
                                                echo "Trái cây";
                                                break;
                                            case 2:
                                                echo "Thịt";
                                                break;
                                            case 3:
                                                echo "Rau củ quả";
                                                break;
                                            case 4:
                                                echo "Thủy hải sản";
                                                break;
                                        }
                                        ?>
                                    </span>
                                    <p id="product-tag" style="display:none">
                                        <?php
                                        echo $row['id']
                                        ?>
                                    </p>
                                    <br>
                                    <span style="font-size:18px"><b>Tình trạng:</b> Còn hàng</span>
                                    <br><br>
                                    <div class="product-full-card__btns">
                                        <span style="font-size:18px;"><b>Số lượng:</b>
                                            <span class="counter" style="margin-left: 24px; height: 40px">
                                                <span class="minus">-</span>
                                                <input type="text" value="1" id="counter-value"/>
                                                <span class="plus">+</span>
                                            </span>
                                        </span>
                                    </div>
                                    <br>
                                    <div class="product-full-card__btns">
                                        <a class="uk-button" href="javascript:;" onclick="addToCart()"
                                           style="height: 57px;">
                                            Thêm vào giỏ hàng
                                            <span data-uk-icon="cart"></span>
                                        </a>
                                    </div>
                                </div>
                                <div class="product-full-card__share"><span
                                            style="font-size: 18px"><b>Chia sẻ:</b></span>
                                    <ul>
                                        <li>
                                            <a href="javascript:;"><i class="fab fa-twitter"></i></a>
                                        </li>
                                        <li>
                                            <a href="javascript:;"><i class="fab fa-facebook-f"></i></a>
                                        </li>
                                        <li>
                                            <a href="javascript:;"><i class="fab fa-google-plus-g"></i></a>
                                        </li>
                                        <li>
                                            <a href="javascript:;"><i class="fab fa-pinterest-p"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div style="background-color: rgb(245, 245, 250)">
                            <i class="bi bi-clock"></i> Giao hàng nhanh đến 30 phút trong khu vực nội thành
                            <br>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                 class="bi bi-repeat" viewBox="0 0 16 16">
                                <path d="M11 5.466V4H5a4 4 0 0 0-3.584 5.777.5.5 0 1 1-.896.446A5 5 0 0 1 5 3h6V1.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384l-2.36 1.966a.25.25 0 0 1-.41-.192Zm3.81.086a.5.5 0 0 1 .67.225A5 5 0 0 1 11 13H5v1.466a.25.25 0 0 1-.41.192l-2.36-1.966a.25.25 0 0 1 0-.384l2.36-1.966a.25.25 0 0 1 .41.192V12h6a4 4 0 0 0 3.585-5.777.5.5 0 0 1 .225-.67Z"/>
                            </svg>
                            Đổi trả ngay nếu sản phẩm không đảm bảo
                        </div>
                        <div class="">
                            <div class="detail-description bg-green-op">
                                <h2>Mô tả sản phẩm</h2>
                                <?php echo $row["description"] ?>
                            </div>

                            <div class="detail-description">
                                <h2>Đánh giá sản phẩm</h2>
                                <ul class="uk-comment-list">
                                    <?php
                                    /**
                                     * @var CommentModel $comment_model
                                     */
                                    $comments = $data['comment_model']->get_comments_by_product($productId);
                                    while ($comment = mysqli_fetch_assoc($comments)) {
                                        $customer = $comment['customer_id'];
                                        /**
                                         * @var UserModel $user_model
                                         */
                                        $user_model = $data['user_model'];
                                        $customer_name = $user_model->get_user($customer)->fetch_assoc()['name'];
                                        ?>
                                        <li>
                                            <article class="uk-comment">
                                                <header class="uk-comment-header">
                                                    <div class="uk-grid-small uk-grid-divider" data-uk-grid>
                                                        <div class="uk-width-auto@s">
                                                            <img class="uk-comment-avatar"
                                                                 src="<?php echo Utils\BASE_URL ?>/public/assets/img/pages/home/fp2.png"
                                                                 alt>
                                                        </div>
                                                        <div class="uk-width-expand@s">
                                                            <div class="uk-flex uk-flex-middle uk-margin-small-bottom">
                                                                <h4 class="uk-comment-title uk-margin-remove">
                                                                    <?php echo $customer_name ?>
                                                                </h4>
                                                                <span class="uk-text-meta uk-margin-small-left">
                                                                <?php echo $comment['created_at'] ?>
                                                            </span>
                                                            </div>
                                                            <div class="uk-comment-body">
                                                                <p><?php echo $comment['content'] ?></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </header>
                                            </article>
                                        </li>
                                        <?php
                                    }
                                    ?>
                                </ul>
                                <div class="block-form uk-margin-medium-top">
                                    <div class="section-title">
                                        <div class="uk-h2">Để lại đánh giá của bạn</div>
                                    </div>
                                    <div class="section-content">
                                        <form action="" method="POST">
                                            <div class="uk-grid uk-grid-small uk-child-width-1-2@s" data-uk-grid>
                                                <div class="uk-width-1-1"><textarea class="uk-textarea uk-form-large"
                                                                                    name="feedback"
                                                                                    placeholder="Đánh giá *"></textarea>
                                                </div>
                                                <div>
                                                    <button class="uk-button uk-button-large" name='submit'
                                                            type="submit">Gửi đánh giá
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php
        }
        ?>
    </main>
    <?php
    require_once "./mvc/views/" . $data["footer"] . ".php";
    ?>
</div>

<script defer>
    "use strict";
    let selectedItem = {
        img_src: "",
        name: "",
        tag: "",
        price: 0,
        quantity: 0
    }

    function addToCart() {
        let productNumber = localStorage.getItem('productNumber');
        productNumber = parseInt(productNumber);
        selectedItem.name = document.getElementsByClassName('product-full-card__title')[0].innerHTML;
        selectedItem.price = parseFloat((document.getElementById('price-value').innerHTML));
        selectedItem.quantity = parseInt(document.getElementById('counter-value').value);
        selectedItem.tag = JSON.parse(document.getElementById('product-tag').innerHTML);
        if (parseInt(document.getElementById('counter-value').value) < 1) {
            alert('Vui lòng thêm ít nhất 1 sản phẩm.');
            return;
        }
        let img = document.getElementById("product-picture");
        let imgCanvas = document.createElement("canvas"),
            imgContext = imgCanvas.getContext("2d");
        imgCanvas.width = img.width;
        imgCanvas.height = img.height;
        imgContext.drawImage(img, 0, 0, img.width, img.height);
        selectedItem.img_src = imgCanvas.toDataURL("");
        let productItem = localStorage.getItem('productItem');

        productItem = JSON.parse(productItem);
        if (productItem != null) {
            if (productItem[selectedItem.tag] === undefined) {
                productItem = {
                    ...productItem,
                    [selectedItem.tag]: selectedItem
                }
                localStorage.setItem('productNumber', productNumber + 1);
            } else {
                productItem[selectedItem.tag].quantity += selectedItem.quantity;
            }
        } else {
            productItem = {
                [selectedItem.tag]: selectedItem
            };
            localStorage.setItem('productNumber', 1);
        }
        localStorage.setItem('productItem', JSON.stringify(productItem));
        alert("Đã thêm vào giỏ hàng");
    }
</script>