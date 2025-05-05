<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-lg-12">

          <div class="card">

            <h5 class="card-header"><?= $lang['product'] ?> <a href="<?= base_url() ?>admin/tambahproduk"><button type="button" class="btn btn-primary " style="float:right;"><i class="fas fa-plus"></i>&nbsp;<?= $lang['add_product'] ?></button></a></h5>

            
            <div class="table-responsive text-nowrap px-4" >
              <table class="table" id="example">
                <thead>
                  <tr class="text-nowrap">
                    <th class="text-center">No</th>
                    <th>File</th>
                    <th><?= $lang['product_name'] ?></th>
                    <th><?= $lang['category_name'] ?></th>
                    <th><?= $lang['action'] ?></th>
                    
                  </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                  <?php 
                  $no=1;
                  foreach ($produk as $key) : ?>
                  <tr>
                    <th class="text-center" scope="row"><?= $no++ ?></th>
                    <td><img class="img-produk-100" src="<?= base_url() ?>assets/upload/<?= $key->gambar_prd ?>"></td>
                    <td><?= $current_lang == "indonesian" ? $key->namaproduk : $key->namaproduk_en ?></td>
                    <td><?= $current_lang == "indonesian" ? $key->namakategori : $key->namakategori_en ?></td>
                    <td>
                      <a href="<?= base_url() ?>admin/editproduk/<?= $key->kd_produk ?>"> 
                        <button type="button" class="btn btn-icon btn-sm btn-success " data-id="<?= $key->kd_produk ?>" >
                          <i class="fas fa-pencil"></i>
                        </button>
                      </a>
                      <button type="button" class="btn btn-icon btn-sm btn-danger hapusdata" data-id="<?= $key->kd_produk ?>" data-table="produk">
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