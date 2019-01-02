<?php
$session = new session();
if($session->isLogged()){
    helper::redirect(SITE_URL);
    die;
}
?>
<!DOCTYPE html>
<html lang="tr" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Fully Responsive Bootstrap 4 Admin Dashboard Template">
    <meta name="author" content="Creative Tim">

    <!-- Title -->
    <title>Adon - Creative Admin Multipurpose Responsive Dashboard Template</title>

    <!-- Favicon -->
    <link href="<?php echo IMG_PATH; ?>/brand/favicon.png" rel="icon" type="image/png">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,600,700,800" rel="stylesheet">

    <!-- Icons -->
    <link href="<?php echo CSS_PATH; ?>/icons.css" rel="stylesheet">

    <!--Bootstrap.min css-->
    <link rel="stylesheet" href="<?php echo PLUGIN_PATH; ?>/bootstrap/css/bootstrap.min.css">

    <!-- Adon CSS -->
    <link href="<?php echo CSS_PATH; ?>/dashboard.css" rel="stylesheet" type="text/css">

    <!-- Single-page CSS -->
    <link href="<?php echo PLUGIN_PATH; ?>/single-page/css/main.css" rel="stylesheet" type="text/css">
    <link href="<?php echo CSS_PATH; ?>/iziToast.min.css" rel="stylesheet" type="text/css">

    <script>
        var site_url = "<?php echo SITE_URL; ?>/";
    </script>
</head>

<body class="bg-gradient-primary">
<div class="limiter">
    <div class="container-login100">

        <div class="wrap-login100 p-5">
            <form id="login_form" class="login100-form validate-form" action="<?php echo SITE_URL."/login/send"; ?>">
                <div class="logo-img text-center pb-3">
                    <img src="<?php echo IMG_PATH; ?>/brand/logo-dark1.png" alt="logo-img">
                </div>
                <span class="login100-form-title">Üye Girişi</span>

                <div class="wrap-input100 validate-input">
                    <input class="input100 required" type="text" name="email" placeholder="Email">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                    </span>
                </div>

                <div class="wrap-input100 validate-input">
                    <input class="input100 required" type="password" name="password" placeholder="Parola">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-lock" aria-hidden="true"></i>
                    </span>
                </div>

                <div class="container-login100-form-btn">
                    <button type="button" class="login100-form-btn btn-primary" onclick="post_form('login_form')">Giriş Yap</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Adon Scripts -->
<!-- Core -->
<script src="<?php echo PLUGIN_PATH; ?>/jquery/dist/jquery.min.js"></script>
<script src="<?php echo JS_PATH; ?>/popper.js"></script>
<script src="<?php echo PLUGIN_PATH; ?>/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo JS_PATH; ?>/iziToast.min.js"></script>
<script src="<?php echo JS_PATH; ?>/main.js?v=<?php echo time(); ?>"></script>

</body>

</html>