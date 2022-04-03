<?php include '../inc/header.php' ?>
<style>
    html {
        overflow-y: hidden;
    }

    .login-form {
        width: 400px;
        margin: 30px auto;
    }

    .login-form form {
        margin-bottom: 15px;
        background: #f7f7f7;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;
        position: relative;
        top: 20%;
        -ms-transform: translateY(-20%);
        transform: translateY(-20%);
    }

    .login-form h2 {
        margin: 0 0 15px;
    }

    .login-btn {
        border-radius: 2px;
        width: 100%;
    }

    .input-group-prepend .fa {
        font-size: 18px;
    }

    .login-btn {
        font-size: 15px;
        font-weight: bold;
        min-height: 40px;
    }

    .wallpaper {
        background-image: linear-gradient(rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.5)), url("assets/images/lead-bg.jpg");
        background-size: cover;
        background-attachment: fixed;
        display: flex;
        justify-content: center;
        min-height: 95vh;
    }

    .wallpaper-overlay {
        position: absolute;
        height: 100%;
        width: 100%;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        background: rgba(33, 125, 187, 0.8);
    }
</style>

<div class="wallpaper-overlay"></div>
<div class="wallpaper">
    <div class="login-form">
        <form action="login.php" method="POST">
            <h2 class="text-center">Sign in</h2>
            <div class="form-group mb-3">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <span class="bi bi-person-fill"></span>
                        </span>
                    </div>
                    <input type="email" class="form-control" name="email" placeholder="E-mail" required="required">
                </div>
            </div>
            <div class="form-group mb-3">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="bi bi-eye-slash-fill"></i>
                        </span>
                    </div>
                    <input type="password" class="form-control" name="password" placeholder="Password" required="required">
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary login-btn btn-block">Sign In</button>
            </div>
            <p class="mt-3 text-center text-muted small">Don't have an account? <a href="register.php" class="text-decoration-none">Sign Up</a></p>
        </form>
    </div>
</div>
<?php include '../inc/base.php' ?>