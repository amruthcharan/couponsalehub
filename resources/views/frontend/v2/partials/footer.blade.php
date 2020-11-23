
<!-- Footer Start -->
<div class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-5 col-md-6">
                <div class="footer-widget">
                    <h2>About Us</h2>
                    <div class="contact-info">
                        <p>OffersnReviews is one amongst the best online coupons and reviews website. We provide great deals for about 10,000 stores with working coupons and update them daily.</p>
                        <a href="{{ route('page', 'about-us') }}" class="btn btn-sm">Read more</a>
                    </div>
                </div>
            </div>

            <div class="offset-lg-1"></div>

            <div class="col-lg-3 col-md-6">
                <div class="footer-widget">
                    <h2>Important Links</h2>
                    <ul>
                        <li><a href="{{ route('categories') }}">Categories</a></li>
                        <li><a href="{{ route('page', 'privacy-policy') }}">Privacy Policy</a></li>
                        <li><a href="{{ route('page', 'terms-and-conditions') }}">Terms & Conditions</a></li>
                        <li><a href="{{ route('page', 'contact-us') }}">Contact Us</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="footer-widget">
                    <h2>Follow Us</h2>
                    <div class="contact-info">
                        <div class="social">
                            <a href="https://www.facebook.com/offersnreviews"><i class="fab fa-facebook-f"></i></a>
                            <a href="https://twitter.com/OffersNReviews1"><i class="fab fa-twitter"></i></a>
                            <a href="https://www.instagram.com/offersnreviews/"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- Footer End -->

<!-- Footer Bottom Start -->
<div class="footer-bottom">
    <div class="container">
        <div class="row">
            <div class="col-md-6 copyright">
                <p>Copyright &copy; {{ now()->year }} {{ config('app.name') }}. All Rights Reserved</p>
            </div>

            <div class="col-md-6 template-by">
                <p>Developed By <a href="https://askamruth.com">Ask Amruth</a></p>
            </div>
        </div>
    </div>
</div>
<!-- Footer Bottom End -->

<!-- Back to Top -->
<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
