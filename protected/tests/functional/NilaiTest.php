<?php

class NilaiTest extends WebTestCase
{
	public $fixtures=array(
		'nilais'=>'Nilai',
	);

	public function testShow()
	{
		$this->open('?r=nilai/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=nilai/create');
	}

	public function testUpdate()
	{
		$this->open('?r=nilai/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=nilai/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=nilai/index');
	}

	public function testAdmin()
	{
		$this->open('?r=nilai/admin');
	}
}
