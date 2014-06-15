<?php
/*
 * Bu Yazılım İmleç A.Ş. Tarafından Geliştirilmiştir. 
 * http://www.imlec.com.tr 
 * http://www.imleç.com.tr 
 */
class gen_image_setting_model extends Imlec_Model {
    public function get_gen_image_settings( $page=1 , $gen_module = 0,$gen_image_setting_type = 0,$auth_user = 0 , $term = "", $user_id, $user_role, $user_level ) {
        if ( $this->get_see_all("gen_image_settings")) {
            $this->db->select(
                    "gen_image_settings.setting_id,gen_image_settings.setting_module_name,gen_modules_referenced.module_title as module_title_referenced,gen_modules_referenced.module_title as module_title_referenced,gen_image_settings.setting_type_id,gen_image_setting_types_referenced.type_title as type_title_referenced,gen_image_setting_types_referenced.type_id as type_id_referenced,gen_image_settings.setting_image_width,gen_image_settings.setting_image_height,gen_image_settings.gen_image_setting_owner,auth_users_referenced.user_name as user_name_referenced,auth_users_referenced.user_id as user_id_referenced"
            )->from("gen_image_settings");
            
            $this->db->join("gen_modules as gen_modules_referenced","gen_image_settings.setting_module_name=gen_modules_referenced.module_title","left");
			
            $this->db->join("gen_image_setting_types as gen_image_setting_types_referenced","gen_image_settings.setting_type_id=gen_image_setting_types_referenced.type_id","left");
			
            $this->db->join("auth_users as auth_users_referenced","gen_image_settings.gen_image_setting_owner=auth_users_referenced.user_id","left");
			
            		
            if ( $gen_module ) {
                $this->db->where( "gen_modules_referenced.module_title", $gen_module );
            }
				
            if ( $gen_image_setting_type ) {
                $this->db->where( "gen_image_setting_types_referenced.type_id", $gen_image_setting_type );
            }
				
            if ( $auth_user ) {
                $this->db->where( "auth_users_referenced.user_id", $auth_user );
            }
		
        } else if (!$this->get_see_others("gen_image_settings")) {
            $this->db->select(
                    "gen_image_settings.setting_id,gen_image_settings.setting_module_name,gen_modules_referenced.module_title as module_title_referenced,gen_modules_referenced.module_title as module_title_referenced,gen_image_settings.setting_type_id,gen_image_setting_types_referenced.type_title as type_title_referenced,gen_image_setting_types_referenced.type_id as type_id_referenced,gen_image_settings.setting_image_width,gen_image_settings.setting_image_height,gen_image_settings.gen_image_setting_owner,auth_users_referenced.user_name as user_name_referenced,auth_users_referenced.user_id as user_id_referenced"
            )->from("gen_image_settings");
            
            $this->db->join("gen_modules as gen_modules_referenced","gen_image_settings.setting_module_name=gen_modules_referenced.module_title","left");
			
            $this->db->join("gen_image_setting_types as gen_image_setting_types_referenced","gen_image_settings.setting_type_id=gen_image_setting_types_referenced.type_id","left");
			
            $this->db->join("auth_users as auth_users_referenced","gen_image_settings.gen_image_setting_owner=auth_users_referenced.user_id","left");
			
            		
            if ( $gen_module ) {
                $this->db->where( "gen_modules_referenced.module_title", $gen_module );
            }
				
            if ( $gen_image_setting_type ) {
                $this->db->where( "gen_image_setting_types_referenced.type_id", $gen_image_setting_type );
            }
				
            if ( $auth_user ) {
                $this->db->where( "auth_users_referenced.user_id", $auth_user );
            }
		
            
            $this->db->where("gen_image_settings.gen_image_setting_owner", $user_id);
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
                    "gen_image_settings.setting_id,gen_image_settings.setting_module_name,gen_modules_referenced.module_title as module_title_referenced,gen_modules_referenced.module_title as module_title_referenced,gen_image_settings.setting_type_id,gen_image_setting_types_referenced.type_title as type_title_referenced,gen_image_setting_types_referenced.type_id as type_id_referenced,gen_image_settings.setting_image_width,gen_image_settings.setting_image_height,gen_image_settings.gen_image_setting_owner,auth_users_referenced.user_name as user_name_referenced,auth_users_referenced.user_id as user_id_referenced"
            )->from("gen_image_settings");

            
            $this->db->join("gen_modules as gen_modules_referenced","gen_image_settings.setting_module_name=gen_modules_referenced.module_title","left");
			
            $this->db->join("gen_image_setting_types as gen_image_setting_types_referenced","gen_image_settings.setting_type_id=gen_image_setting_types_referenced.type_id","left");
			
            $this->db->join("auth_users as auth_users_referenced","gen_image_settings.gen_image_setting_owner=auth_users_referenced.user_id","left");
			
            		
            if ( $gen_module ) {
                $this->db->where( "gen_modules_referenced.module_title", $gen_module );
            }
				
            if ( $gen_image_setting_type ) {
                $this->db->where( "gen_image_setting_types_referenced.type_id", $gen_image_setting_type );
            }
				
            if ( $auth_user ) {
                $this->db->where( "auth_users_referenced.user_id", $auth_user );
            }
		
            
            $this->db->where_in("gen_image_settings.gen_image_setting_owner", $u );
        }

        if ( !empty($term)) {
        $this->db->where("gen_image_settings.setting_image_width LIKE '%".$term."%' OR gen_image_settings.setting_image_height LIKE '%".$term."%' ");
        } else {
            $this->db->limit( 10, ($page-1)*10 );
        }

        return $this->db->get();
    }
    
    
    public function get_by_setting_id ( $value ) {
        $this->db->select("gen_image_settings.setting_id,gen_image_settings.setting_module_name,gen_modules_referenced.module_title as module_title_referenced,gen_modules_referenced.module_title as module_title_referenced,gen_image_settings.setting_type_id,gen_image_setting_types_referenced.type_title as type_title_referenced,gen_image_setting_types_referenced.type_id as type_id_referenced,gen_image_settings.setting_image_width,gen_image_settings.setting_image_height,gen_image_settings.gen_image_setting_owner,auth_users_referenced.user_name as user_name_referenced,auth_users_referenced.user_id as user_id_referenced,")->from("gen_image_settings");
        
            $this->db->join("gen_modules as gen_modules_referenced","gen_image_settings.setting_module_name=gen_modules_referenced.module_title","left");
			
            $this->db->join("gen_image_setting_types as gen_image_setting_types_referenced","gen_image_settings.setting_type_id=gen_image_setting_types_referenced.type_id","left");
			
            $this->db->join("auth_users as auth_users_referenced","gen_image_settings.gen_image_setting_owner=auth_users_referenced.user_id","left");
			
        $this->db->where("gen_image_settings.setting_id", $value);
        return $this->db->get()->row();
    }

    public function get_by_setting_module_name ( $value ) {
        $this->db->select("gen_image_settings.setting_id,gen_image_settings.setting_module_name,gen_modules_referenced.module_title as module_title_referenced,gen_modules_referenced.module_title as module_title_referenced,gen_image_settings.setting_type_id,gen_image_setting_types_referenced.type_title as type_title_referenced,gen_image_setting_types_referenced.type_id as type_id_referenced,gen_image_settings.setting_image_width,gen_image_settings.setting_image_height,gen_image_settings.gen_image_setting_owner,auth_users_referenced.user_name as user_name_referenced,auth_users_referenced.user_id as user_id_referenced,")->from("gen_image_settings");
        
            $this->db->join("gen_modules as gen_modules_referenced","gen_image_settings.setting_module_name=gen_modules_referenced.module_title","left");
			
            $this->db->join("gen_image_setting_types as gen_image_setting_types_referenced","gen_image_settings.setting_type_id=gen_image_setting_types_referenced.type_id","left");
			
            $this->db->join("auth_users as auth_users_referenced","gen_image_settings.gen_image_setting_owner=auth_users_referenced.user_id","left");
			
        $this->db->where("gen_image_settings.setting_module_name", $value);
        return $this->db->get()->row();
    }

    public function get_by_setting_type_id ( $value ) {
        $this->db->select("gen_image_settings.setting_id,gen_image_settings.setting_module_name,gen_modules_referenced.module_title as module_title_referenced,gen_modules_referenced.module_title as module_title_referenced,gen_image_settings.setting_type_id,gen_image_setting_types_referenced.type_title as type_title_referenced,gen_image_setting_types_referenced.type_id as type_id_referenced,gen_image_settings.setting_image_width,gen_image_settings.setting_image_height,gen_image_settings.gen_image_setting_owner,auth_users_referenced.user_name as user_name_referenced,auth_users_referenced.user_id as user_id_referenced,")->from("gen_image_settings");
        
            $this->db->join("gen_modules as gen_modules_referenced","gen_image_settings.setting_module_name=gen_modules_referenced.module_title","left");
			
            $this->db->join("gen_image_setting_types as gen_image_setting_types_referenced","gen_image_settings.setting_type_id=gen_image_setting_types_referenced.type_id","left");
			
            $this->db->join("auth_users as auth_users_referenced","gen_image_settings.gen_image_setting_owner=auth_users_referenced.user_id","left");
			
        $this->db->where("gen_image_settings.setting_type_id", $value);
        return $this->db->get()->row();
    }

    public function get_by_setting_image_width ( $value ) {
        $this->db->select("gen_image_settings.setting_id,gen_image_settings.setting_module_name,gen_modules_referenced.module_title as module_title_referenced,gen_modules_referenced.module_title as module_title_referenced,gen_image_settings.setting_type_id,gen_image_setting_types_referenced.type_title as type_title_referenced,gen_image_setting_types_referenced.type_id as type_id_referenced,gen_image_settings.setting_image_width,gen_image_settings.setting_image_height,gen_image_settings.gen_image_setting_owner,auth_users_referenced.user_name as user_name_referenced,auth_users_referenced.user_id as user_id_referenced,")->from("gen_image_settings");
        
            $this->db->join("gen_modules as gen_modules_referenced","gen_image_settings.setting_module_name=gen_modules_referenced.module_title","left");
			
            $this->db->join("gen_image_setting_types as gen_image_setting_types_referenced","gen_image_settings.setting_type_id=gen_image_setting_types_referenced.type_id","left");
			
            $this->db->join("auth_users as auth_users_referenced","gen_image_settings.gen_image_setting_owner=auth_users_referenced.user_id","left");
			
        $this->db->where("gen_image_settings.setting_image_width", $value);
        return $this->db->get()->row();
    }

    public function get_by_setting_image_height ( $value ) {
        $this->db->select("gen_image_settings.setting_id,gen_image_settings.setting_module_name,gen_modules_referenced.module_title as module_title_referenced,gen_modules_referenced.module_title as module_title_referenced,gen_image_settings.setting_type_id,gen_image_setting_types_referenced.type_title as type_title_referenced,gen_image_setting_types_referenced.type_id as type_id_referenced,gen_image_settings.setting_image_width,gen_image_settings.setting_image_height,gen_image_settings.gen_image_setting_owner,auth_users_referenced.user_name as user_name_referenced,auth_users_referenced.user_id as user_id_referenced,")->from("gen_image_settings");
        
            $this->db->join("gen_modules as gen_modules_referenced","gen_image_settings.setting_module_name=gen_modules_referenced.module_title","left");
			
            $this->db->join("gen_image_setting_types as gen_image_setting_types_referenced","gen_image_settings.setting_type_id=gen_image_setting_types_referenced.type_id","left");
			
            $this->db->join("auth_users as auth_users_referenced","gen_image_settings.gen_image_setting_owner=auth_users_referenced.user_id","left");
			
        $this->db->where("gen_image_settings.setting_image_height", $value);
        return $this->db->get()->row();
    }

    public function get_by_gen_image_setting_owner ( $value ) {
        $this->db->select("gen_image_settings.setting_id,gen_image_settings.setting_module_name,gen_modules_referenced.module_title as module_title_referenced,gen_modules_referenced.module_title as module_title_referenced,gen_image_settings.setting_type_id,gen_image_setting_types_referenced.type_title as type_title_referenced,gen_image_setting_types_referenced.type_id as type_id_referenced,gen_image_settings.setting_image_width,gen_image_settings.setting_image_height,gen_image_settings.gen_image_setting_owner,auth_users_referenced.user_name as user_name_referenced,auth_users_referenced.user_id as user_id_referenced,")->from("gen_image_settings");
        
            $this->db->join("gen_modules as gen_modules_referenced","gen_image_settings.setting_module_name=gen_modules_referenced.module_title","left");
			
            $this->db->join("gen_image_setting_types as gen_image_setting_types_referenced","gen_image_settings.setting_type_id=gen_image_setting_types_referenced.type_id","left");
			
            $this->db->join("auth_users as auth_users_referenced","gen_image_settings.gen_image_setting_owner=auth_users_referenced.user_id","left");
			
        $this->db->where("gen_image_settings.gen_image_setting_owner", $value);
        return $this->db->get()->row();
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

    public function get_gen_image_setting_types_reference ($user_id,$user_level) {
        if ( $this->get_see_all("gen_image_setting_types") ) {

        } else if ($this->get_see_others("gen_image_setting_types")) {
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

            
            $this->db->where_in("gen_image_setting_types.gen_image_setting_type_owner", $u );

        } else {
            
            $this->db->where("gen_image_setting_types.gen_image_setting_type_owner", $user_id);
        }

        return $this->db->get("gen_image_setting_types");
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



    public function get_gen_image_settings_count ($page , $gen_module = 0,$gen_image_setting_type = 0,$auth_user = 0, $term = "", $user_id, $user_role, $user_level ) {

        if ( $this->get_see_all("gen_image_settings")) {

            $this->db->select(
                    "gen_image_settings.setting_id,gen_image_settings.setting_module_name,gen_modules_referenced.module_title as module_title_referenced,gen_modules_referenced.module_title as module_title_referenced,gen_image_settings.setting_type_id,gen_image_setting_types_referenced.type_title as type_title_referenced,gen_image_setting_types_referenced.type_id as type_id_referenced,gen_image_settings.setting_image_width,gen_image_settings.setting_image_height,gen_image_settings.gen_image_setting_owner,auth_users_referenced.user_name as user_name_referenced,auth_users_referenced.user_id as user_id_referenced"
            )->from("gen_image_settings");
            
            $this->db->join("gen_modules as gen_modules_referenced","gen_image_settings.setting_module_name=gen_modules_referenced.module_title","left");
			
            $this->db->join("gen_image_setting_types as gen_image_setting_types_referenced","gen_image_settings.setting_type_id=gen_image_setting_types_referenced.type_id","left");
			
            $this->db->join("auth_users as auth_users_referenced","gen_image_settings.gen_image_setting_owner=auth_users_referenced.user_id","left");
			
            		
            if ( $gen_module ) {
                $this->db->where( "gen_modules_referenced.module_title", $gen_module );
            }
				
            if ( $gen_image_setting_type ) {
                $this->db->where( "gen_image_setting_types_referenced.type_id", $gen_image_setting_type );
            }
				
            if ( $auth_user ) {
                $this->db->where( "auth_users_referenced.user_id", $auth_user );
            }
		

        } else if (!$this->get_see_others("gen_image_settings")) {
            $this->db->select(
                    "gen_image_settings.setting_id,gen_image_settings.setting_module_name,gen_modules_referenced.module_title as module_title_referenced,gen_modules_referenced.module_title as module_title_referenced,gen_image_settings.setting_type_id,gen_image_setting_types_referenced.type_title as type_title_referenced,gen_image_setting_types_referenced.type_id as type_id_referenced,gen_image_settings.setting_image_width,gen_image_settings.setting_image_height,gen_image_settings.gen_image_setting_owner,auth_users_referenced.user_name as user_name_referenced,auth_users_referenced.user_id as user_id_referenced"
            )->from("gen_image_settings");
            
            $this->db->join("gen_modules as gen_modules_referenced","gen_image_settings.setting_module_name=gen_modules_referenced.module_title","left");
			
            $this->db->join("gen_image_setting_types as gen_image_setting_types_referenced","gen_image_settings.setting_type_id=gen_image_setting_types_referenced.type_id","left");
			
            $this->db->join("auth_users as auth_users_referenced","gen_image_settings.gen_image_setting_owner=auth_users_referenced.user_id","left");
			
            		
            if ( $gen_module ) {
                $this->db->where( "gen_modules_referenced.module_title", $gen_module );
            }
				
            if ( $gen_image_setting_type ) {
                $this->db->where( "gen_image_setting_types_referenced.type_id", $gen_image_setting_type );
            }
				
            if ( $auth_user ) {
                $this->db->where( "auth_users_referenced.user_id", $auth_user );
            }
		

            
            $this->db->where("gen_image_settings.gen_image_setting_owner", $user_id);


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
                    "gen_image_settings.setting_id,gen_image_settings.setting_module_name,gen_modules_referenced.module_title as module_title_referenced,gen_modules_referenced.module_title as module_title_referenced,gen_image_settings.setting_type_id,gen_image_setting_types_referenced.type_title as type_title_referenced,gen_image_setting_types_referenced.type_id as type_id_referenced,gen_image_settings.setting_image_width,gen_image_settings.setting_image_height,gen_image_settings.gen_image_setting_owner,auth_users_referenced.user_name as user_name_referenced,auth_users_referenced.user_id as user_id_referenced"
            )->from("gen_image_settings");

            
            $this->db->join("gen_modules as gen_modules_referenced","gen_image_settings.setting_module_name=gen_modules_referenced.module_title","left");
			
            $this->db->join("gen_image_setting_types as gen_image_setting_types_referenced","gen_image_settings.setting_type_id=gen_image_setting_types_referenced.type_id","left");
			
            $this->db->join("auth_users as auth_users_referenced","gen_image_settings.gen_image_setting_owner=auth_users_referenced.user_id","left");
			
            		
            if ( $gen_module ) {
                $this->db->where( "gen_modules_referenced.module_title", $gen_module );
            }
				
            if ( $gen_image_setting_type ) {
                $this->db->where( "gen_image_setting_types_referenced.type_id", $gen_image_setting_type );
            }
				
            if ( $auth_user ) {
                $this->db->where( "auth_users_referenced.user_id", $auth_user );
            }
		

            
            $this->db->where_in("gen_image_settings.gen_image_setting_owner", $u );

        }

        if ( !empty($term)) {
            $this->db->where("gen_image_settings.setting_image_width LIKE '%".$term."%' OR gen_image_settings.setting_image_height LIKE '%".$term."%' ");
        }

        return $this->db->get()->num_rows;
    }

    public function create ( $info, $user_id ) {

        foreach ( $info as $_key => $_value ) {
            if ( $_value == null ||  $_value == 'null' ) {
                unset($info[$_key]);   
            }
        }

        
            $info["gen_image_setting_owner"] = $user_id;
        $id = $this->db->insert("gen_image_settings", $info );
        $this->add_log("gen_image_setting nesnesi oluşturuldu [ id : ".$this->db->insert_id()." ]");
    }

    public function update ( $info,  $value ) {

        foreach ( $info as $_key => $_value ) {
            if ( $_value == null ||  $_value == 'null' ) {
                unset($info[$_key]);   
            }
        }

        $this->db->where("setting_id", $value );
        $result = $this->db->update("gen_image_settings", $info );
        $this->add_log("gen_image_setting nesnesi güncellendi [ id : ".$value." ]");
        return $result;
    }

    public function delete ( $value ) {
        $this->db->where("setting_id", $value);
        $result = $this->db->delete("gen_image_settings" );
        $this->add_log("gen_image_setting nesnesi silindi [ id : ".$value." ]");
        return $result;
    }

    public function get_table_headers () {
        $query = "describe gen_image_settings";
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