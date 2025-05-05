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
            <li class=""><a href="<?= base_url() ?>produk"><?= $lang['product']; ?></a></li>
            <li class="current">Detail : <?= $current_lang == "indonesian" ? $produk->namaproduk : $produk->namaproduk_en ?></li>
          </ol>
        </div>
      </nav>
    </div><!-- End Page Title -->

    <!-- Portfolio Details Section -->
    <section id="portfolio-details" class="portfolio-details section">

      <div class="container" data-aos="fade-up">

        <div class="portfolio-details-slider swiper init-swiper">
          <!-- <script type="application/json" class="swiper-config">
            {
              "loop": true,
              "speed": 600,
              "autoplay": {
                "delay": 5000
              },
              "slidesPerView": "auto",
              "navigation": {
                "nextEl": ".swiper-button-next",
                "prevEl": ".swiper-button-prev"
              },
              "pagination": {
                "el": ".swiper-pagination",
                "type": "bullets",
                "clickable": true
              }
            }
          </script>
          <div class="swiper-wrapper align-items-center">

            <div class="swiper-slide">
              <img src="assets/img/portfolio/app-1.jpg" alt="">
            </div>

            <div class="swiper-slide">
              <img src="assets/img/portfolio/product-1.jpg" alt="">
            </div>

            <div class="swiper-slide">
              <img src="assets/img/portfolio/branding-1.jpg" alt="">
            </div>

            <div class="swiper-slide">
              <img src="assets/img/portfolio/books-1.jpg" alt="">
            </div>

          </div>
          <div class="swiper-button-prev"></div>
          <div class="swiper-button-next"></div>
          <div class="swiper-pagination"></div> -->

          <img src="<?= base_url() ?>assets/upload/<?= $produk->gambar_prd ?>" class="img-galeri" alt="">
        </div>
              <div class="sharethis-inline-share-buttons mt-2"></div>

        <div class="row justify-content-between gy-4 mt-4">

          <div class="col-lg-8" data-aos="fade-up">
            <div class="portfolio-description">
              <h2><?= $current_lang == "indonesian" ? $produk->namaproduk : $produk->namaproduk_en ?></h2>

              <p>
                <?= $current_lang == "indonesian" ? $produk->keterangan : $produk->keterangan_en ?>
              </p>

              <h5><b><?= $lang['specification']; ?></b></h5>
              <p>
                <?= $current_lang == "indonesian" ? $produk->spesifikasi : $produk->spesifikasi_en ?>
              </p>

              

            </div>
          </div>

          <div class="col-lg-3" data-aos="fade-up" data-aos-delay="100">
            <div class="portfolio-info">
              <h3><?= $lang['product_information']; ?></h3>
              <ul>
                <li><strong><?= $lang['category']; ?></strong><?= $current_lang == "indonesian" ? $produk->namakategori : $produk->namakategori_en ?></li>
                <!-- <li><strong>Client</strong> ASU Company</li>
                <li><strong>Project date</strong> 01 March, 2020</li>
                <li><strong>Project URL</strong> <a href="#">www.example.com</a></li> -->
                <li><a href="https://wa.me/<?= formatNomorIndonesia($profil->telp) ?>?text=Halo,%20saya%20tertarik%20dengan%20produk%20<?= $current_lang == "indonesian" ? $produk->namaproduk : $produk->namaproduk_en ?>%20Anda." class="btn-visit align-self-start" target="_blank"><i class="fab fa-whatsapp"></i>&nbsp;<?= $lang['order_now']; ?></a></li>
              </ul>
            </div>
          </div>

        </div>

      </div>

    </section><!-- /Portfolio Details Section -->