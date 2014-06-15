<?php 

class report_issue extends  CI_Controller {
	
	public function  report() {
		
		print_r($_POST);
		
// 		$imagename = trim(strip_tags($_POST['imagename']));
		
// 		$destfile = "../photos/".addslashes($imagename);
		
// 		if (move_uploaded_file($_FILES['image']['tmp_name'], $destfile))
// 		{
// 			echo "SUCCESS";
// 			exit;
// 		}
// 		echo "FAILURE";
	}
	
	public function do_upload() {
		
		$this->current_user_role = 'report_issue';
		$this->current_user_id = 'reports';
	
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
	
	
		//$image_setting = $this->blob_image_model->get_image_sizes('Big','blob_images');
	
		$config['upload_path'] = UPLOAD_DIR."/".$this->current_user_role ."/".$this->current_user_id;
		$config['allowed_types'] = UPLOAD_FILE_TYPES;
		//$config['width'] = $image_setting->setting_image_width;
		//$config["height"] = $image_setting->setting_image_height;
		//         $config['max_size'] = MAX_UPLOAD_SIZE;
		$config['max_width'] = MAX_UPLOAD_WIDTH;
		$config['max_height'] = MAX_UPLOAD_HEIGHT;
	
		$this->load->library('upload', $config);
	
		if (!$this->upload->do_upload("data")) {
			$error = array('error' => $this->upload->display_errors());
			echo $error["error"];
		} else {
			
			//TODO image upload edildi demek oluyor, geriye kalan kisimlarin post edilme islemidir
			 
// 			$data = $this->upload->data();
			 
// 			$type = explode('/',$data["file_type"]);
// 			$type = $type[1];
			 
// 			$tmp_name = random_string('alnum',16).".".$type;
			 
// 			rename(
// 			UPLOAD_DIR ."/".$this->current_user_role."/".$this->current_user_id."/" . $data["file_name"],
// 			UPLOAD_DIR ."/".$this->current_user_role."/".$this->current_user_id."/" . $tmp_name
// 			);
			 
// 			$image_setting = $this->blob_image_model->get_image_sizes('Small','blob_images');
// 			$image_setting_big = $this->blob_image_model->get_image_sizes('Big','blob_images');
	
	
// 			$config['image_library'] = 'gd2';
// 			$config['source_image'] = UPLOAD_DIR ."/".$this->current_user_role."/".$this->current_user_id."/" . $tmp_name;
// 			$config['maintain_ratio'] = TRUE;
// 			$config['create_thumb'] = TRUE;
// 			$config['width'] = $image_setting->setting_image_width;
// 			$config["height"] = $image_setting->setting_image_height;
// 			$config["maintaion_ratio"] = true;
	
// 			$this->load->library('image_lib', $config);
	
// 			$this->image_lib->resize();
	
// 			$page["upload_data"] = $data;
	
// 			$this->load->library("image_lib");
// 			$this->image_lib->clear();
// 			$this->image_lib->initialize($config);
// 			$this->image_lib->resize();
	
// 			//thumb sonu
// 			$config['create_thumb'] = FALSE;
// 			$config['width'] = $image_setting_big->setting_image_width;
// 			$config["height"] = $image_setting_big->setting_image_height;
	
// 			$this->load->library("image_lib");
// 			$this->image_lib->clear();
// 			$this->image_lib->initialize($config);
// 			$this->image_lib->resize();
	
			//echo $tmp_name;
		}
	}
	
}

?>