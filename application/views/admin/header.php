<div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
			<a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url('admin/'); ?>">
					<div class="sidebar-brand-icon">
							<img src="<?php echo base_url('assets/img/logo/logo-white.png'); ?>">
					</div>
			</a>

			<?php 
        $role = $this->session->userdata('role');
        
        if ($role == 'Admin' || $role == 'Dosen' || $role == 'Laboran') { ?>
				<li class="nav-item">
					<a class="nav-link" href="<?php echo base_url('admin/'); ?>">
						<i class="fa-solid fa-square-poll-vertical text-white"></i>
						<span>Dashboard</span>
					</a>
				</li>
				<?php }
      
				if ($role == 'Admin' || $role == 'Dosen') { ?>
				<li class="nav-item">
					<a class="nav-link" href="<?php echo base_url('admin/matakuliah'); ?>">
						<i class="fa-solid fa-book text-white"></i>
						<span>Mata Kuliah</span>
					</a>
				</li>
				<?php }

				if ($role == 'Admin' || $role == 'Dosen') { ?>
				<li class="nav-item">
					<a class="nav-link" href="<?php echo base_url('admin/dosen/datadosen'); ?>">
						<i class="fa-solid fa-user-tie text-white"></i>
						<span>Dosen</span>
					</a>
				</li>
				<?php } 

				if ($role == 'Admin' || $role == 'Laboran') { ?>
				<li class="nav-item">
					<a class="nav-link" href="<?php echo base_url('admin/ruangan'); ?>">
					<i class="fa-solid fa-landmark text-white"></i>
						<span>Ruang Kuliah</span>
					</a>
				</li>
				<?php }

				if ($role == 'Admin') { ?>
				<li class="nav-item">
					<a class="nav-link" href="<?php echo base_url('admin/kelas'); ?>">
						<i class="fa-solid fa-graduation-cap text-white"></i>
						<span>Kelas</span>
					</a>
				</li>
				<?php } 

				if ($role == 'Admin') { ?>
				<li class="nav-item">
					<a class="nav-link collapsed" href="<?php echo base_url('admin/waktu#'); ?>" data-toggle="collapse" data-target="#collapsePage" aria-expanded="true"
						aria-controls="collapsePage">
						<i class="fas fa-fw fa-clock text-white"></i>
						<span>Waktu</span>
					</a>
					<div id="collapsePage" class="collapse" aria-labelledby="headingPage" data-parent="#accordionSidebar">
						<div class="bg-biru py-2 collapse-inner rounded text-white">
							<h6 class="collapse-header">Pengaturan Waktu</h6>
							<a class="collapse-item text-white" href="<?php echo base_url('admin/waktu/jam'); ?>">Jam</a>
							<a class="collapse-item text-white" href="<?php echo base_url('admin/waktu/hari'); ?>">Hari</a>
						</div>
					</div>
				</li>
				<?php } 

				if ($role == 'Admin' || $role == 'Dosen') { ?>
				<li class="nav-item">
					<a class="nav-link" href="<?php echo base_url('admin/pengampu'); ?>">
						<i class="fa-solid fa-person-booth text-white"></i>
						<span>Pengampu</span>
					</a>
				</li>
				<?php } 
					
				if ($role == 'Admin' || $role == 'Dosen') { ?>
				<li class="nav-item">
					<a class="nav-link" href="<?php echo base_url('admin/buatjadwal'); ?>">
					<i class="fa-solid fa-calendar-day text-white"></i>
						<span>Buat Jadwal</span>
					</a>
				</li>
				<?php } 
			?>
     
    </ul>
    <!-- Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <!-- TopBar -->
        <nav class="navbar navbar-expand navbar-darkbg-light topbar mb-4 static-top">
          <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
            <i class="fa fa-bars text-dark"></i>
          </button>
          <div class="text-dark"><b>Sistem Penjadwalan Perkuliahan D3 Teknik Informatika PSDKU</b></div>
          <ul class="navbar-nav ml-auto">
            <!-- <div class="topbar-divider d-none d-sm-block"></div> -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <img class="img-profile rounded-circle" src="<?php echo base_url('assets/img/admin.png'); ?>" style="max-width: 60px">
                <span class="ml-2 d-none d-lg-inline text-dark small"><?php echo $this->session->userdata('nama'); ?> </span>
								<i class="fa-solid fa-caret-down ml-2 text-dark"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
									<div class="row">
										<img class="img-profile rounded-circle" src="<?php echo base_url('assets/img/admin.png'); ?>" style="max-width: 40px">
										<span class="ml-2">
											<strong>
												<?php echo $this->session->userdata('nama'); ?>
											</strong>
										<span>
										</br>
										<span class="text-muted">
											<small>
												<?php echo $this->session->userdata('role'); ?>
											</small>
										<span>
									</div>
                </a>
								<div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?php echo base_url('logout') ?>">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-dark"></i>
                  Logout
                </a>
              </div>
            </li>
          </ul>
        </nav>
        <!-- Topbar -->
