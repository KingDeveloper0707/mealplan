</div>
<!-- End of Main Content -->



</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Survey Modal-->
<div class="modal fade right mood" id="surveyModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-full-height modal-dialog-centered modal-right modal-notify modal-info modal-lg" role="document">
        <div class="modal-content">
            <!--Header-->
            <div class="modal-header border-bottom-0">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="white-text">×</span>
                </button>
            </div>

            <!--Body-->
            <div class="modal-body text-center d-flex align-items-center justify-content-center flex-column">
                <div class="text-center">
                    <div class="note-wrapper">
                        <h4>Your Feedback Is Important To Us</h4>
                        <label for="textarea-note">Please let us know how we can serve you better.</label>
                    </div>
                    <div class="mood-wrapper">
                        <h4>Your opinion counts!</h4>
                        <p>How was your overall experience today?</p>
                    </div>
                    <div class="thankyou-wrapper">
                        <h4>Thank you for your feedback!</h4>
                        <svg class="icon" width="56" height="54"><use xlink:href="#feedback-thankyou"></use></svg>
                    </div>
                </div>
                <form id="form-survey">
                    <div class="mood-wrapper">
                        <input type="hidden" name="customer_id" value="<?= $this->session->userdata('customer_id'); ?>">
                        <div class="form-check form-check-inline text-center">
                            <input class="form-check-input d-none" name="mood_id" type="radio" id="radio-poor" value="4">
                            <label class="form-check-label" for="radio-poor">
                                <svg class="icon" width="35" height="35" fill="#000000"><use xlink:href="#feedback-poor"></use></svg>
                                <p class="mt-1 mb-0">Poor</p>
                            </label>
                        </div>
                        <div class="form-check form-check-inline text-center">
                            <input class="form-check-input d-none" name="mood_id" type="radio" id="radio-ok" value="3">
                            <label class="form-check-label" for="radio-ok">
                                <svg class="icon" width="35" height="35" fill="#000000"><use xlink:href="#feedback-ok"></use></svg>
                                <p class="mt-1 mb-0">Just Ok</p>
                            </label>
                        </div>
                        <div class="form-check form-check-inline text-center">
                            <input class="form-check-input d-none" name="mood_id" type="radio" id="radio-good" value="2">
                            <label class="form-check-label" for="radio-good">
                                <svg class="icon" width="35" height="35" fill="#000000"><use xlink:href="#feedback-good"></use></svg>
                                <p class="mt-1 mb-0">Good</p>
                            </label>
                        </div>
                        <div class="form-check form-check-inline text-center">
                            <input class="form-check-input d-none" name="mood_id" type="radio" id="radio-great" value="1">
                            <label class="form-check-label" for="radio-great">
                                <svg class="icon" width="35" height="35" fill="#000000"><use xlink:href="#feedback-great"></use></svg>
                                <p class="mt-1 mb-0">Amazing</p>
                            </label>
                        </div>
                    </div>
                    <div class="note-wrapper">
                        <textarea class="form-control" id="textarea-note" name="note" row="5"></textarea>
                        <input type="submit" class="btn btn-primary mt-3" value="Submit" />
                    </div>
                </form>
            </div>
            <!--Footer-->
            <div class="modal-footer justify-content-center border-top-0 py-3">
            </div>
        </div>
    </div>
</div>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="<?= base_url() ?>admin/logout">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="<?php echo base_url(); ?>vendor/jquery/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?php echo base_url(); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?php echo base_url(); ?>assets/js/sb-admin-2.min.js"></script>

<?php if ($this->router->fetch_class() == "start" && $this->router->fetch_method() == "chart") { ?>
    <!-- Page level plugins -->
    <script src="<?php echo base_url(); ?>vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?php echo base_url(); ?>vendor/chart.js/demo/chart-area-demo.js"></script>
    <script src="<?php echo base_url(); ?>vendor/chart.js/demo/chart-pie-demo.js"></script>
<?php } ?>
<?php if ($this->router->fetch_class() == "settings") { ?>
    <!-- Page level plugins -->
    <script src="<?php echo base_url(); ?>vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?php echo base_url(); ?>vendor/datatables/datatables-demo.js"></script>
<?php } ?>

<script src="<?php echo base_url(); ?>vendor/slick/slick.js"></script>


<script src="https://fast.wistia.com/embed/medias/5nn914gwgm.jsonp" async></script><script src="https://fast.wistia.com/assets/external/E-v1.js" async></script>

<script>
    function base_url() {
<?php echo "return '" . base_url() . "';"; ?>
    }
</script>

<?php if ($this->router->fetch_method() == "index") { ?>
    <script src="<?php echo base_url(); ?>vendor/easydropdown/easydropdown.js"></script>
    <script src="<?php echo base_url(); ?>vendor/okshadow/okshadow.min.js"></script>

    <?php
    $weeknum = count($obj_mealplan) / 7 / 4;
    if ($weeknum > 1) {
        ?>
        <script>
        easydropdown('#week-select', {
        behavior: {
            liveUpdates: true
        },
        callbacks: {
            onOpen: () => weekselect_opened(),
            onClose: () => weekselect_closed()
        }
        });
        </script>
    <?php } ?>

    <script src="<?php echo base_url(); ?>assets/js/mealplan_update/survey.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/mealplan_update/mealplan.js"></script>
<?php } ?>
<?php if ($this->router->fetch_method() == "inbox") { ?>
    <script>
    var customer_id = <?= $this->session->userdata('customer_id'); ?>
    </script>
    <script src="<?php echo base_url(); ?>assets/js/mealplan_update/inbox.js"></script>    
<?php } ?>
<?php if ($this->router->fetch_method() == "resource") { ?>
    <script src="<?php echo base_url(); ?>assets/js/mealplan_update/resource.js"></script>
<?php } ?>

<?php if ($this->router->fetch_method() == "index" ||
        $this->router->fetch_method() == "account"
        ) { ?>
    <script src="<?php echo base_url(); ?>assets/js/mealplan_update/tooltip.js"></script>
<?php } ?>

<?php if ($this->router->fetch_method() == "account") { ?>
    <script src="<?php echo base_url(); ?>assets/js/mealplan_update/account.js"></script>
<?php } ?>

</body>

</html>