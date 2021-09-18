<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>

  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="shortcut icon" href="img/fav.png">

  <meta name="author" content="Colorlib">

  <meta name="description" content="">

  <meta name="keywords" content="">

  <meta charset="UTF-8">

  <title>CellOn</title>
  <link href="https://fonts.googleapis.com/css?family=Poppins:100,300,500" rel="stylesheet">

  <link rel="stylesheet" href="css/A.linearicons.css+owl.carousel.css+font-awesome.min.css+nice-select.css+magnific-popup.css+bootstrap.css+main.css,Mcc.HknRexy87D.css.pagespeed.cf.UoO8l8dr-Y.css" />
</head>

<body>
  <div class="oz-body-wrap">

    <header class="default-header">
      <div class="container-fluid">
        <div class="header-wrap">
          <div class="header-top d-flex justify-content-between align-items-center">
            <div class="logo">
              <a href="index.html">
                <script data-pagespeed-no-defer>
                  //<![CDATA[
                  (function() {
                    for (var g = "function" == typeof Object.defineProperties ? Object.defineProperty : function(b, c, a) {
                        if (a.get || a.set) throw new TypeError("ES3 does not support getters and setters.");
                        b != Array.prototype && b != Object.prototype && (b[c] = a.value)
                      }, h = "undefined" != typeof window && window === this ? this : "undefined" != typeof global && null != global ? global : this, k = ["String", "prototype", "repeat"], l = 0; l < k.length - 1; l++) {
                      var m = k[l];
                      m in h || (h[m] = {});
                      h = h[m]
                    }
                    var n = k[k.length - 1],
                      p = h[n],
                      q = p ? p : function(b) {
                        var c;
                        if (null == this) throw new TypeError("The 'this' value for String.prototype.repeat must not be null or undefined");
                        c = this + "";
                        if (0 > b || 1342177279 < b) throw new RangeError("Invalid count value");
                        b |= 0;
                        for (var a = ""; b;)
                          if (b & 1 && (a += c), b >>>= 1) c += c;
                        return a
                      };
                    q != p && null != q && g(h, n, {
                      configurable: !0,
                      writable: !0,
                      value: q
                    });
                    var t = this;

                    function u(b, c) {
                      var a = b.split("."),
                        d = t;
                      a[0] in d || !d.execScript || d.execScript("var " + a[0]);
                      for (var e; a.length && (e = a.shift());) a.length || void 0 === c ? d[e] ? d = d[e] : d = d[e] = {} : d[e] = c
                    };

                    function v(b) {
                      var c = b.length;
                      if (0 < c) {
                        for (var a = Array(c), d = 0; d < c; d++) a[d] = b[d];
                        return a
                      }
                      return []
                    };

                    function w(b) {
                      var c = window;
                      if (c.addEventListener) c.addEventListener("load", b, !1);
                      else if (c.attachEvent) c.attachEvent("onload", b);
                      else {
                        var a = c.onload;
                        c.onload = function() {
                          b.call(this);
                          a && a.call(this)
                        }
                      }
                    };
                    var x;

                    function y(b, c, a, d, e) {
                      this.h = b;
                      this.j = c;
                      this.l = a;
                      this.f = e;
                      this.g = {
                        height: window.innerHeight || document.documentElement.clientHeight || document.body.clientHeight,
                        width: window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth
                      };
                      this.i = d;
                      this.b = {};
                      this.a = [];
                      this.c = {}
                    }

                    function z(b, c) {
                      var a, d, e = c.getAttribute("data-pagespeed-url-hash");
                      if (a = e && !(e in b.c))
                        if (0 >= c.offsetWidth && 0 >= c.offsetHeight) a = !1;
                        else {
                          d = c.getBoundingClientRect();
                          var f = document.body;
                          a = d.top + ("pageYOffset" in window ? window.pageYOffset : (document.documentElement || f.parentNode || f).scrollTop);
                          d = d.left + ("pageXOffset" in window ? window.pageXOffset : (document.documentElement || f.parentNode || f).scrollLeft);
                          f = a.toString() + "," + d;
                          b.b.hasOwnProperty(f) ? a = !1 : (b.b[f] = !0, a = a <= b.g.height && d <= b.g.width)
                        } a && (b.a.push(e),
                        b.c[e] = !0)
                    }
                    y.prototype.checkImageForCriticality = function(b) {
                      b.getBoundingClientRect && z(this, b)
                    };
                    u("pagespeed.CriticalImages.checkImageForCriticality", function(b) {
                      x.checkImageForCriticality(b)
                    });
                    u("pagespeed.CriticalImages.checkCriticalImages", function() {
                      A(x)
                    });

                    function A(b) {
                      b.b = {};
                      for (var c = ["IMG", "INPUT"], a = [], d = 0; d < c.length; ++d) a = a.concat(v(document.getElementsByTagName(c[d])));
                      if (a.length && a[0].getBoundingClientRect) {
                        for (d = 0; c = a[d]; ++d) z(b, c);
                        a = "oh=" + b.l;
                        b.f && (a += "&n=" + b.f);
                        if (c = !!b.a.length)
                          for (a += "&ci=" + encodeURIComponent(b.a[0]), d = 1; d < b.a.length; ++d) {
                            var e = "," + encodeURIComponent(b.a[d]);
                            131072 >= a.length + e.length && (a += e)
                          }
                        b.i && (e = "&rd=" + encodeURIComponent(JSON.stringify(B())), 131072 >= a.length + e.length && (a += e), c = !0);
                        C = a;
                        if (c) {
                          d = b.h;
                          b = b.j;
                          var f;
                          if (window.XMLHttpRequest) f =
                            new XMLHttpRequest;
                          else if (window.ActiveXObject) try {
                            f = new ActiveXObject("Msxml2.XMLHTTP")
                          } catch (r) {
                            try {
                              f = new ActiveXObject("Microsoft.XMLHTTP")
                            } catch (D) {}
                          }
                          f && (f.open("POST", d + (-1 == d.indexOf("?") ? "?" : "&") + "url=" + encodeURIComponent(b)), f.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"), f.send(a))
                        }
                      }
                    }

                    function B() {
                      var b = {},
                        c;
                      c = document.getElementsByTagName("IMG");
                      if (!c.length) return {};
                      var a = c[0];
                      if (!("naturalWidth" in a && "naturalHeight" in a)) return {};
                      for (var d = 0; a = c[d]; ++d) {
                        var e = a.getAttribute("data-pagespeed-url-hash");
                        e && (!(e in b) && 0 < a.width && 0 < a.height && 0 < a.naturalWidth && 0 < a.naturalHeight || e in b && a.width >= b[e].o && a.height >= b[e].m) && (b[e] = {
                          rw: a.width,
                          rh: a.height,
                          ow: a.naturalWidth,
                          oh: a.naturalHeight
                        })
                      }
                      return b
                    }
                    var C = "";
                    u("pagespeed.CriticalImages.getBeaconData", function() {
                      return C
                    });
                    u("pagespeed.CriticalImages.Run", function(b, c, a, d, e, f) {
                      var r = new y(b, c, a, e, f);
                      x = r;
                      d && w(function() {
                        window.setTimeout(function() {
                          A(r)
                        }, 0)
                      })
                    });
                  })();

                  pagespeed.CriticalImages.Run('/mod_pagespeed_beacon', 'https://preview.colorlib.com/theme/cellon/', '-ilGEe-FWC', true, false, 'AoaZJjvW7gw');
                  //]]>
                </script><img src="data:image/webp;base64,UklGRrIBAABXRUJQVlA4TKUBAAAvL0AHEBejoG0bxlTLX9oloxiSJCn9WcZlnkNw7VJMiIPatk3rfVvNf5QX4UcwAtj22XsFkk+ghSayyKIP4Y5ulQt6ME644zqthQ6qKCJF2t8NYIM3bgBn3ACAcMcPTxwgzDFJ/AME/jACAQAOAC8YXwTABV+APwILAAEYQkAQhA+AAQIG+MMQgPCBYIAXDEMAHxgA/GCEAYJtW8ebV9tKbduxndQ25j+LvF+vHcC9Ef1n5LaNI3p78Wk3jxCEq8W8QS6306KTvc4b5T6lnebNsqV95kk+vgfJ1y/JSp4Xas1VGvZlniSXhkYADEtvD8m+5jYALaJylycBAPE8Sb7JyjLJybFBkqMy0A+gu6sJQKebhAA4VuqyZmaHKsl1C+EYyW8tOm5B5Vk3nYfM3FLlaMpMRTcdzJgpU2V31rcOFx7ZXPCt3a+NxX8vwInvR+YCsC5q9/udHE6bedFNZyEzP7opMmHG8R8l1i2EYyRP1FqTNQsJtznwKqs2XObMXoA50+omAwD4anj65cd7sJTyrP/VnMzeWK0PKQ3hSsHi6GpHz3kAAA==" alt="" data-pagespeed-url-hash="1560696361" onload="pagespeed.CriticalImages.checkImageForCriticality(this);">
              </a>
            </div>
            <div class="main-menubar d-flex align-items-center">
              <nav class="hide">
                <a href="index.html">Home</a>
                <a href="generic.html">Generic</a>
                <a href="elements.html">Elements</a>
              </nav>
              <div class="menu-bar"><span class="lnr lnr-menu"></span></div>
            </div>
          </div>
        </div>
      </div>
    </header>


    <section class="banner-area relative">
      <div class="container">
        <div class="row fullscreen align-items-center justify-content-center">
          <div class="banner-left col-lg-6">
            <img class="d-flex mx-auto img-fluid" src="img/xheader-img.png.pagespeed.ic.Y7ogmj4uJm.webp" alt="" data-pagespeed-url-hash="1837489501" onload="pagespeed.CriticalImages.checkImageForCriticality(this);">
          </div>
          <div class="col-lg-6">
            <div class="story-content">
              <h6 class="text-uppercase">From the for User interface</h6>
              <h1>Behind Every <span class="sp-1">Success</span><br>
                There is a <span class="sp-2">Cactus</span></h1>
              <a href="#" class="genric-btn primary circle arrow">Get Started<span class="lnr lnr-arrow-right"></span></a>
            </div>
          </div>
        </div>
      </div>
    </section>


    <section class="video-area pt-40 pb-40">
      <div class="overlay overlay-bg"></div>
      <div class="container">
        <div class="video-content">
          <a href="https://www.youtube.com/watch?v=0O2aH4XLbto" class="play-btn"><img src="img/xplay-btn.png.pagespeed.ic.0ptiWjKoU4.webp" alt="" data-pagespeed-url-hash="1966597981" onload="pagespeed.CriticalImages.checkImageForCriticality(this);"></a>
          <div class="video-desc">
            <h3 class="h2 text-white text-uppercase">Being unique is the preference</h3>
            <h4 class="text-white">Youtube video will appear in popover</h4>
          </div>
        </div>
      </div>
    </section>


    <section class="about-area pt-100 pb-100">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-6">
            <div class="story-content">
              <h2>Brief Information <br>
                About <span>CellOn</span></h2>
              <p class="mt-30">Few would argue that, despite the advancements of feminism over the past three decades, women still face a double standard when it comes to their behavior. While men’s borderline-inappropriate behavior is often laughed off as “boys will be boys,” women face higher conduct standards – especially in the workplace. <br> <br>
                While men’s borderline-inappropriate behavior is often laughed off as “boys will be boys,”
              </p>
              <a href="#" class="genric-btn primary-border circle arrow">View More<span class="lnr lnr-arrow-right"></span></a>
            </div>
          </div>
          <div class="col-lg-6">
            <img class="img-fluid d-flex mx-auto" src="img/xabout.png.pagespeed.ic.UDH9Ak_ME0.webp" alt="" data-pagespeed-url-hash="3303824953" onload="pagespeed.CriticalImages.checkImageForCriticality(this);">
          </div>
        </div>
      </div>
    </section>


    <section class="feature-area pt-100 pb-100  relative">
      <div class="overlay overlay-bg"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-4 col-sm-6 d-flex align-items-stretch">
            <div class="single-feature">
              <div class="icon">
                <span class="lnr lnr-laptop-phone"></span>
              </div>
              <div class="desc">
                <h2 class="text-uppercase">3 Simple Ways To Save <br> A Bunch Of Money</h2>
                <p>
                  Computer users and programmers have become so accustomed to using Windows, even for the changing
                </p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-sm-6 d-flex align-items-stretch">
            <div class="single-feature">
              <div class="icon">
                <span class="lnr lnr-graduation-hat"></span>
              </div>
              <div class="desc">
                <h2 class="text-uppercase">Baby Monitor <br>Learning Technology</h2>
                <p>
                  While most people enjoy casino gambling, sports betting, lottery and bingo playing for the fun and excitemen
                </p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-sm-6 d-flex align-items-stretch">
            <div class="single-feature">
              <div class="icon">
                <span class="lnr lnr-phone"></span>
              </div>
              <div class="desc">
                <h2 class="text-uppercase">How Does An Lcd
                  <br>Screen Work
                </h2>
                <p>
                  It is a good idea to think of your PC as an office. It stores files, programs, pictures. This can be compared to an actual
                </p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-sm-6 d-flex align-items-stretch">
            <div class="single-feature">
              <div class="icon">
                <span class="lnr lnr-laptop"></span>
              </div>
              <div class="desc">
                <h2 class="text-uppercase">The Skinny On Lcd <br>Monitors</h2>
                <p>
                  Computers have become ubiquitous in almost every facet of our lives. At work, desk jockeys spend hours in front of their
                </p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-sm-6 d-flex align-items-stretch">
            <div class="single-feature">
              <div class="icon">
                <span class="lnr lnr-heart"></span>
              </div>
              <div class="desc">
                <h2 class="text-uppercase">For Women Only Your<br>Computer Usage</h2>
                <p>
                  About 64% of all on-line teens say that do things online that they wouldn’t want their parents to know about. 11% of all
                </p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-sm-6 d-flex align-items-stretch">
            <div class="single-feature">
              <div class="icon">
                <span class="lnr lnr-screen"></span>
              </div>
              <div class="desc">
                <h2 class="text-uppercase">5 Reasons To Purchase<br> Desktop Computers</h2>
                <p>
                  So you have your new digital camera and clicking away to glory anything and everything in sight. Now you want to print
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>


    <section class="faq-area pt-100 pb-100">
      <div class="container">
        <div class="row">
          <div class="counter-left col-lg-3 col-md-3">
            <div class="single-facts">
              <h2 class="counter">5962</h2>
              <p>Projects Completed</p>
            </div>
            <div class="single-facts">
              <h2 class="counter">2394</h2>
              <p>New Projects</p>
            </div>
            <div class="single-facts">
              <h2 class="counter">1439</h2>
              <p>Tickets Submitted</p>
            </div>
            <div class="single-facts">
              <h2 class="counter">933</h2>
              <p>Cup of Coffee</p>
            </div>
          </div>
          <div class="faq-content col-lg-9 col-md-9">
            <div class="single-faq">
              <h2 class="text-uppercase">
                Are your Templates responsive?
              </h2>
              <p>
                “Few would argue that, despite the advancements of feminism over the past three decades, women still face a double standard when it comes to their behavior. While men’s borderline-inappropriate behavior.
              </p>
            </div>
            <div class="single-faq">
              <h2 class="text-uppercase">
                Does it have all the plugin as mentioned?
              </h2>
              <p>
                “Few would argue that, despite the advancements of feminism over the past three decades, women still face a double standard when it comes to their behavior. While men’s borderline-inappropriate behavior.
              </p>
            </div>
            <div class="single-faq">
              <h2 class="text-uppercase">
                Can i use the these theme for my client?
              </h2>
              <p>
                “Few would argue that, despite the advancements of feminism over the past three decades, women still face a double standard when it comes to their behavior. While men’s borderline-inappropriate behavior.
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>


    <section class="contact-area pt-100 pb-100 relative">
      <div class="overlay overlay-bg"></div>
      <div class="container">
        <div class="row justify-content-center text-center">
          <div class="single-contact col-lg-6 col-md-8">
            <h2 class="text-white">Send Us <span>Message</span></h2>
            <p class="text-white">
              Most people who work in an office environment, buy computer products.
            </p>
          </div>
        </div>
        <form id="myForm" action="mail.php" method="post" class="contact-form">
          <div class="row justify-content-center">
            <div class="col-lg-5">
              <input name="fname" placeholder="Enter your name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'" class="common-input mt-20" required type="text">
            </div>
            <div class="col-lg-5">
              <input name="email" placeholder="Enter email address" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'" class="common-input mt-20" required type="email">
            </div>
            <div class="col-lg-10">
              <textarea class="common-textarea mt-20" name="message" placeholder="Messege" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Messege'" required></textarea>
            </div>
            <div class="col-lg-10 d-flex justify-content-end">
              <button class="primary-btn white-bg d-inline-flex align-items-center mt-20"><span class="mr-10">Send Message</span><span class="lnr lnr-arrow-right"></span></button> <br>
            </div>
            <div class="alert-msg"></div>
          </div>
        </form>
      </div>
    </section>


    <footer class="section-gap">
      <div class="container">
        <div class="row pt-60">
          <div class="col-lg-3 col-sm-6">
            <div class="single-footer-widget">
              <h6 class="text-uppercase mb-20">Top Product</h6>
              <ul class="footer-nav">
                <li><a href="#">Managed Website</a></li>
                <li><a href="#">Manage Reputation</a></li>
                <li><a href="#">Power Tools</a></li>
                <li><a href="#">Marketing Service</a></li>
              </ul>
            </div>
          </div>
          <div class="col-lg-3 col-sm-6">
            <div class="single-footer-widget">
              <h6 class="text-uppercase mb-20">Navigation</h6>
              <ul class="footer-nav">
                <li><a href="#">Home</a></li>
                <li><a href="#">Main Features</a></li>
                <li><a href="#">Offered Services</a></li>
                <li><a href="#">Latest Portfolio</a></li>
              </ul>
            </div>
          </div>
          <div class="col-lg-3 col-sm-6">
            <div class="single-footer-widget">
              <h6 class="text-uppercase mb-20">Compare</h6>
              <ul class="footer-nav">
                <li><a href="#">Works & Builders</a></li>
                <li><a href="#">Works & Wordpress</a></li>
                <li><a href="#">Works & Templates</a></li>
              </ul>
            </div>
          </div>
          <div class="col-lg-3 col-sm-6">
            <div class="single-footer-widget">
              <h6 class="text-uppercase mb-20">Quick About</h6>
              <p>
                Lorem ipsum dolor sit amet, consecteturadipisicin gelit, sed do eiusmod tempor incididunt.
              </p>
              <p>
                +00 012 6325 98 6542 <br>
                <a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="b6c5c3c6c6d9c4c2f6d5d9dad9c4dadfd498d5d9db">[email&#160;protected]</a>
              </p>
              <div class="footer-social d-flex align-items-center">
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-dribbble"></i></a>
                <a href="#"><i class="fa fa-behance"></i></a>
              </div>
            </div>
          </div>
        </div>
        <div class="footer-bottom d-flex justify-content-between align-items-center flex-wrap">

          <p class="footer-text m-0">Copyright &copy;<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
            <script>
              document.write(new Date().getFullYear());
            </script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
          </p>

        </div>
      </div>
    </footer>

  </div>
  <script src="js/vendor/jquery-2.2.4.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
  <script src="js/vendor,_bootstrap.min.js+jquery.ajaxchimp.min.js.pagespeed.jc.7HTWxdWLJy.js"></script>
  <script>
    eval(mod_pagespeed_K1gBETgrd4);
  </script>
  <script>
    eval(mod_pagespeed_PwJ_cyLozr);
  </script>
  <script src="js/owl.carousel.min.js+jquery.nice-select.min.js+jquery.magnific-popup.min.js+jquery.counterup.min.js+waypoints.min.js+main.js.pagespeed.jc.3ZKPf2gPqO.js"></script>
  <script>
    eval(mod_pagespeed_3nnBF5XyY2);
  </script>
  <script>
    eval(mod_pagespeed_dXG9npI8LL);
  </script>
  <script>
    eval(mod_pagespeed_W0K57e$CIv);
  </script>
  <script>
    eval(mod_pagespeed_wC1xva22qX);
  </script>
  <script>
    eval(mod_pagespeed_Fvv9pgjHUj);
  </script>
  <script>
    eval(mod_pagespeed_AF_b7ojNDZ);
  </script>

  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'UA-23581568-13');
  </script>
  <script defer src="https://static.cloudflareinsights.com/beacon.min.js" data-cf-beacon='{"rayId":"69094b4d9d8735b0","token":"cd0b4b3a733644fc843ef0b185f98241","version":"2021.8.1","si":10}'></script>
</body>

</html>