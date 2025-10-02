<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>UPO</title>
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('bootstrap-icons/bootstrap-icons.min.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
    @yield('styles')
    <link media="screen" type="text/css" rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link media="screen" type="text/css" rel="stylesheet" href="{{ asset('css/upo-styles.css') }}">
</head>

<body class="upo-brand">
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ url('/home') }}"><span>Elecciones
                    </span></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                    </ul>
                    {{-- @if (CasUtils::isLogged())
                        <form action="{{ url('/cas/logout') }}" method="POST">
                            @csrf
                            @method('POST')
                            <div class="d-flex">
                                <span class="uuid">
                                    @if (!empty(User::getUser()))
                                        {{ User::getUser()->uuid }}
                                    @endif
                                </span>
                                <button id="logout-button" type="submit" class="btn btn-icon p-0"><i
                                        class="fa-solid fa-right-from-bracket"></i><span
                                        class="sr-only">Salir</span></button>
                            </div>
                        </form>
                    @endif --}}
                </div>
            </div>
        </nav>
    </header>
    <div class="container">
        <div id="loading" class="overlay" hide="true">
            <div class="d-flex justify-content-center">
                <div class="spinner-grow" role="status" style="width: 8rem; height: 8rem; z-index: 20;">
                    <span class="sr-only">Loading...</span>
                </div>
            </div>
        </div>
        @yield('content')
    </div>
    <footer class="site-footer">
        <div class="container">
            <div class="row centered">
                <p class="foot">
                    © 2023 Universidad Pablo de Olavide - Ctra. de Utrera, km 1&nbsp;&nbsp; 41013, Sevilla - 954 349 200
                    <span>|</span>
                    <a href="https://www.upo.es/portal/impe/web/contenido/7e43c90c-4508-11de-a8ba-3fe5a96f4a88"
                        title="Aviso Legal | Abre una nueva pestaña" target="_blank">Aviso Legal</a>
                    <span>|</span>
                    <a href="https://www.upo.es/portal/impe/web/contenido/5924756e-4508-11de-a8ba-3fe5a96f4a88"
                        title="Privacidad | Abre una nueva pestaña" target="_blank">Privacidad</a>
                    <span>|</span>
                    <a href="https://www.upo.es/portal/impe/web/contenido/c526633d-6e7d-11e1-b52b-3fe5a96f4a88"
                        title="Accesibilidad | Abre una nueva pestaña" target="_blank">Accesibilidad</a>
                </p>
                <div>
                    <a href="http://www.facebook.com/pablodeolavide" target="_blank" class="ifb"
                        title="Facebook | Abre una nueva pestaña"><span class="sr-only">Facebook</span></a>
                    <a href="http://www.twitter.com/pablodeolavide" target="_blank" class="itw"
                        title="Twitter | Abre una nueva pestaña"><span class="sr-only">Twitter</span></a>
                    <!-- a href="http://instagram.com/pablodeolavide/" target="_blank" class="iig" title="Instagram | Abre una nueva pestaña"><span class="sr-only">Instagram</span></a -->
                    <a href="https://www.linkedin.com/company/universidad-pablo-de-olavide" target="_blank"
                        class="iin" title="Linkedin | Abre una nueva pestaña"><span
                            class="sr-only">Linkedin</span></a>
                </div>
            </div>
        </div>
    </footer>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
    @yield('scripts')
</body>

</html>
