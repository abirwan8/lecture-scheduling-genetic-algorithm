<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="<?php echo base_url('assets/img/logo/logo.png'); ?>" rel="icon">
  <title>Sistem Penjadwalan Perkuliahan D3 Teknik Informatika PSDKU</title>
  <link href="<?php echo base_url('assets/vendor/fontawesome-free/css/all.min.css');  ?>" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url('assets/vendor/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet" type="text/css">
  <!-- <link href="<?php echo base_url('assets/css/ruang-admin.min.css'); ?>" rel="stylesheet"> -->
  <link href="<?php echo base_url('assets/css/ruang-admin.css'); ?>" rel="stylesheet">
  <link href="<?php echo base_url('assets/vendor/bootstrap-table/bootstrap-table.min.css'); ?>" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo base_url('assets/vendor/bootstrap-validator/css/bootstrapValidator.min.css');?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/vendor/sweetalert2/sweetalert2.css');?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/vendor/bootstrap-select/css/bootstrap-select.min.css');?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/vendor/gijgo/gijgo.css');?>">
  <link href="<?php echo base_url('assets/vendor/select2/select2.min.css') ?>" rel="stylesheet" />
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

  <style type="text/css">
    .form-control-placeholder {
			position: absolute;
			top: 0;
			padding: 7px 0 0 13px;
			transition: all 200ms;
			opacity: 0.5;
		}

		.form-control:focus + .form-control-placeholder,
		.form-control:valid + .form-control-placeholder {
			font-size: 75%;
			transform: translate3d(0, -100%, 0);
			opacity: 1;
		}
  </style>
</head>

<body id="page-top">
  <?php $this->load->view('admin/header'); ?>
        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">

          <div class="row">
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header mt-2 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="font-weight-bold pl-3">GENERATE JADWAL KULIAH</h6>
                </div>
                <div class="card-body" style="margin-top: -22px;">
                <div class="table-responsive px-3">
										<form id="formBuatJadwal">
											<div class="form-group row">
												<div class="row col-sm-12">
													<div class="col-sm-3">
														<select class="selectpicker form-control" data-style="btn-outline-secondary" id="inputJenisSemester" name="jenis_semester" data-bv-notempty="true" data-bv-notempty-message="Jenis Semester belum dipilih" title="- Pilih Jenis Semester -">
															<option value="0">GENAP</option>
															<option value="1">GANJIL</option>
														</select>
													</div>
													<div class="col-sm-3">
														<select class="selectpicker form-control" data-style="btn-outline-secondary" id="inputTahunAkademik" name="tahun_akademik" data-bv-notempty="true" data-bv-notempty-message="Tahun Akademik belum dipilih" multiple data-max-options="1" title="- Pilih Tahun Akademik -">
															<?php
																foreach ($dataTahunAkademik as $key => $value) {
																	echo "<option>$value[tahun_akademik]</option>";
																}
															?>
														</select>
													</div>
													<div class="col-sm-3">
                            <input type="text" name="name"  class="form-control border-secondary" data-style="btn-outline-secondary" id="inputNama" data-bv-notempty="true" data-bv-notempty-message="Nama belum diisi" placeholder="Nama Jadwal" style="height: 2.5rem !important">
													</div>
												</div>
											</div>
										</form>

										<button class="btn bg-biru" id="submitBtn">
											<span class="icon text-white">
												<i class="fa-solid fa-paper-plane mr-2"></i>
											</span>
											<span class="text text-white">Proses</span>
										</button>
                </div>
              </div>
            </div>
          </div>
        </div>

          <div class="row">
          <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header pt-4 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="pl-3 font-weight-bold">RIWAYAT GENERATE JADWAL</h6>
                </div>
                <div class="card-body" style="margin-top: -22px;">
                  
								<div class="input-group p-3">
									<span class="input-group-text"><i class="text-secondary fa-solid fa-magnifying-glass"></i></span>
									<input class="form-control" id="searchInputs" type="text" placeholder="Cari data riwayat jadwal" />
								</div>

                <div class="table-responsive table-striped table-hover table-responsive p-3">
                  <table class="table align-items-center table-flush" id="tables" data-toggle="table" data-pagination="true" data-page-size="20" data-page-list="[10, 25, 50, 100, ALL]" data-click-to-select="true" data-row-style="rowStyle">
                    <thead class="text-dark text-center">
                      <tr>
                        <th data-field="no" data-formatter="indexFormatter" class="font-14 text-center">#</th>
                        <th data-field="id" data-visible="false">id</th>
                        <th data-field="name" class="font-14 text-center" >Nama Jadwal</th>
                        <th data-field="status" class="font-14 text-center">Status</th>
                        <th data-field="aksi" data-formatter="aksiFormatters" data-events="window.aksiEvents" class="text-center">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                         foreach ($jadwal as $key => $value) {
                           echo "<tr>
                                   <td></td>
                                   <td>$value[id]</td>
                                   <td>$value[name]</td>
                                   <td>$value[status]</td>                                  
                                 </tr>";
                         }
                      ?>
                    </tbody>
                  </table>
                </div>
                </div>
              </div>
            </div><div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header pt-4 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="pl-3 font-weight-bold">JADWAL KULIAH</h6>
                </div>
                <div class="card-body" style="margin-top: -22px;">
                  <form class="form-inline px-3" id="filterTable">
                    <div class="form-group" id="inputdataFilter">
                      <select class="selectpicker form-control" data-style="btn-outline-secondary" name="dataFilters" multiple data-max-options="1">

                      </select>
                    </div>
                    &nbsp;&nbsp;&nbsp;
                    <div class="form-group form-inline">
                      <select class="selectpicker form-control" data-style="btn-outline-secondary" id="inputFilter" name="filter" multiple data-max-options="1" title="Filter Tabel Jadwal Kuliah">
                          <!-- <option value="programstudi">Program Studi</option> -->
                          <option value="nama_mk">Matakuliah</option>
                          <option value="dosen">Dosen</option>
                          <option value="kelas">Kelas</option>
                        </select>
                    </div>
                    &nbsp;&nbsp;&nbsp;
                    <div class="form-group" id="inputdataFilter">
                      <select class="selectpicker form-control" data-style="btn-outline-secondary" name="dataFilter" multiple data-max-options="1" data-live-search="true">

                      </select>
                    </div>
                    &nbsp;&nbsp;&nbsp;
                    <button class="btn btn-warning" id="bentrokBtn">
                      <span class="icon text-white">
												<i class="fa-solid fa-triangle-exclamation mr-2"></i>
                      </span>
                      <span class="text">Cek Jadwal Bentrok</span>
                    </button>
                    &nbsp;&nbsp;&nbsp;
                    <button class="btn btn-danger" id="hapusBtn">
                      <span class="icon text-white">
                        <i class="fas fa-trash mr-2"></i>
                      </span>
                      <span class="text">Hapus Jadwal Kuliah</span>
                    </button>
                    &nbsp;&nbsp;&nbsp;
                    <button class="btn btn-success" onclick="cetakClick()">
                    <span class="icon text-white mr-2">
                      <i class="fas fa-print"></i>
                    </span>
                    <span class="text">Cetak</span>
                  </button>
                  </form>

								<div class="input-group p-3">
									<span class="input-group-text"><i class="text-secondary fa-solid fa-magnifying-glass"></i></span>
									<input class="form-control" id="searchInput" type="text" placeholder="Cari data jadwal" />
								</div>

                <div class="table-responsive table-striped table-hover table-responsive p-3">
                  <table class="table align-items-center table-flush" id="table" data-toggle="table" data-pagination="true" data-page-size="20" data-page-list="[10, 25, 50, 100, ALL]" data-click-to-select="true" data-row-style="rowStyle">
                    <thead class="text-dark text-center">
                      <tr>
                        <th data-field="no" data-formatter="indexFormatter" class="font-14 text-center">#</th>
                        <th data-field="id" data-visible="false">id</th>
                        <th data-field="nama_jadwal" class="font-14" >Nama Jadwal</th>
                        <th data-field="id_hari"  data-visible="false">id hari</th>
                        <th data-field="id_jam"  data-visible="false">id jam</th>
                        <th data-field="id_pengampu"  data-visible="false">id pengampu</th>
                        <th data-field="id_ruang"  data-visible="false">id ruang</th>
                        <th data-field="tahun_angkatan" data-visible="false">tahun angkatan</th>
                        <th data-field="hari" class="font-14">Hari</th>
                        <th data-field="jam_kuliah" class="font-14">Jam</th>
                        <th data-field="nama_mk" class="font-14">Matakuliah</th>
                        <th data-field="sks" class="font-14">SKS</th>
                        <th data-field="semester" class="font-14">Semester</th>
                        <th data-field="kelas" class="font-14">Kelas</th>
                        <th data-field="dosen" class="font-14">Dosen</th>
                        <th data-field="ruang" class="font-14">Ruangan</th>
                        <th data-field="aksi" data-formatter="aksiFormatter" data-events="window.aksiEvents" class="text-center">Aksi</th>
                        <th data-field="programstudi" data-visible="false" class="font-14">Program Studi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                         foreach ($data as $key => $value) {
                           echo "<tr>
                                   <td></td>
                                   <td>$value[id]</td>
                                   <td>$value[nama_jadwal]</td>
                                   <td>$value[id_hari]</td>
                                   <td>$value[id_jam]</td>
                                   <td>$value[id_pengampu]</td>
                                   <td>$value[id_ruang]</td>
                                   <td>$value[tahun_angkatan]</td>
                                   <td>$value[hari]</td>
                                   <td>$value[jam_kuliah]</td>
                                   <td>$value[nama_mk]</td>
                                   <td>$value[sks]</td>
                                   <td>$value[semester]</td>
                                   <td>$value[kelas]</td>
                                   <td>$value[dosen]</td>
                                   <td>$value[ruang]</td>
                                   <td>$value[programstudi]</td>
                                  
                                 </tr>";
                         }
                      ?>
                    </tbody>
                  </table>
                </div>
                </div>
              </div>
            </div>

    <div class="modal fade" id="myBentrok" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Cek Jadwal Bentrok</h4>
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                </div>
                <div class="modal-body">
									<div class="table-responsive table-striped table-hover">
										<table id="tableBentrok">
											<thead class="bg-biru text-center">                        
											</thead>
										</table>
									</div>
                </div>

                <div class="modal-footer">
                  <button class="btn bg-biru" data-dismiss="modal">
                    <span class="text text-white">Tutup</span>
                  </button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="myCetak" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Cetak Jadwal</h4>
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                </div>
                <div class="modal-body">
                    <div class="isi-laporan"></div>
                </div>
                <div class="modal-footer">
                    <button class="btn bg-biru" data-dismiss="modal">
                        <span class="text text-white">Tutup</span>
                      </button>
                </div>
            </div>
        </div>
    </div>
		<!-- ini-->
		<div class="modal fade" id="ubahModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="myModalLabel">Ubah Jadwal</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
    <form id="formJadwal">
        <input type="hidden" name="id">
        <div class="form-group row">
            <div class="col-sm-6">
                <label for="selectHari" class="col-form-label">Hari</label>
                <select class="form-control" name="id_hari" id="hari" data-bv-notempty="true" data-bv-notempty-message="Hari harus dipilih">
                    <option value="">- Pilih Hari -</option>
                    <?php 
                        foreach ($dataHari as $value) {
                            echo "<option value='{$value['id']}'>{$value['nama']}</option>";
                        }
                    ?>
                </select>
            </div>
            <div class="col-sm-6">
                <label for="selectJam" class="col-form-label">Jam</label>
                <select class="form-control" name="id_jam" id="jam" data-bv-notempty="true" data-bv-notempty-message="Jam harus dipilih">
                    <option value="">- Pilih Jam -</option>
                    <?php 
                        foreach ($dataJam as $value) {
                            echo "<option value='{$value['id']}'>{$value['range_jam']}</option>";
                        }
                    ?>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-12">
                <label for="selectPengampu" class="col-form-label">Pengampu</label>
                <select class="form-control" name="id_pengampu" id="pengampu" data-bv-notempty="true" data-bv-notempty-message="Pengampu harus dipilih">
                    <option value="">- Pilih Pengampu -</option>
                    <?php 
                        foreach ($dataPengampu as $value) {
                            echo "<option value='{$value['id']}'>{$value['nama']}</option>";
                        }
                    ?>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-6">
                <label for="selectRuang" class="col-form-label">Ruang</label>
                <select class="form-control" name="id_ruang" id="ruang" data-bv-notempty="true" data-bv-notempty-message="Ruang harus dipilih">
                    <option value="">- Pilih Ruang -</option>
                    <?php 
                        foreach ($dataRuang as $value) {
                            echo "<option value='{$value['id']}'>{$value['nama']}</option>";
                        }
                    ?>
                </select>
            </div>
            <div class="col-sm-6">
                <label for="inputKelas" class="col-form-label">Kelas</label>
                <input type="text" class="form-control" id="inputKelas" id="kelas" name="kelas" placeholder="Kelas" data-bv-notempty="true" data-bv-notempty-message="Kelas tidak boleh kosong">
            </div>
        </div>
    </form>
</div>

                <div class="modal-footer d-flex">
									<button type="button" class="btn btn-outline-secondary flex-fill" data-dismiss="modal">Tutup</button>
                  <button class="btn bg-biru flex-fill" id="updateBtn">
                    <span class="text text-white">Update</span>
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
      <script src="<?php echo base_url('assets/vendor/bootstrap-select/js/bootstrap-select.js'); ?>"></script>
      <script src="<?php echo base_url('assets/vendor/bootstrap-select/js/defaults-id_ID.min.js'); ?>"></script>      
      <script src="<?php echo base_url('assets/vendor/gijgo/gijgo.js') ?>" type="text/javascript"></script>
      <script src="<?php echo base_url('assets/vendor/select2/select2.min.js') ?>"></script>
    <script>
      $(document).ready(function () {
				$('#table').bootstrapTable({
					search: true // Disable default search box
				});

				$('#tables').bootstrapTable({
					search: true // Disable default search box
				});

				// Custom search input functionality
				$('#searchInput').on('input', function () {
					var searchText = $(this).val();
					$('#table').bootstrapTable('refreshOptions', {
						search: true,
						searchText:  searchText
					});
				});

				$('#searchInputs').on('input', function () {
					var searchText = $(this).val();
					$('#tables').bootstrapTable('refreshOptions', {
						search: true,
						searchText:  searchText
					});
				});

        var dataSelected;
        editManager = function (value, record, $cell, $displayEl, id, $grid) {
                    var data = $grid.data(),
                        // $edit = $("<button data-toggle='tooltip' title='Ubah' class='btn btn-sm'><i class='fas fa-pencil-alt'></i></button>").attr('data-key', id),
                        $update = $("<button data-toggle='tooltip' title='Update' class='btn btn-success btn-sm'><i class='fa fa-save'></i></button>").attr('data-key', id).hide(),
                        $cancel = $("<button data-toggle='tooltip' title='Batal' class='btn btn-danger btn-sm'><i class='fa fa-times'></i></button>").attr('data-key', id).hide();
                    $edit.on('click', function (e) {
                        $grid.edit($(this).data('key'));
                        const id = $(this).data('key');
                        dataSelected = grid.getById(id);
                        $edit.hide();
                        $update.show();
                        $cancel.show();
                    });
                    $update.on('click', function (e) {
                        $grid.update($(this).data('key'));
                        $edit.show();
                        $update.hide();
                        $cancel.hide();
                    });
                    $cancel.on('click', function (e) {
                        $grid.cancel($(this).data('key'));
                        $edit.show();
                        $update.hide();
                        $cancel.hide();
                    });
                $displayEl.empty().append($edit).append($update).append($cancel);
                }
          
 // data-source="<?php echo base_url('admin/cekBentrokJadwal') ?>" data-ui-library="bootstrap3"
            var grid, countries;
            grid = $('#tableBentrok').grid({
                dataSource: "<?php echo base_url('admin/cekBentrokJadwal') ?>",
                uiLibrary: 'bootstrap3',
                primaryKey: 'id',
                grouping: { groupBy: '#' },
                inlineEditing: { mode: 'command', managementColumn: false},
                detailTemplate: '<div style="text-align: left"><p><b>SKS:</b> {sks}</p><p><b>SEMESTER:</b> {semester}</p><p><b>PROGRAM STUDI:</b> {programstudi}</p></div>',
                responsive: true,
                iconsLibrary: 'fontawesome',
                columns: [
                { field: 'id', hidden: true },
                { field: 'id_hari', hidden: true },
                { field: 'id_jam', hidden: true },
                { field: 'id_dosen', hidden: true },
                { field: 'jenis', hidden: true },
                { field: 'sks', hidden: true },
                { field: 'semester', hidden: true },
                { field: 'programstudi', hidden: true },
                { field: '#', hidden: true },
                { field: 'hari', title: 'Hari', editor: editorHari, editField: 'id_hari', width: 105 },
                { field: 'jam_kuliah', title: 'Jam', editor: editorJam, editField: 'id_jam', width: 140},
                { field: 'nama_mk', title: 'Matakuliah' },
                { field: 'kelas', title: 'Kelas', width:52 },
                { field: 'dosen', title: 'Dosen'},
                {width: 100, align: 'center', renderer: editManager}]
            });

            function editorHari($editorContainer, value, record) {
              var res = jQuery.ajax({
                  type: "GET",
                  url: "<?php echo base_url() ?>"+"admin/getData",
                  dataType: 'JSON',
                  data: {tabel:'tbl_hari',kolom:'nama',where:{kelas:record.jenis}},
                  async: false
              }) 

              var select = $('<select></select>');
              const hari = record.hari;
              $.each(res.responseJSON,function(index, el) {
                select.append("<option value='"+el.id+"' "+(el.text == hari ? 'selected' : '')+">"+el.text+"</option>");
              });

              $editorContainer.append(select);
              select.select2();

              select.on('change', function(e){
                var select = $('#selectJam'+record.id);
                select.empty();

                select.append(setSelectJam(e.target.value, record.sks, record.id_jam));

              })
            }
            
            function editorJam($editorContainer, value, record) {
              var select = $('<select id="selectJam'+record.id+'"></select>');

              select.append(setSelectJam(record.id_hari, record.sks, record.id_jam));

              $editorContainer.append(select);
              select.select2();
            }

            function setSelectJam(hari,sks,jam){
              var res = jQuery.ajax({
                  type: "GET",
                  url: "<?php echo base_url() ?>"+"admin/getData",
                  dataType: 'JSON',
                  data: {tabel:'tbl_jam',kolom:'range_jam',where:{hari:hari,sks:sks}},
                  async: false
                }) 
                
                var res;
                $.each(res.responseJSON,function(index, el) {
                  res += "<option value='"+el.id+"' "+(el.id == jam ? 'selected' : '')+">"+el.jam_kuliah+"</option>";
                });

                return res;
            }

            grid.on('rowDataChanged', function (e, id, record) {
                // Clone the record in new object where you can format the data to format that is supported by the backend.
                var data = $.extend(true, {}, record);

                // console.log(data);
                // console.log(data.id_hari);
                
                jQuery.ajax({
                      type: "POST",
                      url: "<?php echo base_url() ?>"+"admin/setJadwalBentrok",
                      dataType: 'json',
                      data: {manajemen: 'update', data: data},
                      success: function(res) {
                        if (res.status) {
                          Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: res.data,
                            showConfirmButton: false,
                            timer: 1500
                          })
                          grid.reload();
                        }else{
                          Swal.fire({
                            position: 'top-end',
                            icon: 'error',
                            title: res.data,
                            showConfirmButton: false,
                            timer: 1500
                          })
                        }
                      }
                })
            });
            
        });
    </script>
      <script type="text/javascript">
        $(document).ready(function(){

          $('#populasiHelper').hide();
          $('select[name=dataFilter]').selectpicker('hide');
          $('#formBuatJadwal').bootstrapValidator({
                message: 'This value is not valid',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'fas fa-exclamation-circle',
                validating: 'glyphicon glyphicon-refresh'
            },
            excluded: ':disabled'
            // fields: {
            //         prodi: {
            //           message: 'Tidak ada data dengan Semester, Tahun Akademik dan Prodi ini',
            //             validators: {
            //                 callback: {
            //                   callback: function(value, validator, $fields){
            //                     var jenis_semester = $('select[name=jenis_semester]').val();
            //                     var tahun_akademik = $('select[name=tahun_akademik]').val()[0];

            //                     if (jenis_semester != '' && tahun_akademik != undefined) {
            //                       $.each(value,function(key,val){
            //                           jQuery.ajax({
            //                                 type: "POST",
            //                                 url: "<?php echo base_url() ?>"+"admin/cekDataJadwal",
            //                                 dataType: 'json',
            //                                 data: {jurusan:val, jenis_semester:jenis_semester, tahun_akademik:tahun_akademik},
            //                                 success: function(res) {
            //                                   if (res == false) {
            //                                     $('#formBuatJadwal').bootstrapValidator('updateStatus', 'prodi', 'INVALID', 'callback')
            //                                                         .bootstrapValidator('validateField', 'prodi');
            //                                   }
            //                                 }
            //                           })
            //                       })
            //                     }
            //                     return true;
            //                   }
            //                 }
            //             }
            //         }
            //   }
          })
        })

        $('#formBuatJadwal').submit(function() {
            return false;
        });

        $('#filterTable').submit(function(){
          return false;
        })
        $('#filterTables').submit(function(){
          return false;
        })
        
        jQuery.ajax({
                    type: "POST",
                    url: "<?php echo base_url() ?>"+"admin/buatjadwal",
                    dataType: 'json',
                    data: {manajemen:'getDataFilter',tabel:"jadwal"},
                    success: function(res) {
                      var option = "";
                      var cek = "";
                      var kelas;
                      $.each(res,function(keys,value){
                        option += '<option value="'+ res[keys]['name'] +'" >' + res[keys]['name'] + '</option>';
                        
                      })


                      $('select[name=dataFilters]').html(option);
                      $('select[name=dataFilters]').selectpicker({
                                                        title: '- Pilih Nama Jadwal -'
                                                        })
                                                  .selectpicker('refresh');
                    }
              })

        $('select[name=filter]').change(function(e){
          var val = e.target.value;
          $('select[name=dataFilter]').empty();
          $('select[name=dataFilter]').selectpicker({
                                        title: '  Memproses...'
                                        })
                                      .selectpicker('refresh');
          if (val == "") {
            $('select[name=dataFilter]').selectpicker('hide');
            $('#table').bootstrapTable('filterBy', {});
          }else{
            $('select[name=dataFilter]').selectpicker('show');
            
            getDataFilter(val);
          }
        })

        function getDataFilter(val){
          if (val == "programstudi") {
              jQuery.ajax({
                    type: "POST",
                    url: "<?php echo base_url() ?>"+"admin/buatjadwal",
                    dataType: 'json',
                    data: {manajemen:'getDataFilter',tabel:"prodi"},
                    success: function(res) {
                      var option = "";
                      $.each(res,function(keys,value){
                        option += "<option>" + value.nama + "</option>";
                      })

                      $('select[name=dataFilter]').html(option);
                      $('select[name=dataFilter]').selectpicker({
                                                        title: '- Pilih Program Studi -'
                                                        })
                                                  .selectpicker('refresh');
                    }
              })
            }else
            if (val == "nama_mk") {
              jQuery.ajax({
                    type: "POST",
                    url: "<?php echo base_url() ?>"+"admin/buatjadwal",
                    dataType: 'json',
                    data: {manajemen:'getDataFilter',tabel:"matakuliah"},
                    success: function(res) {
                      var option = "";
                      var cek = "";
                      $.each(res,function(keys,value){
                        if (value.programstudi !== cek) {
                            if (cek != '') {
                              option += "</optgroup>";
                            }
                            option += "<optgroup label='"+ value.programstudi +"'>";
                          }
                          option += "<option data-subtext='Semester " + value.semester +"' value='"+ value.nama +"'>"+ value.nama +"</option>";
                          
                          cek = value.programstudi;
                      })

                      option += "</optgroup>";

                      $('select[name=dataFilter]').html(option);
                      $('select[name=dataFilter]').selectpicker({
                                                        title: '- Pilih Matakuliah -'
                                                        })
                                                  .selectpicker('refresh');
                    }
              })
            }else
            if (val == "dosen") {
              jQuery.ajax({
                    type: "POST",
                    url: "<?php echo base_url() ?>"+"admin/buatjadwal",
                    dataType: 'json',
                    data: {manajemen:'getDataFilter',tabel:"dosen"},
                    success: function(res) {
                      var option = "";
                      $.each(res,function(keys,value){
                        var dosen = value.nama;
                        option += "<option>" + value.nama + "</option>";
                      })

                      $('select[name=dataFilter]').html(option);
                      $('select[name=dataFilter]').selectpicker({
                                                        title: '- Pilih Dosen -'
                                                        })
                                                  .selectpicker('refresh');
                    }
              })
            }else
            if (val == "kelas") {
              jQuery.ajax({
                    type: "POST",
                    url: "<?php echo base_url() ?>"+"admin/buatjadwal",
                    dataType: 'json',
                    data: {manajemen:'getDataFilter',tabel:"kelas"},
                    success: function(res) {
                      var option = "";
                      var cek = "";
                      var kelas;
                      $.each(res,function(keys,value){
                        if (value.programstudi !== cek) {
                            if (cek != '') {
                              option += "</optgroup>";
                            }
                            option += "<optgroup label='"+ value.programstudi +"'>";
                          }
                          // option += "<option value='" + value.id + "' data-subtext='Semester " + value.semester +"'>"+ value.nama +"</option>";
                          kelas = JSON.parse(value.nama);
                            for (var i = 0; i < kelas.length; i++) {
                              option += '<option value="'+ [kelas[i],value.tahun_angkatan,value.programstudi] +'" data-subtext="'+ value.jenis +'">' + value.tahun_angkatan + ' ' + kelas[i] + '</option>';
                            }
                          
                          cek = value.programstudi;
                      })

                      option += "</optgroup>";

                      $('select[name=dataFilter]').html(option);
                      $('select[name=dataFilter]').selectpicker({
                                                        title: '- Pilih Kelas -'
                                                        })
                                                  .selectpicker('refresh');
                    }
              })
            }else
            if (val == "nama_jadwal") {
              jQuery.ajax({
                    type: "POST",
                    url: "<?php echo base_url() ?>"+"admin/buatjadwal",
                    dataType: 'json',
                    data: {manajemen:'getDataFilter',tabel:"jadwal"},
                    success: function(res) {
                      var option = "";
                      var cek = "";
                      var kelas;
                      $.each(res,function(keys,value){
                        option += '<option value="'+ res[keys]['name'] +'" >' + res[keys]['name'] + '</option>';
                        
                      })


                      $('select[name=dataFilter]').html(option);
                      $('select[name=dataFilter]').selectpicker({
                                                        title: '- Pilih Nama Jadwal -'
                                                        })
                                                  .selectpicker('refresh');
                    }
              })
            }
        }

        $('select[name=dataFilter]').change(function(e){
          var field = $('select[name=filter]').val();

            switch(field.toString()){
              // case 'programstudi':
              //   $('#table').bootstrapTable('filterBy', {programstudi: $(this).val()});
              //   break;
              case 'nama_mk':
                $('#table').bootstrapTable('filterBy', {nama_mk: $(this).val(),nama_jadwal: $('select[name=dataFilters]').val()});
                break;
              case 'dosen':
                $('#table').bootstrapTable('filterBy', {dosen: $(this).val(),nama_jadwal: $('select[name=dataFilters]').val()});
                break;
              case 'nama_jadwal':
                $('#table').bootstrapTable('filterBy', {nama_jadwal: $(this).val()});
                break;
              case 'kelas':
                var dataFilter = e.target.value.split(",");
                $('#table').bootstrapTable('filterBy', {kelas: dataFilter[0],tahun_angkatan: dataFilter[1],nama_jadwal: $('select[name=dataFilters]').val()});
                break;
              default:
                $('#table').bootstrapTable('filterBy', {});
            }
        })

        $('select[name=dataFilters]').change(function(e){
          var field = $('select[name=filter]').val();

            switch(field.toString()){
              // case 'programstudi':
              //   $('#table').bootstrapTable('filterBy', {programstudi: $(this).val()});
              //   break;
              case 'nama_mk':
                $('#table').bootstrapTable('filterBy', {nama_mk: $('select[name=dataFilter]').val(),nama_jadwal: $('select[name=dataFilters]').val()});
                break;
              case 'dosen':
                $('#table').bootstrapTable('filterBy', {dosen: $('select[name=dataFilter]').val(),nama_jadwal: $('select[name=dataFilters]').val()});
                break;
              case 'nama_jadwal':
                $('#table').bootstrapTable('filterBy', {nama_jadwal: $(this).val()});
                break;
              case 'kelas':
                var dataFilter = $('select[name=dataFilter]').val()[0].split(",");
                $('#table').bootstrapTable('filterBy', {kelas: dataFilter[0],tahun_angkatan: dataFilter[1],nama_jadwal: $('select[name=dataFilters]').val()});
                break;
              case '':
                $('#table').bootstrapTable('filterBy', {nama_jadwal: $('select[name=dataFilters]').val()});
                break;
              default:
                $('#table').bootstrapTable('filterBy', {});
            }
        })

        $("#submitBtn").click(function (){
            $('#formBuatJadwal').submit();
            
            var data = $('#formBuatJadwal').serializeArray();
            var result_jurusan = [];

            $.each(data, function(index,value){
              return value['name'] == 'prodi' ? result_jurusan.push({'jurusan':value['value']}) : '';
            })

            data = jQuery.grep(data, function(value) {
              return value['name'] != 'id' && value['name'] != 'prodi';
            });

            var hasErr = $('#formBuatJadwal').find(".has-error").length;

            if (hasErr == 0) {
              if ($('input[name=populasi]').val() == '') {
                $('#populasiHelper').show();
              }else{
                $('#populasiHelper').hide();

                // $('.progress').removeClass('d-none').addClass('d-block');

                $('#submitBtn')
                    .attr('disabled',true)
                    .html('<span class="icon text-white"><i class="spinner-border spinner-border-sm mr-2" role="status"aria-hidden="true"></i></span><span class="text text-white">Memproses...</span>');

                var start = new Date().getTime();

                // run_server_ga(data[0].value, data[1].value, start);
                generateJadwal(data[0].value, data[1].value,data[2].value, start);

              }
            }
         })

      function createNotification(status, teks){
        $('.progress').removeClass('d-block').addClass('d-none');

        $('#submitBtn')
            .attr('disabled',false)
            .html('<span class="icon text-white"><i class="fa-solid fa-paper-plane"></i></span><span class="text">Proses</span>');

        Swal.fire({
            position: 'top-center',
            icon: status,
            title: teks,
            showConfirmButton: true
          })

      }

      function convertTime(start){
        const sec_num = parseInt((new Date().getTime() - start) / 1000, 10);
        const hours   = Math.floor(sec_num / 3600);
        const minutes = Math.floor((sec_num - (hours * 3600)) / 60);
        const seconds = sec_num - (hours * 3600) - (minutes * 60);

        return (hours == 0) ? (minutes == 0) ? seconds+' Detik' : minutes +' Menit, '+seconds+' Detik' : hours+' Jam, '+ minutes+' Menit, '+seconds+' Detik';
      }
      
      function generateJadwal(jenis_semester, tahun_akademik, name, start){
        const request = jQuery.ajax({
          type: "GET",
          url: "<?php echo base_url() ?>" + "admin/generatejadwal",
          dataType: "JSON",
          data: {jenis_semester:jenis_semester, tahun_akademik:tahun_akademik, name:name},
          success: function(res){
            console.log(res);
            if (res.status==true) {
              const waktu = convertTime(start);

             createNotification('success', 'Jadwal kuliah berhasil dibuat, Waktu Proses = '+waktu);

             $('#table').bootstrapTable('refresh');  
             setTimeout(function() {
                  location.reload();
              }, 2000);
            }else
            if(res.status=="gagal"){
              const waktu = convertTime(start);

              createNotification('error', 'Tidak ditemukan solusi optimal, Waktu Proses = '+waktu);
            }
            
          },
          error: function(res){
            console.log(res);
            const waktu = convertTime(start);

            createNotification('error', 'Terjadi masalah di server, Waktu Proses = '+waktu);
          }
        });
      }

      function getTotalJadwal(data,prodi){
        var res = jQuery.ajax({
            type: "POST",
            url: "<?php echo base_url() ?>"+"admin/cekDataTotalJadwal",
            dataType: 'json',
            data: {data:data,jurusan:prodi},
            async: false
          })
        return res.responseJSON;
      }

      function getJurusan(data,prodi){
        var res = jQuery.ajax({
            type: "POST",
            url: "<?php echo base_url() ?>"+"admin/cekDataJenisJadwal",
            dataType: 'json',
            data: {data:data,jurusan:prodi},
            async: false
          })
        return res.responseJSON;
      }

      $('#hapusBtn').click(function(){
          swal.fire({
                    title: "Warning",
                    text: "Anda yakin untuk menghapus jadwal kuliah ini?",
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
                            url: "<?php echo base_url() ?>"+"admin/buatjadwal",
                            dataType: "JSON",
                            data: {manajemen:"hapus-tabel"},
                            success: function(res){
                                if (res === true) {
                                    Swal.fire(
                                      'Berhasil!',
                                      'Jadwal Kuliah Berhasil Dihapus',
                                      'success'
                                    )
                                    $('#table').bootstrapTable('removeAll');
                                }
                            }
                        });
                    }
                });
        })

      $('#bentrokBtn').click(function(event) {
        const totalRows = $('#table').bootstrapTable('getOptions').totalRows;

        if (totalRows > 0) {
          $('#myBentrok').modal();
          var grid = $('#tableBentrok').grid();
          grid.reload();
        }else{
          Swal.fire(
                      'Informasi',
                      'Belum ada jadwal yang dibuat',
                      'warning'
                    )
        }
      });

      function cetakClick(){
          const field = $('select[name=filter]').val().toString();
          let filter = $('select[name=dataFilter]').val().toString();
          let jadwal = $('select[name=dataFilters]').val().toString();

					if (field === 'kelas') {
						// Encode as JSON string
						filter = encodeURIComponent(JSON.stringify({
							kelas: filter.split(',')[0],
							tahun_angkatan: filter.split(',')[1],
							programstudi: filter.split(',')[2]
						}));
					} else {
						filter = encodeURIComponent(filter);
					}
          jadwal = encodeURIComponent(jadwal);

          const totalRows = $('#table').bootstrapTable('getOptions').totalRows;
					const laporan = `<embed src="<?php echo base_url() ?>cetak?field=${field}&filter=${filter}&jadwal=${jadwal}" frameborder="1" width="100%" height="400px">`;

          if (totalRows > 0) {
            $('#myCetak').modal();
            $('.isi-laporan').empty();
            $('.isi-laporan').append(laporan);
          }else{
            Swal.fire(
                        'Informasi',
                        'Belum ada jadwal yang dibuat',
                        'warning'
                      )
          }
        }function cetakClicks(){

          const totalRows = $('#tables').bootstrapTable('getOptions').totalRows;
					const laporan = `<embed src="<?php echo base_url() ?>cetak/jadwal" frameborder="1" width="100%" height="400px">`;

          if (totalRows > 0) {
            $('#myCetak').modal();
            $('.isi-laporan').empty();
            $('.isi-laporan').append(laporan);
          }else{
            Swal.fire(
                        'Informasi',
                        'Belum ada jadwal yang dibuat',
                        'warning'
                      )
          }
        }

        function indexFormatter(val,row,index){
            return index+1;
        }

        function detailFormatter(index, row) {
          var html = []
            var title = {"nama_mk":"Matakuliah", "sks":"SKS", "semester":"Semester", "programstudi": "Program Studi"}

            $.each(row, function (key, value) {
                if (typeof value !== 'object' && value !== undefined && title[key] !== undefined) {
                    html.push('<tr><td><b>' + title[key] + '</b></td><td>' + value +'</td></tr>');
                }
            })

          return html.join('')
        }

				function update_jadwal(){
            $('#formJadwal').submit();
            var data = $('#formJadwal').serializeArray();
            var id = $('input[name=id]').val();

            data = jQuery.grep(data, function(value) {
              return value['name'] != 'id';
            });

            var hasErr = $('#formJadwal').find(".has-error").length;
            if (hasErr == 0) {
                jQuery.ajax({
                    type: "POST",
                    url: "<?php echo base_url() ?>"+"admin/manajemen",
                    dataType: 'JSON',
                    data: {manajemen:'update',form:'jadwalkuliah',id:id,data:data},
                    success: function(res) {
                            if(res){
                                Swal.fire(
                                      'Berhasil!',
                                      'Jadwal berhasil diubah',
                                      'success'
                                    )
                                    setTimeout(function(){location.reload(); },500);
                            }
                        }
                });
            }
        }

				$("#updateBtn").click(function (){
              var ButtonText = $.trim($(this).text());
              if(ButtonText == "Update"){
                update_jadwal();
              }
         })

         function aksiFormatter(val){
          return ["<button data-toggle='tooltip' title='Ubah' class='ubah btn btn-warning btn-sm'>",
                    "<i class='fas fa-pencil-alt'></i>",
                    "</button>",
                    "<button data-toggle='tooltip' title='Hapus' class='hapus btn btn-danger btn-sm mt-2'>",
                    "<i class='fas fa-trash'></i>",
                    "</button>"].join(' ');
        }
        function aksiFormatters(val){
          return ["<button data-toggle='tooltip' title='Ubah' class='aktifkan btn btn-warning btn-sm mr-1'>",
                    "Aktifkan",
                    "</button>",
                    "<button data-toggle='tooltip' title='Hapus' class='hapuss btn btn-danger btn-sm'>",
                    "<i class='fas fa-trash'></i>",
                    "</button>"].join(' ');
        }
        //ini
				window.aksiEvents = {
          'click .ubah': function (e, value, row, index) {
                $('#formJadwal').bootstrapValidator('resetForm', true);
                $('#formJadwal').trigger("reset");
                $('#ubahModal').modal();
                $('#myModalLabel').html("Ubah Jadwal");
                $('input[name=id]').val(row.id);
                $('select[name=id_hari]').val(row.id_hari);
                $('select[name=id_jam]').val(row.id_jam);
                $('select[name=id_kleas]').val(row.id_kelas);
                $('select[name=id_ruang]').val(row.id_ruang);
                $('select[name=id_pengampu]').val(row.id_pengampu);
                $('select[name=semester]').val(row.semester);
                $('select[name=dosen]').val(row.dosen);
                $('select[name=ruang]').val(row.ruang);
                $('#submitBtn').html('<span class="text text-white">Update</span>');
            },
            'click .hapus': function (e, value, row, index) {
                swal.fire({
                    title: "Warning",
                    text: "Anda yakin untuk menghapus "+row.id+" ?",
                    icon: 'warning',
                    showCancelButton: true,
                    showCloseButton: false,
                    cancelButtonColor: '#eaeaea`',
                    confirmButtonColor: '#d33',
                    confirmButtonText: 'Ya, Hapus',
                    cancelButtonText: 'Batal'
                }).then(function(res){
                    if(res.value){
                        jQuery.ajax({
                            type: "POST",
                            url: "<?php echo base_url() ?>"+"admin/manajemen",
                            dataType: "JSON",
                            data: {manajemen:"hapus",form:'jadwalkuliah',id:row.id},
                            success: function(res){
                                if (res === true) {
                                    Swal.fire(
                                      'Berhasil!',
                                      'Dosen berhasil dihapus',
                                      'success'
                                    )
                                    setTimeout(function(){location.reload(); },500);
                                }
                            }
                        });
                    }
                });
            },
            'click .hapuss': function (e, value, row, index) {
                swal.fire({
                    title: "Warning",
                    text: "Anda yakin untuk menghapus "+row.id+" ?",
                    icon: 'warning',
                    showCancelButton: true,
                    showCloseButton: false,
                    cancelButtonColor: '#eaeaea`',
                    confirmButtonColor: '#d33',
                    confirmButtonText: 'Ya, Hapus',
                    cancelButtonText: 'Batal'
                }).then(function(res){
                    if(res.value){
                        jQuery.ajax({
                            type: "POST",
                            url: "<?php echo base_url() ?>"+"admin/manajemen",
                            dataType: "JSON",
                            data: {manajemen:"hapus",form:'jadwal',id:row.id},
                            success: function(res){
                                if (res === true) {
                                    Swal.fire(
                                      'Berhasil!',
                                      'Dosen berhasil dihapus',
                                      'success'
                                    )
                                    setTimeout(function(){location.reload(); },500);
                                }
                            }
                        });
                    }
                });
            },
            'click .aktifkan': function (e, value, row, index) {
                swal.fire({
                    title: "Warning",
                    text: "Anda yakin untuk mengaktifkan "+row.name+" ?",
                    icon: 'warning',
                    showCancelButton: true,
                    showCloseButton: false,
                    cancelButtonColor: '#eaeaea`',
                    confirmButtonColor: '#FFC107',
                    confirmButtonText: 'Ya, Aktifkan',
                    cancelButtonText: 'Batal'
                }).then(function(res){
                    if(res.value){
                        jQuery.ajax({
                            type: "POST",
                            url: "<?php echo base_url() ?>"+"admin/manajemen",
                            dataType: "JSON",
                            data: {manajemen:"update",form:'jadwal',id:row.id},
                            success: function(res){
                                if (res === true) {
                                    Swal.fire(
                                      'Berhasil!',
                                      'Data Berhasil Diaktifkan',
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

        jQuery.fn.ForceNumericOnly = function(){
            return this.each(function()
            {
                $(this).keydown(function(e)
                {
                var key = e.charCode || e.keyCode || 0;
                // allow backspace, tab, delete, enter, arrows, numbers and keypad numbers ONLY
                // home, end, period, and numpad decimal
                return (
                    key == 8 || 
                    key == 9 ||
                    key == 13 ||
                    key == 46 ||
                    key == 110 ||
                    key == 190 ||
                    (key >= 35 && key <= 40) ||
                    (key >= 48 && key <= 57) ||
                    (key >= 96 && key <= 105));
                });
            });
        };

        $('input[name="populasi"]').ForceNumericOnly();
      </script>
</body>

</html>
