<?php

namespace App\Controllers;

use App\Models\AuthModel;

class User extends BaseController
{
    protected $authModel;
    public function __construct()
    {
        $this->authModel = new AuthModel();
    }
    public function index()
    {
        $data = [
            'title' => 'Halaman Utama | SemangatePoor',
            'validation' => \Config\Services::validation()
        ];
        return view('user/index', $data);
    }

    public function akun()
    {
        $currentPage = $this->request->getVar('page_users') ? $this->request->getVar('page_users') : 1;

        $keyword = $this->request->getVar('keyword'); //search
        if ($keyword) {
            $user = $this->authModel->search($keyword);
        } else {
            $user = $this->authModel;
        }
        // d($this->request->getVar('keyword'));
        $data = [
            'title' => 'Halaman Utama | SemangatePoor',
            // 'validation' => \Config\Services::validation(),
            // 'auth' => $this->authModel->getakun()

            // $this->authModel->findAll()
            'auth' => $user->paginate(5, 'users'),
            'pager' => $this->authModel->pager,
            'currentPage' => $currentPage
        ];
        return view('user/akun', $data);
    }

    public function detail($nama)
    {
        $data = [
            'title' => 'Detail Akun',
            'auth' => $this->authModel->getakun($nama)
        ];

        //jika data tidak ada ditabel
        if (empty($data['auth'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data tidak ditemukan.');
        }

        return view('user/detail_akun', $data);
    }

    public function delete($id)
    {
        //cari gambar berdasarkan id
        $auth = $this->authModel->find($id);

        //cek jika gambar default
        if ($auth['sampul'] != 'profil.svg') {
            //hapus gambar
            unlink('img/' . $auth['sampul']);
        }

        $this->authModel->delete($id);
        session()->setFlashdata('del', 'Data berhasil dihapus');
        return redirect()->to('/akun');
    }

    public function edit($nama)
    {
        $data = [
            'title' => 'Form Ubah Data Akun',
            'validation' => \Config\Services::validation(),
            'auth' => $this->authModel->getakun($nama)
        ];

        return view('user/edit_user', $data);
    }

    public function update($id)
    {
        //cek nama
        $nama = $this->request->getVar('nama');
        // $authlama = $this->authModel->getakun($this->request->getVar('nama'));
        if ($nama) {
            $rule_nama = 'required';
        } else {
            $rule_nama = 'required|is_unique[users.nama]';
        }

        if (!$this->validate([
            'nama' => [
                'rules' => $rule_nama,
                'errors' => [
                    'required' => '{field} Nama harus diisi!',
                    'is_unique' => '{field} Nama sudah terdaftar.'
                ]
            ],
            'sampul' => [
                'rules' => 'max_size[sampul,1024]|is_image[sampul]|mime_in[sampul,image/jpg,image/jpeg,image/png,image/svg]', //'uploaded[sampul]| taruh dpn kalau mau ada error dan tdk pakai if(apakah tidak ada gambar) 
                'errors' => [
                    //'uploaded' => 'pilih gambar dahulu',
                    'max_size' => 'ukuran gambar terlalu besar',
                    'is_image' => 'yg anda pilih bukan gambar',
                    'mime_in' => 'yg anda pilih bukan gambar'
                ]
            ],
        ])) {

            return redirect()->to('/user/edit_user/' . $this->request->getVar('nama'))->withInput();
        }

        $fileSampul = $this->request->getFile('sampul');
        $def = $this->request->getVar('sampulLama');
        if ($fileSampul->getError() == 4) {
            $namaSampul = $this->request->getVar('sampulLama');
        } else if ($def == 'profil.svg') {
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

        $nama = $this->request->getVar('nama');
        $this->authModel->save([
            'id' => $id,
            'nama' => $nama,
            'username' => $this->request->getVar('username'),
            'rt' => $this->request->getVar('rt'),
            'rw' => $this->request->getVar('rw'),
            'saldo' => $this->request->getVar('saldo'),
            'sampul' => $namaSampul,
        ]);

        session()->setFlashdata('pesan', 'Data berhasil diupdate.');

        return redirect()->to('/akun');
    }

    public function reset($nama)
    {
        $data = [
            'title' => 'Form Ubah Data Akun',
            'validation' => \Config\Services::validation(),
            'auth' => $this->authModel->getakun($nama)
        ];

        return view('user/edit_pass', $data);
    }

    public function reset_pass($id)
    {
        if (!$this->validate([
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Password harus diisi!',
                    // 'is_unique' => '{field} Password sudah terdaftar.'
                ]
            ],
        ])) {

            return redirect()->to('/user/edit_pass/');
        }
        $this->authModel->save([
            'id' => $id,
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
        ]);

        session()->setFlashdata('pesan', 'Data berhasil diupdate.');

        return redirect()->to('/akun');
    }
}
