<div class="text-center">
    <h1 class="h4 text-gray-900 mb-4 text-left proxima-nova-semibold">Hi, <?php echo isset($first_name) ? $first_name . "!" : ""; ?> Let's create a password for your account.</h1>
</div>
<form class="user" action="<?= base_url() ?>mealplan_update/signup" method="POST" id="form-register">
    <p><?php
        if (isset($error) && $error == 1) {
            echo "Too Many Login Attempts";
        }
        if (isset($error) && $error == 2) {
            echo "Invalid Login Credentials.";
        }
        ?></p>
    <div class="form-group">
        <?php
        $uid = $this->input->get('uid');
        if (!$uid || !strlen($uid)) {
            echo "<label for='input-email' class='h6 small'>Email You Used When You Purchased</label>";
        }
        ?>

        <input type="<?php echo $uid && strlen($uid) ? "hidden" : "email" ?>" class="form-control form-control-user" id="input-email" name="email" placeholder="Email" value="<?php echo isset($email) ? $email : ""; ?>">
        
        <?php
        if(isset($error) && ($error === 'incorrect email' || $error === 'duplicated email')) {
          echo "<div class='warning-wrapper'>";
          echo "<p class='warning warning-signup-email mt-1 small active'>";
          if($error === 'incorrect email') {
              echo " The email you've entered is not in our system. Please try again or <a href='https://konsciousketo.com/pages/contact-us' target='_blank'>contact support</a>.";
          } else if ($error === 'duplicated email') {
              echo " You've already created a password, please <a href='" . base_url() . "mealplan_update/login'>sign in</a>";
          }
          echo "</p></div>";
        }
        ?>        
        
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
        <input class="btn btn-lg btn-primary btn-block btn-user" type="submit" value="Register" id="register-submit" disabled>
    </div>                                        
</form>