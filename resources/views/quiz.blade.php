@extends("template")

@section("head")
    <!-- This is where your head goes (jk) this is where the stuff you want to put in your head goes -->
@endsection

@section("content")
    <div class="block-question">

        <div class="row">
            <div class="col-2">
                <div class="block-question-score">101s</div>
            </div>
            <div class="col-8">
                <div class="block-question-question">1 + 1 + 1 + 1 + 1 + 1 + 1 = ?</div>
            </div>
            <div class="col-2">
                <div class="block-question-correct">5<br>answers</div>
            </div>
        </div>

    </div>

    <div class="block-answer">

        <div class="row">
            <div class="col-6"></div>
            <div class="col-6"></div>
        </div>

        <div class="row">
            <div class="col-6"></div>
            <div class="col-6"></div>
        </div>

    </div>
@endsection

@section("script")
    <!-- This is where your js/other scripts code goes -->
@endsection