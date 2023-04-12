@extends('template')

@section('head')
    <!-- This is where your head goes (jk) this is where the stuff you want to put in your head goes -->
    <title>Two Section Page</title>
@endsection

@section('content')
    <div class="container">
        <img class="img" src="/assets/img/404-cat.jpg">
    </div>
@endsection

@section('script')
    <!-- This is where your js/other scripts code goes -->
    <style type="text/css">
        body {
            background-image: none;
            background-color: #DF9FA0;
        }

        .footer {
            background-color: #DC9496;


        }

        .container {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .container img {
            height: 88vh;
        }
    </style>
@endsection
