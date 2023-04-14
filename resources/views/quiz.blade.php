@extends("template")

@section("head")
    <!-- This is where your head goes (jk) this is where the stuff you want to put in your head goes -->
    <img class="pageLoader" src="/assets/img/meow-loader.gif" alt="">
@endsection

@section("content")
    <div class="block-question">

        <div class="row">
            <div class="col-2">
                <div class="block-question-time-parent">
                    <div class="block-question-time" id="js-time">0</div>
                </div>
            </div>
            <div class="col-8">
                <div id="js-question" class="block-question-question">{{$quiz[0][1]}}</div>
            </div>
            <div class="col-2">
                <div class="block-question-correct"><span id="js-correct">0</span><br><span class="block-question-correct-small">answer(s)</span></div>
            </div>
        </div>

    </div>

    <div class="block-answer">

        <div class="row">
            <button class="col-6 block-answer-btn block-answer-btn-1 js-option">
                <img src="/assets/img/triangle.png" alt="" class="block-answer-btn-img">
                <div id="js-options-content-1" class="js-options-content">{{$quiz[0][2][0][0]}}</div>
                <div id="js-check-1" id="js-options-content-1" class="js-check" data-check="{{$quiz[0][2][0][1]}}"></div>
            </button>
            <button class="col-6 block-answer-btn block-answer-btn-2 js-option">
                <img src="/assets/img/diamond.png" alt="" class="block-answer-btn-img">
                <div id="js-options-content-2" class="js-options-content">{{$quiz[0][2][1][0]}}</div>
                <div id="js-check-2" class="js-check" data-check="{{$quiz[0][2][1][1]}}"></div>
            </button>
        </div>

        <div class="row">
            <button class="col-6 block-answer-btn block-answer-btn-3 js-option">
                <img src="/assets/img/circle.png" alt="" class="block-answer-btn-img">
                <div id="js-options-content-3" class="js-options-content">{{$quiz[0][2][2][0]}}</div>
                <div id="js-check-3" class="js-check" data-check="{{$quiz[0][2][2][1]}}"></div>
            </button>
            <button class="col-6 block-answer-btn block-answer-btn-4 js-option">
                <img src="/assets/img/square.png" alt="" class="block-answer-btn-img">
                <div id="js-options-content-4" class="js-options-content">{{$quiz[0][2][3][0]}}</div>
                <div id="js-check-4" class="js-check" data-check="{{$quiz[0][2][3][1]}}"></div>
            </button>
        </div>

    </div>

    <!-- leave confirmation -->
    <div id="js-card-bg" class="block-exit-card-bg" style="display: none;"></div>
    <div id="js-card" class="block-exit-card" style="display: none;">
        <div class="row">
            <div class="offset-3 col-6">
                <div class="row">
                    <div class="col-12">
                        <p>Are you sure you want to quit? :(</p>
                        <p>The cat is not happy with your decision >:(</p>
                    </div>
                </div>
                <div class="block-exit-card-btn-group">
                    <div class="row">
                        <div class="col-6">
                            <div id="js-card-no" class="block-exit-card-btn block-exit-card-btn-no">Wait neo! D:</div>
                        </div>
                        <div class="col-6">
                            <div id="js-card-yes" class="block-exit-card-btn block-exit-card-btn-yes">I dont care the meow, quit anyway</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        
@endsection

@section("script")
    <script>

        var quiz_object = $.parseJSON('{!!$quiz_json!!}');
        // console.log(quiz_object);
        var quiz_index = 0;

        $(document).ready(function() {
            // loading
            setTimeout(() => {
                $(".pageLoader").fadeOut(150)
            }, 1000);

            // timer
            var time = new Date;

            setInterval(function() {
                $('#js-time').text(Math.round(((new Date - time) - 1500) / 1000));
            }, 1000);

            // answer check
            $('.js-option').click(function(event){
                // disable all buttons
                $('.js-option').prop('disabled', true);
                
                // +1 if correct
                var i = $('#js-correct');

                if($(event.currentTarget).find('.js-check').data('check') == 'correct'){
                    i.html((parseInt(i.html()) + 1).toString());
                }

                // current q&a dissapear, bring in new q
                $('.js-options-content').fadeOut('slow');
                $('#js-question').fadeOut('slow').promise().done(function(){

                    quiz_index++;
                    $('#js-question').html(quiz_object[quiz_index][1]).fadeIn();

                    answers = $('.js-option');
                    $.each(answers, function(key, value){
                        $(value).attr('disabled', false);
                        $(value).find('.js-options-content').html(quiz_object[quiz_index][2][key][0]).fadeIn();
                        $(value).find('.js-check').data('check', quiz_object[quiz_index][2][key][1]);
                    })

                });

                // after 20q, lead them to results page with score and time
                if(quiz_index == 19){
                    // take time
                    var time = $('#js-time').html();
                    // take answers
                    var score = $('#js-correct').html();

                    window.location = '/quiz-results?time=' + time + '&score=' + score;
                }
            })

            // exit card
            $('#js-exit').click(function(){
                $('#js-card-bg').fadeIn();
                $('#js-card').fadeIn();
            });

            // exit card - no
            $('#js-card-no').click(function(){
                $('#js-card-bg').fadeOut();
                $('#js-card').fadeOut();
            });

            // exit card - yes
            $('#js-card-yes').click(function(){
                window.location = '/home';
            });

        });
    </script>
@endsection