@extends("template")

@section("head")
    <!-- This is where your head goes (jk) this is where the stuff you want to put in your head goes -->
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
                <div class="block-question-question">{{$quiz[0][1]}}</div>
            </div>
            <div class="col-2">
                <div class="block-question-correct">0<br><span class="block-question-correct-small">answers</span></div>
            </div>
        </div>

    </div>

    <div class="block-answer">

        <div class="row">
            <div class="col-6 block-answer-btn block-answer-btn-1">
                <img src="/assets/img/triangle.png" alt="" class="block-answer-btn-img">
                {{$quiz[0][2][0][0]}}
            </div>
            <div class="col-6 block-answer-btn block-answer-btn-2">
                <img src="/assets/img/diamond.png" alt="" class="block-answer-btn-img">
                {{$quiz[0][2][1][0]}}
            </div>
        </div>

        <div class="row">
            <div class="col-6 block-answer-btn block-answer-btn-3">
                <img src="/assets/img/circle.png" alt="" class="block-answer-btn-img">
                {{$quiz[0][2][2][0]}}
            </div>
            <div class="col-6 block-answer-btn block-answer-btn-4">
                <img src="/assets/img/square.png" alt="" class="block-answer-btn-img">
                {{$quiz[0][2][3][0]}}
            </div>
        </div>

        <!--
            ### task1: check correct ans
            if ans correct, (1) give positive response (2) +1 to answer counter
            if ans wrong (1) give sad response (2)
            move on to next q
            
            ### task 2: repeat 20 times

            ### task 3: results page

            ### task 4: click exit ask to confirm
        -->

    </div>

    <div class="block-exit-card-bg"></div>
    <div class="block-exit-card">
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
                            <div class="block-exit-card-btn block-exit-card-btn-no">Wait neo! D:</div>
                        </div>
                        <div class="col-6">
                            <div class="block-exit-card-btn block-exit-card-btn-yes">I dont care the meow, quit anyway</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        
@endsection

@section("script")
    <script>
        $(document).ready(function() {
            
            // timer
            var time = new Date;

            setInterval(function() {
                $('#js-time').text(Math.round((new Date - time) / 1000));
            }, 1000);

            // exit card


        });
    </script>
@endsection