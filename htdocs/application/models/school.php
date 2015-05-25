<?php

class School extends MY_Model
{

    const DB_TABLE = 'schools';
    const DB_TABLE_PK = 'school_id';

    public function get_site($site_id)
    {

        $query = $this->db->query("SELECT * FROM sites WHERE site_id = ?", array($site_id));

        return $query->result();
    }

    public function get_types()
    {

        $query = $this->db->query("SELECT * FROM schools ");

        return $query->result();
    }



}