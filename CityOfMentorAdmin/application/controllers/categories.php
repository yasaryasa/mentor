<?php
/*
 * Bu Yazılım İmleç A.Ş. Tarafından Geliştirilmiştir. 
 * http://www.imlec.com.tr 
 * http://www.imleç.com.tr 
 */
class categories extends Imlec_Controller {


    public function categories() {
        parent::__construct();
    }

    public function index () {
        
        $page_data["current_user_id"] = $this->current_user_id;
        $page_data["current_user_role"] = $this->current_user_role;
        $page_data["current_user_level"] = $this->current_user_level;
        $page_data["current_user_language"] = $this->current_user_language;
            
        if ( $this->get_read("categories")) {
            
			
            $page = $this->uri->segment("4",1);
            $page_data["page"] = $page;

            			
            $auth_user = $this->uri->segment("6",0);
            $page_data["auth_user"] = $auth_user;
            $auth_users = $this->category_model->get_auth_users_reference($this->current_user_id, $this->current_user_level);
            $page_data["auth_users"] = $auth_users;
			

            $page_data["categories"] = $this->category_model->get_categories( $page , $auth_user,"", $this->current_user_id, $this->current_user_role, $this->current_user_level );
            $page_data["total_count"] = $this->category_model->get_categories_count( $page , $auth_user,"", $this->current_user_id, $this->current_user_role, $this->current_user_level);

            $content = $this->load->view("categories/list",$page_data, TRUE);
            $this->create_view($content, "");
			

        } else {
//             $model = $this->get_model_name() . "_model";
//             $page_data["model"] = $model;
//             $page_data["access_type"] = "read";
//             $content = $this->load->view("global/restricted", $page_data, TRUE);
//             $this->create_view($content, "");
        }
    }

    public function list_entries () {
        $page_data["current_user_id"] = $this->current_user_id;
        $page_data["current_user_role"] = $this->current_user_role;
        $page_data["current_user_level"] = $this->current_user_level;
        $page_data["current_user_language"] = $this->current_user_language;

        ///index/page/1/entry/0/category/1/auth_user/0/
        $content = $this->load->view("categories/list_entries",$page_data, TRUE);
        $this->create_view($content, "");
        	
//         $c_id = $this->uri->segment(4);
//         echo "c id = ".$c_id;
//         $entries = $this->category_model->get_entries_of_category ($c_id);
//         echo "entry = ".sizeof($entries);
        
    }
    
    
    public function search () {
        $page_data["current_user_id"] = $this->current_user_id;
        $page_data["current_user_role"] = $this->current_user_role;
        $page_data["current_user_level"] = $this->current_user_level;
        $page_data["current_user_language"] = $this->current_user_language;
            
        if ( $this->get_read("categories")) {
            
			
            $page = $this->uri->segment("4",1);
            $page_data["page"] = $page;

            			
            $auth_user = $this->uri->segment("6",0);
            $page_data["auth_user"] = $auth_user;
            $auth_users = $this->category_model->get_auth_users_reference($this->current_user_id, $this->current_user_level);
            $page_data["auth_users"] = $auth_users;
			

            $term = $this->input->post("search_term");

            $page_data["search_term"] = $term;

            $page_data["categories"] = $this->category_model->get_categories( $page , $auth_user, $term , $this->current_user_id, $this->current_user_role, $this->current_user_level );

            $content = $this->load->view("categories/search",$page_data, TRUE);
            $this->create_view($content, "");
			

        } else {
            $model = $this->get_model_name() . "_model";
            $page_data["model"] = $model;
            $page_data["access_type"] = "read";
            $content = $this->load->view("global/restricted", $page_data, TRUE);
            $this->create_view($content, "");
        }
    }

    public function new_category() {
        
        $page_data["current_user_id"] = $this->current_user_id;
        $page_data["current_user_role"] = $this->current_user_role;
        $page_data["current_user_level"] = $this->current_user_level;
        $page_data["current_user_language"] = $this->current_user_language;

        if ( $this->get_create("categories") ) {
            
            			
            $auth_user = $this->uri->segment("6",0);
            $page_data["auth_user"] = $auth_user;
            $auth_users = $this->category_model->get_auth_users_reference($this->current_user_id, $this->current_user_level);
            $page_data["auth_users"] = $auth_users;
			

            $content = $this->load->view("categories/new",$page_data, TRUE);
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

        if ( $this->get_create("categories") ) {
            
            $info = $this->input->post(NULL, TRUE);
            
            
            unset($info["_wysihtml5_mode"]);
            $this->category_model->create( $info, $this->current_user_id );
            
            redirect("categories/index");
			
        } else {
            $model = $this->get_model_name() . "_model";
            $page_data["model"] = $model;
            $page_data["access_type"] = "create";
            $content = $this->load->view("global/restricted", $page_data, TRUE);
            $this->create_view($content, "");
        }
    }

    public function edit_category () {

        $page_data["current_user_id"] = $this->current_user_id;
        $page_data["current_user_role"] = $this->current_user_role;
        $page_data["current_user_level"] = $this->current_user_level;
        $page_data["current_user_language"] = $this->current_user_language;

        if ( $this->get_update("categories") ) {
            
            $page = $this->uri->segment("4",1);
            $page_data["page"] = $page;

            $id = $this->uri->segment("5",0);
            $page_data["id"] = $id;

            			
            $auth_user = $this->uri->segment("6",0);
            $page_data["auth_user"] = $auth_user;
            $auth_users = $this->category_model->get_auth_users_reference($this->current_user_id, $this->current_user_level);
            $page_data["auth_users"] = $auth_users;
			

            $category = $this->category_model->get_by_id( $id );
            

            $page_data["category"] = $category;

            $content = $this->load->view("categories/edit",$page_data, TRUE);
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

        if ( $this->get_update("categories") ) {
            
            $page = $this->uri->segment("4",1);
            $page_data["page"] = $page;

            $id = $this->uri->segment("5",0);

            $info = $this->input->post();
            
            unset($info["_wysihtml5_mode"]);

            $this->category_model->update( $info, $id );

            redirect("categories/index/page/$page");
			
        } else {
            $model = $this->get_model_name() . "_model";
            $page_data["model"] = $model;
            $page_data["access_type"] = "update";
            $content = $this->load->view("global/restricted", $page_data, TRUE);
            $this->create_view($content, "");
        }
    }

    public function delete_category () {
        
        $page_data["current_user_id"] = $this->current_user_id;
        $page_data["current_user_role"] = $this->current_user_role;
        $page_data["current_user_level"] = $this->current_user_level;
        $page_data["current_user_language"] = $this->current_user_language;

        if ( $this->get_delete("categories") ) {
            			
            $page = $this->uri->segment("4",0);
            $page_data["page"] = $page;

            $id = $this->uri->segment("5",0);

            $info = $this->input->post();
            $this->category_model->delete( $id );
            redirect("categories/index");
			
        } else {
            $model = $this->get_model_name() . "_model";
            $page_data["model"] = $model;
            $page_data["access_type"] = "delete";
            $content = $this->load->view("global/restricted", $page_data, TRUE);
            $this->create_view($content, "");
        }
    }

    
}
