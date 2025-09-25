@extends('website.layout.main')
@section('content')
    <div class="page-heading">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="header-text">
                        <h2>Contact Us</h2>
                        <div class="div-dec"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ***** Main Banner Area End ***** -->

    <section class="map">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div id="map">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d117763.55751430387!2d88.23649334335936!3d22.724108899999987!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39f89bec28d9d6d9%3A0x25ec2b5338709780!2sRahara%20Bazar!5e0!3m2!1sen!2sin!4v1711602655368!5m2!1sen!2sin"
                            width="100%" height="450px"
                            style="border:0; border-radius: 5px; position: relative; z-index: 2;" allowfullscreen=""
                            loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
                <div class="col-lg-10 offset-lg-1">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="info-item">
                                <i class="fa-solid fa-envelope"></i>
                                <h4>Email Address</h4>
                                <a href="mailto:info@company.com">info@kolkatasteelassociates.com</a>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="info-item">
                                <i class="fa fa-phone"></i>
                                <h4>Phone Number</h4>
                                <a href="tel:9335648126">+91 9335648126</a>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="info-item">
                                <i class="fa-solid fa-location-dot"></i>
                                <h4>Address</h4>
                                <a href="#map">303/A Old Calcutta Road, Rahara. Kolkata-700118
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="contact-us-form">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-heading">
                        <h6>Contact Us</h6>
                        <h4>Feel free to message us</h4>
                    </div>
                </div>
                <div class="col-lg-10 offset-lg-1">
                    <form id="contact" action="" method="post">
                        <div class="row">
                            <div class="col-lg-6">
                                <fieldset>
                                    <input type="name" name="name" id="name" placeholder="Your Name..."
                                        autocomplete="on" required>
                                </fieldset>
                            </div>
                            <div class="col-lg-6">
                                <fieldset>
                                    <input type="phone" name="phone" id="phone" placeholder="Your Phone..."
                                        autocomplete="on" required>
                                </fieldset>
                            </div>
                            <div class="col-lg-6">
                                <fieldset>
                                    <input type="text" name="email" id="email" pattern="[^ @]*@[^ @]*"
                                        placeholder="Your E-mail..." required="">
                                </fieldset>
                            </div>
                            <div class="col-lg-6">
                                <fieldset>
                                    <input type="subject" name="subject" id="subject" placeholder="Subject..."
                                        autocomplete="on">
                                </fieldset>
                            </div>
                            <div class="col-lg-12">
                                <fieldset>
                                    <textarea name="message" id="message" placeholder="Your Message"></textarea>
                                </fieldset>
                            </div>
                            <div class="col-lg-12 text-end">
                                <fieldset>
                                    <button type="submit" id="form-submit" class="orange-button">Send Message</button>
                                </fieldset>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')
@endsection
