<?php

namespace App\Controllers;

use App\Models\AuthModel;
use App\Models\SampahModel;
use function PHPUnit\Framework\isNull;

class Sampah extends BaseController
{
    protected $sampahModel;
    public function __construct()
    {
        $this->sampahModel = new SampahModel();
        $this->authModel = new AuthModel();
    }
    public function index()
    {
        $currentPage = $this->request->getVar('page_sampah') ? $this->request->getVar('page_sampah') : 1;
        $keyword = $this->request->getVar('keyword'); //search
        if ($keyword) {
            $sampah = $this->sampahModel->search($keyword);
        } else {
            $sampah = $this->sampahModel;
        }
        $data = [
            'title' => 'Daftar Sampah',
            'sampah' => $sampah->paginate(3, 'sampah'),
            'pager' => $this->sampahModel->pager,
            'currentPage' => $currentPage
        ];
        return view('sampah/sampah', $data);
    }

    public function detail($slug)
    {
        $data = [
            'title' => 'Detail Sampah',
            // 'sampah' => is_null($id) ? null : $this->sampahModel->find($id),
            'sampah' => $this->sampahModel->getSampah($slug)
            // 'user' => $this->authModel->find(session('id'))
        ];
        // dd($data);
        //jika data tidak ada ditabel
        if (empty($data['sampah'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data tidak ditemukan.');
        }

        return view('sampah/detail_sampah', $data);
    }

    public function create()
    {
        // session();
        $data = [
            'title' => 'Form Tambah Data Sampah',
            'validation' => \Config\Services::validation(),
            // 'user' => $this->authModel->find(session('id'))
        ];

        return view('sampah/create_sampah', $data);
    }

    public function save()
    {
        // validasi input
        if (!$this->validate([
            'jenis' => [
                'rules' => 'required|is_unique[sampah.jenis]',
                'errors' => [
                    'required' => '{field} Sampah harus diisi!',
                    'is_unique' => '{field} Sampah sudah terdaftar.'
                ]
            ],
            'sampul' => [
                'rules' => 'max_size[sampul,1024]|is_image[sampul]|mime_in[sampul,image/jpg,image/jpeg,image/png]', //'uploaded[sampul]| taruh dpn kalau mau ada error dan tdk pakai if(apakah tidak ada gambar) 
                'errors' => [
                    //'uploaded' => 'pilih gambar dahulu',
                    'max_size' => 'ukuran gambar terlalu besar',
                    'is_image' => 'yg anda pilih bukan gambar',
                    'mime_in' => 'yg anda pilih bukan gambar'
                ]
            ]
        ])) {
            // $validation = \Config\Services::validation();
            // return redirect()->to('/sampah/create')->withInput()->with('valdation', $validation);

            // return redirect()->to('/sampah/create')->withInput();
            return redirect()->to('/sampah/create')->withInput();
        }

        $fileSampul = $this->request->getFile('sampul');
        //apakah tidak ada gambar yg diupload
        if ($fileSampul->getError() == 4) {
            $namaSampul = 'sampah.png';
        } else {
            //generate nama sampul random
            $namaSampul = $fileSampul->getRandomName();

            //pindahkan file ke folder img
            $fileSampul->move('img', $namaSampul);
        }

        $slug = url_title($this->request->getVar('jenis'), '-', true);
        $this->sampahModel->save([
            'jenis' => $this->request->getVar('jenis'),
            'slug' => $slug,
            'harga' => $this->request->getVar('harga'),
            'des' => $this->request->getVar('des'),
            'sampul' => $namaSampul
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');

        return redirect()->to('/sampah');
    }

    public function delete($id)
    {
        //cari gambar berdasarkan id
        $sampah = $this->sampahModel->find($id);

        //cek jika gambar default
        if ($sampah['sampul'] != 'sampah.png') {
            //hapus gambar
            unlink('img/' . $sampah['sampul']);
        }

        $this->sampahModel->delete($id);
        session()->setFlashdata('del', 'Data berhasil dihapus');
        return redirect()->to('/sampah');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Form Ubah Data Sampah',
            'validation' => \Config\Services::validation(),
            'sampah' => $this->sampahModel->find($id),
            // 'user' => $this->authModel->find(session('id'))
        ];

        return view('sampah/edit_sampah', $data);
    }

    public function update($id)
    {
        //cek jenis
        $sampahlama = $this->sampahModel->getSampah($this->request->getVar('slug'));
        if ($sampahlama['jenis'] == $this->request->getVar('jenis')) {
            $rule_jenis = 'required';
        } else {
            $rule_jenis = 'required|is_unique[sampah.jenis]';
        }

        if (!$this->validate([
            'jenis' => [
                'rules' => $rule_jenis,
                'errors' => [
                    'required' => '{field} Sampah harus diisi!',
                    'is_unique' => '{field} Sampah sudah terdaftar.'
                ]
            ],
            'sampul' => [
                'rules' => 'max_size[sampul,1024]|is_image[sampul]|mime_in[sampul,image/jpg,image/jpeg,image/png]', //'uploaded[sampul]| taruh dpn kalau mau ada error dan tdk pakai if(apakah tidak ada gambar) 
                'errors' => [
                    //'uploaded' => 'pilih gambar dahulu',
                    'max_size' => 'ukuran gambar terlalu besar',
                    'is_image' => 'yg anda pilih bukan gambar',
                    'mime_in' => 'yg anda pilih bukan gambar'
                ]
            ]
        ])) {

            return redirect()->to('/sampah/edit_sampah/' . $this->request->getVar('slug'))->withInput();
        }


        $fileSampul = $this->request->getFile('sampul');
        $def = $this->request->getVar('sampulLama');
        if ($fileSampul->getError() == 4) {
            $namaSampul = $this->request->getVar('sampulLama');
        } else if ($def == 'sampah.png') {
            $namaSampul = $this->request->getVar('sampulLama');
            $namaSampul = $fileSampul->getRandomName();
            //pindahkan gambar
            $fileSampul->move('img', $namaSampul);
        } else {
            //generate nama file random
            $namaSampul = $fileSampul->getRandomName();
            //pindahkan gambar
            $fileSampul->move('img', $namaSampul);
            //hapus file lama
            unlink('img/' . $this->request->getVar('sampulLama'));
        }

        $slug = url_title($this->request->getVar('jenis'), '-', true);
        $this->sampahModel->save([
            'id' => $id,
            'jenis' => $this->request->getVar('jenis'),
            'slug' => $slug,
            'harga' => $this->request->getVar('harga'),
            'des' => $this->request->getVar('des'),
            'sampul' => $namaSampul
        ]);

        session()->setFlashdata('pesan', 'Data berhasil diupdate.');

        return redirect()->to('/sampah');
    }
}
