<nav class="navbar navbar-expand-xl navbar-light u-bg-white mb-2">
    <a href="{{ route('home') }}" class="navbar-brand">
        <img src="{{ image(setting('site.logo')) }}" alt="{{ config('app.name') }}" width="200px">
    </a>
    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <!-- Collection of nav links, forms, and other content for toggling -->
    <div id="navbarCollapse" class="collapse navbar-collapse justify-content-start">
        {!! menu('main-nav', 'frontend.v1.layouts.main_menu') !!}
        <form class="navbar-form form-inline" action="{{ route('search') }}">
            <div class="input-group">
                <input type="text" name="search" required class="form-control" autocomplete="off" placeholder="Search offers & reviews">
                <div class="input-group-append">
                    <button class="btn btn-secondary" type="submit">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </div>
        </form>
    </div>
</nav>
