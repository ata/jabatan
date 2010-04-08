<?php

class PegawaiTest extends WebTestCase
{
	public $fixtures=array(
		'pegawais'=>'Pegawai',
	);

	public function testShow()
	{
		$this->open('?r=pegawai/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=pegawai/create');
	}

	public function testUpdate()
	{
		$this->open('?r=pegawai/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=pegawai/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=pegawai/index');
	}

	public function testAdmin()
	{
		$this->open('?r=pegawai/admin');
	}
}
