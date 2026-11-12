<html lang="en">
  <head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>@yield('title','Linkora')</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Varela+Round">
    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
  </head>
  <body>
   
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container">
          <a class="navbar-brand text-uppercase" href="index.html">
               <strong>Linkora</strong>
          </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-toggler"
                aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
           </button>

          <div class="collapse navbar-collapse" id="navbar-toggler">
                <ul class="navbar-nav ml-auto">
                   <li class="nav-item mr-2"><a href="#" class="btn btn-outline-secondary">Login</a></li>
                    <li class="nav-item"><a href="#" class="btn btn-outline-primary">Register</a></li>
              </ul>
          </div>
      </div>
   </nav>

    @yield('content')

    <footer class="py-5 footer">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md">
                    <strong>Linkora</strong>
                    <small class="d-block mb-3">© 2026</small>
                </div>
                <div class="col-6 col-md">
                    <h5>Features</h5>
                    <ul class="list-unstyled text-small">
                        <li><a href="#">Smart contact lists</a></li>
                        <li><a href="#">Custom tags</a></li>
                        <li><a href="#">Quick search</a></li>
                        <li><a href="#">Follow-up reminders</a></li>
                        <li><a href="#">Shared access</a></li>
                    </ul>
                </div>
                <div class="col-6 col-md">
                    <h5>Resources</h5>
                    <ul class="list-unstyled text-small">
                        <li><a href="#">Getting started</a></li>
                        <li><a href="#">Best practices</a></li>
                        <li><a href="#">Product guide</a></li>
                        <li><a href="#">Support center</a></li>
                    </ul>
                </div>
                <div class="col-6 col-md">
                    <h5>Company</h5>
                    <ul class="list-unstyled text-small">
                        <li><a href="#">Team</a></li>
                        <li><a href="#">Locations</a></li>
                        <li><a href="#">Privacy</a></li>
                        <li><a href="#">Terms</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
  </body>
</html>