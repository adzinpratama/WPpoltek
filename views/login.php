<!DOCTYPE html>
<html>

<head>
    <title>Login</title>

    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory(dirname(__FILE__), 'build/'); ?>css/login.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
    <div class="container">

        <div class="container-box">
            <!-- <h2 class="title">Login</h2> -->

            <div class="login-content">
                <div class="avatar">
                    <img src="../assets/images/avatars/user.svg">
                </div>
                <form method="POST" action="<?= site_url("user/login"); ?>">
                    <!-- <h2 class="title">Login</h2> -->
                    <div class="input-div one">
                        <div class="i">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="div">
                            <h5>Username</h5>
                            <input type="text" id="username" name="username" class="input">
                            <div style="transform:translateY(200%);color:red;"><?= form_error('username'); ?></div>
                        </div>
                    </div>
                    <div class="input-div two">
                        <div class="i">
                            <i class="fas fa-lock"></i>
                        </div>
                        <div class="div">
                            <h5>Password</h5>
                            <input type="password" id="password" name="password" class="input">
                            <div id="toggle" class="fas" onclick="showHide();"></div>
                            <div style="transform:translateY(200%);color:red;"><?= form_error('password'); ?></div>

                        </div>
                    </div>

                    <button data-hover="Login">
                        <div class="fa fa-sign-in-alt"></div>
                    </button>
                </form>

            </div>
        </div>
    </div>
    <script type="text/javascript" src="<?php echo get_template_directory(dirname(__FILE__), 'build/'); ?>js/login.js"></script>
</body>

</html>