<nav class="navbar bg-light">
    <ul class="navbar-nav">
        @foreach($categories as $category)
        <li class="nav-item">
            <a class="nav-link" href="{{ route('page', $category->slug ) }}"><i class="{{ $category->icon }}"></i>{{ $category->name }}</a>
        </li>
        @endforeach
    </ul>
</nav>
