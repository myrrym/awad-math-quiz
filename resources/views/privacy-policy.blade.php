@extends('template')

@section('head')
    <!-- This is where your head goes (jk) this is where the stuff you want to put in your head goes -->
    <title>Two Section Page</title>
@endsection

@section('content')
    <div class="container">
        <div class="main-frame">
            <div class='title'>Privacy Policy</div>
            <div class='content'>
                Human Benchmark operates the https://humanbenchmark.com website, which provides the SERVICE.
                This page is used to inform website visitors regarding our policies with the collection, use, and disclosure
                of Personal Information if anyone decided to use our Service, the Human Benchmark website.
                If you choose to use our Service, then you agree to the collection and use of information in relation with
                this policy. The Personal Information that we collect are used for providing and improving the Service. We
                will not use or share your information with anyone except as described in this Privacy Policy.
            </div>
            <div class='title'>Information Collection and Use</div>
            <div class='content'>
                For a better experience while using our Service, we may require you to provide us with certain personally
                identifiable information, including but not limited to your name, phone number, and postal address. The
                information that we collect will be used to contact or identify you.
            </div>
            <div class='title'>Log Data</div>
            <div class='content'>
                We want to inform you that whenever you visit our Service, we collect information that your browser sends to
                us that is called Log Data. This Log Data may include information such as your computer’s Internet Protocol
                ("IP") address, browser version, pages of our Service that you visit, the time and date of your visit, the
                time spent on those pages, and other statistics.
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
            height: 578px;
            border: 1px solid black;
            display: flex;
            flex-wrap: wrap;
            align-items: stretch;
            overflow: hidden;
        }

        .main-frame {
            background-color: white;
            height: 92%;
            width: 100%;
            margin-top: 2%;
            padding: 30px;
            padding-left: 5%;
            padding-right: 5%;
            box-sizing: border-box;
            border-radius: 20px;
            color: #5A5A5A;
        }

        .title {
            font-size:200%;
            font-weight:bold;
            margin-top:1%;
        }
    </style>
@endsection
