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
            <li class="current"><?= $lang['video']; ?></li>
          </ol>
        </div>
      </nav>
    </div><!-- End Page Title -->

    <section id="katalog" class="portfolio section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2><?= $lang['videos']; ?></h2>
        <p><?= $lang['videos_desc']; ?></p>
      </div><!-- End Section Title -->


      <div class="container">
          
        <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">

          

          <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">
            <?php foreach ($video as $key) : ?>
              <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
              <div style="margin:0px 10px"><iframe width="100%" height="300" src="<?= convertToEmbed($key->link) ?>" frameborder="0" allowfullscreen></iframe></div>
            </div>
            <?php endforeach ?>

            
          </div><!-- End Portfolio Container -->

        </div>

      </div>

    </section><!-- /Portfolio Section -->