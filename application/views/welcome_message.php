
    <?php $tampil = false; ?>
    <!-- Hero Section -->
    <section id="hero" class="hero section dark-background">

      <div id="hero-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">
        <?php 
        $no=1;
        foreach ($slider as $key) : ?>
        <div class="carousel-item <?php if($no==1) {echo "active";} $no++; ?>">
          <img src="<?= base_url() ?>assets/upload_slider/<?= $key->gambar ?>" alt="">
          <div class="carousel-container">
            <h2 class="text-center"><?= $current_lang == "indonesian" ? $key->nama : $key->nama_en ?></h2>
            <p class="text-center"><?= $current_lang == "indonesian" ? $key->deskripsi : $key->deskripsi_en ?></p>
            <a href="#about" class="btn-get-started"><?= $lang['start_now']; ?></a>
          </div>
        </div><!-- End Carousel Item -->

        <?php endforeach ?>

        

        <a class="carousel-control-prev" href="#hero-carousel" role="button" data-bs-slide="prev">
          <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
        </a>

        <a class="carousel-control-next" href="#hero-carousel" role="button" data-bs-slide="next">
          <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
        </a>

        <ol class="carousel-indicators"></ol>

      </div>

    </section><!-- /Hero Section -->

    <!-- About Section -->
    <section id="about" class="about section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2><?= $lang['about_us']; ?></h2>
        <p><?= $lang['about_us_desc']; ?></p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row gy-4">
          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
            <!-- <h3>Voluptatem dignissimos provident laboris nisi ut aliquip ex ea commodo</h3> -->
            <img src="<?= base_url() ?>assets/upload/<?= $profil->gambar ?>" class="img-fluid rounded-4 mb-4" alt="" style="aspect-ratio: 4/5; object-fit: cover;">
            <?= $current_lang == "indonesian" ? $profil->isi : $profil->isi_en ?>
          </div>
          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="250">
            <div class="content ps-0 ps-lg-5">
              <h3><?= $lang['company_legality']; ?></h3>
              <p class="fst-italic">
                <?= $lang['have_company_permits']; ?>
              </p>

              <ul>
                <?php foreach ($sertifikat as $key) : ?>
                  <li><i class="bi bi-check-circle-fill"></i> <span><?= $current_lang == "indonesian" ? $key->nama : $key->nama_en ?></span></li>
                <?php endforeach ?>
              </ul>
              
              

              <div class="partner-slider mb-3">
                  <?php foreach ($sertifikat as $key) : ?>
                  <div><img src="<?= base_url() ?>assets/upload_sertifikat/<?= $key->gambar ?>" class="img-sertifikat" alt="<?= $current_lang == "indonesian" ? $key->nama : $key->nama_en ?>"></div>
                  <?php endforeach ?>
                  
              </div>

              <p>
                <?= $lang['about_us_static']; ?>
              </p>

              <img src="<?= base_url() ?>assets/upload/<?= $profil->gambardua  ?>" class="img-kedua rounded-4" alt="">

            </div>
          </div>
        </div>

      </div>

    </section><!-- /About Section -->
    <?php if($tampil == true) : ?>
    <!-- Why Us Section -->
    <section id="why-us" class="why-us section">

      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
            <div class="card-item">
              <span>01</span>
              <h4><a href="" class="stretched-link">Lorem Ipsum</a></h4>
              <p>Ulamco laboris nisi ut aliquip ex ea commodo consequat. Et consectetur ducimus vero placeat</p>
            </div>
          </div><!-- Card Item -->

          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
            <div class="card-item">
              <span>02</span>
              <h4><a href="" class="stretched-link">Repellat Nihil</a></h4>
              <p>Dolorem est fugiat occaecati voluptate velit esse. Dicta veritatis dolor quod et vel dire leno para dest</p>
            </div>
          </div><!-- Card Item -->

          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="300">
            <div class="card-item">
              <span>03</span>
              <h4><a href="" class="stretched-link">Ad ad velit qui</a></h4>
              <p>Molestiae officiis omnis illo asperiores. Aut doloribus vitae sunt debitis quo vel nam quis</p>
            </div>
          </div><!-- Card Item -->

        </div>

      </div>

    </section><!-- /Why Us Section -->

    <!-- Stats Section -->
    <section id="stats" class="stats section light-background">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">

          <div class="col-lg-3 col-md-6 d-flex flex-column align-items-center">
            <i class="bi bi-emoji-smile"></i>
            <div class="stats-item">
              <span data-purecounter-start="0" data-purecounter-end="232" data-purecounter-duration="1" class="purecounter"></span>
              <p>Happy Clients</p>
            </div>
          </div><!-- End Stats Item -->

          <div class="col-lg-3 col-md-6 d-flex flex-column align-items-center">
            <i class="bi bi-journal-richtext"></i>
            <div class="stats-item">
              <span data-purecounter-start="0" data-purecounter-end="521" data-purecounter-duration="1" class="purecounter"></span>
              <p>Projects</p>
            </div>
          </div><!-- End Stats Item -->

          <div class="col-lg-3 col-md-6 d-flex flex-column align-items-center">
            <i class="bi bi-headset"></i>
            <div class="stats-item">
              <span data-purecounter-start="0" data-purecounter-end="1463" data-purecounter-duration="1" class="purecounter"></span>
              <p>Hours Of Support</p>
            </div>
          </div><!-- End Stats Item -->

          <div class="col-lg-3 col-md-6 d-flex flex-column align-items-center">
            <i class="bi bi-people"></i>
            <div class="stats-item">
              <span data-purecounter-start="0" data-purecounter-end="15" data-purecounter-duration="1" class="purecounter"></span>
              <p>Hard Workers</p>
            </div>
          </div><!-- End Stats Item -->

        </div>

      </div>

    </section><!-- /Stats Section -->

    <!-- Services Section -->
    <section id="services" class="services section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Services</h2>
        <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="service-item  position-relative">
              <div class="icon">
                <i class="bi bi-activity"></i>
              </div>
              <a href="service-details.html" class="stretched-link">
                <h3>Nesciunt Mete</h3>
              </a>
              <p>Provident nihil minus qui consequatur non omnis maiores. Eos accusantium minus dolores iure perferendis tempore et consequatur.</p>
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="service-item position-relative">
              <div class="icon">
                <i class="bi bi-broadcast"></i>
              </div>
              <a href="service-details.html" class="stretched-link">
                <h3>Eosle Commodi</h3>
              </a>
              <p>Ut autem aut autem non a. Sint sint sit facilis nam iusto sint. Libero corrupti neque eum hic non ut nesciunt dolorem.</p>
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
            <div class="service-item position-relative">
              <div class="icon">
                <i class="bi bi-easel"></i>
              </div>
              <a href="service-details.html" class="stretched-link">
                <h3>Ledo Markt</h3>
              </a>
              <p>Ut excepturi voluptatem nisi sed. Quidem fuga consequatur. Minus ea aut. Vel qui id voluptas adipisci eos earum corrupti.</p>
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
            <div class="service-item position-relative">
              <div class="icon">
                <i class="bi bi-bounding-box-circles"></i>
              </div>
              <a href="service-details.html" class="stretched-link">
                <h3>Asperiores Commodit</h3>
              </a>
              <p>Non et temporibus minus omnis sed dolor esse consequatur. Cupiditate sed error ea fuga sit provident adipisci neque.</p>
              <a href="service-details.html" class="stretched-link"></a>
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="500">
            <div class="service-item position-relative">
              <div class="icon">
                <i class="bi bi-calendar4-week"></i>
              </div>
              <a href="service-details.html" class="stretched-link">
                <h3>Velit Doloremque</h3>
              </a>
              <p>Cumque et suscipit saepe. Est maiores autem enim facilis ut aut ipsam corporis aut. Sed animi at autem alias eius labore.</p>
              <a href="service-details.html" class="stretched-link"></a>
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="600">
            <div class="service-item position-relative">
              <div class="icon">
                <i class="bi bi-chat-square-text"></i>
              </div>
              <a href="service-details.html" class="stretched-link">
                <h3>Dolori Architecto</h3>
              </a>
              <p>Hic molestias ea quibusdam eos. Fugiat enim doloremque aut neque non et debitis iure. Corrupti recusandae ducimus enim.</p>
              <a href="service-details.html" class="stretched-link"></a>
            </div>
          </div><!-- End Service Item -->

        </div>

      </div>

    </section><!-- /Services Section -->
    <?php endif ?>
    <!-- Portfolio Section -->
    <section id="portfolio" class="portfolio section">

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

          <center>
              <a href="<?= base_url() ?>galeri" class=" btn-detail align-self-start" style="margin-top: 20px;"><?= $lang['see_more']; ?></a>
          </center>

        </div>

      </div>

    </section><!-- /Portfolio Section -->

    <section id="katalog" class="portfolio section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2><?= $lang['product_catalog']; ?></h2>
        <p><?= $lang['product_catalog_desc']; ?></p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">

          

          <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">

            <?php foreach ($produk as $key) : ?>
                <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
                  <img src="<?= base_url() ?>assets/upload/<?= $key->gambar_prd ?>" class="img-galeri" alt="">
                  <div class="portfolio-info">
                    <h4><?= $current_lang == "indonesian" ? ($key->namaproduk != "" ? $key->namaproduk : "-") : ($key->namaproduk_en != "" ? $key->namaproduk_en : "-") ?></h4>
                    <p><?= $current_lang == "indonesian" ? ($key->namakategori != "" ? $key->namakategori : "-") : ($key->namakategori_en != "" ? $key->namakategori_en : "-") ?></p>
                    <a href="<?= base_url() ?>assets/upload/<?= $key->gambar_prd ?>" title="<?= $current_lang == "indonesian" ? ($key->namaproduk != "" ? $key->namaproduk : "-") : ($key->namaproduk_en != "" ? $key->namaproduk_en : "-") ?>" data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                    <a href="<?= base_url() ?>produk/detail/<?= $key->kd_produk ?>" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                  </div>
                </div><!-- End Portfolio Item -->
            <?php endforeach ?>


            
          </div><!-- End Portfolio Container -->
          <center>
              <a href="<?= base_url() ?>produk" class=" btn-detail align-self-start" style="margin-top: 20px;"><?= $lang['see_more']; ?></a>
          </center>


        </div>
      </div>

    </section><!-- /Portfolio Section -->

    <section id="video" class="portfolio section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2><?= $lang['videos']; ?></h2>
        <p><?= $lang['videos_desc']; ?></p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up">

        <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">

          

          <div class="partner-slider mb-3">
              <?php foreach ($video as $key) : ?>
              <div style="margin:0px 10px"><iframe width="100%" height="300" src="<?= convertToEmbed($key->link) ?>" frameborder="0" allowfullscreen></iframe></div>
              <?php endforeach ?>
              
          </div>
          <center>
              <a href="<?= base_url() ?>video" class=" btn-detail align-self-start" style="margin-top: 20px;"><?= $lang['see_more']; ?></a>
          </center>


        </div>
      </div>

    </section><!-- /Portfolio Section -->
    <?php if($tampil == true) : ?>

    <!-- Team Section -->
    <section id="team" class="team section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Team</h2>
        <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-5">

          <div class="col-xl-4 col-md-6 d-flex" data-aos="zoom-in" data-aos-delay="200">
            <div class="team-member">
              <div class="member-img">
                <img src="<?= base_url() ?>assets/img/team/team-1.jpg" class="img-fluid" alt="">
              </div>
              <div class="member-info">
                <div class="social">
                  <a href=""><i class="bi bi-twitter-x"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
                <h4>Walter White</h4>
                <span>Chief Executive Officer</span>
              </div>
            </div>
          </div><!-- End Team Member -->

          <div class="col-xl-4 col-md-6 d-flex" data-aos="zoom-in" data-aos-delay="400">
            <div class="team-member">
              <div class="member-img">
                <img src="<?= base_url() ?>assets/img/team/team-2.jpg" class="img-fluid" alt="">
              </div>
              <div class="member-info">
                <div class="social">
                  <a href=""><i class="bi bi-twitter-x"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
                <h4>Sarah Jhonson</h4>
                <span>Product Manager</span>
              </div>
            </div>
          </div><!-- End Team Member -->

          <div class="col-xl-4 col-md-6 d-flex" data-aos="zoom-in" data-aos-delay="600">
            <div class="team-member">
              <div class="member-img">
                <img src="<?= base_url() ?>assets/img/team/team-3.jpg" class="img-fluid" alt="">
              </div>
              <div class="member-info">
                <div class="social">
                  <a href=""><i class="bi bi-twitter-x"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
                <h4>William Anderson</h4>
                <span>CTO</span>
              </div>
            </div>
          </div><!-- End Team Member -->

        </div>

      </div>

    </section><!-- /Team Section -->
  

    <!-- Faq Section -->
    <section id="faq" class="faq section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Frequently Asked Questions</h2>
        <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row faq-item" data-aos="fade-up" data-aos-delay="100">
          <div class="col-lg-5 d-flex">
            <i class="bi bi-question-circle"></i>
            <h4>Non consectetur a erat nam at lectus urna duis?</h4>
          </div>
          <div class="col-lg-7">
            <p>
              Feugiat pretium nibh ipsum consequat. Tempus iaculis urna id volutpat lacus laoreet non curabitur gravida. Venenatis lectus magna fringilla urna porttitor rhoncus dolor purus non.
            </p>
          </div>
        </div><!-- End F.A.Q Item-->

        <div class="row faq-item" data-aos="fade-up" data-aos-delay="200">
          <div class="col-lg-5 d-flex">
            <i class="bi bi-question-circle"></i>
            <h4>Feugiat scelerisque varius morbi enim nunc faucibus a pellentesque?</h4>
          </div>
          <div class="col-lg-7">
            <p>
              Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim.
            </p>
          </div>
        </div><!-- End F.A.Q Item-->

        <div class="row faq-item" data-aos="fade-up" data-aos-delay="300">
          <div class="col-lg-5 d-flex">
            <i class="bi bi-question-circle"></i>
            <h4>Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi?</h4>
          </div>
          <div class="col-lg-7">
            <p>
              Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis orci. Faucibus pulvinar elementum integer enim. Sem nulla pharetra diam sit amet nisl suscipit. Rutrum tellus pellentesque eu tincidunt. Lectus urna duis convallis convallis tellus.
            </p>
          </div>
        </div><!-- End F.A.Q Item-->

        <div class="row faq-item" data-aos="fade-up" data-aos-delay="400">
          <div class="col-lg-5 d-flex">
            <i class="bi bi-question-circle"></i>
            <h4>Ac odio tempor orci dapibus. Aliquam eleifend mi in nulla?</h4>
          </div>
          <div class="col-lg-7">
            <p>
              Aperiam itaque sit optio et deleniti eos nihil quidem cumque. Voluptas dolorum accusantium sunt sit enim. Provident consequuntur quam aut reiciendis qui rerum dolorem sit odio. Repellat assumenda soluta sunt pariatur error doloribus fuga.
            </p>
          </div>
        </div><!-- End F.A.Q Item-->

        <div class="row faq-item" data-aos="fade-up" data-aos-delay="500">
          <div class="col-lg-5 d-flex">
            <i class="bi bi-question-circle"></i>
            <h4>Tempus quam pellentesque nec nam aliquam sem et tortor consequat?</h4>
          </div>
          <div class="col-lg-7">
            <p>
              Molestie a iaculis at erat pellentesque adipiscing commodo. Dignissim suspendisse in est ante in. Nunc vel risus commodo viverra maecenas accumsan. Sit amet nisl suscipit adipiscing bibendum est. Purus gravida quis blandit turpis cursus in
            </p>
          </div>
        </div><!-- End F.A.Q Item-->

      </div>

    </section><!-- /Faq Section -->

    <?php endif ?>

    <!-- Contact Section -->
    <section id="contact" class="contact section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2><?= $lang['contact_us']; ?></h2>
        <p><?= $lang['contact_us_desc']; ?></p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">

          <div class="col-lg-6">
            <div class="info-item d-flex flex-column justify-content-center align-items-center" data-aos="fade-up" data-aos-delay="200">
              <i class="bi bi-geo-alt"></i>
              <h3><?= $lang['address']; ?></h3>
              <p><?= $profil->alamat ?></p>
            </div>
          </div><!-- End Info Item -->

          <div class="col-lg-3 col-md-6">
            <div class="info-item d-flex flex-column justify-content-center align-items-center" data-aos="fade-up" data-aos-delay="300">
              <i class="bi bi-telephone"></i>
              <h3><?= $lang['phone_wa']; ?></h3>
              <p><?= $profil->telp ?></p>
            </div>
          </div><!-- End Info Item -->

          <div class="col-lg-3 col-md-6">
            <div class="info-item d-flex flex-column justify-content-center align-items-center" data-aos="fade-up" data-aos-delay="400">
              <i class="bi bi-envelope"></i>
              <h3><?= $lang['email']; ?></h3>
              <p><?= $profil->email ?></p>
            </div>
          </div><!-- End Info Item -->

        </div>
        

        <?php if($tampil == true) : ?>
        <form action="forms/contact.php" method="post" class="php-email-form" data-aos="fade-up" data-aos-delay="400">
          <div class="row gy-4">

            <div class="col-md-6">
              <input type="text" name="name" class="form-control" placeholder="Your Name" required="">
            </div>

            <div class="col-md-6 ">
              <input type="email" class="form-control" name="email" placeholder="Your Email" required="">
            </div>

            <div class="col-md-12">
              <input type="text" class="form-control" name="subject" placeholder="Subject" required="">
            </div>

            <div class="col-md-12">
              <textarea class="form-control" name="message" rows="6" placeholder="Message" required=""></textarea>
            </div>

            <div class="col-md-12 text-center">
              <div class="loading">Loading</div>
              <div class="error-message"></div>
              <div class="sent-message">Your message has been sent. Thank you!</div>

              <button type="submit">Send Message</button>
            </div>

          </div>
        </form><!-- End Contact Form -->
        <?php endif ?>


      </div>

    </section><!-- /Contact Section -->

  