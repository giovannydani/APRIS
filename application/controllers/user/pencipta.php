<?php 
    
    defined('BASEPATH') OR exit('No direct script access allowed');

    class pencipta extends CI_Controller {
        public function __construct(){
            parent::__construct();
            $this->load->model("m_auth");
            $this->load->model("m_hakcipta");
            $this->load->model("m_helper");
            $this->load->model("m_pencipta");
            $this->load->model("m_validation");
        }        


        public function add(){
            $sess = $this->m_auth->session(array("user"));
            if ($sess === FALSE) {
                redirect(site_url("dashboard/logout"),"refresh");
            } else {
                $post=$this->input->post();
                if ($post==NULL) {
                    redirect(site_url("dashboard/logout"),"refresh");
                }else {
                    $keyI=$this->m_hakcipta->keyI;
                    $keyII=$this->m_hakcipta->keyII;
                    $id=encrypt_decrypt("decrypt", $post['id'], $keyI, $keyII);
                    $dataval=$this->m_validation->valPenciptaHakCipta($post);
                    if ($dataval["status"]==true){
                        $data = array(
                          "idpencipta"=>NULL,
                          "HakCipta_idHakCipta"=> $id,
                          "nama"=>$post['nama'],
                          "kewarganegaraan"=>$post['Kewarganegaraan'],
                          "provinsi"=>$post['Provinsi'],
                          "kota"=>$post['Kabupaten'],
                          "kecamatan"=>$post['Kecamatan'],
                          "alamat"=>$post['Alamat'],
                          "kodepos"=>$post['KodePos']
                        );
                        $dataval = $this->m_pencipta->insertpencipta($data);
                    }
                    echo json_encode($dataval);
                }
            } 
        }

        public function hapus(){
            $sess = $this->m_auth->session(array("user"));
            if ($sess === FALSE) {
                redirect(site_url("dashboard/logout"),"refresh");
            } else {
                $post=$this->input->post();
                if ($post==NULL) {
                    redirect(site_url("dashboard/logout"),"refresh");
                }else {
                    $keyI=$this->m_hakcipta->keyI;
                    $keyII=$this->m_hakcipta->keyII;
                    $id=encrypt_decrypt("decrypt", $post['id'], $keyI, $keyII);
                    $dataval=$this->m_pencipta->hapusPencipta($id);
                    echo $dataval;
                }
            } 
        }

        public function dataPenciptaa(){
            $sess = $this->m_auth->session(array("user","admin","root"));
            if ($sess === FALSE) {
                redirect(site_url("dashboard/logout"),"refresh");
            } else {
                $post=$this->input->post();
                if ($post==NULL) {
                    redirect(site_url("dashboard/logout"),"refresh");
                }else {
                    $keyI=$this->m_hakcipta->keyI;
                    $keyII=$this->m_hakcipta->keyII;
                    $ids=$post['token'];
                    $id=encrypt_decrypt("decrypt", $ids, $keyI, $keyII);
                    $data=$this->m_pencipta->getPencipta($id);
                    foreach ($data as $key => $value) {
                        $data[$key]["idpencipta"] = encrypt_decrypt("encrypt", $value["idpencipta"], $keyI, $keyII);
                    }
                    echo json_encode($data);
                }
            } 
        }

        public function editPencipta(){
            $sess = $this->m_auth->session(array("user"));
            if ($sess === FALSE) {
                redirect(site_url("dashboard/logout"),"refresh");
            } else {
                $post=$this->input->post();
                if ($post==NULL) {
                    redirect(site_url("dashboard/logout"),"refresh");
                }else {
                    $keyI=$this->m_hakcipta->keyI;
                    $keyII=$this->m_hakcipta->keyII;
                    $id=encrypt_decrypt("decrypt", $post['id'], $keyI, $keyII);
                    $data= $this->m_pencipta->dataeditPencipta($id);
                    $data["idpencipta"] = encrypt_decrypt("encrypt", $data["idpencipta"], $keyI, $keyII);
                    $data["HakCipta_idHakCipta"] = encrypt_decrypt("encrypt", $data["HakCipta_idHakCipta"], $keyI, $keyII);
                    echo json_encode($data);
                }
            }
        }

        public function updatePencipta(){
            $sess = $this->m_auth->session(array("user"));
            if ($sess === FALSE) {
                redirect(site_url("dashboard/logout"),"refresh");
            } else {
                $post=$this->input->post();
                if ($post==NULL) {
                    redirect(site_url("dashboard/logout"),"refresh");
                }else {
                    $keyI=$this->m_hakcipta->keyI;
                    $keyII=$this->m_hakcipta->keyII;
                    $id=encrypt_decrypt("decrypt", $post['id'], $keyI, $keyII);
                    $dataval=$this->m_validation->valPenciptaHakCipta($post);
                    if ($dataval["status"]==true){
                        $data = array(
                          "nama"=>$post['nama'],
                          "kewarganegaraan"=>$post['Kewarganegaraan'],
                          "provinsi"=>$post['Provinsi'],
                          "kota"=>$post['Kabupaten'],
                          "kecamatan"=>$post['Kecamatan'],
                          "alamat"=>$post['Alamat'],
                          "kodepos"=>$post['KodePos']
                        );
                        $dataval = $this->m_pencipta->updatepencipta($data,$id);
                    }
                    echo json_encode($dataval);
                }
            } 
        }


    }

?>