<?php

namespace App\Models;

use CodeIgniter\Model;

class Mpelanggan extends Model
{
    protected $table            = 'tbl_pelanggan';
    protected $primaryKey       = 'id_pelanggan';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nama_pelanggan', 'alamat', 'no_telp'];

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

    public function cariPelanggan($keyword)
    {
        // Lakukan pencarian berdasarkan nama pelanggan atau informasi lainnya
        $builder = $this->db->table('tbl_pelanggan');
        $builder->like('id_pelanggan', $keyword);
        $builder->orLike('nama_pelanggan', $keyword);
        $query = $builder->get();

        // Kembalikan hasil pencarian sebagai array
        return $query->getResultArray();
    }

    public function getInfo($keyword)
    {
        // Lakukan pencarian berdasarkan nama pelanggan atau informasi lainnya
        $builder = $this->db->table('tbl_pelanggan');
        $builder->like('nama_pelanggan', $keyword);
        $query = $builder->get();

        // Kembalikan hasil pencarian sebagai array
        return $query->getResultArray();
    }
}
