<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-lg-12">

          <div class="card">

            <h5 class="card-header"><?= $lang['category'] ?> <button type="button" class="btn btn-primary add-kategori" style="float:right;"><i class="fas fa-plus"></i>&nbsp;<?= $lang['add_category'] ?></button></h5>

            
            <div class="table-responsive text-nowrap px-4" >
              <table class="table" id="example">
                <thead>
                  <tr class="text-nowrap">
                    <th class="text-center">No</th>
                    <th>File</th>
                    <th><?= $lang['name'] ?></th>
                    <th><?= $lang['keterangan'] ?></th>
                    <th><?= $lang['action'] ?></th>
                    
                  </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                  <?php 
                  $no=1;
                  foreach ($kategori as $key) : ?>
                  <tr>
                    <th class="text-center" scope="row"><?= $no++ ?></th>
                    <td><img class="img-sertifikat" src="<?= base_url() ?>assets/upload_kategori/<?= $key->gambar ?>"></td>
                    <td><?= $current_lang == "indonesian" ? $key->namakategori : $key->namakategori_en ?></td>
                    <td style="max-width: 300px; white-space: break-spaces;"><?= $current_lang == "indonesian" ? ($key->ket != "" ? $key->ket : "-") : ($key->ket_en != "" ? $key->ket_en : "-") ?></td>
                    <td>
                      
                      <button type="button" class="btn btn-icon btn-sm btn-success editdatakategori" data-id="<?= $key->id_kategori ?>" data-table="kategori" data-nama="<?= $key->namakategori ?>" data-nama_en="<?= $key->namakategori_en ?>" data-ket="<?= $key->ket ?>" data-ket_en="<?= $key->ket_en?>" data-gambar="<?= $key->gambar ?>">
                        <i class="fas fa-pencil"></i>
                      </button>
                      <button type="button" class="btn btn-icon btn-sm btn-danger hapusdata" data-id="<?= $key->id_kategori ?>" data-table="kategori">
                        <i class="fas fa-trash"></i>
                      </button>
                    </td>
                  </tr>
                  <?php endforeach ?>
                
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>


<div class="modal fade" id="modaladdkategori" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title modal-title-kategori" id="exampleModalLongTitle"><?= $lang['add_category'] ?></h5>
        <span type="button" class="close close-modal" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fas fa-times"></i></span>
        </span>
      </div>
      <form id="formaddkategori" method="POST" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="row">

            <div class="col-lg-6 mb-2">
              <label for="nameWithTitle" class="form-label">Nama kategori</label>
              <input type="text" id="namakategori" name="namakategori" class="form-control" placeholder="Masukkan Nama Kategori">
              <input type="hidden" id="id_kategori" name="id_kategori" class="form-control" placeholder="Masukkan Nama Kategori">
            </div>
            <div class="col-lg-6 mb-2">
              <label for="nameWithTitle" class="form-label">Category Name</label>
              <input type="text" id="namakategori_en" name="namakategori_en" class="form-control" placeholder="Enter Category Name">
            </div>
          </div>
          <div class="row">
            <div class="col-lg-6 mb-2">
              <label for="nameWithTitle" class="form-label">Deskripsi</label>
              <textarea type="text" id="deskripsikategori" name="deskripsikategori" class="form-control" placeholder="Masukkan Deskripsi" rows="5"></textarea>
            </div>
            <div class="col-lg-6 mb-2">
              <label for="nameWithTitle" class="form-label">Description</label>
              <textarea type="text" id="deskripsikategori_en" name="deskripsikategori_en" class="form-control" placeholder="Enter Description" rows="5"></textarea>
            </div>
          </div>
          <div class="row">
            <div class="col ">
              <label for="nameWithTitle" class="form-label">File kategori</label><br>
              <img id="imagePreview" src="<?= base_url() ?>assets/img/default.jpg" alt="Preview Gambar" class="img-sertifikat mb-2" style=" max-width: 300px; margin-top: 10px;">
              <input type="file" id="filekategori" name="filekategori" class="form-control img-input">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary close-modal" data-dismiss="modal"><?= $lang['close'] ?></button>
          <button type="submit" class="btn btn-primary btn-simpan-kategori" jenis="add"><?= $lang['save'] ?></button>
        </div>
      </form>
    </div>
  </div>
</div>