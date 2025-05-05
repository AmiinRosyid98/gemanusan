
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title><?= $title ?> - <?= $profil->namaperusahaan ?></title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="<?= base_url() ?>assets/upload_umum/favicon.png" rel="icon">
  <link href="<?= base_url() ?>assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?= base_url() ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?= base_url() ?>assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?= base_url() ?>assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="<?= base_url() ?>assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="<?= base_url() ?>assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel/slick/slick.css" />
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel/slick/slick-theme.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=67fdff776c37ac0019fcb5bf&product=inline-share-buttons&source=platform" async="async"></script>
  

  <!-- Main CSS File -->
  <link href="<?= base_url() ?>assets/css/main.css" rel="stylesheet">
  <style type="text/css">
    .img-sertifikat{
        width: 90%;
        height: auto;
        aspect-ratio: 4/5;
        object-fit: cover;
        border-radius: 5px;
/*        border : 1px solid #b8b8b8*/
      }
      .img-kedua{
        width: 100%;
        height: auto;
        aspect-ratio: 4/2;
        object-fit: cover;
        border-radius: 5px;
      }
      .img-galeri{
        width: 100%;
        height: auto;
        aspect-ratio: 5/3;
        object-fit: cover;
        border-radius: 5px;
        border : 1px solid #b8b8b8
      }
      .btn-detail{
            color: var(--contrast-color);
          background: var(--accent-color);
          font-family: var(--heading-font);
          font-weight: 500;
          font-size: 15px;
          letter-spacing: 1px;
          display: inline-block;
          padding: 8px 32px;
          border-radius: 50px;
          transition: 0.5s;
          margin: 10px;
          animation: fadeInUp 1s both 0.4s;
      }
      .btn-detail:hover{
        color: var(--contrast-color);
        opacity: 0.8 !important;

      }
      .bahasa{
        cursor: pointer;
      }
      .changelang.active{
        background: blue;
        color:white;
      }
      @media (min-width: 769px) {

        .bahasa{
          width: 100%;
          text-align: right;
        }
      }

      @media (max-width: 768px) {
        .bahasa{
          width: unset;
          text-align: unset;
          margin-left: 20px;
        }
      }

  </style>

  <!-- =======================================================
  * Template Name: Mamba
  * Template URL: https://bootstrapmade.com/mamba-one-page-bootstrap-template-free/
  * Updated: Aug 07 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="index-page">

  <header id="header" class="header sticky-top">

    <div class="topbar d-flex align-items-center">
      <div class="container d-flex justify-content-center justify-content-md-between">
        <div class="contact-info d-flex align-items-center">
          <i class="bi bi-envelope d-flex align-items-center"><a href="mailto:<?= $profil->email ?>"><?= $profil->email ?></a></i>
          <i class="bi bi-phone d-flex align-items-center ms-4"><a href="https://wa.me/<?= formatNomorIndonesia($profil->telp) ?>?text=Hallo,%20saya%20ingin%20mendapat%20informasi%20lebih%20lanjut%20mengenai%20Gema%20Marina%20Nusantara."><?= $profil->telp ?></a></i>
        </div>
        <div class="bahasa">
          <div class="btn-group">
            <span  class=" dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <?= $current_lang == "indonesian" ? "IN" : "EN" ?> 
            </span>
            <div class="dropdown-menu dropdown-menu-right">
              <button class="dropdown-item changelang <?php if($current_lang == "indonesian") {echo "active";} ?>" value="indonesian" type="button">IN</button>
              <button class="dropdown-item changelang <?php if($current_lang == "english") {echo "active";} ?>" value="english" type="button">EN</button>
            </div>
          </div>
        </div>
        <div class="social-links d-none d-md-flex align-items-center">
          <a target="_blank" href="<?= $profil->twitter ?>" class="twitter"><i class="bi bi-twitter-x"></i></a>
          <a target="_blank" href="<?= $profil->facebook ?>" class="facebook"><i class="bi bi-facebook"></i></a>
          <a target="_blank" href="<?= $profil->instagram ?>" class="instagram"><i class="bi bi-instagram"></i></a>
          <a target="_blank" href="<?= $profil->linkedin ?>" class="linkedin"><i class="bi bi-linkedin"></i></a>
        </div>
      </div>
    </div><!-- End Top Bar -->

    <div class="branding d-flex align-items-cente">

      <div class="container position-relative d-flex align-items-center justify-content-between">
        <a href="<?= base_url() ?>" class="logo d-flex align-items-center">
          <!-- Uncomment the line below if you also wish to use an image logo -->
          <img src="<?= base_url() ?>assets/img/logo_gemanusan.jpg" alt="">
          <!-- <h1 class="sitename">Mamba</h1> -->
        </a>

        <nav id="navmenu" class="navmenu">
          <ul>
            <?php if ($this->uri->segment(1) == "" ) : ?>
            <li><a href="<?= base_url() ?>" class="active"><?php echo $lang['home']; ?></a></li>
            <li><a href="#about"><?php echo $lang['about_us']; ?></a></li>
            <li><a href="#portfolio"><?php echo $lang['gallery']; ?></a></li>
            <li><a href="#katalog"><?php echo $lang['product_catalog']; ?></a></li>
            <li><a href="#video"><?php echo $lang['videos']; ?></a></li>
            <li><a href="#contact"><?php echo $lang['contact']; ?></a></li>
            <?php else : ?>
            <li><a href="<?= base_url() ?>" ><?php echo $lang['back_to_home']; ?></a></li>

            <?php endif ?>


          </ul>
          <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>



      </div>

    </div>

  </header>

  <main class="main">