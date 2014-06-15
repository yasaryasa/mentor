<?php
class global_model extends CI_Model {
	
	public function get_label_value ( $argument ) {
		$this->db->where("label_name", $argument);
		$label = $this->db->get("gen_labels")->row();
		if ( $label )
			return $label->label_value;
		else
			return "*".$argument."*";
	}
	
}
?>