<div class="text-center">
    <h1 class="h4 text-gray-900 mb-4 text-left proxima-nova-semibold">Hi! Let's Reset Your Password.</h1>
</div>
<form class="user" action="<?= base_url() ?>mealplan_update/pw_reset" method="POST">

    <div class="form-group">
        <input type="hidden" class="form-control form-control-user" id="token" name="token" placeholder="token" value="<?php echo $token; ?>">
    </div>
    <div class="form-group">
        <label for='input-password' class='h6 small'>Password</label>
        <div class="input-group">
            <input type="password" class="form-control form-control-user" id="input-password" name="password" placeholder="Password">                                                
            <i class="fa fa-eye-slash form-control-feedback" aria-hidden="true" onclick="toggle_password(this)"></i>
        </div>
        <div class="warning-wrapper">
            <p class="warning warning-length mb-0 mt-1 h6 small"> Must contain at least 8 characters.</p>
            <p class="warning warning-symbol-number small"> Must contain numbers or symbols.</p>
        </div>
    </div>
    <div class="form-group">
        <label for='input-password-confirm' class='h6 small'>Confirm Password</label>
        <div class="input-group">
            <input type="password" class="form-control form-control-user" id="input-password-confirm" name="password2" placeholder="Confirm Password">
            <i class="fa fa-eye-slash form-control-feedback" aria-hidden="true" onclick="toggle_password(this)"></i>
        </div>
        <div class="warning-wrapper">
            <p class="warning warning-match mt-1 small"> Match Password.</p>
        </div>
    </div>
    <div class="form-group">
        <input class="btn btn-lg btn-primary btn-block btn-user" type="submit" value="Reset Password" disabled>
    </div>
</form>                                        
