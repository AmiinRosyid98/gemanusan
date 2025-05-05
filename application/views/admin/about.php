<style type="text/css">
  .img-kedua{
    width: 100%;
    height: auto;
    aspect-ratio: 4/2;
    object-fit: cover;
    border-radius: 5px;
  }
</style>

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                
                <div class="card-body">
                  <form id="formeditabout">
                    <div class="mb-6 mb-3">
                      <label class="form-label" for="basic-default-company"><?= $lang['company_name'] ?></label>
                      <input type="text" name="namaperusahaan" class="form-control" id="namaperusahaan" value='<?= $profil->namaperusahaan ?>' placeholder="Masukkan Nama Perusahaan" >

                    </div>
                    <div class="mb-6">
                      <div class="row">
                        <div class="col-lg-6"> 
                          <label class="form-label" for="basic-default-fullname">Deskripsi <small>(Bahasa Indonesia)</small></label>
                          <textarea type="text" name="isi" id="isi" class="form-control" placeholder="Masukkan Deskripsi"><?= $profil->isi ?></textarea>
                        </div>
                        <div class="col-lg-6"> 
                          <label class="form-label" for="basic-default-fullname">Description <small>(English)</small></label>
                          <textarea type="text" name="isi_en" id="isi_en" class="form-control" placeholder="Masukkan Deskripsi"><?= $profil->isi_en ?></textarea>
                        </div>
                        
                      </div>
                    </div>
                    <div class="mb-6 mt-3">
                      <div class="row">
                        <div class="col-lg-6"> 
                          <label class="form-label" for="basic-default-company">Visi <small>(Bahasa Indonesia)</small></label>
                          <textarea type="text" name="visi" class="form-control" id="visi" placeholder="Masukkan Visi"><?= $profil->visi ?></textarea>
                        </div>
                        <div class="col-lg-6"> 
                          <label class="form-label" for="basic-default-company">Vision <small>(English)</small></label>
                          <textarea type="text" name="visi_en" class="form-control" id="visi_en" placeholder="Masukkan Visi"><?= $profil->visi_en ?></textarea>
                        </div>
                      </div>
                    </div>
                    <div class="mb-6 mt-3">
                      <div class="row">
                        <div class="col-lg-6"> 
                          <label class="form-label" for="basic-default-company">Misi</label>
                          <textarea type="text" name="misi" class="form-control" id="misi" placeholder="Masukkan Misi"><?= $profil->misi ?></textarea>
                        </div>
                        <div class="col-lg-6"> 
                          <label class="form-label" for="basic-default-company">Mission</label>
                          <textarea type="text" name="misi_en" class="form-control" id="misi_en" placeholder="Masukkan Misi"><?= $profil->misi_en ?></textarea>
                        </div>
                      </div>
                    </div>

                    <div class="mb-6 mt-3">
                      <label for="nameWithTitle" class="form-label"><?= $lang['picture'] ?> 1 </label><br>
                      <img id="imagePreview" 
                      <?php if ($profil->gambar != "") :  ?>
                      src="<?= base_url() ?>assets/upload/<?= $profil->gambar  ?>"

                      <?php else : ?>

                      src="<?= base_url() ?>assets/img/default.jpg"
                      <?php endif ?>
                      alt="Preview <?= $lang['picture'] ?>" class="img-sertifikat mb-2" style=" max-width: 300px; margin-top: 10px;">
                      <input type="file" id="gambar" name="gambar" class="form-control img-input">
                    </div>

                    <div class="mb-6 mt-3">
                      <label for="nameWithTitle" class="form-label"><?= $lang['picture'] ?> 2</label><br>
                      <img id="imagePreview2" 
                      <?php if ($profil->gambardua != "") :  ?>
                      src="<?= base_url() ?>assets/upload/<?= $profil->gambardua  ?>"

                      <?php else : ?>

                      src="<?= base_url() ?>assets/img/default.jpg"
                      <?php endif ?>

                       alt="Preview <?= $lang['picture'] ?>" class="img-sertifikat img-kedua mb-2" style=" max-width: 300px; margin-top: 10px;">
                      <input type="file" id="gambardua" name="gambardua" class="form-control img-input2">
                    </div>

                    <div class="mb-6 mt-3">
                      <label class="form-label" for="basic-default-company"><?= $lang['email'] ?></label>
                      <input type="email" name="email" class="form-control" id="email" value="<?= $profil->email ?>" placeholder="Masukkan <?= $lang['email'] ?>">
                    </div>
                    <div class="mb-6 mt-3">
                      <label class="form-label" for="basic-default-company"><?= $lang['phone_wa'] ?></label>
                      <input type="text" name="telp" class="form-control" id="telp" value="<?= $profil->telp ?>" placeholder="Masukkan <?= $lang['phone_wa'] ?>">

                    </div>

                    <div class="mb-6 mt-3">
                      <label class="form-label" for="basic-default-company"><?= $lang['address'] ?></label>
                      <textarea type="text" name="alamat" class="form-control" id="alamat" rows="3" placeholder="<?= $lang['enter'] ?> <?= $lang['address'] ?>"><?= $profil->alamat ?></textarea>

                    </div>

                    <div class="mb-6 mt-3">
                      <label class="form-label" for="basic-default-company">Embed Maps</label>
                      <input type="text" name="embed_maps" class="form-control" id="embed_maps" value='<?= $profil->embed_maps ?>' placeholder="Masukkan Link Embed dari Google Maps" >

                    </div>


                    <div class="mb-6 mt-3">
                      <label class="form-label" for="basic-default-company">Facebook</label>
                      <input type="text" name="facebook" class="form-control" id="facebook" value="<?= $profil->facebook ?>" placeholder="<?= $lang['enter'] ?> Facebook" >

                    </div>
                    <div class="mb-6 mt-3">
                      <label class="form-label" for="basic-default-company">X (Twitter)</label>
                      <input type="text" name="twitter" class="form-control" id="twitter" value="<?= $profil->twitter ?>" placeholder="<?= $lang['enter'] ?> Twitter">

                    </div>

                    <div class="mb-6 mt-3">
                      <label class="form-label" for="basic-default-company">Instagram</label>
                      <input type="text" name="instagram" class="form-control" id="instagram" value="<?= $profil->instagram ?>" placeholder="<?= $lang['enter'] ?> Instagram" >

                    </div>

                    <div class="mb-6 mt-3">
                      <label class="form-label" for="basic-default-company">Linkedin</label>
                      <input type="text" name="linkedin" class="form-control" id="linkedin" value="<?= $profil->linkedin ?>" placeholder="<?= $lang['enter'] ?> Linkedin" >

                    </div>


                    
                    <button type="submit" class="btn btn-primary btn-simpan-profil mt-3" style="float:right;"><?= $lang['save'] ?></button>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" defer>
    
    CKEDITOR.replace('isi');
    CKEDITOR.replace('isi_en');
    CKEDITOR.replace('visi');
    CKEDITOR.replace('visi_en');
    CKEDITOR.replace('misi');
    CKEDITOR.replace('misi_en');
</script>