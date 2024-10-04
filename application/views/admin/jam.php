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
  <link rel="stylesheet" href="<?php echo base_url('assets/vendor/gijgo/gijgo.css');?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/vendor/bootstrap-select/css/bootstrap-select.min.css');?>">
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
									<h5 class="font-weight-bold">Jam D3 Teknik Informatika PSDKU</h5>
									<p class="text-muted">Pengelolaan data jam D3 TI PSDKU</p>
									<div class="row">
										<div class="col-6">
											<button class="btn bg-biru" onclick="setModalGenerate();">
												<i class="fas fa-plus text-white"></i>
												<span class="text text-white">Tambah Data</span>
											</button>
										</div>
										<div class="col-6">
											<div class="input-group">
													<span class="input-group-text"><i class="text-secondary fa-solid fa-magnifying-glass"></i></span>
													<input class="form-control" id="searchInput" type="text" placeholder="Cari data jam" />
											</div>
										</div>
									</div>

									<div class="table-responsive table-striped table-hover">
                  <table class="table align-items-center table-flush mt-3" id="table" data-toggle="table" data-click-to-select="true"  data-pagination="true">
                    <thead class="text-dark text-center">
                      <tr>
                        <th data-field="id" class="font-14 text-center">ID</th>
                        <th data-field="range_jam" class="font-14 text-center">Jam</th>
                        <th data-field="waktu_sholat" data-formatter="waktuSholatFormatter" class="font-14 text-center">Waktu Sholat</th>
                        <th data-field="aksi" data-formatter="aksiFormatter" data-events="window.aksiEvents" class="text-center">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                      $id=[];
                      $range_jam=[];
                        foreach ($data as $key => $value) {
                          $id[] = $value['id'];
                          $range_jam[] = explode('-', $value['range_jam']);
                          echo "<tr>
                                  <td>$value[id]</td>
                                  <td>$value[range_jam]</td>
                                  <td>$value[waktu_sholat]</td>
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
          <div class="modal fade" id="generateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="myModalLabel">Generate Jam</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form id="formGenerateJam">
                    <div class="form-group row">
											<div class="col-sm-12">
												<label for="inputJamMulai" class="col-form-label">Jam Mulai</label>
                        <input type="time" class="form-control" id="generateJamMulai" name="jamMulai" placeholder="Jam Mulai" data-bv-notempty="true" data-bv-notempty-message="Jam Mulai tidak boleh kosong">
                      </div>
                    </div>
                    <div class="form-group row">
											<div class="col-sm-12">
												<label for="inputJamSelesai" class="col-form-label">Jam Selesai</label>
                        <input type="time" class="form-control" id="generateJamSelesai" name="jamSelesai" placeholder="Jam Selesai" data-bv-notempty="true" data-bv-notempty-message="Jam Selesai tidak boleh kosong">
                      </div>
                    </div>
                    <div class="form-group row">
											<div class="col-sm-12">
												<label for="totalWaktuSKS" class="col-form-label">Total Waktu Per SKS</label>
                        <input type="number" class="form-control" id="generateJamSKS" name="jamSKS" placeholder="Waktu Per SKS (menit)" data-bv-notempty="true" data-bv-notempty-message="Waktu Per SKS tidak boleh kosong">
                      </div>
                    </div>
                  </form>
                </div>
                <div class="modal-footer d-flex">
									<button type="button" class="btn btn-outline-secondary flex-fill" data-dismiss="modal">Tutup</button>
                  <button class="btn bg-biru flex-fill" id="submitBtnGenerate">
                    <span class="text-white">Generate</span>
                  </button>
                </div>
              </div>
            </div>
          </div>

            <!-- Modal -->
          <div class="modal fade" id="ubahModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="myModalLabel">Ubah Jam</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form id="formJam">
                    <input type="hidden" id="defaultID">
                    <input type="hidden" id="defaultJam_Mulai">
                    <input type="hidden" id="defaultJam_Selesai">
                    <div class="form-group row">
											<div class="col-sm-12">
												<label for="inputId" class="col-form-label">ID</label>
                        <input type="text" class="form-control" id="inputId" name="id" placeholder="ID" data-container="body" data-toggle="popover" title="Perhatikan ID yang anda input" data-placement="left" data-content="Urutan Jam ditentukan berdasarkan ID" maxlength="2" min="1">
                      </div>
                    </div>
                    <div class="form-group row">
											<div class="col-sm-12">
												<label for="inputJamMulai" class="col-form-label">Jam Mulai</label>
                        <input type="text" class="form-control" onclick="$inputJamMulai.open();" id="inputJamMulai" name="jam_mulai" placeholder="Jam Mulai" data-bv-notempty="true" data-bv-notempty-message="Jam Mulai tidak boleh kosong">
                      </div>
                    </div>
                    <div class="form-group row">
											<div class="col-sm-12">
												<label for="inputJamSelesai" class="col-form-label">Jam Selesai</label>
                        <input type="text" class="form-control" onclick="$inputJamSelesai.open();" id="inputJamSelesai" name="jam_selesai" placeholder="Jam Selesai" data-bv-notempty="true" data-bv-notempty-message="Jam Selesai tidak boleh kosong">
                      </div>
                    </div>
                    <div class="form-group row">
											<div class="col-sm-12">
												<label for="inputWaktuSholat" class="col-form-label">Waktu Sholat</label>
                        <select class="selectpicker form-control" data-style="btn-outline-secondary" id="inputWaktuSholat" name="waktu_sholat" title="Pilih Waktu Sholat" multiple>
                          <option value="dzuhur">Sholat Dzuhur</option>
                          <option value="ashar">Sholat Ashar</option>
                          <option value="jumat">Sholat Jumat</option>
                        </select>
                      </div>
                    </div>
                  </form>
                </div>
								<div class="modal-footer d-flex">
									<button type="button" class="btn btn-outline-secondary flex-fill" data-dismiss="modal">Tutup</button>
                  <button class="btn bg-biru text-white flex-fill" id="submitBtn">
                    <span class="text">Simpan</span>
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
      <script src="<?php echo base_url('assets/vendor/bootstrap-select/js/bootstrap-select.js'); ?>"></script>
      <script src="<?php echo base_url('assets/vendor/bootstrap-validator/js/bootstrapValidator.min.js'); ?>"></script>
      <script src="<?php echo base_url('assets/vendor/sweetalert2/sweetalert2.all.min.js'); ?>"></script>
      <script src="<?php echo base_url('assets/vendor/gijgo/gijgo.js') ?>" type="text/javascript"></script>   

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

					
          var id = <?php echo json_encode($id) ?>;
          var range_jam = <?php echo json_encode($range_jam) ?>;

          $('#formGenerateJam').bootstrapValidator({
                message: 'This value is not valid',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'fas fa-exclamation-circle',
                validating: 'glyphicon glyphicon-refresh'
            },
            excluded: ':disabled',
          })

          $('#formJam').bootstrapValidator({
                message: 'This value is not valid',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'fas fa-exclamation-circle',
                validating: 'glyphicon glyphicon-refresh'
            },
            excluded: ':disabled',
            fields: {
                    id: {
                      message: 'ID tidak valid',
                        validators: {
                            notEmpty: {
                                message: 'ID tidak boleh kosong'
                            },
                            regexp: {
                                regexp: /^[0-9]+$/,
                                message: 'ID tidak valid'
                            },
                            callback: {
                              callback: function(value, validator, $fields){
                                if (value == '') {
                                    return true;
                                  }

                                if (value == $('input[id=defaultID]').val()) {
                                  return true;
                                }else
                                if (jQuery.inArray(value,id) >= 0) {
                                  return{
                                    return: false,
                                    message: 'ID sudah digunakan'
                                  }
                                }
                                  return true;
                              }
                            }
                        }
                    },
                    jam_mulai: {
                        message: 'Jam Mulai tidak valid',
                        validators: {
                            regexp: {
                                regexp: /^([0-1][0-9]|[2][0-3]):([0-5][0-9])$/,
                                message: 'Jam Mulai tidak valid'
                            },
                            callback: {
                              callback: function(value, validator, $fields){
                                var regextime = /^([0-1][0-9]|[2][0-3]):([0-5][0-9])$/;
                                if (value == '') {
                                    return true;
                                  }

                                if (regextime.test(value)) {
                                    if ($('input[id=defaultJam_Mulai]').val() <= value && $('input[id=defaultJam_Selesai]').val() > value) {
                                      return true;
                                    }else{
                                    for (var i = 0; i < range_jam.length; i++) {
                                        if (range_jam[i][0] <= value && range_jam[i][1] > value) {
                                          return{
                                            return: false,
                                            message: 'Range jam sudah digunakan'
                                          }
                                        }
                                      }
                                    }
                                  }

                                return true;
                              }
                            }
                        }
                    },
                    jam_selesai: {
                        message: 'Jam Selesai tidak valid',
                        validators: {
                            regexp: {
                                regexp: /^([0-1][0-9]|[2][0-3]):([0-5][0-9])$/,
                                message: 'Jam Selesai tidak valid'
                            },
                            callback: {
                                callback: function(value, validator, $fields){
                                  var regextime = /^([0-1][0-9]|[2][0-3]):([0-5][0-9])$/;

                                  if (value == '') {
                                    return true;
                                  }
                                  if (regextime.test($('input[name=jam_selesai]').val()) && $('input[name=jam_mulai]').val() >= value) {
                                    return{
                                      return: false,
                                      message: 'Jam Selesai harus lebih besar dari Jam Mulai'
                                    }
                                  }
                                  return true;
                                }
                            }
                        }
                    }
                }
          })
        })

        $('#formGenerateJam').submit(function() {
            return false;
        });

        var $inputJamMulai = $('#inputJamMulai').timepicker({ modal: false, header: false, footer: false, mode: '24hr',uiLibrary: 'bootstrap', select: function (e, type) {
            if (type == 'minute') {
               $('#formJam').bootstrapValidator('updateStatus', 'jam_mulai', 'VALIDATING')
                      .bootstrapValidator('validateField', 'jam_mulai');
              if ($('input[name=jam_selesai]').val() !== '') {
                $('#formJam').bootstrapValidator('updateStatus', 'jam_selesai', 'VALIDATING')
                    .bootstrapValidator('validateField', 'jam_selesai');
              }
            }
         } });
        var $inputJamSelesai = $('#inputJamSelesai').timepicker({ modal: false, header: false, footer: false, mode: '24hr',uiLibrary: 'bootstrap', select: function (e, type) {
          if (type == 'minute') {
             $('#formJam').bootstrapValidator('updateStatus', 'jam_selesai', 'VALIDATING')
                    .bootstrapValidator('validateField', 'jam_selesai');
          }
         }
       });

        $('#formJam').submit(function() {
            return false;
        });

        function setModalGenerate(){
            $('#formGenerateJam').bootstrapValidator('resetForm', true);
            $('#formGenerateJam').trigger("reset");

            $('#generateModal').modal();
            $('#myModalLabel').html("Generate Jam");

            $('#submitBtnGenerate').html('<span class="icon text-white">Generate</span>');
        }

        function tambah_mk(){
            $('#formJam').submit();
            var data = $('#formJam').serializeArray();

            jam_mulai = jQuery.grep(data, function(value) {
              return value['name'] == 'jam_mulai';
            });
            jam_mulai = jam_mulai[0]['value'];

            jam_selesai = jQuery.grep(data, function(value) {
              return value['name'] == 'jam_selesai';
            });
            jam_selesai = jam_selesai[0]['value'];

            range_jam = {'name':'range_jam','value':jam_mulai+'-'+jam_selesai};

            data = jQuery.grep(data, function(value) {
              return value['name'] != 'jam_mulai' && value['name'] != 'jam_selesai';
            });

            data.push(range_jam);

            var hasErr = $('#formJam').find(".has-error").length;

            if (hasErr == 0) {
                jQuery.ajax({
                    type: "POST",
                    url: "<?php echo base_url() ?>"+"admin/manajemen",
                    dataType: 'JSON',
                    data: {manajemen:'tambah',form:'jam',data:data},
                    success: function(res) {
                            if(res){
                                Swal.fire(
                                      'Berhasil!',
                                      'Jam berhasil ditambahkan',
                                      'success'
                                    )
                                    setTimeout(function(){location.reload(); },500);
                            }
                        }
                });
            }
        }

        function update_mk(){
            $('#formJam').submit();
            var data = $('#formJam').serializeArray();
            var id = $('input[id=defaultID]').val();

            jam_mulai = jQuery.grep(data, function(value) {
              return value['name'] == 'jam_mulai';
            });
            jam_mulai = jam_mulai[0]['value'];

            jam_selesai = jQuery.grep(data, function(value) {
              return value['name'] == 'jam_selesai';
            });
            jam_selesai = jam_selesai[0]['value'];

            range_jam = {'name':'range_jam','value':jam_mulai+'-'+jam_selesai};

            data = jQuery.grep(data, function(value) {
              return value['name'] != 'jam_mulai' && value['name'] != 'jam_selesai' && value['name'] != 'waktu_sholat';
            });

            data.push(range_jam);

            const waktuSholat = {name: 'waktu_sholat', value: $('select[name=waktu_sholat]').val() == "" ? "" : JSON.stringify($('select[name=waktu_sholat]').val())};

            data.push(waktuSholat);

            var hasErr = $('#formJam').find(".has-error").length;

            if (hasErr == 0) {
                jQuery.ajax({
                    type: "POST",
                    url: "<?php echo base_url() ?>"+"admin/manajemen",
                    dataType: 'JSON',
                    data: {manajemen:'update',form:'jam',id:id,data:data},
                    success: function(res) {
                            if(res){
                                Swal.fire(
                                      'Berhasil!',
                                      'Jam berhasil diubah',
                                      'success'
                                    )
                                    setTimeout(function(){location.reload(); },500);
                            }
                        }
                });
            }
        }

        $('#submitBtnGenerate').click(function(event) {
            $('#formGenerateJam').submit();
            var data = $('#formGenerateJam').serializeArray();

            var hasErr = $('#formGenerateJam').find(".has-error").length;

            if (hasErr == 0) {
                jQuery.ajax({
                    type: "POST",
                    url: "<?php echo base_url() ?>"+"admin/generateJam",
                    dataType: 'JSON',
                    data: {data:data},
                    success: function(res) {
                          if(res[0]){
                              Swal.fire(
                                    'Berhasil!',
                                    res[1],
                                    'success'
                                  )
                                  setTimeout(function(){location.reload(); },500);
                          }else{
                            Swal.fire(
                                    'Gagal!',
                                    res[1],
                                    'error'
                                  )
                          }
                        },
                    error : function(jqXHR, textStatus, errorThrown){
                      console.log(jqXHR.responseText);
                        console.log(textStatus);
                    }
                });
            }
        });
        
        $("#submitBtn").click(function (){
              var ButtonText = $.trim($(this).text());
              if (ButtonText == "Simpan") {
                tambah_mk();
              }else 
              if(ButtonText == "Update"){
                update_mk();
              }
         })
  
        function waktuSholatFormatter(val){
          const waktuSholat = val ? JSON.parse(val) : '-';

          return waktuSholat;
        }

        function aksiFormatter(val){
            return ["<button data-toggle='tooltip' title='Ubah' class='ubah btn btn-warning btn-sm'>",
                    "<i class='fas fa-pencil-alt'></i>",
                    "</button>",
                    "<button data-toggle='tooltip' title='Hapus' class='hapus btn btn-danger btn-sm'>",
                    "<i class='fas fa-trash'></i>",
                    "</button>"].join(' ');
        }

        window.aksiEvents = {
            'click .ubah': function (e, value, row, index) {
                $('#formJam').bootstrapValidator('resetForm', true);
                $('#formJam').trigger("reset");

                $('#ubahModal').modal();
                $('#myModalLabel').html("Form Ubah Jam");

                $('input[name=id]').val(row.id);
                range_jam = row.range_jam.split('-');
                $('input[name=jam_mulai]').val(range_jam[0]);
                $('input[name=jam_selesai]').val(range_jam[1]);

                const waktuSholat = row.waktu_sholat != '' ? JSON.parse(row.waktu_sholat) : '';
                $('select[name=waktu_sholat]').val(waktuSholat);

                $('select[name=waktu_sholat]').selectpicker('refresh');

                $('input[id=defaultID]').val(row.id);
                $('input[id=defaultJam_Mulai]').val(range_jam[0]);
                $('input[id=defaultJam_Selesai]').val(range_jam[1]);

                $('#submitBtn').html('<span class="icon text-white"></span><span class="text">Update</span>');
            },
            'click .hapus': function (e, value, row, index) {
                swal.fire({
                    title: "Warning",
                    text: "Anda yakin untuk menghapus "+row.range_jam+" ?",
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
                            data: {manajemen:"hapus",form:'jam',id:row.id},
                            success: function(res){
                                if (res === true) {
                                    Swal.fire(
                                      'Berhasil!',
                                      'Jam berhasil dihapus',
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
