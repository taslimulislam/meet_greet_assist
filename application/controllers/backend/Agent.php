<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Agent extends CI_Controller {

    function __construct() {

        parent::__construct();

        $this->lang->load('content', $_SESSION['lang']);

        if (!isset($_SESSION['user_auth']) || $_SESSION['user_auth'] != true) {
            redirect('login', 'refresh');
        }
        if ($_SESSION['userType'] != 'agent')
            redirect('login', 'refresh');

        $this->load->model('AgentModel');
        $this->load->library("pagination");
        $this->load->helper("url");
        $this->load->helper("text");
        date_default_timezone_set("Asia/Dhaka");
    }

    public function index() {


        $user_id = $this->session->userdata('userid');

        $data['title']      = 'User Panel';
        $data['page']       = 'backEnd/agent/agent_dashboard';
        $data['activeMenu'] = 'dashboard_view';

        $this->load->view('backEnd/master_page', $data);
    }

    public function image_size_fix($filename, $width = 600, $height = 400, $destination = '') {

        // Content type
        // header('Content-Type: image/jpeg');
        // Get new dimensions
        list($width_orig, $height_orig) = getimagesize($filename);

        // Output 20 May, 2018 updated below part
        if ($destination == '' || $destination == null)
            $destination = $filename;

        $extention = pathinfo($destination, PATHINFO_EXTENSION);
        if ($extention != "png" && $extention != "PNG" && $extention != "JPEG" && $extention != "jpeg" && $extention != "jpg" && $extention != "JPG") {
 
            return true;
        }
        // Resample
        $image_p = imagecreatetruecolor($width, $height);
        $image   = imagecreatefromstring(file_get_contents($filename));
        imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);

        

        if ($extention == "png" || $extention == "PNG") {
            imagepng($image_p, $destination, 9);
        } else if ($extention == "jpg" || $extention == "JPG" || $extention == "jpeg" || $extention == "JPEG") {
            imagejpeg($image_p, $destination, 70);
        } else {
            imagepng($image_p, $destination);
        }
        return true;
    }


	// AJAX or JQ GET  methods 

	function get_lounge_service_station_rate(){

		if ($_SERVER['REQUEST_METHOD'] == 'POST') {

			$lounge_service_station_id = $this->input->post('lounge_service_station_id', true);
			$unit_rate = $this->db->where('id', $lounge_service_station_id)->get('tbl_lounge_service_stations');
			if($unit_rate->num_rows() > 0)
				echo $unit_rate->row()->unit_rate;
			else echo "0";

		}
	}

	function get_shuttle_service_station_rate(){

		if ($_SERVER['REQUEST_METHOD'] == 'POST') {

			$shuttle_service_station_id = $this->input->post('shuttle_service_station_id', true);
			$unit_rate = $this->db->where('id', $shuttle_service_station_id)->get('tbl_shuttle_service_stations');
			if($unit_rate->num_rows() > 0)
				echo $unit_rate->row()->unit_rate;
			else echo "0";
			

		}
	}

	function get_mga_service_station_rate(){

		if ($_SERVER['REQUEST_METHOD'] == 'POST') {

			$mga_service_station_id = $this->input->post('mga_service_station_id', true);
			$unit_rate = $this->db->where('id', $mga_service_station_id)->get('tbl_mga_service_stations');
			if($unit_rate->num_rows() > 0)
				echo $unit_rate->row()->unit_rate;
			else echo "0";
			

		}
	}

	public function get_mga_type() {

		$result = $this->db->select('id, name')->get('tbl_mga_service_type')->result();
		echo json_encode($result, JSON_UNESCAPED_UNICODE);
	}

	public function get_mga_station($mga_type_id = 1) {

		$result = $this->db->select('id, name')->where('mga_service_type_id', $mga_type_id)->get('tbl_mga_service_stations')->result();
		echo json_encode($result, JSON_UNESCAPED_UNICODE);
	}

	public function get_lounge_type() {

		$result = $this->db->select('id, name')->get('tbl_lounge_type')->result();
		echo json_encode($result, JSON_UNESCAPED_UNICODE);
	}

	public function get_lounge_station($lounge_type_id = 1) {

		$result = $this->db->select('id, name')->where('lounge_service_type_id', $lounge_type_id)->get('tbl_lounge_service_stations')->result();
		echo json_encode($result, JSON_UNESCAPED_UNICODE);
	}

	public function get_shuttle_type() {

		$result = $this->db->select('id, name')->get('tbl_shuttle_type')->result();
		echo json_encode($result, JSON_UNESCAPED_UNICODE);
	}

	public function get_shuttle_station($shuttle_type_id = 1) {

		$result = $this->db->select('id, name')->where('shuttle_service_type_id', $shuttle_type_id)->get('tbl_shuttle_service_stations')->result();
		echo json_encode($result, JSON_UNESCAPED_UNICODE);
	}

	public function get_airmail_type() {

		$result = $this->db->select('id, name')->get('tbl_airmail_service_type')->result();
		echo json_encode($result, JSON_UNESCAPED_UNICODE);
	}

	public function get_airmail_station($airmail_type_id = 1) {

		$result = $this->db->select('id, name')->where('airmail_service_type_id', $airmail_type_id)->get('tbl_airmail_service_stations')->result();
		echo json_encode($result, JSON_UNESCAPED_UNICODE);
	}


	public function get_client_info() {

		$result = array();

		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$phone_number = $this->input->post('phone_number', true);

			$check_client = $this->db->where('phone_number', $phone_number)->get('tbl_clients');
			if($check_client->num_rows() > 0){
				$result['id'] = $check_client->row()->id;
				$result['name'] = $check_client->row()->name;
				$result['email'] = $check_client->row()->email;
				$result['passport_number'] = $check_client->row()->passport_number;
			}else{
				$result['id'] = 0;
				$result['name'] = '';
				$result['email'] = '';
				$result['passport_number'] = '';
			}

		}
		echo json_encode($result, JSON_UNESCAPED_UNICODE);
	}

    public function get_division() {

        $result = $this->db->select('id, name')->get('tbl_divission')->result();
        echo json_encode($result, JSON_UNESCAPED_UNICODE);
    }

    public function get_zilla_from_division($division_id = 1) {

        $result = $this->db->select('id, name')->where('divission_id', $division_id)->get('tbl_zilla')->result();
        echo json_encode($result, JSON_UNESCAPED_UNICODE);
    }

    public function get_upozilla_from_division_zilla($zilla_id = 1) {

        $result = $this->db->select('id, name')->where('zilla_id', $zilla_id)->get('tbl_upozilla')->result();
        echo json_encode($result, JSON_UNESCAPED_UNICODE);
    }

	//Download File
    public function download_file($file_name = '', $fullpath='') {

        // echo $file_name; exit();
        $filePath = $file_name;

        if($file_name=='full' && ($fullpath != '' || $fullpath != null)) $filePath = $fullpath;

        if($_GET['file_path']) $filePath = $_GET['file_path'];
        // echo $filePath; exit();
        if (file_exists($filePath)) {
            $fileName = basename($filePath);
            $fileSize = filesize($filePath);

            // Output headers.
            header("Cache-Control: private");
            header("Content-Type: application/stream");
            header("Content-Length: " . $fileSize);
            header("Content-Disposition: attachment; filename=" . $fileName);

            // Output file.
            readfile($filePath);
            exit();
        } else {
            die('The provided file path is not valid.');
        }
    }
    
    public function profile($param1 = '')
    {

        $user_id            = $this->session->userdata('userid');
        $data['user_info']  = $this->AgentModel->get_user($user_id);


        $myzilla_id         = $data['user_info']->zilla_id;
        $mydivision_id      = $data['user_info']->division_id;

        $data['divissions'] = $this->db->get('tbl_divission')->result();

        $data['distrcts']   = $this->db->get_where('tbl_zilla', array('divission_id' => $mydivision_id))->result();
        $data['upozilla']   = $this->db->get_where('tbl_upozilla', array('zilla_id'  => $myzilla_id))->result();

        if ($param1 == 'update_photo') {

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                
                
                //exta work
                $path_parts               = pathinfo($_FILES["photo"]['name']);
                $newfile_name             = preg_replace('/[^A-Za-z]/', "", $path_parts['filename']);
                $dir                      = date("YmdHis", time());
                $config['file_name']      = $newfile_name . '_' . $dir;
                $config['remove_spaces']  = TRUE;
                //exta work
                $config['upload_path']    = 'assets/userPhoto/';
                $config['max_size']       = '20000'; //  less than 20 MB
                $config['allowed_types']  = 'jpg|png|jpeg|jpg|JPG|JPG|PNG|JPEG';

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('photo')) {

                    // case - failure
                    $upload_error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('message', "Failed to update image.");

                } else {

                    $upload                 = $this->upload->data();
                    $newphotoadd['photo']   = $config['upload_path'] . $upload['file_name'];

                    $old_photo              = $this->db->where('id', $user_id)->get('user')->row()->photo;
                    
                    if(file_exists($old_photo)) unlink($old_photo);

                    $this->image_size_fix($newphotoadd['photo'], 200, 200);

                    $this->db->where('id', $user_id)->update('user', $newphotoadd);

                    $this->session->set_userdata('userPhoto', $newphotoadd['photo']);
                    $this->session->set_flashdata('message', 'User Photo Updated Successfully!');
                    
                    redirect('agent/profile','refresh');
                }
                
              }
              
        }else if($param1 == 'update_pass'){

           if ($_SERVER['REQUEST_METHOD'] == 'POST') {
               
               $old_pass    = sha1($this->input->post('old_pass', true)); 
               $new_pass    = sha1($this->input->post('new_pass', true)); 
               $user_id     = $this->session->userdata('userid');

               $get_user    = $this->db->get_where('user',array('id'=>$user_id, 'password'=>$old_pass));
               $user_exist  = $get_user->row();

               if($user_exist){
                   
                    $this->db->where('id',$user_id)
                            ->update('user',array('password'=>$new_pass));
                    $this->session->set_flashdata('message', 'Password Updated Successfully');
                    redirect('agent/profile','refresh');
                    
               }else{
                   
                    $this->session->set_flashdata('message', 'Password Update Failed');
                    redirect('agent/profile','refresh');
                   
               }
               
            }
            
        }else if($param1 == 'update_info'){

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                
                $update_data['firstname']   = $this->input->post('firstname', true);
                $update_data['lastname']    = $this->input->post('lastname', true);
                $update_data['roadHouse']   = $this->input->post('roadHouse', true);
                $update_data['address']     = $this->input->post('address', true);


                $db_email     = $this->db->where('id!=', $user_id)->where('email', $this->input->post('email', true))->get('user')->num_rows();
                $db_username  = $this->db->where('id!=', $user_id)->where('username', $this->input->post('username', true))->get('user')->num_rows();


                if ( $db_username == 0) {

                     $update_data['username']    = $this->input->post('username', true);
                     
                }if ( $db_email == 0) {

                     $update_data['email']       = $this->input->post('email', true);
                     
                }
                

                if ($this->AgentModel->update_pro_info($update_data, $user_id)) {
                    
                    $this->session->set_userdata('username_first', $update_data['firstname']);
                    $this->session->set_userdata('username_last', $update_data['lastname']);
                    $this->session->set_userdata('username', $update_data['username']);
                    
                    $this->session->set_flashdata('message', 'Information Updated Successfully!');
                    redirect('agent/profile', 'refresh');
                    
                } else {
                    
                    $this->session->set_flashdata('message', 'Information Update Failed!');
                    redirect('agent/profile', 'refresh');
                    
                } 
                
            }
        }
        
        $data['title']      = 'Profile user Panel • HRSOFTBD News Portal user Panel';
        $data['activeMenu'] = 'Profile';
        $data['page']       = 'backEnd/agent/profile';
        
        $this->load->view('backEnd/master_page',$data);
    }

    
    //Airmail Service Registration
	public function airmail_service_registration($param1 = '', $param2 = '0', $param3 = '', $param4 = '') 
	{
		if($param1 == 'add'){

			if ($_SERVER['REQUEST_METHOD'] == 'POST') {

				$insert_airmail_registration = array();

				$client_id = $this->input->post('client_id', true);

				if($client_id < 1){
					// add client into database.
					$insert_client['name']        		= $this->input->post('name', true);
					$insert_client['phone_number']      = $this->input->post('phone', true);
					$insert_client['email']        		= $this->input->post('email', true);
					$insert_client['passport_number']   = $this->input->post('passport_number', true);
					$insert_client['insert_time']     	= date('Y-m-d H:i');

					$this->db->insert('tbl_clients', $insert_client);
					
					$insert_airmail_registration['client_id']  		=  $this->db->insert_id();
				}else {
					$insert_airmail_registration['client_id']  		=  $this->input->post('client_id', true);
				}
				
				$insert_airmail_registration['invoice_number']  	= date("YmdHis");
				$insert_airmail_registration['service_type_id']  	= $this->input->post('service_type_id', true);
				$insert_airmail_registration['service_station_id']  = $this->input->post('service_station_id', true);
				$insert_airmail_registration['train_or_flight_no']  = $this->input->post('train_or_flight', true);
				$insert_airmail_registration['received_from']  		= $this->input->post('received_from', true);
				$insert_airmail_registration['drop_to']  			= $this->input->post('drop_to', true);
				$insert_airmail_registration['product_details']  	= $this->input->post('product_details', true);
				$insert_airmail_registration['delivery_details']  	= $this->input->post('delivery_details', true);
				$insert_airmail_registration['received_date']  		= date("Y-m-d ", strtotime($this->input->post('received_date', true)));
				$insert_airmail_registration['remark']  			= $this->input->post('remark', true);
				$insert_airmail_registration['total_bill']  		= $this->input->post('total_bill', true);
				$insert_airmail_registration['unit_rate']  		    = $this->input->post('unit_rate', true);
				$insert_airmail_registration['quantity']  		    = $this->input->post('person', true);


				$insert_airmail_registration['insert_time']     	= date('Y-m-d H:i');
				$insert_airmail_registration['insert_by']       	= $_SESSION['userid'];

				$insert_invoice['client_id']  						= $insert_airmail_registration['client_id'];
				$insert_invoice['invoice_number']  					= $insert_airmail_registration['invoice_number'];
				$insert_invoice['total_bill']  						= $insert_airmail_registration['total_bill'];
				$insert_invoice['discount']  						= 0;
				$insert_invoice['payable_amount']  					= $insert_airmail_registration['total_bill'];
				$insert_invoice['remarks']  						= 0;
				$insert_invoice['agent_id']  						= $_SESSION['userid'];
				$insert_invoice['approve_status']  					= 0;
				$insert_invoice['approved_by']  					= 0;
				$insert_invoice['insert_time']  					= $insert_airmail_registration['insert_time'];
				$insert_invoice['invoice_date']  					= date('Y-m-d');


				$invoice = $this->db->insert('tbl_invoice', $insert_invoice);


				$add_airmail_registration = $this->db->insert('tbl_airmail_service_registration', $insert_airmail_registration);

				if ($add_airmail_registration) {

					$this->session->set_flashdata('message', 'Airamil Service Registration Added Successfully!');
					redirect('agent/airmail-service-registration/list', 'refresh');

				} else {

					$this->session->set_flashdata('message', 'Airamil Registration Add Failed!');
					redirect('agent/airmail-service-registration/list', 'refresh');
				}

				
			}
			$data['client_list'] 				= $this->db->select('id, name')->get('tbl_clients')->result();
			$data['airmail_type_list'] 			= $this->db->select('id, name')->get('tbl_airmail_service_type')->result();
			$data['airmail_station_list'] 		= $this->db->select('id, name')->get('tbl_airmail_service_stations')->result();
			
			$data['title']      				= 'Airamil Registration Add';
			$data['page']       				= 'backEnd/agent/airmail_registration_add';
			$data['activeMenu'] 				= 'airmail_registration_add';

		}elseif($param1 == 'list'){
			
			
			$data['airmail_registration_list']  = $this->AgentModel->get_airmail_registration_list($param2);
			
			$data['airmail_type_list'] 			= $this->db->select('id, name')->get('tbl_airmail_service_type')->result();
			$data['title']      				= 'Airamil Service Registration List ';
			$data['page']       				= 'backEnd/agent/airmail_registration_list';
			$data['activeMenu'] 				= 'airmail_registration_list';
		
		}elseif($param1 == 'invoice' && $param2 > 0){

			$airmail_service = $this->db->select('id, client_id')->get_where('tbl_airmail_service_registration',array('id'=>$param2))->row();
			$client_id = $airmail_service->client_id;

			$data['client_details']   			= $this->db->select('id, name, phone_number, email, passport_number')->get_where('tbl_clients',array('id'=>$client_id))->row();
			$data['invoice_list']  				= $this->AgentModel->get_airmail_invoice_list($param2);

			$data['title']						= 'Airmail Registration Invoice';
			$data['activeMenu'] 				= 'airmail_registration_invoice';
			$data['page'] 						= 'backEnd/agent/airmail_registration_invoice';
		}elseif($param1 == 'edit' && $param2 > 0){

			if ($_SERVER['REQUEST_METHOD'] == 'POST') {

				$update_airmail_registration['client_id']  			= $this->input->post('client_id', true);
				$update_airmail_registration['service_type_id']  	= $this->input->post('service_type_id', true);
				$update_airmail_registration['service_station_id']  = $this->input->post('service_station_id', true);
				$update_airmail_registration['train_or_flight_no']  = $this->input->post('train_or_flight', true);
				$update_airmail_registration['received_from']  		= $this->input->post('received_from', true);
				$update_airmail_registration['drop_to']  			= $this->input->post('drop_to', true);
				$update_airmail_registration['product_details']  	= $this->input->post('product_details', true);
				$update_airmail_registration['delivery_details']  	= $this->input->post('delivery_details', true);
				$update_airmail_registration['received_date']  		= date("Y-m-d ", strtotime($this->input->post('received_date', true)));
				$update_airmail_registration['remark']  			= $this->input->post('remark', true);
				$update_airmail_registration['insert_time']     	= date('Y-m-d H:i');
				$update_airmail_registration['insert_by']       	= $_SESSION['userid'];
				$update_airmail_registration['approve_status']  	= $this->input->post('status', true);
				$update_airmail_registration['approved_by']  		= $_SESSION['userid'];
				

				if ($this->AgentModel->update_airmail_registration($update_airmail_registration, $param2)) {
	
					$this->session->set_flashdata('message', 'Airmail Service Registration Updated Successfully!');
					redirect('agent/airmail-service-registration/list', 'refresh');
	
				} else {
	
					$this->session->set_flashdata('message', 'Airmail Service Registration Updated Failed!');
					redirect('agent/airmail-service-registration/list', 'refresh');
				}
			}

			$data['edit_info']   	= $this->db->select('id, train_or_flight_no, received_from, drop_to, product_details, delivery_details, received_date, remark, client_id, service_type_id, service_station_id, approve_status')->where(array('id'=>$param2))->where(array('insert_by'=>$_SESSION['userid']))->get('tbl_airmail_service_registration');

			if ($data['edit_info']->num_rows() > 0) {

				$data['edit_info']	= $data['edit_info']->row();

			} else {

				$this->session->set_flashdata('message', 'Wrong Attempt!');
				redirect('agent/airmail-service-registration/list', 'refresh');
			}

			$data['client_list'] 			= $this->db->select('id, name')->get('tbl_clients')->result();
			$data['airmail_type_list'] 		= $this->db->select('id, name')->get('tbl_airmail_service_type')->result();
			$data['airmail_station_list'] 	= $this->db->select('id, name')->get('tbl_airmail_service_stations')->result();

			$data['title']					= 'Airmail Registration Edit';
			$data['activeMenu'] 			= 'airmail_registration_edit';
			$data['page'] 					= 'backEnd/agent/airmail_registration_edit';

		}elseif($param1 == 'delete' && $param2 > 0) {
			
			if ($this->AgentModel->delete_airmail_registration($param2)) {

				$this->session->set_flashdata('message', 'Airmail Service Registration Deleted Successfully!');
				redirect('agent/airmail-service-registration/list', 'refresh');

			} else {

				$this->session->set_flashdata('message', 'Airmail Service Registration Deleted Failed!');
				redirect('agent/airmail-service-registration/list', 'refresh');
			}
			
		}else {

			$this->session->set_flashdata('message', 'Wrong Attempt!');
			redirect('agent/airmail-service-registration/list', 'refresh');

		}

		$data['type_list'] = $this->db->select('id, name, priority, insert_time')->order_by('priority', 'asc')->get('tbl_airmail_service_type')->result();
		$this->load->view('backEnd/master_page', $data);

    }
    
    //lounge Service Registration
	public function lounge_service_registration($param1 = '', $param2 = '0', $param3 = '', $param4 = '') 
	{
		if($param1 == 'add'){

			if ($_SERVER['REQUEST_METHOD'] == 'POST') {

				$insert_lounge_registration = array();

				$client_id = $this->input->post('client_id', true);

				if($client_id < 1){
					// add client into database.
					$insert_client['name']        		= $this->input->post('name', true);
					$insert_client['phone_number']      = $this->input->post('phone', true);
					$insert_client['email']        		= $this->input->post('email', true);
					$insert_client['passport_number']   = $this->input->post('passport_number', true);
					$insert_client['insert_time']     	= date('Y-m-d H:i');

					$this->db->insert('tbl_clients', $insert_client);

					$insert_lounge_registration['client_id']  		=  $this->db->insert_id();
				}else {
					$insert_lounge_registration['client_id']  	=  $this->input->post('client_id', true);
				}

				$insert_lounge_registration['invoice_number']  		= date("YmdHis");
				$insert_lounge_registration['service_type_id']  	= $this->input->post('service_type_id', true);
				$insert_lounge_registration['service_station_id']   = $this->input->post('service_station_id', true);
				$insert_lounge_registration['train_or_flight_no']   = $this->input->post('train_or_flight', true);
				$insert_lounge_registration['service_start_time']  	= date("H:i ", strtotime($this->input->post('service_start_time', true)));
				$insert_lounge_registration['reserved_hour']  		= $this->input->post('hour', true) + $this->input->post('minuts', true);
				$insert_lounge_registration['journey_date']  		= date("Y-m-d ", strtotime($this->input->post('journey_date', true)));
				$insert_lounge_registration['landing_time']  		= date("H:i ", strtotime($this->input->post('landing_time', true)));
				$insert_lounge_registration['quantity']  		    = $this->input->post('person', true);
				$insert_lounge_registration['unit_rate']  		    = $this->input->post('unit_rate', true);
				$insert_lounge_registration['total_bill']  			= $this->input->post('total_bill', true);
				
				$insert_lounge_registration['insert_time']     		= date('Y-m-d H:i');
				$insert_lounge_registration['insert_by']       		= $_SESSION['userid'];

				$insert_invoice['client_id']  						= $insert_lounge_registration['client_id'];
				$insert_invoice['invoice_number']  					= $insert_lounge_registration['invoice_number'];
				$insert_invoice['total_bill']  						= $insert_lounge_registration['total_bill'];
				$insert_invoice['discount']  						= 0;
				$insert_invoice['payable_amount']  					= $insert_lounge_registration['total_bill'];
				$insert_invoice['remarks']  						= 0;
				$insert_invoice['agent_id']  						= $_SESSION['userid'];
				$insert_invoice['approve_status']  					= 0;
				$insert_invoice['approved_by']  					= 0;
				$insert_invoice['insert_time']  					= $insert_lounge_registration['insert_time'];
				$insert_invoice['invoice_date']  					= date('Y-m-d');

				$invoice = $this->db->insert('tbl_invoice', $insert_invoice);

				$add_lounge_registration = $this->db->insert('tbl_lounge_service_registration', $insert_lounge_registration);

				if ($add_lounge_registration) {

					$this->session->set_flashdata('message', 'Lounge Service Registration Added Successfully!');
					redirect('agent/lounge-service-registration/list', 'refresh');

				} else {

					$this->session->set_flashdata('message', 'Service Registration Add Failed!');
					redirect('agent/lounge-service-registration/list', 'refresh');
				}

				
			}
			$data['client_list'] 			= $this->db->select('id, name')->get('tbl_clients')->result();
			$data['lounge_type_list'] 		= $this->db->select('id, name')->get('tbl_lounge_type')->result();
			$data['lounge_station_list'] 	= $this->db->select('id, name')->get('tbl_lounge_service_stations')->result();

			$data['title']      			= 'Lounge Registration Add';
			$data['page']       			= 'backEnd/agent/lounge_registration_add';
			$data['activeMenu'] 			= 'lounge_registration_add';

		}elseif($param1 == 'list'){
			
			
			$data['lounge_registration_list']   = $this->AgentModel->get_lounge_registration_list($param2);
			
			$data['lounge_type_list'] 			= $this->db->select('id, name')->get('tbl_lounge_type')->result();
			$data['title']      				= 'Lounge Service Registration List ';
			$data['page']       				= 'backEnd/agent/lounge_registration_list';
			$data['activeMenu'] 				= 'lounge_registration_list';
		
		}elseif($param1 == 'invoice' && $param2 > 0){

			$lounge_service = $this->db->select('id, client_id')->get_where('tbl_lounge_service_registration',array('id'=>$param2))->row();
			$client_id = $lounge_service->client_id;

			$data['client_details']   			= $this->db->select('id, name, phone_number, email, passport_number')->get_where('tbl_clients',array('id'=>$client_id))->row();
			$data['invoice_list']  				= $this->AgentModel->get_lounge_invoice_list($param2);

			$data['title']						= 'Lounge Registration Invoice';
			$data['activeMenu'] 				= 'lounge_registration_invoice';
			$data['page'] 						= 'backEnd/agent/lounge_registration_invoice';
		}elseif($param1 == 'edit' && $param2 > 0){

			if ($_SERVER['REQUEST_METHOD'] == 'POST') {

				$update_lounge_registration['client_id']  		   = $this->input->post('client_id', true);
				$update_lounge_registration['service_type_id']     = $this->input->post('service_type_id', true);
				$update_lounge_registration['service_station_id']  = $this->input->post('service_station_id', true);
				$update_lounge_registration['train_or_flight_no']  = $this->input->post('train_or_flight', true);
				$update_lounge_registration['service_start_time']  = date("H:i ", strtotime($this->input->post('service_start_time', true)));
				$update_lounge_registration['reserved_hour']  	   = $this->input->post('hour', true) + $this->input->post('minuts', true);
				$update_lounge_registration['journey_date']  	   = date("Y-m-d ", strtotime($this->input->post('journey_date', true)));
				$update_lounge_registration['landing_time']  	   = date("H:i ", strtotime($this->input->post('landing_time', true)));
				$update_lounge_registration['approve_status']  	   = $this->input->post('status', true);
				$update_lounge_registration['approved_by']  	   = $_SESSION['userid'];

				if ($this->AgentModel->update_lounge_registration($update_lounge_registration, $param2)) {
	
					$this->session->set_flashdata('message', 'Lounge Service Registration Updated Successfully!');
					redirect('agent/lounge-service-registration/list', 'refresh');
	
				} else {
	
					$this->session->set_flashdata('message', 'Lounge Service Registration Updated Failed!');
					redirect('agent/lounge-service-registration/list', 'refresh');
				}
			}

			$data['edit_info']   	= $this->db->select('id, train_or_flight_no, service_start_time, reserved_hour, journey_date, landing_time, client_id, service_type_id, service_station_id, approve_status')->where(array('id'=>$param2))->where(array('insert_by'=>$_SESSION['userid']))->get('tbl_lounge_service_registration');

			if ($data['edit_info']->num_rows() > 0) {

				$data['edit_info']	= $data['edit_info']->row();

			} else {

				$this->session->set_flashdata('message', 'Wrong Attempt!');
				redirect('agent/lounge-service-registration/list', 'refresh');
			}

			$data['client_list'] 			= $this->db->select('id, name')->get('tbl_clients')->result();
			$data['lounge_type_list'] 		= $this->db->select('id, name')->get('tbl_lounge_type')->result();
			$data['lounge_station_list'] 	= $this->db->select('id, name')->get('tbl_lounge_service_stations')->result();

			$data['title']					= 'Lounge Registration Edit';
			$data['activeMenu'] 			= 'lounge_registration_edit';
			$data['page'] 					= 'backEnd/agent/lounge_registration_edit';

		}elseif($param1 == 'delete' && $param2 > 0) {
			
			if ($this->AgentModel->delete_lounge_registration($param2)) {
	
			$this->session->set_flashdata('message', 'Lounge Service Registration Deleted Successfully!');
			redirect('agent/lounge-service-registration/list', 'refresh');

			} else {

				$this->session->set_flashdata('message', 'Lounge Service Registration Deleted Failed!');
				redirect('agent/lounge-service-registration/list', 'refresh');
			}
			
		}else {

			$this->session->set_flashdata('message', 'Wrong Attempt!');
			redirect('agent/lounge-service-registration/list', 'refresh');

		}

		$data['type_list'] = $this->db->select('id, name, priority, insert_time')->order_by('priority', 'asc')->get('tbl_lounge_type')->result();
		$this->load->view('backEnd/master_page', $data);

    }
    
    //Mga Service Registration
	public function mga_service_registration($param1 = '', $param2 = '0', $param3='', $param4 ='') 
	{
		if($param1 == 'add'){

			if ($_SERVER['REQUEST_METHOD'] == 'POST') {

				$insert_service_registration = array();

				$client_id = $this->input->post('client_id', true);

				if($client_id < 1){
					// add client into database.
					$insert_client['name']        		= $this->input->post('name', true);
					$insert_client['phone_number']      = $this->input->post('phone', true);
					$insert_client['email']        		= $this->input->post('email', true);
					$insert_client['passport_number']   = $this->input->post('passport_number', true);
					$insert_client['insert_time']     	= date('Y-m-d H:i');

					$this->db->insert('tbl_clients', $insert_client);
					
					$insert_service_registration['client_id']  		=  $this->db->insert_id();
				}else {
					$insert_service_registration['client_id']  		=  $this->input->post('client_id', true);
				}
				
				$insert_service_registration['invoice_number']  	= date("YmdHis");
				$insert_service_registration['service_type_id']  	= $this->input->post('service_type_id', true);
				$insert_service_registration['service_station_id']  = $this->input->post('service_station_id', true);
				$insert_service_registration['train_or_flight_no']  = $this->input->post('train_or_flight', true);
				$insert_service_registration['start_time']  		= date("H:i ", strtotime($this->input->post('start_time', true)));
				$insert_service_registration['journey_date']  		= date("Y-m-d ", strtotime($this->input->post('journey_date', true)));
				$insert_service_registration['landing_time']  		= date("H:i ", strtotime($this->input->post('landing_time', true)));
				$insert_service_registration['unit_rate']  		    = $this->input->post('unit_rate', true);
				$insert_service_registration['quantity']  		    = $this->input->post('person', true);
				$insert_service_registration['total_bill']  		= $this->input->post('total_bill', true);
				
				$insert_service_registration['insert_time']     	= date('Y-m-d H:i');
				$insert_service_registration['insert_by']       	= $_SESSION['userid'];

				$insert_invoice['client_id']  						= $insert_service_registration['client_id'];
				$insert_invoice['invoice_number']  					= $insert_service_registration['invoice_number'];
				$insert_invoice['total_bill']  						= $insert_service_registration['total_bill'];
				$insert_invoice['discount']  						= 0;
				$insert_invoice['payable_amount']  					= $insert_service_registration['total_bill'];
				$insert_invoice['remarks']  						= 0;
				$insert_invoice['agent_id']  						= $_SESSION['userid'];
				$insert_invoice['approve_status']  					= 0;
				$insert_invoice['approved_by']  					= 0;
				$insert_invoice['insert_time']  					= $insert_service_registration['insert_time'];
				$insert_invoice['invoice_date']  					= date('Y-m-d');

				$invoice = $this->db->insert('tbl_invoice', $insert_invoice);

				$add_service_registration = $this->db->insert('tbl_mga_service_registration', $insert_service_registration);

				if ($add_service_registration) {

					$this->session->set_flashdata('message', 'Mga Service Registration Added Successfully!');
					redirect('agent/mga-service-registration/list', 'refresh');

				} else {

					$this->session->set_flashdata('message', 'Mga Service Registration Add Failed!');
					redirect('agent/mga-service-registration/list', 'refresh');
				}

				
			}
			$data['client_list'] 				= $this->db->select('id, name')->get('tbl_clients')->result();
			$data['service_type_list'] 			= $this->db->select('id, name')->get('tbl_mga_service_type')->result();
			$data['service_station_list'] 		= $this->db->select('id, name')->get('tbl_mga_service_stations')->result();
			
			$data['title']      				= 'Mga Service Registration Add';
			$data['page']       				= 'backEnd/agent/mga_service_registration_add';
			$data['activeMenu'] 				= 'mga_service_registration_add';

		}elseif($param1 == 'list'){
			
			
			$data['service_registration_list']  = $this->AgentModel->get_service_registration_list($param2);
			$data['mga_type_list'] 			    = $this->db->select('id, name')->get('tbl_mga_service_type')->result();


			$data['title']      				= 'Mga Service Registration List ';
			$data['page']       				= 'backEnd/agent/mga_service_registration_list';
			$data['activeMenu'] 				= 'mga_service_registration_list';
		
		}elseif($param1 == 'invoice' && $param2 > 0){

			$mga_service = $this->db->select('id, client_id, service_type_id, service_station_id')->get_where('tbl_mga_service_registration',array('id'=>$param2))->row();
			$client_id = $mga_service->client_id;

			$data['client_details']   			= $this->db->select('id, name, phone_number, email, passport_number')->get_where('tbl_clients',array('id'=>$client_id))->row();
			$data['invoice_list']  				= $this->AgentModel->get_mga_invoice_list($param2);

			$data['title']						= 'Mga Service Registration Invoice';
			$data['activeMenu'] 				= 'mga_registration_invoice';
			$data['page'] 						= 'backEnd/agent/mga_service_registration_invoice';
		}elseif($param1 == 'edit' && $param2 > 0){

			if ($_SERVER['REQUEST_METHOD'] == 'POST') {

				$update_service_registration['client_id']  			= $this->input->post('client_id', true);
				$update_service_registration['service_type_id']  	= $this->input->post('service_type_id', true);
				$update_service_registration['service_station_id']  = $this->input->post('service_station_id', true);
				$update_service_registration['train_or_flight_no']  = $this->input->post('train_or_flight', true);
				$update_service_registration['start_time']  		= date("H:i ", strtotime($this->input->post('start_time', true)));
				$update_service_registration['journey_date']  		= date("Y-m-d ", strtotime($this->input->post('journey_date', true)));
				$update_service_registration['landing_time']  		= date("H:i ", strtotime($this->input->post('landing_time', true)));
				$update_service_registration['approve_status']  	= $this->input->post('status', true);
				$update_service_registration['approved_by']  		= $_SESSION['userid'];

				if ($this->AgentModel->update_service_registration($update_service_registration, $param2)) {
	
					$this->session->set_flashdata('message', 'Mga Service Registration Updated Successfully!');
					redirect('agent/mga-service-registration/list', 'refresh');
	
				} else {
	
					$this->session->set_flashdata('message', 'Mga Service Registration Updated Failed!');
					redirect('agent/mga-service-registration/list', 'refresh');
				}
			}

			$data['edit_info']   	= $this->db->select('id, train_or_flight_no, start_time, journey_date, landing_time, client_id, service_type_id, service_station_id, approve_status')->where(array('id'=>$param2))->where(array('insert_by'=>$_SESSION['userid']))->get('tbl_mga_service_registration');

			if ($data['edit_info']->num_rows() > 0) {

				$data['edit_info']	= $data['edit_info']->row();

			} else {

				$this->session->set_flashdata('message', 'Wrong Attempt!');
				redirect('agent/mga-service-registration/list', 'refresh');
			}

			$data['client_list'] 			= $this->db->select('id, name')->get('tbl_clients')->result();
			$data['service_type_list'] 		= $this->db->select('id, name')->get('tbl_mga_service_type')->result();
			$data['service_station_list'] 	= $this->db->select('id, name')->get('tbl_mga_service_stations')->result();

			$data['title']					= 'Mga Service Registration Edit';
			$data['activeMenu'] 			= 'mga_service_registration_edit';
			$data['page'] 					= 'backEnd/agent/mga_service_registration_edit';

		}elseif($param1 == 'delete' && $param2 > 0) {
			
			if ($this->AgentModel->delete_service_registration($param2)) {
	
				$this->session->set_flashdata('message', 'Mga Service Registration Deleted Successfully!');
				redirect('agent/mga-service-registration/list', 'refresh');

			} else {

				$this->session->set_flashdata('message', 'Mga Service Registration Deleted Failed!');
				redirect('agent/mga-service-registration/list', 'refresh');
			}
			
		}else {

			$this->session->set_flashdata('message', 'Wrong Attempt!');
			redirect('agent/mga-service-registration/list', 'refresh');

		}

		$data['type_list'] = $this->db->select('id, name, priority, insert_time')->order_by('priority', 'asc')->get('tbl_mga_service_type')->result();
		$this->load->view('backEnd/master_page', $data);

    }
    
    //Shuttle Service Registrastion
	public function shuttle_service_registration($param1 = '', $param2 = '0', $param3 = '', $param4 = '') 
	{
		if($param1 == 'add'){

			if ($_SERVER['REQUEST_METHOD'] == 'POST') {

				$insert_shuttle_registration = array();

				$client_id = $this->input->post('client_id', true);

				if($client_id < 1){
					// add client into database.
					$insert_client['name']        		= $this->input->post('name', true);
					$insert_client['phone_number']      = $this->input->post('phone', true);
					$insert_client['email']        		= $this->input->post('email', true);
					$insert_client['passport_number']   = $this->input->post('passport_number', true);
					$insert_client['insert_time']     	= date('Y-m-d H:i');

					$this->db->insert('tbl_clients', $insert_client);
					
					$insert_shuttle_registration['client_id']  		=  $this->db->insert_id();
				}else {
					$insert_shuttle_registration['client_id']  		=  $this->input->post('client_id', true);
				}

				$insert_shuttle_registration['invoice_number']  	= date("YmdHis");
				$insert_shuttle_registration['service_type_id']  	= $this->input->post('service_type_id', true);
				$insert_shuttle_registration['service_station_id']  = $this->input->post('service_station_id', true);
				$insert_shuttle_registration['start_from']  		= date("H:i ", strtotime($this->input->post('start_from', true)));
				$insert_shuttle_registration['end_to']  			= date("H:i ", strtotime($this->input->post('end_to', true)));
				$insert_shuttle_registration['airlines_id']   		= 1;
				$insert_shuttle_registration['travel_date']  		= date("Y-m-d ", strtotime($this->input->post('travel_date', true)));
				$insert_shuttle_registration['unit_rate']  		    = $this->input->post('unit_rate', true);
				$insert_shuttle_registration['quantity']  		    = $this->input->post('person', true);
				$insert_shuttle_registration['total_bill']  		= $this->input->post('total_bill', true);

				$insert_shuttle_registration['insert_time']     	= date('Y-m-d H:i');
				$insert_shuttle_registration['insert_by']       	= $_SESSION['userid'];

				$insert_invoice['client_id']  						= $insert_shuttle_registration['client_id'];
				$insert_invoice['invoice_number']  					= $insert_shuttle_registration['invoice_number'];
				$insert_invoice['total_bill']  						= $insert_shuttle_registration['total_bill'];
				$insert_invoice['discount']  						= 0;
				$insert_invoice['payable_amount']  					= $insert_shuttle_registration['total_bill'];
				$insert_invoice['remarks']  						= 0;
				$insert_invoice['agent_id']  						= $_SESSION['userid'];
				$insert_invoice['approve_status']  					= 0;
				$insert_invoice['approved_by']  					= 0;
				$insert_invoice['insert_time']  					= $insert_shuttle_registration['insert_time'];
				$insert_invoice['invoice_date']  					= date('Y-m-d');

				$invoice = $this->db->insert('tbl_invoice', $insert_invoice);

				$add_shuttle_registration = $this->db->insert('tbl_shuttle_service_registration', $insert_shuttle_registration);

				if ($add_shuttle_registration) {

					$this->session->set_flashdata('message', 'Shuttle Service Registration Added Successfully!');
					redirect('agent/shuttle-service-registration/list', 'refresh');

				} else {

				$this->session->set_flashdata('message', 'Service Registration Add Failed!');
					redirect('agent/shuttle-service-registration/list', 'refresh');
				}

				
			}
			$data['client_list'] 				= $this->db->select('id, name')->get('tbl_clients')->result();
			$data['shuttle_type_list'] 			= $this->db->select('id, name')->get('tbl_shuttle_type')->result();
			$data['shuttle_station_list'] 		= $this->db->select('id, name')->get('tbl_shuttle_service_stations')->result();

			$data['title']      				= 'Shuttle Registration Add';
			$data['page']       				= 'backEnd/agent/shuttle_registration_add';
			$data['activeMenu'] 				= 'shuttle_registration_add';

		}elseif($param1 == 'list'){

			$data['shuttle_registration_list']  = $this->AgentModel->get_shuttle_registration_list($param2);

			$data['shuttle_type_list'] 			= $this->db->select('id, name')->get('tbl_shuttle_type')->result();
			$data['title']      				= 'Shuttle Service Registration List ';
			$data['page']       				= 'backEnd/agent/shuttle_registration_list';
			$data['activeMenu'] 				= 'shuttle_registration_list';
		
		}elseif($param1 == 'invoice' && $param2 > 0){

			$shuttle_service = $this->db->select('id, client_id')->get_where('tbl_shuttle_service_registration',array('id'=>$param2))->row();
			$client_id = $shuttle_service->client_id;

			$data['client_details']   			= $this->db->select('id, name, phone_number, email, passport_number')->get_where('tbl_clients',array('id'=>$client_id))->row();
			$data['invoice_list']  				= $this->AgentModel->get_shuttle_invoice_list($param2);

			$data['title']						= 'Shuttle Registration Invoice';
			$data['activeMenu'] 				= 'shuttle_registration_invoice';
			$data['page'] 						= 'backEnd/agent/shuttle_registration_invoice';
		}elseif($param1 == 'edit' && $param2 > 0){

			if ($_SERVER['REQUEST_METHOD'] == 'POST') {

				$update_shuttle_registration['client_id']  			= $this->input->post('client_id', true);
				$update_shuttle_registration['service_type_id']  	= $this->input->post('service_type_id', true);
				$update_shuttle_registration['service_station_id']  = $this->input->post('service_station_id', true);
				$update_shuttle_registration['start_from']  		= date("H:i ", strtotime($this->input->post('start_from', true)));
				$update_shuttle_registration['end_to']  			= date("H:i ", strtotime($this->input->post('landingend_to_time', true)));
				$update_shuttle_registration['airlines_id']   		= 1;
				$update_shuttle_registration['travel_date']  		= date("Y-m-d ", strtotime($this->input->post('travel_date', true)));
				$update_shuttle_registration['approve_status']  	= $this->input->post('status', true);
				$update_shuttle_registration['approved_by']  		= $_SESSION['userid'];

				if ($this->AgentModel->update_shuttle_registration($update_shuttle_registration, $param2)) {
	
					$this->session->set_flashdata('message', 'Shuttle Service Registration Updated Successfully!');
					redirect('agent/shuttle-service-registration/list', 'refresh');
	
				} else {
	
					$this->session->set_flashdata('message', 'Shuttle Service Registration Updated Failed!');
					redirect('agent/shuttle-service-registration/list', 'refresh');
				}
			}

			$data['edit_info']   	= $this->db->select('id, start_from, travel_date, end_to, client_id, service_type_id, service_station_id, approve_status')->where(array('id'=>$param2))->where(array('insert_by'=>$_SESSION['userid']))->get('tbl_shuttle_service_registration');

			if ($data['edit_info']->num_rows() > 0) {

				$data['edit_info']	= $data['edit_info']->row();

			} else {

				$this->session->set_flashdata('message', 'Wrong Attempt!');
				redirect('agent/shuttle-service-registration/list', 'refresh');
			}

			$data['client_list'] 			= $this->db->select('id, name')->get('tbl_clients')->result();
			$data['shuttle_type_list'] 		= $this->db->select('id, name')->get('tbl_shuttle_type')->result();
			$data['shuttle_station_list'] 	= $this->db->select('id, name')->get('tbl_shuttle_service_stations')->result();

			$data['title']					= 'Shuttle Registration Edit';
			$data['activeMenu'] 			= 'shuttle_registration_edit';
			$data['page'] 					= 'backEnd/agent/shuttle_registration_edit';

		}elseif($param1 == 'delete' && $param2 > 0) {
			
			if ($this->AgentModel->delete_shuttle_registration($param2)) {
	
				$this->session->set_flashdata('message', 'Shuttle Service Registration Deleted Successfully!');
				redirect('agent/shuttle-service-registration/list', 'refresh');

			} else {

				$this->session->set_flashdata('message', 'Shuttle Service Registration Deleted Failed!');
				redirect('agent/shuttle-service-registration/list', 'refresh');
			}
				
		}else {

			$this->session->set_flashdata('message', 'Wrong Attempt!');
			redirect('agent/shuttle-service-registration/list', 'refresh');

		}

		$data['type_list'] = $this->db->select('id, name, priority, insert_time')->order_by('priority', 'asc')->get('tbl_shuttle_type')->result();
		$this->load->view('backEnd/master_page', $data);

    }
    
    //Client
	public function client($param1 = '', $param2 = '', $param3 = '')
	{
		if ($param1 == 'add') {

			if ($_SERVER['REQUEST_METHOD'] == 'POST') {

				$insert_client['name']        		= $this->input->post('name', true);
				$insert_client['phone_number']      = $this->input->post('phone', true);
				$insert_client['email']        		= $this->input->post('email', true);
				$insert_client['passport_number']   = $this->input->post('passport_number', true);
				$insert_client['insert_time']     	= date('Y-m-d H:i');

				$add_client = $this->db->insert('tbl_clients', $insert_client);

				if ($add_client) {

					$this->session->set_flashdata('message', 'Client Added Successfully!');
					redirect('agent/client/list', 'refresh');

				} else {

				   $this->session->set_flashdata('message', 'Client Add Failed!');
					redirect('agent/client/list', 'refresh');
				}
			}

			$data['title']              = 'client Add';
			$data['activeMenu']         = 'client_add';
			$data['page']               = 'backEnd/agent/client_add';
			
		} elseif ($param1 == 'list' ) {

			$data['title']        		= 'client List';
			$data['activeMenu']   		= 'client_list';
			$data['client_list'] 	    = $this->db->select('id, name, phone_number, email, passport_number')->get('tbl_clients')->result(); 
			$data['page']         		= 'backEnd/agent/client_list';
		   
		} elseif ($param1 == 'edit' && $param2 > 0) {

			$data['edit_info']   = $this->db->select('id, name, phone_number, email, passport_number')->get_where('tbl_clients',array('id'=>$param2));

			if ($data['edit_info']->num_rows() > 0) {

				$data['edit_info']    = $data['edit_info']->row();

				if ($_SERVER['REQUEST_METHOD'] == 'POST') {

					$update_client['name']        		= $this->input->post('name', true);
					$update_client['phone_number']      = $this->input->post('phone', true);
					$update_client['email']        		= $this->input->post('email', true);
					$update_client['passport_number']   = $this->input->post('passport_number', true);
					
					if ($this->AgentModel->update_client($update_client, $param2)) {

						$this->session->set_flashdata('message', 'Client Updated Successfully!');
						redirect('agent/client/list', 'refresh');

					} else {

					   $this->session->set_flashdata('message', 'Client Update Failed!');
						redirect('agent/client/list', 'refresh');
					}
				}

			} else {

				$this->session->set_flashdata('message', 'Wrong Attempt!');
				redirect('agent/client/list', 'refresh');
			}

			$data['title']      = 'Client Edit';
			$data['activeMenu'] = 'client_edit';
			$data['page']       = 'backEnd/agent/client_edit';
			
		   
		} elseif($param1 == 'delete' && $param2 > 0) {
			
		   if ($this->AgentModel->delete_client($param2)) {

				$this->session->set_flashdata('message', 'Client Deleted Successfully!');
				redirect('agent/client/list', 'refresh');

			} else {

			   $this->session->set_flashdata('message', 'Client Deleted Failed!');
				redirect('agent/client/list', 'refresh');
			}
			
		} else {

			$this->session->set_flashdata('message', 'Wrong Attempt!');
			redirect('agent/client/list', 'refresh');

		}

		$this->load->view('backEnd/master_page',$data);        
    }
    
    //Invoice
	public function invoice($param1 = '', $param2 = '', $param3 = '') 
	{
		if($param1 == 'add'){

			if ($_SERVER['REQUEST_METHOD'] == 'POST') {

				$insert_service_registration  = array();
				$insert_lounge_registration   = array();
				$insert_shuttle_registration  = array();
				$insert_airmail_registration  = array();
				$insert_invoice			  	  = array();

				//Client Insert Start
				$client_id = $this->input->post('client_id', true);

				if($client_id < 1){
					// add client into database.
					$insert_client['name']        		= $this->input->post('name', true);
					$insert_client['phone_number']      = $this->input->post('phone', true);
					$insert_client['email']        		= $this->input->post('email', true);
					$insert_client['passport_number']   = $this->input->post('passport_number', true);
					$insert_client['insert_time']     	= date('Y-m-d H:i');

					$this->db->insert('tbl_clients', $insert_client);
					//Client Insert end

					//get Client id start
					$insert_service_registration['client_id']  		= $this->db->insert_id();
					$insert_lounge_registration['client_id']  		= $insert_service_registration['client_id'];
					$insert_shuttle_registration['client_id']		= $insert_lounge_registration['client_id'];
					$insert_airmail_registration['client_id']		= $insert_service_registration['client_id'];
					$insert_invoice['client_id']  					= $insert_airmail_registration['client_id'];
				}else {
					$insert_service_registration['client_id']  		= $this->input->post('client_id', true);
					$insert_lounge_registration['client_id']  		= $insert_service_registration['client_id'];
					$insert_shuttle_registration['client_id']  		= $insert_lounge_registration['client_id'];
					$insert_airmail_registration['client_id']  		= $insert_shuttle_registration['client_id'];
					$insert_invoice['client_id']  					= $insert_airmail_registration['client_id'];
				}

					//get Client id end
				
				//Insert service registration start
				$insert_service_registration['invoice_number']  	= date("YmdHis");
				$insert_service_registration['service_type_id']  	= $this->input->post('service_type_id', true);
				$insert_service_registration['service_station_id']  = $this->input->post('service_station_id', true);
				$insert_service_registration['train_or_flight_no']  = $this->input->post('train_or_flight', true);
				$insert_service_registration['start_time']  		= date("H:i ", strtotime($this->input->post('start_time', true)));
				$insert_service_registration['journey_date']  		= date("Y-m-d ", strtotime($this->input->post('journey_date', true)));
				$insert_service_registration['landing_time']  		= date("H:i ", strtotime($this->input->post('landing_time', true)));
				$insert_service_registration['unit_rate']  		    = $this->input->post('mga_unit_rate', true);
				$insert_service_registration['quantity']  		    = $this->input->post('mga_person', true);
				$insert_service_registration['total_bill']  		= $this->input->post('mga_total_bill', true);
				$insert_service_registration['insert_time']     	= date('Y-m-d H:i');
				$insert_service_registration['insert_by']       	= $_SESSION['userid'];

				$add_service_registration = $this->db->insert('tbl_mga_service_registration', $insert_service_registration);
				//Insert service registration end
				
				//Insert lounge registration start
				$insert_lounge_registration['invoice_number']  		= $insert_service_registration['invoice_number'];
				$insert_lounge_registration['service_type_id']  	= $this->input->post('lounge_service_type_id', true);
				$insert_lounge_registration['service_station_id']   = $this->input->post('lounge_service_station_id', true);
				$insert_lounge_registration['train_or_flight_no']   = $this->input->post('train_or_flight', true);
				$insert_lounge_registration['service_start_time']  	= date("H:i ", strtotime($this->input->post('service_start_time', true)));
				$insert_lounge_registration['reserved_hour']  		= $this->input->post('hour', true) + $this->input->post('minuts', true);
				$insert_lounge_registration['journey_date']  		= date("Y-m-d ", strtotime($this->input->post('journey_date', true)));
				$insert_lounge_registration['landing_time']  		= date("H:i ", strtotime($this->input->post('landing_time', true)));
				$insert_lounge_registration['quantity']  		    = $this->input->post('lounge_person', true);
				$insert_lounge_registration['unit_rate']  		    = $this->input->post('lounge_unit_rate', true);
				$insert_lounge_registration['total_bill']  			= $this->input->post('lounge_total_bill', true);
				$insert_lounge_registration['insert_time']     		= date('Y-m-d H:i');
				$insert_lounge_registration['insert_by']       		= $_SESSION['userid'];

				$add_lounge_registration = $this->db->insert('tbl_lounge_service_registration', $insert_lounge_registration);
				//Insert lounge registration end

				//Insert shuttle registration start
				$insert_shuttle_registration['invoice_number']  	= $insert_service_registration['invoice_number'];
				$insert_shuttle_registration['service_type_id']  	= $this->input->post('shuttle_service_type_id', true);
				$insert_shuttle_registration['service_station_id']  = $this->input->post('shuttle_service_station_id', true);
				$insert_shuttle_registration['start_from']  		= date("H:i ", strtotime($this->input->post('start_from', true)));
				$insert_shuttle_registration['end_to']  			= date("H:i ", strtotime($this->input->post('end_to', true)));
				$insert_shuttle_registration['airlines_id']   		= 1;
				$insert_shuttle_registration['travel_date']  		= date("Y-m-d ", strtotime($this->input->post('travel_date', true)));
				$insert_shuttle_registration['unit_rate']  		    = $this->input->post('shuttle_unit_rate', true);
				$insert_shuttle_registration['quantity']  		    = $this->input->post('shuttle_person', true);
				$insert_shuttle_registration['total_bill']  		= $this->input->post('shuttle_total_bill', true);
				$insert_shuttle_registration['insert_time']     	= date('Y-m-d H:i');
				$insert_shuttle_registration['insert_by']       	= $_SESSION['userid'];

				$add_shuttle_registration = $this->db->insert('tbl_shuttle_service_registration', $insert_shuttle_registration);
				//Insert shuttle registration end

				//Insert aimail registration start	
				
				$insert_airmail_registration['invoice_number']  	= $insert_service_registration['invoice_number'];
				$insert_airmail_registration['service_type_id']  	= $this->input->post('airmail_service_type_id', true);
				$insert_airmail_registration['service_station_id']  = $this->input->post('airmail_service_station_id', true);
				$insert_airmail_registration['train_or_flight_no']  = $this->input->post('train_or_flight', true);
				$insert_airmail_registration['received_from']  		= $this->input->post('received_from', true);
				$insert_airmail_registration['drop_to']  			= $this->input->post('drop_to', true);
				$insert_airmail_registration['product_details']  	= $this->input->post('product_details', true);
				$insert_airmail_registration['delivery_details']  	= $this->input->post('delivery_details', true);
				$insert_airmail_registration['received_date']  		= date("Y-m-d ", strtotime($this->input->post('received_date', true)));
				$insert_airmail_registration['remark']  			= $this->input->post('remark', true);
				$insert_airmail_registration['total_bill']  		= $this->input->post('airmail_total_bill', true);
				$insert_airmail_registration['unit_rate']  		    = $this->input->post('airmail_unit_rate', true);
				$insert_airmail_registration['quantity']  		    = $this->input->post('airmail_person', true);
				$insert_airmail_registration['insert_time']     	= date('Y-m-d H:i');
				$insert_airmail_registration['insert_by']       	= $_SESSION['userid'];

				$add_airmail_registration = $this->db->insert('tbl_airmail_service_registration', $insert_airmail_registration);
				//Insert aimail registration end

				//Insert Invoice start
				
				$insert_invoice['invoice_number']  					= $insert_airmail_registration['invoice_number'];
				$insert_invoice['total_bill']  						= $this->input->post('total_bill', true);
				$insert_invoice['discount']  						= $this->input->post('discount', true);
				$insert_invoice['payable_amount']  					= $this->input->post('payable_amount', true);
				$insert_invoice['remarks']  						= 0;
				$insert_invoice['agent_id']  						= $_SESSION['userid'];
				$insert_invoice['approve_status']  					= $this->input->post('status', true);
				$insert_invoice['invoice_date']  					= date('Y-m-d');

				if($this->input->post('status', true) == "1"){
					$insert_invoice['approved_by']  				= $_SESSION['userid'];
				}else {
					$insert_invoice['approved_by']  				= 0;
				}

				$insert_invoice['insert_time']  					= date('Y-m-d H:i');


				$invoice = $this->db->insert('tbl_invoice', $insert_invoice);
				

				if ($invoice) {

					$this->session->set_flashdata('message', 'Invoice Added Successfully!');
					redirect('agent/invoice/list', 'refresh');

				} else {

				$this->session->set_flashdata('message', 'Invoice Add Failed!');
					redirect('agent/invoice/list', 'refresh');
				}
				//Insert Invoice end

			}
			
			$data['title']      		= 'Invoice Add';
			$data['page']       		= 'backEnd/agent/invoice_add';
			$data['activeMenu'] 		= 'invoice_add';

		}elseif($param1 == 'list'){
			
			
			$data['invoice_list']  		= $this->AgentModel->get_invoice_list();

			$data['title']      		= 'Invoice List';
			$data['page']       		= 'backEnd/agent/invoice_list';
			$data['activeMenu'] 		= 'invoice_list';
		
		}elseif($param1 == 'view' && $param2 > 0){

			if ($_SERVER['REQUEST_METHOD'] == 'POST') {


			}


			$data['invoice_number']         	= $param2;
			$client 							= $this->db->select('id, client_id, invoice_number, invoice_date, total_bill, discount, payable_amount')->get_where('tbl_invoice',array('invoice_number'=>$param2));
			
			if($client->num_rows() > 0){

				$client_id 						= $client->row()->client_id;
				$invoice_number 				= $client->row()->invoice_number;
				$data['order_date'] 			= $client->row()->invoice_date;
				$data['total_bill'] 			= $client->row()->total_bill;
				$data['discount'] 				= $client->row()->discount;
				$data['payable_amount'] 		= $client->row()->payable_amount;

				$data['client_details']   		= $this->db->select('id, name, phone_number, email, passport_number')->get_where('tbl_clients',array('id'=>$client_id))->row();

				$data['invoice_view_mga']  		= $this->AgentModel->get_mga_invoice_row($invoice_number);
				$data['invoice_view_lounge']  	= $this->AgentModel->get_lounge_invoice_row($invoice_number);
				$data['invoice_view_shuttle']  	= $this->AgentModel->get_shuttle_invoice_row($invoice_number);
				$data['invoice_view_airmail']  	= $this->AgentModel->get_airmail_invoice_row($invoice_number);
			
			} else {

				$this->session->set_flashdata('message', 'Wrong Attempt!');
				redirect('agent/invoice/list', 'refresh');
			}
			
			$data['title']					= 'Invoice View';
			$data['activeMenu'] 			= 'invoice_view';
			$data['page'] 					= 'backEnd/agent/invoice_view';

		}elseif($param1 == 'delete' && $param2 > 0) {

			if ($this->AgentModel->delete_invoice_by_invoice_number($param2)) {
	
				$this->session->set_flashdata('message', 'Invoice Deleted Successfully!');
				redirect('agent/invoice/list', 'refresh');

			} else {

				$this->session->set_flashdata('message', 'Invoice Deleted Failed!');
				redirect('agent/invoice/list', 'refresh');
			}
				
		}
		else {

			$this->session->set_flashdata('message', 'Wrong Attempt!');
			redirect('agent/invoice/list', 'refresh');

		}

		$this->load->view('backEnd/master_page', $data);

	}

	//Invoice Active Statrus
	public function invoice_status($id, $setvalue) {

		$this->db->where('id', $id);
		$this->db->update('tbl_invoice', array('approve_status' => $setvalue));
		$this->session->set_flashdata('message', 'Data Saved Successfully.');
		redirect('agent/invoice/list', 'refresh');
	}

	//Seles Report
	public function seles_report($param1 = '', $param2 = '', $param3 = '') 
	{
		if($param1 == 'add'){

			if ($_SERVER['REQUEST_METHOD'] == 'POST') {

				
			}
			
			$data['title']      		= 'Invoice Add';
			$data['page']       		= 'backEnd/agent/invoice_add';
			$data['activeMenu'] 		= 'invoice_add';

		}elseif($param1 == 'list'){ 

			$data['agent_id']   = '';
			$data['start_date'] = '';
			$data['end_date']   = '';
			$data['seles_list'] =  array();

			if ($_SERVER['REQUEST_METHOD'] == 'POST') {

				$this->db->select('tbl_invoice.id, tbl_invoice.invoice_number, tbl_invoice.total_bill, tbl_invoice.discount,tbl_invoice.payable_amount, tbl_invoice.remarks');

				if($this->input->post('agent_id', true)){

					$data['agent_id'] = $this->input->post('agent_id', true);
					$this->db->where('tbl_invoice.agent_id', $data['agent_id']);

				}
				if($this->input->post('start_date', true)){

					$data['start_date'] = date("Y-m-d", strtotime($this->input->post('start_date', true)));
					$this->db->where('tbl_invoice.invoice_date>=', $data['start_date']);

				}
				if($this->input->post('end_date', true)){
					
					$data['end_date'] = date("Y-m-d", strtotime($this->input->post('end_date', true))); 
					$this->db->where('tbl_invoice.invoice_date<=', $data['end_date']);

				}

				
				$this->db->join('tbl_clients', 'tbl_clients.id = tbl_invoice.client_id', 'left'); 

				$data['seles_list'] = $this->db->get('tbl_invoice')->result();

			}
			
			
			$data['agent_list']         = $this->db->select('id, firstname')->where('userType','agent')->get('user')->result();

			$data['title']      		= 'Seles Report';
			$data['page']       		= 'backEnd/agent/seles_report';
			$data['activeMenu'] 		= 'seles_report';
		
		}elseif($param1 == 'delete' && $param2 > 0) {
			
			
				
		}
		else {

			$this->session->set_flashdata('message', 'Wrong Attempt!');
			redirect('agent/seles-report/list', 'refresh');

		}

		$this->load->view('backEnd/master_page', $data);

	}

	
}
