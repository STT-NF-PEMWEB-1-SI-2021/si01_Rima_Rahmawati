<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa extends CI_Controller {

    public function index(){

        $this->load->model('Mahasiswa_model','mhs');
        $list_mhs = $this->mhs->getAll();
        $data['list_mhs'] = $list_mhs;
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar');
        $this->load->view('mahasiswa/index',$data);
        $this->load->view('layout/footer');

        //$this->load->model('mahasiswa_model','mhs1');
       //$this->mhs1->id=1;
        //$this->mhs1->nim="08912";
        //$this->mhs1->nama="muhammad Farhan";
        //$this->mhs1->tmp_lahir="Bogor";
        //$this->mhs1->tgl_lahir="2001-08-01";
        //$this->mhs1->gender="L";
        //$this->mhs1->prodi="Sistem Infromasi";
        //$this->mhs1->ipk = 3.81;

       // $this->load->model('mahasiswa_model','mhs2');
        //$this->mhs2->id=1;
        //$this->mhs2->nim="08712";
        //$this->mhs2->nama="Nabilah Husna";
        //$this->mhs2->tmp_lahir="Jakarta";
        //$this->mhs2->tgl_lahir="2002-03-01";
        //$this->mhs2->gender="P";
        //$this->mhs2->prodi="Teknik Infromatika";
        //$this->mhs2->ipk = 3.91;

        //$list_mhs = [$this->mhs1,$this->mhs2];

       // $data['mahasiswa']=$this->mhs1;
       // $data['list_mahasiswa']=$list_mhs;

       $this->load->model('mahasiswa_model','mhs');

       $data['list_mhs']=$this->mhs->getAll();

       $this->load->view('layout/header');
       $this->load->view('layout/sidebar');
       $this->load->view('mahasiswa/index',$data);
       $this->load->view('layout/footer');
    }

    public function create(){

        $data['judul']="Form Kelola Mahasiswa";
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar');
        $this->load->view('mahasiswa/create',$data);
        $this->load->view('layout/footer');
    }

    public function view(){

        $_nim = $this->input->get('id');
        $this->load->model('mahasiswa_model','mhs');
        $data['mhs']=$this->mhs->findById($_nim);

        $this->load->view('layout/header');
        $this->load->view('layout/sidebar');
        $this->load->view('mahasiswa/view',$data);
        $this->load->view('layout/footer');

    }

    public function save(){

        $this->load->model('mahasiswa_model','mhs');

        $_nim = $this->mhs->nim =$this->input->post('nim');
        $_nama = $this->mhs->nama =$this->input->post('nama');
        $_gender = $this->mhs->gender =$this->input->post('gender');
        $_tmp_lahir = $this->mhs->tmp_lahir =$this->input->post('tmp_lahir');
        $_tgl_lahir = $this->mhs->tgl_lahir =$this->input->post('tgl_lahir');
        $_prodi_kode = $this->mhs->prodi_kode =$this->input->post('prodi_kode');
        $_ipk = $this->mhs->ipk =$this->input->post('ipk');
        $_idedit = $this->input->post('idedit');//hidden field

        $data_mhs[]=$_nim;
        $data_mhs[]=$_nama;
        $data_mhs[]=$_gender;
        $data_mhs[]=$_tmp_lahir;
        $data_mhs[]=$_tgl_lahir;
        $data_mhs[]=$_prodi_kode;
        $data_mhs[]=$_ipk;
        

        if(isset($_idedit)){
            //update data lama

            $data_mhs[]=$_idedit;
            $this->mhs->update($data_mhs);
        }else{
            //save data baru
            $this->mhs->save($data_mhs);
        }
        //panggil fungsi save
        

        redirect(base_url().'index.php/mahasiswa/view?id='.$_nim,'refresh');
        
       // die(print_r($this->mhs1));
       //$data['mhs']=$this->mhs;
        //$this->load->view('layout/header');
        //$this->load->view('layout/sidebar');
        //$this->load->view('mahasiswa/view',$data);
        //$this->load->view('layout/footer');
    }

    public function edit(){
        $_id= $this->input->get('id');
        $this->load->model('mahasiswa_model','mhs');
        $mhsedit = $this->mhs->findById($_id);

        $data['judul']="Form Update Mahasiswa";
        $data['mhsedit']=$mhsedit;
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar');
        $this->load->view('mahasiswa/update',$data);
        $this->load->view('layout/footer');
    }

    public function delete(){
        $_id= $this->input->get('id');
        $this->load->model('mahasiswa_model','mhs');
        $this->mhs->delete($_id);
        redirect(base_url().'index.php/mahasiswa','refresh');
    }
}
?>