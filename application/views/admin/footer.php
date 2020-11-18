</div>
<!-- End of Main Content -->

<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; SimpleKetoSystem Admin 2020</span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

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

<script>
    function base_url() {
<?php echo "return '" . base_url() . "';"; ?>
    }
</script>

<?php if ($this->router->fetch_class() == "start") { ?>
    <!-- Page level plugins -->
    <script src="<?php echo base_url(); ?>vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?php echo base_url(); ?>vendor/chart.js/demo/chart-area-demo.js"></script>
    <script src="<?php echo base_url(); ?>vendor/chart.js/demo/chart-pie-demo.js"></script>
<?php } ?>
<?php
if (
        $this->router->fetch_class() == "settings" ||
        (($this->router->fetch_class() == "tasks") && ($this->router->fetch_method() == "faq_comment"))
) {
    ?>
    <!-- Page level plugins -->
    <script src="<?php echo base_url(); ?>vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?php echo base_url(); ?>vendor/datatables/datatables-demo.js"></script>
<?php } ?>


<?php if ($this->router->fetch_class() == "tasks") { ?>
    <?php if ($this->router->fetch_method() == "quiz") { ?>
        <script src="<?php echo base_url(); ?>assets/js/admin_quiz.js"></script>
    <?php } ?>
    <?php if ($this->router->fetch_method() == "recover") { ?>
        <script src="<?php echo base_url(); ?>assets/js/admin_recover.js"></script>
    <?php } ?>
    <?php if ($this->router->fetch_method() == "purchase_date") { ?>
        <script src="<?php echo base_url(); ?>assets/js/admin_purchase_date.js"></script>
    <?php } ?>
<?php } ?>

<?php if ($this->router->fetch_class() == "tasks") { ?>
    <?php if ($this->router->fetch_method() == "email_manager") { ?>
        <script>
        ClassicEditor
            .create(document.querySelector('#ckeditor'), {
                alignment: {
                    options: ['left', 'right', 'center']
                },
                toolbar: [
                    'heading', '|', 'bulletedList', 'numberedList', 'alignment', 'undo', 'redo'
                ]
            })
            .catch(error => {
                console.error(error);
            });
        </script>
    <?php } ?>
<?php } ?>

</body>

</html>