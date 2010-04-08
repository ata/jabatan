<?php

class SubunsurTest extends WebTestCase
{
	public $fixtures=array(
		'subunsurs'=>'Subunsur',
	);

	public function testShow()
	{
		$this->open('?r=subunsur/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=subunsur/create');
	}

	public function testUpdate()
	{
		$this->open('?r=subunsur/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=subunsur/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=subunsur/index');
	}

	public function testAdmin()
	{
		$this->open('?r=subunsur/admin');
	}
}
