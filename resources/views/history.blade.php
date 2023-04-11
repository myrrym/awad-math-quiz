@extends('template')

@section('head')
    <!-- This is where your head goes (jk) this is where the stuff you want to put in your head goes -->
    <title>Two Section Page</title>
@endsection

@php
  $activities = app('App\Http\Controllers\ActivityController')->getActivities($request);
  $bestActivity = app('App\Http\Controllers\ActivityController')->getBestActivity($request);
  $totalTest = app('App\Http\Controllers\ActivityController')->getTestsCompleted($request);

  $currentRank = app('App\Http\Controllers\ActivityController')->getCurrentRank($request);

  @endphp

@section('content')
        <div class="container">
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
                <div class="top-frame">
                    <a href="{{ route('history', ['difficulty' => 'Easy']) }}">Easy &nbsp;</a>
                </div>
                <div class="top-frame">
                    <a href="{{ route('history', ['difficulty' => 'Medium']) }}">Medium &nbsp;</a>
                </div>
                <div class="top-frame">
                    <a href="{{ route('history', ['difficulty' => 'Hard']) }}">Hard &nbsp;</a>
                </div>
                <div class="top-frame">
                    <a href="{{ route('history', ['difficulty' => 'What the meow']) }}">What The Meow? &nbsp;</a>
                </div>
                <div class="right-frame">
                    <div class="title">best score</div>
                    <div class='info'>{{$bestActivity['score']}}</div>
                    <div class='date'>{{$bestActivity['time']}}</div>
                    <div class='date'>{{$bestActivity['created_at']}}</div>
                </div>
                <div class="right-frame">
                    <div class="title">current rank</div>
                    <div class='info'>{{$currentRank}}</div>
                </div>
                <div class="right-frame">
                    <div class="title">tests completed</div>
                    <div class='info'>{{$totalTest}}</div>
                </div>
                <div class="bottom-frame">
                    <table class="activity-table">
                        <thead>
                          <tr>
                            <th>Score</th>
                            <th>Time</th>
                            <th>Achieved at</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($activities as $activity)
                            <tr>
                              <td>{{$activity['score']}}</td>
                              <td>{{$activity['time']}}</td>
                              <td class="activity-table-time">{{$activity['created_at']}}</td>
                            </tr>
                          @endforeach
                        </tbody>
                      </table> 
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

        .container {
            height: 78vh;
            border: 1px solid black;
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
        }

        .activity-table{
            width: 100%;
        }

        .activity-table td{
            font-size: 15px;
            width: 41%;
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
            overflow-y: auto;
        }

        .top-frame {
            background-color: white;
            height: 8%;
            width: calc(25% - 10px);
            margin-bottom: 10px;
            padding: 10px;
            box-sizing: border-box;
            border-radius: 20px;
        }

        .top-frame a {
            text-decoration: none;
            width: 100%;
            padding-top: 3%;
            padding-left: 11%;
            padding-bottom: 3%;
            color: black;
        }

        .top-frame:hover,.top-frame:hover a{
            background-color: #FEAE36;
            color: white;
        }

        .right-frame {
            background-color: white;
            height: 30%;
            width: calc(33.3% - 10px);
            margin-bottom: 10px;
            padding: 10px;
            box-sizing: border-box;
            border-radius: 20px;
            text-align:center;
        }

        .bottom-frame {
            background-color: white;
            height: 52%;
            width: 100%;
            margin-top: 10px;
            padding: 10px;
            box-sizing: border-box;
            border-radius: 20px;
            overflow-x: hidden;
            overflow-y: auto;

        }

        .title{
            font-size:150%;
            color: #9E9E9E;
            margin-bottom:10%;
        }

        .info{
            font-size:150%;
            font-weight:900;
        }

        .date {
            font-weight:normal;
        }
    </style>
@endsection
