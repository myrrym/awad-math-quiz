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
            // $('*').hover(function(){
            //     if($(this).is('.easy')){
                    
            //         $('.cat-paw-1').animate({
            //             opacity:"1",
            //         },500);
            //     }else if($(this).is('.medium')){

            //         $('.cat-paw-2').animate({
            //             opacity:"1",
            //         },500);
            //     }else if($(this).is('.hard')){

            //         $('.cat-paw-3').animate({
            //             opacity:"1",
            //         },500);
            //     }else if($(this).is('.whatTheMeow')){

            //         $('.cat-paw-4').animate({
            //             opacity:"1",
            //         },500);
            //     }
            // })

            // redirect player based on difficulty
            $(".js-card").click(function(){
                var val = $(this).data('diff');
                
                if (val != undefined && val != null) {
                    window.location = '/quiz?diff=' + val;
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
    <!-- <script>
        $(document).ready(function(){
            $(".difficulty").mouseover(function(){
            if ($(this).hasClass("easy")) {
                $(".cat-paw-1").animate({
                opacity:"1",
                },500);
            } else if ($(this).hasClass("medium")) {
                $(".cat-paw-2").animate({
                opacity:"1",
                },500);
            } else if ($(this).hasClass("hard")) {
                $(".cat-paw-3").animate({
                opacity:"1",
                },500);
            } else if ($(this).hasClass("whatTheMeow")) {
                $(".cat-paw-4").animate({
                opacity:"1",
                },500);
            }
            });
        });
</script> -->
<!-- <script>
        $(document).ready(function(){
            $(".easy").mouseenter(function(){
                // $('.cat-paw-2').css('opacity','0');
                // $('.cat-paw-3').css('opacity','0');
                // $('.cat-paw-4').css('opacity','0');
                $('.cat-paw-1').animate({
                        opacity:"1",
                    },200);
            });
            $(".medium").mouseenter(function(){
                // $('.cat-paw-1').css('opacity','0');
                // $('.cat-paw-3').css('opacity','0');
                // $('.cat-paw-4').css('opacity','0');
                $('.cat-paw-2').animate({
                        opacity:"1",
                    },200);
            });
            $(".hard").mouseenter(function(){
                // $('.cat-paw-2').css('opacity','0');
                // $('.cat-paw-1').css('opacity','0');
                // $('.cat-paw-4').css('opacity','0');
                $('.cat-paw-3').animate({
                        opacity:"1",
                    },200);
            });
            $(".whatTheMeow").mouseenter(function(){
                // $('.cat-paw-2').css('opacity','0');
                // $('.cat-paw-3').css('opacity','0');
                // $('.cat-paw-1').css('opacity','0');
                $('.cat-paw-4').animate({
                        opacity:"1",
                    },200);
            });
            
            $(".easy").mouseout(function(){
                $('.cat-paw-2').css('opacity','0');
                $('.cat-paw-3').css('opacity','0');
                $('.cat-paw-4').css('opacity','0');
            });
            $(".medium").mouseout(function(){
                $('.cat-paw-1').css('opacity','0');
                $('.cat-paw-3').css('opacity','0');
                $('.cat-paw-4').css('opacity','0');
            });
            $(".hard").mouseout(function(){
                $('.cat-paw-2').css('opacity','0');
                $('.cat-paw-1').css('opacity','0');
                $('.cat-paw-4').css('opacity','0');
            });
            $(".whatTheMeow").mouseout(function(){
                $('.cat-paw-2').css('opacity','0');
                $('.cat-paw-3').css('opacity','0');
                $('.cat-paw-1').css('opacity','0');
            });
            
        });
</script> -->
@endsection