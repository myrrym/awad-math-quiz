@extends('template')

@section('head')
    <!-- This is where your head goes (jk) this is where the stuff you want to put in your head goes -->
    <title>Two Section Page</title>
    @php
        $user = session('user');
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
            <div class="main-frame">
                <div><img class="profile-picture" src="/assets/img/cats/{{$user['picture']}}"></div>
                <div class="label">username</div>
                <div class="result">{{ $user['username'] }}</div>
                <div class="label">email</div>
                <div class="result">{{ $user['email'] }}</div>
                <div class="label">joined since</div>
                <div class="result">{{ $user['created_at']->format('Y-m-d') }}</div>

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
            height: 100%;
            display: flex;
            flex-wrap: wrap;
            align-items: stretch;
        }

        .left-section {
            background-color: white;
            border-radius: 20px;
            box-sizing: border-box;
            flex-basis: 20%;
            display: flex;
            margin-top: 1%;
            margin-left: 1%;
            height: 77vh;
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
            height: 77vh;
            width: 100%;
            padding: 30px;
            padding-top: 10vh;
            box-sizing: border-box;
            border-radius: 20px;
            text-align: center;
            overflow: scroll;
            box-shadow: 4px 4px 6px rgba(0, 0, 0, 0.2);

        }

        .label {
            color: #B6B6B6;
            margin-top: 30px;
        }

        .result {
            font-size: 160%;
        }

        .profile-picture {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 50%;
        }

        .change a {
            color: #B6B6B6;
            font-size: 70%;
        }

        .password {
            margin-top: 30px;
        }

        .password a {
            color: #AC5858;
        }
    </script>
@endsection
