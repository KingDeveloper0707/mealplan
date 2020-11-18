<div class="container pt-5" id="upgrade-page">
    <div class="row">
        <div class="col-md-4 d-flex">
            <div class="image-wrapper">
                <picture>
                    <source srcset="<?php echo keycdn_url() . 'assets/img/'; ?>mp-new-upgrade-heading-min.webp" type="image/webp">
                    <img class="mx-auto d-block w-100" src="<?php echo keycdn_url() . 'assets/img/'; ?>mp-new-upgrade-heading-min.png" alt="">
                </picture>
            </div>
        </div>
        <div class="col-md-8">
            <div class="text-wrapper">
                <?php if ($obj_upgrade && $obj_upgrade->weeknum == 4 && $obj_upgrade->is_subscription && $obj_upgrade->upgrade_date) {//0 ~ 28 days ?>
                    <h1 class="h2 color-red">Go Premium Before <?php echo date('M jS', strtotime($obj_upgrade->upgrade_date)); ?> And Enjoy 75% Savings For Life!</h1>
                    <p class="subheading h4">Lock In Premium Today Save 75% Off The Normal Monthly Price</p>
                    <p>Because you're a first time customer, we are happy to offer you a 75% discount when you say YES and lock in your premium meal plan.</p>
                    <p>Right now you're on a 28 day meal plan.  If you'd like to continue getting fresh customized recipes delivered straight to your members area, week after week, and maintain access to all 4 powerful daily trackers, then consider upgrading to premium.</p>
                    <p>Now is the best time. Because your 28 day plan has not yet expired, we allow you to lock in the premium meal plan subscription plan for half price. And you'll be guaranteed that low low price -- even if we decide to raise the price for everybody else. You will also get access to all of these great features:</p>
                <?php } else if ($obj_upgrade && $obj_upgrade->is_subscription && !$obj_upgrade->upgrade_date) { //28 days plus ?>
                    <h1 class="h2 color-red">We Want You Back! And We'll Even Offer You A Free Gift To Prove It</h1>
                    <p class="subheading h4">Go Premium and Unlock New Meals, Powerful Activity Trackers, and Progress Charts And Reach Your Goal Weight Faster Than Ever.</p>
                    <p>Your meal plan has expired. If you'd like to continue getting fresh customized recipes delivered straight to your members area, week after week, and get instant access to all 4 powerful daily trackers, then consider upgrading to premium. You will also get access to all of these great features:</p>
                <?php } else if ($obj_upgrade && $obj_upgrade->weeknum == 52 && !$obj_upgrade->is_subscription && $obj_upgrade->upgrade_date) { //1 year sub ?>
                    <h1 class="h2 color-red">Renew Your Annual Subscription Before <?php echo date('M jS', strtotime($obj_upgrade->upgrade_date)); ?> & Save 75%</h1>
                    <p>Because you're a loyal customer, we are happy to offer you a 75% discount when you say YES and lock in your yearly premium meal plan.</p>
                    <p>Right now you're on a one-year meal plan. If you'd like to continue getting fresh customized recipes delivered straight to your member's area, week after week, and maintain access to all 4 powerful daily trackers, then consider upgrading to premium.</p>
                    <p>Now is the best time. Because your one-year plan has not yet expired, we allow you to lock in the yearly premium meal plan subscription plan for 75% off. And you'll be guaranteed that low low price -- even if we decide to raise the price for everybody else. You will also get access to all of these great features:</p>
                <?php } ?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="image-wrapper">
                <picture>
                    <source srcset="<?php echo keycdn_url() . 'assets/img/'; ?>mp-new-upgrade-dynamic-min.webp" type="image/webp">
                    <img class="mx-auto d-block w-100" src="<?php echo keycdn_url() . 'assets/img/'; ?>mp-new-upgrade-dynamic-min.png" alt="">
                </picture>
            </div>
        </div>
        <div class="col-md-6">
            <div class="text-wrapper">
                <div class="circle-number upgrade-number-1">1</div>
                <h2 class="h4">Dynamic Custom Meal Plan</h2>            
                <p>Brand New Dynamically Generated CUSTOM Meals Every Week, prepared by our professional keto chefs.  All based on YOUR ingredient preferences, build for YOUR metabolism.</p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="text-wrapper">
                <div class="circle-number upgrade-number-2">2</div>
                <h2 class="h4">Powerful Daily Trackers</h2>            
                <p>Sleep optimizer, daily water intake tracker, activity tracking - supports all aspects of your health. That means your nutrition, your movement, your water intake, your sleep, all of these things will be working synergistically to help you live your best life.</p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="image-wrapper">
                <picture>
                    <source srcset="<?php echo keycdn_url() . 'assets/img/'; ?>mp-new-upgrade-tracker-min.webp" type="image/webp">
                    <img class="mx-auto d-block w-100" src="<?php echo keycdn_url() . 'assets/img/'; ?>mp-new-upgrade-tracker-min.png" alt="">
                </picture>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="image-wrapper">
                <picture>
                    <source srcset="<?php echo keycdn_url() . 'assets/img/'; ?>mp-new-upgrade-chart-min.webp" type="image/webp">
                    <img class="mx-auto d-block w-100" src="<?php echo keycdn_url() . 'assets/img/'; ?>mp-new-upgrade-chart-min.png" alt="">
                </picture>
            </div>
        </div>
        <div class="col-md-6">
            <div class="text-wrapper">
                <div class="circle-number upgrade-number-3">3</div>
                <h2 class="h4">Chart Your Progress </h2>
                <p>Measure your progress in real time, and know you're on schedule to reach your goal weight quickly. You'll be able to watch the curves and know ahead of time, how fast you'll lose the weight, and how soon you'll reach your goal.</p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="image-wrapper">
                <picture>
                    <source srcset="<?php echo keycdn_url() . 'assets/img/'; ?>mp-new-upgrade-premium-min.webp" type="image/webp">
                    <img class="mx-auto d-block w-100" src="<?php echo keycdn_url() . 'assets/img/'; ?>mp-new-upgrade-premium-min.png" alt="">
                </picture>
            </div>
        </div>
        <div class="col-md-6">
            <div class="text-wrapper">
                <p>And FEEL AMAZING!  We at Konscious Keto already know how great it feels to be on keto. This is a great inexpensive way to have a virtual 'buddy' helping you every step of the way.</p>
                <?php if ($obj_upgrade && $obj_upgrade->weeknum == 4 && $obj_upgrade->is_subscription && $obj_upgrade->upgrade_date) {//0 ~ 28 days ?>
                    <table class="p-3">
                        <tr class="border-bottom">
                            <td>Dynamic Meal Plan & Trackers:&nbsp;</td><td>$79/mo Regular Price</td>
                        </tr>                                        
                        <tr class="font-weight-bold color-green border-bottom">
                            <td class="pb-2">New Member Discount Applied:</td><td class="pb-2">Save 75%</td>
                        </tr>
                        <tr class="font-weight-bold color-red" style="border-top: 1px solid gray;">
                            <td class="pt-2">Your Premium Pricing:</td><td class="pt-2">$19/Mo</td>
                        </tr>
                    </table>
                    <a href="https://konsciousketo.com/a/secure/checkout/GplrhAU5wZnWBrlojYvN?email=<?php echo urlencode($this->session->userdata("email")); ?>" target="_blank" class="btn btn-danger w-100 pt-3 pb-3">Yes, Go Premium and Save 75% Instantly >></a>
                    <p class="text-center mt-3">You will be billed $1 admin fee to upgrade your account. Your membership will auto-renew every 28 days at $19 once your current membership runs out. No commitment, cancel anytime</p>
                <?php } else if ($obj_upgrade && $obj_upgrade->is_subscription && !$obj_upgrade->upgrade_date) {//28 days plus ?>
                    <table class="p-3">
                        <tr class="border-bottom">
                            <td>Dynamic Meal Plan & Trackers:&nbsp;</td><td>$39/mo Regular Price</td>
                        </tr>
                        <tr class="font-weight-bold color-red" style="border-top: 1px solid gray;">
                            <td class="pt-2">Your Premium Pricing:</td><td class="pt-2">$39/Mo</td>
                        </tr>
                    </table>
                    <a href="https://konsciousketo.com/a/secure/checkout/bZ4hqshMJYbQVGLS6pwV?email=<?php echo urlencode($this->session->userdata("email")); ?>" target="_blank" class="btn btn-danger w-100 pt-3 pb-3">Yes, Go Premium Now >></a>
                    <!--<p class="text-center mt-3">You will be billed $1 admin fee to upgrade your account. Your membership will auto-renew every 28 days at $39. No commitment, cancel anytime</p>-->
                <?php } else if ($obj_upgrade && $obj_upgrade->weeknum == 52 && !$obj_upgrade->is_subscription && $obj_upgrade->upgrade_date) { //1 year onetime ?>
                    <table class="p-3">
                        <tr class="border-bottom">
                            <td>Dynamic Meal Plan & Trackers:&nbsp;</td><td>$486/Year Value</td>
                        </tr>
                        <tr class="font-weight-bold border-bottom">
                            <td class="pb-2">Instant Savings:</td><td class="pb-2">Save 75%</td>
                        </tr>
                        <tr class="font-weight-bold color-red" style="border-top: 1px solid gray;">
                            <td class="pt-2">Your Price Today:</td><td class="pt-2">$125</td>
                        </tr>
                    </table>
                    <a href="https://konsciousketo.com/a/secure/checkout/xvBihBEYN2NZcawa4dHn?email=<?php echo urlencode($this->session->userdata("email")); ?>" target="_blank" class="btn btn-danger w-100 pt-3 pb-3">Yes, Claim An Entire Year For a Whopping 75% Off >></a>
                    <!--<p class="text-center mt-3">You will be billed $1 admin fee to upgrade your account.</p>-->
                <?php } ?>
            </div>
        </div>
    </div>
</div>