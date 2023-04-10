    <!-- Modal for register -->
    <div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header  border-0">
                    <h5 class="modal-title" id="exampleModalLabel">Sign Up</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    {{-- form for the login --}}
                    <form>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Username</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                    <p>already have an account?</p>
                    <button type="button" class="btn btn-link" data-bs-toggle="modal" data-bs-target="#loginModal">
                        Login
                    </button>
                </div>
            </div>
        </div>
    </div>
