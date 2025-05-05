<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-lg-12">

          <div class="card">

            <h5 class="card-header"><?= $lang['user'] ?> <button type="button" class="btn btn-primary add-user" style="float:right;"><i class="fas fa-plus"></i>&nbsp;<?= $lang['add_user'] ?></button></h5>

            
            <div class="table-responsive text-nowrap px-4" >
              <table class="table" id="example">
                <thead>
                  <tr class="text-nowrap">
                    <th class="text-center">No</th>
                    <th>Username</th>
                    <th><?= $lang['name'] ?></th>
                    <th>Status</th>

                    <th><?= $lang['action'] ?></th>
                    
                  </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                  <?php 
                  $no=1;
                  foreach ($usernya as $key) : ?>
                  <tr>
                    <th class="text-center" scope="row"><?= $no++ ?></th>
                    <td><?= $key->username ?></td>
                    <td><?= $key->nama ?></td>
                    <td><?= $key->status == 1 ? '<span class="badge rounded-pill text-bg-success">'.$lang["active"].'</span>' : '<span class="badge rounded-pill text-bg-danger">'.$lang["inactive"].'</span>' ?></td>
                    <td>
                      <button type="button" class="btn btn-icon btn-sm btn-success editdatauser" data-id="<?= $key->id_user ?>" data-table="user" data-nama="<?= $key->nama ?>"  data-username="<?= $key->username ?>" data-status="<?= $key->status == '1' ? 'aktif' : 'tidak_aktif'  ?>">
                        <i class="fas fa-pencil"></i>
                      </button>
                      <button type="button" class="btn btn-icon btn-sm btn-danger hapusdata" data-id="<?= $key->id_user ?>" data-table="user">
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


<div class="modal fade" id="modaladduser" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title modal-title-user" id="exampleModalLongTitle"><?= $lang['add_user'] ?></h5>
        <span type="button" class="close close-modal" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fas fa-times"></i></span>
        </span>
      </div>
      <form id="formadduser" method="POST" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="row">

            <div class="col-lg-12 mb-2">
              <label for="nameWithTitle" class="form-label"><?= $lang['name'] ?></label>
              <input type="text" id="namauser" name="namauser" class="form-control" placeholder="<?= $lang['enter'] ?> <?= $lang['name'] ?>">
              <input type="hidden" id="id_user" name="id_user" class="form-control" placeholder="Masukkan Nama user">
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12 mb-2">
              <label for="nameWithTitle" class="form-label">Username</label>
              <input type="text" id="username" name="username" class="form-control" placeholder="<?= $lang['enter'] ?> Username">

            </div>
            
          </div>

          <div class="row" style="position: relative;">
            <div class="form-check ubahpassword" style="float: right; display: none; position: absolute; right: 0; width: 163px; z-index: 9; text-align: right;">
              <input class="form-check-input checkubahpassword" type="checkbox" value="" id="checkubahpassword" style="float:unset !important;" >
              <label class="form-check-label" for="checkubahpassword"> <?= $lang['change_password'] ?> </label>
            </div>
            <div class="mb-3 form-password-toggle">

              <div class="d-flex justify-content-between" style="position: relative;">
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
                  placeholder="<?= $lang['enter'] ?> Password"
                  aria-describedby="password"
                />
                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12 mb-2">
              <label for="nameWithTitle" class="form-label">Status</label>
              <select id="status" name="status"  class="form-control">
                <option value="" disabled selected><?= $lang['select_status'] ?></option>
                <option value="aktif" ><?= $lang['active'] ?></option>
                <option value="tidak_aktif" ><?= $lang['inactive'] ?></option>
              </select>
            </div>
            
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary close-modal" data-dismiss="modal"><?= $lang['close'] ?></button>
          <button type="submit" class="btn btn-primary btn-simpan-user" jenis="add"><?= $lang['save'] ?></button>
        </div>
      </form>
    </div>
  </div>
</div>