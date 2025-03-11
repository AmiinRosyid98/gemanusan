<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-lg-12">

          <div class="card">

            <h5 class="card-header">Sertifikat <button type="button" class="btn btn-primary" style="float:right;"><i class="fas fa-plus"></i>&nbsp;Tambah Sertifikat</button></h5>

            
            <div class="table-responsive text-nowrap px-4" >
              <table class="table" id="example">
                <thead>
                  <tr class="text-nowrap">
                    <th>No</th>
                    <th>File</th>
                    <th>Nama</th>
                    <th>Aksi</th>
                    
                  </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                  <?php foreach ($sertifikat as $key) : ?>
                  <tr>
                    <th scope="row">1</th>
                    <td><?= $key->gambar ?></td>
                    <td><?= $key->nama ?></td>
                    <td>
                      
                      <button type="button" class="btn btn-icon btn-sm btn-danger">
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