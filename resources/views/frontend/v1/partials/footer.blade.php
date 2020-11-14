<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="copyright">
                    <div class="copyright-text">
                        Copyright &copy; {{ now()->year . ' ' . config('app.name') }}.</div>
                    </div>
            </div>
            <div class="col-md-6">
                <nav class="navbar navbar-toggleable-md navbar-light">
                    <div class="collapse navbar-collapse">
                        {!! menu('main-nav', 'frontend.v1.layouts.main_menu') !!}
                    </div>
                </nav>
            </div>
        </div>
    </div><!-- end container -->
</footer><!-- end footer -->
<div class="dmtop"><i class="fas fa-caret-up"></i></div>
