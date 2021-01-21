<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class m_hakcipta extends CI_Model {
    private $table = "hakcipta";
    public $keyI="HaKcIpTaGtY";
    public $keyII="PrOjEcTg";
  
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

  public function getTable(){
    $queryTable="SELECT `hakcipta`.`idHakCipta`, `account`.`account_name`, `hakcipta`.`judul`, `hakcipta`.`tanggalinput` ,`hakcipta`.`status`
    FROM `hakcipta`, `pemegang`, `account` 
    WHERE `hakcipta`.`account_id`=`account`.`account_id` 
    AND `hakcipta`.`pemegang_idpemegang`=`pemegang`.`idpemegang`
    ORDER BY `hakcipta`.`tanggalinput`
    ";
    return $this->db->query($queryTable)->result_array();
  }

  public function getTableById($id){
    $queryTable="SELECT `hakcipta`.`idHakCipta`, `account`.`account_name`, `hakcipta`.`judul`, `hakcipta`.`tanggalinput` ,`hakcipta`.`status`
    FROM `hakcipta`, `pemegang`, `account` 
    WHERE `hakcipta`.`account_id`=`account`.`account_id` 
    AND `hakcipta`.`account_id`=$id
    AND `hakcipta`.`pemegang_idpemegang`=`pemegang`.`idpemegang`
    AND `hakcipta`.`status` NOT IN ('selesai')
    ORDER BY `hakcipta`.`tanggalinput`
    ";
    return $this->db->query($queryTable)->result_array();
  }

  public function hapusHakcipta($id){
    $this->db->delete($this->table, array('idHakCipta' => $id));
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

  public function cekId($id){
    return $this->db->get_where($this->table, array('idHakCipta' => $id))->num_rows();
  }

  public function insert($data){
    $data = $this->security->xss_clean($data);
    $this->db->insert($this->table,$data);
    if($this->db->affected_rows()>0){
      $response=[
        'status' => true,
        'message' => 'Data Berhasil Ditambahkan'
      ];
    }else {
      $response=[
        'status' => false,
        'message' => 'Data Gagal Ditambahkan'
      ];
    }
    return $response;
  }

  public function getById($id){
    return $this->db->get_where($this->table, ["idHakCipta" => $id] )->row_array();
  }

  public function revisi($data,$id){
    $post=$this->input->post();

    $data = $this->security->xss_clean($data);
    $this->db->where('idHakCipta', $id);
    $this->db->update("hakcipta",$data);
    if($this->db->affected_rows()>0){
      $response=[
        'status' => true,
        'message' => 'Berhasil Merevisi'
      ];
    }else {
      $response=[
        'status' => false,
        'message' => 'Gagal Merevisi'
      ];
    }
    return $response;
  }

  public function getTableValidasi(){
    $this->db->select('idHakCipta, judul, tanggalinput, status');
    $this->db->order_by('tanggalinput', 'ASC');
    return $this->db->get_where($this->table,array("status"=>"validasi"))->result_array();
  }
  public function getTableSelesai($id_account=null){
    $this->db->select('idHakCipta, judul, tanggalinput, status');
    $this->db->order_by('tanggalinput', 'ASC');
    if ($id_account==null) {
      # code...
      return $this->db->get_where($this->table,array("status"=>"selesai"))->result_array();
    }else {
      return $this->db->get_where($this->table,array("status"=>"selesai","account_id"=>$id_account))->result_array();
    }
  }

  public function validasi($val){
    $data = array(
      "status"=>"revisi"
    );
    $this->db->where('idHakCipta', $val['HakCipta_idHakCipta']);
    $this->db->update($this->table,$data);
    if($this->db->affected_rows()>0){
      $response=[
        'status' => true,
        'message' => 'Berhasil Memvalidasi'
      ];
    }else {
      $response=[
        'status' => false,
        'message' => 'Gagal Memvalidasi'
      ];
    }
    return $response;
  }
  
  public function selesai($data,$id){
    $this->db->where('idHakCipta', $id);
    $this->db->update($this->table,$data);
    if($this->db->affected_rows()>0){
      $response=[
        'status' => true,
        'message' => 'Berhasil Menyelesaikan Data'
      ];
    }else {
      $response=[
        'status' => false,
        'message' => 'Gagal Menyelesaikan Data'
      ];
    }
    return $response;
  }

}
?>