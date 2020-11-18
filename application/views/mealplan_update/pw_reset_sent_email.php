<div>
    <h1 class="h4 text-gray-900 mb-4 text-left proxima-nova-semibold">Reset Password</h1>
    <p>Please check your email. If you don’t see an email from us in your inbox or spam folder, click the button below to resend the link or <a href="https://konsciousketo.com/pages/contact-us" target="_blank">contact support</a>.</p>
</div>
<form class="user" action="<?= base_url() ?>mealplan_update/pw_reset" method="POST" id="form-login">
    <div class="form-group">
        <input type="hidden" class="form-control form-control-user" id="input-reset-pw-email" name="email" aria-describedby="emailHelp" placeholder="Example@email.com" value="<?php echo isset($email) && strlen($email) ? $email : ''; ?>" rquired autofocus>
    </div>
    <div class="form-group">
        <input class="btn btn-lg btn-primary btn-block btn-user" type="submit" id="reset-pw-submit" value="Resend The Link">
    </div>
</form>
