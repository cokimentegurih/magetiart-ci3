<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title><?= $title; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <!-- Bootstrap Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" />

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400;500;600;700;800&display=swap" rel="stylesheet" />

    <!-- Template Main CSS File -->
    <link href="<?= base_url('public'); ?>/assets/css/style.css" rel="stylesheet">

    <!-- Sweet Alert -->
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.5/dist/sweetalert2.min.css" rel="stylesheet">

    <!-- My CSS -->
    <?php if (isset($css)) : ?>
        <link rel="stylesheet" href="<?= base_url('public/css/' . $css); ?>" />
    <?php endif; ?>

    <!-- AlpineJS -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

</head>

<body>