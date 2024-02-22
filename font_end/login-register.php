<!--== End Header Section ==-->
<style>
     h1 {
        font-weight: bold;
        margin: 0;
    }

    h2 {
        text-align: center;
    }

    p {
        font-size: 14px;
        font-weight: 100;
        line-height: 20px;
        letter-spacing: 0.5px;
        margin: 20px 0 30px;
    }

    span {
        font-size: 12px;
    }

    a {
        color: #333;
        font-size: 14px;
        text-decoration: none;
        margin: 15px 0;
    }

    button {
        border-radius: 20px;
        border: 1px solid #FF4B2B;
        background-color: #FF4B2B;
        color: #FFFFFF;
        font-size: 12px;
        font-weight: bold;
        padding: 12px 45px;
        letter-spacing: 1px;
        text-transform: uppercase;
        transition: transform 80ms ease-in;
    }

    button:active {
        transform: scale(0.95);
    }

    button:focus {
        outline: none;
    }

    button.ghost {
        background-color: transparent;
        border-color: #FFFFFF;
    }

    .forms {
        background-color: #FFFFFF;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        padding: 0 50px;
        height: 100%;
        text-align: center;
    }

    input {
        background-color: #eee;
        border: none;
        padding: 12px 15px;
        margin-bottom: 20px;
        width: 100%;
    }

    .containers {
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25),
            0 10px 10px rgba(0, 0, 0, 0.22);
        position: relative;
        overflow: hidden;
        width: 80%;
        max-width: 100%;
        min-height: 680px;
        margin-left: 12%;
        margin-top: 60px;
        margin-bottom: 60px;
    }

    .form-container {
        position: absolute;
        top: 0;
        height: 100%;
        transition: all 0.6s ease-in-out;
    }

    .sign-in-container {
        left: 0;
        width: 50%;
        z-index: 2;
    }

    .containers.right-panel-active .sign-in-container {
        transform: translateX(100%);
    }

    .sign-up-container {
        left: 0;
        width: 50%;
        opacity: 0;
        z-index: 1;
    }

    .containers.right-panel-active .sign-up-container {
        transform: translateX(100%);
        opacity: 1;
        z-index: 5;
        animation: show 0.6s;
    }

    @keyframes show {

        0%,
        49.99% {
            opacity: 0;
            z-index: 1;
        }

        50%,
        100% {
            opacity: 1;
            z-index: 5;
        }
    }

    .overlay-container {
        position: absolute;
        top: 0;
        left: 50%;
        width: 50%;
        height: 100%;
        overflow: hidden;
        transition: transform 0.6s ease-in-out;
        z-index: 100;
    }

    .containers.right-panel-active .overlay-container {
        transform: translateX(-100%);
    }

    .overlay {
        background: #87CBB9;
        background: -webkit-linear-gradient(to right, #A3E4DB, #87CBB9);
        background: linear-gradient(to right, #A3E4DB, #87CBB9);
        background-repeat: no-repeat;
        background-size: cover;
        background-position: 0 0;
        color: #FFFFFF;
        position: relative;
        left: -100%;
        height: 100%;
        width: 200%;
        transform: translateX(0);
        transition: transform 0.6s ease-in-out;
    }

    .containers.right-panel-active .overlay {
        transform: translateX(50%);
    }

    .overlay-panel {
        position: absolute;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        padding: 0 40px;
        text-align: center;
        top: 0;
        height: 100%;
        width: 50%;
        transform: translateX(0);
        transition: transform 0.6s ease-in-out;
    }

    .overlay-left {
        transform: translateX(-20%);
    }

    .containers.right-panel-active .overlay-left {
        transform: translateX(0);
    }

    .overlay-right {
        right: 0;
        transform: translateX(0);
    }

    .containers.right-panel-active .overlay-right {
        transform: translateX(20%);
    }

    .social-container {
        margin: 20px 0;
    }

    .social-container a {
        border: 1px solid #DDDDDD;
        border-radius: 50%;
        display: inline-flex;
        justify-content: center;
        align-items: center;
        margin: 0 5px;
        height: 40px;
        width: 40px;
    }
</style>
<!--== Start Page Breadcrumb ==-->
<div class="page-breadcrumb-wrap">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-breadcrumb">
                    <ul class="nav">
                        <li><a href="index.html">Home</a></li>
                        <li><a href="shop.html">Shop</a></li>
                        <li><a href="shop.html" class="active">Member Area</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--== End Page Breadcrumb ==-->

<div class="containers" id="container">
    <div class="form-container sign-up-container">
        <form class="forms" action="index.php?act=dangky" method="post">
            <h1>Đăng ký</h1>
            <div class="social-container">
                <a href="#" class="social"><i class="bi bi-facebook"></i></a>
                <a href="#" class="social"><i class="bi bi-google"></i></a>
                <a href="#" class="social"><i class="bi bi-linkedin"></i></a>
            </div>
            <input id="my-login" name="name_tk" type="text" placeholder="Nhập tên" />
            <input type="email" id="my-login" name="email_tk" placeholder="Nhập Email" />
            <input type="password" id="my-login" name="pass_tk" placeholder="Nhập password" />
            <input type="password" id="my-login" name="nhaplaipassword" placeholder="Nhập lại mật khẩu" />
            <input type="text" id="my-login" name="address_tk" placeholder="Nhập Địa chỉ" />
            <input type="phone" maxlength="10" id="my-login" name="tel_tk" placeholder="Nhập sdt" />

            <div class="single-input-item">
                <input type="submit" name="dangky" value="Đăng ký"
                    style="width: 150px; background-color: #73b320; font-weight: 600; color: white; text-transform: uppercase;">
                <input type="reset" value="Nhập lại"
                    style="width: 150px; background-color: #73b320; font-weight: 600; color: white; text-transform: uppercase;">
            </div>
        </form>
    </div>
    <div class="form-container sign-in-container">
        <?php
        if (isset($_SESSION['user'])) {
            extract($_SESSION['user']);
            ?>
            <form class="forms" action="index.php?act=dangnhap" method="post">
                <h1>Đăng nhập</h1>
                <div class="social-container">
                    <a href="#" class="social"><i class="bi bi-facebook"></i></a>
                    <a href="#" class="social"><i class="bi bi-google"></i></a>
                    <a href="#" class="social"><i class="bi bi-linkedin"></i></a>
                </div>
                <span></span>
                <input id="my-login" class="" type="text" name="name_tk" placeholder="Nhập Tên">
                <input id="my-login" class="" type="password" name="pass_tk" placeholder="Nhập Password">
                <div class="float-right mb-3">
                    <a href="#">Quên mật khẩu?</a>
                </div>
                <br>
                <div class="single-input-item">
                    <input type="submit" name="dangnhap" value="Đăng nhập"
                        style="width: 150px; background-color: #73b320; font-weight: 600; color: white; text-transform: uppercase;">
                    <?php
                    if ($role == 1) {
                        echo '
                                    <a href="admin/index.php?act=go_home">
                                    <input type="text" value="Đăng nhập Admin" style="width: 180px; background-color: #73b320; font-weight: 600; color: white; text-transform: uppercase; cursor: pointer;">
                                    </a>
                                     ';
                    }
                    ?>
                </div>
            </form>
            <?php
        } else {
            ?>

            <form class="forms" action="index.php?act=dangnhap" method="post">
                <h1>Đăng nhập</h1>
                <div class="social-container">
                    <a href="#" class="social"><i class="bi bi-facebook"></i></a>
                    <a href="#" class="social"><i class="bi bi-google"></i></a>
                    <a href="#" class="social"><i class="bi bi-linkedin"></i></a>
                </div>
                <span></span>
                <input id="my-login" class="" type="text" name="name_tk" placeholder="Nhập Tên">
                <input id="my-login" class="" type="password" name="pass_tk" placeholder="Nhập Password">
                <div class="float-right mb-3">
                    <a href="#">Quên mật khẩu?</a>
                </div>
                <br>
                <div class="single-input-item">
                    <input type="submit" name="dangnhap" value="Đăng nhập"
                        style="width: 150px; background-color: #73b320; font-weight: 600; color: white; text-transform: uppercase;">
                </div>
            </form>
        <?php }

        ?>

        <div style="margin-bottom:40px ;">
            Bạn chưa có tài khoản? <a href="dangky.html" style="color:#00a79e;">Đăng ký</a>
        </div>
        <!--ENd Đăng nhập-->



    </div>
    <div class="overlay-container">
        <div class="overlay">
            <div class="overlay-panel overlay-left">
                <h1>Chào bạn quay trở lại!</h1>
                <p>Bạn vui lòng đăng nhập để tiếp tục trải nghiệm với chúng tôi.</p>
                <img width="200px" style="margin-bottom: 10px;" src="assets/images/dn.png" alt="">
                <button class="ghost" id="signIn">Đăng nhập</button>
            </div>
            <div class="overlay-panel overlay-right">
                <h1>Chào, bạn!</h1>
                <p>Bạn vui lòng đăng ký thông tin tại đây và bắt đầu là thành viên của chúng tôi.</p>
                <img width="200px" style="margin-bottom: 30px;" src="assets/images/dk.png" alt="">
                <button class="ghost" id="signUp">Đăng ký</button>
            </div>
        </div>
    </div>
</div>

<script>
    const signUpButton = document.getElementById('signUp');
    const signInButton = document.getElementById('signIn');
    const container = document.getElementById('container');

    signUpButton.addEventListener('click', () => {
        container.classList.add("right-panel-active");
    });

    signInButton.addEventListener('click', () => {
        container.classList.remove("right-panel-active");
    });


    document.addEventListener("DOMContentLoaded", function () {
        var form = document.querySelector('.forms');

        form.addEventListener("submit", function (event) {
            var nameInput = document.querySelector('input[name="name_tk"]');
            var emailInput = document.querySelector('input[name="email_tk"]');
            var passwordInput = document.querySelector('input[name="pass_tk"]');
            var confirmPasswordInput = document.querySelector('input[name="nhaplaipassword"]');
            var addressInput = document.querySelector('input[name="address_tk"]');
            var telInput = document.querySelector('input[name="tel_tk"]');

            // Reset previous error messages
            var errorElements = document.querySelectorAll('.error-msg');
            errorElements.forEach(function (element) {
                element.remove();
            });

            var isValid = true;

            // Validation for Name
            if (nameInput.value.trim() === "") {
                displayError(nameInput, "Vui lòng nhập tên");
                isValid = false;
            }

            // Validation for Email
            if (emailInput.value.trim() === "") {
                displayError(emailInput, "Vui lòng nhập email");
                isValid = false;
            } else if (!isValidEmail(emailInput.value.trim())) {
                displayError(emailInput, "Email không hợp lệ");
                isValid = false;
            }

            // Validation for Password
            if (passwordInput.value.trim() === "") {
                displayError(passwordInput, "Vui lòng nhập password");
                isValid = false;
            } else if (passwordInput.value.trim().length < 8) {
                displayError(passwordInput, "Password phải bằng 8 ký tự");
                isValid = false;
            }

            // Validation for Confirm Password
            if (confirmPasswordInput.value.trim() === "") {
                displayError(confirmPasswordInput, "Vui lòng nhập lại password");
                isValid = false;
            } else if (confirmPasswordInput.value.trim() !== passwordInput.value.trim()) {
                displayError(confirmPasswordInput, "Password khác nhau");
                isValid = false;
            }

            // Add more validations for other fields if needed

            // Check if all validations passed
            if (!isValid) {
                event.preventDefault(); // Prevent form submission if validation fails
            }
        });

        function displayError(inputElement, errorMessage) {
            var errorElement = document.createElement('span');
            errorElement.classList.add('error-msg');
            errorElement.textContent = errorMessage;

            // Insert the error message after the input element
            inputElement.parentNode.insertBefore(errorElement, inputElement.nextSibling);
        }

        function isValidEmail(email) {
            // Use a regular expression for basic email validation
            var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return emailRegex.test(email);
        }
    });

    
</script>

</script>


<!--ENd Đăng nhập-->