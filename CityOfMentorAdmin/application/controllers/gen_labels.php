<?php
/*
 * Bu Yazılım İmleç A.Ş. Tarafından Geliştirilmiştir. 
 * http://www.imlec.com.tr 
 * http://www.imleç.com.tr 
 */
class gen_labels extends Imlec_Controller {


    public function gen_labels() {
        parent::__construct();
    }

    public function index () {
        
        $page_data["current_user_id"] = $this->current_user_id;
        $page_data["current_user_role"] = $this->current_user_role;
        $page_data["current_user_level"] = $this->current_user_level;
        $page_data["current_user_language"] = $this->current_user_language;
            
        if ( $this->get_read("gen_labels")) {
            
			
            $page = $this->uri->segment("4",1);
            $page_data["page"] = $page;

            			
            $gen_language = $this->uri->segment("6",0);
            $page_data["gen_language"] = $gen_language;
            $gen_languages = $this->gen_label_model->get_gen_languages_reference($this->current_user_id, $this->current_user_level);
            $page_data["gen_languages"] = $gen_languages;
						
            $auth_user = $this->uri->segment("8",0);
            $page_data["auth_user"] = $auth_user;
            $auth_users = $this->gen_label_model->get_auth_users_reference($this->current_user_id, $this->current_user_level);
            $page_data["auth_users"] = $auth_users;
			

            $page_data["gen_labels"] = $this->gen_label_model->get_gen_labels( $page , $gen_language,$auth_user,"", $this->current_user_id, $this->current_user_role, $this->current_user_level );
            $page_data["total_count"] = $this->gen_label_model->get_gen_labels_count( $page , $gen_language,$auth_user,"", $this->current_user_id, $this->current_user_role, $this->current_user_level);

            $content = $this->load->view("gen_labels/list",$page_data, TRUE);
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
            
        if ( $this->get_read("gen_labels")) {
            
			
            $page = $this->uri->segment("4",1);
            $page_data["page"] = $page;

            			
            $gen_language = $this->uri->segment("6",0);
            $page_data["gen_language"] = $gen_language;
            $gen_languages = $this->gen_label_model->get_gen_languages_reference($this->current_user_id, $this->current_user_level);
            $page_data["gen_languages"] = $gen_languages;
						
            $auth_user = $this->uri->segment("8",0);
            $page_data["auth_user"] = $auth_user;
            $auth_users = $this->gen_label_model->get_auth_users_reference($this->current_user_id, $this->current_user_level);
            $page_data["auth_users"] = $auth_users;
			

            $term = $this->input->post("search_term");

            $page_data["search_term"] = $term;

            $page_data["gen_labels"] = $this->gen_label_model->get_gen_labels( $page , $gen_language,$auth_user, $term , $this->current_user_id, $this->current_user_role, $this->current_user_level );

            $content = $this->load->view("gen_labels/search",$page_data, TRUE);
            $this->create_view($content, "");
			

        } else {
            $model = $this->get_model_name() . "_model";
            $page_data["model"] = $model;
            $page_data["access_type"] = "read";
            $content = $this->load->view("global/restricted", $page_data, TRUE);
            $this->create_view($content, "");
        }
    }

    public function new_gen_label() {
        
        $page_data["current_user_id"] = $this->current_user_id;
        $page_data["current_user_role"] = $this->current_user_role;
        $page_data["current_user_level"] = $this->current_user_level;
        $page_data["current_user_language"] = $this->current_user_language;

        if ( $this->get_create("gen_labels") ) {
            
            			
            $gen_language = $this->uri->segment("6",0);
            $page_data["gen_language"] = $gen_language;
            $gen_languages = $this->gen_label_model->get_gen_languages_reference($this->current_user_id, $this->current_user_level);
            $page_data["gen_languages"] = $gen_languages;
						
            $auth_user = $this->uri->segment("8",0);
            $page_data["auth_user"] = $auth_user;
            $auth_users = $this->gen_label_model->get_auth_users_reference($this->current_user_id, $this->current_user_level);
            $page_data["auth_users"] = $auth_users;
			

            $content = $this->load->view("gen_labels/new",$page_data, TRUE);
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

        if ( $this->get_create("gen_labels") ) {
            
            $info = $this->input->post(NULL, TRUE);
            
            
            unset($info["_wysihtml5_mode"]);
            $this->gen_label_model->create( $info, $this->current_user_id );
            
            redirect("gen_labels/index");
			
        } else {
            $model = $this->get_model_name() . "_model";
            $page_data["model"] = $model;
            $page_data["access_type"] = "create";
            $content = $this->load->view("global/restricted", $page_data, TRUE);
            $this->create_view($content, "");
        }
    }

    public function edit_gen_label () {

        $page_data["current_user_id"] = $this->current_user_id;
        $page_data["current_user_role"] = $this->current_user_role;
        $page_data["current_user_level"] = $this->current_user_level;
        $page_data["current_user_language"] = $this->current_user_language;

        if ( $this->get_update("gen_labels") ) {
            
            $page = $this->uri->segment("4",1);
            $page_data["page"] = $page;

            $label_id = $this->uri->segment("5",0);
            $page_data["id"] = $label_id;

            			
            $gen_language = $this->uri->segment("6",0);
            $page_data["gen_language"] = $gen_language;
            $gen_languages = $this->gen_label_model->get_gen_languages_reference($this->current_user_id, $this->current_user_level);
            $page_data["gen_languages"] = $gen_languages;
						
            $auth_user = $this->uri->segment("8",0);
            $page_data["auth_user"] = $auth_user;
            $auth_users = $this->gen_label_model->get_auth_users_reference($this->current_user_id, $this->current_user_level);
            $page_data["auth_users"] = $auth_users;
			

            $gen_label = $this->gen_label_model->get_by_label_id( $label_id );
            

            $page_data["gen_label"] = $gen_label;

            $content = $this->load->view("gen_labels/edit",$page_data, TRUE);
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

        if ( $this->get_update("gen_labels") ) {
            
            $page = $this->uri->segment("4",1);
            $page_data["page"] = $page;

            $label_id = $this->uri->segment("5",0);

            $info = $this->input->post();

            

            

            unset($info["_wysihtml5_mode"]);

            $this->gen_label_model->update( $info, $label_id );

            

            redirect("gen_labels/index/page/$page");
			
        } else {
            $model = $this->get_model_name() . "_model";
            $page_data["model"] = $model;
            $page_data["access_type"] = "update";
            $content = $this->load->view("global/restricted", $page_data, TRUE);
            $this->create_view($content, "");
        }
    }

    public function delete_gen_label () {
        
        $page_data["current_user_id"] = $this->current_user_id;
        $page_data["current_user_role"] = $this->current_user_role;
        $page_data["current_user_level"] = $this->current_user_level;
        $page_data["current_user_language"] = $this->current_user_language;

        if ( $this->get_delete("gen_labels") ) {
            			
            $page = $this->uri->segment("4",0);
            $page_data["page"] = $page;

            $label_id = $this->uri->segment("5",0);

            $info = $this->input->post();
            $this->gen_label_model->delete( $label_id );
            redirect("gen_labels/index");
			
        } else {
            $model = $this->get_model_name() . "_model";
            $page_data["model"] = $model;
            $page_data["access_type"] = "delete";
            $content = $this->load->view("global/restricted", $page_data, TRUE);
            $this->create_view($content, "");
        }
    }

    
}
