<?php
/*
 * Bu Yazılım İmleç A.Ş. Tarafından Geliştirilmiştir. 
 * http://www.imlec.com.tr 
 * http://www.imleç.com.tr 
 */
class entry_model extends Imlec_Model {
    public function get_entries( $page=1 , $auth_user = 0 , $term = "", $user_id, $user_role, $user_level ) {
        if ( $this->get_see_all("entries")) {
            $this->db->select(
                    "entries.id,entries.title,entries.description,entries.email,entries.phone_number,entries.website,entries.map_title,entries.map_lat,entries.map_long,entries.facebook_link,entries.twitter_link,entries.posted_date,entries.from_date,entries.to_date,entries.cost,entries.entry_owner,auth_users_referenced.user_name as user_name_referenced,auth_users_referenced.user_id as user_id_referenced"
            )->from("entries");
            
            $this->db->join("auth_users as auth_users_referenced","entries.entry_owner=auth_users_referenced.user_id","left");
			
            		
            if ( $auth_user ) {
                $this->db->where( "auth_users_referenced.user_id", $auth_user );
            }
		
        } else if (!$this->get_see_others("entries")) {
            $this->db->select(
                    "entries.id,entries.title,entries.description,entries.email,entries.phone_number,entries.website,entries.map_title,entries.map_lat,entries.map_long,entries.facebook_link,entries.twitter_link,entries.posted_date,entries.from_date,entries.to_date,entries.cost,entries.entry_owner,auth_users_referenced.user_name as user_name_referenced,auth_users_referenced.user_id as user_id_referenced"
            )->from("entries");
            
            $this->db->join("auth_users as auth_users_referenced","entries.entry_owner=auth_users_referenced.user_id","left");
			
            		
            if ( $auth_user ) {
                $this->db->where( "auth_users_referenced.user_id", $auth_user );
            }
		
            
            $this->db->where("entries.entry_owner", $user_id);
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
                    "entries.id,entries.title,entries.description,entries.email,entries.phone_number,entries.website,entries.map_title,entries.map_lat,entries.map_long,entries.facebook_link,entries.twitter_link,entries.posted_date,entries.from_date,entries.to_date,entries.cost,entries.entry_owner,auth_users_referenced.user_name as user_name_referenced,auth_users_referenced.user_id as user_id_referenced"
            )->from("entries");

            
            $this->db->join("auth_users as auth_users_referenced","entries.entry_owner=auth_users_referenced.user_id","left");
			
            		
            if ( $auth_user ) {
                $this->db->where( "auth_users_referenced.user_id", $auth_user );
            }
		
            
            $this->db->where_in("entries.entry_owner", $u );
        }

        if ( !empty($term)) {
        $this->db->where("entries.title LIKE '%".$term."%' OR entries.description LIKE '%".$term."%' OR entries.email LIKE '%".$term."%' OR entries.phone_number LIKE '%".$term."%' OR entries.website LIKE '%".$term."%' OR entries.map_title LIKE '%".$term."%' OR entries.map_lat LIKE '%".$term."%' OR entries.map_long LIKE '%".$term."%' OR entries.facebook_link LIKE '%".$term."%' OR entries.twitter_link LIKE '%".$term."%' OR entries.posted_date LIKE '%".$term."%' OR entries.from_date LIKE '%".$term."%' OR entries.to_date LIKE '%".$term."%' OR entries.cost LIKE '%".$term."%' ");
        } else {
            $this->db->limit( 10, ($page-1)*10 );
        }

        return $this->db->get();
    }
    
    
    public function get_by_id ( $value ) {
        $this->db->select("entries.id,entries.title,entries.description,entries.email,entries.phone_number,entries.website,entries.map_title,entries.map_lat,entries.map_long,entries.facebook_link,entries.twitter_link,entries.posted_date,entries.from_date,entries.to_date,entries.cost,entries.entry_owner,auth_users_referenced.user_name as user_name_referenced,auth_users_referenced.user_id as user_id_referenced,")->from("entries");
        
            $this->db->join("auth_users as auth_users_referenced","entries.entry_owner=auth_users_referenced.user_id","left");
			
        $this->db->where("entries.id", $value);
        return $this->db->get()->row();
    }

    public function get_by_title ( $value ) {
        $this->db->select("entries.id,entries.title,entries.description,entries.email,entries.phone_number,entries.website,entries.map_title,entries.map_lat,entries.map_long,entries.facebook_link,entries.twitter_link,entries.posted_date,entries.from_date,entries.to_date,entries.cost,entries.entry_owner,auth_users_referenced.user_name as user_name_referenced,auth_users_referenced.user_id as user_id_referenced,")->from("entries");
        
            $this->db->join("auth_users as auth_users_referenced","entries.entry_owner=auth_users_referenced.user_id","left");
			
        $this->db->where("entries.title", $value);
        return $this->db->get()->row();
    }

    public function get_by_description ( $value ) {
        $this->db->select("entries.id,entries.title,entries.description,entries.email,entries.phone_number,entries.website,entries.map_title,entries.map_lat,entries.map_long,entries.facebook_link,entries.twitter_link,entries.posted_date,entries.from_date,entries.to_date,entries.cost,entries.entry_owner,auth_users_referenced.user_name as user_name_referenced,auth_users_referenced.user_id as user_id_referenced,")->from("entries");
        
            $this->db->join("auth_users as auth_users_referenced","entries.entry_owner=auth_users_referenced.user_id","left");
			
        $this->db->where("entries.description", $value);
        return $this->db->get()->row();
    }

    public function get_by_email ( $value ) {
        $this->db->select("entries.id,entries.title,entries.description,entries.email,entries.phone_number,entries.website,entries.map_title,entries.map_lat,entries.map_long,entries.facebook_link,entries.twitter_link,entries.posted_date,entries.from_date,entries.to_date,entries.cost,entries.entry_owner,auth_users_referenced.user_name as user_name_referenced,auth_users_referenced.user_id as user_id_referenced,")->from("entries");
        
            $this->db->join("auth_users as auth_users_referenced","entries.entry_owner=auth_users_referenced.user_id","left");
			
        $this->db->where("entries.email", $value);
        return $this->db->get()->row();
    }

    public function get_by_phone_number ( $value ) {
        $this->db->select("entries.id,entries.title,entries.description,entries.email,entries.phone_number,entries.website,entries.map_title,entries.map_lat,entries.map_long,entries.facebook_link,entries.twitter_link,entries.posted_date,entries.from_date,entries.to_date,entries.cost,entries.entry_owner,auth_users_referenced.user_name as user_name_referenced,auth_users_referenced.user_id as user_id_referenced,")->from("entries");
        
            $this->db->join("auth_users as auth_users_referenced","entries.entry_owner=auth_users_referenced.user_id","left");
			
        $this->db->where("entries.phone_number", $value);
        return $this->db->get()->row();
    }

    public function get_by_website ( $value ) {
        $this->db->select("entries.id,entries.title,entries.description,entries.email,entries.phone_number,entries.website,entries.map_title,entries.map_lat,entries.map_long,entries.facebook_link,entries.twitter_link,entries.posted_date,entries.from_date,entries.to_date,entries.cost,entries.entry_owner,auth_users_referenced.user_name as user_name_referenced,auth_users_referenced.user_id as user_id_referenced,")->from("entries");
        
            $this->db->join("auth_users as auth_users_referenced","entries.entry_owner=auth_users_referenced.user_id","left");
			
        $this->db->where("entries.website", $value);
        return $this->db->get()->row();
    }

    public function get_by_map_title ( $value ) {
        $this->db->select("entries.id,entries.title,entries.description,entries.email,entries.phone_number,entries.website,entries.map_title,entries.map_lat,entries.map_long,entries.facebook_link,entries.twitter_link,entries.posted_date,entries.from_date,entries.to_date,entries.cost,entries.entry_owner,auth_users_referenced.user_name as user_name_referenced,auth_users_referenced.user_id as user_id_referenced,")->from("entries");
        
            $this->db->join("auth_users as auth_users_referenced","entries.entry_owner=auth_users_referenced.user_id","left");
			
        $this->db->where("entries.map_title", $value);
        return $this->db->get()->row();
    }

    public function get_by_map_lat ( $value ) {
        $this->db->select("entries.id,entries.title,entries.description,entries.email,entries.phone_number,entries.website,entries.map_title,entries.map_lat,entries.map_long,entries.facebook_link,entries.twitter_link,entries.posted_date,entries.from_date,entries.to_date,entries.cost,entries.entry_owner,auth_users_referenced.user_name as user_name_referenced,auth_users_referenced.user_id as user_id_referenced,")->from("entries");
        
            $this->db->join("auth_users as auth_users_referenced","entries.entry_owner=auth_users_referenced.user_id","left");
			
        $this->db->where("entries.map_lat", $value);
        return $this->db->get()->row();
    }

    public function get_by_map_long ( $value ) {
        $this->db->select("entries.id,entries.title,entries.description,entries.email,entries.phone_number,entries.website,entries.map_title,entries.map_lat,entries.map_long,entries.facebook_link,entries.twitter_link,entries.posted_date,entries.from_date,entries.to_date,entries.cost,entries.entry_owner,auth_users_referenced.user_name as user_name_referenced,auth_users_referenced.user_id as user_id_referenced,")->from("entries");
        
            $this->db->join("auth_users as auth_users_referenced","entries.entry_owner=auth_users_referenced.user_id","left");
			
        $this->db->where("entries.map_long", $value);
        return $this->db->get()->row();
    }

    public function get_by_facebook_link ( $value ) {
        $this->db->select("entries.id,entries.title,entries.description,entries.email,entries.phone_number,entries.website,entries.map_title,entries.map_lat,entries.map_long,entries.facebook_link,entries.twitter_link,entries.posted_date,entries.from_date,entries.to_date,entries.cost,entries.entry_owner,auth_users_referenced.user_name as user_name_referenced,auth_users_referenced.user_id as user_id_referenced,")->from("entries");
        
            $this->db->join("auth_users as auth_users_referenced","entries.entry_owner=auth_users_referenced.user_id","left");
			
        $this->db->where("entries.facebook_link", $value);
        return $this->db->get()->row();
    }

    public function get_by_twitter_link ( $value ) {
        $this->db->select("entries.id,entries.title,entries.description,entries.email,entries.phone_number,entries.website,entries.map_title,entries.map_lat,entries.map_long,entries.facebook_link,entries.twitter_link,entries.posted_date,entries.from_date,entries.to_date,entries.cost,entries.entry_owner,auth_users_referenced.user_name as user_name_referenced,auth_users_referenced.user_id as user_id_referenced,")->from("entries");
        
            $this->db->join("auth_users as auth_users_referenced","entries.entry_owner=auth_users_referenced.user_id","left");
			
        $this->db->where("entries.twitter_link", $value);
        return $this->db->get()->row();
    }

    public function get_by_posted_date ( $value ) {
        $this->db->select("entries.id,entries.title,entries.description,entries.email,entries.phone_number,entries.website,entries.map_title,entries.map_lat,entries.map_long,entries.facebook_link,entries.twitter_link,entries.posted_date,entries.from_date,entries.to_date,entries.cost,entries.entry_owner,auth_users_referenced.user_name as user_name_referenced,auth_users_referenced.user_id as user_id_referenced,")->from("entries");
        
            $this->db->join("auth_users as auth_users_referenced","entries.entry_owner=auth_users_referenced.user_id","left");
			
        $this->db->where("entries.posted_date", $value);
        return $this->db->get()->row();
    }

    public function get_by_from_date ( $value ) {
        $this->db->select("entries.id,entries.title,entries.description,entries.email,entries.phone_number,entries.website,entries.map_title,entries.map_lat,entries.map_long,entries.facebook_link,entries.twitter_link,entries.posted_date,entries.from_date,entries.to_date,entries.cost,entries.entry_owner,auth_users_referenced.user_name as user_name_referenced,auth_users_referenced.user_id as user_id_referenced,")->from("entries");
        
            $this->db->join("auth_users as auth_users_referenced","entries.entry_owner=auth_users_referenced.user_id","left");
			
        $this->db->where("entries.from_date", $value);
        return $this->db->get()->row();
    }

    public function get_by_to_date ( $value ) {
        $this->db->select("entries.id,entries.title,entries.description,entries.email,entries.phone_number,entries.website,entries.map_title,entries.map_lat,entries.map_long,entries.facebook_link,entries.twitter_link,entries.posted_date,entries.from_date,entries.to_date,entries.cost,entries.entry_owner,auth_users_referenced.user_name as user_name_referenced,auth_users_referenced.user_id as user_id_referenced,")->from("entries");
        
            $this->db->join("auth_users as auth_users_referenced","entries.entry_owner=auth_users_referenced.user_id","left");
			
        $this->db->where("entries.to_date", $value);
        return $this->db->get()->row();
    }

    public function get_by_cost ( $value ) {
        $this->db->select("entries.id,entries.title,entries.description,entries.email,entries.phone_number,entries.website,entries.map_title,entries.map_lat,entries.map_long,entries.facebook_link,entries.twitter_link,entries.posted_date,entries.from_date,entries.to_date,entries.cost,entries.entry_owner,auth_users_referenced.user_name as user_name_referenced,auth_users_referenced.user_id as user_id_referenced,")->from("entries");
        
            $this->db->join("auth_users as auth_users_referenced","entries.entry_owner=auth_users_referenced.user_id","left");
			
        $this->db->where("entries.cost", $value);
        return $this->db->get()->row();
    }

    public function get_by_entry_owner ( $value ) {
        $this->db->select("entries.id,entries.title,entries.description,entries.email,entries.phone_number,entries.website,entries.map_title,entries.map_lat,entries.map_long,entries.facebook_link,entries.twitter_link,entries.posted_date,entries.from_date,entries.to_date,entries.cost,entries.entry_owner,auth_users_referenced.user_name as user_name_referenced,auth_users_referenced.user_id as user_id_referenced,")->from("entries");
        
            $this->db->join("auth_users as auth_users_referenced","entries.entry_owner=auth_users_referenced.user_id","left");
			
        $this->db->where("entries.entry_owner", $value);
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



    public function get_entries_count ($page , $auth_user = 0, $term = "", $user_id, $user_role, $user_level ) {

        if ( $this->get_see_all("entries")) {

            $this->db->select(
                    "entries.id,entries.title,entries.description,entries.email,entries.phone_number,entries.website,entries.map_title,entries.map_lat,entries.map_long,entries.facebook_link,entries.twitter_link,entries.posted_date,entries.from_date,entries.to_date,entries.cost,entries.entry_owner,auth_users_referenced.user_name as user_name_referenced,auth_users_referenced.user_id as user_id_referenced"
            )->from("entries");
            
            $this->db->join("auth_users as auth_users_referenced","entries.entry_owner=auth_users_referenced.user_id","left");
			
            		
            if ( $auth_user ) {
                $this->db->where( "auth_users_referenced.user_id", $auth_user );
            }
		

        } else if (!$this->get_see_others("entries")) {
            $this->db->select(
                    "entries.id,entries.title,entries.description,entries.email,entries.phone_number,entries.website,entries.map_title,entries.map_lat,entries.map_long,entries.facebook_link,entries.twitter_link,entries.posted_date,entries.from_date,entries.to_date,entries.cost,entries.entry_owner,auth_users_referenced.user_name as user_name_referenced,auth_users_referenced.user_id as user_id_referenced"
            )->from("entries");
            
            $this->db->join("auth_users as auth_users_referenced","entries.entry_owner=auth_users_referenced.user_id","left");
			
            		
            if ( $auth_user ) {
                $this->db->where( "auth_users_referenced.user_id", $auth_user );
            }
		

            
            $this->db->where("entries.entry_owner", $user_id);


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
                    "entries.id,entries.title,entries.description,entries.email,entries.phone_number,entries.website,entries.map_title,entries.map_lat,entries.map_long,entries.facebook_link,entries.twitter_link,entries.posted_date,entries.from_date,entries.to_date,entries.cost,entries.entry_owner,auth_users_referenced.user_name as user_name_referenced,auth_users_referenced.user_id as user_id_referenced"
            )->from("entries");

            
            $this->db->join("auth_users as auth_users_referenced","entries.entry_owner=auth_users_referenced.user_id","left");
			
            		
            if ( $auth_user ) {
                $this->db->where( "auth_users_referenced.user_id", $auth_user );
            }
		

            
            $this->db->where_in("entries.entry_owner", $u );

        }

        if ( !empty($term)) {
            $this->db->where("entries.title LIKE '%".$term."%' OR entries.description LIKE '%".$term."%' OR entries.email LIKE '%".$term."%' OR entries.phone_number LIKE '%".$term."%' OR entries.website LIKE '%".$term."%' OR entries.map_title LIKE '%".$term."%' OR entries.map_lat LIKE '%".$term."%' OR entries.map_long LIKE '%".$term."%' OR entries.facebook_link LIKE '%".$term."%' OR entries.twitter_link LIKE '%".$term."%' OR entries.posted_date LIKE '%".$term."%' OR entries.from_date LIKE '%".$term."%' OR entries.to_date LIKE '%".$term."%' OR entries.cost LIKE '%".$term."%' ");
        }

        return $this->db->get()->num_rows;
    }

    public function create ( $info, $user_id ) {

        foreach ( $info as $_key => $_value ) {
            if ( $_value == null ||  $_value == 'null' ) {
                unset($info[$_key]);   
            }
        }

        
            $info["entry_owner"] = $user_id;
        $id = $this->db->insert("entries", $info );
        $this->add_log("entry nesnesi oluşturuldu [ id : ".$this->db->insert_id()." ]");
    }

    public function update ( $info,  $value ) {

        foreach ( $info as $_key => $_value ) {
        	//asil kisim burasidir
//             if ( $_value == null ||  $_value == 'null' ) {
//                 unset($info[$_key]);   
//             }
            if ( $_value == '' ) {
            	$info[$_key] = null;
            }
        }

        $this->db->where("id", $value );
        $result = $this->db->update("entries", $info );
        //echo 'query'. $this->db->last_query();
        $this->add_log("entry nesnesi güncellendi [ id : ".$value." ]");
        return $result;
    }

    public function delete ( $value ) {
        $this->db->where("id", $value);
        $result = $this->db->delete("entries" );
        $this->add_log("entry nesnesi silindi [ id : ".$value." ]");
        return $result;
    }

    public function get_table_headers () {
        $query = "describe entries";
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