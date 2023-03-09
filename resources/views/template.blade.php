<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Math ᓚᘏᗢ Cat</title>

    <!-- cdn - jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" type="text/javascript"></script>

    <!-- cdn - bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    
    @yield("head")
</head>
<body>
    <div class="block-header">
        
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <div class="navbar-nav">
                    <a class="nav-link active" aria-current="page" href="#">home</a>
                    <a class="nav-link" href="#">leaderboard</a>
                </div>
                <a class="navbar-brand" href="#">MATH ᓚᘏᗢ CAT</a>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link" href="#">account</a>
                    <a class="nav-link" href="#">log out</a>
                </div>
                </div>
            </div>
        </nav>

    </div>

    <div class="offset-2 col-8">
        @yield("content")
        <!-- cdn - bootstrap js -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    </div>
    @yield("script")
</body>
</html>