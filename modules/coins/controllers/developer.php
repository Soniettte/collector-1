<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class developer extends Admin_Controller {

	//--------------------------------------------------------------------


	public function __construct()
	{
		parent::__construct();

		$this->auth->restrict('Coins.Developer.View');
		$this->load->model('coins_model', null, true);
		$this->lang->load('coins');
		
		Template::set_block('sub_nav', 'developer/_sub_nav');
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
					$result = $this->coins_model->delete($pid);
				}

				if ($result)
				{
					Template::set_message(count($checked) .' '. lang('coins_delete_success'), 'success');
				}
				else
				{
					Template::set_message(lang('coins_delete_failure') . $this->coins_model->error, 'error');
				}
			}
		}

		$records = $this->coins_model->find_all();

		Template::set('records', $records);
		Template::set('toolbar_title', 'Manage Coins');
		Template::render();
	}

	//--------------------------------------------------------------------



	/*
		Method: create()

		Creates a Coins object.
	*/
	public function create()
	{
		$this->auth->restrict('Coins.Developer.Create');

		if ($this->input->post('save'))
		{
			if ($insert_id = $this->save_coins())
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('coins_act_create_record').': ' . $insert_id . ' : ' . $this->input->ip_address(), 'coins');

				Template::set_message(lang('coins_create_success'), 'success');
				Template::redirect(SITE_AREA .'/developer/coins');
			}
			else
			{
				Template::set_message(lang('coins_create_failure') . $this->coins_model->error, 'error');
			}
		}
		Assets::add_module_js('coins', 'coins.js');

		Template::set('toolbar_title', lang('coins_create') . ' Coins');
		Template::render();
	}

	//--------------------------------------------------------------------



	/*
		Method: edit()

		Allows editing of Coins data.
	*/
	public function edit()
	{
		$id = $this->uri->segment(5);

		if (empty($id))
		{
			Template::set_message(lang('coins_invalid_id'), 'error');
			redirect(SITE_AREA .'/developer/coins');
		}

		if (isset($_POST['save']))
		{
			$this->auth->restrict('Coins.Developer.Edit');

			if ($this->save_coins('update', $id))
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('coins_act_edit_record').': ' . $id . ' : ' . $this->input->ip_address(), 'coins');

				Template::set_message(lang('coins_edit_success'), 'success');
			}
			else
			{
				Template::set_message(lang('coins_edit_failure') . $this->coins_model->error, 'error');
			}
		}
		else if (isset($_POST['delete']))
		{
			$this->auth->restrict('Coins.Developer.Delete');

			if ($this->coins_model->delete($id))
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('coins_act_delete_record').': ' . $id . ' : ' . $this->input->ip_address(), 'coins');

				Template::set_message(lang('coins_delete_success'), 'success');

				redirect(SITE_AREA .'/developer/coins');
			} else
			{
				Template::set_message(lang('coins_delete_failure') . $this->coins_model->error, 'error');
			}
		}
		Template::set('coins', $this->coins_model->find($id));
		Assets::add_module_js('coins', 'coins.js');

		Template::set('toolbar_title', lang('coins_edit') . ' Coins');
		Template::render();
	}

	//--------------------------------------------------------------------


	//--------------------------------------------------------------------
	// !PRIVATE METHODS
	//--------------------------------------------------------------------

	/*
		Method: save_coins()

		Does the actual validation and saving of form data.

		Parameters:
			$type	- Either "insert" or "update"
			$id		- The ID of the record to update. Not needed for inserts.

		Returns:
			An INT id for successful inserts. If updating, returns TRUE on success.
			Otherwise, returns FALSE.
	*/
	private function save_coins($type='insert', $id=0)
	{
		if ($type == 'update') {
			$_POST['id'] = $id;
		}

		
		$this->form_validation->set_rules('coins_value','Value','required');
		$this->form_validation->set_rules('coins_country','Country','required');
		$this->form_validation->set_rules('coins_year','Year','required|max_length[4]');
		$this->form_validation->set_rules('coins_title','Title','max_length[50]');
		$this->form_validation->set_rules('coins_varient','Varient','max_length[50]');
		$this->form_validation->set_rules('coins_national_side','Picture National Side','max_length[250]');
		$this->form_validation->set_rules('coins_common_side','Picture Common Side','max_length[250]');

		if ($this->form_validation->run() === FALSE)
		{
			return FALSE;
		}

		// make sure we only pass in the fields we want
		
		$data = array();
		$data['coins_value']        = $this->input->post('coins_value');
		$data['coins_country']        = $this->input->post('coins_country');
		$data['coins_year']        = $this->input->post('coins_year');
		$data['coins_title']        = $this->input->post('coins_title');
		$data['coins_varient']        = $this->input->post('coins_varient');
		$data['coins_national_side']        = $this->input->post('coins_national_side');
		$data['coins_common_side']        = $this->input->post('coins_common_side');

		if ($type == 'insert')
		{
			$id = $this->coins_model->insert($data);

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
			$return = $this->coins_model->update($id, $data);
		}

		return $return;
	}

	//--------------------------------------------------------------------



}