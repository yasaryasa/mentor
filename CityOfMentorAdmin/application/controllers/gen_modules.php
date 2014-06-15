<?php
/*
 * Bu Yazılım İmleç A.Ş. Tarafından Geliştirilmiştir. 
 * http://www.imlec.com.tr 
 * http://www.imleç.com.tr 
 */
class gen_modules extends Imlec_Controller {


    public function gen_modules() {
        parent::__construct();
    }

    public function index () {
        
        $page_data["current_user_id"] = $this->current_user_id;
        $page_data["current_user_role"] = $this->current_user_role;
        $page_data["current_user_level"] = $this->current_user_level;
        $page_data["current_user_language"] = $this->current_user_language;
            
        if ( $this->get_read("gen_modules")) {
            
			
            $page = $this->uri->segment("4",1);
            $page_data["page"] = $page;

            			
            $gen_module_group = $this->uri->segment("6",0);
            $page_data["gen_module_group"] = $gen_module_group;
            $gen_module_groups = $this->gen_module_model->get_gen_module_groups_reference($this->current_user_id, $this->current_user_level);
            $page_data["gen_module_groups"] = $gen_module_groups;
						
            $auth_user = $this->uri->segment("8",0);
            $page_data["auth_user"] = $auth_user;
            $auth_users = $this->gen_module_model->get_auth_users_reference($this->current_user_id, $this->current_user_level);
            $page_data["auth_users"] = $auth_users;
			

            $page_data["gen_modules"] = $this->gen_module_model->get_gen_modules( $page , $gen_module_group,$auth_user,"", $this->current_user_id, $this->current_user_role, $this->current_user_level );
            $page_data["total_count"] = $this->gen_module_model->get_gen_modules_count( $page , $gen_module_group,$auth_user,"", $this->current_user_id, $this->current_user_role, $this->current_user_level);

            $content = $this->load->view("gen_modules/list",$page_data, TRUE);
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
            
        if ( $this->get_read("gen_modules")) {
            
			
            $page = $this->uri->segment("4",1);
            $page_data["page"] = $page;

            			
            $gen_module_group = $this->uri->segment("6",0);
            $page_data["gen_module_group"] = $gen_module_group;
            $gen_module_groups = $this->gen_module_model->get_gen_module_groups_reference($this->current_user_id, $this->current_user_level);
            $page_data["gen_module_groups"] = $gen_module_groups;
						
            $auth_user = $this->uri->segment("8",0);
            $page_data["auth_user"] = $auth_user;
            $auth_users = $this->gen_module_model->get_auth_users_reference($this->current_user_id, $this->current_user_level);
            $page_data["auth_users"] = $auth_users;
			

            $term = $this->input->post("search_term");

            $page_data["search_term"] = $term;

            $page_data["gen_modules"] = $this->gen_module_model->get_gen_modules( $page , $gen_module_group,$auth_user, $term , $this->current_user_id, $this->current_user_role, $this->current_user_level );

            $content = $this->load->view("gen_modules/search",$page_data, TRUE);
            $this->create_view($content, "");
			

        } else {
            $model = $this->get_model_name() . "_model";
            $page_data["model"] = $model;
            $page_data["access_type"] = "read";
            $content = $this->load->view("global/restricted", $page_data, TRUE);
            $this->create_view($content, "");
        }
    }

    public function new_gen_module() {
        
        $page_data["current_user_id"] = $this->current_user_id;
        $page_data["current_user_role"] = $this->current_user_role;
        $page_data["current_user_level"] = $this->current_user_level;
        $page_data["current_user_language"] = $this->current_user_language;

        if ( $this->get_create("gen_modules") ) {
            
            			
            $gen_module_group = $this->uri->segment("6",0);
            $page_data["gen_module_group"] = $gen_module_group;
            $gen_module_groups = $this->gen_module_model->get_gen_module_groups_reference($this->current_user_id, $this->current_user_level);
            $page_data["gen_module_groups"] = $gen_module_groups;
						
            $auth_user = $this->uri->segment("8",0);
            $page_data["auth_user"] = $auth_user;
            $auth_users = $this->gen_module_model->get_auth_users_reference($this->current_user_id, $this->current_user_level);
            $page_data["auth_users"] = $auth_users;
			

            $content = $this->load->view("gen_modules/new",$page_data, TRUE);
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

        if ( $this->get_create("gen_modules") ) {
            
            $info = $this->input->post(NULL, TRUE);
            
            
            unset($info["_wysihtml5_mode"]);
            $this->gen_module_model->create( $info, $this->current_user_id );
            
            redirect("gen_modules/index");
			
        } else {
            $model = $this->get_model_name() . "_model";
            $page_data["model"] = $model;
            $page_data["access_type"] = "create";
            $content = $this->load->view("global/restricted", $page_data, TRUE);
            $this->create_view($content, "");
        }
    }

    public function edit_gen_module () {

        $page_data["current_user_id"] = $this->current_user_id;
        $page_data["current_user_role"] = $this->current_user_role;
        $page_data["current_user_level"] = $this->current_user_level;
        $page_data["current_user_language"] = $this->current_user_language;

        if ( $this->get_update("gen_modules") ) {
            
            $page = $this->uri->segment("4",1);
            $page_data["page"] = $page;

            $module_id = $this->uri->segment("5",0);
            $page_data["id"] = $module_id;

            			
            $gen_module_group = $this->uri->segment("6",0);
            $page_data["gen_module_group"] = $gen_module_group;
            $gen_module_groups = $this->gen_module_model->get_gen_module_groups_reference($this->current_user_id, $this->current_user_level);
            $page_data["gen_module_groups"] = $gen_module_groups;
						
            $auth_user = $this->uri->segment("8",0);
            $page_data["auth_user"] = $auth_user;
            $auth_users = $this->gen_module_model->get_auth_users_reference($this->current_user_id, $this->current_user_level);
            $page_data["auth_users"] = $auth_users;
			

            $gen_module = $this->gen_module_model->get_by_module_id( $module_id );
            

            $page_data["gen_module"] = $gen_module;

            $content = $this->load->view("gen_modules/edit",$page_data, TRUE);
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

        if ( $this->get_update("gen_modules") ) {
            
            $page = $this->uri->segment("4",1);
            $page_data["page"] = $page;

            $module_id = $this->uri->segment("5",0);

            $info = $this->input->post();

            

            

            unset($info["_wysihtml5_mode"]);

            $this->gen_module_model->update( $info, $module_id );

            

            redirect("gen_modules/index/page/$page");
			
        } else {
            $model = $this->get_model_name() . "_model";
            $page_data["model"] = $model;
            $page_data["access_type"] = "update";
            $content = $this->load->view("global/restricted", $page_data, TRUE);
            $this->create_view($content, "");
        }
    }

    public function delete_gen_module () {
        
        $page_data["current_user_id"] = $this->current_user_id;
        $page_data["current_user_role"] = $this->current_user_role;
        $page_data["current_user_level"] = $this->current_user_level;
        $page_data["current_user_language"] = $this->current_user_language;

        if ( $this->get_delete("gen_modules") ) {
            			
            $page = $this->uri->segment("4",0);
            $page_data["page"] = $page;

            $module_id = $this->uri->segment("5",0);

            $info = $this->input->post();
            $this->gen_module_model->delete( $module_id );
            redirect("gen_modules/index");
			
        } else {
            $model = $this->get_model_name() . "_model";
            $page_data["model"] = $model;
            $page_data["access_type"] = "delete";
            $content = $this->load->view("global/restricted", $page_data, TRUE);
            $this->create_view($content, "");
        }
    }

    
}
