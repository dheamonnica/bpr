<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Pengajuan Kredit Controller
*| --------------------------------------------------------------------------
*| Pengajuan Kredit site
*|
*/
class Pengajuan_kredit extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_pengajuan_kredit');
		$this->load->model('group/model_group');
		$this->lang->load('web_lang', $this->current_lang);
	}

	/**
	* show all Pengajuan Kredits
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('pengajuan_kredit_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['pengajuan_kredits'] = $this->model_pengajuan_kredit->get($filter, $field, $this->limit_page, $offset);
		$this->data['pengajuan_kredit_counts'] = $this->model_pengajuan_kredit->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/pengajuan_kredit/index/',
			'total_rows'   => $this->data['pengajuan_kredit_counts'],
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Pengajuan Kredit List');
		$this->render('backend/standart/administrator/pengajuan_kredit/pengajuan_kredit_list', $this->data);
	}
	
	/**
	* Add new pengajuan_kredits
	*
	*/
	public function add()
	{
		$this->is_allowed('pengajuan_kredit_add');

		$this->template->title('Pengajuan Kredit New');
		$this->render('backend/standart/administrator/pengajuan_kredit/pengajuan_kredit_add', $this->data);
	}

	/**
	* Add New Pengajuan Kredits
	*
	* @return JSON
	*/
	public function add_save()
	{
		if (!$this->is_allowed('pengajuan_kredit_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
		
		

		$this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'trim|required|max_length[250]');
		

		$this->form_validation->set_rules('pengajuan_kredit_file_ktp_name', 'File Ktp', 'trim|required');
		

		$this->form_validation->set_rules('no_hp', 'No Hp', 'trim|required|max_length[12]');
		

		$this->form_validation->set_rules('jumlah_pinjaman', 'Jumlah Pinjaman', 'trim|required|max_length[15]');
		

		$this->form_validation->set_rules('jangka_waktu', 'Jangka Waktu', 'trim|required|max_length[50]');
		

		$this->form_validation->set_rules('jenis_pinjaman', 'Jenis Pinjaman', 'trim|required|max_length[50]');
		

		

		if ($this->form_validation->run()) {
			$pengajuan_kredit_file_ktp_uuid = $this->input->post('pengajuan_kredit_file_ktp_uuid');
			$pengajuan_kredit_file_ktp_name = $this->input->post('pengajuan_kredit_file_ktp_name');
		
			$save_data = [
				'nama_lengkap' => $this->input->post('nama_lengkap'),
				'no_hp' => $this->input->post('no_hp'),
				'jumlah_pinjaman' => $this->input->post('jumlah_pinjaman'),
				'jangka_waktu' => $this->input->post('jangka_waktu'),
				'jenis_pinjaman' => $this->input->post('jenis_pinjaman'),
			];

			
			



			
			if (!is_dir(FCPATH . '/uploads/pengajuan_kredit/')) {
				mkdir(FCPATH . '/uploads/pengajuan_kredit/');
			}

			if (!empty($pengajuan_kredit_file_ktp_name)) {
				$pengajuan_kredit_file_ktp_name_copy = date('YmdHis') . '-' . $pengajuan_kredit_file_ktp_name;

				rename(FCPATH . 'uploads/tmp/' . $pengajuan_kredit_file_ktp_uuid . '/' . $pengajuan_kredit_file_ktp_name, 
						FCPATH . 'uploads/pengajuan_kredit/' . $pengajuan_kredit_file_ktp_name_copy);

				if (!is_file(FCPATH . '/uploads/pengajuan_kredit/' . $pengajuan_kredit_file_ktp_name_copy)) {
					echo json_encode([
						'success' => false,
						'message' => 'Error uploading file'
						]);
					exit;
				}

				$save_data['file_ktp'] = $pengajuan_kredit_file_ktp_name_copy;
			}
		
			
			$save_pengajuan_kredit = $id = $this->model_pengajuan_kredit->store($save_data);
            

			if ($save_pengajuan_kredit) {
				
				
					
				
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_pengajuan_kredit;
					$this->data['message'] = cclang('success_save_data_stay', [
						anchor('administrator/pengajuan_kredit/edit/' . $save_pengajuan_kredit, 'Edit Pengajuan Kredit'),
						anchor('administrator/pengajuan_kredit', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						anchor('administrator/pengajuan_kredit/edit/' . $save_pengajuan_kredit, 'Edit Pengajuan Kredit')
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/pengajuan_kredit');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/pengajuan_kredit');
				}
			}

		} else {
			$this->data['success'] = false;
			$this->data['message'] = 'Opss validation failed';
			$this->data['errors'] = $this->form_validation->error_array();
		}

		$this->response($this->data);
	}
	
		/**
	* Update view Pengajuan Kredits
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('pengajuan_kredit_update');

		$this->data['pengajuan_kredit'] = $this->model_pengajuan_kredit->find($id);

		$this->template->title('Pengajuan Kredit Update');
		$this->render('backend/standart/administrator/pengajuan_kredit/pengajuan_kredit_update', $this->data);
	}

	/**
	* Update Pengajuan Kredits
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('pengajuan_kredit_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
				$this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'trim|required|max_length[250]');
		

		$this->form_validation->set_rules('pengajuan_kredit_file_ktp_name', 'File Ktp', 'trim|required');
		

		$this->form_validation->set_rules('no_hp', 'No Hp', 'trim|required|max_length[12]');
		

		$this->form_validation->set_rules('jumlah_pinjaman', 'Jumlah Pinjaman', 'trim|required|max_length[15]');
		

		$this->form_validation->set_rules('jangka_waktu', 'Jangka Waktu', 'trim|required|max_length[50]');
		

		$this->form_validation->set_rules('jenis_pinjaman', 'Jenis Pinjaman', 'trim|required|max_length[50]');
		

		
		if ($this->form_validation->run()) {
			$pengajuan_kredit_file_ktp_uuid = $this->input->post('pengajuan_kredit_file_ktp_uuid');
			$pengajuan_kredit_file_ktp_name = $this->input->post('pengajuan_kredit_file_ktp_name');
		
			$save_data = [
				'nama_lengkap' => $this->input->post('nama_lengkap'),
				'no_hp' => $this->input->post('no_hp'),
				'jumlah_pinjaman' => $this->input->post('jumlah_pinjaman'),
				'jangka_waktu' => $this->input->post('jangka_waktu'),
				'jenis_pinjaman' => $this->input->post('jenis_pinjaman'),
			];

			

			


			
			if (!is_dir(FCPATH . '/uploads/pengajuan_kredit/')) {
				mkdir(FCPATH . '/uploads/pengajuan_kredit/');
			}

			if (!empty($pengajuan_kredit_file_ktp_uuid)) {
				$pengajuan_kredit_file_ktp_name_copy = date('YmdHis') . '-' . $pengajuan_kredit_file_ktp_name;

				rename(FCPATH . 'uploads/tmp/' . $pengajuan_kredit_file_ktp_uuid . '/' . $pengajuan_kredit_file_ktp_name, 
						FCPATH . 'uploads/pengajuan_kredit/' . $pengajuan_kredit_file_ktp_name_copy);

				if (!is_file(FCPATH . '/uploads/pengajuan_kredit/' . $pengajuan_kredit_file_ktp_name_copy)) {
					echo json_encode([
						'success' => false,
						'message' => 'Error uploading file'
						]);
					exit;
				}

				$save_data['file_ktp'] = $pengajuan_kredit_file_ktp_name_copy;
			}
		
			
			$save_pengajuan_kredit = $this->model_pengajuan_kredit->change($id, $save_data);

			if ($save_pengajuan_kredit) {

				

				
				
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						anchor('administrator/pengajuan_kredit', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/pengajuan_kredit');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/pengajuan_kredit');
				}
			}
		} else {
			$this->data['success'] = false;
			$this->data['message'] = 'Opss validation failed';
			$this->data['errors'] = $this->form_validation->error_array();
		}

		$this->response($this->data);
	}
	
	/**
	* delete Pengajuan Kredits
	*
	* @var $id String
	*/
	public function delete($id = null)
	{
		$this->is_allowed('pengajuan_kredit_delete');

		$this->load->helper('file');

		$arr_id = $this->input->get('id');
		$remove = false;

		if (!empty($id)) {
			$remove = $this->_remove($id);
		} elseif (count($arr_id) >0) {
			foreach ($arr_id as $id) {
				$remove = $this->_remove($id);
			}
		}

		if ($remove) {
            set_message(cclang('has_been_deleted', 'pengajuan_kredit'), 'success');
        } else {
            set_message(cclang('error_delete', 'pengajuan_kredit'), 'error');
        }

		redirect_back();
	}

		/**
	* View view Pengajuan Kredits
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('pengajuan_kredit_view');

		$this->data['pengajuan_kredit'] = $this->model_pengajuan_kredit->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Pengajuan Kredit Detail');
		$this->render('backend/standart/administrator/pengajuan_kredit/pengajuan_kredit_view', $this->data);
	}
	
	/**
	* delete Pengajuan Kredits
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$pengajuan_kredit = $this->model_pengajuan_kredit->find($id);

		if (!empty($pengajuan_kredit->file_ktp)) {
			$path = FCPATH . '/uploads/pengajuan_kredit/' . $pengajuan_kredit->file_ktp;

			if (is_file($path)) {
				$delete_file = unlink($path);
			}
		}
		
		
		return $this->model_pengajuan_kredit->remove($id);
	}
	
	/**
	* Upload Image Pengajuan Kredit	* 
	* @return JSON
	*/
	public function upload_file_ktp_file()
	{
		if (!$this->is_allowed('pengajuan_kredit_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$uuid = $this->input->post('qquuid');

		echo $this->upload_file([
			'uuid' 		 	=> $uuid,
			'table_name' 	=> 'pengajuan_kredit',
		]);
	}

	/**
	* Delete Image Pengajuan Kredit	* 
	* @return JSON
	*/
	public function delete_file_ktp_file($uuid)
	{
		if (!$this->is_allowed('pengajuan_kredit_delete', false)) {
			echo json_encode([
				'success' => false,
				'error' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		echo $this->delete_file([
            'uuid'              => $uuid, 
            'delete_by'         => $this->input->get('by'), 
            'field_name'        => 'file_ktp', 
            'upload_path_tmp'   => './uploads/tmp/',
            'table_name'        => 'pengajuan_kredit',
            'primary_key'       => 'id',
            'upload_path'       => 'uploads/pengajuan_kredit/'
        ]);
	}

	/**
	* Get Image Pengajuan Kredit	* 
	* @return JSON
	*/
	public function get_file_ktp_file($id)
	{
		if (!$this->is_allowed('pengajuan_kredit_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => 'Image not loaded, you do not have permission to access'
				]);
			exit;
		}

		$pengajuan_kredit = $this->model_pengajuan_kredit->find($id);

		echo $this->get_file([
            'uuid'              => $id, 
            'delete_by'         => 'id', 
            'field_name'        => 'file_ktp', 
            'table_name'        => 'pengajuan_kredit',
            'primary_key'       => 'id',
            'upload_path'       => 'uploads/pengajuan_kredit/',
            'delete_endpoint'   => 'administrator/pengajuan_kredit/delete_file_ktp_file'
        ]);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('pengajuan_kredit_export');

		$this->model_pengajuan_kredit->export(
			'pengajuan_kredit', 
			'pengajuan_kredit',
			$this->model_pengajuan_kredit->field_search
		);
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('pengajuan_kredit_export');

		$this->model_pengajuan_kredit->pdf('pengajuan_kredit', 'pengajuan_kredit');
	}


	public function single_pdf($id = null)
	{
		$this->is_allowed('pengajuan_kredit_export');

		$table = $title = 'pengajuan_kredit';
		$this->load->library('HtmlPdf');
      
        $config = array(
            'orientation' => 'p',
            'format' => 'a4',
            'marges' => array(5, 5, 5, 5)
        );

        $this->pdf = new HtmlPdf($config);
        $this->pdf->setDefaultFont('stsongstdlight'); 

        $result = $this->db->get($table);
       
        $data = $this->model_pengajuan_kredit->find($id);
        $fields = $result->list_fields();

        $content = $this->pdf->loadHtmlPdf('core_template/pdf/pdf_single', [
            'data' => $data,
            'fields' => $fields,
            'title' => $title
        ], TRUE);

        $this->pdf->initialize($config);
        $this->pdf->pdf->SetDisplayMode('fullpage');
        $this->pdf->writeHTML($content);
        $this->pdf->Output($table.'.pdf', 'H');
	}

	
}


/* End of file pengajuan_kredit.php */
/* Location: ./application/controllers/administrator/Pengajuan Kredit.php */