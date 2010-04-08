<?php

class DupakTest extends WebTestCase
{
	public $fixtures=array(
		'dupaks'=>'Dupak',
	);

	public function testShow()
	{
		$this->open('?r=dupak/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=dupak/create');
	}

	public function testUpdate()
	{
		$this->open('?r=dupak/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=dupak/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=dupak/index');
	}

	public function testAdmin()
	{
		$this->open('?r=dupak/admin');
	}
}
