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
                        <iframe src="{{ $contact->map ?? '' }}" width="100%" height="450px"
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
                                <a href="mailto:{{ $contact->email ?? '' }}">{{ $contact->email ?? '' }}</a>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="info-item">
                                <i class="fa fa-phone"></i>
                                <h4>Phone Number</h4>
                                <a href="tel:{{ $contact->phone ?? '' }}">{{ $contact->phone ?? '' }}</a>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="info-item">
                                <i class="fa-solid fa-location-dot"></i>
                                <h4>Address</h4>
                                <a href="#map">{{ $contact->address ?? '' }}
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
                    <form id="contact" action="{{ route('enquiry_contact') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <fieldset>
                                    <input type="text" name="name" placeholder="Your Name..." autocomplete="on"
                                        required>
                                </fieldset>
                            </div>
                            <div class="col-lg-6">
                                <fieldset>
                                    <input type="phone" name="phone" pattern="[0-9]{10}" placeholder="Your Phone..."
                                        autocomplete="on" required>
                                </fieldset>
                            </div>
                            <div class="col-lg-6">
                                <fieldset>
                                    <input type="text" name="email" pattern="[^ @]*@[^ @]*"
                                        placeholder="Your E-mail..." required="">
                                </fieldset>
                            </div>
                            <div class="col-lg-6">
                                <fieldset>
                                    <input type="subject" name="subject" placeholder="Subject..." autocomplete="on">
                                </fieldset>
                            </div>
                            <div class="col-lg-12">
                                <fieldset>
                                    <textarea name="message" placeholder="Your Message"></textarea>
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
