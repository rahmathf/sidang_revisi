<?php

namespace App\Controllers;

use App\Models\SampahModel;

class Home extends BaseController
{
	// public function index()
	// {
	// 	return view('welcome_message');
	// }
	public function __construct()
	{
		$this->sampah = new SampahModel();
	}
	public function index()
	{
		$data = [
			'jenisSampah' => $this->sampah->asObject()->findAll()
		];
		return view('pages/home', $data);
	}
}
