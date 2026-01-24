 <!--End Clients Section -->

  <!-- Main Footer -->
  <footer class="main-footer footer-style-one">
    <div class="bg bg-image" style="background-image: url(frontend/assets/images/background/6.jpg)"></div>
    <div class="icon-turbines-7"></div>

    <!-- Footer Top -->
    <div class="footer-top">
      <div class="auto-container">
        <div class="outer-box">

          <!-- Top Left -->
          <div class="top-left">
            <div class="logo"><img src="frontend/assets/images/logo-2.png" alt="Logo" title="Soliur"></div>
          </div>

          <!-- Top Right -->
          <div class="top-right">
            <ul class="social-icon-two">
              <li class="title">Follow Us On</li>
              <li><a href="#"><i class="icon fab fa-facebook-f"></i></a></li>
              <li><a href="#"><i class="icon fa fa-x"></i></a></li>
              <li><a href="#"><i class="icon fab fa-linkedin-in"></i></a></li>
              <li><a href="#"><i class="icon fab fa-pinterest"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <!-- Widgets Section -->
    <div class="widgets-section">
      <div class="auto-container">
        <div class="row">

          <!-- Footer Column -->
          <div class="footer-column col-xl-4 col-lg-6 col-md-6 col-sm-12">
            <div class="footer-widget contact-widget">
              <h5 class="widget-title">Contact</h5>
              <div class="widget-content">
                <ul class="contact-list-two light">
                  <li><i class="fal fa-map-marker-alt mt-1"></i> 13005 Greenville Xblock <br> Street WA 98370 United State</li>
                  <li><i class="fal fa-phone"></i> <a href="tel:+11234562228">(+1 123 456 2228)</a></li>
                  <li><i class="fal fa-envelope"></i> <a href="https://html.kodesolution.com/cdn-cgi/l/email-protection#fc95929a93bc99849d918c9099d29f9391"><span class="__cf_email__" data-cfemail="ed84838b82ad88958c809d8188c38e8280">[email&#160;protected]</span></a></li>
                </ul>
              </div>
            </div>
          </div>

          <!-- Footer Column -->
          <div class="footer-column col-xl-2 col-lg-6 col-md-6 col-sm-12">
            <div class="footer-widget links-widget">
              <h5 class="widget-title">Quick Links</h5>
              <div class="widget-content">
                <ul class="user-links">
                  <li><i class="icon fa fa-angle-right"></i> <a href="#">Home</a></li>
                  <li><i class="icon fa fa-angle-right"></i> <a href="#">About Us</a></li>
                  <li><i class="icon fa fa-angle-right"></i> <a href="#">Our Services</a></li>
                  <li><i class="icon fa fa-angle-right"></i> <a href="#">News</a></li>
                  <li><i class="icon fa fa-angle-right"></i> <a href="#">Policy</a></li>
                </ul>
              </div>
            </div>
          </div>

          <!-- Footer COlumn -->
          <div class="footer-column col-xl-2 col-lg-6 col-md-6 col-sm-12">
            <div class="footer-widget links-widget">
              <h5 class="widget-title">Company</h5>
              <div class="widget-content">
                <ul class="user-links">
                  <li><i class="icon fa fa-angle-right"></i> <a href="#">Team</a></li>
                  <li><i class="icon fa fa-angle-right"></i> <a href="#">About Us</a></li>
                  <li><i class="icon fa fa-angle-right"></i> <a href="#">Career</a></li>
                  <li><i class="icon fa fa-angle-right"></i> <a href="#">Privacy</a></li>
                  <li><i class="icon fa fa-angle-right"></i> <a href="#">Contact Us</a></li>
                </ul>
              </div>
            </div>
          </div>

          <!-- Footer COlumn -->
          <div class="footer-column col-xl-4 col-lg-6 col-md-6 col-sm-12">
            <div class="footer-widget newsletter-widget">
              <h5 class="widget-title">Newsletter</h5>
              <div class="text">Sign up for alerts, our latest blogs, <br> thoughts, and insights.</div>

              <!-- Newsletter Form -->
              <div class="newsletter-form">

                <form method="post" action="{{ route('newsletter.subscribe') }}">
                @csrf
                    <div class="form-group">
                    <div class="input-outer">
                      <span class="icon fal fa-envelope"></span>
                      <input type="email" name="email" placeholder="Your Email" required>
                    </div>
                    <button type="submit" class="theme-btn btn-style-one bg-orange"><span class="btn-title">Subscribe now</span></button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!--  Footer Bottom -->
    <div class="footer-bottom">
      <div class="auto-container">
        <div class="inner-container">
        </div>
      </div>
    </div>
  </footer>
  <!--End Main Footer -->


</div><!-- End Page Wrapper -->

<!-- Scroll To Top -->
<div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-angle-up"></span></div>

<!-- Cloudflare -->
<script data-cfasync="false"
    src="https://cdnjs.cloudflare.com/ajax/libs/cloudflare-email-decode/1.0.0/email-decode.min.js">
</script>

<!-- Core JS -->
<script src="{{ asset('frontend/assets/js/jquery.js') }}"></script>
<script src="{{ asset('frontend/assets/js/popper.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/bootstrap.min.js') }}"></script>

<!-- Revolution Slider -->
<script src="{{ asset('frontend/assets/plugins/revolution/js/jquery.themepunch.tools.min.js') }}"></script>
<script src="{{ asset('frontend/assets/plugins/revolution/js/jquery.themepunch.revolution.min.js') }}"></script>

<script src="{{ asset('frontend/assets/plugins/revolution/js/extensions/revolution.extension.actions.min.js') }}"></script>
<script src="{{ asset('frontend/assets/plugins/revolution/js/extensions/revolution.extension.carousel.min.js') }}"></script>
<script src="{{ asset('frontend/assets/plugins/revolution/js/extensions/revolution.extension.kenburn.min.js') }}"></script>
<script src="{{ asset('frontend/assets/plugins/revolution/js/extensions/revolution.extension.layeranimation.min.js') }}"></script>
<script src="{{ asset('frontend/assets/plugins/revolution/js/extensions/revolution.extension.migration.min.js') }}"></script>
<script src="{{ asset('frontend/assets/plugins/revolution/js/extensions/revolution.extension.navigation.min.js') }}"></script>
<script src="{{ asset('frontend/assets/plugins/revolution/js/extensions/revolution.extension.parallax.min.js') }}"></script>
<script src="{{ asset('frontend/assets/plugins/revolution/js/extensions/revolution.extension.slideanims.min.js') }}"></script>
<script src="{{ asset('frontend/assets/plugins/revolution/js/extensions/revolution.extension.video.min.js') }}"></script>

<!-- Slider Script -->
<script src="{{ asset('frontend/assets/js/main-slider-script.js') }}"></script>

<!-- Plugins -->
<script src="{{ asset('frontend/assets/js/jquery.fancybox.js') }}"></script>
<script src="{{ asset('frontend/assets/js/jquery-ui.js') }}"></script>
<script src="{{ asset('frontend/assets/js/gsap.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/ScrollTrigger.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/splitType.js') }}"></script>
<script src="{{ asset('frontend/assets/js/select2.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/wow.js') }}"></script>
<script src="{{ asset('frontend/assets/js/appear.js') }}"></script>
<script src="{{ asset('frontend/assets/js/owl.js') }}"></script>

<!-- IMPORTANT: This file initializes MixItUp -->
<script src="{{ asset('frontend/assets/js/script.js') }}"></script>
</body>

<!-- Mirrored from html.kodesolution.com/2023/soliur-html/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 25 Dec 2025 15:11:09 GMT -->
</html>
