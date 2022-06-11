<?php
class Dosen_model extends CI_Model {
    public $nidn;
    public $nama;
    public $gender;
    public $tmp_lahir;
    public $tgl_lahir;
    public $pendidikan_akhir;
    public $prodi_kode;

    private $obj = "dosen";

    public function getAll(){
        $query = $this->db->get($this->obj);
        return $query->result();
    }

    public function findById($id){
        $this->db->where("nidn",$id);
        $query = $this->db->get($this->obj);
        return $query->row();
    }

    public function save($data){

        $sql = "INSERT INTO dosen (nidn,nama,gender,tmp_lahir,tgl_lahir,pendidikan_akhir,prodi_kode)
        VALUES (?,?,?,?,?,?,?)";
        $this->db->query($sql,$data);
    }
    public function update($data){

        $sql = "UPDATE dosen SET nidn=?,nama=?,gender=?,tmp_lahir=?,tgl_lahir=?,pendidikan_akhir=?,prodi_kode=?
        WHERE nidn=?";

        $this->db->query($sql,$data);

    }
    public function delete($id){
        $sql = "DELETE from dosen where nidn=?";
    $this->db->query($sql,array($id));
    }
   

}

?>