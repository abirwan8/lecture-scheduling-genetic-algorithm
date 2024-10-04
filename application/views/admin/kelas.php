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
  <link rel="stylesheet" href="<?php echo base_url('assets/vendor/selectize/selectize.default.css');?>">
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
									<h5 class="font-weight-bold">Kelas D3 Teknik Informatika PSDKU</h5>
									<p class="text-muted">Pengelolaan data kelas D3 TI PSDKU</p>
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
													<input class="form-control" id="searchInput" type="text" placeholder="Cari data kelas" />
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
                        <th data-field="kelas" data-visible="false">kelas</th>
                        <th data-field="nama" class="font-14  text-center">Nama Kelas</th>
                        <th data-field="tahun_angkatan" class="font-14  text-center">Tahun Angkatan</th>
                        <!-- <th data-field="jenis" class="font-14  text-center">Jenis</th> -->
                        <!-- <th data-field="programstudi" data-formatter="prodiFormatter" class="font-14 text-center">Program Studi</th> -->
                        <th data-field="aksi" data-formatter="aksiFormatter" data-events="window.aksiEvents" class="font-14 text-center">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                        foreach ($data as $key => $value) {
                          $kelas = json_decode($value['nama'],true);
                          echo "<tr>
                                  <td></td>
                                  <td>$value[id]</td>
                                  <td>$value[id_prodi]</td>
                                  <td>".json_encode($kelas)."</td>
                                  <td>".implode(', ', $kelas)."</td>
                                  <td>$value[tahun_angkatan]</td>
                               
                                  
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
                  <h5 class="modal-title" id="myModalLabel">Tambah Kelas</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form id="formKelas">
                    <input type="hidden" name="id">
                    <input type="hidden" id="defaultTahun_Angkatan">
                    <input type="hidden" id="defaultJenis">
                    <input type="hidden" id="defaultProgramStudi">
                    <div class="form-group row">
											<div class="col-sm-12">
												<label for="inputNama" class="col-form-label">Nama Kelas</label>
                        <!-- <select class="selectpicker form-control" data-style="btn-outline-secondary" id="inputNama" name="nama" multiple data-max-options="1">
                          
                        </select> -->
                        <input type="text" name="nama" id="inputNama" placeholder="Masukkan nama kelas" data-bv-notempty="true" data-bv-notempty-message="Nama kelas tidak boleh kosong">
                      </div>
                    </div>

                    <div class="form-group row">
											<div class="col-sm-12">
												<label for="inputTahunAngkatan" class="col-form-label">Tahun Angkatan</label>
                        <input type="text" class="form-control" id="inputTahunAngkatan" name="tahun_angkatan" placeholder="Tahun Angkatan" maxlength="4">
                      </div>
                    </div>

                    <div class="form-group row">
											<div class="col-sm-12">
												<label for="selectJenis" class="col-form-label">Jenis</label>
                        <select class="form-control" id="selectJenis" name="jenis">
                          <option value="REGULER">REGULER</option>
                          <option value="NONREGULER">NONREGULER</option>
                        </select>
                      </div>
                    </div>

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
                <div class="modal-footer">
                  <button class="btn bg-biru text-white" id="submitBtn">
                    Simpan
                  </button>
                </div>
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
      <script src="<?php echo base_url('assets/vendor/selectize/selectize.js'); ?>"></script>

      <script type="text/javascript">
        var dataKelas = <?php echo json_encode($data); ?>;

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

          $('#formKelas').bootstrapValidator({
                message: 'This value is not valid',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'fas fa-exclamation-circle',
                validating: 'glyphicon glyphicon-refresh'
            },
            excluded: ':disabled',
            fields: {
                    tahun_angkatan: {
                      message: 'Tahun Angkatan tidak valid',
                        validators: {
                            notEmpty: {
                                message: 'Tahun Angkatan tidak boleh kosong'
                            },
                            regexp: {
                                regexp: /^([0-9][0-9][0-9][0-9])$/,
                                message: 'Tahun Angkatan tidak valid'
                            }
                        }
                    },
                    nama: {
                      message: 'Nama kelas tidak valid',
                        validators: {
                          callback: {
                              callback: function(value, validator, $fields){
                                if($('input[name=nama]').val() == "") {
                                    return true;
                                }else{
                                  if ($('#defaultTahun_Angkatan').val() == $('input[name=tahun_angkatan]').val() && $('#defaultJenis').val() == $('select[name=jenis]').val()  && $('#defaultProgramStudi').val() == $('select[name=id_prodi]').val()) {
                                    return true; 
                                  }else{
                                    for (var i = 0; i < dataKelas.length; i++) {
                                      if (dataKelas[i].tahun_angkatan == $('input[name=tahun_angkatan]').val() && dataKelas[i].jenis == $('select[name=jenis]').val() && dataKelas[i].id_prodi == $('select[name=id_prodi]').val()) {
                                        return{
                                          return: false,
                                          message: 'Data kelas untuk tahun angkatan, jenis & program studi ini sudah ada'
                                        }
                                      }
                                    }
                                  } //
                                  
                                }
                                  return true;
                              }
                            }
                        }
                    }
                  }
          })
        })

        var $selectz = $('#inputNama').selectize({   
            persist: true,
            plugins: ['remove_button'],
            create: function(input) {
              return {
                value: input.toUpperCase(),
                text: input.toUpperCase() 
              }
            }
          })

        $('#formKelas').change(function(){
          $('#formKelas').bootstrapValidator('updateStatus', 'nama', 'VALIDATING')
                      .bootstrapValidator('validateField', 'nama');
        })

        $('#formKelas').submit(function() {
            return false;
        });

        function setModalTambah(){
            $('#formKelas').bootstrapValidator('resetForm', true);
            $('#formKelas').trigger("reset");

            $('#tambahModal').modal();
            $('#myModalLabel').html("Tambah Kelas");

            $('#submitBtn').html('<span class="icon text-white-50"></span><span class="text">Simpan</span>');
        }

        function tambah_kelas(){
            $('#formKelas').submit();
            $('#formKelas').bootstrapValidator('updateStatus', 'nama', 'VALIDATING')
                      .bootstrapValidator('validateField', 'nama');

            var data = $('#formKelas').serializeArray();

            data = jQuery.grep(data, function(value) {
              return value['name'] != 'id' && value['name'] != 'nama';
            });

            namakelas = {'name':'nama','value':JSON.stringify($selectz[0].selectize.items)};

            data.push(namakelas);

            var hasErr = $('#formKelas').find(".has-error").length;

            if (hasErr == 0) {
                jQuery.ajax({
                    type: "POST",
                    url: "<?php echo base_url() ?>"+"admin/manajemen",
                    dataType: 'JSON',
                    data: {manajemen:'tambah',form:'kelas',data:data},
                    success: function(res) {
                            if(res){
                                Swal.fire(
                                      'Berhasil!',
                                      'Kelas berhasil ditambahkan',
                                      'success'
                                    )
                                    setTimeout(function(){location.reload(); },500);
                            }
                        }
                });
            }
        }

        function update_kelas(){
            $('#formKelas').submit();
            var data = $('#formKelas').serializeArray();
            var id = $('input[name=id]').val();

            data = jQuery.grep(data, function(value) {
              return value['name'] != 'nama' && value['value'] != '';
            });

            namakelas = {'name':'nama','value':JSON.stringify($selectz[0].selectize.items)};

            data.push(namakelas);

            var hasErr = $('#formKelas').find(".has-error").length;

            if (hasErr == 0) {
                jQuery.ajax({
                    type: "POST",
                    url: "<?php echo base_url() ?>"+"admin/manajemen",
                    dataType: 'JSON',
                    data: {manajemen:'update',form:'kelas',id:id,data:data},
                    success: function(res) {
                            if(res){
                                Swal.fire(
                                      'Berhasil!',
                                      'Kelas berhasil diubah',
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
                tambah_kelas();
              }else 
              if(ButtonText == "Update"){
                update_kelas();
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
                $('#formKelas').bootstrapValidator('resetForm', true);
                $('#formKelas').trigger("reset");

                $('#tambahModal').modal();
                $('#myModalLabel').html("Ubah Kelas");

                $('input[name=id]').val(row.id);

                var data_kelas = [];
                $.each(jQuery.parseJSON(row.kelas), function( index, value ) {
                  $selectz[0].selectize.addOption({value:value,text:value});
                  data_kelas.push(value);
                })
                $selectz[0].selectize.setValue(data_kelas);

                // $('#formKelas').bootstrapValidator('enableFieldValidators','nama', false, 'callback')

                $('input[name=tahun_angkatan]').val(row.tahun_angkatan);
                $('select[name=jenis]').val(row.jenis);
                $('select[name=id_prodi]').val(row.id_prodi);

                $('input[id=defaultTahun_Angkatan]').val(row.tahun_angkatan);
                $('input[id=defaultJenis]').val(row.jenis);
                $('input[id=defaultProgramStudi]').val(row.id_prodi);

                $('#submitBtn').html('<span class="icon text-white-50"><i class="fas fa-edit"></i></span><span class="text">Update</span>');
            },
            'click .hapus': function (e, value, row, index) {
                swal.fire({
                    title: "Warning",
                    text: "Anda yakin untuk menghapus Kelas "+row.nama+" Angkatan "+row.tahun_angkatan+"?",
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
                            data: {manajemen:"hapus",form:'kelas',id:row.id},
                            success: function(res){
                                if (res === true) {
                                    Swal.fire(
                                      'Berhasil!',
                                      'Kelas berhasil dihapus',
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
