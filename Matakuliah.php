<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Matakuliah extends CI_Controller {

    public function index(){
        
        $this->load->model('Matakuliah_model','mk');
        $list_mk = $this->mk->getAll();
        $data['list_mk'] = $list_mk;
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar');
        $this->load->view('matakuliah/index',$data);
        $this->load->view('layout/footer');


        //$this->load->model('matakuliah_model','mk1');
        //$this->mk1->id=1;
        //$this->mk1->kode="0341";
        //$this->mk1->nama="Pemrograman web 2";
        //$this->mk1->sks=3;

        //$this->load->model('matakuliah_model','mk2');
        //$this->mk2->id=2;
        //$this->mk2->kode="0342";
       //$this->mk2->nama="Basis Data";
        //$this->mk2->sks=3;
    
       // $list_mk = [$this->mk1,$this->mk2];

        //$data['matakuliah']=$this->mk1;

        $this->load->model('matakuliah_model','mk');
        $data['list_matkul']=$this->mk->getAll();

        $this->load->view('layout/header');
        $this->load->view('layout/sidebar');
        $this->load->view('matakuliah/index',$data);
        $this->load->view('layout/footer');
    }

    public function create(){

        $data['Judul']="Form Kelola Matakuliah";
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar');
        $this->load->view('matakuliah/create',$data);
        $this->load->view('layout/footer');
    }

    public function view(){
        $_kode = $this->input->get('id');
        $this->load->model('matakuliah_model','mk');
        $data['mk']=$this->mk->findById($_kode);

        $this->load->view('layout/header');
        $this->load->view('layout/sidebar');
        $this->load->view('matakuliah/view',$data);
        $this->load->view('layout/footer');

    }

    public function save(){

        $this->load->model('matakuliah_model','mk');

        $_kode = $this->mk->kode =$this->input->post('kode');
        $_nama = $this->mk->nama =$this->input->post('nama');
        $_sks = $this->mk->sks =$this->input->post('sks');
        $_idedit = $this->input->post('idedit');//hidden field

        $data_mk[]=$_kode;
        $data_mk[]=$_nama;
        $data_mk[]=$_sks;
        

        if(isset($_idedit)){
            //update data lama

            $data_mk[]=$_idedit;
            $this->mk->update($data_mk);
        }else{
            //save data baru
            $this->mk->save($data_mk);
        }
        //panggil fungsi save
        

        redirect(base_url().'index.php/matakuliah/view?id='.$_kode,'refresh');
    }

    public function edit(){
        $_id= $this->input->get('id');
        $this->load->model('matakuliah_model','mk');
        $mkedit = $this->mk->findById($_id);

        $data['Judul']="Form Kelola Matakuliah";
        $data['mkedit']=$mkedit;
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar');
        $this->load->view('matakuliah/update',$data);
        $this->load->view('layout/footer');
    }

    public function delete(){
        $_id= $this->input->get('id');
        $this->load->model('matakuliah_model','mk');
        $this->mk->delete($_id);
        redirect(base_url().'index.php/matakuliah','refresh');
    }
    
}