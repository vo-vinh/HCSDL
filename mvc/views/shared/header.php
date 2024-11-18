<header class="page-header">
    <div class="page-header__bottom">
        <div class="uk-container">
            <div class="uk-navbar-container bg-green" data-uk-navbar="">
                <div class="uk-navbar-left">
                    <a href="<?php echo Utils\BASE_URL ?>/home/index">
                        <img class="logo__img logo__img--full"
                             src="<?php echo Utils\BASE_URL ?>/public/assets/img/Logo.png"
                             alt="logo">
                    </a>
                </div>
                <div class="uk-navbar-center">
                    <ul class="uk-navbar-nav">
                        <li>
                            <a href="<?php echo Utils\BASE_URL ?>/home/index">
                                <span class="nav-btn home">Trang chủ</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo Utils\BASE_URL ?>/home/catalog">
                                <span class="nav-btn catalog">Sản Phẩm</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo Utils\BASE_URL ?>/news/index">
                                <span class="nav-btn news">Tin tức</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo Utils\BASE_URL ?>/home/contact">
                                <span class="nav-btn contact">Liên hệ</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="uk-navbar-right">
                    <div class="other-links">
                        <ul class="other-links-list">
                            <li>
                                <?php
                                if (!isset($_SESSION['_token'])) {
                                    $redirect_url = Utils\BASE_URL . '/User/sign_in';
                                    echo <<<HTML
                                    <a
                                        style="color: white; font-size: 16px; text-decoration: none; "
                                        href="$redirect_url"
                                        class="nav-btn"
                                    >
                                        Đăng nhập
                                    </a>
                                    HTML;
                                }
                                ?>
                            </li>
                            <li>
                                <a href="#modal-full" data-uk-toggle>
                                    <span class="text-white" data-uk-icon="search"></span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo Utils\BASE_URL ?>/home/cart">
                                    <span class="text-white" data-uk-icon="cart"></span>
                                </a>
                            </li>

                            <?php
                            if (isset($_SESSION["_token"])) {
                                $redirect_url = Utils\BASE_URL . '/home/account';
                                $redirect_url_order = Utils\BASE_URL . '/home/order';
                                $redirect_url_logout = Utils\BASE_URL . '/User/log_out';
                                echo <<<HTML
                                <li>
                                    <a href='$redirect_url'>
                                        <span class='text-white' data-uk-icon='user'></span>
                                    </a>
                                </li>
                                <li>
                                    <a href='$redirect_url_order'>
                                        <span class='text-white' data-uk-icon='album'></span>
                                    </a>
                                <li>
                                    <a href='$redirect_url_logout'>
                                        <span class='text-white' data-uk-icon='sign-out'></span>
                                    </a>
                                </li>
                                HTML;
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="page-header__top">
        <div class="uk-container">
            <nav class="uk-navbar-container uk-navbar-transparent" data-uk-navbar="">

                <div class="uk-navbar-left">
                    <button class="uk-button" type="button" data-target="#offcanvas" data-uk-toggle
                            data-uk-icon="menu"></button>
                </div>
                <div class="uk-navbar-right">
                    <div class="other-links">
                        <ul class="other-links-list">
                            <li>
                                <?php
                                if (!isset($_SESSION['_token'])) {
                                    $redirect_url = Utils\BASE_URL . '/User/sign_in';
                                    echo <<<HTML
                                    <a
                                        style="color: white; font-size: 16px; text-decoration: none; "
                                        href="$redirect_url"
                                        class="nav-btn"
                                    >
                                        Đăng nhập
                                    </a>
                                    HTML;
                                }
                                ?>
                            </li>

                            <?php
                            if (isset($_SESSION["_token"])) {
                                $account_url = Utils\BASE_URL . '/home/account';
                                $logout_url = Utils\BASE_URL . '/User/log_out';
                                echo <<<HTML
                                <li>
                                    <a href='$account_url'>
                                        <span class='text-white uk-icon' data-uk-icon='user'></span>
                                    </a>
                                </li>
                                <li>
                                    <a href='$logout_url'>
                                        <span class='text-white uk-icon' data-uk-icon='sign-out'></span>
                                    </a>
                                </li>
                                HTML;
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </nav>

        </div>
    </div>
    <div style="background-color: #F84E45; height: 1px; width: 100%; margin: 0"></div>
    <div id="offcanvas" data-uk-offcanvas="overlay: true">
        <div class="uk-offcanvas-bar">
            <div class="uk-margin-bottom">
                <div class="uk-margin">
                    <form class="uk-search uk-search-default" name="searchform" action="#" method="POST">
                        <span class="uk-search-icon-flip" uk-search-icon></span>
                        <input class="uk-search-input" type="search" aria-label="Search"
                               name="searchinput" placeholder="Nhập sản phẩm cần tìm...">
                    </form>
                </div>
                <button class="uk-offcanvas-close" type="button" data-uk-close="" style="margin-top:8px"></button>

            </div>
            <hr class="uk-margin">
            <div class="uk-margin-top">
                <ul class="uk-nav">
                    <li><a href="<?php echo Utils\BASE_URL ?>/home/index">Trang chủ</a></li>
                    <li><a href="<?php echo Utils\BASE_URL ?>/home/catalog">Sản phẩm</a></li>
                    <li><a href="<?php echo Utils\BASE_URL ?>/News/index">Tin tức</a></li>
                    <li><a href="<?php echo Utils\BASE_URL ?>/home/contact">Liên hệ</a></li>
                </ul>
            </div>
            <hr class="uk-margin">
            <ul class="uk-nav uk-nav-parent-icon" data-uk-nav>
                <li class="">
                    <a href="<?php echo Utils\BASE_URL ?>/home/catalog">Trái cây</a>
                </li>

                <li class="">
                    <a href="<?php echo Utils\BASE_URL ?>/home/catalog">Thịt</a>
                </li>

                <li class="">
                    <a href="<?php echo Utils\BASE_URL ?>/home/catalog">Rau củ quả</a>
                </li>

                <li class="">
                    <a href="<?php echo Utils\BASE_URL ?>/home/catalog">Thủy hải sản</a>
                </li>
            </ul>
            <hr class="uk-margin">
            <div class="uk-margin-bottom">
                <a href="<?php echo Utils\BASE_URL ?>/home/index">
                    <img class="" src="<?php echo Utils\BASE_URL ?>/public/assets/img/Logo.png"
                         alt="logo">
                </a>
            </div>
        </div>
    </div>
    <div class="uk-flex-top" id="callback" data-uk-modal="">
        <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical">
            <button class="uk-modal-close-default"
                    type="button" data-uk-close=""></button>
            <p></p>
        </div>
    </div>
    <div class="uk-modal-full uk-modal" id="modal-full" data-uk-modal>
        <div class="uk-modal-dialog uk-flex uk-flex-center uk-flex-middle modal-search" data-uk-height-viewport>
            <button class="uk-modal-close-full" type="button" data-uk-close></button>
            <form class="uk-search uk-search-large" name="searchform" action="#" method="POST">
                <input class="uk-search-input uk-text-center" type="search" name="searchinput"
                       placeholder="Nhập sản phẩm cần tìm..." autofocus>
            </form>
        </div>
    </div>

</header>

<script type="text/javascript">
    $('document').ready(() => {
        const paths = window.location.pathname.split('/')
        if (paths[paths.length - 1] !== 'index') {
            $(`.nav-btn.${paths[paths.length - 1]}`).addClass('active')
        } else {
            $(`.nav-btn.${paths[paths.length - 2]}`).addClass('active')
        }
    })
</script>

<?php
if (isset($_POST['searchinput'])) {
    $search_url = Utils\BASE_URL . '/home/search/' . $_POST['searchinput'];
    echo '<script>window.location.href = "' . $search_url . '"</script>';
}
?>