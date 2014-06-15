<?php
class notification_model extends Imlec_Model {
	
	public function save_new_device($info) {
		foreach ( $info as $_key => $_value ) {
			if ($_value == null || $_value == 'null') {
				unset ( $info [$_key] );
			}
		}
		
		try {
			$id = $this->db->insert ( "devices", $info );
			$this->add_log ( "device nesnesi oluşturuldu [ id : " . $this->db->insert_id () . " ]" );
			return true;
		} catch ( Exception $e ) {
			return null;
		}
	}
	
	public function update_device($info) {
		foreach ( $info as $_key => $_value ) {
			if ($_value == null || $_value == 'null') {
				unset ( $info [$_key] );
			}
		}
		
		$this->db->where ( "device_id", $info ["device_id"] );
		$result = $this->db->update ( "devices", $info );
		$this->add_log ( "device nesnesi güncellendi [ id : " . $info ["device_id"] . " ]" );
		return $result;
	}
	
	public function get_device_by_device_id($device_id) {
		$this->db->select ( "devices.id, devices.device_id, devices.last_update" )->from ( "devices" );
		$this->db->where ( "devices.device_id", $device_id );
		return $this->db->get ()->row ();
	}
	
	public function get_all_devices() {
		$this->db->select ( "devices.id, devices.device_id, devices.last_update" )->from ( "devices" );
		return $this->db->get ()->result();
	}
	
	public function set_notified() {
		return $this->db->query('update entries e set e.notified = 1 where e.notified = 0');
	}
	public function get_entry_count() {
		$this->db->where ('notified','0');
		$this->db->from ( "entries" );
		return $this->db->count_all_results();
	}
}