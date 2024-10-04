<!DOCTYPE html>
<html lang="en">
<head>
	<title>Sistem Penjadwalam Kuliah D3TI UNS PSDKU</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link href="<?php echo base_url('assets/img/logo/logo.png'); ?>" rel="icon">
<!--===============================================================================================-->
	<link href="<?php echo base_url('assets/vendor/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet" type="text/css">
<!--===============================================================================================-->
	<link href="<?php echo base_url('assets/font/font-awesome-4.7.0/css/font-awesome.min.css'); ?>" rel="stylesheet" type="text/css">
<!--===============================================================================================-->
	<link href="<?php echo base_url('assets/font/Linearicons-Free-v1.0.0/icon-font.min.css'); ?>" rel="stylesheet" type="text/css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/vendor/animate/animate.css'); ?>">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/vendor/css-hamburgers/hamburgers.min.css'); ?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/vendor/animsition/css/animsition.min.css'); ?>">
<!--===============================================================================================-->
	<!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/util.css'); ?>"> -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/login.css'); ?>">

	<link rel="stylesheet" href="<?php echo base_url('assets/vendor/sweetalert2/sweetalert2.css');?>">
<!--===============================================================================================-->
	<!-- Icon -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
      integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Source+Sans+3:ital,wght@0,200..900;1,200..900&display=swap" rel="stylesheet">
</head>
<body class="login-page">
	<div class="container-fluid px-0">
      <div class="row">
        <div class="col-md-7 col-sm-12">
          <img src="<?php echo base_url('assets//img/kampus.png'); ?>" alt="kampus-image" class="login-image w-100" />
        </div>
        <div class="col-md-5 col-sm-12 d-flex align-items-center justify-content-center" style="height: 100vh">
          <div class="card-login px-2">
            <div class="card-body">
              <div class="logo-login d-flex justify-content-center">
                <img src="<?php echo base_url('assets/img/logo/logo.png'); ?>" alt="logo-d3ti" class="logo-biru" />
              </div>
              <hr class="line" />
                <p class="card-title text-center">Masuk untuk memulai...</p>
                <form id="formLogin" class="validate-form">
                    <label for="basic-url" class="form-label">Username</label>
                    <div class="input-group mb-3 validate-input" data-validate="Username tidak boleh kosong">
                        <span class="input-group-text" id="basic-addon1"><i class="text-secondary fa-solid fa-user"></i></span>
                        <input type="text" name="username" class="form-control" placeholder="Masukkan username" aria-label="Username" aria-describedby="basic-addon1" />
                    </div>

                    <label for="basic-url" class="form-label">Kata Sandi</label>
                    <div class="input-group mb-3 validate-input" data-validate = "Password is required">
                        <span class="input-group-text" id="basic-addon1"><i class="text-secondary fa-solid fa-lock"></i></span>
                        <input type="password" name="password" class="form-control" placeholder="Masukkan kata sandi" id="password" name="password" aria-label="KataSandi" aria-describedby="basic-addon1" />
                    </div>

                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input border-white" id="rememberMe" name="rememberMe" />
                        <label class="form-check-label" for="rememberMe">Ingat Saya</label>
                    </div>
                    <button type="submit" class="btn btn-biru w-100 text-light"><i class="fa-solid fa-right-to-bracket mr-2"></i>Masuk</button>
                </form>
              <!-- <a href="#" class="text-biru pt-2 d-flex justify-content-center">Lupa kata sandi?</a> -->
            </div>
          </div>
        </div>
      </div>
    </div>
	
<!--===============================================================================================-->
	<script src="<?php echo base_url('assets/vendor/jquery/jquery.min.js'); ?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('assets/vendor/animsition/js/animsition.min.js'); ?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('assets/vendor/bootstrap/js/popper.js'); ?>"></script>
	<script src="<?php echo base_url('assets/vendor/bootstrap/js/bootstrap.min.js'); ?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('assets/js/main.js'); ?>"></script>

	<script src="<?php echo base_url('assets/vendor/sweetalert2/sweetalert2.all.min.js'); ?>"></script>
<!--===============================================================================================-->
	<script>
		$('#formLogin').submit(function(e){
			e.preventDefault();

			var data = $('#formLogin').serializeArray();

			var hasErr = $(this).find(".alert-validate").length;

			if (hasErr == 0) {
				jQuery.ajax({
                    type: "POST",
                    url: "<?php echo base_url() ?>"+"login/cekLogin",
                    dataType: 'JSON',
                    data: {data:data},
                    success: function(res) {
                        if(res){
                            Swal.fire({
	                            position: 'top-center',
	                            icon: 'success',
	                            title: 'Anda berhasil login',
	                            showConfirmButton: false,
	                            timer: 1500
	                          })
                            // setTimeout(function(){window.location = "admin"},1200);
														setTimeout(function(){window.location.href = "<?php echo base_url('admin'); ?>"},1200);
                        }else{
                        	Swal.fire({
	                            position: 'top-center',
	                            icon: 'error',
	                            title: 'Username atau password salah',
	                            showConfirmButton: false,
	                            timer: 1500
	                          })
                        }
                    }
                });
			}
		})
	</script>

</body>
</html>
