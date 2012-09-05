<?php

class Mailer_Model_DbTable_Mailer extends Rastor_Model_DbTable_Abstract{
	protected $_name = 'mailer';
    	protected $_primary = 'id';
    	protected $_sequence = true;

	public function getEmail($email)
	{
	   $select = $this->select()
                ->where('email = ?', $email);
           return $this->getAdapter()->fetchRow($select);
	}
	public function getEmailByMid($mid)
	{
	   $select = $this->select()
		->from('mailer','email')
                ->where('mid = ?', $mid);
           return $this->getAdapter()->fetchRow($select);
	}
	public function insertNewEmail($data)
	{
		$this->insert($data);
	}
	public function getGreetingText()
	{
		$this->_name='mailer_message';		
		$select=$this->select()
			     ->from('mailer_message','greeting');
		$this->_name='mailer';
		return $this->getAdapter()->fetchRow($select);
	}
	public function getConfirmText()
	{
		$this->_name='mailer_message';		
		$select=$this->select()
			     ->from('mailer_message','confirmation');
		$this->_name='mailer';
		return $this->getAdapter()->fetchRow($select);
	}
	public function getRefuseText()
	{
		$this->_name='mailer_message';		
		$select=$this->select()
			     ->from('mailer_message','refused');
		$this->_name='mailer';
		return $this->getAdapter()->fetchRow($select);
	}
	public function enableEmail($mid)
	{
		$where = 'mid = \''.$mid.'\'';
	   $id = $this->select()
		      ->from($this->_name,'id')
		      ->where('mid = ?',$mid);
	   $id = $this->getAdapter()->fetchRow($id);
	   return $this->update(array('enable' => '1'),$id->id);	  
	}
	public function disableEmail($mid)
	{
		$where = 'mid = \''.$mid.'\'';
	   $id = $this->select()
		      ->from($this->_name,'id')
		      ->where('mid = ?',$mid);
	
	   //$where = $table->getAdapter()->quoteInto('bug_id = ?', 1235);
	   $id = $this->getAdapter()->fetchRow($id);
	   return $this->delete(array('id'=>$id->id));	  
	}
	public function changeDbtoMassage(){
		$this->_name='mailer_message';
	}
	public function changeDbtoMailer(){
		$this->_name='mailer';
	}
	function getActiveMail() {	
        	return $items = $this->getEnableRecords();
    	}
	function getMid($email) {
		$select=$this->select()
			     ->from('mailer','mid')
			     ->where('email = ?',$email);		
		return $this->getAdapter()->fetchRow($select);        	
    	}
}
