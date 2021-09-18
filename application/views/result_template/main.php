<html class="no-js">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="shortcut icon" href="img/fav.png">
  <meta name="author" content="Joshua Natan">
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta charset="UTF-8">
  <title>MAKS</title>

  <link href="https://fonts.googleapis.com/css?family=Poppins:100,300,500" rel="stylesheet">


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
  <style>
    @keyframes fade-in {
      from {
        opacity: 0;
      }

      to {
        opacity: 1;
      }
    }
  </style>
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/landing/css/linearicons.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/landing/css/owl.carousel.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/landing/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/landing/css/nice-select.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/landing/css/magnific-popup.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/landing/css/bootstrap.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/landing/css/main.css">
</head>

<body>
  <div class="oz-body-wrap" style="height:100%" style="opacity:0;animation:fade-in 0.5s linear 0s;animation-fill-mode:forwards">
    <section class="about-area pt-150 pb-150">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-12">
            <div class="story-content">
              <h2>There you go! <br>
                <p class="mt-30">Hope my answer is helping you.
                </p>
                <h5 class="sp-1">Please, Ask Me Here</h5>
                <form id="form_id" action="<?php echo base_url(); ?>welcome/process" method="POST">
                  <input name="question" placeholder="Ask me here" id="search_text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Ask me here'" class="common-input mt-20" value = "<?php echo $search;?>" required="" type="text" style="color:black">
                </form>
            </div>
          </div>
        </div>
        <hr/>
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

    <script src="<?php echo base_url(); ?>assets/js/script-init.js"></script>


    <script src="<?php echo base_url(); ?>assets/landing/js/vendor/jquery-2.2.4.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/landing/js/vendor/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/landing/js/jquery.ajaxchimp.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/landing/js/owl.carousel.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/landing/js/jquery.nice-select.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/landing/js/jquery.magnific-popup.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/landing/js/jquery.counterup.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/landing/js/waypoints.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/landing/js/main.js"></script>
        <?php
        $this->load->view("plugin/chart-js/chart-js-js");
        ?>
        <?php
        if(count($widget) > 0){
          $widget = array(
            "data" => $widget
          );
          $this->load->view("result_template/widget", $widget);
        }
        if(count($chart) > 0){
          $chart = array(
            "data" => $chart
          );
          $this->load->view("result_template/chart", $chart);
        }
        if(count($table) > 0){
          $table = array(
            "data" => $table
          );
          $this->load->view("result_template/table", $table);
        }
        ?>
      </div>
    </section>
  </div>
</body>

</html>