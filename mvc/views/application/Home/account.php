<?php
Utils\ensure_logged_in();
$claims = Utils\jwt_get_claims($_SESSION["_token"]);
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $_token = $_SESSION["_token"] ?? "";
    $claims = Utils\jwt_get_claims($_token);
    $name = $_POST['name'] ?? "";
    $email = $_POST['email'] ?? "";
    $phone = $_POST['phone'] ?? "";
    $old_password = $_POST['old_password'];
    $new_password = $_POST['new_password'];
    /**
     * @var UserModel $user_model
     */
    $user_model = null;
    if (isset($data)) {
        if ($data["user_model"]->compare_user($claims["email"], $old_password) === false) {
            echo
            <<<HTML
            <script>
                "use strict";
                alert("Bạn đã nhập sai mật khẩu");
            </script>
            HTML;
        }
    } else {
        if ($name == null && $email == null && $phone == null && $new_password == null) {
            echo "<script>alert('Vui lòng nhập thông tin cần thay đổi.');</script>";
        } else {
            if (isset($data)) {
                $user_model = $data["user_model"];
            }
            $is_success = true;
            if (!empty($name)) {
                if (!$user_model->update_name($claims["id"], $name)) {
                    $is_success = false;
                }
            }
            if (!empty($email)) {
                if (!$user_model->update_email($claims["id"], $email)) {
                    $is_success = false;
                }
            }
            if (!empty($phone)) {
                if (!$user_model->update_phone($claims["id"], $phone)) {
                    $is_success = false;
                }
            }
            if (!empty($new_password)) {
                if (!$user_model->update_password($claims["id"], $new_password)) {
                    $is_success = false;
                }
            }

            $redirect_url = Utils\BASE_URL . "/user/log_out";
            if ($is_success) {
                echo
                <<<HTML
                <script>
                    "use strict";
                    alert("Cập nhật thông tin thành công.");
                    window.location.href = "$redirect_url";
                </script>
                HTML;

            }
        }
    }
}
?>
<style>
    .form_title {
        font-weight: bold;
        margin-right: 24px;
        font-size: 20px;
    }
</style>
<div class="page-wrapper">
    <?php
    require_once "./mvc/views/" . $data["header"] . ".php";
    ?>
    <main class="page-main">
        <div class="section-first-screen">
            <div class="first-screen__bg hide-in-sd"
                 style="background-color: rgba(248, 78, 69, 15%); height: 300px;">
            </div>
            <div class="first-screen__content hide-in-sd"
                 style="height: 300px;"
            >
                <div class="uk-container"
                     style="padding: 32px 0"
                >
                    <div class="first-screen__box page-info">
                        <h2 class="first-screen-page">
                            Quản lý tài khoản
                        </h2>
                        <div class="first-screen__breadcrumb">
                            <ul class="uk-breadcrumb">
                                <li>
                                    <a href="<?php echo Utils\BASE_URL ?>/home/index">
                                        Trang chủ
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo Utils\BASE_URL ?>/home/account">
                                        Quản lý tài khoản
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="uk-container">
                <div class="block-form uk-margin-medium-top">
                    <div class="section-title">
                        <div class="uk-h2">Chỉnh sửa thông tin cá nhân</div>
                    </div>
                    <div class="section-content">
                        <form action="" method='POST'>
                            <span><b class="form_title">User ID: </b> <?php echo $claims["id"] ?></span> <br><br>
                            <label class="form_title" for="nameInput">
                                Tên khách hàng:
                            </label>
                            <div>
                                <input class="uk-input uk-form-large"
                                       name='name'
                                       type="text"
                                       id='nameInput'
                                       placeholder="<?php echo $claims['name'] ?>"
                                >
                            </div>
                            <br>
                            <label class="form_title" for="emailInput">Email:</label>
                            <div>
                                <input class="uk-input uk-form-large"
                                       name='email' type="email" id="emailInput"
                                       placeholder="<?php echo $claims['email'] ?>"
                                >
                            </div>
                            <br>
                            <label class="form_title" for="phoneInput">Số điện thoại:</label>
                            <div>
                                <input class="uk-input uk-form-large" name='phone' type="number"
                                       id="phoneInput"
                                       placeholder="<?php echo $claims['phone'] ?>"
                                >
                            </div>
                            <br>
                            <label class="form_title" for="oldPwdInput">Nhập lại mật khẩu cũ:</label>
                            <div>
                                <input class="uk-input uk-form-large" name='old_password' id="oldPwdInput"
                                       type="password" required>
                            </div>
                            <br>
                            <label class="form_title" for="newPwdInput">Mật khẩu mới:</label>
                            <div>
                                <input class="uk-input uk-form-large" name='new_password' id="newPwdInput"
                                       type="password" placeholder="">
                            </div>
                            <br>
                            <div>
                                <input class="uk-button uk-button-large" type="submit" value="Lưu thay đổi">
                            </div>
                        </form>
                    </div>
                </div>
            </div>


        </div>
    </main>
    <?php
    require_once "./mvc/views/" . $data["footer"] . ".php";
    ?>
</div>

