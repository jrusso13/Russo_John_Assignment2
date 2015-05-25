<?php

class Site extends MY_Model {

    const DB_TABLE = 'sites';
    const DB_TABLE_PK = 'site_id';

    public function __construct(){
        parent::__construct();
    }

    public function record_count(){
        return $this->db->count_all('sites');
    }

    public  function fetch_sites($limit,$start){
        $this->db->limit($limit,$start);
        $query = $this->db->get('sites');
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }


    /**
     * Site unique identifier.
     * @var int
     */
    public $site_id;

    /**
     * School unifying record.
     * @var int
     */
    public $school_id;

    /**
     * Publisher assigned site number.
     * @var int
     */
    public $site_number;

    /**
     * Date that the site was published.
     * @var string
     */
    public $site_date_school;

    /**
     * Path to the file containing the cover image.
     * @var string
     */
    public $site_logo;

    /**
     * Initial web training date
     * @var string
     */
    public $fname;

    /**
     * Initial live training date
     * @var string
     */
    public $lname;

    /**
     * Initial website
     * @var string
     */
    public $eid;

    /**
     * Initial website
     * @var string
     */
    public $email;

    /**
     * Initial website
     * @var string
     */
    public $phone;


}