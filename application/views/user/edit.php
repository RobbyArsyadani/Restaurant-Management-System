<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>


    <div class="row">
        <div class="col-lg-8">
            <?= form_open_multipart('user/edit'); ?>
            <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="email" name="email" value="<?= $user['email']; ?>" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Full name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" name="name" value="<?= $user['name']; ?>">
                    <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="birth_place" class="col-sm-2 col-form-label">Birth Of Date</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="birth_place" name="birth_place" value="<?= $user['birth_place']; ?>">
                    <?= form_error('birth_place', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="col-sm-5">
                    <input type="date" class="form-control" id="bdate" name="bdate" value="<?= $user['bdate']; ?>">
                    <?= form_error('bdate', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="gender" class="col-sm-2 col-form-label">Gender</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="gender" name="gender" value="<?= $user['gender']; ?>">
                    <?= form_error('gender', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="blood_type" class="col-sm-2 col-form-label">Blood Type</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="blood_type" name="blood_type" value="<?= $user['blood_type']; ?>">
                    <?= form_error('blood_type', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="citizenship" class="col-sm-2 col-form-label">Citizenship</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="citizenship" name="citizenship" value="<?= $user['citizenship']; ?>">
                    <?= form_error('citizenship', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="religion" class="col-sm-2 col-form-label">Religion</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="religion" name="religion" value="<?= $user['religion']; ?>">
                    <?= form_error('religion', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-2">Picture</div>
                <div class="col-sm-10">
                    <div class="row">
                        <div class="col-sm-3">
                            <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="img-thumbnail">
                        </div>
                        <div class="col-sm-9">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="image" name="image">
                                <label class="custom-file-label" for="image">Choose file</label>
                            </div>
                        </div>
                    </div>
                </div>
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