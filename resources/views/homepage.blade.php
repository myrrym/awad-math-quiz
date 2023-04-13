@extends("template")

@section("head")
    <!-- This is where your head goes (jk) this is where the stuff you want to put in your head goes -->
    @php
        $user = session('user');
    @endphp
@endsection

@section("content")
    <div class="homepage" >
        <!-- This is where your content goes -->
        <div class="homeContent">
        @if(session()->get('user'))
            <p class="meow-meow"> Meow Meow, {{ $user['username'] }}!</p>   
        @else
            <p class="meow-meow"> Meow Meow, stanger! </p>
        @endif
            <p class="homeWord"> Test your math skill, <br> Fight for the top!</p>
                <div class="difficulty">
                    <a class="js-card card-diff easy" data-diff="easy"><img class="easy-pic" src="/assets/img/easy.png" alt=""><br>EASY</a>
                    <a class="js-card card-diff medium" data-diff="medium"><img class="medium-pic" src="/assets/img/medium.png" alt=""><br>MEDIUM</a>
                    <a class="js-card card-diff hard" data-diff="hard"><img class="hard-pic" src="/assets/img/hard.png" alt=""><br>HARD</a>
                    <a class="js-card card-diff whatTheMeow" data-diff="whatTheMeow"><img class="wtm-pic" src="/assets/img/wtm.png" alt=""><br>WHAT THE MEOW</a>
                </div>
        </div>
        <div class="paws">
            <img class="cat-paw-1" src="/assets/img/cat-paw-home.png" alt="">
            <img class="cat-paw-2" src="/assets/img/cat-paw-home.png" alt="">
            <img class="cat-paw-3" src="/assets/img/cat-paw-home.png" alt="">
            <img class="cat-paw-4" src="/assets/img/cat-paw-home.png" alt="">
        </div>
    </div>
    
@endsection

@section("script")
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script>
        $(document).ready(function(){
            $(".js-card").click(function(){
                var val = $(this).data('diff');
                
                if (val != undefined && val != null) {
                    window.location = '/quiz/' + val;
                }
            });

            // cat paw animation
            $(".easy").hover(function(){
                $(".cat-paw-1").stop().animate({opacity:"1"
                },100);
                }, function(){
                $(".cat-paw-1").stop().animate({opacity:"0"
                },100);
                $(".cat-paw-2").stop().animate({opacity:"0"
                },100);
                $(".cat-paw-3").stop().animate({opacity:"0"
                },100);
                $(".cat-paw-4").stop().animate({opacity:"0"
                },100);
            });
            $(".medium").hover(function(){
                $(".cat-paw-2").stop().animate({opacity:"1"
                },100);
                }, function(){
                $(".cat-paw-1").stop().animate({opacity:"0"
                },100);
                $(".cat-paw-2").stop().animate({opacity:"0"
                },100);
                $(".cat-paw-3").stop().animate({opacity:"0"
                },100);
                $(".cat-paw-4").stop().animate({opacity:"0"
                },100);
            });
            $(".hard").hover(function(){
                $(".cat-paw-3").stop().animate({opacity:"1"
                },100);
                }, function(){
                $(".cat-paw-3").stop().animate({opacity:"0"
                },100);
                $(".cat-paw-2").stop().animate({opacity:"0"
                },100);
                $(".cat-paw-1").stop().animate({opacity:"0"
                },100);
                $(".cat-paw-4").stop().animate({opacity:"0"
                },100);
            });
            $(".whatTheMeow").hover(function(){
                $(".cat-paw-4").stop().animate({opacity:"1"
                },100);
                }, function(){
                $(".cat-paw-4").stop().animate({opacity:"0"
                },100);
                $(".cat-paw-2").stop().animate({opacity:"0"
                },100);
                $(".cat-paw-3").stop().animate({opacity:"0"
                },100);
                $(".cat-paw-1").stop().animate({opacity:"0"
                },100);
            });
        });
    </script>
@endsection