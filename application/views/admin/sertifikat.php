<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-lg-12">

          <div class="card">

            <h5 class="card-header"><?= $lang['certificate'] ?> <button type="button" class="btn btn-primary add-sertifikat" style="float:right;"><i class="fas fa-plus"></i>&nbsp;<?= $lang['add_certificate'] ?></button></h5>

            
            <div class="table-responsive text-nowrap px-4" >
              <table class="table" id="example">
                <thead>
                  <tr class="text-nowrap">
                    <th class="text-center">No</th>
                    <th>File</th>
                    <th><?= $lang['name'] ?></th>
                    <th><?= $lang['action'] ?></th>
                    
                  </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                  <?php 
                  $no=1;
                  foreach ($sertifikat as $key) : ?>
                  <tr>
                    <th class="text-center" scope="row"><?= $no++ ?></th>
                    <td><img class="img-sertifikat" src="<?= base_url() ?>assets/upload_sertifikat/<?= $key->gambar ?>"></td>
                    <td><?= $current_lang == "indonesian" ? $key->nama : $key->nama_en ?></td>
                    <td>
                      
                      <button type="button" class="btn btn-icon btn-sm btn-success editdatasertifikat" data-id="<?= $key->id_sertifikat ?>" data-table="sertifikat" data-nama="<?= $key->nama ?>" data-nama_en="<?= $key->nama_en ?>" data-gambar="<?= $key->gambar ?>">
                        <i class="fas fa-pencil"></i>
                      </button>
                      <button type="button" class="btn btn-icon btn-sm btn-danger hapusdata" data-id="<?= $key->id_sertifikat ?>" data-table="sertifikat">
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


<div class="modal fade" id="modaladdsertifikat" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title modal-title-sertifikat" id="exampleModalLongTitle"><?= $lang['add_certificate'] ?></h5>
        <span type="button" class="close close-modal" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fas fa-times"></i></span>
        </span>
      </div>
      <form id="formaddsertifikat" method="POST" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="row">

            <div class="col-lg-6 mb-2">
              <label for="nameWithTitle" class="form-label">Nama Sertifikat</label>
              <input type="text" id="namasertifikat" name="namasertifikat" class="form-control" placeholder="Masukkan Nama Sertifikat">
              <input type="hidden" id="id_sertifikat" name="id_sertifikat" class="form-control" placeholder="Masukkan Nama Sertifikat">
            </div>
            <div class="col-lg-6 mb-2">
              <label for="nameWithTitle" class="form-label">Certificate Name</label>
              <input type="text" id="namasertifikat_en" name="namasertifikat_en" class="form-control" placeholder="Enter Certificate Name">
            </div>

            <div class="col mb-2">
              
            </div>
          </div>
          <div class="row">
            <div class="col ">
              <label for="nameWithTitle" class="form-label">File Sertifikat</label><br>
              <img id="imagePreview" src="<?= base_url() ?>assets/img/default.jpg" alt="Preview Gambar" class="img-sertifikat mb-2" style=" max-width: 300px; margin-top: 10px;">
              <input type="file" id="filesertifikat" name="filesertifikat" class="form-control img-input">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary close-modal" data-dismiss="modal"><?= $lang['close'] ?></button>
          <button type="submit" class="btn btn-primary btn-simpan-sertifikat" jenis="add"><?= $lang['save'] ?></button>
        </div>
      </form>
    </div>
  </div>
</div>