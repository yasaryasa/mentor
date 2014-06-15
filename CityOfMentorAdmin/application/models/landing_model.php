<?php

/*
 * Bu Yazılım İmleç A.Ş. Tarafından Geliştirilmiştir. 
 * http://www.imlec.com.tr 
 * http://www.imleç.com.tr 
 */

class landing_model extends Imlec_Model {

    public function get_modules($user_role) {
        $this->db->where("role_capability_role_id", $user_role);
        $this->db->where("role_capability_read", 1);
        $this->db->where("role_capability_update", 1);
        $this->db->where("role_capability_delete", 1);
        $this->db->where("role_capability_show", 1);
        $rs = $this->db->get("auth_role_capabilities");
        return $rs;
    }

    public function get_module_item_count($user_id, $module_name) {

        $user = $this->get_user_by_user_id($user_id);

        $user_level = $user->role_level;
        $this->db->select(USER_TABLE . ".user_id")->from(USER_TABLE);

        $this->db->join(ROLE_TABLE, USER_TABLE . ".user_role_id = " . ROLE_TABLE . ".role_id", "left");
        $this->db->where(ROLE_TABLE . ".role_level >", $user_level);
        $users = $this->db->get();
        $u = array($user_id);
        if ($users) {
            foreach ($users->result() as $user) {
                $u[] = $user->user_id;
            }
        }
        $this->db->where_in($this->singularize($module_name) . "_owner", $u);
        return $this->db->get($module_name)->num_rows();
    }

    public function get_user_by_user_id($value) {
        $this->db->select("*")->from("auth_users");
        $this->db->join("auth_roles as auth_roles_referenced", "auth_users.user_role_id=auth_roles_referenced.role_id", "left");
        $this->db->join(LANGUAGE_TABLE, "auth_users.user_language_id=" . LANGUAGE_TABLE . "." . LANGUAGE_TABLE_KEY, "left");
        $this->db->join("auth_users as auth_users_referenced", "auth_users.auth_user_owner=auth_users_referenced.user_id", "left");
        $this->db->where("auth_users.user_id", $value);
        return $this->db->get()->row();
    }

    public function singularize($word) {
        $singular = array(
            '/(quiz)zes$/i' => '\1',
            '/(matr)ices$/i' => '\1ix',
            '/(vert|ind)ices$/i' => '\1ex',
            '/^(ox)en/i' => '\1',
            '/(alias|status)es$/i' => '\1',
            '/([octop|vir])i$/i' => '\1us',
            '/(cris|ax|test)es$/i' => '\1is',
            '/(shoe)s$/i' => '\1',
            '/(o)es$/i' => '\1',
            '/(bus)es$/i' => '\1',
            '/([m|l])ice$/i' => '\1ouse',
            '/(x|ch|ss|sh)es$/i' => '\1',
            '/(m)ovies$/i' => '\1ovie',
            '/(s)eries$/i' => '\1eries',
            '/([^aeiouy]|qu)ies$/i' => '\1y',
            '/([lr])ves$/i' => '\1f',
            '/(tive)s$/i' => '\1',
            '/(hive)s$/i' => '\1',
            '/([^f])ves$/i' => '\1fe',
            '/(^analy)ses$/i' => '\1sis',
            '/((a)naly|(b)a|(d)iagno|(p)arenthe|(p)rogno|(s)ynop|(t)he)ses$/i' => '\1\2sis',
            '/([ti])a$/i' => '\1um',
            '/(n)ews$/i' => '\1ews',
            '/s$/i' => '',
        );

        $uncountable = array('equipment', 'information', 'rice', 'money', 'species', 'series', 'fish', 'sheep');

        $irregular = array(
            'person' => 'people',
            'man' => 'men',
            'child' => 'children',
            'sex' => 'sexes',
            'move' => 'moves');

        $lowercased_word = strtolower($word);
        foreach ($uncountable as $_uncountable) {
            if (substr($lowercased_word, (-1 * strlen($_uncountable))) == $_uncountable) {
                return $word;
            }
        }

        foreach ($irregular as $_plural => $_singular) {
            if (preg_match('/(' . $_singular . ')$/i', $word, $arr)) {
                return preg_replace('/(' . $_singular . ')$/i', substr($arr[0], 0, 1) . substr($_plural, 1), $word);
            }
        }

        foreach ($singular as $rule => $replacement) {
            if (preg_match($rule, $word)) {
                return preg_replace($rule, $replacement, $word);
            }
        }

        return $word;
    }

    public function to_url($string) {

        $string = $this->to_lower($string);
        $string = strip_tags($string);
        $string = stripslashes($string);
        $string = html_entity_decode($string);

        $string = str_replace('\'', '', $string);

        $string = trim($string);

        $string = str_replace("ı", "i", "$string");
        $string = str_replace("ü", "u", "$string");
        $string = str_replace("ö", "o", "$string");
        $string = str_replace("ş", "s", "$string");
        $string = str_replace("ç", "c", "$string");
        $string = str_replace("ğ", "g", "$string");

        $string = preg_replace('/[^A-Za-z0-9-]+/', '-', $string);


        return $string;
    }

    public function to_lower($string) {
        return mb_convert_case(str_replace('I', 'ı', $string), MB_CASE_LOWER, 'UTF-8');
    }

    public function to_upper($string) {
        return mb_convert_case(str_replace('i', 'İ', $string), MB_CASE_UPPER, 'UTF-8');
    }

    public function to_title($string) {
        return mb_convert_case(str_replace('i', 'İ', $string), MB_CASE_TITLE, 'UTF-8');
    }

}

?>
