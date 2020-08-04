<?php defined('BASEPATH') OR exit('No direct script access allowed');


  use paragraph1\phpFCM\Client;
	use paragraph1\phpFCM\Message;
	use paragraph1\phpFCM\Recipient\Topic;
	use paragraph1\phpFCM\Recipient\Device;
	use paragraph1\phpFCM\Notification;

	require_once 'vendor/autoload.php';

class Main extends CI_Controller {

	public function __construct(){
		parent::__construct();
	    $this->load->database();
	    $this->load->library(array('ion_auth', 'form_validation','pagination'));
	    $this->load->helper(array('url', 'language'));
	    $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
	    $this->lang->load('auth');
	    $this->load->model(array('Main_model','Node_model','Wallet_model','Agents_model'));
	    if(!$this->ion_auth->logged_in()){
	    	redirect('auth/login','refresh');
	    }
	}

	public function get_agents(){
	   	#pagination
	   	$config = array();
	    $config["base_url"] = base_url()."main/get_agents";
	    $config["total_rows"] = $this->Agents_model->get_agent_count();
	    $config["per_page"] = 8;
	    $config["uri_segment"] = 3;
	    $this->pagination->initialize($config);
	    $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
	    $this->data["links"] = $this->pagination->create_links();
	    $this->pagination->initialize($config);
	    $this->data['users'] = $this->Agents_model->get_list_agents($config["per_page"], $page);

	   	//set the flash data error message if there is one
		$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
		//list the users
		//$this->data['users'] = $this->Agents_model->get_list_agents();
		$this->data['title'] = "agents";
		$this->load->view('mdashboard',$this->data);
		//echo json_encode($this->data);
		//$this->_render_page('index', $this->data);
		//$this->_render_page('dash_agents', $this->data);
		//$this->_render_page('mdashboard', $this->data);
	    //var_dump($page);
	}


	public function view_truck_owners(){
		if(!$this->ion_auth->logged_in()){
			redirect('auth/login','refresh');
		}else{
          #pagination
			$config = array();
			$config["base_url"] = base_url()."main/view_truck_owners";
			$config["total_rows"] = $this->Main_model->get_truck_owner_count();
			$config["per_page"] = 8;
			$config["uri_segment"] = 3;
			$this->pagination->initialize($config);
			$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
			$this->data["links"] = $this->pagination->create_links();
			$owners = $this->Main_model->get_truck_owners($config["per_page"], $page);
			foreach ($owners as $key => $owner) {
			    	# code...
				$info[$key]['id']=$owner['id'];
			    $info[$key]['profile_picture']=$owner['profile_picture'];
			    $info[$key]['first_name']=$owner['first_name'];
			    $info[$key]['second_name']=$owner['second_name'];
			    $info[$key]['phonenumber']=$owner['phonenumber'];
			    $info[$key]['active']=$owner['active'];
			    $info[$key]['email']=$owner['email'];
			    $info[$key]['ssn']=$owner['ssn'];
			    $info[$key]['company']=$owner['company'];
			    $info[$key]['position']=$owner['position'];
			    $amount=$this->Wallet_model->get_service_provider_wallet($owner['id'])['credit'];
			    if(isset($amount)){
			    	$info[$key]['amount']=$amount; 
			    }else{
			    	$info[$key]['amount']='0.0'; 
			    }
			}
			$this->data['owners']=$info;
			$this->data['message']='';
			//$this->load->view('truck_owners',$data);
			//$this->load->view('dash_owners',$this->data);
			$this->data['title'] = "owners";
			$this->load->view('mdashboard',$this->data);
		    //echo json_encode($this->data);
		}
	}

	public function view_individual_truck_owners(){
		if(!$this->ion_auth->logged_in()){
			redirect('auth/login','refresh');
		}else{
			$config = array();
			$config["base_url"] = base_url()."main/view_individual_truck_owners";
			$config["total_rows"] = $this->Main_model->get_individual_truck_owner_count();
			$config["per_page"] = 8;
			$config["uri_segment"] = 2;
			$this->pagination->initialize($config);
			$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
			$this->data["links"] = $this->pagination->create_links();
		    $owners = $this->Main_model->get_individual_truck_owners($config["per_page"], $page);
			#$owners = $this->Main_model->get_truck_owners($config["per_page"], $page);
            $info =array();
            foreach ($owners as $key => $owner) {
            # code...
            	$info[$key]['id']=$owner['id'];
			    $info[$key]['profile_picture']=$owner['profile_picture'];
			    $info[$key]['first_name']=$owner['first_name'];
			    $info[$key]['second_name']=$owner['second_name'];
			    $info[$key]['phonenumber']=$owner['phonenumber'];
			    $info[$key]['active']=$owner['active'];
			    $info[$key]['email']=$owner['email'];
			    $info[$key]['ssn']=$owner['ssn'];
			    $info[$key]['company']=$owner['company'];
			    $info[$key]['position']=$owner['position'];
			    $amount=$this->Wallet_model->get_service_provider_wallet($owner['id'])['credit'];
			    if(isset($amount)){
			    	$info[$key]['amount']=$amount; 
			    }else{
			    	$info[$key]['amount']='0.0';
			    }
			}
			$this->data['owners']=$info; 	
            //$data['owners']=$this->Main_model->get_individual_truck_owners();
            $this->data['message']='';
            //echo json_encode($data);
            //$this->load->view('truck_owners',$data);
            $this->data['title'] = "owners";
            $this->load->view('mdashboard',$this->data);
            //$this->load->view('dash_owners',$this->data);
        }
    }


    public function view_company_truck_owners(){
    	if(!$this->ion_auth->logged_in()){
    		redirect('auth/login','refresh');
    	}else{
    		$config = array();
		    $config["base_url"] = base_url()."main/view_company_truck_owners";
		    $config["total_rows"] = $this->Main_model->get_company_truck_owners_count();
		    $config["per_page"] = 8;
			$config["uri_segment"] = 2;
			$this->pagination->initialize($config);
			$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
			$this->data["links"] = $this->pagination->create_links();
			$owners = $this->Main_model->get_company_truck_owners($config["per_page"], $page);
			#$owners = $this->Main_model->get_truck_owners($config["per_page"], $page);
			foreach ($owners as $key => $owner) {
			# code...
				$info[$key]['id']=$owner['id'];
			    $info[$key]['profile_picture']=$owner['profile_picture'];
			    $info[$key]['first_name']=$owner['first_name'];
			    $info[$key]['second_name']=$owner['second_name'];
			    $info[$key]['phonenumber']=$owner['phonenumber'];
			    $info[$key]['active']=$owner['active'];
			    $info[$key]['email']=$owner['email'];
			    $info[$key]['ssn']=$owner['ssn'];
			    $info[$key]['company']=$owner['company'];
			    $info[$key]['position']=$owner['position'];
			    $amount=$this->Wallet_model->get_service_provider_wallet($owner['id'])['credit'];
			    if(isset($amount)){
			    	$info[$key]['amount']=$amount; 
			    }else{
                    $info[$key]['amount']='0.0';
                }
            }
            $this->data['owners']=$info; 	
	        #$data['owners']=$this->Main_model->get_company_truck_owners();
	        $this->data['message']='';
	        //echo json_encode($data);
	        //$this->load->view('truck_owners',$data);
	        $this->data['title'] = "owners";
	        $this->load->view('mdashboard',$this->data);
	        //$this->load->view('dash_owners',$this->data);
	    }
	}


	public function activate_truck_owner($id){
      if(!$this->ion_auth->logged_in()){
        redirect('auth/login','refresh');
      }else{
        #$data['owners']=$this->Main_model->get_truck_owners();
        #$data['message']='';
        #$this->load->view('dash_owners',$data);
        
        $digits = 4;
        $data['code'] = rand(pow(10, $digits-1), pow(10, $digits)-1);	
        $method = 'POST';
	    $info['username'] = 'admin@admin.com';
	    $info['password'] = 'password';
	    $info['message'] = "Truckz application, your verification code is ".$data['code'];
	    $info['contact'] = $this->Main_model->get_truck_owner($id)['phonenumber'];
        $info['title'] = 'Truckz';
        $info['phonebook'] = '352';
	    $url = 'http://sendsmsug.info/apis/send_sms';
	    $result = $this->CallAPI($method,$url,$info);
        $this->Main_model->activate_truck_owner($id,$data['code']);
        redirect('main/view_truck_owners','refresh');
        //redirect('main/view_company_truck_owners','refresh');
      }
    }
  
  public function deactivate_truck_owner($id){
    if(!$this->ion_auth->logged_in()){
      redirect('auth/login','refresh');
    }else{
      $this->Main_model->deactivate_truck_owner($id);
      #$data['owners']=$this->Main_model->get_truck_owners();
      #$data['message']='';
      #$this->load->view('dash_owners',$data);
      redirect('main/view_truck_owners','refresh');
    }
  }


  public function edit_truck_owner($id){
  	if(!$this->ion_auth->logged_in()){
  		redirect('auth/login','refresh');
  	}else{
  		$this->data['title'] = $this->lang->line('edit_agent_heading');
        $this->form_validation->set_rules('first_name', $this->lang->line('create_user_validation_fname_label'), 'trim|required');
        $this->form_validation->set_rules('last_name', $this->lang->line('create_user_validation_lname_label'), 'trim|required');
        $this->form_validation->set_rules('email', $this->lang->line('create_user_validation_email_label'), 'trim|required');
		$this->form_validation->set_rules('phone', $this->lang->line('create_user_validation_phone_label'), 'trim|required');
		$this->form_validation->set_rules('ssn', $this->lang->line('create_agent_validation_ssn_label'), 'trim|required');
        $this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));
        
        $owner_info=$this->Main_model->get_truck_owner($id);
	    $this->data['id'] = array(
					'name' => 'id',
					'id' => 'id',
					'type' => 'text',
					'value' => $this->form_validation->set_value('id',$owner_info['id']),
				);
        $this->data['current_picture']=$owner_info['profile_picture'];
        $this->data['profile_picture'] = array(
					'name' => 'profile_picture',
					'id' => 'profile_picture',
					'type' => 'file',
					'accept'=>'.png,.jpg,.jpeg',
					'value' => $this->form_validation->set_value('profile_picture',$owner_info['profile_picture']),
				);
        $this->data['first_name'] = array(
					'name' => 'first_name',
					'id' => 'first_name',
					'type' => 'text',
					'value' => $this->form_validation->set_value('first_name',$owner_info['first_name']),
				);
        $this->data['last_name'] = array(
					'name' => 'last_name',
					'id' => 'last_name',
					'type' => 'text',
					'value' => $this->form_validation->set_value('second_name',$owner_info['second_name']),
				);
        $this->data['email'] = array(
					'name' => 'email',
					'id' => 'email',
					'type' => 'text',
					'value' => $this->form_validation->set_value('email',$owner_info['email']),
				);
        $this->data['phone'] = array(
					'name' => 'phone',
					'id' => 'phone',
					'type' => 'text',
					'value' => $this->form_validation->set_value('phone',$owner_info['phonenumber']),
				);
        $this->data['ssn'] = array(
					'name' => 'ssn',
					'id' => 'ssn',
					'type' => 'text',
					'value' => $this->form_validation->set_value('ssn',$owner_info['ssn']),
				);
        //$this->_render_page('dash_edit_truck_owner',$this->data);
        $this->data['title'] = 'edit_owners';
        $this->_render_page('mdashboard', $this->data);
    }
}

		public function _render_page($view, $data = NULL, $returnhtml = FALSE){
			$this->viewdata = (empty($data)) ? $this->data : $data;
			$view_html = $this->load->view($view, $this->viewdata, $returnhtml);
			// This will return html on 3rd argument being true
			if ($returnhtml)
			{
				return $view_html;
			}
		}

		public function update_truck_owner_info(){
			if(!$this->ion_auth->logged_in()){
	      redirect('auth/login','refresh');
			}else{
        $_id=$this->input->post('id');
		    $profile_picture=$this->input->post('profile_picture');
				$data['first_name']=$this->input->post('first_name');
				$data['second_name']=$this->input->post('last_name');
				$data['phonenumber']=$this->input->post('phone');
				$data['email']=$this->input->post('email');
				$data['ssn']=$this->input->post('ssn');
	            $config['upload_path'] = './static/uploads/'; 
	            $config["allowed_types"] = 'jpg|jpeg|png';
	            $config['max_size'] = 0;
	            $config['encrypt_name'] = TRUE;
	            $this->load->library('upload', $config);
	            if (!$this->upload->do_upload('profile_picture')){
	                    $error = array('error' => $this->upload->display_errors());
	            }else{
	                    $data['profile_picture']=$this->upload->data()['file_name'];
	            }
				$this->Main_model->update_truck_owner_information($_id,$data);
			    $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
			    $data['owners']=$this->Main_model->get_truck_owners();
	            $data['message']='';
				$this->_render_page('truck_owners', $data);
			}
		}

	public function show_owner_trucks($id){
		if(!$this->ion_auth->logged_in()){
			redirect('auth/login','refresh');
		}else{
			$data['owner_id'] = $id;
		    $data['trucks'] = $this->Main_model->get_owner_trucks($id);
			$data['owner_email'] = $this->Main_model->get_owner_email($id)['email'];
			$data['title'] = 'owner_trucks';
			//$this->_render_page('dash_mytrucks', $data);
			$this->_render_page('mdashboard', $data);
		}
	}


	public function show_owner_drivers($id){
		if(!$this->ion_auth->logged_in()){
			redirect('auth/login','refresh');
		}else{
			$data['owner_id'] = $id;
			$data['drivers'] = $this->Main_model->get_owner_drivers($id);
			$data['owner_email'] = $this->Main_model->get_owner_email($id)['email'];
			$data['title'] = "owner_drivers";
			//$this->_render_page('dash_mydrivers', $data);
			$this->_render_page('mdashboard', $data);
		}
	}

		public function activate_truck($truck_id){
			if(!$this->ion_auth->logged_in()){
	           redirect('auth/login','refresh');
			}else{
               $this->Main_model->activate_truck($truck_id);
               $owner_id=$this->Main_model->get_owner_id($truck_id)[0]['owner'];
               $data['trucks']=$this->Main_model->get_owner_trucks($owner_id);
		       $data['title']=$this->Main_model->get_owner_email($owner_id)['email'];
		       $this->_render_page('trucks', $data);
			}
		}

		public function deactivate_truck($truck_id){
			if(!$this->ion_auth->logged_in()){
	           redirect('auth/login','refresh');
			}else{
			   $this->Main_model->deactivate_truck($truck_id);
			   redirect('main/login','refresh');
	           //$owner_id=$this->Main_model->get_owner_id($truck_id)[0]['owner'];
	           //$data['trucks']=$this->Main_model->get_owner_trucks($owner_id);
			   //$data['title']=$this->Main_model->get_owner_email($owner_id)['email'];
			   //$this->_render_page('trucks', $data);
			}
		}

		public function view_truck_categories(){
			if(!$this->ion_auth->logged_in()){
				redirect('auth/login','refresh');
			}else{
				$config = array();
				$config["base_url"] = base_url() . "main/view_truck_categories";
                $config["total_rows"] = $this->Main_model->get_truck_cat_count();
                $config["per_page"] = 6;
                $config["uri_segment"] = 3;
                $this->pagination->initialize($config);
                $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
                $data["links"] = $this->pagination->create_links();
                $data['categories'] = $this->Main_model->get_truck_categories($config["per_page"], $page);
				$data['message']='';
				$data['title']='types';
				//$this->load->view('dash_categories',$data);
				$this->load->view('mdashboard',$data);
			}
		}

		public function add_truck_category(){
			if(!$this->ion_auth->logged_in()){
				redirect('auth/login','refresh');
			}else{
				$data = $this->input->post();
				if(empty($data)){
					$this->data['message']='';
					$this->data['name'] = array( 'name' => 'name','id' => 'name','type' => 'text',
						'value' => $this->form_validation->set_value('')
					);
					$this->data['image'] = array('name' => 'image','id' => 'image','type' => 'file',
						'accept'=>'.png,.jpg,.jpeg,.gif',
						'value' => $this->form_validation->set_value(''),
					);
					$this->data['image2'] = array('name' => 'image2','id' => 'image2','type' => 'file',
						'accept'=>'.png,.jpg,.jpeg,.gif',
						'value' => $this->form_validation->set_value(''),
					);
					$this->data['title'] = "add_types";
					//$this->load->view('add_truck_category',$this->data);
					$this->load->view('mdashboard',$this->data);
				}else{
					$this->upload_image();
	                //$data['categories'] = $this->Main_model->get_truck_categories_without();
				    //$data['message']='';
				    //$this->load->view('truck_categories',$data);
				    redirect('main/view_truck_categories','refresh');
				}
			}
		}
  
  public function upload_image(){
    if(!$this->ion_auth->logged_in()){
      redirect('auth/login','refresh');
    }else{
      $info['name']=$this->input->post('name');
			$config['upload_path'] = './static/uploads/'; 
		  $config["allowed_types"] = 'jpg|jpeg|png|gif';
		  $config['max_size'] = 0;
		  $config['encrypt_name'] = TRUE;
		  $this->load->library('upload', $config);
		  if (!$this->upload->do_upload('image')){
        $error = array('error' => $this->upload->display_errors());
		    //var_dump($error);
		    echo json_encode($error);
      }else{
        $info['image']=$this->upload->data()['file_name'];
        $id = $this->Main_model->add_category_truck($info);
        $upload_result = $this->upload->do_upload('image2');
        if($upload_result){
          $info['image']=$this->upload->data()['file_name'];
          $this->Main_model->update_category_truck($id,$info['image']);
        }
      }
    }
  }

  public function get_orders(){
  	if(!$this->ion_auth->logged_in()){
  		redirect('auth/login','refresh');
  	}else{
  		$config = array();
		$config["base_url"] = base_url() . "main/get_orders";
		$config["total_rows"] = $this->Main_model->get_order_count();
		$config["per_page"] = 6;
		$config["uri_segment"] = 3;
		$this->pagination->initialize($config);
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$info["links"] = $this->pagination->create_links();
		$orders = $this->Main_model->get_orders($config["per_page"], $page);
		$data = array();
		foreach ($orders as $key => $order) {
          # code...
			$data[$key]['id']=$order['id'];
		    $data[$key]['client_name']=$this->Main_model->get_client_information($order['client_id'])['username'];
		    if($order['service_provider']=='0'){
		    	$data[$key]['service_provider']='Not available';
		    }else{
		    	$iscompany = $this->Main_model->get_truck_owner($order['service_provider'])['iscompany'];
		    	if($iscompany==0){
		    		$data[$key]['service_provider']=
		    		$this->Main_model->get_truck_owner($order['service_provider'])
		    		['first_name']." ".$this->Main_model->get_truck_owner($order['service_provider'])
		    		['second_name'];
		    	}else{
		    		$data[$key]['service_provider']=$this->Main_model->get_truck_owner($order['service_provider'])['company'];
		    	}
		    }
		    $data[$key]['truck_type']=$this->Main_model->get_truck_category($order['truck_type'])['name'];
		    $data[$key]['size'] = $order['size'];
		    $data[$key]['pickup_address'] = $order['pickup_address'];
		    $data[$key]['dest_address'] = $order['dest_address'];
		    $data[$key]['price'] = $order['price'];
		    if($order['status']=='1'){
		    	$data[$key]['status']='Looking for service provider';
		    }elseif($order['status']=='2'){
		    	$data[$key]['status']='Found service provider';
		    }elseif($order['status']=='3'){
                $data[$key]['status']='Moving towards the client';
            }elseif($order['status']=='4'){
                $data[$key]['status']='Reached clients location';
            }elseif($order['status']=='5'){
                $data[$key]['status']='Delivering goods';	
            }elseif($order['status']=='6'){
                $data[$key]['status']='Job complete';
            }elseif($order['status']=='7'){
                $data[$key]['status']='Job canceled';
            }  
            $data[$key]['time_stamp']=$order['time_stamp'];
        }
        #echo json_encode($data);
        $info['orders'] = $data;
        $info['title'] = 'orders';
        //$this->load->view('dash_orders',$info);
        $this->load->view('mdashboard',$info);
        //echo json_encode($orders);
      }
  }

  public function get_search_agents(){
  	if(!$this->ion_auth->logged_in()){
  		redirect('auth/login','refresh');
  	}else{
  		$search=$this->input->post('search');
		$config = array();
	    $config["base_url"] = base_url()."main/get_search_agents";
	    $config["total_rows"] = $this->Agents_model->get_search_agents_count($search);
	    $config["per_page"] = 8;
	    $config["uri_segment"] = 2;
	    $this->pagination->initialize($config);
	    $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
	    $this->data["links"] = $this->pagination->create_links();
	    $this->data['users'] = $this->Agents_model->get_list_search_agents($config["per_page"], $page,$search);
	    #set the flash data error message if there is one
	    $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
        #list the users
        #$this->data['users'] = $this->Agents_model->get_list_agents();
        #$this->_render_page('index', $this->data);
        $this->_render_page('dash_agents', $this->data);
        #echo json_encode($this->data);
    }
}

	    public function get_search_owners(){
	    	if(!$this->ion_auth->logged_in()){
          redirect('auth/login','refresh');
			  }else{
          $search=$this->input->post('search');
          #pagination
				  $config = array();
			    $config["base_url"] = base_url()."main/get_search_owners";
			    $config["total_rows"] = $this->Main_model->get_truck_owner_search_count($search);
			    $config["per_page"] = 8;
			    $config["uri_segment"] = 2;
			    $this->pagination->initialize($config);
			    $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
			    $this->data["links"] = $this->pagination->create_links();
			    $owners = $this->Main_model->get_search_truck_owners($config["per_page"], $page,$search);
			    foreach ($owners as $key => $owner) {
			    	# code...
			    	$info[$key]['id']=$owner['id'];
			    	$info[$key]['profile_picture']=$owner['profile_picture'];
			    	$info[$key]['first_name']=$owner['first_name'];
			    	$info[$key]['second_name']=$owner['second_name'];
			    	$info[$key]['phonenumber']=$owner['phonenumber'];
			    	$info[$key]['active']=$owner['active'];
			    	$info[$key]['email']=$owner['email'];
			    	$info[$key]['ssn']=$owner['ssn'];
			    	$info[$key]['company']=$owner['company'];
			    	$info[$key]['position']=$owner['position'];
			    	$amount=$this->Wallet_model->get_service_provider_wallet($owner['id'])['credit'];
			    	if(isset($amount)){
                     $info[$key]['amount']=$amount; 
			    	}else{
                     $info[$key]['amount']='0.0'; 
			    	}
			    }
		        $this->data['owners']=$info;
		        $this->data['message']='';
		        //$this->load->view('truck_owners',$data);
		        $this->load->view('dash_owners',$this->data);
		        #echo json_encode($this->data);
			}
	  }
  
  public function download_page(){
    $this->load->view('download_page');
  }
  
  public function view_notifications(){
    $this->data['notifications'] = $this->Main_model->get_notifications();
    $config = array();
  	$config["base_url"] = base_url()."main/view_notifications";
  	$config["total_rows"] = $this->Main_model->get_notification_count();
  	$config["per_page"] = 8;
  	$config["uri_segment"] = 2;
  	$this->pagination->initialize($config);
  	$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
  	$this->data["links"] = $this->pagination->create_links();
    //echo json_encode($data);
    //$this->load->view('dash_notifications',$data);
    $this->data['title'] = "notifications";
    $this->load->view('mdashboard',$this->data);
  }
  
  public function show_driver_details($id){
    $data['driver'] = $this->Main_model->get_driver_details(array('id'=>$id));
    //echo json_encode($data);
    //$this->load->view('dash_driver',$data);
    $data['title'] = 'driver_details'; 
    $this->load->view('mdashboard',$data);
  }
  
  public function approve_driver($driver_id){
    $data['driver'] = $this->Main_model->get_driver_details(array('id'=>$driver_id));
    #generate and send the sms code
    $digits = 4;
    $data['code'] = rand(pow(10, $digits-1), pow(10, $digits)-1);	
    $method = 'POST';
    $info['username'] = 'admin@admin.com';
    $info['password'] = 'password';
    $info['title'] = 'Truckz application';
    $info['message'] = "Truckz application, your driver verification code is ".$data['code'];
    $info['contact'] = $data['driver']['phonenumber'];
    $info['phonebook'] = '80';
    $url = 'http://sendsmsug.info/apis/send_sms';
	  $this->CallAPI($method,$url,$info);
    $this->Main_model->approve_driver($driver_id,$data['code']);
    //$this->load->view('dash_driver',$data);
    redirect('main/show_driver_details/'.$driver_id,'refresh');
  }
  
  
  
  public function show_owner_details($service_provider){
    $data['owner'] = $this->Main_model->get_owner_details(array('id'=>$service_provider));
    //echo json_encode($data['owner']['agents']);
    if(!empty($data['owner']['agents'])){
      $agent_id = $data['owner']['agents'];
      $agent_first_name = $this->Agents_model->get_agent($agent_id)['first_name'];
      $agent_second_name = $this->Agents_model->get_agent($agent_id)['second_name'];
      $data['agent_name'] = $agent_first_name." ".$agent_second_name;
    }
    //echo json_encode($data);
    //$this->load->view('dash_truckowner',$data);
    $data['title'] = "owner_details";
    $this->load->view('mdashboard',$data);
  }
  
  public function assign_agent($owner_id){
    $agent = $this->Main_model->get_unassigned_agents(array('assigned'=>'0'));
    $this->Main_model->assign_owner_agent($agent['id'],$owner_id);
    #notify agent owner assigned
    $data['owner'] = $this->Main_model->get_owner_details(array('id'=>$owner_id));
    $this->notify_agent_owner_assigned($data['owner'],$agent);
    redirect('main/show_owner_details/'.$owner_id,'refresh');
  }
  
  public function notify_agent_owner_assigned($owner,$agent){
      $apiKey = 'AAAAYbM1nAg:APA91bGjDJlWBmMxMxWiSxwkt8xm6wt-sKBs1ngJ1CFGRhqXC5Q1Qr8_UczUqF8z1itsOzMNW7j6vcMqObDiQ0YZa-3Pq6uQicqyDWJVLX-6JWsq0u7v9OrKciWGM7kp7BvSJoZcLDi5';
      $client = new Client();
      $client->setApiKey($apiKey);
      $client->injectHttpClient(new \GuzzleHttp\Client());
      $message = new Message();
      $message->addRecipient(new Device($agent['token']));
      $message->setData(array(
        'pay_load' => 'new_owner',
        'first_name' => $owner['first_name'],
        'second_name' => $owner['second_name'],
        'phonenumber' => $owner['phonenumber']));
      $response = $client->send($message);
  }
  
  public function approve_truckowner($owner_id){
    #send the sms code
    $digits = 4;
    $code = rand(pow(10, $digits-1), pow(10, $digits)-1);	
    $data['message'] = "Welcome to truckz application your activiation code is ".$code;
    $data['phonenumber'] = $this->Main_model->get_owner_details(array('id' => $owner_id))['phonenumber'];
    $data['phonebook'] = '352';
    $this->send_sms($data);
    $this->Main_model->approve_truckowner($owner_id,$code);
    redirect('main/show_owner_details/'.$owner_id,'refresh');
  }
  
  public function send_sms($data){
    $method = 'POST';
	  $info['username'] = 'admin@admin.com';
	  $info['password'] = 'password';
    $info['title'] = 'api';
	  $info['message'] =  $data['message'];
	  $info['contact'] = $data['phonenumber'];
    $info['phonebook'] = $data['phonebook'];
	  $url = 'http://sendsmsug.info/apis/send_sms';
	  $this->CallAPI($method,$url,$info);
  }
  
  function CallAPI($method, $url, $data = false){
	    $curl = curl_init();
	    switch ($method){
	        case "POST":
	            curl_setopt($curl, CURLOPT_POST, 1);
	            if ($data)
	                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
	            break;
	        case "PUT":
	            curl_setopt($curl, CURLOPT_PUT, 1);
	            break;
	        default:
	            if ($data)
	                $url = sprintf("%s?%s", $url, http_build_query($data));
	    }
    
	    # Optional Authentication:
	    curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
	    curl_setopt($curl, CURLOPT_USERPWD, "username:password");
	    curl_setopt($curl, CURLOPT_URL, $url);
	    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	    $result = curl_exec($curl);
	    curl_close($curl);
	    return $result;
	}
  
  public function show_truck_details($truck_id){
    $data['truck'] = $this->Main_model->get_truck_details(array('id' => $truck_id));
    if(!empty($data['truck']['agents'])){
      $agent_id = $data['truck']['agents'];
      $agent_first_name = $this->Agents_model->get_agent($agent_id)['first_name'];
      $agent_second_name = $this->Agents_model->get_agent($agent_id)['second_name'];
      $data['agent_name'] = $agent_first_name." ".$agent_second_name;
    }
    $data['title']="truck_details";
    //$this->load->view('dash_truck',$data);
    $this->load->view('mdashboard',$data);
  }
  
  
  
  public function assign_agent_to_truck($truck_id){
     $agent = $this->Main_model->get_unassigned_agents(array('assigned'=>'0'));
     $this->Main_model->assign_truck_agent($agent['id'],$truck_id);
     #notify agent owner assigned
     $data['truck'] = $this->Main_model->get_truck_details(array('id'=>$truck_id));
     $this->notify_agent_truck_assigned($data['truck'],$agent);
     redirect('main/show_truck_details/'.$truck_id,'refresh');
  }
  
  public function notify_agent_truck_assigned($truck,$agent){
      $apiKey = 'AAAAYbM1nAg:APA91bGjDJlWBmMxMxWiSxwkt8xm6wt-sKBs1ngJ1CFGRhqXC5Q1Qr8_UczUqF8z1itsOzMNW7j6vcMqObDiQ0YZa-3Pq6uQicqyDWJVLX-6JWsq0u7v9OrKciWGM7kp7BvSJoZcLDi5';
      $client = new Client();
      $client->setApiKey($apiKey);
      $client->injectHttpClient(new \GuzzleHttp\Client());
      $message = new Message();
      $message->addRecipient(new Device($agent['token']));
      $message->setData(array(
        'pay_load' => 'new_truck',
        'truck_category' => $truck['truck_categories'],
        'number_plate' => $truck['number_plate'],
        'service_point' => $truck['service_point']));
      $response = $client->send($message);
  }
 
  public function approve_truck($truck_id){
    $this->Main_model->approve_truck($truck_id);
    redirect('main/show_truck_details/'.$truck_id,'refresh');
  }

}