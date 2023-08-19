<div class="container">
    <!-- Outer Row -->
    <div class="row justify-content-center">
        <div class="col-lg-7">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-4 bg-login-image"></div>
                        <div class="col-lg-8">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Login Page</h1>
                                </div>
                                <?php if($this->session->flashdata('logout') != '') { ?>
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        You have been logout!
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                        <?php unset($_SESSION['logout']); ?>
                                    </div>
                                <?php } ?>
                                <?php if($this->session->flashdata('wrong_email') != '') { ?>
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    Your email has not been registered
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                        <?php unset($_SESSION['wrong_email']); ?>
                                    </div>
                                <?php } ?>
                                <?php if($this->session->flashdata('wrong_login') != '') { ?>
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        Your password is wrong!
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                        <?php unset($_SESSION['wrong_login']); ?>
                                    </div>
                                <?php } ?>
                                <?php if($this->session->flashdata('registration') != '') { ?>
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        Your account successfully registered !
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                        <?php unset($_SESSION['registration']); ?>
                                    </div>
                                <?php } ?>
                                <form class="user" method="post" action="<?= base_url('auth'); ?>">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Enter Email Address..." value="<?= set_value('email'); ?>">
                                        <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
                                        <input type="checkbox" class="mt-4"  onclick="myFunction()"> Show password
                                        <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        Login
                                    </button>
                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="<?= base_url('auth/registration'); ?>">Create an Account!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div> 

<script>
    function myFunction() {
                    var x = document.getElementById("password");
                    if (x.type === "password") {
                        x.type = "text";
                    } else {
                        x.type = "password";
                    }
                }
</script>
