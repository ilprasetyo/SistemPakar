<section class="card">
      <div class="card-header">
        <h4 class="card-title">Edit gejala</h4>
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
              <label for="example-text-input" class="col-sm-2 col-form-label">Kode_Gejala</label>
              <div class="col-sm-10">
                <input type="text" name="Kode_Gejala" class="form-control" value="<?php echo $dataedit->Kode_Gejala?>">
              </div>
              </div>
						<div class="form-group row">
              <label for="example-text-input" class="col-sm-2 col-form-label">Nama_Gejala</label>
              <div class="col-sm-10">
                <input type="text" name="Nama_Gejala" class="form-control" value="<?php echo $dataedit->Nama_Gejala?>">
              </div>
              </div>
						<div class="form-group row">
              <label for="example-text-input" class="col-sm-2 col-form-label">Bobot</label>
              <div class="col-sm-10">
                <input type="text" name="Bobot" class="form-control" value="<?php echo $dataedit->Bobot?>">
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
