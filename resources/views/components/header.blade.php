<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">{{config('app.name')}}</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Categories</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Shopping Cart</a>
            </li>
        </ul>
        <span class="navbar-text">
            @auth
                <a class="nav-link active" aria-current="page" href="{{route('logout')}}">Log Out</a>
            @else
                <a class="nav-link active" aria-current="page" href="{{route('login')}}">Login</a>
                <a class="nav-link active" aria-current="page" href="{{route('registration')}}">Sign Up</a>
            @endauth
    </span>
    </div>
    </div>
</nav>