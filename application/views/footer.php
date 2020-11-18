<?php if ($this->router->fetch_class() != "mealplan") { ?>
    </header>
    <?php if ($this->router->fetch_class() == "landing" || $this->router->fetch_class() == "pricing") { ?>
        <footer class="d-block" style="font-size: .875rem;">
            <div class="container">
                <div class="row" style="justify-content: center;">
                    <div class="col-md-3">
                        <?php
                        $logo_clickable = false;
                        if ($this->router->fetch_class() == "landing" && isset($_GET['v']) && $_GET['v'] == "lc") {
                            $logo_clickable = true;
                        }
                        ?>                        
                        <a class="js-scroll-trigger logo logo-black" href="<?php echo $logo_clickable ? 'https://konsciousketo.com/pages/philosophy' :'#page-top';?>" <?php echo $logo_clickable ? 'target="_blank" style="pointer-events:auto;cursor:pointer"' :'';?>>
                            <svg class="icon" width="30" height="30" fill="black" stroke="black">
                            <use xlink:href="#logo"></use>
                            </svg>
                            <span>KONSCIOUS</span>
                        </a>
                    </div>
                    <div class="col-md-2 mt-1 d-none">
                        <a class="" target="_blank" href="https://konsciousketo.com/pages/contact-us">Contacts</a>
                    </div>
                    <div class="col-md-2 mt-1">
                        <a class="" target="_blank" href="https://konsciousketo.com/pages/privacy-policy">Privacy Policy</a>
                    </div>
                    <div class="col-md-3 mt-1">
                        <a class="" target="_blank" href="https://konsciousketo.com/pages/terms-conditions">Terms & Conditions</a>
                    </div>
                    <div class="col-md-3 mt-1 d-none">
                        <a class="" target="_blank" href="https://konsciousketo.com/pages/shipping-refund-policy">Billing & Refund Policy</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 mt-4">
                        © 2020 Konscious Keto. All rights reserved.
                    </div>
                </div>
                <?php if ($this->router->fetch_class() == "landing") { ?>
                    <div class="row">
                        <div class="col-12 mt-4">
                            *Statements regarding your profile and the results of our quiz have not been evaluated by the Food and Drug Administration. This product is not intended to diagnose, treat, cure or prevent any disease. You should consult with a medical professional before starting any diet or weight loss program.
                        </div>
                    </div>
                <?php } else if ($this->router->fetch_class() == "pricing") { ?>
                    <div class="row">
                        <div class="col-12 mt-4">
                            *Statements regarding your profile and the results of our quiz have not been evaluated by the Food and Drug Administration. This product is not intended to diagnose, treat, cure or prevent any disease. You should consult with a medical professional before starting any diet or weight loss program.  Individual results may vary, and testimonials are not claimed to represent typical results. All testimonials are by real people, and may not reflect the typical purchaser’s experience, and are not intended to represent or guarantee that anyone will achieve the same or similar results.
                        </div>
                    </div>
                <?php } ?>
            </div>
        </footer>
    <?php } ?>
<?php } ?>

<?php if ($this->router->fetch_class() != "landing") { ?>
    <!-- Bootstrap core JavaScript -->
    <script src="<?php echo base_url(); ?>vendor/jquery/jquery.min.js"></script>
    <?php
    if (
            $this->router->fetch_class() == "pricing" ||
            $this->router->fetch_class() == "mealplan"
    ) {
        ?>
        <script src="<?php echo base_url(); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <?php } ?>
    <!-- Plugin JavaScript -->
    <?php if ($this->router->fetch_class() == "quiz") { ?>
        <script src="<?php echo base_url(); ?>vendor/jquery-easing/jquery.easing.min.js"></script>
        <script src="<?php echo base_url(); ?>vendor/progressbar/progressbar.min.js"></script>
    <?php } ?>
<?php } ?>

<?php if ($this->router->fetch_class() == "mealplan" || $this->router->fetch_class() == "startnow") { ?>
    <script src="<?php echo base_url(); ?>vendor/slick/slick.js"></script>
<?php } ?>
<?php if ($this->router->fetch_class() == "mealplan") { ?>
    <script src="<?php echo base_url(); ?>vendor/easydropdown/easydropdown.js"></script>
    <script src="<?php echo base_url(); ?>vendor/okshadow/okshadow.min.js"></script>


    <script>
        easydropdown.all({
            behavior: {
                liveUpdates: true
            }
        });
    </script>
<?php } ?>
<?php
if ($this->router->fetch_class() == "pricing" ||
        $this->router->fetch_class() == "mealplan") {
    ?>
    <script src="https://fast.wistia.com/embed/medias/5nn914gwgm.jsonp" async></script><script src="https://fast.wistia.com/assets/external/E-v1.js" async></script>
<?php } ?>

<?php
if ($this->router->fetch_class() == "pricing") {
    ?>
    <script async src="//loox.io/widget/loox.js?shop=konsciousketo.myshopify.com"></script>
<?php } ?>

<!-- Custom scripts for this template -->
<script>
        function base_url() {
<?php echo "return '" . base_url() . "';"; ?>
        }
</script>

<?php if ($this->router->fetch_class() != "landing") { ?>
    <script src="<?php echo base_url(); ?>assets/js/main.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/profilesummary.js"></script>
<?php } ?>
<?php if ($this->router->fetch_class() == "mealplan") { ?>
    <script src="<?php echo base_url(); ?>assets/js/mealplan.js"></script>
<?php } ?>
<?php if ($this->router->fetch_class() == "startnow") { ?>
    <script src="<?php echo base_url(); ?>assets/js/presell.js"></script>
<?php } ?>




<!--adroll pixel-->
<!--adroll pixel end-->

</body>

</html>
