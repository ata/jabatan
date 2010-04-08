<?php

class KenaikanJabatanTest extends WebTestCase
{
	public $fixtures=array(
		'kenaikanJabatans'=>'KenaikanJabatan',
	);

	public function testShow()
	{
		$this->open('?r=kenaikanJabatan/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=kenaikanJabatan/create');
	}

	public function testUpdate()
	{
		$this->open('?r=kenaikanJabatan/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=kenaikanJabatan/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=kenaikanJabatan/index');
	}

	public function testAdmin()
	{
		$this->open('?r=kenaikanJabatan/admin');
	}
}
