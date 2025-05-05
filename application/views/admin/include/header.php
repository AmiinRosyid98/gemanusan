<!DOCTYPE html>

<!-- =========================================================
* Sneat - Bootstrap 5 HTML Admin Template - Pro | v1.0.0
==============================================================

* Product Page: https://themeselection.com/products/sneat-bootstrap-html-admin-template/
* Created by: ThemeSelection
* License: You must have a valid license purchased in order to legally use the theme for your project.
* Copyright ThemeSelection (https://themeselection.com)

=========================================================
 -->
<!-- beautify ignore:start -->
<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="<?= base_url() ?>assets/admin/assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <?php 
      $result= $this->db 
            ->where('id_profil',1)
            ->limit(1)
            ->get('profil')->row();
    ?>

    <title><?= $title ?> | Administrator <?= $result->namaperusahaan ?></title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="<?= base_url() ?>assets/upload_umum/favicon.png" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/admin/assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/admin/assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="<?= base_url() ?>assets/admin/assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="<?= base_url() ?>assets/admin/assets/css/demo.css" />
    <link rel="stylesheet" href="<?= base_url() ?>assets/admin/assets/css/datatable.min.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <link rel="stylesheet" href="<?= base_url() ?>assets/admin/assets/vendor/libs/apex-charts/apex-charts.css" />

    <script src="<?php echo base_url('assets/assets_gema')?>/ckeditor/ckeditor.js"></script>
    <script src="<?php echo base_url('assets/assets_gema')?>/ckeditor/styles.js"></script>

    <!-- Slick CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel/slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel/slick/slick-theme.css" />

    <!-- jQuery & Slick JS -->
    


    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="<?= base_url() ?>assets/admin/assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="<?= base_url() ?>assets/admin/assets/js/config.js"></script>
    <script src="<?= base_url() ?>assets/admin/assets/js/iziToast.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


    <style type="text/css">
      .img-sertifikat{
        width: 100px;
        height: auto;
        aspect-ratio: 4/5;
        object-fit: cover;
        border-radius: 5px;
        border : 1px solid #b8b8b8
      }
      .changelang.active{
        background: blue;
        color:white;
      }
      .changelang{
        cursor: pointer;
      }
      .img-galeri{
        width: 100px;
        height: auto;
        aspect-ratio: 5/4;
        object-fit: cover;
        border-radius: 5px;
        border : 1px solid #b8b8b8
      }
      .img-produk{
        width: 250px;
        height: auto;
        aspect-ratio: 5/3;
        object-fit: cover;
        border-radius: 5px;
        border : 1px solid #b8b8b8
      }
      .img-produk-100{
        width: 100px;
        height: auto;
        aspect-ratio: 5/3;
        object-fit: cover;
        border-radius: 5px;
        border : 1px solid #b8b8b8
      }
      .mr-17{
        margin-right: 17px !important;
      }
      div:where(.swal2-container){
        z-index: 99999 !important;
      }
      .popover-body{
/*            background: red;*/
        }

        .popover.bs-popover-bottom > .popover-arrow::after, .popover.bs-popover-auto[data-popper-placement^=bottom] > .popover-arrow::after {
            border-bottom-color: #ffcec2;
            top: 2px;
        }
        .bs-popover-bottom > .popover-arrow::before, .bs-popover-auto[data-popper-placement^=bottom] > .popover-arrow::before {
            top: 0;
            border-width: 0 0.5rem 0.5rem 0.5rem;
            border-bottom-color: #ffcec2;
        }
        .popover-body {
            background: #ffcec2;
            border-radius: 10px;
            padding: 10px 20px;
        }
        .bs-popover-top > .popover-arrow::after, .bs-popover-auto[data-popper-placement^=top] > .popover-arrow::after {
            bottom: 0px;
            border-width: 0.5rem 0.5rem 0;
            border-top-color: #ffcec2;
        }
        .bs-popover-top > .popover-arrow::before, .bs-popover-auto[data-popper-placement^=top] > .popover-arrow::before {
            bottom: 0;
            border-width: 0.5rem 0.5rem 0;
            border-top-color: #ffcec2;
        }
        .badge {
            --bs-badge-border-width: 0;
            --bs-badge-border-color: var(--bs-primary);
            --bs-badge-bg-color: var(--bs-primary);
            border: var(--bs-badge-border-width) var(--bs-border-style) var(--bs-badge-border-color);
            background-color: var(--bs-badge-bg-color);
            min-width: 95px;
        }
        .text-bg-primary {
            color: ;olor: #fff !important;
            background-color: RGBA(var(--bs-primary-rgb), var(--bs-bg-opacity, 1)) !important;
        }
        .text-bg-danger {
            color: #fff !important;
            background-color: RGBA(var(--bs-danger-rgb), var(--bs-bg-opacity, 1)) !important;
        }
        .text-bg-success {
            color: #fff !important;
            background-color: RGBA(var(--bs-success-rgb), var(--bs-bg-opacity, 1)) !important;
        }
    </style>
  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo">
            <a href="i<?= base_url() ?>/admin" class="app-brand-link">
              <img src="<?= base_url() ?>assets/upload_umum/favicon.png" style="width: 40px;">
              <span class=" menu-text fw-bolder ms-2" style="font-size:18px"><?= $result->namaperusahaan ?></span>
            </a>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
              <i class="bx bx-chevron-left bx-sm align-middle"></i>
            </a>
          </div>

          <div class="menu-inner-shadow"></div>

          <ul class="menu-inner py-1">
            <!-- Dashboard -->
            <li class="menu-item <?php if ($this->uri->segment(2) == "" && $this->uri->segment(1) == "admin" ){echo "active";} ?>">
              <a href="<?= base_url() ?>admin/" class="menu-link">
                <i class="fas fa-home mr-17"></i>

                <div data-i18n="Analytics"><?= $lang['dashboard']; ?></div>
              </a>
            </li>

            <li class="menu-item <?php if ($this->uri->segment(2) == "about" ){echo "active";} ?> ">
              <a href="<?= base_url() ?>admin/about" class="menu-link">
                <i class="fas fa-building mr-17"></i>

                <div data-i18n="Analytics"><?= $lang['about_company']; ?></div>
              </a>
            </li>

            <li class="menu-item <?php if ($this->uri->segment(2) == "sertifikat" ){echo "active";} ?>">
              <a href="<?= base_url() ?>admin/sertifikat" class="menu-link">
                <i class="fas fa-certificate mr-17"></i>

                <div data-i18n="Analytics"><?= $lang['certificate']; ?></div>
              </a>
            </li>

            <li class="menu-item <?php if ($this->uri->segment(2) == "kategori" ){echo "active";} ?>">
              <a href="<?= base_url() ?>admin/kategori" class="menu-link">
                <i class="fas fa-list-alt mr-17"></i>

                <div data-i18n="Analytics"><?= $lang['category']; ?></div>
              </a>
            </li>

            <li class="menu-item <?php if ($this->uri->segment(2) == "galeri" ){echo "active";} ?>">
              <a href="<?= base_url() ?>admin/galeri" class="menu-link">
                <i class="fas fa-image mr-17"></i>
                <div data-i18n="Analytics"><?= $lang['gallery']; ?></div>
              </a>
            </li>

            <li class="menu-item <?php if ($this->uri->segment(2) == "video" ){echo "active";} ?>">
              <a href="<?= base_url() ?>admin/video" class="menu-link">
                <i class="fas fa-video mr-17"></i>
                <div data-i18n="Analytics"><?= $lang['videos']; ?></div>
              </a>
            </li>

            <li class="menu-item <?php if ($this->uri->segment(2) == "slider" ){echo "active";} ?>">
              <a href="<?= base_url() ?>admin/slider" class="menu-link">
                <i class="fas fa-images mr-17"></i>

                <div data-i18n="Analytics"><?= $lang['slider']; ?></div>
              </a>
            </li>

            

            <!-- Layouts -->
            <li class="menu-item <?php if ($this->uri->segment(2) == "tambahproduk" || $this->uri->segment(2) == "produk" ){echo "active open";} ?>">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="fas fa-tag mr-17"></i>

                <div data-i18n="Layouts"><?= $lang['product']; ?></div>
              </a>

              <ul class="menu-sub">
                <li class="menu-item <?php if ($this->uri->segment(2) == "tambahproduk" ){echo "active";} ?>">
                  <a href="<?= base_url() ?>admin/tambahproduk" class="menu-link">
                    <div data-i18n="Without menu"><?= $lang['add_product']; ?></div>
                  </a>
                </li>
                <li class="menu-item <?php if ($this->uri->segment(2) == "produk" ){echo "active";} ?>">
                  <a href="<?= base_url() ?>admin/produk" class="menu-link">
                    <div data-i18n="Without navbar"><?= $lang['list_product']; ?></div>
                  </a>
                </li>
                
              </ul>
            </li>
            <?php if ($user->ParentID == 0) { ?>
            <li class="menu-item <?php if ($this->uri->segment(2) == "usersetting" ){echo "active";} ?>">
              <a href="<?= base_url() ?>admin/usersetting" class="menu-link">
                <i class="fas fa-list-alt mr-17"></i>

                <div data-i18n="Analytics"><?= $lang['user_setting']; ?></div>
              </a>
            </li>
            <?php } ?>

          </ul>
        </aside>
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->

          <nav
            class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
            id="layout-navbar"
          >
            <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
              <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                <i class="bx bx-menu bx-sm"></i>
              </a>
            </div>

            <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">

              <ul class="navbar-nav flex-row align-items-center ms-auto">
                
                <!-- User -->
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                  <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <?= $current_lang == "indonesian" ? "IN" : "EN" ?> &nbsp;<i class="fas fa-caret-down"></i>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end">
                    
                    
                    <li>
                      <span class="dropdown-item changelang <?php if($current_lang == "indonesian") {echo "active";} ?>" value="indonesian" >
                        IN
                      </span>
                    </li>
                    <li>
                      <span class="dropdown-item changelang <?php if($current_lang == "english") {echo "active";} ?>" value="english" >
                        EN
                      </span>
                    </li>
                  </ul>
                </li>
                <!--/ User -->
                <!-- User -->
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                  <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                      <img src="<?= base_url() ?>assets/admin/assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" />
                    </div>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                      <a class="dropdown-item" href="#">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar avatar-online">
                              <img src="<?= base_url() ?>assets/admin/assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" />
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <span class="fw-semibold d-block"><?= $user->nama ?></span>
                            <small class="text-muted">Administrator</small>
                          </div>
                        </div>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    
                    <li>
                      <a class="dropdown-item" href="<?= base_url() ?>admin/about">
                        <i class="bx bx-cog me-2"></i>
                        <span class="align-middle"><?= $lang['about_company']; ?></span>
                      </a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="<?= base_url() ?>logout">
                        <i class="bx bx-power-off me-2"></i>
                        <span class="align-middle"><?= $lang['sign_out']; ?></span>
                      </a>
                    </li>
                  </ul>
                </li>
                <!--/ User -->
              </ul>
            </div>
          </nav>

          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->
            <?php if ($this->session->flashdata('success')): ?>
              <div class="container-xxl flex-grow-1 ">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="alert alert-success alert-dismissible mt-4" role="alert" style="margin-bottom: 0px;">
                      <?= $this->session->flashdata('success'); ?>
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                  </div>
                </div>
              </div>
            <?php endif; ?>


            