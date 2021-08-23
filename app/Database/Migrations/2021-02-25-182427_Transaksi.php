<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Transaksi extends Migration
{
	public function up()
	{
		$this->db->enableForeignKeyChecks();
		$this->forge->addField([
			'id'                => [
				'type'              => 'INT',
				'constraint'        => 11,
				'auto_increment'    => TRUE,
			],
			'id_admin'                => [
				'type'              => 'INT',
				'constraint'        => 11,
			],
			'id_user'                => [
				'type'              => 'INT',
				'constraint'        => 11,
			],
			'total_harga'                => [
				'type'              => 'INT',
				'constraint'        => 11,
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
		$this->forge->addForeignKey('id_admin', 'users', 'id', 'CASCADE', 'CASCADE');
		$this->forge->addForeignKey('id_user', 'users', 'id', 'CASCADE', 'CASCADE');
		$this->forge->createTable('transaksi');
	}

	public function down()
	{
		//
	}
}
