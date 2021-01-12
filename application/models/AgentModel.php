<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php
	class AgentModel extends CI_Model{
		
	// $returnmessage can be num_rows, result_array, result
		public function isRowExist($tableName,$data, $returnmessage, $user_id = NULL){
		
			$this->db->where($data);
			if($user_id !== NULL) {
				$this->db->where('userId',$user_id);
			}
			if($returnmessage == 'num_rows'){
				return $this->db->get($tableName)->num_rows();
			}else if($returnmessage == 'result_array'){
				return $this->db->get($tableName)->result_array();
			}else{
				return $this->db->get($tableName)->result();
			}
		}
			// saveDataInTable table name , array, and return type is null or last inserted ID.
		public function saveDataInTable($tableName, $data, $returnInsertId = 'false'){
		
			$this->db->insert($tableName,$data);
			if($returnInsertId == 'true'){
				return $this->db->insert_id();
			}else{
				return -1;
			}
		}
			
		public function check_campaign_ambigus($start_date, $end_date){
					
				if(date_format(date_create($start_date),"Y-m-d") > date_format(date_create($end_date),"Y-m-d")){
					return -2;
				}
		
				$this -> db -> limit(1);
				$this -> db -> where('end_date >=', $start_date);
				$this -> db -> where('available_status', 1);
				$query = $this->db->get('create_campaign')->num_rows();
				if($query > 0){
					return -1;
				}
				return 1;
		}
		
		public function end_date_extends($end_date, $id){
		
			$this -> db -> limit(1);
			$this -> db -> where('start_date >=', $end_date);
			$this -> db -> where('id', $id);
			$this -> db -> where('available_status', 1);
			$query = $this->db->get('create_campaign')->num_rows();
			if($query > 0){
				return -1;
			}
			$this -> db -> limit(1);
			$this -> db -> where('end_date >=', $end_date);
			$this -> db -> where('id !=', $id);
			$this -> db -> where('available_status', 1);
			$query2 = $this->db->get('create_campaign')->num_rows();
			if($query2 > 0){
				return -1;
			}
			return 1;
		}
		public function fetch_data_pageination($limit, $start, $table, $search=NULL, $approveStatus=NULL, $user_id =NULL) {
				
			$this->db->limit($limit, $start);

			if($approveStatus!==NULL ){
				$this->db->where('approveStatus',$approveStatus);
			}

			if($user_id !== NULL ){
				$this->db->where('userId', $user_id);
			}

			if($search !== NULL){
				$this->db->like('title',$search);
				$this->db->or_like('body',$search);
				$this->db->or_like('date',$search);
			}

			$this->db->order_by('date','desc');
			$query = $this->db->get($table);

			if ($query->num_rows() > 0) {
				foreach ($query->result_array() as $row) {
					$data[] = $row;
				}
				return $data;
			}
			return false;
		}
		public function fetch_images($limit=18, $start=0, $table, $search=NULL,$where_data=NULL) {
				
			$this->db->limit($limit, $start);

			if($search !== NULL){
				$this->db->like('date',$search);
				$this->db->or_like('photoCaption',$search);
			}
			if($where_data !== NULL){
				$this->db->where($where_data);
			}
			$this->db->group_by('photo');
			$this->db->order_by('date','desc');
			$query = $this->db->get($table);

			if ($query->num_rows() > 0) {
				foreach ($query->result_array() as $row) {
					$data[] = $row;
				}
				return $data;
			}
			return false;
		}
		
		public function usersCategory($userId){
	
			$this->db->select('category.*');
			$this->db->join('category' , 'category_user.categoryId = category.id', 'left');
			$this->db->where('category_user.userId',$userId);
			return $this->db->get('category_user')->result_array();
		}
		
		
		public function get_user($user_id)
		{
			$query = $this->db->select('user.*,tbl_upozilla.*')
			->where('user.id',$user_id)
			->from('user')
			->join('tbl_upozilla','user.address = tbl_upozilla.id', 'left')
			->get();
	
			return $query->row();
		}
		
		public function update_pro_info($update_data, $user_id)
		{
			return $this->db->where('id',$user_id)->update('user',$update_data);
		}

		//Airmail Service Registraton List 
		public function get_airmail_registration_list($param2 = '0')
		{

			$data = array();
			$this->db->select('tbl_airmail_service_registration.id, tbl_airmail_service_registration.train_or_flight_no, tbl_airmail_service_registration.received_from, tbl_airmail_service_registration.drop_to, tbl_airmail_service_registration.product_details, tbl_airmail_service_registration.delivery_details, 
			tbl_airmail_service_registration.received_date, tbl_airmail_service_registration.remark, tbl_airmail_service_registration.invoice_number, tbl_airmail_service_type.name as type_name, tbl_airmail_service_stations.name as station_name, tbl_clients.name as client_name');
			$this->db->join('tbl_airmail_service_type', 'tbl_airmail_service_type.id = tbl_airmail_service_registration.service_type_id', 'left');
			$this->db->join('tbl_airmail_service_stations', 'tbl_airmail_service_stations.id = tbl_airmail_service_registration.service_station_id', 'left');
			$this->db->join('tbl_clients', 'tbl_clients.id = tbl_airmail_service_registration.client_id', 'left');

			$this->db->where('tbl_airmail_service_registration.insert_by', $_SESSION['userid']);

			if($param2 > 0){
				$this->db->where('tbl_airmail_service_registration.service_type_id', $param2);
			}
			$data = $this->db->get('tbl_airmail_service_registration');
			return $data->result();

		}

		//Airmail Service Invoice List 
		public function get_airmail_invoice_list($param2 = '0')
		{
			$airmail_service = $this->db->select('id, client_id')->get_where('tbl_airmail_service_registration', array('id'=>$param2))->row();
			$client_id = $airmail_service->client_id;
			// echo $client_id;
			// exit();
			$data = array();
			$this->db->select('tbl_airmail_service_registration.id, tbl_airmail_service_registration.train_or_flight_no, tbl_airmail_service_registration.received_from, 
			tbl_airmail_service_registration.drop_to, tbl_airmail_service_registration.received_date, tbl_airmail_service_type.name as type_name, tbl_airmail_service_stations.name as station_name ');
			$this->db->join('tbl_airmail_service_type', 'tbl_airmail_service_type.id = tbl_airmail_service_registration.service_type_id', 'left');
			$this->db->join('tbl_airmail_service_stations', 'tbl_airmail_service_stations.id = tbl_airmail_service_registration.service_station_id', 'left');

			if($param2 > 0){
			$this->db->where('tbl_airmail_service_registration.client_id', $client_id);
			}
			$data = $this->db->get('tbl_airmail_service_registration');
			return $data->result();

	
		}

		//Airmail Service Registration Update
		public function update_airmail_registration($update_airmail_registration, $param2)
		{
		 
		 return $this->db->where('id',$param2)->update('tbl_airmail_service_registration',$update_airmail_registration);
		}
	
		//Airmail Service Registration Delete
		public function delete_airmail_registration($param2)
		{
			  
			return $this->db->where('id',$param2)->delete('tbl_airmail_service_registration'); 
		}


		//Lounge Service Registraton List 
		public function get_lounge_registration_list($param2 = '0')
		{

			$data = array();
			$this->db->select('tbl_lounge_service_registration.id, tbl_lounge_service_registration.train_or_flight_no, tbl_lounge_service_registration.service_start_time, 
			tbl_lounge_service_registration.journey_date, tbl_lounge_service_registration.landing_time, tbl_lounge_service_registration.invoice_number, tbl_lounge_type.name as type_name, tbl_lounge_service_stations.name as station_name, tbl_clients.name as client_name');
			$this->db->join('tbl_lounge_type', 'tbl_lounge_type.id = tbl_lounge_service_registration.service_type_id', 'left');
			$this->db->join('tbl_lounge_service_stations', 'tbl_lounge_service_stations.id = tbl_lounge_service_registration.service_station_id', 'left');
			$this->db->join('tbl_clients', 'tbl_clients.id = tbl_lounge_service_registration.client_id', 'left');

			$this->db->where('tbl_lounge_service_registration.insert_by', $_SESSION['userid']);

			if($param2 > 0){
				$this->db->where('tbl_lounge_service_registration.service_type_id', $param2);
			}
			$data = $this->db->get('tbl_lounge_service_registration');
			return $data->result();

	
		}

		//Lounge Service Invoice List 
		public function get_lounge_invoice_list($param2 = '0')
		{
			$lounge_service = $this->db->select('id, client_id')->get_where('tbl_lounge_service_registration', array('id'=>$param2))->row();
			$client_id = $lounge_service->client_id;
			// echo $client_id;
			// exit();
			$data = array();
			$this->db->select('tbl_lounge_service_registration.id, tbl_lounge_service_registration.train_or_flight_no, tbl_lounge_service_registration.service_start_time, 
			tbl_lounge_service_registration.journey_date, tbl_lounge_service_registration.landing_time, tbl_lounge_type.name as type_name, tbl_lounge_service_stations.name as station_name ');
			$this->db->join('tbl_lounge_type', 'tbl_lounge_type.id = tbl_lounge_service_registration.service_type_id', 'left');
			$this->db->join('tbl_lounge_service_stations', 'tbl_lounge_service_stations.id = tbl_lounge_service_registration.service_station_id', 'left');

			if($param2 > 0){
			$this->db->where('tbl_lounge_service_registration.client_id', $client_id);
			}
			$data = $this->db->get('tbl_lounge_service_registration');
			return $data->result();

	
		}

		//Lounge Service Registration Update
		public function update_lounge_registration($update_lounge_registration, $param2)
		{
		 
		 return $this->db->where('id',$param2)->update('tbl_lounge_service_registration',$update_lounge_registration);
		}
	
		//Lounge Service Registration Delete
		public function delete_lounge_registration($param2)
		{
			  
			return $this->db->where('id',$param2)->delete('tbl_lounge_service_registration'); 
		}

		//Mga Service Registraton List 
		public function get_service_registration_list($param2 = '0')
		{

			$data = array();
			$this->db->select('tbl_mga_service_registration.id, tbl_mga_service_registration.train_or_flight_no, tbl_mga_service_registration.start_time, 
			tbl_mga_service_registration.journey_date, tbl_mga_service_registration.landing_time, tbl_mga_service_registration.invoice_number, tbl_mga_service_type.name as type_name, tbl_mga_service_stations.name as station_name, tbl_clients.name as client_name');
			$this->db->join('tbl_mga_service_type', 'tbl_mga_service_type.id = tbl_mga_service_registration.service_type_id', 'left');
			$this->db->join('tbl_mga_service_stations', 'tbl_mga_service_stations.id = tbl_mga_service_registration.service_station_id', 'left');
			$this->db->join('tbl_clients', 'tbl_clients.id = tbl_mga_service_registration.client_id', 'left');

			$this->db->where('tbl_mga_service_registration.insert_by', $_SESSION['userid']);

			if($param2 > 0){
				$this->db->where('tbl_mga_service_registration.service_type_id', $param2);
			}

			$data = $this->db->get('tbl_mga_service_registration');
			return $data->result();

	
		}

		//Mga Service Invoice List 
		public function get_mga_invoice_list($param2 = '0')
		{
			$mga_service = $this->db->select('id, client_id')->get_where('tbl_mga_service_registration', array('id'=>$param2))->row();
			$client_id = $mga_service->client_id;

			$data = array();
			$this->db->select('tbl_mga_service_registration.id, tbl_mga_service_registration.train_or_flight_no, tbl_mga_service_registration.start_time, 
			tbl_mga_service_registration.journey_date, tbl_mga_service_registration.landing_time, tbl_mga_service_type.name as type_name, tbl_mga_service_stations.name as station_name ');
			$this->db->join('tbl_mga_service_type', 'tbl_mga_service_type.id = tbl_mga_service_registration.service_type_id', 'left');
			$this->db->join('tbl_mga_service_stations', 'tbl_mga_service_stations.id = tbl_mga_service_registration.service_station_id', 'left');

			if($param2 > 0){
			$this->db->where('tbl_mga_service_registration.client_id', $client_id);
			}
			$data = $this->db->get('tbl_mga_service_registration');
			return $data->result();
		}

		//Mga Service Registration Update
		public function update_service_registration($update_service_registration, $param2)
		{
		 
		 return $this->db->where('id',$param2)->update('tbl_mga_service_registration',$update_service_registration);
		}
	
		//Mga Service Registration Delete
		public function delete_service_registration($param2)
		{
			  
			return $this->db->where('id',$param2)->delete('tbl_mga_service_registration'); 
		}

		//Shuttle Service Registraton List 
		public function get_shuttle_registration_list($param2 = '0')
		{

			$data = array();
			$this->db->select('tbl_shuttle_service_registration.id,  tbl_shuttle_service_registration.start_from, 
			tbl_shuttle_service_registration.travel_date, tbl_shuttle_service_registration.end_to,tbl_shuttle_service_registration.invoice_number, tbl_shuttle_type.name as type_name, tbl_shuttle_service_stations.name as station_name, tbl_clients.name as client_name');
			$this->db->join('tbl_shuttle_type', 'tbl_shuttle_type.id = tbl_shuttle_service_registration.service_type_id', 'left');
			$this->db->join('tbl_shuttle_service_stations', 'tbl_shuttle_service_stations.id = tbl_shuttle_service_registration.service_station_id', 'left');
			$this->db->join('tbl_clients', 'tbl_clients.id = tbl_shuttle_service_registration.client_id', 'left');

			$this->db->where('tbl_shuttle_service_registration.insert_by', $_SESSION['userid']);

			if($param2 > 0){
				$this->db->where('tbl_shuttle_service_registration.service_type_id', $param2);
			}
			$data = $this->db->get('tbl_shuttle_service_registration');
			return $data->result();

	
		}

		//Shuttle Service Invoice List 
		public function get_shuttle_invoice_list($param2 = '0')
		{
			$shuttle_service = $this->db->select('id, client_id')->get_where('tbl_shuttle_service_registration', array('id'=>$param2))->row();
			$client_id = $shuttle_service->client_id;
			// echo $client_id;
			// exit();
			$data = array();
			$this->db->select('tbl_shuttle_service_registration.id, tbl_shuttle_service_registration.airlines_id, tbl_shuttle_service_registration.start_from, 
			tbl_shuttle_service_registration.travel_date, tbl_shuttle_service_registration.end_to, tbl_shuttle_type.name as type_name, tbl_shuttle_service_stations.name as station_name ');
			$this->db->join('tbl_shuttle_type', 'tbl_shuttle_type.id = tbl_shuttle_service_registration.service_type_id', 'left');
			$this->db->join('tbl_shuttle_service_stations', 'tbl_shuttle_service_stations.id = tbl_shuttle_service_registration.service_station_id', 'left');

			if($param2 > 0){
			$this->db->where('tbl_shuttle_service_registration.client_id', $client_id);
			}
			$data = $this->db->get('tbl_shuttle_service_registration');
			return $data->result();

	
		}

		//Shuttle Service Registration Update
		public function update_shuttle_registration($update_shuttle_registration, $param2)
		{
		 
		 return $this->db->where('id',$param2)->update('tbl_shuttle_service_registration',$update_shuttle_registration);
		}
	
		//Shuttle Service Registration Delete
		public function delete_shuttle_registration($param2)
		{
			  
			return $this->db->where('id',$param2)->delete('tbl_shuttle_service_registration'); 
		}

		//Client Update
		public function update_client($delete_client, $param2)
		{
		 
		 return $this->db->where('id',$param2)->update('tbl_clients',$delete_client);
		}
	
		//Client Delete
		public function delete_client($param2)
		{
			  
			return $this->db->where('id',$param2)->delete('tbl_clients'); 
		}

		//Invoice List
		public function get_invoice_list()
		{
			$this->db->select('tbl_invoice.id, tbl_invoice.invoice_number, tbl_invoice.total_bill, tbl_invoice.discount,tbl_invoice.payable_amount, tbl_invoice.remarks, tbl_invoice.agent_id, tbl_invoice.approve_status, tbl_clients.name as client_name');
			$this->db->join('tbl_clients', 'tbl_clients.id = tbl_invoice.client_id', 'left');
			
			$this->db->where('tbl_invoice.agent_id', $_SESSION['userid']);

			$data   = $this->db->get('tbl_invoice');
			return $data->result();

		}
	
		//Airmail Invoice Row
		public function get_airmail_invoice_row($invoice_number)
		{
			$data = array();
			$this->db->select('tbl_airmail_service_registration.id, tbl_airmail_service_registration.received_from, 
			tbl_airmail_service_registration.drop_to, tbl_airmail_service_registration.received_date, 
			tbl_airmail_service_registration.total_bill, tbl_airmail_service_registration.invoice_number, tbl_airmail_service_type.name as type_name, 
			tbl_airmail_service_stations.name as stations_name');

			$this->db->join('tbl_airmail_service_type', 'tbl_airmail_service_type.id = tbl_airmail_service_registration.service_type_id', 'left');
			$this->db->join('tbl_airmail_service_stations', 'tbl_airmail_service_stations.id = tbl_airmail_service_registration.service_station_id', 'left');

			$this->db->where('tbl_airmail_service_registration.invoice_number', $invoice_number);

			$data   = $this->db->get('tbl_airmail_service_registration');
			if($data->num_rows() > 0){
				return $data->row();

			}
			else {
				return false;
			}

		}

		//Lounge Invoice Row
		public function get_lounge_invoice_row($invoice_number)
		{
			$data = array();
			$this->db->select('tbl_lounge_service_registration.id, tbl_lounge_service_registration.service_start_time, 
			tbl_lounge_service_registration.landing_time, tbl_lounge_service_registration.journey_date, 
			tbl_lounge_service_registration.total_bill, tbl_lounge_service_registration.invoice_number, tbl_lounge_type.name as type_name, tbl_lounge_service_stations.name as stations_name');

			$this->db->join('tbl_lounge_type', 'tbl_lounge_type.id = tbl_lounge_service_registration.service_type_id', 'left');
			$this->db->join('tbl_lounge_service_stations', 'tbl_lounge_service_stations.id = tbl_lounge_service_registration.service_station_id', 'left');

			$this->db->where('tbl_lounge_service_registration.invoice_number', $invoice_number);

			$data   = $this->db->get('tbl_lounge_service_registration');
			if($data->num_rows() > 0){
				return $data->row();

			}
			else {
				return false;
			}

		}

		//Mga Invoice Row
		public function get_mga_invoice_row($invoice_number)
		{
			$data = array();
			$this->db->select('tbl_mga_service_registration.id, tbl_mga_service_registration.start_time, 
			tbl_mga_service_registration.journey_date , tbl_mga_service_registration.landing_time, 
			tbl_mga_service_registration.total_bill, tbl_mga_service_registration.insert_time, tbl_mga_service_registration.invoice_number, tbl_mga_service_type.name as type_name, 
			tbl_mga_service_stations.name as stations_name');		
			$this->db->join('tbl_mga_service_type', 'tbl_mga_service_type.id = tbl_mga_service_registration.service_type_id', 'left');
			$this->db->join('tbl_mga_service_stations', 'tbl_mga_service_stations.id = tbl_mga_service_registration.service_station_id', 'left');

			$this->db->where('tbl_mga_service_registration.invoice_number', $invoice_number);

			$data   = $this->db->get('tbl_mga_service_registration');
			if($data->num_rows() > 0){
				return $data->row();

			}
			else {
				return false;
			}

		}

		//Shuttle Invoice Row
		public function get_shuttle_invoice_row($invoice_number)
		{
			$data = array();
			$this->db->select('tbl_shuttle_service_registration.id, tbl_shuttle_service_registration.start_from, 
			tbl_shuttle_service_registration.end_to, tbl_shuttle_service_registration.travel_date, 
			tbl_shuttle_service_registration.total_bill, tbl_shuttle_service_registration.invoice_number, tbl_shuttle_type.name as type_name, 
			tbl_shuttle_service_stations.name as stations_name');

			$this->db->join('tbl_shuttle_type', 'tbl_shuttle_type.id = tbl_shuttle_service_registration.service_type_id', 'left');
			$this->db->join('tbl_shuttle_service_stations', 'tbl_shuttle_service_stations.id = tbl_shuttle_service_registration.service_station_id', 'left');

			$this->db->where('tbl_shuttle_service_registration.invoice_number', $invoice_number);

			$data   = $this->db->get('tbl_shuttle_service_registration');
			if($data->num_rows() > 0){
				return $data->row();

			}
			else {
				return false;
			}

		}

		//Invoice delete By Using Invoice Number 
		public function delete_invoice_by_invoice_number($param2 = 0)
		{
			$dd = $this->db->where('invoice_number', $param2)->get('tbl_invoice');

			if ($dd->num_rows() > 0){
				
				$this->db->where('invoice_number', $param2)->delete('tbl_airmail_service_registration'); 
				$this->db->where('invoice_number', $param2)->delete('tbl_shuttle_service_registration'); 
				$this->db->where('invoice_number', $param2)->delete('tbl_lounge_service_registration'); 
				$this->db->where('invoice_number', $param2)->delete('tbl_mga_service_registration'); 

				$this->db->where('invoice_number', $param2)->delete('tbl_invoice');

				return true;
			}

			return  false;

		}

	}
	
?>

