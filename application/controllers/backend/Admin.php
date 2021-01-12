<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct() {

		parent::__construct();

		$this->lang->load('content', $_SESSION['lang']);

		if (!isset($_SESSION['user_auth']) || $_SESSION['user_auth'] != true) {
			redirect('login', 'refresh');
		}
		if ($_SESSION['userType'] != 'admin')
			redirect('login', 'refresh');
		//Model Loading
		$this->load->model('AdminModel');
		$this->load->library("pagination");
		$this->load->helper("url");
		$this->load->helper("text");

		date_default_timezone_set("Asia/Dhaka");
	}

	public function index() {
		
		$data['main_service'] 	= $this->db->from("tbl_main_services")->count_all_results();
		$data['division']	 	= $this->db->from("tbl_divission")->count_all_results();
		$data['zilla'] 			= $this->db->from("tbl_zilla")->count_all_results();
		$data['upozilla'] 		= $this->db->from("tbl_upozilla")->count_all_results();

		$data['title']      	= 'Admin Panel ';
		$data['page']       	= 'backEnd/dashboard_view';
		$data['activeMenu'] 	= 'dashboard_view';
		
		
		$this->load->view('backEnd/master_page', $data);
	}

	

	//Add User
	public function add_user($param1 = '') 
	{
		$messagePage['divissions'] 			= $this->db->get('tbl_divission')->result_array();
		$messagePage['userType']   			= $this->db->get('user_type')->result();

		$messagePage['title']      			= 'Add User Admin Panel ';
		$messagePage['page']       			= 'backEnd/admin/add_user';
		$messagePage['activeMenu'] 			= 'add_user';
		
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {

			$saveData['firstname'] 			= $this->input->post('first_name', true);
			$saveData['lastname']  			= $this->input->post('last_name', true);
			$saveData['username']  			= $this->input->post('user_name', true);
			$saveData['email']     			= $this->input->post('email', true);
			$saveData['phone']     			= $this->input->post('phone', true);
			$saveData['password']  			= sha1($this->input->post('password', true));
			$saveData['address']   			= $this->input->post('address', true);
			$saveData['roadHouse'] 			= $this->input->post('road_house', true);
			$saveData['userType']  			= $this->input->post('user_type', true);
			$saveData['photo']     			= 'assets/userPhoto/defaultUser.jpg';

			if (!empty($_FILES['photo']['name'])) {

				$path_parts                 = pathinfo($_FILES["photo"]['name']);
				$newfile_name               = preg_replace('/[^A-Za-z]/', "", $path_parts['filename']);
				$dir                        = date("YmdHis", time());
				$config_c['file_name']      = $newfile_name . '_' . $dir;
				$config_c['remove_spaces']  = TRUE;
				$config_c['upload_path']    = 'assets/userPhoto/';
				$config_c['max_size']       = '20000'; //  less than 20 MB
				$config_c['allowed_types']  = 'jpg|png|jpeg|jpg|JPG|JPG|PNG|JPEG';

				$this->load->library('upload', $config_c);
				$this->upload->initialize($config_c);
				if (!$this->upload->do_upload('photo')) {

				} else {

					$upload_c = $this->upload->data();
					$saveData['photo'] = $config_c['upload_path'] . $upload_c['file_name'];
					$this->image_size_fix($saveData['photo'], 400, 400);
				}
				
			}

			//This will returns as third parameter num_rows, result_array, result
			$username_check = $this->AdminModel->isRowExist('user', array('username' => $saveData['username']), 'num_rows');
			$email_check = $this->AdminModel->isRowExist('user', array('email' => $saveData['email']), 'num_rows');

			if ($username_check > 0 || $email_check > 0) {
				//Invalid message
				$messagePage['page'] = 'backEnd/admin/insertFailed';
				$messagePage['noteMessage'] = "<hr> UserName: " . $saveData['username'] . " can not be create.";
				if ($username_check > 0) {

					$messagePage['noteMessage'] .= '<br> Cause this username is already exist.';
				} else if ($email_check > 0) {

					$messagePage['noteMessage'] .= '<br> Cause this email is already exist.';
				}
			} else {
				//success
				$insertId = $this->AdminModel->saveDataInTable('user', $saveData, 'true');

				$messagePage['page'] = 'backEnd/admin/insertSuccessfull';
				$messagePage['noteMessage'] = "<hr> UserName: " . $saveData['username'] . " has been created successfully.";

				// Category allocate for users
				if (!empty($this->input->post('selectCategory', true))) {

					foreach ($this->input->post('selectCategory', true) as $cat_value) {

						$this->db->insert('category_user', array('userId' => $insertId, 'categoryId' => $cat_value));
					}
				}
			}
		}


		$this->load->view('backEnd/master_page', $messagePage);
	}

	//Edit User
	public function edit_user($param1 = '') 
	{
		// Update using post method 
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {

			if(strlen($this->input->post('password', true)) > 3){
                $saveData['password']  = sha1($this->input->post('password', true));
            }

			$saveData['firstname'] 			= $this->input->post('first_name', true);
			$saveData['lastname']  			= $this->input->post('last_name', true);
			$saveData['phone']     			= $this->input->post('phone', true);
			$saveData['address']   			= $this->input->post('address', true);
			$saveData['roadHouse'] 			= $this->input->post('road_house', true);
			$saveData['userType']  			= $this->input->post('user_type', true);
			$user_id               			= $param1;

			if (!empty($_FILES['photo']['name'])) {

				$path_parts                 = pathinfo($_FILES["photo"]['name']);
				$newfile_name               = preg_replace('/[^A-Za-z]/', "", $path_parts['filename']);
				$dir                        = date("YmdHis", time());
				$config_c['file_name']      = $newfile_name . '_' . $dir;
				$config_c['remove_spaces']  = TRUE;
				$config_c['upload_path']    = 'assets/userPhoto/';
				$config_c['max_size']       = '20000'; //  less than 20 MB
				$config_c['allowed_types']  = 'jpg|png|jpeg|jpg|JPG|JPG|PNG|JPEG';

				$this->load->library('upload', $config_c);
				$this->upload->initialize($config_c);
				if (!$this->upload->do_upload('photo')) {

				} else {

					$upload_c = $this->upload->data();
					$saveData['photo'] = $config_c['upload_path'] . $upload_c['file_name'];
					$this->image_size_fix($saveData['photo'], 400, 400);
				}
				
			}

			if (isset($saveData['photo']) && file_exists($saveData['photo'])) {
	
				$result = $this->db->select('photo')->from('user')->where('id',$user_id)->get()->row()->photo;

				if (file_exists($result)) {
					unlink($result);
				}  
			}

			$this->db->where('id', $user_id);
			$this->db->update('user', $saveData);
			
			$data['page']          = 'backEnd/admin/insertSuccessfull';
			$data['noteMessage']   = "<hr> Data has been Updated successfully.";

		} else if ($this->AdminModel->isRowExist('user', array('id' => $param1), 'num_rows') > 0) {

			$data['userDetails']   = $this->AdminModel->isRowExist('user', array('id' => $param1), 'result_array');

			$myupozilla_id         = $this->db->get_where('tbl_upozilla', array("id"=>$data['userDetails'][0]['address']))->row();

			$data['myzilla_id']    = $myupozilla_id->zilla_id;
			$data['mydivision_id'] = $myupozilla_id->division_id;

			$data['divissions']    = $this->db->get('tbl_divission')->result();
		
			$data['distrcts']      = $this->db->get_where('tbl_zilla',array('divission_id'=>$data['mydivision_id']))->result();
			$data['upozilla']      = $this->db->get_where('tbl_upozilla',array('zilla_id'=>$data['myzilla_id']))->result();

			$data['userType'] 	   = $this->db->get('user_type')->result_array();
			$data['user_id']  	   = $param1;
			$data['page']     	   = 'backEnd/admin/edit_user';

		} else {

			$data['page']          = 'errors/invalidInformationPage';
			$data['noteMessage']   = $this->lang->line('wrong_info_search');
		}

		$data['user_type'] 	       = $this->db->select('id, value, name')->get('user_type')->result();
		$data['title']             = 'Users List Admin Panel ';
		$data['activeMenu']        = 'user_list';
		$this->load->view('backEnd/master_page', $data);
	}

	//Suspend User
	public function suspend_user($id, $setvalue)
	{
		$this->db->where('id', $id);
		$this->db->update('user', array('status' => $setvalue));
		$this->session->set_flashdata('message', 'Data Saved Successfully.');
		
		redirect('admin/user_list', 'refresh');
	}

	//Delete User
	public function delete_user($id)
	{
		$old_image_url=$this->db->where('id', $id)->get('user')->row();
		$this->db->where('id', $id)->delete('user');
		if(isset($old_image_url->photo)){
			unlink($old_image_url->photo);
		}

		$this->session->set_flashdata('message', 'Data Deleted.');
		redirect('admin/user_list', 'refresh');
	}

	//User List
	public function user_list() 
	{
		$this->db->where('userType !=', 'admin');
		$data['myUsers']    = $this->db->get('user')->result_array();
		$data['title']      = 'Users List Admin Panel';
		$data['page']       = 'backEnd/admin/user_list';
		$data['activeMenu'] = 'user_list';
		$this->load->view('backEnd/master_page', $data);
	}

	public function image_size_fix($filename, $width = 600, $height = 400, $destination = '') {

		
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

		$this->load->helper('download');

		$filePath = $file_name;

		if($file_name=='full' && ($fullpath != '' || $fullpath != null)) $filePath = $fullpath;

		if($_GET['file_path']) $filePath = $_GET['file_path'];
		
		if (file_exists($filePath)) {

			force_download($filePath, NULL);

		} else {

			die('The provided file path is not valid.');
		}
	}
	
	public function profile($param1 = '')
	{

		$user_id            = $this->session->userdata('userid');
		$data['user_info']  = $this->AdminModel->get_user($user_id);


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
					
					redirect('admin/profile','refresh');
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
			       
				$this->db->where('id',$user_id)->update('user',array('password'=>$new_pass));
				$this->session->set_flashdata('message', 'Password Updated Successfully');
				redirect('admin/profile','refresh');
					
			   }else{
			       
				    $this->session->set_flashdata('message', 'Password Update Failed');
				    redirect('admin/profile','refresh');
				   
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


				$current_password = sha1($this->input->post('password', true));

				$db_password      = $data['user_info']->password;

				if ($current_password == $db_password) {

					if ($this->AdminModel->update_pro_info($update_data, $user_id)) {
    			    
	    			    $this->session->set_userdata('username_first', $update_data['firstname']);
	    			    $this->session->set_userdata('username_last', $update_data['lastname']);
	    			    $this->session->set_userdata('username', $update_data['username']);
	    			    
	    				$this->session->set_flashdata('message', 'Information Updated Successfully!');
	    				redirect('admin/profile', 'refresh');
	    				
	    			} else {
	    			    
	    				$this->session->set_flashdata('message', 'Information Update Failed!');
	    				redirect('admin/profile', 'refresh');
	    				
	    			} 

				} else {

					$this->session->set_flashdata('message', 'Current Password Does Not Match!');
	    			redirect('admin/profile', 'refresh');
				}
				
				
				
			}
		}
		
		$data['title']      = 'Profile Admin Panel';
		$data['activeMenu'] = 'Profile';
		$data['page']       = 'backEnd/admin/profile';
		
		$this->load->view('backEnd/master_page',$data);
	}

	public function testimonial($param1 = 'add', $param2 = '', $param3 = '')
	{
		if ($param1 == 'add') {

			if ($_SERVER['REQUEST_METHOD'] == 'POST') {

				$insert_testimonials['name']        = $this->input->post('name', true);
				$insert_testimonials['position']    = $this->input->post('position', true);
				$insert_testimonials['priority']    = $this->input->post('priority', true);
				$insert_testimonials['description'] = $this->input->post('description', true);
				$insert_testimonials['insert_by']   = $_SESSION['userid'];
				$insert_testimonials['insert_time'] = date('Y-m-d H:i:s');

				if (!empty($_FILES['photo']['name'])) {

					$path_parts                     = pathinfo($_FILES["photo"]['name']);
					$newfile_name                   = preg_replace('/[^A-Za-z]/', "", $path_parts['filename']);
					$dir                            = date("YmdHis", time());
					$config_c['file_name']          = $newfile_name . '_' . $dir;
					$config_c['remove_spaces']      = TRUE;
					$config_c['upload_path']        = 'assets/testimonialsPhoto/';
					$config_c['max_size']           = '20000'; //  less than 20 MB
					$config_c['allowed_types']      = 'jpg|png|jpeg|jpg|JPG|JPG|PNG|JPEG';

					$this->load->library('upload', $config_c);
					$this->upload->initialize($config_c);
					if (!$this->upload->do_upload('photo')) {

					} else {

						$upload_c = $this->upload->data();
						$insert_testimonials['photo'] = $config_c['upload_path'] . $upload_c['file_name'];
						$this->image_size_fix($insert_testimonials['photo'], 400, 400);
					}
					
				}

				$add_testimonials = $this->db->insert('testimonials',$insert_testimonials);

				if ($add_testimonials) {

					$this->session->set_flashdata('message','Testimonials Added Successfully!');
					redirect('admin/testimonial/list','refresh');

				} else {

				   $this->session->set_flashdata('message','Testimonials Add Failed!');
					redirect('admin/testimonial/list','refresh');
				}
			}

			$data['title']             = 'Testimonials Add';
			$data['activeMenu']        = 'testimonials_add';
			$data['page']              = 'backEnd/admin/testimonials_add';
			
		} elseif ($param1 == 'list' ) {

			$data['title']             = 'Testimonials List';
			$data['activeMenu']        = 'testimonials_list';
			$data['testimonials']      = $this->db->get('testimonials')->result(); 
			$data['page']              = 'backEnd/admin/testimonials_list';
		   
		} elseif ($param1 == 'edit' && $param2 > 0) {

			$data['edit_info']   = $this->db->get_where('testimonials',array('id'=>$param2));

			if ($data['edit_info']->num_rows() > 0) {

				$data['edit_info']    = $data['edit_info']->row();

				if ($_SERVER['REQUEST_METHOD'] == 'POST') {

					$update_testimonials['name']        = $this->input->post('name', true);
					$update_testimonials['position']    = $this->input->post('position', true);
					$update_testimonials['priority']    = $this->input->post('priority', true);
					$update_testimonials['description'] = $this->input->post('description', true);

					if (!empty($_FILES['photo']['name'])) {

						$path_parts                     = pathinfo($_FILES["photo"]['name']);
						$newfile_name                   = preg_replace('/[^A-Za-z]/', "", $path_parts['filename']);
						$dir                            = date("YmdHis", time());
						$config_c['file_name']          = $newfile_name . '_' . $dir;
						$config_c['remove_spaces']      = TRUE;
						$config_c['upload_path']        = 'assets/testimonialsPhoto/';
						$config_c['max_size']           = '20000'; //  less than 20 MB
						$config_c['allowed_types']      = 'jpg|png|jpeg|jpg|JPG|JPG|PNG|JPEG';

						$this->load->library('upload', $config_c);
						$this->upload->initialize($config_c);
						if (!$this->upload->do_upload('photo')) {

						} else {

							$upload_c = $this->upload->data();
							$update_testimonials['photo'] = $config_c['upload_path'] . $upload_c['file_name'];
							$this->image_size_fix($update_testimonials['photo'], 400, 400);
						}
						
					}

					if ($this->AdminModel->update_testimonials($update_testimonials, $param2)) {

						$this->session->set_flashdata('message','Testimonials  Updated Successfully!');
						redirect('admin/testimonial/list','refresh');

					} else {

					   $this->session->set_flashdata('message','Testimonials Update Failed!');
						redirect('admin/testimonial/list','refresh');
					}
				}

			} else {

				$this->session->set_flashdata('message','Wrong Attempt!');
				redirect('admin/testimonial/list','refresh');
			}

			$data['title']      = 'Testimonials Edit';
			$data['activeMenu'] = 'testimonials_edit';
			$data['page']       = 'backEnd/admin/testimonials_edit';
			
		   
		} elseif($param1 == 'delete' && $param2 > 0) {
			
		   if ($this->AdminModel->delete_testimonials($param2)) {

				$this->session->set_flashdata('message','Testimonials  Deleted Successfully!');
				redirect('admin/testimonial/list','refresh');

			} else {

			   $this->session->set_flashdata('message','Testimonials Deleted Failed!');
				redirect('admin/testimonial/list','refresh');
			}
			
		} else {

			$this->session->set_flashdata('message', 'Wrong Attempt!');
			redirect('admin/testimonial/list','refresh');

		}

		$this->load->view('backEnd/master_page',$data);        
	}

	
	//Division
	public function division($param1 = '', $param2 = '', $param3 = '')
	{
		if ($param1 == 'add') {

			if ($_SERVER['REQUEST_METHOD'] == 'POST') {

				$insert_division['name']        = $this->input->post('name', true);

				$add_division = $this->db->insert('tbl_divission', $insert_division);

				if ($add_division) {

					$this->session->set_flashdata('message', 'Division Added Successfully!');
					redirect('admin/division/list', 'refresh');

				} else {

				   $this->session->set_flashdata('message','Division Add Failed!');
					redirect('admin/division/list', 'refresh');
				}
			}

			$data['title']              = 'Division Add';
			$data['activeMenu']         = 'division_add';
			$data['page']               = 'backEnd/admin/division_add';
			
		} elseif ($param1 == 'list' ) {

			$data['title']        		= 'Division List';
			$data['activeMenu']   		= 'division_list';
			$data['division'] 	  		= $this->db->get('tbl_divission')->result(); 
			$data['page']         		= 'backEnd/admin/division_list';
		   
		} elseif ($param1 == 'edit' && $param2 > 0) {

			$data['edit_info']   = $this->db->get_where('tbl_divission',array('id'=>$param2));

			if ($data['edit_info']->num_rows() > 0) {

				$data['edit_info']    = $data['edit_info']->row();

				if ($_SERVER['REQUEST_METHOD'] == 'POST') {

					$update_division['name']        = $this->input->post('name', true);
					
					if ($this->AdminModel->update_division($update_division, $param2)) {

						$this->session->set_flashdata('message','Divison Updated Successfully!');
						redirect('admin/division/list','refresh');

					} else {

					   $this->session->set_flashdata('message','Division Update Failed!');
						redirect('admin/division/list','refresh');
					}
				}

			} else {

				$this->session->set_flashdata('message','Wrong Attempt!');
				redirect('admin/division/list','refresh');
			}

			$data['title']      = 'Division Edit';
			$data['activeMenu'] = 'division_edit';
			$data['page']       = 'backEnd/admin/division_edit';
			
		   
		} elseif($param1 == 'delete' && $param2 > 0) {
			
		   if ($this->AdminModel->delete_division($param2)) {

				$this->session->set_flashdata('message','Division  Deleted Successfully!');
				redirect('admin/division/list','refresh');

			} else {

			   $this->session->set_flashdata('message','Division Deleted Failed!');
				redirect('admin/division/list','refresh');
			}
			
		} else {

			$this->session->set_flashdata('message', 'Wrong Attempt!');
			redirect('admin/division/list','refresh');

		}

		$this->load->view('backEnd/master_page',$data);        
	}

	//Zilla
	public function zilla($param1 = '', $param2 = '') 
	{
		if($param1 == 'add'){

			if ($_SERVER['REQUEST_METHOD'] == 'POST') {

				$insert_zilla['divission_id']  		= $this->input->post('divission_id', true);
				$insert_zilla['name']  				= $this->input->post('name', true);
				
				$add_zilla = $this->db->insert('tbl_zilla', $insert_zilla);

					if ($add_zilla) {

						$this->session->set_flashdata('message', 'Zilla Added Successfully!');
						redirect('admin/zilla/list', 'refresh');

					} else {

					$this->session->set_flashdata('message', 'Zilla Add Failed!');
						redirect('admin/zilla/list', 'refresh');
					}

				
			}
			$data['divissions'] 		= $this->db->get('tbl_divission')->result();
			$data['title']      		= 'Zilla Add';
			$data['page']       		= 'backEnd/admin/zilla_add';
			$data['activeMenu'] 		= 'zilla_add';

		}elseif($param1 == 'list'){
			
			$this->db->select('tbl_zilla.id, tbl_zilla.name, tbl_divission.name as divission_name');
			$this->db->join('tbl_divission', 'tbl_divission.id = tbl_zilla.divission_id', 'left');
			$data['zilla_list']    		= $this->db->get('tbl_zilla')->result();
			
			$data['title']      		= 'Zilla List ';
			$data['page']       		= 'backEnd/admin/zilla_list';
			$data['activeMenu'] 		= 'zilla_list';
		
		}elseif($param1 == 'edit' && $param2 > 0){

			if ($_SERVER['REQUEST_METHOD'] == 'POST') {

				$update_zilla['name']				= $this->input->post('name', true);
				$update_zilla['divission_id']		= $this->input->post('divission_id', true);
				

				if ($this->AdminModel->update_zilla($update_zilla, $param2)) {
	
					$this->session->set_flashdata('message', 'Zilla Updated Successfully!');
					redirect('admin/zilla/list', 'refresh');
	
				} else {
	
				   $this->session->set_flashdata('message', 'Zilla Updated Failed!');
					redirect('admin/zilla/list', 'refresh');
				}
			}

			$data['edit_info']   	= $this->db->get_where('tbl_zilla',array('id'=>$param2));

			if ($data['edit_info']->num_rows() > 0) {

				$data['edit_info']	= $data['edit_info']->row();

			} else {

				$this->session->set_flashdata('message', 'Wrong Attempt!');
				redirect('admin/zilla/list', 'refresh');
			}

			$data['division_list'] 	= $this->db->select('id, name')->get('tbl_divission')->result();

			$data['title']			= 'Zilla Edit';
			$data['activeMenu'] 	= 'zilla_edit';
			$data['page'] 			= 'backEnd/admin/zilla_edit';

		}elseif($param1 == 'delete' && $param2 > 0) {
			
			if ($this->AdminModel->delete_zilla($param2)) {
 
				 $this->session->set_flashdata('message', 'Zilla Deleted Successfully!');
				 redirect('admin/zilla/list', 'refresh');
 
			 } else {
 
				$this->session->set_flashdata('message', 'Zilla Deleted Failed!');
				 redirect('admin/zilla/list', 'refresh');
			 }
			 
		 }
		  else {
 
			 $this->session->set_flashdata('message', 'Wrong Attempt!');
			 redirect('admin/zilla/list', 'refresh');
 
		 }

		$this->load->view('backEnd/master_page', $data);

	}

	//Upozilla
	public function upozilla($param1 = '', $param2 = '') 
	{
		if($param1 == 'add'){

			if ($_SERVER['REQUEST_METHOD'] == 'POST') {

				$insert_upozilla['division_id']  	= $this->input->post('divission_id', true);
				$insert_upozilla['zilla_id']  		= $this->input->post('zilla_id', true);
				$insert_upozilla['name']  			= $this->input->post('name', true);
				
				$add_upozilla = $this->db->insert('tbl_upozilla', $insert_upozilla);

					if ($add_upozilla) {

						$this->session->set_flashdata('message', 'Upoilla Added Successfully!');
						redirect('admin/upozilla/list', 'refresh');

					} else {

					$this->session->set_flashdata('message', 'Upoilla Add Failed!');
						redirect('admin/upozilla/list', 'refresh');
					}


			}
			$data['divissions'] 		= $this->db->get('tbl_divission')->result();
			$data['title']      		= 'Upozilla Add';
			$data['page']       		= 'backEnd/admin/upozilla_add';
			$data['activeMenu'] 		= 'upozilla_add';

			
		}elseif($param1 == 'list'){
			
			$this->db->select('tbl_upozilla.id, tbl_upozilla.name, tbl_divission.name as divission_name, tbl_zilla.name as zilla_name');
			$this->db->join('tbl_divission', 'tbl_divission.id = tbl_upozilla.division_id', 'left');
			$this->db->join('tbl_zilla', 'tbl_zilla.id = tbl_upozilla.zilla_id', 'left');
			$data['upozilla_list']  	= $this->db->get('tbl_upozilla')->result();
			
			$data['title']      		= 'Upozilla List ';
			$data['page']       		= 'backEnd/admin/upozilla_list';
			$data['activeMenu'] 		= 'upozilla_list';
		
		}elseif($param1 == 'edit' && $param2 > 0){

			if ($_SERVER['REQUEST_METHOD'] == 'POST') {

				$update_upozilla['name']				= $this->input->post('name', true);
				$update_upozilla['division_id']			= $this->input->post('division_id', true);
				$update_upozilla['zilla_id']			= $this->input->post('zilla_id', true);
				

				if ($this->AdminModel->update_upozilla($update_upozilla, $param2)) {
	
					$this->session->set_flashdata('message', 'Upozilla Updated Successfully!');
					redirect('admin/upozilla/list', 'refresh');
	
				} else {
	
				   $this->session->set_flashdata('message', 'Upozilla Updated Failed!');
					redirect('admin/upozilla/list', 'refresh');
				}
			}

			$data['edit_info']   	= $this->db->get_where('tbl_upozilla',array('id'=>$param2));

			if ($data['edit_info']->num_rows() > 0) {

				$data['edit_info']	= $data['edit_info']->row();

			} else {

				$this->session->set_flashdata('message', 'Wrong Attempt!');
				redirect('admin/upozilla/list', 'refresh');
			}

			$division_id 			= $data['edit_info']->division_id;
			$zilla_id 				= $data['edit_info']->zilla_id;

			$data['division_list'] 	= $this->db->get('tbl_divission')->result();
			$data['zilla_list']   	= $this->db->get_where('tbl_zilla', array('divission_id' => $division_id))->result();

			
			
			$data['title']			= 'Upozilla Edit';
			$data['activeMenu'] 	= 'upozilla_edit';
			$data['page'] 			= 'backEnd/admin/upozilla_edit';

		}elseif($param1 == 'delete' && $param2 > 0) {
			
			if ($this->AdminModel->delete_upozilla($param2)) {
 
				 $this->session->set_flashdata('message', 'Upozilla Deleted Successfully!');
				 redirect('admin/upozilla/list', 'refresh');
 
			 } else {
 
				$this->session->set_flashdata('message', 'Upozilla Deleted Failed!');
				 redirect('admin/upozilla/list', 'refresh');
			 }
			 
		 }
		  else {
 
			 $this->session->set_flashdata('message', 'Wrong Attempt!');
			 redirect('admin/upozilla/list', 'refresh');
 
		 }

		$this->load->view('backEnd/master_page', $data);

	}

	public function slider($param1 = 'add', $param2 = '', $param3 = '') {

		if ($param1 == 'add') {

			if ($_SERVER['REQUEST_METHOD'] == 'POST') {

				$insert_slider['title']       	= $this->input->post('title', true); 
				$insert_slider['subtitle']    	= $this->input->post('subtitle', true); 
				$insert_slider['priority']    	= $this->input->post('priority', true); 
				$insert_slider['insert_by']   	= $_SESSION['userid'];


				if (!empty($_FILES["photo"]['name'])){

					//exta work
					$path_parts                 = pathinfo($_FILES["photo"]['name']);
					$newfile_name               = preg_replace('/[^A-Za-z]/', "", $path_parts['filename']);
					$dir                        = date("YmdHis", time());
					$config_c['file_name']      = $newfile_name . '_' . $dir;
					$config_c['remove_spaces']  = TRUE;
					$config_c['upload_path']    = 'assets/sliderPhoto/';
					$config_c['max_size']       = '20000'; //  less than 20 MB
					$config_c['allowed_types']  = 'jpg|png|jpeg|jpg|JPG|JPG|PNG|JPEG';

					$this->load->library('upload', $config_c);
					$this->upload->initialize($config_c);
					if (!$this->upload->do_upload('photo')) {

					} else {

						$upload_c = $this->upload->data();
						$insert_slider['photo']   = $config_c['upload_path'] . $upload_c['file_name'];
						$this->image_size_fix($insert_slider['photo'], 1920, 810);
					}
				}

				$slider_add = $this->db->insert('tbl_slider', $insert_slider);

				if ($slider_add) {

					$this->session->set_flashdata('message', "Slider Added Successfully.");
					redirect('admin/slider/', 'refresh'); 

				} else {

					$this->session->set_flashdata('message', "Slider Add Failed.");
					redirect('admin/slider/', 'refresh'); 
				}
			}
			
		} else if ($param1 == 'edit' && $param2 > 0) { 

			if ($_SERVER['REQUEST_METHOD'] == 'POST') {

				$update_slider['priority']   	= $this->input->post('priority', true);  
				$update_slider['subtitle']   	= $this->input->post('subtitle', true);  
				$update_slider['title']      	= $this->input->post('title', true);

				if (!empty($_FILES["photo"]['name'])){

					//exta work
					$path_parts                 = pathinfo($_FILES["photo"]['name']);
					$newfile_name               = preg_replace('/[^A-Za-z]/', "", $path_parts['filename']);
					$dir                        = date("YmdHis", time());
					$config_c['file_name']      = $newfile_name . '_' . $dir;
					$config_c['remove_spaces']  = TRUE;
					$config_c['upload_path']    = 'assets/sliderPhoto/';
					$config_c['max_size']       = '20000'; //  less than 20 MB
					$config_c['allowed_types']  = 'jpg|png|jpeg|jpg|JPG|JPG|PNG|JPEG';

					$this->load->library('upload', $config_c);
					$this->upload->initialize($config_c);
					if (!$this->upload->do_upload('photo')) {

					} else {

						$upload_c = $this->upload->data();
						$update_slider['photo']   = $config_c['upload_path'] . $upload_c['file_name'];
						$this->image_size_fix($update_slider['photo'], 1920, 810);
					}
				}

				if ($this->AdminModel->slider_update($update_slider,$param2)) {

					$this->session->set_flashdata('message', "Slider Updated Successfully.");
					redirect('admin/slider', 'refresh');

				} else {

					$this->session->set_flashdata('message', "Slider Update Failed.");
					redirect('admin/slider', 'refresh'); 
				}
			}

			$data['slider_info'] = $this->db->select('id, photo, title, subtitle, priority')->get_where('tbl_slider',array('id'=>$param2));

			if ($data['slider_info']->num_rows() > 0) {

				$data['slider_info']    = $data['slider_info']->row();
				$data['slider_info_id'] = $param2;

			}else{

				$this->session->set_flashdata('message', "Wrong Attempt !");
				redirect('admin/slider', 'refresh'); 
			}

		}elseif ($param1 == 'delete' && $param2 > 0) {

		   if ($this->AdminModel->slider_delete($param2)) {

				$this->session->set_flashdata('message', "Slider Deleted Successfully.");
				redirect('admin/slider', 'refresh'); 

			} else {

				$this->session->set_flashdata('message', "Slider Delete Failed.");
				redirect('admin/slider', 'refresh'); 
			}
		}

		$data['title']      = 'Slider';
		$data['activeMenu'] = 'slider';
		$data['page']       = 'backEnd/admin/slider';
		$data['all_slider'] = $this->db->select('id, title, subtitle, priority, photo')->order_by('priority', 'desc')->get('tbl_slider')->result();

		$this->load->view('backEnd/master_page',$data);
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
					redirect('admin/client/list', 'refresh');

				} else {

				   $this->session->set_flashdata('message', 'Client Add Failed!');
					redirect('admin/client/list', 'refresh');
				}
			}

			$data['title']              = 'client Add';
			$data['activeMenu']         = 'client_add';
			$data['page']               = 'backEnd/admin/client_add';
			
		} elseif ($param1 == 'list' ) {

			$data['title']        		= 'client List';
			$data['activeMenu']   		= 'client_list';
			$data['client_list'] 	    = $this->db->select('id, name, phone_number, email, passport_number')->get('tbl_clients')->result(); 
			$data['page']         		= 'backEnd/admin/client_list';
		   
		} elseif ($param1 == 'edit' && $param2 > 0) {

			$data['edit_info']   = $this->db->select('id, name, phone_number, email, passport_number')->get_where('tbl_clients',array('id'=>$param2));

			if ($data['edit_info']->num_rows() > 0) {

				$data['edit_info']    = $data['edit_info']->row();

				if ($_SERVER['REQUEST_METHOD'] == 'POST') {

					$update_client['name']        		= $this->input->post('name', true);
					$update_client['phone_number']      = $this->input->post('phone', true);
					$update_client['email']        		= $this->input->post('email', true);
					$update_client['passport_number']   = $this->input->post('passport_number', true);
					
					if ($this->AdminModel->update_client($update_client, $param2)) {

						$this->session->set_flashdata('message', 'Client Updated Successfully!');
						redirect('admin/client/list', 'refresh');

					} else {

					   $this->session->set_flashdata('message', 'Client Update Failed!');
						redirect('admin/client/list', 'refresh');
					}
				}

			} else {

				$this->session->set_flashdata('message', 'Wrong Attempt!');
				redirect('admin/client/list', 'refresh');
			}

			$data['title']      = 'Client Edit';
			$data['activeMenu'] = 'client_edit';
			$data['page']       = 'backEnd/admin/client_edit';
			
		   
		} elseif($param1 == 'delete' && $param2 > 0) {
			
		   if ($this->AdminModel->delete_client($param2)) {

				$this->session->set_flashdata('message', 'Client Deleted Successfully!');
				redirect('admin/client/list', 'refresh');

			} else {

			   $this->session->set_flashdata('message', 'Client Deleted Failed!');
				redirect('admin/client/list', 'refresh');
			}
			
		} else {

			$this->session->set_flashdata('message', 'Wrong Attempt!');
			redirect('admin/client/list', 'refresh');

		}

		$this->load->view('backEnd/master_page',$data);        
	}

	//Mga Service Station
	public function mga_service_station($param1 = '', $param2 = '') 
	{
		if($param1 == 'add'){

			if ($_SERVER['REQUEST_METHOD'] == 'POST') {

				$insert_service_station['mga_service_type_id']  = $this->input->post('mga_srvice_type_id', true);
				$insert_service_station['name']  				= $this->input->post('name', true);
				$insert_service_station['unit_rate']  		    = $this->input->post('unit_rate', true);
				$insert_service_station['priority']  			= $this->input->post('priority', true);
				$insert_service_station['insert_by']       		= $_SESSION['userid'];
				$insert_service_station['insert_time']     		= date('Y-m-d H:i');
				
				$add_service_station = $this->db->insert('tbl_mga_service_stations', $insert_service_station);

					if ($add_service_station) {

						$this->session->set_flashdata('message', 'Mga Service Station Added Successfully!');
						redirect('admin/mga-service-station/list', 'refresh');

					} else {

					$this->session->set_flashdata('message', 'Mga Service Station Add Failed!');
						redirect('admin/mga-service-station/list', 'refresh');
					}

				
			}
			$data['maga_type_list'] 	= $this->db->select('id, name')->get('tbl_mga_service_type')->result();
			$data['title']      		= 'Mga Service Station Add';
			$data['page']       		= 'backEnd/admin/mga_station_add';
			$data['activeMenu'] 		= 'mga_station_add';

		}elseif($param1 == 'list'){

			$data['mga_station_list']   = $this->AdminModel->get_mga_station_list($param2);
			
			$data['mga_type_list'] 		= $this->db->select('id, name')->get('tbl_mga_service_type')->result();
			$data['title']      		= 'Mga Service Station List ';
			$data['page']       		= 'backEnd/admin/mga_station_list';
			$data['activeMenu'] 		= 'mga_station_list';
		
		}elseif($param1 == 'edit' && $param2 > 0){

			if ($_SERVER['REQUEST_METHOD'] == 'POST') {

				$update_service_station['mga_service_type_id']	= $this->input->post('mga_service_type_id', true);
				$update_service_station['name']					= $this->input->post('name', true);
				$update_service_station['unit_rate']		    = $this->input->post('unit_rate', true);
				$update_service_station['priority']				= $this->input->post('priority', true);
				

				if ($this->AdminModel->update_service_station($update_service_station, $param2)) {
	
					$this->session->set_flashdata('message', 'Mga Service Station Updated Successfully!');
					redirect('admin/mga-service-station/list', 'refresh');
	
				} else {
	
					$this->session->set_flashdata('message', 'Mga Service Station Updated Failed!');
					redirect('admin/mga-service-station/list', 'refresh');
				}
			}

			$data['edit_info']   	= $this->db->select('id, mga_service_type_id, name, priority, unit_rate')->get_where('tbl_mga_service_stations',array('id'=>$param2));

			if ($data['edit_info']->num_rows() > 0) {

				$data['edit_info']	= $data['edit_info']->row();

			} else {

				$this->session->set_flashdata('message', 'Wrong Attempt!');
				redirect('admin/mga-service-station/list', 'refresh');
			}

			$data['service_type_list'] 	= $this->db->select('id, name')->get('tbl_mga_service_type')->result();

			$data['title']				= 'Mga Service Station Edit';
			$data['activeMenu'] 		= 'mga_station_edit';
			$data['page'] 				= 'backEnd/admin/mga_station_edit';

		}elseif($param1 == 'delete' && $param2 > 0) {
			
			if ($this->AdminModel->delete_service_station($param2)) {
	
				$this->session->set_flashdata('message', 'Mga Service Station Deleted Successfully!');
				redirect('admin/mga-service-station/list', 'refresh');
	
			} else {

				$this->session->set_flashdata('message', 'Mga Service Station Deleted Failed!');
				redirect('admin/mga-service-station/list', 'refresh');
			}
				
		}
		else {

			$this->session->set_flashdata('message', 'Wrong Attempt!');
			redirect('admin/mga-service-station/list', 'refresh');

		}

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
				$insert_invoice['agent_id']  						= $this->input->post('agent_id', true);
				$insert_invoice['approve_status']  					= 0;
				$insert_invoice['approved_by']  					= 0;
				$insert_invoice['insert_time']  					= $insert_service_registration['insert_time'];
				$insert_invoice['invoice_date']  					= date('Y-m-d');
 
				$invoice = $this->db->insert('tbl_invoice', $insert_invoice);
 
				$add_service_registration = $this->db->insert('tbl_mga_service_registration', $insert_service_registration);
 
					if ($add_service_registration) {
 
						$this->session->set_flashdata('message', 'Mga Service Registration Added Successfully!');
						redirect('admin/mga-service-registration/list', 'refresh');
 
					} else {
 
						$this->session->set_flashdata('message', 'Mga Service Registration Add Failed!');
						redirect('admin/mga-service-registration/list', 'refresh');
					}
 
				 
			}
			$data['agent_list'] 				= $this->db->select('id, firstname')->where('userType', 'agent')->get('user')->result();
			
			$data['title']      				= 'Mga Service Registration Add';
			$data['page']       				= 'backEnd/admin/mga_service_registration_add';
			$data['activeMenu'] 				= 'mga_service_registration_add';
 
		}elseif($param1 == 'list'){
			 
			 
			$data['service_registration_list']  = $this->AdminModel->get_service_registration_list($param2);
			$data['mga_type_list'] 			    = $this->db->select('id, name')->get('tbl_mga_service_type')->result();


			$data['title']      				= 'Mga Service Registration List ';
			$data['page']       				= 'backEnd/admin/mga_service_registration_list';
			$data['activeMenu'] 				= 'mga_service_registration_list';
		 
		 }elseif($param1 == 'invoice' && $param2 > 0){
 
			$mga_service = $this->db->select('id, client_id, service_type_id, service_station_id')->get_where('tbl_mga_service_registration',array('id'=>$param2))->row();
			$client_id = $mga_service->client_id;

			$data['client_details']   			= $this->db->select('id, name, phone_number, email, passport_number')->get_where('tbl_clients',array('id'=>$client_id))->row();
			$data['invoice_list']  				= $this->AdminModel->get_mga_invoice_list($param2);

			$data['title']						= 'Mga Service Registration Invoice';
			$data['activeMenu'] 				= 'mga_registration_invoice';
			$data['page'] 						= 'backEnd/admin/mga_service_registration_invoice';
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
 
				if ($this->AdminModel->update_service_registration($update_service_registration, $param2)) {
	 
					$this->session->set_flashdata('message', 'Mga Service Registration Updated Successfully!');
					redirect('admin/mga-service-registration/list', 'refresh');
	 
				} else {
	 
					$this->session->set_flashdata('message', 'Mga Service Registration Updated Failed!');
					redirect('admin/mga-service-registration/list', 'refresh');
				}
			}
 
			$data['edit_info']   	= $this->db->select('id, train_or_flight_no, start_time, journey_date, landing_time, client_id, service_type_id, service_station_id, approve_status')->where(array('id'=>$param2))->where(array('insert_by'=>$_SESSION['userid']))->get('tbl_mga_service_registration');
 
			if ($data['edit_info']->num_rows() > 0) {
 
				$data['edit_info']	= $data['edit_info']->row();
 
			} else {
 
				$this->session->set_flashdata('message', 'Wrong Attempt!');
				redirect('admin/mga-service-registration/list', 'refresh');
			}
 
			$data['client_list'] 			= $this->db->select('id, name')->get('tbl_clients')->result();
			$data['service_type_list'] 		= $this->db->select('id, name')->get('tbl_mga_service_type')->result();
			$data['service_station_list'] 	= $this->db->select('id, name')->get('tbl_mga_service_stations')->result();

			$data['title']					= 'Mga Service Registration Edit';
			$data['activeMenu'] 			= 'mga_service_registration_edit';
			$data['page'] 					= 'backEnd/admin/mga_service_registration_edit';
 
		}elseif($param1 == 'delete' && $param2 > 0) {
			 
			if ($this->AdminModel->delete_service_registration($param2)) {
	 
				$this->session->set_flashdata('message', 'Mga Service Registration Deleted Successfully!');
				redirect('admin/mga-service-registration/list', 'refresh');
	 
				} else {
	 
					$this->session->set_flashdata('message', 'Mga Service Registration Deleted Failed!');
					redirect('admin/mga-service-registration/list', 'refresh');
				}
				 
			}
			else {
	 
				$this->session->set_flashdata('message', 'Wrong Attempt!');
				redirect('admin/mga-service-registration/list', 'refresh');
	 
			}
 
		$data['type_list'] = $this->db->select('id, name, priority, insert_time')->order_by('priority', 'asc')->get('tbl_mga_service_type')->result();
		$this->load->view('backEnd/master_page', $data);
 
	}

	//Main Service
	public function main_service($param1 = '', $param2 = '', $param3 = '')
	{
		if ($param1 == 'add') {

			if ($_SERVER['REQUEST_METHOD'] == 'POST') {

				$insert_main_services['name']        		= $this->input->post('name', true);
				$insert_main_services['priority']        	= $this->input->post('priority', true);
				$insert_main_services['url_name']   		= $this->input->post('url_name', true);
				$insert_main_services['insert_time']     	= date('Y-m-d H:i');
				$insert_main_services['insert_by']       	= $_SESSION['userid'];

				$add_client = $this->db->insert('tbl_main_services', $insert_main_services);

				if ($add_client) {

					$this->session->set_flashdata('message', 'Main Service Added Successfully!');
					redirect('admin/main-service/list', 'refresh');

				} else {

				   $this->session->set_flashdata('message', 'Main Service Add Failed!');
					redirect('admin/main-service/list', 'refresh');
				}
			}

			$data['title']              = 'Main Service Add';
			$data['activeMenu']         = 'main_service_add';
			$data['page']               = 'backEnd/admin/main_service_add';
			
		} elseif ($param1 == 'list' ) {

			$data['title']        		= 'Main Service List';
			$data['activeMenu']   		= 'main_service_list';
			$data['main_service_list'] 	= $this->db->select('id, name, url_name')->order_by('priority', 'asc')->get('tbl_main_services')->result(); 
			$data['page']         		= 'backEnd/admin/main_service_list';
		   
		} elseif ($param1 == 'edit' && $param2 > 0) {

			$data['edit_info']   = $this->db->select('id, name, url_name, priority')->get_where('tbl_main_services',array('id'=>$param2));

			if ($data['edit_info']->num_rows() > 0) {

				$data['edit_info']    = $data['edit_info']->row();

				if ($_SERVER['REQUEST_METHOD'] == 'POST') {

					$update_main_services['name']        		= $this->input->post('name', true);
					$update_main_services['priority']        	= $this->input->post('priority', true);
					$update_main_services['url_name']   		= $this->input->post('url_name', true);
					
					if ($this->AdminModel->update_main_service($update_main_services, $param2)) {

						$this->session->set_flashdata('message', 'Main Service Updated Successfully!');
						redirect('admin/main-service/list', 'refresh');

					} else {

					   $this->session->set_flashdata('message', 'Main Service Update Failed!');
						redirect('admin/main-service/list', 'refresh');
					}
				}

			} else {

				$this->session->set_flashdata('message', 'Wrong Attempt!');
				redirect('admin/main-service/list', 'refresh');
			}

			$data['title']      = 'Main Service Edit';
			$data['activeMenu'] = 'main_service_edit';
			$data['page']       = 'backEnd/admin/main_service_edit';
			
		   
		} elseif($param1 == 'delete' && $param2 > 0) {
			
		   if ($this->AdminModel->delete_main_service($param2)) {

				$this->session->set_flashdata('message', 'Main Service Deleted Successfully!');
				redirect('admin/main-service/list', 'refresh');

			} else {

			   $this->session->set_flashdata('message', 'Main Service Deleted Failed!');
				redirect('admin/main-service/list', 'refresh');
			}
			
		} else {

			$this->session->set_flashdata('message', 'Wrong Attempt!');
			redirect('admin/main-service/list', 'refresh');

		}

		$this->load->view('backEnd/master_page',$data);        
	}

	//General
	public function general($param1 = '', $param2 = '', $param3 = '')
	{
		if ($param1 == 'add') {

			if ($_SERVER['REQUEST_METHOD'] == 'POST') {

				$insert_general['name']  = $this->input->post('name', true);
				$insert_general['value'] = $this->input->post('value', true);

				$add_general = $this->db->insert('tbl_general',$insert_general);

				if ($add_general) {

					$this->session->set_flashdata('message',"General Add Successfully!");
					redirect('admin/general','refresh');

				} else {

					$this->session->set_flashdata('message',"General Add Failed");
					redirect('admin/general','refresh');
				}
				
			}

		} elseif ($param1 == 'edit') {

			$param2 = $this->input->post('general_id');

			$data['edit_info'] = $this->db->get_where('tbl_general',array('id'=>$param2));

			if ($data['edit_info']->num_rows() > 0) {;

				if ($_SERVER['REQUEST_METHOD'] == 'POST') {

					$update_general['name']  = $this->input->post('name', true);
					$update_general['value'] = $this->input->post('value', true);

					$general_update = $this->db->where('id',$param2)->update('tbl_general',$update_general);

					if ($general_update) {

						$this->session->set_flashdata('message',"General Update Successfully!");
						redirect('admin/general','refresh');

					} else {

						$this->session->set_flashdata('message',"General Update Failed");
						redirect('admin/general','refresh');
					}
					
				}

			} else {

				$this->session->set_flashdata('message','Wrong Attempt!');
				redirect('admin/general','refresh');
			}
			

		} elseif($param1 == 'delete' && $param2 > 0){

			$delete_general = $this->db->where('id',$param2)->delete('tbl_general');

			if ($delete_general) {

				$this->session->set_flashdata('message',"General Delete Successfully!");
				redirect('admin/general','refresh');

			} else {

				$this->session->set_flashdata('message',"General Delete Failed");
				redirect('admin/general','refresh');
			}
		}

		$data['title']      = 'General Settings';
		$data['activeMenu'] = 'general_setting';
		$data['page']       = 'backEnd/admin/general';
		$data['generals']   = $this->db->get('tbl_general')->result();
		$this->load->view('backEnd/master_page',$data);
	}

	//Gallery Category
	public function gallary_category($param1 = '', $param2 = '', $param3 = '')
	{

		if($param1 == 'add'){

			$insert_album['name']        		= $this->input->post('name', true); 
			$insert_album['priority']        	= $this->input->post('priority', true); 
			$insert_album['update_by']   		= $_SESSION['userid'];
			
			$this->db->insert('tbl_gallery_category', $insert_album);

			$redirect_action = $this->input->post('redirect_action');
			redirect($redirect_action."?modal=show", 'refresh');
		}

		if ($param1 == 'edit') {

			$edit_id     = $this->input->post('id', true);
			$checking_id = $this->db->get_where('tbl_gallery_category',array('id'=>$edit_id));

			if ($checking_id->num_rows() > 0) {

				$name 		= $this->input->post('name', true);
				$priority 	= $this->input->post('priority', true);

				$this->db->where('id', $edit_id)->update('tbl_gallery_category',array('name'=>$name, 'priority'=>$priority));
				$redirect_action = 'admin/gallary/add';
				redirect($redirect_action."?modal=show", 'refresh');

			}
		}
		if($param1 == 'delete' && $param2 > 0){
			
			$this->db->where('id', $param2)->delete('tbl_gallery_category');
			$redirect_action = 'admin/gallary/add';
			redirect($redirect_action."?modal=show", 'refresh');
		}
	}

	//Gallery
	public function gallary($param1 = 'add', $param2 = '', $param3 = '')
	{
		if ($param1 == 'add') {

			if ($_SERVER['REQUEST_METHOD'] == 'POST') {

				$insert_galary['type']                = $this->input->post('type', true); 
				$insert_galary['gallery_category_id'] = $this->input->post('gallery_category_id', true); 
				$insert_galary['title']               = $this->input->post('title', true);                 
				$insert_galary['priority']            = $this->input->post('priority', true);  
				$insert_galary['insert_time'] 		  = date('Y-m-d H:i');
				$insert_galary['insert_by']    		  = $_SESSION['userid'];               

				if ($insert_galary['type'] == 'Video') {
					$insert_galary['path']  = $this->input->post('path1');

				}elseif ($insert_galary['type'] == 'Photo'){

					if (!empty($_FILES["path"]['name'])){

						//exta work
						$path_parts                 = pathinfo($_FILES["path"]['name']);
						$newfile_name               = preg_replace('/[^A-Za-z]/', "", $path_parts['filename']);
						$dir                        = date("YmdHis", time());
						$config_c['file_name']      = $newfile_name . '_' . $dir;
						$config_c['remove_spaces']  = TRUE;
						$config_c['upload_path']    = 'assets/galleryPhoto/';
						$config_c['max_size']       = '20000'; //  less than 20 MB
						$config_c['allowed_types']  = 'jpg|png|jpeg|jpg|JPG|JPG|PNG|JPEG';

						$this->load->library('upload', $config_c);
						$this->upload->initialize($config_c);
						if (!$this->upload->do_upload('path')) {

						} else {

							$upload_c = $this->upload->data();
							$insert_galary['path']   = $config_c['upload_path'] . $upload_c['file_name'];
							//$this->image_size_fix($insert_galary['path'], 800, 600);
						}
					}
				}

				$gallary_add = $this->db->insert('tbl_gallery',$insert_galary);

				if ($gallary_add) {

					$this->session->set_flashdata('message', "Gallary Added Successfully.");
					redirect('admin/gallary/list', 'refresh'); 

				} else {

					$this->session->set_flashdata('message', "Gallary Add Failed.");
					redirect('admin/gallary/list', 'refresh'); 
					
				}
				
			}

			$data['title']           = 'Gallery Add';
			$data['activeMenu']      = 'gallery_add';
			$data['galary_category'] = $this->db->get('tbl_gallery_category')->result();
			$data['page']            = 'backEnd/admin/galary_add';

		}elseif ($param1 == 'list') {

			$data['title']           = 'Gallery List';
			$data['activeMenu']      = 'gallery_list';
			$data['page']            = 'backEnd/admin/galary_list';
			$data['all_gallery']     = $this->AdminModel->get_gallery();

		}elseif ($param1 == 'edit' && $param2 > 0) {

			$data['gallery_info']    = $this->db->get_where('tbl_gallery',array('id'=>$param2));

			if ($data['gallery_info']->num_rows() > 0) {

				$data['gallery_info']    = $data['gallery_info']->row();
				$data['gallery_info_id'] = $param2;

				if ($_SERVER['REQUEST_METHOD'] == 'POST') {

					$update_galary['type']                = $this->input->post('type', true);
					$update_galary['gallery_category_id'] = $this->input->post('gallery_category_id', true);  
					$update_galary['title']               = $this->input->post('title', true);
					$update_galary['priority']            = $this->input->post('priority', true);
					 

					if ($update_galary['type'] == 'Video') {

						$update_galary['path']  = $this->input->post('path1');

					}elseif ($update_galary['type'] == 'Photo'){

						if (!empty($_FILES["path"]['name'])){

							//exta work
							$path_parts                 = pathinfo($_FILES["path"]['name']);
							$newfile_name               = preg_replace('/[^A-Za-z]/', "", $path_parts['filename']);
							$dir                        = date("YmdHis", time());
							$config_c['file_name']      = $newfile_name . '_' . $dir;
							$config_c['remove_spaces']  = TRUE;
							$config_c['upload_path']    = 'assets/galleryPhoto/';
							$config_c['max_size']       = '20000'; //  less than 20 MB
							$config_c['allowed_types']  = 'jpg|png|jpeg|jpg|JPG|JPG|PNG|JPEG';

							$this->load->library('upload', $config_c);
							$this->upload->initialize($config_c);
							if (!$this->upload->do_upload('path')) {

							} else {

								$upload_c = $this->upload->data();
								$update_galary['path'] = $config_c['upload_path'] . $upload_c['file_name'];
								//$this->image_size_fix($update_galary['path'], 800, 600);
							}
						}
					}

					if ($this->AdminModel->galary_update($update_galary,$param2)) {

						$this->session->set_flashdata('message', "Gallary Updated Successfully.");
						redirect('admin/gallary/list', 'refresh'); 

					} else {

						$this->session->set_flashdata('message', "Gallary Updated Failed.");
						redirect('admin/gallary/list', 'refresh'); 
						
					}
				
				}

			} else{

				$this->session->set_flashdata('message', "Wrong Attempt !");
				redirect('admin/gallary/list', 'refresh');
			}

			$data['title']           = 'Gallery Edit';
			$data['activeMenu']      = 'gallery_edit';
			$data['galary_category'] = $this->db->get('tbl_gallery_category')->result();
			$data['page']            = 'backEnd/admin/galary_edit';

		}elseif ($param1 == 'delete' && $param2 > 0) {

			if ($this->AdminModel->gallery_delete($param2)) {
				$this->session->set_flashdata('message', "Gallery Deleted Successfully.");
				redirect('admin/gallary/list', 'refresh'); 
			} else {
				$this->session->set_flashdata('message', "Gallery Delete Failed.");
				redirect('admin/gallary/list', 'refresh'); 
			}
		}

		$data['albums'] = $this->db->order_by('priority', 'desc')->get('tbl_gallery_category')->result();
		$this->load->view('backEnd/master_page',$data);
	}

	//Lounge Service Station
	public function lounge_service_station($param1 = '', $param2 = '') 
	{
		if($param1 == 'add'){

			if ($_SERVER['REQUEST_METHOD'] == 'POST') {

				$insert_lounge_station['lounge_service_type_id']    = $this->input->post('lounge_srvice_type_id', true);
				$insert_lounge_station['name']  					= $this->input->post('name', true);
				$insert_lounge_station['unit_rate']  				= $this->input->post('unit_rate', true);
				$insert_lounge_station['priority']  				= $this->input->post('priority', true);
				$insert_lounge_station['insert_by']       			= $_SESSION['userid'];
				$insert_lounge_station['insert_time']     			= date('Y-m-d H:i');
				
				$add_service_station = $this->db->insert('tbl_lounge_service_stations', $insert_lounge_station);

				if ($add_service_station) {

					$this->session->set_flashdata('message', 'Lounge Service Station Added Successfully!');
					redirect('admin/lounge-service-station/list', 'refresh');

				} else {

					$this->session->set_flashdata('message', 'Lounge Service Station Add Failed!');
					redirect('admin/lounge-service-station/list', 'refresh');
				}

				
			}
			$data['lounge_type_list'] 	= $this->db->select('id, name')->get('tbl_lounge_type')->result();
			$data['title']      		= 'Lounge Service Station Add';
			$data['page']       		= 'backEnd/admin/lounge_station_add';
			$data['activeMenu'] 		= 'lounge_station_add';

		}elseif($param1 == 'list'){
			
			
			$data['lounge_station_list']   = $this->AdminModel->get_lounge_station_list($param2);
			
			$data['lounge_type_list'] 	   = $this->db->select('id, name')->get('tbl_lounge_type')->result();
			$data['title']      		   = 'Lounge Service Station List ';
			$data['page']       		   = 'backEnd/admin/lounge_station_list';
			$data['activeMenu'] 		   = 'lounge_station_list';
		
		}elseif($param1 == 'edit' && $param2 > 0){

			if ($_SERVER['REQUEST_METHOD'] == 'POST') {

				$update_lounge_station['lounge_service_type_id']	= $this->input->post('lounge_service_type_id', true);
				$update_lounge_station['name']					    = $this->input->post('name', true);
				$update_lounge_station['unit_rate']					= $this->input->post('unit_rate', true);
				$update_lounge_station['priority']					= $this->input->post('priority', true);
				

				if ($this->AdminModel->update_lounge_station($update_lounge_station, $param2)) {
	
					$this->session->set_flashdata('message', 'Lounge Service Station Updated Successfully!');
					redirect('admin/lounge-service-station/list', 'refresh');
	
				} else {
	
					$this->session->set_flashdata('message', 'Lounge Service Station Updated Failed!');
					redirect('admin/lounge-service-station/list', 'refresh');
				}
			}

			$data['edit_info']   	= $this->db->select('id, lounge_service_type_id, name, priority, unit_rate')->get_where('tbl_lounge_service_stations',array('id'=>$param2));

			if ($data['edit_info']->num_rows() > 0) {

				$data['edit_info']	= $data['edit_info']->row();

			} else {

				$this->session->set_flashdata('message', 'Wrong Attempt!');
				redirect('admin/lounge-service-station/list', 'refresh');
			}

			$data['lounge_type_list'] 	= $this->db->select('id, name')->get('tbl_lounge_type')->result();

			$data['title']				= 'Lounge Service Station Edit';
			$data['activeMenu'] 		= 'lounge_station_edit';
			$data['page'] 				= 'backEnd/admin/lounge_station_edit';

		}elseif($param1 == 'delete' && $param2 > 0) {
			
			if ($this->AdminModel->delete_lounge_station($param2)) {
	
				$this->session->set_flashdata('message', 'Lounge Service Station Deleted Successfully!');
				redirect('admin/lounge-service-station/list', 'refresh');
	
			} else {
	
				$this->session->set_flashdata('message', 'Lounge Service Station Deleted Failed!');
				redirect('admin/lounge-service-station/list', 'refresh');
			}
				
		}else {

			$this->session->set_flashdata('message', 'Wrong Attempt!');
			redirect('admin/lounge-service-station/list', 'refresh');

		}

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
				$insert_invoice['agent_id']  						= $this->input->post('agent_id', true);
				$insert_invoice['approve_status']  					= 0;
				$insert_invoice['approved_by']  					= 0;
				$insert_invoice['insert_time']  					= $insert_lounge_registration['insert_time'];
				$insert_invoice['invoice_date']  					= date('Y-m-d');

				$invoice = $this->db->insert('tbl_invoice', $insert_invoice);

				$add_lounge_registration = $this->db->insert('tbl_lounge_service_registration', $insert_lounge_registration);

				if ($add_lounge_registration) {

					$this->session->set_flashdata('message', 'Lounge Service Registration Added Successfully!');
					redirect('admin/lounge-service-registration/list', 'refresh');

				} else {

					$this->session->set_flashdata('message', 'Service Registration Add Failed!');
					redirect('admin/lounge-service-registration/list', 'refresh');
				}

				
			}
			$data['agent_list'] 			= $this->db->select('id, firstname')->where('userType', 'agent')->get('user')->result();

			$data['title']      			= 'Lounge Registration Add';
			$data['page']       			= 'backEnd/admin/lounge_registration_add';
			$data['activeMenu'] 			= 'lounge_registration_add';

		}elseif($param1 == 'list'){
			
			
			$data['lounge_registration_list']   = $this->AdminModel->get_lounge_registration_list($param2);
			
			$data['lounge_type_list'] 			= $this->db->select('id, name')->get('tbl_lounge_type')->result();
			$data['title']      				= 'Lounge Service Registration List ';
			$data['page']       				= 'backEnd/admin/lounge_registration_list';
			$data['activeMenu'] 				= 'lounge_registration_list';
		
		}elseif($param1 == 'invoice' && $param2 > 0){

			$lounge_service = $this->db->select('id, client_id')->get_where('tbl_lounge_service_registration',array('id'=>$param2))->row();
			$client_id = $lounge_service->client_id;

			$data['client_details']   			= $this->db->select('id, name, phone_number, email, passport_number')->get_where('tbl_clients',array('id'=>$client_id))->row();
			$data['invoice_list']  				= $this->AdminModel->get_lounge_invoice_list($param2);

			$data['title']						= 'Lounge Registration Invoice';
			$data['activeMenu'] 				= 'lounge_registration_invoice';
			$data['page'] 						= 'backEnd/admin/lounge_registration_invoice';

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

				if ($this->AdminModel->update_lounge_registration($update_lounge_registration, $param2)) {
	
					$this->session->set_flashdata('message', 'Lounge Service Registration Updated Successfully!');
					redirect('admin/lounge-service-registration/list', 'refresh');
	
				} else {
	
					$this->session->set_flashdata('message', 'Lounge Service Registration Updated Failed!');
					redirect('admin/lounge-service-registration/list', 'refresh');
				}
			}

			$data['edit_info']   	= $this->db->select('id, train_or_flight_no, service_start_time, reserved_hour, journey_date, landing_time, client_id, service_type_id, service_station_id, approve_status')->where(array('id'=>$param2))->where(array('insert_by'=>$_SESSION['userid']))->get('tbl_lounge_service_registration');

			if ($data['edit_info']->num_rows() > 0) {

				$data['edit_info']	= $data['edit_info']->row();

			} else {

				$this->session->set_flashdata('message', 'Wrong Attempt!');
				redirect('admin/lounge-service-registration/list', 'refresh');
			}

			$data['client_list'] 			= $this->db->select('id, name')->get('tbl_clients')->result();
			$data['lounge_type_list'] 		= $this->db->select('id, name')->get('tbl_lounge_type')->result();
			$data['lounge_station_list'] 	= $this->db->select('id, name')->get('tbl_lounge_service_stations')->result();

			$data['title']					= 'Lounge Registration Edit';
			$data['activeMenu'] 			= 'lounge_registration_edit';
			$data['page'] 					= 'backEnd/admin/lounge_registration_edit';

		}elseif($param1 == 'delete' && $param2 > 0) {
			
			if ($this->AdminModel->delete_lounge_registration($param2)) {
	
                $this->session->set_flashdata('message', 'Lounge Service Registration Deleted Successfully!');
                redirect('admin/lounge-service-registration/list', 'refresh');
	
            } else {
	
				$this->session->set_flashdata('message', 'Lounge Service Registration Deleted Failed!');
				redirect('admin/lounge-service-registration/list', 'refresh');
			}
				
		}
		else {

			$this->session->set_flashdata('message', 'Wrong Attempt!');
			redirect('admin/lounge-service-registration/list', 'refresh');

		}

		$data['type_list'] = $this->db->select('id, name, priority, insert_time')->order_by('priority', 'asc')->get('tbl_lounge_type')->result();
		$this->load->view('backEnd/master_page', $data);

    }

	//Shuttle Service Station
	public function shuttle_service_station($param1 = '', $param2 = '') 
	{
		if($param1 == 'add'){

			if ($_SERVER['REQUEST_METHOD'] == 'POST') {

				$insert_shuttle_station['shuttle_service_type_id']   = $this->input->post('shuttle_srvice_type_id', true);
				$insert_shuttle_station['name']  					 = $this->input->post('name', true);
				$insert_shuttle_station['unit_rate']  			     = $this->input->post('unit_rate', true);
				$insert_shuttle_station['priority']  				 = $this->input->post('priority', true);
				$insert_shuttle_station['insert_by']       			 = $_SESSION['userid'];
				$insert_shuttle_station['insert_time']     			 = date('Y-m-d H:i');

				$add_shuttle_station = $this->db->insert('tbl_shuttle_service_stations', $insert_shuttle_station);

				if ($add_shuttle_station) {

					$this->session->set_flashdata('message', 'Shuttle Service Station Added Successfully!');
					redirect('admin/shuttle-service-station/list', 'refresh');

				} else {

					$this->session->set_flashdata('message', 'Sounge Service Station Add Failed!');
					redirect('admin/shuttle-service-station/list', 'refresh');
				}

				
			}

			$data['shuttle_type_list'] 	= $this->db->select('id, name')->get('tbl_shuttle_type')->result();
			$data['title']      		= 'Shuttle Service Station Add';
			$data['page']       		= 'backEnd/admin/shuttle_station_add';
			$data['activeMenu'] 		= 'shuttle_station_add';

		}elseif($param1 == 'list'){
			
			$data['shuttle_station_list']  = $this->AdminModel->get_shuttle_station_list($param2);

			$data['shuttle_type_list'] 	   = $this->db->select('id, name')->get('tbl_shuttle_type')->result();
			$data['title']      		   = 'Shuttle Service Station List ';
			$data['page']       		   = 'backEnd/admin/shuttle_station_list';
			$data['activeMenu'] 		   = 'shuttle_station_list';
		
		}elseif($param1 == 'edit' && $param2 > 0){

			if ($_SERVER['REQUEST_METHOD'] == 'POST') {

				$update_shuttle_station['shuttle_service_type_id']	= $this->input->post('shuttle_service_type_id', true);
				$update_shuttle_station['name']					    = $this->input->post('name', true);
				$update_shuttle_station['unit_rate']			    = $this->input->post('unit_rate', true);
				$update_shuttle_station['priority']					= $this->input->post('priority', true);
				

				if ($this->AdminModel->update_shuttle_station($update_shuttle_station, $param2)) {
	
					$this->session->set_flashdata('message', 'Shuttle Service Station Updated Successfully!');
					redirect('admin/shuttle-service-station/list', 'refresh');
	
				} else {
	
					$this->session->set_flashdata('message', 'Shuttle Service Station Updated Failed!');
					redirect('admin/shuttle-service-station/list', 'refresh');
				}
			}

			$data['edit_info']   	= $this->db->select('id, shuttle_service_type_id, name, priority, unit_rate')->get_where('tbl_shuttle_service_stations',array('id'=>$param2));

			if ($data['edit_info']->num_rows() > 0) {

				$data['edit_info']	= $data['edit_info']->row();

			} else {

				$this->session->set_flashdata('message', 'Wrong Attempt!');
				redirect('admin/shuttle-service-station/list', 'refresh');
			}

			$data['shuttle_type_list'] 	= $this->db->select('id, name')->get('tbl_shuttle_type')->result();

			$data['title']				= 'Shuttle Service Station Edit';
			$data['activeMenu'] 		= 'shuttle_station_edit';
			$data['page'] 				= 'backEnd/admin/shuttle_station_edit';

		}elseif($param1 == 'delete' && $param2 > 0) {
			
			if ($this->AdminModel->delete_shuttle_station($param2)) {
	
				$this->session->set_flashdata('message', 'Shuttle Service Station Deleted Successfully!');
				redirect('admin/shuttle-service-station/list', 'refresh');
	
			} else {
	
				$this->session->set_flashdata('message', 'Shuttle Service Station Deleted Failed!');
				redirect('admin/shuttle-service-station/list', 'refresh');
			}
				
		}else {

			$this->session->set_flashdata('message', 'Wrong Attempt!');
			redirect('admin/shuttle-service-station/list', 'refresh');

		}

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
				$insert_invoice['agent_id']  						= $this->input->post('agent_id', true);
				$insert_invoice['approve_status']  					= 0;
				$insert_invoice['approved_by']  					= 0;
				$insert_invoice['insert_time']  					= $insert_shuttle_registration['insert_time'];
				$insert_invoice['invoice_date']  					= date('Y-m-d');

				$invoice = $this->db->insert('tbl_invoice', $insert_invoice);

				$add_shuttle_registration = $this->db->insert('tbl_shuttle_service_registration', $insert_shuttle_registration);

				if ($add_shuttle_registration) {

					$this->session->set_flashdata('message', 'Shuttle Service Registration Added Successfully!');
					redirect('admin/shuttle-service-registration/list', 'refresh');

				} else {

					$this->session->set_flashdata('message', 'Service Registration Add Failed!');
					redirect('admin/shuttle-service-registration/list', 'refresh');
				}

				
			}

			$data['agent_list'] 				= $this->db->select('id, firstname')->where('userType', 'agent')->get('user')->result();

			$data['title']      				= 'Shuttle Registration Add';
			$data['page']       				= 'backEnd/admin/shuttle_registration_add';
			$data['activeMenu'] 				= 'shuttle_registration_add';

		}elseif($param1 == 'list'){

			$data['shuttle_registration_list']  = $this->AdminModel->get_shuttle_registration_list($param2);

			$data['shuttle_type_list'] 			= $this->db->select('id, name')->get('tbl_shuttle_type')->result();
			$data['title']      				= 'Shuttle Service Registration List ';
			$data['page']       				= 'backEnd/admin/shuttle_registration_list';
			$data['activeMenu'] 				= 'shuttle_registration_list';
		
		}elseif($param1 == 'invoice' && $param2 > 0){

			$shuttle_service = $this->db->select('id, client_id')->get_where('tbl_shuttle_service_registration',array('id'=>$param2))->row();
			$client_id = $shuttle_service->client_id;

			$data['client_details']   			= $this->db->select('id, name, phone_number, email, passport_number')->get_where('tbl_clients',array('id'=>$client_id))->row();
			$data['invoice_list']  				= $this->AdminModel->get_shuttle_invoice_list($param2);

			$data['title']						= 'Shuttle Registration Invoice';
			$data['activeMenu'] 				= 'shuttle_registration_invoice';
			$data['page'] 						= 'backEnd/admin/shuttle_registration_invoice';
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

				if ($this->AdminModel->update_shuttle_registration($update_shuttle_registration, $param2)) {
	
					$this->session->set_flashdata('message', 'Shuttle Service Registration Updated Successfully!');
					redirect('admin/shuttle-service-registration/list', 'refresh');
	
				} else {
	
					$this->session->set_flashdata('message', 'Shuttle Service Registration Updated Failed!');
					redirect('admin/shuttle-service-registration/list', 'refresh');
				}
			}

			$data['edit_info']   	= $this->db->select('id, start_from, travel_date, end_to, client_id, service_type_id, service_station_id, approve_status')->where(array('id'=>$param2))->where(array('insert_by'=>$_SESSION['userid']))->get('tbl_shuttle_service_registration');

			if ($data['edit_info']->num_rows() > 0) {

				$data['edit_info']	= $data['edit_info']->row();

			} else {

				$this->session->set_flashdata('message', 'Wrong Attempt!');
				redirect('admin/shuttle-service-registration/list', 'refresh');
			}

			$data['client_list'] 			= $this->db->select('id, name')->get('tbl_clients')->result();
			$data['shuttle_type_list'] 		= $this->db->select('id, name')->get('tbl_shuttle_type')->result();
			$data['shuttle_station_list'] 	= $this->db->select('id, name')->get('tbl_shuttle_service_stations')->result();

			$data['title']					= 'Shuttle Registration Edit';
			$data['activeMenu'] 			= 'shuttle_registration_edit';
			$data['page'] 					= 'backEnd/admin/shuttle_registration_edit';

		}elseif($param1 == 'delete' && $param2 > 0) {
			
			if ($this->AdminModel->delete_shuttle_registration($param2)) {
	
				$this->session->set_flashdata('message', 'Shuttle Service Registration Deleted Successfully!');
				redirect('admin/shuttle-service-registration/list', 'refresh');
	
			}else {
	
				$this->session->set_flashdata('message', 'Shuttle Service Registration Deleted Failed!');
				redirect('admin/shuttle-service-registration/list', 'refresh');
			}
				
		}else{

			$this->session->set_flashdata('message', 'Wrong Attempt!');
			redirect('admin/shuttle-service-registration/list', 'refresh');

		}

		$data['type_list'] = $this->db->select('id, name, priority, insert_time')->order_by('priority', 'asc')->get('tbl_shuttle_type')->result();
		$this->load->view('backEnd/master_page', $data);

    }


	//Mga Service Type
	public function mga_service_type($param1 = '', $param2 = '', $param3 = '')
	{

		if($param1 == 'add'){

			$insert_mga_type['name']        	= $this->input->post('name', true);
			$insert_mga_type['priority']        = $this->input->post('priority', true);
 			$insert_mga_type['insert_by']       = $_SESSION['userid'];
 			$insert_mga_type['insert_time']     = date('Y-m-d H:i');

			$this->db->insert('tbl_mga_service_type', $insert_mga_type);

			$redirect_action = 'admin/mga-service-registration/add';
			redirect($redirect_action."?modal=show", 'refresh');

			
		}

		if ($param1 == 'edit') {

			$edit_id     = $this->input->post('id', true);
			$checking_id = $this->db->get_where('tbl_mga_service_type',array('id'=>$edit_id));

			if ($checking_id->num_rows() > 0) {

				$name 		= $this->input->post('name', true);
				$priority 	= $this->input->post('priority', true);
				

				$this->db->where('id', $edit_id)->update('tbl_mga_service_type',array('name'=>$name, 'priority'=>$priority));
				$redirect_action = 'admin/mga-service-registration/add';
				redirect($redirect_action."?modal=show", 'refresh');

			}
		}
		if($param1 == 'delete' && $param2 > 0){
			
			$this->db->where('id', $param2)->delete('tbl_mga_service_type');
			$redirect_action = 'admin/mga-service-registration/add';
			redirect($redirect_action."?modal=show", 'refresh');
		}
	}
	

	//Shuttle Type
	public function shuttle_type($param1 = '', $param2 = '', $param3 = '')
	{

		if($param1 == 'add'){

			$insert_shuttle_type['name']        	= $this->input->post('name', true);
			$insert_shuttle_type['priority']        = $this->input->post('priority', true);
 			$insert_shuttle_type['insert_by']    	= $_SESSION['userid'];
 			$insert_shuttle_type['insert_time']     = date('Y-m-d H:i');

			$this->db->insert('tbl_shuttle_type', $insert_shuttle_type);

			$redirect_action = 'admin/shuttle-service-registration/add';
			redirect($redirect_action."?modal=show", 'refresh');

		}

		if ($param1 == 'edit') {

			$edit_id     = $this->input->post('id', true);
			$checking_id = $this->db->get_where('tbl_shuttle_type',array('id'=>$edit_id));

			if ($checking_id->num_rows() > 0) {

				$name 		= $this->input->post('name', true);
				$priority 	= $this->input->post('priority', true);
				

				$this->db->where('id', $edit_id)->update('tbl_shuttle_type',array('name'=>$name, 'priority'=>$priority));
				$redirect_action = 'admin/shuttle-service-registration/add';
				redirect($redirect_action."?modal=show", 'refresh');

			}
		}
		if($param1 == 'delete' && $param2 > 0){
			
			$this->db->where('id', $param2)->delete('tbl_shuttle_type');
			$redirect_action = 'admin/shuttle-service-registration/add';
			redirect($redirect_action."?modal=show", 'refresh');
		}
	}

	//Lounge Type
	public function lounge_type($param1 = '', $param2 = '', $param3 = '')
	{
		if($param1 == 'add'){

			$insert_lounge_type['name']        	= $this->input->post('name', true);
			$insert_lounge_type['priority']     = $this->input->post('priority', true);
 			$insert_lounge_type['insert_by']    = $_SESSION['userid'];
 			$insert_lounge_type['insert_time']  = date('Y-m-d H:i');

			$this->db->insert('tbl_lounge_type', $insert_lounge_type);

			$redirect_action = 'admin/lounge-service-registration/add';
			redirect($redirect_action."?modal=show", 'refresh');
			
		}

		if ($param1 == 'edit') {

			$edit_id     = $this->input->post('id', true);
			$checking_id = $this->db->get_where('tbl_lounge_type',array('id'=>$edit_id));

			if ($checking_id->num_rows() > 0) {

				$name 		= $this->input->post('name', true);
				$priority 	= $this->input->post('priority', true);
				

				$this->db->where('id', $edit_id)->update('tbl_lounge_type',array('name'=>$name, 'priority'=>$priority));
				$redirect_action = 'admin/lounge-service-registration/add';
				redirect($redirect_action."?modal=show", 'refresh');

			}
		}
		if($param1 == 'delete' && $param2 > 0){
			
			$this->db->where('id', $param2)->delete('tbl_lounge_type');
			$redirect_action = 'admin/lounge-service-registration/add';
			redirect($redirect_action."?modal=show", 'refresh');
		}
	}

	//Airmail Service Station
	public function airmail_service_station($param1 = '', $param2 = '', $param3 = '') 
	{
		if($param1 == 'add'){

			if ($_SERVER['REQUEST_METHOD'] == 'POST') {

				$insert_airmail_station['airmail_service_type_id']   = $this->input->post('airmail_srvice_type_id', true);
				$insert_airmail_station['name']  					 = $this->input->post('name', true);
				$insert_airmail_station['priority']  				 = $this->input->post('priority', true);
				$insert_airmail_station['insert_by']       			 = $_SESSION['userid'];
				$insert_airmail_station['insert_time']     			 = date('Y-m-d H:i');

				$add_airmail_station = $this->db->insert('tbl_airmail_service_stations', $insert_airmail_station);

					if ($add_airmail_station) {

						$this->session->set_flashdata('message', 'Airmail Service Station Added Successfully!');
						redirect('admin/airmail-service-station/list', 'refresh');

					} else {

					$this->session->set_flashdata('message', 'Airmail Service Station Add Failed!');
						redirect('admin/airmail-service-station/list', 'refresh');
					}

				
			}
			$data['airmail_type_list'] 	= $this->db->select('id, name')->get('tbl_airmail_service_type')->result();
			$data['title']      		= 'Airmail Service Station Add';
			$data['page']       		= 'backEnd/admin/airmail_station_add';
			$data['activeMenu'] 		= 'airmail_station_add';

		}elseif($param1 == 'list'){
			
			$data['airmail_station_list']  = $this->AdminModel->get_airmail_station_list($param2);

			$data['airmail_type_list'] 	   = $this->db->select('id, name')->get('tbl_airmail_service_type')->result();
			$data['title']      		   = 'Airmail Service Station List ';
			$data['page']       		   = 'backEnd/admin/airmail_station_list';
			$data['activeMenu'] 		   = 'airmail_station_list';
		
		}elseif($param1 == 'edit' && $param2 > 0){

			if ($_SERVER['REQUEST_METHOD'] == 'POST') {

				$update_airmail_station['airmail_service_type_id']	= $this->input->post('airmail_service_type_id', true);
				$update_airmail_station['name']					    = $this->input->post('name', true);
				$update_airmail_station['priority']					= $this->input->post('priority', true);
				

				if ($this->AdminModel->update_airmail_station($update_airmail_station, $param2)) {
	
					$this->session->set_flashdata('message', 'Airmail Service Station Updated Successfully!');
					redirect('admin/airmail-service-station/list', 'refresh');
	
				} else {
	
					$this->session->set_flashdata('message', 'Airmail Service Station Updated Failed!');
					redirect('admin/airmail-service-station/list', 'refresh');
				}
			}

			$data['edit_info']   	= $this->db->select('id, airmail_service_type_id, name, priority')->get_where('tbl_airmail_service_stations',array('id'=>$param2));

			if ($data['edit_info']->num_rows() > 0) {

				$data['edit_info']	= $data['edit_info']->row();

			} else {

				$this->session->set_flashdata('message', 'Wrong Attempt!');
				redirect('admin/airmail-service-station/list', 'refresh');
			}

			$data['airmail_type_list'] 	= $this->db->select('id, name')->get('tbl_airmail_service_type')->result();

			$data['title']				= 'Airmail Service Station Edit';
			$data['activeMenu'] 		= 'airmail_station_edit';
			$data['page'] 				= 'backEnd/admin/airmail_station_edit';

		}elseif($param1 == 'delete' && $param2 > 0) {
			
			if ($this->AdminModel->delete_airmail_station($param2)) {

				$this->session->set_flashdata('message', 'Airmail Service Station Deleted Successfully!');
				redirect('admin/airmail-service-station/list', 'refresh');

			} else {

			$this->session->set_flashdata('message', 'Airmail Service Station Deleted Failed!');
				redirect('admin/airmail-service-station/list', 'refresh');
			}
			
		}
		else {

			$this->session->set_flashdata('message', 'Wrong Attempt!');
			redirect('admin/airmail-service-station/list', 'refresh');
		}

		$this->load->view('backEnd/master_page', $data);
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
				$insert_invoice['agent_id']  						= $this->input->post('agent_id', true);
				$insert_invoice['approve_status']  					= 0;
				$insert_invoice['approved_by']  					= 0;
				$insert_invoice['insert_time']  					= $insert_airmail_registration['insert_time'];
				$insert_invoice['invoice_date']  					= date('Y-m-d');
 
 
				$invoice = $this->db->insert('tbl_invoice', $insert_invoice);
 
 
				$add_airmail_registration = $this->db->insert('tbl_airmail_service_registration', $insert_airmail_registration);
 
				if ($add_airmail_registration) {
 
					$this->session->set_flashdata('message', 'Airamil Service Registration Added Successfully!');
					redirect('admin/airmail-service-registration/list', 'refresh');
 
				} else {
 
					$this->session->set_flashdata('message', 'Airamil Registration Add Failed!');
					redirect('admin/airmail-service-registration/list', 'refresh');
				}
 
				 
			}
			
			$data['agent_list'] 			= $this->db->select('id, firstname')->where('userType', 'agent')->get('user')->result();
 
			$data['title']      			= 'Airamil Registration Add';
			$data['page']       			= 'backEnd/admin/airmail_registration_add';
			$data['activeMenu'] 			= 'airmail_registration_add';
 
		}elseif($param1 == 'list'){
			 
			 
			$data['airmail_registration_list']  = $this->AdminModel->get_airmail_registration_list($param2);
			 
			$data['airmail_type_list'] 			= $this->db->select('id, name')->get('tbl_airmail_service_type')->result();
			$data['title']      				= 'Airamil Service Registration List ';
			$data['page']       				= 'backEnd/admin/airmail_registration_list';
			$data['activeMenu'] 				= 'airmail_registration_list';
		 
		}elseif($param1 == 'invoice' && $param2 > 0){
 
			$airmail_service = $this->db->select('id, client_id')->get_where('tbl_airmail_service_registration',array('id'=>$param2))->row();
			$client_id = $airmail_service->client_id;
 
			$data['client_details']   			= $this->db->select('id, name, phone_number, email, passport_number')->get_where('tbl_clients',array('id'=>$client_id))->row();
			$data['invoice_list']  				= $this->AdminModel->get_airmail_invoice_list($param2);
 
			$data['title']						= 'Airmail Registration Invoice';
			$data['activeMenu'] 				= 'airmail_registration_invoice';
			$data['page'] 						= 'backEnd/admin/airmail_registration_invoice';
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
				 
 
				if ($this->AdminModel->update_airmail_registration($update_airmail_registration, $param2)) {
	 
					$this->session->set_flashdata('message', 'Airmail Service Registration Updated Successfully!');
					redirect('admin/airmail-service-registration/list', 'refresh');
	 
				} else {
	 
					$this->session->set_flashdata('message', 'Airmail Service Registration Updated Failed!');
					redirect('admin/airmail-service-registration/list', 'refresh');
				}
			}
 
			 $data['edit_info']   	= $this->db->select('id, train_or_flight_no, received_from, drop_to, product_details, delivery_details, received_date, remark, client_id, service_type_id, service_station_id, approve_status')->where(array('id'=>$param2))->where(array('insert_by'=>$_SESSION['userid']))->get('tbl_airmail_service_registration');
 
			 if ($data['edit_info']->num_rows() > 0) {
 
				$data['edit_info']	= $data['edit_info']->row();
 
			} else {
 
				$this->session->set_flashdata('message', 'Wrong Attempt!');
				redirect('admin/airmail-service-registration/list', 'refresh');
			}
 
			$data['client_list'] 			= $this->db->select('id, name')->get('tbl_clients')->result();
			$data['airmail_type_list'] 		= $this->db->select('id, name')->get('tbl_airmail_service_type')->result();
			$data['airmail_station_list'] 	= $this->db->select('id, name')->get('tbl_airmail_service_stations')->result();

			$data['title']					= 'Airmail Registration Edit';
			$data['activeMenu'] 			= 'airmail_registration_edit';
			$data['page'] 					= 'backEnd/admin/airmail_registration_edit';
 
		}elseif($param1 == 'delete' && $param2 > 0) {
			 
			if ($this->AdmintModel->delete_airmail_registration($param2)) {
	
				$this->session->set_flashdata('message', 'Airmail Service Registration Deleted Successfully!');
				redirect('admin/airmail-service-registration/list', 'refresh');

				} else {

				$this->session->set_flashdata('message', 'Airmail Service Registration Deleted Failed!');
				redirect('admin/airmail-service-registration/list', 'refresh');
			}
			 
		}else {
 
			$this->session->set_flashdata('message', 'Wrong Attempt!');
			redirect('admin/airmail-service-registration/list', 'refresh');
 
		}
 
		
		$this->load->view('backEnd/master_page', $data);
 
	}


	//Airmail Type
	public function airmail_type($param1 = '', $param2 = '', $param3 = '')
	{

		if($param1 == 'add'){

			$insert_airmail_type['name']         = $this->input->post('name', true);
			$insert_airmail_type['priority']     = $this->input->post('priority', true);
 			$insert_airmail_type['insert_by']    = $_SESSION['userid'];
 			$insert_airmail_type['insert_time']  = date('Y-m-d H:i');

			$this->db->insert('tbl_airmail_service_type', $insert_airmail_type);

			$redirect_action = 'admin/airmail-service-registration/add';
			redirect($redirect_action."?modal=show", 'refresh');

			
		}

		if ($param1 == 'edit') {

			$edit_id     = $this->input->post('id', true);
			$checking_id = $this->db->get_where('tbl_airmail_service_type',array('id'=>$edit_id));

			if ($checking_id->num_rows() > 0) {

				$name 		= $this->input->post('name', true);
				$priority 	= $this->input->post('priority', true);
				
				$this->db->where('id', $edit_id)->update('tbl_airmail_service_type',array('name'=>$name, 'priority'=>$priority));
				$redirect_action = 'admin/airmail-service-registration/add';
				redirect($redirect_action."?modal=show", 'refresh');

			}
		}
		if($param1 == 'delete' && $param2 > 0){
			
			$this->db->where('id', $param2)->delete('tbl_airmail_service_type');
			$redirect_action = 'admin/airmail-service-registration/add';
			redirect($redirect_action."?modal=show", 'refresh');
		}
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
				$insert_invoice['agent_id']  						= $this->input->post('agent_id', true);
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
					redirect('admin/invoice/list', 'refresh');

				} else {

				$this->session->set_flashdata('message', 'Invoice Add Failed!');
					redirect('admin/invoice/list', 'refresh');
				}
				//Insert Invoice end

			}
			
			$data['agent_list'] 		= $this->db->select('id, firstname')->where('userType', 'agent')->get('user')->result();

			$data['title']      		= 'Invoice Add';
			$data['page']       		= 'backEnd/admin/invoice_add';
			$data['activeMenu'] 		= 'invoice_add';

		}elseif($param1 == 'list'){
			
			
			$data['invoice_list']  		= $this->AdminModel->get_invoice_list();

			$data['title']      		= 'Invoice List';
			$data['page']       		= 'backEnd/admin/invoice_list';
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

				$data['invoice_view_mga']  		= $this->AdminModel->get_mga_invoice_row($invoice_number);
				$data['invoice_view_lounge']  	= $this->AdminModel->get_lounge_invoice_row($invoice_number);
				$data['invoice_view_shuttle']  	= $this->AdminModel->get_shuttle_invoice_row($invoice_number);
				$data['invoice_view_airmail']  	= $this->AdminModel->get_airmail_invoice_row($invoice_number);
			
			} else {

				$this->session->set_flashdata('message', 'Wrong Attempt!');
				redirect('admin/invoice/list', 'refresh');
			}
			
			$data['title']					= 'Invoice View';
			$data['activeMenu'] 			= 'invoice_view';
			$data['page'] 					= 'backEnd/admin/invoice_view';

		}elseif($param1 == 'delete' && $param2 > 0) {

			if ($this->AdminModel->delete_invoice_by_invoice_number($param2)) {
	
				$this->session->set_flashdata('message', 'Invoice Deleted Successfully!');
				redirect('admin/invoice/list', 'refresh');

			} else {

				$this->session->set_flashdata('message', 'Invoice Deleted Failed!');
				redirect('admin/invoice/list', 'refresh');
			}
				
		}
		else {

			$this->session->set_flashdata('message', 'Wrong Attempt!');
			redirect('admin/invoice/list', 'refresh');

		}

		$this->load->view('backEnd/master_page', $data);

	}

	//Invoice Active Status
	public function invoice_status($id, $setvalue) {

		$this->db->where('id', $id);
		$this->db->update('tbl_invoice', array('approve_status' => $setvalue));
		$this->session->set_flashdata('message', 'Data Saved Successfully.');
		redirect('admin/invoice/list', 'refresh');
	}

	//Seles Report
	public function seles_report($param1 = '', $param2 = '', $param3 = '') 
	{
		if($param1 == 'add'){

			if ($_SERVER['REQUEST_METHOD'] == 'POST') {

				
			}
			
			$data['title']      		= 'Invoice Add';
			$data['page']       		= 'backEnd/admin/invoice_add';
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
			$data['page']       		= 'backEnd/admin/seles_report';
			$data['activeMenu'] 		= 'seles_report';
		
		}elseif($param1 == 'delete' && $param2 > 0) {
			
			
				
		}
		else {

			$this->session->set_flashdata('message', 'Wrong Attempt!');
			redirect('admin/seles-report/list', 'refresh');

		}

		$this->load->view('backEnd/master_page', $data);

	}

}
