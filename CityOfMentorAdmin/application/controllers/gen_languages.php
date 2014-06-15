<?php
/*
 * Bu Yazılım İmleç A.Ş. Tarafından Geliştirilmiştir. 
 * http://www.imlec.com.tr 
 * http://www.imleç.com.tr 
 */
class gen_languages extends Imlec_Controller {


    public function gen_languages() {
        parent::__construct();
    }

    public function index () {
        
        $page_data["current_user_id"] = $this->current_user_id;
        $page_data["current_user_role"] = $this->current_user_role;
        $page_data["current_user_level"] = $this->current_user_level;
        $page_data["current_user_language"] = $this->current_user_language;
            
        if ( $this->get_read("gen_languages")) {
            
			
            $page = $this->uri->segment("4",1);
            $page_data["page"] = $page;

            			
            $auth_user = $this->uri->segment("6",0);
            $page_data["auth_user"] = $auth_user;
            $auth_users = $this->gen_language_model->get_auth_users_reference($this->current_user_id, $this->current_user_level);
            $page_data["auth_users"] = $auth_users;
			

            $page_data["gen_languages"] = $this->gen_language_model->get_gen_languages( $page , $auth_user,"", $this->current_user_id, $this->current_user_role, $this->current_user_level );
            $page_data["total_count"] = $this->gen_language_model->get_gen_languages_count( $page , $auth_user,"", $this->current_user_id, $this->current_user_role, $this->current_user_level);

            $content = $this->load->view("gen_languages/list",$page_data, TRUE);
            $this->create_view($content, "");
			

        } else {
            $model = $this->get_model_name() . "_model";
            $page_data["model"] = $model;
            $page_data["access_type"] = "read";
            $content = $this->load->view("global/restricted", $page_data, TRUE);
            $this->create_view($content, "");
        }
    }

    public function search () {
        $page_data["current_user_id"] = $this->current_user_id;
        $page_data["current_user_role"] = $this->current_user_role;
        $page_data["current_user_level"] = $this->current_user_level;
        $page_data["current_user_language"] = $this->current_user_language;
            
        if ( $this->get_read("gen_languages")) {
            
			
            $page = $this->uri->segment("4",1);
            $page_data["page"] = $page;

            			
            $auth_user = $this->uri->segment("6",0);
            $page_data["auth_user"] = $auth_user;
            $auth_users = $this->gen_language_model->get_auth_users_reference($this->current_user_id, $this->current_user_level);
            $page_data["auth_users"] = $auth_users;
			

            $term = $this->input->post("search_term");

            $page_data["search_term"] = $term;

            $page_data["gen_languages"] = $this->gen_language_model->get_gen_languages( $page , $auth_user, $term , $this->current_user_id, $this->current_user_role, $this->current_user_level );

            $content = $this->load->view("gen_languages/search",$page_data, TRUE);
            $this->create_view($content, "");
			

        } else {
            $model = $this->get_model_name() . "_model";
            $page_data["model"] = $model;
            $page_data["access_type"] = "read";
            $content = $this->load->view("global/restricted", $page_data, TRUE);
            $this->create_view($content, "");
        }
    }

    public function new_gen_language() {
        
        $page_data["current_user_id"] = $this->current_user_id;
        $page_data["current_user_role"] = $this->current_user_role;
        $page_data["current_user_level"] = $this->current_user_level;
        $page_data["current_user_language"] = $this->current_user_language;

        if ( $this->get_create("gen_languages") ) {
            
            			
            $auth_user = $this->uri->segment("6",0);
            $page_data["auth_user"] = $auth_user;
            $auth_users = $this->gen_language_model->get_auth_users_reference($this->current_user_id, $this->current_user_level);
            $page_data["auth_users"] = $auth_users;
			

            $content = $this->load->view("gen_languages/new",$page_data, TRUE);
            $this->create_view($content, "");
			
        } else {
            $model = $this->get_model_name() . "_model";
            $page_data["model"] = $model;
            $page_data["access_type"] = "create";
            $content = $this->load->view("global/restricted", $page_data, TRUE);
            $this->create_view($content, "");
        }
    }

    public function create() {
        
        $page_data["current_user_id"] = $this->current_user_id;
        $page_data["current_user_role"] = $this->current_user_role;
        $page_data["current_user_level"] = $this->current_user_level;
        $page_data["current_user_language"] = $this->current_user_language;

        if ( $this->get_create("gen_languages") ) {
            
            $info = $this->input->post(NULL, TRUE);
            
            $date = $this->date_to_db($info["language_created"]);
            $info["language_created"] = $date;

            $datestring = "%h:%i:%s";
            $time = time();

            //$info["language_created"] .= " ".mdate($datestring, $time);	
            
            unset($info["_wysihtml5_mode"]);
            $this->gen_language_model->create( $info, $this->current_user_id );
            
            redirect("gen_languages/index");
			
        } else {
            $model = $this->get_model_name() . "_model";
            $page_data["model"] = $model;
            $page_data["access_type"] = "create";
            $content = $this->load->view("global/restricted", $page_data, TRUE);
            $this->create_view($content, "");
        }
    }

    public function edit_gen_language () {

        $page_data["current_user_id"] = $this->current_user_id;
        $page_data["current_user_role"] = $this->current_user_role;
        $page_data["current_user_level"] = $this->current_user_level;
        $page_data["current_user_language"] = $this->current_user_language;

        if ( $this->get_update("gen_languages") ) {
            
            $page = $this->uri->segment("4",1);
            $page_data["page"] = $page;

            $language_id = $this->uri->segment("5",0);
            $page_data["id"] = $language_id;

            			
            $auth_user = $this->uri->segment("6",0);
            $page_data["auth_user"] = $auth_user;
            $auth_users = $this->gen_language_model->get_auth_users_reference($this->current_user_id, $this->current_user_level);
            $page_data["auth_users"] = $auth_users;
			

            $gen_language = $this->gen_language_model->get_by_language_id( $language_id );
            

            $datetime = explode(" ", $gen_language->language_created );
            $date = $this->date_to_human($datetime[0]);

            $gen_language->language_created = $date." ".$datetime[1];
			

            $page_data["gen_language"] = $gen_language;

            $content = $this->load->view("gen_languages/edit",$page_data, TRUE);
            $this->create_view($content, "");
			
        } else {
            $model = $this->get_model_name() . "_model";
            $page_data["model"] = $model;
            $page_data["access_type"] = "update";
            $content = $this->load->view("global/restricted", $page_data, TRUE);
            $this->create_view($content, "");
        }
    }

    public function edit () {
        
        $page_data["current_user_id"] = $this->current_user_id;
        $page_data["current_user_role"] = $this->current_user_role;
        $page_data["current_user_level"] = $this->current_user_level;
        $page_data["current_user_language"] = $this->current_user_language;

        if ( $this->get_update("gen_languages") ) {
            
            $page = $this->uri->segment("4",1);
            $page_data["page"] = $page;

            $language_id = $this->uri->segment("5",0);

            $info = $this->input->post();

            
            $date = $this->date_to_db($info["language_created"]);
            $info["language_created"] = $date;

            $datestring = "%h:%i:%s";
            $time = time();

            //$info["language_created"] .= " ".mdate($datestring, $time);	

            

            unset($info["_wysihtml5_mode"]);

            $this->gen_language_model->update( $info, $language_id );

            

            redirect("gen_languages/index/page/$page");
			
        } else {
            $model = $this->get_model_name() . "_model";
            $page_data["model"] = $model;
            $page_data["access_type"] = "update";
            $content = $this->load->view("global/restricted", $page_data, TRUE);
            $this->create_view($content, "");
        }
    }

    public function delete_gen_language () {
        
        $page_data["current_user_id"] = $this->current_user_id;
        $page_data["current_user_role"] = $this->current_user_role;
        $page_data["current_user_level"] = $this->current_user_level;
        $page_data["current_user_language"] = $this->current_user_language;

        if ( $this->get_delete("gen_languages") ) {
            			
            $page = $this->uri->segment("4",0);
            $page_data["page"] = $page;

            $language_id = $this->uri->segment("5",0);

            $info = $this->input->post();
            $this->gen_language_model->delete( $language_id );
            redirect("gen_languages/index");
			
        } else {
            $model = $this->get_model_name() . "_model";
            $page_data["model"] = $model;
            $page_data["access_type"] = "delete";
            $content = $this->load->view("global/restricted", $page_data, TRUE);
            $this->create_view($content, "");
        }
    }

    
}
