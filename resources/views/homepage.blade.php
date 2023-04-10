@extends("template")

@section("head")
    <!-- This is where your head goes (jk) this is where the stuff you want to put in your head goes -->
@endsection

@section("content")
    <div class="homepage" >
        <!-- This is where your content goes -->
        <div class="homeContent">
            <p class="homeWord"> Test your math skill, <br> Fight for the top!</p>
                <div class="difficulty">
                    <a class="easy"><img class="easy-pic" src="/assets/img/easy.png" alt=""><br>EASY</a>
                    <a class="medium"><img class="medium-pic" src="/assets/img/medium.png" alt=""><br>MEDIUM</a>
                    <a class="hard"><img class="hard-pic" src="/assets/img/hard.png" alt=""><br>HARD</a>
                    <a class="whatTheMeow"><img class="wtm-pic" src="/assets/img/wtm.png" alt=""><br>WHAT THE MEOW</a>
                </div>
            <img class="cat-paw" src="/assets/img/cat-paw-home.png" alt="">
        </div>
    </div>
    
@endsection

@section("script")
    <!-- This is where your js/other scripts code goes -->
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script>
        $(document).ready(function(){
            $('*').hover(function(){
                if($(this).is('.easy')){
                    $('.cat-paw').animate({
                        'left':'290px'
                    });
                }else if($(this).is('.medium')){
                    $('.cat-paw').animate({
                        'left':'485px'
                    })
                }else if($(this).is('.hard')){
                    $('.cat-paw').animate({
                        'left':'675px'
                    })
                }else if($(this).is('.whatTheMeow')){
                    $('.cat-paw').animate({
                        'left':'865px'
                    })
                }
            })
        });
    </script>
@endsection