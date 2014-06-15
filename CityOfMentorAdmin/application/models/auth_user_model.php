<?php
/*
 * Bu Yazılım İmleç A.Ş. Tarafından Geliştirilmiştir. 
 * http://www.imlec.com.tr 
 * http://www.imleç.com.tr 
 */
class auth_user_model extends Imlec_Model {
    public function get_auth_users( $page=1 , $auth_role = 0,$auth_user = 0 , $term = "", $user_id, $user_role, $user_level ) {
        if ( $this->get_see_all("auth_users")) {
            $this->db->select(
                    "auth_users.user_id,auth_users.user_role_id,auth_roles_referenced.role_title as role_title_referenced,auth_roles_referenced.role_id as role_id_referenced,auth_users.user_language_id,auth_users.user_name,auth_users.user_surname,auth_users.user_username,auth_users.user_password,auth_users.user_email,auth_users.user_registered,auth_users.user_profile_image,auth_users.auth_user_owner,auth_users_referenced.user_name as user_name_referenced,auth_users_referenced.user_id as user_id_referenced"
            )->from("auth_users");
            
            $this->db->join("auth_roles as auth_roles_referenced","auth_users.user_role_id=auth_roles_referenced.role_id","left");
			
            $this->db->join("auth_users as auth_users_referenced","auth_users.auth_user_owner=auth_users_referenced.user_id","left");
			
            		
            if ( $auth_role ) {
                $this->db->where( "auth_roles_referenced.role_id", $auth_role );
            }
				
            if ( $auth_user ) {
                $this->db->where( "auth_users_referenced.user_id", $auth_user );
            }
		
        } else if (!$this->get_see_others("auth_users")) {
            $this->db->select(
                    "auth_users.user_id,auth_users.user_role_id,auth_roles_referenced.role_title as role_title_referenced,auth_roles_referenced.role_id as role_id_referenced,auth_users.user_language_id,auth_users.user_name,auth_users.user_surname,auth_users.user_username,auth_users.user_password,auth_users.user_email,auth_users.user_registered,auth_users.user_profile_image,auth_users.auth_user_owner,auth_users_referenced.user_name as user_name_referenced,auth_users_referenced.user_id as user_id_referenced"
            )->from("auth_users");
            
            $this->db->join("auth_roles as auth_roles_referenced","auth_users.user_role_id=auth_roles_referenced.role_id","left");
			
            $this->db->join("auth_users as auth_users_referenced","auth_users.auth_user_owner=auth_users_referenced.user_id","left");
			
            		
            if ( $auth_role ) {
                $this->db->where( "auth_roles_referenced.role_id", $auth_role );
            }
				
            if ( $auth_user ) {
                $this->db->where( "auth_users_referenced.user_id", $auth_user );
            }
		
            
            $this->db->where("auth_users.auth_user_owner", $user_id);
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
                    "auth_users.user_id,auth_users.user_role_id,auth_roles_referenced.role_title as role_title_referenced,auth_roles_referenced.role_id as role_id_referenced,auth_users.user_language_id,auth_users.user_name,auth_users.user_surname,auth_users.user_username,auth_users.user_password,auth_users.user_email,auth_users.user_registered,auth_users.user_profile_image,auth_users.auth_user_owner,auth_users_referenced.user_name as user_name_referenced,auth_users_referenced.user_id as user_id_referenced"
            )->from("auth_users");

            
            $this->db->join("auth_roles as auth_roles_referenced","auth_users.user_role_id=auth_roles_referenced.role_id","left");
			
            $this->db->join("auth_users as auth_users_referenced","auth_users.auth_user_owner=auth_users_referenced.user_id","left");
			
            		
            if ( $auth_role ) {
                $this->db->where( "auth_roles_referenced.role_id", $auth_role );
            }
				
            if ( $auth_user ) {
                $this->db->where( "auth_users_referenced.user_id", $auth_user );
            }
		
            
            $this->db->where_in("auth_users.auth_user_owner", $u );
        }

        if ( !empty($term)) {
        $this->db->where("auth_users.user_language_id LIKE '%".$term."%' OR auth_users.user_name LIKE '%".$term."%' OR auth_users.user_surname LIKE '%".$term."%' OR auth_users.user_username LIKE '%".$term."%' OR auth_users.user_password LIKE '%".$term."%' OR auth_users.user_email LIKE '%".$term."%' OR auth_users.user_registered LIKE '%".$term."%' OR auth_users.user_profile_image LIKE '%".$term."%' ");
        } else {
            $this->db->limit( 10, ($page-1)*10 );
        }

        return $this->db->get();
    }
    
    
    public function get_by_user_id ( $value ) {
        $this->db->select("auth_users.user_id,auth_users.user_role_id,auth_roles_referenced.role_title as role_title_referenced,auth_roles_referenced.role_id as role_id_referenced,auth_users.user_language_id,auth_users.user_name,auth_users.user_surname,auth_users.user_username,auth_users.user_password,auth_users.user_email,auth_users.user_registered,auth_users.user_profile_image,auth_users.auth_user_owner,auth_users_referenced.user_name as user_name_referenced,auth_users_referenced.user_id as user_id_referenced,")->from("auth_users");
        
            $this->db->join("auth_roles as auth_roles_referenced","auth_users.user_role_id=auth_roles_referenced.role_id","left");
			
            $this->db->join("auth_users as auth_users_referenced","auth_users.auth_user_owner=auth_users_referenced.user_id","left");
			
        $this->db->where("auth_users.user_id", $value);
        return $this->db->get()->row();
    }

    public function get_by_user_role_id ( $value ) {
        $this->db->select("auth_users.user_id,auth_users.user_role_id,auth_roles_referenced.role_title as role_title_referenced,auth_roles_referenced.role_id as role_id_referenced,auth_users.user_language_id,auth_users.user_name,auth_users.user_surname,auth_users.user_username,auth_users.user_password,auth_users.user_email,auth_users.user_registered,auth_users.user_profile_image,auth_users.auth_user_owner,auth_users_referenced.user_name as user_name_referenced,auth_users_referenced.user_id as user_id_referenced,")->from("auth_users");
        
            $this->db->join("auth_roles as auth_roles_referenced","auth_users.user_role_id=auth_roles_referenced.role_id","left");
			
            $this->db->join("auth_users as auth_users_referenced","auth_users.auth_user_owner=auth_users_referenced.user_id","left");
			
        $this->db->where("auth_users.user_role_id", $value);
        return $this->db->get()->row();
    }

    public function get_by_user_language_id ( $value ) {
        $this->db->select("auth_users.user_id,auth_users.user_role_id,auth_roles_referenced.role_title as role_title_referenced,auth_roles_referenced.role_id as role_id_referenced,auth_users.user_language_id,auth_users.user_name,auth_users.user_surname,auth_users.user_username,auth_users.user_password,auth_users.user_email,auth_users.user_registered,auth_users.user_profile_image,auth_users.auth_user_owner,auth_users_referenced.user_name as user_name_referenced,auth_users_referenced.user_id as user_id_referenced,")->from("auth_users");
        
            $this->db->join("auth_roles as auth_roles_referenced","auth_users.user_role_id=auth_roles_referenced.role_id","left");
			
            $this->db->join("auth_users as auth_users_referenced","auth_users.auth_user_owner=auth_users_referenced.user_id","left");
			
        $this->db->where("auth_users.user_language_id", $value);
        return $this->db->get()->row();
    }

    public function get_by_user_name ( $value ) {
        $this->db->select("auth_users.user_id,auth_users.user_role_id,auth_roles_referenced.role_title as role_title_referenced,auth_roles_referenced.role_id as role_id_referenced,auth_users.user_language_id,auth_users.user_name,auth_users.user_surname,auth_users.user_username,auth_users.user_password,auth_users.user_email,auth_users.user_registered,auth_users.user_profile_image,auth_users.auth_user_owner,auth_users_referenced.user_name as user_name_referenced,auth_users_referenced.user_id as user_id_referenced,")->from("auth_users");
        
            $this->db->join("auth_roles as auth_roles_referenced","auth_users.user_role_id=auth_roles_referenced.role_id","left");
			
            $this->db->join("auth_users as auth_users_referenced","auth_users.auth_user_owner=auth_users_referenced.user_id","left");
			
        $this->db->where("auth_users.user_name", $value);
        return $this->db->get()->row();
    }

    public function get_by_user_surname ( $value ) {
        $this->db->select("auth_users.user_id,auth_users.user_role_id,auth_roles_referenced.role_title as role_title_referenced,auth_roles_referenced.role_id as role_id_referenced,auth_users.user_language_id,auth_users.user_name,auth_users.user_surname,auth_users.user_username,auth_users.user_password,auth_users.user_email,auth_users.user_registered,auth_users.user_profile_image,auth_users.auth_user_owner,auth_users_referenced.user_name as user_name_referenced,auth_users_referenced.user_id as user_id_referenced,")->from("auth_users");
        
            $this->db->join("auth_roles as auth_roles_referenced","auth_users.user_role_id=auth_roles_referenced.role_id","left");
			
            $this->db->join("auth_users as auth_users_referenced","auth_users.auth_user_owner=auth_users_referenced.user_id","left");
			
        $this->db->where("auth_users.user_surname", $value);
        return $this->db->get()->row();
    }

    public function get_by_user_username ( $value ) {
        $this->db->select("auth_users.user_id,auth_users.user_role_id,auth_roles_referenced.role_title as role_title_referenced,auth_roles_referenced.role_id as role_id_referenced,auth_users.user_language_id,auth_users.user_name,auth_users.user_surname,auth_users.user_username,auth_users.user_password,auth_users.user_email,auth_users.user_registered,auth_users.user_profile_image,auth_users.auth_user_owner,auth_users_referenced.user_name as user_name_referenced,auth_users_referenced.user_id as user_id_referenced,")->from("auth_users");
        
            $this->db->join("auth_roles as auth_roles_referenced","auth_users.user_role_id=auth_roles_referenced.role_id","left");
			
            $this->db->join("auth_users as auth_users_referenced","auth_users.auth_user_owner=auth_users_referenced.user_id","left");
			
        $this->db->where("auth_users.user_username", $value);
        return $this->db->get()->row();
    }

    public function get_by_user_password ( $value ) {
        $this->db->select("auth_users.user_id,auth_users.user_role_id,auth_roles_referenced.role_title as role_title_referenced,auth_roles_referenced.role_id as role_id_referenced,auth_users.user_language_id,auth_users.user_name,auth_users.user_surname,auth_users.user_username,auth_users.user_password,auth_users.user_email,auth_users.user_registered,auth_users.user_profile_image,auth_users.auth_user_owner,auth_users_referenced.user_name as user_name_referenced,auth_users_referenced.user_id as user_id_referenced,")->from("auth_users");
        
            $this->db->join("auth_roles as auth_roles_referenced","auth_users.user_role_id=auth_roles_referenced.role_id","left");
			
            $this->db->join("auth_users as auth_users_referenced","auth_users.auth_user_owner=auth_users_referenced.user_id","left");
			
        $this->db->where("auth_users.user_password", $value);
        return $this->db->get()->row();
    }

    public function get_by_user_email ( $value ) {
        $this->db->select("auth_users.user_id,auth_users.user_role_id,auth_roles_referenced.role_title as role_title_referenced,auth_roles_referenced.role_id as role_id_referenced,auth_users.user_language_id,auth_users.user_name,auth_users.user_surname,auth_users.user_username,auth_users.user_password,auth_users.user_email,auth_users.user_registered,auth_users.user_profile_image,auth_users.auth_user_owner,auth_users_referenced.user_name as user_name_referenced,auth_users_referenced.user_id as user_id_referenced,")->from("auth_users");
        
            $this->db->join("auth_roles as auth_roles_referenced","auth_users.user_role_id=auth_roles_referenced.role_id","left");
			
            $this->db->join("auth_users as auth_users_referenced","auth_users.auth_user_owner=auth_users_referenced.user_id","left");
			
        $this->db->where("auth_users.user_email", $value);
        return $this->db->get()->row();
    }

    public function get_by_user_registered ( $value ) {
        $this->db->select("auth_users.user_id,auth_users.user_role_id,auth_roles_referenced.role_title as role_title_referenced,auth_roles_referenced.role_id as role_id_referenced,auth_users.user_language_id,auth_users.user_name,auth_users.user_surname,auth_users.user_username,auth_users.user_password,auth_users.user_email,auth_users.user_registered,auth_users.user_profile_image,auth_users.auth_user_owner,auth_users_referenced.user_name as user_name_referenced,auth_users_referenced.user_id as user_id_referenced,")->from("auth_users");
        
            $this->db->join("auth_roles as auth_roles_referenced","auth_users.user_role_id=auth_roles_referenced.role_id","left");
			
            $this->db->join("auth_users as auth_users_referenced","auth_users.auth_user_owner=auth_users_referenced.user_id","left");
			
        $this->db->where("auth_users.user_registered", $value);
        return $this->db->get()->row();
    }

    public function get_by_user_profile_image ( $value ) {
        $this->db->select("auth_users.user_id,auth_users.user_role_id,auth_roles_referenced.role_title as role_title_referenced,auth_roles_referenced.role_id as role_id_referenced,auth_users.user_language_id,auth_users.user_name,auth_users.user_surname,auth_users.user_username,auth_users.user_password,auth_users.user_email,auth_users.user_registered,auth_users.user_profile_image,auth_users.auth_user_owner,auth_users_referenced.user_name as user_name_referenced,auth_users_referenced.user_id as user_id_referenced,")->from("auth_users");
        
            $this->db->join("auth_roles as auth_roles_referenced","auth_users.user_role_id=auth_roles_referenced.role_id","left");
			
            $this->db->join("auth_users as auth_users_referenced","auth_users.auth_user_owner=auth_users_referenced.user_id","left");
			
        $this->db->where("auth_users.user_profile_image", $value);
        return $this->db->get()->row();
    }

    public function get_by_auth_user_owner ( $value ) {
        $this->db->select("auth_users.user_id,auth_users.user_role_id,auth_roles_referenced.role_title as role_title_referenced,auth_roles_referenced.role_id as role_id_referenced,auth_users.user_language_id,auth_users.user_name,auth_users.user_surname,auth_users.user_username,auth_users.user_password,auth_users.user_email,auth_users.user_registered,auth_users.user_profile_image,auth_users.auth_user_owner,auth_users_referenced.user_name as user_name_referenced,auth_users_referenced.user_id as user_id_referenced,")->from("auth_users");
        
            $this->db->join("auth_roles as auth_roles_referenced","auth_users.user_role_id=auth_roles_referenced.role_id","left");
			
            $this->db->join("auth_users as auth_users_referenced","auth_users.auth_user_owner=auth_users_referenced.user_id","left");
			
        $this->db->where("auth_users.auth_user_owner", $value);
        return $this->db->get()->row();
    }

    
    public function get_auth_roles_reference ($user_id,$user_level) {
        if ( $this->get_see_all("auth_roles") ) {

        } else if ($this->get_see_others("auth_roles")) {
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

            
            $this->db->where_in("auth_roles.auth_role_owner", $u );

        } else {
            
            $this->db->where("auth_roles.auth_role_owner", $user_id);
        }

        return $this->db->get("auth_roles");
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



    public function get_auth_users_count ($page , $auth_role = 0,$auth_user = 0, $term = "", $user_id, $user_role, $user_level ) {

        if ( $this->get_see_all("auth_users")) {

            $this->db->select(
                    "auth_users.user_id,auth_users.user_role_id,auth_roles_referenced.role_title as role_title_referenced,auth_roles_referenced.role_id as role_id_referenced,auth_users.user_language_id,auth_users.user_name,auth_users.user_surname,auth_users.user_username,auth_users.user_password,auth_users.user_email,auth_users.user_registered,auth_users.user_profile_image,auth_users.auth_user_owner,auth_users_referenced.user_name as user_name_referenced,auth_users_referenced.user_id as user_id_referenced"
            )->from("auth_users");
            
            $this->db->join("auth_roles as auth_roles_referenced","auth_users.user_role_id=auth_roles_referenced.role_id","left");
			
            $this->db->join("auth_users as auth_users_referenced","auth_users.auth_user_owner=auth_users_referenced.user_id","left");
			
            		
            if ( $auth_role ) {
                $this->db->where( "auth_roles_referenced.role_id", $auth_role );
            }
				
            if ( $auth_user ) {
                $this->db->where( "auth_users_referenced.user_id", $auth_user );
            }
		

        } else if (!$this->get_see_others("auth_users")) {
            $this->db->select(
                    "auth_users.user_id,auth_users.user_role_id,auth_roles_referenced.role_title as role_title_referenced,auth_roles_referenced.role_id as role_id_referenced,auth_users.user_language_id,auth_users.user_name,auth_users.user_surname,auth_users.user_username,auth_users.user_password,auth_users.user_email,auth_users.user_registered,auth_users.user_profile_image,auth_users.auth_user_owner,auth_users_referenced.user_name as user_name_referenced,auth_users_referenced.user_id as user_id_referenced"
            )->from("auth_users");
            
            $this->db->join("auth_roles as auth_roles_referenced","auth_users.user_role_id=auth_roles_referenced.role_id","left");
			
            $this->db->join("auth_users as auth_users_referenced","auth_users.auth_user_owner=auth_users_referenced.user_id","left");
			
            		
            if ( $auth_role ) {
                $this->db->where( "auth_roles_referenced.role_id", $auth_role );
            }
				
            if ( $auth_user ) {
                $this->db->where( "auth_users_referenced.user_id", $auth_user );
            }
		

            
            $this->db->where("auth_users.auth_user_owner", $user_id);


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
                    "auth_users.user_id,auth_users.user_role_id,auth_roles_referenced.role_title as role_title_referenced,auth_roles_referenced.role_id as role_id_referenced,auth_users.user_language_id,auth_users.user_name,auth_users.user_surname,auth_users.user_username,auth_users.user_password,auth_users.user_email,auth_users.user_registered,auth_users.user_profile_image,auth_users.auth_user_owner,auth_users_referenced.user_name as user_name_referenced,auth_users_referenced.user_id as user_id_referenced"
            )->from("auth_users");

            
            $this->db->join("auth_roles as auth_roles_referenced","auth_users.user_role_id=auth_roles_referenced.role_id","left");
			
            $this->db->join("auth_users as auth_users_referenced","auth_users.auth_user_owner=auth_users_referenced.user_id","left");
			
            		
            if ( $auth_role ) {
                $this->db->where( "auth_roles_referenced.role_id", $auth_role );
            }
				
            if ( $auth_user ) {
                $this->db->where( "auth_users_referenced.user_id", $auth_user );
            }
		

            
            $this->db->where_in("auth_users.auth_user_owner", $u );

        }

        if ( !empty($term)) {
            $this->db->where("auth_users.user_language_id LIKE '%".$term."%' OR auth_users.user_name LIKE '%".$term."%' OR auth_users.user_surname LIKE '%".$term."%' OR auth_users.user_username LIKE '%".$term."%' OR auth_users.user_password LIKE '%".$term."%' OR auth_users.user_email LIKE '%".$term."%' OR auth_users.user_registered LIKE '%".$term."%' OR auth_users.user_profile_image LIKE '%".$term."%' ");
        }

        return $this->db->get()->num_rows;
    }

    public function create ( $info, $user_id ) {

        foreach ( $info as $_key => $_value ) {
            if ( $_value == null ||  $_value == 'null' ) {
                unset($info[$_key]);   
            }
        }

        
            $info["auth_user_owner"] = $user_id;
        $id = $this->db->insert("auth_users", $info );
        $this->add_log("auth_user nesnesi oluşturuldu [ id : ".$this->db->insert_id()." ]");
    }

    public function update ( $info,  $value ) {

        foreach ( $info as $_key => $_value ) {
            if ( $_value == null ||  $_value == 'null' ) {
                unset($info[$_key]);   
            }
        }

        $this->db->where("user_id", $value );
        $result = $this->db->update("auth_users", $info );
        $this->add_log("auth_user nesnesi güncellendi [ id : ".$value." ]");
        return $result;
    }

    public function delete ( $value ) {
        $this->db->where("user_id", $value);
        $result = $this->db->delete("auth_users" );
        $this->add_log("auth_user nesnesi silindi [ id : ".$value." ]");
        return $result;
    }

    public function get_table_headers () {
        $query = "describe auth_users";
        $rs = $this->db->query($query);

        $headers = array();
        if ( $rs->num_rows > 0 ) {
            foreach ( $rs->result() as $row ) {
                $headers[] = $this->get_label_value( $row->Field );
            }
        }
        return $headers;
    }

    		
    public function delete_blob_field( $auth_user_id = null ) {
        if ( $auth_user_id ) {
            $info = array("user_profile_image" => null );
            $this->db->where("user_id",$auth_user_id);
            return $this->db->update("auth_users",$info);
        } else {
            return false;
        }
    }
	

}