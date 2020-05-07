<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class MY_Model extends CI_Model {


    private $table_name;

    public function __construct($table_name = ""){
		parent::__construct();
		$this->table_name = $table_name;
	}
    

    public function getEmptyRecord($table=""){
	$record = $this->desc($table);
	foreach ($record as $key => $value){
	    $record[$key] = "";
	}
	return (object) $record;
    }

    /*
     * @params
     * - select = *
     * - from = self::$table_name
     * - where
     * - group_by
     * - order_by
     * - page
     * - limit = 10
     * - join
     *
     * @return An array of result or false if no result
     */
    public function find($params = array()){
    if (isset($params["distinct"]))
	    $this->db->distinct();
	if (isset($params["select"]))
	    $this->db->select($params["select"]);
	
	if (isset($params["from"]) && $params["from"])
	    $this->db->from($params["from"]);
	else
	    $this->db->from($this->table_name);
	
	if (isset($params["where"]))
	    $this->db->where($params["where"]);
	
	if (isset($params["group_by"]))
	    $this->db->group_by($params["group_by"]);
	
	if (isset($params["order_by"]))
	    $this->db->order_by($params["order_by"]);

	if (isset($params["inner_join"]))
		$this->db->join($params["inner_join"],$params["join_conditopn"]);

	if (isset($params["join"])){
	    foreach($params["join"] as $join){
            foreach ($join as $table => $condition){
                $this->db->join($table,$condition);
            }
	    }
	}

	if (isset($params["page"]) || isset($params["limit"])){
	    $page = isset($params["page"]) ? $params["page"] : 1;
	    $limit = isset($params["limit"]) ? $params["limit"] : 10;

	    $this->db->limit($limit, ($page-1) * $limit);
	}
	
	$query = $this->db->get();
	return (array) $query->result();
    }

    public function findOneBy($field,$table=""){
	$result = $this->find(array("where"=>$field,"from"=>$table));

	if (isset($result[0]))
	    return $result[0];
	
	return false;
    }

    public function findBy($field,$table=""){
	$result = $this->find(array("where"=>$field,"from"=>$table));
	return $result;
    }

    /*
     * Insert records into database
     * @return entry database ID
     */
    public function insert($data,$table=""){
	$table = $table ? $table : $this->table_name;
	$attributes = $this->desc($table);
	$record = array();
	foreach ($data as $key => $value){
	    if (isset($attributes[$key])){
		$record[$key] = $value;
	    }
	}
        
	$this->db->insert($table,$record);
	//print_r($this->db->get_compiled_insert());
	return $this->get_last_insert_id();
    }

    public function update($data,$where,$table=""){
	$table = $table ? $table : $this->table_name;
	$attributes = $this->desc($table);
	$record = array();
	foreach ($data as $key => $value){
	    if (isset($attributes[$key])){
		$record[$key] = $value;
	    }
	}
	return $this->db->update($table,$record,$where);
    }

    public function delete($where,$table){
        if($where) $this->db->where($where);
	return $this->db->delete($table); 
    }
    
    public function count($where="",$table=""){
	if (!$table) $table = $this->table_name;
	$this->db->from($table);

	if($where) $this->db->where($where);

	return $this->db->count_all_results();
    }

    private function desc($table=""){
	$table = $table ? $table : $this->table_name;
	$query = $this->db->query("desc " . $table);
	$att = array(); $i=0;
	foreach ($query->result() as $row){
		$att[$row->Field] = $i++;
	}
	return $att;
    }

    private function get_last_insert_id(){
	$this->db->select("last_insert_id() as last_insert_id");
	$query = $this->db->get();
	foreach ($query->result() as $row){
		$last_insert = $row->last_insert_id;
	}
	return $last_insert;
    }	
	
	public function find_other($params = array()){
		$otherdb = $this->load->database('other', TRUE);
	//$this->db->reconnect();
		if (isset($params["distinct"]))
		    $otherdb->distinct();
		if (isset($params["select"]))
		    $otherdb->select($params["select"]);

		if (isset($params["from"]) && $params["from"])
		    $otherdb->from($params["from"]);
		else
		    $otherdb->from($this->table_name);

		if (isset($params["where"]))
		    $otherdb->where($params["where"]);

		if (isset($params["group_by"]))
		    $otherdb->group_by($params["group_by"]);

		if (isset($params["order_by"]))
		    $otherdb->order_by($params["order_by"]);

		if (isset($params["join"])){
		    foreach($params["join"] as $join){
			foreach ($join as $table => $condition){
			    $otherdb->join($table,$condition);
			}
		    }
		}

		if (isset($params["page"]) || isset($params["limit"])){
		    $page = isset($params["page"]) ? $params["page"] : 1;
		    $limit = isset($params["limit"]) ? $params["limit"] : 10;

		    $otherdb->limit($limit, ($page-1) * $limit);
		}

		$query = $otherdb->get();
		return (array) $query->result();
	}
	
	public function findOneBy_other($field,$table=""){
 		$result = $this->find_other(array("where"=>$field,"from"=>$table));
		if (isset($result[0]))
		    return $result[0];
	
		return false;
	}
	
    public function findBy_other($field,$table=""){
		$result = $this->find_other(array("where"=>$field,"from"=>$table));
		return $result;
    }
	
	
	public function insert_other($data,$table=""){
		$otherdb = $this->load->database('other', TRUE);
		
		$table = $table ? $table : $this->table_name;
		$attributes = $this->desc_other($table);
		$record = array();
		foreach ($data as $key => $value){
		    if (isset($attributes[$key])){
			$record[$key] = $value;
		    }
		}
	        
		$otherdb->insert($table,$record);
		return $this->get_last_insert_id_other();
    }

    public function update_other($data,$where,$table=""){
    	$otherdb = $this->load->database('other', TRUE);
		$table = $table ? $table : $this->table_name;
		$attributes = $this->desc($table);
		$record = array();
		foreach ($data as $key => $value){
		    if (isset($attributes[$key])){
			$record[$key] = $value;
		    }
		}
		return $otherdb->update($table,$record,$where);
    }

    public function delete_other($where,$table){
		$otherdb = $this->load->database('other', TRUE);
        if($where) $otherdb->where($where);
		return $otherdb->delete($table); 
    }
    
    public function count_other($where="",$table=""){
		$otherdb = $this->load->database('other', TRUE);
		if (!$table) $table = $this->table_name;
		$otherdb->from($table);
	
		if($where) $otherdb->where($where);
	
		return $otherdb->count_all_results();
    }

	public function custom_escape($value)
	{
		return	$this->db->escape($value);
	}


}
