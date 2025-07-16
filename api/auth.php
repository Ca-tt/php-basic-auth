<?php

require_once 'db.php';
require_once 'utils.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    session_set_cookie_params([
        'lifetime' => 1800,
        'path' => '/ ',
        'domain' => 'localhost',
        'secure' => true,
        'httponly' => true,
        'samesite' => 'Lax'
    ]);

    session_start();

    $user = [];

    /* login */
    if (isset($_POST['login'])) {
        $email = validate($_POST['email'], 'email');
        $password = validate($_POST['password'], 'password');

        $user = findUserByEmail($email);

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION["user"] = [
                "username" => $user['username'],
                "is_admin" => $user['is_admin']
            ];
        }
        
    }

    /* register */ 
    elseif (isset($_POST['register'])) {
        $username = validate($_POST['username'], 'username');
        $email = validate($_POST['email'], 'email');
        $password = validate($_POST['password'], 'password');

        createSaveUser(
            id: rand(1, 9999),
            username: $username,
            email: $email,
            password: password_hash($password, PASSWORD_DEFAULT), 
            is_admin: false 
        );

        /* save user to session */
        $_SESSION["user"] = [
            "username" => $username,
            "is_admin" => false
        ];
    }
    
    
    // для отладки
    // print_r($_SESSION);
    session_regenerate_id(true); 
    header('Location: index.php');
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Page</title>

    <!-- style -->
    <link rel="stylesheet" href="assets/signup.css">

    <!-- script -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js" defer></script>

    <script src="node_modules/validator/validator.min.js" defer></script>

    <script src="assets/validate.js" type="module" defer></script>
    <script src="assets/signup.js" defer></script>
</head>

<body>
    <header role="banner">
        <div id="cd-logo"><a href="index.php"><img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/148866/cd-logo_1.svg" alt="Logo"></a></div>

        <nav class="main-nav">
            <ul>
                <li><a class="cd-signin" href="#0">Sign in</a></li>
            </ul>
        </nav>
    </header>

    <div class="cd-user-modal"> <!-- this is the entire modal form, including the background -->
        <div class="cd-user-modal-container"> <!-- this is the container wrapper -->
            <ul class="cd-switcher">
                <li><a href="#0">Sign in</a></li>
                <li><a href="#0">New account</a></li>
            </ul>

            <!-- log in form -->
            <div id="cd-login">
                <form class="cd-form" method="POST">
                    <p class="fieldset">
                        <label class="image-replace cd-email" for="signin-email">E-mail</label>
                        <input class="email-input-login full-width has-padding has-border" id="signin-email" name="email" type="email" placeholder="E-mail">
                        <span class="cd-error-message">Error message here!</span>
                    </p>

                    <p class="fieldset">
                        <label class="image-replace cd-password" for="signin-password">Password</label>
                        <input class="full-width has-padding has-border" id="signin-password" name="password" type="text" placeholder="Password">
                        <a href="#0" class="hide-password">Hide</a>
                        <span class="cd-error-message">Error message here!</span>
                    </p>

                    <p class="fieldset">
                        <input type="checkbox" id="remember-me" checked>
                        <label for="remember-me">Remember me</label>
                    </p>

                    <p class="fieldset">
                        <button class="full-width" type="submit" name="login">Login</button>
                    </p>
                </form>

                <p class="cd-form-bottom-message"><a href="#0">Forgot your password?</a></p>
                <!-- <a href="#0" class="cd-close-form">Close</a> -->
            </div> <!-- cd-login -->

            <div id="cd-signup"> <!-- sign up form -->
                <form class="cd-form" method="POST">
                    <p class="fieldset">
                        <label class="image-replace cd-username" for="signup-username">Username</label>
                        <input class="full-width has-padding has-border" id="signup-username" name="username" type="text" placeholder="Username">
                        <span class="cd-error-message">Error message here!</span>
                    </p>

                    <p class="fieldset">
                        <label class="image-replace cd-email" for="signup-email">E-mail</label>
                        <input class="email-input-signup full-width has-padding has-border" id="signup-email" name="email" type="email" placeholder="E-mail">
                        <span class="cd-error-message">Error message here!</span>
                    </p>

                    <p class="fieldset">
                        <label class="image-replace cd-password" for="signup-password">Password</label>
                        <input class="full-width has-padding has-border" id="signup-password" name="password" type="text" placeholder="Password">
                        <a href="#0" class="hide-password">Hide</a>
                        <span class="cd-error-message">Error message here!</span>
                    </p>

                    <p class="fieldset">
                        <input type="checkbox" id="accept-terms">
                        <label for="accept-terms">I agree to the <a href="#0">Terms</a></label>
                    </p>

                    <p class="fieldset">
                        <button class="full-width has-padding" type="submit" name="register">Create account</button>
                    </p>
                </form>

                <!-- <a href="#0" class="cd-close-form">Close</a> -->
            </div> <!-- cd-signup -->

            <div id="cd-reset-password"> <!-- reset password form -->
                <p class="cd-form-message">Lost your password? Please enter your email address. You will receive a link to create a new password.</p>

                <form class="cd-form">
                    <p class="fieldset">
                        <label class="image-replace cd-email" for="reset-email">E-mail</label>
                        <input class="full-width has-padding has-border" id="reset-email" type="email" placeholder="E-mail">
                        <span class="cd-error-message">Error message here!</span>
                    </p>

                    <p class="fieldset">
                        <input class="full-width has-padding" type="submit" value="Reset password">
                    </p>
                </form>

                <p class="cd-form-bottom-message"><a href="#0">Back to log-in</a></p>
            </div> <!-- cd-reset-password -->
            <a href="#0" class="cd-close-form">Close</a>
        </div> <!-- cd-user-modal-container -->
    </div> <!-- cd-user-modal -->
</body>

</html>