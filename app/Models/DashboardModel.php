<?php

namespace App\Models;

use CodeIgniter\Model;

class DashboardModel extends Model
{
    protected $table = 'transaksi';

    // hitung total data pada transaction
    public function getCountTrx()
    {
        return $this->db->table("transaksi")->countAll();
    }

    // hitung total data pada category
    public function getCountCategory()
    {
        return $this->db->table("detail_transaksi")->countAll();
    }

    // hitung total data pada product
    public function getCountProduct()
    {
        return $this->db->table("sampah")->countAll();
    }

    // hitung total data pada user
    public function getCountUser()
    {
        return $this->db->table("users")->countAll();
    }

    // public function getGrafik()
    // {
    //     $query = $this->db->query("SELECT trx_price, MONTHNAME(trx_date) as month, COUNT(product_id) as total FROM transactions GROUP BY MONTHNAME(trx_date) ORDER BY MONTH(trx_date)");
    //     $hasil = [];
    //     if (!empty($query)) {
    //         foreach ($query->getResultArray() as $data) {
    //             $hasil[] = $data;
    //         }
    //     }
    //     return $hasil;
    // }

    // public function getLatestTrx()
    // {
    //     return $this->table('transactions')
    //         ->select('products.product_name, transactions.*')
    //         ->join('products', 'products.product_id = transactions.product_id')
    //         ->orderBy('transactions.trx_id', 'desc')
    //         ->limit(5)
    //         ->get()
    //         ->getResultArray();
    // }
}
