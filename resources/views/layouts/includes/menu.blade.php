  <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
                {{-- <a class="navbar-brand" href="#!">Start Bootstrap</a> --}}
                <img src="{{ asset('images/logo.png') }}" alt="Logo" style="width: 10%;">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="mb-2 navbar-nav me-auto mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="#!">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!">About</a></li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Shop</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#!">+++++</a></li>
                                <li><hr class="dropdown-divider" /></li>
                                <li><a class="dropdown-item" href="#!">-----</a></li>
                                <li><a class="dropdown-item" href="#!">******</a></li>
                            </ul>
                        </li>
                    </ul>
                    <form class="d-flex">
                        <button class="btn btn-outline-dark" type="submit">
                            <i class="bi-cart-fill me-1"></i>
                            Cart
                            <span class="text-white badge bg-dark ms-1 rounded-pill">0</span>
                        </button>
                    </form>

                            @guest
                            <div style="margin-left: 1rem">
                                <li class="nav-item dropdown" style="list-style-type:none">
                                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Compte</a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <li><a class="dropdown-item" href="{{ route('register') }}">Enregistre</a></li>
                                        <li><hr class="dropdown-divider" /></li>
                                        <li><a class="dropdown-item" href="{{ route('login') }}">Se connecter</a></li>
                                    </ul>
                                </li>
                            </div>
                                
                            @endguest
                            @auth
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="ml-1 btn btn-danger" style="margin-left: 1rem">Me déconnecter</button>
                                    </form>                            
                            @endauth
                           

                                 {{-- <div style="margin-left: 1rem">
                                    <form class="d-flex">
                                     <button class="btn btn-outline-dark" type="submit">
                                         <a class="dropdown-item" href="#!">Admin</a>
                                     </button>
                                    </form>
                                  </div> --}}
                    </div>
            </div>
        </nav>
        