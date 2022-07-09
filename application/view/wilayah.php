<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <form action="#" method="POST">
              <div class="form-group">
                <label>Provinsi:</label>
                  <select class="form-control" name="provinsi" id="provinsi">
                    <option></option>
                    <?php                       
                        foreach ($provinces as $rs_provinsi) { 
                           echo '<option value="'.$rs_provinsi['id'].'">'.$rs_provinsi['name'].'</option>';
                        }                        
                      ?>
                  </select>
                  <img src="asset/img/loading.gif" width="35" id="load1" style="display:none;" />
              </div>
              <div class="form-group">
                <label>Kota/Kabupaten:</label>
                  <select class="form-control" name="kabupaten" id="kota" disabled>
                    <option></option>
                  </select>
                  <img src="asset/img/loading.gif" width="35" id="load2" style="display:none;" />
              </div>
              <div class="form-group">
                <label>Kecamatan:</label>
                  <select class="form-control" name="kecamatan" id="kecamatan" disabled>
                    <option></option>
                  </select>
                  <img src="asset/img/loading.gif" width="35" id="load3" style="display:none;" />
              </div>
              <div class="form-group">
                <label>Kelurahan:</label>
                  <select class="form-control" name="kelurahan" id="kelurahan" disabled>
                    <option></option>
                  </select>
              </div>
            </div>
            <div class="form-group col-md-6">
                <div class="form-group">
                    <div class="row">
                        <div class="col">
                        <label>RT</label>
                        <input type="number" class="form-control" name="rt" minlength="1" autocomplete="off" required>
                            </div>
                            <div class="col">
                        <label>RW</label>
                        <input type="number" class="form-control" name="rw" minlength="1" autocomplete="off" required>
                            </div>
                        </div>
                        </div>
                        <div class="form-group">
                        <label>Alamat Lengkap</label>
                        <input type="text" class="form-control" name="alamat" minlength="1" autocomplete="off" required>
                        </div>
                        <div class="form-group">
                        <label>Koordinat</label>
                        <input type="text" class="form-control" name="koordinat" minlength="1" autocomplete="off" required>
                        </div>
                    </div>        
                    <input type="hidden" name="<?= $csrf_name ?>" id="token" value="<?= $csrf_hash ?>">
                </div>
                <button type="submit" class="btn btn-success btn-block">Submit</button>
            </form>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/i18n/id.min.js"  crossorigin="anonymous" referrerpolicy="no-referrer"></script>  
<script>
$( document ).ready(function() {

    $('#provinsi').select2({
	  	placeholder: 'Pilih Provinsi',
	  	language: "id"
	});
	$('#kota').select2({
	  	placeholder: 'Pilih Kota/Kabupaten',
	  	language: "id"
	});
	$('#kecamatan').select2({
	  	placeholder: 'Pilih Kecamatan',
	  	language: "id"
	});
	$('#kelurahan').select2({
	  	placeholder: 'Pilih Kelurahan',
	  	language: "id"
	});

	$("#provinsi").change(function(){
	      $("img#load1").show();
	      var id_provinces = $(this).val(); 
	      $.ajax({
	         type: "GET",
	         dataType: "html",
	         url: "<?= site_url(); ?>wilayah/kota/"+id_provinces,
	         success: function(msg){
	            $("select#kota").html(msg);
                $("select#kota").prop("disabled", false);
	            $("img#load1").hide();
	            getAjaxKota();                                                        
	         }
	      });                    
     });  

	$("#kota").change(getAjaxKota);
     function getAjaxKota(){
          $("img#load2").show();
          var id_regencies = $("#kota").val();
          $.ajax({
             type: "GET",
             dataType: "html",
             url: "<?= site_url(); ?>wilayah/kecamatan/"+id_regencies,
             success: function(msg){
                $("select#kecamatan").html(msg);
                $("select#kecamatan").prop("disabled", false);
                $("img#load2").hide(); 
               getAjaxKecamatan();                                                    
             }
          });
     }

     $("#kecamatan").change(getAjaxKecamatan);
     function getAjaxKecamatan(){
          $("img#load3").show();
          var id_district = $("#kecamatan").val();
          $.ajax({
             type: "GET",
             dataType: "html",
             url: "<?= site_url(); ?>wilayah/kelurahan/"+id_district,
             success: function(msg){
                $("select#kelurahan").html(msg); 
                $("select#kelurahan").prop("disabled", false);
                $("img#load3").hide();                                                 
             }
          });
     }
});
</script>
