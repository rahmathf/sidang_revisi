<?php

namespace App\Controllers;

use App\Models\AuthModel;
use Config\Validation;

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
            'validation' => \Config\Services::validation(),
            'user' => $this->authModel->find(session('id'))
        ];
        // dd($this->data);
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
            'user' => $this->authModel->find(session('id')),
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
            'auth' => $this->authModel->getakun($nama),
            'user' => $this->authModel->find(session('id'))
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
    public function edit()
    {
        $data['title'] = 'Edit Profil | SemangatePoor';
        $data['user'] = $this->authModel->find(session('id'));
        return view('user/edit_user', $data);
    }
    public function updateFoto()
    {
        $foto = $this->request->getFile('foto');
        $user = $this->authModel->find(session('id'));
        $randomName = $foto->getRandomName();
        if ($user['sampul'] != 'profil.svg') {
            // hapus file lama
            $foto->move('img', $randomName);
            unlink('img/' . $user['sampul']);
        }
        // update Db
        $update = $this->authModel->update(session('id'), ['sampul' => $randomName]);
        if ($update) {
            // update session
            $user = $this->authModel->asObject()->find(session('id'));
            $data = array(
                'log' => TRUE,
                'id' => $user->id,
                'nama' => $user->nama,
                'username' => $user->username,
                'sampul' => $user->sampul,
                'level' => $user->level,
            );
            session()->set($data);

            return redirect()->to('/user')->with('pesan', 'Foto Berhasil Diubah');
        }
    }

    public function update()
    {
        $data = [
            'nama' => $this->request->getPost('nama'),
            'username' => $this->request->getPost('username'),
            'rt' => $this->request->getPost('rt'),
            'rw' => $this->request->getPost('rw'),

        ];

        $update = $this->authModel->update($this->request->getPost('id'), $data);
        // dd($update);
        if ($update) {
            //update session
            $user = $this->authModel->asObject()->find(session('id'));
            $data = array(
                'log' => TRUE,
                'id' => $user->id,
                'nama' => $user->nama,
                'username' => $user->username,
                'sampul' => $user->sampul,
                'level' => $user->level,
            );
            session()->set($data);
            return redirect()->to('/user')->with('pesan', 'Biodata Berhasil Diupdate');
        }
    }

    // public function reset()
    // {
    //     $data = [
    //         'title' => 'Form Ubah Data Akun',
    //         'user' => $this->authModel->find(session('id'))
    //     ];

    //     return view('user/edit_pass', $data);
    // }
    // public function cekPass()
    // {
    //     $old = $this->request->getPost('oldPass');
    //     // dd($old);
    //     $user = $this->authModel->asObject()->find(session('id'))->password;
    //     // dd($user);
    //     // cek password
    //     $cek = password_verify($old, $user);
    //     if ($cek) return 'true';
    //     else return 'false';
    // }
    // public function resetPass()
    // {
    //     $new = $this->request->getPost('newPass');
    //     $this->authModel->update(session('id'), ['password' => password_hash($new, PASSWORD_BCRYPT)]);
    //     // hancurkan sesion biar ga disalahgunakan
    //     session()->destroy();
    //     return "true";
    // }



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
