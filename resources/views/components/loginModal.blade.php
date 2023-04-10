    <!-- Modal for login -->
    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="LoginModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header  border-0">
                    <h5 class="modal-title" id="LoginModalLabel">Login</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    {{-- form for the login --}}
                    <form action="/api/login" method="POST">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Username</label>
                            <input type="text" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1">
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Remember Me</label>
                        </div>
                        <div>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-link" data-bs-toggle="modal"
                                data-bs-target="#forgotPasswordModal">
                                Forgot Password
                            </button>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                    <p>dont have an account?</p>
                    <button type="button" class="btn btn-link" data-bs-toggle="modal" data-bs-target="#registerModal">
                        Register
                    </button>
                </div>
            </div>
        </div>
    </div>
