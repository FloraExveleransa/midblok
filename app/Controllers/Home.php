<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\M_aplikasi;
use CodeIgniter\I18n\Time;
class Home extends BaseController
{
    private function log_activity($activity)
    {
        $model = new M_aplikasi();
        $data = [
            'id_user'    => session()->get('id_user'),
            'activity'   => $activity,
            'timestamp' => date('Y-m-d H:i:s'),
            'deleted' => ''
        ];

        $model->tambah('activity', $data);
    }

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
    public function hs_login()
    {
        
        $model = new M_aplikasi();
        
        // Mengambil semua data riwayat login dari tabel hs_login
        $data['activity'] = $model->getAllLoginHistory();
        
        // Menampilkan view dengan data yang didapatkan
        return view('hs_login', $data);
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

// public function simpandata()
// {
//     if (session()->get('level') > 0) {
//         $model = new M_aplikasi();

//         $id = $this->request->getPost('id_mskdata');
//         $kegiatan = $this->request->getPost('kegiatan');
//         $tgl = $this->request->getPost('tanggal_kegiatan');
//         $situs = $this->request->getPost('situs_kegiatan');
//         $tempat = $this->request->getPost('tempat_kegiatan');
//         $penyelenggara = $this->request->getPost('penyelenggara');
      
//         $keterangan = $this->request->getPost('keterangan');
//         $mulai = $this->request->getPost('jam_mulai');
//         $selesai = $this->request->getPost('jam_selesai');
//         $dana = $this->request->getPost('dana_keluar');
//         $proposal = $this->request->getPost('proposal');

//         $isi = array(
//             'id_mskdata' => $id,
//             'kegiatan' =>   $kegiatan,
//             'tanggal_kegiatan' => $tgl,
//             'situs_kegiatan' => $situs,
//             'tempat_kegiatan' => $tempat,
//             'penyelenggara' => $penyelenggara,
//             'keterangan' => $keterangan,
//             'jam_mula' => $mulai,
//             'jam_selesai' => $selesai,
//             'dana_keluar' =>  $dana,
//             'proposal' => $proposal,
            
//         );

//         if ($model->tambah('mskdata', $isi)) {
//             return redirect()->to('home/mskdata')->with('success', 'Data  berhasil ditambah');
//         } else {
//             return redirect()->back()->with('error', 'Gagal menambah data ');
//         }
//     } else {
//         return redirect()->to('home/login');
//     }
// }

public function activity(){
    $model = new M_aplikasi();
    $this->log_activity('user membuka activity');
    $where = array('id_user' => 2);
    $data['setting'] = $model->getwhere('mskdata',$where);
    $data['activity'] = $model->join('activity','user','activity.id_user = user.id_user');
    //print_r($data);
   
    echo view('header',$data);
    echo view('activity', $data);
}

    public function aksi_login()
    {
        $session = session();
        $model = new M_aplikasi();
        
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        // Mencari user berdasarkan username di database 'aplikasi' tabel 'user'
    //     $data = $model->where('username', $username)->first();
        
    //    if ($data) {
    // $pass = $data['password'];
        $where = [
            'username'   => $username,
            'password'  => $password
        ];
        $data = $model->getWhere('user', $where);
        
    if ($data > 0) {  // Menggunakan perbandingan biasa untuk teks biasa
        $ses_data = [
            'id_user'   => $data->id_user,
            'username'  => $data->username,
            'id_level'  => $data->level,
            'logged_in' => TRUE
        ];
        $session->set($ses_data);
        return redirect()->to('/home/index');
    } else {
        $session->setFlashdata('msg', 'Password salah');
        return redirect()->to('/login');
    }
// } else {
//     $session->setFlashdata('msg', 'Username tidak ditemukan');
//     return redirect()->to('/login');
// }

    }
public function logout()
    {
        $model = new M_aplikasi();
        $where = ['id_user' => session()->get('id_user')];

    $isi = [
        'logout_time' => date('Y-m-d H:i:s')
    ];
        $model->edit('hs_login', $isi, $where);
        session()->destroy();
        return redirect()->to('login');
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

 
public function users() 
{
    if(session()->get('level') > 0) { 
        $model = new M_Aplikasi();
        $data['users'] = $model->tampil('user');
 // Mengambil data dari model

        echo view('header', $data);
        echo view('users', $data);
    } else {
        return redirect()->to('home/login');
    }
}
 public function delete_lprn($id)
{
    $model = new M_Aplikasi();
    $where = array('id_mskdata' => $id);
    $model->hapus('mskdata', $where);
    return redirect()->to('home/lprn')->with('status', 'Data berhasil dihapus.');
}

  public function update_lprn($id)
{
    if (session()->get('level') > 0) {
        $model = new M_aplikasi();
        $where = array('id_mskdata' => 1);
        $data['kegiatan'] = $model->getwhere('mskdata',$where); 
        $where = array('id_mskdata' => $id);
        $data['kegiatan'] = $model->getWhere('mskdata', $where);
        
        echo view('header');
        echo view('menu');
        echo view('update_lprn', $data);
        echo view('footer');

         $model->tampil('lprn', $isi);
    } else {
        return redirect()->to('home/login');
    }
}
    public function euser()
    {
        // Cek level user dari sesi
        if (session()->get('level') > 0) {
            // Ambil data pengguna dari model (Anda mungkin ingin menyesuaikan nama model dan fungsi)
            $model = new M_Aplikasi();
            $data['user'] = $model->get_user_by_id(session()->get('id_user')); // Mengambil data pengguna berdasarkan ID
            
            // Tampilkan view edit profil
            return view('header', $data)
                . view('euser', $data);
        } else {
            // Redirect ke halaman login jika level user tidak valid
            return redirect()->to('/home/login');
        }
    }
 public function rekap()
{
    if (session()->get('level') > 0) {
        $model = new M_Aplikasi();

        // Mendapatkan bulan dari parameter GET, jika ada
        $bulan = $this->request->getGet('bulan');
        
        // Jika tidak ada parameter bulan, tampilkan data dari semua bulan
        if ($bulan) {
            // Memfilter data berdasarkan bulan
            $data['manda'] = $model->filterByMonth($bulan);
        } else {
            // Tampilkan data dari semua bulan
            $data['manda'] = $model->getAllData(); // Pastikan ada metode getAllData() di model
        }

        // Menyertakan tampilan header dan view rekap
        echo view('header', $data);
        echo view('rekap', $data);
    } else {
        // Jika pengguna belum login, arahkan ke halaman login
        return redirect()->to('home/login');
    }
}


public function search()
{
    if (session()->get('level') > 0) {
        $model = new M_Aplikasi();

        // Mendapatkan bulan dari parameter GET
        $bulan = $this->request->getGet('bulan');
        
        // Memfilter data berdasarkan bulan
        $data['manda'] = $model->filterByMonth($bulan);

        // Menyertakan tampilan header dan view rekap
        echo view('header', $data);
        echo view('rekap', $data);
    } else {
        // Jika pengguna belum login, arahkan ke halaman login
        return redirect()->to('home/login');
    }
}

// public function rekap()
// {
//     // Mengecek apakah pengguna sudah login dan memiliki level yang sesuai
//     if (session()->get('level') > 0) {
//         $model = new M_Aplikasi();
        
//         // Mendapatkan bulan dan tahun dari parameter GET atau menggunakan default
//         $bulan = $this->request->getGet('bulan') ?? date('n'); // Default ke bulan saat ini
//         $tahun = $this->request->getGet('tahun') ?? date('Y'); // Default ke tahun saat ini

//         // Memfilter data berdasarkan bulan dan tahun
//         $data['manda'] = $model->filterByMonthAndYear('mskdata', $bulan, $tahun);

//         // Menyertakan tampilan header dan view rekap
//         echo view('header', $data);
//         echo view('rekap', $data);
//     } else {
//         // Jika pengguna belum login, arahkan ke halaman login
//         return redirect()->to('home/login');
//     }
// }

public function lprn() 
{
    if(session()->get('level') > 0) { 
        $model = new M_Aplikasi(); // Pastikan model ini sesuai dengan nama model Anda
        $data['manda'] = $model->tampil('mskdata'); // Mengambil data dari model

        // Memuat header
        echo view('header', $data);
        
        // Memuat view lprn dengan data
        echo view('lprn', $data);
    } else {
        return redirect()->to('home/login');
    }
}
 public function mskdata()
{
    if(session()->get('level') > 0) {
        $model = new M_aplikasi();
        $data['manda'] = $model->tampil('mskdata'); 
        
        echo view('header',$data);
      
        echo view('mskdata', $data);
     
    } else {
        return redirect()->to('home/login');
    }
}

 

    public function simpandata() 
    {
            $model = new M_Aplikasi();
            $file = $this->request->getFile('proposal');
            $fileName = $file->getName();
            $path = ROOTPATH . 'public\images';

            $data = array(
                'kegiatan' => $this->request->getPost('kegiatan'),
                 'tanggal_kegiatan' => $this->request->getPost('tgl_kegiatan'), 
                 'situs_kegiatan' => $this->request->getPost('situasi_kegiatan'),
                 'tempat_kegiatan' => $this->request->getPost('tempat_kegiatan'),
                 'penyelenggara' => $this->request->getPost('penyelenggara'),
                 'keterangan' => $this->request->getPost('keterangan'),
                 'jam_mulai' => $this->request->getPost('jam_mulai').':00',
                 'jam_selesai' => $this->request->getPost('jam_selesai').':00',
                 'dana_keluar' => $this->request->getPost('dana_keluar'),
                 'proposal' => $fileName
            );
            $file->move($path, $fileName);
            //print_r($path);

            $model->tambahnelson('mskdata', $data); // Menyimpan data ke database

            //return redirect()->to('home/mskdata')->with('status', 'Data berhasil dikirim!');
            return redirect()->to('home/mskdata');
        
    }
}
