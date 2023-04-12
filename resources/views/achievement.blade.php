@extends('template')

@section('head')
    <!-- This is where your head goes (jk) this is where the stuff you want to put in your head goes -->
    <title>Two Section Page</title>
    @php
        $user = session('user');
        $tengames = app('App\Http\Controllers\AchievementController')->getTenGames($user['id']);
        $twentygames = app('App\Http\Controllers\AchievementController')->getTwentyGames($user['id']);
        $fiftygames = app('App\Http\Controllers\AchievementController')->getFiftyGames($user['id']);
        $hundredgames = app('App\Http\Controllers\AchievementController')->getHundredGames($user['id']);
        $tenscore = app('App\Http\Controllers\AchievementController')->getTenScore($user['id']);
        $fifteenscore = app('App\Http\Controllers\AchievementController')->getFifteenScore($user['id']);
        $fullscore = app('App\Http\Controllers\AchievementController')->getFullScore($user['id']);
        $whatthemeow = app('App\Http\Controllers\AchievementController')->getWhatTheMeow($user['id']);
    @endphp
@endsection

@section('content')
    <div class="container">
        {{-- LEFT SECTION BECOME COMPONENT --}}
        <div class="left-section">
            <div class="top-section left-frame"></div>
            <div class="mid-section left-frame">
                <a href="/user">Profile &nbsp;</a>
                <a href="/history">History &nbsp;</a>
                <a href="/achievement">Achievement &nbsp;</a>
            </div>
            <div class="bottom-section left-frame"></div>
        </div>
        <div class="middle-section"></div>
        <div class="right-section">
            <div class="main-frame ">
                <table id="myTable" class="my-table"></table>
                <script>
                    // retrieve data from SQL and store in 'data' variable
                    let data = [{
                            name: 'cat neck.png',
                            description: 'Create account',
                            Achieved: 'true',
                        },
                        {
                            name: 'cat tower.png',
                            description: 'play 100 games',
                            Achieved: '{{ $hundredgames }}'

                        },
                        {
                            name: 'fish.png',
                            description: 'play 10 games',
                            Achieved: '{{ $tengames }}',

                        },
                        {
                            name: 'ball.png',
                            description: 'play 20 games',
                            Achieved: '{{ $twentygames }}',

                        },
                        {
                            name: 'mouse.png',
                            description: 'play 50 games',
                            Achieved: '{{ $fiftygames }}'

                        },
                        {
                            name: 'rubbing cat.png',
                            description: 'get a score of 15 and above',
                            Achieved: '{{ $fifteenscore }}'

                        },
                        {
                            name: 'cat comb.png',
                            description: 'get a score of 10 and above',
                            Achieved: '{{ $tenscore }}'

                        },
                        {
                            name: 'cat tin.png',
                            description: 'get full marks!',
                            Achieved: '{{ $fullscore }}'

                        },
                        {
                            name: 'bone.png',
                            description: 'play 1 quiz in what the meow mode',
                            Achieved: '{{ $whatthemeow }}'

                        }
                    ];

                    // get the table element from HTML
                    let table = document.getElementById('myTable');


                    var j_temp = 0;
                    var x_temp = 0;
                    // get the height of the screen
                    var screenHeight = screen.height;

                    // loop through the data and create rows with three columns
                    for (var i = 0; i < 3; i++) {
                        var row = table.insertRow();

                        for (var j = j_temp; j < j_temp + 3; j++) {
                            var cell = row.insertCell(0);
                            var img = document.createElement('img');
                            img.src = '/assets/img/achievementImg/' + data[j].name;
                            img.alt = data[j].name;
                            img.width = screenHeight * 0.15; // set width to 100px
                            img.height = screenHeight * 0.15; // set height to 100px

                            if (data[j].Achieved === 'false') {
                                img.style.opacity = 0.2;
                            }

                            cell.appendChild(img);

                            cell.style.width = '33.33%';
                        }

                        var row1 = table.insertRow();
                        for (var x = x_temp; x < x_temp + 3; x++) {
                            var cell = row1.insertCell(0);
                            cell.innerHTML = data[x].description;
                            cell.style.width = '33.33%';

                            if (data[x].Achieved === 'false') {
                                cell.style.opacity = 0.2;
                            }
                        }

                        j_temp = j;
                        x_temp = x;
                    }

                    document.querySelector('.main-frame').appendChild(table);
                </script>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <!-- This is where your js/other scripts code goes -->
    <style type="text/css">
        body {
            height: 100%;
        }

        .container {
            height: 78vh;
            display: flex;
            align-items: stretch;
            /* overflow: hidden; */
        }

        .my-table td,
        .my-table th {
            padding: 8px;
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

        .main-frame {
            background-color: white;
            height: 100%;
            width: 90%;
            padding: 30px;
            box-sizing: border-box;
            border-radius: 20px;
            text-align: center;
            overflow-y: auto;
        }
    </style>
@endsection
