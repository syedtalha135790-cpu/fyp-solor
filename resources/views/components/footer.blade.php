<!-- Main Footer -->
<footer class="main-footer footer-style-one">
  <div class="bg bg-image" style="background-image:url(frontend/assets/images/background/6.jpg)"></div>
  <div class="footer-overlay"></div>

  <!-- Footer Top -->
  <div class="footer-top">
    <div class="auto-container">
      <div class="outer-box">
        <div class="top-left">
          <div class="logo">
            <img src="frontend/assets/images/logo-2.png" alt="Logo">
          </div>
        </div>

        <div class="top-right">
          <ul class="social-icon-two modern-social">
            <li class="title">Follow Us</li>
            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
            <li><a href="#"><i class="fa fa-x"></i></a></li>
            <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
            <li><a href="#"><i class="fab fa-pinterest"></i></a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>

  <!-- Widgets -->
  <div class="widgets-section">
    <div class="auto-container">
      <div class="row">

        <!-- Contact -->
        <div class="footer-column col-xl-4 col-lg-6 col-md-6">
          <div class="footer-widget glass-box">
            <h5 class="widget-title">Contact Us</h5>
            <ul class="contact-list-two light">
              <li><i class="fal fa-map-marker-alt"></i> 13005 Greenville Xblock, WA</li>
              <li><i class="fal fa-phone"></i> <a href="tel:+11234562228">(+1 123 456 2228)</a></li>
              <li><i class="fal fa-envelope"></i> <a href="#">info@soliur.com</a></li>
            </ul>
          </div>
        </div>

        <!-- Quick Links -->
        <div class="footer-column col-xl-2 col-lg-6 col-md-6">
          <div class="footer-widget">
            <h5 class="widget-title">Quick Links</h5>
            <ul class="user-links">
              <li><a href="#">Home</a></li>
              <li><a href="#">About</a></li>
              <li><a href="#">Services</a></li>
              <li><a href="#">News</a></li>
              <li><a href="#">Policy</a></li>
            </ul>
          </div>
        </div>

        <!-- Company -->
        <div class="footer-column col-xl-2 col-lg-6 col-md-6">
          <div class="footer-widget">
            <h5 class="widget-title">Company</h5>
            <ul class="user-links">
              <li><a href="#">Team</a></li>
              <li><a href="#">Career</a></li>
              <li><a href="#">Privacy</a></li>
              <li><a href="#">Contact</a></li>
            </ul>
          </div>
        </div>

        <!-- Newsletter -->
        <div class="footer-column col-xl-4 col-lg-6 col-md-6">
          <div class="footer-widget glass-box">
            <h5 class="widget-title">Newsletter</h5>
            <p class="text">Get updates & offers in your inbox.</p>

            <form method="post" action="{{ route('newsletter.subscribe') }}">
              @csrf
              <div class="newsletter-modern">
                <input type="email" name="email" placeholder="Your email" required>
                <button type="submit">Subscribe</button>
              </div>
            </form>
          </div>
        </div>

      </div>
    </div>
  </div>

  <!-- Footer Bottom -->
  <div class="footer-bottom">
    <div class="auto-container">
      © {{ date('Y') }} <strong>Soliur</strong>. All Rights Reserved.
    </div>
  </div>
</footer>

<!-- ================= FOOTER CSS ================= -->
<style>
.main-footer{position:relative;color:#d7d7d7}
.footer-overlay{position:absolute;inset:0;background:rgba(6,22,40,.92)}
.footer-top{padding:30px 0;border-bottom:1px solid rgba(255,255,255,.1)}
.widget-title{color:#7ac943;font-weight:700;margin-bottom:18px}
.glass-box{background:rgba(255,255,255,.06);padding:30px;border-radius:14px;backdrop-filter:blur(6px)}
.user-links li a{color:#d7d7d7;transition:.3s}
.user-links li a:hover{color:#7ac943;padding-left:6px}
.modern-social li a{width:40px;height:40px;background:rgba(255,255,255,.1);display:inline-flex;align-items:center;justify-content:center;border-radius:50%;transition:.3s}
.modern-social li a:hover{background:#7ac943;color:#0e406e}
.newsletter-modern{display:flex;background:#fff;border-radius:50px;overflow:hidden}
.newsletter-modern input{flex:1;border:none;padding:14px 18px}
.newsletter-modern button{background:#7ac943;border:none;padding:0 26px;font-weight:600;cursor:pointer}
.footer-bottom{border-top:1px solid rgba(255,255,255,.1);padding:18px 0;text-align:center;color:#aaa}
</style>
