<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="<?php echo base_url('assets/img/logo/logo-mini.png'); ?>" rel="icon">
  <title>Sistem Penjadwalam Kuliah D3TI UNS PSDKU</title>
  <link href="<?php echo base_url('assets/vendor/fontawesome-free/css/all.min.css');  ?>" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url('assets/vendor/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet" type="text/css">
  <!-- <link href="<?php echo base_url('assets/css/ruang-admin.min.css'); ?>" rel="stylesheet"> -->
  <link href="<?php echo base_url('assets/vendor/bootstrap-table/bootstrap-table.min.css'); ?>" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo base_url('assets/vendor/bootstrap-validator/css/bootstrapValidator.min.css');?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/vendor/sweetalert2/sweetalert2.css');?>">
	<link href="<?php echo base_url('assets/css/ruang-admin.css'); ?>" rel="stylesheet">
	<!-- Icon -->
	<link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
      integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
	<!-- Font -->
	<link href="https://fonts.googleapis.com/css2?family=Source+Sans+3:ital,wght@0,200..900;1,200..900&display=swap" rel="stylesheet" />
</head>

<body id="page-top">
  <?php $this->load->view('admin/header'); ?>
        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="row">
            <div class="col-lg-12">
              <div class="card mb-4">
								<div class="card-body">
									<h5 class="font-weight-bold">Ruangan D3 Teknik Informatika PSDKU</h5>
									<p class="text-muted">Pengelolaan data ruangan D3 TI PSDKU</p>
									<div class="row">
										<div class="col-6">
											<button class="btn bg-biru" onclick="setModalTambah();">
												<i class="fas fa-plus text-white"></i>
												<span class="text text-white">Tambah Data</span>
											</button>
										</div>
										<div class="col-6">
											<div class="input-group">
													<span class="input-group-text"><i class="text-secondary fa-solid fa-magnifying-glass"></i></span>
													<input class="form-control" id="searchInput" type="text" placeholder="Cari data ruangan" />
											</div>
										</div>
									</div>
									
									<div class="table-responsive table-striped table-hover">
                  <table class="table align-items-center table-flush mt-3" id="table" data-toggle="table" data-click-to-select="true"  data-pagination="true">
                    <thead class="text-dark text-center">
                      <tr>
                        <th data-field="no" data-formatter="indexFormatter" class="font-14 text-center">#</th>
                        <th data-field="id" data-visible="false">id</th>
                        <th data-field="id_prodi" data-visible="false">id_prodi</th>
                        <th data-field="nama" class="font-14 text-center">Nama</th>
                        <!-- <th data-field="jenis" class="font-14">Jenis</th> -->
                        <th data-field="programstudi" data-formatter="prodiFormatter" class="font-14 text-center">Program Studi</th>
                        <th data-field="aksi" data-formatter="aksiFormatter" data-events="window.aksiEvents" class="font-14 text-center">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                        foreach ($data as $key => $value) {
                          echo "<tr>
                                  <td></td>
                                  <td>$value[id]</td>
                                  <td>$value[id_prodi]</td>
                                  <td>$value[nama]</td>
                                  <td>$value[programstudi]</td>
                                  <td></td>
                                </tr>";
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
                </div>
              </div>
            </div>

            <!-- Modal -->
          <div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="myModalLabel">Tambah Ruangan</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form id="formRuangan">
                    <input type="hidden" name="id">
                    <div class="form-group row">
											<div class="col-sm-12">
												<label for="inputNama" class="col-form-label">Nama</label>
                        <input type="text" class="form-control" id="inputNama" name="nama" placeholder="Nama Ruangan" data-bv-notempty="true" data-bv-notempty-message="Nama Ruangan tidak boleh kosong">
                      </div>
                    </div>

                    <!-- <div class="form-group row">
                      <label for="selectJenis" class="col-sm-3 col-form-label">Jenis</label>
                      <div class="col-sm-9">
                        <select class="form-control" id="selectJenis" name="jenis">
                          <option value="TEORI">TEORI</option>
                          <option value="LABORATORIUM">LABORATORIUM</option>
                        </select>
                      </div>
                    </div> -->

                    <div class="form-group row" id="inputProdi">
											<div class="col-sm-12">
												<label for="selectProdi" class="col-form-label">Program Studi</label>
                        <select class="form-control" id="selectProdi" name="id_prodi" data-bv-notempty="true" data-bv-notempty-message="Program Studi harus dipilih">
                          <option value="">- Pilih Program Studi -</option>
                          <?php 
                            foreach ($dataProdi as $key => $value) {
                              echo "<option value='$value[id]'>$value[nama]</option>";
                            }
                           ?>
                        </select>
                      </div>
                    </div>
                  
                  </form>
                </div>
                <div class="modal-footer d-flex">
									<button type="button" class="btn btn-outline-secondary flex-fill" data-dismiss="modal">Tutup</button>
                  <button class="btn bg-biru flex-fill text-white" id="submitBtn">
                    <span class="text">Simpan</span>
                  </button>
                </div>
              </div>
            </div>

          </div>
          <!--Row-->
        </div>
        <!---Container Fluid-->
      </div>
      <?php $this->load->view('admin/footer'); ?>
      <script src="<?php echo base_url('assets/vendor/bootstrap-table/bootstrap-table.min.js'); ?>"></script>
      <script src="<?php echo base_url('assets/vendor/bootstrap-table/bootstrap-table-id-ID.js'); ?>"></script>
      <script src="<?php echo base_url('assets/vendor/bootstrap-validator/js/bootstrapValidator.min.js'); ?>"></script>
      <script src="<?php echo base_url('assets/vendor/sweetalert2/sweetalert2.all.min.js'); ?>"></script>

      <script type="text/javascript">
        $(document).ready(function(){
					$('#table').bootstrapTable({
						search: false // Disable default search box
					});

					// Custom search input functionality
					$('#searchInput').on('input', function () {
						var searchText = $(this).val();
						$('#table').bootstrapTable('refreshOptions', {
							search: true,
							searchText:  searchText
						});
					});

          $('#formRuangan').bootstrapValidator({
                message: 'This value is not valid',
            		feedbackIcons: {
									valid: 'glyphicon glyphicon-ok',
									invalid: 'fas fa-exclamation-circle',
									validating: 'glyphicon glyphicon-refresh'
            		},
            	excluded: ':disabled'
          })
        })

        $('#selectJenis').change(function(){
          $('select[name=id_prodi]').val('');
          if ($(this).val() == "LABORATORIUM") {
            $('#inputProdi').show();
            $('#formRuangan').bootstrapValidator('enableFieldValidators','id_prodi', true, 'notEmpty');
          }else{
            $('#inputProdi').hide();
            $('#formRuangan').bootstrapValidator('enableFieldValidators','id_prodi', false, 'notEmpty');
          }
        })

        $('#formRuangan').submit(function() {
            return false;
        });

        function setModalTambah(){
            $('#formRuangan').bootstrapValidator('resetForm', true);
            $('#formRuangan').trigger("reset");

            $('#tambahModal').modal();
            $('#myModalLabel').html("Tambah Ruangan");

            $('#submitBtn').html('<span class="text">Simpan</span>');
            // $('#inputProdi').hide();
            $('#formRuangan').bootstrapValidator('enableFieldValidators','id_prodi', false, 'notEmpty');
        }

        function tambah_ruang(){
            $('#formRuangan').submit();
            var data = $('#formRuangan').serializeArray();

            data = jQuery.grep(data, function(value) {
              return value['name'] != 'id';
            });

            var hasErr = $('#formRuangan').find(".has-error").length;

            if (hasErr == 0) {
                jQuery.ajax({
                    type: "POST",
                    url: "<?php echo base_url() ?>"+"admin/manajemen",
                    dataType: 'JSON',
                    data: {manajemen:'tambah',form:'ruang',data:data},
                    success: function(res) {
                            if(res){
                                Swal.fire(
                                      'Berhasil!',
                                      'Ruangan berhasil ditambahkan',
                                      'success'
                                    )
                                    setTimeout(function(){location.reload(); },500);
                            }
                        }
                });
            }
        }

        function update_ruang(){
            $('#formRuangan').submit();
            var data = $('#formRuangan').serializeArray();
            var id = $('input[name=id]').val();

            data = jQuery.grep(data, function(value) {
              return value['name'] != 'id';
            });

            var hasErr = $('#formRuangan').find(".has-error").length;

            if (hasErr == 0) {
                jQuery.ajax({
                    type: "POST",
                    url: "<?php echo base_url() ?>"+"admin/manajemen",
                    dataType: 'JSON',
                    data: {manajemen:'update',form:'ruang',id:id,data:data},
                    success: function(res) {
                            if(res){
                                Swal.fire(
                                      'Berhasil!',
                                      'Ruangan berhasil diubah',
                                      'success'
                                    )
                                    setTimeout(function(){location.reload(); },500);
                            }
                        }
                });
            }
        }
        
        $("#submitBtn").click(function (){
              var ButtonText = $.trim($(this).text());
              if (ButtonText == "Simpan") {
                tambah_ruang();
              }else 
              if(ButtonText == "Update"){
                update_ruang();
              }
         })

        function prodiFormatter(val){
          return val ? val:'-';
        }
        
        function aksiFormatter(val){
            return ["<button data-toggle='tooltip' title='Ubah' class='ubah btn btn-warning btn-sm'>",
                    "<i class='fas fa-pencil-alt'></i>",
                    "</button>",
                    "<button data-toggle='tooltip' title='Hapus' class='hapus btn btn-danger btn-sm'>",
                    "<i class='fas fa-trash'></i>",
                    "</button>"].join(' ');
        }
        
        function indexFormatter(val,row,index){
            return index+1;
        }

        window.aksiEvents = {
            'click .ubah': function (e, value, row, index) {
                $('#formRuangan').bootstrapValidator('resetForm', true);
                $('#formRuangan').trigger("reset");

                $('#tambahModal').modal();
                $('#myModalLabel').html("Ubah Ruangan");

                $('input[name=id]').val(row.id);
                $('input[name=nama]').val(row.nama);
                // $('select[name=jenis]').val(row.jenis);
                $('select[name=id_prodi]').val(row.id_prodi);

                // if (row.jenis == "LABORATORIUM") {
                //   $('#inputProdi').show();
                //   $('#formRuangan').bootstrapValidator('enableFieldValidators','id_prodi', true, 'notEmpty');
                // }else{
                //   $('#inputProdi').hide();
                //   $('#formRuangan').bootstrapValidator('enableFieldValidators','id_prodi', false, 'notEmpty');
                // }

                $('#submitBtn').html('<span class="text">Update</span>');
            },
            'click .hapus': function (e, value, row, index) {
                swal.fire({
                    title: "Warning",
                    text: "Anda yakin untuk menghapus "+row.nama+" ?",
                    icon: 'warning',
                    showCancelButton: true,
                    showCloseButton: false,
                    cancelButtonColor: '#001473',
                    confirmButtonColor: '#d33',
                    confirmButtonText: 'Ya',
                    cancelButtonText: 'Batal'
                }).then(function(res){
                    if(res.value){
                        jQuery.ajax({
                            type: "POST",
                            url: "<?php echo base_url() ?>"+"admin/manajemen",
                            dataType: "JSON",
                            data: {manajemen:"hapus",form:'ruang',id:row.id},
                            success: function(res){
                                if (res === true) {
                                    Swal.fire(
                                      'Berhasil!',
                                      'Ruangan berhasil dihapus',
                                      'success'
                                    )
                                    setTimeout(function(){location.reload(); },500);
                                }
                            }
                        });
                    }
                });
            }
        }
      </script>
</body>

</html>
