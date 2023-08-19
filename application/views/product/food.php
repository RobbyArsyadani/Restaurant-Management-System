<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>


  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">List of Foods</h6>
    </div>
    <br>
      <div class="row justify-content-center">
        <?php foreach($food as $foods) : ?>
        <div class="col-md-3 text-center mb-4">
          <div class="card ml-2 border-bottom-warning"  style="box-sizing: border-box; width: 235px; height: 398px;">
            <img style="width: 234px; height: 188px;" src="<?= base_url('assets/img/products/food/') . $foods['image']; ?>" class="card-img">
            <div class="card-body">
              <h6 class="font-weight-bold card-title"><?= $foods["name"]; ?></h6>
              <h6 class="card-price">Rp <?= $foods["price"]; ?></h6>
              <p class="card-text"><?= $foods["description"]; ?></p>
              <div class="container">
                <div class="row justify-content-center">
                  <div class="col-sm">
                    <a href="" class="btn btn-success"><i class="bi bi-currency-dollar"></i></a>
                  </div>
                  <div class="col-sm">
                    <a href="<?= base_url();?>product/edit_food_favorites/<?= $foods['id']; ?>"><i class="btn btn-warning bi bi-star"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
  </div>
</div>
<!-- /.container-fluid -->

<!-- End of Main Content -->