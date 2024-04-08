<?php
namespace App\Models;

use CodeIgniter\Model;

class Board extends Model {
    protected $db;

    function __construct() {
        parent::__construct();
        $this->db = db_connect();
    }

    public function gets() {
        return $this->db->query("SELECT * FROM bd_tb")->getResultArray();
    }

    public function get($id) {            
        return $this->db->table('bd_tb')->where('id', $id)->get()->getRowArray();
    }
}
?>