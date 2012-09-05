<?php

class News_Model_DbTable_News extends Rastor_Model_DbTable_Abstract {

    protected $_name = 'news';
    protected $_primary = 'id';
    protected $_sequence = true;

    /**
     * Get recod by uri
     * 
     * @param string $uri
     * @return stdClass 
     */
    function getRecordByUri($uri) {
        $select = $this->select()
                ->where('uri = ?', $uri)
                ->where('enable = ?', 1);
        return $this->getAdapter()->fetchRow($select);
    }
	
	public function getLastRecords($count = 2){
        $select = $this->select()
                ->where('enable = ?', 1)
                ->limit($count)
                ->order('date desc');
        
        if ($count > 1) {
            return $this->getAdapter()->fetchAll($select);
        } else {
            return $this->getAdapter()->fetchRow($select);
        }
    }
	
    function getPaginatorAdapter() {
        $select = $this->select()
                ->where('enable = ?', 1)
                ->order('date');

        return new Zend_Paginator_Adapter_DbSelect($select);
    }
    
    function getRecordPage($uri, $itemsPerPage) {
        $items = $this->getEnableRecords();

        if (count($items)) {
            for ($i = 0; $i < count($items); $i++) {
                if ($uri == $items[$i]->translit_url) {
                    return (int) ceil(($i + 1) / $itemsPerPage);
                }
            }
        }
        return false;
    }
  
	
}
