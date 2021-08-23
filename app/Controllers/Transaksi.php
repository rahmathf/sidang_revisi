<?php

namespace App\Controllers;

use App\Models\AuthModel;
use App\Models\DetailTransaksiModel;
use App\Models\SampahModel;
use App\Models\TransaksiModel;
use TCPDF;

class Transaksi extends BaseController
{
    protected $authModel;
    protected $sampahModel;
    protected $transaksiModel;
    public function __construct()
    {
        $this->authModel = new AuthModel();
        $this->sampahModel = new SampahModel();
        $this->transaksiModel = new TransaksiModel();
        $this->detail = new DetailTransaksiModel();
    }
    public function index()
    {
        // $currentPage = $this->request->getVar('page_transaksi') ? $this->request->getVar('page_transaksi') : 1;
        $keyword = $this->request->getVar('keyword'); //search
        if ($keyword) {
            $transaksi = $this->transaksiModel->search($keyword);
        } else {
            $transaksi = $this->transaksiModel;
        }


        $data = [
            'title' => 'Transaksi | SemangatePoor',
            'transaksi' =>  $transaksi,
            // 'pager' => $this->transaksiModel->pager,
            // 'currentPage' => $currentPage,
            'transaksi' => $this->transaksiModel->getTransaksi(),

            'user' => $this->authModel->find(session('id'))
        ];
        return view('transaksi/index', $data);
    }

    public function setor($id)
    {
        // $categories = $this->category_model->where('category_status', 'Active')->findAll();

        $data = [
            'title' => 'Transaksi | SemangatePoor',
            'nasabah' => $this->authModel->getById($id),
            'sampah' => $this->sampahModel->findAll(),
            'user' => $this->authModel->find(session('id'))
            // ['categories'] = ['' => 'Pilih Category'] + array_column($categories, 'category_name', 'category_id');

        ];
        // dd($data);
        return view('transaksi/setor', $data);
    }
    public function tarik($id)
    {
        $data = [
            'title' => 'Tarik Saldo | SemangatePoor',
            'user' => $this->authModel->getById($id)
        ];
        // dd($data);
        return view('transaksi/tarik', $data);
    }
    public function setorSampah()
    {
        $var = $this->request->getPost();
        $detail = [];
        foreach ($var['jenis'] as $key => $value) {
            $detailTr = [
                'id_sampah' => $value,
                'qty' => $var['qty'][$key],
                'harga' => $var['hargaSatuan'][$key],
                'harga_total' => $var['qty'][$key] * $var['hargaSatuan'][$key]
            ];
            array_push($detail, $detailTr);
        }
        // dd($var);
        // dapatkan user yang saat ini login, untuk isi kolom admin pada tabel transaksi
        $admin = (object)$this->authModel->find(session()->id);
        $data = [
            'id_admin' => $admin->id,
            'id_user' => $this->request->getPost('id'),
            'jenis_transaksi' => 'masuk',
            'total_harga' => $this->request->getPost('total'),
            'detail_transaksi' => $detail
        ];
        $result = $this->transaksiModel->setorSampah($data);
        return redirect()->to('/transaksi')->with('pesan', 'Transaksi Berhasil dengan ID Transaksi = ' . $result);
    }
    public function tarikSaldo()
    {
        // dapatkan user yang saat ini login, untuk isi kolom admin pada tabel transaksi
        $admin = (object)$this->authModel->find(session()->id);
        $data = [
            'id_admin' => $admin->id,
            'id_user' => $this->request->getPost('id'),
            'jenis_transaksi' => 'keluar',
            'total_harga' => $this->request->getPost('tarik')
        ];
        $result = $this->transaksiModel->tarikSaldo($data);
        return redirect()->to('/transaksi')->with('pesan', 'Transaksi Berhasil dengan ID Transaksi = ' . $result);
    }
    public function coba()
    {
        $data = [
            'title' => 'Tarik Saldo | SemangatePoor',
            'user' => (object)$this->authModel->getById(1),
            'sampah' => $this->sampahModel->findAll()
        ];
        return view('transaksi/coba', $data);
    }
    public function getDetail()
    {
        $id_transaksi = $this->request->getGet('id_transaksi');
        $data = $this->detail->getDetail($id_transaksi);
        // $data = $this->detail->where(['id_transaksi' => $id_transaksi])->findAll();
        echo json_encode($data);
    }
    public function cetakTransaksi($id)
    {
        $data = [
            'transaksi' => $this->transaksiModel->kwitansi($id),
            'detail' => $this->detail->getDetail($id)
        ];
        // $transaksi = $this->transaksiModel->kwitansi($id);
        // $detail = $this->detail->getDetail($id);
        // dd(session()->getTempdata());

        $html = view('transaksi/kwitansi', $data);
        $pdf = new TCPDF('P', PDF_UNIT, 'A5', true, 'UTF-8', false);

        $pdf->SetCreator('SemangatePoor');
        $pdf->SetAuthor('Rahmat Hidayat F');
        $pdf->SetTitle('Kwitansi ' . $data['transaksi']['jenis_transaksi']);

        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);

        $pdf->addPage();

        // output the HTML content
        $pdf->writeHTML($html, true, false, true, false, 'L');
        //line ini penting
        $this->response->setContentType('application/pdf');
        //Close and output PDF document
        $pdf->Output('Kwitansi.pdf', 'I');
        // Output I untuk display saja, D untuk download pilih sendiri
        // $pdf->Output('Kwitansi.pdf', 'D');
    }
    public function rekap()
    {
        $dari = $this->request->getVar('dari');
        $sampai = $this->request->getVar('sampai');
        $data = [
            'transaksi' => $this->transaksiModel->rekapTransaksi($dari, $sampai),
            'dari' => $dari,
            'sampai' => $sampai
        ];
        // $html = view('transaksi/rekap', [
        //     'transaksi'
        //     => $this->transaksiModel->rekapTransaksi($dari, $sampai),
        //     'dari' => $dari,
        //     'sampai' => $sampai
        // ]);
        // dd($data);
        $html = view('transaksi/rekap', $data);
        $pdf = new TCPDF('P', PDF_UNIT, 'A4', true, 'UTF-8', false);
        $pdf->SetCreator('SemangatePoor');
        $pdf->SetTitle('Rekap Transaksi');
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);
        $pdf->addPage();
        // dd($pdf);
        $pdf->writeHTML($html, true, false, true, false, '');
        // $pdf->writeHTML($html);
        $this->response->setContentType('application/pdf');
        $pdf->Output('Rekap-Transaksi.pdf', 'I');
    }
    public function hapus()
    {
        $id = $this->request->getPost('id');
        $hapus = $this->transaksiModel->delete($id, true);
        if ($hapus)
            echo 'sukses';
        else echo 'gagal';
    }
}
