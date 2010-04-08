<?php

class JenisDupakTest extends WebTestCase
{
	public $fixtures=array(
		'jenisDupaks'=>'JenisDupak',
	);

	public function testShow()
	{
		$this->open('?r=jenisDupak/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=jenisDupak/create');
	}

	public function testUpdate()
	{
		$this->open('?r=jenisDupak/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=jenisDupak/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=jenisDupak/index');
	}

	public function testAdmin()
	{
		$this->open('?r=jenisDupak/admin');
	}
}
