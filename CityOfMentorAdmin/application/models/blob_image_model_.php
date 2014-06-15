<?php
/*
 * Bu Yazılım İmleç A.Ş. Tarafından Geliştirilmiştir. 
 * http://www.imlec.com.tr 
 * http://www.imleç.com.tr 
 */
class blob_image_model_ extends Imlec_Model {
    public function get_blob_images( $page=1 , $entry = 0,$auth_user = 0 , $term = "", $user_id, $user_role, $user_level ) {
        if ( $this->get_see_all("blob_images")) {
            $this->db->select(
                    "blob_images.id,blob_images.name,blob_images.data,blob_images.entry_id,entries_referenced.title as title_referenced,entries_referenced.id as id_referenced,blob_images.blob_image_owner,auth_users_referenced.user_name as user_name_referenced,auth_users_referenced.user_id as user_id_referenced"
            )->from("blob_images");
            
            $this->db->join("entries as entries_referenced","blob_images.entry_id=entries_referenced.id","left");
			
            $this->db->join("auth_users as auth_users_referenced","blob_images.blob_image_owner=auth_users_referenced.user_id","left");
			
            		
            if ( $entry ) {
                $this->db->where( "entries_referenced.id", $entry );
            }
				
            if ( $auth_user ) {
                $this->db->where( "auth_users_referenced.user_id", $auth_user );
            }
		
        } else if (!$this->get_see_others("blob_images")) {
            $this->db->select(
                    "blob_images.id,blob_images.name,blob_images.data,blob_images.entry_id,entries_referenced.title as title_referenced,entries_referenced.id as id_referenced,blob_images.blob_image_owner,auth_users_referenced.user_name as user_name_referenced,auth_users_referenced.user_id as user_id_referenced"
            )->from("blob_images");
            
            $this->db->join("entries as entries_referenced","blob_images.entry_id=entries_referenced.id","left");
			
            $this->db->join("auth_users as auth_users_referenced","blob_images.blob_image_owner=auth_users_referenced.user_id","left");
			
            		
            if ( $entry ) {
                $this->db->where( "entries_referenced.id", $entry );
            }
				
            if ( $auth_user ) {
                $this->db->where( "auth_users_referenced.user_id", $auth_user );
            }
		
            
            $this->db->where("blob_images.blob_image_owner", $user_id);
        } else {
            $user_level = $user_level;
            $this->db->select(USER_TABLE.".user_id")->from(USER_TABLE);

            $this->db->join(ROLE_TABLE, USER_TABLE . ".user_role_id = " . ROLE_TABLE . ".role_id", "left");
            $this->db->where(ROLE_TABLE.".role_level >", $user_level);
            $users = $this->db->get();

            $u = array($user_id);
            if ( $users ) {
                foreach ( $users->result() as $user ) {
                    $u[] = $user->user_id;
                }
            }

            $this->db->select(
                    "blob_images.id,blob_images.name,blob_images.data,blob_images.entry_id,entries_referenced.title as title_referenced,entries_referenced.id as id_referenced,blob_images.blob_image_owner,auth_users_referenced.user_name as user_name_referenced,auth_users_referenced.user_id as user_id_referenced"
            )->from("blob_images");

            
            $this->db->join("entries as entries_referenced","blob_images.entry_id=entries_referenced.id","left");
			
            $this->db->join("auth_users as auth_users_referenced","blob_images.blob_image_owner=auth_users_referenced.user_id","left");
			
            		
            if ( $entry ) {
                $this->db->where( "entries_referenced.id", $entry );
            }
				
            if ( $auth_user ) {
                $this->db->where( "auth_users_referenced.user_id", $auth_user );
            }
		
            
            $this->db->where_in("blob_images.blob_image_owner", $u );
        }

        if ( !empty($term)) {
        $this->db->where("blob_images.name LIKE '%".$term."%' OR blob_images.data LIKE '%".$term."%' ");
        } else {
            $this->db->limit( 10, ($page-1)*10 );
        }

        return $this->db->get();
    }
    
    
    public function get_by_id ( $value ) {
        $this->db->select("blob_images.id,blob_images.name,blob_images.data,blob_images.entry_id,entries_referenced.title as title_referenced,entries_referenced.id as id_referenced,blob_images.blob_image_owner,auth_users_referenced.user_name as user_name_referenced,auth_users_referenced.user_id as user_id_referenced,")->from("blob_images");
        
            $this->db->join("entries as entries_referenced","blob_images.entry_id=entries_referenced.id","left");
			
            $this->db->join("auth_users as auth_users_referenced","blob_images.blob_image_owner=auth_users_referenced.user_id","left");
			
        $this->db->where("blob_images.id", $value);
        return $this->db->get()->row();
    }

    public function get_by_name ( $value ) {
        $this->db->select("blob_images.id,blob_images.name,blob_images.data,blob_images.entry_id,entries_referenced.title as title_referenced,entries_referenced.id as id_referenced,blob_images.blob_image_owner,auth_users_referenced.user_name as user_name_referenced,auth_users_referenced.user_id as user_id_referenced,")->from("blob_images");
        
            $this->db->join("entries as entries_referenced","blob_images.entry_id=entries_referenced.id","left");
			
            $this->db->join("auth_users as auth_users_referenced","blob_images.blob_image_owner=auth_users_referenced.user_id","left");
			
        $this->db->where("blob_images.name", $value);
        return $this->db->get()->row();
    }

    public function get_by_data ( $value ) {
        $this->db->select("blob_images.id,blob_images.name,blob_images.data,blob_images.entry_id,entries_referenced.title as title_referenced,entries_referenced.id as id_referenced,blob_images.blob_image_owner,auth_users_referenced.user_name as user_name_referenced,auth_users_referenced.user_id as user_id_referenced,")->from("blob_images");
        
            $this->db->join("entries as entries_referenced","blob_images.entry_id=entries_referenced.id","left");
			
            $this->db->join("auth_users as auth_users_referenced","blob_images.blob_image_owner=auth_users_referenced.user_id","left");
			
        $this->db->where("blob_images.data", $value);
        return $this->db->get()->row();
    }

    public function get_by_entry_id ( $value ) {
        $this->db->select("blob_images.id,blob_images.name,blob_images.data,blob_images.entry_id,entries_referenced.title as title_referenced,entries_referenced.id as id_referenced,blob_images.blob_image_owner,auth_users_referenced.user_name as user_name_referenced,auth_users_referenced.user_id as user_id_referenced,")->from("blob_images");
        
            $this->db->join("entries as entries_referenced","blob_images.entry_id=entries_referenced.id","left");
			
            $this->db->join("auth_users as auth_users_referenced","blob_images.blob_image_owner=auth_users_referenced.user_id","left");
			
        $this->db->where("blob_images.entry_id", $value);
        return $this->db->get()->row();
    }

    public function get_by_blob_image_owner ( $value ) {
        $this->db->select("blob_images.id,blob_images.name,blob_images.data,blob_images.entry_id,entries_referenced.title as title_referenced,entries_referenced.id as id_referenced,blob_images.blob_image_owner,auth_users_referenced.user_name as user_name_referenced,auth_users_referenced.user_id as user_id_referenced,")->from("blob_images");
        
            $this->db->join("entries as entries_referenced","blob_images.entry_id=entries_referenced.id","left");
			
            $this->db->join("auth_users as auth_users_referenced","blob_images.blob_image_owner=auth_users_referenced.user_id","left");
			
        $this->db->where("blob_images.blob_image_owner", $value);
        return $this->db->get()->row();
    }

    
    public function get_entries_reference ($user_id,$user_level) {
        if ( $this->get_see_all("entries") ) {

        } else if ($this->get_see_others("entries")) {
            $user_level = $user_level;
            $this->db->select(USER_TABLE.".user_id")->from(USER_TABLE);

            $this->db->join(ROLE_TABLE, USER_TABLE . ".user_role_id = " . ROLE_TABLE . ".role_id", "left");
            $this->db->where(ROLE_TABLE.".role_level >", $user_level);
            $users = $this->db->get();

            $u = array($user_id);
            if ( $users ) {
                    foreach ( $users->result() as $user ) {
                            $u[] = $user->user_id;
                    }
            }

            
            $this->db->where_in("entries.entry_owner", $u );

        } else {
            
            $this->db->where("entries.entry_owner", $user_id);
        }

        return $this->db->get("entries");
    }

    public function get_auth_users_reference ($user_id,$user_level) {
        if ( $this->get_see_all("auth_users") ) {

        } else if ($this->get_see_others("auth_users")) {
            $user_level = $user_level;
            $this->db->select(USER_TABLE.".user_id")->from(USER_TABLE);

            $this->db->join(ROLE_TABLE, USER_TABLE . ".user_role_id = " . ROLE_TABLE . ".role_id", "left");
            $this->db->where(ROLE_TABLE.".role_level >", $user_level);
            $users = $this->db->get();

            $u = array($user_id);
            if ( $users ) {
                    foreach ( $users->result() as $user ) {
                            $u[] = $user->user_id;
                    }
            }

            
            $this->db->where_in("auth_users.auth_user_owner", $u );

        } else {
            
            $this->db->where("auth_users.auth_user_owner", $user_id);
        }

        return $this->db->get("auth_users");
    }



    public function get_blob_images_count ($page , $entry = 0,$auth_user = 0, $term = "", $user_id, $user_role, $user_level ) {

        if ( $this->get_see_all("blob_images")) {

            $this->db->select(
                    "blob_images.id,blob_images.name,blob_images.data,blob_images.entry_id,entries_referenced.title as title_referenced,entries_referenced.id as id_referenced,blob_images.blob_image_owner,auth_users_referenced.user_name as user_name_referenced,auth_users_referenced.user_id as user_id_referenced"
            )->from("blob_images");
            
            $this->db->join("entries as entries_referenced","blob_images.entry_id=entries_referenced.id","left");
			
            $this->db->join("auth_users as auth_users_referenced","blob_images.blob_image_owner=auth_users_referenced.user_id","left");
			
            		
            if ( $entry ) {
                $this->db->where( "entries_referenced.id", $entry );
            }
				
            if ( $auth_user ) {
                $this->db->where( "auth_users_referenced.user_id", $auth_user );
            }
		

        } else if (!$this->get_see_others("blob_images")) {
            $this->db->select(
                    "blob_images.id,blob_images.name,blob_images.data,blob_images.entry_id,entries_referenced.title as title_referenced,entries_referenced.id as id_referenced,blob_images.blob_image_owner,auth_users_referenced.user_name as user_name_referenced,auth_users_referenced.user_id as user_id_referenced"
            )->from("blob_images");
            
            $this->db->join("entries as entries_referenced","blob_images.entry_id=entries_referenced.id","left");
			
            $this->db->join("auth_users as auth_users_referenced","blob_images.blob_image_owner=auth_users_referenced.user_id","left");
			
            		
            if ( $entry ) {
                $this->db->where( "entries_referenced.id", $entry );
            }
				
            if ( $auth_user ) {
                $this->db->where( "auth_users_referenced.user_id", $auth_user );
            }
		

            
            $this->db->where("blob_images.blob_image_owner", $user_id);


        } else {
            $user_level = $user_level;
            $this->db->select(USER_TABLE.".user_id")->from(USER_TABLE);

            $this->db->join(ROLE_TABLE, USER_TABLE . ".user_role_id = " . ROLE_TABLE . ".role_id", "left");
            $this->db->where(ROLE_TABLE.".role_level >", $user_level);
            $users = $this->db->get();

            $u = array($user_id);
            if ( $users ) {
                foreach ( $users->result() as $user ) {
                    $u[] = $user->user_id;
                }
            }

            $this->db->select(
                    "blob_images.id,blob_images.name,blob_images.data,blob_images.entry_id,entries_referenced.title as title_referenced,entries_referenced.id as id_referenced,blob_images.blob_image_owner,auth_users_referenced.user_name as user_name_referenced,auth_users_referenced.user_id as user_id_referenced"
            )->from("blob_images");

            
            $this->db->join("entries as entries_referenced","blob_images.entry_id=entries_referenced.id","left");
			
            $this->db->join("auth_users as auth_users_referenced","blob_images.blob_image_owner=auth_users_referenced.user_id","left");
			
            		
            if ( $entry ) {
                $this->db->where( "entries_referenced.id", $entry );
            }
				
            if ( $auth_user ) {
                $this->db->where( "auth_users_referenced.user_id", $auth_user );
            }
		

            
            $this->db->where_in("blob_images.blob_image_owner", $u );

        }

        if ( !empty($term)) {
            $this->db->where("blob_images.name LIKE '%".$term."%' OR blob_images.data LIKE '%".$term."%' ");
        }

        return $this->db->get()->num_rows;
    }

    public function create ( $info, $user_id ) {

        foreach ( $info as $_key => $_value ) {
            if ( $_value == null ||  $_value == 'null' ) {
                unset($info[$_key]);   
            }
        }

        
            $info["blob_image_owner"] = $user_id;
        $id = $this->db->insert("blob_images", $info );
        $this->add_log("blob_image nesnesi oluşturuldu [ id : ".$this->db->insert_id()." ]");
    }

    public function update ( $info,  $value ) {

        foreach ( $info as $_key => $_value ) {
            if ( $_value == null ||  $_value == 'null' ) {
                unset($info[$_key]);   
            }
        }

        $this->db->where("id", $value );
        $result = $this->db->update("blob_images", $info );
        $this->add_log("blob_image nesnesi güncellendi [ id : ".$value." ]");
        return $result;
    }

    public function delete ( $value ) {
        $this->db->where("id", $value);
        $result = $this->db->delete("blob_images" );
        $this->add_log("blob_image nesnesi silindi [ id : ".$value." ]");
        return $result;
    }

    public function get_table_headers () {
        $query = "describe blob_images";
        $rs = $this->db->query($query);

        $headers = array();
        if ( $rs->num_rows > 0 ) {
            foreach ( $rs->result() as $row ) {
                $headers[] = $this->get_label_value( $row->Field );
            }
        }
        return $headers;
    }

    		
    public function delete_blob_field( $blob_image_id = null ) {
        if ( $blob_image_id ) {
            $info = array("data" => null );
            $this->db->where("id",$blob_image_id);
            return $this->db->update("blob_images",$info);
        } else {
            return false;
        }
    }
	

}