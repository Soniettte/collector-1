<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class content extends Admin_Controller {

	//--------------------------------------------------------------------


	public function __construct()
	{
		parent::__construct();

		$this->auth->restrict('Collections.Content.View');
		$this->load->model('collections_model', null, true);
		$this->lang->load('collections');
		
		Template::set_block('sub_nav', 'content/_sub_nav');
	}

	//--------------------------------------------------------------------



	/*
		Method: index()

		Displays a list of form data.
	*/
	public function index()
	{

		// Deleting anything?
		if (isset($_POST['delete']))
		{
			$checked = $this->input->post('checked');

			if (is_array($checked) && count($checked))
			{
				$result = FALSE;
				foreach ($checked as $pid)
				{
					$result = $this->collections_model->delete($pid);
				}

				if ($result)
				{
					Template::set_message(count($checked) .' '. lang('collections_delete_success'), 'success');
				}
				else
				{
					Template::set_message(lang('collections_delete_failure') . $this->collections_model->error, 'error');
				}
			}
		}
		
		// Original: Trae todos los registros de la tabla collections
		$records = $this->collections_model->find_all();
		
		// Prueba 1: Trae sólo los registros de la tabla collections del usuario actual
		//$records = $this->collections_model->where('collections_user_id',$this->current_user->id)->find_all();
		
		
		// Prueba 2: Trae monedas haciendo un JOIN con la tabla collections. No funciona. Haciéndo esto desde el controlador del módulo coins, sí funcion
		//$this->db->join('collections', 'id = collections_coin_id', 'left');
		//$records = $this->coins_model->find_all();
		

		Template::set('records', $records);
		Template::set('toolbar_title', 'Manage Collections');
		Template::render();
	}

	//--------------------------------------------------------------------



	/*
		Method: create()

		Creates a Collections object.
	*/
	public function create()
	{
		$this->auth->restrict('Collections.Content.Create');

		if ($this->input->post('save'))
		{
			if ($insert_id = $this->save_collections())
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('collections_act_create_record').': ' . $insert_id . ' : ' . $this->input->ip_address(), 'collections');

				Template::set_message(lang('collections_create_success'), 'success');
				Template::redirect(SITE_AREA .'/content/collections');
			}
			else
			{
				Template::set_message(lang('collections_create_failure') . $this->collections_model->error, 'error');
			}
		}
		Assets::add_module_js('collections', 'collections.js');

		Template::set('toolbar_title', lang('collections_create') . ' Collections');
		Template::render();
	}

	//--------------------------------------------------------------------



	/*
		Method: edit()

		Allows editing of Collections data.
	*/
	public function edit()
	{
		$id = $this->uri->segment(5);

		if (empty($id))
		{
			Template::set_message(lang('collections_invalid_id'), 'error');
			redirect(SITE_AREA .'/content/collections');
		}

		if (isset($_POST['save']))
		{
			$this->auth->restrict('Collections.Content.Edit');

			if ($this->save_collections('update', $id))
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('collections_act_edit_record').': ' . $id . ' : ' . $this->input->ip_address(), 'collections');

				Template::set_message(lang('collections_edit_success'), 'success');
			}
			else
			{
				Template::set_message(lang('collections_edit_failure') . $this->collections_model->error, 'error');
			}
		}
		else if (isset($_POST['delete']))
		{
			$this->auth->restrict('Collections.Content.Delete');

			if ($this->collections_model->delete($id))
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('collections_act_delete_record').': ' . $id . ' : ' . $this->input->ip_address(), 'collections');

				Template::set_message(lang('collections_delete_success'), 'success');

				redirect(SITE_AREA .'/content/collections');
			} else
			{
				Template::set_message(lang('collections_delete_failure') . $this->collections_model->error, 'error');
			}
		}
		Template::set('collections', $this->collections_model->find($id));
		Assets::add_module_js('collections', 'collections.js');

		Template::set('toolbar_title', lang('collections_edit') . ' Collections');
		Template::render();
	}

	//--------------------------------------------------------------------


	//--------------------------------------------------------------------
	// !PRIVATE METHODS
	//--------------------------------------------------------------------

	/*
		Method: save_collections()

		Does the actual validation and saving of form data.

		Parameters:
			$type	- Either "insert" or "update"
			$id		- The ID of the record to update. Not needed for inserts.

		Returns:
			An INT id for successful inserts. If updating, returns TRUE on success.
			Otherwise, returns FALSE.
	*/
	private function save_collections($type='insert', $id=0)
	{
		if ($type == 'update') {
			$_POST['id'] = $id;
		}

		
		$this->form_validation->set_rules('collections_user_id','User','required|max_length[255]');
		$this->form_validation->set_rules('collections_coin_id','Coin','required|max_length[255]');
		$this->form_validation->set_rules('collections_have','Have','');
		$this->form_validation->set_rules('collections_wish','Wish','');
		$this->form_validation->set_rules('collections_options','Options','max_length[4]');

		if ($this->form_validation->run() === FALSE)
		{
			return FALSE;
		}

		// make sure we only pass in the fields we want
		
		$data = array();
		$data['collections_user_id']        = $this->input->post('collections_user_id');
		$data['collections_coin_id']        = $this->input->post('collections_coin_id');
		$data['collections_have']        = $this->input->post('collections_have');
		$data['collections_wish']        = $this->input->post('collections_wish');
		$data['collections_options']        = $this->input->post('collections_options');

		if ($type == 'insert')
		{
			$id = $this->collections_model->insert($data);

			if (is_numeric($id))
			{
				$return = $id;
			} else
			{
				$return = FALSE;
			}
		}
		else if ($type == 'update')
		{
			$return = $this->collections_model->update($id, $data);
		}

		return $return;
	}

	//--------------------------------------------------------------------



}