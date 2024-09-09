<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\M_aplikasi;
use CodeIgniter\I18n\Time;
class Home extends BaseController
{
	public function index()
	{
		return view('header');
		return view('menu');
		return view('index');
		return view('footer');
	}
	 public function login()
    {
        return view('login');
    }

    public function aksi_login()
    {
        $session = session();
        $model = new M_aplikasi();
        
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $where = [
            'username'   => $username,
            'password'  => $password
        ];

        // Mencari user berdasarkan username di database 'aplikasi' tabel 'user'
        $data = $model->getWhere('user', $where);
        
           $pass = $data['password'];
    if ($password === $pass) {  // Menggunakan perbandingan biasa untuk teks biasa
        $ses_data = [
            'id_user'   => $data['id_user'],
            'username'  => $data['username'],
            'level'  => $data['level'],
            'logged_in' => TRUE
        ];
        $session->set($ses_data);
        return redirect()->to('/home/index');
    } else {
        $session->setFlashdata('msg', 'Password salah');
        return redirect()->to('/login');
    }


    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/login');
    }
   public function dashboard()
	{
		 if(session()->get('level')>0) {
        $this->log_activity('User membuka Dashboard'); ///log akt
		 $model = new M_aplikasi();
         $where = array('id_user' => 2);
         $data['setting'] = $model->getwhere('dashboard',$where); 
		
        //  $data['setting'] = $model->getWhere('toko', $where);
		echo view('header',$data);
        echo view('menu', $data);
        echo view('dashboard');
        echo view('footer');

     }else{
     	return redirect()->to('home/login');
}
}
 public function datakegiatan() 
{
    if(session()->get('level') > 0) { 
        $model = new M_Aplikasi();
        $data['manda'] = $model->tampil('mskdata'); // Mengambil data dari model

        echo view('header', $data);
        echo view('datakegiatan', $data);
    } else {
        return redirect()->to('home/login');
    }
}
public function laporanharian()
    {
        if (session()->get('level') > 0) { 
            $model = new M_Aplikasi();
            $data['manda'] = $model->tampilLaporanHarian(); // Mengambil data laporan harian

            echo view('header', $data);
            echo view('laporanharian', $data);
        } else {
            return redirect()->to('home/login');
        }
    }
 public function mskdata() 
    {
        if (session()->get('level') > 0) { 
            $model = new M_Aplikasi();
            $data['manda'] = $model->tampil('mskdata'); 

            echo view('header', $data);
            echo view('mskdata', $data);
        } else {
            return redirect()->to('home/login');
        }
    }

    public function simpandata() 
    {
        if ($this->request->getMethod() === 'post') {
            $model = new M_Aplikasi();

            $data = [
                'kegiatan' => $this->request->getPost('kegiatan'),
                'tgl_kegiatan' => $this->request->getPost('tgl_kegiatan'),
                'situasi_kegiatan' => $this->request->getPost('situasi_kegiatan'),
                'tempat_kegiatan' => $this->request->getPost('tempat_kegiatan'),
                'penyelenggara' => $this->request->getPost('penyelenggara'),
                'keterangan' => $this->request->getPost('keterangan'),
                'jam_mulai' => $this->request->getPost('jam_mulai'),
                'jam_selesai' => $this->request->getPost('jam_selesai'),
                'dana_keluar' => $this->request->getPost('dana_keluar')
            ];

            $model->insert($data); // Menyimpan data ke database

            return redirect()->to('/mskdata')->with('status', 'Data berhasil dikirim!');
        }
    }
}
