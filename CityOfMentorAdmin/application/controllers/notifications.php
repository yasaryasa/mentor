<?php
class notifications extends Imlec_Controller {
	public function notifications() {
		parent::__construct ();
	}
	public function index() {
		$page_data ["current_user_id"] = $this->current_user_id;
		$page_data ["current_user_role"] = $this->current_user_role;
		$page_data ["current_user_level"] = $this->current_user_level;
		$page_data ["current_user_language"] = $this->current_user_language;
		
		$count = $this->notification_model->get_entry_count ();
		
		$page_data ["count"] = $count;
		
		$content = $this->load->view ( "notifications/index", $page_data, TRUE );
		$this->create_view ( $content, "" );
	}
	function send() {
		$page_data ["current_user_id"] = $this->current_user_id;
		$page_data ["current_user_role"] = $this->current_user_role;
		$page_data ["current_user_level"] = $this->current_user_level;
		$page_data ["current_user_language"] = $this->current_user_language;
		$not_result = false;
		//if ($this->get_read ( "notifications" )) {
			$devices = $this->notification_model->get_all_devices ();
			// d2c6f39b3bf1dded1070354455555dc2905790ab2f97d457ccf885d1567f0fb9
			if ($devices) {
				
				$this->load->library ( 'apn' );
				$this->apn->payloadMethod = 'enhance'; // you can turn on this method for debuggin purpose
				$this->apn->connectToPush ();
				
				// adding custom variables to the notification
				$this->apn->setData ( array (
						'e' => 'entry_id' 
				) );
				$send_result = false;
				$message = Notif_Message();
				foreach ( $devices as $device ) {
					$send_result = $this->apn->sendMessage ( $device->device_id, $message, /*badge*/ 0, /*sound*/ 'default' );
				}
				
				if ($send_result) {
					log_message ( 'debug', 'Sending successful' );
					
					$db_result = $this->notification_model->set_notified();
					
					$not_result = true;
				} else {
					log_message ( 'error', $this->apn->error );
					$not_result = false;
				}
				$this->apn->disconnectPush ();
			} else {
			}
		//}
		
		$page_data ["not_result"] = $not_result;
		
		$content = $this->load->view ( "notifications/send_result", $page_data, TRUE );
		$this->create_view ( $content, "" );
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

?>