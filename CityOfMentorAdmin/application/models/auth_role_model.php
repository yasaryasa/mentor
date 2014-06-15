<?php
/*
 * Bu Yazılım İmleç A.Ş. Tarafından Geliştirilmiştir. 
 * http://www.imlec.com.tr 
 * http://www.imleç.com.tr 
 */
class auth_role_model extends Imlec_Model {
    public function get_auth_roles( $page=1 , $auth_role = 0,$auth_user = 0 , $term = "", $user_id, $user_role, $user_level ) {
        if ( $this->get_see_all("auth_roles")) {
            $this->db->select(
                    "auth_roles.role_id,auth_roles.role_parent,auth_roles_referenced.role_title as role_title_referenced,auth_roles_referenced.role_id as role_id_referenced,auth_roles.role_title,auth_roles.role_description,auth_roles.role_level,auth_roles.auth_role_owner,auth_users_referenced.user_name as user_name_referenced,auth_users_referenced.user_id as user_id_referenced"
            )->from("auth_roles");
            
            $this->db->join("auth_roles as auth_roles_referenced","auth_roles.role_parent=auth_roles_referenced.role_id","left");
			
            $this->db->join("auth_users as auth_users_referenced","auth_roles.auth_role_owner=auth_users_referenced.user_id","left");
			
            		
            if ( $auth_role ) {
                $this->db->where( "auth_roles_referenced.role_id", $auth_role );
            }
				
            if ( $auth_user ) {
                $this->db->where( "auth_users_referenced.user_id", $auth_user );
            }
		
        } else if (!$this->get_see_others("auth_roles")) {
            $this->db->select(
                    "auth_roles.role_id,auth_roles.role_parent,auth_roles_referenced.role_title as role_title_referenced,auth_roles_referenced.role_id as role_id_referenced,auth_roles.role_title,auth_roles.role_description,auth_roles.role_level,auth_roles.auth_role_owner,auth_users_referenced.user_name as user_name_referenced,auth_users_referenced.user_id as user_id_referenced"
            )->from("auth_roles");
            
            $this->db->join("auth_roles as auth_roles_referenced","auth_roles.role_parent=auth_roles_referenced.role_id","left");
			
            $this->db->join("auth_users as auth_users_referenced","auth_roles.auth_role_owner=auth_users_referenced.user_id","left");
			
            		
            if ( $auth_role ) {
                $this->db->where( "auth_roles_referenced.role_id", $auth_role );
            }
				
            if ( $auth_user ) {
                $this->db->where( "auth_users_referenced.user_id", $auth_user );
            }
		
            
            $this->db->where("auth_roles.auth_role_owner", $user_id);
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
                    "auth_roles.role_id,auth_roles.role_parent,auth_roles_referenced.role_title as role_title_referenced,auth_roles_referenced.role_id as role_id_referenced,auth_roles.role_title,auth_roles.role_description,auth_roles.role_level,auth_roles.auth_role_owner,auth_users_referenced.user_name as user_name_referenced,auth_users_referenced.user_id as user_id_referenced"
            )->from("auth_roles");

            
            $this->db->join("auth_roles as auth_roles_referenced","auth_roles.role_parent=auth_roles_referenced.role_id","left");
			
            $this->db->join("auth_users as auth_users_referenced","auth_roles.auth_role_owner=auth_users_referenced.user_id","left");
			
            		
            if ( $auth_role ) {
                $this->db->where( "auth_roles_referenced.role_id", $auth_role );
            }
				
            if ( $auth_user ) {
                $this->db->where( "auth_users_referenced.user_id", $auth_user );
            }
		
            
            $this->db->where_in("auth_roles.auth_role_owner", $u );
        }

        if ( !empty($term)) {
        $this->db->where("auth_roles.role_title LIKE '%".$term."%' OR auth_roles.role_description LIKE '%".$term."%' OR auth_roles.role_level LIKE '%".$term."%' ");
        } else {
            $this->db->limit( 10, ($page-1)*10 );
        }

        return $this->db->get();
    }
    
    
    public function get_by_role_id ( $value ) {
        $this->db->select("auth_roles.role_id,auth_roles.role_parent,auth_roles_referenced.role_title as role_title_referenced,auth_roles_referenced.role_id as role_id_referenced,auth_roles.role_title,auth_roles.role_description,auth_roles.role_level,auth_roles.auth_role_owner,auth_users_referenced.user_name as user_name_referenced,auth_users_referenced.user_id as user_id_referenced,")->from("auth_roles");
        
            $this->db->join("auth_roles as auth_roles_referenced","auth_roles.role_parent=auth_roles_referenced.role_id","left");
			
            $this->db->join("auth_users as auth_users_referenced","auth_roles.auth_role_owner=auth_users_referenced.user_id","left");
			
        $this->db->where("auth_roles.role_id", $value);
        return $this->db->get()->row();
    }

    public function get_by_role_parent ( $value ) {
        $this->db->select("auth_roles.role_id,auth_roles.role_parent,auth_roles_referenced.role_title as role_title_referenced,auth_roles_referenced.role_id as role_id_referenced,auth_roles.role_title,auth_roles.role_description,auth_roles.role_level,auth_roles.auth_role_owner,auth_users_referenced.user_name as user_name_referenced,auth_users_referenced.user_id as user_id_referenced,")->from("auth_roles");
        
            $this->db->join("auth_roles as auth_roles_referenced","auth_roles.role_parent=auth_roles_referenced.role_id","left");
			
            $this->db->join("auth_users as auth_users_referenced","auth_roles.auth_role_owner=auth_users_referenced.user_id","left");
			
        $this->db->where("auth_roles.role_parent", $value);
        return $this->db->get()->row();
    }

    public function get_by_role_title ( $value ) {
        $this->db->select("auth_roles.role_id,auth_roles.role_parent,auth_roles_referenced.role_title as role_title_referenced,auth_roles_referenced.role_id as role_id_referenced,auth_roles.role_title,auth_roles.role_description,auth_roles.role_level,auth_roles.auth_role_owner,auth_users_referenced.user_name as user_name_referenced,auth_users_referenced.user_id as user_id_referenced,")->from("auth_roles");
        
            $this->db->join("auth_roles as auth_roles_referenced","auth_roles.role_parent=auth_roles_referenced.role_id","left");
			
            $this->db->join("auth_users as auth_users_referenced","auth_roles.auth_role_owner=auth_users_referenced.user_id","left");
			
        $this->db->where("auth_roles.role_title", $value);
        return $this->db->get()->row();
    }

    public function get_by_role_description ( $value ) {
        $this->db->select("auth_roles.role_id,auth_roles.role_parent,auth_roles_referenced.role_title as role_title_referenced,auth_roles_referenced.role_id as role_id_referenced,auth_roles.role_title,auth_roles.role_description,auth_roles.role_level,auth_roles.auth_role_owner,auth_users_referenced.user_name as user_name_referenced,auth_users_referenced.user_id as user_id_referenced,")->from("auth_roles");
        
            $this->db->join("auth_roles as auth_roles_referenced","auth_roles.role_parent=auth_roles_referenced.role_id","left");
			
            $this->db->join("auth_users as auth_users_referenced","auth_roles.auth_role_owner=auth_users_referenced.user_id","left");
			
        $this->db->where("auth_roles.role_description", $value);
        return $this->db->get()->row();
    }

    public function get_by_role_level ( $value ) {
        $this->db->select("auth_roles.role_id,auth_roles.role_parent,auth_roles_referenced.role_title as role_title_referenced,auth_roles_referenced.role_id as role_id_referenced,auth_roles.role_title,auth_roles.role_description,auth_roles.role_level,auth_roles.auth_role_owner,auth_users_referenced.user_name as user_name_referenced,auth_users_referenced.user_id as user_id_referenced,")->from("auth_roles");
        
            $this->db->join("auth_roles as auth_roles_referenced","auth_roles.role_parent=auth_roles_referenced.role_id","left");
			
            $this->db->join("auth_users as auth_users_referenced","auth_roles.auth_role_owner=auth_users_referenced.user_id","left");
			
        $this->db->where("auth_roles.role_level", $value);
        return $this->db->get()->row();
    }

    public function get_by_auth_role_owner ( $value ) {
        $this->db->select("auth_roles.role_id,auth_roles.role_parent,auth_roles_referenced.role_title as role_title_referenced,auth_roles_referenced.role_id as role_id_referenced,auth_roles.role_title,auth_roles.role_description,auth_roles.role_level,auth_roles.auth_role_owner,auth_users_referenced.user_name as user_name_referenced,auth_users_referenced.user_id as user_id_referenced,")->from("auth_roles");
        
            $this->db->join("auth_roles as auth_roles_referenced","auth_roles.role_parent=auth_roles_referenced.role_id","left");
			
            $this->db->join("auth_users as auth_users_referenced","auth_roles.auth_role_owner=auth_users_referenced.user_id","left");
			
        $this->db->where("auth_roles.auth_role_owner", $value);
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



    public function get_auth_roles_count ($page , $auth_role = 0,$auth_user = 0, $term = "", $user_id, $user_role, $user_level ) {

        if ( $this->get_see_all("auth_roles")) {

            $this->db->select(
                    "auth_roles.role_id,auth_roles.role_parent,auth_roles_referenced.role_title as role_title_referenced,auth_roles_referenced.role_id as role_id_referenced,auth_roles.role_title,auth_roles.role_description,auth_roles.role_level,auth_roles.auth_role_owner,auth_users_referenced.user_name as user_name_referenced,auth_users_referenced.user_id as user_id_referenced"
            )->from("auth_roles");
            
            $this->db->join("auth_roles as auth_roles_referenced","auth_roles.role_parent=auth_roles_referenced.role_id","left");
			
            $this->db->join("auth_users as auth_users_referenced","auth_roles.auth_role_owner=auth_users_referenced.user_id","left");
			
            		
            if ( $auth_role ) {
                $this->db->where( "auth_roles_referenced.role_id", $auth_role );
            }
				
            if ( $auth_user ) {
                $this->db->where( "auth_users_referenced.user_id", $auth_user );
            }
		

        } else if (!$this->get_see_others("auth_roles")) {
            $this->db->select(
                    "auth_roles.role_id,auth_roles.role_parent,auth_roles_referenced.role_title as role_title_referenced,auth_roles_referenced.role_id as role_id_referenced,auth_roles.role_title,auth_roles.role_description,auth_roles.role_level,auth_roles.auth_role_owner,auth_users_referenced.user_name as user_name_referenced,auth_users_referenced.user_id as user_id_referenced"
            )->from("auth_roles");
            
            $this->db->join("auth_roles as auth_roles_referenced","auth_roles.role_parent=auth_roles_referenced.role_id","left");
			
            $this->db->join("auth_users as auth_users_referenced","auth_roles.auth_role_owner=auth_users_referenced.user_id","left");
			
            		
            if ( $auth_role ) {
                $this->db->where( "auth_roles_referenced.role_id", $auth_role );
            }
				
            if ( $auth_user ) {
                $this->db->where( "auth_users_referenced.user_id", $auth_user );
            }
		

            
            $this->db->where("auth_roles.auth_role_owner", $user_id);


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
                    "auth_roles.role_id,auth_roles.role_parent,auth_roles_referenced.role_title as role_title_referenced,auth_roles_referenced.role_id as role_id_referenced,auth_roles.role_title,auth_roles.role_description,auth_roles.role_level,auth_roles.auth_role_owner,auth_users_referenced.user_name as user_name_referenced,auth_users_referenced.user_id as user_id_referenced"
            )->from("auth_roles");

            
            $this->db->join("auth_roles as auth_roles_referenced","auth_roles.role_parent=auth_roles_referenced.role_id","left");
			
            $this->db->join("auth_users as auth_users_referenced","auth_roles.auth_role_owner=auth_users_referenced.user_id","left");
			
            		
            if ( $auth_role ) {
                $this->db->where( "auth_roles_referenced.role_id", $auth_role );
            }
				
            if ( $auth_user ) {
                $this->db->where( "auth_users_referenced.user_id", $auth_user );
            }
		

            
            $this->db->where_in("auth_roles.auth_role_owner", $u );

        }

        if ( !empty($term)) {
            $this->db->where("auth_roles.role_title LIKE '%".$term."%' OR auth_roles.role_description LIKE '%".$term."%' OR auth_roles.role_level LIKE '%".$term."%' ");
        }

        return $this->db->get()->num_rows;
    }

    public function create ( $info, $user_id ) {

        foreach ( $info as $_key => $_value ) {
            if ( $_value == null ||  $_value == 'null' ) {
                unset($info[$_key]);   
            }
        }

        
            $info["auth_role_owner"] = $user_id;
        $id = $this->db->insert("auth_roles", $info );
        $this->add_log("auth_role nesnesi oluşturuldu [ id : ".$this->db->insert_id()." ]");
    }

    public function update ( $info,  $value ) {

        foreach ( $info as $_key => $_value ) {
            if ( $_value == null ||  $_value == 'null' ) {
                unset($info[$_key]);   
            }
        }

        $this->db->where("role_id", $value );
        $result = $this->db->update("auth_roles", $info );
        $this->add_log("auth_role nesnesi güncellendi [ id : ".$value." ]");
        return $result;
    }

    public function delete ( $value ) {
        $this->db->where("role_id", $value);
        $result = $this->db->delete("auth_roles" );
        $this->add_log("auth_role nesnesi silindi [ id : ".$value." ]");
        return $result;
    }

    public function get_table_headers () {
        $query = "describe auth_roles";
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