<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class m_wilayah extends CI_Model {

        public function __construct(){
            parent::__construct();
        }
        


        public function getProv(){
          return $this->db->get("wilayah_provinsi")->result_array();
        }
        
        public function countProv(){
            $query = $this->db->get("wilayah_provinsi");
            return $query->num_rows();
        }
        
        public function getKab($id=NULL){
            if ($id==NULL) {
                return $this->db->get("wilayah_kabupaten")->result_array();
            }else {
                return $this->db->get_where("wilayah_kabupaten",["provinsi_id"=>$id])->result_array();
            }
        }
        
        public function countKab($id){
            $query = $this->db->get_where("wilayah_kabupaten",["provinsi_id"=>$id]);
            return $query->num_rows();
        }
        
        public function getKec($id=NULL){
            if ($id==NULL) {
                return $this->db->get("wilayah_kecamatan")->result_array();
            }else {
                return $this->db->get_where("wilayah_kecamatan",["kabupaten_id"=>$id])->result_array();
            }
        }
        
        public function countKec($id){
            $query = $this->db->get_where("wilayah_kecamatan",["kabupaten_id"=>$id]);
            return $query->num_rows();
        }
    

        
          
          
          
    }
?>