<?php

class KtiTest extends WebTestCase
{
	public $fixtures=array(
		'ktis'=>'Kti',
	);

	public function testShow()
	{
		$this->open('?r=kti/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=kti/create');
	}

	public function testUpdate()
	{
		$this->open('?r=kti/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=kti/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=kti/index');
	}

	public function testAdmin()
	{
		$this->open('?r=kti/admin');
	}
}
