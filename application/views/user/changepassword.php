<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-md-5">
        <?php if($this->session->flashdata('change_password') != '') { ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            Your password has been changed!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <?php unset($_SESSION['change_password']); ?>
            </div>
        <?php } ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <form action="<?= base_url('user/changepassword'); ?>" method="post">
                <div class="form-group">
                    <label for="current_password">Current Password</label>
                    <input type="password" class="form-control" id="current_password" name="current_password">
                    <input type="checkbox" onclick="myFunction1()"> Show Password
                    <?= form_error('current_password', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="new_password1">New Password</label>
                    <input type="password" class="form-control" id="new_password1" name="new_password1">
                    <input type="checkbox" onclick="myFunction2()"> Show Password
                    <?= form_error('new_password1', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="new_password2">Repeat Password</label>
                    <input type="password" class="form-control" id="new_password2" name="new_password2">
                    <input type="checkbox" onclick="myFunction3()"> Show Password
                    <?= form_error('new_password2', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Change Password</button>
                </div>
            </form>

        </div>
    </div>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content --> 

<script>
    function myFunction1() {
                    var x = document.getElementById("current_password");
                    if (x.type === "password") {
                        x.type = "text";
                    } else {
                        x.type = "password";
                    }
                }
    function myFunction2() {
                    var x = document.getElementById("new_password1");
                    if (x.type === "password") {
                        x.type = "text";
                    } else {
                        x.type = "password";
                    }
                }
    function myFunction3() {
                    var x = document.getElementById("new_password2");
                    if (x.type === "password") {
                        x.type = "text";
                    } else {
                        x.type = "password";
                    }
                }
</script>