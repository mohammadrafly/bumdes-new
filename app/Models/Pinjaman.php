<?php

namespace App\Models;

use CodeIgniter\Model;

class Pinjaman extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'pinjaman';
    protected $primaryKey       = 'id_pinjaman';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'nik',
        'nominal',
        'jenis_pinjaman',
        'status_pinjaman',
        'kode_penarikan',
        'created_at'
    ];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function getPinjaman()
    {
        $query = $this->db->table('pinjaman')
            //join antara 2 table
            ->join('users', 'users.nik = pinjaman.nik')
            //mengurutkan data sesuai parameter
            ->orderBy('created_at', 'DESC')
            ->get();
        return $query;
    }

    public function getPbyID($id)
    {
        $query = $this->db->table('pinjaman')
            ->join('users', 'users.nik = pinjaman.nik', 'left')
            //ambil data sesuai parameter
            ->where('pinjaman.nik', $id)
            ->get();
        return $query;
    }

    public function getPinjamanLimit6()
    {
        $query = $this->db->table('pinjaman')
            ->join('users', 'users.nik = pinjaman.nik')
            ->orderBy('pinjaman.created_at', 'DESC')
            //limit data sesuai parameter
            ->limit(10)
            ->get();
        return $query;
    }

    function allPinjamanByID()
    {
        $query = $this->db->table('pinjaman')
                ->where(['nik' => session()->get('nik')])
                //hitung semua row
                ->countAllResults();
        return $query;
    }

    public function RangeDate($start, $end)
    {
        $query = $this->db->table('pinjaman')
                ->join('users', 'users.nik = pinjaman.nik', 'left')
                ->where('created_at BETWEEN "'. date('Y-m-d', strtotime($start)). '" AND "'. date('Y-m-d', strtotime($end)).'"')
                ->orderBy('created_at', 'DESC')
                ->get();
        return $query;
    }
}
