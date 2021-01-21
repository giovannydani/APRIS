<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class m_validation extends CI_Model {
        
        public function valHakCipta($post){
            $errors = "";
            $data = array();
            
            if (empty($post['inputJenisCiptaan']))
                $errors .= '<li>Jenis Ciptaan belum di isi.</li>';

            if (empty($post['inputSubJenisCiptaan']))
                $errors .= '<li>Sub-Jenis Ciptaan belum di isi.</li>';

            if (empty($post['inputJudul']))
                $errors .= '<li>Judul belum di isi.</li>';

            if (empty($post['inputUSC']))
                $errors .= '<li>Uraian Singkat belum di isi.</li>';

            if (empty($post['inputDate']))
                $errors .= '<li>Tanggal Pertama Kali Diumumkan belum di isi.</li>';

            if (empty($post['inputKota']))
                $errors .= '<li>Kota Pertama Kali Diumumkan belum di isi.</li>';

            if ( ! empty($errors)) {
                $data['status'] = false;
                $data['message']  = $errors;
            } else {
                $data['status'] = true;
                $data['message']  = "";
                
            }
            return $data;
        }
        
        public function valPenciptaHakCipta($post){
            $errors = "";
            $data = array();

            if (empty($post['nama']))
                $errors .= '<li>nama belum di isi.</li>';

            if (empty($post['Kewarganegaraan']))
                $errors .= '<li>Kewarganegaraan belum di isi.</li>';

            if ($post['Provinsi']=="-")
                $errors .= '<li>Provinsi belum di isi.</li>';

            if ($post['Kabupaten']=="-")
                $errors .= '<li>Kabupaten belum di isi.</li>';

            if ($post['Kecamatan']=="-")
                $errors .= '<li>Kecamatan belum di isi.</li>';

            if (empty($post['Alamat']))
                $errors .= '<li>Alamat belum di isi.</li>';


            if(!empty($post['KodePos'])){
                if (!is_numeric($post['KodePos'])){
                    $errors .= '<li>Kode Pos Harus berupa Angka.</li>';
                }
            }else {
                $errors .= '<li>Kode Pos belum di isi.</li>';
            }


            if ( ! empty($errors)) {
                $data['status'] = false;
                $data['message']  = $errors;
            } else {
                $data['status'] = true;
            }
            return $data;
        }

        public function valValidation($post){
            $errors = "";
            $data = array();

            if (empty($post['commentsdetail']))
                $errors .= 'kosong';

            if (empty($post['commentspencipta']))
                $errors .= 'kosong';


            if ( ! empty($errors)) {
                $data['status'] = false;
            } else {
                $data['status'] = true;
            }
            return $data;
        }
    }