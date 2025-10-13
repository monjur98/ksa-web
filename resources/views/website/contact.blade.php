@extends('website.layout.main')
@section('content')
    <div class="page-title pt-5">
        <div class="heading">
            <div class="container">
                <div class="row d-flex justify-content-center text-center">
                    <div class="col-lg-8">
                        <h1 class="heading-title">Contact Us</h1>
                        <p class="mb-0">
                            Reach Out to Our Experts for Reliable, Quality-Driven Steel Joist & Deck Detailing Solutions.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <nav class="breadcrumbs">
            <div class="container">
                <ol>
                    <li><a href="{{ route('home_page') }}">Home</a></li>
                    <li class="current">Contact Us</li>
                </ol>
            </div>
        </nav>
    </div><!-- End Page Title -->

    <section id="contact" class="contact section">
        <div class="container">
            <div class="contact-wrapper">
                <div class="contact-info-panel">
                    <div class="contact-info-header">
                        <h3>Contact Information</h3>
                        <p>We’re Here to Help — Reach Out for Any Queries or Project Assistance.</p>
                    </div>

                    <div class="contact-info-cards">
                        <div class="info-card">
                            <div class="icon-container">
                                <i class="bi bi-pin-map-fill"></i>
                            </div>
                            <div class="card-content">
                                <h4>Our Location</h4>
                                <p>{{ $contact->address ?? '' }}</p>
                            </div>
                        </div>

                        <div class="info-card">
                            <div class="icon-container">
                                <i class="bi bi-envelope-open"></i>
                            </div>
                            <div class="card-content">
                                <h4>Email Us</h4>
                                <p>{{ $contact->email ?? '' }}</p>
                            </div>
                        </div>

                        <div class="info-card">
                            <div class="icon-container">
                                <i class="bi bi-telephone-fill"></i>
                            </div>
                            <div class="card-content">
                                <h4>Call Us</h4>
                                <p>+91 {{ $contact->phone ?? '' }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="social-links-panel">
                        <h5>Follow Us</h5>
                        <div class="social-icons">
                            <a href="#"><i class="bi bi-facebook"></i></a>
                            <a href="#"><i class="bi bi-linkedin"></i></a>
                        </div>
                    </div>
                </div>

                <div class="contact-form-panel">
                    <div class="map-container">
                        <iframe src="{{ $contact->map ?? '' }}" width="100%" height="100%" style="border:0;"
                            allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>

                    <div class="form-container">
                        <h3>Send Us a Message</h3>
                        <p>Connecting You with Our Team for Expert Guidance and Support.</p>

                        <form action="{{ route('enquiry_contact') }}" method="POST">
                            @csrf
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="nameInput" name="name"
                                    placeholder="Full Name" required="">
                                <label for="nameInput">Full Name</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="tel" class="form-control" id="phoneInput" name="phone"
                                    pattern="[0-9]{10}" placeholder="Phone Number" required="">
                                <label for="phoneInput">Phone Number</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" id="emailInput" name="email"
                                    pattern="[^ @]*@[^ @]*" placeholder="Email Address" required="">
                                <label for="emailInput">Email Address</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="subjectInput" name="subject"
                                    placeholder="Subject" required="">
                                <label for="subjectInput">Subject</label>
                            </div>

                            <div class="form-floating mb-3">
                                <textarea class="form-control" id="messageInput" name="message" rows="5" placeholder="Your Message"
                                    style="height: 150px" required=""></textarea>
                                <label for="messageInput">Your Message</label>
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn-submit">Send Message <i
                                        class="bi bi-send-fill ms-2"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- /Contact Section -->
@endsection
@section('script')
@endsection
