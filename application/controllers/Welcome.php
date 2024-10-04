<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model('Admin_models');
    }

	public function index() {
		// Dapatkan hari ini dalam bahasa Indonesia
		$hari_indonesia = array('Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu');
		$hari_ini = $hari_indonesia[date('w')];
 
		$kelas = $this->input->get('kelas'); // Ambil kelas dari input GET
		$semester = $this->input->get('semester'); // Ambil kelas dari input GET
		$jadwal = $this->Admin_models->getJadwalKuliahByDay($hari_ini);
 
		// Filter jadwal berdasarkan kelas jika ada input kelas
		if (!empty($kelas)) {
			 $jadwal = array_filter($jadwal, function($value) use ($kelas) {
				 return $value['kelas'] == $kelas;
			 });
		}

		if (!empty($semester)) {
			 $jadwal = array_filter($jadwal, function($value) use ($semester) {
				 return $value['semester'] == $semester;
			 });
		}

		$filters = [
			'nama_mk' => $this->input->get('nama_mk'),
			'dosen' => $this->input->get('dosen'),
			'semester' => $this->input->get('semester'),
			'kelas' => $this->input->get('kelas'),
			'ruang' => $this->input->get('ruang')
		];
	
		// $jadwal = $this->Admin_models->get_filtered_jadwal($filters);
	
		// $data['jadwal'] = $jadwal;
 
		$data['jadwal'] = $jadwal;
		$data['kelasList'] = $this->Admin_models->getKelasList(); // Dapatkan daftar kelas secara dinamis
		$data['semesterList'] = $this->Admin_models->getSemesterList(); // Dapatkan daftar kelas secara dinamis
		$data['matkulList'] = $this->Admin_models->getMataKuliahList($hari_ini);
 
		$this->load->view('home', $data);
    }
}
