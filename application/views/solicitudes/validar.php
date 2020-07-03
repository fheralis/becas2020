  <div class="row">
    <div class="offset-md-1 col-md-10">
      <div class="card border-light mb-3">
        <div class="card-header bg-dark text-white"><h1><?php echo $titulo; ?></h1></div>
        <div class="card-body">
          <?php echo br(3); ?>
          <div class="row">


            <div class="col-md-12">
              <div class="alert alert-dismissible alert-danger" id="alert">
                <p></p>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-row">
                <div class="form-group col-md-3">
                  <label for="folio"><b><span class="text-danger"> * </span>Número de folio:</b></label>
                  <input type="text" class="form-control" id="folio" name="folio" value="" onkeypress="return isNumberInt(this);" maxlength="10" >
                </div>
                <div class="form-group col-md-3">
                  <label for="">.</label><br>
                  <button type="button" id="btnValidar" class="btn btn-primary">Validar....</button>
                </div>
                <input type="hidden" name="base_url" id="base_url" value="<?php echo base_url(); ?>">
              </div>
              
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>

<?php echo br(5); ?>

<script src="<?php echo base_url(); ?>sources/js/functjs.js" type="text/javascript" ></script>   
<script src="<?php echo base_url(); ?>sources/js/solicitudes/validar.js" type="text/javascript" ></script>