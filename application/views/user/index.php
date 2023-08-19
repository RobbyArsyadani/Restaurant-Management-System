<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-6">
        <?php if($this->session->flashdata('edit_profile') != '') { ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            Your profile Successfully updated!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <?php unset($_SESSION['edit_profile']); ?>
            </div>
        <?php } ?>
        </div>
    </div>
    <div class="card mb-3 col-lg-8">
        <div class="row no-gutters">
            <div class="col-md-4">
                <img  src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="card-img mt-2">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title"><?= $user['name']; ?></h5>
                    <p class="card-text"><?= $user['email']; ?></p>
                    <p class="card-text"><?= $user['birth_place']; echo " "; echo $user['bdate'];?></p>
                    <p class="card-text"><?php if($user['role_id'] == 1){echo 'Administrator';} else if($user['role_id'] == 2){echo 'Student';} else{echo 'Lecturer';} ?></p>
                    <p class="card-text"><?= $user['religion']; echo " | "; echo $user['gender']; echo " | "; echo $user['blood_type'];  ?></p>
                    <p class="card-text"><?= $user['citizenship']; ?></p>
                    <p class="card-text"><small class="text-muted">Since <?= date('d F Y', $user['date_created']); ?></small></p>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content --> 