<?php 
/**
* 
*/
class Cetak extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->library('pdf');
		$this->db->query("SET sql_mode = '' ");
		$this->load->model('Admin_models');
	}

	public function index(){
		$pdf = new FPDF('l','mm','LEGAL');

		$field = $this->input->get('field');
		$filter = $this->input->get('filter');
		$jadwal = $this->input->get('jadwal');

		// Decode JSON string for "kelas" filter
		if ($field == 'kelas') {
        	$filter = json_decode(urldecode($filter), true);
        }


		$dataJadwal = $this->Admin_models->query("SELECT b.tahun_akademik, c.semester FROM tbl_jadwalkuliah a LEFT JOIN tbl_pengampu b on a.id_pengampu = b.id LEFT JOIN tbl_matakuliah c ON b.id_mk = c.id LIMIT 1");
		foreach ($dataJadwal as $key => $value) {
			if ($value['semester'] % 2 == 0) {
				$semester = "GENAP";
			}else{
				$semester = "GANJIL";
			}
			$tahun_akademik = $value['tahun_akademik'];
		}
        
    	$pdf->AddPage();
    	$pdf->SetFont('Times','B',14);
    		$pdf->Image(base_url('assets/img/logo/UNS.png'),60,9,40);
    		$pdf->SetFont('Times','',18);
	        $pdf->Cell(360,5,'DAFTAR JADWAL KULIAH D3 TEKNIK INFORMATIKA PSDKU',0,1,'C');
	        $pdf->Cell(360,9,'SEKOLAH VOKASI UNIVERSITAS SEBELAS MARET ',0,1,'C');
	        $pdf->Cell(360,9,'SEMESTER '.$semester,0,1,'C');
	        $pdf->Cell(360,9,'TAHUN AJARAN '.$tahun_akademik,0,1,'C');
			$pdf->SetFont('Times','I',12);
	        $pdf->cell(360,13,'Jl. Imam Bonjol, Sumbersoko, Pandean, Kec. Mejayan, Kabupaten Madiun, Jawa Timur 63153',0,1,'C');
	        $pdf->SetDrawColor(150,150,150);
			$pdf->SetLineWidth(1);
			$pdf->Line(20,55,350-20,55);
			$pdf->SetLineWidth(0);
			$pdf->Line(20,56,350-20,56);
	        $pdf->Ln(1);

			// Set left margin
			$leftMargin = 20; // Adjust this value as needed
			$topMargin = 65; // Adjust top margin as needed
			$pdf->SetLeftMargin($leftMargin);
			$pdf->SetY($topMargin);


	        $pdf->SetFont('Times','B',12);
	        $pdf->cell(2);
	        $pdf->Cell(10,11,'NO',1,0,'C');
	        $pdf->Cell(15,11,'HARI',1,0,'C');
	        $pdf->cell(30,11,'JAM',1,0,'C');
	        $pdf->cell(90,11,'MATAKULIAH',1,0,'C');
	        $pdf->Cell(15,11,'SKS',1,0,'C');
	        $pdf->Cell(27,11,'SEMESTER',1,0,'C');
	        $pdf->Cell(20,11,'KELAS',1,0,'C');
	        $pdf->Cell(60,11,'DOSEN',1,0,'C');
	        $pdf->Cell(40,11,'RUANGAN',1,1,'C');
	        // $pdf->Cell(45,11,'PROGRAM STUDI',1,1,'C');

	        $pdf->SetFont('Times','',12);

	        $data = $this->Admin_models->ambilDataJadwal();

	        $no = 1;
	        // foreach ($data as $key => $value) {
	        // 	if ($field !== '' && $filter !== '') {
	        // 		if ($value[$field] == $filter) {
			
			//         	$pdf->cell(2);
			//         	$pdf->Cell(10,11,$no++,1,0,'C');
			// 	        $pdf->Cell(15,11,$value['hari'],1,0,'J');
			// 	        $pdf->cell(30,11,$value['jam_kuliah'],1,0,'C');
			// 	        $pdf->cell(90,11,$value['nama_mk'],1,0,'J');
			// 	        $pdf->Cell(15,11,$value['sks'],1,0,'C');
			// 	        $pdf->Cell(27,11,$value['semester'],1,0,'C');
			// 	        $pdf->Cell(20,11,$value['kelas'],1,0,'C');
			// 	        $pdf->Cell(60,11,$value['dosen'],1,0,'J');
			// 	        $pdf->Cell(40,11,$value['ruang'],1,1,'J');
			// 	        // $pdf->Cell(45,11,$value['programstudi'],1,1,'J');
			// 	    }
	        // 	}
	        // 	else{
					
			//     	$pdf->cell(2);
		    //     	$pdf->Cell(10,11,$no++,1,0,'C');
			//         $pdf->Cell(15,11,$value['hari'],1,0,'J');
			//         $pdf->cell(30,11,$value['jam_kuliah'],1,0,'C');
			//         $pdf->cell(90,11,$value['nama_mk'],1,0,'J');
			//         $pdf->Cell(15,11,$value['sks'],1,0,'C');
			//         $pdf->Cell(27,11,$value['semester'],1,0,'C');
			//         $pdf->Cell(20,11,$value['kelas'],1,0,'C');
			//         $pdf->Cell(60,11,$value['dosen'],1,0,'J');
			//         $pdf->Cell(40,11,$value['ruang'],1,1,'J');
			//         // $pdf->Cell(45,11,$value['programstudi'],1,1,'J');
			//     }
	        // }
			foreach ($data as $key => $value) {
				$match = false;
				if ($field !== '' && $filter !== '' || $jadwal !=='') {
					if($jadwal !==''){
						if ($field == 'kelas') {
							// Check if all fields match
							if ($value['kelas'] == $filter['kelas'] && $value['tahun_angkatan'] == $filter['tahun_angkatan'] && $value['programstudi'] == $filter['programstudi']) {
								if($value['nama_jadwal'] == $jadwal){
									$match = true;
								}
							}
						} else {
							if ($value[$field] == $filter) {
								if($value['nama_jadwal'] == $jadwal){
									$match = true;
								}
							}
						}
					}
					else{
						if ($field == 'kelas') {
							// Check if all fields match
							if ($value['kelas'] == $filter['kelas'] && $value['tahun_angkatan'] == $filter['tahun_angkatan'] && $value['programstudi'] == $filter['programstudi']) {
								$match = true;
							}
						} else {
							if ($value[$field] == $filter) {
								$match = true;
							}
						}
					}
				} else {
					$match = true;
				}
	
				if ($match) {
					$pdf->cell(2);
					$pdf->Cell(10,11,$no++,1,0,'C');
					$pdf->Cell(15,11,$value['hari'],1,0,'J');
					$pdf->cell(30,11,$value['jam_kuliah'],1,0,'C');
					$pdf->cell(90,11,$value['nama_mk'],1,0,'J');
					$pdf->Cell(15,11,$value['sks'],1,0,'C');
					$pdf->Cell(27,11,$value['semester'],1,0,'C');
					$pdf->Cell(20,11,$value['kelas'],1,0,'C');
					$pdf->Cell(60,11,$value['dosen'],1,0,'J');
					$pdf->Cell(40,11,$value['ruang'],1,1,'J');
				}
			}
	
        
        $pdf->output();

	}
	public function jadwal(){
		$pdf = new FPDF('l','mm','LEGAL');

		$field = $this->input->get('field');
		$filter = $this->input->get('filter');

		// Decode JSON string for "kelas" filter
		if ($field == 'kelas') {
        	$filter = json_decode(urldecode($filter), true);
        }


		$dataJadwal = $this->db->query("SELECT * from tbl_jadwal");
        
    	$pdf->AddPage();
    	$pdf->SetFont('Times','B',14);
    		$pdf->Image(base_url('assets/img/logo/UNS.png'),60,9,40);
    		$pdf->SetFont('Times','',18);
	        $pdf->Cell(360,5,'DAFTAR JADWAL KULIAH D3 TEKNIK INFORMATIKA PSDKU',0,1,'C');
	        $pdf->Cell(360,9,'SEKOLAH VOKASI UNIVERSITAS SEBELAS MARET ',0,1,'C');
	        $pdf->Cell(360,9,'SEMESTER '.$semester,0,1,'C');
	        $pdf->Cell(360,9,'TAHUN AJARAN '.$tahun_akademik,0,1,'C');
			$pdf->SetFont('Times','I',12);
	        $pdf->cell(360,13,'Jl. Imam Bonjol, Sumbersoko, Pandean, Kec. Mejayan, Kabupaten Madiun, Jawa Timur 63153',0,1,'C');
	        $pdf->SetDrawColor(150,150,150);
			$pdf->SetLineWidth(1);
			$pdf->Line(20,55,350-20,55);
			$pdf->SetLineWidth(0);
			$pdf->Line(20,56,350-20,56);
	        $pdf->Ln(1);

			// Set left margin
			$leftMargin = 20; // Adjust this value as needed
			$topMargin = 65; // Adjust top margin as needed
			$pdf->SetLeftMargin($leftMargin);
			$pdf->SetY($topMargin);


	        $pdf->SetFont('Times','B',12);
	        $pdf->cell(2);
	        $pdf->Cell(10,11,'NO',1,0,'C');
	        $pdf->Cell(145,11,'NAMA',1,0,'C');
	        $pdf->Cell(145,11,'STATUS',1,1,'C');
	        // $pdf->Cell(45,11,'PROGRAM STUDI',1,1,'C');

	        $pdf->SetFont('Times','',12);

	        $data =  $this->db->query("SELECT * from tbl_jadwal")->result_array();

	        $no = 1;
	        // foreach ($data as $key => $value) {
	        // 	if ($field !== '' && $filter !== '') {
	        // 		if ($value[$field] == $filter) {
			
			//         	$pdf->cell(2);
			//         	$pdf->Cell(10,11,$no++,1,0,'C');
			// 	        $pdf->Cell(15,11,$value['hari'],1,0,'J');
			// 	        $pdf->cell(30,11,$value['jam_kuliah'],1,0,'C');
			// 	        $pdf->cell(90,11,$value['nama_mk'],1,0,'J');
			// 	        $pdf->Cell(15,11,$value['sks'],1,0,'C');
			// 	        $pdf->Cell(27,11,$value['semester'],1,0,'C');
			// 	        $pdf->Cell(20,11,$value['kelas'],1,0,'C');
			// 	        $pdf->Cell(60,11,$value['dosen'],1,0,'J');
			// 	        $pdf->Cell(40,11,$value['ruang'],1,1,'J');
			// 	        // $pdf->Cell(45,11,$value['programstudi'],1,1,'J');
			// 	    }
	        // 	}
	        // 	else{
					
			//     	$pdf->cell(2);
		    //     	$pdf->Cell(10,11,$no++,1,0,'C');
			//         $pdf->Cell(15,11,$value['hari'],1,0,'J');
			//         $pdf->cell(30,11,$value['jam_kuliah'],1,0,'C');
			//         $pdf->cell(90,11,$value['nama_mk'],1,0,'J');
			//         $pdf->Cell(15,11,$value['sks'],1,0,'C');
			//         $pdf->Cell(27,11,$value['semester'],1,0,'C');
			//         $pdf->Cell(20,11,$value['kelas'],1,0,'C');
			//         $pdf->Cell(60,11,$value['dosen'],1,0,'J');
			//         $pdf->Cell(40,11,$value['ruang'],1,1,'J');
			//         // $pdf->Cell(45,11,$value['programstudi'],1,1,'J');
			//     }
	        // }
			foreach ($data as $key => $value) {
					$pdf->cell(2);
					$pdf->Cell(10,11,$no++,1,0,'C');
					$pdf->Cell(145,11,$value['name'],1,0,'C');
					$pdf->Cell(145,11,$value['status'],1,1,'C');
			}
	
        
        $pdf->output();

	}
}
?>
