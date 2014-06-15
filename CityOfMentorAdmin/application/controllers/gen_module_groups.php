<?php
/*
 * Bu Yazılım İmleç A.Ş. Tarafından Geliştirilmiştir. 
 * http://www.imlec.com.tr 
 * http://www.imleç.com.tr 
 */
class gen_module_groups extends Imlec_Controller {


    public function gen_module_groups() {
        parent::__construct();
    }

    public function index () {
        
        $page_data["current_user_id"] = $this->current_user_id;
        $page_data["current_user_role"] = $this->current_user_role;
        $page_data["current_user_level"] = $this->current_user_level;
        $page_data["current_user_language"] = $this->current_user_language;
            
        if ( $this->get_read("gen_module_groups")) {
            
			
            $page = $this->uri->segment("4",1);
            $page_data["page"] = $page;

            			
            $gen_module_position = $this->uri->segment("6",0);
            $page_data["gen_module_position"] = $gen_module_position;
            $gen_module_positions = $this->gen_module_group_model->get_gen_module_positions_reference($this->current_user_id, $this->current_user_level);
            $page_data["gen_module_positions"] = $gen_module_positions;
						
            $auth_user = $this->uri->segment("8",0);
            $page_data["auth_user"] = $auth_user;
            $auth_users = $this->gen_module_group_model->get_auth_users_reference($this->current_user_id, $this->current_user_level);
            $page_data["auth_users"] = $auth_users;
			

            $page_data["gen_module_groups"] = $this->gen_module_group_model->get_gen_module_groups( $page , $gen_module_position,$auth_user,"", $this->current_user_id, $this->current_user_role, $this->current_user_level );
            $page_data["total_count"] = $this->gen_module_group_model->get_gen_module_groups_count( $page , $gen_module_position,$auth_user,"", $this->current_user_id, $this->current_user_role, $this->current_user_level);

            $content = $this->load->view("gen_module_groups/list",$page_data, TRUE);
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
            
        if ( $this->get_read("gen_module_groups")) {
            
			
            $page = $this->uri->segment("4",1);
            $page_data["page"] = $page;

            			
            $gen_module_position = $this->uri->segment("6",0);
            $page_data["gen_module_position"] = $gen_module_position;
            $gen_module_positions = $this->gen_module_group_model->get_gen_module_positions_reference($this->current_user_id, $this->current_user_level);
            $page_data["gen_module_positions"] = $gen_module_positions;
						
            $auth_user = $this->uri->segment("8",0);
            $page_data["auth_user"] = $auth_user;
            $auth_users = $this->gen_module_group_model->get_auth_users_reference($this->current_user_id, $this->current_user_level);
            $page_data["auth_users"] = $auth_users;
			

            $term = $this->input->post("search_term");

            $page_data["search_term"] = $term;

            $page_data["gen_module_groups"] = $this->gen_module_group_model->get_gen_module_groups( $page , $gen_module_position,$auth_user, $term , $this->current_user_id, $this->current_user_role, $this->current_user_level );

            $content = $this->load->view("gen_module_groups/search",$page_data, TRUE);
            $this->create_view($content, "");
			

        } else {
            $model = $this->get_model_name() . "_model";
            $page_data["model"] = $model;
            $page_data["access_type"] = "read";
            $content = $this->load->view("global/restricted", $page_data, TRUE);
            $this->create_view($content, "");
        }
    }

    public function new_gen_module_group() {
        
        $page_data["current_user_id"] = $this->current_user_id;
        $page_data["current_user_role"] = $this->current_user_role;
        $page_data["current_user_level"] = $this->current_user_level;
        $page_data["current_user_language"] = $this->current_user_language;

        if ( $this->get_create("gen_module_groups") ) {
            
            			
            $gen_module_position = $this->uri->segment("6",0);
            $page_data["gen_module_position"] = $gen_module_position;
            $gen_module_positions = $this->gen_module_group_model->get_gen_module_positions_reference($this->current_user_id, $this->current_user_level);
            $page_data["gen_module_positions"] = $gen_module_positions;
						
            $auth_user = $this->uri->segment("8",0);
            $page_data["auth_user"] = $auth_user;
            $auth_users = $this->gen_module_group_model->get_auth_users_reference($this->current_user_id, $this->current_user_level);
            $page_data["auth_users"] = $auth_users;
			

            $content = $this->load->view("gen_module_groups/new",$page_data, TRUE);
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

        if ( $this->get_create("gen_module_groups") ) {
            
            $info = $this->input->post(NULL, TRUE);
            
            
            unset($info["_wysihtml5_mode"]);
            $this->gen_module_group_model->create( $info, $this->current_user_id );
            
            redirect("gen_module_groups/index");
			
        } else {
            $model = $this->get_model_name() . "_model";
            $page_data["model"] = $model;
            $page_data["access_type"] = "create";
            $content = $this->load->view("global/restricted", $page_data, TRUE);
            $this->create_view($content, "");
        }
    }

    public function edit_gen_module_group () {

        $page_data["current_user_id"] = $this->current_user_id;
        $page_data["current_user_role"] = $this->current_user_role;
        $page_data["current_user_level"] = $this->current_user_level;
        $page_data["current_user_language"] = $this->current_user_language;

        if ( $this->get_update("gen_module_groups") ) {
            
            $page = $this->uri->segment("4",1);
            $page_data["page"] = $page;

            $module_group_id = $this->uri->segment("5",0);
            $page_data["id"] = $module_group_id;

            			
            $gen_module_position = $this->uri->segment("6",0);
            $page_data["gen_module_position"] = $gen_module_position;
            $gen_module_positions = $this->gen_module_group_model->get_gen_module_positions_reference($this->current_user_id, $this->current_user_level);
            $page_data["gen_module_positions"] = $gen_module_positions;
						
            $auth_user = $this->uri->segment("8",0);
            $page_data["auth_user"] = $auth_user;
            $auth_users = $this->gen_module_group_model->get_auth_users_reference($this->current_user_id, $this->current_user_level);
            $page_data["auth_users"] = $auth_users;
			

            $gen_module_group = $this->gen_module_group_model->get_by_module_group_id( $module_group_id );
            

            $page_data["gen_module_group"] = $gen_module_group;

            $content = $this->load->view("gen_module_groups/edit",$page_data, TRUE);
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

        if ( $this->get_update("gen_module_groups") ) {
            
            $page = $this->uri->segment("4",1);
            $page_data["page"] = $page;

            $module_group_id = $this->uri->segment("5",0);

            $info = $this->input->post();

            

            

            unset($info["_wysihtml5_mode"]);

            $this->gen_module_group_model->update( $info, $module_group_id );

            

            redirect("gen_module_groups/index/page/$page");
			
        } else {
            $model = $this->get_model_name() . "_model";
            $page_data["model"] = $model;
            $page_data["access_type"] = "update";
            $content = $this->load->view("global/restricted", $page_data, TRUE);
            $this->create_view($content, "");
        }
    }

    public function delete_gen_module_group () {
        
        $page_data["current_user_id"] = $this->current_user_id;
        $page_data["current_user_role"] = $this->current_user_role;
        $page_data["current_user_level"] = $this->current_user_level;
        $page_data["current_user_language"] = $this->current_user_language;

        if ( $this->get_delete("gen_module_groups") ) {
            			
            $page = $this->uri->segment("4",0);
            $page_data["page"] = $page;

            $module_group_id = $this->uri->segment("5",0);

            $info = $this->input->post();
            $this->gen_module_group_model->delete( $module_group_id );
            redirect("gen_module_groups/index");
			
        } else {
            $model = $this->get_model_name() . "_model";
            $page_data["model"] = $model;
            $page_data["access_type"] = "delete";
            $content = $this->load->view("global/restricted", $page_data, TRUE);
            $this->create_view($content, "");
        }
    }

    
}
