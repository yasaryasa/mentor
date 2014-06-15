<?php
/*
 * Bu Yazılım İmleç A.Ş. Tarafından Geliştirilmiştir. 
 * http://www.imlec.com.tr 
 * http://www.imleç.com.tr 
 */
class category_entries extends Imlec_Controller {


    public function category_entries() {
        parent::__construct();
    }

    public function index () {
        
        $page_data["current_user_id"] = $this->current_user_id;
        $page_data["current_user_role"] = $this->current_user_role;
        $page_data["current_user_level"] = $this->current_user_level;
        $page_data["current_user_language"] = $this->current_user_language;
            
        if ( $this->get_read("category_entries")) {
            
			
            $page = $this->uri->segment("4",1);
            $page_data["page"] = $page;

            			
            $entry = $this->uri->segment("6",0);
            $page_data["entry"] = $entry;
            $entries = $this->category_entry_model->get_entries_reference($this->current_user_id, $this->current_user_level);
            $page_data["entries"] = $entries;
						
            $category = $this->uri->segment("8",0);
            $page_data["category"] = $category;
            $categories = $this->category_entry_model->get_categories_reference($this->current_user_id, $this->current_user_level);
            $page_data["categories"] = $categories;
						
            $auth_user = $this->uri->segment("10",0);
            $page_data["auth_user"] = $auth_user;
            $auth_users = $this->category_entry_model->get_auth_users_reference($this->current_user_id, $this->current_user_level);
            $page_data["auth_users"] = $auth_users;
			

            $page_data["category_entries"] = $this->category_entry_model->get_category_entries( $page , $entry,$category,$auth_user,"", $this->current_user_id, $this->current_user_role, $this->current_user_level );
            $page_data["total_count"] = $this->category_entry_model->get_category_entries_count( $page , $entry,$category,$auth_user,"", $this->current_user_id, $this->current_user_role, $this->current_user_level);

            $content = $this->load->view("category_entries/list",$page_data, TRUE);
            $this->create_view($content, "");
			

        } else {
//             $model = $this->get_model_name() . "_model";
//             $page_data["model"] = $model;
//             $page_data["access_type"] = "read";
//             $content = $this->load->view("global/restricted", $page_data, TRUE);
//             $this->create_view($content, "");
        }
    }

    public function search () {
        $page_data["current_user_id"] = $this->current_user_id;
        $page_data["current_user_role"] = $this->current_user_role;
        $page_data["current_user_level"] = $this->current_user_level;
        $page_data["current_user_language"] = $this->current_user_language;
            
        if ( $this->get_read("category_entries")) {
            
			
            $page = $this->uri->segment("4",1);
            $page_data["page"] = $page;

            			
            $entry = $this->uri->segment("6",0);
            $page_data["entry"] = $entry;
            $entries = $this->category_entry_model->get_entries_reference($this->current_user_id, $this->current_user_level);
            $page_data["entries"] = $entries;
						
            $category = $this->uri->segment("8",0);
            $page_data["category"] = $category;
            $categories = $this->category_entry_model->get_categories_reference($this->current_user_id, $this->current_user_level);
            $page_data["categories"] = $categories;
						
            $auth_user = $this->uri->segment("10",0);
            $page_data["auth_user"] = $auth_user;
            $auth_users = $this->category_entry_model->get_auth_users_reference($this->current_user_id, $this->current_user_level);
            $page_data["auth_users"] = $auth_users;
			

            $term = $this->input->post("search_term");

            $page_data["search_term"] = $term;

            $page_data["category_entries"] = $this->category_entry_model->get_category_entries( $page , $entry,$category,$auth_user, $term , $this->current_user_id, $this->current_user_role, $this->current_user_level );

            $content = $this->load->view("category_entries/search",$page_data, TRUE);
            $this->create_view($content, "");
			

        } else {
            $model = $this->get_model_name() . "_model";
            $page_data["model"] = $model;
            $page_data["access_type"] = "read";
            $content = $this->load->view("global/restricted", $page_data, TRUE);
            $this->create_view($content, "");
        }
    }

    public function new_category_entry() {
        
        $page_data["current_user_id"] = $this->current_user_id;
        $page_data["current_user_role"] = $this->current_user_role;
        $page_data["current_user_level"] = $this->current_user_level;
        $page_data["current_user_language"] = $this->current_user_language;

        if ( $this->get_create("category_entries") ) {
            
            			
            $entry = $this->uri->segment("6",0);
            $page_data["entry"] = $entry;
            $entries = $this->category_entry_model->get_entries_reference($this->current_user_id, $this->current_user_level);
            $page_data["entries"] = $entries;
						
            $category = $this->uri->segment("8",0);
            $page_data["category"] = $category;
            $categories = $this->category_entry_model->get_categories_reference($this->current_user_id, $this->current_user_level);
            $page_data["categories"] = $categories;
						
            $auth_user = $this->uri->segment("10",0);
            $page_data["auth_user"] = $auth_user;
            $auth_users = $this->category_entry_model->get_auth_users_reference($this->current_user_id, $this->current_user_level);
            $page_data["auth_users"] = $auth_users;
			

            $content = $this->load->view("category_entries/new",$page_data, TRUE);
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

        if ( $this->get_create("category_entries") ) {
            
            $info = $this->input->post(NULL, TRUE);
            
            
            unset($info["_wysihtml5_mode"]);
            $this->category_entry_model->create( $info, $this->current_user_id );
            
            redirect("category_entries/index");
			
        } else {
            $model = $this->get_model_name() . "_model";
            $page_data["model"] = $model;
            $page_data["access_type"] = "create";
            $content = $this->load->view("global/restricted", $page_data, TRUE);
            $this->create_view($content, "");
        }
    }

    public function edit_category_entry () {

        $page_data["current_user_id"] = $this->current_user_id;
        $page_data["current_user_role"] = $this->current_user_role;
        $page_data["current_user_level"] = $this->current_user_level;
        $page_data["current_user_language"] = $this->current_user_language;

        if ( $this->get_update("category_entries") ) {
            
            $page = $this->uri->segment("4",1);
            $page_data["page"] = $page;

            $id = $this->uri->segment("5",0);
            $page_data["id"] = $id;

            			
            $entry = $this->uri->segment("6",0);
            $page_data["entry"] = $entry;
            $entries = $this->category_entry_model->get_entries_reference($this->current_user_id, $this->current_user_level);
            $page_data["entries"] = $entries;
						
            $category = $this->uri->segment("8",0);
            $page_data["category"] = $category;
            $categories = $this->category_entry_model->get_categories_reference($this->current_user_id, $this->current_user_level);
            $page_data["categories"] = $categories;
						
            $auth_user = $this->uri->segment("10",0);
            $page_data["auth_user"] = $auth_user;
            $auth_users = $this->category_entry_model->get_auth_users_reference($this->current_user_id, $this->current_user_level);
            $page_data["auth_users"] = $auth_users;
			

            $category_entry = $this->category_entry_model->get_by_id( $id );
            

            $page_data["category_entry"] = $category_entry;

            $content = $this->load->view("category_entries/edit",$page_data, TRUE);
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

        if ( $this->get_update("category_entries") ) {
            
            $page = $this->uri->segment("4",1);
            $page_data["page"] = $page;

            $id = $this->uri->segment("5",0);

            $info = $this->input->post();

            

            

            unset($info["_wysihtml5_mode"]);

            $this->category_entry_model->update( $info, $id );

            

            redirect("category_entries/index/page/$page");
			
        } else {
            $model = $this->get_model_name() . "_model";
            $page_data["model"] = $model;
            $page_data["access_type"] = "update";
            $content = $this->load->view("global/restricted", $page_data, TRUE);
            $this->create_view($content, "");
        }
    }

    public function delete_category_entry () {
        
        $page_data["current_user_id"] = $this->current_user_id;
        $page_data["current_user_role"] = $this->current_user_role;
        $page_data["current_user_level"] = $this->current_user_level;
        $page_data["current_user_language"] = $this->current_user_language;

        if ( $this->get_delete("category_entries") ) {
            			
            $page = $this->uri->segment("4",0);
            $page_data["page"] = $page;

            $id = $this->uri->segment("5",0);

            $info = $this->input->post();
            $this->category_entry_model->delete( $id );
            redirect("category_entries/index");
			
        } else {
            $model = $this->get_model_name() . "_model";
            $page_data["model"] = $model;
            $page_data["access_type"] = "delete";
            $content = $this->load->view("global/restricted", $page_data, TRUE);
            $this->create_view($content, "");
        }
    }

    
}
