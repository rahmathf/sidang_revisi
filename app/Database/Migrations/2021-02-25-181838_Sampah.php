<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Sampah extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id'           => [
				'type'              => 'INT',
				'constraint'        => 11,
				'auto_increment'    => TRUE,
			],
			'jenis'         => [
				'type'              => 'VARCHAR',
				'constraint'        => '255',
			],
			'slug'       => [
				'type'              => 'VARCHAR',
				'constraint'        => '255',
			],
			'harga'       => [
				'type'              => 'INT',
				'constraint'        => 11,
			],
			'des'       => [
				'type'              => 'VARCHAR',
				'constraint'        => '255',
				'null'              => TRUE,
			],
			'sampul'       => [
				'type'              => 'VARCHAR',
				'constraint'        => '255',
			],
			'created_at'       => [
				'type'              => 'DATETIME',
				'null'              => TRUE,
			],
			'updated_at'       => [
				'type'              => 'DATETIME',
				'null'              => TRUE,
			],
		]);
		$this->forge->addKey('id', TRUE);
		$this->forge->createTable('sampah');
	}

	public function down()
	{
		//
	}
}
