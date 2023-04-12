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
                <div><img class="profile-picture" src="/assets/img/cats/cat1.jpg"></div>
                <div class="change"><a href="">change profile picture</a></div>


                <button id="openModalBtn">Change Profile Picture (not working)</button>

                <!-- The Modal -->
                <div id="myModal" class="modal">
                    <!-- Modal content -->
                    <div class="modal-content">
                        <span class="close">&times;</span>
                        <h2>Select Profile Picture</h2>
                        <div class="image-grid">
                            <img src="/assets/img/cats/cat1.jpg" class="profile-img" onclick="selectImage('cat1.jpg')">
                            <img src="/assets/img/cats/cat2.jpg" class="profile-img" onclick="selectImage('cat2.jpg')">
                            <img src="/assets/img/cats/cat3.jpg" class="profile-img" onclick="selectImage('cat3.jpg')">
                            <img src="/assets/img/cats/cat4.jpg" class="profile-img" onclick="selectImage('cat4.jpg')">
                            <img src="/assets/img/cats/cat5.jpg" class="profile-img" onclick="selectImage('cat5.jpg')">
                            <img src="/assets/img/cats/cat6.jpg" class="profile-img" onclick="selectImage('cat6.jpg')">
                            <img src="/assets/img/cats/cat7.jpg" class="profile-img" onclick="selectImage('cat7.jpg')">
                            <img src="/assets/img/cats/cat8.jpg" class="profile-img" onclick="selectImage('cat8.jpg')">
                            <img src="/assets/img/cats/cat9.jpg" class="profile-img" onclick="selectImage('cat9.jpg')">
                        </div>
                    </div>
                </div>



                <div class="label">username</div>
                <div class="result">{{ $user['username'] }}</div>
                <div class="label">email</div>
                <div class="result">{{ $user['email'] }}</div>
                <div class="label">joined since</div>
                <div class="result">{{ $user['created_at']->format('Y-m-d') }}</div>
                <div class="password"><a href="" data-bs-toggle="modal" data-bs-target="#forgotPasswordModal">change
                        password (not working yet)</a></div>
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


        /*
                .modal {
                    display: none;
                    /* Hidden by default */
        position: fixed;
        /* Stay in place */
        z-index: 1;
        /* Sit on top */
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        /* Enable scroll if needed */
        background-color: rgba(0, 0, 0, 0.4);
        /* Black w/ opacity */
        }

        /* Modal Content/Box */
        .modal-content {
            background-color: #fefefe;
            margin: 10% auto;
            /* 10% from the top and centered */
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            /* Could be more or less, depending on screen size */
        }

        /* Close Button */
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        .image-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            grid-gap: 10px;
            margin-top: 20px;
        }

        .profile-img {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 50%;
            cursor: pointer;
        }

        */
    </style>
    <script>
        // Get the modal
        var modal = document.getElementById("myModal");

        // Get the button that opens the modal
        var btn = document.getElementById("openModalBtn");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks on the button, open the modal
        btn.onclick = function() {
            modal.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }

        // Get all the profile pictures
        const profilePictures = document.querySelectorAll('.profile-img');

        // Loop through each profile picture and attach a click event listener
        profilePictures.forEach(picture => {
            picture.addEventListener('click', () => {
                // Get the source URL of the clicked profile picture
                const pictureSrc = picture.getAttribute('src');

                // Send an AJAX request to the server to save the picture URL to the database
                const xhr = new XMLHttpRequest();
                xhr.open('POST', '/save-profile-picture', true);
                xhr.setRequestHeader('Content-Type', 'application/json;charset=UTF-8');
                xhr.onreadystatechange = function() {
                    if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
                        // The picture was saved successfully, so update the user interface
                        const response = JSON.parse(xhr.responseText);
                        if (response.success) {
                            // Update the user's profile picture
                            const userProfilePicture = document.querySelector('.user-profile-picture');
                            userProfilePicture.setAttribute('src', pictureSrc);
                        } else {
                            // There was an error saving the picture, so show an error message
                            alert('There was an error saving your profile picture. Please try again.');
                        }
                    }
                };
                xhr.send(JSON.stringify({
                    pictureSrc: pictureSrc
                }));
            });
        });
    </script>
@endsection
