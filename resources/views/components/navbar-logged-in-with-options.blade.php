<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid" id="nav-bar">
        <div class="navbar-nav">
            <a class="nav-link nav-link-ext {{ request()->is('/home') ? 'active' : '' }} " aria-current="page"
                href="/home">home</a>
            <a class="nav-link nav-link-ext" href="leaderboard/Easy">leaderboard</a>
        </div>
        <a class="navbar-brand" href="/home">MATH <img class="logo-math-cat" src="/assets/img/logo-math-cat.png"
                alt=""> CAT</a>
        <div class="navbar-nav">
            <!-- signup trigger modal -->
            <div>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#registerModal">
                    Sign Up
                </button>
            </div>
            <!-- login trigger modal -->
            <div>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#loginModal">
                    Logout
                </button>
            </div>
        </div>
    </div>
</nav>




