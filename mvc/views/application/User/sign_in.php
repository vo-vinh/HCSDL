<?php
if (isset($_SESSION["_token"])) {
    if (!Utils\jwt_verify($_SESSION["_token"])) {
        header("Location: " . Utils\BASE_URL . "/user/log_out");
        exit();
    }
    $claims = Utils\jwt_get_claims($_SESSION["_token"]);
    if ($claims["role"] == "admin") {
        $redirect = Utils\BASE_URL . "/category/index";
        echo "<script>window.location.href = '$redirect';</script>";
    } else {
        $redirect = Utils\BASE_URL . "/";
        echo "<script>window.location.href = '$redirect';</script>";
    }
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    if (isset($data)) {
        /**
         * @var UserModel $user_model
         */
        $user_model = $data["user_model"];
        $user = $user_model->compare_user($email, $password);
        if ($user) {
            $_SESSION["_token"] = Utils\jwt_generate(
                [
                    "id" => $user["id"],
                    "name" => $user["name"],
                    "email" => $email,
                    "phone" => $user["phone"],
                    "role" => $user["role"],
                ]
            );
        } else {
            $url = Utils\BASE_URL . "/user/sign_in";
            echo "<script>alert('Email hoặc mật khẩu không đúng!'); window.location.href = '$url'; </script>";
        }
        if ($user["role"] == "admin") {
            $url = Utils\BASE_URL . "/category/index";
            echo "<script>alert('Đăng nhập thành công!'); window.location.href = '$url';</script>";
            exit();
        }
        else {
            $url = Utils\BASE_URL . "/";
            echo "<script>alert('Đăng nhập thành công!'); window.location.href = '$url';</script>";
            exit();
        }
    }
}

?>
<style>
    body {
        height: 100vh;
        width: 100vw;
        overflow: hidden;
        display: flex;
        justify-content: center;
        align-items: center;
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
        margin: -96px auto 24px;
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


    .forgot {
        margin-top: 12px;
        text-align: right;
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
</style>
<!-- Page Content -->
<div class="login-form">
    <form method="post" class="form-style" name="login-form">
        <div class="form-logo">
            <a href="<?php echo Utils\BASE_URL ?>/home/index">
                <img src="<?php echo Utils\BASE_URL ?>/public/assets/img/Logo.png" alt="logo">
            </a>
        </div>
        <label for="email"><b>Email</b></label> <br>
        <input type="email" name="email" placeholder="Nhập Email" id="email" class="form-control" required> <br>

        <label for="password"><b>Mật khẩu</b></label> <br>
        <input type="password" name="password" placeholder="Nhập mật khẩu" id="password" class="form-control" required>
        <br>

        <input type="submit" name="submit" value="Đăng nhập" class="btn login-btn btn-bg">

        <div class="forgot">
            <a href="<?php echo Utils\BASE_URL ?>/user/sign_up" class="forgotPass" style="float: left;">
                Đăng ký
            </a>

            <button class="forgotPass" onclick="alert('Mật khẩu mới đã được gửi vào email của bạn!');">
                Quên mật khẩu
            </button>
        </div>
    </form>
</div>