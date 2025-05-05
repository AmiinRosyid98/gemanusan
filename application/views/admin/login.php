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
  class="light-style customizer-hide"
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

    <title>Login | Gema Marina Nusantara</title>

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
    <link rel="stylesheet" href="<?= base_url() ?>assets/admin/assets/css/iziToast.min.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/admin/assets/vendor/css/pages/page-auth.css" />
    <!-- Helpers -->
    <script src="<?= base_url() ?>assets/admin/assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="<?= base_url() ?>assets/admin/assets/js/config.js"></script>
    <style>
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
    </style>
  </head>
  <?php 
    $result= $this->db 
            ->where('id_profil',1)
            ->limit(1)
            ->get('profil')->row();
  ?>
  <body>
    <!-- Content -->

    <div class="container-xxl">
      <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
          <!-- Register -->
          <div class="card">
            <div class="card-body">
              <!-- Logo -->
              <div class="app-brand justify-content-center">
                <span href="index.html" class="app-brand-link gap-2">
                  <img src="<?= base_url() ?>assets/upload_umum/favicon.png" style="width: 40px;">
                  <span class=" menu-text fw-bolder ms-2" style="font-size:18px"><?= $result->namaperusahaan ?></span>
                </span>
              </div>
              <!-- /Logo -->
              <h4 class="mb-2"><?= $lang['welcome_login_page']; ?>! 👋</h4>
              <p class="mb-4"><?= $lang['please_login']; ?></p>

              <form id="formAuthentication" class="mb-3" action="index.html" method="POST">
                <div class="mb-3">
                  <label for="email" class="form-label">Username</label>
                  <input
                    type="text"
                    class="form-control"
                    id="email"
                    name="email-username"
                    placeholder="<?= $lang['enter_username']; ?>"
                    autofocus
                  />
                </div>
                <div class="mb-3 form-password-toggle">
                  <div class="d-flex justify-content-between">
                    <label class="form-label" for="password">Password</label>
                    <!-- <a href="auth-forgot-password-basic.html">
                      <small>Forgot Password?</small>
                    </a> -->
                  </div>
                  <div class="input-group input-group-merge">
                    <input
                      type="password"
                      id="password"
                      class="form-control"
                      name="password"
                      placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                      aria-describedby="password"
                    />
                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                  </div>
                </div>
                <div class="mb-3">
                  <button class="btn btn-primary d-grid w-100 btn-login" type="submit"><?= $lang['sign_in']; ?></button>
                </div>
              </form>

              <!-- <p class="text-center">
                <span>New on our platform?</span>
                <a href="auth-register-basic.html">
                  <span>Create an account</span>
                </a>
              </p> -->
            </div>
          </div>
          <!-- /Register -->
        </div>
      </div>
    </div>

    <!-- / Content --

    <div class="buy-now">
      <a
        href="https://themeselection.com/products/sneat-bootstrap-html-admin-template/"
        target="_blank"
        class="btn btn-danger btn-buy-now"
        >Upgrade to Pro</a
      >
    </div>

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="<?= base_url() ?>assets/admin/assets/vendor/libs/jquery/jquery.js"></script>
    <script src="<?= base_url() ?>assets/admin/assets/vendor/libs/popper/popper.js"></script>
    <script src="<?= base_url() ?>assets/admin/assets/vendor/js/bootstrap.js"></script>
    <script src="<?= base_url() ?>assets/admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="<?= base_url() ?>assets/admin/assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="<?= base_url() ?>assets/admin/assets/js/main.js"></script>
    <script src="<?= base_url() ?>assets/admin/assets/js/iziToast.min.js"></script>

    <!-- Page JS -->

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script type="text/javascript">
        $('.btn-login').click(function(e){
            e.preventDefault();
            let email = $('#email').val()
            let password = $('#password').val()
            $(this).prop("disabled",true)
            if(email == ""){
                zemPopover("#email","<?= $lang['enter_username']; ?>")
                $(this).prop("disabled",false)

                return false
            }
            if(password == ""){
                zemPopover("#password","<?= $lang['enter_password']; ?>")
                $(this).prop("disabled",false)

                return false
            }

            $.ajax({
                url: "<?= base_url() ?>login/ceklogin",
                type: "POST",
                dataType: "json",
                data:{
                    email:email,
                    password:password,
                },
                success: function(response) {
                    if(response.status=="sukses"){
                        window.location.href = "<?= base_url() ?>admin"
                    } else {
                        $('.btn-login').prop("disabled",false)
                        iziToast.error({
                            title: 'ERROR',
                            message: response.msg,
                            position: 'topRight'
                        });
                        return false
                    }
                },
                error: function(xhr, status, error) {
                    $('.btn-login').prop("disabled",false)

                    console.error(xhr.responseText);
                }
            });


        })

        function zemPopover(id, message) {
            GlobalFunction.globalScroll(id); // Scroll ke elemen dengan id tertentu

                $(id).popover({ trigger: 'manual', content: message, placement: "bottom" }); // Inisialisasi popover
                $(id).popover('show'); // Menampilkan popover

                setTimeout(() => {
                    $(id).popover('dispose'); // Menutup popover setelah 2 detik
                }, 2000);
        }

        const GlobalFunction = {
            globalScroll: function (id) {
                const element = document.querySelector(id);
                if (element) {
                    window.scrollTo({
                        top: element.offsetTop - 60,
                        behavior: "smooth"
                    });
                }
            },

            globalValidasi_format_date: function (element) {
                const el = document.querySelector(element);
                if (!el) return false;

                const value = el.value;
                const regex = /^[0-9]{2}[\/\-][0-9]{2}[\/\-][0-9]{4}$/;

                return regex.test(value);
            }
        };


    </script>
  </body>
</html>
