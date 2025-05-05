<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-lg-12">

          <div class="card">

            <h5 class="card-header"><?= $title ?></h5>

            <form id="formaddproduk" method="POST" enctype="multipart/form-data">
              <div class="modal-body pt-0">
                <div class="row">

                  <div class="col-lg-6 mb-2">
                    <label for="nameWithTitle" class="form-label">Nama Produk</label>
                    <input type="text" id="namaproduk" name="namaproduk" class="form-control" placeholder="Masukkan Nama produk" value="<?= (isset($produk)) ? $produk->namaproduk : "" ?>">
                    <input type="hidden" id="id_produk" name="id_produk" class="form-control" placeholder="Masukkan Nama produk" value="<?= (isset($produk)) ? $produk->kd_produk : "" ?>">
                  </div>
                  <div class="col-lg-6 mb-2">
                    <label for="nameWithTitle" class="form-label">Product Name</label>
                    <input type="text" id="namaproduk_en" name="namaproduk_en" class="form-control" placeholder="Enter Product Name" value="<?= (isset($produk)) ? $produk->namaproduk_en : "" ?>">
                    
                  </div>
                </div>

                <div class="row">
                  <div class="col mb-2">
                    <label for="nameWithTitle" class="form-label"><?= $lang['category'] ?></label>
                    <select class="form-control select2 " name="kategori" id="kategori">
                      <option value="" selected disabled><?= $lang['select_category'] ?></option>
                      <?php foreach ($kategori as $key) : ?>
                        <option value="<?= $key->id_kategori ?>" 
                          <?php if (isset($produk)) {
                            if($produk->id_kategori == $key->id_kategori){
                              echo "selected";
                            }
                          }

                          ?>
                         ><?= $current_lang == "indonesian" ? $key->namakategori : $key->namakategori_en ?></option>

                      <?php endforeach ?>
                    </select>
                  </div>
                </div>

                <div class="row mt-3">
                  <div class="col-lg-6 mb-2">
                    <label class="form-label" for="basic-default-company">Spesifikasi</label>
                    <textarea type="text" name="spesifikasi" class="form-control" id="spesifikasi" placeholder="Masukkan spesifikasi"><?= (isset($produk)) ? $produk->spesifikasi : "" ?></textarea>
                  </div>
                  <div class="col-lg-6 mb-2">
                    <label class="form-label" for="basic-default-company">Specification</label>
                    <textarea type="text" name="spesifikasi_en" class="form-control" id="spesifikasi_en" placeholder="Enter Specification"><?= (isset($produk)) ? $produk->spesifikasi_en : "" ?></textarea>
                  </div>
                </div>

                <div class="row mt-3">
                  <div class="col-lg-6 mb-2">
                    <label class="form-label" for="basic-default-company">Keterangan</label>
                  <textarea type="text" name="ket" class="form-control" id="ket" placeholder="Masukkan Keterangan"><?= (isset($produk)) ? $produk->keterangan : "" ?></textarea>
                  </div>
                  <div class="col-lg-6 mb-2">
                    <label class="form-label" for="basic-default-company">Description</label>
                  <textarea type="text" name="ket_en" class="form-control" id="ket_en" placeholder="Enter Description"><?= (isset($produk)) ? $produk->keterangan_en : "" ?></textarea>
                  </div>
                </div>
                <div class="row">
                  <div class="col ">
                    <label for="nameWithTitle" class="form-label">File <?= $lang['product'] ?></label><br>
                    <?php if (isset($produk)) : ?>
                      <img id="imagePreview" src="<?= base_url() ?>assets/upload/<?= $produk->gambar_prd ?>" alt="Preview Gambar" class="img-produk mb-2" style=" max-width: 300px; margin-top: 10px;">
                    <?php else : ?>
                    <img id="imagePreview" src="<?= base_url() ?>assets/img/default.jpg" alt="Preview Gambar" class="img-produk mb-2" style=" max-width: 300px; margin-top: 10px;">
                    <?php endif ?>
                    <input type="file" id="fileproduk" name="fileproduk" class="form-control img-input">
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <?php if (isset($produk)) : ?>
                <a href="<?= base_url() ?>admin/produk"><button type="button" class="btn btn-secondary close-modal" ><?= $lang['cancel'] ?></button></a>
                <?php endif ?>
                <button type="submit" class="btn btn-primary btn-simpan-produk" jenis="<?= (isset($produk)) ? "edit" : "add" ?>"><?= $lang['save'] ?></button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

<script type="text/javascript" defer>
    
    CKEDITOR.replace('spesifikasi');
    CKEDITOR.replace('spesifikasi_en');
    CKEDITOR.replace('ket');
    CKEDITOR.replace('ket_en');
</script>