<?php
class category_model extends Imlec_Model {
	
	public function get_entries_of_category ($c_id) {
		$this->db->select("entries.*"
				)->from("entries, category_entries"
						)->where("category_entries.category_id = $c_id and category_entries.entry_id = entries.id");
		return $this->db->get();
	}
	
    public function get_categories( $page=1 , $auth_user = 0 , $term = "", $user_id, $user_role, $user_level ) {
        if ( $this->get_see_all("categories")) {
             $this->db->select(
                    "categories.id,categories.category_key,categories.category_title,categories.category_owner,categories.deletable,auth_users_referenced.user_name as user_name_referenced,auth_users_referenced.user_id as user_id_referenced"
            )->from("categories");
            
            $this->db->join("auth_users as auth_users_referenced","categories.category_owner=auth_users_referenced.user_id","left");
			
            		
            if ( $auth_user ) {
                $this->db->where( "auth_users_referenced.user_id", $auth_user );
            }
		
        } else if (!$this->get_see_others("categories")) {
            $this->db->select(
                    "categories.id,categories.category_key,categories.category_title,categories.category_owner,auth_users_referenced.user_name as user_name_referenced,auth_users_referenced.user_id as user_id_referenced"
            )->from("categories");
            
            $this->db->join("auth_users as auth_users_referenced","categories.category_owner=auth_users_referenced.user_id","left");
			
            		
            if ( $auth_user ) {
                $this->db->where( "auth_users_referenced.user_id", $auth_user );
            }
		
            
            $this->db->where("categories.category_owner", $user_id);
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
                    "categories.id,categories.category_key,categories.category_title,categories.category_owner,auth_users_referenced.user_name as user_name_referenced,auth_users_referenced.user_id as user_id_referenced"
            )->from("categories");

            
            $this->db->join("auth_users as auth_users_referenced","categories.category_owner=auth_users_referenced.user_id","left");
			
            		
            if ( $auth_user ) {
                $this->db->where( "auth_users_referenced.user_id", $auth_user );
            }
		
            
            $this->db->where_in("categories.category_owner", $u );
        }

        if ( !empty($term)) {
        $this->db->where("categories.category_key LIKE '%".$term."%' OR categories.category_title LIKE '%".$term."%' ");
        } else {
            $this->db->limit( 10, ($page-1)*10 );
        }

        return $this->db->get();
    }
    
    
    public function get_by_id ( $value ) {
        $this->db->select("categories.id,categories.deletable,categories.category_key,categories.category_title,categories.category_owner,auth_users_referenced.user_name as user_name_referenced,auth_users_referenced.user_id as user_id_referenced,")->from("categories");
        
            $this->db->join("auth_users as auth_users_referenced","categories.category_owner=auth_users_referenced.user_id","left");
			
        $this->db->where("categories.id", $value);
        return $this->db->get()->row();
    }

    public function get_by_category_key ( $value ) {
        $this->db->select("categories.id,categories.category_key,categories.category_title,categories.category_owner,auth_users_referenced.user_name as user_name_referenced,auth_users_referenced.user_id as user_id_referenced,")->from("categories");
        
            $this->db->join("auth_users as auth_users_referenced","categories.category_owner=auth_users_referenced.user_id","left");
			
        $this->db->where("categories.category_key", $value);
        return $this->db->get()->row();
    }

    public function get_by_category_title ( $value ) {
        $this->db->select("categories.id,categories.category_key,categories.category_title,categories.category_owner,auth_users_referenced.user_name as user_name_referenced,auth_users_referenced.user_id as user_id_referenced,")->from("categories");
        
            $this->db->join("auth_users as auth_users_referenced","categories.category_owner=auth_users_referenced.user_id","left");
			
        $this->db->where("categories.category_title", $value);
        return $this->db->get()->row();
    }

    public function get_by_category_owner ( $value ) {
        $this->db->select("categories.id,categories.category_key,categories.category_title,categories.category_owner,auth_users_referenced.user_name as user_name_referenced,auth_users_referenced.user_id as user_id_referenced,")->from("categories");
        
            $this->db->join("auth_users as auth_users_referenced","categories.category_owner=auth_users_referenced.user_id","left");
			
        $this->db->where("categories.category_owner", $value);
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



    public function get_categories_count ($page , $auth_user = 0, $term = "", $user_id, $user_role, $user_level ) {

        if ( $this->get_see_all("categories")) {

            $this->db->select(
                    "categories.id,categories.category_key,categories.category_title,categories.category_owner,auth_users_referenced.user_name as user_name_referenced,auth_users_referenced.user_id as user_id_referenced"
            )->from("categories");
            
            $this->db->join("auth_users as auth_users_referenced","categories.category_owner=auth_users_referenced.user_id","left");
			
            		
            if ( $auth_user ) {
                $this->db->where( "auth_users_referenced.user_id", $auth_user );
            }
		

        } else if (!$this->get_see_others("categories")) {
            $this->db->select(
                    "categories.id,categories.category_key,categories.category_title,categories.category_owner,auth_users_referenced.user_name as user_name_referenced,auth_users_referenced.user_id as user_id_referenced"
            )->from("categories");
            
            $this->db->join("auth_users as auth_users_referenced","categories.category_owner=auth_users_referenced.user_id","left");
			
            		
            if ( $auth_user ) {
                $this->db->where( "auth_users_referenced.user_id", $auth_user );
            }
		

            
            $this->db->where("categories.category_owner", $user_id);


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
                    "categories.id,categories.category_key,categories.category_title,categories.category_owner,auth_users_referenced.user_name as user_name_referenced,auth_users_referenced.user_id as user_id_referenced"
            )->from("categories");

            
            $this->db->join("auth_users as auth_users_referenced","categories.category_owner=auth_users_referenced.user_id","left");
			
            		
            if ( $auth_user ) {
                $this->db->where( "auth_users_referenced.user_id", $auth_user );
            }
		

            
            $this->db->where_in("categories.category_owner", $u );

        }

        if ( !empty($term)) {
            $this->db->where("categories.category_key LIKE '%".$term."%' OR categories.category_title LIKE '%".$term."%' ");
        }

        return $this->db->get()->num_rows;
    }

    public function create ( $info, $user_id ) {

        foreach ( $info as $_key => $_value ) {
            if ( $_value == null ||  $_value == 'null' ) {
                unset($info[$_key]);   
            }
        }

        
            $info["category_owner"] = $user_id;
        $id = $this->db->insert("categories", $info );
        $this->add_log("category nesnesi oluşturuldu [ id : ".$this->db->insert_id()." ]");
    }

    public function update ( $info,  $value ) {

        foreach ( $info as $_key => $_value ) {
            if ( $_value == null ||  $_value == 'null' ) {
                unset($info[$_key]);   
            }
        }

        $this->db->where("id", $value );
        $result = $this->db->update("categories", $info );
        $this->add_log("category nesnesi güncellendi [ id : ".$value." ]");
        return $result;
    }

    public function delete ( $value ) {
        $this->db->where("id", $value);
        $result = $this->db->delete("categories" );
        $this->add_log("category nesnesi silindi [ id : ".$value." ]");
        return $result;
    }

    public function get_table_headers () {
        $query = "describe categories";
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