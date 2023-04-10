@extends('template')

@section('head')
<!-- This is where your head goes (jk) this is where the stuff you want to put in your head goes -->
<title>Two Section Page</title>
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
                        description: 'Create account'
                    },
                    {
                        name: 'cat tower.png',
                        description: 'play 100 games'
                    },
                    {
                        name: 'fish.png',
                        description: 'play 10 games'
                    },
                    {
                        name: 'ball.png',
                        description: 'play 20 games'
                    },
                    {
                        name: 'mouse.png',
                        description: 'play 50 games'
                    },
                    {
                        name: 'rubbing cat.png',
                        description: 'get a score of 1000 and above'
                    },
                    {
                        name: 'cat comb.png',
                        description: 'get a score of 500 and above'
                    },
                    {
                        name: 'cat tin.png',
                        description: 'get a quiz 20/20'
                    },
                    {
                        name: 'bone.png',
                        description: 'complete one game on what the meow mode'
                    }
                ];

                // get the table element from HTML
                let table = document.getElementById('myTable');

                // loop through the data and create rows with three columns
                var j_temp = 0;
                var x_temp = 0;

                for (var i = 0; i < 3; i++) {
                    var row = table.insertRow();

                    for (var j = j_temp; j < j_temp+3; j++) {
                        var cell = row.insertCell(0);
                        var img = document.createElement('img');
                        img.src = '/assets/img/achievementImg/' + data[j].name;
                        img.alt = data[j].name;
                        img.width = 150; // set width to 100px
                        img.height = 150; // set height to 100px
                        cell.appendChild(img);

                        cell.style.width = '33.33%';
                    }
                    
                    var row1 = table.insertRow();
                    for (var x = x_temp; x < x_temp+3; x++) {
                        var cell = row1.insertCell(0);
                        cell.innerHTML = data[x].description;

                        cell.style.width = '33.33%';
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
        background-color: #FFD390;
    }

    .my-table td, .my-table th {
      border: 1px solid #ddd;
      padding: 8px;
    }

    .container {
        height: 100%;
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

    .main-frame {
        background-color: white;
        height: 100%;
        /* max-height: 77vh; */
        padding: 30px;
        box-sizing: border-box;
        border-radius: 20px;
        text-align: center;
        /* overflow-y: scroll; */
    }


    .label {
        color: #B6B6B6;
        margin-top: 30px;
    }

    .result {
        font-size: 160%;
    }

    .profile-picture {
        width: 100px;
        height: 100px;
        object-fit: cover;
        border-radius: 50%;
    }

    .picture a {
        color: #B6B6B6;
        font-size: 70%;
    }

    .password {
        margin-top: 30px;
    }

    .password a {
        color: #AC5858;
    }
</style>

@endsection