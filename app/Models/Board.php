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
        return $this->db->query("SELECT * FROM bd_tb where is_deleted='n'")->getResultArray();
    }

    public function get($id) {            
        return $this->db->table('bd_tb')->where('is_deleted', 'n')->where('idx', $id)->get()->getRowArray();
    }

    public function reply_get($id){
        $sql = "SELECT * FROM reply_tb where bd_idx=? and is_deleted='n'";
        return $this->db->query($sql, [$id])->getResultArray();
    }

    public function insertData($tb, $data){
        return $this->db->table($tb)->insert($data);
    }

    public function updateData($tb, $data, $key){
        $builder = $this->db->table($tb);
        $builder->set($data);
        $builder->where('idx', $key);
        $builder->update();
    }
}
?>