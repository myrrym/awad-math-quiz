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
                <div class="block-question-question">1 + 1 + 1 + 1 + 1 + 1 + 1 = ?</div>
            </div>
            <div class="col-2">
                <div class="block-question-correct">5<br><span class="block-question-correct-small">answers</span></div>
            </div>
        </div>

    </div>

    <div class="block-answer">

        <div class="row">
            <div class="col-6 block-answer-btn block-answer-btn-1">
                <img src="/assets/img/triangle.png" alt="" class="block-answer-btn-img">
                4
            </div>
            <div class="col-6 block-answer-btn block-answer-btn-2">
                <img src="/assets/img/diamond.png" alt="" class="block-answer-btn-img">
                8
            </div>
        </div>

        <div class="row">
            <div class="col-6 block-answer-btn block-answer-btn-3">
                <img src="/assets/img/circle.png" alt="" class="block-answer-btn-img">
                7
            </div>
            <div class="col-6 block-answer-btn block-answer-btn-4">
                <img src="/assets/img/square.png" alt="" class="block-answer-btn-img">
                10
            </div>
        </div>

    </div>
@endsection

@section("script")
    <script>
        $(document).ready(function() {
            console.log("ready");
            
            // timer
            var time = new Date;

            setInterval(function() {
                $('#js-time').text(Math.round((new Date - time) / 1000));
            }, 1000);
        });
    </script>
@endsection