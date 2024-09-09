<?php

namespace App\Models;

use CodeIgniter\Model;

class M_aplikasi extends Model
{
    // Define table and primary key
    protected $table = 'mskdata'; // Assuming 'mskdata' is the table you want to work with
    protected $primaryKey = 'id_mskdata'; // Update this to your table's primary key

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

    // Function to get a single row based on where condition
    public function getWhere($tabel, $where)
    {
        try {
            $query = $this->db->table($tabel)->getWhere($where);
            if ($query === false) {
                log_message('error', 'Query failed for table: ' . $tabel);
                return false;
            }
            return $query->getRowArray(); // Changed to getRowArray for consistency
        } catch (\Exception $e) {
            log_message('error', 'Error fetching row with where condition: ' . $e->getMessage());
            return false;
        }
    }
    public function tampilLaporanHarian()
    {
        // Misalnya Anda hanya ingin mengambil data berdasarkan tanggal tertentu atau kriteria lainnya
        return $this->db->table($this->table)->orderBy('tanggal_kegiatan', 'DESC')->get()->getResultArray();
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

    // Function to delete data from a table
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

    // Function to get all users (specific to 'users' table)
    public function get_all_users()
    {
        try {
            return $this->db->table('users')->get()->getResultArray(); // Changed to getResultArray for consistency
        } catch (\Exception $e) {
            log_message('error', 'Error fetching all users: ' . $e->getMessage());
            return false;
        }
    }
}
