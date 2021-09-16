<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="ADVANCE SUPPORT SYSTEM FOR DATA PROCESSING">
  <meta name="author" content="Joshua Natan W">

  <title>ADVANCED SUPPORT FOR DATA PROCESSING SYSTEM</title>

  <link rel="apple-touch-icon" href="<?php echo base_url(); ?>assets/images/apple-touch-icon.png">
  <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/favicon.ico">

  <!-- Stylesheets -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/global/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/global/css/bootstrap-extend.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/site.min.css">

  <!-- Plugins -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/global/vendor/animsition/animsition.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/global/vendor/asscrollable/asScrollable.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/global/vendor/switchery/switchery.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/global/vendor/intro-js/introjs.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/global/vendor/slidepanel/slidePanel.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/global/vendor/flag-icon-css/flag-icon.css">

  <!-- Fonts -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/global/fonts/web-icons/web-icons.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/global/fonts/brand-icons/brand-icons.min.css">
  <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic'>


  <!-- Scripts -->
  <script src="<?php echo base_url(); ?>assets/global/vendor/breakpoints/breakpoints.js"></script>
  <script>
    Breakpoints();
  </script>
</head>

<body class="animsition dashboard site-menubar-hide site-menubar-unfold">
  <div class="page">
    <div class="panel">
      <div class="panel-body container-fluid">
        <script src="<?php echo base_url(); ?>assets/global/vendor/babel-external-helpers/babel-external-helpers.js"></script>
        <script src="<?php echo base_url(); ?>assets/global/vendor/jquery/jquery.js"></script>
        <script src="<?php echo base_url(); ?>assets/global/vendor/popper-js/umd/popper.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/global/vendor/bootstrap/bootstrap.js"></script>
        <script src="<?php echo base_url(); ?>assets/global/vendor/animsition/animsition.js"></script>
        <script src="<?php echo base_url(); ?>assets/global/vendor/mousewheel/jquery.mousewheel.js"></script>
        <script src="<?php echo base_url(); ?>assets/global/vendor/asscrollbar/jquery-asScrollbar.js"></script>
        <script src="<?php echo base_url(); ?>assets/global/vendor/asscrollable/jquery-asScrollable.js"></script>

        <!-- Plugins -->
        <script src="<?php echo base_url(); ?>assets/global/vendor/switchery/switchery.js"></script>
        <script src="<?php echo base_url(); ?>assets/global/vendor/intro-js/intro.js"></script>
        <script src="<?php echo base_url(); ?>assets/global/vendor/screenfull/screenfull.js"></script>
        <script src="<?php echo base_url(); ?>assets/global/vendor/slidepanel/jquery-slidePanel.js"></script>

        <!-- Scripts -->
        <script src="<?php echo base_url(); ?>assets/global/js/Component.js"></script>
        <script src="<?php echo base_url(); ?>assets/global/js/Plugin.js"></script>
        <script src="<?php echo base_url(); ?>assets/global/js/Base.js"></script>
        <script src="<?php echo base_url(); ?>assets/global/js/Config.js"></script>

        <script src="<?php echo base_url(); ?>assets/js/Section/Menubar.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/Section/Sidebar.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/Section/PageAside.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/Plugin/menu.js"></script>

        <!-- Config -->
        <script src="<?php echo base_url(); ?>assets/global/js/config/colors.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/config/tour.js"></script>
        <script>
          Config.set('assets', '<?php echo base_url(); ?>assets');
        </script>

        <!-- Page -->
        <script src="<?php echo base_url(); ?>assets/js/Site.js"></script>
        <script src="<?php echo base_url(); ?>assets/global/js/Plugin/asscrollable.js"></script>
        <script src="<?php echo base_url(); ?>assets/global/js/Plugin/slidepanel.js"></script>
        <script src="<?php echo base_url(); ?>assets/global/js/Plugin/switchery.js"></script>

        <!-- Init -->
        <script src="<?php echo base_url(); ?>assets/js/script-init.js"></script>
        <?php
        $this->load->view("plugin/chart-js/chart-js-js");
        ?>

        <?php
        $this->load->view("result_template/widget");
        $this->load->view("result_template/chart");
        $this->load->view("result_template/table");
        ?>

      </div>
    </div>
  </div>
</body>

</html>