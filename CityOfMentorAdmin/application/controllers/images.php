<?php
/*
 * Bu Yazılım İmleç A.Ş. Tarafından Geliştirilmiştir. 
 * http://www.imlec.com.tr 
 * http://www.imleç.com.tr 
 */
class images extends Imlec_Controller {


    public function images() {
        parent::__construct();
    }

    public function index () {
        
        $page_data["current_user_id"] = $this->current_user_id;
        $page_data["current_user_role"] = $this->current_user_role;
        $page_data["current_user_level"] = $this->current_user_level;
        $page_data["current_user_language"] = $this->current_user_language;
            
        if ( $this->get_read("images")) {
            
			
            $page = $this->uri->segment("4",1);
            $page_data["page"] = $page;

            			
            $entry = $this->uri->segment("6",0);
            $page_data["entry"] = $entry;
            $entries = $this->image_model->get_entries_reference($this->current_user_id, $this->current_user_level);
            $page_data["entries"] = $entries;
						
            $auth_user = $this->uri->segment("8",0);
            $page_data["auth_user"] = $auth_user;
            $auth_users = $this->image_model->get_auth_users_reference($this->current_user_id, $this->current_user_level);
            $page_data["auth_users"] = $auth_users;
			

            $page_data["images"] = $this->image_model->get_images( $page , $entry,$auth_user,"", $this->current_user_id, $this->current_user_role, $this->current_user_level );
            $page_data["total_count"] = $this->image_model->get_images_count( $page , $entry,$auth_user,"", $this->current_user_id, $this->current_user_role, $this->current_user_level);

            $content = $this->load->view("images/list",$page_data, TRUE);
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
            
        if ( $this->get_read("images")) {
            
			
            $page = $this->uri->segment("4",1);
            $page_data["page"] = $page;

            			
            $entry = $this->uri->segment("6",0);
            $page_data["entry"] = $entry;
            $entries = $this->image_model->get_entries_reference($this->current_user_id, $this->current_user_level);
            $page_data["entries"] = $entries;
						
            $auth_user = $this->uri->segment("8",0);
            $page_data["auth_user"] = $auth_user;
            $auth_users = $this->image_model->get_auth_users_reference($this->current_user_id, $this->current_user_level);
            $page_data["auth_users"] = $auth_users;
			

            $term = $this->input->post("search_term");

            $page_data["search_term"] = $term;

            $page_data["images"] = $this->image_model->get_images( $page , $entry,$auth_user, $term , $this->current_user_id, $this->current_user_role, $this->current_user_level );

            $content = $this->load->view("images/search",$page_data, TRUE);
            $this->create_view($content, "");
			

        } else {
            $model = $this->get_model_name() . "_model";
            $page_data["model"] = $model;
            $page_data["access_type"] = "read";
            $content = $this->load->view("global/restricted", $page_data, TRUE);
            $this->create_view($content, "");
        }
    }

    public function new_image() {
        
        $page_data["current_user_id"] = $this->current_user_id;
        $page_data["current_user_role"] = $this->current_user_role;
        $page_data["current_user_level"] = $this->current_user_level;
        $page_data["current_user_language"] = $this->current_user_language;

        if ( $this->get_create("images") ) {
            
            			
            $entry = $this->uri->segment("6",0);
            $page_data["entry"] = $entry;
            $entries = $this->image_model->get_entries_reference($this->current_user_id, $this->current_user_level);
            $page_data["entries"] = $entries;
						
            $auth_user = $this->uri->segment("8",0);
            $page_data["auth_user"] = $auth_user;
            $auth_users = $this->image_model->get_auth_users_reference($this->current_user_id, $this->current_user_level);
            $page_data["auth_users"] = $auth_users;
			

            $content = $this->load->view("images/new",$page_data, TRUE);
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

        if ( $this->get_create("images") ) {
            
            $info = $this->input->post(NULL, TRUE);
            
            
            unset($info["_wysihtml5_mode"]);
            $this->image_model->create( $info, $this->current_user_id );
            
            redirect("images/index");
			
        } else {
            $model = $this->get_model_name() . "_model";
            $page_data["model"] = $model;
            $page_data["access_type"] = "create";
            $content = $this->load->view("global/restricted", $page_data, TRUE);
            $this->create_view($content, "");
        }
    }

    public function edit_image () {

        $page_data["current_user_id"] = $this->current_user_id;
        $page_data["current_user_role"] = $this->current_user_role;
        $page_data["current_user_level"] = $this->current_user_level;
        $page_data["current_user_language"] = $this->current_user_language;

        if ( $this->get_update("images") ) {
            
            $page = $this->uri->segment("4",1);
            $page_data["page"] = $page;

            $id = $this->uri->segment("5",0);
            $page_data["id"] = $id;

            			
            $entry = $this->uri->segment("6",0);
            $page_data["entry"] = $entry;
            $entries = $this->image_model->get_entries_reference($this->current_user_id, $this->current_user_level);
            $page_data["entries"] = $entries;
						
            $auth_user = $this->uri->segment("8",0);
            $page_data["auth_user"] = $auth_user;
            $auth_users = $this->image_model->get_auth_users_reference($this->current_user_id, $this->current_user_level);
            $page_data["auth_users"] = $auth_users;
			

            $image = $this->image_model->get_by_id( $id );
            

            $page_data["image"] = $image;

            $content = $this->load->view("images/edit",$page_data, TRUE);
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

        if ( $this->get_update("images") ) {
            
            $page = $this->uri->segment("4",1);
            $page_data["page"] = $page;

            $id = $this->uri->segment("5",0);

            $info = $this->input->post();

            

            

            unset($info["_wysihtml5_mode"]);

            $this->image_model->update( $info, $id );

            

            redirect("images/index/page/$page");
			
        } else {
            $model = $this->get_model_name() . "_model";
            $page_data["model"] = $model;
            $page_data["access_type"] = "update";
            $content = $this->load->view("global/restricted", $page_data, TRUE);
            $this->create_view($content, "");
        }
    }

    public function delete_image () {
        
        $page_data["current_user_id"] = $this->current_user_id;
        $page_data["current_user_role"] = $this->current_user_role;
        $page_data["current_user_level"] = $this->current_user_level;
        $page_data["current_user_language"] = $this->current_user_language;

        if ( $this->get_delete("images") ) {
            			
            $page = $this->uri->segment("4",0);
            $page_data["page"] = $page;

            $id = $this->uri->segment("5",0);

            $info = $this->input->post();
            $this->image_model->delete( $id );
            redirect("images/index");
			
        } else {
            $model = $this->get_model_name() . "_model";
            $page_data["model"] = $model;
            $page_data["access_type"] = "delete";
            $content = $this->load->view("global/restricted", $page_data, TRUE);
            $this->create_view($content, "");
        }
    }

    
}
