@extends('template')

@section('head')
    <!-- This is where your head goes (jk) this is where the stuff you want to put in your head goes -->
    <title>Two Section Page</title>
    <img class="pageLoader" src="/assets/img/meow-loader.gif" alt="">
    @php
        $difficulty = $difficulty ?? 'Easy';
        $activities = app('App\Http\Controllers\LeaderboardController')->getBestActivityPerUser($difficulty);
        $position = 1;
    @endphp
@endsection

@section('content')
    <div class="container">
        <div class="left-section">
            <div class="top-section left-frame"></div>
            <div class="mid-section left-frame">
                <a href="Easy" class="{{ $difficulty == 'Easy' ? 'active' : '' }}">Easy &nbsp;</a>
                <a href="Medium" class="{{ $difficulty == 'Medium' ? 'active' : '' }}">Medium &nbsp;</a>
                <a href="Hard" class="{{ $difficulty == 'Hard' ? 'active' : '' }}">Hard &nbsp;</a>
                <a href="What the meow" class="{{ $difficulty == 'What the meow' ? 'active' : '' }}">What The Meow?
                    &nbsp;</a>
            </div>
            <div class="bottom-section left-frame"></div>
        </div>
        <div class="middle-section"></div>

        <div class="right-section">
            @foreach ($activities as $activity)
                @if ($position == 1)
                    <div class="right-frame">
                        <div class="first">1st</div>
                        <div class="player">{{ $activity['username'] }}</div>
                        <div class="score">{{ $activity['score'] }} / 20</div>
                        <div class="time">{{ $activity['time'] }}s</div>
                    </div>
                @elseif ($position == 2)
                    <div class="right-frame">
                        <div class="second">2nd</div>
                        <div class="player">{{ $activity['username'] }}</div>
                        <div class="score">{{ $activity['score'] }} / 20</div>
                        <div class="time">{{ $activity['time'] }}s</div>
                    </div>
                @elseif ($position == 3)
                    <div class="right-frame">
                        <div class="third">3rd</div>
                        <div class="player">{{ $activity['username'] }}</div>
                        <div class="score">{{ $activity['score'] }} / 20</div>
                        <div class="time">{{ $activity['time'] }}s</div>
                    </div>
                @endif
                @php $position++ @endphp
            @endforeach
            <div class="bottom-frame">
                <table>
                    <thead>
                        <th class="position">Position</th>
                        <th>Username</th>
                        <th>Score</th>
                        <th>Time(s)</th>
                    </thead>
                    <tbody>
                    @php $position = 1 @endphp
                    @foreach ($activities as $activity)
                        @if ($position > 3)
                            <tr>
                                <td class="position">{{ $position }}</td>
                                <td>{{ $activity['username'] }}</td>
                                <td>{{ $activity['score'] }}</td>
                                <td>{{ $activity['time'] }}</td>
                            </tr>
                        @endif
                        @php $position++ @endphp
                    @endforeach
                    </tbody>
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
            height: 78vh;
            display: flex;
            align-items: stretch;
            /* overflow: hidden; */
            
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
            box-shadow: 4px 4px 6px rgba(0, 0, 0, 0.2);

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
            background-color: #FFD390;
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

        .mid-section a.active {
            background-color: #FEAE36;
            color: white;
            font-weight: bold;
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
            height: 22vh;
            width: calc(33.3% - 10px);
            margin-bottom: 10px;
            padding: 10px;
            box-sizing: border-box;
            border-radius: 20px;
            text-align: center;
            box-shadow: 4px 4px 6px rgba(0, 0, 0, 0.2);

        }

        .bottom-frame {
            background-color: white;
            height: 50vh;
            width: 100%;
            margin-top: 10px;
            padding: 10px;
            box-sizing: border-box;
            border-radius: 20px;
            overflow-y: auto;
            box-shadow: 4px 4px 6px rgba(0, 0, 0, 0.2);

        }

        .bottom-frame table {
            width: 100%;
            height: 100%;
            border-collapse: collapse;
        }

        .bottom-frame td {
            padding: 5px;
        }

        .position {
            width: 30px;
        }

        .first {
            font-size: 300%;
        }

        .second {
            padding-top: 5%;
            font-size: 250%;

        }

        .third {
            padding-top: 10%;
            font-size: 200%;

        }

        .player,
        .time,
        .score {
            font-size: 100%;
        }
    </style>
@endsection
