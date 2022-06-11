<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prodi extends CI_Controller {

    public function index(){
        $this->load->model('prodi_model','pr');
        $list_pr = $this->pr->getAll();
        $data['list_pr'] = $list_pr;
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar');
        $this->load->view('prodi/index',$data);
        $this->load->view('layout/footer');
    }

    public function create(){
        $data['Title']='Form Kelola Program Studi';
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar');
        $this->load->view('prodi/create',$data);
        $this->load->view('layout/footer');

    }

    public function view(){

        $_kode = $this->input->get('id');
        $this->load->model('prodi_model','pr');
        $data['pr']=$this->pr->findById($_kode);

        $this->load->view('layout/header');
        $this->load->view('layout/sidebar');
        $this->load->view('prodi/view',$data);
        $this->load->view('layout/footer');

    }
    public function save(){

        $this->load->model('prodi_model','pr');

        $_kode = $this->pr->kode =$this->input->post('kode');
        $_nama = $this->pr->nama =$this->input->post('nama');
        $_kaprodi = $this->pr->kaprodi =$this->input->post('kaprodi');
        $_idedit = $this->input->post('idedit');//hidden field

        $data_pr[]=$_kode;
        $data_pr[]=$_nama;
        $data_pr[]=$_kaprodi;
        

        if(isset($_idedit)){
            //update data lama

            $data_pr[]=$_idedit;
            $this->pr->update($data_pr);
        }else{
            //save data baru
            $this->pr->save($data_pr);
        }
        //panggil fungsi save
        

        redirect(base_url().'index.php/prodi/view?id='.$_kode,'refresh');
        
       // die(print_r($this->mhs1));
       //$data['mhs']=$this->mhs;
        //$this->load->view('layout/header');
        //$this->load->view('layout/sidebar');
        //$this->load->view('mahasiswa/view',$data);
        //$this->load->view('layout/footer');
    }

    public function edit(){
        $_id= $this->input->get('id');
        $this->load->model('prodi_model','pr');
        $predit = $this->pr->findById($_id);

        $data['Title']="Form Kelola Program Studi";
        $data['predit']=$predit;
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar');
        $this->load->view('prodi/update',$data);
        $this->load->view('layout/footer');
    }

    public function delete(){
        $_id= $this->input->get('id');
        $this->load->model('prodi_model','pr');
        $this->pr->delete($_id);
        redirect(base_url().'index.php/prodi','refresh');
    }

}