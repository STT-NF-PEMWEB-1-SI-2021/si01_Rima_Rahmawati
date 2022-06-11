<?php
class Mahasiswa_model extends CI_Model {

    public $id;
    public $nama;
    public $nim;
    public $gender;
    public $tmp_lahir;
    public $tgl_lahir;
    public $prodi_kode;
    public $ipk;

    public function predikat(){
        $predikat = ($this->ipk >= 3.75)?"Cumlaude" : "Baik";
       return $predikat;
    }
    
    private $table = "mahasiswa";

    public function getAll(){
        //SELECT * FROM mahasiswa
        $query = $this->db->get($this->table);
        return $query->result();
    }

    public function findById($id){
        $this->db->where("nim",$id);
        $query = $this->db->get($this->table);
        return $query->row();
    }

    public function save($data){

        $sql = "INSERT INTO mahasiswa (nim,nama,gender,tmp_lahir,tgl_lahir,prodi_kode,ipk)
        VALUES (?,?,?,?,?,?,?)";
        $this->db->query($sql,$data);

    }
    public function update($data){

        $sql = "UPDATE mahasiswa SET nim=?,nama=?,gender=?,tmp_lahir=?,tgl_lahir=?,prodi_kode=?,ipk=?
        WHERE nim=?";

        $this->db->query($sql,$data);
    }

    public function delete($id){
    $sql = "DELETE from mahasiswa where nim=?";
    $this->db->query($sql,array($id));
    }
}
?>