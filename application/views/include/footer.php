</main>

  <footer id="footer" class="footer light-background">

    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-4 col-md-6 footer-about">
          <a href="index.html" class="logo d-flex align-items-center">
            <span class="sitename">Gema Marina Nusantara</span>
          </a>
          <div class="footer-contact pt-3">
            <p><?= $profil->alamat ?></p>
            <p class="mt-3"><strong><?= $lang['phone']; ?>:</strong> <span><?= $profil->telp ?></span></p>
            <p><strong><?= $lang['email']; ?>:</strong> <span><?= $profil->email ?></span></p>
          </div>
          <div class="social-links d-flex mt-4">
            <a target="_blank" href="<?= $profil->twitter ?>"><i class="bi bi-twitter-x"></i></a>
            <a target="_blank" href="<?= $profil->facebook ?>"><i class="bi bi-facebook"></i></a>
            <a target="_blank" href="<?= $profil->instagram ?>"><i class="bi bi-instagram"></i></a>
            <a target="_blank" href="<?= $profil->linkedin ?>"><i class="bi bi-linkedin"></i></a>
          </div>
        </div>
        <div class="col-lg-8">
          <div style="width: 100%; border-radius: 5px;">
            <?= convertToEmbed_maps($profil->embed_maps) ?>
            
          </div>
        </div>
        <!--
        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Useful Links</h4>
          <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">About us</a></li>
            <li><a href="#">Services</a></li>
            <li><a href="#">Terms of service</a></li>
            <li><a href="#">Privacy policy</a></li>
          </ul>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Our Services</h4>
          <ul>
            <li><a href="#">Web Design</a></li>
            <li><a href="#">Web Development</a></li>
            <li><a href="#">Product Management</a></li>
            <li><a href="#">Marketing</a></li>
            <li><a href="#">Graphic Design</a></li>
          </ul>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Hic solutasetp</h4>
          <ul>
            <li><a href="#">Molestiae accusamus iure</a></li>
            <li><a href="#">Excepturi dignissimos</a></li>
            <li><a href="#">Suscipit distinctio</a></li>
            <li><a href="#">Dilecta</a></li>
            <li><a href="#">Sit quas consectetur</a></li>
          </ul>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Nobis illum</h4>
          <ul>
            <li><a href="#">Ipsam</a></li>
            <li><a href="#">Laudantium dolorum</a></li>
            <li><a href="#">Dinera</a></li>
            <li><a href="#">Trodelas</a></li>
            <li><a href="#">Flexo</a></li>
          </ul>
        </div>
      -->

      </div>
    </div>

    <div class="container copyright text-center mt-4">
      <p>© <span>Copyright</span> <strong class="px-1 sitename">Gema Marina Nusantara</strong> <span>All Rights Reserved</span></p>
      <div class="credits">
        
      </div>
    </div>

  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="<?= base_url() ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url() ?>assets/vendor/php-email-form/validate.js"></script>
  <script src="<?= base_url() ?>assets/vendor/aos/aos.js"></script>
  <script src="<?= base_url() ?>assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="<?= base_url() ?>assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="<?= base_url() ?>assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
  <script src="<?= base_url() ?>assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="<?= base_url() ?>assets/vendor/swiper/swiper-bundle.min.js"></script>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/slick-carousel/slick/slick.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
  

  <script type="text/javascript">
    $(document).ready(function(){
        $('.partner-slider').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
      });
    })
    $('.changelang').click(function(){
      let value = $(this).attr("value");
       $.ajax({
          url: "<?= base_url() ?>welcome/switchLang", // Ganti dengan URL backend kamu
          type: "POST",
          data: {
              value:value,
          },
          dataType: "json",
          success: function (response) {
              if(response.status =="gagal"){
                alert("Ubah Gagal")
                  
              }  else {
                  location.reload()
              }
              // $("#status").html("Upload berhasil: " + response);
          },
          error: function () {
              alert("Ubah Gagal")
          }
      });
    })
  </script>

  <!-- Main JS File -->
  <script src="<?= base_url() ?>assets/js/main.js"></script>

</body>

</html>