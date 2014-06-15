<?php
/*
 * Bu Yazılım İmleç A.Ş. Tarafından Geliştirilmiştir. http://www.imlec.com.tr http://www.imleç.com.tr
*/
class entries extends Imlec_Controller {
	public function entries() {
		parent::__construct ();
	}
	public function index() {
		$page_data ["current_user_id"] = $this->current_user_id;
		$page_data ["current_user_role"] = $this->current_user_role;
		$page_data ["current_user_level"] = $this->current_user_level;
		$page_data ["current_user_language"] = $this->current_user_language;

		if ($this->get_read ( "entries" )) {
				
			$page = $this->uri->segment ( "4", 1 );
			$page_data ["page"] = $page;
				
			$auth_user = $this->uri->segment ( "6", 0 );
			$page_data ["auth_user"] = $auth_user;
			$auth_users = $this->entry_model->get_auth_users_reference ( $this->current_user_id, $this->current_user_level );
			$page_data ["auth_users"] = $auth_users;
				
			$page_data ["entries"] = $this->entry_model->get_entries ( $page, $auth_user, "", $this->current_user_id, $this->current_user_role, $this->current_user_level );
			$page_data ["total_count"] = $this->entry_model->get_entries_count ( $page, $auth_user, "", $this->current_user_id, $this->current_user_role, $this->current_user_level );
				
			$content = $this->load->view ( "entries/list", $page_data, TRUE );
			$this->create_view ( $content, "" );
		} else {
			// $model = $this->get_model_name() . "_model";
			// $page_data["model"] = $model;
			// $page_data["access_type"] = "read";
			// $content = $this->load->view("global/restricted", $page_data, TRUE);
			// $this->create_view($content, "");
		}
	}
	public function search() {
		$page_data ["current_user_id"] = $this->current_user_id;
		$page_data ["current_user_role"] = $this->current_user_role;
		$page_data ["current_user_level"] = $this->current_user_level;
		$page_data ["current_user_language"] = $this->current_user_language;

		if ($this->get_read ( "entries" )) {
				
			$page = $this->uri->segment ( "4", 1 );
			$page_data ["page"] = $page;
				
			$auth_user = $this->uri->segment ( "6", 0 );
			$page_data ["auth_user"] = $auth_user;
			$auth_users = $this->entry_model->get_auth_users_reference ( $this->current_user_id, $this->current_user_level );
			$page_data ["auth_users"] = $auth_users;
				
			$term = $this->input->post ( "search_term" );
				
			$page_data ["search_term"] = $term;
				
			$page_data ["entries"] = $this->entry_model->get_entries ( $page, $auth_user, $term, $this->current_user_id, $this->current_user_role, $this->current_user_level );
				
			$content = $this->load->view ( "entries/search", $page_data, TRUE );
			$this->create_view ( $content, "" );
		} else {
			$model = $this->get_model_name () . "_model";
			$page_data ["model"] = $model;
			$page_data ["access_type"] = "read";
			$content = $this->load->view ( "global/restricted", $page_data, TRUE );
			$this->create_view ( $content, "" );
		}
	}
	public function new_entry() {
		$page_data ["current_user_id"] = $this->current_user_id;
		$page_data ["current_user_role"] = $this->current_user_role;
		$page_data ["current_user_level"] = $this->current_user_level;
		$page_data ["current_user_language"] = $this->current_user_language;

		if ($this->get_create ( "entries" )) {
				
			$auth_user = $this->uri->segment ( "6", 0 );
			$page_data ["auth_user"] = $auth_user;
			$auth_users = $this->entry_model->get_auth_users_reference ( $this->current_user_id, $this->current_user_level );
			$page_data ["auth_users"] = $auth_users;
				
			$content = $this->load->view ( "entries/new", $page_data, TRUE );
			$this->create_view ( $content, "" );
		} else if (empty ( $page_data ["status"] )) {
			$model = $this->get_model_name () . "_model";
			$page_data ["model"] = $model;
			$page_data ["access_type"] = "create";
			$content = $this->load->view ( "global/restricted", $page_data, TRUE );
			$this->create_view ( $content, "" );
		}
	}
	public function create() {
		$page_data ["current_user_id"] = $this->current_user_id;
		$page_data ["current_user_role"] = $this->current_user_role;
		$page_data ["current_user_level"] = $this->current_user_level;
		$page_data ["current_user_language"] = $this->current_user_language;

		if ($this->get_create ( "entries" )) {
				
			$info = $this->input->post ( NULL, TRUE );
				
			if (array_key_exists ('posted_date' ,$info ) && $info ["posted_date"] !='') {
				$date = $this->date_time_to_db ( $info ["posted_date"].' '.$info ["posted_time"]);
				$info ["posted_date"] = $date;
				unset($info["posted_time"]);
			}
			if (array_key_exists ('from_date' ,$info ) && $info ["from_date"] !='') {
				$date = $this->date_time_to_db ( $info ["from_date"].' '.$info ["from_time"] );
				$info ["from_date"] = $date;
				unset($info["from_time"]);
			}
				
			if (array_key_exists ('to_date' ,$info ) && $info ["to_date"] !='') {
				// $info["from_date"] .= " ".mdate($datestring, $time);
				$date = $this->date_time_to_db ( $info ["to_date"].' '.$info ["to_time"] );
				$info ["to_date"] = $date;
				unset($info["to_time"]);
			}
				
			// $info["to_date"] .= " ".mdate($datestring, $time);
				
			unset ( $info ["_wysihtml5_mode"] );
			$this->entry_model->create ( $info, $this->current_user_id );
				
			redirect ( "entries/index" );
		} else {
			$model = $this->get_model_name () . "_model";
			$page_data ["model"] = $model;
			$page_data ["access_type"] = "create";
			$content = $this->load->view ( "global/restricted", $page_data, TRUE );
			$this->create_view ( $content, "" );
		}
	}
	public function edit_entry() {
		$page_data ["current_user_id"] = $this->current_user_id;
		$page_data ["current_user_role"] = $this->current_user_role;
		$page_data ["current_user_level"] = $this->current_user_level;
		$page_data ["current_user_language"] = $this->current_user_language;

		if ($this->get_update ( "entries" )) {
				
			$page = $this->uri->segment ( "4", 1 );
			$page_data ["page"] = $page;
				
			$id = $this->uri->segment ( "5", 0 );
			$page_data ["id"] = $id;
				
			$auth_user = $this->uri->segment ( "6", 0 );
			$page_data ["auth_user"] = $auth_user;
			$auth_users = $this->entry_model->get_auth_users_reference ( $this->current_user_id, $this->current_user_level );
			$page_data ["auth_users"] = $auth_users;
				
			$entry = $this->entry_model->get_by_id ( $id );
				
			if (isset ($entry->posted_date)) {
				$datetime = explode ( " ", $entry->posted_date );
				$date = $this->date_to_human ( $datetime [0] );

				$entry->posted_date = $date;
				$entry->posted_time = $datetime [1];
			}
				
			if (isset ($entry->from_date)) {
				$datetime = explode ( " ", $entry->from_date );
				$date = $this->date_to_human ( $datetime [0] );

				$entry->from_date = $date;
				$entry->from_time = $datetime [1];
			} else {
				$entry->from_time = "";
			}
				
			if (isset ($entry->to_date)) {
				$datetime = explode ( " ", $entry->to_date );
				$date = $this->date_to_human ( $datetime [0] );

				$entry->to_date = $date;
				$entry->to_time = $datetime [1];
			} else {
				$entry->to_time = "";
			}
				
			$page_data ["entry"] = $entry;
				
			$content = $this->load->view ( "entries/edit", $page_data, TRUE );
			$this->create_view ( $content, "" );
		} else {
			$model = $this->get_model_name () . "_model";
			$page_data ["model"] = $model;
			$page_data ["access_type"] = "update";
			$content = $this->load->view ( "global/restricted", $page_data, TRUE );
			$this->create_view ( $content, "" );
		}
	}
	public function edit() {
		$page_data ["current_user_id"] = $this->current_user_id;
		$page_data ["current_user_role"] = $this->current_user_role;
		$page_data ["current_user_level"] = $this->current_user_level;
		$page_data ["current_user_language"] = $this->current_user_language;

		if ($this->get_update ( "entries" )) {
				
			$page = $this->uri->segment ( "4", 1 );
			$page_data ["page"] = $page;
				
			$id = $this->uri->segment ( "5", 0 );
				
			$info = $this->input->post ();
				
			// 			if (array_key_exists ('posted_date' ,$info ) && $info ["posted_date"] =='') {
			// 				$info ["posted_date"] = '';
			// 			} else {
			// 				$date = $this->date_to_db ( $info ["posted_date"] );

			// 				$info ["posted_date"] = $date;
			// 			}
				
			if (array_key_exists ('posted_date' ,$info ) && $info ["posted_date"] !='') {
				// $info["from_date"] .= " ".mdate($datestring, $time);
				$date = $this->date_time_to_db ( $info ["posted_date"].' '.$info ["posted_time"] );
				$info ["posted_date"] = $date;
				unset($info["posted_time"]);
			}
			
			if (trim($info ["from_date"]) !='') {
				$date = $this->date_time_to_db ( $info ["from_date"].' '.$info ["from_time"] );
				$info ["from_date"] = $date;
			} else if (trim( $info ["from_date"]) =='') {
				$info["from_date"] = null;
			}
			unset($info["from_time"]);
				
			if (trim($info ["to_date"]) !='') {
				$date = $this->date_time_to_db ( $info ["to_date"].' '.$info ["to_time"] );
				$info ["to_date"] = $date;
			} else if (trim( $info ["from_date"]) =='') {
				$info["to_date"] = null;
			}
			unset($info["to_time"]);
				
			// 			$date = $this->date_to_db ( $info ["from_date"] );
			// 			$info ["from_date"] = $date;
				
			// 			$date = $this->date_to_db ( $info ["to_date"] );
			// 			$info ["to_date"] = $date;
				
			unset ( $info ["_wysihtml5_mode"] );
				
			$this->entry_model->update ( $info, $id );
				
			redirect ( "entries/index/page/$page" );
	} else {
		$model = $this->get_model_name () . "_model";
		$page_data ["model"] = $model;
		$page_data ["access_type"] = "update";
		$content = $this->load->view ( "global/restricted", $page_data, TRUE );
		$this->create_view ( $content, "" );
	}
}
public function delete_entry() {
	$page_data ["current_user_id"] = $this->current_user_id;
	$page_data ["current_user_role"] = $this->current_user_role;
	$page_data ["current_user_level"] = $this->current_user_level;
	$page_data ["current_user_language"] = $this->current_user_language;

	if ($this->get_delete ( "entries" )) {
			
		$page = $this->uri->segment ( "4", 0 );
		$page_data ["page"] = $page;
			
		$id = $this->uri->segment ( "5", 0 );
			
		$info = $this->input->post ();
		$this->entry_model->delete ( $id );
		redirect ( "entries/index/page/" . $page );
	} else {
		$model = $this->get_model_name () . "_model";
		$page_data ["model"] = $model;
		$page_data ["access_type"] = "delete";
		$content = $this->load->view ( "global/restricted", $page_data, TRUE );
		$this->create_view ( $content, "" );
	}
}
}
