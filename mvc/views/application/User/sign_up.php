<?php
if (isset($_SESSION["_token"])) {
    if (!Utils\jwt_verify($_SESSION["_token"])) {
        header("Location: " . Utils\BASE_URL . "/user/log_out");
        exit();
    }
    $claims = Utils\jwt_get_claims($_SESSION["_token"]);
    if ($claims["role"] == "admin") {
        header("Location: " . Utils\BASE_URL . "/category/index");
    } else {
        header("Location: " . Utils\BASE_URL . "/");
    }
    exit();
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'] ?? "";
    $password = $_POST['password'] ?? "";
    $name = $_POST['name'] ?? "";
    $phone = $_POST['phone'] ?? "";
    // Check email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        Utils\redirect_with_message(Utils\BASE_URL . "/user/sign_up", "Email không hợp lệ!");
    }
    // Check password
    // Bcrypt limits password to 72 characters
    if (strlen($password) < 8 || strlen($password) > 72) {
        Utils\redirect_with_message(Utils\BASE_URL . "/user/sign_up", "Mật khẩu phải từ 8 đến 72 ký tự!");
    }
    // Check name
    if (strlen($name) < 1 || strlen($name) > 255) {
        Utils\redirect_with_message(Utils\BASE_URL . "/user/sign_up", "Họ và tên không hợp lệ!");
    }
    $user_model = null;
    if (isset($data)) {
        /**
         * @var UserModel $user_model
         */
        $user_model = $data["user_model"];
    }
    if ($user_model->add_user([
        "name" => $name,
        "email" => $email,
        "phone" => $phone,
        "password" => $password
    ])) {
        Utils\redirect_with_message(Utils\BASE_URL . "/user/sign_in", "Tạo tài khoản thành công!");

    } else {
        Utils\redirect_with_message(Utils\BASE_URL . "/user/sign_in", "Tạo tài khoản thất bại!");
    }
}
?>
<style>
    body {
        height: 100vh;
        width: 100vw;
        background: center / cover no-repeat url("<?php echo Utils\BASE_URL ?>/public/assets/img/background.png");
        overflow: hidden;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    /* Login Form */
    .modal-backdrop {
        display: none;
    }

    .signup-form label,
    .login-form label {
        color: black;
        float: left;
    }

    .form-logo {
        height: 50px;
        width: 270px;
        margin: 84px auto;
    }

    .form-logo img {
        width: 100%;
    }

    .form-style {
        margin: -96px auto 12px;
    }


    .form-style .login-btn {
        background-color: #F84E45;
        color: white;
        width: 100%;
    }


    .form-style input {
        width: 100%;
        height: 45px;
        margin-bottom: 8px;
    }

    .form-style button {
        margin-top: 12px;
    }


    .forgotPass {
        background: none;
        border: none;
        text-decoration: underline;
        color: #F84E45;
    }


    .google-btn img {
        padding-bottom: 1px;
        width: 9%;
    }

    .google-btn span {
        line-height: 37px;
    }

    .forgotPass {
        margin-top: 12px;
    }

    .forgotPass:hover {
        color: #F84E45;
    }

    .footer-wrapper {
        margin-top: 12px;
    }

</style>
<div class="signup-form">
    <form name="signup" class="form-style" method="POST" action="">
        <div class="form-logo">
            <a href="<?php echo Utils\BASE_URL ?>/user/sign_in">
                <img src="<?php echo Utils\BASE_URL ?>/public/assets/img/Logo.png" alt="logo">
            </a>
        </div>

        <label for="name"><b>Họ và tên</b></label> <br>
        <input type="text" name="name" placeholder="Nhập họ và tên" id="name" class="form-control" required> <br>

        <label for="email"><b>Email</b></label> <br>
        <input type="email" name="email" placeholder="Nhập Email" id="email" class="form-control" required><br>

        <label for="phone"><b>Số điện thoại</b></label> <br>
        <input type="tel" name="phone" placeholder="Nhập số điện thoại" id="phone" class="form-control" required> <br>

        <label for="psw"><b>Mật khẩu</b></label> <br>
        <input type="password" name="password" placeholder="Nhập mật khẩu" id="password" class="form-control" required>
        <br>

        <input type="submit" value="Đăng ký tài khoản" class="btn login-btn btn-bg">

        <div class="footer-wrapper">
            <span>Đã có tài khoản?</span>
            <a href="<?php echo Utils\BASE_URL ?>/user/sign_in" class="forgotPass">
                Đăng nhập
            </a>
        </div>
    </form>
</div>