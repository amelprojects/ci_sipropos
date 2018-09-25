<?php
/**
 *
 * Vf.php
 *
 */
class Vf {

    private $ci; 

    // --------------------------------------------------------------------

    /**
     * PHP5        Constructor
     *
     */
    function __construct()
    {
        $this->ci =& get_instance();    // get a reference to CodeIgniter.
    }

    // --------------------------------------------------------------------

    
    function getFieldById($field, $table, $field_id, $id)
    {
        // use active record database to get the menu.
        $query = $this->ci->db->query("SELECT ".$field." FROM ".$table." WHERE ".$field_id."='".$id."' ");

        $result= $query->row_array();

        if ($query->num_rows() > 0)
        {
            return $result[$field];
        }
        else
        {
            return "";
        }

    }

    function getFieldByW($field, $table, $where)
    {
        // use active record database to get the menu.
        $query = $this->ci->db->query("SELECT ".$field." FROM ".$table." WHERE ".$where);

        $result= $query->row_array();

        if ($query->num_rows() > 0)
        {
            return $result;
        }
        else
        {
            return "";
        }

    }

    function getFieldByIdAr($field, $table, $field_id, $id)
    {
        
        $query = $this->ci->db->query("SELECT ".$field." FROM ".$table." WHERE ".$field_id."='".$id."' ");

        $result= $query->result_array();

        if ($query->num_rows() > 0)
        {
            return $result;
        }
        else
        {
            return "";
        }

    }

    
    function getTotalField($table)
    {
        // use active record database to get the menu.
        $query = $this->ci->db->query("SELECT * FROM ".$table);

        //$result= $query->row_array();

        if ($query->num_rows() > 0)
        {
            return $query->num_rows();
        }
        else
        {
            return 0;
        }

    }

    
    function getTotalFieldById($table, $field_id, $id)
    {
        // use active record database to get the menu.
        $query = $this->ci->db->query("SELECT * FROM ".$table." WHERE ".$field_id."='".$id."' ");

        //$result= $query->row_array();

        if ($query->num_rows() > 0)
        {
            return $query->num_rows();
        }
        else
        {
            return 0;
        }

    }

    // ambil dari wilayah
    function getFieldDB2ById($field, $table, $field_id, $id)
    {
        $this->ci->wilayah = $this->ci->load->database('wilayah', TRUE);
        // use active record database to get the menu.
        $query = $this->ci->wilayah->query("SELECT ".$field." FROM ".$table." WHERE ".$field_id."='".$id."' ");

        $result= $query->row_array();

        if ($query->num_rows() > 0)
        {
            return $result[$field];
        }
        else
        {
            return "";
        }

    }

    function getFieldSB2ByW($field, $table, $where)
    {
        $this->ci->wilayah = $this->ci->load->database('wilayah', TRUE);
        // use active record database to get the menu.
        $query = $this->ci->wilayah->query("SELECT ".$field." FROM ".$table." ".$where);

        $result= $query->row_array();

        if ($query->num_rows() > 0)
        {
            return $result;
        }
        else
        {
            return "";
        }

    }

}

/* End of file Akmet.php */
/* Location: ../application/libraries/Akmet.php */  