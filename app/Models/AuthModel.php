<?php

namespace App\Models;

use CodeIgniter\Model;

class AuthModel extends Model
{
    protected $table      = 'users';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $allowedFields = ['nik', 'nama', 'username', 'password', 'rt', 'rw', 'sampul', 'level', 'saldo'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    function get_data_login($username, $tbl)
    {
        $builder = $this->db->table($tbl);
        $builder->where('username', $username);
        $log = $builder->get()->getRow();
        return $log;
    }

    public function getakun($nama = false)
    {
        if ($nama == false) {
            return $this->findAll();
        }
        return $this->where(['nama' => $nama])->first();
    }

    public function search($keyword)
    {
        return $this->table('users')->like('nama', $keyword);
    }

    public function getById($id)
    {
        // return $this->where(['id' => $id]);
        return $this->find($id);
    }
    public function tambahSaldo($id, $nominal)
    {
        $user = (object)$this->find($id);
        $saldo = $user->saldo;
        //tambahkan saldo
        $tambah = $saldo + $nominal;
        //lakukan update
        $this->update($id, ['saldo' => $tambah]);
        return true;
    }
    public function tarikSaldo($id, $nominal)
    {
        $user = (object)$this->find($id);
        $saldo = $user->saldo;
        //tambahkan saldo
        $penarikan = $saldo - $nominal;
        //lakukan update
        $this->update($id, ['saldo' => $penarikan]);
        return true;
    }
}
