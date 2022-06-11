<?php
class Matakuliah_model extends CI_Model {
    public $kode;
    public $nama;
    public $sks;

    private $tables = "matakuliah";

    public function getAll(){
        $query = $this->db->get($this->tables);
        return $query->result();
    }

    public function findById($id){
        $this->db->where("kode",$id);
        $query = $this->db->get($this->tables);
        return $query->row();
    }

    public function save($data){
        $sql = "INSERT INTO matakuliah (kode,nama,sks)
        VALUES (?,?,?,?,?,?,?)";
        $this->db->query($sql,$data);

    }
    public function update($data){
        $sql = "UPDATE matakuliah SET kode=?,nama=?,sks=?
        WHERE kode=?";

        $this->db->query($sql,$data);

    }

    public function delete($id){
        $sql = "DELETE from matakuliah where kode=?";
    $this->db->query($sql,array($id));
    }
}
?>
