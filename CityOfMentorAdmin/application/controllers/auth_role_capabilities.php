<?php
/*
 * Bu Yazılım İmleç A.Ş. Tarafından Geliştirilmiştir. 
 * http://www.imlec.com.tr 
 * http://www.imleç.com.tr 
 */
class auth_role_capabilities extends Imlec_Controller {


    public function auth_role_capabilities() {
        parent::__construct();
    }

    public function index () {
        
        $page_data["current_user_id"] = $this->current_user_id;
        $page_data["current_user_role"] = $this->current_user_role;
        $page_data["current_user_level"] = $this->current_user_level;
        $page_data["current_user_language"] = $this->current_user_language;
            
        if ( $this->get_read("auth_role_capabilities")) {
            
			
            $page = $this->uri->segment("4",1);
            $page_data["page"] = $page;

            			
            $auth_role = $this->uri->segment("6",0);
            $page_data["auth_role"] = $auth_role;
            $auth_roles = $this->auth_role_capability_model->get_auth_roles_reference($this->current_user_id, $this->current_user_level);
            $page_data["auth_roles"] = $auth_roles;
						
            $gen_module = $this->uri->segment("8",0);
            $page_data["gen_module"] = $gen_module;
            $gen_modules = $this->auth_role_capability_model->get_gen_modules_reference($this->current_user_id, $this->current_user_level);
            $page_data["gen_modules"] = $gen_modules;
						
            $auth_user = $this->uri->segment("10",0);
            $page_data["auth_user"] = $auth_user;
            $auth_users = $this->auth_role_capability_model->get_auth_users_reference($this->current_user_id, $this->current_user_level);
            $page_data["auth_users"] = $auth_users;
			

            $page_data["auth_role_capabilities"] = $this->auth_role_capability_model->get_auth_role_capabilities( $page , $auth_role,$gen_module,$auth_user,"", $this->current_user_id, $this->current_user_role, $this->current_user_level );
            $page_data["total_count"] = $this->auth_role_capability_model->get_auth_role_capabilities_count( $page , $auth_role,$gen_module,$auth_user,"", $this->current_user_id, $this->current_user_role, $this->current_user_level);

            $content = $this->load->view("auth_role_capabilities/list",$page_data, TRUE);
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
            
        if ( $this->get_read("auth_role_capabilities")) {
            
			
            $page = $this->uri->segment("4",1);
            $page_data["page"] = $page;

            			
            $auth_role = $this->uri->segment("6",0);
            $page_data["auth_role"] = $auth_role;
            $auth_roles = $this->auth_role_capability_model->get_auth_roles_reference($this->current_user_id, $this->current_user_level);
            $page_data["auth_roles"] = $auth_roles;
						
            $gen_module = $this->uri->segment("8",0);
            $page_data["gen_module"] = $gen_module;
            $gen_modules = $this->auth_role_capability_model->get_gen_modules_reference($this->current_user_id, $this->current_user_level);
            $page_data["gen_modules"] = $gen_modules;
						
            $auth_user = $this->uri->segment("10",0);
            $page_data["auth_user"] = $auth_user;
            $auth_users = $this->auth_role_capability_model->get_auth_users_reference($this->current_user_id, $this->current_user_level);
            $page_data["auth_users"] = $auth_users;
			

            $term = $this->input->post("search_term");

            $page_data["search_term"] = $term;

            $page_data["auth_role_capabilities"] = $this->auth_role_capability_model->get_auth_role_capabilities( $page , $auth_role,$gen_module,$auth_user, $term , $this->current_user_id, $this->current_user_role, $this->current_user_level );

            $content = $this->load->view("auth_role_capabilities/search",$page_data, TRUE);
            $this->create_view($content, "");
			

        } else {
            $model = $this->get_model_name() . "_model";
            $page_data["model"] = $model;
            $page_data["access_type"] = "read";
            $content = $this->load->view("global/restricted", $page_data, TRUE);
            $this->create_view($content, "");
        }
    }

    public function new_auth_role_capability() {
        
        $page_data["current_user_id"] = $this->current_user_id;
        $page_data["current_user_role"] = $this->current_user_role;
        $page_data["current_user_level"] = $this->current_user_level;
        $page_data["current_user_language"] = $this->current_user_language;

        if ( $this->get_create("auth_role_capabilities") ) {
            
            			
            $auth_role = $this->uri->segment("6",0);
            $page_data["auth_role"] = $auth_role;
            $auth_roles = $this->auth_role_capability_model->get_auth_roles_reference($this->current_user_id, $this->current_user_level);
            $page_data["auth_roles"] = $auth_roles;
						
            $gen_module = $this->uri->segment("8",0);
            $page_data["gen_module"] = $gen_module;
            $gen_modules = $this->auth_role_capability_model->get_gen_modules_reference($this->current_user_id, $this->current_user_level);
            $page_data["gen_modules"] = $gen_modules;
						
            $auth_user = $this->uri->segment("10",0);
            $page_data["auth_user"] = $auth_user;
            $auth_users = $this->auth_role_capability_model->get_auth_users_reference($this->current_user_id, $this->current_user_level);
            $page_data["auth_users"] = $auth_users;
			

            $content = $this->load->view("auth_role_capabilities/new",$page_data, TRUE);
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

        if ( $this->get_create("auth_role_capabilities") ) {
            
            $info = $this->input->post(NULL, TRUE);
            
            
            unset($info["_wysihtml5_mode"]);
            $this->auth_role_capability_model->create( $info, $this->current_user_id );
            
            redirect("auth_role_capabilities/index");
			
        } else {
            $model = $this->get_model_name() . "_model";
            $page_data["model"] = $model;
            $page_data["access_type"] = "create";
            $content = $this->load->view("global/restricted", $page_data, TRUE);
            $this->create_view($content, "");
        }
    }

    public function edit_auth_role_capability () {

        $page_data["current_user_id"] = $this->current_user_id;
        $page_data["current_user_role"] = $this->current_user_role;
        $page_data["current_user_level"] = $this->current_user_level;
        $page_data["current_user_language"] = $this->current_user_language;

        if ( $this->get_update("auth_role_capabilities") ) {
            
            $page = $this->uri->segment("4",1);
            $page_data["page"] = $page;

            $role_capability_id = $this->uri->segment("5",0);
            $page_data["id"] = $role_capability_id;

            			
            $auth_role = $this->uri->segment("6",0);
            $page_data["auth_role"] = $auth_role;
            $auth_roles = $this->auth_role_capability_model->get_auth_roles_reference($this->current_user_id, $this->current_user_level);
            $page_data["auth_roles"] = $auth_roles;
						
            $gen_module = $this->uri->segment("8",0);
            $page_data["gen_module"] = $gen_module;
            $gen_modules = $this->auth_role_capability_model->get_gen_modules_reference($this->current_user_id, $this->current_user_level);
            $page_data["gen_modules"] = $gen_modules;
						
            $auth_user = $this->uri->segment("10",0);
            $page_data["auth_user"] = $auth_user;
            $auth_users = $this->auth_role_capability_model->get_auth_users_reference($this->current_user_id, $this->current_user_level);
            $page_data["auth_users"] = $auth_users;
			

            $auth_role_capability = $this->auth_role_capability_model->get_by_role_capability_id( $role_capability_id );
            

            $page_data["auth_role_capability"] = $auth_role_capability;

            $content = $this->load->view("auth_role_capabilities/edit",$page_data, TRUE);
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

        if ( $this->get_update("auth_role_capabilities") ) {
            
            $page = $this->uri->segment("4",1);
            $page_data["page"] = $page;

            $role_capability_id = $this->uri->segment("5",0);

            $info = $this->input->post();

            

            

            unset($info["_wysihtml5_mode"]);

            $this->auth_role_capability_model->update( $info, $role_capability_id );

            

            redirect("auth_role_capabilities/index/page/$page");
			
        } else {
            $model = $this->get_model_name() . "_model";
            $page_data["model"] = $model;
            $page_data["access_type"] = "update";
            $content = $this->load->view("global/restricted", $page_data, TRUE);
            $this->create_view($content, "");
        }
    }

    public function delete_auth_role_capability () {
        
        $page_data["current_user_id"] = $this->current_user_id;
        $page_data["current_user_role"] = $this->current_user_role;
        $page_data["current_user_level"] = $this->current_user_level;
        $page_data["current_user_language"] = $this->current_user_language;

        if ( $this->get_delete("auth_role_capabilities") ) {
            			
            $page = $this->uri->segment("4",0);
            $page_data["page"] = $page;

            $role_capability_id = $this->uri->segment("5",0);

            $info = $this->input->post();
            $this->auth_role_capability_model->delete( $role_capability_id );
            redirect("auth_role_capabilities/index");
			
        } else {
            $model = $this->get_model_name() . "_model";
            $page_data["model"] = $model;
            $page_data["access_type"] = "delete";
            $content = $this->load->view("global/restricted", $page_data, TRUE);
            $this->create_view($content, "");
        }
    }

    
}
