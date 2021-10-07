<?php defined('BASEPATH') OR exit('No direct script access allowed');

	/**
	 * Class Auth
	 * @property Ion_auth|Ion_auth_model $ion_auth        The ION Auth spark
	 * @property CI_Form_validation      $form_validation The form validation library
	 */
	use paragraph1\phpFCM\Client;
	use paragraph1\phpFCM\Message;
	use paragraph1\phpFCM\Recipient\Topic;
	use paragraph1\phpFCM\Recipient\Device;
	use paragraph1\phpFCM\Notification;

	require_once 'vendor/autoload.php';

	class Node extends CI_Controller{
		public function __construct(){
			parent::__construct();
			$this->load->database();
			$this->load->helper(array('url', 'language'));
			$this->load->model(array('Agents_model','Node_model','Main_model','Wallet_model','Client_model','Order_model','Driver_model'));		
		}

		public function index(){
      echo "oops";
		}

	public function login(){
    $data['phonenumber'] = $this->input->post('phonenumber');
    $data['pin'] = $this->input->post('verification_code');
    $device_token = $this->input->post('token');
    $response['message'] = "";
    if(empty($data['phonenumber'])){
      $response['message'] = 'Phone number not submitted';
    }elseif(empty($data['pin'])){
      $response['message'] = 'Verification code not submitted';
    }else{
      $result = $this->Node_model->login($data);
      if($result->num_rows()>0){
        $this->Node_model->update_agent_device_token($device_token,$data['phonenumber'],$data['pin']);
        $response['message']='success';
        $response['status_code']='1';
        $response['id'] = $result->row_array()['id'];
        $response['change_pin'] = $result->row_array()['change_pin'];
      }else{
        $response['message']='Phonenumber or pin does not exist.';
        $response['status_code']='0';
      }
		}
		 echo json_encode($response);
	}

	public function add_truck_owner(){
		$data['first_name']=$this->input->post('first_name');
		$data['second_name']=$this->input->post('second_name');
		$data['ssn']=$this->input->post('ssn');
		$data['phonenumber'] = "+256".substr($this->input->post('phone_number'),-9);
		$data['email']=$this->input->post('email_address');
		$data['iscompany']=$this->input->post('iscompany');
		$data['agents']=$this->input->post('agent_id');
		$data['profile_picture'] = $this->generateImage($this->input->post('profile_picture'));
    $data['agent_verification']=$this->input->post('verified');
		$response['message']="";
		if(empty($this->input->post('profile_picture'))){
        $response['message'] = "profile_picture not submitted";
        $response['status_code'] = 0;
		}elseif(empty($this->input->post('first_name'))){
        $response['message'] = "first name not submitted";
        $response['status_code'] = 0;
		}elseif(empty($this->input->post('second_name'))){
        $response['message'] = "second name not submitted";
        $response['status_code'] = 0;
		}elseif(empty($this->input->post('ssn'))){
        $response['message'] = "ssn not submitted";
        $response['status_code'] = 0;
		}elseif(empty($this->input->post('phone_number'))){
        $response['message'] = "phonenumber not submitted";
        $response['status_code'] = 0;
		}elseif(empty($this->input->post('email_address'))){
        $response['message'] = "email not submitted";
        $response['status_code'] = 0;
		}elseif(empty($this->input->post('agent_id'))){
        $response['message'] = "Please add agent id";
        $response['status_code'] = 0;
		}else{
// 		    $digits = 4;
//        $data['code'] = rand(pow(10, $digits-1), pow(10, $digits)-1);	
//        $method = 'POST';
// 	      $info['username'] = 'admin@admin.com';
// 	      $info['password'] = 'password';
// 	      $info['message'] = "Truckz application, your verification code is ".$data['code'];
// 	      $info['contact'] = $data['phonenumber'];
// 	      $url = 'http://sendsmsug.info/apis/send_sms';
// 	      $this->CallAPI($method,$url,$info);
        $this->Node_model->add_truck_owner($data);
        $response['message'] = "success";
        $response['status_code'] = 1;
    }
		echo json_encode($response); 
	}

	public function add_company(){
		$data['first_name']=$this->input->post('first_name');
		$data['second_name']=$this->input->post('second_name');
		$data['ssn']=$this->input->post('ssn');
		$data['phonenumber']="+256".substr($this->input->post('phone_number'),-9);
		$data['email']=$this->input->post('email_address');
		$data['company']=$this->input->post('company');
		$data['position']=$this->input->post('job_position');
		$data['iscompany']=$this->input->post('iscompany');
		$data['agents']=$this->input->post('agent_id');
    $data['agent_verification']=$this->input->post('verified');
		$data['profile_picture']=$this->generateImage($this->input->post('profile_picture'));
		$response['message']="";
		if(empty($this->input->post('profile_picture'))){
      $response['message']="profile_picture not submitted";
      $response['status_code']=0;
    }elseif(empty($this->input->post('first_name'))){
      $response['message']="first name not submitted";
      $response['status_code']=0;
		}elseif(empty($this->input->post('second_name'))){
      $response['message']="second name not submitted";
      $response['status_code']=0;
		}elseif(empty($this->input->post('ssn'))){
      $response['message']="ssn not submitted";
      $response['status_code']=0;
		}elseif(empty($this->input->post('phone_number'))){
      $response['message']="phonenumber not submitted";
      $response['status_code']=0;
    }elseif(empty($this->input->post('email_address'))){
      $response['message']="email not submitted";
      $response['status_code']=0;
    }elseif(empty($this->input->post('iscompany'))){
      $response['message']="iscompany not submitted";
      $response['status_code']=0;
    }elseif(empty($this->input->post('agent_id'))){
      $response['message']="please attach an agent";
      $response['status_code']=0;
    }else{
//      $digits = 4;
//      $data['code']=rand(pow(10, $digits-1), pow(10, $digits)-1);	
//      $method='POST';
// 	    $info['username']='admin@admin.com';
// 	    $info['password']='password';
// 	    $info['message']="Thank you for Registering as an owner on Truckz application, your verification code is".$data['code'];
// 	    $info['contact']=$data['phonenumber'];
// 	    $url='http://sendsmsug.info/apis/send_sms';
// 	    $this->CallAPI($method,$url,$info);	
      $this->Node_model->add_truck_owner($data);
      $response['message']="success";
      $response['status_code']=1;
    }
    echo json_encode($response); 
	}
    
    public function update_service_provider_registration(){
      $owner_id = $this->input->post('owner');
      $data['first_name'] = $this->input->post('first_name');
      $data['second_name'] = $this->input->post('second_name');
      $data['ssn'] = $this->input->post('ssn');
      $data['phonenumber'] = $this->clean_phonenumber($this->input->post('phone_number'));
      $data['email'] = $this->input->post('email_address');
      $data['company'] = $this->input->post('company');
      $data['position'] = $this->input->post('job_position');
      $data['iscompany'] = $this->input->post('iscompany');
      $data['agents'] = $this->input->post('agent_id');
      $data['profile_picture'] = $this->generateImage($this->input->post('profile_picture'));
      $response['message'] = "";
      if(empty($this->input->post('profile_picture'))){
        $response['message']="profile_picture not submitted";
        $response['status_code']=0;
      }elseif(empty($this->input->post('first_name'))){
        $response['message']="first name not submitted";
        $response['status_code']=0;
      }elseif(empty($this->input->post('second_name'))){
        $response['message']="second name not submitted";
        $response['status_code']=0;
      }elseif(empty($this->input->post('ssn'))){
        $response['message']="ssn not submitted";
        $response['status_code']=0;
      }elseif(empty($this->input->post('phone_number'))){
        $response['message']="phonenumber not submitted";
        $response['status_code']=0;
      }elseif(empty($this->input->post('email_address'))){
        $response['message']="email not submitted";
        $response['status_code']=0;
      }elseif(empty($this->input->post('iscompany'))){
        $response['message']="iscompany not submitted";
        $response['status_code']=0;
      }else{
        #check if already approved by agent or admin
        $agent_query = $this->Node_model->checkowner_agent_verification(array('id'=>$owner_id,
                                                                              'agent_verification'=>'1'));
        if($agent_query->num_rows()>0){
          # agent verified
          $response['message'] = "update failed already verified by agent.";
          $response['status_code'] = '0';
        }else{
          $admin_query = $this->Node_model->checkowner_admin_verification(array('id'=>$owner_id,
                                                                            'admin_verification'=>'1'));
          if($admin_query->num_rows()>0){
            # admin approved
            $response['message'] = "update failed already approved by admin";
            $response['status_code'] = '0';
          }else{
            $this->Node_model->update_truck_owner($owner_id,$data);
            $response['truck_owner'] = $owner_id;
            $response['message'] = "success";
            $response['status_code'] = 1;
          }
        }
      }
      echo json_encode($response);
    }
    
    public function clean_phonenumber($contact){
      return "+256".substr($contact,-9);
    }
    
    public function service_provider_registration(){
      $data['first_name'] = $this->input->post('first_name');
      $data['second_name'] = $this->input->post('second_name');
      $data['ssn'] = $this->input->post('ssn');
      $data['phonenumber'] = $this->clean_phonenumber($this->input->post('phone_number'));
      $data['email'] = $this->input->post('email_address');
      $data['company'] = $this->input->post('company');
      $data['position'] = $this->input->post('job_position');
      $data['iscompany'] = $this->input->post('iscompany');
      $data['agents'] = $this->input->post('agent_id');
      $data['profile_picture'] = $this->generateImage($this->input->post('profile_picture'));
      $response['message'] = "";
      if(empty($this->input->post('profile_picture'))){
        $response['message']="profile_picture not submitted";
        $response['status_code']=0;
      }elseif(empty($this->input->post('first_name'))){
        $response['message']="first name not submitted";
        $response['status_code']=0;
      }elseif(empty($this->input->post('second_name'))){
        $response['message']="second name not submitted";
        $response['status_code']=0;
      }elseif(empty($this->input->post('ssn'))){
        $response['message']="ssn not submitted";
        $response['status_code']=0;
      }elseif(empty($this->input->post('phone_number'))){
        $response['message']="phonenumber not submitted";
        $response['status_code']=0;
      }elseif(empty($this->input->post('email_address'))){
        $response['message']="email not submitted";
        $response['status_code']=0;
      }elseif(empty($this->input->post('iscompany'))){
        $response['message']="iscompany not submitted";
        $response['status_code']=0;
      }else{
        #check if owner exists
        $if_owner_exists = $this->Node_model->if_owner_exists($data['phonenumber']);
        #add owner information
        if($if_owner_exists){
          $response['message'] = "owner already exists";
          $response['status_code'] = 0;
        }else{
          $owner_id = $this->Node_model->add_truck_owner($data);
          #assign agent to owner
          $this->assign_agent($owner_id);
          #send dashboard notification
          $owner_added_notification = array('type' => 'service_provider_added',
                                            'truck_owners' => $owner_id);
          $this->Node_model->set_notification($owner_added_notification);
          #create owner wallet
          $this->Wallet_model->credit_sp_wallet($owner_id,"0");
          #create response
          $response['truck_owner'] = $owner_id;
          $response['message'] = "success";
          $response['status_code'] = 1;
        }
        
      }
      echo json_encode($response);
    }
    
    public function assign_agent($owner_id){
      $agent = $this->Main_model->get_unassigned_agents(array('assigned'=>'0'));
      $this->Main_model->assign_owner_agent($agent['id'],$owner_id);
      #notify agent owner assigned
      $data['owner'] = $this->Main_model->get_owner_details(array('id'=>$owner_id));
      $this->notify_agent_owner_assigned($data['owner'],$agent);
      $this->Node_model->set_agent_notification(array('agents'=>$agent['id'],'truck_owners'=>$owner_id,'trucks'=>NULL));
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

	public function generateImage($img){
        $folderPath = 'static/uploads/';
        $img = str_replace('data:image/png;base64,', '', $img);
	    $img = str_replace(' ', '+', $img);
	    $data = base64_decode($img);
        $file_name=uniqid().'.png';
	    $file = $folderPath. $file_name;
	    $success = file_put_contents($file, $data);
        return $file_name;
    }

    public function get_list_truck_owners(){
    	$data['owners']=$this->Node_model->getlistowners();
    	$data['status_code']=1;
    	echo json_encode($data);
    }

//     public function get_agent_registered_clients(){
//     	$agent_id=$this->input->post('agent_id');
//       $query = $this->input->post('query');
//       if(isset($agent_id)){
//         $data['owners'] = $this->Node_model->get_agent_list_owners($agent_id);
//         $data['status_code'] = 1;
//       }elseif(isset($query)){
//         $data['owners'] = $this->Node_model->get_search_list_owners($query);
//     	  $data['status_code']= 1;
//       }else{
//         $data['owners'] = array();
//     	  $data['status_code'] = 0;
//       }
//     	echo json_encode($data);
//     }
    
    public function get_agent_registered_serviceproviders(){
      $agent_id = $this->input->post('agent_id');
      $data['owners'] = $this->Node_model->get_agent_list_owners($agent_id);
      $data['status_code'] = 1;
      $data['agent_id'] = ($agent_id == null) ? "":$agent_id;
      echo json_encode($this->input->post());
    }
    
    public function get_search_list_owners(){
      $query = $this->input->post('query');
      if(!empty($query)){
        $data['owners'] = $this->Node_model->get_search_list_owners($query);
    	  $data['status_code']= 1;
      }else{
        $data['owners'] = array();
    	  $data['status_code']= 1;
      }
      echo json_encode($data);
    }
    
    public function add_truck(){
      $data['drivers']=$this->input->post('drivers');
    	$data['truck_size']=$this->input->post('size');
    	$data['truck_categories']=$this->input->post('category');
    	$data['truck_owners']=$this->input->post('owner');
    	$data['number_plate']=$this->input->post('number_plate');
    	$data['model']=$this->input->post('model');
    	$data['description']=$this->input->post('description');
    	$data['truck_image']=$this->generateImage($this->input->post('truck_image'));
    	$data['service_point']=$this->input->post('service_point');
    	$data['coordinates']=$this->input->post('coordinates');
    	$data['comsumption']=$this->input->post('consumption');
    	$data['agents']=$this->input->post('agent_id');
    	$this->Node_model->add_truck_info($data);
    	$response["message"]="success";
    	$response["status_code"]="1";
    	echo json_encode($response);
    }
    
    public function owner_register_truck(){
      $data['drivers'] = $this->input->post('drivers');
      $data['truck_size'] = $this->input->post('size');
    	$data['truck_categories'] = $this->input->post('category');
    	$data['truck_owners'] = $this->input->post('owner');
    	$data['number_plate'] = $this->input->post('number_plate');
    	$data['model'] = $this->input->post('model');
    	$data['description'] = $this->input->post('description');
    	$data['truck_image'] = $this->generateImage($this->input->post('truck_image'));
    	$data['service_point'] = $this->input->post('service_point');
    	$data['coordinates'] = $this->input->post('coordinates');
    	$data['comsumption'] = $this->input->post('consumption');
      $data['agents'] = $this->Node_model->get_owner_details($data['truck_owners'])['agents'];
    	$truck_id = $this->Node_model->add_truck_info($data);
      $truck_added_notification = array('type' => 'truck_added',
                                       'trucks' => $truck_id,
                                       'truck_owners' => $data['truck_owners']);
      $this->Node_model->set_notification($truck_added_notification);
      $owner_details = $this->Node_model->get_owner_details($data['truck_owners']);
      $agent_details = $this->Agents_model->get_agent($data['agents']);
      $this->notify_agent_truck_assigned($owner_details,$agent_details,$data);
    	$response["message"] = "success";
    	$response["status_code"] = "1";
    	echo json_encode($response);
    }
    
    public function notify_agent_truck_assigned($owner_details,$agent_details,$data){
      $apiKey = 'AAAAYbM1nAg:APA91bGjDJlWBmMxMxWiSxwkt8xm6wt-sKBs1ngJ1CFGRhqXC5Q1Qr8_UczUqF8z1itsOzMNW7j6vcMqObDiQ0YZa-3Pq6uQicqyDWJVLX-6JWsq0u7v9OrKciWGM7kp7BvSJoZcLDi5';
      $client = new Client();
      $client->setApiKey($apiKey);
      $client->injectHttpClient(new \GuzzleHttp\Client());
      $message = new Message();
      $message->addRecipient(new Device($agent_details['token']));
      $message->setData(array(
        'pay_load' => 'new_truck',
        'type' => $data['truck_categories'],
        'number_plate' => $data['number_plate'],
        'phonenumber' => $owner_details['phonenumber']));
      $response = $client->send($message);
    }
    
    public function update_owner_register_truck(){
      $truck_id = $this->input->post('trucks');
      $data['drivers']=$this->input->post('drivers');
      $data['truck_size']=$this->input->post('size');
    	$data['truck_categories'] = $this->input->post('category');
    	$data['truck_owners']=$this->input->post('owner');
    	$data['number_plate']=$this->input->post('number_plate');
    	$data['model']=$this->input->post('model');
    	$data['description']=$this->input->post('description');
    	$data['truck_image']=$this->generateImage($this->input->post('truck_image'));
    	$data['service_point']=$this->input->post('service_point');
    	$data['coordinates']=$this->input->post('coordinates');
    	$data['comsumption']=$this->input->post('consumption');
      
       #check if already approved by agent or admin
        $agent_query = $this->Node_model->checktruck_agent_verification(array('id'=>$truck_id,
                                                                              'agent_verification'=>'1'));
        if($agent_query->num_rows()>0){
          # agent verified
          $response['message'] = "update failed already verified by agent.";
          $response['status_code'] = '0';
        }else{
          $admin_query = $this->Node_model->checktruck_admin_verification(array('id'=>$truck_id,
                                                                            'admin_verification'=>'1'));
          if($admin_query->num_rows()>0){
            # admin approved
            $response['message'] = "update failed already approved by admin";
            $response['status_code'] = '0';
          }else{
            $this->Node_model->update_truck_info($truck_id,$data);
            $response["message"]="success";
    	      $response["status_code"]="1";
          }
        }
    	echo json_encode($response);
    }

    public function add_phone_number(){
       $phonenumber = $this->input->post('phonenumber');
       $token = $this->input->post('token');
       $response['message'] = '';
       $response['status_code'] = '';
       if(empty($phonenumber)){
         $response['message'] = 'Please add phonenumber and try again';
         $response['status_code'] = '0';
         //echo json_encode($response);
       }else{
       	$digits = 4;
        $code = rand(pow(10, $digits-1), pow(10, $digits)-1);
        #check if the number exists.
        $is_client_number_set = $this->Node_model->is_client_number_set($phonenumber);
        if($is_client_number_set){
          $this->Node_model->add_number($phonenumber,$code,$token);
          $sms_response = $this->send_sms($phonenumber,$code);
          $response['message'] = 'success';
       	  $response['status_code'] = '1';
          $response['exists'] = '1';
        }else{
          $this->Node_model->add_number($phonenumber,$code,$token);
          $sms_response = $this->send_sms($phonenumber,$code);
          $response['message'] = 'success';
       	  $response['status_code'] = '1';
          $response['exists'] = '0';
        } 
       	echo json_encode($response);
       }  	
    }
    
    public function send_sms($phonenumber,$code){
      $method = 'POST';
      $info['username'] = 'admin@admin.com';
	    $info['password'] = 'password';
      $info['title'] = 'Truckz application';
	    $info['message'] = "Truckz application, your verification code is ".$code;
	    $info['contact'] = $phonenumber;
      $info['phonebook'] = '80';
	    $url = 'http://sendsmsug.info/apis/send_sms';
	    return $this->CallAPI($method,$url,$info); 
    }

    public function verify_number(){
	    	$phonenumber=$this->input->post('phonenumber');
	    	$verification_code=$this->input->post('verification_code');
	    	$response=[];
    	if(empty($phonenumber)){
	        $response['message']='please put phonenumber and try again';
	        $response['status_code']='0'; 
    	}elseif(empty($verification_code)){
		    $response['message']='please put verification code and try again';
		    $response['status_code']='0'; 
    	}else{
	        $data = array('phonenumber' => $phonenumber,'verification_code'=>$verification_code);	
	        $result=$this->Node_model->check_code_and_number($data);
	        if($result==1)
	        {
	         $response['message']='success';
	         $response['status_code']='1'; 
	        }
	        else
	        {
	        $response['message']='wrong code!';
	        $response['status_code']='0'; 
	        }
        }
        echo json_encode($response);
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

	    // Optional Authentication:
	    curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
	    curl_setopt($curl, CURLOPT_USERPWD, "username:password");
	    curl_setopt($curl, CURLOPT_URL, $url);
	    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	    $result = curl_exec($curl);
	    curl_close($curl);
	    return $result;
	}

	public function add_client_profile(){
		$phonenumber=$this->input->post('phonenumber');
		$data['username']=$this->input->post('username');
		$data['avata']=$this->generateImage($this->input->post('text_image'));
		$this->Node_model->add_node_model($phonenumber,$data);
		$response['message']='success';
		$response['status_code']='1';
		echo json_encode($response);
	}

// 	public function get_trucks_by_category(){
// 		$category = $this->input->post('category');
// 		$response['message']='success';
// 		$response['status_code']='1';
// 		$response['trucks']=$this->Node_model->get_trucks_by_category($category);
//     echo json_encode($response);
// 	}

	public function get_category_types(){
    $query = $this->input->post('query');
    if(empty($query)){
      $response['categories'] = $this->Node_model->get_category_types($query = NULL);
		  $response['message'] = 'success';
		  $response['status_code'] = '1';
    }else{
      $response['categories'] = $this->Node_model->get_category_types($query);
		  $response['message'] = 'success';
		  $response['status_code'] = '1';
    }
    echo json_encode($response);
	}

	public function verify_user(){
		$data['phonenumber'] = $this->input->post('phonenumber');
		$data['code'] = $this->input->post('code');
		$data['token'] = $this->input->post('token');
    if(empty($data['phonenumber'])){
       $response['message'] = "Please put phonenumber";
       $response['status_code'] = "0";
    }else if(empty($data['code'])){
      $response['message'] = "Please put verification code";
      $response['status_code'] = "0";
    }else if(empty($data['token'])){
      $response['message'] = "Device token not attached please try again later.";
      $response['status_code'] = "0";
    }else{
     #query owners
    $array_owner_phonenumber = array(
      'phonenumber' => $data['phonenumber']);
    $owner_results = $this->Node_model->verify_truck_owner_phonenumber($array_owner_phonenumber);
    if($owner_results == 1 ){
      # checking for combination of code and phonenumber
      $owner_verification_results = $this->Node_model->verify_truck_owner($data);
      if($owner_verification_results == 1 ){
        $owner_data = array(
          'phonenumber'=>$data['phonenumber'],
          'code'=>$data['code']);
        $response['owner_id'] = $this->Node_model->get_truck_owner($owner_data)['id'];
        $owner_data_id = array(
          'id' => $response['owner_id']);
        $response['change_code'] = $this->Node_model->get_truck_owner($owner_data_id)['change_code'];
        $response['message'] = 'success';
        $response['status_code'] = '1';
        $response['user_type'] = '1';
      }else{
        $response['message'] = "Wrong verification code for Truck owner";
        $response['status_code'] = "0";
      }
    }else{
      $array_driver_phonenumber = array(
      'phonenumber' => $data['phonenumber']);
      $driver_results = $this->Node_model->verify_truck_driver_phonenumber($array_driver_phonenumber);
      if($driver_results == 1 ){
        $array_driver_verification = array('phonenumber'=>$data['phonenumber'],'code'=>$data['code']);
        $driver_verification_results = $this->Node_model->verify_truck_driver($data);
        if($driver_verification_results == 1){
          $driver_details = $this->Node_model->get_driver_details_verification($array_driver_verification);
          $response['driver_id'] = $driver_details['id'];
          $response['change_code'] = $driver_details['change_code'];
          $response['message'] = 'success';
          $response['status_code'] = '1';
          $response['user_type'] = '2';
        }else{
          $response['message'] = "Wrong verification code for Truck driver";
          $response['status_code'] = "0";
        }
      }else{
        $response['message'] = "This phonenumber is not registered on truckz booking application";
        $response['status_code'] = "0";
      }
    } 
    }
    echo json_encode($response);
	}
    

	public function get_my_trucks(){
		$phonenumber=$this->input->post('phonenumber');
		$id=$this->Node_model->get_id_where_number($phonenumber)['id'];
		$data['trucks']=$this->Node_model->get_my_trucks($id);
		$data['status_code']='1';
		$data['message']='success';
		echo json_encode($data);
	}

	public function get_my_drivers(){
        $phonenumber = $this->input->post('phonenumber');
        $id = $this->Node_model->get_id_where_number($phonenumber)['id'];
        $data['drivers'] = $this->Node_model->get_my_drivers($id);
        echo json_encode($data);
	}

	public function add_driver_info(){
    $data['driver_image'] = $this->generateImage($this->input->post('driver_image'));
    $data['first_name'] = $this->input->post('first_name');
    $data['second_name'] = $this->input->post('second_name');
    $data['phonenumber'] = $this->clean_phonenumber($this->input->post('driver_number'));
    $data['driver_email'] = $this->input->post('driver_email');
    $data['driver_ssn'] = $this->input->post('driver_ssn');
    $data['truck_owners'] = $this->input->post('owner');
    $data['permit_id'] = $this->input->post('permit_id');
    $if_driver_exists = $this->Node_model->if_driver_exists($data['phonenumber']);
    if($if_driver_exists){
      $response['message'] = 'driver exists';
      $response['status_code'] = '0';
    }else{
      $driver_id = $this->Node_model->add_driver_info($data);
      # notify administrator to approve driver information
      $driver_added_notification = array('type' => 'driver_added',
                                       'drivers' => $driver_id,
                                       'truck_owners' => $data['truck_owners']);
      $this->Node_model->set_notification($driver_added_notification);
      $response['message'] = 'success';
      $response['status_code'] = '1';
    }
    echo json_encode($response);
	}
    
    public function update_driver_info(){
      $driver_id = $this->input->post('driver');  
      $data['driver_image'] = $this->generateImage($this->input->post('driver_image'));
      $data['first_name'] = $this->input->post('first_name');
      $data['second_name'] = $this->input->post('second_name');
      $data['phonenumber'] = $this->clean_phonenumber($this->input->post('driver_number'));
      $data['driver_email'] = $this->input->post('driver_email');
      $data['driver_ssn'] = $this->input->post('driver_ssn');
      $data['truck_owners'] = $this->input->post('owner');
      $data['permit_id'] = $this->input->post('permit_id');
      #check for admin verification
      $admin_query = $this->Node_model->checkdriver_admin_verification(array('id'=>$driver_id,
                                                                             'admin_verification'=>'1'));
      if($admin_query->num_rows()>0){
        # verified
        $response['message'] = 'cannot update already verified by admin';
        $response['status_code'] = '0';
      }else{
        $this->Node_model->update_driver_info($driver_id,$data);
        $response['message'] = 'success';
        $response['status_code'] = '1';
      }
    echo json_encode($response);
	}

	public function match_driver_truck(){
       $data['truck_id']=$this->input->post('truck_id');
       $data['driver_id']=$this->input->post('driver_id');
       $this->Node_model->update_driver($data['truck_id'],$data['driver_id']);
       $this->Node_model->update_truck($data['truck_id'],$data['driver_id']);
       $response['message']='success';
       $response['status_code']='1';
       echo json_encode($response);
	}

	public function get_truck_number_plate(){
       $truck_id=$this->input->post('truck_id');
       $response['number_plate']=$this->Node_model->get_truck_number_plate($truck_id)['number_plate'];
       echo json_encode($response);
	}

	public function place_order(){
		$phonenumber = $this->input->post('phonenumber');
		$data['client_id'] = $this->Node_model->get_client_id($phonenumber)['id'];
    if(empty($data['client_id'])){
      $response['message']='phonenumber does not exist';
      $response['status_code']='0';
      echo json_encode($phonenumber);
      return;
    }
		$data['number_days'] = $this->input->post('number_days');
		$data['truck_type'] = $this->input->post('truck_type');
		$data['pickup_address'] = $this->input->post('pickup_address');
		$data['pickup_latlng'] = $this->input->post('pickup_latlng');
		$data['dest_address'] = $this->input->post('dest_address');
		$data['dest_latlng'] = $this->input->post('dest_latlng');
		$data['status'] = $this->input->post('status');
		$data['time_stamp'] = date('Y-m-d H:i:s');
    
		$data['truck_category_name'] = $this->Node_model->get_category_name($data['truck_type'])['name'];
    $data['when'] = $this->input->post('when');
    $data['short_description'] = $this->input->post('short_description');
    $data['size'] = $this->input->post('truck_size');
    $data['price'] = $this->input->post('price');
    $data['order_id'] = $this->Node_model->make_order($data);
    $this->find_service_providers($data);
		//$this->send_order_broadcast($data);
	}

	public function find_service_providers($data){
    #find nearby service provider
		$trucks = $this->Node_model->get_available_trucks($data);
    $response = array();
		if(sizeof($trucks)>0){
			    $latlng = $data['pickup_latlng'];
	        $clean = str_replace("lat/lng: ","",$latlng);
	        $clean_2 = substr($clean, 1, -1);
	        $coord = explode(',', $clean_2);
	        $latfrom = str_replace("(","",$coord[0]);
	        $lngfrom = $coord[1];
	        
            foreach ($trucks as $key => $truck) {
              # code...
            $latlng = $truck['coordinates'];
            $clean = str_replace("lat/lng: ","",$latlng);
            $clean_2 = substr($clean, 1, -1);
            $coord = explode(',', $clean_2);
            $lat = $coord[0];
            $lng = $coord[1];

            $distance = $this->haversineGreatCircleDistance($latfrom,$lngfrom,$lat,$lng);
              if($distance<5000){
                 $truck_owner = $truck['truck_owners'];
                 $device_id = $this->Node_model->get_fcm_code($truck_owner)['token'];
                 $this->send_order_broadcast_owner($device_id,$data,$truck);
                 $notified_owner = array('truck_owners'=>$truck['truck_owners'],
                                         'orders'=>$data['order_id'],
                                         'trucks'=>$truck['id']);
                 $this->Node_model->add_notified_owner($notified_owner);
                 $response['order_number'] = $data['order_id'];
                 $response['message'] = 'success';
                 $response['status_code'] = '1';
              }else{
                $response['message']='No trucks within specified range';
                $response['status_code']='0';
              } 
          }
           //$response['lat'] = $latfrom;
           //$response['long'] = $lngfrom;
      }else{
           $response['message']='No trucks available';
           $response['status_code']='0';
	  }
	  echo json_encode($response);
	}


	function haversineGreatCircleDistance($latitudeFrom, $longitudeFrom, $latitudeTo, $longitudeTo, $earthRadius = 6371000){
		// convert from degrees to radians
		$latFrom = deg2rad($latitudeFrom);
		$lonFrom = deg2rad($longitudeFrom);
		$latTo = deg2rad($latitudeTo);
		$lonTo = deg2rad($longitudeTo);

		$latDelta = $latTo - $latFrom;
		$lonDelta = $lonTo - $lonFrom;

		$angle = 2 * asin(sqrt(pow(sin($latDelta / 2), 2) +
							   cos($latFrom) * cos($latTo) * pow(sin($lonDelta / 2), 2)));
		return $angle * $earthRadius;
	}


	public function send_order_broadcast_owner($device_id,$data,$truck){
    //$apiKey = 'AAAA2lw6huk:APA91bEZ0uPP50WKtVEo7kKJ7w9nFUs9ZQMHf3Kk6Msb6IxWeHhUIu3RbX8eBZ-70kOaEMNZbJy0lDkbTRIWjSiqtZ0afdkB1s4CgNiw4-XPxFXax-BKPYWcURRCxx-edP6CUFSDT302';
    //$apiKey = 'AAAAusHdRm8:APA91bGqedc244VVKrDV3BQa3nResLXPsMu1lrOt_Yo_Fs3Ecn1wuYEJIYuV33ljdt0FBacgv1iNfzji8QSx0UaPVRXhHsxp0tMN8LOpMxkbUQE0Tt44s0cQtlnAq_CBCmTm5mJJ1XDH';
    $apiKey = 'AAAAf59rIBo:APA91bEnsZ83Rx0lfXW4gPuCBdETIJQjFBCrUSNwXj_fAzk0tXQxJf1WyDCbzMG7qQcYpsJE2FmPTHSCWBYNd946ysAsBwObsseiL0vUf9Q9APbtfpEWv58CBsB1AIZCt5bVrS4tvyZm';
    
    $client = new Client();
    $client->setApiKey($apiKey);
    $client->injectHttpClient(new \GuzzleHttp\Client());

    $message = new Message();
    $message->addRecipient(new Device($device_id));

    $message->setData(array(
      'pay_load' => 'new_order',
      'order_id' => $data['order_id'],
      'truck_type' => $data['truck_type'],
      'truck_type_name' => $this->Node_model->get_truck_type($data['truck_type'])['name'],
      'truck_type_image' => base_url('static/uploads/'.$this->Node_model->get_truck_type($data['truck_type'])['image2']),
      'estimate_amount' => $data['price'],
      'client_image' => $this->Node_model->get_client_details($data['client_id'])['avata'],
      'client_name' => $this->Node_model->get_client_details($data['client_id'])['username'],
      'client_phone' => $this->Node_model->get_client_details($data['client_id'])['phonenumber'],
      'pickup_address' => $data['pickup_address'],
      'dest_address' => $data['dest_address'],
      'time_stamp' => $data['time_stamp'],
      'truck_size' => $truck['truck_size'],
      'status' => $data['status']));
    $response = $client->send($message); 
    return $response->getStatusCode();
	}

 // public function send_order_broadcast($data)
 //    {
 //       $apiKey = 'AAAA2lw6huk:APA91bEZ0uPP50WKtVEo7kKJ7w9nFUs9ZQMHf3Kk6Msb6IxWeHhUIu3RbX8eBZ-70kOaEMNZbJy0lDkbTRIWjSiqtZ0afdkB1s4CgNiw4-XPxFXax-BKPYWcURRCxx-edP6CUFSDT302';
 //       $client = new Client();
 //       $client->setApiKey($apiKey);
 //       $client->injectHttpClient(new \GuzzleHttp\Client());

 //       $message = new Message();
 //       $message->addRecipient(new Topic('new-order'));
 //       //select devices where has 'your-topic1' && 'your-topic2' topics
 //       //$message->addRecipient(new Topic(['your-topic1', 'your-topic2']));
 //       //$message->setNotification(new Notification('test title', 'testing body'))
 //        $message->setData(array(
 //        	'order_id' => $data['order_id'],
 //           	'truck_type' => $data['truck_type'],
 //           	'truck_type_name' => $this->Node_model->get_truck_type($data['truck_type'])['name'],
 //           	'truck_type_image' => base_url('static/uploads/'.$this->Node_model->get_truck_type($data['truck_type'])['image']),
 //           	'pickup_address' => $data['pickup_address'],
 //           	'dest_address' => $data['dest_address'],
 //           	'time_stamp' => $data['time_stamp'],
 //           	'status' => $data['status']));

 //       $response = $client->send($message);
 //       var_dump($response);
 //    }

	public function check_order_status(){
        $order_number = $this->input->post('order_number');
        $status = $this->Node_model->get_status($order_number)['status'];
        $truck_id = $this->Node_model->get_order($order_number)['truck_id'];
        $driver_id = $this->Node_model->get_order($order_number)['driver_id'];
    
        if($status == '2'){
          $owner_id = $this->Node_model->get_order($order_number)['service_provider'];
          $response['owner_number'] = $this->Node_model->get_owner_details($owner_id)['phonenumber'];
          $response['driver_lat'] = $this->Driver_model->get_driver_location($driver_id)['lat'];
          $response['driver_lng'] = $this->Driver_model->get_driver_location($driver_id)['lng'];
        }elseif($status == '4'){
          $response['driver_lat'] = $this->Driver_model->get_driver_location($driver_id)['lat'];
          $response['driver_lng'] = $this->Driver_model->get_driver_location($driver_id)['lng'];
        }
        $response['status']=$status;
        $response['message']='success';
        $response['status_code']=1;
		    echo json_encode($response);
  }  

    public function get_orders(){
       $orders=$this->Node_model->get_orders();
       $response=array();
       foreach ($orders as $key => $order) {
        $response[$key]['truck_type']=$order['truck_type'];
        $response[$key]['truck_type_name']=$this->Node_model->get_truck_type($response[$key]['truck_type'])['name'];
        $response[$key]['truck_type_image']=base_url('static/uploads/'.$this->Node_model->get_truck_type($response[$key]['truck_type'])['image']);
        $response[$key]['pickup_address']=$order['pickup_address'];
       	$response[$key]['dest_address']=$order['dest_address'];
       	$response[$key]['truck_category_name']=$order['truck_category_name'];
       	$response[$key]['time_stamp']=$order['time_stamp'];
       	$response[$key]['status']=$order['status'];
       }
       echo json_encode($response);
    }

    public function update_order_found(){
        # check if the task is still available
        # check if service provider has trucks
        # check if the truck has a driver attached to it
    	  # check if the driver is available
    	  # notify the driver of the truck
    	  # update order status
       $order_id = $this->input->post('order_id');
       $phonenumber = $this->input->post('phonenumber');
       $data['status'] = $this->input->post('status');
       $has_sp = $this->Node_model->get_order($order_id)['service_provider'];
       $response = array();
       if($has_sp == "0"){
          $this->Node_model->update_status($order_id,$data);
          $service_provider = $this->Node_model->get_service_provider($phonenumber)['id'];
          $truck_category_id = $this->Node_model->get_order($order_id)['truck_type'];
          $trucks = $this->Node_model->get_truck_driver($service_provider,$truck_category_id);
          if(sizeof($trucks)>0){
	             $driver_id = $trucks['drivers'];
               $truck_id = $trucks['id'];
	             if($driver_id == ""){
	                $response['message'] = "No driver attached to this truck, please attach driver number plate: "+$trucks['number_plate'];
	                $response['status_code'] = '0';
	             }else{
	             	$driver_token = $this->Node_model->get_driver_fcm_token($driver_id)['token'];
                //$driver_token = "";
	             	if(empty($driver_token)){
	             		$first_name = $this->Node_model->get_driver_fcm_token($driver_id)['first_name'];
	             		$second_name = $this->Node_model->get_driver_fcm_token($driver_id)['second_name'];
	             	  $response['message'] = "Driver ".$first_name." ".$second_name." is not signed in.";
	             	  $response['status_code'] = "0";
	             	}else{
	             		#get order details
	             		$this->Node_model->update_found_service_provider($order_id,$service_provider,$driver_id,$truck_id);
	             		$order = $this->Node_model->get_order($order_id);
	             		$this->notify_driver($driver_token,$order);
	             		$this->notify_client($order_id,$phonenumber);

	             		$response['message'] = "Driver notified";
                  $response['status_code'] = "1";
	             	} 
	             }
            //echo json_encode($driver_id);
          }else{
             $response['message']="You have no available trucks";
             $response['status_code']='0';
          }
       }else{
         $response['message']="Order is no longer available";
         $response['status_code']='0';
       }
       echo json_encode($response);
    }
    
    public function notify_driver($token,$data){
      //$apiKey = 'AAAAusHdRm8:APA91bGqedc244VVKrDV3BQa3nResLXPsMu1lrOt_Yo_Fs3Ecn1wuYEJIYuV33ljdt0FBacgv1iNfzji8QSx0UaPVRXhHsxp0tMN8LOpMxkbUQE0Tt44s0cQtlnAq_CBCmTm5mJJ1XDH';
      $apiKey = 'AAAAf59rIBo:APA91bEnsZ83Rx0lfXW4gPuCBdETIJQjFBCrUSNwXj_fAzk0tXQxJf1WyDCbzMG7qQcYpsJE2FmPTHSCWBYNd946ysAsBwObsseiL0vUf9Q9APbtfpEWv58CBsB1AIZCt5bVrS4tvyZm';
      $client = new Client();
      $client->setApiKey($apiKey);
      $client->injectHttpClient(new \GuzzleHttp\Client());
      $message = new Message();
      $message->addRecipient(new Device($token));
      $message->setData(array(
      'pay_load' => 'new_order',
      'order_id' => $data['id'],
      'truck_type' => $data['truck_type'],
      'truck_type_name' => $this->Node_model->get_truck_type($data['truck_type'])['name'],
      'truck_type_image' => base_url('static/uploads/'.$this->Node_model->get_truck_type($data['truck_type'])['image2']),
      'estimate_amount' => $data['price'],
      'client_image' => $this->Node_model->get_client_details($data['client_id'])['avata'],
      'client_name' => $this->Node_model->get_client_details($data['client_id'])['username'],
      'client_phone' => $this->Node_model->get_client_details($data['client_id'])['phonenumber'],
      'pickup_address' => $data['pickup_address'],
      'dest_address' => $data['dest_address'],
      'time_stamp' => $data['time_stamp'],
      'truck_size' => $data['size'],
      'status' => $data['status']));
      $response = $client->send($message);
    }
    
    public function notify_client($order_id,$phonenumber){
    	$status=$this->Node_model->get_order_status($order_id)['status'];
    	$client_id=$this->Node_model->get_order_status($order_id)['client_id'];
      $device_id=$this->Node_model->get_client_details($client_id)['fcm_token'];

      $apiKey = 'AAAA2lw6huk:APA91bEZ0uPP50WKtVEo7kKJ7w9nFUs9ZQMHf3Kk6Msb6IxWeHhUIu3RbX8eBZ-70kOaEMNZbJy0lDkbTRIWjSiqtZ0afdkB1s4CgNiw4-XPxFXax-BKPYWcURRCxx-edP6CUFSDT302';
      
      $client = new Client();
      $client->setApiKey($apiKey);
      $client->injectHttpClient(new \GuzzleHttp\Client());

      $message = new Message();
      $message->addRecipient(new Device($device_id));

      $message->setData(array(
        'phonenumber' => $phonenumber,
        'payload'=>'progress',
        'status' => $status,
        'message' => 'success',
        'status_code' => '1'
        ));
      $response = $client->send($message);
      return $response;
    }
    


    public function get_my_orders(){
        $phonenumber=$this->input->post('phonenumber');
        $service_provider=$this->Node_model->get_service_provider($phonenumber)['id'];
        $orders=$this->Node_model->get_my_orders($service_provider);
        $data=array();
        $response=array();
		   foreach ($orders as $key => $order) {
		   	$response[$key]['id']=$order['id'];
		    $response[$key]['truck_type']=$order['truck_type'];
		    $response[$key]['truck_type_name']=$this->Node_model->get_truck_type($response[$key]['truck_type'])['name'];
		    $response[$key]['truck_type_image']=base_url('static/uploads/'.$this->Node_model->get_truck_type($response[$key]['truck_type'])['image']);
		    $response[$key]['pickup_address']=$order['pickup_address'];
		   	$response[$key]['dest_address']=$order['dest_address'];
		   	$response[$key]['truck_category_name']=$order['truck_category_name'];
		   	$response[$key]['time_stamp']=$order['time_stamp'];
		   	$response[$key]['status']=$order['status'];
		   }
		   $data['orders']=$response;
       echo json_encode($data);
    }

    public function get_driver_orders(){
        $service_provider=$this->input->post('owner_id');
        $orders=$this->Node_model->get_my_orders($service_provider);
        $data=array();
        $response=array();
		   foreach ($orders as $key => $order) {
		    $response[$key]['truck_type']=$order['truck_type'];
		    $response[$key]['truck_type_name']=$this->Node_model->get_truck_type($response[$key]['truck_type'])['name'];
		    $response[$key]['truck_category_image']=base_url('static/uploads/'.$this->Node_model->get_truck_type($response[$key]['truck_type'])['image']);
		    $response[$key]['pickup_address']=$order['pickup_address'];
		   	$response[$key]['dest_address']=$order['dest_address'];
		   	$response[$key]['truck_category_name']=$order['truck_category_name'];
		   	$response[$key]['time_stamp']=$order['time_stamp'];
		   	$response[$key]['status']=$order['status'];
		   }
		   $data['orders']=$response;
       echo json_encode($data);
    }

    public function get_job_status(){
    	$order_id=$this->input->post('order_id');
    	$status=$this->Node_model->get_job_status($order_id)['status'];
    	$response['status']=$status;
    	$response['message']='success';
    	$response['status_code']='1';
      echo json_encode($response);
    }

    public function update_status(){
       $data['status'] = $this->input->post('status');
      
       $id = $this->input->post('order_id');
       $phonenumber = $this->input->post('phonenumber');
      
       $this->Node_model->update_status($id,$data);
       $response['message'] = 'success';
       $response['status_code'] = '1';
       
       $response['result'] = $this->notify_client($id,$phonenumber);
       if($data['status'] == '-1'){
       	 $this->notify_driverandowner($id);
       }elseif($data['status']=='7'){
       	 $order_item = $this->Main_model->get_order_item($id);
         $data['client_id']=$order_item['client_id'];
         $data['service_provider']=$order_item['service_provider'];
         $data['costing']=$order_item['price'];
         $data['acc_client']=$this->Wallet_model->get_client_wallet($data['client_id'])['credit'];
         $data['acc_service_provider']=$this->Wallet_model->get_service_provider_wallet($data['service_provider'])['credit'];
         $this->Wallet_model->credit_service_provider_wallet($data['service_provider'],$data['costing']);
         $this->Wallet_model->debit_client_wallet($data['client_id'],$data['costing']);
         #notifydriverandclient
         #echo json_encode($data);
       }
      echo json_encode($response);
    }



    public function make_transaction(){
    	if($this->input->server('REQUEST_METHOD') == 'POST'){
            $number=$this->input->post('client_contact');
	    	$info['client']=$this->Node_model->get_user_id($number)['id'];
	    	$info['contact']=$this->input->post('mobile_money_number');
	    	$info['amount']=$this->input->post('amount');
	    	$info['transaction_type']=$this->input->post('transaction_type');
	    	$info['timestamp']=date("Y-m-d h:i:sa");
	        $info['secret_code']=$this->input->post('secret_code');
	    	$data=$this->initiate_mobilemoney_transation($info['contact'],$info['amount'],$info['secret_code'],$info['transaction_type']);
	        $result=json_decode($data);
	        $info['trans_id']=$result->order_number;
	        $info['status']='initiated';
	        $this->Node_model->add_transaction($info);
	    	$response['order_number']="".$result->order_number;
	    	$response['message']="success";
	    	$response['status_code']="1"; 
    	}else{
    		$response['message']="failed";
    	    $response['status_code']="0";
    	}
    	echo json_encode($response);
    }

    public function sp_make_transaction(){
    	if($this->input->server('REQUEST_METHOD') == 'POST'){
            $number=$this->input->post('sp_contact');
	    	$info['truck_owners']=$this->Node_model->get_sp_id($number)['id'];
	    	$info['contact']=$this->input->post('mobile_money_number');
	    	$info['amount']=$this->input->post('amount');
	    	$info['transaction_type']=$this->input->post('transaction_type');
	    	$info['timestamp']=date("Y-m-d h:i:sa");
	        $info['secret_code']=$this->input->post('secret_code');
	    	$data=$this->initiate_mobilemoney_transation($info['contact'],$info['amount'],$info['secret_code'],$info['transaction_type']);
	        $result=json_decode($data);
	        $info['trans_id']="".$result->order_number;
	        $info['status']='initiated';
	        $this->Node_model->add_sp_transaction($info);
	    	$response['order_number']="".$result->order_number;
	    	$response['message']="success";
	    	$response['status_code']="1"; 
    	}else{
    		$response['message']="failed";
    	    $response['status_code']="0";
    	}
    	echo json_encode($response);
    }


    public function initiate_mobilemoney_transation($contact,$amount,$secret_code,$transaction_type){
      $data['secret_code']=$secret_code;
      $data['contact']=$contact;
      $data['amount']=$amount;
      $data['trans_type']=$transaction_type;
      $data['username']="nserekolouis@gmail.com";
      $data['password']="password";
      $url="http://www.sudopay.xyz/node/make_transaction";
      return $this->CallAPI("POST",$url,$data);
    }

    public function get_credit_balance(){
      $contact=$this->input->post('client_contact');
      $client=$this->Node_model->get_user_id($contact)['id'];
      if(isset($client)){
         $this->check_previous_transactions($client);
         $this->add_approved_transactions($client);
         $response['credit']=$this->Node_model->get_wallet_balance($client);
         $response['message']="success";
         $response['status_code']="1";
      }else{
         $response['message']='client not found';
         $response['status_code']='0'; 
      }
      
      echo json_encode($response); 
    }

    public function get_sp_credit_balance(){
      $contact=$this->input->post('sp_contact');
      $sp=$this->Node_model->get_sp_id($contact)['id'];
      if(isset($sp)){
         $this->check_sp_previous_transactions($sp);
         $this->add_sp_approved_transactions($sp);
         $response['credit']=$this->Node_model->get_sp_wallet_balance($sp);
         $response['message']="success";
         $response['status_code']="1";
      }else{
         $response['message']='failed';
         $response['status_code']='0'; 
      }
      echo json_encode($response); 
    }

    public function add_approved_transactions($client){
      $transactions=$this->Node_model->get_approved_transactions($client);
      $amount=0;
      foreach ($transactions as $key => $transaction) {
      	# code...
       $amount=+$transaction['amount'];
       $id=$transaction['id'];
       $this->Node_model->change_read_status($id);
      }
      $this->Node_model->update_client_wallet($client,$amount);
    }

    public function add_sp_approved_transactions($sp){
      $transactions=$this->Node_model->get_sp_approved_transactions($sp);
      $amount=0;
      foreach ($transactions as $key => $transaction) {
      	# code...
       $amount=+$transaction['amount'];
       $id=$transaction['id'];
       $this->Node_model->change_sp_read_status($id);
      }
      $this->Node_model->update_sp_wallet($sp,$amount);
    }
    
    public function check_previous_transactions($client){
      $transactions=$this->Node_model->get_transactions($client);
      //echo json_encode($transactions);
      foreach ($transactions as $key => $transaction) {
      	# code...
      	$trans_id=$transaction['trans_id'];
      	$this->check_transaction_status($trans_id);
      }
    }

    public function check_sp_previous_transactions($sp){
      $transactions=$this->Node_model->get_sp_transactions($sp);
      //echo json_encode($transactions);
      foreach ($transactions as $key => $transaction) {
      	# code...
      	$trans_id=$transaction['trans_id'];
      	$this->check_sp_transaction_status($trans_id);
      }
    }

    public function check_transaction_status($trans_id){
      $data['id']=$trans_id;
      $url="http://www.sudopay.xyz/node/get_transaction_status";
      $response=$this->CallAPI("POST",$url,$data);
      $results=json_decode($response);
      $data['status']=$results->status;
      $this->Node_model->update_transaction_status($data['id'],$data['status']);
      $data['message']="success";
      $data['status_code']="1";
      //echo json_encode($data);
    }

    public function check_sp_transaction_status($trans_id){
      $data['id']=$trans_id;
      $url="http://www.sudopay.xyz/node/get_transaction_status";
      $response=$this->CallAPI("POST",$url,$data);
      $results=json_decode($response);
      $data['status']=$results->status;
      $this->Node_model->update_sp_transaction_status($data['id'],$data['status']);
      $data['message']="success";
      $data['status_code']="1";
    }

    public function api_check_status(){
    	$info['id']=$this->input->post('trans_id');
    	$url="http://www.sudopay.xyz/node/get_transaction_status";
    	$response=$this->CallAPI("POST",$url,$info);
    	$results=json_decode($response);
    	$data['status']="".$results->status;
    	if($data['status']=="delivered"){

           $client = $this->Node_model->get_transaction_details($info['id'])['client'];
           $amount = $this->Node_model->get_transaction_details($info['id'])['amount'];
           $read_status = $this->Node_model->get_transaction_details($info['id'])['read'];
           if($read_status=='0'){
           	  $this->Node_model->update_transaction_status($info['id'],$data['status']);
              $this->Wallet_model->credit_client_wallet($client,$amount);
           }
    	   $data['message']="success";
    	   $data['status_code']="1";
    	}elseif ($data['status']=="failed") {
    		# code...
            $data['comment'] = "".$results->comment;
            $data['message'] = "".$results->status;
    	    $data['status_code'] = "0";
    	}else{
    		$data['message']="".$results->status;
    	    $data['status_code']="0";
    	}
    	echo json_encode($data);
    }

    public function sp_api_check_status(){
    	$info['id']=$this->input->post('trans_id');
    	$url="http://www.sudopay.xyz/node/get_transaction_status";
    	$response=$this->CallAPI("POST",$url,$info);
    	$results=json_decode($response);
    	$data['status']="".$results->status;
    	if($data['status']=="delivered"){
    	   $transaction_type = $this->Node_model->get_sp_transaction_details($info['id'])['transaction_type'];	
           $sp = $this->Node_model->get_sp_transaction_details($info['id'])['truck_owners'];
           $amount = $this->Node_model->get_sp_transaction_details($info['id'])['amount'];
           $read_status = $this->Node_model->get_sp_transaction_details($info['id'])['read'];
           if($read_status=='0'){
           	  $this->Node_model->update_sp_transaction_status($info['id'],$data['status']);
           	  if($transaction_type == "cash_in"){
                  $this->Wallet_model->credit_sp_wallet($sp,$amount);
                  $data['trans_type']= $transaction_type;
           	  }elseif ($transaction_type == "cash_out") {
           	  	  $this->Wallet_model->debit_sp_wallet($sp,$amount);
           	  	  $data['trans_type']= $transaction_type;
           	  }
           }
           $data['trans_type']= $transaction_type;
    	   $data['message']="success";
    	   $data['status_code']="1";
    	}elseif ($data['status']=="failed") {
    		# code...
            $data['comment'] = "".$results->comment;
            $data['message'] = "".$results->status;
    	    $data['status_code'] = "0";
    	}else{
    		$data['message']="".$results->status;
    	    $data['status_code']="0";
    	}
    	echo json_encode($data);
    }

    public function get_client_transactions(){
    	$contact=$this->input->post('contact');
    	$info['client']=$this->Node_model->get_user_id($contact)['id'];
        $response['transactions']=$this->Node_model->get_all_transactions($info['client']);
        $response['message']="success";
    	$response['status_code']="1";
        echo json_encode($response);
    }

    public function request_code(){
    	$phonenumber=$this->input->post('phonenumber');
    	$token=$this->input->post('token');
    	if($phonenumber!=""){
        $result=$this->Node_model->request_code($phonenumber);
        if($result){
          $digits = 4;
          $code=rand(pow(10, $digits-1), pow(10, $digits)-1);
          $response['message']='success';
          $response['status_code']='1';
//           $method='POST';
//           $info['username']='admin@admin.com';
//           $info['password']='password';
//           $info['message']="Truckz application, your verification code is ".$code;
//           $info['contact']=$phonenumber;
//           $info['title']='Truckz verification'
//           $info['phonebook']='10';  
//           $url='http://sendsmsug.info/apis/send_sms';
//           $info=$this->CallAPI($method,$url,$info);
          $this->send_sms($phonenumber,$code);
          $data=json_decode($info);
          $status=$data->status;
          if($status==1){
            $this->Node_model->update_verification_code($phonenumber,$code,$token);
          }
        }else{
          $response['message']='You donot have an account on the system, please Login';
          $response['status_code']='0';
        }
      }else{
        $response['message']='Please put phonenumber and try again';
        $response['status_code']='0';
      }
      echo json_encode($response);
    }

	public function get_truck_categories(){
	      $response['categories']=$this->Node_model->get_truck_categories();
	      $response['message']='success';
	      $response['status_code']='1';
	      echo json_encode($response);
	} 

	public function get_client_details(){
		$order_id = $this->input->post('order_id');
		$client_id= $this->Node_model->get_order($order_id)['client_id'];
		
		$details=$this->Node_model->get_client_detail($client_id);
		$response['phonenumber']=$details['phonenumber'];
		$response['client_image']=base_url('static/uploads/').$details['avata'];
		$response['message']='success';
		$response['status_code']='1';
        echo json_encode($response);;
	}

	public function notify_driverandowner(){
       # get driver id
       # get driver token
       # get owner id
       # get owner token

		$order_id=$this->input->post('order_id');
        $truck_category_id=$this->Node_model->get_order($order_id)['truck_type'];
        $sp_id=$this->Node_model->get_order($order_id)['service_provider'];
        if($sp_id==""){
          
        }else{
	    	$trucks=$this->Node_model->get_truck_driver($sp_id,$truck_category_id);
	        $driver_id=$trucks['drivers_id'];

	        $driver_token=$this->Node_model->get_driver_fcm_token($driver_id)['token'];
	        $sp_token=$this->Node_model->get_sp_fcm_token($sp_id);
	        $this->notify_driver_trip_cancelled($driver_token,$order_id);
	        $this->notify_owner_trip_cancelled($sp_token,$order_id);
        }
        
     }

     public function notify_driver_trip_cancelled($driver_token,$order_id){
        $apiKey = 'AAAA2lw6huk:APA91bEZ0uPP50WKtVEo7kKJ7w9nFUs9ZQMHf3Kk6Msb6IxWeHhUIu3RbX8eBZ-70kOaEMNZbJy0lDkbTRIWjSiqtZ0afdkB1s4CgNiw4-XPxFXax-BKPYWcURRCxx-edP6CUFSDT302';

        $client = new Client();
        $client->setApiKey($apiKey);
        $client->injectHttpClient(new \GuzzleHttp\Client());

        $message = new Message();
        $message->addRecipient(new Device($driver_token));

         $message->setData(array(
         	'pay_load'=> 'cancel_trip',
         	'message' => 'trip cancelled #00',
         	'order_id'=> $order_id,
         	));

        $response = $client->send($message); 
     }

     public function notify_owner_trip_cancelled($sp_token,$order_id){
        $apiKey = 'AAAA2lw6huk:APA91bEZ0uPP50WKtVEo7kKJ7w9nFUs9ZQMHf3Kk6Msb6IxWeHhUIu3RbX8eBZ-70kOaEMNZbJy0lDkbTRIWjSiqtZ0afdkB1s4CgNiw4-XPxFXax-BKPYWcURRCxx-edP6CUFSDT302';

        $client = new Client();
        $client->setApiKey($apiKey);
        $client->injectHttpClient(new \GuzzleHttp\Client());

        var_dump($sp_token);

        var_dump($order_id);

        $message = new Message();
        $message->addRecipient(new Device($sp_token));

         $message->setData(array(
         	'pay_load'=> 'cancel_trip',
         	'message' => 'trip cancelled #00'.$order_id,
         	'order_id'=> $order_id
         	));

        $response = $client->send($message); 
     }

     public function update_rating(){
        $data['orders'] = $this->input->post('order_id');
        $data['comment'] = $this->input->post('comment');
        $data['srating'] = $this->input->post('srating');
        $data['person'] = $this->input->post('person');
        
        $data['clients']=$this->Node_model->get_order($data['orders'])['client_id'];
        $sp_id=$this->Node_model->get_order($data['orders'])['service_provider'];
        $truck_category_id=$this->Node_model->get_order($data['orders'])['truck_type'];
        $trucks=$this->Node_model->get_truck_driver($sp_id,$truck_category_id);
        $data['drivers']=$trucks['drivers_id'];
       
        $this->Node_model->update_rating($data);

        $response['message']='success';
        $response['status_code']='1';
        
        echo json_encode($response);
        
     }

	public function get_client_orders(){
		$phonenumber=$this->input->post('phonenumber');
		$client_id=$this->Node_model->get_client_id($phonenumber)['id'];
	    $response['orders']=$this->Node_model->get_client_orders($client_id);
	    echo json_encode($response); 
	}

	public function get_agent_registered_trucks(){
		$info['agents'] = $this->input->post('agent_id');
    $query = $this->input->post('query');
    $serviceprovider_id  = $this->input->post('owner_id');
    if(!empty($info['agents'])){
      $trucks = $this->Node_model->get_agent_registered_trucks($info);
    }elseif(!empty($query)){
      $trucks = $this->Node_model->search_trucks($query);
    }elseif(!empty($serviceprovider_id)){
      $trucks = $this->Node_model->get_serviceprovider_trucks($serviceprovider_id);
    }else{
      $trucks = array();
    }
		
		$data=array();
		foreach ($trucks as $key => $truck) {
			# code...
      $data[$key]['id'] = $truck['id'];
		  $data[$key]['truck_image'] = base_url('static/uploads/').$truck['truck_image'];	
		  $data[$key]['truck_category'] = $this->Node_model->get_truck_category(array("id"=>$truck['truck_categories']))['name'];
		  $data[$key]['truck_number_plate'] = $truck['number_plate'];
		  $first_name = $this->Node_model->get_truck_owner(array('id' => $truck['truck_owners']))['first_name'];
		  $second_name = $this->Node_model->get_truck_owner(array('id' => $truck['truck_owners']))['second_name'];
		  $data[$key]['truck_owner'] = $first_name." ".$second_name;
		  $data[$key]['truck_phone'] = $this->Node_model->get_truck_owner(array('id' => $truck['truck_owners']))['phonenumber'];
		  $data[$key]['truck_email'] = $this->Node_model->get_truck_owner(array('id' => $truck['truck_owners']))['email'];
      $data[$key]['service_point'] = $truck['service_point'];
      $data[$key]['truck_consumption'] = $truck['comsumption'];
      $data[$key]['truck_size'] = $truck['truck_size'];
      $data[$key]['truck_model'] = $truck['model'];
      $data[$key]['truck_description'] = $truck['description'];
      $data[$key]['truck_admin_verification'] = $truck['admin_verification'];
      $data[$key]['truck_agent_verification'] = $truck['agent_verification'];
      $data[$key]['truck_job_status'] = $truck['job_status'];
		}
        $response['trucks'] = $data;
        $response['status_code'] = '1'; 
        echo json_encode($response);
  }
   
    
    public function get_code_user(){
      $phonenumber = $this->input->post('phonenumber');
      $owner_verification = $this->Node_model->verify_truck_owner_phonenumber(array('phonenumber' => $phonenumber));
      if($owner_verification == 1){
        $check_if_admin_verified = $this->Node_model->check_owner_approved(array('phonenumber' => $phonenumber,'admin_verification'=>'1'));
        if($check_if_admin_verified == 1){
          $code = $this->four_digit_code();
          $this->Node_model->update_owner_code($phonenumber,$code);
          $this->send_sms_code($phonenumber,$code);
          $response['message']='success';
          $response['status_code'] = '1';
        }else{
          $response['message'] = 'wait for admin approval';
          $response['status_code'] = '0';
        }
      }else{
        $driver_verification = $this->Node_model->verify_truck_driver_phonenumber(array('phonenumber'=>$phonenumber));
        if($driver_verification == 1){
           $check_if_driver_approved = $this->Node_model->check_driver_approved(array('phonenumber' => $phonenumber,'admin_verification'=>'1'));
           if($check_if_driver_approved == 1){
             $code = $this->four_digit_code();
             $this->Node_model->update_driver_code($phonenumber,$code);
             $this->send_sms_code($phonenumber,$code);
             $response['message']='success';
             $response['status_code'] = '1';
           }else{
             $response['message']='wait for admin approval';
             $response['status_code'] = '1';
           }
        }else{
           $response['message']='Phonenumber does not exist on system';
           $response['status_code']='0';
        }
      }
      echo json_encode($response);
    }
    
    public function four_digit_code(){
      $digits = 4;
      $code=rand(pow(10, $digits-1), pow(10, $digits)-1);
      return $code;
    }
    
    public function send_sms_code($phonenumber,$code){
      $method='POST';
      $info['username']='admin@admin.com';
      $info['password']='password';
      $info['message']="Truckz application, your verification code is ".$code;
      $info['contact']=$phonenumber;
      $url='http://sendsmsug.info/apis/send_sms';
      $info=$this->CallAPI($method,$url,$info);
    }
   
    
    public function change_pin(){
      $agent = $this->input->post('agent');
      $new_code = $this->input->post('new_code');
      $old_code = $this->input->post('old_code');
      $if_exists = $this->Agents_model->verify_agent($agent,$old_code);
      if($if_exists == '1'){
        $this->Agents_model->change_pin($agent,$new_code);
        $response['message'] = "success";
        $response['status'] = "1";
      }else{
        $response['message'] = "old Pin information does not exist for this user";
        $response['status'] = "0";
      }
      echo json_encode($response);
    }
    
    public function change_pin_owner(){
      $owner_id = $this->input->post('owner_id');
      $old_code = $this->input->post('old_code');
      $new_code = $this->input->post('new_code');
      
      $if_exists = $this->Node_model->owner_exists($owner_id,$old_code);
      if($if_exists=='1'){
        $this->Node_model->change_pin_owner($owner_id,$new_code);
        $response['message'] = "success";
        $response['status'] = "1";
      }else{
        $response['message'] = "old Pin information does not exist for this user";
        $response['status'] = "0";
      }
      echo json_encode($response);
    }
    
    public function change_pin_driver(){
      $driver_id = $this->input->post('driver_id');
      $old_code = $this->input->post('old_code');
      $new_code = $this->input->post('new_code');
      
      $if_exists = $this->Node_model->driver_exists($driver_id,$old_code);
      if($if_exists == '1'){
        $this->Node_model->change_pin_driver($driver_id,$new_code);
        $response['message'] = "success";
        $response['status'] = "1";
      }else{
        $response['message'] = "old Pin information does not exist for this user";
        $response['status'] = "0";
      }
      echo json_encode($response);
    }
    
    public function verify_truck(){
      $agent_id = $this->input->post('agent_id');
      $truck_id = $this->input->post('truck_id');
      if(!isset($agent_id)){
        $response['message'] = "Agent id is not set.";
        $response['status'] = "0";
      }elseif(!isset($truck_id)){
        $response['message'] = "Truck id is not set.";
        $response['status'] = "0";
      }else{
       $this->Node_model->verify_truck($agent_id,$truck_id);
        #check if first truck to be verified
        #$owner_id = $this->Node_model->get_truck_details($truck_id)['truck_owners'];
        #$trucks = $this->Node_model->count_verified_trucks($owner_id);
        #if($trucks == 1){
          #$code = $this->four_digit_code();
          #$phonenumber = $this->Node_model->get_owner_details($owner_id)['phonenumber']; 
          #$this->Node_model->update_owner_code($phonenumber,$code);
          #$this->send_sms_code($phonenumber,$code);
        #}
        $response['message'] = "success";
        $response['status'] = "1"; 
      }
      echo json_encode($response);
    }
    
    public function verify_owner(){
      $agent_id = $this->input->post('agent_id');
      $owner_id = $this->input->post('owner_id');
     if(!isset($agent_id)){
        $response['message'] = "Agent id is not set.";
        $response['status'] = "0";
      }elseif(!isset($owner_id)){
        $response['message'] = "Owner id is not set.";
        $response['status'] = "0";
      }else{
       $this->Node_model->verify_owner($agent_id,$owner_id);
       $response['message'] = "success";
       $response['status'] = "1"; 
      }
      echo json_encode($response);      
    }
    
    public function get_available_drivers(){
      $owner_id = $this->input->post('owner_id');
      $drivers = $this->Node_model->get_available_drivers(array('truck_owners'=>$owner_id));
      $data = array();
      
		foreach ($drivers as $key => $driver) {
			# code...
      $data[$key]['driver_id'] = $driver['id'];
		  $data[$key]['driver_image'] = base_url('static/uploads/').$driver['driver_image'];	
		  $data[$key]['driver_first_name'] = $driver['first_name'];
      $data[$key]['driver_second_name'] = $driver['second_name'];
      $data[$key]['admin_verification'] = $driver['admin_verification'];
      $data[$key]['offline_status'] = $driver['offline_status'];
      $data[$key]['job_status'] = $driver['job_status'];
      $data[$key]['permit_id'] = $driver['permit_id'];
      $data[$key]['phonenumber'] = $driver['phonenumber'];
		}
      $response['drivers'] = $data;
      $response['status_code'] = '1';
      echo json_encode($response);
    }
    
    public function get_busy_drivers(){
      $owner_id = $this->input->post('owner_id');
      $drivers = $this->Node_model->get_busy_drivers(array('truck_owners'=>$owner_id,'job_status'=>'1'));
      $data = array();
      
		foreach ($drivers as $key => $driver) {
			# code...
      $data[$key]['driver_id'] = $driver['id'];
		  $data[$key]['driver_image'] = base_url('static/uploads/').$driver['driver_image'];	
		  $data[$key]['driver_first_name'] = $driver['first_name'];
      $data[$key]['driver_second_name'] = $driver['second_name'];
      $data[$key]['driver_job_status'] = $driver['job_status'];
      $data[$key]['permit_id'] = $driver['permit_id'];
		}
      $response['drivers'] = $data;
      $response['status_code'] = '1';
      echo json_encode($response);
    }
    
    public function get_available_trucks(){
		  $owner_id = $this->input->post('owner_id');
      $trucks = $this->Node_model->get_available_truckz(array('truck_owners' => $owner_id));
		  $data=array();
      foreach ($trucks as $key => $truck) {
        # code...
        $data[$key]['id'] = $truck['id'];
        $data[$key]['truck_image'] = base_url('static/uploads/').$truck['truck_image'];	
        $data[$key]['truck_category'] = $this->Node_model->get_truck_category(array("id"=>$truck['truck_categories']))['name'];
        $data[$key]['truck_number_plate'] = $truck['number_plate'];
        $first_name = $this->Node_model->get_truck_owner(array('id' => $truck['truck_owners']))['first_name'];
        $second_name = $this->Node_model->get_truck_owner(array('id' => $truck['truck_owners']))['second_name'];
        $data[$key]['truck_owner'] = $first_name." ".$second_name;
        $data[$key]['truck_phone'] = $this->Node_model->get_truck_owner(array('id' => $truck['truck_owners']))['phonenumber'];
        $data[$key]['truck_email'] = $this->Node_model->get_truck_owner(array('id' => $truck['truck_owners']))['email'];
        $data[$key]['service_point'] = $truck['service_point'];
        $data[$key]['truck_consumption'] = $truck['comsumption'];
        $data[$key]['truck_size'] = $truck['truck_size'];
        $data[$key]['truck_model'] = $truck['model'];
        $data[$key]['truck_description'] = $truck['description'];
        $data[$key]['truck_admin_verification'] = $truck['admin_verification'];
        $data[$key]['truck_agent_verification'] = $truck['agent_verification'];
        $data[$key]['truck_job_status'] = $truck['job_status'];
      }
      $response['trucks'] = $data;
      $response['status_code'] = '1';
      echo json_encode($response);
  }
    
    public function get_busy_trucks(){
      $owner_id = $this->input->post('owner_id');
      $trucks = $this->Node_model->get_busy_trucks(array('truck_owners'=>$owner_id,'job_status'=>'1'));
		  $data = array();
      foreach ($trucks as $key => $truck) {
        # code...
        $data[$key]['id'] = $truck['id'];
        $data[$key]['truck_image'] = base_url('static/uploads/').$truck['truck_image'];	
        $data[$key]['truck_category'] = $this->Node_model->get_truck_category(array("id"=>$truck['truck_categories']))['name'];
        $data[$key]['truck_number_plate'] = $truck['number_plate'];
        $first_name = $this->Node_model->get_truck_owner(array('id' => $truck['truck_owners']))['first_name'];
        $second_name = $this->Node_model->get_truck_owner(array('id' => $truck['truck_owners']))['second_name'];
        $data[$key]['truck_owner'] = $first_name." ".$second_name;
        $data[$key]['truck_phone'] = $this->Node_model->get_truck_owner(array('id' => $truck['truck_owners']))['phonenumber'];
        $data[$key]['truck_email'] = $this->Node_model->get_truck_owner(array('id' => $truck['truck_owners']))['email'];
        $data[$key]['service_point'] = $truck['service_point'];
        $data[$key]['truck_consumption'] = $truck['comsumption'];
        $data[$key]['truck_size'] = $truck['truck_size'];
        $data[$key]['truck_model'] = $truck['model'];
        $data[$key]['truck_description'] = $truck['description'];
        $data[$key]['truck_admin_verification'] = $truck['admin_verification'];
        $data[$key]['truck_agent_verification'] = $truck['agent_verification'];
        $data[$key]['truck_job_status'] = $truck['job_status'];
      }
      $response['trucks'] = $data;
      $response['status_code'] = '1';
      echo json_encode($response);
    }
    
    public function get_unassigned_drivers(){
      $owner_id = $this->input->post('owner_id');
      $drivers = $this->Node_model->get_unassigned_drivers(array('truck_owners'=>$owner_id,'trucks' => NULL));
      $data = array();
      foreach($drivers as $key => $driver){
        $data[$key]['id'] = $driver['id'];
        $data[$key]['first_name'] = $driver['first_name'];
        $data[$key]['second_name'] = $driver['second_name'];
      }
      $response['drivers'] = $data;
      $response['status_code'] = '1';
      echo json_encode($response);
    }
    
    public function get_owner_details(){
      $owner_id = $this->input->post('owner');
      $owners = $this->Node_model->get_owner_details($owner_id);
      $response['owner'] = $owners;
      $response['status_code'] = "1";
      $response['message'] = "success";
      echo json_encode($response);
    }
    
    public function get_registered_drivers(){
      $owner_id = $this->input->post('owner');
      $drivers = $this->Node_model->get_registered_drivers(array('truck_owners'=>$owner_id));
      $data = array();
      foreach($drivers as $key => $driver){
        $data[$key]['driver_id'] = $driver['id'];
        $data[$key]['driver_image'] = $driver['driver_image'];
        $data[$key]['driver_first_name'] = $driver['first_name'];
        $data[$key]['driver_second_name'] = $driver['second_name'];
        $data[$key]['driver_phonenumber'] = $driver['phonenumber'];
        $data[$key]['driver_email'] = $driver['driver_email'];
        $data[$key]['driver_ssn'] = $driver['driver_ssn'];
        #$data[$key]['driver_status'] = $driver['driver_status'];
        $data[$key]['admin_verification'] = $driver['admin_verification'];
        $data[$key]['offline_status'] = $driver['offline_status'];
        $data[$key]['job_status'] = $driver['job_status'];
        $data[$key]['permit_id'] = $driver['permit_id'];
      }
      $response['drivers'] = $data;
      $response['status_code'] = '1';
      echo json_encode($response);
    }
    
     public function get_registered_trucks(){
		  $owner_id = $this->input->post('owner');
      $trucks = $this->Node_model->get_registered_trucks(array('truck_owners'=>$owner_id));
		  $data=array();
      foreach ($trucks as $key => $truck) {
        # code...
        $data[$key]['id'] = $truck['id'];
        $data[$key]['truck_image'] = base_url('static/uploads/').$truck['truck_image'];	
        $data[$key]['truck_category'] = $this->Node_model->get_truck_category(array("id"=>$truck['truck_categories']))['name'];
        $data[$key]['truck_category_id'] = $truck['truck_categories'];
        $data[$key]['truck_number_plate'] = $truck['number_plate'];
        $first_name = $this->Node_model->get_truck_owner(array('id' => $truck['truck_owners']))['first_name'];
        $second_name = $this->Node_model->get_truck_owner(array('id' => $truck['truck_owners']))['second_name'];
        $data[$key]['truck_owner'] = $first_name." ".$second_name;
        $data[$key]['truck_phone'] = $this->Node_model->get_truck_owner(array('id' => $truck['truck_owners']))['phonenumber'];
        $data[$key]['truck_email'] = $this->Node_model->get_truck_owner(array('id' => $truck['truck_owners']))['email'];
        $data[$key]['service_point'] = $truck['service_point'];
        $data[$key]['truck_consumption'] = $truck['comsumption'];
        $data[$key]['truck_size'] = $truck['truck_size'];
        $data[$key]['truck_model'] = $truck['model'];
        $data[$key]['truck_description'] = $truck['description'];
        $data[$key]['truck_driver'] = $this->Node_model->get_driver_details($truck['drivers'])['first_name']." ".$this->Node_model->get_driver_details($truck['drivers'])['second_name'];
        $data[$key]['truck_driver_id'] = $truck['drivers'];
        $data[$key]['truck_admin_verification'] = $truck['admin_verification'];
        $data[$key]['truck_agent_verification'] = $truck['agent_verification'];
        $data[$key]['truck_job_status'] = $truck['job_status'];
      }
      $response['trucks'] = $data;
      $response['status_code'] = '1';
      echo json_encode($response);
  }
    public function update_online_status(){
      $driver_type = $this->input->post('owner_type');
      $driver_id = $this->input->post('driver_id');
      $owner_id = $this->input->post('owner_id');
      if($driver_type == "1"){
        $this->Node_model->update_owner_online_status($owner_id);
        $response['message'] = "success";
        $response['status_code'] = "1";
      }else if($driver_type == "2"){
        $this->Node_model->update_driver_online_status($driver_id);
        $response['message'] = "success";
        $response['status_code'] = "1";
      }else{
        $response['message'] = "unknown driver type.";
        $response['status_code'] = "0";  
      }
      echo json_encode($response);
    }
    
    public function removeOfflineDrivers(){
      $this->Node_model->removeOfflineDrivers();
    }
    
    public function removeOfflineOwners(){
      $this->Node_model->removeOfflineOwners();
    }
    
    public function register_client(){
      $data['username'] = $this->input->post('username');
      $data['firstname'] = $this->input->post('firstname');
      $data['secondname'] = $this->input->post('secondname');
      $data['phonenumber'] = $this->input->post('phonenumber');
      $digits = 4;
      $data['code'] = rand(pow(10, $digits-1), pow(10, $digits)-1);	
      $method = 'POST';
	    $info['username'] = 'mmugim@gmail.com';
	    $info['password'] = 'password';
	    $info['message'] =  'Your Client code for truckz application is '.$data['code'];
	    $info['contact'] = $data['phonenumber'];
      $info['title'] = 'client register';
	    $info['phonebook'] = '352';
	    $url = 'http://sendsmsug.info/apis/send_sms';
	    $this->CallAPI($method,$url,$info);
		  //$data['username']=$this->input->post('username');
		  //$data['avata']=$this->generateImage($this->input->post('text_image'));
		  //$this->Node_model->add_client_profile($phonenumber,$data);
      $result = $this->Client_model->register_client($data);
      $response = array();
      if($result){
        $response['message']='user registered';
		    $response['status_code']='1';
      }else{
        $response['message']='user already exists';
		    $response['status_code']='1';
      }
      echo json_encode($response);
    }
    
    public function add_client_info(){
      $phonenumber = $this->input->post('phonenumber');
      $data['password'] = $this->input->post('password');
      $data['avata'] = $this->generateImage($this->input->post('photo'));
      $data['fcm_token'] = $this->input->post('token');
      $this->Node_model->add_client_profile($phonenumber,$data);
      
      $response['phonenumber'] = $phonenumber;
      $response['username'] = $this->Node_model->get_client_details_phone($phonenumber)['username'];
      $response['avata'] = base_url('static/uploads/').$this->Node_model->get_client_details_phone($phonenumber)['avata'];
		  $response['message']='success';
		  $response['status_code']='1';
		  echo json_encode($response);
    }
    
    public function verify_client(){
      $data['phonenumber'] = $this->input->post('phonenumber');
      $data['code'] = $this->input->post('code');
      $result = $this->Client_model->verify_client($data);
      if($result == 1){
        $response['status_code'] = 1;
        $response['message'] = 'user exists';
      }else{
        $response['status_code'] = 0;
        $response['message'] = 'wrong verification code';
      }
      echo json_encode($response);
    }
    
    public function get_distance_and_time(){
      $origin = $this->input->post('origin');
      $destination = $this->input->post('destination');
      $url = "https://maps.googleapis.com/maps/api/distancematrix/json?origins=".$origin."&destinations=".$destination."&departure_time=now&key=AIzaSyDJ4Fyhn7L0uX-vdUiP2hVzvEYC592n8GE";
      $method = "GET";
      $info = array();
      //var_dump($this->CallAPI($method,$url)); 
      //var_dump($url);
      echo $this->CallAPI($method,$url);
    }
    
    public function client_login(){
      $username = $this->input->post('username');
      $password = $this->input->post('password');
      $token = $this->input->post('token');
      $query = $this->Node_model->does_client_exist($username,$password);
      if($query->num_rows() > 0){
         $phonenumber = $query->row_array()['phonenumber'];
         $this->Node_model->update_token($phonenumber,$token);
         $id = $query->row_array()['id'];
         $response['phonenumber'] = $this->Node_model->get_client_details($id)['phonenumber'];
         $response['username'] = $this->Node_model->get_client_details($id)['username'];
         $response['avata'] = base_url('static/uploads/').$this->Node_model->get_client_details($id)['avata'];
         $response['status'] = 'success';
         $response['status_code'] = 1;
         $response['message'] = 'client found';
       }else{
         $response['status'] = 'failed';
         $response['status_code'] = 0;
         $response['message'] = 'client not found';
       }
     echo json_encode($response);
    }
    
    public function client_rate_service_provider(){
      $data['rate'] = $this->input->post('rate');
      //$data['rate'] = '2.5';
      $data['orders'] = $this->input->post('order_id');
      $data['datetime'] = $this->get_current_timestamp();
      $data['type'] = 'client';
      
      $result = $this->Node_model->add_rating($data);
      
      $this->Order_model->update_order_status($data['orders'],'7');
        
      if($result){
         $response['status'] = 'success';
         $response['status_code'] = 1;
         $response['message'] = 'driver rated';
      }else{
        $response['status'] = 'failed';
        $response['status_code'] = 0;
        $response['message'] = 'driver not rated';
      }
      echo json_encode($response);
    }
    
    function get_current_timestamp(){
      date_default_timezone_set("Africa/Nairobi");
      return date('Y-m-d H:i:s');
    }
    
    public function check_if_order_in_progress(){
      $order_id = $this->input->post('ordernumber');
      $response['order_status'] = $this->Node_model->get_order($order_id)['status'];
      $response['status_code'] = '1';
      echo json_encode($response);
    }
    
    public function add_driver_location(){
      $data['driver_id'] = $this->input->post('driver_id');
      $data['lat'] = $this->input->post('lat');
      $data['lng'] = $this->input->post('lng');
      $data['datetime'] = $this->get_current_timestamp();
      $order_id = $this->input->post('order_id');
      $result = "";
      if(!empty($order_id)){
        $result = $this->Driver_model->add_driver_location($data);
      }else{
        $data['order_id'] = $order_id;
        $result = $this->Driver_model->add_driver_location($data);
      }
      
      if($result){
        $response['status_code'] = '1';
        $response['message'] = 'location updated';
      }else{
        $response['status_code'] = '0';
        $response['message'] = 'location not updated';
      }
      echo json_encode($response);
    }
    
    public function get_directions(){
      $key = 'AIzaSyDJ4Fyhn7L0uX-vdUiP2hVzvEYC592n8GE';
      $driver_lat = $this->input->post('driver_lat');
      $driver_lng = $this->input->post('driver_lng');
      $client_lat = $this->input->post('client_lat');
      $client_lng = $this->input->post('client_lng');
      $url = "https://maps.googleapis.com/maps/api/directions/json?origin="
                        .$driver_lat.",".$driver_lng
                        ."&destination=".$client_lat.","
                        .$client_lng."&sensor=false&key=".$key;
      $method = "GET";
      echo $this->CallAPI($method,$url);    
      //echo $url;
      //$response = $this->CallAPI($method,$url);   
      //echo json_encode(json_decode($response,true));
      //echo json_encode($this->input->post());
    }
    
    public function get_driver_location(){
      $driver_id = $this->input->post('driver_id');
      $response['driver_lat'] = $this->Driver_model->get_driver_location($driver_id)['lat'];
      $response['driver_lng'] = $this->Driver_model->get_driver_location($driver_id)['lng'];
      if(!empty($response['driver_lat']&&!empty($response['driver_lng']))){
        $response['status_code'] = 1;
      }else{
        $response['status_code'] = 0;
      }
      echo json_encode($response);
    }
    
    public function register_agent(){
      $data['profile_picture'] = $this->input->post('profile_picture');
      $data['first_name'] = $this->input->post('first_name');
      $data['second_name'] = $this->input->post('second_name');
      $data['phonenumber'] = '+256'.substr($this->input->post('phone_number'), -9);
      $data['email']=$this->input->post('email');
      $data['identification_type'] = $this->input->post('identification_type');
      $data['identification_number']=$this->input->post('identification_number');
      $data['profile_picture'] = $this->generateImage($this->input->post('profile_picture'));
      #check if phonenumber exists
      $if_phonenumber_exists = $this->Agents_model->does_phonenumber_exist(array('phonenumber' => $data['phonenumber']));
      if(!$if_phonenumber_exists){
          $agent_id = $this->Agents_model->add_agents($data);
          $response['agent_id'] = $agent_id;
          $response['success'] = true;
          $response['message'] = "Agent created";
          $response['status_code'] = "1";
      }else{
          $response['success'] = false;
          $response['message'] = "Agent already registered";
          $response['status_code'] = "0";
      }
	    echo json_encode($response);
    }
    
    public function get_agent_details(){
      $agent_id = $this->input->post('agent_id');
      $agent_details = $this->Agents_model->get_agent($agent_id);
      if(!empty($agent_details)){
        $response['agent'] = $agent_details;
        $response['success'] = true;
        $response['message'] = "Agent found";
        $response['status_code'] = "1";
      }else{
        $response['agent'] = $agent_details;
        $response['success'] = false;
        $response['message'] = "Agent not found";
        $response['status_code'] = "0";
      }
      echo json_encode($response);
    }

  }
