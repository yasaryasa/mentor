<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class CI_Controller {

	private static $instance;

	public function __construct() {
		self::$instance = & $this;

		foreach (is_loaded() as $var => $class) {
			$this->$var = & load_class($class);
		}

		$this->load = & load_class('Loader', 'core');

		$this->load->initialize();

		log_message('debug', "Controller Class Initialized");
	}

	public static function &get_instance() {
		return self::$instance;
	}

}

class Imlec_Controller extends CI_Controller {

	public $current_user_id;
	public $current_user_role;
	public $current_user_language;
	public $current_user_level;

	public function __construct() {
		parent::__construct();
		$this->load->model($this->get_model_name() . "_model");

		$this->current_user_id = $this->session->userdata("admin_identification");
		$this->current_user_role = $this->session->userdata("admin_level");
		$this->current_user_language = $this->session->userdata("admin_language");
		$this->current_user_level = $this->session->userdata("admin_index");
	}

	public function get_controller_name() {
		return $this->uri->segment(1, DEFAULT_CONTROLLER);
	}

	public function get_model_name() {
		return $this->singularize($this->uri->segment(1, DEFAULT_CONTROLLER));
	}

	public function show_authorization() {
		echo "Bu sayfayı görüntüleme yetkiniz yok";
	}

	public function get_see_all($module = DEFAULT_CONTROLLER) {
		if ($this->valid_admin()) {
			$model_name = $this->get_model_name() . "_model";
			return $this->$model_name->get_see_all($module);
		} else {
			$this->login();
		}
	}

	public function get_see_others($module = DEFAULT_CONTROLLER) {
		if ($this->valid_admin()) {
			$model_name = $this->get_model_name() . "_model";
			return $this->$model_name->get_see_others($module);
		} else {
			$this->login();
		}
	}

	public function get_show($module = DEFAULT_CONTROLLER) {
		if ($this->valid_admin()) {
			$model_name = $this->get_model_name() . "_model";
			return $this->$model_name->get_show($module);
		} else {
			$this->login();
		}
	}

	public function get_create($module = DEFAULT_CONTROLLER) {
		if ($this->valid_admin()) {
			$model_name = $this->get_model_name() . "_model";
			return $this->$model_name->get_create($module);
		} else {
			$this->login();
		}
	}

	public function get_read($module = DEFAULT_CONTROLLER) {
		if ($this->valid_admin()) {
			$model_name = $this->get_model_name() . "_model";
			return $this->$model_name->get_read($module);
		} else {
			$this->login();
		}
	}

	public function get_update($module = DEFAULT_CONTROLLER) {
		if ($this->valid_admin()) {
			$model_name = $this->get_model_name() . "_model";
			return $this->$model_name->get_update($module);
		} else {
			$this->login();
		}
	}

	public function get_delete($module = DEFAULT_CONTROLLER) {
		if ($this->valid_admin()) {
			$model_name = $this->get_model_name() . "_model";
			return $this->$model_name->get_delete($module);
		} else {
			$this->login();
		}
	}

	public function do_login() {

		$user_username = $this->input->post("user");
		$user_password = $this->input->post("pass");

		if (strlen($user_username) > USERNAME_LENGHT && strlen($user_password) > PASSWORD_LENGHT) {
			$model_name = $this->get_model_name() . "_model";
			$user_info = $this->$model_name->do_login($user_username, $user_password);
			if ($user_info[0]) {
				$session = array(
					"valid_admin" => 1,
					"admin_name_surname" => $user_info[0]->user_name . " " . $user_info[0]->user_surname,
					"admin_username" => $user_info[0]->user_username,
					"admin_level" => $user_info[0]->role_id,
					"admin_email" => $user_info[0]->user_email,
					"admin_role" => $user_info[0]->role_title,
					"admin_identification" => $user_info[0]->user_id,
					"admin_index" => $user_info[0]->role_level
				);

				$this->session->set_userdata($session);
				redirect(DEFAULT_CONTROLLER);
			} else {
				redirect($this->get_controller_name() . "/login/hatali_giris");
			}
		} else {
			redirect($this->get_controller_name() . "/login/hata");
		}
	}

	public function login($status = 0) {
		$page_data["status"] = $this->uri->segment(3, "bos");
		$page_data["class"] = $this->get_controller_name();
		$this->load->view('global/login_form', $page_data);
	}

	public function logout() {
		$this->session->sess_destroy();
		redirect(base_url());
	}

	public function valid_admin() {
		if ($this->session->userdata("valid_admin") === 1) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function create_view($content) {

		$model_name = $this->get_model_name() . "_model";

		$menu_data["current_user_id"] = $this->current_user_id;
		$menu_data["current_user_role"] = $this->current_user_role;
		$menu_data["current_user_level"] = $this->current_user_level;
		$menu_data["current_user_language"] = $this->current_user_language;

		$menu_data["top_groups"] = $this->$model_name->get_menu_groups(2);
		$menu_data["left_groups"] = $this->$model_name->get_menu_groups(1);

		$menu_data["model"] = $model_name;

		$page_data["main_menu"] = $this->load->view("global/menu", $menu_data, TRUE);
		$page_data["content"] = $content;
		$this->load->view("master_page", $page_data);
	}

	public function get_label($argument) {
		$class = $this->singularize($this->uri->uri_string);
		$model_name = $class . "_model";
		return $this->$model_name->get_label_value($argument);
	}

	public function singularize($word) {
		$singular = array(
			'/(quiz)zes$/i' => '\1',
			'/(matr)ices$/i' => '\1ix',
			'/(vert|ind)ices$/i' => '\1ex',
			'/^(ox)en/i' => '\1',
			'/(alias|status)es$/i' => '\1',
			'/([octop|vir])i$/i' => '\1us',
			'/(cris|ax|test)es$/i' => '\1is',
			'/(shoe)s$/i' => '\1',
			'/(o)es$/i' => '\1',
			'/(bus)es$/i' => '\1',
			'/([m|l])ice$/i' => '\1ouse',
			'/(x|ch|ss|sh)es$/i' => '\1',
			'/(m)ovies$/i' => '\1ovie',
			'/(s)eries$/i' => '\1eries',
			'/([^aeiouy]|qu)ies$/i' => '\1y',
			'/([lr])ves$/i' => '\1f',
			'/(tive)s$/i' => '\1',
			'/(hive)s$/i' => '\1',
			'/([^f])ves$/i' => '\1fe',
			'/(^analy)ses$/i' => '\1sis',
			'/((a)naly|(b)a|(d)iagno|(p)arenthe|(p)rogno|(s)ynop|(t)he)ses$/i' => '\1\2sis',
			'/([ti])a$/i' => '\1um',
			'/(n)ews$/i' => '\1ews',
			'/s$/i' => '',
		);

		$uncountable = array('equipment', 'information', 'rice', 'money', 'species', 'series', 'fish', 'sheep');

		$irregular = array(
			'person' => 'people',
			'man' => 'men',
			'child' => 'children',
			'sex' => 'sexes',
			'move' => 'moves');

		$lowercased_word = strtolower($word);
		foreach ($uncountable as $_uncountable) {
			if (substr($lowercased_word, (-1 * strlen($_uncountable))) == $_uncountable) {
				return $word;
			}
		}

		foreach ($irregular as $_plural => $_singular) {
			if (preg_match('/(' . $_singular . ')$/i', $word, $arr)) {
				return preg_replace('/(' . $_singular . ')$/i', substr($arr[0], 0, 1) . substr($_plural, 1), $word);
			}
		}

		foreach ($singular as $rule => $replacement) {
			if (preg_match($rule, $word)) {
				return preg_replace($rule, $replacement, $word);
			}
		}

		return $word;
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
			return $temp;
		} else {
			return $today;
		}
	}
	
	public function date_time_to_db($date = "") {
		date_default_timezone_set('Turkey');
		$datestring = "%Y-%m-%d";
		$today = mdate($datestring, now());

		if ($date != "") {
			$t = explode(" ", $date);
			$date = explode("-", $t[0]);
			unset($t[0]);
			$temp = $date[2] . "-" . $date[1] . "-" . $date[0];
			$temp = str_replace(" ", "", $temp);
			return $temp.' '.implode(":", $t);
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


		return $string;
	}

	public function to_lower($string) {
		return mb_convert_case(str_replace('I', 'ı', $string), MB_CASE_LOWER, 'UTF-8');
	}

	public function to_upper($string) {
		return mb_convert_case(str_replace('i', 'İ', $string), MB_CASE_UPPER, 'UTF-8');
	}

	public function to_title($string) {

		$string = preg_replace('/<[^<]+?>/', '', strip_tags($string));

		$tmp = explode(" ", $string);

		$result = "";

		$exceptions = array("ve", "ile", "and", "with", "veya", "or");

		foreach ($tmp as $t) {
			if (!preg_match("/\b(?:(?:https?):\/\/|www?\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $t) && substr($t, 0, 1) != '[' && substr($t, -1) != ']') {
				if (!in_array($t, $exceptions)) {
					$t = str_replace('I', 'ı', $t);
					$t = str_replace('i', 'İ', $t);
					$t = mb_convert_case($t, MB_CASE_TITLE, 'UTF-8');
					$result .= " " . $t;
				} else {
					$result .= " " . $t;
				}
			} else if (substr($t, 0, 1) == '[' && substr($t, -1) == ']') {
				$t = substr($t, 1);
				$t = substr($t, 0, -1);
				$result .= " " . $t;
			} else {
				$result .= " " . $t;
			}
		}
		trim($result);
		return $result;
	}

}
