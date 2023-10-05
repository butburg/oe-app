<div>
    @if (Route::has('login'))

        <header class="navbar navbar-expand-sm navbar-dark py-3" style="background-color: #003C47;">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ route('index') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item"><a href="{{ route('index') }}" class="nav-link active"
                                                aria-current="page">Home</a></li>
                        <li class="nav-item"><a href="{{ route('posts.index') }}" class="nav-link">Posts</a></li>
                        <li class="nav-item"><a href="{{ route('about') }}" class="nav-link">About</a></li>
                        <li class="nav-item"><a href="{{ route('impress') }}" class="nav-link">Impress</a></li>
                    </ul>

                    @auth
                        <ul class="navbar-nav ms-auto"> <!-- Use ms-auto class for right alignment -->
                            <li class="nav-item"><a href="{{ route('posts.create') }}" class="nav-link">Create Post</a></li>
                            <li class="nav-item"><a href="{{ route('dashboard') }}" class="nav-link">Dashboard</a></li>

                            <li class="nav-item dropdown ">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                   data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('profile.edit') }}">
                                        {{ __('Profile') }}
                                    </a>

                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="dropdown-item"
                                                onclick="event.preventDefault(); this.closest('form').submit();">
                                            {{ __('Log Out') }}
                                        </button>
                                    </form>
                                </div>
                            </li>
                        </ul>
                    @else
                        <div class="ms-auto"> <!-- Use ms-auto class for right alignment -->
                            <ul class="navbar-nav">
                                <li class="nav-item"><a href="{{ route('login') }}" class="nav-link">Login</a></li>
                                @if (Route::has('register'))
                                    <li class="nav-item"><a href="{{ route('register') }}" class="nav-link">Register</a></li>
                                @endif
                            </ul>
                        </div>
                    @endauth
                </div>
            </div>
        </header>


    @endif
</div>
