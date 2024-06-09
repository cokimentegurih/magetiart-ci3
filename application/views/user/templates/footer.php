<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

<!-- Template Main JS File -->
<script src="<?= base_url('public'); ?>/assets/js/main.js"></script>

<!-- Sweet Alert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    const base_url = '<?= base_url(); ?>';
</script>

<?php if (isset($js)) : ?>
    <script src="<?= base_url('public/js/' . $js) ?>"></script>
<?php endif; ?>
</body>

</html>