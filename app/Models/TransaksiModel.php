<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiModel extends Model
{
    protected $table      = 'transaksi';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $allowedFields = ['id_admin', 'id_user', 'total_harga', 'jenis_transaksi'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $returnType = 'array';
    public function __construct()
    {
        $this->builder = $this->builder($this->table);
        $this->user = new AuthModel();
        $this->detail = new DetailTransaksiModel();
    }
    public function setorSampah($data)
    {
        //tambahkan saldo ke akun user
        $this->user->tambahSaldo($data['id_user'], $data['total_harga']);
        //insert ke table transaksi
        $id_transaksi = $this->insert([
            'id_admin' => $data['id_admin'],
            'id_user' => $data['id_user'],
            'jenis_transaksi' => $data['jenis_transaksi'],
            'total_harga' => $data['total_harga']
        ], true);
        // lakukan insert ke table detail transaksi
        $this->detail->tambahDetail([
            'id_transaksi' => $id_transaksi,
            'detail' => $data['detail_transaksi']
        ], false);
        return $id_transaksi;
    }
    public function tarikSaldo($data)
    {
        //kurangi saldo ke akun user
        $this->user->tarikSaldo($data['id_user'], $data['total_harga']);
        return $this->insert($data, true);
    }
    public function getTransaksi()
    {
        // return $this->builder($this->table)->join('users', 'id_user')->get()->getResultObject();
        return $this->builder->select([$this->table . '.*', 'users.nama'])
            ->join('users', $this->table . '.id_user=users.id')
            ->get()->getResultObject();
    }
    public function kwitansi($id)
    {
        return $this->builder->select('*')
            ->join('users', $this->table . '.id_user=users.id')
            ->where('transaksi.id', $id)
            ->get()->getRowArray();
    }
    public function rekapTransaksi($dari, $sampai)
    {
        return $this->builder->select([$this->table . '.*', 'users.nama'])
            ->join('users', $this->table . '.id_user=users.id')
            ->where('transaksi.created_at>=', $dari)
            ->where('transaksi.created_at<=', $sampai)
            ->get()->getResultObject();
    }
    public function search($keyword)
    {
        return $this->table('transaksi')->like('users.nama', $keyword);
    }
}
