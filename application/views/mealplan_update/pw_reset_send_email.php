<div>
    <h1 class="h4 text-gray-900 mb-4 text-left proxima-nova-semibold">Reset Password</h1>
    <p>We will send a link to your email to reset your password.</p>
</div>
<form class="user" action="<?= base_url() ?>mealplan_update/pw_reset" method="POST" id="form-pw-reset" novalidate>
    <div class="form-group">
        <label for='input-reset-pw-email' class='h6 small'>Enter Your Email</label>
        <input type="email" class="form-control form-control-user" id="input-reset-pw-email" name="email" aria-describedby="emailHelp" placeholder="Example@email.com" value="<?php echo isset($email) && strlen($email) ? $email : ''; ?>" rquired autofocus>
        <div class="warning-wrapper">
            <p class="warning warning-pw-reset-email mb-0 mt-1 h6 small active d-none"> You've entered an invalid email, please try again.</p>
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
        <input class="btn btn-lg btn-primary btn-block btn-user" type="submit" id="reset-pw-submit" value="Reset My Password" disabled>
    </div>                                        
</form>                                        
