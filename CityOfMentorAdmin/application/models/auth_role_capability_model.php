<?php
/*
 * Bu Yazılım İmleç A.Ş. Tarafından Geliştirilmiştir. 
 * http://www.imlec.com.tr 
 * http://www.imleç.com.tr 
 */
class auth_role_capability_model extends Imlec_Model {
    public function get_auth_role_capabilities( $page=1 , $auth_role = 0,$gen_module = 0,$auth_user = 0 , $term = "", $user_id, $user_role, $user_level ) {
        if ( $this->get_see_all("auth_role_capabilities")) {
            $this->db->select(
                    "auth_role_capabilities.role_capability_id,auth_role_capabilities.role_capability_role_id,auth_roles_referenced.role_title as role_title_referenced,auth_roles_referenced.role_id as role_id_referenced,auth_role_capabilities.role_capability_module_name,gen_modules_referenced.module_title as module_title_referenced,gen_modules_referenced.module_title as module_title_referenced,auth_role_capabilities.role_capability_see_all,auth_role_capabilities.role_capability_see_others,auth_role_capabilities.role_capability_show,auth_role_capabilities.role_capability_create,auth_role_capabilities.role_capability_read,auth_role_capabilities.role_capability_update,auth_role_capabilities.role_capability_delete,auth_role_capabilities.auth_role_capability_owner,auth_users_referenced.user_name as user_name_referenced,auth_users_referenced.user_id as user_id_referenced"
            )->from("auth_role_capabilities");
            
            $this->db->join("auth_roles as auth_roles_referenced","auth_role_capabilities.role_capability_role_id=auth_roles_referenced.role_id","left");
			
            $this->db->join("gen_modules as gen_modules_referenced","auth_role_capabilities.role_capability_module_name=gen_modules_referenced.module_title","left");
			
            $this->db->join("auth_users as auth_users_referenced","auth_role_capabilities.auth_role_capability_owner=auth_users_referenced.user_id","left");
			
            		
            if ( $auth_role ) {
                $this->db->where( "auth_roles_referenced.role_id", $auth_role );
            }
				
            if ( $gen_module ) {
                $this->db->where( "gen_modules_referenced.module_title", $gen_module );
            }
				
            if ( $auth_user ) {
                $this->db->where( "auth_users_referenced.user_id", $auth_user );
            }
		
        } else if (!$this->get_see_others("auth_role_capabilities")) {
            $this->db->select(
                    "auth_role_capabilities.role_capability_id,auth_role_capabilities.role_capability_role_id,auth_roles_referenced.role_title as role_title_referenced,auth_roles_referenced.role_id as role_id_referenced,auth_role_capabilities.role_capability_module_name,gen_modules_referenced.module_title as module_title_referenced,gen_modules_referenced.module_title as module_title_referenced,auth_role_capabilities.role_capability_see_all,auth_role_capabilities.role_capability_see_others,auth_role_capabilities.role_capability_show,auth_role_capabilities.role_capability_create,auth_role_capabilities.role_capability_read,auth_role_capabilities.role_capability_update,auth_role_capabilities.role_capability_delete,auth_role_capabilities.auth_role_capability_owner,auth_users_referenced.user_name as user_name_referenced,auth_users_referenced.user_id as user_id_referenced"
            )->from("auth_role_capabilities");
            
            $this->db->join("auth_roles as auth_roles_referenced","auth_role_capabilities.role_capability_role_id=auth_roles_referenced.role_id","left");
			
            $this->db->join("gen_modules as gen_modules_referenced","auth_role_capabilities.role_capability_module_name=gen_modules_referenced.module_title","left");
			
            $this->db->join("auth_users as auth_users_referenced","auth_role_capabilities.auth_role_capability_owner=auth_users_referenced.user_id","left");
			
            		
            if ( $auth_role ) {
                $this->db->where( "auth_roles_referenced.role_id", $auth_role );
            }
				
            if ( $gen_module ) {
                $this->db->where( "gen_modules_referenced.module_title", $gen_module );
            }
				
            if ( $auth_user ) {
                $this->db->where( "auth_users_referenced.user_id", $auth_user );
            }
		
            
            $this->db->where("auth_role_capabilities.auth_role_capability_owner", $user_id);
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
                    "auth_role_capabilities.role_capability_id,auth_role_capabilities.role_capability_role_id,auth_roles_referenced.role_title as role_title_referenced,auth_roles_referenced.role_id as role_id_referenced,auth_role_capabilities.role_capability_module_name,gen_modules_referenced.module_title as module_title_referenced,gen_modules_referenced.module_title as module_title_referenced,auth_role_capabilities.role_capability_see_all,auth_role_capabilities.role_capability_see_others,auth_role_capabilities.role_capability_show,auth_role_capabilities.role_capability_create,auth_role_capabilities.role_capability_read,auth_role_capabilities.role_capability_update,auth_role_capabilities.role_capability_delete,auth_role_capabilities.auth_role_capability_owner,auth_users_referenced.user_name as user_name_referenced,auth_users_referenced.user_id as user_id_referenced"
            )->from("auth_role_capabilities");

            
            $this->db->join("auth_roles as auth_roles_referenced","auth_role_capabilities.role_capability_role_id=auth_roles_referenced.role_id","left");
			
            $this->db->join("gen_modules as gen_modules_referenced","auth_role_capabilities.role_capability_module_name=gen_modules_referenced.module_title","left");
			
            $this->db->join("auth_users as auth_users_referenced","auth_role_capabilities.auth_role_capability_owner=auth_users_referenced.user_id","left");
			
            		
            if ( $auth_role ) {
                $this->db->where( "auth_roles_referenced.role_id", $auth_role );
            }
				
            if ( $gen_module ) {
                $this->db->where( "gen_modules_referenced.module_title", $gen_module );
            }
				
            if ( $auth_user ) {
                $this->db->where( "auth_users_referenced.user_id", $auth_user );
            }
		
            
            $this->db->where_in("auth_role_capabilities.auth_role_capability_owner", $u );
        }

        if ( !empty($term)) {
        $this->db->where("auth_role_capabilities.role_capability_see_all LIKE '%".$term."%' OR auth_role_capabilities.role_capability_see_others LIKE '%".$term."%' OR auth_role_capabilities.role_capability_show LIKE '%".$term."%' OR auth_role_capabilities.role_capability_create LIKE '%".$term."%' OR auth_role_capabilities.role_capability_read LIKE '%".$term."%' OR auth_role_capabilities.role_capability_update LIKE '%".$term."%' OR auth_role_capabilities.role_capability_delete LIKE '%".$term."%' ");
        } else {
            $this->db->limit( 10, ($page-1)*10 );
        }

        return $this->db->get();
    }
    
    
    public function get_by_role_capability_id ( $value ) {
        $this->db->select("auth_role_capabilities.role_capability_id,auth_role_capabilities.role_capability_role_id,auth_roles_referenced.role_title as role_title_referenced,auth_roles_referenced.role_id as role_id_referenced,auth_role_capabilities.role_capability_module_name,gen_modules_referenced.module_title as module_title_referenced,gen_modules_referenced.module_title as module_title_referenced,auth_role_capabilities.role_capability_see_all,auth_role_capabilities.role_capability_see_others,auth_role_capabilities.role_capability_show,auth_role_capabilities.role_capability_create,auth_role_capabilities.role_capability_read,auth_role_capabilities.role_capability_update,auth_role_capabilities.role_capability_delete,auth_role_capabilities.auth_role_capability_owner,auth_users_referenced.user_name as user_name_referenced,auth_users_referenced.user_id as user_id_referenced,")->from("auth_role_capabilities");
        
            $this->db->join("auth_roles as auth_roles_referenced","auth_role_capabilities.role_capability_role_id=auth_roles_referenced.role_id","left");
			
            $this->db->join("gen_modules as gen_modules_referenced","auth_role_capabilities.role_capability_module_name=gen_modules_referenced.module_title","left");
			
            $this->db->join("auth_users as auth_users_referenced","auth_role_capabilities.auth_role_capability_owner=auth_users_referenced.user_id","left");
			
        $this->db->where("auth_role_capabilities.role_capability_id", $value);
        return $this->db->get()->row();
    }

    public function get_by_role_capability_role_id ( $value ) {
        $this->db->select("auth_role_capabilities.role_capability_id,auth_role_capabilities.role_capability_role_id,auth_roles_referenced.role_title as role_title_referenced,auth_roles_referenced.role_id as role_id_referenced,auth_role_capabilities.role_capability_module_name,gen_modules_referenced.module_title as module_title_referenced,gen_modules_referenced.module_title as module_title_referenced,auth_role_capabilities.role_capability_see_all,auth_role_capabilities.role_capability_see_others,auth_role_capabilities.role_capability_show,auth_role_capabilities.role_capability_create,auth_role_capabilities.role_capability_read,auth_role_capabilities.role_capability_update,auth_role_capabilities.role_capability_delete,auth_role_capabilities.auth_role_capability_owner,auth_users_referenced.user_name as user_name_referenced,auth_users_referenced.user_id as user_id_referenced,")->from("auth_role_capabilities");
        
            $this->db->join("auth_roles as auth_roles_referenced","auth_role_capabilities.role_capability_role_id=auth_roles_referenced.role_id","left");
			
            $this->db->join("gen_modules as gen_modules_referenced","auth_role_capabilities.role_capability_module_name=gen_modules_referenced.module_title","left");
			
            $this->db->join("auth_users as auth_users_referenced","auth_role_capabilities.auth_role_capability_owner=auth_users_referenced.user_id","left");
			
        $this->db->where("auth_role_capabilities.role_capability_role_id", $value);
        return $this->db->get()->row();
    }

    public function get_by_role_capability_module_name ( $value ) {
        $this->db->select("auth_role_capabilities.role_capability_id,auth_role_capabilities.role_capability_role_id,auth_roles_referenced.role_title as role_title_referenced,auth_roles_referenced.role_id as role_id_referenced,auth_role_capabilities.role_capability_module_name,gen_modules_referenced.module_title as module_title_referenced,gen_modules_referenced.module_title as module_title_referenced,auth_role_capabilities.role_capability_see_all,auth_role_capabilities.role_capability_see_others,auth_role_capabilities.role_capability_show,auth_role_capabilities.role_capability_create,auth_role_capabilities.role_capability_read,auth_role_capabilities.role_capability_update,auth_role_capabilities.role_capability_delete,auth_role_capabilities.auth_role_capability_owner,auth_users_referenced.user_name as user_name_referenced,auth_users_referenced.user_id as user_id_referenced,")->from("auth_role_capabilities");
        
            $this->db->join("auth_roles as auth_roles_referenced","auth_role_capabilities.role_capability_role_id=auth_roles_referenced.role_id","left");
			
            $this->db->join("gen_modules as gen_modules_referenced","auth_role_capabilities.role_capability_module_name=gen_modules_referenced.module_title","left");
			
            $this->db->join("auth_users as auth_users_referenced","auth_role_capabilities.auth_role_capability_owner=auth_users_referenced.user_id","left");
			
        $this->db->where("auth_role_capabilities.role_capability_module_name", $value);
        return $this->db->get()->row();
    }

    public function get_by_role_capability_see_all ( $value ) {
        $this->db->select("auth_role_capabilities.role_capability_id,auth_role_capabilities.role_capability_role_id,auth_roles_referenced.role_title as role_title_referenced,auth_roles_referenced.role_id as role_id_referenced,auth_role_capabilities.role_capability_module_name,gen_modules_referenced.module_title as module_title_referenced,gen_modules_referenced.module_title as module_title_referenced,auth_role_capabilities.role_capability_see_all,auth_role_capabilities.role_capability_see_others,auth_role_capabilities.role_capability_show,auth_role_capabilities.role_capability_create,auth_role_capabilities.role_capability_read,auth_role_capabilities.role_capability_update,auth_role_capabilities.role_capability_delete,auth_role_capabilities.auth_role_capability_owner,auth_users_referenced.user_name as user_name_referenced,auth_users_referenced.user_id as user_id_referenced,")->from("auth_role_capabilities");
        
            $this->db->join("auth_roles as auth_roles_referenced","auth_role_capabilities.role_capability_role_id=auth_roles_referenced.role_id","left");
			
            $this->db->join("gen_modules as gen_modules_referenced","auth_role_capabilities.role_capability_module_name=gen_modules_referenced.module_title","left");
			
            $this->db->join("auth_users as auth_users_referenced","auth_role_capabilities.auth_role_capability_owner=auth_users_referenced.user_id","left");
			
        $this->db->where("auth_role_capabilities.role_capability_see_all", $value);
        return $this->db->get()->row();
    }

    public function get_by_role_capability_see_others ( $value ) {
        $this->db->select("auth_role_capabilities.role_capability_id,auth_role_capabilities.role_capability_role_id,auth_roles_referenced.role_title as role_title_referenced,auth_roles_referenced.role_id as role_id_referenced,auth_role_capabilities.role_capability_module_name,gen_modules_referenced.module_title as module_title_referenced,gen_modules_referenced.module_title as module_title_referenced,auth_role_capabilities.role_capability_see_all,auth_role_capabilities.role_capability_see_others,auth_role_capabilities.role_capability_show,auth_role_capabilities.role_capability_create,auth_role_capabilities.role_capability_read,auth_role_capabilities.role_capability_update,auth_role_capabilities.role_capability_delete,auth_role_capabilities.auth_role_capability_owner,auth_users_referenced.user_name as user_name_referenced,auth_users_referenced.user_id as user_id_referenced,")->from("auth_role_capabilities");
        
            $this->db->join("auth_roles as auth_roles_referenced","auth_role_capabilities.role_capability_role_id=auth_roles_referenced.role_id","left");
			
            $this->db->join("gen_modules as gen_modules_referenced","auth_role_capabilities.role_capability_module_name=gen_modules_referenced.module_title","left");
			
            $this->db->join("auth_users as auth_users_referenced","auth_role_capabilities.auth_role_capability_owner=auth_users_referenced.user_id","left");
			
        $this->db->where("auth_role_capabilities.role_capability_see_others", $value);
        return $this->db->get()->row();
    }

    public function get_by_role_capability_show ( $value ) {
        $this->db->select("auth_role_capabilities.role_capability_id,auth_role_capabilities.role_capability_role_id,auth_roles_referenced.role_title as role_title_referenced,auth_roles_referenced.role_id as role_id_referenced,auth_role_capabilities.role_capability_module_name,gen_modules_referenced.module_title as module_title_referenced,gen_modules_referenced.module_title as module_title_referenced,auth_role_capabilities.role_capability_see_all,auth_role_capabilities.role_capability_see_others,auth_role_capabilities.role_capability_show,auth_role_capabilities.role_capability_create,auth_role_capabilities.role_capability_read,auth_role_capabilities.role_capability_update,auth_role_capabilities.role_capability_delete,auth_role_capabilities.auth_role_capability_owner,auth_users_referenced.user_name as user_name_referenced,auth_users_referenced.user_id as user_id_referenced,")->from("auth_role_capabilities");
        
            $this->db->join("auth_roles as auth_roles_referenced","auth_role_capabilities.role_capability_role_id=auth_roles_referenced.role_id","left");
			
            $this->db->join("gen_modules as gen_modules_referenced","auth_role_capabilities.role_capability_module_name=gen_modules_referenced.module_title","left");
			
            $this->db->join("auth_users as auth_users_referenced","auth_role_capabilities.auth_role_capability_owner=auth_users_referenced.user_id","left");
			
        $this->db->where("auth_role_capabilities.role_capability_show", $value);
        return $this->db->get()->row();
    }

    public function get_by_role_capability_create ( $value ) {
        $this->db->select("auth_role_capabilities.role_capability_id,auth_role_capabilities.role_capability_role_id,auth_roles_referenced.role_title as role_title_referenced,auth_roles_referenced.role_id as role_id_referenced,auth_role_capabilities.role_capability_module_name,gen_modules_referenced.module_title as module_title_referenced,gen_modules_referenced.module_title as module_title_referenced,auth_role_capabilities.role_capability_see_all,auth_role_capabilities.role_capability_see_others,auth_role_capabilities.role_capability_show,auth_role_capabilities.role_capability_create,auth_role_capabilities.role_capability_read,auth_role_capabilities.role_capability_update,auth_role_capabilities.role_capability_delete,auth_role_capabilities.auth_role_capability_owner,auth_users_referenced.user_name as user_name_referenced,auth_users_referenced.user_id as user_id_referenced,")->from("auth_role_capabilities");
        
            $this->db->join("auth_roles as auth_roles_referenced","auth_role_capabilities.role_capability_role_id=auth_roles_referenced.role_id","left");
			
            $this->db->join("gen_modules as gen_modules_referenced","auth_role_capabilities.role_capability_module_name=gen_modules_referenced.module_title","left");
			
            $this->db->join("auth_users as auth_users_referenced","auth_role_capabilities.auth_role_capability_owner=auth_users_referenced.user_id","left");
			
        $this->db->where("auth_role_capabilities.role_capability_create", $value);
        return $this->db->get()->row();
    }

    public function get_by_role_capability_read ( $value ) {
        $this->db->select("auth_role_capabilities.role_capability_id,auth_role_capabilities.role_capability_role_id,auth_roles_referenced.role_title as role_title_referenced,auth_roles_referenced.role_id as role_id_referenced,auth_role_capabilities.role_capability_module_name,gen_modules_referenced.module_title as module_title_referenced,gen_modules_referenced.module_title as module_title_referenced,auth_role_capabilities.role_capability_see_all,auth_role_capabilities.role_capability_see_others,auth_role_capabilities.role_capability_show,auth_role_capabilities.role_capability_create,auth_role_capabilities.role_capability_read,auth_role_capabilities.role_capability_update,auth_role_capabilities.role_capability_delete,auth_role_capabilities.auth_role_capability_owner,auth_users_referenced.user_name as user_name_referenced,auth_users_referenced.user_id as user_id_referenced,")->from("auth_role_capabilities");
        
            $this->db->join("auth_roles as auth_roles_referenced","auth_role_capabilities.role_capability_role_id=auth_roles_referenced.role_id","left");
			
            $this->db->join("gen_modules as gen_modules_referenced","auth_role_capabilities.role_capability_module_name=gen_modules_referenced.module_title","left");
			
            $this->db->join("auth_users as auth_users_referenced","auth_role_capabilities.auth_role_capability_owner=auth_users_referenced.user_id","left");
			
        $this->db->where("auth_role_capabilities.role_capability_read", $value);
        return $this->db->get()->row();
    }

    public function get_by_role_capability_update ( $value ) {
        $this->db->select("auth_role_capabilities.role_capability_id,auth_role_capabilities.role_capability_role_id,auth_roles_referenced.role_title as role_title_referenced,auth_roles_referenced.role_id as role_id_referenced,auth_role_capabilities.role_capability_module_name,gen_modules_referenced.module_title as module_title_referenced,gen_modules_referenced.module_title as module_title_referenced,auth_role_capabilities.role_capability_see_all,auth_role_capabilities.role_capability_see_others,auth_role_capabilities.role_capability_show,auth_role_capabilities.role_capability_create,auth_role_capabilities.role_capability_read,auth_role_capabilities.role_capability_update,auth_role_capabilities.role_capability_delete,auth_role_capabilities.auth_role_capability_owner,auth_users_referenced.user_name as user_name_referenced,auth_users_referenced.user_id as user_id_referenced,")->from("auth_role_capabilities");
        
            $this->db->join("auth_roles as auth_roles_referenced","auth_role_capabilities.role_capability_role_id=auth_roles_referenced.role_id","left");
			
            $this->db->join("gen_modules as gen_modules_referenced","auth_role_capabilities.role_capability_module_name=gen_modules_referenced.module_title","left");
			
            $this->db->join("auth_users as auth_users_referenced","auth_role_capabilities.auth_role_capability_owner=auth_users_referenced.user_id","left");
			
        $this->db->where("auth_role_capabilities.role_capability_update", $value);
        return $this->db->get()->row();
    }

    public function get_by_role_capability_delete ( $value ) {
        $this->db->select("auth_role_capabilities.role_capability_id,auth_role_capabilities.role_capability_role_id,auth_roles_referenced.role_title as role_title_referenced,auth_roles_referenced.role_id as role_id_referenced,auth_role_capabilities.role_capability_module_name,gen_modules_referenced.module_title as module_title_referenced,gen_modules_referenced.module_title as module_title_referenced,auth_role_capabilities.role_capability_see_all,auth_role_capabilities.role_capability_see_others,auth_role_capabilities.role_capability_show,auth_role_capabilities.role_capability_create,auth_role_capabilities.role_capability_read,auth_role_capabilities.role_capability_update,auth_role_capabilities.role_capability_delete,auth_role_capabilities.auth_role_capability_owner,auth_users_referenced.user_name as user_name_referenced,auth_users_referenced.user_id as user_id_referenced,")->from("auth_role_capabilities");
        
            $this->db->join("auth_roles as auth_roles_referenced","auth_role_capabilities.role_capability_role_id=auth_roles_referenced.role_id","left");
			
            $this->db->join("gen_modules as gen_modules_referenced","auth_role_capabilities.role_capability_module_name=gen_modules_referenced.module_title","left");
			
            $this->db->join("auth_users as auth_users_referenced","auth_role_capabilities.auth_role_capability_owner=auth_users_referenced.user_id","left");
			
        $this->db->where("auth_role_capabilities.role_capability_delete", $value);
        return $this->db->get()->row();
    }

    public function get_by_auth_role_capability_owner ( $value ) {
        $this->db->select("auth_role_capabilities.role_capability_id,auth_role_capabilities.role_capability_role_id,auth_roles_referenced.role_title as role_title_referenced,auth_roles_referenced.role_id as role_id_referenced,auth_role_capabilities.role_capability_module_name,gen_modules_referenced.module_title as module_title_referenced,gen_modules_referenced.module_title as module_title_referenced,auth_role_capabilities.role_capability_see_all,auth_role_capabilities.role_capability_see_others,auth_role_capabilities.role_capability_show,auth_role_capabilities.role_capability_create,auth_role_capabilities.role_capability_read,auth_role_capabilities.role_capability_update,auth_role_capabilities.role_capability_delete,auth_role_capabilities.auth_role_capability_owner,auth_users_referenced.user_name as user_name_referenced,auth_users_referenced.user_id as user_id_referenced,")->from("auth_role_capabilities");
        
            $this->db->join("auth_roles as auth_roles_referenced","auth_role_capabilities.role_capability_role_id=auth_roles_referenced.role_id","left");
			
            $this->db->join("gen_modules as gen_modules_referenced","auth_role_capabilities.role_capability_module_name=gen_modules_referenced.module_title","left");
			
            $this->db->join("auth_users as auth_users_referenced","auth_role_capabilities.auth_role_capability_owner=auth_users_referenced.user_id","left");
			
        $this->db->where("auth_role_capabilities.auth_role_capability_owner", $value);
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

    public function get_gen_modules_reference ($user_id,$user_level) {
        if ( $this->get_see_all("gen_modules") ) {

        } else if ($this->get_see_others("gen_modules")) {
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

            
            $this->db->where_in("gen_modules.gen_module_owner", $u );

        } else {
            
            $this->db->where("gen_modules.gen_module_owner", $user_id);
        }

        return $this->db->get("gen_modules");
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



    public function get_auth_role_capabilities_count ($page , $auth_role = 0,$gen_module = 0,$auth_user = 0, $term = "", $user_id, $user_role, $user_level ) {

        if ( $this->get_see_all("auth_role_capabilities")) {

            $this->db->select(
                    "auth_role_capabilities.role_capability_id,auth_role_capabilities.role_capability_role_id,auth_roles_referenced.role_title as role_title_referenced,auth_roles_referenced.role_id as role_id_referenced,auth_role_capabilities.role_capability_module_name,gen_modules_referenced.module_title as module_title_referenced,gen_modules_referenced.module_title as module_title_referenced,auth_role_capabilities.role_capability_see_all,auth_role_capabilities.role_capability_see_others,auth_role_capabilities.role_capability_show,auth_role_capabilities.role_capability_create,auth_role_capabilities.role_capability_read,auth_role_capabilities.role_capability_update,auth_role_capabilities.role_capability_delete,auth_role_capabilities.auth_role_capability_owner,auth_users_referenced.user_name as user_name_referenced,auth_users_referenced.user_id as user_id_referenced"
            )->from("auth_role_capabilities");
            
            $this->db->join("auth_roles as auth_roles_referenced","auth_role_capabilities.role_capability_role_id=auth_roles_referenced.role_id","left");
			
            $this->db->join("gen_modules as gen_modules_referenced","auth_role_capabilities.role_capability_module_name=gen_modules_referenced.module_title","left");
			
            $this->db->join("auth_users as auth_users_referenced","auth_role_capabilities.auth_role_capability_owner=auth_users_referenced.user_id","left");
			
            		
            if ( $auth_role ) {
                $this->db->where( "auth_roles_referenced.role_id", $auth_role );
            }
				
            if ( $gen_module ) {
                $this->db->where( "gen_modules_referenced.module_title", $gen_module );
            }
				
            if ( $auth_user ) {
                $this->db->where( "auth_users_referenced.user_id", $auth_user );
            }
		

        } else if (!$this->get_see_others("auth_role_capabilities")) {
            $this->db->select(
                    "auth_role_capabilities.role_capability_id,auth_role_capabilities.role_capability_role_id,auth_roles_referenced.role_title as role_title_referenced,auth_roles_referenced.role_id as role_id_referenced,auth_role_capabilities.role_capability_module_name,gen_modules_referenced.module_title as module_title_referenced,gen_modules_referenced.module_title as module_title_referenced,auth_role_capabilities.role_capability_see_all,auth_role_capabilities.role_capability_see_others,auth_role_capabilities.role_capability_show,auth_role_capabilities.role_capability_create,auth_role_capabilities.role_capability_read,auth_role_capabilities.role_capability_update,auth_role_capabilities.role_capability_delete,auth_role_capabilities.auth_role_capability_owner,auth_users_referenced.user_name as user_name_referenced,auth_users_referenced.user_id as user_id_referenced"
            )->from("auth_role_capabilities");
            
            $this->db->join("auth_roles as auth_roles_referenced","auth_role_capabilities.role_capability_role_id=auth_roles_referenced.role_id","left");
			
            $this->db->join("gen_modules as gen_modules_referenced","auth_role_capabilities.role_capability_module_name=gen_modules_referenced.module_title","left");
			
            $this->db->join("auth_users as auth_users_referenced","auth_role_capabilities.auth_role_capability_owner=auth_users_referenced.user_id","left");
			
            		
            if ( $auth_role ) {
                $this->db->where( "auth_roles_referenced.role_id", $auth_role );
            }
				
            if ( $gen_module ) {
                $this->db->where( "gen_modules_referenced.module_title", $gen_module );
            }
				
            if ( $auth_user ) {
                $this->db->where( "auth_users_referenced.user_id", $auth_user );
            }
		

            
            $this->db->where("auth_role_capabilities.auth_role_capability_owner", $user_id);


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
                    "auth_role_capabilities.role_capability_id,auth_role_capabilities.role_capability_role_id,auth_roles_referenced.role_title as role_title_referenced,auth_roles_referenced.role_id as role_id_referenced,auth_role_capabilities.role_capability_module_name,gen_modules_referenced.module_title as module_title_referenced,gen_modules_referenced.module_title as module_title_referenced,auth_role_capabilities.role_capability_see_all,auth_role_capabilities.role_capability_see_others,auth_role_capabilities.role_capability_show,auth_role_capabilities.role_capability_create,auth_role_capabilities.role_capability_read,auth_role_capabilities.role_capability_update,auth_role_capabilities.role_capability_delete,auth_role_capabilities.auth_role_capability_owner,auth_users_referenced.user_name as user_name_referenced,auth_users_referenced.user_id as user_id_referenced"
            )->from("auth_role_capabilities");

            
            $this->db->join("auth_roles as auth_roles_referenced","auth_role_capabilities.role_capability_role_id=auth_roles_referenced.role_id","left");
			
            $this->db->join("gen_modules as gen_modules_referenced","auth_role_capabilities.role_capability_module_name=gen_modules_referenced.module_title","left");
			
            $this->db->join("auth_users as auth_users_referenced","auth_role_capabilities.auth_role_capability_owner=auth_users_referenced.user_id","left");
			
            		
            if ( $auth_role ) {
                $this->db->where( "auth_roles_referenced.role_id", $auth_role );
            }
				
            if ( $gen_module ) {
                $this->db->where( "gen_modules_referenced.module_title", $gen_module );
            }
				
            if ( $auth_user ) {
                $this->db->where( "auth_users_referenced.user_id", $auth_user );
            }
		

            
            $this->db->where_in("auth_role_capabilities.auth_role_capability_owner", $u );

        }

        if ( !empty($term)) {
            $this->db->where("auth_role_capabilities.role_capability_see_all LIKE '%".$term."%' OR auth_role_capabilities.role_capability_see_others LIKE '%".$term."%' OR auth_role_capabilities.role_capability_show LIKE '%".$term."%' OR auth_role_capabilities.role_capability_create LIKE '%".$term."%' OR auth_role_capabilities.role_capability_read LIKE '%".$term."%' OR auth_role_capabilities.role_capability_update LIKE '%".$term."%' OR auth_role_capabilities.role_capability_delete LIKE '%".$term."%' ");
        }

        return $this->db->get()->num_rows;
    }

    public function create ( $info, $user_id ) {

        foreach ( $info as $_key => $_value ) {
            if ( $_value == null ||  $_value == 'null' ) {
                unset($info[$_key]);   
            }
        }

        
            $info["auth_role_capability_owner"] = $user_id;
        $id = $this->db->insert("auth_role_capabilities", $info );
        $this->add_log("auth_role_capability nesnesi oluşturuldu [ id : ".$this->db->insert_id()." ]");
    }

    public function update ( $info,  $value ) {

        foreach ( $info as $_key => $_value ) {
            if ( $_value == null ||  $_value == 'null' ) {
                unset($info[$_key]);   
            }
        }

        $this->db->where("role_capability_id", $value );
        $result = $this->db->update("auth_role_capabilities", $info );
        $this->add_log("auth_role_capability nesnesi güncellendi [ id : ".$value." ]");
        return $result;
    }

    public function delete ( $value ) {
        $this->db->where("role_capability_id", $value);
        $result = $this->db->delete("auth_role_capabilities" );
        $this->add_log("auth_role_capability nesnesi silindi [ id : ".$value." ]");
        return $result;
    }

    public function get_table_headers () {
        $query = "describe auth_role_capabilities";
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