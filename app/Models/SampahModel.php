<?php

namespace App\Models;

use CodeIgniter\Model;

class SampahModel extends Model
{
    protected $table      = 'sampah';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $allowedFields = ['jenis', 'slug', 'harga', 'des', 'sampul',];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // protected $validationRules    = [];
    // protected $validationMessages = [];

    public function getSampah($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }
        return $this->where(['slug' => $slug])->first();
    }
    public function get_data_sampah()
    {
        return $this->findAll();
    }

    public function search($keyword)
    {
        return $this->table('sampah')->like('jenis', $keyword);
    }
}
