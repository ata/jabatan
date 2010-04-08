<?php

class SubUnsurTest extends WebTestCase
{
	public $fixtures=array(
		'subUnsurs'=>'SubUnsur',
	);

	public function testShow()
	{
		$this->open('?r=subUnsur/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=subUnsur/create');
	}

	public function testUpdate()
	{
		$this->open('?r=subUnsur/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=subUnsur/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=subUnsur/index');
	}

	public function testAdmin()
	{
		$this->open('?r=subUnsur/admin');
	}
}
