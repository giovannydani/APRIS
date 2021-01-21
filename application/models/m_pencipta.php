<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class m_pencipta extends CI_Model {
    private $table = "pencipta";
  
  public function __construct(){
      parent::__construct();
  }

  public function rules(){
    return array(
      array(  'field' => '_username_',
              'label' => 'Username',
              'rules' => 'required|trim|alpha_numeric|min_length[4]|max_length[12]'),

      array(  'field' => '_password_',
              'label' => 'Password',
              'rules' => 'required|trim|alpha_numeric|min_length[4]|max_length[20]'),
    );
  }

  public function hapusAllPencipta($id){
    $this->db->delete($this->table, array('HakCipta_idHakCipta' => $id));
    if($this->db->affected_rows()>0){
      $response=[
        'status' => true,
        'message' => 'Data Terhapus'
      ];
    }else {
      $response=[
        'status' => false,
        'message' => 'Data Gagal Terhapus'
      ];
    }
    $data=json_encode($response);
    return $data;
  }

  public function getPencipta($id){
    return $this->db->get_where($this->table, array('HakCipta_idHakCipta' => $id))->result_array();
  }

  public function insertpencipta($data){
    $data = $this->security->xss_clean($data);
    $this->db->insert($this->table,$data);
    if($this->db->affected_rows()>0){
      $response=[
        'status' => true,
        'message' => 'Menambah Pencipta'
      ];
    }else {
      $response=[
        'status' => false,
        'message' => 'Gagal Menambah Pencipta'
      ];
    }
    $data= $response;
    return $data;
  }

  public function hapusPencipta($id){
    $this->db->delete($this->table,['idpencipta'=>$id]);
    if($this->db->affected_rows()>0){
      $response=[
        'status' => true,
        'message' => 'Data Terhapus'
      ];
    }else {
      $response=[
        'status' => false,
        'message' => 'Data Gagal Terhapus'
      ];
    }
    $data=json_encode($response);
    return $data;
  }

  public function dataeditPencipta($id){
    return $this->db->get_where($this->table,['idpencipta'=>$id])->row_array();
  }

  public function updatepencipta($data,$id){
    $this->db->where("idpencipta", $id);
    $this->db->update($this->table,$data);
    if($this->db->affected_rows()>0){
      $response=[
        'status' => true,
        'message' => 'Update Pencipta'
      ];
    }else {
      $response=[
        'status' => false,
        'message' => 'Gagal Update Pencipta'
      ];
    }
    $data= $response;
    return $data;
  }
  
  public function totPencipta($id){
    return $this->db->get_where($this->table,['HakCipta_idHakCipta'=>$id])->num_rows();
  }

}
?>