@extends('template')

@section('head')
    <!-- This is where your head goes (jk) this is where the stuff you want to put in your head goes -->
    <title>Two Section Page</title>
    <img class="pageLoader" src="/assets/img/meow-loader.gif" alt="">
    @php
        $difficulty = $difficulty ?? 'Easy';
        $activities = app('App\Http\Controllers\LeaderboardController')->getBestActivityPerUser($difficulty);
        $position = 4;
    @endphp
@endsection

@section('content')
    <div class="container">
        <div class="left-section">
            <div class="top-section left-frame"></div>
            <div class="mid-section left-frame">
                <a href="Easy">Easy &nbsp;</a>
                <a href="Medium">Medium &nbsp;</a>
                <a href="Hard">Hard &nbsp;</a>
                <a href="What the meow">What The Meow? &nbsp;</a>
            </div>
            <div class="bottom-section left-frame"></div>
        </div>
        <div class="middle-section"></div>

        <div class="right-section">
            <div class="right-frame">
                <div class="second">2nd</div>
                <div class='player'>player2</div>
                <div class='time'>2:00:00</div>
            </div>
            <div class="right-frame">
                <div class="first">1st</div>
                <div class='player'>player1</div>
                <div class='time'>1:00:00</div>
            </div>
            <div class="right-frame">
                <div class="third">3rd</div>
                <div class='player'>player3</div>
                <div class='time'>3:00:00</div>
            </div>
            <div class="bottom-frame">
                <table border='1'>
                    <tr>
                        <td>Position</td>
                        <td>Username</td>
                        <td>Score</td>
                        <td>Time</td>
                    </tr>
                    @foreach ($activities as $activity)
                        <tr>
                            <td>{{ $position++ }}</td>
                            <td>{{ $activity['username'] }}</td>
                            <td>{{ $activity['score'] }}</td>
                            <td>{{ $activity['time'] }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <!-- This is where your js/other scripts code goes -->
    <script>
        $(window).ready(function() {
            // $(function(){
            setTimeout(() => {
                $(".pageLoader").fadeOut(150)
            }, 1000);
            // })
            // $('.pageLoader').fadeOut(500);
        });
    </script>
    <style type="text/css">
        body {
            background-color: #FFD390;
        }

        .container {
            height: 80vh;
            border: 1px solid black;
            display: flex;
            flex-wrap: wrap;
            align-items: stretch;
            overflow: hidden;
        }

        .left-section {
            background-color: white;
            border-radius: 20px;
            box-sizing: border-box;
            flex-basis: 20%;
            display: flex;
            margin-top: 1%;
            margin-left: 1%;
            height: 95%;
            flex-direction: column;
            overflow: hidden;
        }

        .left-frame {
            height: 100%;
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .left-frame a {
            text-decoration: none;
            width: 100%;
            padding-top: 3%;
            padding-left: 11%;
            padding-bottom: 3%;
            color: black;
        }

        .left-frame a:hover {
            background-color: #FEAE36;
            color: white;
        }

        .top-section {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .mid-section {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .bottom-section {
            flex: 10;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .middle-section {
            flex-basis: 2%;
        }

        .right-section {
            margin-top: 1%;
            margin-bottom: 1%;
            flex-basis: 75%;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .right-frame {
            background-color: white;
            height: 20vh;
            width: calc(33.3% - 10px);
            margin-bottom: 10px;
            padding: 10px;
            box-sizing: border-box;
            border-radius: 20px;
            text-align: center;
        }

        .bottom-frame {
            background-color: white;
            height: 52vh;
            width: 100%;
            margin-top: 10px;
            padding: 10px;
            box-sizing: border-box;
            border-radius: 20px;
            overflow: scroll;
        }

        .first {
            font-size: 400%;
        }

        .second {
            padding-top: 5%;
            font-size: 300%;
            margin-bottom: 5%;
        }

        .third {
            padding-top: 10%;
            font-size: 200%;
            margin-bottom: 8%;
        }

        .player,
        .time {
            font-size: 130%;
        }
    </style>
@endsection
