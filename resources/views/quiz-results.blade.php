@extends("template")

@section("head")
    <!-- This is where your head goes (jk) this is where the stuff you want to put in your head goes -->
@endsection

@section("content")
    <div class="block-quiz-results">
        <div class="block-congrats">
            <div class="row">
                <div class="col-12">
                    <p class="block-congrats-p-congrats">CONGRATULATIONS! YOU GOT</p>
                    <p class="block-congrats-p-score">{{$score}}/20</p>
                </div>
            </div>
        </div>
        <div class="block-pic">
            <div class="row">
                <div class="col-12">
                    <img src="/assets/img/stronk-meow.png" alt="" class="block-pic-img">
                </div>
            </div>
        </div>
        <div class="block-reward">
            <div class="row">
                <div class="col-12">
                    <p class="block-reward-p-reward">HERE IS YOUR REWARD</p>
                    <p class="block-reward-p-time"><span class="block-reward-p-time-taken">Time taken: </span>{{$time}} seconds</p>
                </div>
            </div>
        </div>
    </div>
@endsection

@section("script")
    <!-- This is where your js/other scripts code goes -->
@endsection