<x-header/>

<!-- Page Title -->
<section class="page-title"
    style="background-image:url(images/background/page-title-bg.png);
           padding:100px 0 60px;
           text-align:center;
           margin-bottom:40px;">
    <div class="auto-container">
        <h1 class="title" style="color:#fff; font-weight:700; font-size:48px;">
            Contact Us
        </h1>
        <ul class="page-breadcrumb"
            style="list-style:none; padding:0; margin:15px 0 0;
                   display:inline-flex; gap:10px; color:#fff;">
            <li>
                <a href="{{ route('home') }}"
                   style="color:#fff; text-decoration:none;">
                    Home
                </a>
            </li>
            <li style="color:#ffd700;">/ Contact</li>
        </ul>
    </div>
</section>

<!-- Contact Section -->
<section class="contact-details"
         style="padding:60px 0 100px; background:#f8f9fa;">
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8 col-sm-12">

                <!-- Title -->
                <div class="sec-title text-center mb-4"
                     style="margin-top:-30px;">
                    <span class="sub-title"
                          style="color:#ff7f50; font-weight:600; letter-spacing:1px;">

                    </span>
                    <h2 style="font-size:36px; font-weight:700;">
                        Feel free to write
                    </h2>
                </div>

                <!-- Contact Form -->
                <form action="{{ route('contact.submit') }}" method="post"
                      style="background:#fff; padding:35px;
                             border-radius:12px;
                             box-shadow:0 8px 25px rgba(0,0,0,0.1);">
                    @csrf

                    <div class="row g-3">
                        <div class="col-md-6">
                            <input type="text" name="name" class="form-control"
                                   placeholder="Enter Name"
                                   style="padding:12px; border-radius:8px;">
                        </div>
                        <div class="col-md-6">
                            <input type="email" name="email" class="form-control"
                                   placeholder="Enter Email"
                                   style="padding:12px; border-radius:8px;">
                        </div>
                    </div>

                    <div class="row g-3 mt-3">
                        <div class="col-md-6">
                            <input type="text" name="subject" class="form-control"
                                   placeholder="Enter Subject"
                                   style="padding:12px; border-radius:8px;">
                        </div>
                        <div class="col-md-6">
                            <input type="text" name="phone" class="form-control"
                                   placeholder="Enter Phone"
                                   style="padding:12px; border-radius:8px;">
                        </div>
                    </div>

                    <div class="mt-3">
                        <textarea name="message" rows="6"
                                  class="form-control"
                                  placeholder="Enter Message"
                                  style="padding:12px; border-radius:8px;"></textarea>
                    </div>

                    <div class="mt-4 d-flex justify-content-center gap-3">
                        <button type="submit"
                                style="background:#ff7f50; color:#fff;
                                       border:none; padding:12px 30px;
                                       border-radius:8px; font-weight:600;">
                            Send Message
                        </button>
                        <button type="reset"
                                style="background:#333; color:#fff;
                                       border:none; padding:12px 30px;
                                       border-radius:8px; font-weight:600;">
                            Reset
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</section>

<x-footer/>
