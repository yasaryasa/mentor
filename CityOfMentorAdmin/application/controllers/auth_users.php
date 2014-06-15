<?php
/*
 * Bu Yazılım İmleç A.Ş. Tarafından Geliştirilmiştir. 
 * http://www.imlec.com.tr 
 * http://www.imleç.com.tr 
 */
class auth_users extends Imlec_Controller {


    public function auth_users() {
        parent::__construct();
    }

    public function index () {
        
        $page_data["current_user_id"] = $this->current_user_id;
        $page_data["current_user_role"] = $this->current_user_role;
        $page_data["current_user_level"] = $this->current_user_level;
        $page_data["current_user_language"] = $this->current_user_language;
            
        if ( $this->get_read("auth_users")) {
            
			
            $page = $this->uri->segment("4",1);
            $page_data["page"] = $page;

            			
            $auth_role = $this->uri->segment("6",0);
            $page_data["auth_role"] = $auth_role;
            $auth_roles = $this->auth_user_model->get_auth_roles_reference($this->current_user_id, $this->current_user_level);
            $page_data["auth_roles"] = $auth_roles;
						
            $auth_user = $this->uri->segment("8",0);
            $page_data["auth_user"] = $auth_user;
            $auth_users = $this->auth_user_model->get_auth_users_reference($this->current_user_id, $this->current_user_level);
            $page_data["auth_users"] = $auth_users;
			

            $page_data["auth_users"] = $this->auth_user_model->get_auth_users( $page , $auth_role,$auth_user,"", $this->current_user_id, $this->current_user_role, $this->current_user_level );
            $page_data["total_count"] = $this->auth_user_model->get_auth_users_count( $page , $auth_role,$auth_user,"", $this->current_user_id, $this->current_user_role, $this->current_user_level);

            $content = $this->load->view("auth_users/list",$page_data, TRUE);
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
            
        if ( $this->get_read("auth_users")) {
            
			
            $page = $this->uri->segment("4",1);
            $page_data["page"] = $page;

            			
            $auth_role = $this->uri->segment("6",0);
            $page_data["auth_role"] = $auth_role;
            $auth_roles = $this->auth_user_model->get_auth_roles_reference($this->current_user_id, $this->current_user_level);
            $page_data["auth_roles"] = $auth_roles;
						
            $auth_user = $this->uri->segment("8",0);
            $page_data["auth_user"] = $auth_user;
            $auth_users = $this->auth_user_model->get_auth_users_reference($this->current_user_id, $this->current_user_level);
            $page_data["auth_users"] = $auth_users;
			

            $term = $this->input->post("search_term");

            $page_data["search_term"] = $term;

            $page_data["auth_users"] = $this->auth_user_model->get_auth_users( $page , $auth_role,$auth_user, $term , $this->current_user_id, $this->current_user_role, $this->current_user_level );

            $content = $this->load->view("auth_users/search",$page_data, TRUE);
            $this->create_view($content, "");
			

        } else {
            $model = $this->get_model_name() . "_model";
            $page_data["model"] = $model;
            $page_data["access_type"] = "read";
            $content = $this->load->view("global/restricted", $page_data, TRUE);
            $this->create_view($content, "");
        }
    }

    public function new_auth_user() {
        
        $page_data["current_user_id"] = $this->current_user_id;
        $page_data["current_user_role"] = $this->current_user_role;
        $page_data["current_user_level"] = $this->current_user_level;
        $page_data["current_user_language"] = $this->current_user_language;

        if ( $this->get_create("auth_users") ) {
            
            			
            $auth_role = $this->uri->segment("6",0);
            $page_data["auth_role"] = $auth_role;
            $auth_roles = $this->auth_user_model->get_auth_roles_reference($this->current_user_id, $this->current_user_level);
            $page_data["auth_roles"] = $auth_roles;
						
            $auth_user = $this->uri->segment("8",0);
            $page_data["auth_user"] = $auth_user;
            $auth_users = $this->auth_user_model->get_auth_users_reference($this->current_user_id, $this->current_user_level);
            $page_data["auth_users"] = $auth_users;
			

            $content = $this->load->view("auth_users/new",$page_data, TRUE);
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

        if ( $this->get_create("auth_users") ) {
            
            $info = $this->input->post(NULL, TRUE);
            
            			
//             $file = $info["user_profile_image"];
//             $info["user_profile_image"] = file_get_contents( UPLOAD_DIR ."/".$this->current_user_role ."/".$this->current_user_id."/". $file);
//             unset($info["_wysihtml5_mode"]);
//             $this->auth_user_model->create( $info, $this->current_user_id );
            
// 			unlink( UPLOAD_DIR ."/".$this->current_user_role ."/".$this->current_user_id."/".$file);

            if (!empty($info["user_profile_image"])) {
            	$file = $info["user_profile_image"];
            	$info["user_profile_image"] = file_get_contents( UPLOAD_DIR ."/".$this->current_role_id ."/".$this->current_user_id."/". $file);
            } else {
            	unset($info["user_profile_image"]);
            }
            	
            $info["user_password"] = sha1($info["user_password"]);
            
            $this->auth_user_model->create( $info, $this->current_user_id );
            
            redirect("auth_users/index");
			
        } else {
            $model = $this->get_model_name() . "_model";
            $page_data["model"] = $model;
            $page_data["access_type"] = "create";
            $content = $this->load->view("global/restricted", $page_data, TRUE);
            $this->create_view($content, "");
        }
    }

    public function edit_auth_user () {

        $page_data["current_user_id"] = $this->current_user_id;
        $page_data["current_user_role"] = $this->current_user_role;
        $page_data["current_user_level"] = $this->current_user_level;
        $page_data["current_user_language"] = $this->current_user_language;

        if ( $this->get_update("auth_users") ) {
            
            $page = $this->uri->segment("4",1);
            $page_data["page"] = $page;

            $user_id = $this->uri->segment("5",0);
            $page_data["id"] = $user_id;

            			
            $auth_role = $this->uri->segment("6",0);
            $page_data["auth_role"] = $auth_role;
            $auth_roles = $this->auth_user_model->get_auth_roles_reference($this->current_user_id, $this->current_user_level);
            $page_data["auth_roles"] = $auth_roles;
						
            $auth_user = $this->uri->segment("8",0);
            $page_data["auth_user"] = $auth_user;
            $auth_users = $this->auth_user_model->get_auth_users_reference($this->current_user_id, $this->current_user_level);
            $page_data["auth_users"] = $auth_users;
			

            $auth_user = $this->auth_user_model->get_by_user_id( $user_id );
            

            $page_data["auth_user"] = $auth_user;

            $content = $this->load->view("auth_users/edit",$page_data, TRUE);
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

        if ( $this->get_update("auth_users") ) {
            
            $page = $this->uri->segment("4",1);
            $page_data["page"] = $page;

            $user_id = $this->uri->segment("5",0);

            $info = $this->input->post();

            if (!empty($info["user_profile_image"])) {
                $file = $info["user_profile_image"];
                $info["user_profile_image"] = file_get_contents( UPLOAD_DIR ."/".$this->current_role_id ."/".$this->current_user_id."/". $file);
            } else {
                unset($info["user_profile_image"]);
            }
			
            $info["user_password"] = sha1($info["user_password"]);
            
            unset($info["_wysihtml5_mode"]);

            $this->auth_user_model->update( $info, $user_id );

            
            if (!empty($info["user_profile_image"]))
				unlink( UPLOAD_DIR ."/".$this->current_user_role ."/".$this->current_user_id."/".$file);

            redirect("auth_users/index/page/$page");
			
        } else {
            $model = $this->get_model_name() . "_model";
            $page_data["model"] = $model;
            $page_data["access_type"] = "update";
            $content = $this->load->view("global/restricted", $page_data, TRUE);
            $this->create_view($content, "");
        }
    }

    public function delete_auth_user () {
        
        $page_data["current_user_id"] = $this->current_user_id;
        $page_data["current_user_role"] = $this->current_user_role;
        $page_data["current_user_level"] = $this->current_user_level;
        $page_data["current_user_language"] = $this->current_user_language;

        if ( $this->get_delete("auth_users") ) {
            			
            $page = $this->uri->segment("4",0);
            $page_data["page"] = $page;

            $user_id = $this->uri->segment("5",0);

            $info = $this->input->post();
            $this->auth_user_model->delete( $user_id );
            redirect("auth_users/index");
			
        } else {
            $model = $this->get_model_name() . "_model";
            $page_data["model"] = $model;
            $page_data["access_type"] = "delete";
            $content = $this->load->view("global/restricted", $page_data, TRUE);
            $this->create_view($content, "");
        }
    }

    	
	
    public function do_upload() {

		if ( !is_dir( UPLOAD_DIR ) ) {
			mkdir( UPLOAD_DIR );
			chmod( UPLOAD_DIR, 0755 );
		}
		
		if ( !is_dir( UPLOAD_DIR."/".$this->current_user_role ) ) {
			mkdir( UPLOAD_DIR."/".$this->current_user_role );
			chmod( UPLOAD_DIR."/".$this->current_user_role, 0755 ) ;
		}
		
		if ( !is_dir( UPLOAD_DIR."/".$this->current_user_role ."/".$this->current_user_id ) ) {
			mkdir( UPLOAD_DIR."/".$this->current_user_role ."/".$this->current_user_id );
			chmod( UPLOAD_DIR."/".$this->current_user_role."/".$this->current_user_id, 0755 );
		}

        $config['upload_path'] = UPLOAD_DIR."/".$this->current_user_role ."/".$this->current_user_id;
        $config['allowed_types'] = UPLOAD_FILE_TYPES;
        $config['max_size'] = MAX_UPLOAD_SIZE;
        $config['max_width'] = MAX_UPLOAD_WIDTH;
        $config['max_height'] = MAX_UPLOAD_HEIGHT;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload("user_profile_image")) {
            $error = array('error' => $this->upload->display_errors());
            echo $error["error"];
        } else {
        	
        	$data = $this->upload->data();
        	
			$type = explode('/',$data["file_type"]);
			$type = $type[1];
        	
        	$tmp_name = random_string('alnum',16).".".$type;
        	
        	rename(
        		UPLOAD_DIR ."/".$this->current_user_role."/".$this->current_user_id."/" . $data["file_name"], 
        		UPLOAD_DIR ."/".$this->current_user_role."/".$this->current_user_id."/" . $tmp_name
        		);
        	
			$image_setting = $this->auth_user_model->get_image_sizes('Big','auth_users');
            

            $config['image_library'] = 'gd2';
            $config['source_image'] = UPLOAD_DIR ."/".$this->current_user_role."/".$this->current_user_id."/" . $tmp_name;
            $config['maintain_ratio'] = TRUE;
            $config['width'] = $image_setting->setting_image_width;
            $config["height"] = $image_setting->setting_image_height;
            $config["maintaion_ratio"] = true;

            $page["upload_data"] = $data;

            $this->load->library("image_lib");
            $this->image_lib->clear();
            $this->image_lib->initialize($config);
            $this->image_lib->resize();

            echo $tmp_name;
        }
    }
    
    
    public function generate_crop() {
    
        $file = $this->uri->segment(3);
        
        $page_data["file"] = $file;
		
		$image_setting = $this->auth_user_model->get_image_sizes('Big','auth_users');
		
		$page_data["bwidth"] = $image_setting->setting_image_width;
		$page_data["bheight"] = $image_setting->setting_image_height;
		
		$image_setting = $this->auth_user_model->get_image_sizes('Small','auth_users');
		
		$page_data["swidth"] = $image_setting->setting_image_width;
		$page_data["sheight"] = $image_setting->setting_image_height;

        $this->load->view("auth_users/crop", $page_data);
    }

    public function apply_crop() {

        $post = $this->input->post();
		
		$file_name = UPLOAD_DIR ."/".$this->current_user_role."/".$this->current_user_id."/" . $post["file"];
		$data = getimagesize($file_name);
		$iwidth = $data[0];
		$iheight = $data[1];
		
		$image_ratio = $iwidth / $post["current_w"];
		
        $config['image_library'] = 'gd2';		
        $config['source_image'] = $file_name;
        $config['x_axis'] = floor($post["x"]*$image_ratio);
        $config['y_axis'] = floor($post["y"]*$image_ratio);
        $config['width'] = floor($post["w"]*$image_ratio);
        $config['height'] = floor($post["h"]*$image_ratio);
        $config["maintain_ratio"] = false;

        $this->load->library("image_lib");
        $this->image_lib->clear();
        $this->image_lib->initialize($config);

        if (!$this->image_lib->crop()) {
            echo $this->image_lib->display_errors();
        } else {
        	
			$type = explode('.', $post["file"]);
			$type = $type[count($type)-1];
        	
        	$tmp_name = random_string('alnum',16).".".$type;
        	
        	rename(
        		UPLOAD_DIR ."/".$this->current_user_role."/".$this->current_user_id."/" . $post["file"], 
        		UPLOAD_DIR ."/".$this->current_user_role ."/".$this->current_user_id."/" . $tmp_name
        		);
        	
			$image_setting = $this->auth_user_model->get_image_sizes('Small','auth_users');
			
            $config['image_library'] = 'gd2';
            $config['source_image'] = UPLOAD_DIR ."/".$this->current_user_role."/".$this->current_user_id."/" . $tmp_name;
            $config['width'] = $image_setting->setting_image_width;
            $config["height"] = $image_setting->setting_image_height;
            $config["maintain_ratio"] = true;

            $this->image_lib->clear();
            $this->image_lib->initialize($config);

            if ($this->image_lib->resize()) {
	            $tmp_name2 = random_string('alnum',16).".".$type;
	        	rename(
	        		UPLOAD_DIR ."/".$this->current_user_role."/".$this->current_user_id."/" . $tmp_name, 
	        		UPLOAD_DIR ."/".$this->current_user_role ."/".$this->current_user_id."/" . $tmp_name2
	        		);
                echo $tmp_name2;
            }
        }
    }
    
    public function get_image() {
        $id = $this->uri->segment(3);
        $rs = $this->auth_user_model->get_by_user_id($id);
        header("Content-type: image/jpeg");
        echo $rs->user_profile_image;
    }

    public function delete_image() {
        $page = $this->uri->segment("4", "0");
        $id = $this->uri->segment(5);
        $this->auth_user_model->delete_blob_field($id);
        redirect("auth_users/edit_auth_user/page/" . $page . "/" . $id);
    }
    
	
}
