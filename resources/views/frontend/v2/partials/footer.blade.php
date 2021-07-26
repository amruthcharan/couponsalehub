
<!-- Footer Start -->
<div class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-5 col-md-6">
                <div class="footer-widget">
                    <h4>About Us</h4>
                    <div class="contact-info">
                        <p>Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.</p>
                        <a href="{{ route('page', 'about-us') }}" class="btn btn-sm">Read more</a>
                    </div>
                </div>
            </div>

            <div class="offset-lg-1"></div>

            <div class="col-lg-3 col-md-6">
                <div class="footer-widget">
                    <h4>Important Links</h4>
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
                    <h4>Follow Us</h4>
                    <div class="contact-info">
                        <div class="social">
                            <a href="https://www.facebook.com/"><i class="fab fa-facebook-f"></i></a>
                            <a href="https://twitter.com/"><i class="fab fa-twitter"></i></a>
                            <a href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a>
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
    <div class="container-fluid">
            <div class="copyright text-center">
                <p>Copyright &copy; {{ now()->year }} {{ config('app.name') }}. All Rights Reserved</p>
            </div>
        </div>
    </div>
</div>
<!-- Footer Bottom End -->

<!-- Back to Top -->
<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
