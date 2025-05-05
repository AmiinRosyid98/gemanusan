<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-lg-12">

          <div class="card">

            <h5 class="card-header"><?= $lang['slider'] ?> <button type="button" class="btn btn-primary add-slider" style="float:right;"><i class="fas fa-plus"></i>&nbsp;<?= $lang['add_slider'] ?></button></h5>

            
            <div class="table-responsive text-nowrap px-4" >
              <table class="table" id="example">
                <thead>
                  <tr class="text-nowrap">
                    <th class="text-center">No</th>
                    <th>File</th>
                    <th><?= $lang['title'] ?></th>
                    <th><?= $lang['keterangan'] ?></th>
                    <th><?= $lang['action'] ?></th>
                    
                  </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                  <?php 
                  $no=1;
                  foreach ($slider as $key) : ?>
                  <tr>
                    <th class="text-center" scope="row"><?= $no++ ?></th>
                    <td><img class="img-galeri" src="<?= base_url() ?>assets/upload_slider/<?= $key->gambar ?>"></td>
                    <td><?= $current_lang == "indonesian" ? $key->nama : $key->nama_en ?></td>
                    <td style="max-width: 300px; white-space: break-spaces;"><?= $current_lang == "indonesian" ? ($key->deskripsi != "" ? $key->deskripsi : "-") : ($key->deskripsi_en != "" ? $key->deskripsi_en : "-") ?></td>
                    <td>
                      
                      <button type="button" class="btn btn-icon btn-sm btn-success editdataslider" data-id="<?= $key->id_slider ?>" data-table="slider" data-nama="<?= $key->nama ?>" data-nama_en="<?= $key->nama_en ?>" data-deskripsi="<?= $key->deskripsi ?>" data-deskripsi_en="<?= $key->deskripsi_en ?>" data-gambar="<?= $key->gambar ?>">
                        <i class="fas fa-pencil"></i>
                      </button>
                      <button type="button" class="btn btn-icon btn-sm btn-danger hapusdata" data-id="<?= $key->id_slider ?>" data-table="slider">
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


<div class="modal fade" id="modaladdslider" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title modal-title-slider" id="exampleModalLongTitle"><?= $lang['add_slider'] ?></h5>
        <span type="button" class="close close-modal" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fas fa-times"></i></span>
        </span>
      </div>
      <form id="formaddslider" method="POST" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="row">
            <div class="col-lg-6 mb-2">
              <label for="nameWithTitle" class="form-label">Nama slider</label>
              <input type="text" id="namaslider" name="namaslider" class="form-control" placeholder="Masukkan Nama slider">
              <input type="hidden" id="id_slider" name="id_slider" class="form-control" placeholder="Masukkan Nama slider">
            </div>
            <div class="col-lg-6 mb-2">
              <label for="nameWithTitle" class="form-label">Slider Name</label>
              <input type="text" id="namaslider_en" name="namaslider_en" class="form-control" placeholder="Enter Slider Name">
            </div>
          </div>
          <div class="row">
            <div class="col-lg-6 mb-2">
              <label for="nameWithTitle" class="form-label">Deskripsi</label>
              <textarea type="text" id="deskripsislider" name="deskripsislider" class="form-control" placeholder="Masukkan Deskripsi" rows="3"></textarea>
            </div>
            <div class="col-lg-6 mb-2">
              <label for="nameWithTitle" class="form-label">Description</label>
              <textarea type="text" id="deskripsislider_en" name="deskripsislider_en" class="form-control" placeholder="Enter Description" rows="3"></textarea>
            </div>
          </div>
          <div class="row">
            <div class="col ">
              <label for="nameWithTitle" class="form-label">File slider</label><br>
              <img id="imagePreview" src="<?= base_url() ?>assets/img/default.jpg" alt="Preview Gambar" class="img-galeri mb-2" style=" max-width: 300px; margin-top: 10px;">
              <input type="file" id="fileslider" name="fileslider" class="form-control img-input">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary close-modal" data-dismiss="modal"><?= $lang['close'] ?></button>
          <button type="submit" class="btn btn-primary btn-simpan-slider" jenis="add"><?= $lang['save'] ?></button>
        </div>
      </form>
    </div>
  </div>
</div>