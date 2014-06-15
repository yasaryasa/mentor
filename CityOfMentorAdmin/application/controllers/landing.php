<?php

/*
 * Bu Yazılım İmleç A.Ş. Tarafından Geliştirilmiştir. 
 * http://www.imlec.com.tr 
 * http://www.imleç.com.tr 
 */

class landing extends Imlec_Controller {

    public function landing() {
        parent::__construct();
    }

    public function index() {
        
        $page_data["current_user_id"] = $this->current_user_id;
        $page_data["current_user_role"] = $this->current_user_role;
        $page_data["current_user_level"] = $this->current_user_level;
        $page_data["current_user_language"] = $this->current_user_language;

        if ($this->valid_admin()) {
            $modules = $this->landing_model->get_modules($this->current_user_role);
            $page_data["modules"] = $modules;

            $content = $this->load->view("landing/index", $page_data, TRUE);
            $this->create_view($content, "");
        } else {
            $this->login();
        }
    }

}
