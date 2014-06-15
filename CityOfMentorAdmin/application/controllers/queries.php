<?php
// This can be removed if you use __autoload() in config.php OR use Modular Extensions
require APPPATH . '/libraries/REST_Controller.php';
class queries extends REST_Controller {
	
	public function  report_post() {
	
		//print_r($_POST);
	
		$imagename = trim(strip_tags($_POST['imagename']));
		
		$this->response ( $imagename, 200 );

// 		$destfile = "../photos/".addslashes($imagename);

// 		if (move_uploaded_file($_FILES['image']['tmp_name'], $destfile))
// 		{
// 			echo "SUCCESS";
// 			exit;
// 		}
// 		echo "FAILURE";
	}
	
	public function entries_by_tag_id_get() {
		$id = $this->get ( 'id' );
		
		// $id = $this->uri->segment ( 4 );
		$data = $this->query_model->getEntriesByTagId ( $id );
		
		if ($data) {
			$this->response ( $data, 200 ); // 200 being the HTTP response code
		} else {
			$this->response ( array (
					'error' => 'Entry with tag id ' . $id . ' not found!' 
			), 404 );
		}
	}
	public function entries_by_tag_key_get() {
		// $key = $this->uri->segment ( 4 );
		$key = $this->get ( 'key' );
		$data = $this->query_model->getEntriesByTagKey ( $key );
		
		if ($data) {
			$this->response ( $data, 200 ); // 200 being the HTTP response code
		} else {
			$this->response ( array (
					'error' => 'No entry found with tag key ' . $key 
			), 404 );
		}
	}
	public function entry_by_id_get() {
		$id = $this->get ( 'id' );
		
		$data = $this->query_model->getEntryById ( $id );
		
		if ($data) {
			$this->response ( $data, 200 ); // 200 being the HTTP response code
		} else {
			$this->response ( array (
					'error' => 'Entry with id ' . $id . ' not found!' 
			), 404 );
		}
	}
	public function newest_entries_get() {
		// newest_entries/from_date/null/format/json
		$from_date = $this->get ( 'from_date' );
		$data = $this->query_model->getNewestEntries ( $from_date );
		
		if ($data) {
			$this->response ( $data, 200 ); // 200 being the HTTP response code
		} else {
			$this->response ( array (
					'error' => 'Entryies with from date ' . $from_date . ' not found!' 
			), 404 );
		}
	}
	public function categories_get() {
		$data = $this->query_model->getAllCategories ();
		if ($data) {
			$this->response ( $data, 200 ); // 200 being the HTTP response code
		} else {
			$this->response ( array (
					'error' => 'No category found!' 
			), 404 );
		}
	}
	public function search_get() {
		$search_key = $this->get ( 'search_key' );
		$cs = $this->get ( 'categories' );
		
		$categories = explode ( ":", $cs );
		if (sizeof ( $categories ) == 1 && $categories [0] == 'null') {
			$categories = null;
		}
		
		$data = $this->query_model->search ( $search_key, $categories );
		if ($data) {
			$this->response ( $data, 200 ); // 200 being the HTTP response code
		} else {
			$this->response ( array (
					'error' => 'Entries with search key ' . $search_key . ' not found!' 
			), 404 );
		}
	}
	public function save_device_token_get() {
		// $device_id = $this->uri->segment ( 3 );
		$device_id = $this->get ( 'device_id' );
		try {
			if (sizeof ( $this->query_model->get_device_by_device_id ( $device_id ) ) == 0) {
				$info ["device_id"] = $device_id;
				$info ["last_update"] = date ( 'Y-m-d H:i:s' );
				$this->query_model->save_new_device ( $info );
			} else {
				$info ["device_id"] = $device_id;
				$info ["last_update"] = date ( 'Y-m-d H:i:s' );
				$this->query_model->update_device ( $info );
			}
			$this->response ( array (
					'success' => 'Device with id ' . $device_id . ' added!' 
			), 200 ); // 200 being the HTTP response code
		} catch ( Exception $e ) {
			$this->add_log ( "device nesnesi eklenirken hata alindi. Detay :" . $e );
			$this->response ( array (
					'error' => 'Device with id ' . $device_id . ' could not be added!' 
			), 404 );
			return false;
		}
	}
	function send_notifications_get() {
		$devices = $this->query_model->get_all_devices ();
		//d2c6f39b3bf1dded1070354455555dc2905790ab2f97d457ccf885d1567f0fb9
		if ($devices) {
			
			$this->load->library ( 'apn' );
			$this->apn->payloadMethod = 'enhance'; // you can turn on this method for debuggin purpose
			$this->apn->connectToPush ();
			
			// adding custom variables to the notification
			$this->apn->setData ( array (
					'e' => 'entry_id' 
			) );
			
			$send_result = $this->apn->sendMessage ( 'd2c6f39b3bf1dded1070354455555dc2905790ab2f97d457ccf885d1567f0fb9', 
					'Test notif #1 (TIME:' . date ( 'H:i:s' ) . ')', /*badge*/ 2, /*sound*/ 'default' );
			
			if ($send_result) {
				log_message ( 'debug', 'Sending successful' );
			} else {
				log_message ( 'error', $this->apn->error );
			}
			$this->apn->disconnectPush ();
		} else {
		}
	}
	
	// designed for retreiving devices, on which app not installed anymore
	public function apn_feedback() {
		$this->load->library ( 'apn' );
		
		$unactive = $this->apn->getFeedbackTokens ();
		
		if (! count ( $unactive )) {
			log_message ( 'info', 'Feedback: No devices found. Stopping.' );
			return false;
		}
		
		foreach ( $unactive as $u ) {
			$devices_tokens [] = $u ['devtoken'];
		}
		
		/*
		 * print_r($unactive) -> Array ( [0] => Array ( [timestamp] => 1340270617 [length] => 32 [devtoken] => 002bdf9985984f0b774e78f256eb6e6c6e5c576d3a0c8f1fd8ef9eb2c4499cb4 ) )
		 */
	}
}
