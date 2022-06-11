<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dosen extends CI_Controller {

    public function index(){

        $this->load->model('Dosen_model','dsn');
        $list_dsn = $this->dsn->getAll();
        $data['list_dsn'] = $list_dsn;
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar');
        $this->load->view('dosen/index',$data);
        $this->load->view('layout/footer');

        
        //$this->load->model('dosen_model','dsn1');
       // $this->dsn1->id=1;
        //$this->dsn1->nidn="08912";
        //$this->dsn1->nama="Fahkrijul Anwar";
        //$this->dsn1->pendidikan="S3";
        
       // $this->load->model('dosen_model','dsn2');
        //$this->dsn2->id=2;
        //$this->dsn2->nidn="08981";
        //$this->dsn2->nama="Attirah";
       // $this->dsn2->pendidikan="S3";

       // $list_dsn = [$this->dsn1,$this->dsn2];

        //$data['dosen']=$this->dsn1;

        $this->load->model('Dosen_model','dsn');
        $data['list_dosen']=$this->dsn->getAll();

        $this->load->view('layout/header');
        $this->load->view('layout/sidebar');
        $this->load->view('dosen/index',$data);
        $this->load->view('layout/footer');
    }

    public function create(){

        $data['Jdl']="Form Kelola Dosen";
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar');
        $this->load->view('dosen/create',$data);
        $this->load->view('layout/footer');
    }

    public function view(){
        $_nidn = $this->input->get('id');
        $this->load->model('dosen_model','dsn');
        $data['dsn']=$this->dsn->findById($_nidn);

        $this->load->view('layout/header');
        $this->load->view('layout/sidebar');
        $this->load->view('dosen/view',$data);
        $this->load->view('layout/footer');

    }
    public function save(){

        $this->load->model('dosen_model','dsn');

        $_nidn = $this->dsn->nim =$this->input->post('nidn');
        $_nama = $this->dsn->nama =$this->input->post('nama');
        $_gender = $this->dsn->gender =$this->input->post('gender');
        $_tmp_lahir = $this->dsn->tmp_lahir =$this->input->post('tmp_lahir');
        $_tgl_lahir = $this->dsn->tgl_lahir =$this->input->post('tgl_lahir');
        $_pendidikan_akhir = $this->dsn->prodi_kode =$this->input->post('pendidikan_akhir');
        $_prodi_kode = $this->dsn->ipk =$this->input->post('prodi_kode');
        $_idedit = $this->input->post('idedit');//hidden field

        $data_dsn[]=$_nidn;
        $data_dsn[]=$_nama;
        $data_dsn[]=$_gender;
        $data_dsn[]=$_tmp_lahir;
        $data_dsn[]=$_tgl_lahir;
        $data_dsn[]=$_pendidikan_akhir;
        $data_dsn[]=$_prodi_kode;
        

        if(isset($_idedit)){
            //update data lama

            $data_dsn[]=$_idedit;
            $this->dsn->update($data_dsn);
        }else{
            //save data baru
            $this->dsn->save($data_dsn);
        }
        //panggil fungsi save
        

        redirect(base_url().'index.php/dosen/view?id='.$_nidn,'refresh');
    }

    public function edit(){
        $_id= $this->input->get('id');
        $this->load->model('dosen_model','dsn');
        $dsnedit = $this->dsn->findById($_id);

        $data['Jdl']="Form Kelola Dosen";
        $data['dsnedit']=$dsnedit;
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar');
        $this->load->view('dosen/update',$data);
        $this->load->view('layout/footer');
    }

    public function delete(){
        $_id= $this->input->get('id');
        $this->load->model('dosen_model','dsn');
        $this->dsn->delete($_id);
        redirect(base_url().'index.php/dosen','refresh');
    }
}
