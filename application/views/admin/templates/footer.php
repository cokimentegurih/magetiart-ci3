<!-- ======= Footer ======= -->
<footer id="footer" class="footer">
    <div class="copyright">
        &copy; Copyright <strong><span>MagetiArt</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
        Designed by <a href="https://api.whatsapp.com/send/?phone=%2B6285853316491&text&type=phone_number&app_absent=0" target="_blank">Hanifa R</a>
    </div>
</footer><!-- End Footer -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="<?= base_url('public'); ?>/assets/vendor/apexcharts/apexcharts.min.js"></script>
<script src="<?= base_url('public'); ?>/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url('public'); ?>/assets/vendor/chart.js/chart.umd.js"></script>
<script src="<?= base_url('public'); ?>/assets/vendor/echarts/echarts.min.js"></script>
<script src="<?= base_url('public'); ?>/assets/vendor/quill/quill.min.js"></script>
<script src="<?= base_url('public'); ?>/assets/vendor/simple-datatables/simple-datatables.js"></script>
<script src="<?= base_url('public'); ?>/assets/vendor/tinymce/tinymce.min.js"></script>
<script src="<?= base_url('public'); ?>/assets/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="<?= base_url('public'); ?>/assets/js/main.js"></script>

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

<!-- Sweet Alert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    const base_url = '<?= base_url(); ?>';
</script>
<script src="<?= base_url('public/js/'); ?>admin/script.js"></script>

<?php if (isset($js)) : ?>
    <script src="<?= base_url('public/js/admin/' . $js) ?>"></script>
<?php endif; ?>



</body>

</html>