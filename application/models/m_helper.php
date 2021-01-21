<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class m_helper extends CI_Model {
    
    public function tgl($tgl){
        $datee=$tgl;
        $tahun= substr($datee, 0, 4);
        $bulan= substr($datee, 5, 2);
        $tgl= substr($datee, 8, 2);
        $namabulan=[
            "01"=>"Januari",
            "02"=>"Februari",
            "03"=>"Maret",
            "04"=>"April",
            "05"=>"Mei",
            "06"=>"Juni",
            "07"=>"Juli",
            "08"=>"Agustus",
            "09"=>"September",
            "10"=>"Oktober",
            "11"=>"November",
            "12"=>"Desember"
        ];
        $hasil=$tgl." ".$namabulan[$bulan]." ".$tahun; 
        return $hasil;
        
    }
    
    
    public function tglwkt($tgl){
        $datee=$tgl;
        $tahun= substr($datee, 0, 4);
        $bulan= substr($datee, 5, 2);
        $tgl= substr($datee, 8, 2);
        $jam=substr($datee, 11, 8);
        $namabulan=[
            "01"=>"Januari",
            "02"=>"Februari",
            "03"=>"Maret",
            "04"=>"April",
            "05"=>"Mei",
            "06"=>"Juni",
            "07"=>"Juli",
            "08"=>"Agustus",
            "09"=>"September",
            "10"=>"Oktober",
            "11"=>"November",
            "12"=>"Desember"
        ];
        $hasil=$tgl." ".$namabulan[$bulan]." ".$tahun."</br>".$jam; 
        return $hasil;   
    }    

}
?>