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
  <link href="<?php echo base_url('assets/vendor/bootstrap-table/bootstrap-table.min.css'); ?>" rel="stylesheet">
  <link href="<?php echo base_url('assets/vendor/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet" type="text/css">
  <!-- <link href="<?php echo base_url('assets/css/ruang-admin.min.css'); ?>" rel="stylesheet"> -->
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
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Source+Sans+3:ital,wght@0,200..900;1,200..900&display=swap" rel="stylesheet">
</head>

<body id="page-top">
  <?php $this->load->view('admin/header'); ?>
        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="row">
            <!-- Total User -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100 bg-biru">
                <div class="card-body">
                  <div class="row align-items-center">
										<div class="col-auto">
											<i class="fa-solid fa-user-tie fa-2x text-white"></i>
                    </div>
										<div class="col-auto">
											<div class="text-xs font-weight-bold text-uppercase mb-1 text-white">Total Dosen</div>
											<div class="h5 mb-0 font-weight-bold text-white"><?= $totaldosen; ?></div>
										</div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Total Matakuliah -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100 bg-tosca">
                <div class="card-body">
                  <div class="row align-items-center">
										<div class="col-auto mr-2">
											<i class="fa-solid fa-book fa-2x text-white"></i>
										</div>
                    <div class="col-auto">
                      <div class="text-xs font-weight-bold text-uppercase mb-1 text-white">Total Matakuliah</div>
                      <div class="h5 mb-0 font-weight-bold text-white"><?= $totalmk; ?></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
           
            <!-- Total Ruangan -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100 bg-orange">
                <div class="card-body">
                  <div class="row align-items-center">
										<div class="col-auto mr-2">
											<i class="fa-solid fa-landmark fa-2x text-white"></i>
										</div>
                    <div class="col-auto">
                      <div class="text-xs font-weight-bold text-uppercase mb-1 text-white">Total Ruangan</div>
                      <div class="h5 mb-0 mr-3 font-weight-bold text-white"><?= $totalruang; ?></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
           
            <!-- Total Ruangan -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100 bg-kuning">
                <div class="card-body">
                  <div class="row align-items-center">
										<div class="col-auto mr-2">
											<i class="fa-solid fa-graduation-cap fa-2x text-white"></i>
										</div>
                    <div class="col-auto">
                      <div class="text-xs font-weight-bold text-uppercase mb-1 text-white">Total Kelas</div>
                      <div class="h5 mb-0 mr-3 font-weight-bold text-white"><?= $totalkelas; ?></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
					</div>
           
					<!-- Tambah User Section -->
					<?php if ($this->session->userdata('role') == 'Admin') { ?>
						<div class="row">
            <div class="col-lg-12">
							<div class="card mb-4">
								<div class="card-body">
									<h5 class="font-weight-bold">User D3 Teknik Informatika PSDKU</h5>
									<p class="text-muted">Pengelolaan data dosen D3 TI PSDKU</p>

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
													<input class="form-control" id="searchInput" type="text" placeholder="Cari data dosen" />
											</div>
										</div>
                </div>

                <div class="table-responsive table-striped table-hover">
                  <table class="table align-items-center table-flush mt-3" id="table" data-toggle="table" data-click-to-select="true"  data-pagination="true">
                    <thead class="text-dark">
                      <tr>
                        <th data-field="no" data-formatter="indexFormatter" class="font-14">#</th>
                        <th data-field="id" data-visible="false">id</th>
                        <th data-field="username" class="font-14">Username</th>
                        <th data-field="nama" class="font-14">Nama</th>
                        <th data-field="role" class="font-14">Role</th>
                        <th data-field="aksi" data-formatter="aksiFormatter" data-events="window.aksiEvents" class="text-center">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                        foreach ($data as $key => $value) {
                          echo "<tr>
                                  <td></td>
                                  <td>$value[id]</td>
                                  <td>$value[username]</td>
                                  <td>$value[nama]</td>
                                  <td>$value[role]</td>
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
										<h5 class="modal-title" id="myModalLabel">Tambah User</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
										<form id="formUser">
											<input type="hidden" name="id">
											<div class="form-group row">
												<div class="col-sm-12">
													<label for="inputUsername" class="col-form-label">Username</label>
													<input type="text" class="form-control" id="inputUsername" name="username" placeholder="Username">
												</div>
											</div>
											<div class="form-group row">
												<div class="col-sm-12">
													<label for="inputNama" class="col-form-label">Nama</label>
													<input type="text" class="form-control" id="inputNama" name="nama" placeholder="Nama User" data-bv-notempty="true" data-bv-notempty-message="Nama User tidak boleh kosong">
												</div>
											</div>
											<div class="form-group row">
												<div class="col-sm-12">
													<label for="inputPassword" class="col-form-label">Password</label>
													<input type="password" class="form-control" id="inputPassword" name="password" placeholder="Password User" data-bv-notempty="true" data-bv-notempty-message="Password User tidak boleh kosong">
												</div>
											</div>
											<div class="form-group row">
												<div class="col-sm-12">
													<label for="inputRole" class="col-form-label">Role</label>
														<select class="selectpicker form-control" id="selectRole" name="role">
															<option disabled selected>- Pilih Role -</option>
															<option value="Admin">Admin</option>
															<option value="Dosen">Dosen</option>
															<option value="Laboran">Laboran</option>
														</select>
													<!-- <input type="text" class="form-control" id="inputRole" name="role" placeholder="Role User" data-bv-notempty="true" data-bv-notempty-message="Role User tidak boleh kosong"> -->
												</div>
											</div>
											
										</form>
									</div>
									<div class="modal-footer d-flex">
									<button type="button" class="btn btn-outline-secondary flex-fill" data-dismiss="modal">Tutup</button>
                  <button class="btn bg-biru flex-fill" id="submitBtn">
                    <span class="text">Simpan</span>
                  </button>
                </div>
								</div>
							</div>
						</div>
					<?php } ?>
					<!-- Tambah User Section -->
          
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

          $('#formUser').bootstrapValidator({
                message: 'This value is not valid',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'fas fa-exclamation-circle',
                validating: 'glyphicon glyphicon-refresh'
            },
            excluded: ':disabled'
          })
        })
        $('#formUser').submit(function() {
            return false;
        });

        function setModalTambah(){
            $('#formUser').bootstrapValidator('resetForm', true);
            $('#formUser').trigger("reset");

            $('#tambahModal').modal();
            $('#myModalLabel').html("Tambah User");

            $('#submitBtn').html('</span><span class="text text-white">Simpan</span>');
        }

        function tambah_user(){
            $('#formUser').submit();
            var data = $('#formUser').serializeArray();

            data = jQuery.grep(data, function(value) {
              return value['name'] != 'id';
            });

            var hasErr = $('#formUser').find(".has-error").length;

            if (hasErr == 0) {
                jQuery.ajax({
                    type: "POST",
                    url: "<?php echo base_url() ?>"+"admin/manajemen",
                    dataType: 'JSON',
                    data: {manajemen:'tambah',form:'admin',data:data},
                    success: function(res) {
                            if(res){
                                Swal.fire(
                                      'Berhasil!',
                                      'User berhasil ditambahkan',
                                      'success'
                                    )
                                    setTimeout(function(){location.reload(); },500);
                            }
                        }
                });
            }
        }

        function update_user(){
            $('#formUser').submit();
            var data = $('#formUser').serializeArray();
            var id = $('input[name=id]').val();

            data = jQuery.grep(data, function(value) {
              return value['name'] != 'id';
            });

            var hasErr = $('#formUser').find(".has-error").length;

            if (hasErr == 0) {
                jQuery.ajax({
                    type: "POST",
                    url: "<?php echo base_url() ?>"+"admin/manajemen",
                    dataType: 'JSON',
                    data: {manajemen:'update',form:'admin',id:id,data:data},
                    success: function(res) {
                            if(res){
                                Swal.fire(
                                      'Berhasil!',
                                      'User berhasil diubah',
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
                tambah_user();
              }else 
              if(ButtonText == "Update"){
                update_user();
              }
         })

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
                $('#formUser').bootstrapValidator('resetForm', true);
                $('#formUser').trigger("reset");

                $('#tambahModal').modal();
                $('#myModalLabel').html("Ubah User");

                $('input[name=id]').val(row.id);
                $('input[name=username]').val(row.username);
                $('input[name=nama]').val(row.nama);
                $('input[name=password]').val(row.password);
                $('select[name=role]').val(row.role);

                $('#submitBtn').html('<span class="text text-white">Update</span>');
            },
            'click .hapus': function (e, value, row, index) {
                swal.fire({
                    title: "Warning",
                    text: "Anda yakin untuk menghapus "+row.nama+" ?",
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
                            data: {manajemen:"hapus",form:'admin',id:row.id},
                            success: function(res){
                                if (res === true) {
                                    Swal.fire(
                                      'Berhasil!',
                                      'User berhasil dihapus',
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

        function indexFormatter(val,row,index){
            return index+1;
        }
      </script>
</body>

</html>
