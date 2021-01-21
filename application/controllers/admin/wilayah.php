<?php 
    
    defined('BASEPATH') OR exit('No direct script access allowed');

    class wilayah extends CI_Controller {
        public function __construct(){
            parent::__construct();
            $this->load->model("m_auth");
            $this->load->model("m_wilayah");
        }
        
        public function dataProv(){
            $sess = $this->m_auth->session(array("root","admin","user"));
            if ($sess === FALSE) {
              redirect(site_url("dashboard/logout"),"refresh");
            } else {
            $data= $this->m_wilayah->getProv();
            $opt="<option value=''>-</option>";
            foreach ($data as $key => $value) {
                $opt .="<option value='".$value['id']."'>".$value['nama']."</option>";
            }
            echo json_encode($opt);
            }
        }
        
        public function dataKab(){
            $sess = $this->m_auth->session(array("root","admin","user"));
            if ($sess === FALSE) {
              redirect(site_url("dashboard/logout"),"refresh");
            } else {
            $id=$this->input->post('id');
            $data= $this->m_wilayah->getKab($id);
            $jml= $this->m_wilayah->countKab($id);
            $opt="<option value=''>-</option>";
            foreach ($data as $key => $value) {
                $opt .="<option value='".$value['id']."'>".$value['nama']."</option>";
            }
            echo json_encode($opt);
            }
        }
        
        public function dataKec(){
            $sess = $this->m_auth->session(array("root","admin","user"));
            if ($sess === FALSE) {
              redirect(site_url("dashboard/logout"),"refresh");
            } else {
            $id=$this->input->post('id');
            $data= $this->m_wilayah->getKec($id);
            $opt="<option value=''>-</option>";
            foreach ($data as $key => $value) {
                $opt .="<option value='".$value['id']."'>".$value['nama']."</option>";
            }
            echo json_encode($opt);
            }
        }
    }

?>