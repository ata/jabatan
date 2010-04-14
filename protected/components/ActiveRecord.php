<?php

class ActiveRecord extends CActiveRecord
{
	private $_session = null;
	
	public function __construct()
	{
		if($this->_session === null){
			$this->_session = new CHttpSession;
			$this->_session->open();
		}
		
	}
	
	public function setSession($data)
	{
		$this->_session[get_class($this)]= $data;
	}
	
	public function getSession()
	{
		return isset($this->_session[get_class($this)])?
			$this->_session[get_class($this)]:false;
	}
	
}
