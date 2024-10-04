<?php 
/**
* 
*/
class Admin_models extends CI_Model
{
    function __construct(){
        parent::__construct();
        $this->db->query("SET sql_mode = '' ");
    }
    
	function ambilData($tbl){
        $res = $this->db->get($tbl)->result_array();
        return $res;
    }

    function ambilData_where($tbl,$where){
        $res = $this->db->get_where($tbl,$where);
        return $res->result_array();
    }

    function query($query){
    	$res = $this->db->query($query)->result_array();
    	return $res;
    }

    function cekJadwalPinaltyRuang($jam, $akhir, $hari, $ruang){
        $res = $this->db->query("SELECT COUNT(*) as total FROM tbl_jadwalkuliah WHERE id_jam BETWEEN $jam AND $akhir AND id_hari = '$hari' AND id_ruang = '$ruang'")->result_array();

        return $res[0]['total'];
    }

    function cekJadwalPinaltyDosen($jam, $akhir, $hari, $dosen){
        $res = $this->db->query("SELECT a.id FROM tbl_jadwalkuliah a LEFT JOIN tbl_pengampu b ON a.id_pengampu = b.id LEFT JOIN tbl_dosen c ON b.id_dosen = c.id WHERE a.id_jam BETWEEN $jam AND $akhir AND a.id_hari = '$hari' AND b.id_dosen = '$dosen'")->result_array();

        return $res;
    }

    function cekRuangBentrok($jam, $akhir, $hari){
        $res = $this->db->query("SELECT id_ruang FROM tbl_jadwalkuliah WHERE id_jam BETWEEN $jam AND $akhir AND id_hari = '$hari'")->result_array();

        return $res;
    }

	function ambilTotalData($tbl){
    	$res = $this->db->get($tbl)->num_rows();
    	return $res;
    }

    function ambilField_where($tbl,$where,$field){
        $this->db->select($field);
        $res = $this->db->get_where($tbl,$where);
        return $res->row();
    }

    function setTambah($table,$data){
        return $this->db->insert($table,$data);
    }

    function setUpdate($data,$where,$table){
        $this->db->set($data);
        $this->db->where($where);
        return $this->db->update($table);
    }

    function setHapus($table,$data){
        return $this->db->delete($table,$data);
    }

    function setHapusAllData($table){
        return $this->db->query("TRUNCATE $table");
    }

    function sendMsg($id, $json_msg) {
      echo "id: $id" . PHP_EOL;
      echo "event: update" . PHP_EOL;
      echo "data: $json_msg" . PHP_EOL;
      echo PHP_EOL;
      ob_flush();
      flush();
    //  usleep(10000); ////wait for 0.10 seconds
    }

	
	public function getJadwalKuliahByDay($hari) {
		$this->db->select('
			hari.nama as hari,
			jam.range_jam as jam_kuliah,
			matakuliah.nama,
			ruang.nama as ruang,
			dosen.nama as dosen,
			jadwal.kelas as kelas,
			matakuliah.semester as semester,
		');
		$this->db->from('tbl_jadwalkuliah as jadwal');
		$this->db->join('tbl_hari as hari', 'jadwal.id_hari = hari.id', 'left');
		$this->db->join('tbl_jam as jam', 'jadwal.id_jam = jam.id', 'left');
		$this->db->join('tbl_pengampu as pengampu', 'jadwal.id_pengampu = pengampu.id', 'left');
		$this->db->join('tbl_matakuliah as matakuliah', 'pengampu.id_mk = matakuliah.id', 'left');
		$this->db->join('tbl_ruang as ruang', 'jadwal.id_ruang = ruang.id', 'left');
		$this->db->join('tbl_dosen as dosen', 'pengampu.id_dosen = dosen.id', 'left');
		$this->db->join('tbl_kelas as kelas', 'jadwal.kelas = kelas.id', 'left');
		$this->db->join('tbl_jadwal as kuliah', 'jadwal.id_jadwal = kuliah.id', 'left');
    	$this->db->where('hari.nama', $hari);
    	$this->db->where('kuliah.status', 'aktif');
		
		$query = $this->db->get();
		return $query->result_array();
	}
	
	public function getKelasList() {
        $this->db->select('id, id_pengampu');
        $this->db->from('tbl_jadwalkuliah');
        $query = $this->db->get();
        return $query->result_array();
    }

	public function getSemesterList() {
        $this->db->select('id, id_mk');
        $this->db->from('tbl_pengampu');
        $query = $this->db->get();
        return $query->result_array();
    }

	public function getMataKuliahList($hari = null) {
		$this->db->select('DISTINCT(mk.nama) as nama_mk');
        $this->db->from('tbl_jadwalkuliah jk');
        $this->db->join('tbl_pengampu p', 'jk.id_pengampu = p.id', 'inner');
        $this->db->join('tbl_matakuliah mk', 'p.id_mk = mk.id', 'inner');
        if ($hari !== null) {
            $this->db->where('jk.id_hari', $hari);
        }
        $this->db->order_by('mk.nama', 'ASC');
        return $this->db->get()->result_array();
		error_log('Mata Kuliah List: ' . print_r($result, true));
		// if (!empty($filters['nama_mk'])) {
        //     $this->db->where('mk.nama', $filters['nama_mk']);
        // }
        // if (!empty($filters['dosen'])) {
        //     $this->db->where('d.nama', $filters['dosen']);
        // }
        // if (!empty($filters['semester'])) {
        //     $this->db->where('mk.semester', $filters['semester']);
        // }
        // if (!empty($filters['kelas'])) {
        //     $this->db->where('j.kelas', $filters['kelas']);
        // }
        // if (!empty($filters['ruang'])) {
        //     $this->db->where('j.ruang', $filters['ruang']);
        // }
    }

    function ambilDataPengampu(){
        $res = $this->db->query("SELECT tbl_pengampu.id as id, tbl_dosen.nama as nama FROM tbl_pengampu join tbl_dosen on tbl_pengampu.id_dosen = tbl_dosen.id")->result_array();

        return $res;
    }

    function ambilDataJadwal(){
        $res = $this->db->query("SELECT a.id as id,z.name as nama_jadwal,   b.id as id_pengampu,  g.id as id_jam,  f.id as id_ruang, e.id as id_hari, e.nama as hari, Concat_WS('-', MID(g.range_jam,1,5), (SELECT MID(range_jam,7,5) FROM tbl_jam WHERE id = (SELECT jm.id FROM tbl_jam jm WHERE MID(jm.range_jam,1,5) = MID(g.range_jam,1,5)) + (c.sks - 1))) as jam_kuliah, c.nama as nama_mk, c.sks as sks, c.semester as semester, a.kelas as kelas, d.nama as dosen, f.nama as ruang, h.nama as programstudi, i.tahun_angkatan as tahun_angkatan FROM tbl_jadwalkuliah a LEFT JOIN tbl_pengampu b ON a.id_pengampu = b.id LEFT JOIN tbl_matakuliah c ON b.id_mk = c.id LEFT JOIN tbl_dosen d ON b.id_dosen = d.id LEFT JOIN tbl_hari e ON a.id_hari = e.id LEFT JOIN tbl_ruang f ON a.id_ruang = f.id LEFT JOIN tbl_jam g ON a.id_jam = g.id LEFT JOIN tbl_prodi h ON c.id_prodi = h.id JOIN tbl_jadwal z on a.id_jadwal = z.id LEFT JOIN tbl_kelas i ON JSON_UNQUOTE(JSON_EXTRACT(b.kelas,'$[0][0]')) = i.id order by e.id asc,Jam_Kuliah asc;")->result_array();

        return $res;
    }
    function ambilDataJadwals(){
        $res = $this->db->query("SELECT * from tbl_jadwal ")->result_array();

        return $res;
    }

    function ambilDataJadwal_where($id){
        $res = $this->db->query("SELECT a.id as id, a.id_hari as id_hari, a.id_jam as id_jam, b.id_dosen as id_dosen, e.nama as hari, Concat_WS('-', MID(g.range_jam,1,5), (SELECT MID(range_jam,7,5) FROM tbl_jam WHERE id = (SELECT jm.id FROM tbl_jam jm WHERE MID(jm.range_jam,1,5) = MID(g.range_jam,1,5)) + (c.sks - 1))) as jam_kuliah, c.nama as nama_mk, c.sks as sks, c.semester as semester, a.kelas as kelas, d.nama as dosen, f.nama as ruang, h.nama as programstudi, i.tahun_angkatan as tahun_angkatan, e.kelas as jenis FROM tbl_jadwalkuliah a LEFT JOIN tbl_pengampu b ON a.id_pengampu = b.id LEFT JOIN tbl_matakuliah c ON b.id_mk = c.id LEFT JOIN tbl_dosen d ON b.id_dosen = d.id LEFT JOIN tbl_hari e ON a.id_hari = e.id LEFT JOIN tbl_ruang f ON a.id_ruang = f.id LEFT JOIN tbl_jam g ON a.id_jam = g.id LEFT JOIN tbl_prodi h ON c.id_prodi = h.id LEFT JOIN tbl_kelas i ON JSON_UNQUOTE(JSON_EXTRACT(b.kelas,'$[0][0]')) = i.id WHERE a.id = '$id' order by e.id asc,Jam_Kuliah asc")->result_array();

        return $res;
    }

    function ambilDataGenerateJadwal($jenis_semester,$tahun_akademik){
        $res = $this->db->query("SELECT a.id, b.sks, a.id_dosen, b.id_prodi, a.kelas FROM tbl_pengampu AS a LEFT JOIN tbl_matakuliah AS b ON a.id_mk = b.id WHERE b.semester % 2 = '$jenis_semester' AND a.tahun_akademik = '$tahun_akademik'");
        return $res;
    }

    function ambilJenisGenerateJadwal($jenis_semester,$tahun_akademik,$jurusan){
        $res = $this->db->query("SELECT CASE WHEN COUNT(b.jenis) > 0 THEN b.jenis END as jenis FROM tbl_pengampu AS a LEFT JOIN tbl_matakuliah AS b ON a.id_mk = b.id WHERE b.semester % 2 = '$jenis_semester' AND a.tahun_akademik = '$tahun_akademik' AND b.id_prodi = '$jurusan' GROUP by b.jenis");
        return $res->result_array();
    }

    function ambilTotalGenerateJadwal($jenis_semester,$jurusan){
        $res = $this->db->query("SELECT SUM(JSON_LENGTH(a.kelas)) as total FROM tbl_pengampu a LEFT JOIN tbl_matakuliah b ON a.id_mk = b.id WHERE b.semester % 2 = '$jenis_semester' AND b.id_prodi = '$jurusan'");
        return $res->result_array();
    }

    function filterJamSKS($dataJam, $rangeSholat, $sks, $hari=1){
        foreach ($rangeSholat as $k => $v) {
            foreach ($v as $val) {
                if ($hari == 5){
                        $excep[] = $val;
                }else{
                    if($k != 'jumat')
                    $excep[] = $val;
                }
            }
        }

        $excep[] = end($dataJam);
        $excep = array_values(array_unique($excep));

        $res = $dataJam;
        for ($i=0; $i < $sks; $i++) { 
            for ($j=0; $j < count($excep); $j++) { 
                $res = array_diff($res, [$excep[$j]-$i]);
            }
        }

        return $res;
    }

    function randomRuang(array $excluded = []){
        $rs_RuangReguler = $this->db->query("SELECT id FROM tbl_ruang WHERE jenis = 'TEORI'");
        $i               = 0;
        foreach ($rs_RuangReguler->result() as $data) {
            $ruangReguler[$i] = intval($data->id);
            $i++;
        }

        $jumlah_ruang_reguler = count($ruangReguler);

        do {
            $number = intval($ruangReguler[mt_rand(0, $jumlah_ruang_reguler - 1)]);
        } while (array_search($number, $excluded) !== false);

        return $number;
    }

    function randomJam($sks, $hari, $ruang, array $excluded = []){
         $kode_jumat = 5;
         $range_jumat = [10, 11, 12, 13];
         $range_dhuhur = [11, 12, 13];

        $rs_jam = $this->db->query("SELECT id FROM tbl_jam");
        $i      = 0;
        foreach ($rs_jam->result() as $data) {
            $jam[$i] = intval($data->id);
            $i++;
        }

        $jumlah_jam = count($jam);

        if ($hari == $kode_jumat) //bentrok sholat jumat
        {
            for ($d=1; $d < $sks; $d++) { 
                array_push($excluded, $range_jumat[0] - $d);
                array_push($excluded, $jumlah_jam - ($d-1));
            }
            $excluded = array_merge($excluded, $range_jumat);
        }else{ //bentrok sholat dhuhur
            for ($d=1; $d < $sks; $d++) { 
                array_push($excluded, $range_dhuhur[0] - $d);
                array_push($excluded, $jumlah_jam - ($d-1));
            }
            $excluded = array_merge($excluded, $range_dhuhur);
        }

        sort($excluded);

        do {
            $number = intval($jam[mt_rand(0, ($jumlah_jam - 1) - ($sks - 1))]);

            // cek bentrok ruangan di jam yang baru
            $ruangan = $this->cekRuangBentrok($number, $number + ($sks - 1), $hari);
            $array_ruang = array();

            foreach ($ruangan as $k => $v) {
                $array_ruang[] = $v['id_ruang'];
            }

        } while (array_search($number, $excluded) !== false || array_search($ruang, $array_ruang) !== false);
        return $number;
    }
}
 ?>
