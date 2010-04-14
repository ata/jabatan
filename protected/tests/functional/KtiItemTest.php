<?php

class KtiItemTest extends WebTestCase
{
	public $fixtures=array(
		'ktiItems'=>'KtiItem',
	);

	public function testShow()
	{
		$this->open('?r=ktiItem/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=ktiItem/create');
	}

	public function testUpdate()
	{
		$this->open('?r=ktiItem/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=ktiItem/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=ktiItem/index');
	}

	public function testAdmin()
	{
		$this->open('?r=ktiItem/admin');
	}
}
