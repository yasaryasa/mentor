<?php
/*
 * Bu Yazılım İmleç A.Ş. Tarafından Geliştirilmiştir. 
 * http://www.imlec.com.tr 
 * http://www.imleç.com.tr 
 */
class gen_module_model extends Imlec_Model {
    public function get_gen_modules( $page=1 , $gen_module_group = 0,$auth_user = 0 , $term = "", $user_id, $user_role, $user_level ) {
        if ( $this->get_see_all("gen_modules")) {
            $this->db->select(
                    "gen_modules.module_id,gen_modules.module_title,gen_modules.module_order,gen_modules.module_group_id,gen_module_groups_referenced.module_group_title as module_group_title_referenced,gen_module_groups_referenced.module_group_id as module_group_id_referenced,gen_modules.gen_module_owner,auth_users_referenced.user_name as user_name_referenced,auth_users_referenced.user_id as user_id_referenced"
            )->from("gen_modules");
            
            $this->db->join("gen_module_groups as gen_module_groups_referenced","gen_modules.module_group_id=gen_module_groups_referenced.module_group_id","left");
			
            $this->db->join("auth_users as auth_users_referenced","gen_modules.gen_module_owner=auth_users_referenced.user_id","left");
			
            		
            if ( $gen_module_group ) {
                $this->db->where( "gen_module_groups_referenced.module_group_id", $gen_module_group );
            }
				
            if ( $auth_user ) {
                $this->db->where( "auth_users_referenced.user_id", $auth_user );
            }
		
        } else if (!$this->get_see_others("gen_modules")) {
            $this->db->select(
                    "gen_modules.module_id,gen_modules.module_title,gen_modules.module_order,gen_modules.module_group_id,gen_module_groups_referenced.module_group_title as module_group_title_referenced,gen_module_groups_referenced.module_group_id as module_group_id_referenced,gen_modules.gen_module_owner,auth_users_referenced.user_name as user_name_referenced,auth_users_referenced.user_id as user_id_referenced"
            )->from("gen_modules");
            
            $this->db->join("gen_module_groups as gen_module_groups_referenced","gen_modules.module_group_id=gen_module_groups_referenced.module_group_id","left");
			
            $this->db->join("auth_users as auth_users_referenced","gen_modules.gen_module_owner=auth_users_referenced.user_id","left");
			
            		
            if ( $gen_module_group ) {
                $this->db->where( "gen_module_groups_referenced.module_group_id", $gen_module_group );
            }
				
            if ( $auth_user ) {
                $this->db->where( "auth_users_referenced.user_id", $auth_user );
            }
		
            
            $this->db->where("gen_modules.gen_module_owner", $user_id);
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
                    "gen_modules.module_id,gen_modules.module_title,gen_modules.module_order,gen_modules.module_group_id,gen_module_groups_referenced.module_group_title as module_group_title_referenced,gen_module_groups_referenced.module_group_id as module_group_id_referenced,gen_modules.gen_module_owner,auth_users_referenced.user_name as user_name_referenced,auth_users_referenced.user_id as user_id_referenced"
            )->from("gen_modules");

            
            $this->db->join("gen_module_groups as gen_module_groups_referenced","gen_modules.module_group_id=gen_module_groups_referenced.module_group_id","left");
			
            $this->db->join("auth_users as auth_users_referenced","gen_modules.gen_module_owner=auth_users_referenced.user_id","left");
			
            		
            if ( $gen_module_group ) {
                $this->db->where( "gen_module_groups_referenced.module_group_id", $gen_module_group );
            }
				
            if ( $auth_user ) {
                $this->db->where( "auth_users_referenced.user_id", $auth_user );
            }
		
            
            $this->db->where_in("gen_modules.gen_module_owner", $u );
        }

        if ( !empty($term)) {
        $this->db->where("gen_modules.module_title LIKE '%".$term."%' OR gen_modules.module_order LIKE '%".$term."%' ");
        } else {
            $this->db->limit( 10, ($page-1)*10 );
        }

        return $this->db->get();
    }
    
    
    public function get_by_module_id ( $value ) {
        $this->db->select("gen_modules.module_id,gen_modules.module_title,gen_modules.module_order,gen_modules.module_group_id,gen_module_groups_referenced.module_group_title as module_group_title_referenced,gen_module_groups_referenced.module_group_id as module_group_id_referenced,gen_modules.gen_module_owner,auth_users_referenced.user_name as user_name_referenced,auth_users_referenced.user_id as user_id_referenced,")->from("gen_modules");
        
            $this->db->join("gen_module_groups as gen_module_groups_referenced","gen_modules.module_group_id=gen_module_groups_referenced.module_group_id","left");
			
            $this->db->join("auth_users as auth_users_referenced","gen_modules.gen_module_owner=auth_users_referenced.user_id","left");
			
        $this->db->where("gen_modules.module_id", $value);
        return $this->db->get()->row();
    }

    public function get_by_module_title ( $value ) {
        $this->db->select("gen_modules.module_id,gen_modules.module_title,gen_modules.module_order,gen_modules.module_group_id,gen_module_groups_referenced.module_group_title as module_group_title_referenced,gen_module_groups_referenced.module_group_id as module_group_id_referenced,gen_modules.gen_module_owner,auth_users_referenced.user_name as user_name_referenced,auth_users_referenced.user_id as user_id_referenced,")->from("gen_modules");
        
            $this->db->join("gen_module_groups as gen_module_groups_referenced","gen_modules.module_group_id=gen_module_groups_referenced.module_group_id","left");
			
            $this->db->join("auth_users as auth_users_referenced","gen_modules.gen_module_owner=auth_users_referenced.user_id","left");
			
        $this->db->where("gen_modules.module_title", $value);
        return $this->db->get()->row();
    }

    public function get_by_module_order ( $value ) {
        $this->db->select("gen_modules.module_id,gen_modules.module_title,gen_modules.module_order,gen_modules.module_group_id,gen_module_groups_referenced.module_group_title as module_group_title_referenced,gen_module_groups_referenced.module_group_id as module_group_id_referenced,gen_modules.gen_module_owner,auth_users_referenced.user_name as user_name_referenced,auth_users_referenced.user_id as user_id_referenced,")->from("gen_modules");
        
            $this->db->join("gen_module_groups as gen_module_groups_referenced","gen_modules.module_group_id=gen_module_groups_referenced.module_group_id","left");
			
            $this->db->join("auth_users as auth_users_referenced","gen_modules.gen_module_owner=auth_users_referenced.user_id","left");
			
        $this->db->where("gen_modules.module_order", $value);
        return $this->db->get()->row();
    }

    public function get_by_module_group_id ( $value ) {
        $this->db->select("gen_modules.module_id,gen_modules.module_title,gen_modules.module_order,gen_modules.module_group_id,gen_module_groups_referenced.module_group_title as module_group_title_referenced,gen_module_groups_referenced.module_group_id as module_group_id_referenced,gen_modules.gen_module_owner,auth_users_referenced.user_name as user_name_referenced,auth_users_referenced.user_id as user_id_referenced,")->from("gen_modules");
        
            $this->db->join("gen_module_groups as gen_module_groups_referenced","gen_modules.module_group_id=gen_module_groups_referenced.module_group_id","left");
			
            $this->db->join("auth_users as auth_users_referenced","gen_modules.gen_module_owner=auth_users_referenced.user_id","left");
			
        $this->db->where("gen_modules.module_group_id", $value);
        return $this->db->get()->row();
    }

    public function get_by_gen_module_owner ( $value ) {
        $this->db->select("gen_modules.module_id,gen_modules.module_title,gen_modules.module_order,gen_modules.module_group_id,gen_module_groups_referenced.module_group_title as module_group_title_referenced,gen_module_groups_referenced.module_group_id as module_group_id_referenced,gen_modules.gen_module_owner,auth_users_referenced.user_name as user_name_referenced,auth_users_referenced.user_id as user_id_referenced,")->from("gen_modules");
        
            $this->db->join("gen_module_groups as gen_module_groups_referenced","gen_modules.module_group_id=gen_module_groups_referenced.module_group_id","left");
			
            $this->db->join("auth_users as auth_users_referenced","gen_modules.gen_module_owner=auth_users_referenced.user_id","left");
			
        $this->db->where("gen_modules.gen_module_owner", $value);
        return $this->db->get()->row();
    }

    
    public function get_gen_module_groups_reference ($user_id,$user_level) {
        if ( $this->get_see_all("gen_module_groups") ) {

        } else if ($this->get_see_others("gen_module_groups")) {
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

            
            $this->db->where_in("gen_module_groups.gen_module_group_owner", $u );

        } else {
            
            $this->db->where("gen_module_groups.gen_module_group_owner", $user_id);
        }

        return $this->db->get("gen_module_groups");
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



    public function get_gen_modules_count ($page , $gen_module_group = 0,$auth_user = 0, $term = "", $user_id, $user_role, $user_level ) {

        if ( $this->get_see_all("gen_modules")) {

            $this->db->select(
                    "gen_modules.module_id,gen_modules.module_title,gen_modules.module_order,gen_modules.module_group_id,gen_module_groups_referenced.module_group_title as module_group_title_referenced,gen_module_groups_referenced.module_group_id as module_group_id_referenced,gen_modules.gen_module_owner,auth_users_referenced.user_name as user_name_referenced,auth_users_referenced.user_id as user_id_referenced"
            )->from("gen_modules");
            
            $this->db->join("gen_module_groups as gen_module_groups_referenced","gen_modules.module_group_id=gen_module_groups_referenced.module_group_id","left");
			
            $this->db->join("auth_users as auth_users_referenced","gen_modules.gen_module_owner=auth_users_referenced.user_id","left");
			
            		
            if ( $gen_module_group ) {
                $this->db->where( "gen_module_groups_referenced.module_group_id", $gen_module_group );
            }
				
            if ( $auth_user ) {
                $this->db->where( "auth_users_referenced.user_id", $auth_user );
            }
		

        } else if (!$this->get_see_others("gen_modules")) {
            $this->db->select(
                    "gen_modules.module_id,gen_modules.module_title,gen_modules.module_order,gen_modules.module_group_id,gen_module_groups_referenced.module_group_title as module_group_title_referenced,gen_module_groups_referenced.module_group_id as module_group_id_referenced,gen_modules.gen_module_owner,auth_users_referenced.user_name as user_name_referenced,auth_users_referenced.user_id as user_id_referenced"
            )->from("gen_modules");
            
            $this->db->join("gen_module_groups as gen_module_groups_referenced","gen_modules.module_group_id=gen_module_groups_referenced.module_group_id","left");
			
            $this->db->join("auth_users as auth_users_referenced","gen_modules.gen_module_owner=auth_users_referenced.user_id","left");
			
            		
            if ( $gen_module_group ) {
                $this->db->where( "gen_module_groups_referenced.module_group_id", $gen_module_group );
            }
				
            if ( $auth_user ) {
                $this->db->where( "auth_users_referenced.user_id", $auth_user );
            }
		

            
            $this->db->where("gen_modules.gen_module_owner", $user_id);


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
                    "gen_modules.module_id,gen_modules.module_title,gen_modules.module_order,gen_modules.module_group_id,gen_module_groups_referenced.module_group_title as module_group_title_referenced,gen_module_groups_referenced.module_group_id as module_group_id_referenced,gen_modules.gen_module_owner,auth_users_referenced.user_name as user_name_referenced,auth_users_referenced.user_id as user_id_referenced"
            )->from("gen_modules");

            
            $this->db->join("gen_module_groups as gen_module_groups_referenced","gen_modules.module_group_id=gen_module_groups_referenced.module_group_id","left");
			
            $this->db->join("auth_users as auth_users_referenced","gen_modules.gen_module_owner=auth_users_referenced.user_id","left");
			
            		
            if ( $gen_module_group ) {
                $this->db->where( "gen_module_groups_referenced.module_group_id", $gen_module_group );
            }
				
            if ( $auth_user ) {
                $this->db->where( "auth_users_referenced.user_id", $auth_user );
            }
		

            
            $this->db->where_in("gen_modules.gen_module_owner", $u );

        }

        if ( !empty($term)) {
            $this->db->where("gen_modules.module_title LIKE '%".$term."%' OR gen_modules.module_order LIKE '%".$term."%' ");
        }

        return $this->db->get()->num_rows;
    }

    public function create ( $info, $user_id ) {

        foreach ( $info as $_key => $_value ) {
            if ( $_value == null ||  $_value == 'null' ) {
                unset($info[$_key]);   
            }
        }

        
            $info["gen_module_owner"] = $user_id;
        $id = $this->db->insert("gen_modules", $info );
        $this->add_log("gen_module nesnesi oluşturuldu [ id : ".$this->db->insert_id()." ]");
    }

    public function update ( $info,  $value ) {

        foreach ( $info as $_key => $_value ) {
            if ( $_value == null ||  $_value == 'null' ) {
                unset($info[$_key]);   
            }
        }

        $this->db->where("module_id", $value );
        $result = $this->db->update("gen_modules", $info );
        $this->add_log("gen_module nesnesi güncellendi [ id : ".$value." ]");
        return $result;
    }

    public function delete ( $value ) {
        $this->db->where("module_id", $value);
        $result = $this->db->delete("gen_modules" );
        $this->add_log("gen_module nesnesi silindi [ id : ".$value." ]");
        return $result;
    }

    public function get_table_headers () {
        $query = "describe gen_modules";
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