<?php 
    
    defined('BASEPATH') OR exit('No direct script access allowed');

    class hakcipta extends CI_Controller {
        public function __construct(){
            parent::__construct();
            $this->load->model("m_auth");
            $this->load->model("m_hakcipta");
            $this->load->model("m_helper");
            $this->load->model("m_pencipta");
            $this->load->model("m_comment");
            $this->load->model("m_validation");
        }
        
        public function table(){
            $sess = $this->m_auth->session(array("user"));
            if ($sess === FALSE) {
                redirect(site_url("dashboard/logout"),"refresh");
            } else {
            $data['judul']='Tabel Hak Cipta';
            $data["session"] = $sess;
            $data["sidebar"] = "hakcipta";
            $this->load->view('user/hakcipta/table', $data);
            } 
        }
        
        public function tabledata(){
            $sess = $this->m_auth->session(array("user"));
            if ($sess === FALSE) {
                redirect(site_url("dashboard/logout"),"refresh");
            } else {
                $keyI=$this->m_hakcipta->keyI;
                $keyII=$this->m_hakcipta->keyII;
                $data= $this->m_hakcipta->getTableById($sess['id']);
                foreach ($data as $key => $value) {
                    $data[$key]["idHakCipta"] = encrypt_decrypt("encrypt", $value["idHakCipta"], $keyI, $keyII);
                    $data[$key]["tanggalinput"] = $this->m_helper->tglwkt($value["tanggalinput"]);
                }
                echo json_encode($data); 
            }
        }

        public function tabledataselesai(){
            $sess = $this->m_auth->session(array("user"));
            if ($sess === FALSE) {
                redirect(site_url("dashboard/logout"),"refresh");
            } else {
                $keyI=$this->m_hakcipta->keyI;
                $keyII=$this->m_hakcipta->keyII;
                $data= $this->m_hakcipta->getTableSelesai($sess['id']);
                foreach ($data as $key => $value) {
                    $data[$key]["idHakCipta"] = encrypt_decrypt("encrypt", $value["idHakCipta"], $keyI, $keyII);
                    $data[$key]["tanggalinput"] = $this->m_helper->tglwkt($value["tanggalinput"]);
                }
                echo json_encode($data); 
            }
        }
            
            
        public function add(){
            $sess = $this->m_auth->session(array("user"));
            if ($sess === FALSE) {
                redirect(site_url("dashboard/logout"),"refresh");
            } else {
                $id=$sess['id'].date("dmY").rand(1000, 9999);
                if ($this->m_hakcipta->cekId($id)>0) {
                    redirect(site_url("user/hakcipta/add"),"refresh");
                }else {
                    $keyI=$this->m_hakcipta->keyI;
                    $keyII=$this->m_hakcipta->keyII;
                    $data['id']=encrypt_decrypt("encrypt", $id, $keyI, $keyII);
                    $data['judul']='Tambah Hak Cipta';
                    $data["session"] = $sess;
                    $data["sidebar"] = "hakcipta";
                    $this->load->view('user/hakcipta/add', $data);
                }
            } 
        }
        
        public function hapusHakcipta(){
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
                    $ids=$post['id'];
                    $id=encrypt_decrypt("decrypt", $ids, $keyI, $keyII);
                    $this->m_pencipta->hapusPencipta($id);
                    $data= $this->m_hakcipta->hapusHakcipta($id);
                    echo $data;
                }
            } 
        }

        public function addHakCipta(){
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
                    $data=$this->m_validation->valHakCipta($post);
                    if ($this->m_pencipta->totPencipta($id)==0) {
                    $data["status"]=false;
                    $data["message"].="<li>Data Pencipta Belum Di Isi</li>";
                    }
                    if ($data["status"]==true) {
                        date_default_timezone_set('Asia/Jakarta');
                        $dataI= array(
                            "idHakCipta "=>$id,
                            "pemegang_idpemegang"=>1,
                            "account_id "=>$sess['id'],
                            "jenis"=>$post['inputJenisCiptaan'],
                            "judul"=>$post['inputJudul'],
                            "subjenis"=>$post['inputSubJenisCiptaan'],
                            "uraiansingkat"=>$post['inputUSC'],
                            "tanggal"=>date("Y-m-d", strtotime($post['inputDate'])),
                            "kota"=>$post['inputKota'],
                            "status"=>"validasi",
                            "tanggalinput"=>date("Y-m-d H:i:s")
                        );
                        $data=$this->m_hakcipta->insert($dataI);
                    }
                    echo json_encode($data);
                }
            }
        }

        public function detail($encrypt_id=null){
            $sess = $this->m_auth->session(array("user"));
            if ($sess === FALSE) {
                redirect(site_url("dashboard/logout"),"refresh");
            } else {
                if ($encrypt_id != null) {
                    $data['session']=$sess;
                    $data['judul']='Detail';
                    $data["sidebar"] = "hakcipta";
                    $data['encrypt_id']=$encrypt_id;
                    $keyI=$this->m_hakcipta->keyI;
                    $keyII=$this->m_hakcipta->keyII;
                    $id=encrypt_decrypt("decrypt", $encrypt_id, $keyI, $keyII);
                    $data['hc']=$this->m_hakcipta->getById($id);
                    $data['hc']["idHakCipta"] = $encrypt_id;
                    $data['hc']["tanggal"] = $this->m_helper->tgl($data['hc']["tanggal"]);
                    $this->load->view('user/hakcipta/detail',$data);
                }
            }
        }

        public function revisi($encrypt_id=null){
            $sess = $this->m_auth->session(array("user"));
            if ($sess === FALSE) {
                redirect(site_url("dashboard/logout"),"refresh");
            } else {
                if ($encrypt_id != null) {
                    $data['session']=$sess;
                    $data['judul']='Revisi';
                    $data["sidebar"] = "hakcipta";
                    $data['encrypt_id']=$encrypt_id;
                    $keyI=$this->m_hakcipta->keyI;
                    $keyII=$this->m_hakcipta->keyII;
                    $id=encrypt_decrypt("decrypt", $encrypt_id, $keyI, $keyII);
                    $data['hc']=$this->m_hakcipta->getById($id);
                    $data['hc']["idHakCipta"] = $encrypt_id;
                    $data['hc']["pemegang_idpemegang"] = encrypt_decrypt("encrypt", $data['hc']["pemegang_idpemegang"], $keyI, $keyII);
                    $data['comment']=$this->m_comment->comment($id);
                    $this->load->view('user/hakcipta/revisi',$data);
                }
            }
        }

        public function revisiHakCipta(){
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
                    $data=$this->m_validation->valHakCipta($post);
                    if ($this->m_pencipta->totPencipta($id)==0) {
                    $data["status"]=false;
                    $data["message"].="<li>Data Pencipta Belum Di Isi</li>";
                    }
                    if ($data["status"]==true) {
                        date_default_timezone_set('Asia/Jakarta');
                        $dataI= array(
                            "pemegang_idpemegang"=>1,
                            "account_id "=>$sess['id'],
                            "jenis"=>$post['inputJenisCiptaan'],
                            "judul"=>$post['inputJudul'],
                            "subjenis"=>$post['inputSubJenisCiptaan'],
                            "uraiansingkat"=>$post['inputUSC'],
                            "tanggal"=>date("Y-m-d", strtotime($post['inputDate'])),
                            "kota"=>$post['inputKota'],
                            "status"=>"validasi",
                            "tanggalinput"=>date("Y-m-d H:i:s")
                        );
                        $data=$this->m_hakcipta->revisi($dataI,$id);
                    }
                    echo json_encode($data);
                }
            }
        }

    }

?>