<section class="card">
  <div class="card-header">
    <h4 class="card-title">Tambah Data</h4>
  </div>
  <div class="card-content">
    <div class="card-body">
      <form method="post" action="<?php echo base_url() . $action ?>" enctype="multipart/form-data">
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Kode_Penyakit</label>
          <div class="col-sm-10">
            <input type="text" name="Kode_Penyakit" class="form-control">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Nama_Penyakit</label>
          <div class="col-sm-10">
            <input type="text" name="Nama_Penyakit" class="form-control">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Ciri</label>
          <div class="col-sm-10">
            <input type="text" name="Ciri" class="form-control">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Solusi</label>
          <div class="col-sm-10">
            <input type="text" name="Solusi" class="form-control">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Gambar (Url)</label>
          <div class="col-sm-10">
            <input type="text" name="Gambar" class="form-control">
          </div>
        </div>
    </div>
    <div class="col-12">
      <button type="submit" class="btn btn-primary mr-1 mb-1 waves-effect
           waves-light float-right">Simpan</button>
    </div>
    </form>
  </div>
</section>