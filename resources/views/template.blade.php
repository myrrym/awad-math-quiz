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
    <div class="container-fluid">
        
        @if ($navbar == 'without-options')
            <x-navbar-without-options/>
        @else
            <x-navbar-with-options/>
        @endif
        
        <div class="row">
            <div class="col-12">
                @yield("content")
                <!-- cdn - bootstrap js -->
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
            </div>
        </div>
        
        @if ($footer == 'true')
            <x-footer/>
        @else
            <!-- nothing -->
        @endif

    </div>
    @yield("script")
</body>
</html>