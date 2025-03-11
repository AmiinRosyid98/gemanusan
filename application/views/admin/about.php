<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                
                <div class="card-body">
                  <form>
                    <div class="mb-6">
                      <label class="form-label" for="basic-default-fullname">Deskripsi</label>
                      <textarea type="text" name="isi" id="isi" class="form-control" placeholder="Masukkan Deskripsi"><?= $profil->isi ?></textarea>
                    </div>
                    <div class="mb-6 mt-3">
                      <label class="form-label" for="basic-default-company">Visi</label>
                      <textarea type="text" name="visi" class="form-control" id="visi" placeholder="Masukkan Visi"><?= $profil->visi ?></textarea>
                    </div>
                    <div class="mb-6 mt-3">
                      <label class="form-label" for="basic-default-company">Misi</label>
                      <textarea type="text" name="misi" class="form-control" id="misi" placeholder="Masukkan Misi"><?= $profil->misi ?></textarea>
                    </div>
                    
                    <button type="submit" class="btn btn-primary btn-simpan-profil mt-3" style="float:right;">Simpan</button>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" defer>
    
    CKEDITOR.replace('isi');
    CKEDITOR.replace('visi');
    CKEDITOR.replace('misi');
</script>