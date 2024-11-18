<?php
Utils\ensure_logged_in();
$claims = Utils\jwt_get_claims($_SESSION["_token"]);
?>
<style>
    * {
        font-family: 'Montserrat', sans-serif;
    }

    .page-cart__list {
        width: 100%;
        display: none;
    }

    .product__header {
        display: flex;
        -webkit-transition: 0.5s;
        -o-transition: 0.5s;
        color: #eeeeee;
        font-family: "Open Sans", sans-serif;
        font-size: 18px;
        font-style: normal;
        font-weight: 400;
        letter-spacing: normal;
        text-transform: none;
        transition: 0.5s;
        -ms-flex-pack: distribute;
        justify-content: space-around;
        width: 100%;
        border-bottom: 4px solid lightgray;
        padding: 0 20px 5px;
    }

    .product__title, .product__price, .product__quantity, .product__total, .product__img {
        text-align: center;
        justify-content: center;
        align-items: center;
        margin: 0 0;
        display: flex;
        width: 25%;
        font-family: "Montserrat", sans-serif;
    }

    .product__img {
        margin-top: 10px;
        margin-bottom: 10px;
        margin-right: 10px;
    }

    .product__quantity {
        font-style: normal;
    }

    .product {
        height: max-content;
        width: 100%;
        display: flex;
        -webkit-transition: 0.5s;
        -o-transition: 0.5s;
        padding: 0 20px;
        color: #eeeeee;
        font-family: "Open Sans", sans-serif;
        font-size: 18px;
        font-style: normal;
        font-weight: 400;
        letter-spacing: normal;
        text-transform: none;
        transition: 0.5s;
        -ms-flex-pack: distribute;
        justify-content: space-around;
        border-bottom: 1px solid lightgray;
    }

    .product__close {
        margin-right: -90px;
        margin-left: 70px;
    }
</style>

<div class="page-wrapper">
    <?php
    if (isset($data)) {
        require_once "./mvc/views/" . $data["header"] . ".php";
    }
    ?>
    <main class="page-main">

        <div class="section-first-screen">
            <div class="first-screen__bg hide-in-sd"
                 style="background-color: rgba(248, 78, 69, 15%); height: 300px;">
            </div>
            <div class="first-screen__content hide-in-sd" style="height: 300px;">
                <div class="uk-container" style="padding: 32px 0">
                    <div class="first-screen__box page-info">
                        <h2 class="first-screen-page">
                            Giỏ hàng
                        </h2>
                        <div class="first-screen__breadcrumb">
                            <ul class="uk-breadcrumb">
                                <li>
                                    <a href="<?php echo Utils\BASE_URL ?>/home/index">
                                        Trang chủ
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo Utils\BASE_URL ?>/home/cart">
                                        Giỏ hàng
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>


            <div class="page-content">
                <div class="uk-margin-large-top uk-container uk-container-small">
                    <div class="page-cart__list" style="margin-bottom: 24px;">
                        <div class="product__header" style="font-weight: bold;">
                            <h3 class="product__title"><b>Tên sản phẩm</b></h3>
                            <h3 class="product__price"><b>Đơn giá</b></h3>
                            <h3 class="product__quantity"><b>Số lượng</b></h3>
                            <h3 class="product__total"><b>Số tiền</b></h3>
                        </div>
                    </div>
                    <img class="page-cart__img"
                         src="<?php echo Utils\BASE_URL ?>/public/assets/img/pages/cart/img-empty-cart.png"
                         alt=""
                    >
                    <div class="page-cart__title">
                        Giỏ hàng của bạn đang trống !
                    </div>
                    <br>
                    <hr>
                    <br>
                    <div class="page-cart__box">
                        <div class="uk-grid uk-grid-medium uk-width-1-1 uk-flex-left slotname"
                             data-uk-grid
                             style="margin-left: 2%; margin-bottom: 100px;"
                        >
                            <h2><b>Thông tin nhận hàng</b></h2>
                            <div>
                                <form>
                                    <label for="address"></label>
                                    <input class="uk-input" id="address" type="text"
                                           placeholder="Địa chỉ nhận hàng"
                                           value=""
                                           style="margin-top: 5px;"><br>
                                    <label for="note"></label>
                                    <input class="uk-input" id="note" type="text"
                                           placeholder="Ghi chú"
                                           value=""
                                           style="margin-top: 5px;"><br>
                                </form>
                            </div>
                        </div>
                        <div>
                            <a id="page-cart__control-btn" class="uk-button" href="javascript:" onclick="getInfo()">
                                Trở về mua sắm
                            </a>
                        </div>
                    </div>
                </div>
            </div>
    </main>

    <?php
    require_once "./mvc/views/" . $data["footer"] . ".php";
    ?>
</div>


<script>
    "use strict";
    let totalPrice;
    const selectedItem = {
        img_src: "",
        name: "",
        tag: "",
        price: 0,
        quantity: 0
    }

    function addToCart() {
        let productNumber = parseInt(localStorage.getItem('productNumber') ?? 0);
        selectedItem.name = $('.product-full-card__title')[0].text();
        selectedItem.price = parseFloat($('#price-value').text().substring(1));
        selectedItem.quantity = parseInt($('#counter-value').val());
        selectedItem.tag = JSON.parse($('#product-tag').text());
        let img = $('#product-picture');
        let imgCanvas = document.createElement("canvas")
        let imgContext = imgCanvas.getContext("2d");
        imgCanvas.width = img.width;
        imgCanvas.height = img.height;
        imgContext.drawImage(img, 0, 0, img.width, img.height);
        selectedItem.img_src = imgCanvas.toDataURL("");                                                                // store image to selectedItem

        let productItem = localStorage.getItem('productItem');
        productItem = JSON.parse(productItem);
        if (productItem != null) {
            if (productItem[selectedItem.tag] === undefined) {
                productItem = {
                    ...productItem,
                    [selectedItem.tag]: selectedItem
                }
                localStorage.setItem('productNumber', String(productNumber + 1));
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

    function subtractItem(tag) {
        let productItem = localStorage.getItem('productItem');
        productItem = JSON.parse(productItem);
        productItem[tag].quantity -= 1;
        localStorage.setItem('productItem', JSON.stringify(productItem));
        if (productItem[tag].quantity === 0) {
            closeItem(tag);
        } else renderCart();
    }

    function addItem(tag) {
        let productItem = localStorage.getItem('productItem');
        productItem = JSON.parse(productItem);
        productItem[tag].quantity++;
        localStorage.setItem('productItem', JSON.stringify(productItem));
        renderCart();
    }

    function closeItem(tag) {
        let product_name = $(`.product__${tag}`)[0];
        product_name.remove();

        let productItem = localStorage.getItem('productItem');
        productItem = JSON.parse(productItem);

        delete productItem[tag];

        localStorage.setItem('productItem', JSON.stringify(productItem));

        let productNumber = localStorage.getItem('productNumber');
        productNumber = parseInt(productNumber);
        localStorage.setItem('productNumber', productNumber - 1);
        if (productNumber - 1 === 0) {
            console.log('x');
            renderUI();
        } else renderCart();
    }

    function renderCart() {
        let productItem = localStorage.getItem('productItem');
        productItem = JSON.parse(productItem);
        let container = document.getElementsByClassName('page-cart__list')[0];
        let subtotal = 0;
        Object.values(productItem).map(item => {
            let myProduct = document.getElementsByClassName('product__' + item.tag)[0];
            if (myProduct === undefined) {
                let innerHTML = `
                <div class="product product__${item.tag}">
                    <h5 class="product__title" style="justify-content: left;">
                        <img class="product__img" src="${item.img_src}">${item.name}
                    </h5>
                    <h5 class="product__price">${item.price}</h5>
                    <h5 class="product__quantity">
                        <span class="counter" style="font-style: normal;">
                            <span class="minus" onclick="subtractItem('${item.tag}')">-</span>
                            <input type="text" value="${item.quantity}" />
                            <span onclick="addItem('${item.tag}')" class="plus">+</span>
                        </span>
                    </h5>
                    <h5 class="product__total">${item.price * item.quantity}
                        <a onclick="closeItem('${item.tag}')" class="product__close">
                            <img src="https://img.icons8.com/ios-glyphs/30/ffffff/macos-close.png" alt="close" >
                        </a>
                    </h5>
                </div>
                `;
                container.innerHTML += innerHTML;
            } else {
                let childrens = document.getElementsByClassName('product__' + item.tag)[0].childNodes;
                childrens[2].innerHTML = `
                <span class="counter" style="font-style: normal;">
                    <span class="minus" onclick="subtractItem('${item.tag}')">-</span>
                    <input type="text" value="${item.quantity}" />
                    <span onclick="addItem('${item.tag}')" class="plus">+</span>
                </span>
                `;
                childrens[3].innerHTML = `
                ${item.price * item.quantity}
                <a onclick="closeItem('${item.tag}')" class="product__close">
                    <img src="https://img.icons8.com/ios-glyphs/30/ffffff/macos-close.png" alt="close" >
                </a>
                `;
            }

            subtotal += item.price * item.quantity;
        });

        const totalEle = document.getElementsByClassName('page-cart__title')[0];
        const total = subtotal + 15000;
        totalPrice = total;
        totalEle.innerHTML = `
        Tạm tính: <span style="margin-left: 24px">${subtotal}đ</span><br>
        Phí vận chuyển: <span style="margin-left: 36px">15000đ</span><br>
        Tổng cộng: <span style="color: #F84E45; margin-left: 36px">${total}</span>
        `;
    }

    function getInfo() {
        const btn = document.getElementById('page-cart__control-btn');
        const text = btn.innerHTML;
        if (text === "Đặt hàng") {
            const address = $('#address').val();
            const note = $('#note').val();
            if (address === "" || note === "") {
                alert("Vui lòng nhập đầy đủ thông tin nhận hàng!");
            } else {
                if (confirm("Bạn muốn đặt đơn hàng này ?")) {
                    const userID = <?php echo $claims["id"] ?>;
                    btn.href = "<?php echo Utils\BASE_URL ?>/home/success/" + `${userID}/${totalPrice}/${address}/${note}`;
                }
            }
        }
    }

    function renderUI() {
        let productNumber = localStorage.getItem('productNumber');
        productNumber = parseInt(productNumber);

        if (productNumber > 0) {
            let btn = document.getElementById('page-cart__control-btn');
            let total = document.getElementsByClassName('page-cart__title')[0];
            btn.innerHTML = 'Đặt hàng';
            document.getElementsByClassName('page-cart__img')[0].style.display = 'none';
            total.style.textAlign = 'right';
            total.style.marginRight = '50px';
            document.getElementsByClassName('page-cart__list')[0].style.display = 'block';
            renderCart();
        } else {
            const btn = document.getElementById('page-cart__control-btn');
            btn.href = '<?php echo Utils\BASE_URL ?>/Home/catalog';
            btn.innerHTML = 'Trờ về mua sắm';
            document.getElementsByClassName('page-cart__img')[0].style.display = 'block';
            const total = document.getElementsByClassName('page-cart__title')[0];
            total.innerHTML = 'Giỏ hàng của bạn đang trống !';
            total.style.textAlign = 'center';
            total.style.marginRight = '0px';
            document.getElementsByClassName('page-cart__list')[0].style.display = 'none';
            const slotName = document.getElementsByClassName('slotname');
            slotName[0].style.display = 'none';
            slotName[1].style.display = 'none';
        }
    }
    renderUI();
</script>
