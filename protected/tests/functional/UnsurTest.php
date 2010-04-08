<?php

class UnsurTest extends WebTestCase
{
	public $fixtures=array(
		'unsurs'=>'Unsur',
	);

	public function testShow()
	{
		$this->open('?r=unsur/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=unsur/create');
	}

	public function testUpdate()
	{
		$this->open('?r=unsur/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=unsur/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=unsur/index');
	}

	public function testAdmin()
	{
		$this->open('?r=unsur/admin');
	}
}
