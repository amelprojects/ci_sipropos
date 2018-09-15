<?php
/**
 *
 * Vf_auth.php
 *
 */
class Vf_auth {

    private $ci; 

    // --------------------------------------------------------------------

    /**
     * PHP5        Constructor
     *
     */
    function __construct()
    {
        $this->ci =& get_instance();    // get a reference to CodeIgniter.
        //$this->ci->auth = $this->ci->load->database('akmet_auth', TRUE);
    }

    // --------------------------------------------------------------------

    /**
     * build_menu($table, $type)
     *
     * Description:
     *
     * builds the Dynaminc dropdown menu
     * $table allows for passing in a MySQL table name for different menu tables.
     * $type is for the type of menu to display ie; topmenu, mainmenu, sidebar menu
     * or a footer menu.
     *
     * @param    string    the MySQL database table name.
     * @param    string    the type of menu to display.
     * @return    string    $html_out using CodeIgniter achor tags.
     */

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

    function getAllFieldById($table, $field_id, $id)
    {
        
        // use active record database to get the menu.
        $query = $this->ci->db->query("SELECT * FROM ".$table." WHERE ".$field_id."='".$id."' ");

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

    function updateFieldById($table, $field, $field_value, $field_id, $id)
    {
        return $this->ci->db->query("UPDATE ".$table." SET ".$field."='".$field_value."' WHERE ".$field_id."='".$id."' ");
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

}

/* End of file Akmet_auth.php */
/* Location: ../application/libraries/Akmet_auth.php */  