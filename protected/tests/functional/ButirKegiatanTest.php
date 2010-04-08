<?php

class ButirKegiatanTest extends WebTestCase
{
	public $fixtures=array(
		'butirKegiatans'=>'ButirKegiatan',
	);

	public function testShow()
	{
		$this->open('?r=butirKegiatan/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=butirKegiatan/create');
	}

	public function testUpdate()
	{
		$this->open('?r=butirKegiatan/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=butirKegiatan/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=butirKegiatan/index');
	}

	public function testAdmin()
	{
		$this->open('?r=butirKegiatan/admin');
	}
}
