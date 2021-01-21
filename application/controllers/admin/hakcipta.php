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
        
        public function tablevalidasi(){
            $sess = $this->m_auth->session(array("root","admin"));
            if ($sess === FALSE) {
                redirect(site_url("dashboard/logout"),"refresh");
            } else {
            $data['judul']='Tabel Validasi Hak Cipta';
            $data["session"] = $sess;
            $data["sidebar"] = "hakcipta";
            $this->load->view('admin/hakcipta/tablevalidasi', $data);
            } 
        }
        public function tableselesai(){
            $sess = $this->m_auth->session(array("root","admin"));
            if ($sess === FALSE) {
                redirect(site_url("dashboard/logout"),"refresh");
            } else {
            $data['judul']='Tabel Selesai Hak Cipta';
            $data["session"] = $sess;
            $data["sidebar"] = "hakcipta";
            $this->load->view('admin/hakcipta/tableselesai', $data);
            } 
        }
        
        public function tabledatavalidasi(){
            $sess = $this->m_auth->session(array("root","admin"));
            if ($sess === FALSE) {
                redirect(site_url("dashboard/logout"),"refresh");
            } else {
                $keyI=$this->m_hakcipta->keyI;
                $keyII=$this->m_hakcipta->keyII;
                $data= $this->m_hakcipta->getTableValidasi();
                foreach ($data as $key => $value) {
                    $data[$key]["idHakCipta"] = encrypt_decrypt("encrypt", $value["idHakCipta"], $keyI, $keyII);
                    $data[$key]["tanggalinput"] = $this->m_helper->tglwkt($value["tanggalinput"]);
                }
                echo json_encode($data); 
            }
        }
        public function tabledataselesai(){
            $sess = $this->m_auth->session(array("root","admin"));
            if ($sess === FALSE) {
                redirect(site_url("dashboard/logout"),"refresh");
            } else {
                $keyI=$this->m_hakcipta->keyI;
                $keyII=$this->m_hakcipta->keyII;
                $data= $this->m_hakcipta->getTableSelesai();
                foreach ($data as $key => $value) {
                    $data[$key]["idHakCipta"] = encrypt_decrypt("encrypt", $value["idHakCipta"], $keyI, $keyII);
                    $data[$key]["tanggalinput"] = $this->m_helper->tglwkt($value["tanggalinput"]);
                }
                echo json_encode($data); 
            }
        }

        public function validasi($encrypt_id=null){
            $sess = $this->m_auth->session(array("root","admin"));
            if ($sess === FALSE) {
                redirect(site_url("dashboard/logout"),"refresh");
            } else {
                if ($encrypt_id != null) {
                    $data['session']=$sess;
                    $data['judul']='validasi';
                    $data["sidebar"] = "hakcipta";
                    $data['encrypt_id']=$encrypt_id;
                    $keyI=$this->m_hakcipta->keyI;
                    $keyII=$this->m_hakcipta->keyII;
                    $id=encrypt_decrypt("decrypt", $encrypt_id, $keyI, $keyII);
                    $data['hc']=$this->m_hakcipta->getById($id);
                    $data['hc']["idHakCipta"] = $encrypt_id;
                    $data['hc']["tanggal"] = $this->m_helper->tgl($data['hc']["tanggal"]);
                    $this->load->view('admin/hakcipta/validasi',$data);
                }
            }
        }

        public function validasiHakCipta(){
            $sess = $this->m_auth->session(array("root","admin"));
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
                    date_default_timezone_set('Asia/Jakarta');
                    if ($post['commentsdetail']=="" && $post['commentspencipta']!="") {
                        $val=array(
                            "idcomment_hak_cipta"=>null,
                            "HakCipta_idHakCipta"=>$id,
                            "Pencipta"=>$post['commentspencipta'],
                            "tanggalinput"=>date("Y-m-d H:i:s")
                        );
                    }elseif ($post['commentsdetail']!="" && $post['commentspencipta']=="") {
                        $val=array(
                            "idcomment_hak_cipta"=>null,
                            "HakCipta_idHakCipta"=>$id,
                            "Detail"=>$post['commentsdetail'],
                            "tanggalinput"=>date("Y-m-d H:i:s")
                        );
                    }elseif ($post['commentsdetail']!="" && $post['commentspencipta']!="") {
                        $val=array(
                            "idcomment_hak_cipta"=>null,
                            "HakCipta_idHakCipta"=>$id,
                            "Detail"=>$post['commentsdetail'],
                            "Pencipta"=>$post['commentspencipta'],
                            "tanggalinput"=>date("Y-m-d H:i:s")
                        );
                    }
                    $this->m_comment->add($val);
                    $data=$this->m_hakcipta->validasi($val);
                    echo json_encode($data);
                }
            }
        }
        
        public function selesaiHakCipta(){
            $sess = $this->m_auth->session(array("root","admin"));
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
                    $val=array(
                        "status"=>"selesai"
                    );
                    $data=$this->m_hakcipta->selesai($val,$id);
                    echo json_encode($data);
                }
            }
        }

        

    }

?>