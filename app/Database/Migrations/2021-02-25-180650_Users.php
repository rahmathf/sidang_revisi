<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id'           => [
				'type'              => 'INT',
				'constraint'        => 11,
				'auto_increment'    => TRUE,
			],
			'nik'           => [
				'type'              => 'INT',
				'constraint'        => 16,
			],
			'nama'         => [
				'type'              => 'VARCHAR',
				'constraint'        => '255',
			],
			'username'       => [
				'type'              => 'VARCHAR',
				'constraint'        => '255',
			],
			'password'       => [
				'type'              => 'VARCHAR',
				'constraint'        => '255',
			],
			'rt'       => [
				'type'              => 'INT',
				'constraint'        => '3',
			],
			'rw'       => [
				'type'              => 'INT',
				'constraint'        => '3',
			],
			'sampul'       => [
				'type'              => 'VARCHAR',
				'constraint'        => '255',
			],
			'level'       => [
				'type'              => 'VARCHAR',
				'constraint'        => '255',
			],
			'saldo'       => [
				'type'              => 'INT',
				'constraint'        => '30',
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
		$this->forge->createTable('users');
	}

	public function down()
	{
		//
	}
}
