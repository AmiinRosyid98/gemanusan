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
            <li class="current"><?= $lang['gallery']; ?></li>
          </ol>
        </div>
      </nav>
    </div><!-- End Page Title -->

    <section id="katalog" class="portfolio section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2><?= $lang['gallery']; ?></h2>
        <p><?= $lang['gallery_desc']; ?></p>
      </div><!-- End Section Title -->


      <div class="container">
          
        <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">

          

          <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">

            <?php foreach ($galeri as $key) : ?>
                <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
                  <img src="<?= base_url() ?>assets/upload_galeri/<?= $key->gambar ?>" class="img-galeri" alt="">
                  <div class="portfolio-info">
                    <h4><?= $current_lang == "indonesian" ? ($key->nama != "" ? $key->nama : "-") : ($key->nama_en != "" ? $key->nama_en : "-") ?></h4>
                    <p><?= $current_lang == "indonesian" ? ($key->deskripsi != "" ? $key->deskripsi : "-") : ($key->deskripsi_en != "" ? $key->deskripsi_en : "-") ?></p>
                    <a href="<?= base_url() ?>assets/upload_galeri/<?= $key->gambar ?>" title="<?= $current_lang == "indonesian" ? ($key->nama != "" ? $key->nama : "-") : ($key->nama_en != "" ? $key->nama_en : "-") ?>" data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                  </div>
                </div><!-- End Portfolio Item -->
            <?php endforeach ?>

            
          </div><!-- End Portfolio Container -->

        </div>

      </div>

    </section><!-- /Portfolio Section -->