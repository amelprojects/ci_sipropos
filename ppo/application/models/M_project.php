<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_project extends CI_Model {

    var $table = 'project';
    var $column_order = array(null, 'title', 'project_code', 'type'); //set column field database for datatable orderable
    var $column_search = array('title', 'project_code'); //set column field database for datatable searchable 
    var $order = array('id' => 'DESC'); // default order 

    public function __construct()
    {
            parent::__construct();
            $this->load->database();
    }

    private function _get_datatables_query($user_role="", $user_id="")
    {

        //add custom filter here
    /*
        if($this->input->post('s_role'))
        {
                $this->db->where('id_role', $this->input->post('s_role'));
        }
        if($this->input->post('FirstName'))
        {
                $this->db->like('FirstName', $this->input->post('FirstName'));
        }
        if($this->input->post('LastName'))
        {
                $this->db->like('LastName', $this->input->post('LastName'));
        }
        if($this->input->post('address'))
        {
                $this->db->like('address', $this->input->post('address'));
        }
        $this->db->where('id !=', -1);
    */  
        if ($user_role==2) {
            $this->db->where('status >',0);
            $this->db->where('user_created', $user_id);
        } else {
            $this->db->where('status >=',100);
        }
        $this->db->from($this->table);
        //$this->db->join('roles', 'users.id_role=roles.id');
        $i = 0;

        foreach ($this->column_search as $item) // loop column 
        {
            if($_POST['search']['value']) // if datatable send POST for search
            {

                if($i===0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if(count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }

        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    public function get_datatables($user_role="", $user_id="")
    {
            $this->_get_datatables_query($user_role, $user_id);
            if($_POST['length'] != -1) 
            {
                $this->db->limit($_POST['length'], $_POST['start']);
                $query = $this->db->get();
            }
            return $query->result();
    }

    public function count_filtered($user_role="", $user_id="")
    {
            $this->_get_datatables_query($user_role, $user_id);
            $query = $this->db->get();
            return $query->num_rows();
    }

    public function count_all($user_role="", $user_id="")
    {
            // $this->db->where('id !=', -1);
        if ($user_role==2) {
            $this->db->where('status >',0);
            $this->db->where('user_created', $user_id);
        } else {
            $this->db->where('status >=',100);
        }
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }


}
