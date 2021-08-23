<?php

namespace App\Controllers;

// use App\Models\SampahModel;

class Pages extends BaseController
{

    // public $sampah = new SampahModel();
    // public function __construct()
    // {
    //     $this->sampah = new SampahModel();
    // }
    // public function index()
    // {
    //     $data = [
    //         'jenisSampah' => $this->sampah->asObject()->findAll()
    //     ];
    //     return view('pages/home', $data);
    // }

    public function index()
    {
        $data = [
            'title' => 'Home | SemangatePoor'
        ];
        return view('pages/home', $data);
    }

    // public function about()
    // {
    //     $data = [
    //         'title' => 'About Me'
    //     ];
    //     return view('pages/about', $data);
    // }
    // public function regis()
    // {
    //     $data = [
    //         'title' => 'Registrasi'
    //     ];
    //     return view('pages/register', $data);
    // }
}
