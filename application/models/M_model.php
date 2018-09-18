<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of user
 *
 * @author VF
 */

Class M_model extends CI_Model
{

    public function __construct() 
    {
        $this->load->database();
    }

    public function last_id($table, $field) {
        // $this->db->query("INSERT INTO ".$table." (".$created.") VALUES (NOW()) ");

        $this->db->limit(1);
        $this->db->order_by($field, 'DESC');
        $query  = $this->db->get($table);

        return $query->row_array();

    }

    public function select_all($table, $cond)
    {
        $query = $this->db->query("SELECT * FROM ".$table." ".$cond);
        return $query->result_array();
    }

    public function select_id($table, $pk, $id = FALSE, $cond)
    {
        $query = $this->db->query("SELECT * FROM ".$table." WHERE ".$pk."='".$id."' ".$cond);
        return $query->result_array();
    }

    public function select_field_id($table, $field, $pk, $id = FALSE)
    {
        $query = $this->db->query("SELECT ".$field." FROM ".$table." WHERE ".$pk."='".$id."' ");
        return $query->result_array();
    }

    public function detail_row($table, $pk, $id = FALSE) {
        if ($id === FALSE) {
            $query = $this->db->get($table);
            return $query->result_array();
        }
        $query = $this->db->get_where($table, array($pk => $id));
        return $query->row_array();
    }

    public function detail_array($table, $pk, $id = FALSE) {
        if ($id === FALSE) {
            $query = $this->db->get($table);
            return $query->result_array();
        }
        $query = $this->db->get_where($table, array($pk => $id));
        return $query->result_array();
    }

    public function insert($table, $data) {
        return $this->db->insert($table, $data);
    }

    public function edit($table, $pk, $data)
    {
        $this->db->where($pk, $data[$pk]);
        return $this->db->update($table, $data);
    }    

    public function edit_all($table, $data)
    {
        return $this->db->update($table, $data);
    }    

    public function delete($table, $pk, $id) {
        $this->db->where($pk, $id);
        return $this->db->delete($table);
    }

    public function delete_all($table) {
        return $this->db->query ("DELETE FROM ".$table);
    }

    public function count_all($table) {
        $q = $this->db->query ("SELECT * FROM ".$table);
        return $q->num_rows();
    }

    public function count_id($table, $pk, $id) {
        $q = $this->db->query ("SELECT * FROM ".$table." WHERE ".$pk."='".$id."' ");
        return $q->num_rows();
    }

    public function count_idW($table, $where) {
        $q = $this->db->query ("SELECT * FROM ".$table." ".$where);
        return $q->num_rows();
    }

    public function count_2id($table, $pk1, $id1, $pk2, $id2) {
        $q = $this->db->query ("SELECT * FROM ".$table." WHERE ".$pk1."='".$id1."' AND ".$pk2."='".$id2."' ");
        return $q->num_rows();
    }


    public function select_all_row($cond1, $table, $cond2)
    {
        $query = $this->db->query("SELECT ".$cond1." FROM ".$table." ".$cond2);
        return $query->row_array();
    }
    
    // VF DB Wilayah
    
    public function select_all_db2($table, $cond)
    {
        $db2 = $this->load->database('wilayah', TRUE);
        $query = $db2->query("SELECT * FROM ".$table." ".$cond);
        return $query->result_array();
    }

    // VF DB Test
    public function insert_db3($table, $data) {
        $db3 = $this->load->database('test', TRUE);
        return $this->$db3->insert($table, $data);
    }

    public function edit_db3($table, $pk, $data)
    {
        $db3 = $this->load->database('test', TRUE);
        $this->db3->where($pk, $data[$pk]);
        return $this->$db3->update($table, $data);
    }    

}
