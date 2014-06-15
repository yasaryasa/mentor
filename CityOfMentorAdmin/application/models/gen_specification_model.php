<?php
/*
 * Bu Yazılım İmleç A.Ş. Tarafından Geliştirilmiştir. 
 * http://www.imlec.com.tr 
 * http://www.imleç.com.tr 
 */
class gen_specification_model extends Imlec_Model {
    public function get_gen_specifications( $page=1 , $auth_user = 0 , $term = "", $user_id, $user_role, $user_level ) {
        if ( $this->get_see_all("gen_specifications")) {
            $this->db->select(
                    "gen_specifications.specification_id,gen_specifications.main_table,gen_specifications.main_column,gen_specifications.referenced_table,gen_specifications.referenced_column,gen_specifications.referenced_value_column,gen_specifications.gen_specification_owner,auth_users_referenced.user_name as user_name_referenced,auth_users_referenced.user_id as user_id_referenced"
            )->from("gen_specifications");
            
            $this->db->join("auth_users as auth_users_referenced","gen_specifications.gen_specification_owner=auth_users_referenced.user_id","left");
			
            		
            if ( $auth_user ) {
                $this->db->where( "auth_users_referenced.user_id", $auth_user );
            }
		
        } else if (!$this->get_see_others("gen_specifications")) {
            $this->db->select(
                    "gen_specifications.specification_id,gen_specifications.main_table,gen_specifications.main_column,gen_specifications.referenced_table,gen_specifications.referenced_column,gen_specifications.referenced_value_column,gen_specifications.gen_specification_owner,auth_users_referenced.user_name as user_name_referenced,auth_users_referenced.user_id as user_id_referenced"
            )->from("gen_specifications");
            
            $this->db->join("auth_users as auth_users_referenced","gen_specifications.gen_specification_owner=auth_users_referenced.user_id","left");
			
            		
            if ( $auth_user ) {
                $this->db->where( "auth_users_referenced.user_id", $auth_user );
            }
		
            
            $this->db->where("gen_specifications.gen_specification_owner", $user_id);
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
                    "gen_specifications.specification_id,gen_specifications.main_table,gen_specifications.main_column,gen_specifications.referenced_table,gen_specifications.referenced_column,gen_specifications.referenced_value_column,gen_specifications.gen_specification_owner,auth_users_referenced.user_name as user_name_referenced,auth_users_referenced.user_id as user_id_referenced"
            )->from("gen_specifications");

            
            $this->db->join("auth_users as auth_users_referenced","gen_specifications.gen_specification_owner=auth_users_referenced.user_id","left");
			
            		
            if ( $auth_user ) {
                $this->db->where( "auth_users_referenced.user_id", $auth_user );
            }
		
            
            $this->db->where_in("gen_specifications.gen_specification_owner", $u );
        }

        if ( !empty($term)) {
        $this->db->where("gen_specifications.main_table LIKE '%".$term."%' OR gen_specifications.main_column LIKE '%".$term."%' OR gen_specifications.referenced_table LIKE '%".$term."%' OR gen_specifications.referenced_column LIKE '%".$term."%' OR gen_specifications.referenced_value_column LIKE '%".$term."%' ");
        } else {
            $this->db->limit( 10, ($page-1)*10 );
        }

        return $this->db->get();
    }
    
    
    public function get_by_specification_id ( $value ) {
        $this->db->select("gen_specifications.specification_id,gen_specifications.main_table,gen_specifications.main_column,gen_specifications.referenced_table,gen_specifications.referenced_column,gen_specifications.referenced_value_column,gen_specifications.gen_specification_owner,auth_users_referenced.user_name as user_name_referenced,auth_users_referenced.user_id as user_id_referenced,")->from("gen_specifications");
        
            $this->db->join("auth_users as auth_users_referenced","gen_specifications.gen_specification_owner=auth_users_referenced.user_id","left");
			
        $this->db->where("gen_specifications.specification_id", $value);
        return $this->db->get()->row();
    }

    public function get_by_main_table ( $value ) {
        $this->db->select("gen_specifications.specification_id,gen_specifications.main_table,gen_specifications.main_column,gen_specifications.referenced_table,gen_specifications.referenced_column,gen_specifications.referenced_value_column,gen_specifications.gen_specification_owner,auth_users_referenced.user_name as user_name_referenced,auth_users_referenced.user_id as user_id_referenced,")->from("gen_specifications");
        
            $this->db->join("auth_users as auth_users_referenced","gen_specifications.gen_specification_owner=auth_users_referenced.user_id","left");
			
        $this->db->where("gen_specifications.main_table", $value);
        return $this->db->get()->row();
    }

    public function get_by_main_column ( $value ) {
        $this->db->select("gen_specifications.specification_id,gen_specifications.main_table,gen_specifications.main_column,gen_specifications.referenced_table,gen_specifications.referenced_column,gen_specifications.referenced_value_column,gen_specifications.gen_specification_owner,auth_users_referenced.user_name as user_name_referenced,auth_users_referenced.user_id as user_id_referenced,")->from("gen_specifications");
        
            $this->db->join("auth_users as auth_users_referenced","gen_specifications.gen_specification_owner=auth_users_referenced.user_id","left");
			
        $this->db->where("gen_specifications.main_column", $value);
        return $this->db->get()->row();
    }

    public function get_by_referenced_table ( $value ) {
        $this->db->select("gen_specifications.specification_id,gen_specifications.main_table,gen_specifications.main_column,gen_specifications.referenced_table,gen_specifications.referenced_column,gen_specifications.referenced_value_column,gen_specifications.gen_specification_owner,auth_users_referenced.user_name as user_name_referenced,auth_users_referenced.user_id as user_id_referenced,")->from("gen_specifications");
        
            $this->db->join("auth_users as auth_users_referenced","gen_specifications.gen_specification_owner=auth_users_referenced.user_id","left");
			
        $this->db->where("gen_specifications.referenced_table", $value);
        return $this->db->get()->row();
    }

    public function get_by_referenced_column ( $value ) {
        $this->db->select("gen_specifications.specification_id,gen_specifications.main_table,gen_specifications.main_column,gen_specifications.referenced_table,gen_specifications.referenced_column,gen_specifications.referenced_value_column,gen_specifications.gen_specification_owner,auth_users_referenced.user_name as user_name_referenced,auth_users_referenced.user_id as user_id_referenced,")->from("gen_specifications");
        
            $this->db->join("auth_users as auth_users_referenced","gen_specifications.gen_specification_owner=auth_users_referenced.user_id","left");
			
        $this->db->where("gen_specifications.referenced_column", $value);
        return $this->db->get()->row();
    }

    public function get_by_referenced_value_column ( $value ) {
        $this->db->select("gen_specifications.specification_id,gen_specifications.main_table,gen_specifications.main_column,gen_specifications.referenced_table,gen_specifications.referenced_column,gen_specifications.referenced_value_column,gen_specifications.gen_specification_owner,auth_users_referenced.user_name as user_name_referenced,auth_users_referenced.user_id as user_id_referenced,")->from("gen_specifications");
        
            $this->db->join("auth_users as auth_users_referenced","gen_specifications.gen_specification_owner=auth_users_referenced.user_id","left");
			
        $this->db->where("gen_specifications.referenced_value_column", $value);
        return $this->db->get()->row();
    }

    public function get_by_gen_specification_owner ( $value ) {
        $this->db->select("gen_specifications.specification_id,gen_specifications.main_table,gen_specifications.main_column,gen_specifications.referenced_table,gen_specifications.referenced_column,gen_specifications.referenced_value_column,gen_specifications.gen_specification_owner,auth_users_referenced.user_name as user_name_referenced,auth_users_referenced.user_id as user_id_referenced,")->from("gen_specifications");
        
            $this->db->join("auth_users as auth_users_referenced","gen_specifications.gen_specification_owner=auth_users_referenced.user_id","left");
			
        $this->db->where("gen_specifications.gen_specification_owner", $value);
        return $this->db->get()->row();
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



    public function get_gen_specifications_count ($page , $auth_user = 0, $term = "", $user_id, $user_role, $user_level ) {

        if ( $this->get_see_all("gen_specifications")) {

            $this->db->select(
                    "gen_specifications.specification_id,gen_specifications.main_table,gen_specifications.main_column,gen_specifications.referenced_table,gen_specifications.referenced_column,gen_specifications.referenced_value_column,gen_specifications.gen_specification_owner,auth_users_referenced.user_name as user_name_referenced,auth_users_referenced.user_id as user_id_referenced"
            )->from("gen_specifications");
            
            $this->db->join("auth_users as auth_users_referenced","gen_specifications.gen_specification_owner=auth_users_referenced.user_id","left");
			
            		
            if ( $auth_user ) {
                $this->db->where( "auth_users_referenced.user_id", $auth_user );
            }
		

        } else if (!$this->get_see_others("gen_specifications")) {
            $this->db->select(
                    "gen_specifications.specification_id,gen_specifications.main_table,gen_specifications.main_column,gen_specifications.referenced_table,gen_specifications.referenced_column,gen_specifications.referenced_value_column,gen_specifications.gen_specification_owner,auth_users_referenced.user_name as user_name_referenced,auth_users_referenced.user_id as user_id_referenced"
            )->from("gen_specifications");
            
            $this->db->join("auth_users as auth_users_referenced","gen_specifications.gen_specification_owner=auth_users_referenced.user_id","left");
			
            		
            if ( $auth_user ) {
                $this->db->where( "auth_users_referenced.user_id", $auth_user );
            }
		

            
            $this->db->where("gen_specifications.gen_specification_owner", $user_id);


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
                    "gen_specifications.specification_id,gen_specifications.main_table,gen_specifications.main_column,gen_specifications.referenced_table,gen_specifications.referenced_column,gen_specifications.referenced_value_column,gen_specifications.gen_specification_owner,auth_users_referenced.user_name as user_name_referenced,auth_users_referenced.user_id as user_id_referenced"
            )->from("gen_specifications");

            
            $this->db->join("auth_users as auth_users_referenced","gen_specifications.gen_specification_owner=auth_users_referenced.user_id","left");
			
            		
            if ( $auth_user ) {
                $this->db->where( "auth_users_referenced.user_id", $auth_user );
            }
		

            
            $this->db->where_in("gen_specifications.gen_specification_owner", $u );

        }

        if ( !empty($term)) {
            $this->db->where("gen_specifications.main_table LIKE '%".$term."%' OR gen_specifications.main_column LIKE '%".$term."%' OR gen_specifications.referenced_table LIKE '%".$term."%' OR gen_specifications.referenced_column LIKE '%".$term."%' OR gen_specifications.referenced_value_column LIKE '%".$term."%' ");
        }

        return $this->db->get()->num_rows;
    }

    public function create ( $info, $user_id ) {

        foreach ( $info as $_key => $_value ) {
            if ( $_value == null ||  $_value == 'null' ) {
                unset($info[$_key]);   
            }
        }

        
            $info["gen_specification_owner"] = $user_id;
        $id = $this->db->insert("gen_specifications", $info );
        $this->add_log("gen_specification nesnesi oluşturuldu [ id : ".$this->db->insert_id()." ]");
    }

    public function update ( $info,  $value ) {

        foreach ( $info as $_key => $_value ) {
            if ( $_value == null ||  $_value == 'null' ) {
                unset($info[$_key]);   
            }
        }

        $this->db->where("specification_id", $value );
        $result = $this->db->update("gen_specifications", $info );
        $this->add_log("gen_specification nesnesi güncellendi [ id : ".$value." ]");
        return $result;
    }

    public function delete ( $value ) {
        $this->db->where("specification_id", $value);
        $result = $this->db->delete("gen_specifications" );
        $this->add_log("gen_specification nesnesi silindi [ id : ".$value." ]");
        return $result;
    }

    public function get_table_headers () {
        $query = "describe gen_specifications";
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