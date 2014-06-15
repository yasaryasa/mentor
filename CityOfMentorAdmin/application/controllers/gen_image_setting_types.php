<?php
/*
 * Bu Yazılım İmleç A.Ş. Tarafından Geliştirilmiştir. 
 * http://www.imlec.com.tr 
 * http://www.imleç.com.tr 
 */
class gen_image_setting_types extends Imlec_Controller {


    public function gen_image_setting_types() {
        parent::__construct();
    }

    public function index () {
        
        $page_data["current_user_id"] = $this->current_user_id;
        $page_data["current_user_role"] = $this->current_user_role;
        $page_data["current_user_level"] = $this->current_user_level;
        $page_data["current_user_language"] = $this->current_user_language;
            
        if ( $this->get_read("gen_image_setting_types")) {
            
			
            $page = $this->uri->segment("4",1);
            $page_data["page"] = $page;

            			
            $auth_user = $this->uri->segment("6",0);
            $page_data["auth_user"] = $auth_user;
            $auth_users = $this->gen_image_setting_type_model->get_auth_users_reference($this->current_user_id, $this->current_user_level);
            $page_data["auth_users"] = $auth_users;
			

            $page_data["gen_image_setting_types"] = $this->gen_image_setting_type_model->get_gen_image_setting_types( $page , $auth_user,"", $this->current_user_id, $this->current_user_role, $this->current_user_level );
            $page_data["total_count"] = $this->gen_image_setting_type_model->get_gen_image_setting_types_count( $page , $auth_user,"", $this->current_user_id, $this->current_user_role, $this->current_user_level);

            $content = $this->load->view("gen_image_setting_types/list",$page_data, TRUE);
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
            
        if ( $this->get_read("gen_image_setting_types")) {
            
			
            $page = $this->uri->segment("4",1);
            $page_data["page"] = $page;

            			
            $auth_user = $this->uri->segment("6",0);
            $page_data["auth_user"] = $auth_user;
            $auth_users = $this->gen_image_setting_type_model->get_auth_users_reference($this->current_user_id, $this->current_user_level);
            $page_data["auth_users"] = $auth_users;
			

            $term = $this->input->post("search_term");

            $page_data["search_term"] = $term;

            $page_data["gen_image_setting_types"] = $this->gen_image_setting_type_model->get_gen_image_setting_types( $page , $auth_user, $term , $this->current_user_id, $this->current_user_role, $this->current_user_level );

            $content = $this->load->view("gen_image_setting_types/search",$page_data, TRUE);
            $this->create_view($content, "");
			

        } else {
            $model = $this->get_model_name() . "_model";
            $page_data["model"] = $model;
            $page_data["access_type"] = "read";
            $content = $this->load->view("global/restricted", $page_data, TRUE);
            $this->create_view($content, "");
        }
    }

    public function new_gen_image_setting_type() {
        
        $page_data["current_user_id"] = $this->current_user_id;
        $page_data["current_user_role"] = $this->current_user_role;
        $page_data["current_user_level"] = $this->current_user_level;
        $page_data["current_user_language"] = $this->current_user_language;

        if ( $this->get_create("gen_image_setting_types") ) {
            
            			
            $auth_user = $this->uri->segment("6",0);
            $page_data["auth_user"] = $auth_user;
            $auth_users = $this->gen_image_setting_type_model->get_auth_users_reference($this->current_user_id, $this->current_user_level);
            $page_data["auth_users"] = $auth_users;
			

            $content = $this->load->view("gen_image_setting_types/new",$page_data, TRUE);
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

        if ( $this->get_create("gen_image_setting_types") ) {
            
            $info = $this->input->post(NULL, TRUE);
            
            
            unset($info["_wysihtml5_mode"]);
            $this->gen_image_setting_type_model->create( $info, $this->current_user_id );
            
            redirect("gen_image_setting_types/index");
			
        } else {
            $model = $this->get_model_name() . "_model";
            $page_data["model"] = $model;
            $page_data["access_type"] = "create";
            $content = $this->load->view("global/restricted", $page_data, TRUE);
            $this->create_view($content, "");
        }
    }

    public function edit_gen_image_setting_type () {

        $page_data["current_user_id"] = $this->current_user_id;
        $page_data["current_user_role"] = $this->current_user_role;
        $page_data["current_user_level"] = $this->current_user_level;
        $page_data["current_user_language"] = $this->current_user_language;

        if ( $this->get_update("gen_image_setting_types") ) {
            
            $page = $this->uri->segment("4",1);
            $page_data["page"] = $page;

            $type_id = $this->uri->segment("5",0);
            $page_data["id"] = $type_id;

            			
            $auth_user = $this->uri->segment("6",0);
            $page_data["auth_user"] = $auth_user;
            $auth_users = $this->gen_image_setting_type_model->get_auth_users_reference($this->current_user_id, $this->current_user_level);
            $page_data["auth_users"] = $auth_users;
			

            $gen_image_setting_type = $this->gen_image_setting_type_model->get_by_type_id( $type_id );
            

            $page_data["gen_image_setting_type"] = $gen_image_setting_type;

            $content = $this->load->view("gen_image_setting_types/edit",$page_data, TRUE);
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

        if ( $this->get_update("gen_image_setting_types") ) {
            
            $page = $this->uri->segment("4",1);
            $page_data["page"] = $page;

            $type_id = $this->uri->segment("5",0);

            $info = $this->input->post();

            

            

            unset($info["_wysihtml5_mode"]);

            $this->gen_image_setting_type_model->update( $info, $type_id );

            

            redirect("gen_image_setting_types/index/page/$page");
			
        } else {
            $model = $this->get_model_name() . "_model";
            $page_data["model"] = $model;
            $page_data["access_type"] = "update";
            $content = $this->load->view("global/restricted", $page_data, TRUE);
            $this->create_view($content, "");
        }
    }

    public function delete_gen_image_setting_type () {
        
        $page_data["current_user_id"] = $this->current_user_id;
        $page_data["current_user_role"] = $this->current_user_role;
        $page_data["current_user_level"] = $this->current_user_level;
        $page_data["current_user_language"] = $this->current_user_language;

        if ( $this->get_delete("gen_image_setting_types") ) {
            			
            $page = $this->uri->segment("4",0);
            $page_data["page"] = $page;

            $type_id = $this->uri->segment("5",0);

            $info = $this->input->post();
            $this->gen_image_setting_type_model->delete( $type_id );
            redirect("gen_image_setting_types/index");
			
        } else {
            $model = $this->get_model_name() . "_model";
            $page_data["model"] = $model;
            $page_data["access_type"] = "delete";
            $content = $this->load->view("global/restricted", $page_data, TRUE);
            $this->create_view($content, "");
        }
    }

    
}
