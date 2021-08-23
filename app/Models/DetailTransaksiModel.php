<?php

namespace App\Models;

use CodeIgniter\Model;

class DetailTransaksiModel extends Model
{
    protected $table      = 'detail_transaksi';
    protected $primaryKey = 'id';
    protected $returnType = 'object';
    protected $allowedFields = ['id_transaksi', 'id_sampah', 'berat', 'harga', 'harga_total', 'ket'];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    public function __construct()
    {
        $this->builder($this->table);
    }
    public function tambahDetail($data)
    {
        foreach ($data['detail'] as $d) {
            $this->insert([
                'id_transaksi' => $data['id_transaksi'],
                'id_sampah' => $d['id_sampah'],
                'berat' => $d['qty'],
                'harga' => $d['harga'],
                'harga_total' => $d['harga_total']
            ]);
        }
    }
    public function getDetail($id_tr)
    {
        return $this->db->table($this->table)
            ->select(['detail_transaksi.*', 'sampah.jenis'])
            ->join('sampah', 'sampah.id=detail_transaksi.id_sampah')
            ->where('detail_transaksi.id_transaksi', $id_tr)
            ->get()->getResultObject();
    }
}
