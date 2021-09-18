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

  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/landing/css/linearicons.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/landing/css/owl.carousel.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/landing/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/landing/css/nice-select.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/landing/css/magnific-popup.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/landing/css/bootstrap.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/landing/css/main.css">
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
</head>

<body>
  <div class="oz-body-wrap" style="height:100%" style="opacity:0;animation:fade-in 0.5s linear 0s;animation-fill-mode:forwards">
    <nav class="navbar navbar-expand-lg navbar-light bg-light" style="opacity:0;animation:fade-in 2s linear 0s;animation-fill-mode:forwards">
      <a class="navbar-brand" href="#">MAKS -</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Welcome</a>
          </li>
        </ul>
        <span class="navbar-text">
          Assisting you to get the information you need
        </span>
      </div>
    </nav>
    <section class="about-area pt-150 pb-150">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-12">
            <div class="story-content">
              <h2>We are sorry! <br>
              <p class="mt-30">Seems like we do not understand your request. Kindly ask the administrator to teach me more about your languages! I hope I could understand you soon enough.
              </p>
              <h5 class="sp-1">Please, Ask Me Here</h5>
              <form id="form_id" target="_blank" action="<?php echo base_url(); ?>welcome/process" method="POST">
                <input name="question" placeholder="Ask me here" id="search_text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Ask me here'" class="common-input mt-20" required="" type="text" style="color:black">
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</body>

</html>
<script src="<?php echo base_url(); ?>assets/landing/js/vendor/jquery-2.2.4.min.js"></script>
<script src="<?php echo base_url(); ?>assets/landing/js/vendor/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/landing/js/jquery.ajaxchimp.min.js"></script>
<script src="<?php echo base_url(); ?>assets/landing/js/owl.carousel.min.js"></script>
<script src="<?php echo base_url(); ?>assets/landing/js/jquery.nice-select.min.js"></script>
<script src="<?php echo base_url(); ?>assets/landing/js/jquery.magnific-popup.min.js"></script>
<script src="<?php echo base_url(); ?>assets/landing/js/jquery.counterup.min.js"></script>
<script src="<?php echo base_url(); ?>assets/landing/js/waypoints.min.js"></script>
<script src="<?php echo base_url(); ?>assets/landing/js/main.js"></script>