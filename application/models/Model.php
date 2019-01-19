<?php
	class Model extends CI_Model{
		
		public function __construct(){
			$this->load->database();
		}

		public function LoginUser() {
			$this->db->where('user', $this->input->post('username'));
			$this->db->where('pass', md5($this->input->post('pass')));
			$query = $this->db->get('tb_user');
			return $query->num_rows();
		}

		public function AmbilLevelUser(){
			$this->db->where('user', $this->input->post('username'));
			$this->db->where('pass', md5($this->input->post('pass')));
			$query = $this->db->get('tb_user');
			$level = '';
			foreach ($query->result_array() as $row) 
				$level = $row['level'];
			return $level;
		}

		public function AmbilJumlahMakanan() {
			$query = $this->db->get('tb_makanan');
			return $query->num_rows();
		}
		
		public function AmbilDaftarMakanan($limit, $start) {
			$output = ''; 
			$this->db->order_by('id_makanan', 'asc');
			$this->db->limit($limit, $start);
			$query = $this->db->get('tb_makanan');
			/*return $query->result_array();*/
			$output .= '<table id="tblData"class="table table-striped table-bordered table-paginate table-hover" width="100%">
                    <tr class="text-center" style="color: #004ca1;font-size: 15px;" >
                    	<td style="border-bottom: 3px solid #ddd;border-right: 1px solid #ddd;width: 20%; vertical-align:middle !important;"><b>ID Makanan</b></td>
                        <td style="border-bottom: 3px solid #ddd;border-right: 1px solid #ddd;width: 30%; vertical-align:middle !important;"><b>Nama Makanan</b></td>
                        <td style="border-bottom: 3px solid #ddd;border-right: 1px solid #ddd;width: 20%; vertical-align:middle !important;"><b>Harga</b></td>
                        <td style="border-bottom: 3px solid #ddd;border-right: 1px solid #ddd;width: 20%; vertical-align:middle !important;"><b>Status</b></td>
                        <td style="border-bottom: 3px solid #ddd;width: 10%;"><b>Opsi</b></td>
                    </tr>';
			foreach($query->result_array() as $row) {
	        	$output .= '<tr>
	        					<td style="border-right: 1px solid #ddd; vertical-align:middle !important;">' . $row['id_makanan'] . '</td>
                                <td style="border-right: 1px solid #ddd; vertical-align:middle !important;">' . $row['nama'] . '</td>
                                <td style="border-right: 1px solid #ddd; vertical-align:middle !important;">' . $row['harga'] . '</td>
                                <td style="border-right: 1px solid #ddd; vertical-align:middle !important;">' . $row['status'] . '</td>';
                $output .= '<td style=\'text-align: center; vertical-align:middle !important;\'><a href="'.base_url().'daftar-makanan/'.$row['id_makanan'].'" id="w3s"title="Edit Data"><img src="'.base_url().'assets/images/edit_icon.png" style="width: 20px;height: 20px;"></a>'
                                .'<a href="#" id="'.$row['id_makanan'].'" onclick="HapusData(this.id)" title="Hapus data"><img src="'.base_url().'assets/images/trash.png" style="width: 23px;height: 25px;"></a>'
                                .'</td></tr>';

	        }
	        $output .= '</table>';
	      	return $output;
		}

		public function HapusMakanan($id_makanan) {
			$this->db->where('id_makanan', $id_makanan);
			return $this->db->delete('tb_makanan');
		}

		public function SelectDaftarMakanan($id_makanan) {
			$this->db->where('id_makanan', $id_makanan);
			$query = $this->db->get('tb_makanan');
			return $query->row_array();
		}

		public function SimpanMakanan() {
			$data = array(
				"id_makanan" => $this->input->post('id_makanan'),
				"nama" => $this->input->post('nama'),
				"harga" => $this->input->post('harga'),
				"status" => $this->input->post('status')
			);
			$sql = 'INSERT INTO tb_makanan (id_makanan, nama, harga, status)
			        VALUES (?, ?, ?, ?)
			        ON DUPLICATE KEY UPDATE 
			            nama=VALUES(nama), 
			            harga=VALUES(harga), 
			            status=VALUES(status)';

			$query = $this->db->query($sql, $data);
		}

		public function AmbilJumlahMinuman() {
			$query = $this->db->get('tb_minuman');
			return $query->num_rows();
		}
		
		public function AmbilDaftarMinuman($limit, $start) {
			$output = ''; 
			$this->db->order_by('id_minuman', 'asc');
			$this->db->limit($limit, $start);
			$query = $this->db->get('tb_minuman');
			/*return $query->result_array();*/
			$output .= '<table id="tblData"class="table table-striped table-bordered table-paginate table-hover" width="100%">
                    <tr class="text-center" style="color: #004ca1;font-size: 15px;" >
                    	<td style="border-bottom: 3px solid #ddd;border-right: 1px solid #ddd;width: 20%; vertical-align:middle !important;"><b>ID minuman</b></td>
                        <td style="border-bottom: 3px solid #ddd;border-right: 1px solid #ddd;width: 30%; vertical-align:middle !important;"><b>Nama minuman</b></td>
                        <td style="border-bottom: 3px solid #ddd;border-right: 1px solid #ddd;width: 20%; vertical-align:middle !important;"><b>Harga</b></td>
                        <td style="border-bottom: 3px solid #ddd;border-right: 1px solid #ddd;width: 20%; vertical-align:middle !important;"><b>Status</b></td>
                        <td style="border-bottom: 3px solid #ddd;width: 10%;"><b>Opsi</b></td>
                    </tr>';
			foreach($query->result_array() as $row) {
	        	$output .= '<tr>
	        					<td style="border-right: 1px solid #ddd; vertical-align:middle !important;">' . $row['id_minuman'] . '</td>
                                <td style="border-right: 1px solid #ddd; vertical-align:middle !important;">' . $row['nama'] . '</td>
                                <td style="border-right: 1px solid #ddd; vertical-align:middle !important;">' . $row['harga'] . '</td>
                                <td style="border-right: 1px solid #ddd; vertical-align:middle !important;">' . $row['status'] . '</td>';
                $output .= '<td style=\'text-align: center; vertical-align:middle !important;\'><a href="'.base_url().'daftar-minuman/'.$row['id_minuman'].'" id="w3s"title="Edit Data"><img src="'.base_url().'assets/images/edit_icon.png" style="width: 20px;height: 20px;"></a>'
                                .'<a href="#" id="'.$row['id_minuman'].'" onclick="HapusData(this.id)" title="Hapus data"><img src="'.base_url().'assets/images/trash.png" style="width: 23px;height: 25px;"></a>'
                                .'</td></tr>';

	        }
	        $output .= '</table>';
	      	return $output;
		}

		public function HapusMinuman($id_minuman) {
			$this->db->where('id_minuman', $id_minuman);
			return $this->db->delete('tb_minuman');
		}

		public function SelectDaftarMinuman($id_minuman) {
			$this->db->where('id_minuman', $id_minuman);
			$query = $this->db->get('tb_minuman');
			return $query->row_array();
		}

		public function SimpanMinuman() {
			$data = array(
				"id_minuman" => $this->input->post('id_minuman'),
				"nama" => $this->input->post('nama'),
				"harga" => $this->input->post('harga'),
				"status" => $this->input->post('status')
			);
			$sql = 'INSERT INTO tb_minuman (id_minuman, nama, harga, status)
			        VALUES (?, ?, ?, ?)
			        ON DUPLICATE KEY UPDATE 
			            nama=VALUES(nama), 
			            harga=VALUES(harga), 
			            status=VALUES(status)';

			$query = $this->db->query($sql, $data);
		}

		public function SetKodePesanan() {
			$query = $this->db->query("SELECT COUNT(id_pesanan) as count FROM tb_pesanan");
			return $query->row_array() ;
		}
	}