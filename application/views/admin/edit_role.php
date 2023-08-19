<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-8">
            <form action="" method="post">
                <div class="form-group row">
                    <label for="id" class="col-sm-2 col-form-label">Role ID</label>
                    <div class="col-sm-10">
                        <input type="text" readonly class="form-control" id="id" name="id" value="<?= $role['id']; ?>">
                        <?= form_error('id', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="role" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="role" name="role" value="<?= $role['role']; ?>">
                        <?= form_error('role', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                <div class="form-group row justify-content-end">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </div>
                </div>
            </form>


        </div>
    </div>



</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content --> 