<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Load Dependencies
		$this->load->model('Contact_m');
		$this->load->model('Relation_m');
		$this->load->model('Contacts_relation_m');
		$this->load->library('ion_auth');
		$this->load->library('session');

	}

	// List all your items
	public function index( $offset = 0 )
	{
		if ($this->ion_auth->is_admin()) {
			redirect('auth','refresh');
		}
		$contacts = $this->Contact_m->get_many_by(array('user_id'=>$this->session->userdata('user_id')));
		// var_dump($contacts);die();
		$data['contacts'] = $contacts;
		$this->load->view('dashboard/dashboard', $data);

	}

	// Add a new item
	public function add()
	{
		$relations = $this->Relation_m->get_all();
		if (isset($_POST['submit'])){
			$this->load->library('session');
		 $contact = array(
		 				'Name' => $this->input->post('name'),
		 				'mobile_no' => $this->input->post('mobile'),
		 				'phone_no' => $this->input->post('phone'),
		 				'email'	=> $this->input->post('email'),
		 				'user_id' => $this->session->userdata('user_id'),
		 	);
		 	if ($this->Contact_m->get_by(array('email' => $contact['email']))) {
		 		$contact['error'] = 'email already exists';
		 		$contact['relations'] = $relations;
		 		$this->load->view('dashboard/contact_form', $contact);
		 	}
		 	else{				
			 	if ($contact_id = $this->Contact_m->insert($contact)){
			 		if ($id = $this->Contacts_relation_m->insert(array('contact_id' => $contact_id, 'relation_id' => $this->input->post('group') ))) {
			 			redirect('dashboard/index','refresh');
			 		}
			 		
			 	}
	 			// $this->load->view('dashboard/index', $data);
			}
		}
		else{
			$data['relations'] = $relations;
			$this->load->view('dashboard/contact_form',$data);
		}

	}

	//Update one item
	public function update(  )
	{
		if (!empty($id = $this->uri->segment(3)) && isset($id)) {
				if(isset($_POST['submit'])){	
					$contact = array(
							'id'  => $id,
							'Name' => $this->input->post('name'),
			 				'mobile_no' => $this->input->post('mobile'),
			 				'phone_no' => $this->input->post('phone'),
			 				'email'	=> $this->input->post('email')
						);
					$data['contact'] =(object) $contact;
					if ($this->Contact_m->get_by(array('email' => $contact['email']))) {
		 				$data['error'] = 'email already exists';
		 				$this->load->view('dashboard/update', $data);
		 			}
					elseif ($this->Contact_m->get($id)->user_id == $this->session->userdata('user_id')) {
						if($this->Contact_m->update($id,$contact)){
							// echo 'data updated';
							redirect('dashboard','refresh');						
						}
					}
					else{
						echo 'permissoin denied';
					}
					
				}
				else{
					$data['contact'] = $this->Contact_m->get($id);
					$data['contact']->all_relations = $this->Relation_m->get_all();
					$contact_relation_id = $this->Contacts_relation_m->get_by( 'contact_id' ,$id);//var_dump($contact_relation_id);die();
					$relation_id = $contact_relation_id->relation_id;
					$data['contact']->relation_id = $relation_id;
					// var_dump($data);die();
					$this->load->view('dashboard/update', $data);
				}
			}
			else{
				$this->load->view('dashboard/dashboard');
			}
	}

	//Delete one item
	public function delete( $id = NULL )
	{
		
		$this->load->helper('url');
		if ($this->Contact_m->get($id = $this->uri->segment(3))->user_id == $this->session->userdata('user_id')) {
			if($this->Contact_m->delete($id)){
				echo 'data deleted';
				redirect('dashboard','refresh');						
			}
		}
		else{
			echo 'permissoin denied';
		}
		// $this->Contact_m->delete($this->uri->segment(3));
		// redirect('dashboard','refresh');

	}

	public function view()
	{
		$id = $this->uri->segment(3);
		$contact_details = $this->Contact_m->get($id);
		$data['contact_details'] = $contact_details;
		$contact_relation_id = $this->Contacts_relation_m->get_by( 'contact_id' ,$id);//var_dump($contact_relation_id);die();
		$relation_id = $contact_relation_id->relation_id;
		$data['contact_details']->relation_type = $this->Relation_m->get($relation_id)->type;
		$this->load->view('dashboard/view',$data);
	}
	public function showmessage()
	{
		$this->load->library('mylib');
		$this->mylib->show();
	}
}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */
