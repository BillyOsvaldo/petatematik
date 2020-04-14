<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Odp extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		if (!$this->session->userdata('users')) {
			redirect('/login');
		}
	}
	
	public function index()
	{
		$results = [];
		$area = $this->_get_area();

		$peoples = $this->people->all();

		for($i = 0; $i < count($peoples); $i++) {
			$results[$i] = $peoples[$i];
			$results[$i]->district_name = $this->_filter_by_id($area, $peoples[$i]->district_id)['name'];
			$results[$i]->subdistrict_name = $this->_filter_by_id($area, $peoples[$i]->subdistrict_id)['name'];
			$results[$i]->village_name = $this->_filter_by_id($area, $peoples[$i]->village_id)['name'];
		}

        $data = array(
			'container' => 'admin/odp/index',
			'peoples' => $results
        );
		$this->load->view('layouts/app', $data);
	}

	public function show($id) 
	{
		$area = $this->_get_area();

		$peoples = $this->people->find($id);
		$peoples->district_name = $this->_filter_by_id($area, $peoples->district_id)['name'];
		$peoples->subdistrict_name = $this->_filter_by_id($area, $peoples->subdistrict_id)['name'];
		$peoples->village_name = $this->_filter_by_id($area, $peoples->village_id)['name'];
		
		$data = array(
			'container' => 'admin/odp/show',
			'people' => $peoples
        );
		$this->load->view('layouts/app', $data);
	}

	public function create()
	{
		$array = $this->_get_area();
		$data = array(
			'container' => 'admin/odp/create',
			'subdistricts' => $this->_filter_by_parent_id($array, "33345")
        );
		$this->load->view('layouts/app', $data);
	}

	public function store()
	{
		$data = $this->input->post();
		$data_id = $this->_integration_tateng_prov("create", $data);
		$data['data_id'] = $data_id;
		
		$result = $this->people->create($data);
		$this->session->set_flashdata('success', true);
		redirect('/admin/odp');
	}

	public function edit($id)
	{
		$result = $this->people->find($id);
		$array = $this->_get_area();
		$data = array(
			'container' => 'admin/odp/edit',
			'data' => $result,
			'subdistricts' => $this->_filter_by_parent_id($array, "33345"),
			'vilages' => $this->_filter_by_parent_id($array, $result->subdistrict_id)
        );
		$this->load->view('layouts/app', $data);
	}

	public function update($id)
	{
		$data = $this->input->post();
		$data_id = $this->_integration_tateng_prov("update", $data);
		$result = $this->people->update($id, $data);
		$this->session->set_flashdata('success', true);
		redirect('/admin/odp');
	}

	public function delete($id)
	{
		$data = $this->people->find($id);
		$this->_integration_tateng_prov('delete', [
			"data_id" => $data->data_id
		]);

		$this->people->delete($id);
		$this->session->set_flashdata('success', true);
		redirect('/admin/odp');
	}

	public function imported()
	{
		include APPPATH.'third_party/PHPExcel/PHPExcel.php';

        $config['upload_path'] = realpath('excel');
        $config['allowed_types'] = 'xlsx|xls|csv';
        $config['max_size'] = '10000';
        $config['encrypt_name'] = true;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('files')) {
			$this->session->set_flashdata('failed', 'Proses import data gagal!!');
        } else {

            $data_upload = $this->upload->data();
            $excelreader = new PHPExcel_Reader_Excel2007();
            $loadexcel = $excelreader->load('excel/'.$data_upload['file_name']);
            $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);

			$data = array();
			$area = $this->_get_area();

			$numrow = 1;
            foreach($sheet as $row){
				if($numrow > 1){
					array_push($data, array(
                        'nama' => $row['A'],
                        'district_id' => $this->_filter_by_name($area, $row['B'], '2')['id'],
						'subdistrict_id' => $this->_filter_by_name($area, $row['C'], '3')['id'],
						'village_id' => $this->_filter_by_name($area, $row['D'], '4')['id'],
						'alamat' => $row['E'],
						'umur' => $row['F'],
						'jenis_kelamin' => $row['G'],
						'no_hp' => $row['H'],
						'riwayat_perjalanan_negara' => $row['I'],
						'tgl_sampai_di_indonesia' => $row['J'],
						'pemantauan_awal' => $row['K'],
						'pemantauan_akhir' => $row['L'],
						'gejala' => $row['M'],
						'kondisi_umum_akhir' => $row['N'],
						'keterangan' => $row['O']
                    ));
                }
            	$numrow++;
            }
            $this->db->insert_batch('peoples', $data);
            unlink(realpath('excel'.$data_upload['file_name']));

            $this->session->set_flashdata('success', true);
		}
		redirect('admin/odp');
	}

	public function area()
	{
		header('Content-Type:application/json');
		$data = $this->_get_area();

		$id = $this->input->get('id');
		if ($id != null) {
			echo json_encode($this->_filter_by_id($data, $id));
		}

		$parentId = $this->input->get('parentId');
		if ($parentId != null) {
			echo json_encode($this->_filter_by_parent_id($data, $parentId));
		}
	}

	private function _integration_tateng_prov($action, $data = array())
	{
		$data["username"] = "purbalinggakab@tanggap.in";
		$data["password"] = "71r605367";
		
		$data_string = "";
		foreach ($data as $key => $val) {
			$data_string .= $key . '=' . $val . '&';
		}
		rtrim($data_string, '&');

		$url = "";
		if ($action == "create") {
			$url = "http://api.jatengprov.go.id/covid/insertodp";
		} else 
		if ($action == "update") {
			$url = "http://api.jatengprov.go.id/covid/updateodp";
		} else 
		if ($action == "delete") {
			$url = "http://api.jatengprov.go.id/covid/deleteodp";
		}
		
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_POST, count($data));
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
		$response = curl_exec($ch);
		
		curl_close($ch);

		$result = json_decode($response);
		return $result->data_id;
	}

	private function _get_area() {
		$parentId = $this->input->get('parentId'); 
		$id = $this->input->get('id');

		$url = "http://api.jatengprov.go.id/covid/area";
		
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_URL, $url);
		
		$data = curl_exec($ch);
		curl_close($ch);

		return $data;
	}

	private function _filter_by_id($data, $id) {
		$results = [];
		foreach (json_decode($data) as $val) {
				
			if ($val->id == $id) {
				$results = array(
					"id" => $val->id,
					"name" => $val->name,
					"parent_id" => $val->parent_id,
					"level" => $val->level
				);
			}
		} 
			
		return $results;
	}

	private function _filter_by_parent_id($data, $parentId) {
		$i = 0;
		$results = [];
		foreach (json_decode($data) as $val) {
				
			if ($val->parent_id == $parentId) {
				$results[$i] = array(
					"id" => $val->id,
					"name" => $val->name,
					"parent_id" => $val->parent_id,
					"level" => $val->level
				);
				$i++;
			}
		} 
			
		return $results;
	}

	private function _filter_by_name($data, $name, $lv) {
		$results = [];
		foreach(json_decode($data) as $val) {

			if ($val->name == $name && $val->level == $lv) {
				$results = array(
					"id" => $val->id,
					"name" => $val->name,
					"parent_id" => $val->parent_id,
					"level" => $val->level
				);
			}
		}
		return $results;
	}
}
