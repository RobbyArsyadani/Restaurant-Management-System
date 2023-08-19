<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
  <div class="row">
    <div class="col-md-6">
    <?php if($this->session->flashdata('edit_food') != '') { ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            The Food successfully updated!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <?php unset($_SESSION['edit_food']); ?>
            </div>
        <?php } ?>
    <?php if($this->session->flashdata('add_food') != '') { ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            New Food successfully added!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <?php unset($_SESSION['add_food']); ?>
            </div>
        <?php } ?>
    <?php if($this->session->flashdata('delete_food') != '') { ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            The Food successfully deleted!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <?php unset($_SESSION['delete_food']); ?>
            </div>
        <?php } ?>
    </div>
  </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Food Table</h6>
        </div>
        <div class="card-body">
                            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newRoleModal"><i class="bi bi-plus-square"></i>&nbsp;&nbsp;Add Product</a>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr class="justify-content-center">
                                          <th class="text-center">No</th>
                                          <th class="text-center">Image</th>
                                          <th class="text-center">Name</th>
                                          <th class="text-center">Price</th>
                                          <th class="text-center">Description</th>
                                          <th class="text-center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($food as $foods) : ?>
                                        <tr>
                                            <td class="text-center"><?= $foods["id"]; ?></td>
                                            <td class="text-center"><img src="<?= base_url('assets/img/products/food/') . $foods['image']; ?>" class="img-thumbnail"></td>
                                            <td class="text-center"><?= $foods["name"]; ?></td>
                                            <td class="text-center"><?= $foods["price"]; ?></td>
                                            <td class="text-center"><?= $foods["description"]; ?></td>
                                            <td class="text-center">
                                                <a href="<?= base_url();?>admin/edit_food/<?= $foods['id']; ?>" class="badge badge-success"><i class="bi bi-pencil-square"></i></a>
                                                <a href="<?= base_url();?>admin/deleteFood/<?= $foods['id']; ?>" class="badge badge-danger"><i class="bi bi-trash"></i></a></td>
                                        </tr>
                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
<!-- /.container-fluid -->

<!-- End of Main Content -->


<!-- Modal -->
<div class="modal fade" id="newRoleModal" tabindex="-1" role="dialog" aria-labelledby="newRoleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newRoleModalLabel">New Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open_multipart('admin/food'); ?>
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="role" name="name" placeholder="Product name">  <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                        <br>
                        <input type="text" class="form-control" id="role" name="price" placeholder="Price">  <?= form_error('price', '<small class="text-danger pl-3">', '</small>'); ?>
                        <br>
                        <input type="text" class="form-control" id="role" name="description" placeholder="Description">  <?= form_error('description', '<small class="text-danger pl-3">', '</small>'); ?>
                        <br>
                        <div class="custom-file">
                                <input type="file" class="custom-file-input" id="image" name="image">
                                <label class="custom-file-label" for="image">Choose file</label>
                            </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div> 