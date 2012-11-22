<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class collections extends Front_Controller {

	//--------------------------------------------------------------------


	public function __construct()
	{
		parent::__construct();

		$this->load->library('form_validation');
		$this->load->model('collections_model', null, true);
		$this->load->model('coins_model', null, true);
		$this->lang->load('collections');
		$this->lang->load('coins');
		
	}

	//--------------------------------------------------------------------



	/*
		Method: index()

		Displays a list of form data.
	*/
	public function index()
	{
		
		$records = $this->collections_model->where('collections_user_id',$this->current_user->id)->find_all();
		//$records = $this->collections_model->find_all();

		Template::set('records', $records);
		Template::render();
	}

	//--------------------------------------------------------------------




}