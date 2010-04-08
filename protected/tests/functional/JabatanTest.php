<?php

class JabatanTest extends WebTestCase
{
	public $fixtures=array(
		'jabatans'=>'Jabatan',
	);

	public function testShow()
	{
		$this->open('?r=jabatan/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=jabatan/create');
	}

	public function testUpdate()
	{
		$this->open('?r=jabatan/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=jabatan/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=jabatan/index');
	}

	public function testAdmin()
	{
		$this->open('?r=jabatan/admin');
	}
}
