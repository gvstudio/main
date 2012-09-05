<?php

class Shedule_Model_DbTable_Shedule extends Rastor_Model_DbTable_Abstract {

    protected $_name = 'filial';
    protected $_primary = 'id';
    protected $_sequence = true;

    /**
     * Get recod by uri
     * 
     * @param string $uri
     * @return stdClass 
     */
    function getRecordByUri($id) {
        $select = $this->select()
                ->where('id = ?', $id);
               
        return $this->getAdapter()->fetchRow($select);
    }
	
	function getSheduleById($id) {
        $select = $this->select()
                ->where('filial_id = ?', $id);
               
        return $this->getAdapter()->fetchAll($select);
    }
	
	public function shedulesDb()
	{
		$this->_name = 'shedules';
	}
	public function filialDb()
	{
		$this->_name = 'filial';
	}
	
	public function getFilial($id)
	{
		$this->filialDb();
		$select = $this->select()
						->where("id = ?",$id);
		return $this->getAdapter()->fetchRow($select);
	}
	
		public function getShedule($id)
	{
		$this->shedulesDb();
		$select = $this->select()
						->where("id = ?",$id);
		return $this->getAdapter()->fetchRow($select);
	}
	
	function selectFilial() {
        $select = $this->select();
					   
        $filial = $this->getAdapter()->fetchAll($select);
		
		$result = array();
		foreach($filial as $item)
		{
			$result[$item->id] = $item->name;			
		}
		
		
		return $result;              
    }

}