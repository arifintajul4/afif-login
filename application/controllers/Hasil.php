<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Hasil extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('email')) {
            redirect('auth');
        }
    }

    public function index()
    {
        $data['tittle'] = 'Hasil Topsis';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['alternatif'] = $this->Alternatif_models->getAllAlternatif();

        $this->_idealPositif();
        $this->_idealNegatif();
        $this->_hitung();

        $data['preferensi'] = $this->Preferensi_models->getAllPreferensi();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/hasil_topsis', $data);
        $this->load->view('templates/footer');
        $this->Preferensi_models->hapusNilaiPreferensi();
    }

    private function _hitung()
    {
        $data['alternatif'] = $this->Alternatif_models->getAllAlternatif();

        $i=1;
        foreach ($data['alternatif'] as $alt) {
            $id_alt = $alt['id'];

            $n=$this->Matriks_models->getNilaiByAlternatif($id_alt);
            $c=0;
            $ymax=array();
            
            foreach ($n as $dn) {
                $idk=$dn['id_kriteria'];
                //nilai kuadrat
                $nilai_kuadrat = 0;
                $k=$this->Matriks_models->getNilaiByKriteria($idk);

                foreach ($k as $dkuadrat) {
                    $nilai_kuadrat=$nilai_kuadrat+($dkuadrat['nilai']*$dkuadrat['nilai']);
                }

                //hitung jumlah alternatif
                $jml_a = $this->Alternatif_models->jumlahAlternatif();
                $bobot=0;
                $tnilai=0;

                $k2=$this->Matriks_models->getNilaiByKriteria($idk);
                foreach ($k2 as $dbobot) {
                    $tnilai=$tnilai+$dbobot['nilai'];
                }
                $bobot=$tnilai/$jml_a;

                //nilai bobot input
                $nbot=$this->Kriteria_models->getKriteriaById($idk);

                $bot=$nbot->bobot;

                $v=round(($dn['nilai']/sqrt($nilai_kuadrat))*$bot,3);

                $ymax[$c]=$v;
                $c++;
                $mak=max($ymax);
                $min=min($ymax);
            } 
            $i++;
        }

        foreach($_SESSION['dplus'] as $key=>$dxmin){
            $jarakm=$_SESSION['dmin'][$key];
            $id_alt=$_SESSION['id_alt'][$key];
            
            //nama alternatif
            $nm =$this->Alternatif_models->getAlternatifById($id_alt);

            $nilaid=$jarakm/($jarakm+$dxmin);
            
            $nilai=round($nilaid,4);
            
            //simpan ke tabel nilai preferensi
            $nm=$nm->nama_alternatif;
            $this->Preferensi_models->storeNilaiPreferensi($nm,$nilai);
        }
    }

    private function _idealPositif()
    {
        $i2=1;
        $i3=0;
        $maxarray=array();
        $a2=$this->Kriteria_models->getAllKriteria();

        foreach ($a2 as $da2) {
            $idalt2=$da2['id'];
            //ambil nilai
            $n2=$this->Matriks_models->getNilaiByKriteria($idalt2);
            $jarakp2=0;
            $c2=0;
            $ymax2=array();

            foreach ($n2 as $dn2) {
                $idk2=$dn2['id_kriteria'];
                
                //nilai kuadrat
                $nilai_kuadrat2=0;
                $k2=$this->Matriks_models->getNilaiByKriteria($idk2);

                foreach ($k2 as $dkuadrat2) {
                    $nilai_kuadrat2=$nilai_kuadrat2+($dkuadrat2['nilai']*$dkuadrat2['nilai']);
                }

                //hitung jml alternatif
                $jml_a2=$this->Alternatif_models->jumlahAlternatif();
                //nilai bobot kriteria (rata")
                $bobot2=0;
                $tnilai2=0;

                $k2=$this->Matriks_models->getNilaiByKriteria($idk2);
                foreach ($k2 as $dbobot2) {
                    $tnilai2=$tnilai2+$dbobot2['nilai'];
                }

                $bobot2=$tnilai2/$jml_a2;
                //nilai bobot input
                $nbot2=$this->Kriteria_models->getKriteriaById($idk2);
                $bot2=$nbot2->bobot;

                $v2=round(($dn2['nilai']/sqrt($nilai_kuadrat2))*$bot2,3);

                $ymax2[$c2]=$v2;
                $c2++;
                $mak2=max($ymax2);

            }

            //hitung D+         
            foreach($ymax2 as $nymax2){
                
                $jarakp2=$jarakp2+pow($nymax2-$mak2,2);
                
            }
                
            //array max
            $maxarray[$i3]=max($ymax2);
                    
            //print_r($maxarray);
            //print_r(max($ymax2));         
            $i2++;
            $i3++;
        }

        //session array ymax
        $_SESSION['ymax']=$maxarray;

        $i=1;
        $ii=0;
        $dpreferensi=array();

        $a=$this->Alternatif_models->getAllAlternatif();

        foreach ($a as $da) {
            $idalt=$da['id'];

            $n=$this->Matriks_models->getNilaiByAlternatif($idalt);
            $jarakp=0;
            $c=0;
            $ymax=array();
            $arraymaks=array();

            foreach ($n as $dn) {
                $idk=$dn['id_kriteria'];
                    
                //nilai kuadrat         
                $nilai_kuadrat=0;
                $k=$this->Matriks_models->getNilaiByKriteria($idk);
                foreach ($k as $dkuadrat) {
                    $nilai_kuadrat=$nilai_kuadrat+($dkuadrat['nilai']*$dkuadrat['nilai']);
                }

                $jml_a=$this->Alternatif_models->jumlahAlternatif();
                //nilai bobot kriteria (rata")
                $bobot=0;
                $tnilai=0;

                $k2=$this->Matriks_models->getNilaiByKriteria($idk);
                foreach ($k2 as $dbobot) {
                    $tnilai=$tnilai+$dbobot['nilai'];
                }

                $bobot=$tnilai/$jml_a;
            
                //nilai bobot input
                $nbot=$this->Kriteria_models->getKriteriaById($idk);
                $bot=$nbot->bobot;

                $v=round(($dn['nilai']/sqrt($nilai_kuadrat))*$bot,3);

                $ymax[$c]=$v;
                $c++;
                $mak=max($ymax);

            }

            foreach($ymax as $nymax=>$value){
                $maks=$_SESSION['ymax'][$nymax];
                //echo $maks." - ";
                $final=sqrt($jarakp=$jarakp+pow($value-$maks,2));
                //echo $jarakp." || ";
            }

            $dpreferensi[$ii]=round($final,3);
            $_SESSION['dplus']=$dpreferensi;        
            //print_r($ymax);
        
            $i++;
            $ii++;

        }
    }

    private function _idealNegatif()
    {
        $i2=1;
        $i3=0;
        $minarray=array();
        $a2=$this->Kriteria_models->getAllKriteria();

        foreach ($a2 as $da2) {
            $idalt2=$da2['id'];
            
            //ambil nilai
            $n2=$this->Matriks_models->getNilaiByKriteria($idalt2);
            $jarakp2=0;
            $c2=0;
            $ymax2=array();

            foreach ($n2 as $dn2) {
                $idk2=$dn2['id_kriteria'];
                
                //nilai kuadrat
                $nilai_kuadrat2=0;
                $k2=$this->Matriks_models->getNilaiByKriteria($idk2);

                foreach ($k2 as $dkuadrat2) {
                    $nilai_kuadrat2=$nilai_kuadrat2+($dkuadrat2['nilai']*$dkuadrat2['nilai']);
                }

                //hitung jml alternatif
                $jml_a2=$this->Alternatif_models->jumlahAlternatif();
                //nilai bobot kriteria (rata")
                $bobot2=0;
                $tnilai2=0;

                $k22=$this->Matriks_models->getNilaiByKriteria($idk2);
                foreach ($k22 as $dbobot2) {
                    $tnilai2=$tnilai2+$dbobot2['nilai'];
                }
                $bobot2=$tnilai2/$jml_a2;

                //nilai bobot input
                $nbot2=$this->Kriteria_models->getKriteriaById($idk2);
                $bot2=$nbot2->bobot;

                $v2=round(($dn2['nilai']/sqrt($nilai_kuadrat2))*$bot2,3);

                $ymin2[$c2]=$v2;
                $c2++;
                $min2=min($ymin2);

            }

            //hitung D+         
            foreach($ymin2 as $nymin2){
                
                $jarakp2=$jarakp2+pow($nymin2-$min2,2);
                
            }
                
            //array min
            $minarray[$i3]=min($ymin2);
                    
            //print_r($minarray);
            //print_r(min($ymin2));         
            $i2++;
            $i3++;
        }

        //session array ymin
        $_SESSION['ymin']=$minarray;

        $i=1;
        $ii=0;
        $dpreferensi=array();

        $a=$this->Alternatif_models->getAllAlternatif();

        foreach ($a as $da) {
            $idalt=$da['id'];

            $n=$this->Matriks_models->getNilaiByAlternatif($idalt);
            $jarakp=0;
            $c=0;
            $ymax=array();
            $arraymin=array();

            foreach ($n as $dn) {
                $idk=$dn['id_kriteria'];
                    
                //nilai kuadrat         
                $nilai_kuadrat=0;
                $k=$this->Matriks_models->getNilaiByKriteria($idk);
                foreach ($k as $dkuadrat) {
                    $nilai_kuadrat=$nilai_kuadrat+($dkuadrat['nilai']*$dkuadrat['nilai']);
                }

                $jml_a=$this->Alternatif_models->jumlahAlternatif();
                //nilai bobot kriteria (rata")
                $bobot=0;
                $tnilai=0;

                $k2=$this->Matriks_models->getNilaiByKriteria($idk);
                foreach ($k2 as $dbobot) {
                    $tnilai=$tnilai+$dbobot['nilai'];
                }

                $bobot=$tnilai/$jml_a;
            
                //nilai bobot input
                $nbot=$this->Kriteria_models->getKriteriaById($idk);
                $bot=$nbot->bobot;

                $v=round(($dn['nilai']/sqrt($nilai_kuadrat))*$bot,3);

                $ymin[$c]=$v;
                $c++;
                $min=max($ymin);

            }

            //hitung D+
            foreach($ymin as $nymin=>$value){
                $mins=$_SESSION['ymin'][$nymin];
            // echo $mins." - ";
                $final=sqrt($jarakp=$jarakp+pow($value-$mins,2));
            // echo $jarakp." || ";

            }

            //session min
            $dpreferensi[$ii]=round($final,3);
            $_SESSION['dmin']=$dpreferensi; 
            //print_r($ymin);

            //ambil id alternatif
            $id_alt[$ii]=$da['id'];
            $_SESSION['id_alt']=$id_alt;    
            
            $i++;
            $ii++;

        }
    }
}
