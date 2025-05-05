<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-lg-12">

          <div class="card">

            <h5 class="card-header"><?= $lang['videos'] ?> <button type="button" class="btn btn-primary add-video" style="float:right;"><i class="fas fa-plus"></i>&nbsp;<?= $lang['add_video'] ?></button></h5>

            
            <div class="table-responsive text-nowrap px-4" >
              <table class="table" id="example">
                <thead>
                  <tr class="text-nowrap">
                    <th class="text-center">No</th>
                    <th style="min-width: 300px;"><?= $lang['videos'] ?></th>
                    <th><?= $lang['title'] ?></th>
                    <!-- <th>Keterangan</th> -->
                    <th><?= $lang['action'] ?></th>
                    
                  </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                  <?php 
                  $no=1;
                  foreach ($video as $key) : ?>
                  <tr>
                    <th class="text-center" scope="row"><?= $no++ ?></th>
                    <td><iframe width="100%" height="200" src="<?= convertToEmbed($key->link) ?>" frameborder="0" allowfullscreen></iframe></td>
                    <td><?= $current_lang == "indonesian" ? $key->namavideo : $key->namavideo_en ?></td>
                    <!-- <td style="max-width: 300px; white-space: break-spaces;"><?= $key->ket != "" ? $key->ket : "-"  ?></td> -->
                    <td>
                      
                      <button type="button" class="btn btn-icon btn-sm btn-success editdatavideo" data-id="<?= $key->id_video ?>" data-table="video" data-nama="<?= $key->namavideo ?>" data-nama_en="<?= $key->namavideo_en ?>" data-ket="<?= $key->ket ?>" data-ket_en="<?= $key->ket_en ?>" data-link="<?= $key->link ?>">
                        <i class="fas fa-pencil"></i>
                      </button>
                      <button type="button" class="btn btn-icon btn-sm btn-danger hapusdata" data-id="<?= $key->id_video ?>" data-table="video">
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


<div class="modal fade" id="modaladdvideo" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title modal-title-video" id="exampleModalLongTitle"><?= $lang['add_video'] ?></h5>
        <span type="button" class="close close-modal" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fas fa-times"></i></span>
        </span>
      </div>
      <form id="formaddvideo" method="POST" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="row">

            <div class="col-lg-6 mb-2">
              <label for="nameWithTitle" class="form-label">Nama video</label>
              <input type="text" id="namavideo" name="namavideo" class="form-control" placeholder="Masukkan Nama video">
              <input type="hidden" id="id_video" name="id_video" class="form-control" placeholder="Masukkan Nama video">
            </div>
            <div class="col-lg-6 mb-2">
              <label for="nameWithTitle" class="form-label">Video Name</label>
              <input type="text" id="namavideo_en" name="namavideo_en" class="form-control" placeholder="Enter Video Name">
            </div>
          </div>
          <div class="row">
            <div class="col-lg-6 mb-2">
              <label for="nameWithTitle" class="form-label">Deskripsi</label>
              <textarea type="text" id="deskripsivideo" name="deskripsivideo" class="form-control" placeholder="Masukkan Deskripsi" rows="3"></textarea>
            </div>
            <div class="col-lg-6 mb-2">
              <label for="nameWithTitle" class="form-label">Description</label>
              <textarea type="text" id="deskripsivideo_en" name="deskripsivideo_en" class="form-control" placeholder="Enter Description" rows="3"></textarea>
            </div>
          </div>
          <div class="row">
            <div class="col ">
              <label for="nameWithTitle" class="form-label">Link</label>
              <input type="text" id="linkvideo" name="linkvideo" class="form-control" placeholder="Masukkan Link Video">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary close-modal" data-dismiss="modal"><?= $lang['close'] ?></button>
          <button type="submit" class="btn btn-primary btn-simpan-video" jenis="add"><?= $lang['save'] ?></button>
        </div>
      </form>
    </div>
  </div>
</div>