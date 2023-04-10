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
            <div class="main-frame">
                <div><img class="profile-picture" src="/assets/img/profile_picture.jpg" alt=""></div>
                <div class="picture"><a href="#">change profile picture</a></div>
                <div class="label">username</div>
                <div class="result">sir_meow</div>
                <div class="label">email</div>
                <div class="result">sir_meow@catmail.com</div>
                <div class="label">joined since</div>
                <div class="result">5th March 2023</div>
                <div class="password"><a href="" data-bs-toggle="modal" data-bs-target="#forgotPasswordModal">change password</a></div>                
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
            border: 1px solid black;
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
            height:77vh;
            width: 100%;
            margin-top: 0px;
            padding: 30px;
            box-sizing: border-box;
            border-radius: 20px;
            text-align: center;
            overflow: scroll;
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
