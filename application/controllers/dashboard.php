<?php 
    
    defined('BASEPATH') OR exit('No direct script access allowed');

    class dashboard extends CI_Controller {
        public function __construct(){
            parent::__construct();
            $this->load->model("m_auth");
        }

        public function index(){
            $sess = $this->m_auth->session(array("root","admin","user"));
            if ($sess === FALSE) {
              $data = array();
              $this->form_validation->set_rules($this->m_auth->rules());
        
              if ($this->form_validation->run() === TRUE) {
                $login = $this->m_auth->login();
                if ($login["status"] == "success") {
                  redirect(site_url("dashboard/home"),"refresh");
                } else {
                  $this->session->set_flashdata("notif", $login);
                  redirect(site_url("dashboard"),"refresh");
                }
        
              } else {
                $data["notif"] = array("status" => "error", "message" => str_replace("\n", "", validation_errors('<li>','</li>')));
                if ($this->session->flashdata('notif')) {
                  $data['notif'] = $this->session->flashdata('notif');
                }
                $data['judul']='Login';
                $this->load->view('admin/dashboard/login.php', $data); 
              }
        
            } else {
              redirect(site_url("dashboard/home"),"refresh");
            }
          }
        
          public function home(){
            $sess = $this->m_auth->session(array("root","admin","user"));
            if ($sess === FALSE) {
              redirect(site_url("dashboard/logout"),"refresh");
            } else {
            $data['judul']='Dashboard';
            $data['sesss']=$this->session->userdata();
            $data["session"] = $sess;
            $data["sidebar"] = "dashboard";
            $this->load->view('admin/dashboard/home', $data);
            } 
          }
        
          public function logout(){
            $this->m_auth->logout();
          }
    }
?>