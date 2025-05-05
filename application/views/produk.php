<!-- Page Title -->
    <div class="page-title" data-aos="fade">
      <!-- <div class="heading">
        <div class="container">
          <div class="row d-flex justify-content-center text-center">
            <div class="col-lg-8">
              <h1>Portfolio Details</h1>
              <p class="mb-0">Odio et unde deleniti. Deserunt numquam exercitationem. Officiis quo odio sint voluptas consequatur ut a odio voluptatem. Sit dolorum debitis veritatis natus dolores. Quasi ratione sint. Sit quaerat ipsum dolorem.</p>
            </div>
          </div>
        </div>
      </div> -->
      <nav class="breadcrumbs">
        <div class="container">
          <ol>
            <li><a href="<?= base_url() ?>"><?= $lang['home']; ?></a></li>
            <li class="current"><?= $lang['product']; ?></li>
          </ol>
        </div>
      </nav>
    </div><!-- End Page Title -->

    <section id="katalog" class="portfolio section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2><?= $lang['product_catalog']; ?></h2>
        <?php if (isset($_GET['keywords'])) : ?>
        <p><?= $lang['search_result']; ?>"<b><?= $_GET['keywords'] ?></b>"</p>

        <?php else : ?>
        <p><?= $lang['product_catalog_desc']; ?></p>
        <?php endif ?>
      </div><!-- End Section Title -->

      <div class="container">
        <form action="" method="GET">
          <div style="display: flex;gap: 10px; margin-bottom: 20px;">
            <div style="display: inline-block; width: 100%;">
              <input type="text" name="keywords" class="form-control" value="<?= (isset($_GET['keywords'])) ? $_GET['keywords'] : '' ?>" placeholder="<?= $lang['search_product']; ?>">
            </div>
            <div style="display: inline-block; min-width: 150px;">
              <button  type="submit" class="btn btn-primary btn-block" style="width:100%"><i class="fas fa-search"></i>&nbsp;<?= $lang['search']; ?></button>
            </div>
          </div>
        </form>
        <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">

          

          <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">

            <?php foreach ($produk as $key) : ?>
                <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
                  <img src="<?= base_url() ?>assets/upload/<?= $key->gambar_prd ?>" class="img-galeri" alt="">
                  <div class="portfolio-info">
                    <h4><?= $key->namaproduk != "" ? $key->namaproduk : "-" ?></h4>
                    <p><?= $key->namakategori != "" ? $key->namakategori : "-" ?></p>
                    <a href="<?= base_url() ?>assets/upload/<?= $key->gambar_prd ?>" title="<?= $key->namaproduk ?>" data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                    <a href="<?= base_url() ?>produk/detail/<?= $key->kd_produk ?>" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                  </div>
                </div><!-- End Portfolio Item -->
            <?php endforeach ?>

            
          </div><!-- End Portfolio Container -->

        </div>

      </div>

    </section><!-- /Portfolio Section -->