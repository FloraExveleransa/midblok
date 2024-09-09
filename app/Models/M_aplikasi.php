<?php namespace App\Models;

use CodeIgniter\Model;

class M_aplikasi extends Model
{
    // Define table and primary key
    protected $table = 'mskdata'; // Nama tabel
    protected $primaryKey = 'id_mskdata'; // Primary key tabel, sesuaikan dengan yang ada di tabel Anda

    // Define allowed fields
    protected $allowedFields = [
        'kegiatan', 'tanggal_kegiatan', 'situs_kegiatan',
        'tempat_kegiatan', 'penyelenggara', 'keterangan',
        'jam_mulai', 'jam_selesai', 'dana_keluar'
    ];

    // Function to retrieve all data from a specified table
    public function tampil($tabel)
    {
        try {
            return $this->db->table($tabel)
                            ->get()
                            ->getResultArray(); // Changed to getResultArray for consistency
        } catch (\Exception $e) {
            log_message('error', 'Error fetching data from table: ' . $e->getMessage());
            return false;
        }
    }

    // Function to perform a join between two tables
    public function join($tabel, $tabel2, $on)
    {
        try {
            return $this->db->table($tabel)
                            ->join($tabel2, $on, 'left')
                            ->get()
                            ->getResultArray(); // Changed to getResultArray for consistency
        } catch (\Exception $e) {
            log_message('error', 'Error performing join operation: ' . $e->getMessage());
            return false;
        }
    }

    // Function to get levels (example use-case)
    public function getLevels()
    {
        try {
            return $this->db->table('level')->select('id_level, nama_level')->get()->getResultArray(); // Changed to getResultArray
        } catch (\Exception $e) {
            log_message('error', 'Error fetching levels: ' . $e->getMessage());
            return false;
        }
    }

    // Function to count all rows in a table
    public function countAll($table)
    {
        try {
            return $this->db->table($table)->countAllResults();
        } catch (\Exception $e) {
            log_message('error', 'Error counting rows in table: ' . $e->getMessage());
            return false;
        }
    }

    // Function to perform a join and apply a where condition
    public function joinWhere($tabel, $tabel2, $on, $where)
    {
        try {
            return $this->db->table($tabel)
                            ->join($tabel2, $on, 'left')
                            ->getWhere($where)
                            ->getRowArray(); // Changed to getRowArray for consistency
        } catch (\Exception $e) {
            log_message('error', 'Error performing join with where condition: ' . $e->getMessage());
            return false;
        }
    }

  
    public function getWhere($tabel, $where)
    {
        $query = $this->db->table($tabel)
                          ->getWhere($where);

        if (!$query) {
            log_message('error', 'Query failed for table: ' . $tabel);
            return false; // Handle the error as needed
        }

        return $query->getRow();
    }

    // Function to get multiple rows based on where condition
    public function getWheres($tabel, $where)
    {
        try {
            $query = $this->db->table($tabel)->getWhere($where);
            if ($query === false) {
                log_message('error', 'Query failed for table: ' . $tabel);
                return false;
            }
            return $query->getResultArray(); // Changed to getResultArray for consistency
        } catch (\Exception $e) {
            log_message('error', 'Error fetching rows with where condition: ' . $e->getMessage());
            return false;
        }
    }

    // Function to insert data into a table
    public function tambah($tabel, $isi)
    {
        try {
            return $this->db->table($tabel)->insert($isi);
        } catch (\Exception $e) {
            log_message('error', 'Error inserting data into table: ' . $e->getMessage());
            return false;
        }
    }
    public function tambahnelson($tabel, $isi)
    {
        return $this->db->table($tabel)
                        ->insert($isi);
    }

    // Function to update data in a table
    public function edit($tabel, $isi, $where)
    {
        try {
            return $this->db->table($tabel)->update($isi, $where);
        } catch (\Exception $e) {
            log_message('error', 'Error updating data in table: ' . $e->getMessage());
            return false;
        }
    }
public function getPost($fields)
    {
        $data = [];
        foreach ($fields as $field) {
            $data[$field] = $this->request->getPost($field);
        }
        return $data;
    }
    public function hapus($table, $where)
{
    try {
        return $this->db->table($table)->delete($where);
    } catch (\Exception $e) {
        log_message('error', 'Error deleting data from table: ' . $e->getMessage());
        return false;
    }
}

    // Function to insert user data (specific to 'users' table)
    public function insert_user($data)
    {
        try {
            return $this->db->table('users')->insert($data);
        } catch (\Exception $e) {
            log_message('error', 'Error inserting user data: ' . $e->getMessage());
            return false;
        }
    }

    // Function to update user data
   public function update_user($userId, $username, $email, $foto = null) {
    $data = [
        'username' => $username,
        'email' => $email,
    ];

    if ($foto) {
        $data['foto'] = $foto;
    }

    try {
        // Use Query Builder to update the user
        return $this->db->table('user')->where('id_user', $userId)->update($data);
    } catch (\Exception $e) {
        log_message('error', 'Error updating user data: ' . $e->getMessage());
        return false;
    }
}


   public function get_user_by_id($userId) {
    try {
        // Use Query Builder to get user by ID
        $query = $this->db->table('user')->where('id_user', $userId)->get();
        return $query->getRow(); // Mengembalikan baris hasil query
    } catch (\Exception $e) {
        log_message('error', 'Error fetching user data by ID: ' . $e->getMessage());
        return false;
    }
}


    // Function to get all users (specific to 'users' table)
    public function get_all_users()
    {
        try {
            return $this->db->table('user')->get()->getResultArray(); // Changed to getResultArray for consistency
        } catch (\Exception $e) {
            log_message('error', 'Error fetching all users: ' . $e->getMessage());
            return false;
        }
    }
    public function getAllData()
{
    // Mengambil semua data dari tabel
    return $this->findAll();
}
 public function getDataByBulan($bulan)
    {
        return $this->where('MONTH(tanggal_kegiatan)', $bulan)
                    ->findAll();
    }
   public function filterByMonth($bulan)
    {
        return $this->where('MONTH(tanggal_kegiatan)', $bulan)
                    ->findAll();
    }
}
