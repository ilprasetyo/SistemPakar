<section class="card">
      <div class="card-header">
        <h4 class="card-title">Edit penyakit</h4>
      </div>
      <div class="card-content">
        <div class="card-body">
          <form method="post" action="<?php echo base_url().$action ?>" enctype="multipart/form-data">
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">id</label>
              <div class="col-sm-10">
                <input type="text" name="id" class="form-control" placeholder="" value="<?php echo $dataedit->id?>" readonly>
              </div>
            </div>
						<div class="form-group row">
              <label for="example-text-input" class="col-sm-2 col-form-label">Kode_Penyakit</label>
              <div class="col-sm-10">
                <input type="text" name="Kode_Penyakit" class="form-control" value="<?php echo $dataedit->Kode_Penyakit?>">
              </div>
              </div>
						<div class="form-group row">
              <label for="example-text-input" class="col-sm-2 col-form-label">Nama_Penyakit</label>
              <div class="col-sm-10">
                <input type="text" name="Nama_Penyakit" class="form-control" value="<?php echo $dataedit->Nama_Penyakit?>">
              </div>
              </div>
						<div class="form-group row">
              <label for="example-text-input" class="col-sm-2 col-form-label">Solusi</label>
              <div class="col-sm-10">
                <input type="text" name="Solusi" class="form-control" value="<?php echo $dataedit->Solusi?>">
              </div>
              </div>

        </div>
        <input type="hidden" id="deleteFiles" name="deleteFiles">
        <div class="col-12">
          <button type="submit" class="btn btn-primary mr-1 mb-1 waves-effect
           waves-light float-right">Simpan</button>
        </div>
      </form>
      </div>
    </section>
