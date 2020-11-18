<div class="text-center">
    <h1 class="h4 text-gray-900 mb-4 text-left proxima-nova-semibold">Welcome to Your SimpleKetoSystem Meal Plan</h1>
</div>
<form class="user" action="<?= base_url() ?>mealplan_update/login" method="POST" id="form-login" novalidate>

    <div class="form-group">
        <label for='input-login-email' class='h6 small'>Email</label>
        <input type="email" class="form-control form-control-user" id="input-login-email" name="email" aria-describedby="emailHelp" placeholder="Email" value="<?php echo isset($email) && strlen($email) ? $email : ''; ?>" rquired autofocus>
        <div class="warning-wrapper">
            <p class="warning warning-login-email mb-0 mt-1 h6 small active d-none"> You've entered an invalid email, please try again.</p>
        </div>
        <div class="warning-wrapper">
            <?php
            if (isset($error) && $error === 'incorrect email') {
                ?>
            <p class="warning warning-login-email-server mb-0 mt-1 h6 small active"> The email you've entered is not in our system. Please try again or <a href="https://konsciousketo.com/pages/contact-us" target="_blank">contact support.</a></p>
                <?php
            }
            ?>
        </div>
    </div>
    <div class="form-group">
        <label for='input-login-password' class='h6 small'>Password</label>
        <div class="input-group">
            <input type="password" class="form-control form-control-user" id="input-login-password" name="password" placeholder="Password">
            <i class="fa fa-eye-slash form-control-feedback" aria-hidden="true" onclick="toggle_password(this)"></i>
        </div>
        <div class="warning-wrapper">
            <p class="warning warning-try-again mb-0 mt-1 h6 small"> * Try again or click Forgot password to reset it.</p>
        </div>
        <?php
        if (isset($error) && ($error === 'incorrect password' || $error === 'too many login attempts')) {
            echo '<div class="warning-wrapper">';
            echo '<p class="warning warning-login-password-server mb-0 mt-1 h6 small active">';
            if ($error === 'incorrect password') {
                echo ' Incorrect Password. Try again or click Forgot Password to reset it.';
            } else if ($error === 'too many login attempts') {
                echo " You've entered the incorrect password too many times. Please <a href='" . base_url() . "mealplan_update/pw_reset" . "'>reset your password</a>.";
            }


            echo '</p></div>';
        }
        ?>        
    </div>
    <div class="form-group">
        <input class="btn btn-lg btn-primary btn-block btn-user" type="submit" id="login-submit" value="Sign in" disabled>
    </div>
    <div class="form-group">
        <div class="text-center">
            <a class="small" href="pw_reset">Forgot Password?</a>
        </div>
    </div>
</form>                                        
