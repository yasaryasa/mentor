<?php
/*
 * Bu Yazılım İmleç A.Ş. Tarafından Geliştirilmiştir. 
 * http://www.imlec.com.tr 
 * http://www.imleç.com.tr 
 */
class image_model extends Imlec_Model {
    public function get_images( $page=1 , $entry = 0,$auth_user = 0 , $term = "", $user_id, $user_role, $user_level ) {
        if ( $this->get_see_all("images")) {
            $this->db->select(
                    "images.id,images.name,images.path,images.entry_id,entries_referenced.title as title_referenced,entries_referenced.id as id_referenced,images.image_owner,auth_users_referenced.user_name as user_name_referenced,auth_users_referenced.user_id as user_id_referenced"
            )->from("images");
            
            $this->db->join("entries as entries_referenced","images.entry_id=entries_referenced.id","left");
			
            $this->db->join("auth_users as auth_users_referenced","images.image_owner=auth_users_referenced.user_id","left");
			
            		
            if ( $entry ) {
                $this->db->where( "entries_referenced.id", $entry );
            }
				
            if ( $auth_user ) {
                $this->db->where( "auth_users_referenced.user_id", $auth_user );
            }
		
        } else if (!$this->get_see_others("images")) {
            $this->db->select(
                    "images.id,images.name,images.path,images.entry_id,entries_referenced.title as title_referenced,entries_referenced.id as id_referenced,images.image_owner,auth_users_referenced.user_name as user_name_referenced,auth_users_referenced.user_id as user_id_referenced"
            )->from("images");
            
            $this->db->join("entries as entries_referenced","images.entry_id=entries_referenced.id","left");
			
            $this->db->join("auth_users as auth_users_referenced","images.image_owner=auth_users_referenced.user_id","left");
			
            		
            if ( $entry ) {
                $this->db->where( "entries_referenced.id", $entry );
            }
				
            if ( $auth_user ) {
                $this->db->where( "auth_users_referenced.user_id", $auth_user );
            }
		
            
            $this->db->where("images.image_owner", $user_id);
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
                    "images.id,images.name,images.path,images.entry_id,entries_referenced.title as title_referenced,entries_referenced.id as id_referenced,images.image_owner,auth_users_referenced.user_name as user_name_referenced,auth_users_referenced.user_id as user_id_referenced"
            )->from("images");

            
            $this->db->join("entries as entries_referenced","images.entry_id=entries_referenced.id","left");
			
            $this->db->join("auth_users as auth_users_referenced","images.image_owner=auth_users_referenced.user_id","left");
			
            		
            if ( $entry ) {
                $this->db->where( "entries_referenced.id", $entry );
            }
				
            if ( $auth_user ) {
                $this->db->where( "auth_users_referenced.user_id", $auth_user );
            }
		
            
            $this->db->where_in("images.image_owner", $u );
        }

        if ( !empty($term)) {
        $this->db->where("images.name LIKE '%".$term."%' OR images.path LIKE '%".$term."%' ");
        } else {
            $this->db->limit( 10, ($page-1)*10 );
        }

        return $this->db->get();
    }
    
    
    public function get_by_id ( $value ) {
        $this->db->select("images.id,images.name,images.path,images.entry_id,entries_referenced.title as title_referenced,entries_referenced.id as id_referenced,images.image_owner,auth_users_referenced.user_name as user_name_referenced,auth_users_referenced.user_id as user_id_referenced,")->from("images");
        
            $this->db->join("entries as entries_referenced","images.entry_id=entries_referenced.id","left");
			
            $this->db->join("auth_users as auth_users_referenced","images.image_owner=auth_users_referenced.user_id","left");
			
        $this->db->where("images.id", $value);
        return $this->db->get()->row();
    }

    public function get_by_name ( $value ) {
        $this->db->select("images.id,images.name,images.path,images.entry_id,entries_referenced.title as title_referenced,entries_referenced.id as id_referenced,images.image_owner,auth_users_referenced.user_name as user_name_referenced,auth_users_referenced.user_id as user_id_referenced,")->from("images");
        
            $this->db->join("entries as entries_referenced","images.entry_id=entries_referenced.id","left");
			
            $this->db->join("auth_users as auth_users_referenced","images.image_owner=auth_users_referenced.user_id","left");
			
        $this->db->where("images.name", $value);
        return $this->db->get()->row();
    }

    public function get_by_path ( $value ) {
        $this->db->select("images.id,images.name,images.path,images.entry_id,entries_referenced.title as title_referenced,entries_referenced.id as id_referenced,images.image_owner,auth_users_referenced.user_name as user_name_referenced,auth_users_referenced.user_id as user_id_referenced,")->from("images");
        
            $this->db->join("entries as entries_referenced","images.entry_id=entries_referenced.id","left");
			
            $this->db->join("auth_users as auth_users_referenced","images.image_owner=auth_users_referenced.user_id","left");
			
        $this->db->where("images.path", $value);
        return $this->db->get()->row();
    }

    public function get_by_entry_id ( $value ) {
        $this->db->select("images.id,images.name,images.path,images.entry_id,entries_referenced.title as title_referenced,entries_referenced.id as id_referenced,images.image_owner,auth_users_referenced.user_name as user_name_referenced,auth_users_referenced.user_id as user_id_referenced,")->from("images");
        
            $this->db->join("entries as entries_referenced","images.entry_id=entries_referenced.id","left");
			
            $this->db->join("auth_users as auth_users_referenced","images.image_owner=auth_users_referenced.user_id","left");
			
        $this->db->where("images.entry_id", $value);
        return $this->db->get()->row();
    }

    public function get_by_image_owner ( $value ) {
        $this->db->select("images.id,images.name,images.path,images.entry_id,entries_referenced.title as title_referenced,entries_referenced.id as id_referenced,images.image_owner,auth_users_referenced.user_name as user_name_referenced,auth_users_referenced.user_id as user_id_referenced,")->from("images");
        
            $this->db->join("entries as entries_referenced","images.entry_id=entries_referenced.id","left");
			
            $this->db->join("auth_users as auth_users_referenced","images.image_owner=auth_users_referenced.user_id","left");
			
        $this->db->where("images.image_owner", $value);
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



    public function get_images_count ($page , $entry = 0,$auth_user = 0, $term = "", $user_id, $user_role, $user_level ) {

        if ( $this->get_see_all("images")) {

            $this->db->select(
                    "images.id,images.name,images.path,images.entry_id,entries_referenced.title as title_referenced,entries_referenced.id as id_referenced,images.image_owner,auth_users_referenced.user_name as user_name_referenced,auth_users_referenced.user_id as user_id_referenced"
            )->from("images");
            
            $this->db->join("entries as entries_referenced","images.entry_id=entries_referenced.id","left");
			
            $this->db->join("auth_users as auth_users_referenced","images.image_owner=auth_users_referenced.user_id","left");
			
            		
            if ( $entry ) {
                $this->db->where( "entries_referenced.id", $entry );
            }
				
            if ( $auth_user ) {
                $this->db->where( "auth_users_referenced.user_id", $auth_user );
            }
		

        } else if (!$this->get_see_others("images")) {
            $this->db->select(
                    "images.id,images.name,images.path,images.entry_id,entries_referenced.title as title_referenced,entries_referenced.id as id_referenced,images.image_owner,auth_users_referenced.user_name as user_name_referenced,auth_users_referenced.user_id as user_id_referenced"
            )->from("images");
            
            $this->db->join("entries as entries_referenced","images.entry_id=entries_referenced.id","left");
			
            $this->db->join("auth_users as auth_users_referenced","images.image_owner=auth_users_referenced.user_id","left");
			
            		
            if ( $entry ) {
                $this->db->where( "entries_referenced.id", $entry );
            }
				
            if ( $auth_user ) {
                $this->db->where( "auth_users_referenced.user_id", $auth_user );
            }
		

            
            $this->db->where("images.image_owner", $user_id);


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
                    "images.id,images.name,images.path,images.entry_id,entries_referenced.title as title_referenced,entries_referenced.id as id_referenced,images.image_owner,auth_users_referenced.user_name as user_name_referenced,auth_users_referenced.user_id as user_id_referenced"
            )->from("images");

            
            $this->db->join("entries as entries_referenced","images.entry_id=entries_referenced.id","left");
			
            $this->db->join("auth_users as auth_users_referenced","images.image_owner=auth_users_referenced.user_id","left");
			
            		
            if ( $entry ) {
                $this->db->where( "entries_referenced.id", $entry );
            }
				
            if ( $auth_user ) {
                $this->db->where( "auth_users_referenced.user_id", $auth_user );
            }
		

            
            $this->db->where_in("images.image_owner", $u );

        }

        if ( !empty($term)) {
            $this->db->where("images.name LIKE '%".$term."%' OR images.path LIKE '%".$term."%' ");
        }

        return $this->db->get()->num_rows;
    }

    public function create ( $info, $user_id ) {

        foreach ( $info as $_key => $_value ) {
            if ( $_value == null ||  $_value == 'null' ) {
                unset($info[$_key]);   
            }
        }

        
            $info["image_owner"] = $user_id;
        $id = $this->db->insert("images", $info );
        $this->add_log("image nesnesi oluşturuldu [ id : ".$this->db->insert_id()." ]");
    }

    public function update ( $info,  $value ) {

        foreach ( $info as $_key => $_value ) {
            if ( $_value == null ||  $_value == 'null' ) {
                unset($info[$_key]);   
            }
        }

        $this->db->where("id", $value );
        $result = $this->db->update("images", $info );
        $this->add_log("image nesnesi güncellendi [ id : ".$value." ]");
        return $result;
    }

    public function delete ( $value ) {
        $this->db->where("id", $value);
        $result = $this->db->delete("images" );
        $this->add_log("image nesnesi silindi [ id : ".$value." ]");
        return $result;
    }

    public function get_table_headers () {
        $query = "describe images";
        $rs = $this->db->query($query);

        $headers = array();
        if ( $rs->num_rows > 0 ) {
            foreach ( $rs->result() as $row ) {
                $headers[] = $this->get_label_value( $row->Field );
            }
        }
        return $headers;
    }

    

}