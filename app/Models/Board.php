<?php
namespace App\Models;

use CodeIgniter\Model;

class Board extends Model {
    protected $db;

    function __construct() {
        parent::__construct();
        $this->db = db_connect();
    }

    public function gets($start_page, $perPage) {
        $builder = $this->db->table("bd_tb");
        $builder->where('is_deleted', 'n');
        $builder->limit($perPage , $start_page);
        return $builder->get()->getResultArray();
    }

    public function getBdAllCount(){
        return $this->db->table('bd_tb')->where('is_deleted', 'n')->countAll();
    }

    public function get($id) {            
        return $this->db->table('bd_tb')->where('idx', $id)->where('is_deleted', 'n')->get()->getRowArray();
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