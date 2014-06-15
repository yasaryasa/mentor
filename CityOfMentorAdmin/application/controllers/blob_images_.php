<?php
/*
 * Bu Yazılım İmleç A.Ş. Tarafından Geliştirilmiştir. 
 * http://www.imlec.com.tr 
 * http://www.imleç.com.tr 
 */
class blob_images_ extends Imlec_Controller {


    public function blob_images() {
        parent::__construct();
    }

    public function index () {
        
        $page_data["current_user_id"] = $this->current_user_id;
        $page_data["current_user_role"] = $this->current_user_role;
        $page_data["current_user_level"] = $this->current_user_level;
        $page_data["current_user_language"] = $this->current_user_language;
            
        if ( $this->get_read("blob_images")) {
            
			
            $page = $this->uri->segment("4",1);
            $page_data["page"] = $page;

            			
            $entry = $this->uri->segment("6",0);
            $page_data["entry"] = $entry;
            $entries = $this->blob_image_model->get_entries_reference($this->current_user_id, $this->current_user_level);
            $page_data["entries"] = $entries;
						
            $auth_user = $this->uri->segment("8",0);
            $page_data["auth_user"] = $auth_user;
            $auth_users = $this->blob_image_model->get_auth_users_reference($this->current_user_id, $this->current_user_level);
            $page_data["auth_users"] = $auth_users;
			

            $page_data["blob_images"] = $this->blob_image_model->get_blob_images( $page , $entry,$auth_user,"", $this->current_user_id, $this->current_user_role, $this->current_user_level );
            $page_data["total_count"] = $this->blob_image_model->get_blob_images_count( $page , $entry,$auth_user,"", $this->current_user_id, $this->current_user_role, $this->current_user_level);

            $content = $this->load->view("blob_images/list",$page_data, TRUE);
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
            
        if ( $this->get_read("blob_images")) {
            
			
            $page = $this->uri->segment("4",1);
            $page_data["page"] = $page;

            			
            $entry = $this->uri->segment("6",0);
            $page_data["entry"] = $entry;
            $entries = $this->blob_image_model->get_entries_reference($this->current_user_id, $this->current_user_level);
            $page_data["entries"] = $entries;
						
            $auth_user = $this->uri->segment("8",0);
            $page_data["auth_user"] = $auth_user;
            $auth_users = $this->blob_image_model->get_auth_users_reference($this->current_user_id, $this->current_user_level);
            $page_data["auth_users"] = $auth_users;
			

            $term = $this->input->post("search_term");

            $page_data["search_term"] = $term;

            $page_data["blob_images"] = $this->blob_image_model->get_blob_images( $page , $entry,$auth_user, $term , $this->current_user_id, $this->current_user_role, $this->current_user_level );

            $content = $this->load->view("blob_images/search",$page_data, TRUE);
            $this->create_view($content, "");
			

        } else {
            $model = $this->get_model_name() . "_model";
            $page_data["model"] = $model;
            $page_data["access_type"] = "read";
            $content = $this->load->view("global/restricted", $page_data, TRUE);
            $this->create_view($content, "");
        }
    }

    public function new_blob_image() {
        
        $page_data["current_user_id"] = $this->current_user_id;
        $page_data["current_user_role"] = $this->current_user_role;
        $page_data["current_user_level"] = $this->current_user_level;
        $page_data["current_user_language"] = $this->current_user_language;

        if ( $this->get_create("blob_images") ) {
            
            			
            $entry = $this->uri->segment("6",0);
            $page_data["entry"] = $entry;
            $entries = $this->blob_image_model->get_entries_reference($this->current_user_id, $this->current_user_level);
            $page_data["entries"] = $entries;
						
            $auth_user = $this->uri->segment("8",0);
            $page_data["auth_user"] = $auth_user;
            $auth_users = $this->blob_image_model->get_auth_users_reference($this->current_user_id, $this->current_user_level);
            $page_data["auth_users"] = $auth_users;
			

            $content = $this->load->view("blob_images/new",$page_data, TRUE);
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

        if ( $this->get_create("blob_images") ) {
            
            $info = $this->input->post(NULL, TRUE);
            
            			
            $file = $info["data"];
            $info["data"] = file_get_contents( UPLOAD_DIR ."/".$this->current_user_role ."/".$this->current_user_id."/". $file);
            unset($info["_wysihtml5_mode"]);
            $this->blob_image_model->create( $info, $this->current_user_id );
            
			unlink( UPLOAD_DIR ."/".$this->current_user_role ."/".$this->current_user_id."/".$file);
            redirect("blob_images/index");
			
        } else {
            $model = $this->get_model_name() . "_model";
            $page_data["model"] = $model;
            $page_data["access_type"] = "create";
            $content = $this->load->view("global/restricted", $page_data, TRUE);
            $this->create_view($content, "");
        }
    }

    public function edit_blob_image () {

        $page_data["current_user_id"] = $this->current_user_id;
        $page_data["current_user_role"] = $this->current_user_role;
        $page_data["current_user_level"] = $this->current_user_level;
        $page_data["current_user_language"] = $this->current_user_language;

        if ( $this->get_update("blob_images") ) {
            
            $page = $this->uri->segment("4",1);
            $page_data["page"] = $page;

            $id = $this->uri->segment("5",0);
            $page_data["id"] = $id;

            			
            $entry = $this->uri->segment("6",0);
            $page_data["entry"] = $entry;
            $entries = $this->blob_image_model->get_entries_reference($this->current_user_id, $this->current_user_level);
            $page_data["entries"] = $entries;
						
            $auth_user = $this->uri->segment("8",0);
            $page_data["auth_user"] = $auth_user;
            $auth_users = $this->blob_image_model->get_auth_users_reference($this->current_user_id, $this->current_user_level);
            $page_data["auth_users"] = $auth_users;
			

            $blob_image = $this->blob_image_model->get_by_id( $id );
            

            $page_data["blob_image"] = $blob_image;

            $content = $this->load->view("blob_images/edit",$page_data, TRUE);
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

        if ( $this->get_update("blob_images") ) {
            
            $page = $this->uri->segment("4",1);
            $page_data["page"] = $page;

            $id = $this->uri->segment("5",0);

            $info = $this->input->post();

            

            			
            if (!empty($info["data"])) {
                $file = $info["data"];
                $info["data"] = file_get_contents( UPLOAD_DIR ."/".$this->current_role_id ."/".$this->current_user_id."/". $file);
            } else {
                unset($info["data"]);
            }
			

            unset($info["_wysihtml5_mode"]);

            $this->blob_image_model->update( $info, $id );

            
            if (!empty($info["data"]))
				unlink( UPLOAD_DIR ."/".$this->current_user_role ."/".$this->current_user_id."/".$file);

            redirect("blob_images/index/page/$page");
			
        } else {
            $model = $this->get_model_name() . "_model";
            $page_data["model"] = $model;
            $page_data["access_type"] = "update";
            $content = $this->load->view("global/restricted", $page_data, TRUE);
            $this->create_view($content, "");
        }
    }

    public function delete_blob_image () {
        
        $page_data["current_user_id"] = $this->current_user_id;
        $page_data["current_user_role"] = $this->current_user_role;
        $page_data["current_user_level"] = $this->current_user_level;
        $page_data["current_user_language"] = $this->current_user_language;

        if ( $this->get_delete("blob_images") ) {
            			
            $page = $this->uri->segment("4",0);
            $page_data["page"] = $page;

            $id = $this->uri->segment("5",0);

            $info = $this->input->post();
            $this->blob_image_model->delete( $id );
            redirect("blob_images/index");
			
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

        if (!$this->upload->do_upload("data")) {
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
        	
			$image_setting = $this->blob_image_model->get_image_sizes('Big','blob_images');
            

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
		
		$image_setting = $this->blob_image_model->get_image_sizes('Big','blob_images');
		
		$page_data["bwidth"] = $image_setting->setting_image_width;
		$page_data["bheight"] = $image_setting->setting_image_height;
		
		$image_setting = $this->blob_image_model->get_image_sizes('Small','blob_images');
		
		$page_data["swidth"] = $image_setting->setting_image_width;
		$page_data["sheight"] = $image_setting->setting_image_height;

        $this->load->view("blob_images/crop", $page_data);
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
        	
			$image_setting = $this->blob_image_model->get_image_sizes('Small','blob_images');
			
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
        $rs = $this->blob_image_model->get_by_id($id);
        header("Content-type: image/jpeg");
        echo $rs->data;
    }

    public function delete_image() {
        $page = $this->uri->segment("4", "0");
        $id = $this->uri->segment(5);
        $this->blob_image_model->delete_blob_field($id);
        redirect("blob_images/edit_blob_image/page/" . $page . "/" . $id);
    }
    
	
}
