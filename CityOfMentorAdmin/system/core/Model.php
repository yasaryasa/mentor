<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 5.1.6 or newer
 *
 * @package		CodeIgniter
 * @author		ExpressionEngine Dev Team
 * @copyright	Copyright (c) 2008 - 2011, EllisLab, Inc.
 * @license		http://codeigniter.com/user_guide/license.html
 * @link		http://codeigniter.com
 * @since		Version 1.0
 * @filesource
 */
// ------------------------------------------------------------------------

/**
 * CodeIgniter Model Class
 *
 * @package		CodeIgniter
 * @subpackage	Libraries
 * @category	Libraries
 * @author		ExpressionEngine Dev Team
 * @link		http://codeigniter.com/user_guide/libraries/config.html
 */
class CI_Model {

	/**
	 * Constructor
	 *
	 * @access public
	 */
	function __construct() {
		log_message('debug', "Model Class Initialized");
	}

	/**
	 * __get
	 *
	 * Allows models to access CI's loaded classes using the same
	 * syntax as controllers.
	 *
	 * @param	string
	 * @access private
	 */
	function __get($key) {
		$CI = & get_instance();
		return $CI->$key;
	}

}

// END Model Class

/* End of file Model.php */
/* Location: ./system/core/Model.php */

class Imlec_Model extends CI_Model {

	public function get_label_value($argument, $language = 1) {
		$label;
		if (file_exists('./labels/label.php' )) {
			include  './labels/label.php';
			if ( isset( $label[$argument][$language])) {
				return $label[$argument][$language];
			} else {
				$this->db->where("label_name", $argument);
				if ( $language == 0 )
					$this->db->where("label_language_id", 1);
				else
					$this->db->where("label_language_id", $language);
				$label = $this->db->get(LABEL_TABLE)->row();
				if ($label)
					return $label->label_value;
				else
					return "*" . $argument . "*";
			}
		} else {
			$this->db->where("label_name", $argument);
			if ( $language == 0 )
				$this->db->where("label_language_id", 1);
			else
				$this->db->where("label_language_id", $language);
			$label = $this->db->get(LABEL_TABLE)->row();
			if ($label)
				return $label->label_value;
			else
				return "*" . $argument . "*";
		}
	}

	public function get_menu_groups($position = 1) {
		$this->db->where("module_group_position",$position);
		$this->db->order_by("module_group_order","asc");
		return $this->db->get("gen_module_groups");
	}
	
	public function get_menu_items( $group_id = 0 ) {
		$query = "SELECT
					module_title as menu_title 
					FROM gen_modules ";
		if ( $group_id != 0 )
			$query .= "WHERE module_group_id = ".$group_id." ";
		$query .= "ORDER BY module_order asc";
		return $this->db->query($query);
	}
	
	public function get_group_right( $group_id ) {
		$this->db->where("module_group_id",$group_id);
		$rs = $this->db->get(MODULES_TABLE);
		
		$check = false;
		foreach ( $rs->result() as $row ) {
			$this->db->where("role_capability_module_name",$row->module_title);
			$this->db->where("role_capability_show",1);
			$this->db->where("role_capability_role_id", $this->session->userdata("admin_level"));
			$cap = $this->db->get(CAP_TABLE)->row();
			if ( $cap )
				$check = true;
		}
		
		return $check;
	}

    public function get_module_by_name( $name ) {
        $this->db->where("module_title", $name );
        return $this->db->get("gen_modules")->row();
    }

	public function user_info($id) {
		$this->db->where("user_id", $id);
		return $this->db->get(USER_TABLE)->row();
	}
	
	public function add_log( $string ) {
		$info = array (
			"auth_user_log_owner" => $this->session->userdata("admin_identification"),
			"user_log_ip_address" => $this->session->userdata("ip_address"),
			"user_log_activity" => $string,
			"user_log_user_agent" => $this->session->userdata("user_agent")
		);
		$this->db->insert(LOG_TABLE, $info);
	}
	
	public function add_error_log( $error, $explanation ) {
		$info = array (
			"error" => $error,
			"error_explanation" => $explanation,
			"user_log_activity" => $string,
			"user_log_user_agent" => $this->session->userdata("user_agent"),
			"gen_error_log_owner" => $this->session->userdata("admin_identification"),
		);
		$this->db->insert(LOG_TABLE, $info);
	}

	public function get_see_all($module) {
		$this->db->where("role_capability_role_id", $this->session->userdata("admin_level"));
		$this->db->where("role_capability_module_name", $module);
		$row = $this->db->get(CAP_TABLE)->row();
		if ($row)
			return $row->role_capability_see_all;
		else
			return 0;
	}

	public function get_see_others($module) {
		$this->db->where("role_capability_role_id", $this->session->userdata("admin_level"));
		$this->db->where("role_capability_module_name", $module);
		$row = $this->db->get(CAP_TABLE)->row();
		if ($row)
			return $row->role_capability_see_others;
		else
			return 0;
	}

	public function get_show($module) {
		$this->db->where("role_capability_role_id", $this->session->userdata("admin_level"));
		$this->db->where("role_capability_module_name", $module);
		$row = $this->db->get(CAP_TABLE)->row();
		if ($row)
			return $row->role_capability_show;
		else
			return 0;
	}

	public function get_create($module) {
		$this->db->where("role_capability_role_id", $this->session->userdata("admin_level"));
		$this->db->where("role_capability_module_name", $module);
		$row = $this->db->get(CAP_TABLE)->row();
		if ($row)
			return $row->role_capability_create;
		else
			return 0;
	}

	public function get_read($module) {
		$this->db->where("role_capability_role_id", $this->session->userdata("admin_level"));
		$this->db->where("role_capability_module_name", $module);
		$row = $this->db->get(CAP_TABLE)->row();
		if ($row)
			return $row->role_capability_read;
		else
			return 0;
	}

	public function get_update($module) {
		$this->db->where("role_capability_role_id", $this->session->userdata("admin_level"));
		$this->db->where("role_capability_module_name", $module);
		$row = $this->db->get(CAP_TABLE)->row();
		if ($row)
			return $row->role_capability_update;
		else
			return 0;
	}

	
	public function date_to_db($date = "") {
		date_default_timezone_set('Turkey');
		$datestring = "%Y-%m-%d";
		$today = mdate($datestring, now());

		if ($date != "") {
			$t = explode(" ", $date);
			$date = explode("-", $t[0]);
			$temp = $date[2] . "-" . $date[1] . "-" . $date[0];
			$temp = str_replace(" ", "", $temp);
			return $temp . " " . $t[1];
		} else {
			return $today;
		}
	}

	public function date_to_human($date = "") {
		if ($date != "") {
			$t = explode(" ", $date);
			$date = explode("-", $t[0]);
			$temp = $date[2] . "-" . $date[1] . "-" . $date[0];
			$temp = str_replace(" ", "", $temp);
			@$return = $temp . " " . $t[1];
			return $return;
		}
	}

	public function get_delete($module) {
		$this->db->where("role_capability_role_id", $this->session->userdata("admin_level"));
		$this->db->where("role_capability_module_name", $module);
		$row = $this->db->get(CAP_TABLE)->row();
		if ($row)
			return $row->role_capability_delete;
		else
			return 0;
	}
	
	public function do_login($username, $password) {
		
		$username = htmlspecialchars($username);
		$password = htmlspecialchars($password);
		
		$this->db->select("*")->from(USER_TABLE);

		$this->db->join(ROLE_TABLE, USER_TABLE . ".user_role_id = " . ROLE_TABLE . ".role_id", "left");
		$this->db->where(USER_TABLE . ".user_password = '" . sha1($password) . "' AND (" . USER_TABLE . ".user_username = '" . $username . "' OR " . USER_TABLE . ".user_email = '" . $username . "' ) ");
		$rs = $this->db->get();

		if ($rs->num_rows === 1) {
			$user = $rs->row();
			
			$log = array(
				"auth_user_log_owner" => $user->user_id,
				"user_log_ip_address" => $this->session->userdata("ip_address"),
				"user_log_activity" => "Logged In",
				"user_log_user_agent" => $this->session->userdata("user_agent"),
			);
			$this->db->insert(LOG_TABLE, $log);
			
			$this->db->select("*")->from(CAP_TABLE);
			$this->db->join(ROLE_TABLE, CAP_TABLE.".role_capability_role_id = ".ROLE_TABLE . ".role_id","left");
			$this->db->where(CAP_TABLE.".role_capability_role_id",$user->role_id);
			$caps = $this->db->get();
			
			$return = array ($user, $caps);
			return $return;
		} else
			return FALSE;
	}

	public function get_image_sizes( $title = "Original", $module = DEFAULT_CONTROLLER ) {
		$this->db->select('*')->from(IMG_SETTINGS_TABLE);
		$this->db->join(IMG_SETTINGS_TYPE_TABLE,IMG_SETTINGS_TABLE.".setting_type_id = ".IMG_SETTINGS_TYPE_TABLE.".type_id","left");
		$this->db->where( IMG_SETTINGS_TYPE_TABLE.".type_title", $title );
		$this->db->where(IMG_SETTINGS_TABLE.".setting_module_name",$module);
		$row = $this->db->get()->row();
		return $row;
	}

    public function to_title($string) {

        $string = preg_replace('/<[^<]+?>/', '',  strip_tags($string));
        
        $tmp = explode(" ", $string);
        
        $result = "";
		
		$exceptions = array ("ve","ile","and","with","veya","or");
        
        foreach ( $tmp as $t ) {
        	if ( !preg_match("/\b(?:(?:https?):\/\/|www?\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$t) && substr($t,0,1) != '[' && substr($t,-1) != ']' ) {
				if ( !in_array($t, $exceptions) ) {
					$t = str_replace('I','ı',$t);
					$t = str_replace('i', 'İ', $t);
					$t = mb_convert_case($t, MB_CASE_TITLE, 'UTF-8');
					$result .= " ".$t;
				} else {
					$result .= " ".$t;
				}
            } else if ( substr($t,0,1) == '[' && substr($t,-1) == ']'  ) {
            	$t = substr($t,1);
                $t = substr($t,0,-1);
                $result .= " ".$t;
            } else {
                $result .= " ".$t; 
            }
        }
        trim($result);
        return $result;
    }

    public function to_url($string) {

        $string = $this->to_lower($string);
        $string = strip_tags($string);
        $string = stripslashes($string);
        $string = html_entity_decode($string);

        $string = str_replace('\'', '', $string);

        $string = trim($string);

        $string = str_replace("ı", "i", "$string");
        $string = str_replace("ü", "u", "$string");
        $string = str_replace("ö", "o", "$string");
        $string = str_replace("ş", "s", "$string");
        $string = str_replace("ç", "c", "$string");
        $string = str_replace("ğ", "g", "$string");

        $string = preg_replace('/[^A-Za-z0-9-]+/', '-', $string);
		$string = trim($string, '-');

        return $string;
    }

    public function to_username($string) {

        $string = $this->to_lower($string);
        $string = strip_tags($string);
        $string = stripslashes($string);
        $string = html_entity_decode($string);

        $string = str_replace('\'', '', $string);

        $string = trim($string);

        $string = str_replace("ı", "i", "$string");
        $string = str_replace("ü", "u", "$string");
        $string = str_replace("ö", "o", "$string");
        $string = str_replace("ş", "s", "$string");
        $string = str_replace("ç", "c", "$string");
        $string = str_replace("ğ", "g", "$string");
		$string = str_replace("ğ", "g", "$string");
		

		$string = str_replace("_______________", ".", $string);

        $string = preg_replace('/[^a-z0-9-]+/', '_', $string);
		
		$string = str_replace(".", "_______________", $string);
		$string = trim($string, '_');

        return $string;
    }
	

    public function to_lower($string) {
        return mb_convert_case(str_replace('I', 'ı', $string), MB_CASE_LOWER, 'UTF-8');
    }

    public function to_upper($string) {
        return mb_convert_case(str_replace('i', 'İ', $string), MB_CASE_UPPER, 'UTF-8');
    }
	
	
}
