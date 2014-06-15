<?php
class query_model extends Imlec_Model {
	public function getEntriesByTagId($tag_id) {
		$this->db->select ( 'entries.id, entries.title, entries.posted_date' );
		$this->db->from ( 'categories, category_entries, entries' );
		$this->db->where ( 'categories.id = category_entries.category_id' );
		$this->db->where ( 'categories.id', $tag_id );
		$query = $this->db->get ();
		return $query->result ();
		// $this->output->set_content_type ( 'application/json' )->set_output ( json_encode ( $query->result () ) );
	}
	public function getEntriesByPostedDate($date) {
		$this->db->select ( 'entries.id as entry_id, entries.title' );
		$this->db->from ( 'entries' );
		$this->db->where ( 'entries.posted_date >=', $tag_id );
		$query = $this->db->get ();

		echo json_encode ( $query->result () );
	}
	public function getEntriesByTagKey($tag_key) {
		$this->db->select ( 'entries.id as entry_id, entries.from_date, entries.map_lat, entries.map_long,
				entries.to_date, entries.title, entries.posted_date, (select b.path from blob_images b where b.entry_id = entries.id limit 1) as icon_url' );
		$this->db->from ( 'categories, category_entries, entries' );
		$this->db->where ( 'category_entries.category_id = categories.id' );
		$this->db->where ( 'category_entries.entry_id = entries.id' );
		$this->db->where ( 'categories.category_key', $tag_key );
		// $this->db->join('comments', 'comments.id = blogs.id');
		$query = $this->db->get ();
		$arr = $query->result ();

		for($i = 0; $i < sizeof ( $arr ); $i ++) {
			$map_lat = $arr [$i]->map_lat;
			$map_long = $arr [$i]->map_long;
				
			if (isset($arr [$i]->icon_url)) {
				//liste sayfasi oldugu icin _thumb versiyonu gonderilmeli
				$path_parts = pathinfo(ltrim ( $arr [$i]->icon_url, '.' ));
				$arr [$i]->icon_url = base_url ().$path_parts['dirname'].'/'.$path_parts['filename'].'_thumb'.'.'.$path_parts['extension'];
				//$arr [$i]->icon_url = base_url () . ltrim ( $arr [$i]->icon_url, '.' );
			}
				
			// $arr[$i]->icon_url = str_replace('\/', '',$arr[$i]->icon_url);
				
			unset ( $arr [$i]->map_lat );
			unset ( $arr [$i]->map_long );
				
			$tarr = array ();
			$tarr ["lat"] = $map_lat;
			$tarr ["long"] = $map_long;
				
			$arr [$i]->location = $tarr;
		}
		// echo json_encode ( $arr );
		return $arr;
	}

	public function getEntryById($entry_id) {
		$this->db->select ( 'entries.id as entry_id, entries.title, entries.description,
				entries.email, entries.phone_number, entries.website, entries.map_title, entries.map_lat,
				entries.map_long, entries.facebook_link, entries.twitter_link, entries.from_date,
				entries.to_date, entries.posted_date, entries.cost' );
		$this->db->from ( 'entries' );
		$this->db->where ( 'entries.id', $entry_id );
		$arr_entry = $this->db->get ()->result ();

		$this->db->select ( 'blob_images.path' );
		$this->db->from ( 'blob_images' );
		$this->db->where ( 'blob_images.entry_id', $entry_id );
		$arr_images = $this->db->get ()->result ();

		$this->db->select ( 'c.*' );
		$this->db->from ( 'categories c, category_entries e' );
		$this->db->where ( 'c.id = e.category_id' );
		$this->db->where ( 'e.entry_id ', $entry_id );
		$arr_tags = $this->db->get ()->result ();

		$arr_tag = array ();
		for($i = 0; $i < sizeof ( $arr_tags ); $i ++) {
			$arr1 = array();
			$arr1 ["category_key"] = $arr_tags [$i]->category_key;
			$arr1 ["category_title"] = $arr_tags [$i]->category_title;
				
			$arr_tag[] = $arr1;
		}

		$arr_img = array ();
		for($i = 0; $i < sizeof ( $arr_images ); $i ++) {
			$arr_img [] = base_url().ltrim ( $arr_images [$i]->path, '.' );
		}

		for($i = 0; $i < sizeof ( $arr_entry ); $i ++) {
				
			$map_lat = $arr_entry [$i]->map_lat;
			$map_long = $arr_entry [$i]->map_long;
				
			unset ( $arr_entry [$i]->map_lat );
			unset ( $arr_entry [$i]->map_long );
				
			$tarr = array ();
			$tarr ["lat"] = $map_lat;
			$tarr ["long"] = $map_long;
				
			$arr_entry [$i]->tag = $arr_tag;
			$arr_entry [$i]->location = $tarr;
			$arr_entry [$i]->img_urls = $arr_img;
		}
		// echo json_encode ( $arr_entry );
		return $arr_entry;
	}

	public function getNewestEntries($from_date) {
		$this->db->select ( 'entries.id as entry_id, entries.title, entries.map_lat, entries.map_long' );
		$this->db->from ( 'entries' );
		$this->db->where ('entries.map_lat is not null');
		$this->db->where ('entries.map_long is not null');
		if ($from_date != null) {
			$this->db->where ( 'entries.posted_date >=', date ( 'Y-m-d', strtotime ( $from_date ) ) );
		}
		$arr_entry = $this->db->get()->result();

		for($i = 0; $i < sizeof ( $arr_entry ); $i ++) {
			$map_lat = $arr_entry [$i]->map_lat;
			$map_long = $arr_entry [$i]->map_long;
				
			unset ( $arr_entry [$i]->map_lat );
			unset ( $arr_entry [$i]->map_long );
				
			$tarr = array ();
			$tarr ["lat"] = $map_lat;
			$tarr ["long"] = $map_long;
				
			$arr_entry [$i]->location = $tarr;
		}

		// echo json_encode ( $arr_entry );
		return $arr_entry;
	}

	public function getAllCategories () {
		$this->db->select ( 'c.category_key, c.category_title' );
		$this->db->from ( 'categories c' );
		$query = $this->db->get ();
		return $query->result ();
	}

	public function search ($search_key, $categories) {

		$this->db->select ( 'entries.id as entry_id, entries.from_date, entries.map_lat, entries.map_long,
				entries.to_date, entries.title, entries.posted_date, (select b.path from blob_images b where b.entry_id = entries.id limit 1) as icon_url' );
		$this->db->from ( 'categories, category_entries, entries' );
		$this->db->where ( 'categories.id = category_entries.category_id' );
		$this->db->where ( 'entries.id = category_entries.entry_id' );
		if ($search_key != 'null') {
			$this->db->like ( 'entries.title', $search_key );
		}
		if ($categories != null) {
			$this->db->where_in ( 'categories.category_key ', $categories );
		}
		$query = $this->db->get ();
		$arr = $query->result ();

		for($i = 0; $i < sizeof ( $arr ); $i ++) {
			$map_lat = $arr [$i]->map_lat;
			$map_long = $arr [$i]->map_long;
				
			$arr [$i]->icon_url = base_url () . ltrim ( $arr [$i]->icon_url, '.' );
			// $arr[$i]->icon_url = str_replace('\/', '',$arr[$i]->icon_url);
				
			unset ( $arr [$i]->map_lat );
			unset ( $arr [$i]->map_long );
				
			$tarr = array ();
			$tarr ["lat"] = $map_lat;
			$tarr ["long"] = $map_long;
				
			$arr [$i]->location = $tarr;
		}
		// echo json_encode ( $arr );
		return $arr;

	}

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
}