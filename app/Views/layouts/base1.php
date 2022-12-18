<html>
    <head>
        <title><?=esc($title);?></title>

        <link rel="stylesheet" type="text/css" href="<?= base_url();?>/public/assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url();?>/public/assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url();?>/public/assets/css/style.css">
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url();?>/public/assets/img/logo-dark1.jpg">
    <!--[if lt IE 9]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
	<![endif]-->
        <style>
    .bg-login{
            background-image:linear-gradient(rgba(0, 0, 0, 0.4),rgba(0, 0, 0, 0.9)),url(<?= base_url();?>/public/assets/img/bg.webp);
            background-size: cover;
            background-attachment: fixed;

        }
        </style>
</head>

<body>
     <div class="loader"></div>
    <?= $this->renderSection('content'); ?>
    
    <script src="<?= base_url();?>/public/assets/js/jquery-3.2.1.min.js"></script>
	<script src="<?= base_url();?>/public/assets/js/popper.min.js"></script>
    <script src="<?= base_url();?>/public/assets/js/bootstrap.min.js"></script>
    <script src="<?= base_url();?>/public/assets/js/app.js"></script>

    <script>
        $(window).on("load", function () {
          $(".loader").fadeOut("slow");
        });
    </script>
</body>
</html>




