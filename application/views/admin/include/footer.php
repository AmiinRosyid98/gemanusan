<!-- Footer -->
            <footer class="content-footer footer bg-footer-theme">
              <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                <div class="mb-2 mb-md-0" style="width:100%">
                    <center>
                      ©
                      <script>
                        document.write(new Date().getFullYear());
                      </script>
                      ,
                      <a href="https://themeselection.com" target="_blank" class="footer-link fw-bolder">Gema Marina Nusantara</a>
                  </center>
                </div>
                
              </div>
            </footer>
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

    

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="<?= base_url() ?>assets/admin/assets/vendor/libs/jquery/jquery.js"></script>
    <script src="<?= base_url() ?>assets/admin/assets/vendor/libs/popper/popper.js"></script>
    <script src="<?= base_url() ?>assets/admin/assets/vendor/js/bootstrap.js"></script>
    <script src="<?= base_url() ?>assets/admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="<?= base_url() ?>assets/admin/assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="<?= base_url() ?>assets/admin/assets/vendor/libs/apex-charts/apexcharts.js"></script>

    <!-- Main JS -->
    <script src="<?= base_url() ?>assets/admin/assets/js/main.js"></script>
    <script src="<?= base_url() ?>assets/admin/assets/js/datatable.min.js"></script>

    <!-- Page JS -->
    <script src="<?= base_url() ?>assets/admin/assets/js/dashboards-analytics.js"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/slick-carousel/slick/slick.min.js"></script>
    <script type="text/javascript">

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

        new DataTable('#example');

        $('#formeditabout').submit(function(e){
            e.preventDefault()
            var isi = CKEDITOR.instances.isi.getData(); // Ambil data CKEditor
            var visi = CKEDITOR.instances.visi.getData(); // Ambil data CKEditor
            var misi = CKEDITOR.instances.misi.getData(); // Ambil data CKEditor

            var isi_en = CKEDITOR.instances.isi_en.getData(); // Ambil data CKEditor
            var visi_en = CKEDITOR.instances.visi_en.getData(); // Ambil data CKEditor
            var misi_en = CKEDITOR.instances.misi_en.getData(); // Ambil data CKEditor

            var email = $('#email').val()
            var telp = $('#telp').val()
            var alamat = $('#alamat').val()
            var facebook = $('#facebook').val()
            var twitter = $('#twitter').val()
            var instagram = $('#instagram').val()
            var linkedin = $('#linkedin').val()
            var embed_maps = $('#embed_maps').val()
            var namaperusahaan = $('#namaperusahaan').val()
            let gambar = $("#gambar")[0].files; // Cek jumlah file
            let gambardua = $("#gambardua")[0].files; // Cek jumlah file
            $(this).prop("disabled",true)


            let formData = new FormData();

            formData.append("gambar", gambar[0]); // Ambil file pertama
            formData.append("gambardua", gambardua[0]); // Ambil file pertama
            formData.append("isi",isi);
            formData.append("visi",visi);
            formData.append("misi",misi);

            formData.append("isi_en",isi_en);
            formData.append("visi_en",visi_en);
            formData.append("misi_en",misi_en);

            formData.append("email",email);
            formData.append("telp",telp);
            formData.append("alamat",alamat);
            formData.append("facebook",facebook);
            formData.append("twitter",twitter);
            formData.append("instagram",instagram);
            formData.append("linkedin",linkedin);
            formData.append("embed_maps",embed_maps);
            formData.append("namaperusahaan",namaperusahaan);
            $.ajax({
                url: "<?= base_url() ?>admin/updateprofil",
                type: "POST",
                dataType: "json",
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    if(response.status=="sukses"){
                        location.reload();
                    } else {
                        $('.btn-simpan-profil').prop("disabled",false)
                        iziToast.error({
                            title: 'ERROR',
                            message: response.msg,
                            position: 'topRight'
                        });
                        return false
                    }
                },
                error: function(xhr, status, error) {
                    $('.btn-simpan-profil').prop("disabled",false)
                    iziToast.error({
                        title: 'ERROR',
                        message: xhr.responseText,
                        position: 'topRight'
                    });
                    return false
                    console.error(xhr.responseText);
                }
            });

            
        })

        $('.add-sertifikat').click(function(e){
            e.preventDefault()
            $('#modaladdsertifikat').modal("show")
            $('.modal-title-sertifikat').html("<?= $lang['add_certificate'] ?>")
            $('#namasertifikat').val("").trigger("change")
            $('#id_sertifikat').val("").trigger("change")
            $('#filesertifikat').val("").trigger("change")
            $('.btn-simpan-sertifikat').attr("jenis","add")
        })

        $('.add-kategori').click(function(e){
            e.preventDefault()
            $('#modaladdkategori').modal("show")
            $('.modal-title-kategori').html("<?= $lang['add_category'] ?>")
            $('#namakategori').val("").trigger("change")
            $('#id_kategori').val("").trigger("change")
            $('#filekategori').val("").trigger("change")
            $('.btn-simpan-kategori').attr("jenis","add")
        })

        $('.add-user').click(function(e){
            e.preventDefault()
            $('#modaladduser').modal("show")
            $('.modal-title-user').html("<?= $lang['add_user'] ?>")
            $('#namauser').val("").trigger("change")
            $('#username').val("").trigger("change")
            $('#status').val("").trigger("change")
            $('#id_user').val("").trigger("change")
            // $('#fileuser').val("").trigger("change")
            $('.btn-simpan-user').attr("jenis","add")
            $('.ubahpassword').hide()
            $('#password').prop('disabled',false)
            $('#password').val("")
        })

        $('.add-video').click(function(e){
            e.preventDefault()
            $('#modaladdvideo').modal("show")
            $('.modal-title-video').html("<?= $lang['add_video'] ?>")
            $('#namavideo').val("").trigger("change")
            $('#namavideo_en').val("").trigger("change")
            $('#deskripsivideo').val("").trigger("change")
            $('#deskripsivideo_en').val("").trigger("change")
            $('#id_video').val("").trigger("change")
            $('#filevideo').val("").trigger("change")
            $('.btn-simpan-video').attr("jenis","add")
        })

        $('.add-galeri').click(function(e){
            e.preventDefault()
            $('#modaladdgaleri').modal("show")
            $('.modal-title-galeri').html("<?= $lang['add_gallery'] ?>")
            $('#namagaleri').val("").trigger("change")
            $('#id_galeri').val("").trigger("change")
            $('#filegaleri').val("").trigger("change")
            $('.btn-simpan-galeri').attr("jenis","add")
        })
        $('.add-slider').click(function(e){
            e.preventDefault()
            $('#modaladdslider').modal("show")
            $('.modal-title-slider').html("<?= $lang['add_slider'] ?>")
            $('#namaslider').val("").trigger("change")
            $('#id_slider').val("").trigger("change")
            $('#fileslider').val("").trigger("change")
            $('.btn-simpan-slider').attr("jenis","add")
        })

        // $('.editdatasertifikat').click(function(e){
        $(document).on("click",".editdatasertifikat",function(e) {
            e.preventDefault()
            $('#modaladdsertifikat').modal("show")
            $('.modal-title-sertifikat').html("<?= $lang['edit_certificate'] ?>")
            $('#namasertifikat').val($(this).data("nama"))
            $('#namasertifikat_en').val($(this).data("nama_en"))
            $('#id_sertifikat').val($(this).data("id"))
            // $('#filesertifikat').val($(this).data("gambar"))
            $('#imagePreview').attr("src","<?= base_url() ?>assets/upload_sertifikat/"+$(this).data("gambar"))
            $('.btn-simpan-sertifikat').attr("jenis","edit")


        })

        // $('.editdatakategori').click(function(e){
        $(document).on("click",".editdatakategori",function(e) {
            e.preventDefault()
            $('#modaladdkategori').modal("show")
            $('.modal-title-kategori').html("<?= $lang['edit_category'] ?>")
            $('#namakategori').val($(this).data("nama"))
            $('#namakategori_en').val($(this).data("nama_en"))
            $('#id_kategori').val($(this).data("id"))
            $('#deskripsikategori').val($(this).data("ket"))
            $('#deskripsikategori_en').val($(this).data("ket_en"))
            // $('#filekategori').val($(this).data("gambar"))
            $('#imagePreview').attr("src","<?= base_url() ?>assets/upload_kategori/"+$(this).data("gambar"))
            $('.btn-simpan-kategori').attr("jenis","edit")

        })

        $(document).on("click",".editdatauser",function(e) {
            e.preventDefault()
            $('#modaladduser').modal("show")
            $('.modal-title-user').html("<?= $lang['edit_user'] ?>")
            $('#namauser').val($(this).data("nama"))
            $('#username').val($(this).data("username"))
            $('#status').val($(this).data("status")).trigger('change')
            $('#id_user').val($(this).data("id"))
            $('.ubahpassword').show()
            $('#password').prop('disabled', true)
            $('#password').val('********')
            $('.btn-simpan-user').attr("jenis","edit")

        })

        $(document).on("change", ".checkubahpassword", function(e){
            e.preventDefault();
            if ($(this).prop('checked')) {
                $('#password').prop('disabled', false)
                $('#password').val('')
            } else {
                $('#password').prop('disabled', true)
                $('#password').val('********')
            }
        })


        $(document).on("click",".editdatavideo",function(e) {
            e.preventDefault()
            $('#modaladdvideo').modal("show")
            $('.modal-title-video').html("<?= $lang['edit_video'] ?>")
            $('#namavideo').val($(this).data("nama"))
            $('#namavideo_en').val($(this).data("nama_en"))
            $('#id_video').val($(this).data("id"))
            $('#deskripsivideo').val($(this).data("ket"))
            $('#deskripsivideo_en').val($(this).data("ket_en"))
            // $('#filevideo').val($(this).data("gambar"))
            $('#linkvideo').val($(this).data("link"))

            $('.btn-simpan-video').attr("jenis","edit")


        })

        // $('.editdatagaleri').click(function(e){
        $(document).on("click",".editdatagaleri",function(e) {

            e.preventDefault()
            $('#modaladdgaleri').modal("show")
            $('.modal-title-galeri').html("<?= $lang['edit_gallery'] ?>")
            $('#namagaleri').val($(this).data("nama"))
            $('#namagaleri_en').val($(this).data("nama_en"))
            $('#id_galeri').val($(this).data("id"))
            $('#deskripsigaleri').val($(this).data("deskripsi"))
            $('#deskripsigaleri_en').val($(this).data("deskripsi_en"))
            // $('#filegaleri').val($(this).data("gambar"))
            $('#imagePreview').attr("src","<?= base_url() ?>assets/upload_galeri/"+$(this).data("gambar"))
            $('.btn-simpan-galeri').attr("jenis","edit")


        })

        // $('.editdataslider').click(function(e){
        $(document).on("click",".editdataslider",function(e) {

            e.preventDefault()
            $('#modaladdslider').modal("show")
            $('.modal-title-slider').html("<?= $lang['edit_slider'] ?>")
            $('#namaslider').val($(this).data("nama"))
            $('#namaslider_en').val($(this).data("nama_en"))
            $('#id_slider').val($(this).data("id"))
            $('#deskripsislider').val($(this).data("deskripsi"))
            $('#deskripsislider_en').val($(this).data("deskripsi_en"))
            // $('#fileslider').val($(this).data("gambar"))
            $('#imagePreview').attr("src","<?= base_url() ?>assets/upload_slider/"+$(this).data("gambar"))
            $('.btn-simpan-slider').attr("jenis","edit")


        })

        $(".img-input").change(function () {
            let file = this.files[0];
            let filePath = $(this).val();
            let allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;

            if (!allowedExtensions.exec(filePath)) {
                if(filePath == ""){
                   
                } else{
                    alert("Hanya file gambar yang diperbolehkan! (jpg, jpeg, png, gif)");

                }
                $(this).val(""); // Kosongkan input jika tidak valid
                $("#imagePreview").attr("src", "<?= base_url() ?>assets/img/default.jpg").show(); 
            } else {
                let reader = new FileReader();
                reader.onload = function (e) {
                    $("#imagePreview").attr("src", e.target.result).show(); // Tampilkan gambar
                };
                reader.readAsDataURL(file);
            }
        });

        $(".img-input2").change(function () {
            let file = this.files[0];
            let filePath = $(this).val();
            let allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;

            if (!allowedExtensions.exec(filePath)) {
                if(filePath == ""){
                   
                } else{
                    alert("Hanya file gambar yang diperbolehkan! (jpg, jpeg, png, gif)");

                }
                $(this).val(""); // Kosongkan input jika tidak valid
                $("#imagePreview2").attr("src", "<?= base_url() ?>assets/img/default.jpg").show(); 
            } else {
                let reader = new FileReader();
                reader.onload = function (e) {
                    $("#imagePreview2").attr("src", e.target.result).show(); // Tampilkan gambar
                };
                reader.readAsDataURL(file);
            }
        });
        $('.close-modal').click(function(e){
            e.preventDefault()
            $('.modal').modal("hide")
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

        $("#formaddsertifikat").submit(function(e){
            e.preventDefault()
            let namasertifikat = $("#namasertifikat").val()
            let namasertifikat_en = $("#namasertifikat_en").val()

            let fileInput = $("#filesertifikat")[0].files; // Cek jumlah file
            
            $('.btn-simpan-sertifikat').prop("disabled",true)
            if(namasertifikat == ""){
                zemPopover("#namasertifikat","Masukkan Nama Sertifikat")
                $('.btn-simpan-sertifikat').prop("disabled",false)
                e.preventDefault(); // Mencegah submit form

                return false
            }
            if(namasertifikat_en == ""){
                zemPopover("#namasertifikat_en","Enter Certificate Name")
                $('.btn-simpan-sertifikat').prop("disabled",false)
                e.preventDefault(); // Mencegah submit form

                return false
            }
            if($('.btn-simpan-sertifikat').attr("jenis") == "add"){
                if (fileInput.length === 0) {
                    zemPopover("#filesertifikat","Upload File Sertifikat")
                    $('.btn-simpan-sertifikat').prop("disabled",false)
                    e.preventDefault(); // Mencegah submit form
                    return false

                }
            }
            if($('.btn-simpan-sertifikat').attr("jenis") == "add"){
                let formData = new FormData();
                formData.append("file", fileInput[0]); // Ambil file pertama yang dipilih
                formData.append("namasertifikat", namasertifikat); // Tambahkan input text
                formData.append("namasertifikat_en", namasertifikat_en); // Tambahkan input text
                $.ajax({
                    url: "<?= base_url() ?>admin/dosavesertifikat", // Ganti dengan URL backend kamu
                    type: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    beforeSend: function () {
                        $("#status").html("Uploading...");
                    },
                    success: function (response) {
                        if(response.status =="gagal"){
                            iziToast.error({
                                title: 'ERROR',
                                message: response.msg,
                                position: 'topRight'
                            });
                            return false
                        }  else {
                            location.reload()
                        }
                        // $("#status").html("Upload berhasil: " + response);
                    },
                    error: function () {
                        alert("Upload Gagal")
                    }
                });
            } else {
                let formData = new FormData();
                let id_sertifikat = $("#id_sertifikat").val()

                formData.append("file", fileInput[0]); // Ambil file pertama yang dipilih
                formData.append("namasertifikat", namasertifikat); // Tambahkan input text
                formData.append("id_sertifikat", id_sertifikat); // Tambahkan input text
                formData.append("namasertifikat_en", namasertifikat_en); // Tambahkan input text

                $.ajax({
                    url: "<?= base_url() ?>admin/doeditsertifikat", // Ganti dengan URL backend kamu
                    type: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    beforeSend: function () {
                        $("#status").html("Uploading...");
                    },
                    success: function (response) {
                        if(response.status =="gagal"){
                            iziToast.error({
                                title: 'ERROR',
                                message: response.msg,
                                position: 'topRight'
                            });
                            return false
                        }  else {
                            location.reload()
                        }
                        // $("#status").html("Upload berhasil: " + response);
                    },
                    error: function () {
                        alert("Upload Gagal")
                    }
                });
            }
            
        })


        $("#formaddproduk").submit(function(e){
            e.preventDefault()
            let namaproduk = $("#namaproduk").val()
            let namaproduk_en = $("#namaproduk_en").val()
            let kategori = $("#kategori").val()
            var spesifikasi = CKEDITOR.instances.spesifikasi.getData(); // Ambil data CKEditor
            var spesifikasi_en = CKEDITOR.instances.spesifikasi_en.getData(); // Ambil data CKEditor
            var ket = CKEDITOR.instances.ket.getData();
            var ket_en = CKEDITOR.instances.ket_en.getData();

            let fileInput = $("#fileproduk")[0].files; // Cek jumlah file
            
            $('.btn-simpan-produk').prop("disabled",true)
            if(namaproduk == ""){
                zemPopover("#namaproduk","Masukkan Nama produk")
                $('.btn-simpan-produk').prop("disabled",false)
                e.preventDefault(); // Mencegah submit form

                return false
            }
            if(namaproduk_en == ""){
                zemPopover("#namaproduk_en","Enter Product Name")
                $('.btn-simpan-produk').prop("disabled",false)
                e.preventDefault(); // Mencegah submit form

                return false
            }
            if(!kategori){
                zemPopover("#kategori","<?= $lang['select_category'] ?>")
                $('.btn-simpan-produk').prop("disabled",false)
                e.preventDefault(); // Mencegah submit form

                return false
            }
            if(spesifikasi == ""){
                // zemPopover("#spesifikasi","Masukkan Spesifikasi")
                alert("Masukkan Spesifikasi")
                $('.btn-simpan-produk').prop("disabled",false)
                e.preventDefault(); // Mencegah submit form

                return false
            }
            if(spesifikasi_en == ""){
                // zemPopover("#spesifikasi","Masukkan Spesifikasi")
                alert("Enter Specification")
                $('.btn-simpan-produk').prop("disabled",false)
                e.preventDefault(); // Mencegah submit form

                return false
            }
            if(ket == ""){
                // zemPopover("#spesifikasi","Masukkan Spesifikasi")
                alert("Masukkan Keterangan")
                $('.btn-simpan-produk').prop("disabled",false)
                e.preventDefault(); // Mencegah submit form

                return false
            }
            if(ket_en == ""){
                // zemPopover("#spesifikasi","Masukkan Spesifikasi")
                alert("Enter Description")
                $('.btn-simpan-produk').prop("disabled",false)
                e.preventDefault(); // Mencegah submit form

                return false
            }
            if($('.btn-simpan-produk').attr("jenis") == "add"){
                if (fileInput.length === 0) {
                    zemPopover("#fileproduk","Upload File produk")
                    $('.btn-simpan-produk').prop("disabled",false)
                    e.preventDefault(); // Mencegah submit form
                    return false

                }
            }
            if($('.btn-simpan-produk').attr("jenis") == "add"){
                let formData = new FormData();
                formData.append("file", fileInput[0]); // Ambil file pertama yang dipilih
                formData.append("namaproduk", namaproduk); // Tambahkan input text
                formData.append("namaproduk_en", namaproduk_en); // Tambahkan input text
                formData.append("kategori", kategori); // Tambahkan input text
                formData.append("spesifikasi", spesifikasi); // Tambahkan input text
                formData.append("spesifikasi_en", spesifikasi_en); // Tambahkan input text
                formData.append("ket", ket); // Tambahkan input text
                formData.append("ket_en", ket_en); // Tambahkan input text
                $.ajax({
                    url: "<?= base_url() ?>admin/dosaveproduk", // Ganti dengan URL backend kamu
                    type: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    beforeSend: function () {
                        $("#status").html("Uploading...");
                    },
                    success: function (response) {
                        if(response.status =="gagal"){
                            iziToast.error({
                                title: 'ERROR',
                                message: response.msg,
                                position: 'topRight'
                            });
                            return false
                        }  else {
                            window.location.href="<?= base_url() ?>admin/produk"
                        }
                        // $("#status").html("Upload berhasil: " + response);
                    },
                    error: function () {
                        alert("Upload Gagal")
                    }
                });
            } else {
                let formData = new FormData();
                let id_produk = $("#id_produk").val()

                formData.append("file", fileInput[0]); // Ambil file pertama yang dipilih
                formData.append("namaproduk", namaproduk); // Tambahkan input text
                formData.append("namaproduk_en", namaproduk_en); // Tambahkan input text
                formData.append("kategori", kategori); // Tambahkan input text
                formData.append("spesifikasi", spesifikasi); // Tambahkan input text
                formData.append("spesifikasi_en", spesifikasi_en); // Tambahkan input text
                formData.append("ket", ket); // Tambahkan input text
                formData.append("ket_en", ket_en); // Tambahkan input text
                formData.append("id_produk", id_produk); // Tambahkan input text
                $.ajax({
                    url: "<?= base_url() ?>admin/doeditproduk", // Ganti dengan URL backend kamu
                    type: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    beforeSend: function () {
                        $("#status").html("Uploading...");
                    },
                    success: function (response) {
                        // return false
                        if(response.status =="gagal"){
                            iziToast.error({
                                title: 'ERROR',
                                message: response.msg,
                                position: 'topRight'
                            });
                            return false
                        }  else {
                            window.location.href="<?= base_url() ?>admin/produk"
                        }
                        // $("#status").html("Upload berhasil: " + response);
                    },
                    error: function () {
                        alert("Upload Gagal")
                    }
                });
            }
            
        })

        $("#formaddvideo").submit(function(e){
            e.preventDefault()
            let namavideo = $("#namavideo").val()
            let deskripsivideo = $("#deskripsivideo").val()
            let namavideo_en = $("#namavideo_en").val()
            let deskripsivideo_en = $("#deskripsivideo_en").val()
            let linkvideo = $("#linkvideo").val()

            // let fileInput = $("#filevideo")[0].files; // Cek jumlah file
            
            $('.btn-simpan-video').prop("disabled",true)
            if(namavideo == ""){
                zemPopover("#namavideo","Masukkan Nama Video")
                $('.btn-simpan-video').prop("disabled",false)
                e.preventDefault(); // Mencegah submit form

                return false
            }
            if(namavideo_en == ""){
                zemPopover("#namavideo_en","Enter Video Name")
                $('.btn-simpan-video').prop("disabled",false)
                e.preventDefault(); // Mencegah submit form

                return false
            }
            if(deskripsivideo == ""){
                zemPopover("#deskripsivideo","Masukkan Deskripsi video")
                $('.btn-simpan-video').prop("disabled",false)
                e.preventDefault(); // Mencegah submit form

                return false
            }
            if(deskripsivideo_en == ""){
                zemPopover("#deskripsivideo_en","Enter Video Description")
                $('.btn-simpan-video').prop("disabled",false)
                e.preventDefault(); // Mencegah submit form

                return false
            }
            if(linkvideo == ""){
                zemPopover("#linkvideo","Masukkan Link Video")
                $('.btn-simpan-video').prop("disabled",false)
                e.preventDefault(); // Mencegah submit form

                return false
            }

            

            
            if($('.btn-simpan-video').attr("jenis") == "add"){
                let formData = new FormData();
                // formData.append("file", fileInput[0]); // Ambil file pertama yang dipilih
                formData.append("namavideo", namavideo); // Tambahkan input text
                formData.append("deskripsivideo", deskripsivideo); // Tambahkan input text
                formData.append("namavideo_en", namavideo_en); // Tambahkan input text
                formData.append("deskripsivideo_en", deskripsivideo_en); // Tambahkan input text
                formData.append("linkvideo", linkvideo); // Tambahkan input text
                $.ajax({
                    url: "<?= base_url() ?>admin/dosavevideo", // Ganti dengan URL backend kamu
                    type: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    beforeSend: function () {
                        $("#status").html("Uploading...");
                    },
                    success: function (response) {
                        if(response.status =="gagal"){
                            iziToast.error({
                                title: 'ERROR',
                                message: response.msg,
                                position: 'topRight'
                            });
                            return false
                        }  else {
                            location.reload()
                        }
                        // $("#status").html("Upload berhasil: " + response);
                    },
                    error: function () {
                        alert("Upload Gagal")
                    }
                });
            } else {
                let formData = new FormData();
                let id_video = $("#id_video").val()

                // formData.append("file", fileInput[0]); // Ambil file pertama yang dipilih
                formData.append("id_video", id_video); // Tambahkan input text
                formData.append("namavideo", namavideo); // Tambahkan input text
                formData.append("deskripsivideo", deskripsivideo); // Tambahkan input text
                formData.append("namavideo_en", namavideo_en); // Tambahkan input text
                formData.append("deskripsivideo_en", deskripsivideo_en); // Tambahkan input text
                formData.append("linkvideo", linkvideo); // Tambahkan input text
                $.ajax({
                    url: "<?= base_url() ?>admin/doeditvideo", // Ganti dengan URL backend kamu
                    type: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    beforeSend: function () {
                        $("#status").html("Uploading...");
                    },
                    success: function (response) {
                        if(response.status =="gagal"){
                            iziToast.error({
                                title: 'ERROR',
                                message: response.msg,
                                position: 'topRight'
                            });
                            return false
                        }  else {
                            location.reload()
                        }
                        // $("#status").html("Upload berhasil: " + response);
                    },
                    error: function () {
                        alert("Upload Gagal")
                    }
                });
            }
            
        })

        $("#formaddkategori").submit(function(e){
            e.preventDefault()
            let namakategori = $("#namakategori").val()
            let namakategori_en = $("#namakategori_en").val()
            let deskripsikategori = $("#deskripsikategori").val()
            let deskripsikategori_en = $("#deskripsikategori_en").val()

            let fileInput = $("#filekategori")[0].files; // Cek jumlah file
            
            $('.btn-simpan-kategori').prop("disabled",true)
            if(namakategori == ""){
                zemPopover("#namakategori","Masukkan Nama Kategori")
                $('.btn-simpan-kategori').prop("disabled",false)
                e.preventDefault(); // Mencegah submit form

                return false
            }
            if(namakategori_en == ""){
                zemPopover("#namakategori_en","Enter Category Name")
                $('.btn-simpan-kategori').prop("disabled",false)
                e.preventDefault(); // Mencegah submit form

                return false
            }
            if(deskripsikategori == ""){
                zemPopover("#deskripsikategori","Masukkan Deskripsi Kategori")
                $('.btn-simpan-kategori').prop("disabled",false)
                e.preventDefault(); // Mencegah submit form

                return false
            }
            if(deskripsikategori_en == ""){
                zemPopover("#deskripsikategori_en","Enter Category Description")
                $('.btn-simpan-kategori').prop("disabled",false)
                e.preventDefault(); // Mencegah submit form

                return false
            }
            if($('.btn-simpan-kategori').attr("jenis") == "add"){
                if (fileInput.length === 0) {
                    zemPopover("#filekategori","Upload File kategori")
                    $('.btn-simpan-kategori').prop("disabled",false)
                    e.preventDefault(); // Mencegah submit form
                    return false

                }
            }

            

            
            if($('.btn-simpan-kategori').attr("jenis") == "add"){
                let formData = new FormData();
                formData.append("file", fileInput[0]); // Ambil file pertama yang dipilih
                formData.append("namakategori", namakategori); // Tambahkan input text
                formData.append("namakategori_en", namakategori_en); // Tambahkan input text
                formData.append("deskripsikategori", deskripsikategori); // Tambahkan input text
                formData.append("deskripsikategori_en", deskripsikategori_en); // Tambahkan input text
                $.ajax({
                    url: "<?= base_url() ?>admin/dosavekategori", // Ganti dengan URL backend kamu
                    type: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    beforeSend: function () {
                        $("#status").html("Uploading...");
                    },
                    success: function (response) {
                        if(response.status =="gagal"){
                            iziToast.error({
                                title: 'ERROR',
                                message: response.msg,
                                position: 'topRight'
                            });
                            return false
                        }  else {
                            location.reload()
                        }
                        // $("#status").html("Upload berhasil: " + response);
                    },
                    error: function () {
                        alert("Upload Gagal")
                    }
                });
            } else {
                let formData = new FormData();
                let id_kategori = $("#id_kategori").val()

                formData.append("file", fileInput[0]); // Ambil file pertama yang dipilih
                formData.append("namakategori", namakategori); // Tambahkan input text
                formData.append("namakategori_en", namakategori_en); // Tambahkan input text
                formData.append("deskripsikategori", deskripsikategori); // Tambahkan input text
                formData.append("deskripsikategori_en", deskripsikategori_en); // Tambahkan input text
                formData.append("id_kategori", id_kategori); // Tambahkan input text
                $.ajax({
                    url: "<?= base_url() ?>admin/doeditkategori", // Ganti dengan URL backend kamu
                    type: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    beforeSend: function () {
                        $("#status").html("Uploading...");
                    },
                    success: function (response) {
                        if(response.status =="gagal"){
                            iziToast.error({
                                title: 'ERROR',
                                message: response.msg,
                                position: 'topRight'
                            });
                            return false
                        }  else {
                            location.reload()
                        }
                        // $("#status").html("Upload berhasil: " + response);
                    },
                    error: function () {
                        alert("Upload Gagal")
                    }
                });
            }
            
        })

        $("#formadduser").submit(function(e){
            e.preventDefault()
            let namauser = $("#namauser").val()
            let username = $("#username").val()
            let password = $("#password").val()
            let status = $("#status").val()
            

            let isChecked = $('#checkubahpassword').prop('checked'); // true or false
            let ubah = "no"
            if (isChecked) {
                 ubah = "yes"; // ini akan ambil 'check'
            } else {
                 ubah = "no"; // ini akan ambil 'check'

            }

            // return false
            
            
            $('.btn-simpan-user').prop("disabled",true)
            if(namauser == ""){
                zemPopover("#namauser","<?= $lang['enter'] ?> <?= $lang['name'] ?>")
                $('.btn-simpan-user').prop("disabled",false)
                e.preventDefault(); // Mencegah submit form

                return false
            }
            if(username == ""){
                zemPopover("#username","<?= $lang['enter'] ?> Username")
                $('.btn-simpan-user').prop("disabled",false)
                e.preventDefault(); // Mencegah submit form

                return false
            }

            // if($('.btn-simpan-user').attr("jenis") == "add"){
                if (password == "") {
                    zemPopover("#password","<?= $lang['enter'] ?> Password")
                    $('.btn-simpan-user').prop("disabled",false)
                    e.preventDefault(); // Mencegah submit form
                    return false

                }
            // }
            if(!status){
                zemPopover("#status","<?= $lang['select_status'] ?>")
                $('.btn-simpan-user').prop("disabled",false)
                e.preventDefault(); // Mencegah submit form

                return false
            }
            

            

            
            if($('.btn-simpan-user').attr("jenis") == "add"){
                let formData = new FormData();
                formData.append("namauser", namauser); // Tambahkan input text
                formData.append("username", username); // Tambahkan input text
                formData.append("password", password); // Tambahkan input text
                formData.append("status", status); // Tambahkan input text
                formData.append("ubah", ubah); // Tambahkan input text
                $.ajax({
                    url: "<?= base_url() ?>admin/dosaveuser", // Ganti dengan URL backend kamu
                    type: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    beforeSend: function () {
                        $("#status").html("Uploading...");
                    },
                    success: function (response) {
                        if(response.status =="gagal"){
                            iziToast.error({
                                title: 'ERROR',
                                message: response.msg,
                                position: 'topRight'
                            });
                            return false
                        }  else {
                            location.reload()
                        }
                        // $("#status").html("Upload berhasil: " + response);
                    },
                    error: function () {
                        alert("Upload Gagal")
                    }
                });
            } else {
                let formData = new FormData();
                let id_user = $("#id_user").val()

                formData.append("namauser", namauser); // Tambahkan input text
                formData.append("username", username); // Tambahkan input text
                formData.append("password", password); // Tambahkan input text
                formData.append("status", status); // Tambahkan input text
                formData.append("ubah", ubah); // Tambahkan input text


                formData.append("id_user", id_user); // Tambahkan input text
                $.ajax({
                    url: "<?= base_url() ?>admin/doedituser", // Ganti dengan URL backend kamu
                    type: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    beforeSend: function () {
                        $("#status").html("Uploading...");
                    },
                    success: function (response) {
                        // return false
                        if(response.status =="gagal"){
                            iziToast.error({
                                title: 'ERROR',
                                message: response.msg,
                                position: 'topRight'
                            });
                            return false
                        }  else {
                            location.reload()
                        }
                        // $("#status").html("Upload berhasil: " + response);
                    },
                    error: function () {
                        alert("Upload Gagal")
                    }
                });
            }
            
        })


        $("#formaddgaleri").submit(function(e){
            e.preventDefault()
            let namagaleri = $("#namagaleri").val()
            let namagaleri_en = $("#namagaleri_en").val()
            let deskripsigaleri = $("#deskripsigaleri").val()
            let deskripsigaleri_en = $("#deskripsigaleri_en").val()

            let fileInput = $("#filegaleri")[0].files; // Cek jumlah file
            
            $('.btn-simpan-galeri').prop("disabled",true)
            if(namagaleri == ""){
                zemPopover("#namagaleri","Masukkan Nama galeri")
                $('.btn-simpan-galeri').prop("disabled",false)
                e.preventDefault(); // Mencegah submit form

                return false
            }
            if(namagaleri_en == ""){
                zemPopover("#namagaleri_en","Enter Gallery Name")
                $('.btn-simpan-galeri').prop("disabled",false)
                e.preventDefault(); // Mencegah submit form

                return false
            }
            if(deskripsigaleri == ""){
                zemPopover("#deskripsigaleri","Masukkan Deskripsi galeri")
                $('.btn-simpan-galeri').prop("disabled",false)
                e.preventDefault(); // Mencegah submit form

                return false
            }
            if(deskripsigaleri_en == ""){
                zemPopover("#deskripsigaleri_en","Enter Gallery Description")
                $('.btn-simpan-galeri').prop("disabled",false)
                e.preventDefault(); // Mencegah submit form

                return false
            }
            if($('.btn-simpan-galeri').attr("jenis") == "add"){
                if (fileInput.length === 0) {
                    zemPopover("#filegaleri","Upload File galeri")
                    $('.btn-simpan-galeri').prop("disabled",false)
                    e.preventDefault(); // Mencegah submit form
                    return false

                }
            }

            

            
            if($('.btn-simpan-galeri').attr("jenis") == "add"){
                let formData = new FormData();
                formData.append("file", fileInput[0]); // Ambil file pertama yang dipilih
                formData.append("namagaleri", namagaleri); // Tambahkan input text
                formData.append("deskripsigaleri", deskripsigaleri); // Tambahkan input text
                formData.append("namagaleri_en", namagaleri_en); // Tambahkan input text
                formData.append("deskripsigaleri_en", deskripsigaleri_en); // Tambahkan input text
                $.ajax({
                    url: "<?= base_url() ?>admin/dosavegaleri", // Ganti dengan URL backend kamu
                    type: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    beforeSend: function () {
                        $("#status").html("Uploading...");
                    },
                    success: function (response) {
                        if(response.status =="gagal"){
                            iziToast.error({
                                title: 'ERROR',
                                message: response.msg,
                                position: 'topRight'
                            });
                            return false
                        }  else {
                            location.reload()
                        }
                        // $("#status").html("Upload berhasil: " + response);
                    },
                    error: function () {
                        alert("Upload Gagal")
                    }
                });
            } else {
                let formData = new FormData();
                let id_galeri = $("#id_galeri").val()

                formData.append("file", fileInput[0]); // Ambil file pertama yang dipilih
                formData.append("id_galeri", id_galeri); // Tambahkan input text
                formData.append("namagaleri", namagaleri); // Tambahkan input text
                formData.append("deskripsigaleri", deskripsigaleri); // Tambahkan input text
                formData.append("namagaleri_en", namagaleri_en); // Tambahkan input text
                formData.append("deskripsigaleri_en", deskripsigaleri_en); // Tambahkan input text
                $.ajax({
                    url: "<?= base_url() ?>admin/doeditgaleri", // Ganti dengan URL backend kamu
                    type: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    beforeSend: function () {
                        $("#status").html("Uploading...");
                    },
                    success: function (response) {
                        if(response.status =="gagal"){
                            iziToast.error({
                                title: 'ERROR',
                                message: response.msg,
                                position: 'topRight'
                            });
                            return false
                        }  else {
                            location.reload()
                        }
                        // $("#status").html("Upload berhasil: " + response);
                    },
                    error: function () {
                        alert("Upload Gagal")
                    }
                });
            }
            
        })

        $("#formaddslider").submit(function(e){
            e.preventDefault()
            let namaslider = $("#namaslider").val()
            let deskripsislider = $("#deskripsislider").val()

            let namaslider_en = $("#namaslider_en").val()
            let deskripsislider_en = $("#deskripsislider_en").val()

            let fileInput = $("#fileslider")[0].files; // Cek jumlah file
            
            $('.btn-simpan-slider').prop("disabled",true)
            if(namaslider == ""){
                zemPopover("#namaslider","Masukkan Nama slider")
                $('.btn-simpan-slider').prop("disabled",false)
                e.preventDefault(); // Mencegah submit form

                return false
            }
            if(namaslider_en == ""){
                zemPopover("#namaslider_en","Enter Slider Name")
                $('.btn-simpan-slider').prop("disabled",false)
                e.preventDefault(); // Mencegah submit form

                return false
            }
            if(deskripsislider == ""){
                zemPopover("#deskripsislider","Masukkan Deskripsi slider")
                $('.btn-simpan-slider').prop("disabled",false)
                e.preventDefault(); // Mencegah submit form

                return false
            }
            if(deskripsislider_en == ""){
                zemPopover("#deskripsislider_en","Enter Slider Description")
                $('.btn-simpan-slider').prop("disabled",false)
                e.preventDefault(); // Mencegah submit form

                return false
            }
            if($('.btn-simpan-slider').attr("jenis") == "add"){
                if (fileInput.length === 0) {
                    zemPopover("#fileslider","Upload File slider")
                    $('.btn-simpan-slider').prop("disabled",false)
                    e.preventDefault(); // Mencegah submit form
                    return false

                }
            }

            

            
            if($('.btn-simpan-slider').attr("jenis") == "add"){
                let formData = new FormData();
                formData.append("file", fileInput[0]); // Ambil file pertama yang dipilih
                formData.append("namaslider", namaslider); // Tambahkan input text
                formData.append("deskripsislider", deskripsislider); // Tambahkan input text
                formData.append("namaslider_en", namaslider_en); // Tambahkan input text
                formData.append("deskripsislider_en", deskripsislider_en); // Tambahkan input text
                $.ajax({
                    url: "<?= base_url() ?>admin/dosaveslider", // Ganti dengan URL backend kamu
                    type: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    beforeSend: function () {
                        $("#status").html("Uploading...");
                    },
                    success: function (response) {
                        if(response.status =="gagal"){
                            iziToast.error({
                                title: 'ERROR',
                                message: response.msg,
                                position: 'topRight'
                            });
                            return false
                        }  else {
                            location.reload()
                        }
                        // $("#status").html("Upload berhasil: " + response);
                    },
                    error: function () {
                        alert("Upload Gagal")
                    }
                });
            } else {
                let formData = new FormData();
                let id_slider = $("#id_slider").val()

                formData.append("file", fileInput[0]); // Ambil file pertama yang dipilih
                formData.append("namaslider", namaslider); // Tambahkan input text
                formData.append("id_slider", id_slider); // Tambahkan input text
                formData.append("deskripsislider", deskripsislider); // Tambahkan input text
                formData.append("namaslider_en", namaslider_en); // Tambahkan input text
                formData.append("deskripsislider_en", deskripsislider_en); // Tambahkan input text
                $.ajax({
                    url: "<?= base_url() ?>admin/doeditslider", // Ganti dengan URL backend kamu
                    type: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    beforeSend: function () {
                        $("#status").html("Uploading...");
                    },
                    success: function (response) {
                        if(response.status =="gagal"){
                            iziToast.error({
                                title: 'ERROR',
                                message: response.msg,
                                position: 'topRight'
                            });
                            return false
                        }  else {
                            location.reload()
                        }
                        // $("#status").html("Upload berhasil: " + response);
                    },
                    error: function () {
                        alert("Upload Gagal")
                    }
                });
            }
            
        })

        // $('.hapusdata').click(function(e){
        $(document).on("click",".hapusdata",function(e) {
            e.preventDefault()
            Swal.fire({
              title: "<?= $lang['delete_data'] ?> ?",
              showCancelButton: true,
              confirmButtonText: "<?= $lang['delete'] ?>",
              cancelButtonText: "<?= $lang['cancel'] ?>",
            }).then((result) => {
              /* Read more about isConfirmed, isDenied below */
              if (result.isConfirmed) {
                let id= $(this).data("id");
                let table= $(this).data("table");
                $.ajax({
                    url: "<?= base_url() ?>admin/hapusdata", // Ganti dengan URL backend kamu
                    type: "POST",
                    data: {
                        id:id,
                        table:table,
                    },
                    
                    beforeSend: function () {
                    },
                    success: function (response) {
                        if(response.status =="gagal"){
                            iziToast.error({
                                title: 'ERROR',
                                message: response.msg,
                                position: 'topRight'
                            });
                            return false
                        }  else {
                            location.reload()
                        }
                        // $("#status").html("Upload berhasil: " + response);
                    },
                    error: function () {
                        alert("Upload Gagal")
                    }
                });
              } 
            });
        })

    </script>

    <script>
        var warnaArray = [
              "255, 99, 132",
              "54, 162, 235",
              "255, 206, 86",
              "75, 192, 192",
              "153, 102, 255",
              "255, 159, 64",
              "231, 76, 60",
              "46, 204, 113",
              "52, 152, 219",
              "155, 89, 182",
              "241, 196, 15",
              "230, 126, 34",
              "26, 188, 156",
              "52, 73, 94",
              "192, 57, 43",
              "243, 156, 18",
              "22, 160, 133",
              "127, 140, 141",
              "39, 174, 96",
              "142, 68, 173",
              "44, 62, 80",
              "241, 148, 138",
              "84, 153, 199",
              "245, 176, 65",
              "169, 204, 227",
              "82, 190, 128",
              "236, 112, 99",
              "205, 97, 85",
              "133, 193, 233",
              "163, 228, 215",
              "174, 214, 241",
              "250, 219, 216",
              "255, 195, 113",
              "120, 111, 166",
              "255, 87, 34",
              "96, 125, 139",
              "0, 150, 136",
              "124, 179, 66",
              "100, 181, 246",
              "255, 171, 145",
              "149, 117, 205",
              "77, 182, 172",
              "174, 213, 129",
              "129, 212, 250",
              "255, 138, 101",
              "186, 104, 200",
              "38, 166, 154",
              "156, 204, 101",
              "79, 195, 247",
              "255, 112, 67",
              "171, 71, 188",
              "0, 150, 136",
              "255, 87, 34",
              "158, 158, 158",
              "33, 150, 243",
              "76, 175, 80",
              "244, 67, 54",
              "3, 169, 244",
              "255, 235, 59",
              "63, 81, 181",
              "255, 193, 7",
              "156, 39, 176",
              "139, 195, 74",
              "0, 188, 212",
              "121, 85, 72",
              "205, 220, 57",
              "233, 30, 99",
              "103, 58, 183",
              "0, 188, 212",
              "96, 125, 139",
              "255, 87, 34",
              "76, 175, 80",
              "255, 152, 0",
              "33, 150, 243",
              "139, 195, 74",
              "244, 67, 54",
              "156, 39, 176",
              "255, 235, 59",
              "0, 150, 136",
              "121, 85, 72",
              "100, 181, 246",
              "124, 179, 66",
              "255, 171, 145",
              "38, 166, 154",
              "255, 138, 101",
              "149, 117, 205",
              "255, 112, 67",
              "79, 195, 247",
              "156, 204, 101",
              "186, 104, 200",
              "174, 213, 129",
              "171, 71, 188",
              "129, 212, 250",
              "0, 188, 212",
              "255, 152, 0",
              "158, 158, 158",
              "33, 150, 243",
              "76, 175, 80",
              "244, 67, 54",
              "255, 193, 7",
              "3, 169, 244",
              "255, 235, 59"
            ];

        const ctx2 = document.getElementById('donutChart').getContext('2d');
        const donutChart = new Chart(ctx2, {
          type: 'doughnut',
          data: {
            labels: [
                    <?php foreach ($visitor_country as $key) {
                        echo "'".($key->country != "" ? $key->country : $lang['unknown'])."',";
                    }
                    ?>
                ],
            datasets: [{
              label: 'Total Visitor',
              data: [
                    <?php foreach ($visitor_country as $key) {
                        echo "".$key->total_hits.",";
                    }
                    ?>
                ],
              backgroundColor: [
                <?php for ($i = 0 ; $i < count($visitor_country); $i++) {
                ?>
                'rgba('+warnaArray[<?= $i ?>]+', 0.7)',
                <?php
                }
                ?>
                
              ],
              borderColor: [
                <?php for ($i = 0 ; $i < count($visitor_country); $i++) {
                ?>
                'rgba('+warnaArray[<?= $i ?>]+', 1)',
                <?php
                }
                ?>
              ],
              borderWidth: 1
            }]
          },
          options: {
            responsive: true,
            plugins: {
              legend: {
                display: true,
                position: 'bottom'
              },
              title: {
                display: true,
                text: '<?= $lang['total_visitors_by_country'] ?>'
              }
            }
          }
        });
      </script>

    <script>
        const ctx = document.getElementById('myLineChart').getContext('2d');
        const myLineChart = new Chart(ctx, {
          type: 'line',
          data: {
            labels: [
                <?php foreach ($visitor as $key) {
                    echo "'".$key->hari."',";
                }
                ?>],
            datasets: [{
              label: 'Total Visitor',
              data: [
                <?php foreach ($visitor as $key) {
                    echo "".$key->total_hits.",";
                }
                ?>
                ],
              fill: false,
              borderColor: '#696cff',
              tension: 0.4 // Ini yang bikin garisnya jadi melengkung
            }]
          },
          options: {
            responsive: true,
            scales: {
                x: {
                    ticks: {
                        display: false // <-- ini hilangkan label di bawah
                    },
                },
                y: {
                    beginAtZero: true
                }
            },
            plugins: {
              legend: {
                position: 'top',
              },
              title: {
                display: false,
                text: 'Contoh Grafik Line Curve'
              }
            }
          }
        });

        $('.filter-visitor').click(function(){
            // alert("tes")
            let value = $(this).attr("value");
            let text = $(this).attr("text");
            $.ajax({
                url: '<?= base_url() ?>admin/getVisitor',
                method: 'POST',
                dataType: 'json',
                data : {
                    value:value
                },
                success: function(data) {
                    // Update label dan data
                    myLineChart.data.labels = data.personal.labels;
                    myLineChart.data.datasets[0].data = data.personal.values;
                    myLineChart.update();

                    donutChart.data.labels = data.country.labels;
                    donutChart.data.datasets[0].data = data.country.values;
                    donutChart.data.datasets[0].backgroundColor = data.country.backgroundColor;
                    donutChart.data.datasets[0].borderColor = data.country.borderColor;
                    donutChart.update();
                    $('.btn-filter-visitor').html(text)
                },
                error: function(xhr, status, error) {
                    console.error('Gagal ambil data:', error);
                }
            });
        })
    </script>
  </body>
</html>
