<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

  <div class="row">
    <div class="col-md-6">
    <?php if($this->session->flashdata('edit_food_favorites') != '') { ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            New Food Successfully added!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <?php unset($_SESSION['edit_food_favorites']); ?>
            </div>
        <?php } ?>
        <?php if($this->session->flashdata('edit_drink_favorites') != '') { ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            New Drink Successfully added!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <?php unset($_SESSION['edit_drink_favorites']); ?>
            </div>
        <?php } ?>
    <?php if($this->session->flashdata('delete_food_favorites') != '') { ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            The Food successfully deleted!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <?php unset($_SESSION['delete_food_favorites']); ?>
            </div>
        <?php } ?>
    <?php if($this->session->flashdata('delete_drink_favorites') != '') { ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            The Drink successfully deleted!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <?php unset($_SESSION['delete_drink_favorites']); ?>
            </div>
        <?php } ?>
    </div>
  </div>
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h5 class="m-0 font-weight-bold text-primary">List of Foods</h5>
    </div>
    <br>
    <div class="container">
      <div class="row justify-content-center">
        <?php foreach($food as $foods) : ?>
        <div class="col-md m-2">
          <div class="card" style="width: 18rem;">
            <img src="<?= base_url('assets/img/products/food/') . $foods['image']; ?>" class="card-img">
            <div class="card-body">
              <h5 class="card-title"><?= $foods["name"]; ?></h5>
              <h6 class="card-price">Rp <?= $foods["price"]; ?></h6>
              <p class="card-text"><?= $foods["description"]; ?></p>
              <a href="#" class="btn btn-success"><i class="bi bi-currency-dollar"></i> Order</a>
              <a href="<?= base_url();?>product/delete_food_favorites/<?= $foods['id']; ?>" class="btn btn-danger"><i class="bi bi-trash"></i></a>
            </div>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
  
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h5 class="m-0 font-weight-bold text-primary">List of Drinks</h5>
    </div>
    <br>
    <div class="container">
      <div class="row justify-content-center">
        <?php foreach($drink as $drinks) : ?>
        <div class="col-md m-2">
          <div class="card" style="width: 18rem;">
            <img src="<?= base_url('assets/img/products/drink/') . $drinks['image']; ?>" class="card-img">
            <div class="card-body">
              <h5 class="card-title"><?= $drinks["name"]; ?></h5>
              <h6 class="card-price">Rp <?= $drinks["price"]; ?></h6>
              <p class="card-text"><?= $drinks["description"]; ?></p>
              <a href="#" class="btn btn-success"><i class="bi bi-currency-dollar"></i> Order</a>
              <a href="<?= base_url();?>product/delete_drink_favorites/<?= $drinks['id']; ?>" class="btn btn-danger"><i class="bi bi-trash"></i></a>
            </div>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</div>
<!-- /.container-fluid -->

<!-- End of Main Content -->