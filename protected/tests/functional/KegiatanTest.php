<?php

class KegiatanTest extends WebTestCase
{
	public $fixtures=array(
		'kegiatans'=>'Kegiatan',
	);

	public function testShow()
	{
		$this->open('?r=kegiatan/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=kegiatan/create');
	}

	public function testUpdate()
	{
		$this->open('?r=kegiatan/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=kegiatan/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=kegiatan/index');
	}

	public function testAdmin()
	{
		$this->open('?r=kegiatan/admin');
	}
}
