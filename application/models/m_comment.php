<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class m_comment extends CI_Model {    

    private $table = "comment_hak_cipta";

    public function __construct(){
        parent::__construct();
    }

    public function comment($id){
        $queryTable="SELECT *
        FROM `comment_hak_cipta`
        WHERE `HakCipta_idHakCipta`=$id
        ORDER BY `tanggalinput` DESC
        ";
        $query = $this->db->query($queryTable)->result_array();
        return $query[0];
    }

    public function add($val){
        $val = $this->security->xss_clean($val);
        $this->db->insert($this->table,$val);
        if($this->db->affected_rows()>0){
            $response=[
                'status' => true,
                'message' => 'Berhasil Menambahkan Comment'
            ];
        }else {
            $response=[
                'status' => false,
                'message' => 'Gagal Menambahkan Comment'
            ];
        }
        return $response;
    }
}
?>