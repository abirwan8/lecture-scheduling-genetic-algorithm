<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
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
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/main.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/home.css'); ?>">
	<!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/test.css'); ?>"> -->

	<link rel="stylesheet" href="<?php echo base_url('assets/vendor/sweetalert2/sweetalert2.css');?>">
<!--===============================================================================================-->
	<link href="<?php echo base_url('assets/vendor/bootstrap-table/bootstrap-table.min.css'); ?>" rel="stylesheet">

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
	<style>
		html {
			scroll-behavior: smooth;
		}
		.status-icon {
			margin-left: 5px;
			font-size: 0.7em;
			vertical-align: middle;
		}
		.jumbotron {
			background: url('<?php echo base_url('assets/img/kampus2.png'); ?>') no-repeat center center;
			background-size: cover;
			color: white;
			height: 600px !important;
			margin: 0;
			display: flex;
			align-items: center;
			justify-content: center;
			position: relative;
		}
		.full-screen-card {
			position: fixed;
			top: 0;
			left: 0;
			width: 100%;
			height: 100%;
			z-index: 1050;
			background-color: white;
		}
		.table .thead-light th {
			color: #8898aa;
    		background-color: #f6f9fc;
			border-color: #e3e6f0;
		}
		.table thead th {
			font-size: .65rem;
			padding-top: .75rem;
			padding-bottom: .75rem;
			letter-spacing: 1px;
			text-transform: uppercase;
			border-bottom: 1px solid #e9ecef;
		}
		.card .table td,
		.card .table th {
			padding-right: 1.5rem;
			padding-left: 1.5rem;
		}
		.table td,
		.table th {
			font-size: .8125rem;
			white-space: nowrap;
		}

		.table.align-items-center td,
		.table.align-items-center th {
			vertical-align: middle;
		}
		.table-responsive {
			display: block;
			overflow-x: auto;
			width: 100%;
			-webkit-overflow-scrolling: touch;
			-ms-overflow-style: -ms-autohiding-scrollbar;
			/* height: 300px;  */
            overflow: hidden;
            /* position: relative; */
		}
		.card-header {
			display: flex;
			justify-content: space-between;
			align-items: center;
		}

		.table-container {
			height: 300px; /* Sesuaikan nilai ini */
			overflow: hidden;
			position: relative;
		}

		.table {
			width: 100%;
			border-collapse: collapse;
		}

		thead {
			position: sticky;
			top: 0;
			background-color: #f8f9fa;
			z-index: 2;
		}

		tbody {
			height: calc(100% - 40px);
			overflow-y: scroll;
			position: relative;
			animation: scrollTable 30s linear infinite;
		}

		tr {
			display: table;
			width: 100%;
			table-layout: fixed;
		}

		@keyframes scrollTable {
			0% {
				transform: translateY(0);
			}
			100% {
				transform: translateY(-50%);
			}
		}

		.table-container:hover tbody {
			animation-play-state: paused;
		}
		.badge-biru{
			background-color: #3A4885 !important;
			border-radius: 4px !important;
		}
		.full-screen-card .table-container {
			height: calc(100vh - 100px);
			/* overflow-y: auto; */
		}
    </style>
</head>
<body>
	<nav class="navbar navbar-expand-lg">
    	<div class="container">
            <a class="navbar-brand" href="#"><img src="<?php echo base_url('assets//img/logo/logo-white.png'); ?>" alt="logo" class="logo"></a>
            <div class="navbar-text ml-auto text-right">
            	<a href="<?php echo base_url('login/index'); ?>" role="button" class="btn btn-outline-light text-white px-4 mr-2">Login</a>
            </div>
        </div>
    </nav>

    <div class="jumbotron jumbotron-fluid bg-cover text-white">
        <div class="container py-5 text-center">
            <h1 class="font-weight-bold">Sistem <span style="color: #FEC63D;">Penjadwalan Perkuliahan</span>
                <br/>
                D3 Teknik Informatika
            </h1>
            <p class="paragraf text-white mb-4">Optimalkan Jadwal Kuliah D3 Teknik Informatika dengan Algoritma Genetika</p>
            
			<div id="clock">
				<h1 class="text-white font-weight-bold" id="time"></h1>
				<p class="text-white" id="date"></p>
			</div>
			<div class="mt-5">
				<a href="#jadwal" role="button" class="paragraf text-white pt-4" id="animation-container">Lihat Jadwal
				<i class="fa-solid fa-chevron-down ml-2"></i>
				</a>
			</div>
        </div>
    </div>

	<section id="jadwal" class="mt-4">
		<h2 class="text-center font-weight-bold text-dark mt-4">Jadwal Hari Ini</h2>
		<div class="container mt-4">
			<div class="row">
				<div class="col">
				<div class="card shadow" id="scheduleCard">
					<div class="card-header border-0 py-3">
						<h6 style="font-weight: 600;">Jadwal Kuliah D3 Teknik Informatika UNS</h6>
						<button class="p-0" onclick="toggleFullScreen()"><i id="fullscreenIcon" class="fa-solid fa-up-right-and-down-left-from-center text-secondary"></i></button>
					</div>
					<div class="px-3">
						<form id="filterForm">
						<div class="form-group row">
							<?php
							$filters = [
								'jam' => ['Pilih Jam', array_unique(array_column($jadwal, 'jam_kuliah'))],
								'nama_mk' => ['Pilih Mata Kuliah', array_unique(array_column($jadwal, 'nama'))],
								'dosen' => ['Pilih Dosen', array_unique(array_column($jadwal, 'dosen'))],
								'semester' => ['Pilih Semester', array_unique(array_column($jadwal, 'semester'))],
								'kelas' => ['Pilih Kelas', array_unique(array_column($jadwal, 'kelas'))],
								'ruang' => ['Pilih Ruang', array_unique(array_column($jadwal, 'ruang'))]
							];

							foreach ($filters as $key => $filter) :
							?>
								<div class="col-md-2">
									<select class="form-control form-control-sm border-secondary filter-select" id="<?= $key ?>" name="<?= $key ?>">
										<option value="" <?= empty($_GET[$key]) ? 'selected' : '' ?>><?= $filter[0] ?></option>
										<?php foreach ($filter[1] as $option) : ?>
											<?php 
												$displayOption = $option;
												if ($key == 'semester') {
													$displayOption = 'Semester ' . $option;
												} elseif ($key == 'kelas') {
													$displayOption = 'Kelas ' . $option;
												}
												$selected = (isset($_GET[$key]) && $_GET[$key] == $option) ? 'selected' : ''; 
											?>
											<option value="<?= $option ?>" <?= $selected ?>><?= $displayOption ?></option>
										<?php endforeach; ?>
									</select>
								</div>
							<?php endforeach; ?>
						</div>
						</form>
					</div>
					<div class="table-container">
						<div class="table-responsive">
							<table class="table align-items-center table-flush scrolling">
								<thead class="thead-light">
								<tr>
									<th scope="col" width="14%">Hari/Tanggal</th>
									<th scope="col" width="10%">Jam</th>
									<th scope="col" width="30%">Mata Kuliah</th>
									<th scope="col" width="18%">Dosen</th>
									<th scope="col" width="13%">Semester</th>
									<th scope="col" width="10%">Kelas</th>
									<th scope="col" width="15%">Ruang</th>
								</tr>
								</thead>
									<tbody>
										<?php if (empty($jadwal)) { ?>
											<tr>
												<td colspan="7" class="text-center">Tidak ada jadwal hari ini</td>
											</tr>
										<?php } else { ?>
											<?php foreach ($jadwal as $key => $value) { ?>
												<tr>
												<td width="14%" class="hari"><?php echo $value['hari']; ?></td>
												<td width="10%" id="jam-<?php echo $key; ?>"><?php echo $value['jam_kuliah']; ?><i class="fa-solid fa-circle status-icon" style="display: none; color: #28a745;"></i></td>
												<td width="30%"><?php echo $value['nama']; ?></td>
												<td width="18%"><?php echo $value['dosen']; ?></td>
												<td width="13%">Semester  
													<span class="badge badge-biru p-2 text-white"> <?php echo $value['semester']; ?></span>
												</td>
												<td width="10%">Kelas  
													<span class="badge badge-biru p-2 text-white"> <?php echo $value['kelas']; ?><span>
												</td>
												<td width="15%">
													<span class="badge badge-warning p-2"><?php echo $value['ruang']; ?></span>
												</td>
												</tr>
											<?php } ?>
										<?php } ?>
									</tbody>
							</table>
						</div>
					</div>
					<div class="card-footer">
					</div>
				</div>
				</div>
			</div>
		</div>
	</section>

	<section class="mx-3">
		<div class="container-fluid py-4 section-biru mt-4">
			<h2 class="text-center font-weight-bold text-white mt-4">Layanan Sistem</h2>
			<div class="row p-5 mx-5">
				<div class="col-md-4">
					<div class="card card-cuplikan bg-tosca text-center mb-2">
						<div class="card-body py-5">
							<i class="icon fa-solid fa-gear" style="color: #2DC39E;"></i>
							<h5 class="text-white mt-4 px-4">Pembuatan jadwal perkuliahan secara otomatis</h5>
						</div>
					</div>
				</div>    
				<div class="col-md-4">
					<div class="card card-cuplikan bg-orange text-center mb-2">
						<div class="card-body py-5">
							<i class="icon fa-solid fa-server" style="color: #FC895D;"></i>
							<h5 class="text-white mt-4 px-4">Pengelolaan data informasi perkuliahan</h5>
						</div>
					</div>
				</div>    
				<div class="col-md-4">
					<div class="card card-cuplikan bg-kuning text-center mb-2">
						<div class="card-body py-5">
							<i class="icon fa-solid fa-print" style="color: #FEC63D;"></i>
							<h5 class="text-white mt-4 px-4">Mencetak jadwal perkuliahan dalam PDF</h5>
						</div>
					</div>
				</div>    
			</div>
		</div>
	</section>
	
	<section class="mx-3 mt-4">
		<div class="card p-4">
			<div class="row px-4">
				<div class="col-lg-7 mx-auto">

					<!-- CUSTOM BLOCKQUOTE -->
					<blockquote class="blockquote blockquote-custom bg-white p-5 shadow rounded">
						<div class="blockquote-custom-icon section-biru shadow-sm"><i class="fa fa-quote-left text-white"></i></div>
						<p class="mb-0 mt-2 font-italic" id="quote-text">Teknologi tidak menyelesaikan semua masalah, tetapi jika dimanfaatkan dengan benar, dapat membuka jalan menuju solusi."</p>
						<footer class="blockquote-footer text-info pt-4 mt-4 border-top" id="quote-author">Jack Ma,
							<cite title="Source Title" class="text-secondary">Pendiri Alibaba Group</cite>
						</footer>
					</blockquote><!-- END -->

				</div>
			</div>
		</div>
	</section>

	<section id="footer" class="mt-4" style="background-color: #3A4885;">
      <div class="container">
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12 mt-4">
            <ul class="list-unstyled list-inline social text-center">
				<li class="list-inline-item box-medsos mail"><i class="fa-solid footer-icon fa-envelope p-2"></i></li>
				<li class="list-inline-item box-medsos phone"><i class="fa-solid footer-icon fa-phone p-2" style=""></i></li>
				<li class="list-inline-item box-medsos instagram"><i class="fa-brands footer-icon fa-instagram p-2"></i></li>
            </ul>
          </div>
        </div>	
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-2 text-center text-white">
            <h6 class="fs-5 text-white"><b>Universitas Sebelas Maret Kampus Madiun </b>
				<br/>
				Jl. Imam Bonjol, Sumbersoko, Pandean, Kec. Mejayan, Kabupaten Madiun, Jawa Timur 63153</h6>
            <hr/>
            <p class="pb-2 text-white">Copyright 2023 © All right Reversed</p>
          </div>
        </div>	
      </div>
    </section>
	
	<script src="<?php echo base_url('assets/vendor/bootstrap-table/bootstrap-table.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/vendor/bootstrap-table/bootstrap-table-id-ID.js'); ?>"></script>
	<script>
		function updateClock() {
			const now = new Date();
			const hours = now.getHours().toString().padStart(2, '0');
			const minutes = now.getMinutes().toString().padStart(2, '0');
			const seconds = now.getSeconds().toString().padStart(2, '0');

			const day = now.getDate().toString().padStart(2, '0');
			const months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
			const month = months[now.getMonth()];
			const year = now.getFullYear();

			const daysOfWeek = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
			const dayOfWeek = daysOfWeek[now.getDay()];

			const timeString = `${hours}:${minutes}:${seconds}`;
			const dateString = `${dayOfWeek}, ${day} ${month} ${year}`;

			document.getElementById('date').innerText = dateString;
			document.getElementById('time').innerText = timeString;

			updateJamKuliah(now);
		}

		function updateTableDate() {
			const now = new Date();
			const day = now.getDate().toString().padStart(2, '0');
			const months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
			const month = months[now.getMonth()];
			const year = now.getFullYear();

			var hariElements = document.querySelectorAll('.hari');
			hariElements.forEach(function(element) {
				var hariText = element.textContent.split(',')[0];
				element.textContent = `${hariText}, ${day} ${month} ${year}`;
			});
		}

		function updateJamKuliah(now) {
			const currentTime = now.getHours() * 60 + now.getMinutes();

			document.querySelectorAll('[id^="jam-"]').forEach(cell => {
				const jamKuliah = cell.textContent.trim();
				const [start, end] = jamKuliah.split('-').map(time => {
					const [hours, minutes] = time.trim().split(':').map(Number);
					return hours * 60 + minutes;
				});

				const statusIcon = cell.querySelector('.status-icon');

				if (currentTime >= start && currentTime <= end) {
					statusIcon.style.display = 'inline';
				} else {
					statusIcon.style.display = 'none';
				}
			});
		}

		document.addEventListener('DOMContentLoaded', function() {
			const tableBody = document.querySelector('.table tbody');
			const originalRows = tableBody.innerHTML;
			tableBody.innerHTML += originalRows;

			updateTableDate();
			updateClock();
			setInterval(updateClock, 1000);
		});

		document.addEventListener("DOMContentLoaded", function() {
			const link = document.querySelector('#animation-container');

			link.addEventListener('click', function(event) {
				event.preventDefault();
				const targetId = this.getAttribute('href');
				const targetElement = document.querySelector(targetId);

				targetElement.scrollIntoView({ behavior: 'smooth' });
			});
		});

		// Quote
		const quotes = [
            {
                quote: "Satu-satunya cara untuk melakukan pekerjaan besar adalah dengan mencintai apa yang Anda lakukan.",
                author: "Steve Jobs"
            },
            {
                quote: "Penting untuk merayakan kesuksesan, tetapi lebih penting untuk belajar dari kegagalan.",
                author: "Bill Gates"
            },
            {
                quote: "Resiko terbesar adalah tidak mengambil risiko apa pun.",
                author: "Mark Zuckerberg"
            },
            {
                quote: "Jika Anda mengubah dunia, Anda bekerja pada hal-hal penting. Anda bersemangat untuk bangun di pagi hari.",
                author: "Larry Page"
            },
            {
                quote: "Kegagalan adalah pilihan di sini. Jika hal-hal tidak gagal, Anda tidak cukup berinovasi.",
                author: "Elon Musk"
            }
        ];

        // Function to generate random quote
        function generateRandomQuote() {
            // Generate random index
            const randomIndex = Math.floor(Math.random() * quotes.length);
            // Return random quote object
            return quotes[randomIndex];
        }

        // Display random quote when page loads
        const randomQuote = generateRandomQuote();
        document.getElementById('quote-text').textContent = randomQuote.quote;
        document.getElementById('quote-author').textContent = randomQuote.author;
	</script>
	<script>
		document.addEventListener('DOMContentLoaded', function() {
		const filterSelects = document.querySelectorAll('.filter-select');
		const tableRows = document.querySelectorAll('tbody tr');

		filterSelects.forEach(select => {
			select.addEventListener('change', filterTable);
		});

		function filterTable() {
			const filters = {};
			filterSelects.forEach(select => {
				filters[select.id] = select.value.toLowerCase();
			});

			tableRows.forEach(row => {
				let shouldShow = true;
				for (let key in filters) {
					if (filters[key]) {
						const cellValue = row.querySelector(`td:nth-child(${getCellIndex(key)})`).textContent.toLowerCase();
						if (!cellValue.includes(filters[key])) {
							shouldShow = false;
							break;
						}
					}
				}
				row.style.display = shouldShow ? '' : 'none';
			});
		}

		function resetOtherFilters(changedFilterId) {
			filterSelects.forEach(select => {
				if (select.id !== changedFilterId) {
					select.selectedIndex = ''; // Reset to the first option (usually the default option)
				}
			});
		}

		function getCellIndex(key) {
			switch(key) {
				case 'jam': return 2;
				// case 'waktu': return [2][3]; 
				case 'nama_mk': return 3;
				case 'dosen': return 4;
				case 'semester': return 5;
				case 'kelas': return 6;
				case 'ruang': return 7;
				default: return 1;
			}
		}
	});
	</script>
	<script>
		function toggleFullScreen() {
			var card = document.getElementById('scheduleCard');
			var icon = document.getElementById('fullscreenIcon');
			
			card.classList.toggle('full-screen-card');
			
			if (card.classList.contains('full-screen-card')) {
				icon.classList.remove('fa-up-right-and-down-left-from-center');
				icon.classList.add('fa-xmark');
			} else {
				icon.classList.remove('fa-xmark');
				icon.classList.add('fa-up-right-and-down-left-from-center');
			}
		}
	</script>
</body>
</html>
